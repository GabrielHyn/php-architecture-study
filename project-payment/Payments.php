<?php

include 'LoggerTrait.php';

abstract class BasePayment
{
    public function calculateTax(float $amount)
    {
        return $amount * 0.5;
    }
}

interface PaymentMethodContract
{
    public function chargePayment(float $amount);
}

class PaypalProvider extends BasePayment implements PaymentMethodContract
{
    use LoggerTrait;
    public function chargePayment(float $amount)
    {
        $tax = $this->calculateTax($amount);
        $total = $amount + $tax;
        echo "Charging $amount + Tax $tax (Total: $total) using PayPal" . PHP_EOL;
        $this->logMessage("pagamento realizado com Sucesso");
    }
}

class StripeProvider extends BasePayment implements PaymentMethodContract
{
    public function chargePayment(float $amount)
    {
        echo "Charging $amount using Stripe" . PHP_EOL;
    }
}

class PixProvider extends BasePayment implements PaymentMethodContract
{
    use LoggerTrait;
    public function chargePayment(float $amount)
    {
        echo "Charging $amount using Pix";

        $this->logMessage("pagamento realizado com Sucesso" . PHP_EOL);
    }
}

class CheckoutPayment
{
    public function processPayment(float $amount, PaymentMethodContract $provider)
    {
        $provider->chargePayment($amount);
    }
}

$checkout = new CheckoutPayment();
$paypal = new PaypalProvider();
$stripe = new StripeProvider();
$pix = new PixProvider();
$checkout->processPayment(100, $paypal);
