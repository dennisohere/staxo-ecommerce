<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function success(Order $order)
    {
        $order->markPaid();

        return view('pages.order-success', compact('order'));
    }
}
