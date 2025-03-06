<?php

use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/Level', [LevelController::class, 'index']);
Route::get('/Kategori', [KategoriController::class, 'index']);
Route::get('/User', [UserController::class, 'index']);
