<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Laporan;
use App\Models\SizeName;
use App\Models\Size;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class KasirController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        $size = Size::all();
        $size_name = SizeName::all();
        return view('kasir.pages.index', [
            "title" => "Kasir",
            "products" => $products,
            "size" => $size,
            "size_name" => $size_name,
        ]);
    }

    public function dashboard()
    {
        $date = Carbon::now()->isoFormat('D-M-Y');
        $day = date('d', strtotime($date));
        $month = date('m', strtotime($date));
        $year = date('Y', strtotime($date));

        $thisDay = Laporan::whereDay('created_at', $day)->sum('profit');
        $thisMonth = Laporan::whereMonth('created_at', [$month, $year])->sum('profit');
        $thisYear = Laporan::whereYear('created_at', $year)->sum('profit');

        // dd($thisDay, $thisMonth, $thisYear);
        return view('kasir.pages.dashboard', [
            'title' => 'Dashboard',
            'totalProduct' => Product::count(),
            'thisDay' => $thisDay,
            'thisMonth' => $thisMonth,
            'thisYear' => $thisYear,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $products = Product::find($id);
        // dd($products);
        return view('kasir.pages.kasir-input.detail-product', [
            'title' => "$products->name",
            'products' => $products,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $products = Product::find($id);
        $size = Size::all();
        $size_name = SizeName::all();
        return view('kasir.pages.kasir-input.create', [
            'title' => "Tambahkan laporan $products->name",
            'products' => $products,
            'size' => $size,
            'size_name' => $size_name,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Validator::make($request->all(), [
            'qty' => 'required',
        ])->validate();

        $product = Product::find($id);
        $size = Size::where('id', $product->size_id)->get();
        $qty = $request->qty;
        $stock = $product->stock;

        if ($request->slug != $product->slug) {
            $rules['slug'] = 'required|unique:products';
        }

        $size->update([
            'xs' => $product->xs - $request->xs ?? 0,
            's' => $product->s - $request->s ?? 0,
            'm' => $product->m - $request->m ?? 0,
            'lg' => $product->lg - $request->lg ?? 0,
            'xl' => $product->xl - $request->xl ?? 0,
            'xxl' => $product->xxl - $request->xxl ?? 0,
        ]);

        $product->update([
            'stock' => $stock - $qty,
        ]);
        return back()->with('success', 'Laporan Penjualan ditambahkan!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
