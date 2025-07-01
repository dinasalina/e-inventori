<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Stok Inventori')</title>

    <!-- CSS AdminLTE & FontAwesome dari CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/all.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <span class="navbar-brand">Sistem Stok Inventori</span>
    </nav>

    <!-- Sidebar -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <a href="#" class="brand-link text-center">
            <span class="brand-text font-weight-light">e-Inventori</span>
        </a>
        <div class="sidebar">
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column">

                    <li class="nav-item">
                        <a href="{{ route('dashboard') }}" class="nav-link">
                            <i class="nav-icon fas fa-chart-pie"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>


                    <li class="nav-item">
                        <a href="{{ route('items.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-boxes"></i>
                            <p>Stok Barang</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('pergerakan.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-random"></i>
                            <p>Pergerakan Stok</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('pergerakan.statistik') }}" class="nav-link">
                            <i class="nav-icon fas fa-chart-bar"></i>
                            <p>Statistik Stok</p>
                        </a>
                    </li>

                    
                </ul>
            </nav>
        </div>
    </aside>

    <!-- Content -->
    <div class="content-wrapper p-3">
        @yield('content')
    </div>

    <!-- Footer -->
    <footer class="main-footer text-center">
        <strong>&copy; 2025 Sistem Stok Inventori Mini.</strong>
    </footer>
</div>

<!-- JS AdminLTE dari CDN -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>

@yield('scripts')
<!-- Chart.js dari CDN -->
</body>
</html>
