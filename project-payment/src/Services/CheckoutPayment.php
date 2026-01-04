<?php

namespace App\Services;

use App\Interfaces\PaymentMethodContract;

class CheckoutPayment
{
    public function processPayment(float $amount, PaymentMethodContract $provider)
    {
        $Response = $provider->chargePayment($amount);
        echo '--- CHECKOUT REPORT ---' . PHP_EOL .
            'Status: ' . $Response->status->value .
            PHP_EOL . 'Value: ' . $Response->amount;
    }
}
