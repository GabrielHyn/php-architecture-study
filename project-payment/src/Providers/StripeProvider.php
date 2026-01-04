<?php

namespace App\Providers;

use App\Abstracts\BasePayment;
use App\Interfaces\PaymentMethodContract;
use App\DTOs\PaymentResponse;
use App\Enums\PaymentStatus;

class StripeProvider extends BasePayment implements PaymentMethodContract
{
    public function chargePayment(float $amount): PaymentResponse
    {
        echo "Charging $amount using Stripe" . PHP_EOL;
        return new PaymentResponse(PaymentStatus::Success, $amount);
    }
}
