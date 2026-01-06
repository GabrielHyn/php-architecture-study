<?php

namespace App\Http\Controllers;

use App\Enums\PaymentType;
use App\Http\Requests\StorePaymentRequest;
use App\Services\CheckoutPayment;

class PaymentController
{
    public function store(StorePaymentRequest $request)
    {
        $paymentEnum = PaymentType::tryFrom($request->input('payment_type'));

        if (! $paymentEnum) {
            return 'Error: Invalid Payment Type';
        }
        $provider = $paymentEnum->getProvider();
        $checkout = new CheckoutPayment;
        $checkout->processPayment($request->input('amount'), $provider);

        return 'Processed Payment!';
    }
}
