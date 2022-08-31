@extends('kasir.layouts.template')
@section('content')
    <div class="col-lg-12 col-sm-12 col-md-12">

        <div class="row">
            <div class="col-lg-4 col-sm-12 col-md-12 mt-2">
                <input type="text" id="barcode" name="barcode" class="form-control" placeholder="No. Barcode" required>
                <input type="hidden" id="barcodeData" name="barcodeData">
            </div>
            <div class="col-lg-4 col-sm-12 col-md-12 mt-2">
                <input type="number" id="qty" min="1" name="qty" class="form-control"
                    placeholder="Banyaknya?" required>
            </div>
            <div class="col-lg-4 col-sm-12 col-md-12 mt-2">
                <select name="size_name_id" id="sizeName" class="form-control form-select" required>
                    <option value="">Pilih ukuran</option>
                    @foreach ($size_name as $sn)
                        <option value="{{ $sn->id }}">{{ $sn->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-sm-12 col-md-12 mt-2">
                <input type="text" id="name" name="name" placeholder="Nama Produk" disabled class="form-control">
            </div>
            <div class="col-lg-6 col-sm-12 col-md-12 mt-2">
                <input type="text" id="price" name="price" placeholder="Harga" disabled class="form-control">
            </div>
        </div>
        {{-- <center><a href="#" class="btn btn-success mt-3">Tambah</a></center> --}}
        <div class="row justify-content-center">
            <button type="submit" id="btnTambah" class="btn btn-success mt-3">Tambah</button>
        </div>
    </div>
    <div class="col-sm-6 col-md-8 mt-3">
        <div class="row">
            <label for="tunai" class="col-sm-2 col-md-3">Tunai</label>
            {{-- tunai ora diinputna maring database --}}
            <input type="number" id="tunai" class="form-control col-sm-4" name="tunai" placeholder="Rp. 3000">
        </div>
    </div>
    <div class="col-sm-12 mt-2">
        <div class="row">
            <div class="col-sm-8">
                <div class="table-responsive">
                    <table class="table" id="tabelKasir">
                        <thead>
                            <tr>
                                <th>No. Barcode</th>
                                <th>Nama</th>
                                <th>Banyaknya ?</th>
                                <th>Ukuran</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-sm-4 mt-2">
                <h6>Bima Helm</h6>
                <hr>
                <p>Total: Rp. 3.000</p>
                <p>Tunai: Rp <span id="tunai-res"></span></p>
                <p>Kembalian: Rp. 2.000</p>
                <a href="#" class="btn btn-primary mt-3"><i class="fa fa-print"></i> Print</a>
            </div>
        </div>
    </div>

    {{-- jQuery Script --}}
    <script src="/js/kasir.js"></script>
    {{-- Check Slug --}}
@endsection
