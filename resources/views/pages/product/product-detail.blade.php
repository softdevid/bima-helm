@extends('layouts.main')
@section('content')
@include('partials.breadcrumbs')
<!-- Start Item Details -->
<section class="item-details section">
    <div class="container">
        <div class="top-area">
            <div class="row align-items-center">
                <div class="col-lg-5 col-md-12 col-12">
                    <div class="product-images">
                        <main id="gallery">
                            <div class="main-img">
                                <img src="/img/{{ $product->image->img_dt_1 }}" id="current" alt="#">
                            </div>
                            <div class="images">
                                <img src="/img/{{ $product->image->img_dt_1 }}" class="img" alt="#">
                                <img src="/img/{{ $product->image->img_dt_2 }}" class="img" alt="#">
                                <img src="/img/{{ $product->image->img_dt_3 }}" class="img" alt="#">
                                <img src="/img/{{ $product->image->img_dt_4 }}" class="img" alt="#">
                            </div>
                        </main>
                    </div>
                </div>
                <div class="col-lg-7 col-md-12 col-12">
                    <div class="product-info">
                        <h2 class="title">{{ $product->name }}</h2>
                        <p class="category"><i class="lni lni-tag"></i>{{ $product->category->name }}</p>
                        <h3 class="price">Rp{{ number_format($product->price,0,',','.') }}</h3>
                        <p class="info-text">Stok total: <span>{{ $product->stock }}</span> <br>
                            XS:<span id="xs">{{ $product->size->xs }}</span> |
                            S:<span id="s">{{ $product->size->s }}</span> |
                            M:<span id="m">{{ $product->size->m }}</span> |
                            L:<span id="l">{{ $product->size->lg }}</span> |
                            XL:<span id="xl">{{ $product->size->xl }}</span> |
                            XXL:<span id="xxl">{{ $product->size->xxl }}</span>
                        </p>
                        @auth
                        <div class="row">
                            <div class="col-5 col-sm-6 col-md-3 col-lg-4">
                                <div class="form-group">
                                    <label for="size">Pilih Ukuran</label>
                                    <select class="form-control" id="size">
                                        <option value="">Ukuran</option>
                                        <option value="xs" @if($product->size->xs == 0) {{ 'disabled' }} @endif>XS</option>
                                        <option value="s" @if($product->size->s == 0) {{ 'disabled' }} @endif>S</option>
                                        <option value="m" @if($product->size->m == 0) {{ 'disabled' }} @endif>M</option>
                                        <option value="l" @if($product->size->lg == 0) {{ 'disabled' }} @endif>L</option>
                                        <option value="xl" @if($product->size->xl == 0) {{ 'disabled' }} @endif>XL</option>
                                        <option value="xxl" @if($product->size->xxl == 0) {{ 'disabled' }} @endif>XXL</option>
                                    </select>
                                    <div id="size" class="invalid-feedback">
                                        Pilih salah satu ukuran
                                    </div>
                                </div>
                            </div>
                            <div class="col-7 col-sm-6 col-md-4 col-lg-5">
                                <div class="d-block quantity">
                                    <label for="quantity">Kuantitas</label>
                                    <div class="input-group ">
                                        <button class="btn btn-outline-primary quantity-minus" type="button" style="position: initial">
                                            <i class="fa-solid fa-minus"></i>
                                        </button>
                                        <input type="text" id="quantity" name="quantity" class="form-control text-center" value="1" min="1" max="1">
                                        <button class="btn btn-outline-primary quantity-plus" type="button" style="position: initial">
                                            <i class="fa-solid fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bottom-content">
                            <div class="row align-items-end">
                                <div class="col-lg-2 col-md-4 col-2">
                                    <div class="button cart-button">
                                        <button class="btn btn-outline-primary" id="btnCart" style="width: 100%;" onclick="btnCart({{ $product->id }}, '{{ $product->name }}', {{ $product->price }}, '{{ $product->image->img_dt_1 }}')">
                                            <i class="fa-regular fa-cart-plus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-4 col-2">
                                    <div class="wish-button">
                                        <button class="btn btn-outline-primary">
                                            <i class="fa-regular fa-heart"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
        <div class="product-details-info">
            <div class="single-block">
                <div class="row">
                    <div class="col-lg-6 col-12 mb-3">
                        <div class="row info-body">
                            <div class="col-12 col-md-6 mb-3 mb-md-0">
                                <h4>Detail</h4>
                                <ul class="normal-list">
                                    <li><span>Merek: </span>{{ $product->merk->name ?? '' }}</li>
                                    <li><span>Jenis: </span>{{ $product->category->name }}</li>
                                    <li><span>Dikirim Dari:</span> Kab. Purbalingga</li>
                                </ul>
                            </div>
                            <div class="col-12 col-md-6">
                                <h4>Spesifikasi</h4>
                                <ul class="normal-list">
                                    <li>Terdapat barcode original</li>
                                    <li>Original SNI berlogo asli</li>
                                    <li>Busa Tebal, Empuk & dapat di cuci</li>
                                    <li>Model & warna Best Seller</li>
                                    <li>Free sarung helm</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-12">
                        <div class="info-body custom-responsive-margin">
                            <h4>NB :</h4>
                            <ul class="features">
                                <li>SEBELUM ORDER WAJIB MENANYAKAN KETERSEDIAAN BARANG TERLEBIH DAHULU KEPADA PENJUAL</li>
                                <li>SEBELUM ORDER WAJIB MENGIKUTI PERATURAN TOKO, ONGKIR RETUR FULL DI TANGGUNG PEMBELI</li>
                                <li>MEMBELI/ATC DIANGGAP SUDAH SETUJU & MEMBACA DESKRIPSI DENGAN LENGKAP</li>
                                <li>PASTIKAN UKURAN DAN WARNA</li>
                                <li>SEBELUM BARANG DIKIRIM AKAN KAMI CEK TERLEBIH DAHULU, KARENA KAMI TIDAK INGIN MENGECEWAKAN KONSUMEN</li>
                                <li>PACKING MENGGUNAKAN BUBBLE DAN KARDUS BOX HELM, dijamin barang aman saat pengiriman</li>
                                <li>TERIMAKASIH :D</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Item Details -->
@endsection
