<?php

use App\Http\Controllers\userController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');


// User Apies
Route::post('/register',[userController::class,'Register']);
Route::post('/login',[userController::class,'Login']);
Route::post('/logout',[userController::class,'LogOut']);
