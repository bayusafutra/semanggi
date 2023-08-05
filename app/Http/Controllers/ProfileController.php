<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile.index');
    }

    public function edit()
    {
        return view('profile.editprofile');
    }

    public function update(Request $request)
    {
        $user = User::where('id', $request->id)->first();
        // dd($request->all());
        $validatedData = $request->validate([
            "name" => 'required|max:255',
            "notelp" => 'required|numeric',
            "gender" => 'required',
            "tgllahir" => 'required',
            "alamat" => 'required',
            "gambar" => 'image|file|max:10240'
        ]);

        if ($request->file('gambar')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['gambar'] = $request->file('gambar')->store('profil');
        }

        if ($request->username != auth()->user()->username) {
            $validatedData = $request->validate([
                "username" => 'unique:users'
            ]);
        }
        $user->update($validatedData);
        return back()->with('success', "Data diri pengguna berhasil diupdate");
    }
}
