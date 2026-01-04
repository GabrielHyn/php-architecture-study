<?php

namespace App\DTOs;

use App\Enums\PaymentStatus;

class PaymentResponse
{
    public function __construct(
        public PaymentStatus $status,
        public float $amount
    ) {}
}
