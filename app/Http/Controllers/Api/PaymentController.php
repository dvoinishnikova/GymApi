<?php

namespace App\Http\Controllers\Api;

use Stripe\Stripe;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PaymentController extends Controller
{
    public function createPaymentIntent(Request $request)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));

        $amount = $request->amount;

        $paymentIntent = \Stripe\PaymentIntent::create([
            'amount' => $amount,
            'currency' => 'uah',
        ]);

        return response()->json([
            'client_secret' => $paymentIntent->client_secret
        ]);
    }
}