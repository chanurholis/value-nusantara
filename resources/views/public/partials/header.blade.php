<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>{{ config('app.name') }} &mdash; @yield('title')</title>

        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="{{ asset('venue/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('venue/css/bootstrap-theme.min.css') }}">
        <link rel="stylesheet" href="{{ asset('venue/css/fontAwesome.css') }}">
        <link rel="stylesheet" href="{{ asset('venue/css/hero-slider.css') }}">
        <link rel="stylesheet" href="{{ asset('venue/css/owl-carousel.css') }}">
        <link rel="stylesheet" href="{{ asset('venue/css/datepicker.css') }}">
        <link rel="stylesheet" href="{{ asset('venue/css/templatemo-style.css') }}">

        <!-- Googleapis -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900" rel="stylesheet">

        <script src="{{ asset('venue/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js') }}"></script>

    </head>

<body>

    <div class="wrap">
        <header id="header">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <button id="primary-nav-button" type="button">Menu</button>
                        <a href="index.html">
                            <div class="logo">
                                <img src="{{ asset('venue/img/logo.png') }}" alt="Venue Logo">
                            </div>
                        </a>
                        <nav id="primary-nav" class="dropdown cf">
                            <ul class="dropdown menu">
                                <li><a href="{{ route('register') }}">Daftar</a></li>
                                <li><a href="{{ route('login') }}">Masuk</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </header>
    </div>