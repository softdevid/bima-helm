@extends('layouts.main')
@section('content')
@include('partials.breadcrumbs')
<!--====== Checkout Form Steps Part Start ======-->
<section class="checkout-wrapper section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="checkout-steps-form-style-1">
                    <ul id="accordionExample">
                        <li>
                            <h6 class="title collapsed" data-bs-toggle="collapse" data-bs-target="#collapseFour"
                                aria-expanded="false" aria-controls="collapseFour">Alamat Pengiriman</h6>
                            <section class="checkout-steps-form-content collapse" id="collapseFour"
                                aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="single-form form-default">
                                            <label>Username</label>
                                            <div class="row">
                                                <div class="col-md-6 form-input form">
                                                    <input type="text" placeholder="Nama Depan">
                                                </div>
                                                <div class="col-md-6 form-input form">
                                                    <input type="text" placeholder="Nama Belakang">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="single-form form-default">
                                            <label>Email</label>
                                            <div class="form-input form">
                                                <input type="text" placeholder="Email">
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
                                                data-bs-target="#collapsefive" aria-expanded="false"
                                                aria-controls="collapsefive">Lanjut</button>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </li>
                        <li>
                            <h6 class="title collapsed" data-bs-toggle="collapse" data-bs-target="#collapsefive"
                                aria-expanded="false" aria-controls="collapsefive">Metode Pembayaran</h6>
                            <section class="checkout-steps-form-content collapse" id="collapsefive"
                                aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="checkout-payment-option">
                                            <h6 class="heading-6 font-weight-400 payment-title">Pilih Metode Pembayaran</h6>
                                            <div class="payment-option-wrapper">
                                                <div class="single-payment-option">
                                                    <input type="radio" name="shipping" id="shipping-1">
                                                    <label for="shipping-1">
                                                        <img src="/img/icons/jne.png" style="height: 32px" alt="Sipping">
                                                        <p>JNE OKE</p>
                                                        <span class="price">Rp.161.000</span>
                                                    </label>
                                                </div>
                                                <div class="single-payment-option">
                                                    <input type="radio" name="shipping" id="shipping-1">
                                                    <label for="shipping-1">
                                                        <img src="/img/icons/jne.png" style="height: 32px" alt="Sipping">
                                                        <p>JNE REG</p>
                                                        <span class="price">Rp.189.000</span>
                                                    </label>
                                                </div>
                                                <div class="single-payment-option">
                                                    <input type="radio" name="shipping" id="shipping-1">
                                                    <label for="shipping-1">
                                                        <img src="/img/icons/jnt.png" style="height: 32px" alt="Sipping">
                                                        <p>J&T Express</p>
                                                        <span class="price">Rp.147.000</span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="checkout-sidebar">
                    {{-- <div class="checkout-sidebar-coupon">
                        <p></p>
                        <form action="#">
                            <div class="single-form form-default">
                                <div class="form-input form">
                                    <input type="text" placeholder="Kode Kupon">
                                </div>
                                <div class="button">
                                    <button class="btn">Gunakan</button>
                                </div>
                            </div>
                        </form>
                    </div> --}}
                    <div class="checkout-sidebar-price-table mt-0">
                        <h5 class="title">Tabel Harga</h5>

                        <div class="sub-total-price">
                            <div class="total-price">
                                <p class="value">Subotal:</p>
                                <p class="price">$144.00</p>
                            </div>
                            <div class="total-price shipping">
                                <p class="value">Pengiriman:</p>
                                <p class="price">$10.50</p>
                            </div>
                            <div class="total-price discount">
                                <p class="value">Biaya Penaganan</p>
                                <p class="price">$10.00</p>
                            </div>
                        </div>
                        <div class="total-payable">
                            <div class="payable-price">
                                <p class="value">Total:</p>
                                <p class="price">$164.50</p>
                            </div>
                        </div>
                        <div class="price-table-btn button">
                            <a href="javascript:void(0)" class="btn btn-alt">Beli</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--====== Checkout Form Steps Part Ends ======-->
@endsection
