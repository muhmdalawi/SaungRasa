<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard') - Admin Saung Rasa</title>
    <link rel="icon" href="{{ asset('assets/logo.png') }}">

    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('bootstrap/other/DataTables-1.13.3/css/dataTables.bootstrap5.min.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <script>
        if (localStorage.getItem('sr-sidebar-collapsed') === '1') {
            document.documentElement.classList.add('sidebar-collapsed');
        }
    </script>

    @stack('styles')
</head>
<body>
    <div class="admin-wrapper">
        @include('partials.sidebar')

        <div class="admin-content">
            @include('partials.admin-navbar')

            <main class="admin-main">
                @yield('content')
            </main>
        </div>
    </div>

    <script src="{{ asset('bootstrap/other/jquery-3.6.1.js') }}"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('bootstrap/other/DataTables-1.13.3/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('bootstrap/other/DataTables-1.13.3/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        document.getElementById('sidebarToggle')?.addEventListener('click', function () {
            document.getElementById('adminSidebar').classList.toggle('show');
        });

        document.getElementById('sidebarCollapseToggle')?.addEventListener('click', function () {
            const collapsed = document.documentElement.classList.toggle('sidebar-collapsed');
            localStorage.setItem('sr-sidebar-collapsed', collapsed ? '1' : '0');
        });
    </script>

    @if (session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                Swal.fire({
                    toast: true,
                    position: 'top-end',
                    icon: 'success',
                    title: @json(session('success')),
                    showConfirmButton: false,
                    timer: 2500,
                    timerProgressBar: true,
                });
            });
        </script>
    @endif
    @if (session('error'))
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                Swal.fire({
                    toast: true,
                    position: 'top-end',
                    icon: 'error',
                    title: @json(session('error')),
                    showConfirmButton: false,
                    timer: 3000,
                });
            });
        </script>
    @endif

    @stack('scripts')
</body>
</html>
