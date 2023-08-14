@extends('layouts.auth')
@section('auth')

    <body>
        <div class="d-lg-flex half">
            <div class="bg order-1 order-md-2" style="background-image: url('images/login.jpg');"></div>
            <div class="contents order-2 order-md-1">
                <div class="container">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-md-7">
                            <div class="logo">
                                <img class="img-fluid" src="img/logo1.png" alt="">
                            </div>
                            <h3 class="text-center">Daftar</h3>
                            @if (session()->has('success'))
                                <div class="alert alert-success alert-dismissible fade show col-md-12" role="alert">
                                    {{ session('success') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif

                            @if (session()->has('message'))
                                <div class="alert alert-success alert-dismissible fade show col-md-12" role="alert">
                                    {{ session('message') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif

                            @if (session()->has('loginError'))
                                <div class="alert alert-danger alert-dismissible fade show col-md-12" role="alert">
                                    {{ session('loginError') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif
                            <form action="/signup" method="post">
                                @csrf
                                <input type="hidden" name="otp" value="{{ @rand(100000, 999999) }}">
                                <div class="form-floating mb-3 mt-5">
                                    <input type="text" id="name"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        placeholder="Full Name" required value="{{ old('name') }}" />
                                    <label for="name">Nama Lengkap</label>
                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="email" id="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        placeholder="Email Address" required value="{{ old('email') }}" />
                                    <label for="email">Email Address</label>

                                    @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="text" id="username"
                                        class="form-control @error('username') is-invalid @enderror" name="username"
                                        placeholder="Username" required value="{{ old('username') }}" />
                                    <label for="username">Nama Pengguna</label>
                                    @error('username')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>

                                <div class="form-floating mb-3">
                                    <input type="password" id="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        placeholder="Password" required />
                                    <label for="password">Password</label>
                                    @error('password')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="password" id="password_confirmation"
                                        class="form-control @error('password_confirmation') is-invalid @enderror"
                                        name="password_confirmation" placeholder="Password_confirmation" required />
                                    <label for="password_confirmation">Konfirmasi Password</label>
                                    @error('password_confirmation')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="row">
                                    <div class="col-8">
                                        <h6>Sudah punya akun? <a style="color: rgb(135, 135, 215); text-decoration: none"
                                                href="/login">Masuk di sini</a></h6>
                                    </div>
                                </div>

                                <div class="pt-1 mt-3 mb-4 d-flex justify-content-center text-center">
                                    <button class="btn btn-success btn-lg btn-block" style="padding: 10px 100px 10px 100px"
                                        type="submit">Daftar</button>
                                </div>
                            </form>
                            <div class="social d-flex justify-content-center text-center">
                                <a href="auth/google" class="py-2 px-3 mr-md-1 rounded fs-6 btn"
                                style="background-color: white; font-family: 'Trebuchet MS'; font-weight: 600; text-decoration: none;
                                        -moz-border-radius: 10px; border-radius: 10px; -webkit-box-shadow: 0px 8px 20px 0px rgba(0, 0, 0, 0.15);
                                        -moz-box-shadow: 0px 8px 20px 0px rgba(0, 0, 0, 0.15); box-shadow: 0px 8px 20px 0px rgba(0, 0, 0, 0.15);
                                        display: flex; justify-content: center; align-items: center;">
                                    <img class="img-fluid" src="img/google.png" style="height: 30px; width: 30px; margin-right: 5px" alt="">
                                    Daftar dengan Google
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="{{ asset('js/login/jquery-3.3.1.min.js') }}"></script>
        <script src="{{ asset('js/login/popper.min.js') }}"></script>
        <script src="{{ asset('js/login/bootstrap.min.js') }}"></script>
        <script src="{{ asset('js/login/main.js') }}"></script>
    </body>
@endsection
