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
                                <img src="/img/{{ $product->image }}" id="current" alt="#">
                            </div>
                            <div class="images">
                                <img src="/img/kyt-tt-course-plain-mat-black.jpeg" class="img" alt="#">
                                <img src="/img/KYT-C5-IANONE-WHITE.jpeg" class="img" alt="#">
                                <img src="/img/HELM-FULLFACE-KYT-RC-SEVEN-14-YELLOW-FLUO.jpeg" class="img" alt="#">
                                <img src="/img/KYT-RC-SEVEN-17-BLACK-DOFT-GOLD.jpeg" class="img" alt="#">
                            </div>
                        </main>
                    </div>
                </div>
                <div class="col-lg-7 col-md-12 col-12">
                    <div class="product-info">
                        <h2 class="title">{{ $product->name }}</h2>
                        <p class="category"><i class="lni lni-tag"></i>{{ $product->category->name }}</p>
                        <h3 class="price">Rp{{ $product->price }}</h3>
                        <p class="info-text">Stok: <span></span></p>
                        <div class="row">
                            <div class="col-5 col-sm-6 col-md-3 col-lg-4">
                                <div class="form-group">
                                    <label for="size">Pilih Ukuran</label>
                                    <select class="form-control" id="size">
                                        <option value="xs">XS</option>
                                        <option value="xs">S</option>
                                        <option value="xs" selected>M</option>
                                        <option value="xs">L</option>
                                        <option value="xs">XL</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-7 col-sm-6 col-md-4 col-lg-5">
                                <div class="d-block quantity">
                                    <label for="quantity">Kuantitas</label>
                                    <div class="input-group ">
                                        <button class="btn btn-outline-primary quantity-minus" type="button">
                                            <i class="fa-solid fa-minus"></i>
                                        </button>
                                        <input type="number" id="quantity" name="quantity" class="form-control text-center" value="1" min="1" max="100">
                                        <button class="btn btn-outline-primary quantity-plus" type="button">
                                            <i class="fa-solid fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bottom-content">
                            <div class="row align-items-end">
                                <div class="col-10 col-sm-6 col-md-4 col-lg-6 col-xl-4">
                                    <div class="button cart-button">
                                        <button class="btn" style="width: 100%;">
                                            <i class="fa-regular fa-cart-shopping"></i>
                                            Masukkan Keranjang
                                        </button>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="wish-button">
                                        <button class="btn">
                                            <i class="fa-regular fa-heart"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                                    <li><span>Merek: </span>{{ $product->merk }}</li>
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
