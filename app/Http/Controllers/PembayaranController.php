<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Http\Requests\StorePembayaranRequest;
use App\Http\Requests\UpdatePembayaranRequest;

class PembayaranController extends Controller
{
    public function index($slug)
    {
        return view('pembayaran', [
            "bayar" => Pembayaran::where('slug', $slug)->first()
        ]);
    }
}
