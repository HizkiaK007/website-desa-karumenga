@extends('admin.layouts.app')

@section('title', 'Tambah Admin Baru')

@section('content')
<div class="container">
    <form action="{{ route('admin.user.store') }}" method="POST" class="card p-4 shadow-sm border-0 rounded-4">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label fw-semibold">Nama</label>
            <input type="text" id="name" name="name" class="form-control border-success-subtle" placeholder="Masukkan nama admin" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label fw-semibold">Email</label>
            <input type="email" id="email" name="email" class="form-control border-success-subtle" placeholder="Masukkan email admin" required>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label fw-semibold">Password</label>
            <input type="password" id="password" name="password" class="form-control border-success-subtle" placeholder="Masukkan password" required>
        </div>

        <div class="mb-3">
            <label for="password_confirmation" class="form-label fw-semibold">Konfirmasi Password</label>
            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control border-success-subtle" placeholder="Ulangi password" required>
        </div>

        <div class="text-end">
            <a href="{{ route('admin.user.index') }}" class="btn btn-secondary">Kembali</a>
            <button type="submit" class="btn btn-success fw-bold">Simpan</button>
        </div>
    </form>
</div>
@endsection
