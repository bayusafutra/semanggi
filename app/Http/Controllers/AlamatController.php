<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AlamatController extends Controller
{
    public function edit(){
        return view('alamat.ubahalamat', [
        ]);
    }

    public function provinsi(){
        $data = DB::table('provinces')
        ->where('name', 'LIKE', '%' . request('q') . '%')
        ->paginate(10);
        return response()->json($data);
    }

    public function regency($id){
        $data = DB::table('regencies')
        ->where('name', 'LIKE', '%' . request('q') . '%')
        ->paginate(10);
        return response()->json($data);
    }
}
