@extends('layouts.main')
@section('content')
@include('partials.breadcrumbs')
<!-- Shopping Cart -->
<div class="shopping-cart section" id="cartSection">
    <div class="container">
        @if (count($cart))
        <div class="cart-list-head">
            <div class="table-responsive text-nowrap">
                <table class="table table-striped align-middle">
                    <thead class="table-light text-center">
                        <tr>
                            <th style="width: 15%">Gambar</th>
                            <th style="width: 40%">Nama</th>
                            <th style="width: 10%">Jumlah</th>
                            <th style="width: 10%">Ukuran</th>
                            <th style="width: 15%">Harga</th>
                            <th style="width: 10%">Hapus</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        {{-- @dd($cart) --}}
                        @foreach ($cart as $cartItem)

                        @php
                            $product_id = Cart::instance('cart')->get($cartItem->rowId)->id;
                            $size = Cart::instance('cart')->get($cartItem->rowId)->options->size;
                            $max = App\Models\Product::without(['category'])->selectRaw('sizes.'.$size.' as size')->join('sizes', 'products.size_id', '=', 'sizes.id')->where('products.id', $product_id)->value('size');
                        @endphp

                        <tr>
                            <td class="d-none">
                                <p class="rowId">{{ $cartItem->rowId }}</p>
                            </td>
                            <td>
                                <img src="/img/{{ $cartItem->options->img }}" alt="" class="img-thumbnail" style="max-height: 100px; max-width: 100px;">
                            </td>
                            <td>
                                <h6 class="product-name"><a href="#">{{ $cartItem->name }}</a></h6>
                            </td>
                            <td>
                                <div class="quantity">
                                    <div class="input-group flex-nowrap">
                                        <button class="btn btn-outline-primary quantity-minus p-0 px-1 position-static" type="button">
                                            <i class="fa-solid fa-minus"></i>
                                        </button>
                                        <input type="text" id="quantity" name="quantity" class="form-control text-center p-0" style="width: 50px" value="{{ $cartItem->qty }}" min="1" max="{{ $max }}">
                                        <button class="btn btn-outline-primary quantity-plus p-0 px-1 position-static" type="button">
                                            <i class="fa-solid fa-plus"></i>
                                        </button>
                                    </div>
                                    <button class="btn btn-secondary btn-sm my-1 cart-update" >Update</button>
                                </div>
                            </td>
                            <td>
                                <h6 class="product-name"><a href="#">{{ $cartItem->options->size ?? '' }}</a></h6>
                            </td>
                            <td>
                                <p>Rp.<span id="price">{{ number_format($cartItem->subtotal,0,',','.') }}</span></p>
                            </td>
                            <td>
                                <button class="btn remove-item">
                                    <i class="fa-solid fa-circle-xmark"></i>
                                </button>
                            </td>
                        </tr>
                        @endforeach
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
                                    {{-- <li>Subtotal<span>Rp.1.700.000</span></li> --}}
                                    <li>Total<span>Rp.<span id="total">{{ $total }}</span></span></li>
                                </ul>
                                <div class="button">
                                    <a href="/checkout" class="btn btn-info">Checkout</a>
                                    <a href="/products" class="btn btn-alt">Continue shopping</a>
                                    <a href="/cart-removeAll" class="btn btn-danger">Hapus Keranjang</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/ End Total Amount -->
            </div>
        </div>
        @else
        <div class="alert alert-info text-center m-0" role="alert">
            Keranjang <b>kosong</b>.
        </div>
        @endif
    </div>
</div>
<!--/ End Shopping Cart -->
@endsection
