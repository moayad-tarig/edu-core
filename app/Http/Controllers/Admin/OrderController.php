<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Contracts\View\View;

class OrderController extends Controller
{
    public function index(): View
    {
        $orders = Order::with(['customer'])->paginate(25);

        return view('admin.order.index', compact('orders'));
    }

    public function show(Order $order): View
    {
        return view('admin.order.show', compact('order'));
    }
}
