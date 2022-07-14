@extends('admin.layouts.template')
@section('content')
    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">

        <li class="nav-item ms-3" role="presentation" style="border:0; margin: 5px;">
            <button class="nav-link active" id="pills-list-tab" data-bs-toggle="pill" data-bs-target="#pills-list"
                type="button" role="tab" aria-controls="pills-list" aria-selected="true">Orders</button>
        </li>
        <li class="nav-item ms-3" role="presentation" style="margin: 5px;">
            <button class="nav-link" id="pills-kasir-tab" data-bs-toggle="pill" data-bs-target="#pills-kasir" type="button"
                role="tab" aria-controls="pills-kasir" aria-selected="false">Pengemasan</button>
        </li>
        <li class="nav-item ms-3" role="presentation" style="margin: 5px;">
            <button class="nav-link" id="pills-admin-tab" data-bs-toggle="pill" data-bs-target="#pills-admin" type="button"
                role="tab" aria-controls="pills-admin" aria-selected="false">Pengiriman</button>
        </li>
        <li class="nav-item" role="presentation" style="margin: 5px;">
            <button class="nav-link" id="pills-tambahadmin-tab" data-bs-toggle="pill" data-bs-target="#pills-tambahadmin"
                type="button" role="tab" aria-controls="pills-tambahadmin" aria-selected="false">Sampai</button>
        </li>
    </ul>
    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-list" role="tabpanel" aria-labelledby="pills-list-tab"
            tabindex="0">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">#</th>
                            <th scope="col">No Order</th>
                            <th scope="col">Nama produk</th>
                            <th scope="col">Total Harga</th>
                            <th scope="col">QTY</th>
                            <th scope="col">Status</th>
                            <th scope="col">Metode Bayar</th>
                            <th scope="col" colspan="2">AKSI</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        <tr class="text-center">
                            <th scope="row">1</th>
                            <td>HJOQUF8847jfoa9KJ3</td>
                            <td>HELM KYT TT COURSE PLAIN MATT BLACK28</td>
                            <td>Rp. 935280</td>
                            <td>1</td>
                            <td><span class="badge bg-danger text-white">Belum bayar</span></td>
                            <td>Bank BRI</td>
                            <td>
                                <button class="btn btn-primary" title="Rinci Pemesanan"><i class="fa fa-book"></i></button>
                            </td>
                            <td>
                                <a href="#" class="btn btn-success"><i class="fa fa-check"></i></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="tab-pane fade show" id="pills-kasir" role="tabpanel" aria-labelledby="pills-kasir-tab" tabindex="0">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">#</th>
                            <th scope="col">No Order</th>
                            <th scope="col">Nama produk</th>
                            <th scope="col">Total Harga</th>
                            <th scope="col">QTY</th>
                            <th scope="col">Status Bayar</th>
                            <th scope="col">Status Order</th>
                            <th scope="col">Metode Bayar</th>
                            <th scope="col" colspan="2">AKSI</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        <tr class="text-center">
                            <th scope="row">1</th>
                            <td>HJOQUF8847jfoa9KJ3</td>
                            <td>HELM KYT TT COURSE PLAIN MATT BLACK28</td>
                            <td>Rp. 935280</td>
                            <td>1</td>
                            <td><span class="badge bg-success text-white">Sudah bayar</span></td>
                            <td><span class="badge bg-success text-white">Dikemas</span></td>
                            <td>Bank BRI</td>
                            <td>
                                <button class="btn btn-primary" title="Rinci Pemesanan"><i
                                        class="fa fa-book"></i></button>
                            </td>
                            <td>
                                <a href="#" class="btn btn-success"><i class="fa fa-check"></i></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="tab-pane fade show" id="pills-admin" role="tabpanel" aria-labelledby="pills-admin-tab"
            tabindex="0">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">#</th>
                            <th scope="col">No Order</th>
                            <th scope="col">Nama produk</th>
                            <th scope="col">Total Harga</th>
                            <th scope="col">QTY</th>
                            <th scope="col">Status Bayar</th>
                            <th scope="col">Status Order</th>
                            <th scope="col">Metode Bayar</th>
                            <th scope="col" colspan="2">AKSI</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        <tr class="text-center">
                            <th scope="row">1</th>
                            <td>HJOQUF8847jfoa9KJ3</td>
                            <td>HELM KYT TT COURSE PLAIN MATT BLACK28</td>
                            <td>Rp. 935280</td>
                            <td>1</td>
                            <td><span class="badge bg-success text-white">Sudah bayar</span></td>
                            <td><span class="badge bg-success text-white">Dikirim</span></td>
                            <td>Bank BRI</td>
                            <td>
                                <button class="btn btn-primary" title="Rinci Pemesanan"><i
                                        class="fa fa-book"></i></button>
                            </td>
                            <td>
                                <a href="#" class="btn btn-success"><i class="fa fa-check"></i></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="tab-pane fade" id="pills-tambahadmin" role="tabpanel" aria-labelledby="pills-tambahadmin-tab"
            tabindex="0">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">#</th>
                            <th scope="col">No Order</th>
                            <th scope="col">Nama produk</th>
                            <th scope="col">Total Harga</th>
                            <th scope="col">QTY</th>
                            <th scope="col">Status Bayar</th>
                            <th scope="col">Status Order</th>
                            <th scope="col">Metode Bayar</th>
                            <th scope="col" colspan="2">AKSI</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        <tr class="text-center">
                            <th scope="row">1</th>
                            <td>HJOQUF8847jfoa9KJ3</td>
                            <td>HELM KYT TT COURSE PLAIN MATT BLACK28</td>
                            <td>Rp. 935280</td>
                            <td>1</td>
                            <td><span class="badge bg-success text-white">Sudah bayar</span></td>
                            <td><span class="badge bg-success text-white">Sampai</span></td>
                            <td>Bank BRI</td>
                            <td>
                                <button class="btn btn-primary" title="Rinci Pemesanan"><i
                                        class="fa fa-book"></i></button>
                            </td>
                            <td>
                                <a href="#" class="btn btn-success" onclick="window.print()"><i
                                        class="fa fa-print"></i></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="tab-pane fade" id="pills-tambahkasir" role="tabpanel" aria-labelledby="pills-tambahkasir-tab"
            tabindex="0">

        </div>
    </div>
@endsection
