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
    public function index()
    {
        return view('admin.pages.product.list_product', [
            'title' => "Produk",
            'products' => Product::with('merk', 'size', 'image')->get(),
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
        return view('admin.pages.product.create', ['title' => $title, 'categories' => $categories]);
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
    public function show(Product $id)
    {
        // $image = Product::join('images', 'images.id', '=', 'products.image_id')->get();
        // $size = Product::join('sizes', 'sizes.id', '=', 'products.size_id')->get();
        // return view('admin.pages.product.product-detail', [
        //     "title" => "Detail",
        //     "products" => Product::find($id),
        //     "image" => $image,
        //     "size" => $size
        // ]);
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
        // $image1 = $request->image1;
        // $image2 = $request->image2;
        // $image3 = $request->image3;
        // $image4 = $request->image4;

        // $product = Product::find($id);
        // $image_id = $product->image_id;
        // $image = Image::find($image_id);

        // $img1 = $image->img_dt_1;
        // $img2 = $image->img_dt_2;
        // $img3 = $image->img_dt_3;
        // $img4 = $image->img_dt_4;

        // if ($image1 !== $img1) {
        //     echo $img1;
        // } elseif ($image2 !== $img2) {
        //     echo $img2;
        // } elseif ($image3 !== $img3) {
        //     echo $img3;
        // } elseif ($image4 !== $img4) {
        //     echo $img4;
        // } else {
        //     CloudinaryStorage::delete($img1);
        //     $file1 = request()->file('image1');
        //     $file1 = CloudinaryStorage::upload($file1->getRealPath(), $file1->getClientOriginalName());

        //     CloudinaryStorage::delete($img2);
        //     $file2 = request()->file('image2');
        //     $file1 = CloudinaryStorage::upload($file2->getRealPath(), $file2->getClientOriginalName());

        //     CloudinaryStorage::delete($img3);
        //     $file3 = request()->file('image3');
        //     $file3 = CloudinaryStorage::upload($file3->getRealPath(), $file3->getClientOriginalName());

        //     CloudinaryStorage::delete($img4);
        //     $file4 = request()->file('image4');
        //     $file4 = CloudinaryStorage::upload($file4->getRealPath(), $file4->getClientOriginalName());
        // }
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

        $images = Image::where("product_id",$product->id)->get();
        // dd($images);
        foreach($images as $image){
            Cloudinary::destroy($image->image);
        }
        Image::where("product_id",$product->id)->delete();

        $image_main = $product->image_main;        
        Cloudinary::destroy($image_main);        

        Size::where("id",$product->size_id)->delete();               

        Product::destroy($id);
        return back()->with('success', 'Berhasil dihapus!!');    
    }
}
