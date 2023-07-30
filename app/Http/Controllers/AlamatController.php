<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AlamatController extends Controller
{
    public function edit(){
        $provinsi = DB::table('provinces')->get();
        return view('alamat.ubahalamat', [
            "provinsi" => $provinsi
        ]);
    }
}
