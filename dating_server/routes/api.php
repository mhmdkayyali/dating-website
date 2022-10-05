<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\HomeController;



Route::post("/login", [RegistrationController::class, "login"])->name("login");
Route::post("/signup", [RegistrationController::class, "signup"])->name("signup");
Route::post("/feed", [HomeController::class, "feed"])->name("feed"); 
Route::post("/favorite", [HomeController::class, "addFavorites"])->name("add-favorite");
Route::post("/block", [HomeController::class, "block"])->name("block");
Route::post("/view", [HomeController::class, "view"])->name("view");
Route::post("/edit", [HomeController::class, "edit"])->name("edit");
