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
use App\Models\Payment;
use App\Models\Pembayaran;

class PesananController extends Controller
{
    public function index($slug)
    {
        $pesanan = Pesanan::where('slug', $slug)->first();
        $produk = DetailPesananan::where('pesanan_id', $pesanan->id)->get();
        $subtotal = $pesanan->total;
        $payment = Payment::where('status', 1)->get();
        return view('checkout', [
            "pesanan" => $pesanan,
            "produk" => $produk,
            "subtotal" => $subtotal,
            "payment" => $payment
        ]);
    }

    public function store(Request $request)
    {
        $validatedData["user_id"] = auth()->user()->id;
        $validatedData["slug"] = Str::random(40);
        $validatedData["total"] = $request->price;
        $alamat = Alamat::where('user_id', auth()->user()->id)->where('status', 1)->first();
        if($alamat){
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

    public function create(Request $request)
    {
        $validatedData["user_id"] = auth()->user()->id;
        $validatedData["slug"] = Str::random(40);
        $validatedData["total"] = $request->hayo;
        $alamat = Alamat::where('user_id', auth()->user()->id)->where('status', 1)->first();
        if($alamat){
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

    public function checkout(Request $request){
        $pesanan = Pesanan::where('id', $request->pesanan)->first();
        if($request->pembayaran == 1){
            $validatedData["alamat_id"] = null;
            $validatedData["subtotal"] = $pesanan->total;
        }else{
            $validatedData["subtotal"] = $pesanan->total+7000;
        }

        if($request->catatan){
            $validatedData["catatan"] = $request->catatan;
        }
        $validatedData["deadlinePaid"] = now()->addDays(1);
        $validatedData["status"] = 2;
        $validatedData["payment_id"] = $request->payment;

        $pesanan->update($validatedData);

        $create["pesanan_id"] = $pesanan->id;
        $create["user_id"] = auth()->user()->id;
        $create["slug"] = Str::random(40);

        $swap = strtoupper(Str::random(5));
        $create["nomer"] = "SSPAY".$swap.$pesanan->deadlinePaid->format('YmdHi').$pesanan->id;

        $bayar = Pembayaran::create($create);
        return redirect("/pembayaran/$bayar->slug");
    }
}
