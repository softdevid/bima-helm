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
                    // $reques['product_id'] = $product->id;
                    // $request['image'] = $images;
                    // Image::create($request->all());
                    Image::create([
                        'image' => $public_id,
                        'url' => $url,
                        'product_id' => $product->id,
                    ]);
                }
            }

            return back()->with('success', 'Berhasil ditambah');            

        // Validator::make($request->all(), [
        //     'name' => 'required|unique:products|max:255',
        // ])->validate();
                    
        // $image1  = $request->file('image1');
        // $image2  = $request->file('image2');
        // $image3  = $request->file('image3');
        // $image4  = $request->file('image4');

        // if ($image2 && $image3 === NULL) {
        //     $image1  = $request->file('image1');
        //     $image2  = NULL;
        //     $image3  = NULL;
        //     $image4  = $request->file('image4');

        //     $result1 = Cloudinary::upload($image1->getRealPath(), ['folder' => 'uploads']);
        //     $url1 = $result1->getSecurePath();
            
        //     $result4 = Cloudinary::upload($image4->getRealPath(), ['folder' => 'uploads']);
        //     $url4 = $result4->getSecurePath();                    
            
        //     $image = Image::create([
        //         'img_dt_1' => $url1,
        //         'img_dt_2' => $image2,
        //         'img_dt_3' => $image3,
        //         'img_dt_4' => $url4,
        //     ]);

        //     $sizes = Size::create([
        //         'xs' => $request->xs ?? 0,
        //         's' => $request->s ?? 0,
        //         'm' => $request->m ?? 0,
        //         'lg' => $request->lg ?? 0,
        //         'xl' => $request->xl ?? 0,
        //         'xxl' => $request->xxl ?? 0,
        //     ]);

        //     $stock = $request->xs + $request->s + $request->m + $request->lg + $request->xl + $request->xxl;


        //     Product::create([
        //         "category_id" => $request->category_id,
        //         "name" => $request->name,
        //         "slug" => Str::slug($request->name),
        //         "merk" => $request->merk,
        //         "price" => $request->price,
        //         "weight" => $request->weight,
        //         "stock" => $stock,
        //         "image_id" => $image->id,
        //         "size_id" => $sizes->id,
        //     ]);

        //     return back()->with('success', 'Berhasil ditambah!');

        // } elseif ($image2 && $image4 === NULL) {
        //     $image1  = $request->file('image1');
        //     $image2  = NULL;
        //     $image3  = $request->file('image3');
        //     $image4  = NULL;

        //     $result1 = Cloudinary::upload($image1->getRealPath(), ['folder' => 'uploads']);
        //     $url1 = $result1->getSecurePath();                
            
        //     $result3 = Cloudinary::upload($image3->getRealPath(), ['folder' => 'uploads']);
        //     $url3 = $result3->getSecurePath();
            
        //     $image = Image::create([
        //         'img_dt_1' => $url1,
        //         'img_dt_2' => $image2,
        //         'img_dt_3' => $url3,
        //         'img_dt_4' => $image4,
        //     ]);

        //     $sizes = Size::create([
        //         'xs' => $request->xs ?? 0,
        //         's' => $request->s ?? 0,
        //         'm' => $request->m ?? 0,
        //         'lg' => $request->lg ?? 0,
        //         'xl' => $request->xl ?? 0,
        //         'xxl' => $request->xxl ?? 0,
        //     ]);

        //     $stock = $request->xs + $request->s + $request->m + $request->lg + $request->xl + $request->xxl;


        //     Product::create([
        //         "category_id" => $request->category_id,
        //         "name" => $request->name,
        //         "slug" => Str::slug($request->name),
        //         "merk" => $request->merk,
        //         "price" => $request->price,
        //         "weight" => $request->weight,
        //         "stock" => $stock,
        //         "image_id" => $image->id,
        //         "size_id" => $sizes->id,
        //     ]);

        //     return back()->with('success', 'Berhasil ditambah!');

        // } elseif($image3 && $image4 === NULL){
        //     $image1  = $request->file('image1');
        //     $image2  = $request->file('image2');
        //     $image3  = NULL;
        //     $image4  = NULL;

        //     $result1 = Cloudinary::upload($image1->getRealPath(), ['folder' => 'uploads']);
        //     $url1 = $result1->getSecurePath();
            
        //     $result2 = Cloudinary::upload($image2->getRealPath(), ['folder' => 'uploads']);
        //     $url2 = $result2->getSecurePath();                    
            
        //     $image = Image::create([
        //         'img_dt_1' => $url1,
        //         'img_dt_2' => $url2,
        //         'img_dt_3' => $image3,
        //         'img_dt_4' => $image4,
        //     ]);

        //     $sizes = Size::create([
        //         'xs' => $request->xs ?? 0,
        //         's' => $request->s ?? 0,
        //         'm' => $request->m ?? 0,
        //         'lg' => $request->lg ?? 0,
        //         'xl' => $request->xl ?? 0,
        //         'xxl' => $request->xxl ?? 0,
        //     ]);

        //     $stock = $request->xs + $request->s + $request->m + $request->lg + $request->xl + $request->xxl;


        //     Product::create([
        //         "category_id" => $request->category_id,
        //         "name" => $request->name,
        //         "slug" => Str::slug($request->name),
        //         "merk" => $request->merk,
        //         "price" => $request->price,
        //         "weight" => $request->weight,
        //         "stock" => $stock,
        //         "image_id" => $image->id,
        //         "size_id" => $sizes->id,
        //     ]);

        //     return back()->with('success', 'Berhasil ditambah!');

        // } elseif($request->file('image1') && $request->file('image2') && $request->file('image3') && $request->file('image4')) {
        //     $image1  = $request->file('image1');
        //     $image2  = $request->file('image2');
        //     $image3  = $request->file('image3');
        //     $image4  = $request->file('image4');

        //     $result1 = Cloudinary::upload($image1->getRealPath(), ['folder' => 'uploads']);
        //     $url1 = $result1->getSecurePath();

        //     $result2 = Cloudinary::upload($image2->getRealPath(), ['folder' => 'uploads']);
        //     $url2 = $result2->getSecurePath();

        //     $result3 = Cloudinary::upload($image3->getRealPath(), ['folder' => 'uploads']);
        //     $url3 = $result3->getSecurePath();

        //     $result4 = Cloudinary::upload($image4->getRealPath(), ['folder' => 'uploads']);
        //     $url4 = $result4->getSecurePath();

        //     $image = Image::create([
        //         'img_dt_1' => $url1,
        //         'img_dt_2' => $url2,
        //         'img_dt_3' => $url3,
        //         'img_dt_4' => $url4
        //     ]);

        //     $sizes = Size::create([
        //         'xs' => $request->xs ?? 0,
        //         's' => $request->s ?? 0,
        //         'm' => $request->m ?? 0,
        //         'lg' => $request->lg ?? 0,
        //         'xl' => $request->xl ?? 0,
        //         'xxl' => $request->xxl ?? 0,
        //     ]);

        //     $stock = $request->xs + $request->s + $request->m + $request->lg + $request->xl + $request->xxl;


        //     $product = Product::create([
        //         "category_id" => $request->category_id,
        //         "name" => $request->name,
        //         "slug" => Str::slug($request->name),
        //         "merk" => $request->merk,
        //         "price" => $request->price,
        //         "weight" => $request->weight,
        //         "stock" => $stock,
        //         "image_id" => $image->id,
        //         "size_id" => $sizes->id,
        //     ]);

        //     return back()->with('success', 'Berhasil ditambah!');
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
        // $product = Product::find($id);

        // $images = Image::where("product_id", $product->id)->get();
        // $images = Image::where('product_id', $product->id);
        
        // foreach ($images as $image) {
        //     $image = $image->image;
        // }
        $product = Product::findOrFail($id);

        $images = Image::where("product_id",$product->id)->get();
        // dd($images);
        foreach($images as $image){
            Cloudinary::destroy($image->image);
        }

        $image_main = $product->image_main;        
        Cloudinary::destroy($image_main);        

        $sizes = Size::find($product->size_id);
        Size::destroy($sizes);        

        Product::destroy($id);
        return back();
        
        // $public_id = $producto->public_id;
        // Cloudinary::destroy($public_id);

        // $product = Product::find($id);
        // $image_main = $product->image_main;
        // Cloudinary::destroy($image_main);
        // // CloudinaryStorage::delete($image_main);
         
        // $images = Image::where("product_id",$product->id)->get();

        // foreach($images as $image){
        //     echo $images;
        // }
        // // dd($image_main);
        // // CloudinaryStorage::delete($images);
        // Cloudinary::destroy($images);

        // $sizes = Size::find($product->size_id);
        // $product->destroy($id);
        // return back();       
    }
}
