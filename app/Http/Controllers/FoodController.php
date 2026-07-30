<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Food;
use Illuminate\Http\Request;

class FoodController extends Controller
{
 public function foods(Request $request)
    {
        $categoryId = $request->query('category_id', 1);
        $foods = Food::where('category_id', $categoryId)->get();
   
        $categories = Category::all();
        $selectedCategory = Category::where('category_id', $categoryId)->first();

        return view("foods", [
            'foods' => $foods,
            'categories' => $categories,
            'selectedCategory' => $selectedCategory
        ]);
    }
}
