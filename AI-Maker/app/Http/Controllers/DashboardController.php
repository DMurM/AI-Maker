<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        return view('user_dashboard.user_dashboard', [
            'name' => $user->name,
            'lastname' => $user->lastname,
            'email' => $user->email,
            'credit' => $user->credit ?? 0
        ]);
    }

    public function showImageGeneration()
    {
        return view('user_dashboard.image_generation');
    }
}
