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
            <li class="{{ set_active('user.dashboard') }}"><a class="nav-link" href="{{ route('user.dashboard') }}"><i class="fas fa-fire"></i> <span>Beranda</span></a></li>

            <!-- Barang -->
            <li class="menu-header">Barang</li>
            <li class="{{ set_active('user.goodies') }}"><a class="nav-link" href="{{ route('user.goodies') }}"><i class="fas fa-ring"></i> <span>Barang</span></a></li>                        
            <li class="{{ set_active('user.goodies.create') }}"><a class="nav-link" href="{{ route('user.goodies.create') }}"><i class="fas fa-plus"></i> <span>Tambah Barang</span></a></li>                        

            <!-- Lelang -->
            <li class="menu-header">Lelang</li>
            <li class="{{ set_active('user.auctions') }}"><a class="nav-link" href="{{ route('user.auctions') }}"><i class="fas fa-gavel"></i> <span>Lelang</span></a></li>                                    
            <li class=""><a class="nav-link" href=""><i class="fas fa-user-friends"></i> <span>Mengikuti</span></a></li>                                    
            <li class="{{ set_active('user.my-auctions') }}"><a class="nav-link" href="{{ route('user.my-auctions') }}"><i class="fas fa-book-reader"></i> <span>My Lelang</span></a></li>                                    
            <li class="{{ set_active('user.auctions.create') }}"><a class="nav-link" href="{{ route('user.auctions.create') }}"><i class="fas fa-plus"></i> <span>Permohonan Lelang</span></a></li>                                    

            <!-- Persyaratan Lelalng -->
            <li class="menu-header">Persyaratan Lelang</li>
            <li><a class="nav-link" href=""><i class="fas fa-id-card"></i> <span>KTP</span></a></li>                        
            <li><a class="nav-link" href=""><i class="fas fa-id-badge"></i> <span>NPWP</span></a></li>                        
            <li><a class="nav-link" href=""><i class="fas fa-file-invoice-dollar"></i> <span>Rekening Bank</span></a></li>    
            
            <li class="menu-header">Aktivitas</li>
            <li><a class="nav-link" href="{{ route('user.trashed') }}"><i class="fas fa-trash-alt"></i> <span>Dihapus</span></a></li>
        </ul>
    </aside>
</div>