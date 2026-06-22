<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\bookController;

Route::get('/', [bookController::class, "index"]);
Route::post("/events/create", [bookController::class, "store"]);
Route::delete("/events/{id}", [bookController::class, "destroy"]);