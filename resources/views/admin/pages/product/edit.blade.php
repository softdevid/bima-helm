@extends('admin.layouts.template')
@section('content')

    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="row">
        <div class="col-lg-8">
            <div class="form-group">
                <form action="{{ route('admin-product.update', [$product->id]) }}" method="post"
                    enctype="multipart/form-data">
                    @method('put')
                    @csrf

                    <div class="mb-3 row">
                        <input type="hidden" name="id" value="{{ $product->id }}">
                        <input type="hidden" name="size_id" value="{{ $product->size_id }}">
                        <label for="merk" class="col-sm-2 col-form-label">Kategori</label>
                        <div class="col-sm-10">
                            <select class="form-select form-control" name="category_id" aria-label="Default select example"
                                required>
                                <option value="">Pilih Kategori</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        @if ($product->category_id == $category->id) {{ 'selected' }} @endif>
                                        {{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="name" class="col-sm-2 col-form-label">Nama Produk</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                placeholder="Nama Produk" name="name" value="{{ $product->name }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    {{-- slug --}}
                    <input type="hidden" class="form-control" id="slug" placeholder="Slug" name="slug"
                        value="{{ $product->slug }}">
                    {{-- end slug --}}
                    <div class="mb-3 row">
                        <label for="merk" class="col-sm-2 col-form-label">Merk</label>
                        <div class="col-sm-10">
                            <select class="form-select form-control" name="merk_id" aria-label="Default select example"
                                required>
                                <option value="">Pilih Merk</option>
                                @foreach ($merks as $merk)
                                    <option value="{{ $merk->id }}"
                                        @if ($product->merk_id == $merk->id) {{ 'selected' }} @endif>
                                        {{ $merk->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="price" class="col-sm-2 col-form-label">Harga Beli</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="harga" placeholder="contoh: 125000"
                                name="purchase_price" value="{{ $product->price }}" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="price" class="col-sm-2 col-form-label">Harga Jual</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="harga" placeholder="contoh: 125000"
                                name="price" value="{{ $product->price }}" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="weight" class="col-sm-2 col-form-label">Berat produk</label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col">
                                    <input type="number" class="form-control" id="weight" placeholder="1000"
                                        name="weight" value="{{ $product->weight }}" required>
                                </div>
                                <div class="col">
                                    <b>gram</b>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="size" class="col-sm-2 col-form-label mt-4">Jumlah Stok Gudang</label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col">
                                    <label for="size" class="col-sm-2 col-form-label">XS</label>
                                    <input type="number" value="{{ $product->gudang->xs }}" class="form-control"
                                        name="gd_xs" min="0" placeholder="0">
                                </div>
                                <div class="col">
                                    <label for="size" class="col-sm-2 col-form-label">S</label>
                                    <input type="number" class="form-control" name="gd_s"
                                        value="{{ $product->gudang->s }}" min="0" placeholder="0">
                                </div>
                                <div class="col">
                                    <label for="size" class="col-sm-2 col-form-label">M</label>
                                    <input type="number" class="form-control" name="gd_m"
                                        value="{{ $product->gudang->m }}" min="0" placeholder="0">
                                </div>
                                <div class="col">
                                    <label for="size" class="col-sm-2 col-form-label">LG</label>
                                    <input type="number" class="form-control" name="gd_lg"
                                        value="{{ $product->gudang->lg }}" min="0" placeholder="0">
                                </div>
                                <div class="col">
                                    <label for="size" class="col-sm-2 col-form-label">XL</label>
                                    <input type="number" class="form-control" name="gd_xl"
                                        value="{{ $product->gudang->xl }}" min="0" placeholder="0">
                                </div>
                                <div class="col">
                                    <label for="size" class="col-sm-2 col-form-label">XXL</label>
                                    <input type="number" class="form-control" name="gd_xxl"
                                        value="{{ $product->gudang->xxl }}" min="0" placeholder="0">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="size" class="col-sm-2 col-form-label mt-4">Jumlah Stok Toko</label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col">
                                    <label for="size" class="col-sm-2 col-form-label">XS</label>
                                    <input type="number" value="{{ $product->size->xs }}" class="form-control"
                                        name="xs" min="0" placeholder="0">
                                </div>
                                <div class="col">
                                    <label for="size" class="col-sm-2 col-form-label">S</label>
                                    <input type="number" class="form-control" name="s"
                                        value="{{ $product->size->s }}" min="0" placeholder="0">
                                </div>
                                <div class="col">
                                    <label for="size" class="col-sm-2 col-form-label">M</label>
                                    <input type="number" class="form-control" name="m"
                                        value="{{ $product->size->m }}" min="0" placeholder="0">
                                </div>
                                <div class="col">
                                    <label for="size" class="col-sm-2 col-form-label">LG</label>
                                    <input type="number" class="form-control" name="lg"
                                        value="{{ $product->size->lg }}" min="0" placeholder="0">
                                </div>
                                <div class="col">
                                    <label for="size" class="col-sm-2 col-form-label">XL</label>
                                    <input type="number" class="form-control" name="xl"
                                        value="{{ $product->size->xl }}" min="0" placeholder="0">
                                </div>
                                <div class="col">
                                    <label for="size" class="col-sm-2 col-form-label">XXL</label>
                                    <input type="number" class="form-control" name="xxl"
                                        value="{{ $product->size->xxl }}" min="0" placeholder="0">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="price" class="col-sm-2 col-form-label">Deskrispsi</label>
                        <div class="col-sm-10">
                            <textarea name="description" id="" cols="30" rows="10" style="height: 100px;"
                                placeholder="Deskripsi Produk" class="form-control" required>{{ $product->description }}</textarea>
                        </div>
                    </div>

                    @if ($product->image_main === '')
                        <div class="mb-3">
                            <div class="row">
                                <label for="image_main" class="col-sm-2 col-form-label">Gambar utama</label>
                                <div class="col-sm-10">
                                    <input type="file" name="image_main" class="form-control" required>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="mb-3 d-none">
                            <div class="row">
                                <label for="image_main" class="col-sm-2 col-form-label">Gambar utama</label>
                                <div class="col-sm-10">
                                    <input type="file" name="image_main" class="form-control">
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="mb-3 row">
                        <label for="size" class="col-sm-2 col-form-label">Gambar lain</label>
                        <div class="col-sm-10">
                            <input type="file" name="images[]" class="form-control">
                        </div>
                    </div>

                    <div class="row mt-3">
                        <button type="submit" class="btn btn-outline-primary">Simpan</button>
                        <a href="{{ route('admin-product.index') }}" class="btn btn-secondary"><i
                                class="fa fa-circle-left"></i> Kembali</a>
                    </div>

                </form>
            </div>
        </div>
        <div class="col-lg-4">
            <p>Gambar utama: </p>
            @if ($product->image_main === '')
                <div class="card" style="max-height: 100px; max-width: 150px;">
                    <div class="card text-bg-dark text-center">
                        <b>Gambar Kosong</b>
                    </div>
                </div>
            @else
                <div class="card" style="max-height: 100px; max-width: 150px;">
                    <div class="card text-bg-dark">
                        <img src="{{ $product->url }}" class="card-img" alt="...">
                        <div class="card-img-overlay d-flex align-items-end p-0">
                            <button class="btn text-danger bg-dark text-center text-white" data-toggle="modal"
                                data-target="#hapusGambar"><i class="fa fa-close"></i></button>
                        </div>
                    </div>
                </div>
            @endif

            <p class="mt-5">Gambar lain :</p>
            @if (count($images) > 0)
                @foreach ($images as $image)
                    <div class="card mt-5" style="max-height: 100px; max-width: 150px;">
                        <div class="card text-bg-dark">
                            <img src="{{ $image->url }}" class="card-img" alt="...">
                            <div class="card-img-overlay d-flex align-items-end p-0">
                                <form action="/deleteimages/{{ $image->id }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('delete')
                                    <button class="btn text-danger bg-dark text-center text-white"
                                        onclick="return confirm('Yakin mau hapus gambar')"><i
                                            class="fa fa-close"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
                {{-- @else
                <div class="card" style="max-height: 100px; max-width: 150px;">
                    <div class="card text-bg-dark text-center">
                      <b>Gambar Kosong</b>
                    </div>
                </div> --}}
            @endif
        </div>
    </div>

    <!-- Hapus Gambar Modal-->
    <div class="modal fade" id="hapusGambar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Yakin Hapus Gambar ?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    <form action="/deletecover/{{ $product->id }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-primary">Hapus Gambar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
