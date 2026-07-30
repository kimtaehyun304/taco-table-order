<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FoodController;

Route::get('/', function () {
    return view('welcome');
});

//컨틀롤러 안 거침
// Route::get('/foods', function () {
//     return view('foods');
// });

Route::get('/foods', [FoodController::class, 'foods']);