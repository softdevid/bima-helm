@extends('layouts.main')
@section('content')
@include('partials.breadcrumbs')

<div class="jumbotron bg-cover text-white"
    style="background-image: linear-gradient(to bottom, rgba(0,0,0,0.6) 0%,rgba(0,0,0,0.6) 100%), url(/img/toko-bima.png); padding: 150px; width: 100%;">
</div>

<div class="container">
    <div class="pt-5" id="judul">
        <h2 class="text-center">Cara Belanja</h2>
    </div>
    <article class="pt-3 mb-5">
        Bima Helm adalah perusahaan helm yang berbasis di Purbalingga, Jawa Tengah. Bima Helm adalah toko Helm terkemuka
        di Purbalingga yang tidak melambung begitu saja.
        Banyak alur yang dilalui dengan segala rintangan yang ada. Bima helm hadir untuk memenuhi kebutuhan masyarakat
        dengan produknya yang beragam. Bukan hanya
        tersedia helm saja tetapi ada produk lain yang diperjual belikan yakni Faceshield, jas hujan, Aksesoris helm dan
        lainnya.
    </article>
</div>
@endsection