<?php

namespace App\Services;

use App\DTO\OrderRequest;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\DB;

class OrderService
{

    public function save(OrderRequest $order)
    {

        DB::transaction(function () use ($order) {
            $orderModel = Order::create([
                'table_number' => $order->table_number,
                'status' => $order->status
            ]);


            foreach ($order->order_items as $order_item) {
                OrderItem::create([
                    'order_id' => $orderModel->order_id,
                    'food_id' => $order_item['food_id'],
                    'quantity' => $order_item['quantity']
                ]);
            }
        });
    }
}
