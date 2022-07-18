<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\CloudinaryStorage;

class ProductAdminController extends Controller
{
    public function index()
    {
        $title = "Produk";

        return view('admin.pages.product', [
            "title" => $title,
            "products" => Product::all(),
        ]);
    }

    public function detail(Product $product)
    {
        return view('pages.product-detail', [
            "title" => "$product->name",
            "product" => $product
        ]);
    }

    public function create()
    {
        return view('admin.pages.product.create', [
            "title" => "Tambah data",
        ]);
        // return view('admin.pages.product.create');
    }

    public function store(Request $request)
    {
        // $image  = $request->file('image1', 'image2', 'image3', 'image4');
        $image  = $request->file('image');
        $result = CloudinaryStorage::upload($image->getRealPath(), $image->getClientOriginalName());
        // ddd($image);
        // Product::create([
        //     'image1' => $result,
        //     'image2' => $result,
        //     'image3' => $result,
        //     'image4' => $result,
        // ]);
        Product::create([
            "name" => $request->name,
            "slug" => Str::slug($request->name, '-'),
            "merk" => $request->merk,
            "price" => $request->price,
            "stock" => $request->stock,
            "image_main" => $result,
            // "image" => url,
            // "public_id" => pid
        ]);

        return redirect()->route('/admin/product')->withSuccess('Berhasil Ditambah!!');
    }
}
