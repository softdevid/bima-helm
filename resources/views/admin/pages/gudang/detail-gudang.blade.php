@extends('admin.layouts.template')
@section('content')
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            {{-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> --}}
        </div>
    @endif

    <section class="item-details section">
        <div class="top-area" style="margin-top: -5%;">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-12">
                    <div class="product-images">
                        <main id="gallery">
                            <div class="main-img">
                                <img src="{{ $product->url }}" class="img-fluid images" id="current" alt="#">
                            </div>
                        </main>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-12">
                    <div class="product-info">
                        <b>Nama: {{ $product->name }}</b>
                        <p>No. Barcode: {{ $product->barcode }}</p>
                        <p>Kategori: {{ $product->category->name }}</p>
                        <p>Harga Beli: Rp.
                            {{ number_format($product->purchase_price, 0, ',', '.') }}
                        </p>
                        <p>Harga Jual: Rp. {{ number_format($product->price, 0, ',', '.') }}
                        </p>
                        <p><b>Stok Gudang:</b></p>
                        @if ($product->size_id != null)
                            <div class="row">
                                <div class="col">XS: {{ $product->gudang->xs }}</div>
                                <div class="col">S: {{ $product->gudang->s }}</div>
                                <div class="col">LG: {{ $product->gudang->lg }}</div>
                            </div>
                            <div class="row">
                                <div class="col">M: {{ $product->gudang->m }}</div>
                                <div class="col">XL: {{ $product->gudang->xl }}</div>
                                <div class="col">XXL: {{ $product->gudang->xxl }}</div>
                            </div>
                            <p>Stok total: {{ $product->gd_stock }}</p>
                        @endif

                        <p class="mt-3"><b>Stok Toko:</b></p>
                        @if ($product->size_id != null)
                            <div class="row">
                                <div class="col">XS: {{ $product->size->xs }}</div>
                                <div class="col">S: {{ $product->size->s }}</div>
                                <div class="col">LG: {{ $product->size->lg }}</div>
                            </div>
                            <div class="row">
                                <div class="col">M: {{ $product->size->m }}</div>
                                <div class="col">XL: {{ $product->size->xl }}</div>
                                <div class="col">XXL: {{ $product->size->xxl }}</div>
                            </div>
                            <p>Stok total: {{ $product->stock }}</p>
                        @endif
                        @auth
                        @endauth
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-12 col-12" style="margin-top: -10px;">
                    <div class="product-details-info">
                        <div class="single-block">
                            <div class="row">
                                <div class="col-lg-12 col-12 mb-3">
                                    <div class="row info-body">
                                        <div class="col-12 col-md-12 mb-3 mb-md-0">
                                            <h4>Tambah Stok ke Gudang ?</h4>
                                            <ul class="normal-list">
                                                <form action="{{ route('admin-gudang.store') }}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="gudang_id"
                                                        value="{{ $product->gudang_id }}">
                                                    <input type="hidden" name="id" value="{{ $product->id }}">
                                                    <li>
                                                        <div class="row">
                                                            <div class="col-sm-3">
                                                                XS:
                                                            </div>
                                                            <div class="col-sm-9">
                                                                <input type="number" name="gd_xs" class="form-control"
                                                                    placeholder="XS ?">
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="row">
                                                            <div class="col-sm-3">
                                                                S:
                                                            </div>
                                                            <div class="col-sm-9">
                                                                <input type="number" name="gd_s" class="form-control"
                                                                    placeholder="S ?">
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="row">
                                                            <div class="col-sm-3">
                                                                M:
                                                            </div>
                                                            <div class="col-sm-9">
                                                                <input type="number" name="gd_m" class="form-control"
                                                                    placeholder="M ?">
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="row">
                                                            <div class="col-sm-3">
                                                                LG:
                                                            </div>
                                                            <div class="col-sm-9">
                                                                <input type="number" name="gd_lg" class="form-control"
                                                                    placeholder="LG ?">
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="row">
                                                            <div class="col-sm-3">
                                                                XL:
                                                            </div>
                                                            <div class="col-sm-9">
                                                                <input type="number" name="gd_xl" class="form-control"
                                                                    placeholder="XL ?">
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="row">
                                                            <div class="col-sm-3">
                                                                XXL:
                                                            </div>
                                                            <div class="col-sm-9">
                                                                <input type="number" name="gd_xxl" class="form-control"
                                                                    placeholder="XXL ?">
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="alert alert-info">Isikan stok yang ingin ditambah ke
                                                            gudang
                                                        </div>
                                                    </li>
                                                    <button type="submit" class="btn btn-outline-primary"><i
                                                            class="fa fa-plus"></i> Tambah stok gudang</button>
                                                </form>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- update stok gudang --}}

                <div class="col-lg-6 col-md-12 col-12" style="margin-top: -10px;">
                    <div class="product-details-info">
                        <div class="single-block">
                            <div class="row">
                                <div class="col-lg-12 col-12 mb-3">
                                    <div class="row info-body">
                                        <div class="col-12 col-md-12 mb-3 mb-md-0">
                                            <h4>Tambah Stok ke Toko ?</h4>
                                            <ul class="normal-list">
                                                <form action="{{ route('admin-gudang.update', [$product->id]) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('put')
                                                    <li>
                                                        <div class="row">
                                                            <div class="col-sm-3">
                                                                XS:
                                                            </div>
                                                            <div class="col-sm-9">
                                                                @if ($gudang->xs != 0)
                                                                    <input type="number" name="gd_xs"
                                                                        class="form-control" placeholder="XS ?">
                                                                @else
                                                                    <b>Stok XS di gudang kosong</b>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="row">
                                                            <div class="col-sm-3">
                                                                S:
                                                            </div>
                                                            <div class="col-sm-9">
                                                                @if ($gudang->s != 0)
                                                                    <input type="number" name="gd_s"
                                                                        class="form-control" placeholder="S ?">
                                                                @else
                                                                    <b>Stok S di gudang kosong</b>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="row">
                                                            <div class="col-sm-3">
                                                                M:
                                                            </div>
                                                            <div class="col-sm-9">
                                                                @if ($gudang->m != 0)
                                                                    <input type="number" name="gd_m"
                                                                        class="form-control" placeholder="M ?">
                                                                @else
                                                                    <b>Stok M di gudang kosong</b>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="row">
                                                            <div class="col-sm-3">
                                                                LG:
                                                            </div>
                                                            <div class="col-sm-9">
                                                                @if ($gudang->lg != 0)
                                                                    <input type="number" name="gd_lg"
                                                                        class="form-control" placeholder="LG ?">
                                                                @else
                                                                    <b>Stok LG di gudang kosong</b>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="row">
                                                            <div class="col-sm-3">
                                                                XL:
                                                            </div>
                                                            <div class="col-sm-9">
                                                                @if ($gudang->xl != 0)
                                                                    <input type="number" name="gd_xl"
                                                                        class="form-control" placeholder="XL ?">
                                                                @else
                                                                    <b>Stok XL di gudang kosong</b>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="row">
                                                            <div class="col-sm-3">
                                                                XXL:
                                                            </div>
                                                            <div class="col-sm-9">
                                                                @if ($gudang->xxl != 0)
                                                                    <input type="number" name="gd_xxl"
                                                                        class="form-control" placeholder="XXL ?">
                                                                @else
                                                                    <b>Stok XXL di gudang kosong</b>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="alert alert-info">Isikan stok yang ingin ditambah ke
                                                            toko
                                                        </div>
                                                    </li>
                                                    <button type="submit" class="btn btn-outline-primary"><i
                                                            class="fa fa-plus"></i> Update Stok
                                                        Toko</button>
                                                </form>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <a href="{{ route('admin-gudang.index') }}" class="btn btn-secondary mt-3"><i class="fa fa-circle-left"></i>
                Kembali</a>
        </div>
    </section>
@endsection
