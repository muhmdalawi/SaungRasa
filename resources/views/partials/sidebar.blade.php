<aside class="admin-sidebar d-flex flex-column" id="adminSidebar">
    <div class="sidebar-brand">
        <img src="{{ asset('assets/logo.png') }}" alt="Saung Rasa">
        <span class="brand-text">Saung Rasa</span>
    </div>

    <button type="button" id="sidebarCollapseToggle" class="sidebar-collapse-handle d-none d-lg-flex" title="Ciutkan sidebar">
        <i class="bi bi-chevron-left"></i>
    </button>

    <nav class="nav flex-column py-2 flex-grow-1">
        <span class="nav-section-label">Menu Utama</span>

        <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"
           href="{{ route('admin.dashboard') }}" title="Dashboard">
            <i class="bi bi-speedometer2"></i> <span class="nav-label">Dashboard</span>
        </a>
        <a class="nav-link {{ request()->routeIs('admin.products.*') ? 'active' : '' }}"
           href="{{ route('admin.products.index') }}" title="Data Product">
            <i class="bi bi-box-seam"></i> <span class="nav-label">Data Product</span>
        </a>
    </nav>

    <div class="sidebar-footer">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="nav-link logout-link w-100 border-0" title="Logout">
                <i class="bi bi-box-arrow-right"></i> <span class="nav-label">Logout</span>
            </button>
        </form>
    </div>
</aside>
