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
            "items" => Cart::all()
        ]);
    }

    public function coba(){
        return view('newcart', [
            "items" => Cart::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCartRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Cart::create([
            'nama' => $request->nama,
            'harga' => $request->harga,
            'quantity' => $request->quantity,
            'gambar' => $request->gambar,
        ]);
        session()->flash('success', 'Product is Added to Cart Successfully !');

        return redirect('/cart');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCartRequest  $request
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Cart::destroy($request->id);
        session()->flash('success', 'Item Cart Remove Successfully !');

        return redirect('/cart');
    }
}
