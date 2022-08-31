<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Laporan;
use App\Models\SizeName;
use App\Models\Size;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class KasirController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('kasir.pages.input-kasir', [
            "title" => "Kasir",
            "size_name" => SizeName::all(),
        ]);
    }

    public function getBarcodeData()
    {
        if (request()->barcode != null) {
            $product = Product::without(['category', 'gudang', 'merk', 'sizename'])->select('barcode', 'name', 'price', 'purchase_price', 'id')->where('barcode', request()->barcode);

            if ($product->exists()) {
                $data = $product->first();

                return response()->json([
                    'message' => 'Berhasil mengambil data',
                    'product' => [
                        "barcode" => $data->barcode,
                        "name" => $data->name,
                        "price" => $data->price,
                        "purchase_price" => $data->purchase_price,
                        "id" => $data->id,
                    ],
                ]);
            } else {
                return response()->json([
                    'message' => 'Data kosong',
                    'product' => null
                ]);
            }
        } else {
            return response()->json([
                'message' => 'Barcode kosong',
                'product' => null
            ]);
        }
    }

    public function dashboard()
    {
        $nows = strtotime(date('Y-m-d'));
        $start = date('Y-m-d', strtotime('-7 day', $nows));
        $end = date('Y-m-d');

        $date = Carbon::now()->isoFormat('D-M-Y');
        $day = date('d', strtotime($date));
        $month = date('m', strtotime($date));
        $year = date('Y', strtotime($date));

        $thisDay = Laporan::whereDay('created_at', $day)->sum('profit');
        $thisMonth = Laporan::whereMonth('created_at', [$month, $year])->sum('profit');
        $thisYear = Laporan::whereYear('created_at', $year)->sum('profit');
        $date_tahun = date('Y', strtotime('2022'));
        $laporan = Laporan::whereYear('created_at', $date_tahun)->get();

        // $s = Laporan::whereDate('created_at', [$start, $end])->get();
        // $s = DB::select("SELECT * FROM laporans WHERE created_at between '$start' AND '$end' ORDER BY id DESC");
        $s = DB::table('laporans')
            ->whereBetween('created_at', [$start, $end])
            ->get();

        $years = Laporan::whereYear('created_at', $year)->get();
        $data = [
            'sumJan' => Laporan::whereMonth('created_at', 1)->sum('profit'),
            'sumFeb' => Laporan::whereMonth('created_at', 2)->sum('profit'),
            'sumMar' => Laporan::whereMonth('created_at', 3)->sum('profit'),
            'sumApr' => Laporan::whereMonth('created_at', 4)->sum('profit'),
            'sumMei' => Laporan::whereMonth('created_at', 5)->sum('profit'),
            'sumJuni' => Laporan::whereMonth('created_at', 6)->sum('profit'),
            'sumJuli' => Laporan::whereMonth('created_at', 7)->sum('profit'),
            'sumAgus' => Laporan::whereMonth('created_at', 8)->sum('profit'),
            'sumSep' => Laporan::whereMonth('created_at', 9)->sum('profit'),
            'sumOkt' => Laporan::whereMonth('created_at', 10)->sum('profit'),
            'sumNov' => Laporan::whereMonth('created_at', 11)->sum('profit'),
            'sumDes' => Laporan::whereMonth('created_at', 12)->sum('profit'),
        ];
        // foreach ($years as $key => $y) {
        //     $month = date('m', strtotime($y->created_at));
        // }
        // $sumMonth = Laporan::whereYear('created_at', $month)->get();
        // dd($sumJan);
        // dd($years);
        // dd($s);
        // dd($thisDay, $thisMonth, $thisYear);
        return view('kasir.pages.dashboard', [
            'title' => 'Dashboard',
            'totalProduct' => Product::count(),
            'thisDay' => $thisDay,
            'thisMonth' => $thisMonth,
            'thisYear' => $thisYear,
            'laporan' => $laporan,
            's' => $s,
            'start' => $start,
            'end' => $end,
            'years' => $years,
            'data' => $data,
            // 'sumMonth' => $sumMonth,
        ]);
    }

    public function chartYear()
    {
        $date_tahun = date('Y', strtotime('2022'));
        $laporan = Laporan::whereYear('created_at', $date_tahun)->sum('profit');
        // dd($laporan);
        return view('kasir.pages.dashboard', [
            'title' => 'Dashboard',
            'laporan' => $laporan,
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
        $data = [
            'no_order' => date('Ymd') . random_int(5, 8),
            'barcode' => $request->barcode,
            'name' => $request->name,
            'name' => $request->name,
            'name' => $request->name,
            'name' => $request->name,
            'name' => $request->name,
            'name' => $request->name,
        ];
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
        $now = Carbon::now()->toDateString('Y-m-d');
        $laporan = Laporan::where('created_at', $now)->get()->count();
        $products = Product::find($id);
        $size_name = SizeName::all();
        $size = Size::all();

        // dd($laporan);
        return view('kasir.pages.kasir-input.create', [
            'title' => "Tambahkan laporan $products->name",
            'products' => $products,
            'size' => $size,
            'size_name' => $size_name,
            'laporan' => $laporan,
            'now' => $now,
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
