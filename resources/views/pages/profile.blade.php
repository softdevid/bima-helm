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
                            <button class="nav-link" id="v-pills-pengaturan-tab" data-bs-toggle="pill"
                                data-bs-target="#v-pills-pengaturan" type="button" role="tab"
                                aria-controls="v-pills-pengaturan" aria-selected="false"><i
                                    class="fa-regular fa-gear fs-5"></i>&nbsp; Pengaturan</button>
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
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="v-pills-pesanan" role="tabpanel" aria-labelledby="v-pills-pesanan-tab"
                    tabindex="0">
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="pills-semua-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-semua" type="button" role="tab" aria-controls="pills-semua"
                                aria-selected="true">Semua</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-belumbayar-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-belumbayar" type="button" role="tab"
                                aria-controls="pills-belumbayar" aria-selected="false">Belum Bayar</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-dikemas-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-dikemas" type="button" role="tab" aria-controls="pills-dikemas"
                                aria-selected="false">Dikemas</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-dikirim-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-dikirim" type="button" role="tab" aria-controls="pills-dikirim"
                                aria-selected="false">Dikirim</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-selesai-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-selesai" type="button" role="tab" aria-controls="pills-selesai"
                                aria-selected="false">Selesai</button>
                        </li>
                    </ul>
                    <div class="input-group rounded mb-3">
                        <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search"
                            aria-describedby="search-addon" />
                        <span class="input-group-text border-0" id="search-addon">
                            <a href=""><i class="fa-light fa-magnifying-glass"></i></a>
                        </span>
                    </div>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-semua" role="tabpanel"
                            aria-labelledby="pills-semua-tab" tabindex="0">
                            <div class="card mb-3">
                                <div class="row g-0">
                                    <div class="col-md-3">
                                        <img src="/img/KYT-RC-SEVEN-17-BLACK-DOFT-GOLD.jpeg" class="img-fluid rounded"
                                            alt="..." style="height: 215px">
                                    </div>
                                    <div class="col-md-9">
                                        <div class="card-body">
                                            <h5 class="card-title">KYT-RC-SEVEN-17-BLACK-DOFT-GOLD</h5>
                                            <span class="card-text fs-6">Variasi:</span>
                                        </div>
                                        <div class="total-harga pb-5">
                                            <p class="fs-6">Total Harga: Rp.300.000</p>
                                        </div>
                                        <div class="card-footer border-0">
                                            <a href="" class="btn btn-primary">Beli Lagi</a>
                                            &nbsp;
                                            <a href="" class="btn btn-dark">Hubungi Admin</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-belumbayar" role="tabpanel"
                            aria-labelledby="pills-belumbayar-tab" tabindex="0">
                            <div class="card mb-3">
                                <div class="row g-0">
                                    <div class="col-md-3">
                                        <img src="/img/KYT-RC-SEVEN-17-BLACK-DOFT-GOLD.jpeg" class="img-fluid rounded"
                                            alt="..." style="height: 215px">
                                    </div>
                                    <div class="col-md-9">
                                        <div class="card-body">
                                            <h5 class="card-title">KYT-RC-SEVEN-17-BLACK-DOFT-GOLD</h5>
                                            <span class="card-text fs-6">Variasi:</span>
                                        </div>
                                        <div class="total-harga pb-5">
                                            <p class="fs-6">Total Harga: Rp.300.000</p>
                                        </div>
                                        <div class="card-footer border-0">
                                            <a href="" class="btn btn-primary">Bayar Sekarang</a>
                                            &nbsp;
                                            <a href="" class="btn btn-dark">Hubungi Admin</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-dikemas" role="tabpanel"
                            aria-labelledby="pills-dikemas-tab" tabindex="0">
                            <div class="card mb-3">
                                <div class="row g-0">
                                    <div class="col-md-3">
                                        <img src="/img/KYT-RC-SEVEN-17-BLACK-DOFT-GOLD.jpeg" class="img-fluid rounded"
                                            alt="..." style="height: 215px">
                                    </div>
                                    <div class="col-md-9">
                                        <div class="card-body">
                                            <h5 class="card-title">KYT-RC-SEVEN-17-BLACK-DOFT-GOLD</h5>
                                            <span class="card-text fs-6">Variasi:</span>
                                        </div>
                                        <div class="total-harga pb-5">
                                            <p class="fs-6">Total Harga: Rp.300.000</p>
                                        </div>
                                        <div class="card-footer border-0">
                                            <a href="" class="btn btn-dark">Hubungi Admin</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-dikirim" role="tabpanel"
                            aria-labelledby="pills-dikirim-tab" tabindex="0">
                            <div class="card mb-3">
                                <div class="row g-0">
                                    <div class="col-md-3">
                                        <img src="/img/KYT-RC-SEVEN-17-BLACK-DOFT-GOLD.jpeg" class="img-fluid rounded"
                                            alt="..." style="height: 215px">
                                    </div>
                                    <div class="col-md-9">
                                        <div class="card-body">
                                            <h5 class="card-title">KYT-RC-SEVEN-17-BLACK-DOFT-GOLD</h5>
                                            <span class="card-text fs-6">Variasi:</span>
                                        </div>
                                        <div class="total-harga pb-5">
                                            <p class="fs-6">Total Harga: Rp.300.000</p>
                                        </div>
                                        <div class="card-footer border-0">
                                            <a href="" class="btn btn-dark">Hubungi Admin</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-selesai" role="tabpanel"
                            aria-labelledby="pills-selesai-tab" tabindex="0">
                            <div class="card mb-3">
                                <div class="row g-0">
                                    <div class="col-md-3">
                                        <img src="/img/KYT-RC-SEVEN-17-BLACK-DOFT-GOLD.jpeg" class="img-fluid rounded"
                                            alt="..." style="height: 215px">
                                    </div>
                                    <div class="col-md-9">
                                        <div class="card-body">
                                            <h5 class="card-title">KYT-RC-SEVEN-17-BLACK-DOFT-GOLD</h5>
                                            <span class="card-text fs-6">Variasi:</span>
                                        </div>
                                        <div class="total-harga pb-5">
                                            <p class="fs-6">Total Harga: Rp.300.000</p>
                                        </div>
                                        <div class="card-footer border-0">
                                            <a href="" class="btn btn-primary">Beli Lagi</a>
                                            &nbsp;
                                            <a href="" class="btn btn-dark">Hubungi Admin</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="v-pills-pengaturan" role="tabpanel"
                    aria-labelledby="v-pills-pengaturan-tab" tabindex="0">
                    <div class="container">
                        <h3 class="fw-bold mb-3">Ubah Profil</h3>
                        <form action="">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" placeholder="Nama Depan" required>
                                        <label for="">Nama Depan</label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" placeholder="Nama Belakang" required>
                                        <label for="">Nama Belakang</label>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" placeholder="No Telp" required>
                                        <label for="">No Telp</label>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div class="form-floating">
                                        <input type="email" class="form-control" placeholder="Email" required>
                                        <label for="">Email</label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-floating">
                                        <input type="password" class="form-control" placeholder="Sandi Baru" required>
                                        <label for="">Sandi Baru</label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-floating">
                                        <input type="password" class="form-control" placeholder="Konfirmasi Sandi"
                                            required>
                                        <label for="">Konfirmasi Sandi</label>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div class="form-floating">
                                        <textarea class="form-control" placeholder="Alamat Anda" rows="3"
                                            required></textarea>
                                        <label for="">Alamat Anda</label>
                                    </div>
                                </div>
                                <button class="btn btn-primary mb-3" type="submit" name="button">Ubah & Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection()