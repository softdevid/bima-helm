<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        $totalProduct = Product::count();
        return view('admin.pages.index', [
            'title' => "Dashboard",
            'totalProduct' => $totalProduct,
        ]);
    }

    public function product()
    {
        $title = 'Produk';
        return view('admin.pages.product', [
            "title" => $title,
            "products" => Product::filter(request(['search', 'category']))->paginate(9)->withQueryString(),
        ]);
    }

    // public function users()
    // {
    //     $title = 'Users';
    //     return view('admin.pages.users', [
    //         "title" => $title,
    //         "users" => User::where('level', 'user')->get(),
    //         "admin" => User::where('level', 'admin')->get(),
    //     ]);
    // }

    // public function orders()
    // {
    //     $title = 'Orders';
    //     return view('admin.pages.orders', [
    //         "title" => $title,
    //     ]);
    // }
}
