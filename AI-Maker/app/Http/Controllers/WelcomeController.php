<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;

class WelcomeController extends Controller
{
    public function index()
    {
        $images = Image::orderBy('created_at', 'desc')->take(35)->get();

        return view('welcome', compact('images'));
    }
}
