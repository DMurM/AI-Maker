<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class PaymentController extends Controller
{
    public function index()
    {
        return view('profile.payment');
    }

}
