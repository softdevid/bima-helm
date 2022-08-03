@extends('admin.layouts.template')
@section('content')
    @if (session()->has('success'))        
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <div class="navbar">
                {{ session('success') }}
                <button type="button" class="btn btn-secondary" data-bs-dismiss="alert" aria-label="Close"><i class="fa fa-close"></i></button>
            </div>
        </div>
    @endif

    <div class="table-responsive">
        <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">Tambah
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
                @foreach ($merks as $key => $merk)
                    <tr class="text-center" style="vertical-align: middle;">
                        <th scope="row">{{ $key + 1 }}</th>
                        <td>{{ $merk->name }}</td>
                        <td>
                            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#edit{{ $merk->id }}"><i
                                    class="fa fa-edit"></i></button>
                             <form method="POST" id="deleteProduct{{$key}}" action="{{ route('admin-merk.destroy',[$merk->id]) }}" class="d-inline">
                                @csrf
                                @method('delete')
                                <button type="submit" title="Hapus Merk" onclick="confirm('Yakin mau dihapus ?')" class="btn btn-outline-danger"><i class="fa fa-trash"></i></button>
                          </form>
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

    <!-- Modal tambah -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Merk</h5>
                    <button type="button" class="btn-close btn btn-secondary" data-bs-dismiss="modal" aria-label="Close"><i class="fa fa-close"></i></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <form action="{{ route('admin-merk.store') }}" method="post">                                
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
                                        <input type="hidden" class="form-control"
                                            id="slug" placeholder="Slug" name="slug"
                                            value="{{ old('slug') }}">
                                    </div>
                                </div>
                                <div class="mb-5 mt-3 row">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal edit -->
    @foreach ($merks as $key => $merk)
    <div class="modal fade" id="edit{{ $merk->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Merk</h5>
                    <button type="button" class="btn-close btn btn-secondary" data-bs-dismiss="modal" aria-label="Close"><i class="fa fa-close"></i></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <form action="{{ route('admin-merk.update', [$merk->id]) }}" method="POST">
                                @method('put')
                                @csrf
                                <div class="mb-3 row">
                                    <label for="name" class="col-sm-2 col-form-label">Nama Produk</label>
                                    <input type="hidden" name="id" value="{{ $merk->id }}">
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            id="name" placeholder="Nama Merk" name="name"
                                            value="{{ $merk->name }}">
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-5 mt-3 row">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach

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
