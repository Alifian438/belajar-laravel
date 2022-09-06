<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register()
    {
        return view('halaman.register');
    }
    public function welcome(Request $request)
    {
        // lebih ringkas
        $fullName = $request['first_name'] . " " . $request['last_name'];
        return view('halaman.welcome', ['fullName' => $fullName]);
        /*cara manual
            $namaDepan = $request['first_name'];
            $namaBelakang = $request['last_name'];
          return view('welcome', ['namaDepan' => $namaDepan, 'namaBelakang' => $namaBelakang]); */
    }
}
