<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartNWishController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('pages.cart', [
            'title' => 'Keranjang',
        ]);
    }

    public function add(Request $request)
    {
        if ($request->ajax()) {

            \Cart::instance('cart')->add([
                'id' => $request->id,
                'name' => $request->name,
                'qty' => $request->qty,
                'price' => $request->price,
                'weight' => 0,
                'options' => [
                    'size' => $request->size,
                ],
            ]);

            return response()->json([
                'message' => 'Berhasil menambahkan produk',
                'count' => \Cart::instance('cart')->count(),
            ]);
        }
    }
}
