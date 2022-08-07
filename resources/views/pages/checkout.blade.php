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
                                <section class="checkout-steps-form-content collapse show" id="coll-address" aria-labelledby="heading-address"
                                    data-bs-parent="#accordion-checkout">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="single-form form-default">
                                                <label>Nama Lengkap</label>
                                                <div class="form-input form">
                                                    <input type="text" id="fullName" placeholder="Nama Lengkap"
                                                        value="{{ auth()->user()->frontName . ' ' . auth()->user()->lastName }}">
                                                    <input type="hidden" id="userId" value="{{ auth()->user()->id }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="single-form form-default">
                                                <label>Nomor Telepon</label>
                                                <div class="form-input form">
                                                    <input type="text" id="noTelp" placeholder="Nomor Telepon" value="{{ auth()->user()->noTelp }}">
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
                                <section class="checkout-steps-form-content collapse collapse-lock" id="coll-shipping" aria-labelledby="heading-shipping"
                                    data-bs-parent="#accordion-checkout">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="checkout-payment-option">
                                                <h6 class="heading-6 font-weight-400 payment-title">Pilih Metode Pengiriman
                                                </h6>
                                                <div class="payment-option-wrapper justify-content-center">
                                                    @foreach ($shippings as $shipp)
                                                        <div class="single-payment-option">
                                                            <input type="radio" name="{{ strtolower($shipp) }}" class="check-shipp" id="{{ strtolower($shipp) }}">
                                                            <label for="{{ strtolower($shipp) }}">
                                                                {{-- <img src="/img/icons/jnt.png" style="height: 32px" alt="Sipping"> --}}
                                                                <p>{{ $shipp }}</p>
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
                                                        berat paket <span id="weight">{{ Cart::instance('cart')->weight(0, '', '') }}</span> gram
                                                    </p>
                                                </div>
                                                <ul class="list-group list-group-flush" id="data-ongkir">
                                                </ul>
                                                <div class="card-body">
                                                    <p class="card-text">
                                                        pilih salah satu layanan di atas
                                                    </p>
                                                </div>
                                                <div class="card-body">
                                                    <label for="order-comment" class="form-label">Tambahkan komentar mengenai pesanan (opsional)</label>
                                                    <textarea class="form-control" id="order-comment" rows="3"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="steps-form-btn button">
                                                <button class="btn btn-primary" data-bs-toggle="collapse" data-bs-target="#coll-payment" aria-expanded="false"
                                                    aria-controls="coll-payment">Lanjut</button>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </li>
                            <li>
                                <h6 class="title collapsed" data-bs-toggle="collapse" data-bs-target="#coll-payment" aria-expanded="false"
                                    aria-controls="coll-payment">Metode
                                    Pembayaran</h6>
                                <section class="checkout-steps-form-content collapse collapse-lock" id="coll-payment" aria-labelledby="heading-payment"
                                    data-bs-parent="#accordion-checkout">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="checkout-payment-form">
                                                <div class="single-form form-default">
                                                    <label>Pilih Metode Pembayaran</label>
                                                    <div class="select-items">
                                                        <select class="form-control" id="payment-method">
                                                            <option value="0">Bank Transfer</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="steps-form-btn button">
                                                <button class="btn btn-primary" data-bs-toggle="collapse" data-bs-target="#coll-confirm" aria-expanded="false"
                                                    aria-controls="coll-confirm">Lanjut</button>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </li>
                            <li>
                                <h6 class="title collapsed" data-bs-toggle="collapse" data-bs-target="#coll-confirm" aria-expanded="false"
                                    aria-controls="coll-confirm">
                                    Konfirmasi Pesanan</h6>
                                <section class="checkout-steps-form-content collapse collapse-lock" id="coll-confirm" aria-labelledby="headingFive"
                                    data-bs-parent="#accordion-checkout">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="table-responsive text-nowrap shadow-sm">
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
                                                    <tbody id="tableCart">
                                                        @foreach (Cart::instance('cart')->content() as $cartItem)
                                                            <tr>
                                                                <td>{{ $loop->iteration }}</td>
                                                                <td id="product-id" style="display: none">{{ $cartItem->id }}</td>
                                                                <td>{{ $cartItem->name }}</td>
                                                                <td>{{ $cartItem->qty }}</td>
                                                                <td>{{ $cartItem->options->size ?? '' }}</td>
                                                                <td>Rp {{ number_format($cartItem->subtotal, 0, ',', '.') }}</td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <td colspan="4" class="text-end">Jumlah Produk</td>
                                                            <td id="total-product">{{ Cart::instance('cart')->count() }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="4" class="text-end">Sub-Total</td>
                                                            <td>Rp <span id="subtotal-price-order">{{ Cart::instance('cart')->subtotal('0', ',', '.') }}</span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="4" class="text-end" id="ongkir-service"></td>
                                                            <td>Rp <span id="ongkir-price"></span></td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="4" class="text-end" id="handling-fee-service">Biaya Penanganan</td>
                                                            <td>Rp <span id="handling-fee-price">10.000</span></td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="4" class="text-end">Total</td>
                                                            <td>Rp <span id="total-price-order"></span></td>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="col-12 my-2">
                                            <div class="card rounded-0 shadow-sm">
                                                <div class="card-body">
                                                    <p class="card-text">
                                                        Silahkan bayar lewat rekening ini
                                                        <br>
                                                        Pesanan baru bisa diproses ketika sudah melakukan pembayaran
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="float-end">
                                                <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                                                <div class="btn btn-outline-primary rounded-0" onclick="make()">
                                                    Buat pesanan
                                                </div>
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
    <!--====== Checkout Form Steps Part Ends ======-->
    <script src="/order/order.js"></script>
@endsection
