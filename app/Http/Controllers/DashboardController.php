<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $audit = Pesanan::where('status', 3)->get();
        $dikemas = Pesanan::where('status', 4)->get();
        $kirim = Pesanan::where('status', 5)->get();
        $ambil = Pesanan::where('status', 6)->get();
        $batal = Pesanan::where('status', 8)->get();
        $selesai = Pesanan::where('status', 7)->get();
        return view('admin.index', [
            "title" => "Administrator",
            "audit" => $audit,
            "dikemas" => $dikemas,
            "kirim" => $kirim,
            "ambil" => $ambil,
            "batal" => $batal,
            "selesai" => $selesai
        ]);
    }

    public function audit(){
        $audit = Pesanan::where('status', 3)->get();
        return view('admin.pesanan.audit', [
            "all" => $audit,
            "audit" => Pesanan::where('status', 3)->paginate(10),
            "title" => "Dashboard | Audit Pembayaran"
        ]);
    }
}
