@extends('kasir.layouts.template')
@section('content')
    <div class="col-sm-12">

        <div class="row">
            <div class="col">
                <input type="text" name="barcode" class="form-control" placeholder="No. Barcode">
            </div>
            <div class="col">
                <input type="number" min="1" name="qty" class="form-control" placeholder="Banyaknya?">
            </div>
        </div>
        <div class="row mt-2">
            <input type="hidden" value="price" name="price">
            <input type="hidden" value="purchase_price" name="purchase_price">
            <input type="hidden" value="product_id" name="product_id">
            <input type="hidden" value="profit" name="profit">
            <div class="col">
                <input type="text" name="name" placeholder="Nama Produk" disabled class="form-control">
            </div>
            <div class="col">
                <input type="text" name="price" placeholder="Harga" disabled class="form-control">
            </div>
        </div>
        <center><a href="#" class="btn btn-success mt-3">Tambah</a></center>
    </div>
    <div class="col-sm-6 mt-3">
        <div class="row">
            <label for="tunai" class="col-sm-2">Tunai</label>
            {{-- tunai ora diinputna maring database --}}
            <input type="number" class="form-control col-sm-4" name="tunai" placeholder="Rp. 3000">
        </div>
    </div>
    <div class="col-sm-12 mt-2">
        <div class="row">
            <div class="col-sm-8">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No. Barcode</th>
                            <th>Nama</th>
                            <th>Banyaknya?</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                    <tbody>
                        <tr><input type="hidden" value="price" name="price">
                            <input type="hidden" value="purchase_price" name="purchase_price">
                            <input type="hidden" value="product_id" name="product_id">
                            <input type="hidden" value="profit" name="profit">
                            <td>999959385938</td>
                            <td>Coca-cola</td>
                            <td>1</td>
                            <td>3.000</td>
                        </tr>
                    </tbody>
                    </tbody>
                </table>
            </div>
            <div class="col-sm-4">
                <h6>Bima Helm</h6>
                <hr>
                <p>Total: Rp. 3.000</p>
                <p>Tunai: Rp. 5.000</p>
                <p>Kembalian: Rp. 2.000</p>
                <a href="#" class="btn btn-primary mt-3"><i class="fa fa-print"></i> Print</a>
            </div>
        </div>
    </div>

    {{-- jQuery Script --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="/js/kasir.js"></script>
    {{-- Check Slug --}}
@endsection
