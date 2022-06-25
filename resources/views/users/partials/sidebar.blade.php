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
            <li class="{{ set_active('user.dashboard') }}"><a class="nav-link" href="{{ route('user.dashboard') }}"><i
                        class="fas fa-fire"></i> <span>Beranda</span></a></li>

            <!-- Barang -->
            <li class="menu-header">Barang</li>
            <li class="{{ set_active('user.goodies') }}"><a class="nav-link" href="{{ route('user.goodies') }}"><i
                        class="fas fa-ring"></i> <span>Barang</span></a></li>
            <li class="{{ set_active('user.goodies.create') }}"><a class="nav-link"
                    href="{{ route('user.goodies.create') }}"><i class="fas fa-plus"></i> <span>Tambah
                        Barang</span></a></li>

            <!-- Lelang -->
            <li class="menu-header">Lelang</li>
            <li class="{{ set_active('user.auctions') }}"><a class="nav-link" href="{{ route('user.auctions') }}"><i
                        class="fas fa-gavel"></i> <span>Lelang</span></a></li>
            <li class="{{ set_active('user.auction-histories') }}"><a class="nav-link"
                    href="{{ route('user.auction-histories') }}"><i class="fas fa-user-friends"></i> <span>Lelang
                        Diikuti</span></a></li>
            <li class="{{ set_active('user.my-auctions') }}"><a class="nav-link"
                    href="{{ route('user.my-auctions') }}"><i class="fas fa-book-reader"></i> <span>My
                        Lelang</span></a></li>
            <li class="{{ set_active('user.auctions.create') }}"><a class="nav-link"
                    href="{{ route('user.auctions.create') }}"><i class="fas fa-plus"></i> <span>Permohonan
                        Lelang</span></a></li>

            <!-- Persyaratan Lelalng -->
            <li class="menu-header">Persyaratan Lelang</li>
            <li class="{{ set_active('user.identity-card') }}"><a class="nav-link"
                    href="{{ route('user.identity-card') }}"><i class="fas fa-id-card"></i> <span>KTP</span></a></li>
            {{-- <li class="{{ set_active('user.npwp') }}"><a class="nav-link" href="{{ route('user.npwp') }}"><i class="fas fa-id-badge"></i> <span>NPWP</span></a></li>                        
            <li class="{{ set_active('user.bank') }}"><a class="nav-link" href="{{ route('user.bank') }}"><i class="fas fa-file-invoice-dollar"></i> <span>Rekening Bank</span></a></li> --}}

            <li class="menu-header">Aktivitas</li>
            <li><a class="nav-link" href="{{ route('user.trashed') }}"><i class="fas fa-trash-alt"></i> <span>Barang
                        Dihapus</span></a></li>
        </ul>
    </aside>
</div>
