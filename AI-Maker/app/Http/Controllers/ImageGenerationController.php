<?

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ImageGenerationController extends Controller
{
    public function generate(Request $request)
    {
        $response = Http::post('http://192.168.50.101:8000/v2/generation/text-to-image-with-ip', $request->all());

        if ($response->successful()) {
            return response()->json($response->json());
        } else {
            return response()->json(['error' => 'Failed to generate image'], 500);
        }
    }
}
