<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\StokController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;



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

Route::get('/level', [LevelController::class, 'index']);
Route::get('/Kategori', [KategoriController::class, 'index']);
Route::get('/user', [UserController::class, 'index']);
Route::get('/user/tambah', [UserController::class, 'tambah']);
Route::post('/user/tambah_simpan', [UserController::class, 'tambah_simpan']); 
Route::get('/user/Ubah/{id}', [UserController::class, 'ubah']);
Route::put('/user/Ubah_simpan/{id}', [UserController::class, 'ubah_simpan']);
Route::get('/user/Hapus/{id}', [UserController::class, "hapus"]);

// JS5.2
Route::get('/', [WelcomeController::class, 'index']);
Route::post('/user/list', [UserController::class, 'list'])->name('user.list');
Route::get('/user/create', [UserController::class, 'create'])->name('user.create');


Route::group(['prefix' => 'user'], function () {
    Route::get('/', [UserController::class, 'index']);        // menampilkan halaman awal user
    Route::post('/list', [UserController::class, 'list']);    // menampilkan data user dalam bentuk json untuk datatables
    Route::get('/create', [UserController::class, 'create']); // menampilkan halaman form tambah user
    Route::post('/', [UserController::class, 'store']);       // menyimpan data user baru
    Route::get('/{id}', [UserController::class, 'show']);     // menampilkan detail user
    Route::get('/{id}/edit', [UserController::class, 'edit']);// menampilkan halaman form edit user
    Route::put('/{id}', [UserController::class, 'update']);   // menyimpan perubahan data user
    Route::delete('/{id}', [UserController::class, 'destroy']);// menghapus data user
});

Route::group(['prefix' => 'level'], function () {
    Route::get('/', [LevelController::class, 'index']);       
    Route::post('/list', [LevelController::class, 'list']);    
    Route::get('/create', [LevelController::class, 'create']); 
    Route::post('/', [LevelController::class, 'store']);   
    Route::get('/{id}', [LevelController::class, 'show']);     
    Route::get('/{id}/edit', [LevelController::class, 'edit']);
    Route::put('/{id}', [LevelController::class, 'update']);   
    Route::delete('/{id}', [LevelController::class, 'destroy']);
});

Route::group(['prefix' => 'kategori'], function () {
    Route::get('/', [KategoriController::class, 'index']);       
    Route::post('/list', [KategoriController::class, 'list']);    
    Route::get('/create', [KategoriController::class, 'create']); 
    Route::post('/', [KategoriController::class, 'store']);   
    Route::get('/{id}', [KategoriController::class, 'show']);     
    Route::get('/{id}/edit', [KategoriController::class, 'edit']);
    Route::put('/{id}', [KategoriController::class, 'update']);   
    Route::delete('/{id}', [KategoriController::class, 'destroy']);
});

Route::group(['prefix' => 'stok'], function () {
    Route::get('/', [StokController::class, 'index']);       
    Route::post('/list', [StokController::class, 'list']);    
    
    Route::get('/create', [StokController::class, 'create']); 
    Route::post('/', [StokController::class, 'store']);   
    Route::get('/{id}', [StokController::class, 'show']);     
    Route::get('/{id}/edit', [StokController::class, 'edit']);
    Route::put('/{id}', [StokController::class, 'update']);   
    Route::delete('/{id}', [StokController::class, 'destroy']);
});

Route::group(['prefix' => 'barang'], function () {
    Route::get('/', [BarangController::class, 'index']);       
    Route::post('/list', [BarangController::class, 'list']);    
    Route::get('/create', [BarangController::class, 'create']); 
    Route::post('/', [BarangController::class, 'store']);   
    Route::get('/{id}', [BarangController::class, 'show']);     
    Route::get('/{id}/edit', [BarangController::class, 'edit']);
    Route::put('/{id}', [BarangController::class, 'update']);   
    Route::delete('/{id}', [BarangController::class, 'destroy']);
});