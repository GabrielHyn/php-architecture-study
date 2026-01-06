<?php

declare(strict_types=1);

require __DIR__.'/vendor/autoload.php';

use App\Http\Controllers\PaymentController;
use App\Http\Requests\StorePaymentRequest;

$request = new StorePaymentRequest;
$request->merge(['amount' => 500, 'payment_type' => ' pix ']);
$request->validate();
$paymentController = new PaymentController;
echo $paymentController->store($request);
