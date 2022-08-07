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
            join('images', 'products.id', '=', 'images.product_id')->
            where('categories.name', 'like', '%helm%')->
            orderBy('sold', 'desc')->
            limit(12)->
            select('products.name', 'products.price', 'products.url')->
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
    // public function caraBelanja()
    // {
    //     return view('pages.cara-belanja', [
    //         "title" => "Cara Belanja"
    //     ]);
    // }
    public function gallery()
    {

        $galleryImg = \File::allFiles(public_path('galleries'));

        return view('pages.gallery', [
            "title" => "Galeri",
            "images" => $galleryImg,
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
