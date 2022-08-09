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
    
    	
	<div class="container">
		<form action="{{ route('admin-merk.update', [$merk->id]) }}" method="post">
            @method("put")
            @csrf                
            <div class="mb-3 row">
                <label for="name" class="col-sm-2 col-form-label">Nama merk</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                        id="name" placeholder="Nama merk" name="name"
                        value="{{ old('name', $merk->name) }}" required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <input type="text" class="form-control"
                        id="slug" placeholder="Slug" name="slug"
                        value="{{ old('slug', $merk->slug) }}" required>
                </div>
            </div>
            <div class="mb-5 mt-3 row">
                <button type="submit" class="btn btn-outline-warning"><i class="fa fa-edit"></i> Edit</button>
                <a href="{{ route('admin-merk.index') }}" class="btn btn-secondary" style="margin-left: 3px;"><i class="fa fa-circle-left"></i> Kembali</a>
            </div>
        </form>		       
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
