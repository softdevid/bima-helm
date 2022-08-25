<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Laporan;

class AdminController extends Controller
{
    public function index()
    {
        $date = Carbon::now()->isoFormat('D-M-Y');
        $day = date('d', strtotime($date));
        $month = date('m', strtotime($date));
        $year = date('Y', strtotime($date));

        $thisDay = Laporan::whereDay('created_at', $day)->sum('profit');
        $thisMonth = Laporan::whereMonth('created_at', [$month, $year])->sum('profit');
        $thisYear = Laporan::whereYear('created_at', $year)->sum('profit');
        $totalProduct = Product::count();
        return view('admin.pages.index', [
            'title' => "Dashboard",
            'totalProduct' => $totalProduct,
            'thisDay' => $thisDay,
            'thisMonth' => $thisMonth,
            'thisYear' => $thisYear,
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
