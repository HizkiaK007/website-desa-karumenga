@extends('layouts.app')

@section('title', 'APBDes Tahun ' . $year)

@section('content')
<div class="container py-5" data-aos="fade-up">
  <h2 class="fw-bold text-danger mb-4 text-center">APBDes Tahun {{ $year }}</h2>

  <div class="table-responsive">
    <table class="table table-bordered align-middle">
      <tbody>
        <tr><th width="30%">Tahun</th><td>{{ $apbd->year }}</td></tr>
        <tr><th>Dana Desa</th><td>Rp {{ number_format($apbd->dana_desa, 0, ',', '.') }}</td></tr>
        <tr><th>Alokasi Dana</th><td>Rp {{ number_format($apbd->alokasi_dana, 0, ',', '.') }}</td></tr>
        <tr><th>Pendapatan Asli Desa</th><td>Rp {{ number_format($apbd->pendapatan_asli, 0, ',', '.') }}</td></tr>

        <!-- ✅ Tambahan: Bagi Hasil Pajak & Retribusi -->
        <tr><th>Bagi Hasil Pajak & Retribusi</th><td>Rp {{ number_format($apbd->bagi_hasil_pajak, 0, ',', '.') }}</td></tr>

        <tr><th>Total Pendapatan</th><td><strong>Rp {{ number_format($apbd->total_pendapatan, 0, ',', '.') }}</strong></td></tr>
        <tr><th>Belanja Pemerintahan</th><td>Rp {{ number_format($apbd->belanja_pemerintahan, 0, ',', '.') }}</td></tr>
        <tr><th>Belanja Pembangunan</th><td>Rp {{ number_format($apbd->belanja_pembangunan, 0, ',', '.') }}</td></tr>
        <tr><th>Belanja Pembinaan</th><td>Rp {{ number_format($apbd->belanja_pembinaan, 0, ',', '.') }}</td></tr>
        <tr><th>Belanja Pemberdayaan</th><td>Rp {{ number_format($apbd->belanja_pemberdayaan, 0, ',', '.') }}</td></tr>

        <!-- ✅ Tambahan: Belanja Penanggulangan -->
        <tr><th>Belanja Penanggulangan Bencana, Darurat, Mendesak Desa</th>
            <td>Rp {{ number_format($apbd->belanja_penanggulangan, 0, ',', '.') }}</td></tr>

        <tr><th>Total Belanja</th><td><strong>Rp {{ number_format($apbd->total_belanja, 0, ',', '.') }}</strong></td></tr>
      </tbody>
    </table>
  </div>

  @if($apbd->pdf_path)
    <div class="mt-4 text-center">
      <a href="{{ Storage::url($apbd->pdf_path) }}" class="btn btn-outline-danger" target="_blank">
        <i class="bi bi-file-earmark-pdf"></i> Lihat Laporan PDF
      </a>
    </div>
  @endif
</div>

<hr class="my-5">

<section class="container py-4" data-aos="fade-up">
  <h3 class="text-center fw-bold text-danger mb-4">
    <i class="bi bi-pie-chart-fill me-2"></i> Grafik Penggunaan Dana Desa Tahun {{ $year }}
  </h3>

  <div class="row justify-content-center align-items-stretch g-4">
    <!-- Pie Chart -->
    <div class="col-md-6 col-sm-12">
      <div class="chart-box shadow-sm bg-white p-3 rounded-4 h-100">
        <h5 class="text-center text-danger mb-3 fw-bold">
          <i class="bi bi-pie-chart me-1"></i> Proporsi Belanja Desa
        </h5>
        <div class="chart-container">
          <canvas id="chartBelanja"></canvas>
        </div>
      </div>
    </div>

    <!-- Bar Chart -->
    <div class="col-md-6 col-sm-12">
      <div class="chart-box shadow-sm bg-white p-3 rounded-4 h-100">
        <h5 class="text-center text-danger mb-3 fw-bold">
          <i class="bi bi-bar-chart-line me-1"></i> Pendapatan vs Belanja
        </h5>
        <div class="chart-container">
          <canvas id="chartPendapatan"></canvas>
        </div>
      </div>
    </div>
  </div>

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener("DOMContentLoaded", function() {

  // --- Pie Chart ---
  const ctxBelanja = document.getElementById('chartBelanja').getContext('2d');
  new Chart(ctxBelanja, {
    type: 'pie',
    data: {
      labels: [
        'Belanja Pemerintahan',
        'Belanja Pembangunan',
        'Belanja Pembinaan',
        'Belanja Pemberdayaan',
        'Belanja Penanggulangan Bencana'
      ],
      datasets: [{
        data: [
          {{ $apbd->belanja_pemerintahan ?? 0 }},
          {{ $apbd->belanja_pembangunan ?? 0 }},
          {{ $apbd->belanja_pembinaan ?? 0 }},
          {{ $apbd->belanja_pemberdayaan ?? 0 }},
          {{ $apbd->belanja_penanggulangan ?? 0 }}
        ],
        backgroundColor: ['#dc3545', '#198754', '#0d6efd', '#ffc107', '#6f42c1'],
        borderWidth: 1
      }]
    },
    options: {
      maintainAspectRatio: false,
      responsive: true,
      plugins: {
        legend: { position: 'bottom' },
        tooltip: {
          callbacks: {
            label: function(context) {
              const total = context.dataset.data.reduce((a, b) => a + b, 0);
              const value = context.parsed;
              const percentage = total ? ((value / total) * 100).toFixed(1) : 0;
              return context.label + ': Rp ' + value.toLocaleString('id-ID') + ' (' + percentage + '%)';
            }
          }
        }
      }
    }
  });

  // --- Bar Chart ---
  const ctxPendapatan = document.getElementById('chartPendapatan').getContext('2d');
  new Chart(ctxPendapatan, {
    type: 'bar',
    data: {
      labels: ['Total Pendapatan', 'Total Belanja'],
      datasets: [{
        label: 'Jumlah (Rp)',
        data: [
          {{ $apbd->total_pendapatan ?? 0 }},
          {{ $apbd->total_belanja ?? 0 }}
        ],
        backgroundColor: ['#198754', '#dc3545'],
        borderRadius: 10
      }]
    },
    options: {
      maintainAspectRatio: false,
      responsive: true,
      scales: {
        y: {
          beginAtZero: true,
          ticks: {
            callback: value => 'Rp ' + value.toLocaleString('id-ID')
          }
        }
      },
      plugins: {
        legend: { display: false },
        tooltip: {
          callbacks: {
            label: ctx => 'Rp ' + ctx.parsed.y.toLocaleString('id-ID')
          }
        }
      }
    }
  });
});
</script>

<!-- CSS untuk ukuran chart -->
<style>
.chart-box {
  height: 350px;
  display: flex;
  flex-direction: column;
  justify-content: center;
}

.chart-container {
  height: 350px;
  width: 100%;
}

canvas {
  width: 100% !important;
  height: 100% !important;
}

@media (max-width: 768px) {
  .chart-box {
    height: 300px;
  }
  .chart-container {
    height: 220px;
  }
}
</style>

@endsection
