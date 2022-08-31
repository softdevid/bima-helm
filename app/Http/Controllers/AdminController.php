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

    public function chartWeeks($category_id) {
        return DB::table('daily_stocks')
        ->select(DB::raw('SUM(store+storehouse) as total_stok'))
        ->where('category_id', $category_id)
        ->groupBy(DB::raw('YEARWEEK(date, 1)'), 'category_id')
        ->orderBy(DB::raw('WEEK(date)'), 'asc')
        ->get()
        ->pluck('total_stok')
        ->map(fn($i) => "'$i'")
        ->implode(',');
    }

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

        $tgl_minggu = DB::table('daily_stocks')->select('date')->groupBy(DB::raw('YEARWEEK(date, 1)'))->orderBy(DB::raw('WEEK(date)'), 'asc')->get();

        return view('admin.pages.index', [
            'title' => "Dashboard",
            'totalProduct' => $totalProduct,
            'thisDay' => $thisDay,
            'thisMonth' => $thisMonth,
            'thisYear' => $thisYear,

            'tgl_mingguan' => $tgl_minggu->pluck('date')->map(fn($i) => "'$i'")->implode(','),
            'full_face' => $this->chartWeeks(1),
            'half_face' => $this->chartWeeks(2),
            'helm_anak' => $this->chartWeeks(6),
            'acc' => $this->chartWeeks(3),
            'sp_part' => $this->chartWeeks(4),
            'others' => $this->chartWeeks(5),
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
