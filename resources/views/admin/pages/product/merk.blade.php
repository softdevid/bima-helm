@extends('admin.layouts.template')
@section('content')
<div class="table-responsive">
    <a href="/admin/merk/create" class="btn btn-primary mb-3">Tambah</a>
    <table class="table">
        <thead>
            <tr class="text-center">
                <th scope="col">#</th>
                <th scope="col">Merek</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            @foreach ($merks as $merk)
            <tr class="text-center" style="vertical-align: middle;">
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $merk->name }}</td>
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
