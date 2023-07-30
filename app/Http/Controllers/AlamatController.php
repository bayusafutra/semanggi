<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AlamatController extends Controller
{
    public function edit(){
        return view('alamat.ubahalamat', [
            ""
        ]);
    }
}
