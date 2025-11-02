@extends('admin.layouts.app')

@section('title', 'Statistik Penduduk')

@section('content')
<div class="container py-4">
  @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @endif

  <form method="POST" action="{{ route('admin.statistik.update') }}">
    @csrf
    <div class="row g-3">
      <div class="col-md-6">
        <label class="form-label fw-semibold">Jumlah Penduduk</label>
        <input type="number" name="jumlah_penduduk" class="form-control" value="{{ $statistik->jumlah_penduduk ?? 0 }}">
      </div>

      <div class="col-md-6">
        <label class="form-label fw-semibold">Jumlah Keluarga</label>
        <input type="number" name="jumlah_keluarga" class="form-control" value="{{ $statistik->jumlah_keluarga ?? 0 }}">
      </div>

      <div class="col-md-6">
        <label class="form-label fw-semibold">Laki-laki</label>
        <input type="number" name="jumlah_laki" class="form-control" value="{{ $statistik->jumlah_laki ?? 0 }}">
      </div>

      <div class="col-md-6">
        <label class="form-label fw-semibold">Perempuan</label>
        <input type="number" name="jumlah_perempuan" class="form-control" value="{{ $statistik->jumlah_perempuan ?? 0 }}">
      </div>
    </div>
    <hr>
<h5 class="fw-bold mt-4 mb-3 text-green">Penyebaran Penduduk per Jaga</h5>
<div class="row g-3">
  <div class="col-md-3">
    <label class="form-label">Jaga I</label>
    <input type="number" name="jaga1" class="form-control" value="{{ old('jaga1', $statistik->jaga1 ?? 0) }}">
  </div>
  <div class="col-md-3">
    <label class="form-label">Jaga II</label>
    <input type="number" name="jaga2" class="form-control" value="{{ old('jaga2', $statistik->jaga2 ?? 0) }}">
  </div>
  <div class="col-md-3">
    <label class="form-label">Jaga III</label>
    <input type="number" name="jaga3" class="form-control" value="{{ old('jaga3', $statistik->jaga3 ?? 0) }}">
  </div>
  <div class="col-md-3">
    <label class="form-label">Jaga IV</label>
    <input type="number" name="jaga4" class="form-control" value="{{ old('jaga4', $statistik->jaga4 ?? 0) }}">
  </div>
</div>


    <div class="mt-4">
      <button type="submit" class="btn btn-success">Simpan Perubahan</button>
    </div>
  </form>
</div>
@endsection
