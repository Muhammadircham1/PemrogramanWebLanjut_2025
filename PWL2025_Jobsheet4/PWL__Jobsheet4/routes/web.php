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
Route::get('/User/tambah', [UserController::class, 'tambah']);
Route::post('/User/tambah_simpan', [UserController::class, 'tambah_simpan']); 
Route::get('/User/ubah/{id}', [UserController::class, 'ubah']);
Route::put('/User/ubah_simpan/{id}', [UserController::class, 'ubah_simpan']);
Route::get('/User/hapus/{id}', [UserController::class, "hapus"]);
