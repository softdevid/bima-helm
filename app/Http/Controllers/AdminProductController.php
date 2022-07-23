<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Image;
use App\Models\Size;
use App\Models\Category;
use App\Http\Controllers\CloudinaryStorage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Cloudinary\Cloudinary;



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
            'products' => Product::with('merk', 'size','image')->get(),
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

        $image1  = $request->file('image1');
        $image2  = $request->file('image2');
        $image3  = $request->file('image3');
        $image4  = $request->file('image4');

        if ($image2 === NULL) {
            $image1  = $request->file('image1');
            $image2  = NULL;
            $image3  = NULL;
            $image4  = NULL;

            $result = CloudinaryStorage::upload($image1->getRealPath(), $image1->getClientOriginalName());
            $image = Image::create([
                'img_dt_1' => $result,
                'img_dt_2' => $image2,
                'img_dt_3' => $image3,
                'img_dt_4' => $image4,
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


            Product::create([
                "category_id" => $request->category_id,
                "name" => $request->name,
                "slug" => Str::slug($request->name),
                "merk" => $request->merk,
                "price" => $request->price,
                "stock" => $stock,
                "image_id" => $image->id,
                "size_id" => $sizes->id,
            ]);
            return redirect('/admin/product')->withSuccess('Berhasil Ditambah!!');
        } elseif ($image3 === NULL) {
            $image1  = $request->file('image1');
            $image2  = $request->file('image2');
            $image3  = NULL;
            $image4  = NULL;

            $result1 = CloudinaryStorage::upload($image1->getRealPath(), $image1->getClientOriginalName());
            $result2 = CloudinaryStorage::upload($image2->getRealPath(), $image2->getClientOriginalName());
            $image = Image::create([
                'img_dt_1' => $result1,
                'img_dt_2' => $result2,
                'img_dt_3' => $image3,
                'img_dt_4' => $image4,
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


            Product::create([
                "category_id" => $request->category_id,
                "name" => $request->name,
                "slug" => Str::slug($request->name),
                "merk" => $request->merk,
                "price" => $request->price,
                "stock" => $stock,
                "image_id" => $image->id,
                "size_id" => $sizes->id,
            ]);
            return redirect('/admin/product')->withSuccess('Berhasil Ditambah!!');
        } elseif ($image4 === NULL) {
            $image1  = $request->file('image1');
            $image2  = $request->file('image2');
            $image3  = $request->file('image3');
            $image4  = NULL;

            $result1 = CloudinaryStorage::upload($image1->getRealPath(), $image1->getClientOriginalName());
            $result2 = CloudinaryStorage::upload($image2->getRealPath(), $image2->getClientOriginalName());
            $result3 = CloudinaryStorage::upload($image3->getRealPath(), $image3->getClientOriginalName());
            $image = Image::create([
                'img_dt_1' => $result1,
                'img_dt_2' => $result2,
                'img_dt_3' => $image3,
                'img_dt_4' => $image4,
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


            Product::create([
                "category_id" => $request->category_id,
                "name" => $request->name,
                "slug" => Str::slug($request->name),
                "merk" => $request->merk,
                "price" => $request->price,
                "stock" => $stock,
                "image_id" => $image->id,
                "size_id" => $sizes->id,
            ]);
            return redirect('/admin/product')->withSuccess('Berhasil Ditambah!!');
        } else {
            $image1  = $request->file('image1');
            $image2  = $request->file('image2');
            $image3  = $request->file('image3');
            $image4  = $request->file('image4');

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
                "size_id" => $sizes->id,
            ]);

            return redirect('admin-product')->withSuccess('Berhasil Ditambah!!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $id)
    {
        $image = Product::join('images', 'images.id', '=', 'products.image_id')->get();
        $size = Product::join('sizes', 'sizes.id', '=', 'products.size_id')->get();
        return view('admin.pages.product.product-detail', [
            "title" => "Detail",
            "products" => Product::find($id),
            "image" => $image,
            "size" => $size
        ]);
    }

    public function detail(Product $product)
    {
        $products = Product::join('images', 'images.id', '=', 'products.image_id')->get();
        $products = Product::join('sizes', 'sizes.id', '=', 'products.size_id')->get();
        return view('admin.pages.product.product-detail', [
            "title" => $products->name,
            "products" => $products
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
        $image1 = $request->image1;
        $image2 = $request->image2;
        $image3 = $request->image3;
        $image4 = $request->image4;

        $product = Product::find($id);
        $image_id = $product->image_id;
        $image = Image::find($image_id);

        $img1 = $image->img_dt_1;
        $img2 = $image->img_dt_2;
        $img3 = $image->img_dt_3;
        $img4 = $image->img_dt_4;

        if ($image1 !== $img1) {
            echo $img1;
        } elseif ($image2 !== $img2) {
            echo $img2;
        } elseif ($image3 !== $img3) {
            echo $img3;
        } elseif ($image4 !== $img4) {
            echo $img4;
        } else {
            CloudinaryStorage::delete($img1);
            $file1 = request()->file('image1');
            $file1 = CloudinaryStorage::upload($file1->getRealPath(), $file1->getClientOriginalName());

            CloudinaryStorage::delete($img2);
            $file2 = request()->file('image2');
            $file1 = CloudinaryStorage::upload($file2->getRealPath(), $file2->getClientOriginalName());

            CloudinaryStorage::delete($img3);
            $file3 = request()->file('image3');
            $file3 = CloudinaryStorage::upload($file3->getRealPath(), $file3->getClientOriginalName());

            CloudinaryStorage::delete($img4);
            $file4 = request()->file('image4');
            $file4 = CloudinaryStorage::upload($file4->getRealPath(), $file4->getClientOriginalName());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $image_id = $product->image_id;

        $image = Image::where('id', $image_id)->get();

        foreach (Image::where($image_id) as $image) {
            echo $image->img_dt_1;
            echo $image->img_dt_2;
            echo $image->img_dt_3;
            echo $image->img_dt_4;
        }

        // dd($image);
        // dd($image->img_dt_1, $image->img_dt_2, $image->img_dt_3, $image->img_dt_4);
        if ($image->img_dt_1) {
            $product = Product::find($id);
            $image_id = $product->image_id;
            $image = Image::where('id', $image_id)->get();

            CloudinaryStorage::delete($image->img_dt_1);
            Image::delete($image_id);

            $size_id = $product->size_id;
            Size::where($size_id)->delete();
            Product::where($id)->delete();
            return back();
        } elseif ($image->img_dt_2) {
            $product = Product::find($id);
            $image_id = $product->image_id;
            $image = Image::where('id', $image_id)->get();

            CloudinaryStorage::delete($image->img_dt_2);
            Image::delete($image_id);

            $size_id = $product->size_id;
            Size::where($size_id)->delete();
            Product::where($id)->delete();
            return back();
        } elseif ($image->img_dt_3) {
            $product = Product::find($id);
            $image_id = $product->image_id;
            $image = Image::where('id', $image_id)->get();

            CloudinaryStorage::delete($image->img_dt_3);
            Image::delete($image_id);

            $size_id = $product->size_id;
            Size::where($size_id)->delete();
            Product::where($id)->delete();
            return back();
        } elseif ($image->img_dt_4) {
            $product = Product::find($id);
            $image_id = $product->image_id;
            $image = Image::where('id', $image_id)->get();

            CloudinaryStorage::delete($image->img_dt_4);
            Image::delete($image_id);

            $size_id = $product->size_id;
            Size::where($size_id)->delete();
            Product::where($id)->delete();
            return back();
        } else {
            CloudinaryStorage::delete($image);
            Image::delete($image_id);

            $size_id = $product->size_id;
            Size::where($size_id)->delete();
            Product::where($id)->delete();
            return back();
        }
    }
}
