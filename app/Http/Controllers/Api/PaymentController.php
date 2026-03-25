<?php

namespace App\Http\Controllers\Api;

use Stripe\Stripe;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

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

        $user = $request->user();
        $now = Carbon::now();

        if ($user->subscription_until && $user->subscription_until->isFuture()) {
            $user->subscription_until = $user->subscription_until->addMonth();
        } else {
            $user->subscription_until = $now->addMonth();
        }

        $user->save();

        return response()->json([
            'message' => 'Оплачено',
            'subscription_until' => $user->subscription_until,
            'is_subscribed' => $user->is_subscribed,
            'subscription_days_left' => $user->subscription_days_left,
        ]);
    }
}