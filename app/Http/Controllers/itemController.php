<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::all();
        return response()->json($items);
    }

    public function show($item_no)
    {
        $item = Item::where('item_no', $item_no)->first();
        if ($item) {
            return response()->json($item);
        } else {
            return response()->json(['message' => 'Item not found'], 404);
        }
    }

    public function store(Request $request)
    {
        $item = new Item;
        $item->category_no = $request->input('category_no');
        $item->item_name = $request->input('item_name');
        $item->item_description = $request->input('item_description');
        $item->item_price = $request->input('item_price');
        $item->item_image = $request->input('item_image');
        $item->item_state = $request->input('item_state');
        $item->save();

        return response()->json($item, 201);
    }

    public function update(Request $request, $item_no)
    {
        $item = Item::where('item_no', $item_no)->first();
        if ($item) {
            $item->category_no = $request->input('category_no');
            $item->item_name = $request->input('item_name');
            $item->item_description = $request->input('item_description');
            $item->item_price = $request->input('item_price');
            $item->item_image = $request->input('item_image');
            $item->item_state = $request->input('item_state');
            $item->save();

            return response()->json($item);
        } else {
            return response()->json(['message' => 'Item not found'], 404);
        }
    }

    public function destroy($item_no)
    {
        $item = Item::where('item_no', $item_no)->first();
        if ($item) {
            $item->delete();
            return response()->json(['message' => 'Item deleted']);
        } else {
            return response()->json(['message' => 'Item not found'], 404);
        }
    }
}