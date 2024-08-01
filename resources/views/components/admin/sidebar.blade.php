<ul class="navbar-nav bg-gradient-{{ config('app.bg_color') }} sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-text mx-3">Azzahra Decoration</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Features
    </div>

    <li class="nav-item {{ request()->routeIs('admin.master-data.*') ? 'active' : '' }}">
        <span class="nav-link collapsed cursor-pointer" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-database"></i>
            <span>Master Data</span>
        </span>
        <div id="collapseTwo" class="collapse {{ request()->routeIs('admin.master-data.*') ? 'show' : '' }}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Master Data:</h6>
                <a class="collapse-item {{ request()->routeIs('admin.master-data.users.*') ? 'active' : '' }}" href="{{ route('admin.master-data.users.index') }}">Users</a>
                <a class="collapse-item {{ request()->routeIs('admin.master-data.category-products.*') ? 'active' : '' }}" href="{{ route('admin.master-data.category-products.index') }}">Category Products</a>
                <a class="collapse-item {{ request()->routeIs('admin.master-data.products.*') ? 'active' : '' }}" href="{{ route('admin.master-data.products.index') }}">Products</a>
                <a class="collapse-item {{ request()->routeIs('admin.master-data.promotions.*') ? 'active' : '' }}" href="{{ route('admin.master-data.promotions.index') }}">Promotions</a>
            </div>
        </div>
    </li>

    <li class="nav-item {{ request()->routeIs('admin.transactions.*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.transactions.index') }}">
            <i class="fas fa-fw fa-exchange-alt"></i>
            <span>Transactions</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
