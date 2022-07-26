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
                        <form class="row" id="regForm" method="post" action="/register">
                            <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="frontName">Nama Depan</label>
                                    <input class="form-control @error('frontName') is-invalid @enderror" type="text" name="frontName" id="frontName" value="{{ old('frontName') }}" required>
                                    @error('frontName')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="lastName">Nama Belakang</label>
                                    <input class="form-control @error('lastName') is-invalid @enderror" type="text" name="lastName" id="lastName" value="{{ old('lastName') }}" required>
                                    @error('lastName')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="email">E-mail</label>
                                    <input class="form-control @error('email') is-invalid @enderror" type="email" name="email" id="email" value="{{ old('email') }}" required>
                                    @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="noTelp">Nomor Telepon</label>
                                    <input class="form-control @error('noTelp') is-invalid @enderror" type="text" name="noTelp" id="noTelp" value="{{ old('noTelp') }}" required>
                                    @error('noTelp')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input class="form-control @error('password') is-invalid @enderror" type="password" name="password" id="password" value="{{ old('password') }}" required>
                                    @error('password')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="confirmPassword">Confirm Password</label>
                                    <input class="form-control" type="password" name="confirmPassword" id="confirmPassword" required>
                                </div>
                            </div>
                            <hr>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    @php
                                        $provinces = new App\Http\Controllers\RegionController;
                                        $provinces = $provinces->provinces();
                                    @endphp
                                    <label for="province">Provinsi</label>
                                    <select name="province" id="province" class="form-select" required>
                                        <option>Pilih Salah Satu</option>
                                        @foreach ($provinces as $province)
                                            <option value="{{ $province->id ?? '' }}">{{ $province->name ?? '' }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="city">Kabupaten / Kota</label>
                                    <select name="city" id="city" class="form-select" required>
                                        <option>Pilih Salah Satu</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="district">Kecamatan</label>
                                    <select name="district" id="district" class="form-select" required>
                                        <option>Pilih Salah Satu</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="village">Desa / Kelurahan</label>
                                    <select name="village" id="village" class="form-select" required>
                                        <option>Pilih Salah Satu</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="postalCode">Kode Pos</label>
                                    <input class="form-control" type="text" name="postalCode" id="postalCode" required>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="address">Alamat</label>
                                    <textarea name="address" id="address" cols="30" rows="10" class="form-control" type="text" required
                                        style="height: 100px;">{{ old('address') }}</textarea>
                                </div>
                            </div>
                            <div class="button">
                                <button class="btn btn-primary" type="submit">Registrasi</button>
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
