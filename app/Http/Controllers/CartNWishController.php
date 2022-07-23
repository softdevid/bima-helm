<?php

namespace App\Http\Controllers;

use App\Models\CartNWish;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartNWishController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function($request, $next) {
            \Cart::instance('cart')->restore(Auth::id());
            return $next($request);
        });
    }

    public function indexCart()
    {
        return view('pages.cart', [
            'title' => 'Keranjang',
            'cart' => \Cart::instance('cart')->content(),
        ]);
    }

    public function cartAdd(Request $request)
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
                    'img' => $request->img,
                ]
            ]);
            CartNWish::deleteRecord(Auth::id(), 'cart');
            \Cart::instance('cart')->store(Auth::id());

            return response()->json([
                'message' => 'Berhasil menambahkan produk',
                'count' => \Cart::instance('cart')->count(),
            ]);
        }
    }

    public function cartRemove(Request $request)
    {
        if ($request->ajax()) {

            \Cart::instance('cart')->remove($request->rowId);
            CartNWish::deleteRecord(Auth::id(), 'cart');
            \Cart::instance('cart')->store(Auth::id());

            return response()->json([
                'message' => 'Berhasil menghapus produk',
                'count' => \Cart::instance('cart')->count(),
            ]);
        }
    }

    public function cartRemoveAll()
    {
        \Cart::instance('cart')->destroy();
        return redirect('/cart');
    }

    public function __destruct()
    {
        \Cart::instance('cart')->store(Auth::id());
    }
}
