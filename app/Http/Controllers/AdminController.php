<?php

namespace App\Http\Controllers;


use App\Models\Order;
use App\Services\OrderService;
use App\DTO\OrderRequest;

class AdminController extends Controller
{

    private OrderService $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    public function orders()
    {
        $orders = Order::with('orderItems')->get();
        return view('admin', compact('orders'));
    }

    //API
    public function saveOrder(OrderRequest $request)
    {
        $this->orderService->save($request);
        return response()->json([
            'message' => '주문이 완료되었습니다.'
        ], 200);
    }
}
