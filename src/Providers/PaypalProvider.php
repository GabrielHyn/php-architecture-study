<?php

namespace App\Providers;

use App\Abstracts\BasePayment;
use App\DTOs\PaymentResponse;
use App\Enums\PaymentStatus;
use App\Interfaces\PaymentMethodContract;
use App\Traits\LoggerTrait;

class PaypalProvider extends BasePayment implements PaymentMethodContract
{
    use LoggerTrait;

    public function chargePayment(float $amount): PaymentResponse
    {
        $tax = $this->calculateTax($amount);
        $total = $amount + $tax;
        echo "Charging $amount + Tax $tax (Total: $total) using PayPal".PHP_EOL;
        $this->logMessage('Payment made successfully');

        return new PaymentResponse(PaymentStatus::Success, $total);
    }
}
