<?php

namespace App\Http\Controllers;
use App\Events\OrderPlaced;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        // Assume we have an Order model
        $order = Order::create($request->all());

        // Fire the event
        event(new OrderPlaced($order));

        return response()->json(['message' => 'Order placed successfully!']);
    }
}
