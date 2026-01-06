<?php

namespace App\Interfaces;

use App\DTOs\PaymentResponse;

interface PaymentMethodContract
{
    public function chargePayment(float $amount): PaymentResponse;
}
