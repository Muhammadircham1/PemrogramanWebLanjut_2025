<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;

class UserController extends Controller
{
    public function index()
    {
        $jumlahPengguna = UserModel::where('level_id', 2)->count(); 
        // Menghitung jumlah user dengan level_id = 2

        return view('user', ['jumlahPengguna' => $jumlahPengguna]);
        // Mengirim jumlah pengguna ke halaman view
    }
}
