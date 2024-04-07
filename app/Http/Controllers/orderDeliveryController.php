<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrderDelivery;

class OrderDeliveryController extends Controller
{
    public function store(Request $request)
    {
        $orderDelivery = OrderDelivery::create($request->all());

        return response()->json($orderDelivery, 201);
    }

    public function show(OrderDelivery $orderDelivery)
    {
        return response()->json($orderDelivery, 200);
    }

    public function update(Request $request, OrderDelivery $orderDelivery)
    {
        $orderDelivery->update($request->all());

        return response()->json($orderDelivery, 200);
    }

    public function destroy(OrderDelivery $orderDelivery)
    {
        $orderDelivery->delete();

        return response()->json(null, 204);
    }
}