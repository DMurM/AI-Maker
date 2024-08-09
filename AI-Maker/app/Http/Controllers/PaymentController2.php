<?php

namespace App\Http\Controllers;

use App\Models\Factura;
use App\Models\Credit;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Charge;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class PaymentController2 extends Controller
{
    public function showPaymentForm()
    {
        $coinRate = (float) env('COIN_RATE');
        return view('payment.payment1', compact('coinRate'));
    }

    public function processPayment(Request $request)
    {
        $coinRate = (float) env('COIN_RATE');
        $stripeApiSecret = Config::get('services.stripe.secret');
        Stripe::setApiKey($stripeApiSecret);

        $data = $request->json()->all();
        $stripeToken = $data['stripeToken'];
        $credits = $data['credits'];
        $amount = $credits * $coinRate; // Calcula el monto en centavos (1 crédito = 0.05 EUR)

        try {
            $userId = Auth::id();

            // Crea o actualiza el cliente en Stripe
            $customer = \Stripe\Customer::create([
                'email' => Auth::user()->email,
                'source' => $stripeToken,
            ]);

            // Crea el cargo
            $charge = Charge::create([
                'customer' => $customer->id,
                'amount' => $amount,
                'currency' => 'eur',
                'description' => 'Purchase of ' . $credits . ' credits',
            ]);

            if ($charge->status === 'succeeded') {
                // Encuentra o crea un registro de crédito para el usuario
                $creditRecord = Credit::firstOrCreate(
                    ['credits' => 0, 'total_spend' => 0]
                );
                $creditRecord->increment('credits', $credits);
                //$creditRecord->increment('total_spend', $amount / 100); // Convertir centavos a euros

                // Registra la transacción en Facturas
                Factura::create([
                    'user_id' => $userId,
                    'price' => $amount / 100,
                    'description' => 'Purchase of ' . $credits . ' credits',
                    'date' => Carbon::now(),
                    'creditos' => $credits,
                ]);

                // Pago exitoso; devuelve una respuesta de éxito
                return response()->json(['success' => true, 'message' => 'Payment successful!']);
            } else {
                return response()->json(['success' => false, 'message' => 'Payment failed: ' . $charge->failure_message]);
            }
        } catch (\Exception $e) {
            // Registra el error para depuración
            Log::error('Stripe Payment Error: ' . $e->getMessage());

            // Devuelve el mensaje de error
            return response()->json(['success' => false, 'message' => 'Payment failed: ' . $e->getMessage()]);
        }
    }
}
