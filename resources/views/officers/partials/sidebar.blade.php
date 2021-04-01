<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">{{ config('app.name') }}</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">{{ config('app.nickname') }}</a>
        </div>
        <ul class="sidebar-menu">
            <!-- Dashboard -->
            <li class="menu-header">Beranda</li>
            <li class="{{ set_active('officer.dashboard') }}"><a class="nav-link" href="{{ route('officer.dashboard') }}"><i class="fas fa-fire"></i> <span>Beranda</span></a></li>

            <!-- Lelang -->
            <li class="menu-header">Lelang</li>
            <li class="{{ set_active('officer.auction-request') }}"><a class="nav-link" href="{{ route('officer.auction-request') }}"><i class="fas fa-gavel"></i> <span>Permintaan Lelang</span></a></li>                                    

            <!-- Report -->
            <li class="menu-header">Laporan</li>
            <li class=""><a class="nav-link" href=""><i class="fas fa-flag"></i> <span>Laporan</span></a></li>                        
        </ul>
    </aside>
</div>