<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="home">MYKEDAI</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="home">MA</a>
        </div>
        <ul class="sidebar-menu">
            <li class="nav-item dropdown">
                <ul class="sidebar-menu">
                    <li class="menu-header">Dashboard</li>
                    <li class='{{ Request::is('home') ? 'active' : '' }}'>
                        <a href="{{ route('home') }}"><i class="fas fa-fire"></i><span>Dashboard</span></a>
                    </li>
                </ul>
            </li>

            {{-- Menu untuk admin --}}
            @if (auth()->user()->role == 'admin')
                <li class="nav-item dropdown">
                    <ul class="sidebar-menu">
                        <li class="menu-header">Master</li>
                        <li class='{{ Request::is('products') ? 'active' : '' }}'>
                            <a href="{{ route('products.index') }}"><i class="fas fa-box"></i><span>Data
                                    Barang</span></a>
                        </li>
                        <li class='{{ Request::is('categories') ? 'active' : '' }}'>
                            <a href="{{ route('categories.index') }}"><i class="fas fa-bars"></i><span>Data
                                    Category</span></a>
                        </li>
                        <li class="menu-header">Transaksi</li>
                        <li class='{{ Request::is('transaksi') ? 'active' : '' }}'>
                            <a href="{{ route('pages.transaksi.index') }}"><i class="fas fa-file"></i><span>Data Transaksi</span></a>
                        </li>
                        <li class='{{ Request::is('setdiskon') ? 'active' : '' }}'>
                            <a href="{{ route('setdiskon.index') }}">
                                <i class="fas fa-percent"></i>
                                <span>Setting Diskon</span>
                            </a>
                        </li>
                        
                        <li class="menu-header">Report</li>
                        <li class='{{ Request::is('') ? 'active' : '' }}'>
                            <a href="#"><i class="fas fa-newspaper"></i><span>Laporan</span></a>
                        </li>
                        <li class="menu-header">SYSTEM</li>
                        <li class='{{ Request::is('users') ? 'active' : '' }}'>
                            <a href="{{ route('users.index') }}"><i class="fas fa-users"></i><span>Users</span></a>
                        </li>
                        <li class='{{ Request::is('pages.profile') ? 'active' : '' }}'>
                            <a href="{{ route('pages.profile') }}"><i class="fas fa-cogs"></i><span>Profile Settings</span></a>
                        </li>
                    </ul>
                </li>
            @endif

            {{-- Menu untuk staff --}}
            @if (auth()->user()->role == 'staff')
                <li class="menu-header">Transaksi</li>
                <li class='{{ Request::is('') ? 'active' : '' }}'>
                    <a href="#"><i class="fas fa-file"></i><span>Data Transaksi</span></a>
                </li>
            @endif
        </ul>

        </ul>
    </aside>
</div>


{{-- <li class="nav-item dropdown">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>All Products</span></a>
            <ul class="dropdown-menu">
                <li>
                    <a class="nav-link" href="{{ route('products.index') }}">Product Item</a>
                </li>
                <li>
                    <a class="nav-link" href="{{ route('categories.index') }}">Category Product</a>
                </li>
            </ul>
        </li> --}}
