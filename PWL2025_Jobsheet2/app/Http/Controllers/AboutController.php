<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function __invoke()
    {
        return "Nama: [Isi Nama Anda] <br> NIM: [Isi NIM Anda]";
    }
}
