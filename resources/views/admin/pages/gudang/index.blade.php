@extends('admin.layouts.template')
@section('content')
    <div class="table-responsive">
        <table class="table">
            <tr>
                <th>#</th>
                <th>Barcode</th>
                <th>Nama</th>
                <th>Merek</th>
                <th>Kategori</th>
                <th>Harga Beli</th>
                <th>Harga Jual</th>
                <th>Stok toko</th>
                <th>Stok gudang</th>
                <th colspan="2">Aksi</th>
            </tr>

            @foreach ($gudang as $key => $gudang)
                <tr>
                    <th>{{ $key + 1 }}</th>
                    <td>{{ $gudang->barcode }}</td>
                    <td>{{ $gudang->name }}</td>
                    <td>{{ $gudang->merk->name }}</td>
                    <td>{{ $gudang->category->name }}</td>
                    <td>Rp. {{ number_format($gudang->purchase_price, 0, ',', '.') }}</td>
                    <td>Rp. {{ number_format($gudang->price, 0, ',', '.') }}</td>
                    <td>{{ $gudang->stock }}</td>
                    <td>{{ $gudang->gd_stock }}</td>
                    <td><a href="{{ route('admin-gudang.show', [$gudang->id]) }}" class="btn btn-outline-primary"><i
                                class="fa fa-plus"></i> Stok
                            Toko & Gudang</a></td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
