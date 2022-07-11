@extends('layouts.main')
@section('content')
    @include('partials.breadcrumbs')

    <div class="jumbotron bg-cover text-white"
        style="background-image: linear-gradient(to bottom, rgba(0,0,0,0.6) 0%,rgba(0,0,0,0.6) 100%), url(/img/toko-bima.png); padding: 150px; width: 100%;">
    </div>

    <div class="container">
        <div class="pt-5 section-title">
            <h2 class="text-center">Tentang Bima Helm</h2>
        </div>
        <article class="pt-3 mb-5 fs-6 text-center">
            <b>Bima Helm</b> adalah perusahaan helm yang berbasis di Purbalingga, Jawa Tengah. <b>Bima Helm</b> adalah toko
            Helm
            terkemuka
            di Purbalingga yang tidak melambung begitu saja.
            Banyak alur yang dilalui dengan segala rintangan yang ada. <b>Bima Helm</b> hadir untuk memenuhi kebutuhan
            masyarakat
            dengan produknya yang beragam. Bukan hanya tersedia helm saja tetapi ada produk lain yang diperjual belikan
            yakni Faceshield, jas hujan, Aksesoris helm dan
            lainnya.
        </article>


        <div class="mb-5">
            <div class="pt-3 section-title">
                <h2 class="text-center">Beberapa Produk Kami</h2>
            </div>

            <div class="row row-cols-1 row-cols-md-3 g-4 mt-2">
                <a href="javascript:void(0)">
                    <div class="col">
                        <div class="card h-100">
                            <img src="/img/KYT-C5-IANONE-WHITE.jpeg" class="card-img-top" alt="...">
                            <div class="card-img-overlay d-flex align-items-end p-0">
                                <h5 class="card-title text-center text-white flex-fill p-2 mb-0"
                                    style="background-color: rgba(0, 0, 0, 0.4);">KYT C5 IANONE WHITE</h5>
                            </div>
                        </div>
                    </div>
                </a>
                <a href="javascript:void(0)">
                    <div class="col">
                        <div class="card h-100">
                            <img src="/img/KYT-RC-SEVEN-17-BLACK-DOFT-GOLD.jpeg" class="card-img-top" alt="...">
                            <div class="card-img-overlay d-flex align-items-end p-0">
                                <h5 class="card-title text-center text-white flex-fill p-2 mb-0"
                                    style="background-color: rgba(0, 0, 0, 0.4);">KYT RC SEVEN 17 BLACK DOFT GOLD</h5>
                            </div>
                        </div>
                    </div>
                </a>
                <a href="javascript:void(0)">
                    <div class="col">
                        <div class="card h-100">
                            <img src="/img/kyt-tt-course-plain-mat-black.jpeg" class="card-img-top" alt="...">
                            <div class="card-img-overlay d-flex align-items-end p-0">
                                <h5 class="card-title text-center text-white flex-fill p-2 mb-0"
                                    style="background-color: rgba(0, 0, 0, 0.4);">KYT TT COURSE PLAIN MAT BLACK</h5>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <div class="mb-5">
            <div class="pt-3 section-title">
                <h2 class="text-center">Mitra Kami</h2>
            </div>

            <div class="row row-cols-1 row-cols-md-3 g-4 mt-2 justify-content-center align-items-center">
                <div class="col">
                    <div class="h-100">
                        <img src="/img/icons/mekar.png" alt="">
                    </div>
                </div>
                <div class="col">
                    <div class="h-100">
                        <img src="/img/icons/fcs.png" alt="">
                    </div>
                </div>
            </div>
        </div>



    </div>
@endsection
