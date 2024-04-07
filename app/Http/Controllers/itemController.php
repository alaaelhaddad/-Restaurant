<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Http\Controllers\ItemController;


class ItemController extends Controller
{
    public function store(Request $request)
    {
        $item = Item::create($request->all());

        return response()->json($item, 201);
    }

    public function show(Item $item)
    {
        return response()->json($item, 200);
    }

    public function update(Request $request, Item $item)
    {
        $item->update($request->all());

        return response()->json($item, 200);
    }

    public function destroy(Item $item)
    {
        $item->delete();

        return response()->json(null, 204);
    }
}
