<?php

namespace App\Enums;

enum OrderStatus: int
{
    case PENDING = 0;
    case PROCESSING = 1;
    case SENT = 2;
    case DELIVERED = 3;
    case CANCELLED = 4;
    case REFUND = 5;
}
