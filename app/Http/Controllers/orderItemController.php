<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order_Item;

class OrderItemController extends Controller
{
    public function index()
    {
        $orderItems = Order_Item::all();
        return response()->json($orderItems);
    }

    public function show($order_item_id)
    {
        $orderItem = Order_Item::find($order_item_id);
        if ($orderItem) {
            return response()->json($orderItem);
        } else {
            return response()->json(['message' => 'Order Item not found'], 404);
        }
    }

    public function store(Request $request)
    {
        $orderItem = new Order_Item;
        $orderItem->order_no = $request->input('order_no');
        $orderItem->item_no = $request->input('item_no');
        $orderItem->quantity = $request->input('quantity');
        // Set any other properties as needed
        $orderItem->save();

        return response()->json($orderItem, 201);
    }

    public function update(Request $request, $order_item_id)
    {
        $orderItem = Order_Item::find($order_item_id);
        if ($orderItem) {
            $orderItem->order_no = $request->input('order_no');
            $orderItem->item_no = $request->input('item_no');
            $orderItem->quantity = $request->input('quantity');
            // Update any other properties as needed
            $orderItem->save();

            return response()->json($orderItem);
        } else {
            return response()->json(['message' => 'Order Item not found'], 404);
        }
    }

    public function destroy($order_item_id)
    {
        $orderItem = Order_Item::find($order_item_id);
        if ($orderItem) {
            $orderItem->delete();
            return response()->json(['message' => 'Order Item deleted']);
        } else {
            return response()->json(['message' => 'Order Item not found'], 404);
        }
    }
}