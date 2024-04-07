<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order_Delivery;

class OrderDeliveryController extends Controller
{
    public function index()
    {
        $orderDeliveries = Order_Delivery::all();
        return response()->json($orderDeliveries);
    }

    public function show($order_delivery_id)
    {
        $orderDelivery = Order_Delivery::find($order_delivery_id);
        if ($orderDelivery) {
            return response()->json($orderDelivery);
        } else {
            return response()->json(['message' => 'Order Delivery not found'], 404);
        }
    }

    public function store(Request $request)
    {
        $orderDelivery = new Order_Delivery;
        $orderDelivery->order_no = $request->input('order_no');
        $orderDelivery->employee_id = $request->input('employee_id');
        $orderDelivery->delivery_date = $request->input('delivery_date');
        $orderDelivery->delivery_time = $request->input('delivery_time');
        // Set any other properties as needed
        $orderDelivery->save();

        return response()->json($orderDelivery, 201);
    }

    public function update(Request $request, $order_delivery_id)
    {
        $orderDelivery = Order_Delivery::find($order_delivery_id);
        if ($orderDelivery) {
            $orderDelivery->order_no = $request->input('order_no');
            $orderDelivery->employee_id = $request->input('employee_id');
            $orderDelivery->delivery_date = $request->input('delivery_date');
            $orderDelivery->delivery_time = $request->input('delivery_time');
            // Update any other properties as needed
            $orderDelivery->save();

            return response()->json($orderDelivery);
        } else {
            return response()->json(['message' => 'Order Delivery not found'], 404);
        }
    }

    public function destroy($order_delivery_id)
    {
        $orderDelivery = Order_Delivery::find($order_delivery_id);
        if ($orderDelivery) {
            $orderDelivery->delete();
            return response()->json(['message' => 'Order Delivery deleted']);
        } else {
            return response()->json(['message' => 'Order Delivery not found'], 404);
        }
    }

}