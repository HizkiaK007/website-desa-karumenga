@extends('layouts.app')

@section('title', 'Beranda Desa Karumenga')

@section('content')

<section id="beranda" class="hero position-relative">
  <div id="carouselHero" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="{{ asset('images/foto1.jpg') }}" class="d-block w-100 hero-img" alt="Karumenga">
      </div>
      <div class="carousel-item">
        <img src="{{ asset('images/foto2.jpg') }}" class="d-block w-100 hero-img" alt="Karumenga 2">
      </div>
      <div class="carousel-item">
        <img src="{{ asset('images/foto3.jpg') }}" class="d-block w-100 hero-img" alt="Karumenga 3">
      </div>
    </div>
  </div>

  <div class="hero-overlay"></div>
  <div class="hero-text text-center text-white">
    <h1 class="display-4 fw-bold mb-3 animate__animated animate__fadeInDown">Selamat Datang di Desa Karumenga</h1>
    <p class="lead animate__animated animate__fadeInUp">Kecamatan Langowan Utara, Kabupaten Minahasa</p>
  </div>
</section>

<section class="container my-4 d-md-none" data-aos="fade-up">
  <div class="row text-center g-4">
    @php
      $menus = [
        ['icon' => 'bi bi-house-door', 'title' => 'Beranda', 'route' => route('home')],
        ['icon' => 'bi bi-info-circle', 'title' => 'Profil', 'route' => route('profil')],
        ['icon' => 'bi bi-newspaper', 'title' => 'Berita', 'route' => route('berita')],
        ['icon' => 'bi bi-wallet2', 'title' => 'APBDes', 'route' => route('apbd.showByYear', date('Y'))],
        ['icon' => 'bi bi-bar-chart-line', 'title' => 'Statistik', 'route' => route('statistik')],
      ];
    @endphp

    @foreach($menus as $menu)
      <div class="col-4">
        <a href="{{ $menu['route'] }}" class="text-decoration-none text-dark d-block">
          <div class="icon-wrapper mx-auto mb-2">
            <i class="{{ $menu['icon'] }}"></i>
          </div>
          <small class="fw-semibold d-block">{{ $menu['title'] }}</small>
        </a>
      </div>
    @endforeach

  </div>
</section>


<section id="sambutan" class="container py-5" data-aos="fade-up">
  <div class="row align-items-center g-4">
    <div class="col-lg-5 text-center">
  <div class="image-wrapper no-border">
    <img src="{{ asset('images/kumtua.jpg') }}" 
         alt="Hukum Tua Desa Karumenga" 
         class="img-fluid hukum-tua-img">
  </div>
  <h5 class="mt-3 fw-bold text-danger">JOUDI ROBY SUMILAT</h5>
  <p class="text-muted mb-0">Hukum Tua Desa Karumenga</p>
</div>
    <div class="col-lg-7">
      <h2 class="fw-bold text-danger mb-4">Sambutan Hukum Tua</h2>
      <p class="text-secondary fs-5 text-justify">
        Puji syukur kita panjatkan ke hadirat Tuhan Yang Maha Esa atas rahmat dan karunia-Nya,
        sehingga website resmi <strong>Desa Karumenga</strong> ini dapat kami hadirkan sebagai sarana informasi dan komunikasi
        antara pemerintah desa dengan masyarakat.
      </p>
      <p class="text-secondary fs-5 text-justify mb-0">
        Atas nama pemerintah Desa Karumenga, saya mengucapkan terima kasih atas dukungan seluruh warga.
        Mari kita wujudkan Desa Karumenga yang <strong>maju, mandiri, dan sejahtera</strong>.
      </p>
    </div>
  </div>
</section>

