<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>{{ config('app.name') }} | Masuk</title>

    <!-- Icon -->
    <link rel="icon" href="{{ asset('images/laporin-dark.png') }}">
    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="http://localhost/TEMPLATE/stisla/node_modules/bootstrap-social/bootstrap-social.css">
    <!-- Template CSS -->
    <link rel="stylesheet" href="http://localhost/TEMPLATE/stisla/assets/css/style.css">
    <link rel="stylesheet" href="http://localhost/TEMPLATE/stisla/assets/css/components.css">
</head>

<body>
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                        <div class="card card-primary">
                            <div class="card-header"><h4>Masuk</h4></div>
                            <div class="card-body">
                                <form method="POST" action="{{ route('login') }}">
                                @csrf
                                    <div class="form-group">
                                        <label for="email">Surel</label>
                                        <input id="email" type="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" name="email" tabindex="1" required autofocus placeholder="surel@contoh.com">
                                        <div class="invalid-feedback">
                                            @error('email') {{ $message }} @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="d-block">
                                            <label for="password" class="control-label">Kata Sandi</label>
                                        <div class="float-right">
                                            <a href="{{ route('password.request') }}" class="text-small">Lupa Kata Sandi?</a>
                                        </div>
                                        </div>
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" tabindex="2" required>
                                        <div class="invalid-feedback">
                                            @error('password') {{ $message }} @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me" {{ old('remember') ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="remember-me">Ingat saya</label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">Masuk</button>
                                    </div>
                                </form>
                                <div class="text-center">
                                    <div class="text-job text-muted">Masuk Dengan</div>
                                </div>
                                <div class="row sm-gutters">
                                    <div class="col">
                                        <a href="{{ 'login/facebook' }}" class="btn btn-block btn-social btn-facebook">
                                            <span class="fab fa-facebook"></span> Facebook
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-5 text-muted text-center">
                        Tidak punya akun? <a href="{{ route('register') }}">Daftar</a>
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
    <script src="http://localhost/TEMPLATE/stisla/assets/js/stisla.js"></script>

    <!-- JS Libraies -->

    <!-- Template JS File -->
    <script src="http://localhost/TEMPLATE/stisla/assets/js/scripts.js"></script>
    <script src="http://localhost/TEMPLATE/stisla/assets/js/custom.js"></script>

    <!-- Page Specific JS File -->
</body>
</html>

