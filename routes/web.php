<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductAdminController;
use App\Http\Controllers\RegionController;
use Illuminate\Support\Facades\Route;
use \Cviebrock\EloquentSluggable\Services\SlugService;


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

Route::get('/login', [HomeController::class, 'login'])->middleware('guest');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [HomeController::class, 'register'])->middleware('guest');
Route::post('/register', [AuthController::class, 'registration']);

Route::post('/indonesia/provinces', [RegionController::class, 'provinces']);
Route::post('/indonesia/cities', [RegionController::class, 'cities']);
Route::post('/indonesia/districts', [RegionController::class, 'districts']);
Route::post('/indonesia/villages', [RegionController::class, 'villages']);

Route::get('/faq', [HomeController::class, 'faq']);
Route::get('/tentang-kami', [HomeController::class, 'tentangkami']);
Route::get('/cara-belanja', [HomeController::class, 'carabelanja']);
Route::get('/contact', [HomeController::class, 'contact']);

Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/details/{product:slug}', [ProductController::class, 'detail']);

Route::get('/cart', fn () => view('pages.cart', [
    "title" => "Keranjang"
]));

Route::get('/checkout', function () {
    return view('pages.checkout', [
        "title" => "Checkout"
    ]);
});

//route admin
Route::get('/admin/dashboard', function () {
    return view('admin.pages.index', [
        "title" => "Dashboard"
    ]);
});
Route::get('/admin/product', [ProductAdminController::class, 'index']);
Route::get('/admin/users', [AdminController::class, 'users']);
Route::get('/admin/orders', [AdminController::class, 'orders']);
Route::post('/admin/product/create', [ProductAdminController::class, 'store']);
Route::get('/admin/product/create', [ProductAdminController::class, 'create']);
// Route::resource('productadmin', ProductAdminController::class);



//KASIR
Route::get('/kasir/dashboard', function () {
    return view('kasir.pages.index', [
        "title" => "Dashboard"
    ]);
});
Route::get('/kasir/laporan', function () {
    return view('kasir.pages.laporan', [
        "title" => "Laporan"
    ]);
});


//route slug generate
Route::get('check_slug', function () {
    $slug = SlugService::createSlug(App\Models\Product::class, 'slug', request('name'));
    return response()->json(['slug' => $slug]);
});
