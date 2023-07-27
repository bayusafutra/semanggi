<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Http\Requests\StoreCartRequest;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateCartRequest;

class CartController extends Controller
{
    public function index()
    {
        $items = Cart::where('user_id', auth()->user()->id)->get();
        $totalHarga = $items->sum('total');
        $subitem = $items->sum('quantity');
        return view('keranjang', [
            "items" => $items,
            "totalkeranjang" => $totalHarga,
            "subitem" => $subitem
        ]);
    }
    public function store(Request $request)
    {
        $validatedData["user_id"] = auth()->user()->id;
        $validatedData["barang_id"] = $request->barang;
        $validatedData["total"] = $request->total;
        $validatedData["quantity"] = $request->quantity;
        Cart::create($validatedData);
        return redirect('/cart');
    }

    public function destroy(Request $request)
    {
        Cart::destroy($request->id);
        session()->flash('success', 'Item keranjang berhasil dihapus');

        return redirect('/cart');
    }

    public function updateCart(Request $request)
    {
        $item = Cart::findOrFail($request->input('item_id'));
        $quantity = $request->input('quantity');
        $price = $request->input('price');
        // Pastikan bahwa $quantity berada di antara minimum dan stok produk
        $quantity = max($item->barang->minim, min($quantity, $item->barang->stok));

        // Update kolom quantity dan total
        $item->update([
            'quantity' => $quantity,
            'total' => $price
        ]);

        return response()->json(['success' => true]);
    }

    public function nyoba(Request $request){
        dd($request->price);

    }
}