<section id="struktur" class="bg-light py-5" data-aos="fade-up">
  <div class="container">
    <h2 class="text-center mb-5 fw-bold text-danger">Struktur Pemerintahan Desa Karumenga</h2>

    <div class="row justify-content-center mb-5">
      <div class="col-md-4">
        <div class="card shadow-sm border-0 rounded-4 text-center p-4 bg-white hover-card">
          <h5 class="fw-bold text-danger">Hukum Tua</h5>
          <p class="text-muted mb-0">JOUDI ROBY SUMILAT</p>
        </div>
      </div>
    </div>

    <div class="row g-4 justify-content-center mb-5">
      @foreach([
        ['Sekretaris Desa', 'AMANDA I. REWAH, S.E.'],
        ['Kaur Keuangan', 'SILVANA L. LONGKUTOY, S.T.'],
        ['Kaur Umum', 'WINDA Y. SEMBEL, A.Md.'],
        ['Kasie Pemerintahan', 'JEICY J.M. LUMANAUW, S.Kel.'],
        ['Kasie Kesejahteraan', 'RAFLES SEMBEL, S.Pd.'],
        ['Kasie Pelayanan', 'ANDREAS G. SUMILAT']
      ] as $item)
      <div class="col-md-4 col-sm-6">
        <div class="card shadow-sm border-0 rounded-4 text-center p-3 h-100 hover-card">
          <h6 class="fw-bold text-danger mb-1">{{ $item[0] }}</h6>
          <p class="text-muted mb-0">{{ $item[1] }}</p>
        </div>
      </div>
      @endforeach
    </div>

    <div class="row g-4 justify-content-center">
      @foreach([
        ['Kepala Jaga I', 'ERWIN IROTH', 'Meweteng Jaga I', 'DELANO KUMOLONTANG, S.S.'],
        ['Kepala Jaga II', 'ORAL A. LASAPU', 'Meweteng Jaga II', 'STEVEN S. KARUNDENG'],
        ['Kepala Jaga III', 'VEKY F. MAKARAWUNG', 'Meweteng Jaga III', 'ALVIAN A. KUMOLONTANG'],
        ['Kepala Jaga IV', 'ENDRICO S. SAJANG, A.Md.Kel.', 'Meweteng Jaga IV', 'AUDY J. SUMOLANG, S.T.']
      ] as $item)
      <div class="col-md-5 col-sm-6">
        <div class="card shadow-sm border-0 rounded-4 text-center p-4 h-100 hover-card">
          <div class="mb-3">
            <h6 class="fw-bold text-danger mb-1">{{ $item[0] }}</h6>
            <p class="text-muted mb-0">{{ $item[1] }}</p>
          </div>
          <hr class="my-2">
          <div>
            <h6 class="fw-bold text-danger mb-1">{{ $item[2] }}</h6>
            <p class="text-muted mb-0">{{ $item[3] }}</p>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>

<section id="statistik" class="container py-5" data-aos="fade-up">
  <h2 class="text-center mb-4 fw-bold text-danger">
    <i class="bi bi-bar-chart-line"></i> Statistik Penduduk Desa Karumenga
  </h2>
  <div class="row justify-content-center text-center g-4 mb-5">
    <div class="col-md-3 col-sm-6">
      <div class="card shadow-sm border-0">
        <div class="card-body">
          <i class="bi bi-people-fill text-danger fs-1 mb-2"></i>
          <h5 class="fw-bold text-danger">Jumlah Penduduk</h5>
          <p class="fs-4 fw-semibold">{{ $statistik->jumlah_penduduk }}</p>
        </div>
      </div>
    </div>

    <div class="col-md-3 col-sm-6">
      <div class="card shadow-sm border-0">
        <div class="card-body">
          <i class="bi bi-gender-male text-primary fs-1 mb-2"></i>
          <h5 class="fw-bold text-danger">Laki-laki</h5>
          <p class="fs-4 fw-semibold">{{ $statistik->jumlah_laki }}</p>
        </div>
      </div>
    </div>

    <div class="col-md-3 col-sm-6">
      <div class="card shadow-sm border-0">
        <div class="card-body">
          <i class="bi bi-gender-female text-pink fs-1 mb-2"></i>
          <h5 class="fw-bold text-danger">Perempuan</h5>
          <p class="fs-4 fw-semibold">{{ $statistik->jumlah_perempuan }}</p>
        </div>
      </div>
    </div>

    <div class="col-md-3 col-sm-6">
      <div class="card shadow-sm border-0">
        <div class="card-body">
          <i class="bi bi-house-heart-fill text-success fs-1 mb-2"></i>
          <h5 class="fw-bold text-danger">Jumlah Keluarga</h5>
          <p class="fs-4 fw-semibold">{{ $statistik->jumlah_keluarga }}</p>
        </div>
      </div>
    </div>
  </div>

</section>

<section id="berita" class="py-5" data-aos="fade-up">
  <div class="container">
    <h2 class="text-center mb-5 fw-bold text-danger">Berita Terbaru</h2>

    @if(isset($beritaTerbaru) && $beritaTerbaru->count() > 0)
      <div class="row g-4">
        @foreach($beritaTerbaru as $berita)
          <div class="col-md-4 col-sm-6">
            <div class="card border-0 shadow-sm h-100 rounded-4 hover-card">
              @if($berita->gambar)
                <img src="{{ asset('storage/'.$berita->gambar) }}" class="card-img-top rounded-top-4"
                  style="height:220px; object-fit:cover;" alt="{{ $berita->judul }}">
              @endif
              <div class="card-body">
                <h5 class="card-title text-danger">{{ Str::limit($berita->judul, 60) }}</h5>
                <small class="text-muted d-block mb-2">{{ $berita->created_at->format('d M Y') }}</small>
                <p class="card-text text-secondary">{{ Str::limit(strip_tags($berita->isi), 100) }}</p>
                <a href="{{ route('berita.show', $berita->id) }}" class="btn btn-outline-danger btn-sm mt-auto">
                  Baca Selengkapnya
                </a>
              </div>
            </div>
          </div>
        @endforeach
      </div>
      <div class="text-center mt-5">
        <a href="{{ route('berita') }}" class="btn btn-danger px-4 py-2 rounded-pill">Lihat Semua Berita</a>
      </div>
    @else
      <p class="text-center text-muted">Belum ada berita terbaru.</p>
    @endif
  </div>
