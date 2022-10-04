<?php

// use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;

// Route::group(["prefix"=> "v1"], function(){

Route::post("/login", [RegistrationController::class, "login"])->name("login");
Route::post("/signup", [RegistrationController::class, "signup"])->name("signup"); 
        
// });

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
