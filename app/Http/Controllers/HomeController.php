<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $helmImg = \File::allFiles(public_path('img/helm'));
        $helmNew = Product::
            without(['category'])->
            join('categories', 'products.category_id', '=', 'categories.id')->
            where('categories.name', 'like', '%helm%')->
            orderBy('products.created_at', 'desc')->
            limit(12)->
            select('products.name', 'products.price', 'products.url')->
            get();
        $spareNew = Product::
            without(['category'])->
            join('categories', 'products.category_id', '=', 'categories.id')->
            where('categories.name', 'like', '%aksesoris%')->
            orderBy('products.created_at', 'desc')->
            limit(12)->
            select('products.name', 'products.price', 'products.url')->
            get();
        $accNew = Product::
            without(['category'])->
            join('categories', 'products.category_id', '=', 'categories.id')->
            where('categories.name', 'like', '%spare%')->
            orderBy('products.created_at', 'desc')->
            limit(12)->
            select('products.name', 'products.price', 'products.url')->
            get();
        return view('pages.home', [
            "helms" => $helmImg,
            "helmNew" => $helmNew,
            "accNew" => $accNew,
            "spareNew" => $spareNew,
            "title" => "Home",
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
