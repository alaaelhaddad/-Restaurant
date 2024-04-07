<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return response()->json($categories);
    }

    public function show($category_no)
    {
        $category = Category::where('category_no', $category_no)->first();
        if ($category) {
            return response()->json($category);
        } else {
            return response()->json(['message' => 'Category not found'], 404);
        }
    }

    public function store(Request $request)
    {
        $category = new Category;
        $category->category_name = $request->input('category_name');
        $category->category_image = $request->input('category_image');
        $category->save();

        return response()->json($category, 201);
    }

    public function update(Request $request, $category_no)
    {
        $category = Category::where('category_no', $category_no)->first();
        if ($category) {
            $category->category_name = $request->input('category_name');
            $category->category_image = $request->input('category_image');
            $category->save();

            return response()->json($category);
        } else {
            return response()->json(['message' => 'Category not found'], 404);
        }
    }

    public function destroy($category_no)
    {
        $category = Category::where('category_no', $category_no)->first();
        if ($category) {
            $category->delete();
            return response()->json(['message' => 'Category deleted']);
        } else {
            return response()->json(['message' => 'Category not found'], 404);
        }
    }
}