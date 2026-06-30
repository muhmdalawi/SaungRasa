<div class="admin-topbar d-flex align-items-center justify-content-between">
    <div>
        <button class="btn btn-sm btn-outline-secondary d-lg-none me-2" id="sidebarToggle" type="button">
            <i class="bi bi-list"></i>
        </button>
        <h5 class="d-inline-block mb-0 align-middle">@yield('page-title', 'Dashboard')</h5>
        <nav aria-label="breadcrumb" class="d-block">
            <ol class="breadcrumb mb-0 small">
                @yield('breadcrumb')
            </ol>
        </nav>
    </div>
    <div class="dropdown">
        <button class="btn btn-light dropdown-toggle d-flex align-items-center" type="button" data-bs-toggle="dropdown">
            <i class="bi bi-person-circle me-2 fs-5"></i> {{ Auth::user()->name }}
        </button>
        <ul class="dropdown-menu dropdown-menu-end">
            <li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right me-2"></i>Logout</button>
                </form>
            </li>
        </ul>
    </div>
</div>
