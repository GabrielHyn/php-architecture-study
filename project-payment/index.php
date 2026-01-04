<?php

declare(strict_types=1);

require __DIR__ . '/vendor/autoload.php';

use App\Services\CheckoutPayment;
use App\Providers\PaypalProvider;
use App\Providers\StripeProvider;
use App\Providers\PixProvider;
use App\Providers\FakeProvider;

$checkout = new CheckoutPayment();
$paypal = new PaypalProvider();
$stripe = new StripeProvider();
$pix = new PixProvider();
$fake = new FakeProvider();
$checkout->processPayment(100,  $paypal);
