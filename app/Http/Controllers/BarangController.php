<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Requests\StoreBarangRequest;
use App\Http\Requests\UpdateBarangRequest;

class BarangController extends Controller
{
    public function index(){
        return view('admin.produk.index', [
            "title" => "Dashboard | Produk",
            "produk" => Barang::paginate(10)
        ]);
    }

    public function indexcreate(){
        return view('admin.produk.createproduk', [
            "title" => "Dashboard | Tambah Produk",
            "kategori" => Kategori::where('status', 1)->get()
        ]);
    }

    public function store (Request $request){
        $validatedData = $request->validate([
            "nama" => 'required|max:255',
            "kategori_id" => 'required',
            "deskripsi" => 'max:5000',
            "gambar" => 'image|file|max:10240',
            "minim" => 'required',
            "quantity" => 'required',
            "stok" => 'min:1',

        ]);
        $rupiah1 = str_replace('.', '', $request->harga);
        $rupiah2 = str_replace('Rp', '', $rupiah1);
        $rupiah3 = str_replace(',00', '', $rupiah2);
        $validatedData['harga'] = $rupiah3;

        if($request->file('gambar')){
            $validatedData['gambar'] = $request->file('gambar')->store('produk');
        }
        $validatedData['slug'] = Str::random(30);
        $validatedData['user_id'] = auth()->user()->id;
        Barang::create($validatedData);
        $produk = Barang::where('slug', $validatedData['slug'])->first();
        return back()->with('success', "Produk: $produk->nama berhasil ditambahkan");
    }

    public function show($slug)
    {
        return view('detailproduk', [
            "produk" => Barang::where('slug', $slug)->get()
        ]);
    }
}
