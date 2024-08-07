<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AiToolsController extends Controller
{
    public function showImageGenerator()
    {
        return view('partials.ai-tools-image-generator');
    }

    public function showBackgroundRemove()
    {
        return view('partials.ai-tools-background-remover');
    }

    public function showImageToVideo()
    {
        return view('partials.ai-tools-image-to-video');
    }

    public function showTextToSpeech()
    {
        return view('partials.ai-tools-text-to-speech');
    }
}
