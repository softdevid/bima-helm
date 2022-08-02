@extends('layouts.main')
@section('content')
    @include('partials.breadcrumbs')

    @php
    $village = Indonesia::findVillage(auth()->user()->address->village, ['district.city.province']);
    @endphp

    <!--====== Checkout Form Steps Part Start ======-->
    <section class="checkout-wrapper section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="checkout-steps-form-style-1">
                        <ul id="accordion-checkout">
                            <li>
                                <h6 class="title collapsed" data-bs-toggle="collapse" data-bs-target="#coll-address" aria-expanded="false" aria-controls="coll-address">
                                    Alamat
                                    Pengiriman</h6>
                                <section class="checkout-steps-form-content collapse" id="coll-address" aria-labelledby="heading-address"
                                    data-bs-parent="#accordion-checkout">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="single-form form-default">
                                                <label>Nama Lengkap</label>
                                                <div class="form-input form">
                                                    <input type="text" placeholder="Nama Lengkap"
                                                        value="{{ auth()->user()->frontName . ' ' . auth()->user()->lastName }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="single-form form-default">
                                                <label>Nomor Telepon</label>
                                                <div class="form-input form">
                                                    <input type="text" placeholder="Nomor Telepon" value="{{ auth()->user()->noTelp }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="single-form form-default">
                                                <label>Alamat</label>
                                                <div class="form-input form">
                                                    <textarea name="address" id="address" cols="30" rows="10" class="form-control" type="text" required style="height: 100px;">{{ auth()->user()->address->address .
                                                        ', ' .
                                                        $village->name .
                                                        ', ' .
                                                        $village->district->name .
                                                        ', ' .
                                                        $village->district->city->name .
                                                        ', ' .
                                                        $village->district->city->province->name .
                                                        ' | ' .
                                                        auth()->user()->address->postalCode }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="steps-form-btn button">
                                                <button class="btn btn-primary" data-bs-toggle="collapse" data-bs-target="#coll-shipping" aria-expanded="false"
                                                    aria-controls="coll-shipping">Lanjut</button>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </li>
                            <li>
                                <h6 class="title collapsed" data-bs-toggle="collapse" data-bs-target="#coll-shipping" aria-expanded="false"
                                    aria-controls="coll-shipping">
                                    Metode Pengiriman</h6>
                                <section class="checkout-steps-form-content collapse show" id="coll-shipping" aria-labelledby="heading-shipping"
                                    data-bs-parent="#accordion-checkout">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="checkout-payment-option">
                                                <h6 class="heading-6 font-weight-400 payment-title">Pilih Metode Pengiriman
                                                </h6>
                                                <div class="payment-option-wrapper justify-content-center">
                                                    @foreach ($shippings as $shipp)
                                                        <div class="single-payment-option">
                                                            <input type="radio" name="{{ strtolower($shipp->name) }}" class="check-shipp"
                                                                id="{{ strtolower($shipp->name) }}">
                                                            <label for="{{ strtolower($shipp->name) }}">
                                                                {{-- <img src="/img/icons/jnt.png" style="height: 32px" alt="Sipping"> --}}
                                                                <p>{{ $shipp->name }}</p>
                                                                {{-- <span class="price">Rp.42.000</span> --}}
                                                            </label>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="card mt-3 rounded-0">
                                                <div class="card-body">
                                                    <h5 class="card-title">Estimasi Ongkir</h5>
                                                    <p class="card-text">Ongkir dari <span id="from">Kalimanah, Kabupaten Purbalingga</span> ke
                                                        <span
                                                            id="to">{{ ucwords(strtolower($village->district->name . ', ' . $village->district->city->name)) }}</span>
                                                        dengan
                                                        berat paket {{ Cart::instance('cart')->weight(2, ',', '.') }} gram
                                                    </p>
                                                    <div class="table-responsive text-nowrap mt-2">
                                                        <table class="table table-striped bg-white">
                                                            <thead class="table-light">
                                                                <tr>
                                                                    <th>Kurir</th>
                                                                    <th>Layanan</th>
                                                                    <th>Sampai (Hari)</th>
                                                                    <th>Ongkir (Rp)</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>

                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </li>
                            <li>
                                <h6 class="title collapsed" data-bs-toggle="collapse" data-bs-target="#coll-payment" aria-expanded="false"
                                    aria-controls="coll-payment">Metode
                                    Pembayaran</h6>
                                <section class="checkout-steps-form-content collapse" id="coll-payment" aria-labelledby="heading-payment"
                                    data-bs-parent="#accordion-checkout">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="checkout-payment-form">
                                                <div class="single-form form-default">
                                                    <label>Pilih Metode Pembayaran</label>
                                                    <div class="select-items">
                                                        <select class="form-control">
                                                            <option value="0">Bank Transfer</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </li>
                            <li>
                                <h6 class="title collapsed" data-bs-toggle="collapse" data-bs-target="#collapsefive" aria-expanded="false"
                                    aria-controls="collapsefive">
                                    Konfirmasi Pesanan</h6>
                                <section class="checkout-steps-form-content collapse" id="collapsefive" aria-labelledby="headingFive"
                                    data-bs-parent="#accordion-checkout">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="table-responsive text-nowrap">
                                                <table class="table table-striped bg-white">
                                                    <thead class="table-light">
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Nama</th>
                                                            <th>Jumlah</th>
                                                            <th>Ukuran</th>
                                                            <th>Harga</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach (Cart::instance('cart')->content() as $cartItem)
                                                            <tr>
                                                                <td>{{ $loop->iteration }}</td>
                                                                <td>{{ $cartItem->name }}</td>
                                                                <td>{{ $cartItem->qty }}</td>
                                                                <td>{{ $cartItem->options->size ?? '' }}</td>
                                                                <td>{{ number_format($cartItem->subtotal, 0, ',', '.') }}</td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <td colspan="4" class="text-end">Sub-Total</td>
                                                            <td>{{ Cart::instance('cart')->subtotal('0', ',', '.') }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="4" class="text-end">JNT Express</td>
                                                            <td>Rp.32.000</td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="4" class="text-end">Total</td>
                                                            <td>Rp.1.700.000</td>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="/cekongkir/kecamatan.js"></script>
    <script>
        function setCookie(name, value, days) {
            var expires = "";
            if (days) {
                var date = new Date();
                date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
                expires = "; expires=" + date.toUTCString();
            }
            document.cookie = name + "=" + (value || "") + expires + "; path=/";

        }

        function getCookie(name) {
            var nameEQ = name + "=";
            var ca = document.cookie.split(';');
            for (var i = 0; i < ca.length; i++) {
                var c = ca[i];
                while (c.charAt(0) == ' ') c = c.substring(1, c.length);
                if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
            }
            return null;
        }

        function eraseCookie(name) {
            document.cookie = name + '=; Path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT;';
        }

        function getDistrict(name) {
            var data = kecamatan.filter((kec) => kec.label.toLowerCase().includes(name.toLowerCase()));
            return data[0].value;
        }

        async function getData(from, to, weight) {
            try {
                const response = await fetch(
                    `/cekongkir/getData.php?action=hitung_auto&kec=${to}&kurir=anteraja:jne:jnt:ninja:sicepat&asal=${from}&berat=${weight}`);
                const data = await response.json();
                return data.rajaongkir;
            } catch (err) {
                return console.log(err);
            }
        }


        document.addEventListener("DOMContentLoaded", async function(event) {
            // Your code to run since DOM is loaded and ready
            // eraseCookie('dataCekOngkir');
            const asal = document.getElementById("from").innerHTML;
            const tujuan = document.getElementById("to").innerHTML;

            const weight = {{ Cart::instance('cart')->weight(0, '', '') }};
            const from = getDistrict(asal);
            const to = getDistrict(tujuan);
            if (getCookie('dataCekOngkir') == null) {
                console.log('kuki null');
                setCookie('beratProduk', JSON.stringify(weight), 30);
                const data = await getData(from, to, weight);
                setCookie('dataCekOngkir', JSON.stringify(data), 30);
                console.log(data);
            } else {
                console.log('kuki ada');
                console.log(JSON.parse(getCookie('dataCekOngkir')));

            }

            if (weight != getCookie('beratProduk')) {
                console.log('berat berubah');
                setCookie('beratProduk', JSON.stringify(weight), 30);
                const data = await getData(from, to, weight);
                setCookie('dataCekOngkir', JSON.stringify(data), 30);
                console.log(data);
            }

        });
    </script>
    <!--====== Checkout Form Steps Part Ends ======-->
@endsection
