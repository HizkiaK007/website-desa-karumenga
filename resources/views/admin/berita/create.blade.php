@extends('admin.layouts.app')

@section('title', 'Tambah Berita')

@section('content')
<div class="container mt-4">
    <h2 class="mb-3">Tambah Berita</h2>

    {{-- Menampilkan error validasi --}}
    @if ($errors->any())
        <div style="background-color:#f8d7da; color:#842029; padding:10px; border-radius:5px; margin-bottom:10px;">
            <ul style="margin:0; padding-left:20px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Form tambah berita --}}
    <form action="{{ route('admin.berita.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label>Judul</label>
            <input type="text" name="judul" class="form-control" value="{{ old('judul') }}" required>
        </div>

        <div class="mb-3">
            <label>Isi Berita</label>
            <textarea name="isi" class="form-control" rows="5" required>{{ old('isi') }}</textarea>
        </div>

        <div class="mb-3">
            <label>Gambar</label><br>
            <input type="file" name="gambar" id="gambarInput" accept="image/*" class="form-control">
            <div style="margin-top:10px;">
                <img id="previewImage" src="#" alt="Preview Gambar" style="display:none; max-width:300px; border-radius:8px;">
            </div>
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('admin.berita.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>

{{-- Script preview gambar --}}
<script>
    const gambarInput = document.getElementById('gambarInput');
    const previewImage = document.getElementById('previewImage');

    gambarInput.addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file) {
            previewImage.src = URL.createObjectURL(file);
            previewImage.style.display = 'block';
        } else {
            previewImage.style.display = 'none';
        }
    });
</script>
@endsection
