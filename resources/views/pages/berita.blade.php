@extends('layouts.app')

@section('title', 'Berita Desa Karumenga')

@section('content')
<div class="container py-5"data-aos="fade-up">
  <h2 class="fw-bold text-danger text-center mb-5">
    <i class="bi bi-newspaper me-2"></i> Berita Desa Karumenga
  </h2>

  @if($semuaBerita->count() > 0)
  <div class="row g-4">
    @foreach($semuaBerita as $b)
    <div class="col-md-6 col-lg-4">
      <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden hover-card">
        @if($b->gambar)
        <div class="ratio ratio-16x9">
          <img src="{{ asset('storage/'.$b->gambar) }}" 
               class="card-img-top" 
               alt="{{ $b->judul }}" 
               style="object-fit: cover;">
        </div>
        @endif

        <div class="card-body d-flex flex-column">
          <h5 class="card-title fw-bold text-danger">{{ Str::limit($b->judul, 70) }}</h5>
          <small class="text-muted mb-2">
            <i class="bi bi-calendar-event me-1"></i>{{ $b->created_at->format('d M Y') }}
          </small>
          <p class="text-secondary flex-grow-1">
            {{ Str::limit(strip_tags($b->isi), 120) }}
          </p>
          <a href="{{ route('berita.show', $b->id) }}" 
             class="btn btn-outline-danger mt-auto rounded-pill">
            Baca Selengkapnya
          </a>
        </div>
      </div>
    </div>
    @endforeach
  </div>

  <!-- Pagination -->
  @if ($semuaBerita->hasPages())
  <nav class="mt-5 d-flex justify-content-center">
    <ul class="pagination pagination-danger">
      {{-- Tombol Previous --}}
      @if ($semuaBerita->onFirstPage())
        <li class="page-item disabled">
          <span class="page-link">&laquo; Sebelumnya</span>
        </li>
      @else
        <li class="page-item">
          <a class="page-link" href="{{ $semuaBerita->previousPageUrl() }}" rel="prev">&laquo; Sebelumnya</a>
        </li>
      @endif

      {{-- Nomor Halaman --}}
      @foreach ($semuaBerita->links()->elements[0] ?? [] as $page => $url)
        @if ($page == $semuaBerita->currentPage())
          <li class="page-item active"><span class="page-link">{{ $page }}</span></li>
        @else
          <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
        @endif
      @endforeach

      {{-- Tombol Next --}}
      @if ($semuaBerita->hasMorePages())
        <li class="page-item">
          <a class="page-link" href="{{ $semuaBerita->nextPageUrl() }}" rel="next">Selanjutnya &raquo;</a>
        </li>
      @else
        <li class="page-item disabled">
          <span class="page-link">Selanjutnya &raquo;</span>
        </li>
      @endif
    </ul>
  </nav>
  @endif

  @else
  <p class="text-center text-muted mt-5">Belum ada berita yang dipublikasikan.</p>
  @endif
</div>

<!-- Tambahkan CSS -->
<style>
  body {
    background-color: #f9fafb;
  }

  .card {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
  }

  .hover-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
  }

  /* Warna utama mengikuti navbar (merah) */
  .card-title {
    color: #dc3545;
    transition: color 0.3s ease;
  }

  .card-title:hover {
    color: #a71d2a; /* lebih gelap saat hover */
  }

  .btn-outline-danger {
    border-width: 2px;
    color: #dc3545;
    border-color: #dc3545;
    transition: all 0.3s ease;
  }

  .btn-outline-danger:hover {
    background-color: #dc3545;
    color: #fff;
  }

  .pagination .page-link {
    color: #dc3545;
  }

  .pagination .page-item.active .page-link {
    background-color: #dc3545;
    border-color: #dc3545;
    color: #fff;
  }

  .pagination .page-link:hover {
    background-color: #f8d7da;
    color: #dc3545;
  }

  /* Responsif untuk tampilan HP */
  @media (max-width: 768px) {
    h2 {
      font-size: 1.6rem;
    }

    .card-title {
      font-size: 1.1rem;
    }

    .btn-outline-danger {
      font-size: 0.9rem;
      padding: 6px 14px;
    }
  }
</style>
@endsection
