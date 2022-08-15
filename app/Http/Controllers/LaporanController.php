<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Size;
use App\Models\SizeName;
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
        $laporan = Laporan::all();        
        // $size_name = SizeName::where('id', $laporan->size_name)->get();
        return view('kasir.pages.laporan', [
            'title' => "Laporan Penjualan",
            'laporan' => $laporan,
            // 'size_name' => $size_name,
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
        Laporan::create([
            'product_id' => $request->product_id,
            'size_id' => $request->size_id,
            'size_name' => $request->size_name,            
            'qty' => $request->qty,
        ]);
        // dd($laporan);

        return back()->with('success', 'Tambah ke Laporan berhasil !!');
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
        //
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


    public function laporan_harian(Request $request)
    {                    
        $date = $request->harian; 
        $laporan = Laporan::where('created_at', $date)->get();        

        return view('kasir.pages.detail-laporan.detail-harian', [
            'title' => 'Laporan Penjualan Harian',            
            'date' => $date,
            'laporan' => $laporan,
        ]);
    }

    public function laporan_bulanan(Request $request)
    {
        $date_bulan = date('m',strtotime($request->bulanan));
        $date_tahun = date('Y',strtotime($request->bulanan));
        $laporan = Laporan::whereMonth('created_at', [$date_bulan, $date_tahun])->get();        
        return view('kasir.pages.detail-laporan.detail-bulanan', [
            'title' => 'Laporan Penjualan Bulanan',
            'date_bulan' => $date_bulan,
            'date_tahun' => $date_tahun,
            'laporan' => $laporan,
        ]);
    }

    public function laporan_tahunan(Request $request)
    {                    
        $tahun = $request->tahunan;
        $date_tahun = date('Y',strtotime($tahun));  //diubah dulu jadi date karena sebelumnya string
        $laporan = Laporan::whereYear('created_at', $date_tahun)->get();        

        return view('kasir.pages.detail-laporan.detail-tahunan', [
            'title' => 'Laporan Penjualan Harian',            
            'date_tahun' => $date_tahun,
            'laporan' => $laporan,
        ]);
    }
}
