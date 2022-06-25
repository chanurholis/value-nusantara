@include('admin.partials.header')

@include('admin.partials.sidebar')

<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>@yield('title-header')</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Beranda</a></div>
                <div class="breadcrumb-item">@yield('title-header')</div>
            </div>
        </div>
        <div class="section-body">
            @yield('content')
        </div>
    </section>
</div>

@include('admin.partials.footer')
