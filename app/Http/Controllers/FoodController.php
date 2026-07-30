<?php

namespace App\Http\Controllers;

use App\Models\Food;

class FoodController extends Controller
{
    public function foods(){
        $foods = Food::all();
        return view("foods", ['foods' => $foods]);
    }
}
