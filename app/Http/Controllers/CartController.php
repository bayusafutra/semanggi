<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Http\Requests\StoreCartRequest;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateCartRequest;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        return view('keranjang', [
            "items" => Cart::where('user_id', auth()->user()->id)->get()
        ]);
    }
    public function store(Request $request)
    {
        $validatedData["user_id"] = auth()->user()->id;
        $validatedData["barang_id"] = $request->barang;
        Cart::create($validatedData);
        return redirect('/cart');
    }
    public function update(Request $request)
    {
        $id=request('id');
        $rules = [
            "quantity"=>"required"
        ];

        $validatedData = $request->validate($rules);
        Cart::where('id', $id)->update($validatedData);

        return redirect('/cart');
    }

    public function destroy(Request $request)
    {
        Cart::destroy($request->id);
        session()->flash('success', 'Item keranjang berhasil dihapus');

        return redirect('/cart');
    }
}
