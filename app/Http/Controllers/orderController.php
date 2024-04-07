<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        return response()->json($orders);
    }

    public function show($order_no)
    {
        $order = Order::where('order_no', $order_no)->first();
        if ($order) {
            return response()->json($order);
        } else {
            return response()->json(['message' => 'Order not found'], 404);
        }
    }

    public function store(Request $request)
    {
        $order = new Order;
        $order->order_date = $request->input('order_date');
        $order->order_time = $request->input('order_time');
        $order->customer_name = $request->input('customer_name');
        $order->customer_phone = $request->input('customer_phone');
        $order->customer_address = $request->input('customer_address');
        $order->payment_type = $request->input('payment_type');
        $order->paid = $request->input('paid');
        $order->order_state = $request->input('order_state');
        $order->note = $request->input('note');
        $order->save();

        return response()->json($order, 201);
    }

    public function update(Request $request, $order_no)
    {
        $order = Order::where('order_no', $order_no)->first();
        if ($order) {
            $order->order_date = $request->input('order_date');
            $order->order_time = $request->input('order_time');
            $order->customer_name = $request->input('customer_name');
            $order->customer_phone = $request->input('customer_phone');
            $order->customer_address = $request->input('customer_address');
            $order->payment_type = $request->input('payment_type');
            $order->paid = $request->input('paid');
            $order->order_state = $request->input('order_state');
            $order->note = $request->input('note');
            $order->save();

            return response()->json($order);
        } else {
            return response()->json(['message' => 'Order not found'], 404);
        }
    }

    public function destroy($order_no)
    {
        $order = Order::where('order_no', $order_no)->first();
        if ($order) {
            $order->delete();
            return response()->json(['message' => 'Order deleted']);
        } else {
            return response()->json(['message' => 'Order not found'], 404);
        }
    }
}