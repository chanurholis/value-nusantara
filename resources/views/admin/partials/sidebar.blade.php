<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">{{ config('app.name') }}</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">Vl</a>
        </div>
        <ul class="sidebar-menu">
            <!-- Dashboard -->
            <li class="menu-header">Beranda</li>
            <li><a class="nav-link" href="{{ route('admin.dashboard') }}"><i class="fas fa-fire"></i> <span>Beranda</span></a></li>

            {{-- <li class="menu-header">Starter</li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Layout</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="layout-default.html">Default Layout</a></li>
                    <li><a class="nav-link" href="layout-transparent.html">Transparent Sidebar</a></li>
                    <li><a class="nav-link" href="layout-top-navigation.html">Top Navigation</a></li>
                </ul>
            </li>
            <li><a class="nav-link" href="blank.html"><i class="far fa-square"></i> <span>Blank Page</span></a></li> --}}

            <!-- Barang -->
            <li class="menu-header">Barang</li>
            <li><a class="nav-link" href="{{ route('admin.goodies') }}"><i class="fas fa-ring"></i> <span>Barang</span></a></li>                        

            <!-- Lelang -->
            <li class="menu-header">Lelang</li>
            <li><a class="nav-link" href="{{ route('admin.auctions') }}"><i class="fas fa-gavel"></i> <span>Lelang</span></a></li>                                    

            <!-- Petugas -->
            <li class="menu-header">Petugas</li>
            <li><a class="nav-link" href="{{ route('admin.officers') }}"><i class="fas fa-user"></i> <span>Petugas</span></a></li>                        
            
            <!-- Pengguna -->
            <li class="menu-header">Pengguna</li>
            <li><a class="nav-link" href="{{ route('admin.users') }}"><i class="fas fa-users"></i> <span>Pengguna</span></a></li>            
        </ul>
    </aside>
</div>