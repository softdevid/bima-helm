<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Image;
use App\Models\Size;
use App\Models\Category;
use App\Models\Merk;
use App\Models\Gudang;
// use App\Http\Controllers\CloudinaryStorage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
// use Cloudinary\Cloudinary;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;



class AdminProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return view('admin.pages.product.list_product', [
        //     'title' => "Produk",
        //     'products' => Product::with('merk', 'size', 'image')->get(),
        // ]);

        $product = Product::all();
        // dd($product);
        // $image = Image::find($product->id);
        return view('admin.pages.product.list_product', [
            "title" => "Produk",
            "products" => $product,
            // "image" => $image
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Tambah Produk";
        $categories = Category::all();
        $merks = Merk::all();
        return view('admin.pages.product.create', ['title' => $title, 'categories' => $categories, 'merks' => $merks]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'name' => 'required|unique:products|max:255',
            'image_main' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:1024',
            'images[]' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'barcode' => 'max:18|unique:products',
        ])->validate();
        // dd($request->all());

        if ($request->hasFile("image_main")) {
            $file = $request->file('image_main');
            $image = Cloudinary::upload($file->getRealPath(), ['folder' => 'products']);
            $public_id = $image->getPublicId();
            $url = $image->getSecurePath();

            $sizes = Size::create([
                'xs' => $request->xs ?? 0,
                's' => $request->s ?? 0,
                'm' => $request->m ?? 0,
                'lg' => $request->lg ?? 0,
                'xl' => $request->xl ?? 0,
                'xxl' => $request->xxl ?? 0,
            ]);
            $stock = $request->xs + $request->s + $request->m + $request->lg + $request->xl + $request->xxl;

            $gudang = Gudang::create([
                'xs' => $request->gd_xs ?? 0,
                's' => $request->gd_s ?? 0,
                'm' => $request->gd_m ?? 0,
                'lg' => $request->gd_lg ?? 0,
                'xl' => $request->gd_xl ?? 0,
                'xxl' => $request->gd_xxl ?? 0,
            ]);
            $gd_stock = $request->gd_xs + $request->gd_s + $request->gd_m + $request->gd_lg + $request->gd_xl + $request->gd_xxl;

            $product = Product::create([
                "barcode" => $request->barcode,
                "category_id" => $request->category_id,
                "name" => $request->name,
                "slug" => Str::slug($request->name),
                "merk_id" => $request->merk_id,
                "price" => $request->price,
                "purchase_price" => $request->purchase_price,
                "weight" => $request->weight,
                "stock" => $stock,
                "gd_stock" => $gd_stock,
                "description" => $request->description,
                "image_main" => $public_id,
                "url" => $url,
                "size_id" => $sizes->id,
                "gudang_id" => $gudang->id,
            ]);
        }

        if ($request->hasFile('images')) {
            $file = $request->file('images');
            foreach ($file as $key => $file) {
                $images = Cloudinary::upload($file->getRealPath(), ['folder' => 'uploads']);
                $public_id = $image->getPublicId();
                $url = $images->getSecurePath();
                Image::create([
                    'image' => $public_id,
                    'url' => $url,
                    'product_id' => $product->id,
                ]);
            }
        }

        return back()->with('success', 'Berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product, $id)
    {
        $product = Product::findOrFail($id);
        // dd($product);
        $images = Image::where("product_id", $product->id)->get();

        return view('admin.pages.product.product-detail', [
            "title" => "Detail Produk",
            "product" => $product,
            "images" => $images,
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
        $categories = Category::all();
        $merks = Merk::all();
        $product = Product::findOrFail($id);
        $sizes = Size::findOrFail($product->size_id);
        $gudang = Size::findOrFail($product->gudang_id);
        // $product = Product::with('Category', 'merk', 'size')->get();
        $images = Image::where("product_id", $product->id)->get();
        return view('admin.pages.product.edit', [
            "title" => "Edit Produk",
            "product" => $product,
            "images" => $images,
            "sizes" => $sizes,
            "gudang" => $gudang,
            "categories" => $categories,
            "merks" => $merks,
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
        $product = Product::findOrFail($id);
        $size = Size::findOrFail($product->size_id);
        $image_main = $product->image_main;

        $rules = [
            'name' => 'required|max:255',
            'image_main' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
            'images' => 'image|mimes:jpeg,png,jpg,gif,svg|max:1024',
            'barcode' => 'required|max:18|unique:products'
        ];

        if ($request->slug != $product->slug) {
            $rules['slug'] = 'required|unique:products';
        }

        if ($request->hasFile('image_main')) {
            $file = $request->file('image_main');
            $image = Cloudinary::upload($file->getRealPath(), ['folder' => 'products']);
            $public_id = $image->getPublicId();
            $url = $image->getSecurePath();

            $image = [
                "image_main" => $public_id,
                "url" => $url,
            ];
            $product->where('id', $product->id)
                ->update($image);
        }

        $size = [
            'xs' => $request->xs ?? 0,
            's' => $request->s ?? 0,
            'm' => $request->m ?? 0,
            'lg' => $request->lg ?? 0,
            'xl' => $request->xl ?? 0,
            'xxl' => $request->xxl ?? 0,
        ];
        $stock = $request->xs + $request->s + $request->m + $request->lg + $request->xl + $request->xxl;

        Size::where('id', $product->id)
            ->update($size);

        $gudang = [
            'xs' => $request->gd_xs ?? 0,
            's' => $request->gd_s ?? 0,
            'm' => $request->gd_m ?? 0,
            'lg' => $request->gd_lg ?? 0,
            'xl' => $request->gd_xl ?? 0,
            'xxl' => $request->gd_xxl ?? 0,
        ];
        $gd_stock = $request->gd_xs + $request->gd_s + $request->gd_m + $request->gd_lg + $request->gd_xl + $request->gd_xxl;

        Gudang::where('id', $product->id)
            ->update($gudang);

        $product->update([
            "barcode" => $request->barcode,
            "category_id" => $request->category_id,
            "name" => $request->name,
            "slug" => Str::slug($request->name),
            "merk_id" => $request->merk_id,
            "price" => $request->price,
            "purchase_price" => $request->purchase_price,
            "weight" => $request->weight,
            "stock" => $stock,
            "gd_stock" => $gd_stock,
            "description" => $request->description,
        ]);

        if ($request->hasFile("images")) {
            $files = $request->file("images");
            foreach ($files as $file) {
                $images = Cloudinary::upload($file->getRealPath(), ['folder' => 'products']);
                $public_id = $images->getPublicId();
                $url = $images->getSecurePath();
                Image::create([
                    'image' => $public_id,
                    'url' => $url,
                    'product_id' => $product->id,
                ]);
            }
        }
        return redirect('admin-product')->with("success", "Berhasil diedit!!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        $images = Image::where("product_id", $product->id)->get();
        // dd($images);
        foreach ($images as $image) {
            Cloudinary::destroy($image->image);
        }
        Image::where("product_id", $product->id)->delete();

        $image_main = $product->image_main;
        Cloudinary::destroy($image_main);

        Size::where("id", $product->size_id)->delete();
        Gudang::where("id", $product->gudang_id)->delete();

        Product::destroy($id);
        return back()->with('success', 'Berhasil dihapus!!');
    }

    public function deleteimages($id)
    {
        $images = Image::findOrFail($id);
        Cloudinary::destroy($images->image);

        Image::find($id)->delete();
        return back()->with('success', 'Gambar berhasil dihapus!!');
    }

    public function deletecover($id)
    {
        // $product = Product::findOrFail($id);
        // if ($product->image_main) {
        //     Cloudinary::destroy($product->image_main);
        // }
        $product = Product::findOrFail($id);

        Cloudinary::destroy($product->image_main);

        $a = [
            'image_main' => "",
            'url' => "",
        ];

        $product->where('id', $product->id)
            ->update($a);
        // $product->where('id', $product->id)
        //         ->update($url);

        return back()->with('success', 'Gambar Berhasil dihapus!!');
    }
}
