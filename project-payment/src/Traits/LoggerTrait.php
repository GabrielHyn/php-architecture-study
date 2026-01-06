<?php

namespace App\Traits;

trait LoggerTrait
{
    public function logMessage(string $msg)
    {
        echo "Log $msg".PHP_EOL;
    }
}
