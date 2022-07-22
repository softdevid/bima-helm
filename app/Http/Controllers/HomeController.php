<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $helmTopSell = Product::
            without(['category'])->
            join('categories', 'products.category_id', '=', 'categories.id')->
            join('images', 'products.image_id', '=', 'images.id')->
            where('categories.name', 'like', '%helm%')->
            orderBy('sold', 'desc')->
            limit(12)->
            select('products.name', 'products.price', 'images.img_dt_1 as image')->
            get();

        return view('pages.home', [
            "title" => "Home",
            'helmTopSell' => $helmTopSell,
            'accsTopSell' => '',
            'spTopSell' => ''
        ]);
    }

    public function faq()
    {
        return view('pages.faq', [
            "title" => "Frequently Asked Question"
        ]);
    }

    public function tentangKami()
    {
        return view('pages.tentang-kami', [
            "title" => "Tentang Kami"
        ]);
    }
    public function caraBelanja()
    {
        return view('pages.cara-belanja', [
            "title" => "Cara Belanja"
        ]);
    }
    public function contact()
    {
        return view('pages.contact', [
            "title" => "Kontak"
        ]);
    }
    public function register()
    {
        return view('pages.user.register', [
            "title" => "Registrasi"
        ]);
    }
    public function login()
    {
        return view('pages.user.login', [
            "title" => "Login"
        ]);
    }
}
