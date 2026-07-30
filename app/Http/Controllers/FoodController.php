<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\Category;

class FoodController extends Controller
{
    public function foods(){
        $foods = Food::all();
        $categories = Category::all();
        return view("foods", ['foods' => $foods, 'categories' => $categories]);
    }
}
