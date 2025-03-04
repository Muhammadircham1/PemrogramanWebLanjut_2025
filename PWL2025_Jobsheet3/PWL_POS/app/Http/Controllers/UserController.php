<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        
        $data = [
            'nama' => 'Pelanggan Pertama',
        ];

        UserModel::where('username', 'customer-1')->update($data); // update data user

        
        $user = UserModel::all(); 
        return view('user', ['data' => $user]);
    }
}
