<?php

namespace App\Http\Controllers;

use App\Models\Merk;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class MerkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pages.product.merk', [
            "merks" => Merk::all(),
            "title" => "Merk"
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.merk.create', [
            "title" => "Tambah Merk"
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Merk::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Merk  $merk
     * @return \Illuminate\Http\Response
     */
    public function show(Merk $merk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Merk  $merk
     * @return \Illuminate\Http\Response
     */
    public function edit(Merk $merk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Merk  $merk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Merk $merk)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Merk  $merk
     * @return \Illuminate\Http\Response
     */
    public function destroy(Merk $merk)
    {
        Merk::destroy($merk->id);
        // Merk::destroy($merk->id);
        return redirect('/admin/merk')->with('success', 'Berhasil Dihapus!!');
    }
}
