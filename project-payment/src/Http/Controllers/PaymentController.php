<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePaymentRequest;
use App\Providers\PaypalProvider;
use App\Providers\PixProvider;
use App\Providers\StripeProvider;
use App\Providers\FakeProvider;
use App\Services\CheckoutPayment;

class PaymentController
{
    public function store(StorePaymentRequest $request)
    {
        $type = $request->input('payment_type');
        $paymentProvider = null;
        switch ($type) {
            case 'paypal':
                $paymentProvider = new PaypalProvider;
                break;
            case 'pix':
                $paymentProvider = new PixProvider;
                break;
            case 'stripe':
                $paymentProvider = new StripeProvider;
                break;
            case 'fake':
                $paymentProvider = new FakeProvider;
                break;
        }
        if ($paymentProvider === null) {
            return "Error: Invalid Payment Type";
        }
        $amount = $request->input('amount');
        $checkout = new CheckoutPayment();
        $checkout->processPayment($amount, $paymentProvider);

        return "Processed Payment!";
    }
}
