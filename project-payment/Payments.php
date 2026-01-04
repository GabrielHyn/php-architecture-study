<?php

declare(strict_types=1);

include 'LoggerTrait.php';
include 'PaymentStatus.php';

abstract class BasePayment
{
    public function calculateTax(float $amount): float
    {
        return $amount * 0.5;
    }
}

class PaymentResponse
{
    public function __construct(

        public PaymentStatus $status,
        public float $amount
    ) {}
}

interface PaymentMethodContract
{
    public function chargePayment(float $amount): PaymentResponse;
}

class PaypalProvider extends BasePayment implements PaymentMethodContract
{
    use LoggerTrait;
    public function chargePayment(float $amount): PaymentResponse
    {
        $tax = $this->calculateTax($amount);
        $total = $amount + $tax;
        echo "Charging $amount + Tax $tax (Total: $total) using PayPal" . PHP_EOL;
        $this->logMessage("Payment made successfully");
        return new PaymentResponse(PaymentStatus::Success, $total);
    }
}

class StripeProvider extends BasePayment implements PaymentMethodContract
{
    public function chargePayment(float $amount): PaymentResponse
    {
        echo "Charging $amount using Stripe" . PHP_EOL;
        return new PaymentResponse(PaymentStatus::Success, $amount);
    }
}

class PixProvider extends BasePayment implements PaymentMethodContract
{
    use LoggerTrait;
    public function chargePayment(float $amount): PaymentResponse
    {
        echo "Charging $amount using Pix" . PHP_EOL;

        $this->logMessage("Payment made sucessfully");

        return new PaymentResponse(PaymentStatus::Success, $amount);
    }
}

class FakeProvider implements PaymentMethodContract
{
    public function chargePayment(float $amount): PaymentResponse
    {
        echo "Charging $amount using Fake" . PHP_EOL;
        return new PaymentResponse(PaymentStatus::Success, $amount);
    }
}

class CheckoutPayment
{
    public function processPayment(float $amount, PaymentMethodContract $provider)
    {
        $Response = $provider->chargePayment($amount);
        echo '--- CHECKOUT REPORT ---' . PHP_EOL .
            'Status: ' . $Response->status->value .
            PHP_EOL . 'Value: ' . $Response->amount;
    }
}

$checkout = new CheckoutPayment();
$paypal = new PaypalProvider();
$stripe = new StripeProvider();
$pix = new PixProvider();
$fake = new FakeProvider();
$checkout->processPayment(100,  $paypal);
