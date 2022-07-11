<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index']);

Route::get('/faq', [HomeController::class, 'faq']);

Route::get('/tentang-kami', [HomeController::class, 'tentangkami']);
Route::get('/cara-belanja', [HomeController::class, 'carabelanja']);

Route::get('/contact', [HomeController::class, 'contact']);

Route::get('/products', [ProductController::class, 'index']);

Route::get('/products/helm/details', function () {
    return view('pages.product-detail', [
        "category" => "Helm Full Face",
        "title" => "KYT TT COURSE PLAIN MATT BLACK"
    ]);
});

Route::get('/cart', function () {
    return view('pages.cart', [
        "title" => "Cart"
    ]);
});

Route::get('/checkout', function () {
    return view('pages.checkout', [
        "title" => "Checkout"
    ]);
});
