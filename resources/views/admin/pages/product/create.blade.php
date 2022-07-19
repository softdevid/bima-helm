@extends('admin.layouts.template')
@section('content')
    <form action="/admin/product/create" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3 row">
            <label for="merk" class="col-sm-2 col-form-label">Merk</label>
            <div class="col-sm-10">
                <select class="form-select form-control" name="category_id" aria-label="Default select example">
                    <option selected>Pilih Merk</option>
                    @foreach ($category as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="name" class="col-sm-2 col-form-label">Nama Produk</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name" placeholder="Nama Produk" name="name">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="name" class="col-sm-2 col-form-label">Slug</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="slug" placeholder="Slug" name="slug">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="merk" class="col-sm-2 col-form-label">Merk</label>
            <div class="col-sm-10">
                <select class="form-select form-control" name="merk" aria-label="Default select example">
                    <option selected>Pilih Merk</option>
                    <option value="spoiler">SPOILER</option>
                    <option value="apd face shield">APD FACE SHIELD</option>
                    <option value="kyt">KYT</option>
                    <option value="ink">INK</option>
                    <option value="carglos">Carglos</option>
                    <option value="dag">DAG</option>
                    <option value="hiu">HIU</option>
                    <option value="nhk">NHK</option>
                    <option value="mds">MDS</option>
                    <option value="hbc">HBC</option>
                    <option value="bmc">BMC</option>
                    <option value="retro">RETRO</option>
                    <option value="google">GOOGLE</option>
                    <option value="kaca helm">KACA HELM</option>
                    <option value="spare part">SPARE PART</option>
                    <option value="helm anak">HELM ANAK</option>
                    <option value="gix">GIX</option>

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
            <label for="size" class="col-sm-2 col-form-label mt-4">Jumlah Stok / Ukuran</label>
            <div class="col-sm-10">
                <div class="row">
                    <div class="col">
                        <label for="size" class="col-sm-2 col-form-label">XS</label>
                        <input type="number" value="0" class="form-control" name="xs">
                    </div>
                    <div class="col">
                        <label for="size" class="col-sm-2 col-form-label">S</label>
                        <input type="number" value="0" class="form-control" name="s">
                    </div>
                    <div class="col">
                        <label for="size" class="col-sm-2 col-form-label">M</label>
                        <input type="number" value="0" class="form-control" name="m">
                    </div>
                    <div class="col">
                        <label for="size" class="col-sm-2 col-form-label">LG</label>
                        <input type="number" value="0" class="form-control" name="lg">
                    </div>
                    <div class="col">
                        <label for="size" class="col-sm-2 col-form-label">XL</label>
                        <input type="number" value="0" class="form-control" name="xl">
                    </div>
                    <div class="col">
                        <label for="size" class="col-sm-2 col-form-label">XXL</label>
                        <input type="number" value="0" class="form-control" name="xxl">
                    </div>
                </div>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="size" class="col-sm-2 col-form-label mt-4">Gambar</label>
            <div class="col-sm-10">
                <div class="row">
                    <div class="row">
                        <div class="col">
                            <label for="size" class="col-sm-4 col-form-label">Gambar 1</label>
                            <input class="form-control" type="file" id="formFile" name="image1">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="size" class="col-sm-4 col-form-label">Gambar 2</label>
                            <input class="form-control" type="file" id="formFile" name="image2">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="size" class="col-sm-4 col-form-label">Gambar 3</label>
                            <input class="form-control" type="file" id="formFile" name="image3">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="size" class="col-sm-4 col-form-label">Gambar 4</label>
                            <input class="form-control" type="file" id="formFile" name="image4">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mb-5 mt-3 row">
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="/admin/product/" class="btn btn-danger" style="margin-left: 5px;"><i
                    class="fa-solid fa-angles-left"></i> Kembali</a>
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
    </script>
@endsection
