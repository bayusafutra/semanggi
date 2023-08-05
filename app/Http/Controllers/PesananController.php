<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\StorePesananRequest;
use App\Http\Requests\UpdatePesananRequest;
use App\Models\Alamat;
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
            "pesanan" => $pesanan,
            "produk" => $produk,
            "subtotal" => $subtotal
        ]);
    }

    public function store(Request $request)
    {
        $validatedData["user_id"] = auth()->user()->id;
        $validatedData["slug"] = Str::random(40);
        $validatedData["total"] = $request->price;
        $alamat = Alamat::where('user_id', auth()->user()->id)->where('status', 1)->first();
        if($alamat->count()){
            $validatedData["alamat_id"] = $alamat->id;
        }
        $pesanan = Pesanan::create($validatedData);

        $swap = strtoupper(Str::random(5));
        $hayo["nomer"] = "SS".$swap.$pesanan->created_at->format('YmdHi').$pesanan->id;
        $pesanan->update($hayo);

        $keranjang = Cart::where('user_id', auth()->user()->id)->get();
        foreach ($keranjang as $ker) {
            $rules["barang_id"] = $ker->barang->id;
            $rules["pesanan_id"] = $pesanan->id;
            $rules["qtyitem"] = $ker->quantity;
            DetailPesananan::create($rules);
        }
        return redirect("/detailpesanan/$pesanan->slug");
    }

    public function create(Request $request){
        $validatedData["user_id"] = auth()->user()->id;
        $validatedData["slug"] = Str::random(40);
        $validatedData["total"] = $request->hayo;
        $alamat = Alamat::where('user_id', auth()->user()->id)->where('status', 1)->first();
        if($alamat->count()){
            $validatedData["alamat_id"] = $alamat->id;
        }
        $pesanan = Pesanan::create($validatedData);

        $swap = strtoupper(Str::random(5));
        $hayo["nomer"] = "SS".$swap.$pesanan->created_at->format('YmdHi').$pesanan->id;
        $pesanan->update($hayo);

        $rules["barang_id"] = $request->barang;
        $rules["pesanan_id"] = $pesanan->id;
        $rules["qtyitem"] = $request->quantity;
        DetailPesananan::create($rules);

        return redirect("/detailpesanan/$pesanan->slug");
    }
}
