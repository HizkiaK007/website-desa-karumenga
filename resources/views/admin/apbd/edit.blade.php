@extends('admin.layouts.app')

@section('title', 'Edit APBD')

@section('content')
<div class="container py-5">
  <h2 class="text-success mb-4">Edit Data APBDes Tahun {{ $apbd->year }}</h2>

  <form action="{{ route('admin.apbd.update', $apbd->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="row g-3">
      <!-- Tahun -->
      <div class="col-md-3">
        <label class="form-label fw-semibold">Tahun</label>
        <input type="number" name="year" class="form-control"
               value="{{ old('year', $apbd->year) }}" required>
      </div>

      <!-- Dana Desa -->
      <div class="col-md-3">
        <label class="form-label fw-semibold">Dana Desa (Rp)</label>
        <input type="number" name="dana_desa" class="form-control"
               value="{{ old('dana_desa', $apbd->dana_desa ?? 0) }}">
      </div>

      <!-- Alokasi Dana -->
      <div class="col-md-3">
        <label class="form-label fw-semibold">Alokasi Dana (Rp)</label>
        <input type="number" name="alokasi_dana" class="form-control"
               value="{{ old('alokasi_dana', $apbd->alokasi_dana ?? 0) }}">
      </div>

      <!-- Pendapatan Asli Desa -->
      <div class="col-md-3">
        <label class="form-label fw-semibold">Pendapatan Asli Desa (Rp)</label>
        <input type="number" name="pendapatan_asli" class="form-control"
               value="{{ old('pendapatan_asli', $apbd->pendapatan_asli ?? 0) }}">
      </div>

      <!-- ✅ Bagi Hasil Pajak & Retribusi -->
      <div class="col-md-3">
        <label class="form-label fw-semibold">Bagi Hasil Pajak & Retribusi (Rp)</label>
        <input type="number" name="bagi_hasil_pajak" class="form-control"
               value="{{ old('bagi_hasil_pajak', $apbd->bagi_hasil_pajak ?? 0) }}">
      </div>

      <!-- Belanja Pemerintahan -->
      <div class="col-md-3">
        <label class="form-label fw-semibold">Belanja Pemerintahan (Rp)</label>
        <input type="number" name="belanja_pemerintahan" class="form-control"
               value="{{ old('belanja_pemerintahan', $apbd->belanja_pemerintahan ?? 0) }}">
      </div>

      <!-- Belanja Pembangunan -->
      <div class="col-md-3">
        <label class="form-label fw-semibold">Belanja Pembangunan (Rp)</label>
        <input type="number" name="belanja_pembangunan" class="form-control"
               value="{{ old('belanja_pembangunan', $apbd->belanja_pembangunan ?? 0) }}">
      </div>

      <!-- Belanja Pembinaan -->
      <div class="col-md-3">
        <label class="form-label fw-semibold">Belanja Pembinaan (Rp)</label>
        <input type="number" name="belanja_pembinaan" class="form-control"
               value="{{ old('belanja_pembinaan', $apbd->belanja_pembinaan ?? 0) }}">
      </div>

      <!-- Belanja Pemberdayaan -->
      <div class="col-md-3">
        <label class="form-label fw-semibold">Belanja Pemberdayaan (Rp)</label>
        <input type="number" name="belanja_pemberdayaan" class="form-control"
               value="{{ old('belanja_pemberdayaan', $apbd->belanja_pemberdayaan ?? 0) }}">
      </div>

      <!-- ✅ Belanja Penanggulangan -->
      <div class="col-md-3">
        <label class="form-label fw-semibold">Belanja Penanggulangan Bencana, Darurat, Mendesak Desa (Rp)</label>
        <input type="number" name="belanja_penanggulangan" class="form-control"
               value="{{ old('belanja_penanggulangan', $apbd->belanja_penanggulangan ?? 0) }}">
      </div>

      <!-- Upload PDF -->
      <div class="col-md-6">
        @if($apbd->pdf_path)
          <div class="mb-2">
            <a href="{{ Storage::disk('public')->url($apbd->pdf_path) }}" 
               target="_blank" class="text-decoration-none text-danger fw-semibold">
              📄 Lihat file saat ini
            </a>
          </div>
        @endif
        <input type="file" name="pdf" accept="application/pdf" class="form-control">
        <small class="text-muted">Kosongkan jika tidak ingin mengganti file PDF.</small>
      </div>
    </div>

    <div class="mt-4">
      <button class="btn btn-success px-4">
        <i class="bi bi-save"></i> Simpan Perubahan
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
