<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }} @yield('title')</title>

    <link rel="shortcut icon" href="{{ asset('img/favicon.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('stisla/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-social/5.1.1/bootstrap-social.css" integrity="sha512-sopmFEmRVsWt542K+yzH3FQ1KJfdosOJG+bGLs9ZJT07b/3gUxRA9ICuJg2JtoZ9WeknAUuwJ0ggnmrV1YL6kQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('stisla/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('stisla/assets/css/components.css') }}">
    @yield('css')
</head>

<body>
    <div id="app">
        <div class="main-wrapper">
        <div class="navbar-bg"></div>
        <nav class="navbar navbar-expand-lg main-navbar">
            <div class="mr-auto">
                <ul class="navbar-nav mr-3">
                    <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
                </ul>    
            </div>
            <ul class="navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                        <img alt="image" src="@if(Auth::user()->avatar == null) {{ asset('stisla/assets/img/avatar/avatar-1.png') }} @elseif(strstr(Auth::user()->avatar, 'https')) {{ Auth::user()->avatar }} @else {{ '/usersFile/' . Auth::user()->avatar }} @endif" class="rounded-circle mr-1">
                        <div class="d-sm-none d-lg-inline-block">Hai, {{ Auth::user()->name }}</div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <div class="dropdown-title">Logged in 5 min ago</div>
                        <a href="{{ route('officer.profile') }}" class="dropdown-item has-icon">
                            <i class="far fa-user"></i> Profil
                        </a>
                        <a href="features-activities.html" class="dropdown-item has-icon">
                            <i class="fas fa-bolt"></i> Persyaratan Lelang
                        </a>
                        <a href="features-settings.html" class="dropdown-item has-icon">
                            <i class="fas fa-cog"></i> Settings
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="{{ route('officer.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dropdown-item has-icon text-danger">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="post" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
        </nav>