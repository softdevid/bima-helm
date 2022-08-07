@extends('layouts.main')
@section('content')
    <div class="container py-5">
        <h1 class="text-center mb-3">Galeri Bima Helm</h1>
        <div class="row" data-masonry='{"percentPosition": true }'>
            @foreach ($images as $image)
                <div class="col-sm-6 col-md-4 col-lg-3 py-2">
                    <img src="{{ asset('galleries/' . $image->getFilename()) }}" alt="" class="img-thumbnail">
                </div>
            @endforeach
        </div>
    </div>
@endsection
