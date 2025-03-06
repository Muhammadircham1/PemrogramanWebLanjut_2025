<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;

class UserController extends Controller
{
    public function index()
    {
        $user = UserModel::where('username', 'manager9')->firstOrFail(); 
        // Mencari user dengan username 'manager9' atau gagal jika tidak ditemukan

        return view('user', ['data' => $user]);
    }
}
