<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RemoveBackgroundController extends Controller
{
    public function showForm()
    {
        return view('user_dashboard.remove_background');
    }
}