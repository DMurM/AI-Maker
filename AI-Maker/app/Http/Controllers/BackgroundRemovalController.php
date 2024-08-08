<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

class BackgroundRemovalController extends Controller
{
    public function showForm()
    {
        return view('user_dashboard.remove_background');
    }

    public function removeBackground(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $image = $request->file('image');
        $inputPath = $image->getPathName();
        $outputPath = storage_path('app/public/removed-background.png');

        $process = new Process(['rembg', 'i', $inputPath, $outputPath]);
        $process->run();

        if (!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }

        return response()->download($outputPath);
    }
}
