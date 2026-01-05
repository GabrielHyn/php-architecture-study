<?php

namespace App\Factories;

use App\Interfaces\PaymentMethodContract;
use App\Providers\FakeProvider;
use App\Providers\PaypalProvider;
use App\Providers\PixProvider;
use App\Providers\StripeProvider;

class PaymentFactory
{
    public static function make(string $type): ?PaymentMethodContract
    {
        return match ($type) {
            'paypal' => new PaypalProvider(),
            'pix' => new PixProvider(),
            'stripe' => new StripeProvider(),
            'fake' => new FakeProvider(),
            'default' => null,
        };
    }
}
