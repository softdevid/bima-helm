@extends('layouts.main')
@section('content')
@include('partials.breadcrumbs')

<div class="container">
    <div class="p-3">
        <div class="accordion accordion-flush pt-3" id="accordionFlushExample">
            <div class="animasi1">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingOne">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                            Apakah Bima Helm dapat dipercaya?
                        </button>
                    </h2>
                    <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne"
                        data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            Tentu saja bisa, kami akan selalu profesional dan bertanggung jawab akan produk yang dibeli
                            oleh customer dan
                            kami akan selalu menjaga kualitas produk sebelum dikirim.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                            Apa saja merek di Bima Helm?
                        </button>
                    </h2>
                    <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo"
                        data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <ul>
                                <li>KYT</li>
                                <li>INK</li>
                                <li>NHK</li>
                                <li>MDS</li>
                                <li>BMC</li>
                                <li>HBC</li>
                                <li>DAG</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseThree" aria-expanded="false"
                            aria-controls="flush-collapseThree">
                            Dimana lokasi Bima Helm?
                        </button>
                    </h2>
                    <div id="flush-collapseThree" class="accordion-collapse collapse"
                        aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            Jl. Ahmad Yani No.76, Kandang Gampang, Kalikabong, Kec. Kalimanah, Kabupaten
                            Purbalingga,
                            Jawa Tengah 53321 atau bisa klik <a
                                href="https://www.google.com/maps/dir/-7.4020645,109.3426308/bima+helm/@-7.3984743,109.3431424,16z/data=!3m1!4b1!4m9!4m8!1m1!4e1!1m5!1m1!1s0x2e6559b5c54a1705:0x8b8919753a714d3b!2m2!1d109.3524013!2d-7.3957891"
                                target="_blank">disini</a>
                        </div>
                    </div>
                </div>
                {{-- <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingFourth">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseFourth" aria-expanded="false"
                            aria-controls="flush-collapseFourth">
                            Bagaimana cara belanja di Bima Helm?
                        </button>
                    </h2>
                    <div id="flush-collapseFourth" class="accordion-collapse collapse"
                        aria-labelledby="flush-headingFourth" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            Anda bisa langsung ke halaman <a href="#">Cara Belanja</a> untuk lebih
                            detailnya.
                        </div>
                    </div>
                </div> --}}
                {{-- <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingFifth">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseFifth" aria-expanded="false"
                            aria-controls="flush-collapseFifth">
                            Jasa pengiriman Bima Helm apa saja?
                        </button>
                    </h2>
                    <div id="flush-collapseFifth" class="accordion-collapse collapse"
                        aria-labelledby="flush-headingFifth" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <h6 class="mb-3">Jasa pengiriman kami yaitu:</h6>
                            <div class="row row-cols-1 row-cols-md-3 g-4">
                                <div class="col">
                                    <div class="h-100">
                                        <img src="/img/icons/jne.png" class="card-img-top" alt="...">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="h-100">
                                        <img src="/img/icons/jnt.png" class="card-img-top" alt="...">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
                {{-- <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingSixth">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseSixth" aria-expanded="false"
                            aria-controls="flush-collapseSixth">
                            Metode pembayaran Bima Helm apa saja?
                        </button>
                    </h2>
                    <div id="flush-collapseSixth" class="accordion-collapse collapse"
                        aria-labelledby="flush-headingSixth" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <h6 class="mb-3">Metode pembayaran kami yaitu:</h6>
                            <div class="row row-cols-1 row-cols-md-3 g-4 justify-content-center">
                                <div class="col">
                                    <div class="h-100">
                                        <img src="/img/icons/bca.png" class="card-img-top" alt="...">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="h-100">
                                        <img src="/img/icons/bri.png" class="card-img-top" alt="...">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
</div>
@endsection