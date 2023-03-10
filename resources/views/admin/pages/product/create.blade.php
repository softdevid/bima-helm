@extends('admin.layouts.template')
@section('content')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <form action="{{ route('admin-product.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="col-sm-12">
            <div class="mb-3 row">
                <label for="barcode" class="col-sm-2 col-form-label">Barcode Produk</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control @error('barcode') is-invalid @enderror" id="barcode"
                        placeholder="No barcode Produk" name="barcode" value="{{ old('barcode') }}" required>
                    @error('barcode')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <label for="merk" class="col-sm-2 col-form-label">Kategori</label>
                <div class="col-sm-10">
                    <select class="form-select form-control" name="category_id" aria-label="Default select example"
                        required>
                        <option value="">Pilih Kategori</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                @if (old('category_id') == $category->id) {{ 'selected' }} @endif>
                                {{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="name" class="col-sm-2 col-form-label">Nama Produk</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                        placeholder="Nama Produk" name="name" value="{{ old('name') }}" required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            {{-- slug --}}
            <input type="hidden" class="form-control" id="slug" placeholder="Slug" name="slug"
                value="{{ old('slug') }}">
            {{-- end slug --}}
            <div class="mb-3 row">
                <label for="merk" class="col-sm-2 col-form-label">Merk</label>
                <div class="col-sm-10">
                    <select class="form-select form-control" name="merk_id" aria-label="Default select example" required>
                        <option value="">Pilih Merk</option>
                        @foreach ($merks as $merk)
                            <option value="{{ $merk->id }}"
                                @if (old('merk_id') == $merk->id) {{ 'selected' }} @endif>
                                {{ $merk->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="purchase_price" class="col-sm-2 col-form-label">Harga Beli</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="harga" placeholder="contoh: 125000"
                        name="purchase_price" value="{{ old('purchase_price') }}" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="price" class="col-sm-2 col-form-label">Harga Jual</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="harga" placeholder="contoh: 125000" name="price"
                        value="{{ old('price') }}" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="weight" class="col-sm-2 col-form-label">Berat produk</label>
                <div class="col-sm-10">
                    <div class="row">
                        <div class="col">
                            <input type="number" class="form-control" id="weight" placeholder="1000" name="weight"
                                value="{{ old('weight') }}" required>
                        </div>
                        <div class="col">
                            <b>gram</b>
                        </div>
                        <div class="col">
                            <b>1 kg = 1000 gram</b>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="size" class="col-sm-2 col-form-label mt-4">Jumlah Stok Gurang</label>
                <div class="col-sm-10">
                    <div class="row">
                        <div class="col">
                            <label for="size" class="col-sm-2 col-form-label">XS</label>
                            <input type="number" value="{{ old('xs') }}" class="form-control" name="gd_xs"
                                min="0" placeholder="0" required>
                        </div>
                        <div class="col">
                            <label for="size" class="col-sm-2 col-form-label">S</label>
                            <input type="number" class="form-control" name="gd_s" value="{{ old('gd_s') }}"
                                min="0" placeholder="0" required>
                        </div>
                        <div class="col">
                            <label for="size" class="col-sm-2 col-form-label">M</label>
                            <input type="number" class="form-control" name="gd_m" value="{{ old('gd_m') }}"
                                min="0" placeholder="0" required>
                        </div>
                        <div class="col">
                            <label for="size" class="col-sm-2 col-form-label">LG</label>
                            <input type="number" class="form-control" name="gd_lg" value="{{ old('gd_lg') }}"
                                min="0" placeholder="0" required>
                        </div>
                        <div class="col">
                            <label for="size" class="col-sm-2 col-form-label">XL</label>
                            <input type="number" class="form-control" name="gd_xl" value="{{ old('gd_xl') }}"
                                min="0" placeholder="0" required>
                        </div>
                        <div class="col">
                            <label for="size" class="col-sm-2 col-form-label">XXL</label>
                            <input type="number" class="form-control" name="gd_xxl" value="{{ old('gd_xxl') }}"
                                min="0" placeholder="0" required>
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
                            <input type="number" value="{{ old('xs') }}" class="form-control" name="xs"
                                min="0" placeholder="0" required>
                        </div>
                        <div class="col">
                            <label for="size" class="col-sm-2 col-form-label">S</label>
                            <input type="number" class="form-control" name="s" value="{{ old('s') }}"
                                min="0" placeholder="0" required>
                        </div>
                        <div class="col">
                            <label for="size" class="col-sm-2 col-form-label">M</label>
                            <input type="number" class="form-control" name="m" value="{{ old('m') }}"
                                min="0" placeholder="0" required>
                        </div>
                        <div class="col">
                            <label for="size" class="col-sm-2 col-form-label">LG</label>
                            <input type="number" class="form-control" name="lg" value="{{ old('lg') }}"
                                min="0" placeholder="0" required>
                        </div>
                        <div class="col">
                            <label for="size" class="col-sm-2 col-form-label">XL</label>
                            <input type="number" class="form-control" name="xl" value="{{ old('xl') }}"
                                min="0" placeholder="0" required>
                        </div>
                        <div class="col">
                            <label for="size" class="col-sm-2 col-form-label">XXL</label>
                            <input type="number" class="form-control" name="xxl" value="{{ old('xxl') }}"
                                min="0" placeholder="0" required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="price" class="col-sm-2 col-form-label">Deskrispsi</label>
                <div class="col-sm-10">
                    <textarea name="description" id="" cols="30" rows="10" style="height: 100px;"
                        placeholder="Deskripsi Produk" class="form-control" required>{{ old('description') }}</textarea>
                </div>
            </div>

            <div class="mb-3">
                <div class="row">
                    <label for="image_main" class="col-sm-2 col-form-label">Gambar utama</label>
                    <div class="col-sm-10">
                        <input type="file" name="image_main"
                            class="form-control @error('image_main') is-invalid @enderror" required>
                        @error('image_main')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="size" class="col-sm-2 col-form-label">Gambar lain</label>
                <div class="col-sm-10">
                    <input type="file" name="images[]" class="form-control">
                    <input type="file" name="images[]" class="form-control">
                    <input type="file" name="images[]" class="form-control">
                </div>
            </div>
        </div>

        <div class="mb-5 mt-3 row">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('admin-product.index') }}" class="btn btn-danger" style="margin-left: 5px;"><i
                    class="fa-solid fa-angles-left"></i> List Produk</a>
        </div>
    </form>

    {{-- jQuery Script --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    {{-- Check Slug --}}
    <script>
        $('#name').change(function(e) {
            $.get('{{ url('check_slug') }}', {
                    'name': $(this).val()
                },
                function(data) {
                    $('#slug').val(data.slug);
                    console.log(data.slug);
                }
            );
        });

        function bacaGambar(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#gambar_load').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $('#preview_gambar').change(function() {
            bacaGambar(this)
        });
    </script>


    <!--  <script type="text/javascript">
        $(document).ready(function() {
            $(".btn-success").click(function() {

                var lsthmtl = $(".clone").html();

                $(".increment").after(lsthmtl);
                arr.splice(4, 1);
            });

            $("body").on("click", ".btn-danger", function() {

                $(this).parents(".hdtuto").remove();

            });

        });
    </script> -->
@endsection
