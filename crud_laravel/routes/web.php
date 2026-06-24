<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\bookController;
use App\Http\Controllers\logController;

Route::get("/login", [logController::class, "index"])->name("login");
Route::get("/cadastro", [logController::class, "telaCadastro"]);
Route::post("/cadastrar", [logController::class, "cadastrar"]);
Route::post("/logar", [logController::class, "login"]);
Route::get("/logout", [logController::class, "logout"]);

Route::get('/dashboard', [bookController::class, "index"])->middleware("auth");
Route::get('/', [bookController::class, "home"]);
Route::post("/events/create", [bookController::class, "store"]);
Route::delete("/events/{id}", [bookController::class, "destroy"]);
Route::get("/events/edit/{id}", [bookController::class, "edit"]);
Route::put("/events/update/{id}", [bookController::class, "update"]);