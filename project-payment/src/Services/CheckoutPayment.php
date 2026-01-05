<?php

namespace App\Services;

use App\Interfaces\PaymentMethodContract;

class CheckoutPayment
{
    public function processPayment(float $amount, PaymentMethodContract $provider)
    {
        $response = $provider->chargePayment($amount);
        echo '--- CHECKOUT REPORT ---' . PHP_EOL .
            'Status: ' . $response->status->value .
            PHP_EOL . 'Value: ' . $response->amount . PHP_EOL;
    }
}
