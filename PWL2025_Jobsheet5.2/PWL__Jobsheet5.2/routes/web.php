<?php


use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;


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

// JS5.2
Route::get('/', [WelcomeController::class, 'index']);
Route::post('/User/list', [UserController::class, 'list'])->name('user.list');
Route::get('/User/create', [UserController::class, 'create'])->name('user.create');


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

