<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>{{ config('app.name') }} | Lupa Kata Sandi</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('img/favicon.png') }}" type="image/x-icon">
    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('stisla/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('stisla/assets/css/all.css') }}">
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
                    <div class="login-brand">
                        <img src="{{ asset('img/favicon.png') }}" alt="logo" width="100" class="shadow-light rounded-circle">
                    </div>

                    <div class="card card-primary">
                    <div class="card-header"><h4>Lupa Kata Sandi</h4></div>

                    <div class="card-body">
                        @if (session('status'))
                        <p class="muted">{{ session('status') }}</p>
                        @endif
                        <form method="post" action="{{ route('password.email') }}">
                            @csrf
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input id="email" type="email" class="form-control" name="email" tabindex="1" autocomplete="email">
                                <div class="invalid-feedback">
                                    @error('email') {{ $message }}  @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="2">
                                Lupa Kata Sandi
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
    <script src="http://localhost/TEMPLATE/stisla/assets/js/stisla.js"></script>

    <!-- JS Libraies -->

    <!-- Template JS File -->
    <script src="http://localhost/TEMPLATE/stisla/assets/js/scripts.js"></script>
    <script src="http://localhost/TEMPLATE/stisla/assets/js/custom.js"></script>

    <!-- Page Specific JS File -->

</body>
</html>
