@extends('admin.layouts.app')

@section('title', 'Tambah APBD')

@section('content')
<div class="container py-5">
  <form action="{{ route('admin.apbd.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="row g-3">
      <!-- Tahun -->
      <div class="col-md-3">
        <label class="form-label fw-semibold">Tahun</label>
        <input type="number" name="year" class="form-control" value="{{ old('year') }}" required>
      </div>

      <!-- Dana Desa -->
      <div class="col-md-3">
        <label class="form-label fw-semibold">Dana Desa (Rp)</label>
        <input type="number" name="dana_desa" class="form-control" value="{{ old('dana_desa',0) }}">
      </div>

      <!-- Alokasi Dana -->
      <div class="col-md-3">
        <label class="form-label fw-semibold">Alokasi Dana (Rp)</label>
        <input type="number" name="alokasi_dana" class="form-control" value="{{ old('alokasi_dana',0) }}">
      </div>

      <!-- Pendapatan Asli Desa -->
      <div class="col-md-3">
        <label class="form-label fw-semibold">Pendapatan Asli Desa (Rp)</label>
        <input type="number" name="pendapatan_asli" class="form-control" value="{{ old('pendapatan_asli',0) }}">
      </div>

      <!-- ✅ Bagi Hasil Pajak & Retribusi -->
      <div class="col-md-3">
        <label class="form-label fw-semibold">Bagi Hasil Pajak & Retribusi (Rp)</label>
        <input type="number" name="bagi_hasil_pajak" class="form-control" value="{{ old('bagi_hasil_pajak',0) }}">
      </div>

      <!-- Belanja Pemerintahan -->
      <div class="col-md-3">
        <label class="form-label fw-semibold">Belanja Pemerintahan (Rp)</label>
        <input type="number" name="belanja_pemerintahan" class="form-control" value="{{ old('belanja_pemerintahan',0) }}">
      </div>

      <!-- Belanja Pembangunan -->
      <div class="col-md-3">
        <label class="form-label fw-semibold">Belanja Pembangunan (Rp)</label>
        <input type="number" name="belanja_pembangunan" class="form-control" value="{{ old('belanja_pembangunan',0) }}">
      </div>

      <!-- Belanja Pembinaan -->
      <div class="col-md-3">
        <label class="form-label fw-semibold">Belanja Pembinaan (Rp)</label>
        <input type="number" name="belanja_pembinaan" class="form-control" value="{{ old('belanja_pembinaan',0) }}">
      </div>

      <!-- Belanja Pemberdayaan -->
      <div class="col-md-3">
        <label class="form-label fw-semibold">Belanja Pemberdayaan (Rp)</label>
        <input type="number" name="belanja_pemberdayaan" class="form-control" value="{{ old('belanja_pemberdayaan',0) }}">
      </div>

      <!-- ✅ Belanja Penanggulangan -->
      <div class="col-md-3">
        <label class="form-label fw-semibold">Belanja Penanggulangan Bencana, Darurat, Mendesak Desa (Rp)</label>
        <input type="number" name="belanja_penanggulangan" class="form-control" value="{{ old('belanja_penanggulangan',0) }}">
      </div>

      <!-- Upload PDF -->
      <div class="col-md-6">
        <label class="form-label fw-semibold">Upload Laporan (PDF)</label>
        <input type="file" name="pdf" accept="application/pdf" class="form-control">
      </div>
    </div>

    <div class="mt-4">
      <button class="btn btn-success px-4">
        <i class="bi bi-save"></i> Simpan
      </button>
      <a href="{{ route('admin.apbd.index') }}" class="btn btn-secondary px-4">
        <i class="bi bi-arrow-left"></i> Batal
      </a>
    </div>
  </form>
</div>

<style>
  .btn-success {
    background-color: #198754;
    border: none;
  }
  .btn-success:hover {
    background-color: #157347;
  }
</style>
@endsection
