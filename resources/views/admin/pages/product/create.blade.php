@extends('admin.layouts.template')
@section('content')
    <form action="/admin/product/create" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3 row">
            <label for="name" class="col-sm-2 col-form-label">Nama Produk</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name" placeholder="Nama Produk" name="name">
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
@endsection
