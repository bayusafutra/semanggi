<?php

namespace App\Http\Controllers;

use App\Models\Alamat;
use App\Models\Pesanan;
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

    public function hapuspp(Request $request)
    {
        $user = User::where('id', $request->id)->first();
        Storage::delete($request->oldImage);
        $validatedData['gambar'] = null;
        $user->update($validatedData);

        return back()->with('success', "Foto profil berhasil dihapus");
    }

    public function pesanan()
    {
        $belumco = Pesanan::where('user_id', auth()->user()->id)->where('status', 1)->get();
        $belumbayar = Pesanan::where('user_id', auth()->user()->id)->where('status', 2)->get();
        $verifikasi = Pesanan::where('user_id', auth()->user()->id)->where('status', 3)->get();
        $dikemas = Pesanan::where('user_id', auth()->user()->id)->where('status', 4)->get();
        $dikirim = Pesanan::where('user_id', auth()->user()->id)->where('status', 5)->get();
        $ambil = Pesanan::where('user_id', auth()->user()->id)->where('status', 6)->get();
        $selesai = Pesanan::where('user_id', auth()->user()->id)->where('status', 7)->get();
        $batal = Pesanan::where('user_id', auth()->user()->id)->where('status', 8)->get();
        return view('profile.pesanansaya', [
            "belumco" => $belumco,
            "belumbayar" => $belumbayar,
            "verifikasi" => $verifikasi,
            "dikemas" => $dikemas,
            "dikirim" => $dikirim,
            "ambil" => $ambil,
            "selesai" => $selesai,
            "batal" => $batal
        ]);
    }
}
