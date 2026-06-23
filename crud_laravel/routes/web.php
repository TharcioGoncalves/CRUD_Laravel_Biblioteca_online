<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\bookController;

Route::get('/dashboard', [bookController::class, "index"]);
Route::get('/', [bookController::class, "home"]);
Route::post("/events/create", [bookController::class, "store"]);
Route::delete("/events/{id}", [bookController::class, "destroy"]);
Route::get("/events/edit/{id}", [bookController::class, "edit"]);
Route::put("/events/update/{id}", [bookController::class, "update"]);