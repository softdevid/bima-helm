@extends('layouts.main')
@section('content')
@include('partials.breadcrumbs')
<!-- Shopping Cart -->
<div class="shopping-cart section">
    <div class="container">
        <div class="cart-list-head">
            <div class="table-responsive text-nowrap">
                <table class="table table-striped align-middle">
                    <thead class="table-light text-center">
                        <tr>
                            <th style="width: 5%">No</th>
                            <th style="width: 15%">Gambar</th>
                            <th style="width: 30%">Nama</th>
                            <th style="width: 15%">Jumlah</th>
                            <th style="width: 15%">Harga</th>
                            <th style="width: 10%">Hapus</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <tr>
                            <td>
                                1
                            </td>
                            <td>
                                <img src="/img/KYT-C5-IANONE-WHITE.jpeg" alt="" class="img-thumbnail" style="max-height: 100px; max-width: 100px;">
                            </td>
                            <td>
                                <h6 class="product-name"><a href="#">KYT C5 IANONE WHITE</a></h6>
                            </td>
                            <td>
                                <div class="quantity">
                                    <div class="input-group flex-nowrap">
                                        <button class="btn btn-outline-primary quantity-minus p-0 px-1" type="button">
                                            <i class="fa-solid fa-minus"></i>
                                        </button>
                                        <input type="number" id="quantity" name="quantity" class="form-control text-center p-0" style="width: 50px" value="1" min="1" max="100">
                                        <button class="btn btn-outline-primary quantity-plus p-0 px-1" type="button">
                                            <i class="fa-solid fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <p>Rp.<span>1.700.000</span></p>
                            </td>
                            <td>
                                <i class="fa-solid fa-circle-xmark"></i>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <!-- Total Amount -->
                <div class="total-amount">
                    <div class="row justify-content-end">
                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="right">
                                <ul>
                                    <li>Subtotal<span>Rp.1.700.000</span></li>
                                    <li>Total<span>Rp.1.700.000</span></li>
                                </ul>
                                <div class="button">
                                    <a href="/checkout" class="btn">Checkout</a>
                                    <a href="/products" class="btn btn-alt">Continue shopping</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/ End Total Amount -->
            </div>
        </div>
    </div>
</div>
<!--/ End Shopping Cart -->
@endsection
