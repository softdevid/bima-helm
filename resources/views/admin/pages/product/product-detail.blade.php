@extends('admin.layouts.template')
@section('content')

<section class="item-details section">
    
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
                                    @foreach ($images as $images)
                                        <img src="{{ $images->url }}" class="img" alt="#">
                                    @endforeach                                    
                            </div>
                        </main>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-12">
                    <div class="product-info">
                        <h5 class="title">Nama: {{ $product->name }}</h5>
                        <p class="category"><i class="lni lni-tag"></i>Kategori: {{ $product->category->name }}</p>
                        <h5 class="price">Harga: Rp. {{ number_format($product->price,0,',','.') }}</h5>
                        <p class="info-text">Stok total: {{ $product->stock }}</p>
                            @if ($product->size_id != null)                       
                            <div class="row">
                                <div class="col">XS: {{ $product->size->xs }}</div>
                                <div class="col">S: {{ $product->size->s }}</div>
                                <div class="col">LG: {{ $product->size->lg }}</div>
                            </div>
                            <div class="row">                            
                                <div class="col">M: {{ $product->size->m }}</div>
                                <div class="col">XL: {{ $product->size->xl }}</div>
                                <div class="col">XXL: {{ $product->size->xxl }}</div>
                            </div>                            
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
                                                <li><span>Merek: </span>{{ $product->merk->name ?? '' }}</li>
                                                <li><span>Jenis: </span>{{ $product->category->name }}</li>
                                                <li><span>Dikirim Dari:</span> Kab. Purbalingga</li>
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
        <a href="{{ route('admin-product.index') }}" class="btn btn-secondary"><i class="fa fa-circle-left"></i> Kembali</a>
    
</section>
@endsection
