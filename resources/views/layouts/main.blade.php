<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }} | Bima Helm</title>

    <!-- ========================= CSS here ========================= -->
    {{--
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" /> --}}
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/assets/css/tiny-slider.css" />
    <link rel="stylesheet" href="/assets/css/glightbox.min.css" />
    <link rel="stylesheet" href="/assets/css/main.css" />
    <link rel="stylesheet" href="/css/style.css">

    <script src="/js/fas.js"></script>
</head>

<body>

    {{--
    <!-- Preloader -->
    <div class="preloader">
        <div class="preloader-inner">
            <div class="preloader-icon">
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <!-- /End Preloader --> --}}

    <header class="header navbar-area">
        @include('partials.header.top-header')
        @include('partials.header.mid-header')
        @include('partials.header.bot-header')
    </header>

    @yield('content')

    <!-- Start Footer Area -->
    <footer class="footer">
        @include('partials.footer.mid-footer')
        @include('partials.footer.bot-footer')
    </footer>
    <!--/ End Footer Area -->

    <!-- ========================= scroll-top ========================= -->
    <a href="#" class="scroll-top">
        <i class="fa-solid fa-arrow-up"></i>
    </a>

    <div class="toast-container position-fixed bottom-0 end-0 p-3">
        <div id="toast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                {{-- <img src="..." class="rounded me-2" alt="..."> --}}
                <strong class="me-auto">Bima Helm</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body"></div>
        </div>
    </div>

    <!-- ========================= JS here ========================= -->
    <script src="/js/jquery-3.6.0.min.js"></script>
    <script src="/assets/js/bootstrap.bundle.min.js"></script>
    <script src="/masonry/masonry.pkgd.min.js"></script>
    <script src="/assets/js/tiny-slider.js"></script>
    <script src="/assets/js/glightbox.min.js"></script>
    <script src="/assets/js/main.js"></script>
    <script src="/js/script.js"></script>
</body>

</html>
