@extends('admin.layouts.template')
@section('content')
<form action="/admin/merek/create" method="post" enctype="multipart/form-data">
    @csrf
    <div class="mb-3 row">
        <label for="name" class="col-sm-2 col-form-label">Nama Produk</label>
        <div class="col-sm-10">
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                placeholder="Nama Produk" name="name" value="{{ old('name') }}">
            @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="mb-5 mt-3 row">
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="/admin/product/" class="btn btn-danger" style="margin-left: 5px;"><i
                class="fa-solid fa-angles-left"></i> Kembali</a>
    </div>
</form>

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