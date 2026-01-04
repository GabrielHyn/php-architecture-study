<?php

declare(strict_types=1);

enum PaymentStatus: string
{
    case Success = 'success';
    case Pending = 'pending';
    case Canceled = 'canceled';
}
