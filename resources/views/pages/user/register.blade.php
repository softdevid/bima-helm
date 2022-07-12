@extends('layouts.main')
@section('content')
    @include('partials.breadcrumbs')
    <!-- Start Account Register Area -->
    <div class="account-login section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-md-10 offset-md-1 col-12">
                    <div class="register-form">
                        <div class="title">
                            <h3>Registrasi</h3>
                            {{-- <p>Registration takes less than a minute but gives you full control over your orders.</p> --}}
                        </div>
                        <form class="row" method="post">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="reg-fn">Nama Depan</label>
                                    <input class="form-control" type="text" id="reg-fn" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="reg-ln">Nama Belakang</label>
                                    <input class="form-control" type="text" id="reg-ln" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="reg-email">E-mail</label>
                                    <input class="form-control" type="email" id="reg-email" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="reg-phone">Nomor Telepon</label>
                                    <input class="form-control" type="text" id="reg-phone" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="reg-pass">Password</label>
                                    <input class="form-control" type="password" id="reg-pass" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="reg-pass-confirm">Confirm Password</label>
                                    <input class="form-control" type="password" id="reg-pass-confirm" required>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="reg-address">Alamat</label>
                                    <textarea name="" id="reg-address" cols="30" rows="10" class="form-control" type="text" required
                                        style="height: 100px;"></textarea>
                                </div>
                            </div>
                            <div class="button">
                                <button class="btn" type="submit">Registrasi</button>
                            </div>
                            <p class="outer-link">Sudah punya akun? <a href="/login">Login</a>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Account Register Area -->
@endsection