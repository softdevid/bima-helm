<!-- Start Topbar -->
<div class="topbar p-1 p-sm-2">
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
                                <a href="https://wa.me/6281329868796">(+62) 813-2986-8796</a>
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
                                <a class="nav-link dropdown-toggle link-light justify-content-end" href="#"
                                    role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Hallo, {{ auth()->user()->frontName }}
                                </a>
                                <ul class="dropdown-menu dropdown-menu-dark">
                                    <li><a class="dropdown-item link-light px-sm-2 py-sm-2" href="/my-account">Akun
                                            Saya</a></li>
                                    <li><a class="dropdown-item link-light px-sm-2 py-sm-2" href="/logout">Logout</a>
                                    </li>
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