@extends('kasir.layouts.template')
@section('content')
    @if (session()->has('message'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('message') }}
        </div>
    @endif
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Barcode</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Harga Beli</th>
                    <th scope="col">Harga Jual</th>
                    <th scope="col">Total Stok</th>
                    <th scope="col">Merk</th>
                    <th scope="col">Kategori</th>
                    <th colspan="2" scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $key => $products)
                    <tr>
                        <th scope="row">{{ $key + 1 }}</th>
                        <td>{{ $products->barcode }}</td>
                        <td>{{ $products->name }}</td>
                        <td>{{ number_format($products->purchase_price, 0, ',', '.') }}</td>
                        <td>{{ number_format($products->price, 0, ',', '.') }}</td>
                        <td>{{ $products->stock }}</td>
                        <td>{{ $products->merk->name }}</td>
                        <td>{{ $products->category->name }}</td>
                        <td>
                            <a href="{{ route('kasir-input.show', [$products->id]) }}" class="btn btn-outline-primary"
                                title="Detail produk"><i class="fa fa-book"></i></a>
                        </td>
                        <td>
                            <a href="{{ route('kasir-input.edit', [$products->id]) }}" class="btn btn-success"
                                title="Laporkan penjualan Produk ini">Laporankan</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Modal tambah laporan -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Laporan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                            class="fa fa-close"></i></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('laporan.store') }}" method="POST">
                        @csrf
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-6">
                                    <img src="{{ $products->url }}" style="max-width: 20rem;"><br>
                                    <div class="row">
                                        <div class="col">
                                            <p>XS: {{ $products->size->xs }}</p>
                                            <p>S: {{ $products->size->s }}</p>
                                            <p>M: {{ $products->size->m }}</p>
                                        </div>
                                        <div class="col">
                                            <p>LG: {{ $products->size->lg }}</p>
                                            <p>XL: {{ $products->size->xl }}</p>
                                            <p>XXL: {{ $products->size->xxl }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <input type="hidden" name="product_id" value="{{ $products->id }}">
                                    <input type="hidden" name="size_id" value="{{ $products->size_id }}">
                                    <input type="hidden" name="merk_id" value="{{ $products->merk_id }}">
                                    <input type="hidden" name="purchase_price" value="{{ $products->purchase_price }}">
                                    <input type="hidden" name="price" value="{{ $products->price }}">
                                    <input type="hidden" name="merk_id" value="{{ $products->merk_id }}">
                                    <h5>Nama Produk: {{ $products->name }}</h5>
                                    <p>Harga Beli: Rp. {{ number_format($products->purchase_price, 0, ',', '.') }}</p>
                                    <p>Harga Jual: Rp. {{ number_format($products->price, 0, ',', '.') }}</p>
                                    <p>Merek: {{ $products->merk->name }}</p>
                                    <p>Kategori: {{ $products->category->name }}</p>
                                    <h5 class="mt-2">Banyaknya yang terjual perukuran ?</h5>
                                    <p>
                                        <select class="form-control form-select" name="size_name_id" required>
                                            <option>Pilih ukuran</option>
                                            @foreach ($size_name as $size_name)
                                                {{-- @if ($products->size->xs == 0)
                                                    <option value="" disabled>
                                                        {{ $size_name->name }}</option>
                                                @else --}}
                                                <option value="{{ $size_name->id }}">
                                                    {{ $size_name->name }}</option>
                                                {{-- @endif --}}
                                            @endforeach
                                        </select>
                                    </p>
                                    <p>
                                        <input type="number" name="qty" class="form-control"
                                            placeholder="Banyaknya terjual ?" required>
                                    </p>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Tambah Laporan</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal detail produk -->
    <div class="modal fade" id="detail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detail {{ $products->name }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                            class="fa fa-close"></i></button>
                </div>
                <div class="modal-body">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-6">
                                <img src="{{ $products->url }}" style="max-width: 20rem;"><br>
                                <div class="row">
                                    <div class="col">
                                        <p>XS: {{ $products->size->xs }}</p>
                                        <p>S: {{ $products->size->s }}</p>
                                        <p>M: {{ $products->size->m }}</p>
                                    </div>
                                    <div class="col">
                                        <p>LG: {{ $products->size->lg }}</p>
                                        <p>XL: {{ $products->size->xl }}</p>
                                        <p>XXL: {{ $products->size->xxl }}</p>
                                    </div>
                                </div>
                                <hr>
                                <div>
                                    Total stok: {{ $products->stock }}
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <input type="hidden" name="product_id" value="{{ $products->id }}">
                                <input type="hidden" name="size_id" value="{{ $products->size_id }}">
                                <input type="hidden" name="merk_id" value="{{ $products->merk_id }}">
                                <input type="hidden" name="purchase_price" value="{{ $products->purchase_price }}">
                                <input type="hidden" name="price" value="{{ $products->price }}">
                                <input type="hidden" name="merk_id" value="{{ $products->merk_id }}">
                                <h5>Nama Produk: {{ $products->name }}</h5>
                                <p>Harga Beli: Rp. {{ number_format($products->purchase_price, 0, ',', '.') }}</p>
                                <p>Harga Jual: Rp. {{ number_format($products->price, 0, ',', '.') }}</p>
                                <p>Merek: {{ $products->merk->name }}</p>
                                <p>Kategori: {{ $products->category->name }}</p>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection
