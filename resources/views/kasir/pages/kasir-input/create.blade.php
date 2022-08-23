@extends('kasir.layouts.template')
@section('content')
    <div class="card">
        <div class="modal-header">
            <h5 class="card-title">Tambah Laporan</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('laporan.store') }}" method="POST">
                @csrf
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-6">
                            <img src="{{ $products->url }}" style="max-width: 20rem;"><br>
                            <div class="row mt-3">
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
                            <p>Total Stok: {{ $products->stock }}</p>
                        </div>
                        <div class="col-lg-6">
                            <input type="hidden" name="product_id" value="{{ $products->id }}">
                            <input type="hidden" name="size_id" value="{{ $products->size_id }}">
                            <input type="hidden" name="merk_id" value="{{ $products->merk_id }}">
                            <input type="hidden" name="purchase_price" value="{{ $products->purchase_price }}">
                            <input type="hidden" name="price" value="{{ $products->price }}">
                            <input type="hidden" name="merk_id" value="{{ $products->merk_id }}">

                            <h6>Nama Produk: {{ $products->name }}</h6>
                            <p>Barcode: {{ $products->barcode }}</p>
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
                                <input type="number" name="qty" class="form-control" placeholder="Banyaknya terjual ?"
                                    required>
                            </p>
                        </div>
                    </div>
                </div>
        </div>
        <div class="modal-footer">
            <a href="{{ route('kasir-input.index') }}" class="btn btn-secondary"><i class="fa fa-circle-left"></i>
                Kembali</a>
            <button type="submit" class="btn btn-primary">Tambah Laporan</button>
        </div>
        </form>
    </div>
@endsection
