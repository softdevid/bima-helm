<!-- Start Header Middle -->
<div class="header-middle py-1 py-sm-2">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-3 d-xs-none">
                <!-- Start Header Logo -->
                <a class="navbar-brand" href="/">
                    {{-- <img src="assets/images/logo/logo.svg" alt="Logo"> --}}
                    <h3>BIMA HELM</h3>
                </a>
                <!-- End Header Logo -->
            </div>
            <div class="col-lg-7 col-md-7 col-9">
                <!-- Start Main Menu Search -->
                <div class="main-menu-search py-2">
                    <!-- navbar search start -->
                    <div class="navbar-search search-style-5">
                        <form action="/products" method="get" class="d-flex flex-fill">
                            <div class="search-select d-none d-sm-block">
                                <div class="select-position">
                                    <select id="select1">
                                        <option selected>Semua</option>
                                        @foreach (App\Models\Category::oldest()->get() as $category)
                                            <option value="{{ $category->slug }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="search-input">
                                <input type="text" placeholder="Cari produk...">
                            </div>
                            <div class="search-btn">
                                <button><i class="fa-solid fa-magnifying-glass"></i></button>
                            </div>
                        </form>
                    </div>
                    <!-- navbar search Ends -->
                </div>
                <!-- End Main Menu Search -->
            </div>
            <div class="col-lg-2 col-md-2 col-3 d-none">
                <div class="middle-right-area">
                    <div class="navbar-cart">
                        {{-- <div class="wishlist me-0 me-md-3">
                            <a href="/fav">
                                <span class="fa-stack me-1 text-white">
                                    @auth
                                    <i class="fa-regular fa-circle fa-stack-2x" data-count="{{ Cart::count() }}"></i>
                                    @endauth
                                    <i class="fa-solid fa-heart fa-stack-1x"></i>
                                </span>
                            </a>
                        </div> --}}
                        <div class="cart-items">
                            <a href="/cart" class="main-btn">
                                <span class="fa-stack me-1 text-white">
                                    @auth
                                        <i class="fa-regular fa-circle fa-stack-2x" id="cartCount"
                                            data-count="{{ Cart::instance('cart')->count() }}"></i>
                                    @endauth
                                    <i class="fa-solid fa-cart-shopping fa-stack-1x"></i>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Header Middle -->
