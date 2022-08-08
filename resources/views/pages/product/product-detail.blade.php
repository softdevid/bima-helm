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
                                <img src="{{ $product->url }}" class="img-fluid images" id="current" alt="#">
                            </div>
                            <div class="images">
                                <img src="{{ $product->url }}" class="img" alt="#">
                                {{-- @foreach ($images as $image)
                                <img src="{{ $image->url }}" class="img" alt="#">
                                @endforeach --}}
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
                            @if ($product->size_id != null)
                            XS:<span id="xs">{{ $product->size->xs }}</span> |
                            S:<span id="s">{{ $product->size->s }}</span> |
                            M:<span id="m">{{ $product->size->m }}</span> |
                            L:<span id="l">{{ $product->size->lg }}</span> |
                            XL:<span id="xl">{{ $product->size->xl }}</span> |
                            XXL:<span id="xxl">{{ $product->size->xxl }}</span>
                            @endif
                        </p>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">
                            Tertarik Beli
                        </button>
                    </div>
                </div>
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row justify-content-center row-cols-1 row-cols-md-2">
                                    <div class="col">
                                        <a href="https://shopee.co.id/bimahelm" target="_blank"></a>
                                        <div class="card border-0">
                                            <img src="/img/icons/shopee.png" class="card-img-top" alt="Shopee">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <a href="https://www.bukalapak.com/u/bimahelm?from=omnisearch&from_keyword_history=false&search_source=omnisearch_user&source=navbar"
                                            target="_blank"></a>
                                        <div class="card border-0">
                                            <img src="/img/icons/bukalapak.png" class="card-img-top" alt="Bukalapak">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <a href="https://www.tokopedia.com/bimahelm" target="_blank"></a>
                                        <div class="card border-0">
                                            <img src="/img/icons/tokped.png" class="card-img-top" alt="Tokopedia">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <a href="https://www.lazada.co.id/shop/bimahelm/?spm=a2o4j.pdp_revamp.seller.1.129f7470QEabzz&itemId=5590496509&channelSource=pdp"
                                            target="_blank"></a>
                                        <div class="card border-0">
                                            <img src="/img/icons/lazada.png" class="card-img-top" alt="Lazada">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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
                                <li>SEBELUM ORDER WAJIB MENANYAKAN KETERSEDIAAN BARANG TERLEBIH DAHULU KEPADA PENJUAL
                                </li>
                                <li>SEBELUM ORDER WAJIB MENGIKUTI PERATURAN TOKO, ONGKIR RETUR FULL DI TANGGUNG PEMBELI
                                </li>
                                <li>MEMBELI/ATC DIANGGAP SUDAH SETUJU & MEMBACA DESKRIPSI DENGAN LENGKAP</li>
                                <li>PASTIKAN UKURAN DAN WARNA</li>
                                <li>SEBELUM BARANG DIKIRIM AKAN KAMI CEK TERLEBIH DAHULU, KARENA KAMI TIDAK INGIN
                                    MENGECEWAKAN KONSUMEN</li>
                                <li>PACKING MENGGUNAKAN BUBBLE DAN KARDUS BOX HELM, dijamin barang aman saat pengiriman
                                </li>
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