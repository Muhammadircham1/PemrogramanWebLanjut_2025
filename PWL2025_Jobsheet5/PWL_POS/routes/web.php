<?php

use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/Kategori', [KategoriController::class, 'index']);
Route::get('/Kategori/create', [KategoriController::class, 'create']);
Route::post('/Kategori', [KategoriController::class, 'store']);
Route::get('/Kategori/{id}/edit', [KategoriController::class, 'edit']);
Route::put('/Kategori/{id}', [KategoriController::class, 'update']);

Route::get('/', [HomeController::class, 'home']) -> name('home');

Route::prefix('category')->group(function(){
    Route::get('/food-beverage', [ProductController::class, 'foodBeverage']);
    Route::get('/beauty-health', [ProductController::class, 'beautyHealth']);
    Route::get('/home-care', [ProductController::class, 'homeCare']);
    Route::get('/baby-kid', [ProductController::class, 'babyKid']);
});

Route::get('/', function () {
    return view('welcome');

    
});


Route::get('/Level', [LevelController::class, 'index']);
Route::get('/Kategori', [KategoriController::class, 'index']);
Route::get('/User', [UserController::class, 'index']);
Route::get('/User/tambah', [UserController::class, 'tambah']);
Route::post('/User/tambah_simpan', [UserController::class, 'tambah_simpan']); 
Route::get('/User/Ubah/{id}', [UserController::class, 'ubah']);
Route::put('/User/Ubah_simpan/{id}', [UserController::class, 'ubah_simpan']);
Route::get('/User/Hapus/{id}', [UserController::class, "hapus"]);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
