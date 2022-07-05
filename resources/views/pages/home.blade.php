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
            <div class="col-lg-7 col-12 custom-padding-right">
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
                    <div class="carousel-indicators">
                      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <img src="/img/HELM-FULLFACE-KYT-RC-SEVEN-14-YELLOW-FLUO.jpeg" class="d-block w-100" alt="...">
                      </div>
                      <div class="carousel-item">
                        <img src="/img/HELM-FULLFACE-KYT-RC-SEVEN-14-YELLOW-FLUO.jpeg" class="d-block w-100" alt="...">
                      </div>
                      <div class="carousel-item">
                        <img src="/img/HELM-FULLFACE-KYT-RC-SEVEN-14-YELLOW-FLUO.jpeg" class="d-block w-100" alt="...">
                      </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Next</span>
                    </button>
                  </div>
            </div>
            <div class="col-lg-5 col-12">
                <div class="row">
                    <div class="col-lg-12 col-md-6 col-12 md-custom-padding">
                        <!-- Start Small Banner -->
                        <div class="hero-small-banner d-flex align-items-end" style="background-image: url('/img/Spoiler-KYT-K2R.jpeg');">
                            <div class="flex-fill">
                                <button class="btn btn-primary w-100" type="button">Aksesoris</button>
                            </div>
                        </div>
                        <!-- End Small Banner -->
                    </div>
                    <div class="col-lg-12 col-md-6 col-12 mt-2 mt-md-0 mt-lg-2">
                        <!-- Start Small Banner -->
                        <div class="hero-small-banner d-flex align-items-end" style="background-image: url('/img/BUSA-FULLSET-HELM-INK-CX-22.jpeg');">
                            <div class="flex-fill">
                                <button class="btn btn-primary w-100" type="button">Spare Parts</button>
                            </div>
                        </div>
                        <!-- End Small Banner -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Hero Area -->

<!-- Start Featured Categories Area -->
<section class="featured-categories section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h2>Kategori Helm</h2>
                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have
                        suffered alteration in some form.</p>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-2 col-md-3 col-6">
                <div class="card">
                    <div class="images card-img-top">
                        <img src="https://via.placeholder.com/200x180" alt="#">
                    </div>
                    <div class="card-body">
                        <p class="card-text fs-5 text-center">Full Face</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-6">
                <div class="card">
                    <div class="images card-img-top">
                        <img src="https://via.placeholder.com/200x180" alt="#">
                    </div>
                    <div class="card-body">
                        <p class="card-text fs-5 text-center">Half Face</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-6 mt-3 mt-md-0">
                <div class="card">
                    <div class="images card-img-top">
                        <img src="https://via.placeholder.com/200x180" alt="#">
                    </div>
                    <div class="card-body">
                        <p class="card-text fs-5 text-center">Helm Anak</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Features Area -->

