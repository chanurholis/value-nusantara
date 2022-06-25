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
            <li class="{{ set_active('admin.dashboard') }}"><a class="nav-link"
                    href="{{ route('admin.dashboard') }}"><i class="fas fa-fire"></i> <span>Beranda</span></a></li>

            <!-- Petugas -->
            <li class="menu-header">Petugas</li>
            <li class="{{ set_active('admin.officers') }}"><a class="nav-link"
                    href="{{ route('admin.officers') }}"><i class="fas fa-user"></i> <span>Petugas</span></a></li>
            <li class="{{ set_active('admin.officers.create') }}"><a class="nav-link"
                    href="{{ route('admin.officers.create') }}"><i class="fas fa-plus"></i> <span>Tambah
                        Petugas</span></a></li>

            <!-- Pengguna -->
            <li class="menu-header">Pengguna</li>
            <li class="{{ set_active('admin.users') }}"><a class="nav-link" href="{{ route('admin.users') }}"><i
                        class="fas fa-users"></i> <span>Pengguna</span></a></li>
        </ul>
    </aside>
</div>
