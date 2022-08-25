<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\MerkController;
use App\Http\Controllers\KasirController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\GudangController;
use Illuminate\Support\Facades\Route;
use Cviebrock\EloquentSluggable\Services\SlugService;

Route::get('/', [HomeController::class, 'index']);

Route::get('/login', [HomeController::class, 'login'])
    ->middleware('guest')
    ->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout']);

Route::get('/faq', [HomeController::class, 'faq']);
Route::get('/tentang-kami', [HomeController::class, 'tentangkami']);
Route::get('/gallery', [HomeController::class, 'gallery']);
Route::get('/contact', [HomeController::class, 'contact']);

Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/details/{product:slug}', [ProductController::class, 'detail']);
//route slug generate
Route::get('check_slug', function () {
    $slug = SlugService::createSlug(App\Models\Product::class, 'slug', request('name'));
    return response()->json(['slug' => $slug]);
});


Route::middleware(['auth', 'isAdmin'])->group(function () {

    //rout admin product

    Route::resource('admin-product', AdminProductController::class);
    Route::resource('admin-gudang', GudangController::class);
    Route::delete('/deletecover/{id}', [AdminProductController::class, 'deletecover']);
    Route::delete('/deleteimages/{id}', [AdminProductController::class, 'deleteimages']);
    //route admin
    Route::resource('admin-merk', MerkController::class);
    Route::get('/admin/merk/delete/{id}', [MerkController::class, 'destroy']);

    //route admin dashboard
    Route::get('admin-dashboard', [AdminController::class, 'index']);

    // Route::get('/admin/users', [AdminController::class, 'users']);
    // Route::get('/admin/orders', [AdminController::class, 'orders']);
    Route::resource('kasir-input', KasirController::class);
    Route::resource('laporan', LaporanController::class);
    Route::get('/kasir-dashboard', [KasirController::class, 'dashboard']);
    Route::get('/laporan-search', [LaporanController::class, 'index']);
    Route::post('/laporan/harian', [LaporanController::class, 'laporan_harian']);
    Route::post('/laporan/bulanan', [LaporanController::class, 'laporan_bulanan']);
    Route::post('/laporan/tahunan', [LaporanController::class, 'laporan_tahunan']);
    Route::post('/laporan/merk', [LaporanController::class, 'laporan_merk']);
    Route::post('/laporan/size-name', [LaporanController::class, 'laporan_sizename']);
});
Route::get('/chart', [LaporanController::class, 'chart']);
