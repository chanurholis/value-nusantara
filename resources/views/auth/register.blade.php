<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>{{ config('app.name') }} | Pendaftaran</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('img/favicon.png') }}" type="image/x-icon">
    <!-- General CSS Files -->
    {{-- <link rel="stylesheet" href="{{ asset('stisla/assets/css/bootstrap.min.css') }}"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.1/css/bootstrap.min.css" integrity="sha512-T584yQ/tdRR5QwOpfvDfVQUidzfgc2339Lc8uBDtcp/wYu80d7jwBgAxbyMh0a9YM9F8N3tdErpFI8iaGx6x5g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- CSS Libraries -->
    {{-- <link rel="stylesheet" href="{{ asset('stisla/node_modules/bootstrap-social/bootstrap-social.css') }}"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-social/5.1.1/bootstrap-social.css" integrity="sha512-sopmFEmRVsWt542K+yzH3FQ1KJfdosOJG+bGLs9ZJT07b/3gUxRA9ICuJg2JtoZ9WeknAUuwJ0ggnmrV1YL6kQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('stisla/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('stisla/assets/css/components.css') }}">
</head>

<body>
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
                        <div class="login-brand">
                            <img src="{{ asset('img/favicon.png') }}" alt="logo" width="100" class="shadow-light rounded-circle">
                        </div>
                        <div class="card card-primary">
                            <div class="card-header"><h4>Pendaftaran</h4></div>
                            <div class="card-body">
                                <form method="POST" action="{{ route('register') }}">
                                @csrf

                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label for="first_name">Nama Depan</label>
                                            <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" placeholder="Nama Depan" autofocus>
                                            <div class="invalid-feedback">
                                                @error('first_name') {{ $message }} @enderror
                                            </div>
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="last_name">Nama Belakang</label>
                                            <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" placeholder="Nama Belakang">
                                            <div class="invalid-feedback">
                                                @error('last_name') {{ $message }} @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col">
                                            <label for="email">Surel</label>
                                            <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="surel@contoh.com">
                                            <div class="invalid-feedback">
                                                @error('email') {{ $message }} @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col">
                                            <label for="phone_number">No. Telepon</label>
                                            <input id="phone_number" type="tel" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ old('phone_number') }}" placeholder="Minimal 8-14 Angka" autocomplete="tel-national">
                                            <div class="invalid-feedback">
                                                @error('phone_number') {{ $message }} @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label for="password" class="d-block">Kata Sandi</label>
                                            <input id="password" type="password" class="form-control pwstrength @error('password') is-invalid @enderror" data-indicator="pwindicator" name="password" placeholder="Minimal 8 karakter & berisi alfanumerik" autocomplete="new-password">
                                            <div id="pwindicator" class="pwindicator">
                                                <div class="bar"></div>
                                                <div class="label"></div>
                                            </div>
                                            <div class="invalid-feedback">
                                                @error('password') {{ $message }} @enderror
                                            </div>
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="password2" class="d-block">Konfirmasi</label>
                                            <input id="password2" type="password" class="form-control @error('password') is-invalid @enderror" name="password_confirmation" placeholder="Minimal 8 karakter & berisi alfanumerik" autocomplete="new-password">
                                            <div class="invalid-feedback">
                                                @error('password') {{ $message }} @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" name="term_of_use" class="custom-control-input @error('term_of_use') is-invalid @enderror" id="agree">
                                            <label class="custom-control-label" for="agree">Dengan menekan tombol <b>Daftar</b>, Anda sudah bersedia dan menyetujui <a href="{{ route('term-of-use') }}" target="_blank">Syarat dan Ketentuan Layanan</a></label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <button type="sdubmit" class="btn btn-primary btn-lg btn-block">
                                        Daftar
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="mt-5 mb-3 text-muted text-center">
                            Punya akun? <a href="{{ route('login') }}">Masuk</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    
    <!-- General JS Scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="{{ asset('stisla/assets/js/stisla.js') }}"></script>

    <!-- JS Libraies -->
    <script src="{{ asset('stisla/node_modules/jquery-pwstrength/jquery.pwstrength.min.js') }}"></script>
    <script src="{{ asset('stisla/node_modules/selectric/public/jquery.selectric.min.js') }}"></script>

    <!-- Template JS File -->
    <script src="{{ asset('stisla/assets/js/scripts.js') }}"></script>
    <script src="{{ asset('stisla/assets/js/custom.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('stisla/assets/js/page/auth-register.js') }}"></script>
</body>
</html>

