<?php

namespace App\DTO;

class OrderRequest
{
    //@param OrderItemRequest[] $order_items
    public function __construct(
        public int $table_number,
        public string $status,
        public array $order_items
    ) {}
}