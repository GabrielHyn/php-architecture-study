<?php
trait LoggerTrait
{
    function logMessage(string $msg)
    {
        echo "Log $msg" . PHP_EOL;
    }
}
