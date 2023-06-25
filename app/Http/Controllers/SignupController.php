<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SignupController extends Controller
{
    public function index()
    {
        return view('signup.index', [
            "title" => "Daftar"
        ]);
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            "name" => 'required|max:255',
            "username" => 'required|min:5|max:255|unique:users',
            "email" => 'required|email|unique:users',
            "role_id" => 'required',
            "password" => 'required|min:5|max:25'

        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);
        $validatedData['email_verified_at'] = date("Y-m-d H:i:s");

        User::create($validatedData);
        return redirect('/login')->with('success', "Registration Successfull Please Login!");
    }

    public function verifikasi(){
        return view('auth.verifikasi', [
            "title" => "Verifikasi Email"
        ]);
    }

    public function validasi(){
        return view('auth.validasi', [
            "title" => "Validasi Akun"
        ]);
    }
}
