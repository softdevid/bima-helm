@extends('layouts.main')
@section('content')
    <div class="container py-2 py-md-5">
        <h4 class="text-center mb-1">Galeri Bima Helm</h4>
        <div class="row masonry">
            @foreach ($images as $image)
                <div class="col-6 col-md-4 col-lg-3 py-2">
                    <a href="{{ asset('galleries/' . $image->getFilename()) }}" class="glightbox">
                        <img src="{{ asset('galleries/' . $image->getFilename()) }}" alt="image" class="img-thumbnail">
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
