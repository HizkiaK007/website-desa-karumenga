<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard - Desa Karumenga')</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fa;
            font-family: "Poppins", sans-serif;
            overflow-x: hidden;
        }

        /* ===== SIDEBAR ===== */
        .sidebar {
            width: 260px;
            background: linear-gradient(180deg, #1e7e34, #198754);
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            padding: 25px 0;
            color: #fff;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            transition: transform 0.3s ease;
            box-shadow: 3px 0 10px rgba(0, 0, 0, 0.15);
            z-index: 2000;
        }

        .sidebar .brand {
            text-align: center;
            font-weight: 600;
            font-size: 1.2rem;
            color: #fff;
        }

        .sidebar img {
            width: 70px;
            margin-bottom: 10px;
        }

        .sidebar .nav-link {
            color: #e6e6e6;
            padding: 12px 25px;
            display: flex;
            align-items: center;
            transition: all 0.2s ease;
            border-left: 4px solid transparent;
            font-size: 1rem;
        }

        .sidebar .nav-link i {
            font-size: 1.3rem;
            margin-right: 10px;
        }

        .sidebar .nav-link:hover {
            background: rgba(255, 255, 255, 0.15);
            color: #fff;
            border-left: 4px solid #b7e4c7;
            transform: translateX(3px);
        }

        .sidebar .nav-link.active {
            background: rgba(255, 255, 255, 0.25);
            color: #fff;
            font-weight: bold;
            border-left: 4px solid #fff;
        }

        .logout-btn {
            background-color: #dc3545;
            color: white;
            border: none;
            width: 100%;
            padding: 14px;
            font-weight: 500;
            letter-spacing: 0.5px;
            transition: background 0.2s ease;
        }

        .logout-btn:hover {
            background-color: #bb2d3b;
        }

        /* ===== MAIN CONTENT ===== */
        .main-content {
            margin-left: 260px;
            min-height: 100vh;
            transition: margin-left 0.3s ease;
            background-color: #fff;
        }

        .navbar-top {
            background: white;
            border-bottom: 1px solid #dee2e6;
            padding: 16px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .navbar-top h4 {
            font-weight: 600;
            color: #198754;
            margin-bottom: 0;
        }

        footer {
            background: #222;
            color: #ccc;
            padding: 15px 0;
            text-align: center;
            margin-top: 50px;
        }

        /* ===== OVERLAY ===== */
        .sidebar-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 1500;
            display: none;
            transition: opacity 0.3s ease;
        }

        .sidebar-overlay.active {
            display: block;
            opacity: 1;
        }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 992px) {
            .sidebar {
                width: 240px;
            }
            .main-content {
                margin-left: 240px;
            }
        }

        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
            }

            .sidebar.active {
                transform: translateX(0);
                box-shadow: 2px 0 10px rgba(0, 0, 0, 0.3);
            }

            .main-content {
                margin-left: 0;
            }

            .toggle-btn {
                display: inline-block !important;
                cursor: pointer;
            }

            .navbar-top h4 {
                font-size: 1rem;
            }
        }

        .toggle-btn {
            display: none;
            cursor: pointer;
        }

        .content {
            padding: 25px;
        }

        /* Tambahan UX Mobile */
        @media (max-width: 576px) {
            .sidebar .nav-link {
                font-size: 1rem;
                padding: 14px 20px;
            }
            .logout-btn {
                padding: 16px;
            }
            .content {
                padding: 15px;
            }
        }
    </style>
</head>

<body>

    <!-- ===== SIDEBAR ===== -->
    <div class="sidebar" id="sidebar">
        <div>
            <div class="text-center mb-4">
                <img src="{{ asset('images/logo.png') }}" alt="Logo">
                <div class="brand">Desa Karumenga</div>
            </div>

            <nav class="nav flex-column">
                <a href="{{ route('admin.berita.index') }}" 
                   class="nav-link {{ request()->is('admin/berita*') ? 'active' : '' }}">
                   <i class="bi bi-newspaper"></i> Kelola Berita
                </a>

                <a href="{{ route('admin.statistik.index') }}" 
                   class="nav-link {{ request()->is('admin/statistik*') ? 'active' : '' }}">
                   <i class="bi bi-bar-chart-line"></i> Statistik Penduduk
                </a>

                <a href="{{ route('admin.apbd.index') }}" 
                   class="nav-link {{ request()->is('admin/apbd*') ? 'active' : '' }}">
                   <i class="bi bi-cash-stack"></i> Kelola APBDes
                </a>

                <a href="{{ route('admin.user.index') }}" 
                   class="nav-link {{ request()->is('admin/user*') ? 'active' : '' }}">
                   <i class="bi bi-people-fill"></i> Kelola Admin
                </a>
            </nav>
        </div>

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="logout-btn">
                <i class="bi bi-box-arrow-right"></i> Logout
            </button>
        </form>
    </div>

    <!-- ===== OVERLAY ===== -->
    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <!-- ===== MAIN CONTENT ===== -->
    <div class="main-content">
        <div class="navbar-top">
            <div class="d-flex align-items-center">
                <span class="toggle-btn me-3 text-success" onclick="toggleSidebar()">
                    <i class="bi bi-list" style="font-size: 1.8rem;"></i>
                </span>
                <h4>@yield('title', 'Dashboard Admin')</h4>
            </div>
            <span class="text-muted fw-semibold">Halo, {{ Auth::user()->name ?? 'Admin' }}</span>
        </div>

        <div class="content">
            @yield('content')
        </div>
    </div>

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
    // Sidebar Toggle
    function toggleSidebar() {
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('sidebarOverlay');
        sidebar.classList.toggle('active');
        overlay.classList.toggle('active');
    }

    // Klik di overlay untuk menutup sidebar
    document.getElementById('sidebarOverlay').addEventListener('click', () => {
        document.getElementById('sidebar').classList.remove('active');
        document.getElementById('sidebarOverlay').classList.remove('active');
    });

    // Reset sidebar saat lebar layar diperbesar
    window.addEventListener('resize', function() {
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('sidebarOverlay');
        if (window.innerWidth >= 769) {
            sidebar.classList.remove('active');
            overlay.classList.remove('active');
        }
    });
    </script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Semua script tambahan dari halaman lain -->
    @stack('scripts')

</body>
</html>
