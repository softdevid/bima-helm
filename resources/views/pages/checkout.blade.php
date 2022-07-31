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
                            <h6 class="title collapsed" data-bs-toggle="collapse" data-bs-target="#coll-address"
                                aria-expanded="false" aria-controls="coll-address">Alamat Pengiriman</h6>
                            <section class="checkout-steps-form-content collapse show" id="coll-address"
                                aria-labelledby="heading-address" data-bs-parent="#accordion-checkout">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="single-form form-default">
                                            <label>Nama Lengkap</label>
                                            <div class="form-input form">
                                                <input type="text" placeholder="Nama Lengkap" value="{{ auth()->user()->frontName . ' ' . auth()->user()->lastName}}">
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
                                                <textarea name="address" id="address" cols="30" rows="10" class="form-control" type="text" required style="height: 100px;"
                                                >{{ auth()->user()->address->address .', '. $village->name .', '. $village->district->name .', '. $village->district->city->name .', '. $village->district->city->province->name .' | '. auth()->user()->address->postalCode}}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="steps-form-btn button">
                                            <button class="btn btn-primary" data-bs-toggle="collapse"
                                                data-bs-target="#coll-shipping" aria-expanded="false"
                                                aria-controls="coll-shipping">Lanjut</button>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </li>
                        <li>
                            <h6 class="title collapsed" data-bs-toggle="collapse" data-bs-target="#coll-shipping"
                                aria-expanded="false" aria-controls="coll-shipping">Metode Pengiriman</h6>
                            <section class="checkout-steps-form-content collapse" id="coll-shipping"
                                aria-labelledby="heading-shipping" data-bs-parent="#accordion-checkout">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="checkout-payment-option">
                                            <h6 class="heading-6 font-weight-400 payment-title">Pilih Metode Pengiriman</h6>
                                            <div class="payment-option-wrapper justify-content-center">
                                                <div class="single-payment-option">
                                                    <input type="radio" name="jne-oke" class="check-shipp" checked id="jne-oke">
                                                    <label for="jne-oke">
                                                        <img src="/img/icons/jne.png" style="height: 32px" alt="">
                                                        <p>JNE OKE</p>
                                                        <span class="price">Rp.46.000</span>
                                                    </label>
                                                </div>
                                                <div class="single-payment-option">
                                                    <input type="radio" name="jne-reg" class="check-shipp" id="jne-reg">
                                                    <label for="jne-reg">
                                                        <img src="/img/icons/jne.png" style="height: 32px" alt="Sipping">
                                                        <p>JNE REG</p>
                                                        <span class="price">Rp.54.000</span>
                                                    </label>
                                                </div>
                                                <div class="single-payment-option">
                                                    <input type="radio" name="jnt-ex" class="check-shipp" id="jnt-ex">
                                                    <label for="jnt-ex">
                                                        <img src="/img/icons/jnt.png" style="height: 32px" alt="Sipping">
                                                        <p>J&T EXPRESS</p>
                                                        <span class="price">Rp.42.000</span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </li>
                        <li>
                            <h6 class="title collapsed" data-bs-toggle="collapse" data-bs-target="#coll-payment"
                                aria-expanded="false" aria-controls="coll-payment">Metode Pembayaran</h6>
                            <section class="checkout-steps-form-content collapse" id="coll-payment"
                                aria-labelledby="heading-payment" data-bs-parent="#accordion-checkout">
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
                            <h6 class="title collapsed" data-bs-toggle="collapse" data-bs-target="#collapsefive"
                                aria-expanded="false" aria-controls="collapsefive">Konfirmasi Pesanan</h6>
                            <section class="checkout-steps-form-content collapse" id="collapsefive"
                                aria-labelledby="headingFive" data-bs-parent="#accordion-checkout">
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
                                                    <td>{{ number_format($cartItem->subtotal,0,',','.') }}</td>
                                                </tr>
                                                @endforeach
                                              </tbody>
                                              <tfoot>
                                                <tr>
                                                    <td colspan="4" class="text-end">Sub-Total</td>
                                                    <td>{{ Cart::instance('cart')->subtotal('0',',','.') }}</td>
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
<!--====== Checkout Form Steps Part Ends ======-->
@endsection
