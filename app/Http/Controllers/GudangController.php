<?php

namespace App\Http\Controllers;

use App\Models\Gudang;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Http\Request;

class GudangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pages.gudang.index', [
            'title' => "Gudang",
            'gudang' => Product::all(),
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
        $product = Product::findOrfail($request->id);
        $gudang = Gudang::findOrFail($request->gudang_id);
        $data = [
            'xs' => $request->gd_xs + $gudang->xs,
            's' => $request->gd_s + $gudang->s,
            'm' => $request->gd_m + $gudang->m,
            'lg' => $request->gd_lg + $gudang->lg,
            'xl' => $request->gd_xl + $gudang->xl,
            'xxl' => $request->gd_xxl + $gudang->xxl,
        ];
        Gudang::where('id', $request->gudang_id)
            ->update($data);
        $gudangs = Gudang::findOrFail($request->gudang_id);
        // dd($gudangs);
        $stock_gudang = $gudangs->xs + $gudangs->s + $gudangs->m + $gudangs->lg + $gudangs->xl + $gudangs->xxl;
        // dd($stock_gudang);
        // Product::where('gd_stock', $request->id)
        //     ->update($stock_gudang);

        $product->gd_stock = $stock_gudang;
        $product->save();

        return back();
        // return redirect()->to('admin-gudang')->with('success', 'Tambah ke Gudang Berhasi');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gudang  $gudang
     * @return \Illuminate\Http\Response
     */
    public function show(Gudang $gudang, $id)
    {
        $product = Product::findOrFail($id);
        $gudang = Gudang::findOrFail($product->gudang_id);
        $size = Size::findOrFail($product->size_id);
        return view('admin.pages.gudang.detail-gudang', [
            'title' => "Tambah Stok Toko",
            'product' => $product,
            'gudang' => $gudang,
            'size' => $size,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gudang  $gudang
     * @return \Illuminate\Http\Response
     */
    public function edit(Gudang $gudang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Gudang  $gudang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $gudangs = Gudang::findOrFail($product->gudang_id);
        $size = Size::findOrFail($product->size_id);
        // dd($product, $gudang, $size);
        $stockGudang = [
            'xs' => $gudangs->xs - $request->gd_xs,
            's' => $gudangs->s - $request->gd_s,
            'm' => $gudangs->m - $request->gd_m,
            'lg' => $gudangs->lg - $request->gd_lg,
            'xl' => $gudangs->xl - $request->gd_xl,
            'xxl' => $gudangs->xxl - $request->gd_xxl,
        ];
        // dd($stockGudang);
        Gudang::where('id', $product->gudang_id)
            ->update($stockGudang);
        // dd($gudang);
        // $gd_stock = $product->gd_stock - ($gudang->xs + $gudang->s + $gudang->m + $gudang->lg + $gudang->xl + $gudang->xxl);

        $size = [
            'xs' => $size->xs + $request->gd_xs,
            's' => $size->s + $request->gd_s,
            'm' => $size->m + $request->gd_m,
            'lg' => $size->lg + $request->gd_lg,
            'xl' => $size->xl + $request->gd_xl,
            'xxl' => $size->xxl + $request->gd_xxl,
        ];
        Size::where('id', $product->size_id)
            ->update($size);

        // $gudang = Gudang::findOrFail($product->gudang_id);

        $gd_stock = $product->gd_stock - ($request->gd_xs + $request->gd_s + $request->gd_m + $request->gd_lg + $request->gd_xl + $request->gd_xxl);
        $stock = $product->stock + ($request->gd_xs + $request->gd_s + $request->gd_m + $request->gd_lg + $request->gd_xl + $request->gd_xxl);
        // dd($gd_stock, $stock);
        $product = [
            'stock' => $stock,
            'gd_stock' => $gd_stock,
        ];

        Product::where('id', $id)
            ->update($product);

        // return redirect()->to('admin-gudang')->with('success', 'Stok toko berhasil diupdate');
        return back()->with('success', 'Stok toko berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gudang  $gudang
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gudang $gudang)
    {
        //
    }
}
