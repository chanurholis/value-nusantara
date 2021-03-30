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
            <li class="{{ set_active('admin.dashboard') }}"><a class="nav-link" href="{{ route('admin.dashboard') }}"><i class="fas fa-fire"></i> <span>Beranda</span></a></li>

            <!-- Barang -->
            <li class="menu-header">Barang</li>
            <li class="{{ set_active('admin.goodies') }}"><a class="nav-link" href="{{ route('admin.goodies') }}"><i class="fas fa-ring"></i> <span>Barang</span></a></li>                        
            <li class="{{ set_active('admin.goodies.create') }}"><a class="nav-link" href="{{ route('admin.goodies.create') }}"><i class="fas fa-plus"></i> <span>Tambah Barang</span></a></li>                        

            <!-- Lelang -->
            <li class="menu-header">Lelang</li>
            <li class="{{ set_active('admin.auction-history') }}"><a class="nav-link" href="{{ route('admin.auction-history') }}"><i class="fas fa-gavel"></i> <span>Lelang</span></a></li>                                    
            <li class=""><a class="nav-link" href=""><i class="fas fa-user-friends"></i> <span>Diikuti</span></a></li>                                    
            <li class="{{ set_active('admin.auctions') }}"><a class="nav-link" href="{{ route('admin.auctions') }}"><i class="fas fa-book-reader"></i> <span>My Lelang</span></a></li>                                    
            <li class="{{ set_active('admin.auctions.create') }}"><a class="nav-link" href="{{ route('admin.auctions.create') }}"><i class="fas fa-plus"></i> <span>Permohonan Lelang</span></a></li>                                    

            <!-- Persyaratan Lelalng -->
            <li class="menu-header">Persyaratan Lelang</li>
            <li><a class="nav-link" href=""><i class="fas fa-id-card"></i> <span>KTP</span></a></li>                        
            <li><a class="nav-link" href=""><i class="fas fa-id-badge"></i> <span>NPWP</span></a></li>                        
            <li><a class="nav-link" href=""><i class="fas fa-file-invoice-dollar"></i> <span>Rekening Bank</span></a></li>                        

            @if (Auth::guard('officer'))
                <!-- Petugas -->
                <li class="menu-header">Petugas</li>
                <li class="{{ set_active('admin.officers') }}"><a class="nav-link" href="{{ route('admin.officers') }}"><i class="fas fa-user"></i> <span>Petugas</span></a></li>                        
                <li class="{{ set_active('admin.officers.create') }}"><a class="nav-link" href="{{ route('admin.officers.create') }}"><i class="fas fa-plus"></i> <span>Tambah Petugas</span></a></li>                        
                
                <!-- Pengguna -->
                <li class="menu-header">Pengguna</li>
                <li class="{{ set_active('admin.users') }}"><a class="nav-link" href="{{ route('admin.users') }}"><i class="fas fa-users"></i> <span>Pengguna</span></a></li>            
            @endif
        </ul>
    </aside>
</div>