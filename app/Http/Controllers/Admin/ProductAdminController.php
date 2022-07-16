<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductAdminController extends Controller
{
    public function index()
    {
        $title = "Produk";

        if (request('category')) {
            $category = Category::firstWhere('slug', request('category'));
            $title = $category->name;
        }

        if (request()->ajax() && request()->sort_by != null && request()->sort_by != 'sold') {
            return view('pages.product-grids', [
                "products" => Product::orderBy('price', request()->sort_by)->filter(request(['search', 'category']))->paginate(9)->withQueryString(),
            ])->render();
        }

        if (request()->ajax()) {
            return view('pages.product-grids', [
                "products" => Product::orderBy('sold', 'desc')->filter(request(['search', 'category']))->paginate(9)->withQueryString(),
            ])->render();
        }

        return view('pages.products', [
            "title" => $title,
            "categories" => Category::oldest()->get(),
            "products" => Product::orderBy('sold', 'desc')->filter(request(['search', 'category']))->paginate(9)->withQueryString(),
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
        return view('admin.pages.product');
    }

    public function store(Request $request)
    {
        Product::create([
            "name" => $request->name,
            "slug" => $request->slug,
            "merk" => $request->merk,
            "price" => $request->price,
            "stock" => $request->stock,
            // "image" => url,
            // "public_id" => pid
        ]);
    }
}