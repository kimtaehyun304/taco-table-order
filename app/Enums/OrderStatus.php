<?php

namespace App\Enums;

enum OrderStatus: string
{
    case ORDERED = 'ORDERED';
    case REFUND = 'REFUND';
}