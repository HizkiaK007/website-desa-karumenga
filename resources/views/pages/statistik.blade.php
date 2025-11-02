@extends('layouts.app')

@section('title', 'Statistik Penduduk Desa Karumenga')

@section('content')
<div class="container py-5" data-aos="fade-up">
  <h2 class="text-center mb-4 fw-bold text-danger">
    <i class="bi bi-bar-chart-line"></i> Statistik Penduduk Desa Karumenga
  </h2>

  @if ($statistik)
  <!-- Kartu Statistik -->
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

  <!-- Grafik -->
  <div class="row g-4 justify-content-center align-items-stretch">
    <div class="col-md-5 col-sm-12 d-flex">
      <div class="card shadow-sm border-0 flex-fill">
        <div class="card-body text-center">
          <h5 class="fw-bold text-danger mb-3">
            <i class="bi bi-pie-chart-fill"></i> Laki-laki vs Perempuan
          </h5>
          <div class="chart-container">
            <canvas id="genderChart"></canvas>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-5 col-sm-12 d-flex">
      <div class="card shadow-sm border-0 flex-fill">
        <div class="card-body text-center">
          <h5 class="fw-bold text-danger mb-3">
            <i class="bi bi-graph-up-arrow"></i> Penduduk & Keluarga
          </h5>
          <div class="chart-container">
            <canvas id="populationChart"></canvas>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Grafik Penyebaran Penduduk -->
<section id="penyebaran" class="container py-5" data-aos="fade-up">
  <h2 class="text-center fw-bold text-danger mb-4">
    <i class="bi bi-geo-alt-fill me-2"></i> Penyebaran Penduduk per Jaga
  </h2>

  <div class="row justify-content-center">
    <div class="col-md-8">
      <canvas id="chartPenyebaran"></canvas>
    </div>
  </div>
</section>
  

  @else
    <p class="text-center text-muted mt-4">Belum ada data statistik penduduk.</p>
  @endif
</div>

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  const genderCtx = document.getElementById('genderChart');
  const populationCtx = document.getElementById('populationChart');

  const dataLaki = {{ $statistik->jumlah_laki ?? 0 }};
  const dataPerempuan = {{ $statistik->jumlah_perempuan ?? 0 }};
  const dataPenduduk = {{ $statistik->jumlah_penduduk ?? 0 }};
  const dataKeluarga = {{ $statistik->jumlah_keluarga ?? 0 }};

  // Pie Chart
  new Chart(genderCtx, {
    type: 'pie',
    data: {
      labels: ['Laki-laki', 'Perempuan'],
      datasets: [{
        data: [dataLaki, dataPerempuan],
        backgroundColor: ['#007bff', '#e83e8c'],
        hoverOffset: 6
      }]
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      plugins: {
        legend: {
          position: 'bottom'
        }
      }
    }
  });

  // Bar Chart
  new Chart(populationCtx, {
    type: 'bar',
    data: {
      labels: ['Penduduk', 'Keluarga'],
      datasets: [{
        label: 'Jumlah',
        data: [dataPenduduk, dataKeluarga],
        backgroundColor: ['#dc3545', '#198754'],
        borderRadius: 6
      }]
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      scales: {
        y: {
          beginAtZero: true
        }
      },
      plugins: {
        legend: { display: false }
      }
    }
  });
</script>

<!-- Tambahkan Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const ctx = document.getElementById('chartPenyebaran').getContext('2d');
new Chart(ctx, {
  type: 'bar',
  data: {
    labels: ['Jaga I', 'Jaga II', 'Jaga III', 'Jaga IV'],
    datasets: [{
      label: 'Jumlah Penduduk',
      data: [
        {{ $statistik->jaga1 ?? 0 }},
        {{ $statistik->jaga2 ?? 0 }},
        {{ $statistik->jaga3 ?? 0 }},
        {{ $statistik->jaga4 ?? 0 }}
      ],
      backgroundColor: '#dc3545',
      borderColor: '#dc3545',
      borderWidth: 1,
      borderRadius: 8
    }]
  },
  options: {
    responsive: true,
    plugins: {
      legend: { display: false },
      tooltip: { enabled: true }
    },
    scales: {
      y: {
        beginAtZero: true,
        ticks: { stepSize: 10 }
      }
    }
  }
});
</script>

<style>
  .text-pink { color: #e83e8c; }

  /* ✅ Samakan ukuran kedua grafik */
  .chart-container {
    position: relative;
    height: 350px;
    width: 100%;
  }

  @media (max-width: 768px) {
    .chart-container {
      height: 300px;
    }
  }
</style>
@endsection
