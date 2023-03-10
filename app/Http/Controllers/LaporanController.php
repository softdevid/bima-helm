<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Size;
use App\Models\SizeName;
use App\Models\Merk;
use App\Models\Laporan;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $laporans = Laporan::all();
        return view('kasir.pages.laporan', [
            'title' => "Laporan Penjualan",
            'laporans' => $laporans,
            'merks' => Merk::all(),
            'size_names' => SizeName::all(),
            'totalProfit' => $laporans->sum('profit'),
        ]);
    }

    public function laporan_search(Request $request)
    {
        $title = "Laporan Penjualan";
        $laporan = DB::table('laporans');

        if ($request->search != null) {
            $laporan = $laporan->where('name', 'like', '%' . $request->search . '%');
        }
        $laporans = $laporan
            ->select('laporans.*', 'products.name as productName', 'size_names.name as sizeName', 'merks.name as merkName')
            ->leftJoin('products', 'products.id', 'laporans.product_id')
            ->leftJoin('size_names', 'size_names.id', 'laporans.size_name')
            ->leftJoin('merks', 'merks.id', 'laporans.merk_id')
            ->get();
        // dd($laporan);
        return view('kasir.pages.laporan', ['laporans' => $laporans, 'title' => $title]);
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
        $size_id = $request->size_id;
        $size = Size::where('id', $size_id)->get();
        // dd($date);
        // dd($size);
        foreach ($size as $size) {
            $xs = $size->xs;
            $s = $size->s;
            $m = $size->m;
            $lg = $size->lg;
            $xl = $size->xl;
            $xxl = $size->xxl;
        }
        // dd($xs, $s, $m, $lg, $xl, $xxl);
        if ($xs == 0) {
            return back()->with('message', 'Stock Kosong tidak bisa ditambah ke laporan');
        }
        if ($s == 0) {
            return back()->with('message', 'Stock Kosong tidak bisa ditambah ke laporan');
        }
        if ($m == 0) {
            return back()->with('message', 'Stock Kosong tidak bisa ditambah ke laporan');
        }
        if ($lg == 0) {
            return back()->with('message', 'Stock Kosong tidak bisa ditambah ke laporan');
        }
        if ($xl == 0) {
            return back()->with('message', 'Stock Kosong tidak bisa ditambah ke laporan');
        }
        if ($xxl == 0) {
            return back()->with('message', 'Stock Kosong tidak bisa ditambah ke laporan');
        }

        $profit = ($request->price - $request->purchase_price) * $request->qty;

        Laporan::create([
            'no_order' => date('Ymd') . random_int(5, 8),
            'product_id' => $request->product_id,
            'size_id' => $request->size_id,
            'size_name_id' => $request->size_name_id,
            'merk_id' => $request->merk_id,
            'qty' => $request->qty,
            'profit' => $profit,
        ]);

        // dd($laporan);

        return redirect()->to('kasir-input')->with('success', 'Tambah ke Laporan berhasil !!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $laporan = Laporan::find($created_at);
        // return view('kasir.pages.detail-laporan', [
        //     'laporan' => $laporan,
        // ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $profit = ($request->price - $request->purchase_price) * $request->qty;
        $profit = [
            'qty' => $request->qty,
            'profit' => $profit,
        ];
        Laporan::where('id', $id)
            ->update($profit);
        return redirect()->to('kasir-input')->with('success', 'Tambah ke Laporan berhasil !!');
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

    public function chart()
    {
        $date_tahun = date('Y', strtotime("2022"));
        // $date_jan = Laporan::whereYear('created_at', $date_tahun)->get();
        $jan = Laporan::whereMonth('created_at', $date_tahun)->sum('profit');
        dd($jan, $date_tahun);
    }

    public function laporan_harian(Request $request)
    {
        $date = $request->harian;
        $laporan = Laporan::where('created_at', $date)->get();
        $totalProfit = Laporan::where('created_at', $date)->sum('profit');
        // dd($laporan);
        return view('kasir.pages.detail-laporan.detail-harian', [
            'title' => 'Laporan Penjualan Harian',
            'date' => $date,
            'laporan' => $laporan,
            'totalProfit' => $totalProfit,
        ]);
    }

    public function laporan_bulanan(Request $request)
    {
        $date_bulan = date('m', strtotime($request->bulanan));
        $date_tahun = date('Y', strtotime($request->bulanan));
        $laporan = Laporan::whereMonth('created_at', [$date_bulan, $date_tahun])->get();
        $totalProfit = Laporan::whereMonth('created_at', [$date_bulan, $date_tahun])->sum('profit');

        return view('kasir.pages.detail-laporan.detail-bulanan', [
            'title' => 'Laporan Penjualan Bulanan',
            'date_bulan' => $date_bulan,
            'date_tahun' => $date_tahun,
            'laporan' => $laporan,
            'totalProfit' => $totalProfit,
        ]);
    }

    public function laporan_tahunan(Request $request)
    {
        $tahun = $request->tahunan;
        $laporan = Laporan::whereYear('created_at', $tahun)->get();
        $totalProfit = Laporan::whereYear('created_at', $tahun)->sum('profit');

        return view('kasir.pages.detail-laporan.detail-tahunan', [
            'title' => 'Laporan Penjualan Harian',
            'date_tahun' => $tahun,
            'laporan' => $laporan,
            'totalProfit' => $totalProfit,
        ]);
    }

    public function laporan_merk(Request $request)
    {
        $merk = $request->merk_id;
        $merks = Merk::find($merk);
        $laporan = Laporan::where('merk_id', $merk)->get();
        $totalProfit = Laporan::where('merk_id', $merk)->sum('profit');

        return view('kasir.pages.detail-laporan.detail-merk', [
            'title' => 'Laporan Penjualan Harian',
            'merk' => $merks,
            'laporan' => $laporan,
            'totalProfit' => $totalProfit,
        ]);
    }

    public function laporan_sizename(Request $request)
    {
        $size_name = $request->size_name;
        $size_names = SizeName::find($size_name);
        $laporan = Laporan::where('size_id', $size_name)->get();
        $totalProfit = Laporan::where('size_id', $size_name)->sum('profit');

        return view('kasir.pages.detail-laporan.detail-size_name', [
            'title' => 'Laporan Penjualan Harian',
            'size_names' => $size_names,
            'laporan' => $laporan,
            'totalProfit' => $totalProfit,
        ]);
    }
}
