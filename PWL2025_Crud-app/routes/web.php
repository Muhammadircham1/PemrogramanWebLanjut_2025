<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/about', function () {
    return 'MuhammadIrcham,2341760115';
});

Route::resource('items', ItemController::class);

Route::get('/hello', function () {
    return 'Hello World';
});

Route::resource('items', ItemController::class);

Route::get('/hai', function () {
    return 'Selamat Datang';
});

Route::resource('items', ItemController::class);

Route::get('/user/{name}', function ($name) {
    return 'Nama saya'.$name;
});


Route::get('/posts/{post}/comments/{comment}', function ($postId, $commentId) {
    return 'Pos ke-' . $postId . ' Komentar ke-' . $commentId;
});

Route::get('/articles/{id}', function ($id) {
    return "Halaman Artikel dengan ID $id";
});



