<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Image;
use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\CloudinaryStorage;
use Illuminate\Support\Facades\Validator;

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
            "category" => Category::all(),
        ]);
        // return view('admin.pages.product.create');
    }

    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'name' => 'required|unique:products|max:255',
        ])->validate();

        $image1  = $request->file('image1');
        $image2  = $request->file('image2');
        $image3  = $request->file('image3');
        $image4  = $request->file('image4');

        // if ($request->file('image1')) {
        //     $result1 = CloudinaryStorage::upload($image1->getRealPath(), $image1->getClientOriginalName());
        // } elseif ($request->file('image2') === "") {
        //     $result2 = CloudinaryStorage::upload($image2->getRealPath(), $image2->getClientOriginalName());
        // } elseif ($request->file('image3') === "") {
        //     $result3 = CloudinaryStorage::upload($image3->getRealPath(), $image3->getClientOriginalName());
        // } elseif ($request->file('image4') === "") {
        //     $result4 = CloudinaryStorage::upload($image4->getRealPath(), $image4->getClientOriginalName());
        // } else {
        //     $result1 = CloudinaryStorage::upload($image1->getRealPath(), $image1->getClientOriginalName());
        //     $result2 = CloudinaryStorage::upload($image2->getRealPath(), $image2->getClientOriginalName());
        //     $result3 = CloudinaryStorage::upload($image3->getRealPath(), $image3->getClientOriginalName());
        //     $result4 = CloudinaryStorage::upload($image4->getRealPath(), $image4->getClientOriginalName());
        // }

        // if ($result1) {
        //     $image = Image::create([
        //         'img_dt_1' => $result1,
        //         'img_dt_2' => NULL,
        //         'img_dt_3' => NULL,
        //         'img_dt_4' => NULL,
        //     ]);
        // } elseif ($result2 === "") {
        //     $image = Image::create([
        //         'img_dt_1' => $result1,
        //         'img_dt_2' => NULL,
        //         'img_dt_3' => $result3,
        //         'img_dt_4' => $result4,
        //     ]);
        // } elseif ($result3 === "") {
        //     $image = Image::create([
        //         'img_dt_3' => NULL,
        //         'img_dt_1' => $result1,
        //         'img_dt_2' => $result2,
        //         'img_dt_4' => $result4,
        //     ]);
        // } elseif ($result4 === "") {
        //     $image = Image::create([
        //         'img_dt_1' => $result1,
        //         'img_dt_2' => $result2,
        //         'img_dt_3' => $result3,
        //         'img_dt_4' => NULL,
        //     ]);
        // } else {
        //     $image = Image::create([
        //         'img_dt_1' => $result1,
        //         'img_dt_2' => $result2,
        //         'img_dt_3' => $result3,
        //         'img_dt_4' => $result4,
        //     ]);
        // }

        $result1 = CloudinaryStorage::upload($image1->getRealPath(), $image1->getClientOriginalName());
        $result2 = CloudinaryStorage::upload($image2->getRealPath(), $image2->getClientOriginalName());
        $result3 = CloudinaryStorage::upload($image3->getRealPath(), $image3->getClientOriginalName());
        $result4 = CloudinaryStorage::upload($image4->getRealPath(), $image4->getClientOriginalName());

        $image = Image::create([
            'img_dt_1' => $result1,
            'img_dt_2' => $result2,
            'img_dt_3' => $result3,
            'img_dt_4' => $result4
        ]);

        $sizes = Size::create([
            'xs' => $request->xs,
            's' => $request->s,
            'm' => $request->m,
            'lg' => $request->lg,
            'xl' => $request->xl,
            'xxl' => $request->xxl,
        ]);

        $stock = $request->xs + $request->s + $request->m + $request->lg + $request->xl + $request->xxl;


        $product = Product::create([
            "category_id" => $request->category_id,
            "name" => $request->name,
            "slug" => Str::slug($request->name),
            "merk" => $request->merk,
            "price" => $request->price,
            "stock" => $stock,
            "image_id" => $image->id,
            "image_main" => 'helm.jpeg',
            "size_id" => $sizes->id,
        ]);
        // Str::slug($request->name, '-', 'lowercase');
        // dd($image1, $image2, $image3, $image4, $sizes, $image, $product);
        return redirect('/admin/product')->withSuccess('Berhasil Ditambah!!');
    }
}
