<?php

namespace App\Abstracts;

abstract class BasePayment
{
    public function calculateTax(float $amount): float
    {
        return $amount * 0.5;
    }
}
