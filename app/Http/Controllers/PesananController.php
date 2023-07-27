<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\StorePesananRequest;
use App\Http\Requests\UpdatePesananRequest;
use App\Models\Cart;
use App\Models\DetailPesananan;

class PesananController extends Controller
{
    public function index($slug)
    {
        $pesanan = Pesanan::where('slug', $slug)->first();
        $produk = DetailPesananan::where('pesanan_id', $pesanan->id)->get();
        $subtotal = $pesanan->total;
        return view('checkout', [
            "produk" => $produk,
            "subtotal" => $subtotal
        ]);
    }

    public function store(Request $request)
    {
        $validatedData["user_id"] = auth()->user()->id;
        $validatedData["slug"] = Str::random(40);
        $validatedData["total"] = $request->price;
        $pesanan = Pesanan::create($validatedData);

        $keranjang = Cart::where('user_id', auth()->user()->id)->get();
        foreach ($keranjang as $ker) {
            $rules["barang_id"] = $ker->barang->id;
            $rules["pesanan_id"] = $pesanan->id;
            $rules["qtyitem"] = $ker->quantity;
            DetailPesananan::create($rules);
        }
        return redirect("/detailpesanan/$pesanan->slug");
    }
}
