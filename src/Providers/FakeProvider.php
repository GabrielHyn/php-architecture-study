<?php

namespace App\Providers;

use App\Abstracts\BasePayment;
use App\DTOs\PaymentResponse;
use App\Enums\PaymentStatus;
use App\Interfaces\PaymentMethodContract;

class FakeProvider extends BasePayment implements PaymentMethodContract
{
    public function chargePayment(float $amount): PaymentResponse
    {
        echo "Charging $amount using Fake".PHP_EOL;

        return new PaymentResponse(PaymentStatus::Success, $amount);
    }
}
