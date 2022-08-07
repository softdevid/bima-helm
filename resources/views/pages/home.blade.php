@extends('layouts.main')
@section('content')
    <!-- Start Hero Area -->
    <section class="hero-area">
        <div class="container">
            <div class="row">
                <div class="col-12 mb-2">
                    <!-- Start Banner -->
                    <div class="single-banner right">
                        <img src="/img/tampak-depan.jpg" class="img-fluid w-100" alt="">
                    </div>
                    <!-- End Banner -->
                </div>
                <div class="col-md-4 col-12 custom-padding-right">
                    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            @foreach ($helmTopSell->take(3) as $index => $helmTop3)
                            <div class="carousel-item {{ ($index == 0) ? 'active' : '' }}">
                                <img src="{{ $helmTop3->url }}" class="d-block w-100" alt="">
                            </div>
                            @endforeach
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"
                                style="background-color: rgba(0, 0, 0, 0.4);"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"
                                style="background-color: rgba(0, 0, 0, 0.4);"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
                <div class="col-md-4 col-12">
                    <div class="card">
                        <img src="/img/Spoiler-KYT-K2R.jpeg" class="card-img" alt="...">
                        <div class="card-img-overlay d-flex align-items-end p-0">
                            <h5 class="card-title text-center text-white flex-fill p-2 mb-0"
                                style="background-color: rgba(0, 0, 0, 0.4);">Aksesoris</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-12">
                    <div class="card">
                        <img src="/img/BUSA-FULLSET-HELM-INK-CX-22.jpeg" class="card-img" alt="...">
                        <div class="card-img-overlay d-flex align-items-end p-0">
                            <h5 class="card-title text-center text-white flex-fill p-2 mb-0"
                                style="background-color: rgba(0, 0, 0, 0.4);">Sparepart</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Hero Area -->
    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>Kami Juga Tersedia di</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-3 d-flex justify-content-end align-items-center">
                    <a href="https://shopee.co.id/bimahelm" target="_blank" rel="noopener noreferrer">
                        <img src="/img/icons/shopee.png" class="img-fluid" alt="shopee">
                    </a>
                </div>
                <div class="col-3 d-flex justify-content-center align-items-center">
                    <a href="https://www.bukalapak.com/bimahelm" target="_blank" rel="noopener noreferrer">
                        <img src="/img/icons/bukalapak.png" class="img-fluid" alt="bukalapak">
                    </a>
                </div>
                <div class="col-3 d-flex justify-content-start align-items-center">
                    <a href="https://www.tokopedia.com/bimahelm" target="_blank" rel="noopener noreferrer">
                        <img src="/img/icons/tokped.png" class="img-fluid" alt="tokped">
                    </a>
                </div>
                <div class="col-3 d-flex justify-content-start align-items-center">
                    <a href="https://www.lazada.co.id/shop/bima-helm/" target="_blank" rel="noopener noreferrer">
                        <img src="/img/icons/lazada.png" class="img-fluid" alt="lazada">
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection
