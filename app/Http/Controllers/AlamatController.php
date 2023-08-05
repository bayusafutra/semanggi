<?php

namespace App\Http\Controllers;

use App\Models\Alamat;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\DetailPesananan;
use App\Models\Pesanan;

class AlamatController extends Controller
{
    public function index($slug){
        $pesanan = Pesanan::where('slug', $slug)->first();
        $produk = DetailPesananan::where('pesanan_id', $pesanan->id)->get();
        $subtotal = $pesanan->total;
        return view('alamat.index', [
            "pesanan" => $pesanan,
            "produk" => $produk,
            "subtotal" => $subtotal,
            "alamat" => Alamat::where('user_id', auth()->user()->id)->get()
        ]);
    }
    public function edit(){
        return view('alamat.tambahalamat', [

        ]);
    }

    public function provinsi(){
        $data = DB::table('ec_provinces')
        ->where('name', 'LIKE', '%' . request('q') . '%')
        ->paginate(35);
        return response()->json($data);
    }

    public function regency($id){
        $data = DB::table('ec_cities')
            ->where('province_id', $id)
            ->where('name', 'LIKE', '%' . request('q') . '%')
            ->paginate(200);
        return response()->json($data);
    }

    public function district($id){
        $data = DB::table('ec_districts')
            ->where('regency_id', $id)
            ->where('name', 'LIKE', '%' . request('q') . '%')
            ->paginate(200);
        return response()->json($data);
    }

    public function village($id){
        $data = DB::table('ec_subdistricts')
            ->where('district_id', $id)
            ->where('name', 'LIKE', '%' . request('q') . '%')
            ->paginate(200);
        return response()->json($data);
    }

    public function kodepos($id){
        $data = DB::table('ec_postalcode')
            ->where('subdis_id', $id)
            ->where('name', 'LIKE', '%' . request('q') . '%')
            ->paginate(100);
        return response()->json($data);
    }

    public function store(Request $request){
        $alamat = Alamat::where('user_id', auth()->user()->id)->get();
        $validatedData = $request->validate([
            "nama" => 'required|max:255',
            "notelp" => 'required',
            "alamat" => 'required'
        ]);
        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['detail'] =  $request->detail;
        if($alamat->count() == 0){
            $validatedData['status'] = 1;
        }
        $validatedData['slug'] = Str::random(40);
        $provinsi = DB::table('ec_provinces')->where('id', $request->provinsi)->first();
        $kota = DB::table('ec_cities')->where('id', $request->kota)->first();
        $kecamatan = DB::table('ec_districts')->where('id', $request->kecamatan)->first();
        $kelurahan = DB::table('ec_subdistricts')->where('id', $request->kelurahan)->first();
        $kodepos = DB::table('ec_postalcode')->where('id', $request->kodepos)->first();

        $validatedData['provinsi'] = $provinsi->name;
        $validatedData['kota'] = $kota->name;
        $validatedData['kecamatan'] = $kecamatan->name;
        $validatedData['kelurahan'] = $kelurahan->name;
        $validatedData['kodepos'] = $kodepos->name;

        Alamat::create($validatedData);
        return back()->with('success', "Alamat pengiriman berhasil ditambahkan");
    }
}
