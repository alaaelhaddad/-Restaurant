<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $order = Order::create($request->all());

        return response()->json($order, 201);
    }

    public function show(Order $order)
    {
        return response()->json($order, 200);
    }

    public function update(Request $request, Order $order)
    {
        $order->update($request->all());

        return response()->json($order, 200);
    }

    public function destroy(Order $order)
    {
        $order->delete();

        return response()->json(null, 204);
    }

    public function categories()
{
    return $this->belongsToMany(Category::class, 'category_order');
}
}