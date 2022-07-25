@extends('admin.layouts.template')
@section('content')
    <div class="table-responsive">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Tambah
            Merk</button>
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
                            <form action="/admin/merk/delete/{{ $merk->id }}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{ $merk->id }}" />
                                <button class="btn btn-outline-danger"><i class="fa fa-trash"></i></button>
                            </form>

                            {{-- <a href="/admin/merk/delete/{{ $merk->id }}" onclick="confirm('Yakin hapus?')"
                                class="btn btn-danger"><i class="fa fa-trash"></i></a> --}}

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Button trigger modal -->
    {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Launch demo modal
    </button> --}}

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Merk</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <form action="/admin/merk/store" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3 row">
                                    <label for="name" class="col-sm-2 col-form-label">Nama Produk</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            id="name" placeholder="Nama Produk" name="name"
                                            value="{{ old('name') }}">
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-5 mt-3 row">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <a href="/admin/merk" class="btn btn-danger" style="margin-left: 5px;"><i
                                            class="fa-solid fa-angles-left"></i>
                                        Kembali</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
