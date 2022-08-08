<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('pages.home', [
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
