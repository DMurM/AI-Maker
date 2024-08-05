<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Charge;

class PaymentController2 extends Controller
{
    public function showPaymentForm()
    {
        return view('payment.payment1');
    }

    public function processPayment(Request $request)
    {
        Stripe::setApiKey(config('services.stripe.secret'));

        try {
            Charge::create([
                'amount' => 1000, // Amount in cents
                'currency' => 'usd',
                'source' => $request->stripeToken,
                'description' => 'Test Payment',
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