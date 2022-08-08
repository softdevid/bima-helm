<?php

namespace App\Http\Controllers;

use App\Models\Merk;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class MerkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pages.merk.merk', [
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
        return back()->with('success', 'Berhasil ditambah!!!');
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
    public function update(Request $request, Merk $id)
    {
        $merk = Merk::findOrFail($id);
        $rules = [            
            'name' => 'required|max:255',       
        ];

        if ($request->slug != $merk->slug) {
            $rules['slug'] = 'required|unique:products';
        }

        $validate = $request->validate($rules);        
        $merk->update([
            "name" => $request->name,
            "slug" => $request->slug,            
        ]);
        return back()->with('success', 'Berhasil diedit!');   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Merk  $merk
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Merk::destroy($id);        
        return back()->with('success', 'Berhasil dihapus!!');        
    }
}