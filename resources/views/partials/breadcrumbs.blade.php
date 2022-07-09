<!-- Start Breadcrumbs -->
<div class="breadcrumbs p-2 p-sm-3 d-none d-sm-block">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6 col-12">
                <div class="breadcrumbs-content">
                    <h1 class="page-title">{{ $title }}</h1>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
                <ul class="breadcrumb-nav">
                    <li><a href="/"><i class="fa-solid fa-house"></i> Home</a></li>
                    @if (isset($category))
                    <li><a href="javascript:void(0)">{{ $category }}</a></li>
                    @endif
                    <li><a href="javascript:void(0)">{{ $title }}</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumbs -->