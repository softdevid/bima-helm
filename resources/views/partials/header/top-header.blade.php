<!-- Start Topbar -->
<div class="topbar p-sm-3">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="top-left">
                    <div class="nav-hotline d-none d-sm-block me-0">
                        <div class="d-flex align-items-center justify-content-start">
                            <span class="fa-stack me-1 text-white">
                                <i class="fa-regular fa-circle fa-stack-2x"></i>
                                <i class="fa-brands fa-whatsapp fa-stack-1x"></i>
                            </span>
                            <h3>Whatsapp:
                                <span>(+62) 123 456 7890</span>
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="top-end">
                    @auth
                    <div class="user">
                        <i class="fa-solid fa-user fa-sm"></i>
                        Hello, {{ auth()->user()->first_name }}
                    </div>
                    @else
                    <ul class="user-login">
                        <li>
                            <a href="/login">Login</a>
                        </li>
                        <li>
                            <a href="/register">Register</a>
                        </li>
                    </ul>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Topbar -->
