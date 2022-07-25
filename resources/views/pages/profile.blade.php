@extends("layouts.main")
@section("content")
<div class="container mt-3">
    <div class="row">
        <div class="col-md-3">
            <div class="card border-0">
                <div class="card-body">
                    <ul class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist"
                        aria-orientation="vertical">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="v-pills-akunsaya-tab" data-bs-toggle="pill"
                                data-bs-target="#v-pills-akunsaya" type="button" role="tab"
                                aria-controls="v-pills-akunsaya" aria-selected="true"><i
                                    class="fa-regular fa-user fs-5"></i>&nbsp; Akun Saya</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="v-pills-pesanan-tab" data-bs-toggle="pill"
                                data-bs-target="#v-pills-pesanan" type="button" role="tab"
                                aria-controls="v-pills-pesanan" aria-selected="false"><i
                                    class="fa-regular fa-clipboard-list-check fs-5"></i>&nbsp; Pesanan
                                Saya</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="v-pills-notifikasi-tab" data-bs-toggle="pill"
                                data-bs-target="#v-pills-notifikasi" type="button" role="tab"
                                aria-controls="v-pills-notifikasi" aria-selected="false"><i
                                    class="fa-regular fa-bell fs-5"></i>&nbsp; Notifikasi</button>
                        </li>
                        <li class="nav-item dropdown" role="presentation">
                            <button class="nav-link dropdown-toggle" id="v-pills-akunsaya-tab" data-bs-toggle="dropdown"
                                data-bs-target="#v-pills-akunsaya" type="button" role="tab"
                                aria-controls="v-pills-akunsaya" aria-selected="true"><i
                                    class="fa-regular fa-gear fs-5"></i>&nbsp; Pengaturan</button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#profil">Profil</a></li>
                                <li><a class="dropdown-item" href="#alamat">Alamat</a></li>
                                <li><a class="dropdown-item" href="#bank">Bank & Kartu</a></li>
                                <li><a class="dropdown-item" href="#sandi">Ubah Sandi</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="tab-content" id="v-pills-tabContent">
                <div class="tab-pane fade show active" id="v-pills-akunsaya" role="tabpanel"
                    aria-labelledby="v-pills-akunsaya-tab" tabindex="0">
                    <div class="container">
                        <article>
                            <p class="fw-bold fs-5 mb-3">{{ auth()->user()->frontName }}</p>
                            <i class="fa-regular fa-clipboard-list-check fs-5"></i>
                            &nbsp;<span class="fs-6"> Pesanan saya</span>
                            <hr>
                        </article>
                        <div class="row row-cols-1 row-cols-md-4 g-3 text-center">
                            <div class="col mb-3">
                                <div class="card border-0">
                                    <a href="">
                                        <div class="card-body">
                                            <i class="fa-regular fa-wallet fa-3x pb-2"></i>
                                            <p class="fs-6">Belum Bayar</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col mb-3">
                                <div class="card border-0">
                                    <a href="">
                                        <div class="card-body">
                                            <i class="fa-regular fa-box-taped fa-3x pb-2"></i>
                                            <p class="fs-6">Dikemas</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col mb-3">
                                <div class="card border-0">
                                    <a href="">
                                        <div class="card-body">
                                            <i class="fa-regular fa-truck-fast fa-3x pb-2"></i>
                                            <p class="fs-6">Dikirim</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col mb-3">
                                <div class="card border-0">
                                    <a href="">
                                        <div class="card-body">
                                            <i class="fa-solid fa-box-circle-check fa-3x pb-2"></i>
                                            <p class="fs-6">Selesai</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            {{-- <div class="col mb-3">
                                <div class="card border-0">
                                    <a href="">
                                        <div class="card-body text-center">
                                            <i class="fa-regular fa-circle-star fs-2 pb-2"></i>
                                            <p class="fs-6">Beri Penilaian</p>
                                        </div>
                                    </a>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="v-pills-pesanan" role="tabpanel" aria-labelledby="v-pills-pesanan-tab"
                    tabindex="0">...</div>
                <div class="tab-pane fade" id="v-pills-notifikasi" role="tabpanel"
                    aria-labelledby="v-pills-notifikasi-tab" tabindex="0">...</div>
            </div>
        </div>
    </div>
</div>
@endsection()