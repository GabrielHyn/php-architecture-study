<?php

namespace App\Traits;

trait LoggerTrait
{
    function logMessage(string $msg)
    {
        echo "Log $msg" . PHP_EOL;
    }
}
