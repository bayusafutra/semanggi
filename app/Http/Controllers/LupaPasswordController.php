<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LupaPasswordController extends Controller
{
    public function index(){
        return view('auth.indexLP', [
            "title" => "Lupa Password"
        ]);
    }

    public function resetpassword(){
        return view('auth.indexRP', [
            "title" => "Reset Password"
        ]);
    }
}
