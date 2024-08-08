<?php

namespace App\Http\Controllers;

use App\Models\Facturas;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Charge;
use Illuminate\Support\Facades\Config;
use App\Models\Credit;

class PaymentController2 extends Controller
{
    public function showPaymentForm()
    {
        return view('payment.payment1');
    }

    public function processPayment(Request $request)
    {
        //lo he dejado por aqui, tengo que adaptar esto 

        $stripeApiSecret = Config::get('services.stripe.secret');
        Stripe::setApiKey($stripeApiSecret);

        $stripeToken = $request->input('stripeToken');
        $credits = $request->input('credit');
        $amount = $credits * 10; // Calculate amount in cents (1 credit = 5 cents)

        try {
            Charge::create([
                'amount' => $amount, // amount in cents
                'currency' => 'usd', //hay que tener en cuenta la moneda de pago
                'source' => $stripeToken,
                'description' => 'Purchase of ' . $credits . ' credits',
            ]);

            // Update user's credits and total spend
            $userId = auth()->id();
            $creditRecord = Credit::firstOrNew(['user_id' => $userId]);
            $creditRecord->credit += $credits;
            $creditRecord->total_spend += $amount / 100; // Convert cents to dollars
            $creditRecord->save();

            // Record the transaction in facturas
            Facturas::create([
                'user_id' => $userId,
                'price' => $amount / 100, // Convert cents to dollars
                'creditos' => $credits,
                'description' => 'Purchase of ' . $credits . ' credits',
                'date' => Carbon::now()
                // Add other necessary fields
            ]);

            //$request->session()->flash('success', 'Payment successful!');

            //return redirect()->route('payment.success');

            // Payment successful; store a success message in the session
            return response()->json(['success' => true]);

        } catch (\Exception $e) {
            //$request->session()->flash('error', $e->getMessage());

            //return redirect()->route('payment.failure');

            // Payment failed; store an error message in the session
            return response()->json(['success' => false, 'message' => $e->getMessage()]);


        }
    }
}