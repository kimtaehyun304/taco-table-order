<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Food;
use App\Models\Order;
use Illuminate\Http\Request;

class AdminController extends Controller
{
 public function orders()
    {
        $orders = Order::with('order_items')->get();
        return view('admin', compact('orders'));
    }
}
