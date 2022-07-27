<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartNWishController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\MerkController;
use Illuminate\Support\Facades\Route;
use Cviebrock\EloquentSluggable\Services\SlugService;

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

Route::get('/login', [HomeController::class, 'login'])
    ->middleware('guest')
    ->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout']);
Route::get('/register', [HomeController::class, 'register'])->middleware('guest');
Route::post('/register', [AuthController::class, 'registration']);

Route::post('/indonesia/provinces', [RegionController::class, 'provinces']);
Route::post('/indonesia/cities', [RegionController::class, 'cities']);
Route::post('/indonesia/districts', [RegionController::class, 'districts']);
Route::post('/indonesia/villages', [RegionController::class, 'villages']);
Route::post('/indonesia/villages/postalCode', [RegionController::class, 'postalCode']);

Route::get('/faq', [HomeController::class, 'faq']);
Route::get('/tentang-kami', [HomeController::class, 'tentangkami']);
Route::get('/cara-belanja', [HomeController::class, 'carabelanja']);
Route::get('/contact', [HomeController::class, 'contact']);

Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/details/{product:slug}', [ProductController::class, 'detail']);

Route::get('/cart', [CartNWishController::class, 'indexCart']);
Route::get('/cart-add', [CartNWishController::class, 'cartAdd']);
Route::get('/cart-remove', [CartNWishController::class, 'cartRemove']);
Route::get('/cart-removeAll', [CartNWishController::class, 'cartRemoveAll']);
Route::get(
    '/fav',
    fn () => view('pages.cart', [
        'title' => 'Produk yang disukai',
    ]),
)->middleware('auth');

Route::get('/checkout', function () {

    if(count(\Cart::instance('cart')->content()) == 0) {
        return redirect('/products');
    }

    return view('pages.checkout', [
        'title' => 'Checkout',
    ]);
})->middleware('auth');

//route slug generate
Route::get('check_slug', function () {
    $slug = SlugService::createSlug(App\Models\Product::class, 'slug', request('name'));
    return response()->json(['slug' => $slug]);
});


Route::middleware(['auth', 'isAdmin'])->group(function () {

    //rout admin product
    Route::get('/admin/product', [AdminProductController::class, 'index']);
    Route::get('/admin/product/create', [AdminProductController::class, 'create']);
    Route::post('/admin/product/store', [AdminProductController::class, 'store']);

    //route admin
    // Route::resource('/admin/merk', MerkController::class);
    Route::get('/admin/merk', [MerkController::class, 'index']);
    Route::post('/admin/merk/store', [MerkController::class, 'store']);
    // Route::get('/admin/merk/delete/{id}', [MerkController::class, 'destroy']);
    Route::post('/admin/merk/delete/{id}', [MerkController::class, 'destroy']);

    //route admin
    Route::get('/admin/dashboard', function () {
        return view('admin.pages.index', [
            'title' => 'Dashboard',
        ]);
    });

    Route::get('/admin/users', [AdminController::class, 'users']);
    Route::get('/admin/orders', [AdminController::class, 'orders']);

    //KASIR
    Route::get('/kasir/dashboard', function () {
        return view('kasir.pages.index', [
            'title' => 'Dashboard',
        ]);
    });
    Route::get('/kasir/laporan', function () {
        return view('kasir.pages.laporan', [
            'title' => 'Laporan',
        ]);
    });
});

Route::get('/my-account', [AccountController::class, 'index']);
