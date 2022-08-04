<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Image;
use App\Models\Size;
use App\Models\Category;
use App\Models\Merk;
use App\Http\Controllers\CloudinaryStorage;
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
    public function index(Product $product)
    {
        // return view('admin.pages.product.list_product', [
        //     'title' => "Produk",
        //     'products' => Product::with('merk', 'size', 'image')->get(),
        // ]);

        $product = Product::all();
        // dd($product);
        return view('admin.pages.product.list_product', [
            "title" => "Produk",
            "products" => $product
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
        ])->validate();

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

            $product = Product::create([
                "category_id" => $request->category_id,
                "name" => $request->name,
                "slug" => Str::slug($request->name),
                "merk" => $request->merk,
                "price" => $request->price,
                "stock" => $stock,
                "description" => $request->description,
                "image_main" => $public_id,
                "url" => $url,
                "size_id" => $sizes->id,
            ]);
        }

        if ($request->hasFile('images')) {
            $file = $request->file('images');
            foreach ($file as $key => $file) {
                $images = Cloudinary::upload($file->getRealPath(), ['folder' => 'products']);
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
        $images = Image::where("product_id", $product->id)->get();
        // dd($images);
        // foreach($images as $image){
        //     $images = $image->url;
        // }
        return view('admin.pages.product.product-detail', [
            "title" => "$product->name",
            "product" => $product,
            "images" => $images,
        ]);
    }

    // public function detail(Product $product)
    // {
    //     $products = Product::join('images', 'images.id', '=', 'products.image_id')->get();
    //     $products = Product::join('sizes', 'sizes.id', '=', 'products.size_id')->get();
    //     return view('admin.pages.product.product-detail', [
    //         "title" => $products->name,
    //         "products" => $products
    //     ]);
    // }
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
        $images = Image::where("product_id", $product->id)->get();
        return view('admin.pages.product.edit', [
            "title" => "$product->name",
            "product" => $product,
            "images" => $images,
            "sizes" => $sizes,
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
        Validator::make($request->all(), [
            'name' => 'required|unique:products|max:255',
        ])->validate();

        $product = Product::findOrFail($id);
        $size = Size::findOrFail($product->size_id);
        // dd($product, $size);

        if ($request->hasFile("image_main")) {
            Cloudinary::destroy($product->image);
            $product->url->delete();

            $file = $request->file('image_main');
            $image = Cloudinary::upload($file->getRealPath(), ['folder' => 'products']);
            $public_id = $image->getPublicId();
            $url = $image->getSecurePath();
            
            $sizes = $size->update([                
                'xs' => $request->xs ?? 0,
                's' => $request->s ?? 0,
                'm' => $request->m ?? 0,
                'lg' => $request->lg ?? 0,
                'xl' => $request->xl ?? 0,
                'xxl' => $request->xxl ?? 0,
            ]);
            $stock = $request->xs + $request->s + $request->m + $request->lg + $request->xl + $request->xxl;

            $product->updateOrCreate([                
                "category_id" => $request->category_id,
                "name" => $request->name,
                "slug" => Str::slug($request->name),
                "merk" => $request->merk_id,
                "price" => $request->price,
                "stock" => $stock,
                "description" => $request->description,
                "image_main" => $public_id,
                "url" => $url,
                "size_id" => $request->size_id,
            ]);
        }        

        if ($request->hasFile("images")) {
            $files = $request->file("images");
            foreach ($files as $file) {
                $images = Cloudinary::upload($file->getRealPath(), ['folder' => 'products']);
                $public_id = $image->getPublicId();
                $url = $images->getSecurePath();
                Image::update([
                    'image' => $public_id,
                    'url' => $url,
                    'product_id' => $product->id,
                ]);
            }
        }

        return redirect("admin-product");
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

        Product::destroy($id);
        return back()->with('success', 'Berhasil dihapus!!');
    }

    public function deleteimages($id)
    {
        $images = Image::findOrFail($id);
        Cloudinary::destroy($images);

        Image::find($id)->delete();
        return back();
    }

    public function deletecover($id)
    {
        $image_main = Product::findOrFail($id)->image_main;
        $url = Product::findOrFail($id)->url;
        Cloudinary::destroy($image_main);
        return back();
    }
}
