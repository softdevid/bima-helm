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
            <label for="size" class="col-sm-2 col-form-label mt-4">Jumlah Ukuran</label>
            <div class="col-sm-10">
                <div class="row">
                    <div class="col">
                        <label for="size" class="col-sm-2 col-form-label">XS</label>
                        <input type="number" value="0" class="form-control">
                    </div>
                    <div class="col">
                        <label for="size" class="col-sm-2 col-form-label">S</label>
                        <input type="number" value="0" class="form-control">
                    </div>
                    <div class="col">
                        <label for="size" class="col-sm-2 col-form-label">M</label>
                        <input type="number" value="0" class="form-control">
                    </div>
                    <div class="col">
                        <label for="size" class="col-sm-2 col-form-label">LG</label>
                        <input type="number" value="0" class="form-control">
                    </div>
                    <div class="col">
                        <label for="size" class="col-sm-2 col-form-label">XL</label>
                        <input type="number" value="0" class="form-control">
                    </div>
                    <div class="col">
                        <label for="size" class="col-sm-2 col-form-label">XXL</label>
                        <input type="number" value="0" class="form-control">
                    </div>
                </div>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="stock" class="col-sm-2 col-form-label">Stok</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="stok" placeholder="10" name="stock">
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
                            <input class="form-control" type="file" id="formFile" name="imag3">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="size" class="col-sm-4 col-form-label">Gambar 4</label>
                            <input class="form-control" type="file" id="formFile" name="imag4">
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
@endsection
