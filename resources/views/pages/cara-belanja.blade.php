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
    <div class="container pt-3">
        <div class="row">
            <article class="pt-3 mb-5">
                <ol start="1">
                    <span><b>Beli dan checkout segera</b></span>
                </ol>
                <p>Pada halaman utama, kalian bisa milih barang mana yang ingin kalian beli. Lalu kalian akan masuk
                    kehalaman checkout dan tekan tombol checkout. Setelah itu kalian akan mengisi alamat anda dan
                    memilih tipe pengiriman mau itu reguler atau express atau yang lain. Setelah itu tinggal klik tombol
                    beli.</p>
                <br>
                <ol start="2">
                    <span><b>Masukan Keranjang dan checkout dengan produk lain</b></span>
                </ol>
                <p>Pada halaman utama, kalian memilih produk yang kalian ingin beli. Jika sudah memilihnya, kalian klik
                    tombol masukkan keranjang. Lalu, kalian pergi ke icon keranjang lalu tekan. Habis itu, kalian pilih
                    produk yang mana akan di checkout. Setelah itu, masukkan alamat anda dan anda memilih tipe
                    pengiriman. Sesudah itu kalian bisa klik tombol beli. Habis itu kalian tunggu sampai paket kalian
                    datang.</p>
            </article>
        </div>
    </div>
</div>
@endsection