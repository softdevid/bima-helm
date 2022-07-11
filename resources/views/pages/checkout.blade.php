@extends('layouts.main')
@section('content')
@include('partials.breadcrumbs')
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
                            <section class="checkout-steps-form-content collapse" id="coll-address"
                                aria-labelledby="heading-address" data-bs-parent="#accordion-checkout">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="single-form form-default">
                                            <label>Nama Lengkap</label>
                                            <div class="form-input form">
                                                <input type="text" placeholder="Nama Lengkap">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="single-form form-default">
                                            <label>Nomor Telepon</label>
                                            <div class="form-input form">
                                                <input type="text" placeholder="Nomor Telepon">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="single-form form-default">
                                            <label>Alamat</label>
                                            <div class="form-input form">
                                                <input type="text" placeholder="Alamat">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="single-form form-default">
                                            <label>Kode Pos</label>
                                            <div class="form-input form">
                                                <input type="text" placeholder="Kode Pos">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="steps-form-btn button">
                                            <button class="btn" data-bs-toggle="collapse"
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
                                                    <input type="radio" name="jne-oke" id="jne-oke">
                                                    <label for="jne-oke">
                                                        <img src="/img/icons/jne.png" style="height: 32px" alt="Sipping">
                                                        <p>JNE OKE</p>
                                                        <span class="price">Rp.46.000</span>
                                                    </label>
                                                </div>
                                                <div class="single-payment-option">
                                                    <input type="radio" name="jne-oke" id="jne-oke">
                                                    <label for="jne-oke">
                                                        <img src="/img/icons/jne.png" style="height: 32px" alt="Sipping">
                                                        <p>JNE REG</p>
                                                        <span class="price">Rp.54.000</span>
                                                    </label>
                                                </div>
                                                <div class="single-payment-option">
                                                    <input type="radio" name="jne-oke" id="jne-oke">
                                                    <label for="jne-oke">
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
                                            <table class="table table-striped table-light text-center">
                                              <thead class="bg-light">
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama</th>
                                                    <th>Jumlah</th>
                                                    <th>Harga</th>
                                                </tr>
                                              </thead>
                                              <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>KYT C5 IANONE WHITE</td>
                                                    <td>1</td>
                                                    <td>Rp.1.700.000</td>
                                                </tr>
                                              </tbody>
                                              <tfoot>
                                                <tr>
                                                    <td colspan="3" class="text-end">Sub-Total</td>
                                                    <td>Rp.1.700.000</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="3" class="text-end">JNT Express</td>
                                                    <td>Rp.32.000</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="3" class="text-end">Total</td>
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
