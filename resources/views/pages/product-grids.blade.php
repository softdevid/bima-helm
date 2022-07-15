{{-- start data products --}}
<div class="tab-content" id="nav-tabContent">
    <div class="tab-pane fade show active" id="nav-list" role="tabpanel"
        aria-labelledby="nav-list-tab">
        <div class="row">
            @foreach ($products as $product)
                <div class="col-lg-4 col-md-3 col-6">
                    <div class="single-product">
                        <div class="row align-items-center">
                            <div class="col-12">
                                <div class="product-image">
                                    <img src="/img/{{ $product->image }}" alt="#"
                                        class="img-thumbnail">
                                    <div class="button">
                                        <a href="/cart" class="btn">
                                            <i class="fa-regular fa-cart-shopping"></i></i>Tambah ke keranjang
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="product-info">
                                <span class="category">{{ $product->category->name }}</span>
                                <p class="title">
                                    <a href="/products/details/{{ $product->slug }}">{{ $product->name }}</a>
                                </p>
                                @if ($product->sold > 0)
                                    <span>{{ $product->sold }} Terjual</span>
                                @endif
                                <div class="price">
                                    <span>Rp.{{ number_format($product->price, 0, ',', '.') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<div class="d-flex justify-content-center">
    {{ $products->links() }}
</div>
{{-- end data products --}}
