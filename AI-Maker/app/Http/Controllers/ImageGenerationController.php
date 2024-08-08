<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Credit;

class ImageGenerationController extends Controller
{
    protected $imageGenerationCost = 0;

    public function showForm()
    {
        return view('user_dashboard.image_generation.image_generation');
    }

    public function generateImage(Request $request)
    {
        set_time_limit(80);  // Incrementa el tiempo de ejecución a 120 segundos

        $user = Auth::user();
        $response = [];
        $statusCode = 200;

        if (!$user) {
            return response()->json(['error' => 'Unauthenticated'], 401);
        }

        $useCredits = config('app.use_credits', false);
        $credit = $user->activeCredit;

        if ($useCredits && (!$credit || !$credit->hasEnoughCredits($this->imageGenerationCost))) {
            return response()->json(['error' => 'Not enough credits'], 403);
        }

        if ($useCredits) {
            $credit->deductCredits($this->imageGenerationCost);
        }

        try {
            $apiResponse = Http::withHeaders(['Accept' => 'application/json'])
                ->timeout(120)
                ->connectTimeout(60)
                ->post('http://192.168.50.101:8888/v2/generation/text-to-image-with-ip', $this->getRequestPayload($request));

            Log::info('API Response', ['status' => $apiResponse->status(), 'response' => $apiResponse->body()]);

            if ($apiResponse->successful()) {
                $data = $apiResponse->json();
                $imageUrls = $this->getImageUrls($data);

                foreach ($imageUrls as $url) {
                    $user->addImage($url);
                }

                $response = ['image_urls' => $imageUrls, 'response_data' => $data];
            } else {
                $response = ['error' => 'Image generation failed', 'response_data' => $apiResponse->json()];
                $statusCode = $apiResponse->status();
            }
        } catch (\Exception $e) {
            Log::error('Image generation error: ' . $e->getMessage());
            $response = ['error' => 'Internal Server Error', 'message' => $e->getMessage()];
            $statusCode = 500;
        }

        return response()->json($response, $statusCode);
    }


    private function getRequestPayload(Request $request)
    {
        $aspectRatios = [
            '1:1' => '1152*1152',
            '3:4' => '1152*1536',
            '4:3' => '1536*1152',
            '16:9' => '2048*1152'
        ];

        $aspectRatio = $request->input('aspect-ratio', '1:1');
        $resolution = $aspectRatios[$aspectRatio] ?? '1152*896';
        
        $styles = config('styles');
        $styleSelection = $request->input('style', 'Fooocus Masterpiece');
        $stylePreset = array_reduce($styles, function($carry, $item) use ($styleSelection) {
            return in_array($styleSelection, $item) ? $item : $carry;
        }, []);

        return [
            'prompt' => $request->input('prompt'),
            'negative_prompt' => '',
            'style_selections' => ['Fooocus V2', 'Fooocus Enhance', 'Fooocus Sharp'],
            'performance_selection' => 'Speed',
            'aspect_ratios_selection' => $resolution,
            'image_number' => $request->input('outputs', 1),
            'image_seed' => -1,
            'sharpness' => 2,
            'guidance_scale' => 4,
            'base_model_name' => 'juggernautXL_v8Rundiffusion.safetensors',
            'refiner_model_name' => 'None',
            'refiner_switch' => 0.5,
            'loras' => [
                ['enabled' => true, 'model_name' => 'sd_xl_offset_example-lora_1.0.safetensors', 'weight' => 0.1],
                ['enabled' => true, 'model_name' => 'None', 'weight' => 1],
                ['enabled' => true, 'model_name' => 'None', 'weight' => 1],
                ['enabled' => true, 'model_name' => 'None', 'weight' => 1],
                ['enabled' => true, 'model_name' => 'None', 'weight' => 1]
            ],
            'advanced_params' => [
                'adaptive_cfg' => 7,
                'adm_scaler_end' => 0.3,
                'adm_scaler_negative' => 0.8,
                'adm_scaler_positive' => 1.5,
                'black_out_nsfw' => false,
                'canny_high_threshold' => 128,
                'canny_low_threshold' => 64,
                'clip_skip' => 2,
                'controlnet_softness' => 0.25,
                'debugging_cn_preprocessor' => false,
                'debugging_inpaint_preprocessor' => false,
                'disable_intermediate_results' => false,
                'disable_preview' => false,
                'disable_seed_increment' => false,
                'freeu_b1' => 1.01,
                'freeu_b2' => 1.02,
                'freeu_enabled' => false,
                'freeu_s1' => 0.99,
                'freeu_s2' => 0.95,
                'inpaint_disable_initial_latent' => false,
                'inpaint_engine' => 'v2.6',
                'inpaint_erode_or_dilate' => 0,
                'inpaint_mask_upload_checkbox' => false,
                'inpaint_respective_field' => 1,
                'inpaint_strength' => 1,
                'invert_mask_checkbox' => false,
                'mixing_image_prompt_and_inpaint' => false,
                'mixing_image_prompt_and_vary_upscale' => false,
                'overwrite_height' => -1,
                'overwrite_step' => -1,
                'overwrite_switch' => -1,
                'overwrite_upscale_strength' => -1,
                'overwrite_vary_strength' => -1,
                'overwrite_width' => -1,
                'refiner_swap_method' => 'joint',
                'sampler_name' => 'dpmpp_2m_sde_gpu',
                'scheduler_name' => 'karras',
                'skipping_cn_preprocessor' => false,
                'vae_name' => 'Default (model)'
            ],
            'save_meta' => true,
            'meta_scheme' => 'fooocus',
            'save_extension' => 'png',
            'save_name' => '',
            'read_wildcards_in_order' => false,
            'require_base64' => false,
            'async_process' => false,
            'webhook_url' => '',
            'image_prompts' => []
        ];
    }

    private function getImageUrls($data)
    {
        $urls = [];
        foreach ($data as $image) {
            $imageURL = str_replace('127.0.0.1', '192.168.50.101', $image['url'] ?? '');
            $urls[] = $imageURL;
        }
        return $urls;
    }
}