<?php

namespace App\Enums;

use App\Interfaces\PaymentMethodContract;
use App\Providers\FakeProvider;
use App\Providers\PaypalProvider;
use App\Providers\PixProvider;
use App\Providers\StripeProvider;

enum PaymentType: string
{
    case PAYPAL = 'paypal';
    case PIX = 'pix';
    case STRIPE = 'stripe';
    case FAKE = 'fake';

    public function getProvider(): PaymentMethodContract
    {
        return match ($this) {
            self::PAYPAL => new PaypalProvider,
            self::PIX => new PixProvider,
            self::STRIPE => new StripeProvider,
            self::FAKE => new FakeProvider,
        };
    }
}
