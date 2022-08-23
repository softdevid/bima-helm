@extends('kasir.layouts.template')
@section('content')
    <section class="item-details section">
        <div class="top-area" style="margin-top: 5%;">
            <div class="row align-items-center">
                <div class="col-lg-5 col-md-12 col-12">
                    <div class="product-images">
                        <main id="gallery">
                            <div class="main-img">
                                <img src="{{ $products->url }}" class="img-fluid images" id="current" alt="#">
                            </div>
                        </main>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-12">
                    <div class="product-info">
                        <h5 class="title">Nama: {{ $products->name }}</h5>
                        <p class="category"><i class="lni lni-tag"></i>Kategori: {{ $products->category->name }}</p>
                        <h6 class="price info-text">Harga Beli: Rp.
                            {{ number_format($products->purchase_price, 0, ',', '.') }}
                        </h6>
                        <h6 class="price info-text">Harga Jual: Rp. {{ number_format($products->price, 0, ',', '.') }}
                        </h6>
                        @if ($products->size_id != null)
                            <div class="row">
                                <div class="col">XS: {{ $products->size->xs }}</div>
                                <div class="col">S: {{ $products->size->s }}</div>
                                <div class="col">LG: {{ $products->size->lg }}</div>
                            </div>
                            <div class="row">
                                <div class="col">M: {{ $products->size->m }}</div>
                                <div class="col">XL: {{ $products->size->xl }}</div>
                                <div class="col">XXL: {{ $products->size->xxl }}</div>
                            </div>
                            <p>Stok total: {{ $products->stock }}</p>
                        @endif
                        @auth
                        @endauth
                    </div>
                </div>
                <div class="col-lg-3 col-md-12 col-12">
                    <div class="product-details-info">
                        <div class="single-block">
                            <div class="row">
                                <div class="col-lg-12 col-12 mb-3">
                                    <div class="row info-body">
                                        <div class="col-12 col-md-12 mb-3 mb-md-0">
                                            <h4>Detail</h4>
                                            <ul class="normal-list">
                                                <li><span>Merek : </span>{{ $products->merk->name }}</li>
                                                <li><span>Jenis : </span>{{ $products->category->name }}</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <a href="{{ route('kasir-input.index') }}" class="btn btn-secondary mt-3"><i class="fa fa-circle-left"></i>
                Kembali</a>
        </div>
    </section>
@endsection
