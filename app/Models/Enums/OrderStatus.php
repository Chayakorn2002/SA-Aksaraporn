<?php

namespace App\Models\Enums;

enum OrderStatus: string
{
    case PENDING = 'PENDING';
    case CONFIRMED = 'CONFIRMED';
    case PROCESSING = 'PROCESSING';
    case COMPLETED = 'COMPLETED';
}
