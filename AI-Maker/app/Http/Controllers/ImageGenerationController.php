<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ImageGenerationController extends Controller
{
    public function generateImage(Request $request)
    {
        // Obtener los valores del formulario
        $prompt = $request->input('prompt');  // Ejemplo: "A futuristic city at sunset"
        $style = $request->input('style');  // Ejemplo: "fooocus_v2"
        $aspectRatio = $request->input('aspect_ratio', '1:1');  
        $outputs = $request->input('outputs', 1);  // Ejemplo: 1

        // Mapear el aspect ratio a su resolución correspondiente
        $aspectRatios = [
            '1:1' => '1152*1152',
            '3:4' => '1152*1536',
            '4:3' => '1536*1152',
            '16:9' => '2048*1152'
        ];
        $resolution = $aspectRatios[$aspectRatio] ?? '2048*1152'; 

        // Estructurar el payload con el campo 'input' según la especificación exacta
        $requestPayload = [
            'input' => [
                'api_name' => 'txt2img',
                'prompt' => $prompt,
                'style_selections' => [$style],
                'aspect_ratios_selection' => $resolution,
                'image_number' => $outputs,
                'require_base64' => true
            ],
            'policy' => [
                'executionTimeout' => 300000,  
                'lowPriority' => false,  
                'ttl' => 86400000  
            ]
        ];

        // Loguear el payload antes de enviarlo (opcional)
        Log::info('Request Payload:', $requestPayload);

        try {
            // Enviar solicitud a la API de Runpod con tiempos de espera ajustados
            $apiResponse = Http::withHeaders([
                    'Accept' => 'application/json',
                    'Authorization' => 'Bearer YQAGQLJDTTB2DQE4VHQXKSL7HUJ9V17HX07O3AKH'
                ])
                ->timeout(300) // Aumenta el tiempo de espera a 5 minutos (300 segundos)
                ->connectTimeout(60)
                ->withoutVerifying()
                ->post('https://api.runpod.ai/v2/7q281nl08638ve/runsync', $requestPayload);

            // Loguear la respuesta completa (opcional)
            Log::info('API Response:', ['status' => $apiResponse->status(), 'response' => $apiResponse->body()]);

            if ($apiResponse->successful()) {
                $data = $apiResponse->json();
                if (isset($data['output']) && is_array($data['output'])) {
                    $imagesBase64 = $data['output'];

                    $imageUrls = [];
                    foreach ($imagesBase64 as $imageData) {
                        if (isset($imageData['base64'])) {
                            $imageUrls[] = 'data:image/png;base64,' . $imageData['base64'];
                        }
                    }

                    return response()->json(['image_urls' => $imageUrls]);
                } else {
                    return response()->json(['error' => 'Invalid API response, base64 data not found'], 500);
                }
            } else {
                Log::error('Runpod API Error:', ['status' => $apiResponse->status(), 'response' => $apiResponse->body()]);
                return response()->json(['error' => 'Image generation failed'], $apiResponse->status());
            }
        } catch (\Exception $e) {
            Log::error('Image generation error: ' . $e->getMessage());
            return response()->json(['error' => 'Internal Server Error', 'message' => $e->getMessage()], 500);
        }
    }
}
