<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PricingController extends Controller
{
    public function showMonthly()
    {
        return view('partials.pricing-monthly');
    }

    public function showYearly()
    {
        return view('partials.pricing-yearly');
    }

    public function showTeam()
    {
        return view('partials.pricing-team');
    }

    public function showCoins()
    {
        return view('partials.pricing-coins');
    }
}
