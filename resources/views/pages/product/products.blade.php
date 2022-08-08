@extends('layouts.main')
@section('content')
@include('partials.breadcrumbs')
<!-- Start Product Grids -->
<section class="product-grids section">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-12">
                <!-- Start offcanvas filter -->
                <div class="col-12 d-md-none mb-4 mx-2">
                    <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas"
                        data-bs-target="#off-canvas-filter" aria-controls="off-canvas-filter">
                        Filter
                    </button>
                </div>
                <div class="offcanvas offcanvas-start" tabindex="-1" id="off-canvas-filter"
                    aria-labelledby="off-canvas-filterLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="off-canvas-filterLabel">Produk</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <button class="btn btn-primary w-100" type="button" data-bs-toggle="collapse"
                            data-bs-target="#coll-category" aria-expanded="false" aria-controls="coll-category">
                            Kategori
                        </button>
                        <div class="collapse my-1 show" id="coll-category">
                            <ul class="list-group">
                                <li class="list-group-item {{ is_null(request()->input('category')) ? 'active' : '' }}"><a href="/products" class="{{ is_null(request()->input('category')) ? 'text-light' : '' }}">Semua Produk</a></li>
                                @foreach ($categories as $category)
                                <li class="list-group-item">
                                    <a href="/products?category={{ $category->slug }}"
                                        class="{{ request()->input('category') === $category->slug ? 'active' : '' }}">{{
                                        $category->name }}</a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        @if (strpos(request()->input('category'), 'helm') !== false)
                        <div class="my-2"></div>
                        <button class="btn btn-primary w-100" type="button" data-bs-toggle="collapse"
                            data-bs-target="#coll-merk-helm" aria-expanded="false" aria-controls="coll-merk-helm">
                            Merek
                        </button>
                        <div class="collapse my-1" id="coll-merk-helm">
                            <ul class="list-group">
                                <li class="list-group-item">KYT</li>
                                <li class="list-group-item">INK</li>
                            </ul>
                        </div>
                        @endif
                    </div>
                </div>
                <!-- End offcanvas filter -->
                <!-- Start Single Widget -->
                <div class="single-widget search mb-3 mb-md-0">
                    <h3>Cari Produk</h3>
                    <form action="/products" method="GET">
                        @if (request('category'))
                        <input type="hidden" name="category" value="{{ request('category') }}">
                        @endif
                        <input type="text" name="search" placeholder="Cari...">
                        <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </form>
                </div>
                <!-- End Single Widget -->
                <!-- Start Product Sidebar -->
                <div class="product-sidebar my-md-3 d-none d-md-block">
                    <!-- Start Single Widget -->
                    <div class="single-widget">
                        <h3>Kategori</h3>
                        <ul class="list">
                            <li>
                                <a href="/products"
                                    class="{{ is_null(request()->input('category')) ? 'text-primary' : '' }}">Semua
                                    Produk</a>
                            </li>
                            @foreach ($categories as $category)
                            <li>
                                <a href="/products?category={{ $category->slug }}"
                                    class="{{ request()->input('category') === $category->slug ? 'text-primary' : '' }}">{{
                                    $category->name }}</a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <!-- End Single Widget -->
                    @if (strpos(request()->input('category'), 'helm') !== false)
                    <!-- Start Single Widget -->
                    <div class="single-widget condition mt-md-3">
                        <h3>Berdasarkan Merek</h3>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault11">
                            <label class="form-check-label" for="flexCheckDefault11">
                                KYT
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault11">
                            <label class="form-check-label" for="flexCheckDefault11">
                                INK
                            </label>
                        </div>
                    </div>
                    <!-- End Single Widget -->
                    @endif
                </div>
                <!-- End Product Sidebar -->
            </div>
            <div class="col-lg-9 col-12">
                <div class="product-grids-head">
                    <div class="product-grid-topbar">
                        <div class="row align-items-center">
                            <div class="col-12">
                                <div class="product-sorting">
                                    <label for="sorting">Berdasarkan:</label>
                                    <select class="form-control" id="sorting" name="sort_by">
                                        {{-- <option value="sold">Terlaris</option> --}}
                                        <option value="latest">Terbaru</option>
                                        <option value="asc">Murah - Mahal</option>
                                        <option value="desc">Mahal - Murah</option>
                                    </select>
                                    <h3 class="total-show-product">
                                        Menampilkan: <span>{{ $products->firstItem() }} - {{ $products->lastItem() }}
                                            produk dari total {{ $products->total() }}</span>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="data-products">
                        @include('pages.product.product-data-grids')
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Product Grids -->
@endsection
