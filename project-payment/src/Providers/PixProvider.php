<?php

namespace App\Providers;

use App\Abstracts\BasePayment;
use App\DTOs\PaymentResponse;
use App\Enums\PaymentStatus;
use App\Interfaces\PaymentMethodContract;
use App\Traits\LoggerTrait;

class PixProvider extends BasePayment implements PaymentMethodContract
{
    use LoggerTrait;

    public function chargePayment(float $amount): PaymentResponse
    {
        echo "Charging $amount using Pix".PHP_EOL;

        $this->logMessage('Payment made sucessfully');

        return new PaymentResponse(PaymentStatus::Success, $amount);
    }
}
