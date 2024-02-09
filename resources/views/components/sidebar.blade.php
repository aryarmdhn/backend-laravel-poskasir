<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="#">Resto Arya</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="#">RA</a>
        </div>
        <ul class="sidebar-menu">
         
            <li class="nav-item dropdown">
                <a href="#"
                    class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
                <ul class="dropdown-menu">
                        <li>
                            <a class="nav-link" href="{{ route('users.index') }}">All Users</a>
                        </li>
                </ul>
                <ul class="dropdown-menu">
                        <li>
                            <a class="nav-link" href="{{ route('products.index') }}">All Products</a>
                        </li>
                </ul>
                <ul class="dropdown-menu">
                        <li>
                            <a class="nav-link" href="{{ route('categories.index') }}">All Categories</a>
                        </li>
                </ul>
            </li>

            
</div>
