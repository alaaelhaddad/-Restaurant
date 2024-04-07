<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrderItem;

class OrderItemController extends Controller
{
    public function store(Request $request)
    {
        $orderItem = OrderItem::create($request->all());

        return response()->json($orderItem, 201);
    }

    public function show(OrderItem $orderItem)
    {
        return response()->json($orderItem, 200);
    }

    public function update(Request $request, OrderItem $orderItem)
    {
        $orderItem->update($request->all());

        return response()->json($orderItem, 200);
    }

    public function destroy(OrderItem $orderItem)
    {
        $orderItem->delete();

        return response()->json(null, 204);
    }
}
