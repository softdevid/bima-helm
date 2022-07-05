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
                                <img src="/img/kyt-tt-course-plain-mat-black.jpeg" id="current" alt="#">
                            </div>
                            <div class="images">
                                <img src="/img/kyt-tt-course-plain-mat-black.jpeg" class="img" alt="#">
                                <img src="/img/kyt-tt-course-plain-mat-black.jpeg" class="img" alt="#">
                                <img src="/img/kyt-tt-course-plain-mat-black.jpeg" class="img" alt="#">
                                <img src="/img/kyt-tt-course-plain-mat-black.jpeg" class="img" alt="#">
                            </div>
                        </main>
                    </div>
                </div>
                <div class="col-lg-7 col-md-12 col-12">
                    <div class="product-info">
                        <h2 class="title">KYT TT COURSE PLAIN MATT BLACK</h2>
                        <p class="category"><i class="lni lni-tag"></i>Helm Full Face</p>
                        <h3 class="price">Rp1.700.000</h3>
                        <p class="info-text">Stok: <span>10</span></p>
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-12">
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
                            <div class="col-lg-3 col-md-3 col-12">
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
                                <div class="col-lg-4 col-md-4 col-12">
                                    <div class="button cart-button">
                                        <button class="btn" style="width: 100%;">
                                            <i class="fa-regular fa-cart-shopping"></i>
                                            Masukkan Keranjang
                                        </button>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-4 col-12">
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
                    <div class="col-lg-6 col-12">
                        <div class="info-body">
                            <h4>Detail</h4>
                            <ul class="normal-list">
                                <li><span>Merek:</span> KYT</li>
                                <li><span>Jenis Helm:</span> Full Face</li>
                                <li><span>Dikirim Dari:</span> Kab. Purbalingga</li>
                            </ul>
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
                    <div class="col-lg-6 col-12">
                        <div class="info-body custom-responsive-margin">
                            <h4>NB :</h4>
                            <li>SEBELUM ORDER WAJIB MENANYAKAN KETERSEDIAAN BARANG TERLEBIH DAHULU KEPADA PENJUAL</li>
                            <li>SEBELUM ORDER WAJIB MENGIKUTI PERATURAN TOKO, ONGKIR RETUR FULL DI TANGGUNG PEMBELI</li>
                            <li>MEMBELI/ATC DIANGGAP SUDAH SETUJU & MEMBACA DESKRIPSI DENGAN LENGKAP</li>
                            <li>PASTIKAN UKURAN DAN WARNA</li>
                            <li>SEBELUM BARANG DIKIRIM AKAN KAMI CEK TERLEBIH DAHULU, KARENA KAMI TIDAK INGIN MENGECEWAKAN KONSUMEN</li>
                            <li>PACKING MENGGUNAKAN BUBBLE DAN KARDUS BOX HELM, dijamin barang aman saat pengiriman</li>
                            <li>TERIMAKASIH :D</li>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Item Details -->
@endsection
