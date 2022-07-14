<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $title = "Produk";

        if(request('category')) {
            $category = Category::firstWhere('slug', request('category'));
            $title = $category->name;
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

}
