<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Image;

class GalleryController extends Controller
{
    public function getInitialImages()
    {
        return response()->json(Image::getInitialImages());
    }

    public function getRecentImages()
    {
        $images = Image::getRecentImages();
        $limit = 21;

        if ($images->isEmpty()) {
            return response()->json(['status' => 'no_images'], 204); // No Content status
        }

        $publicImages = [];
        if ($images->count() < $limit) {
            $remaining = $limit - $images->count();
            $publicFiles = File::files(public_path('images/styles'));
            foreach ($publicFiles as $file) {
                if ($remaining <= 0) {
                    break;
                }
                $publicImages[] = (object) [
                    'url' => asset('images/styles/' . $file->getFilename())
                ];
                $remaining--;
            }
        }

        return response()->json(array_merge($images->toArray(), $publicImages));
    }
}
