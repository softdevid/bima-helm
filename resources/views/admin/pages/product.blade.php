@extends('admin.layouts.template')
@section('content')
    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
        <li class="nav-item ms-3" role="presentation" style="border:0; margin: 10px;">
            <button class="nav-link active" id="pills-list-tab" data-bs-toggle="pill" data-bs-target="#pills-list"
                type="button" role="tab" aria-controls="pills-list" aria-selected="true">list</button>
        </li>
        <li class="nav-item ms-3" role="presentation" style="margin: 10px;">
            <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile"
                type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Tambah</button>
        </li>
        {{-- <li class="nav-item" role="presentation" style="margin: 10px;">
            <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact"
                type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Contact</button>
        </li> --}}
    </ul>
    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-list" role="tabpanel" aria-labelledby="pills-list-tab"
            tabindex="0">
            <div class="table-responsive">
                <a href="/admin/product/create" class="btn btn-primary">Tambah</a>
                <table class="table">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">#</th>
                            <th scope="col">Gambar</th>
                            <th scope="col">Nama Produk</th>
                            <th scope="col">Merk</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Ukuran</th>
                            <th scope="col">Stok</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($products as $products)
                            <tr class="text-center" style="vertical-align: middle;">
                                <th scope="row">{{ $no++ }}</th>
                                <td><img src="/img/{{ $products->image }}" alt="" style="width: 100px;"></td>
                                <td>{{ $products->name }}</td>
                                <td>{{ $products->merk }}</td>
                                <td>Rp. {{ number_format($products->price) }}</td>
                                <td>XL</td>
                                <td>{{ $products->stock }}</td>
                                <td>
                                    <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                        data-bs-target="#edit"><i class="fa fa-edit"></i></button>
                                    <a href="/hapus" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">
            <div class="container">
                <form action="/admin/product/create" method="post" multipart="form-data">
                    <div class="mb-3 row">
                        <label for="name" class="col-sm-2 col-form-label">Nama Produk</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="name" placeholder="Nama Produk"
                                name="name">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="merk" class="col-sm-2 col-form-label">Merk</label>
                        <div class="col-sm-10">
                            <select class="form-select form-control" aria-label="Default select example">
                                <option selected>Pilih Merk</option>
                                <option value="kyt">KYT</option>
                                <option value="ink">INK</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="price" class="col-sm-2 col-form-label">Harga</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="harga" placeholder="125000" name="price">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="size" class="col-sm-2 col-form-label">Ukuran</label>
                        <div class="col-sm-10">
                            <select class="form-select form-control" aria-label="Default select example">
                                <option selected>Pilih Ukuran</option>
                                <option value="s">S</option>
                                <option value="xl">XL</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="stock" class="col-sm-2 col-form-label">Stok</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="stok" placeholder="10" name="stock">
                        </div>
                    </div>

                    {{-- gambar --}}
                    <div class="mb-3 row">
                        <label for="name" class="col-sm-2 col-form-label">Gambar</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="file" id="formFile" name="image">
                        </div>
                    </div>
                    <div class="mb-5 row">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="reset" class="btn btn-danger" style="margin-left: 5px;">Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Modal edit --}}

    <!-- Modal -->
    <div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                        <div class="mb-3 row">
                            <label for="name" class="col-sm-2 col-form-label">Nama Produk</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="name" placeholder="Nama Produk">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="merk" class="col-sm-2 col-form-label">Merk</label>
                            <div class="col-sm-10">
                                <select class="form-select form-control" aria-label="Default select example">
                                    <option selected>Pilih Merk</option>
                                    <option value="kyt">KYT</option>
                                    <option value="ink">INK</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="price" class="col-sm-2 col-form-label">Harga</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="harga" placeholder="125000">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="size" class="col-sm-2 col-form-label">Ukuran</label>
                            <div class="col-sm-10">
                                <select class="form-select form-control" aria-label="Default select example">
                                    <option selected>Pilih Ukuran</option>
                                    <option value="s">S</option>
                                    <option value="xl">XL</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="stock" class="col-sm-2 col-form-label">Stok</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="stok" placeholder="10">
                            </div>
                        </div>

                        {{-- gambar --}}
                        <div class="mb-3 row">
                            <label for="name" class="col-sm-2 col-form-label">Gambar</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="file" id="formFile">
                            </div>
                        </div>
                        <div class="mb-5 row">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <button type="reset" class="btn btn-danger" style="margin-left: 5px;">Reset</button>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Simpan</button>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection
