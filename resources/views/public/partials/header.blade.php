<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="description" content="Value Nusantara - Sistme Lelang Online Terpercaya Di Indonesia">
        <meta name="copyright" content="Chacha Nurholis, https://chanurholis.github.io/">

        <!-- Title -->
        <title>{{ config('app.name') }} @yield('title')</title>

        <!-- Favicon -->
        <link rel="shortcut icon" href="{{ asset('img/favicon.png') }}" type="image/x-icon">

        <!-- Style -->
        <link rel="stylesheet" href="{{ asset('mobster/assets/css/maicons.css') }}">
        <link rel="stylesheet" href="{{ asset('mobster/assets/vendor/animate/animate.css') }}">
        <link rel="stylesheet" href="{{ asset('mobster/assets/vendor/owl-carousel/css/owl.carousel.min.css') }}">
        <link rel="stylesheet" href="{{ asset('mobster/assets/css/bootstrap.css') }}">
        <link rel="stylesheet" href="{{ asset('mobster/assets/css/mobster.css') }}">
    </head>

    <body>