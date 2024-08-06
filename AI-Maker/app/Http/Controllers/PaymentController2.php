<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Charge;
use Illuminate\Support\Facades\Config;
use App\Models\User;

class PaymentController2 extends Controller
{
    public function showPaymentForm()
    {
        return view('payment.payment1');
    }

    public function processPayment(Request $request)
    {
        $stripeApiKey = Config::get('services.stripe.key');
        $stripeApiSecret = Config::get('services.stripe.secret');
        Stripe::setApiKey($stripeApiSecret);
        $stripeToken = $request->stripeToken;

        try {
            Charge::create([
                'amount' => 1000, // amount in cents
                'currency' => 'usd',
                'customer' => $stripeToken,
                'description' => 'Test charge',
            ]);

            // Payment successful; store a success message in the session
            $request->session()->flash('success', 'Payment successful!');

            return redirect()->route('payment.success');
        } catch (\Exception $e) {
            // Payment failed; store an error message in the session
            $request->session()->flash('error', $e->getMessage());

            return redirect()->route('payment.failure');
        }
    }
}