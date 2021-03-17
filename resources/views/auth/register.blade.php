<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>{{ config('app.name') }} | Pendaftaran</title>

    <!-- Icon -->
    <link rel="icon" href="{{ asset('images/laporin-dark.png') }}">
    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="http://172.20.10.3/TEMPLATE/stisla/node_modules/bootstrap-social/bootstrap-social.css">
    <!-- Template CSS -->
    <link rel="stylesheet" href="http://172.20.10.3/TEMPLATE/stisla/assets/css/style.css">
    <link rel="stylesheet" href="http://172.20.10.3/TEMPLATE/stisla/assets/css/components.css">
</head>

<body>
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
                        <div class="card card-primary">
                            <div class="card-header"><h4>Pendaftaran</h4></div>
                            <div class="card-body">
                            <form method="POST" action="{{ route('register') }}">
                            @csrf

                                <div class="row">
                                    <div class="form-group col-6">
                                        <a href="{{ 'register/facebook' }}" class="btn btn-block btn-social btn-facebook">
                                            <span class="fab fa-facebook"></span> Facebook
                                        </a>
                                    </div>
                                    <div class="form-group col-6">
                                        <a href="{{ 'register/twitter' }}" class="btn btn-block btn-social btn-twitter">
                                            <span class="fab fa-twitter"></span> Twitter
                                        </a>
                                    </div>
                                </div>

                                <hr>

                                <div class="row">
                                    <div class="form-group col">
                                        <label for="name">Nama Lengkap</label>
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Nama Lengkap" autofocus>
                                        <div class="invalid-feedback">
                                            @error('name') {{ $message }} @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col">
                                        <label for="email">Surel</label>
                                        <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="surel@contoh.com">
                                        <div class="invalid-feedback">
                                            @error('domicile') {{ $message }} @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col">
                                        <label for="phone_number">No. Telepon</label>
                                        <input id="phone_number" type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ old('phone_number') }}" placeholder="Minimal 8-14 Angka">
                                        <div class="invalid-feedback">
                                            @error('domicile') {{ $message }} @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-6">
                                        <label for="password" class="d-block">Kata Sandi</label>
                                        <input id="password" type="password" class="form-control pwstrength @error('password') is-invalid @enderror" data-indicator="pwindicator" name="password" placeholder="Minimal 8 karakter & berisi alfanumerik">
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
                                        <input id="password2" type="password" class="form-control @error('password') is-invalid @enderror" name="password_confirmation" placeholder="Minimal 8 karakter & berisi alfanumerik">
                                        <div class="invalid-feedback">
                                            @error('password') {{ $message }} @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input @error('term_of_us') is-invalid @enderror" id="agree" checked>
                                        <label class="custom-control-label" for="agree">Dengan menekan tombol <b>Daftar</b>, Anda sudah bersedia dan menyetujui <a href="{{ '/term-of-use' }}" target="_blank">Syarat dan Ketentuan Layanan</a></label>
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
                        <div class="simple-footer">
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
    <script src="http://172.20.10.3/TEMPLATE/stisla/assets/js/stisla.js"></script>

    <!-- JS Libraies -->

    <!-- Template JS File -->
    <script src="http://172.20.10.3/TEMPLATE/stisla/assets/js/scripts.js"></script>
    <script src="http://172.20.10.3/TEMPLATE/stisla/assets/js/custom.js"></script>

    <!-- Page Specific JS File -->
</body>
</html>

