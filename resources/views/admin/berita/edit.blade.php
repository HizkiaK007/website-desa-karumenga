@extends('admin.layouts.app')

@section('title', 'Edit Berita')

@section('content')
<div class="container mt-4">
    {{-- Notifikasi sukses atau error --}}
    @if (session('success'))
        <div style="background-color: #d1e7dd; color: #0f5132; padding: 10px; border-radius: 5px; margin-bottom: 15px;">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div style="background-color: #f8d7da; color: #842029; padding: 10px; border-radius: 5px; margin-bottom: 15px;">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('admin.berita.update', $berita->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="judul" class="form-label fw-semibold">Judul</label>
                    <input type="text" name="judul" id="judul" class="form-control" 
                           value="{{ old('judul', $berita->judul) }}" required>
                </div>

                <div class="mb-3">
                    <label for="isi" class="form-label fw-semibold">Isi Berita</label>
                    <textarea name="isi" id="isi" rows="7" class="form-control" required>{{ old('isi', $berita->isi) }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="gambar" class="form-label fw-semibold">Gambar (opsional)</label>
                    <input type="file" name="gambar" id="gambar" class="form-control" accept="image/*">

                    @if ($berita->gambar)
                        <div class="mt-3">
                            <p class="mb-1 text-muted">Gambar saat ini:</p>
                            <img src="{{ asset('storage/' . $berita->gambar) }}" 
                                 alt="Gambar Berita" 
                                 width="200" 
                                 class="rounded shadow-sm border">
                        </div>
                    @endif
                </div>

                <div class="d-flex justify-content-end mt-4">
                    <a href="{{ route('admin.berita.index') }}" class="btn btn-secondary me-2">Batal</a>
                    <button type="submit" class="btn btn-success">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
