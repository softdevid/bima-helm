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
                    <ul class="navbar-nav">
                    @auth
                    <div class="user">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle link-light" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Hallo, {{ auth()->user()->frontName }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark">
                                <li><a class="dropdown-item link-light px-sm-2 py-sm-2" href="/my-account">Akun Saya</a></li>
                                <li><a class="dropdown-item link-light px-sm-2 py-sm-2" href="/logout">Logout</a></li>
                            </ul>
                        </li>
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
                </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Topbar -->