</section>

<section id="lokasi" class="container py-5" data-aos="fade-up">
  <h2 class="text-center mb-5 fw-bold text-danger">Lokasi dan Batas Wilayah Desa Karumenga</h2>

  <div class="row align-items-start g-4">
    <div class="col-lg-5 col-md-6">
      <div class="card shadow-sm border-0 rounded-4 p-4 h-100">
        <h4 class="fw-bold text-danger mb-4">Batas-Batas Wilayah</h4>
        <table class="table table-borderless mb-0">
          <tbody>
            <tr>
              <th class="text-danger" style="width: 40%;">Sebelah Utara</th>
              <td class="text-secondary">Desa Tempang 2</td>
            </tr>
            <tr>
              <th class="text-danger">Sebelah Selatan</th>
              <td class="text-secondary">Desa Waleure</td>
            </tr>
            <tr>
              <th class="text-danger">Sebelah Timur</th>
              <td class="text-secondary">Desa Sumarayar</td>
            </tr>
            <tr>
              <th class="text-danger">Sebelah Barat</th>
              <td class="text-secondary">Desa Toraget dan Desa Walantakan</td>
            </tr>
            <tr>
              <th class="text-danger">Luas Wilayah</th>
              <td class="text-secondary">80 Hektare</td>
            </tr>
            <tr>
              <th class="text-danger">Jumlah Jaga</th>
              <td class="text-secondary">IV Jaga</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <div class="col-lg-7 col-md-6">
      <div class="ratio ratio-4x3 shadow-sm rounded-4 overflow-hidden">
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1792.0980598461404!2d124.8322113259873!3d1.1687017421561707!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3287471624c62c63%3A0x4a46005e4f981404!2sDesa%20Karumenga%2C%20Langowan%20Utara!5e1!3m2!1sid!2sid!4v1760750499729!5m2!1sid!2sid"
          style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
        </iframe>
      </div>
    </div>
  </div>
</section>

<style>
  body {
    scroll-behavior: smooth;
  }
  .hero {
    width: 100%;
    height: 100vh;
    overflow: hidden;
    position: relative;
  }

  .hero-img {
    width: 100%;
    height: 100vh;
    object-fit: cover;
    object-position: center;
  }

  .hero-text {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    z-index: 2;
    text-align: center;
    width: 90%; 
  }

  .hover-card {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
  }

  .hover-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
  }
  
   #sambutan {
    background-color: #fff;
  }

   #sambutan img {
    transition: transform 0.4s ease, box-shadow 0.4s ease;
  }

   #sambutan img:hover {
    transform: scale(1.03);
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
  }

  .image-wrapper.no-border {
  border: none !important; /* Hilangkan border khusus foto ini */
}

  .image-wrapper {
  display: inline-block;
  border: 3px solid #dc3545; /* warna merah border */
  border-radius: 12%;       /* agar melengkung */
  overflow: hidden;          /* penting agar border ikut bentuk foto */
  transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.image-wrapper:hover {
  transform: scale(1.03);
  box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
}

.hukum-tua-img {
  width: 100%;
  height: 420px;
  object-fit: cover;
  display: block;
  border-radius: 12px; /* biar foto dan border konsisten melengkung */
}

@media (max-width: 768px) {
  .hukum-tua-img {
    height: 320px;
  }

  /* ===== PERUBAHAN UNTUK OPTIMALISASI MOBILE DIMULAI DI SINI ===== */

  /* 1. Mengurangi tinggi hero section agar tidak memakan seluruh layar HP */
  .hero, .hero-img {
    height: 50vh;  
   }

  .hero-text {
    width: 70%;
      }
  .hero-text h1 {
    font-size: 1.4rem; /* Sedikit lebih kecil dari display-4 */
    margin-bottom: 0.8rem; 
  }
  .hero-text p {
    font-size:  1rem; /* Ukuran normal untuk sub-teks */
  }
}
/* ===== MENU BAWAH (RESPONSIF) ===== */
.container.my-4.d-md-none {
  margin-top: -70px !important; /* Naikkan posisi menu */
  position: relative;
  z-index: 5; /* Pastikan tampil di atas background hero */
}

.icon-wrapper {
  width: 70px;
  height: 70px;
  background: #fde8e8;
  border-radius: 20px;
  display: flex;
  align-items: center;
  justify-content: center;
  margin-bottom: 8px;
  transition: all 0.3s ease;
}

.icon-wrapper i {
  font-size: 1.8rem;
  color: #d63333;
}

.icon-wrapper:hover {
  background: #dc3545;
  color: #fff;
  transform: translateY(-4px);
}

.text-dark.fw-semibold {
  font-size: 0.95rem;
}

@media (min-width: 768px) {
  .container.my-4.d-md-none {
    margin-top: -40px !important;
  }
}

</style>
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  AOS.init({
    duration: 1000,
    once: true
  });
</script>

@endsection