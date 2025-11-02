@extends('layouts.app')

@section('title', $berita->judul)

@section('content')
<div class="container py-5">
    <a href="{{ route('berita') }}" class="btn btn-outline-success mb-3">&larr; Kembali ke Berita</a>

    <div class="card shadow-sm border-0">
        @if($berita->gambar)
            <img src="{{ asset('storage/'.$berita->gambar) }}" class="card-img-top" alt="gambar" style="max-height: 500px; object-fit: cover;">
        @endif
        <div class="card-body">
            <h2 class="fw-bold text-success">{{ $berita->judul }}</h2>
            <p class="text-muted">{{ $berita->created_at->format('d M Y') }}</p>
            <hr>
            <p style="white-space: pre-line; font-size: 1.1rem;">{{ $berita->isi }}</p>
        </div>
    </div>
</div>
@endsection
