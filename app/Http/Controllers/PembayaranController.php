<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use Illuminate\Http\Request;
use App\Http\Requests\StorePembayaranRequest;
use App\Http\Requests\UpdatePembayaranRequest;
use App\Models\Pesanan;

class PembayaranController extends Controller
{
    public function index($slug)
    {
        return view('pembayaran', [
            "bayar" => Pembayaran::where('slug', $slug)->first()
        ]);
    }

    public function unggah(Request $request){
        $bayar = Pembayaran::where('id', $request->pembayaran)->first();
        $validatedData = $request->validate([
            "gambar" => 'image|file|max:10240'
        ]);
        if($request->file('gambar')){
            $validatedData['gambar'] = $request->file('gambar')->store('buktipembayaran');
        }
        $validatedData["status"] = 2;
        $bayar->update($validatedData);

        $pesanan = Pesanan::where('id', $request->pesanan)->first();
        $update["status"] = 3;
        $update["paidTime"] = now();
        $pesanan->update($update);

        return redirect('/pesanansaya');
    }
}
