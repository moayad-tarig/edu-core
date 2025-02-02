<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\OrderItem;
use Illuminate\Contracts\View\View;

class OrderController extends Controller
{
    //

    public function index(): View
    {
        $orderItems = OrderItem::whereHas('course', function ($query) {
            $query->where('instructor_id', user()->id);
        })->paginate(25);

        return view('frontend.instructor-dashboard.order.index', compact('orderItems'));
    }
}
