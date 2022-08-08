<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $title = "Produk";

        if (request('category')) {
            $category = Category::firstWhere('slug', request('category'));
            $title = $category->name;
        }

        if (request()->ajax() && request()->sortby != null && request()->sortby != 'latest') {
            return view('pages.product.product-data-grids', [
                "products" => Product::orderBy('price', request()->sortby)->filter(request(['search', 'category', 'sortby']))->paginate(9)->withQueryString(),
            ])->render();
        }

        if (request()->ajax()) {
            return view('pages.product.product-data-grids', [
                "products" => Product::latest()->filter(request(['search', 'category']))->paginate(9)->withQueryString(),
            ])->render();
        }

        return view('pages.product.products', [
            "title" => $title,
            "categories" => Category::oldest()->get(),
            "products" => Product::latest()->filter(request(['search', 'category']))->paginate(9)->withQueryString(),
        ]);
    }

    public function detail(Product $product)
    {
        return view('pages.product.product-detail', [
            "title" => "$product->name",
            "product" => $product
        ]);
    }
}
