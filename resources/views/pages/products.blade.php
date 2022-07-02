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

                    <div class="offcanvas offcanvas-start" tabindex="-1" id="off-canvas-filter"
                        aria-labelledby="off-canvas-filterLabel">
                        <div class="offcanvas-header">
                            <h5 class="offcanvas-title" id="off-canvas-filterLabel">Offcanvas</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                                aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body">
                            <div class="dropdown mt-3">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                                    data-bs-toggle="dropdown">
                                    Dropdown button
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End offcanvas filter -->
                <!-- Start Single Widget -->
                <div class="single-widget search">
                    <h3>Cari Produk</h3>
                    <form action="#">
                        <input type="text" placeholder="Cari...">
                        <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </form>
                </div>
                <!-- End Single Widget -->
                <!-- Start Product Sidebar -->
                <div class="product-sidebar d-none d-md-block">
                    <!-- Start Single Widget -->
                    <div class="single-widget">
                        <h3>Kategori</h3>
                        <ul class="list">
                            <li>
                                <a href="#">Semua Produk</a>
                            </li>
                            <li>
                                <a href="#">Helm Full Face</a>
                            </li>
                            <li>
                                <a href="#">Helm Half Face</a>
                            </li>
                            <li>
                                <a href="#">Spoiler</a>
                            </li>
                            <li>
                                <a href="#">Visor</a>
                            </li>
                            <li>
                                <a href="#">Spare Parts</a>
                            </li>
                            <li>
                                <a href="#">Lainnya</a>
                            </li>
                        </ul>
                    </div>
                    <!-- End Single Widget -->
                    <!-- Start Single Widget -->
                    <div class="single-widget condition">
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
                                    <select class="form-control" id="sorting">
                                        <option>Terlaris</option>
                                        <option>Murah - Mahal</option>
                                        <option>Mahal - Murah</option>
                                    </select>
                                    <h3 class="total-show-product">Showing: <span>1 - 12 items</span></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-list" role="tabpanel"
                            aria-labelledby="nav-list-tab">
                            <div class="row">
                                <div class="col-lg-4 col-md-6 col-sm-12">
                                    <!-- Start Single Product -->
                                    <div class="single-product">
                                        <div class="row align-items-center">
                                            <div class="col-lg-12 col-md-12 col-4">
                                                <div class="product-image">
                                                    <img src="https://via.placeholder.com/335x335" alt="#">
                                                    <div class="button">
                                                        <a href="product-details.html" class="btn"><i
                                                                class="lni lni-cart"></i> Add to
                                                            Cart</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12 col-8">
                                                <div class="product-info">
                                                    <span class="category">Watches</span>
                                                    <h4 class="title">
                                                        <a href="product-grids.html">Xiaomi Mi Band 5</a>
                                                    </h4>
                                                    <ul class="review">
                                                        <li><i class="lni lni-star-filled"></i></li>
                                                        <li><i class="lni lni-star-filled"></i></li>
                                                        <li><i class="lni lni-star-filled"></i></li>
                                                        <li><i class="lni lni-star-filled"></i></li>
                                                        <li><i class="lni lni-star"></i></li>
                                                        <li><span>4.0 Review(s)</span></li>
                                                    </ul>
                                                    <div class="price">
                                                        <span>$199.00</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Product -->
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-12">
                                    <!-- Start Single Product -->
                                    <div class="single-product">
                                        <div class="row align-items-center">
                                            <div class="col-lg-12 col-md-12 col-4">
                                                <div class="product-image">
                                                    <img src="https://via.placeholder.com/335x335" alt="#">
                                                    <div class="button">
                                                        <a href="product-details.html" class="btn"><i
                                                                class="lni lni-cart"></i> Add to
                                                            Cart</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12 col-8">
                                                <div class="product-info">
                                                    <span class="category">Watches</span>
                                                    <h4 class="title">
                                                        <a href="product-grids.html">Xiaomi Mi Band 5</a>
                                                    </h4>
                                                    <ul class="review">
                                                        <li><i class="lni lni-star-filled"></i></li>
                                                        <li><i class="lni lni-star-filled"></i></li>
                                                        <li><i class="lni lni-star-filled"></i></li>
                                                        <li><i class="lni lni-star-filled"></i></li>
                                                        <li><i class="lni lni-star"></i></li>
                                                        <li><span>4.0 Review(s)</span></li>
                                                    </ul>
                                                    <div class="price">
                                                        <span>$199.00</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Product -->
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-12">
                                    <!-- Start Single Product -->
                                    <div class="single-product">
                                        <div class="row align-items-center">
                                            <div class="col-lg-12 col-md-12 col-4">
                                                <div class="product-image">
                                                    <img src="https://via.placeholder.com/335x335" alt="#">
                                                    <div class="button">
                                                        <a href="product-details.html" class="btn"><i
                                                                class="lni lni-cart"></i> Add to
                                                            Cart</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12 col-8">
                                                <div class="product-info">
                                                    <span class="category">Watches</span>
                                                    <h4 class="title">
                                                        <a href="product-grids.html">Xiaomi Mi Band 5</a>
                                                    </h4>
                                                    <ul class="review">
                                                        <li><i class="lni lni-star-filled"></i></li>
                                                        <li><i class="lni lni-star-filled"></i></li>
                                                        <li><i class="lni lni-star-filled"></i></li>
                                                        <li><i class="lni lni-star-filled"></i></li>
                                                        <li><i class="lni lni-star"></i></li>
                                                        <li><span>4.0 Review(s)</span></li>
                                                    </ul>
                                                    <div class="price">
                                                        <span>$199.00</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Product -->
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-12">
                                    <!-- Start Single Product -->
                                    <div class="single-product">
                                        <div class="row align-items-center">
                                            <div class="col-lg-12 col-md-12 col-4">
                                                <div class="product-image">
                                                    <img src="https://via.placeholder.com/335x335" alt="#">
                                                    <div class="button">
                                                        <a href="product-details.html" class="btn"><i
                                                                class="lni lni-cart"></i> Add to
                                                            Cart</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12 col-8">
                                                <div class="product-info">
                                                    <span class="category">Watches</span>
                                                    <h4 class="title">
                                                        <a href="product-grids.html">Xiaomi Mi Band 5</a>
                                                    </h4>
                                                    <ul class="review">
                                                        <li><i class="lni lni-star-filled"></i></li>
                                                        <li><i class="lni lni-star-filled"></i></li>
                                                        <li><i class="lni lni-star-filled"></i></li>
                                                        <li><i class="lni lni-star-filled"></i></li>
                                                        <li><i class="lni lni-star"></i></li>
                                                        <li><span>4.0 Review(s)</span></li>
                                                    </ul>
                                                    <div class="price">
                                                        <span>$199.00</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Product -->
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <!-- Pagination -->
                                    <div class="pagination left">
                                        <ul class="pagination-list">
                                            <li class="active"><a href="javascript:void(0)">1</a></li>
                                            <li><a href="javascript:void(0)">2</a></li>
                                            <li><a href="javascript:void(0)">3</a></li>
                                            <li><a href="javascript:void(0)">4</a></li>
                                            <li><a href="javascript:void(0)"><i class="fa-solid fa-angle-right"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <!--/ End Pagination -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Product Grids -->
@endsection
