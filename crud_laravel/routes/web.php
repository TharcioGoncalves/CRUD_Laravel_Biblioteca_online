<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\bookController;
use App\Http\Controllers\logController;

Route::get('/dashboard', [bookController::class, "index"])->middleware("auth");
Route::get('/', [bookController::class, "home"]);
Route::post("/events/create", [bookController::class, "store"]);
Route::delete("/events/{id}", [bookController::class, "destroy"]);
Route::get("/events/edit/{id}", [bookController::class, "edit"]);
Route::put("/events/update/{id}", [bookController::class, "update"]);
Route::get("/restore/{id}", [bookController::class, "restore"]);
Route::get("/events/delete/{id}", [bookController::class, "delete"]);