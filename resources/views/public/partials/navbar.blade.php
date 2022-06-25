<nav class="navbar navbar-expand-lg navbar-dark navbar-floating">
    <div class="container">
        <a class="navbar-brand" href="{{ route('landing-page') }}">
            <img src="{{ asset('img/favicon-light.png') }}" alt="" width="50">
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarToggler">
            <ul class="navbar-nav ml-auto mt-3 mt-lg-0">
                <li class="nav-item {{ set_active('landing-page') }}">
                    <a class="nav-link" href="{{ route('landing-page') }}">Beranda</a>
                </li>
                <li class="nav-item {{ set_active('about') }}">
                <a class="nav-link" href="{{ route('about') }}">Tentang</a>
                </li>
                <li class="nav-item {{ set_active('auction') }}">
                <a class="nav-link" href="{{ route('auction') }}">Lelang</a>
                </li>
                <li class="nav-item {{ set_active('contact') }}">
                <a class="nav-link" href="{{ route('contact') }}">Kontak</a>
                </li>
            </ul>
            <div class="ml-auto my-2 my-lg-0">
                <a href="{{ route('register') }}" class="btn btn-primary rounded-pill">Daftar Sekarang</a>
            </div>
        </div>
    </div>
</nav>