<!-- Start Header Middle -->
<div class="header-middle py-1 py-sm-2">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-3 d-xs-none">
                <!-- Start Header Logo -->
                <a class="navbar-brand" href="/">
                    <h3>BIMA HELM</h3>
                </a>
                <!-- End Header Logo -->
            </div>
            <div class="col-lg-9 col-md-9 col-12">
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
        </div>
    </div>
</div>
<!-- End Header Middle -->
