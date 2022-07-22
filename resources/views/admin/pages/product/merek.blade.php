@extends('admin.layouts.template')
@section('content')
<div class="table-responsive">
    <a href="/admin/merek/create" class="btn btn-primary mb-3">Tambah</a>
    <table class="table">
        <thead>
            <tr class="text-center">
                <th scope="col">#</th>
                <th scope="col">Gambar</th>
                <th scope="col">Nama Produk</th>
                <th scope="col">Merk</th>
                <th scope="col">Harga</th>
                <th scope="col">Ukuran</th>
                <th scope="col">Stok</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            @php
            $no = 1;
            @endphp
            @foreach ($merek as $merek)
            <tr class="text-center" style="vertical-align: middle;">
                <th scope="row">{{ $no++ }}</th>
                <td><img src="/img/{{ $merek->image }}" alt="" style="width: 100px;"></td>
                <td>{{ $merek->name }}</td>
                <td>{{ $merek->merk }}</td>
                <td>Rp. {{ number_format($merek->price) }}</td>
                <td>XL</td>
                <td>{{ $merek->stock }}</td>
                <td>
                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#edit"><i
                            class="fa fa-edit"></i></button>
                    <a href="/hapus" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection