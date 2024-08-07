<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Charge;
use Illuminate\Support\Facades\Config;

class PaymentController2 extends Controller
{
    public function showPaymentForm()
    {
        return view('payment.payment1');
    }

    public function processPayment(Request $request)
    {
        $stripeApiSecret = Config::get('services.stripe.secret');
        Stripe::setApiKey($stripeApiSecret);

        $stripeToken = $request->input('stripeToken');
        $credits = $request->input('credits');
        $amount = $credits * 10; // Calculate amount in cents (1 credit = 10 cents)

        try {
            Charge::create([
                'amount' => $amount, // amount in cents
                'currency' => 'usd',
                'source' => $stripeToken,
                'description' => 'Purchase of ' . $credits . ' credits',
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