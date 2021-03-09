@include('admin.partials.header')

    @include('admin.partials.sidebar')

    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>@yield('title-header')</h1>
            </div>

            <div class="section-body">
                @yield('content')
            </div>
        </section>
    </div>

@include('admin.partials.footer')