<!-- Start Trending Product Area -->
<section class="topsell-product section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h2>Produk Top Seller</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-8 mb-1 mb-md-0">
                <ul class="nav nav-tabs">
                    <li class="nav-item"><a class="tabs-carousel nav-link active" href="#helm-topsell" data-bs-toggle="tab">Helm</a></li>
                    <li class="nav-item"><a class="tabs-carousel nav-link" href="#aksesoris-topsell" data-bs-toggle="tab">Aksessoris</a></li>
                    <li class="nav-item"><a class="tabs-carousel nav-link" href="#spareparts-topsell" data-bs-toggle="tab">Spare Parts</a></li>
                </ul>
            </div>
            <div class="col-4 text-end">
                <a href="#carousel-helm-topsell" class="btn-carousel btn btn-primary mb-3 ms-1" role="button" data-bs-slide="prev">
                    <i class="fa-solid fa-arrow-left"></i>
                </a>
                <a href="#carousel-helm-topsell" class="btn-carousel btn btn-primary mb-3" role="button" data-bs-slide="next">
                    <i class="fa-solid fa-arrow-right"></i>
                </a>
            </div>
            <div class="col-12">
                <div class="tab-content">
                    <div id="helm-topsell" class="carousel-tab tab-pane fade-in active">
                        <div class="carousel slide" id="carousel-helm-topsell" data-bs-interval="false">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <div class="row">
                                        <div class="col-6 col-md-3 col-lg-2 mb-2">
                                            <div class="card">
                                                <img src="https://via.placeholder.com/200x200" alt="" class="img-fluid">
                                                <div class="card-body">
                                                    <div class="text-dark card-title">KYT TT Course</div>
                                                    <p class="card-text">Rp.700.000,00</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 col-md-3 col-lg-2 mb-2">
                                            <div class="card">
                                                <img src="https://via.placeholder.com/200x200" alt="" class="img-fluid">
                                                <div class="card-body">
                                                    <div class="text-dark card-title">KYT TT Course</div>
                                                    <p class="card-text">Rp.700.000,00</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 col-md-3 col-lg-2 mb-2">
                                            <div class="card">
                                                <img src="https://via.placeholder.com/200x200" alt="" class="img-fluid">
                                                <div class="card-body">
                                                    <div class="text-dark card-title">KYT TT Course</div>
                                                    <p class="card-text">Rp.700.000,00</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 col-md-3 col-lg-2 mb-2">
                                            <div class="card">
                                                <img src="https://via.placeholder.com/200x200" alt="" class="img-fluid">
                                                <div class="card-body">
                                                    <div class="text-dark card-title">KYT TT Course</div>
                                                    <p class="card-text">Rp.700.000,00</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 col-md-3 col-lg-2 mb-2">
                                            <div class="card">
                                                <img src="https://via.placeholder.com/200x200" alt="" class="img-fluid">
                                                <div class="card-body">
                                                    <div class="text-dark card-title">KYT TT Course</div>
                                                    <p class="card-text">Rp.700.000,00</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 col-md-3 col-lg-2 mb-2">
                                            <div class="card">
                                                <img src="https://via.placeholder.com/200x200" alt="" class="img-fluid">
                                                <div class="card-body">
                                                    <div class="text-dark card-title">KYT TT Course</div>
                                                    <p class="card-text">Rp.700.000,00</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="row">
                                        <div class="col-6 col-md-3 col-lg-2 mb-2">
                                            <div class="card">
                                                <img src="https://via.placeholder.com/200x200" alt="" class="img-fluid">
                                                <div class="card-body">
                                                    <div class="text-dark card-title">KYT TT Course</div>
                                                    <p class="card-text">Rp.700.000,00</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 col-md-3 col-lg-2 mb-2">
                                            <div class="card">
                                                <img src="https://via.placeholder.com/200x200" alt="" class="img-fluid">
                                                <div class="card-body">
                                                    <div class="text-dark card-title">KYT TT Course</div>
                                                    <p class="card-text">Rp.700.000,00</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 col-md-3 col-lg-2 mb-2">
                                            <div class="card">
                                                <img src="https://via.placeholder.com/200x200" alt="" class="img-fluid">
                                                <div class="card-body">
                                                    <div class="text-dark card-title">KYT TT Course</div>
                                                    <p class="card-text">Rp.700.000,00</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 col-md-3 col-lg-2 mb-2">
                                            <div class="card">
                                                <img src="https://via.placeholder.com/200x200" alt="" class="img-fluid">
                                                <div class="card-body">
                                                    <div class="text-dark card-title">KYT TT Course</div>
                                                    <p class="card-text">Rp.700.000,00</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 col-md-3 col-lg-2 mb-2">
                                            <div class="card">
                                                <img src="https://via.placeholder.com/200x200" alt="" class="img-fluid">
                                                <div class="card-body">
                                                    <div class="text-dark card-title">KYT TT Course</div>
                                                    <p class="card-text">Rp.700.000,00</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 col-md-3 col-lg-2 mb-2">
                                            <div class="card">
                                                <img src="https://via.placeholder.com/200x200" alt="" class="img-fluid">
                                                <div class="card-body">
                                                    <div class="text-dark card-title">KYT TT Course</div>
                                                    <p class="card-text">Rp.700.000,00</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="aksesoris-topsell" class="carousel-tab tab-pane fade-in">
                        <div class="carousel slide" id="carousel-aksesoris-topsell" data-bs-interval="false">
                            <div class="carousel-inner">
                                <div class="carousel-item carousel-content active">
                                    <div class="row">
                                        <div class="col-6 col-md-3 col-lg-2 mb-2">
                                            <div class="card">
                                                <img src="https://via.placeholder.com/200x200" alt="" class="img-fluid">
                                                <div class="card-body">
                                                    <div class="text-dark card-title">Spoiler</div>
                                                    <p class="card-text">Rp.700.000,00</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 col-md-3 col-lg-2 mb-2">
                                            <div class="card">
                                                <img src="https://via.placeholder.com/200x200" alt="" class="img-fluid">
                                                <div class="card-body">
                                                    <div class="text-dark card-title">Spoiler</div>
                                                    <p class="card-text">Rp.700.000,00</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 col-md-3 col-lg-2 mb-2">
                                            <div class="card">
                                                <img src="https://via.placeholder.com/200x200" alt="" class="img-fluid">
                                                <div class="card-body">
                                                    <div class="text-dark card-title">Spoiler</div>
                                                    <p class="card-text">Rp.700.000,00</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 col-md-3 col-lg-2 mb-2">
                                            <div class="card">
                                                <img src="https://via.placeholder.com/200x200" alt="" class="img-fluid">
                                                <div class="card-body">
                                                    <div class="text-dark card-title">Spoiler</div>
                                                    <p class="card-text">Rp.700.000,00</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 col-md-3 col-lg-2 mb-2">
                                            <div class="card">
                                                <img src="https://via.placeholder.com/200x200" alt="" class="img-fluid">
                                                <div class="card-body">
                                                    <div class="text-dark card-title">Spoiler</div>
                                                    <p class="card-text">Rp.700.000,00</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 col-md-3 col-lg-2 mb-2">
                                            <div class="card">
                                                <img src="https://via.placeholder.com/200x200" alt="" class="img-fluid">
                                                <div class="card-body">
                                                    <div class="text-dark card-title">Spoiler</div>
                                                    <p class="card-text">Rp.700.000,00</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="row">
                                        <div class="col-6 col-md-3 col-lg-2 mb-2">
                                            <div class="card">
                                                <img src="https://via.placeholder.com/200x200" alt="" class="img-fluid">
                                                <div class="card-body">
                                                    <div class="text-dark card-title">Spoiler</div>
                                                    <p class="card-text">Rp.700.000,00</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 col-md-3 col-lg-2 mb-2">
                                            <div class="card">
                                                <img src="https://via.placeholder.com/200x200" alt="" class="img-fluid">
                                                <div class="card-body">
                                                    <div class="text-dark card-title">Spoiler</div>
                                                    <p class="card-text">Rp.700.000,00</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 col-md-3 col-lg-2 mb-2">
                                            <div class="card">
                                                <img src="https://via.placeholder.com/200x200" alt="" class="img-fluid">
                                                <div class="card-body">
                                                    <div class="text-dark card-title">Spoiler</div>
                                                    <p class="card-text">Rp.700.000,00</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 col-md-3 col-lg-2 mb-2">
                                            <div class="card">
                                                <img src="https://via.placeholder.com/200x200" alt="" class="img-fluid">
                                                <div class="card-body">
                                                    <div class="text-dark card-title">Spoiler</div>
                                                    <p class="card-text">Rp.700.000,00</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 col-md-3 col-lg-2 mb-2">
                                            <div class="card">
                                                <img src="https://via.placeholder.com/200x200" alt="" class="img-fluid">
                                                <div class="card-body">
                                                    <div class="text-dark card-title">Spoiler</div>
                                                    <p class="card-text">Rp.700.000,00</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 col-md-3 col-lg-2 mb-2">
                                            <div class="card">
                                                <img src="https://via.placeholder.com/200x200" alt="" class="img-fluid">
                                                <div class="card-body">
                                                    <div class="text-dark card-title">Spoiler</div>
                                                    <p class="card-text">Rp.700.000,00</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="spareparts-topsell" class="carousel-tab tab-pane fade-in">
                        <div class="carousel slide" id="carousel-spareparts-topsell" data-bs-interval="false">
                            <div class="carousel-inner">
                                <div class="carousel-item carousel-content active">
                                    <div class="row">
                                        <div class="col-6 col-md-3 col-lg-2 mb-2">
                                            <div class="card">
                                                <img src="https://via.placeholder.com/200x200" alt="" class="img-fluid">
                                                <div class="card-body">
                                                    <div class="text-dark card-title">Visor</div>
                                                    <p class="card-text">Rp.100.000,00</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 col-md-3 col-lg-2 mb-2">
                                            <div class="card">
                                                <img src="https://via.placeholder.com/200x200" alt="" class="img-fluid">
                                                <div class="card-body">
                                                    <div class="text-dark card-title">Visor</div>
                                                    <p class="card-text">Rp.100.000,00</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 col-md-3 col-lg-2 mb-2">
                                            <div class="card">
                                                <img src="https://via.placeholder.com/200x200" alt="" class="img-fluid">
                                                <div class="card-body">
                                                    <div class="text-dark card-title">Visor</div>
                                                    <p class="card-text">Rp.100.000,00</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 col-md-3 col-lg-2 mb-2">
                                            <div class="card">
                                                <img src="https://via.placeholder.com/200x200" alt="" class="img-fluid">
                                                <div class="card-body">
                                                    <div class="text-dark card-title">Visor</div>
                                                    <p class="card-text">Rp.100.000,00</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 col-md-3 col-lg-2 mb-2">
                                            <div class="card">
                                                <img src="https://via.placeholder.com/200x200" alt="" class="img-fluid">
                                                <div class="card-body">
                                                    <div class="text-dark card-title">Visor</div>
                                                    <p class="card-text">Rp.100.000,00</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 col-md-3 col-lg-2 mb-2">
                                            <div class="card">
                                                <img src="https://via.placeholder.com/200x200" alt="" class="img-fluid">
                                                <div class="card-body">
                                                    <div class="text-dark card-title">Visor</div>
                                                    <p class="card-text">Rp.100.000,00</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="row">
                                        <div class="col-6 col-md-3 col-lg-2 mb-2">
                                            <div class="card">
                                                <img src="https://via.placeholder.com/200x200" alt="" class="img-fluid">
                                                <div class="card-body">
                                                    <div class="text-dark card-title">Visor</div>
                                                    <p class="card-text">Rp.100.000,00</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 col-md-3 col-lg-2 mb-2">
                                            <div class="card">
                                                <img src="https://via.placeholder.com/200x200" alt="" class="img-fluid">
                                                <div class="card-body">
                                                    <div class="text-dark card-title">Visor</div>
                                                    <p class="card-text">Rp.100.000,00</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 col-md-3 col-lg-2 mb-2">
                                            <div class="card">
                                                <img src="https://via.placeholder.com/200x200" alt="" class="img-fluid">
                                                <div class="card-body">
                                                    <div class="text-dark card-title">Visor</div>
                                                    <p class="card-text">Rp.100.000,00</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 col-md-3 col-lg-2 mb-2">
                                            <div class="card">
                                                <img src="https://via.placeholder.com/200x200" alt="" class="img-fluid">
                                                <div class="card-body">
                                                    <div class="text-dark card-title">Visor</div>
                                                    <p class="card-text">Rp.100.000,00</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 col-md-3 col-lg-2 mb-2">
                                            <div class="card">
                                                <img src="https://via.placeholder.com/200x200" alt="" class="img-fluid">
                                                <div class="card-body">
                                                    <div class="text-dark card-title">Visor</div>
                                                    <p class="card-text">Rp.100.000,00</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 col-md-3 col-lg-2 mb-2">
                                            <div class="card">
                                                <img src="https://via.placeholder.com/200x200" alt="" class="img-fluid">
                                                <div class="card-body">
                                                    <div class="text-dark card-title">Visor</div>
                                                    <p class="card-text">Rp.100.000,00</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Trending Product Area -->

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
                <a href="https://shopee.co.id/bimahelm">
                    <img src="/img/icons/shopee.png" class="img-fluid" alt="shopee">
                </a>
            </div>
            <div class="col-3 d-flex justify-content-center align-items-center">
                <a href="https://www.bukalapak.com/bimahelm">
                    <img src="/img/icons/bukalapak.png" class="img-fluid" alt="bukalapak">
                </a>
            </div>
            <div class="col-3 d-flex justify-content-start align-items-center">
                <a href="https://www.tokopedia.com/bimahelm">
                    <img src="/img/icons/tokped.png" class="img-fluid" alt="tokped">
                </a>
            </div>
        </div>
    </div>
</section>

@endsection
