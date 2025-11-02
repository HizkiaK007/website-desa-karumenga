<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title', 'Desa Karumenga')</title>

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- AOS Animation -->
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <!-- Custom CSS -->
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">

  <style>
    body {
      font-family: 'Poppins', sans-serif;
      scroll-behavior: smooth;
    }

    /* ===== HERO ===== */
    .hero {
      position: relative;
      width: 100%;
      height: 100vh;
      overflow: hidden;
    }

    .hero img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      filter: brightness(70%);
      transition: opacity 1s ease-in-out;
    }

    .hero-text {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      color: white;
      text-align: center;
    }

    /* ===== NAVBAR ===== */
    .custom-navbar {
      background: transparent;
      transition: background-color 0.4s ease, box-shadow 0.4s ease;
      z-index: 1000;
    }

    .custom-navbar.scrolled {
      background-color: #dc3545 !important;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .custom-navbar .nav-link,
    .custom-navbar .navbar-brand span,
    .custom-navbar .navbar-brand small {
      color: #fff !important;
      transition: color 0.3s ease;
    }

    .custom-navbar .nav-link:hover {
      color: #f8d7da !important;
    }

    .navbar-toggler {
      border-color: rgba(255, 255, 255, 0.5);
    }

    /* Logo hover */
    .navbar-brand img {
      transition: transform 0.3s ease;
    }

    .navbar-brand img:hover {
      transform: scale(1.1);
    }

    /* ===== OFFCANVAS MENU ===== */
    .offcanvas {
      width: 260px;
      background-color: #dc3545;
      color: white;
      transition: transform 0.4s ease-in-out;
    }

    .offcanvas .offcanvas-header {
      border-bottom: 1px solid rgba(255, 255, 255, 0.2);
    }

    .offcanvas .nav-link {
      color: #fff;
      font-size: 1.1rem;
      transition: 0.3s;
    }

    .offcanvas .nav-link:hover {
      color: #f8d7da;
      transform: scale(1.05);
    }

    .offcanvas .dropdown-menu {
      background: #b02a37;
      border: none;
    }

    .offcanvas .dropdown-item:hover {
      background: #dc3545;
    }

    /* ===== FOOTER ===== */
    footer {
      background: #212529;
      color: #fff;
      padding: 15px 0;
      text-align: center;
      margin-top: 60px;
    }

    footer a.text-white:hover {
      text-decoration: underline;
    }

    /* ===== NON-HOME PAGE SPACING ===== */
    .pt-navbar {
      padding-top: 90px;
    }

    @media (max-width: 768px) {
      .hero-text h1 { font-size: 1.8rem; }
      .hero-text p { font-size: 1rem; }
    }
  </style>
</head>

<body>
  @php
    $isHome = Route::currentRouteName() === 'home';
  @endphp

  <!-- ===== NAVBAR ===== -->
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top {{ $isHome ? 'custom-navbar' : 'bg-danger shadow-sm' }}">
    <div class="container d-flex align-items-center justify-content-between">
      <!-- Logo -->
      <a class="navbar-brand d-flex align-items-center gap-2" href="{{ url('/') }}">
        <img src="{{ asset('images/logo.png') }}" alt="Logo Minahasa" width="50" height="60">
        <div class="d-flex flex-column lh-sm">
          <span class="fw-bold text-white fs-5">Desa Karumenga</span>
          <small class="text-light opacity-75">Kecamatan Langowan Utara</small>
          <small class="text-light opacity-50">Kabupaten Minahasa</small>
        </div>
      </a>

      <!-- Tombol Toggle Offcanvas -->
      <button class="navbar-toggler border-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobileMenu">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- Menu Desktop -->
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto align-items-center">
          <li class="nav-item"><a class="nav-link fw-semibold" href="{{ route('home') }}">Beranda</a></li>
          <li class="nav-item"><a class="nav-link fw-semibold" href="{{ route('profil') }}">Profil</a></li>
          <li class="nav-item"><a class="nav-link fw-semibold" href="{{ route('berita') }}">Berita</a></li>
          <!-- Dropdown APBDes -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle fw-semibold" href="#" id="apbdDropdown" role="button" data-bs-toggle="dropdown">
              APBDes
            </a>
            <ul class="dropdown-menu">
              @forelse($apbdYears ?? [] as $year)
                <li><a class="dropdown-item" href="{{ route('apbd.showByYear', $year->year) }}">Tahun {{ $year->year }}</a></li>
              @empty
                <li><span class="dropdown-item text-muted">Belum ada data</span></li>
              @endforelse
            </ul>
          </li>

          <li class="nav-item"><a class="nav-link fw-semibold" href="{{ route('statistik') }}">Statistik Penduduk</a></li>

          @guest
            <li class="nav-item ms-2">
              <a href="{{ route('login') }}" class="btn btn-outline-light px-3 py-1 rounded-pill">Login</a>
            </li>
          @else
            <li class="nav-item dropdown ms-3">
              <a class="nav-link dropdown-toggle text-white" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown">
                {{ Auth::user()->name }}
              </a>
              <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item" href="{{ url('/admin/berita') }}">Dashboard</a></li>
                <li><hr class="dropdown-divider"></li>
                <li>
                  <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="dropdown-item text-danger">Logout</button>
                  </form>
                </li>
              </ul>
            </li>
          @endguest
        </ul>
      </div>
    </div>
  </nav>

  <!-- ===== OFFCANVAS MOBILE MENU ===== -->
  <div class="offcanvas offcanvas-end" tabindex="-1" id="mobileMenu">
    <div class="offcanvas-header">
      <h5 class="offcanvas-title fw-bold">Menu</h5>
      <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"></button>
    </div>
    <div class="offcanvas-body">
      <ul class="navbar-nav text-center">
        <li class="nav-item mb-2"><a class="nav-link" href="{{ route('home') }}">Beranda</a></li>
        <li class="nav-item mb-2"><a class="nav-link" href="{{ route('profil') }}">Profil</a></li>
        <li class="nav-item mb-2"><a class="nav-link" href="{{ route('berita') }}">Berita</a></li>
        <li class="nav-item dropdown mb-2">
          <a class="nav-link dropdown-toggle" href="#" id="apbdDropdownMobile" role="button" data-bs-toggle="dropdown">
            APBDes
          </a>
          <ul class="dropdown-menu dropdown-menu-dark text-center">
            @forelse($apbdYears ?? [] as $year)
              <li><a class="dropdown-item" href="{{ route('apbd.showByYear', $year->year) }}">Tahun {{ $year->year }}</a></li>
            @empty
              <li><span class="dropdown-item text-muted">Belum ada data</span></li>
            @endforelse
          </ul>
        </li>

        <li class="nav-item mb-3"><a class="nav-link" href="{{ route('statistik') }}">Statistik Penduduk</a></li>

        @guest
          <li class="nav-item">
            <a href="{{ route('login') }}" class="btn btn-outline-light w-75 rounded-pill mx-auto">Login</a>
          </li>
        @else
          <li class="nav-item">
            <form method="POST" action="{{ route('logout') }}">
              @csrf
              <button type="submit" class="btn btn-light text-danger w-75 rounded-pill mx-auto">Logout</button>
            </form>
          </li>
        @endguest
      </ul>
    </div>
  </div>

  <!-- ===== MAIN CONTENT ===== -->
  <main class="{{ $isHome ? '' : 'pt-navbar' }}">
    @yield('content')
  </main>

  <!-- ===== FOOTER ===== -->
   <!-- ===== FOOTER ===== -->
  <footer class="bg-danger text-white py-4 mt-5">
    <div class="container">
      <div class="row align-items-center">
        <!-- Logo -->
        <div class="col-md-3 text-center text-md-start mb-3 mb-md-0">
          <img src="{{ asset('images/logo.png') }}" alt="Logo Minahasa" width="70" height="80" class="img-fluid">
          <p class="fw-bold mt-2 mb-0">Desa Karumenga</p>
          <p class="small mb-0">Kecamatan Langowan Utara<br>Kabupaten Minahasa</p>
        </div>

        <!-- Kontak -->
        <div class="col-md-9">
          <div class="row justify-content-md-end text-center text-md-start">
            <div class="col-md-4 col-sm-6 mb-3">
              <h6 class="fw-bold">Alamat</h6>
              <p class="small mb-0">
                <i class="bi bi-geo-alt-fill me-2"></i> Desa Karumenga, Langowan Utara, Minahasa
              </p>
            </div>

            <div class="col-md-4 col-sm-6 mb-3">
              <h6 class="fw-bold">Kontak</h6>
              <p class="small mb-0">
                <i class="bi bi-envelope-fill me-2"></i>
                <a href="mailto:desakarumenga1@gmail.com" class="text-white text-decoration-none">
                  desakarumenga1@gmail.com
                </a>
              </p>
            </div>

            <div class="col-md-4 col-sm-6 mb-3">
              <h6 class="fw-bold">Jam Pelayanan</h6>
              <p class="small mb-0">Senin - Jumat: 08.00 - 17.00</p>
              <p class="small mb-0">Sabtu & Minggu: Tutup</p>
            </div>
          </div>
        </div>
      </div>

      <hr class="border-light my-3">
      <p class="text-center small mb-0">
        &copy; {{ date('Y') }} Pemerintah Desa Karumenga — Kecamatan Langowan Utara, Kabupaten Minahasa
      </p>
    </div>
  </footer>

  <!-- ===== SCRIPTS ===== -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
    AOS.init({ duration: 1000, once: true, easing: 'ease-in-out' });

    // Scroll behavior for home page navbar
    document.addEventListener("DOMContentLoaded", () => {
      const navbar = document.querySelector(".custom-navbar");
      if (!navbar) return;
      window.addEventListener("scroll", () => {
        navbar.classList.toggle("scrolled", window.scrollY > 50);
      });
    });
  </script>
</body>
</html>
