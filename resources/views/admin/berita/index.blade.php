@extends('admin.layouts.app')

@section('title', 'Kelola Berita')

@section('content')
<div class="container-fluid py-4">

    {{-- ✅ Notifikasi sukses --}}
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
            <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    {{-- ✅ Card utama --}}
    <div class="card border-0 shadow-sm rounded-4">
        <div class="card-body p-4">
            <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap">
                <a href="{{ route('admin.berita.create') }}" class="btn btn-success">
                    <i class="bi bi-plus-circle me-1"></i> Tambah Berita
                </a>
            </div>

            {{-- ✅ Tabel responsif --}}
            <div class="table-responsive">
                <table class="table table-bordered align-middle shadow-sm">
                    <thead class="table-light text-center">
                        <tr>
                            <th width="5%">No</th>
                            <th width="20%">Gambar</th>
                            <th width="35%">Judul</th>
                            <th width="20%">Tanggal</th>
                            <th width="20%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($beritas as $index => $berita)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td class="text-center">
                                    @if ($berita->gambar)
                                        <img src="{{ asset('storage/' . $berita->gambar) }}" 
                                             alt="{{ $berita->judul }}" 
                                             width="90" 
                                             class="rounded shadow-sm">
                                    @else
                                        <em class="text-muted">Tidak ada gambar</em>
                                    @endif
                                </td>
                                <td>{{ $berita->judul }}</td>
                                <td class="text-center">{{ $berita->created_at->format('d M Y') }}</td>
                                <td class="text-center">
                                    <a href="{{ route('admin.berita.edit', $berita->id) }}" 
                                       class="btn btn-sm btn-primary mb-1">
                                        <i class="bi bi-pencil"></i> Edit
                                    </a>
                                    <form action="{{ route('admin.berita.destroy', $berita->id) }}" 
                                          method="POST" class="d-inline delete-form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-sm btn-danger btn-delete">
                                            <i class="bi bi-trash"></i> Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted py-4">
                                    Belum ada berita saat ini.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- ✅ Pagination --}}
            <div class="d-flex justify-content-center mt-3">
                {{ $beritas->onEachSide(1)->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
</div>

{{-- ✅ Style tambahan --}}
<style>
    .table th {
        background-color: #e9f5ec;
        color: #198754;
        font-weight: 600;
        font-size: 0.95rem;
        text-transform: uppercase;
    }

    .table td {
        vertical-align: middle;
        font-size: 0.95rem;
    }

    .table img {
        max-width: 100%;
        height: auto;
        border-radius: 8px;
    }

    .btn {
        border-radius: 8px;
        transition: all 0.2s ease;
    }

    .btn:hover {
        transform: translateY(-2px);
    }

    /* Pagination */
    .pagination {
        gap: 5px;
    }
    .pagination .page-item .page-link {
        border-radius: 50px !important;
        color: #198754;
        border: none;
        font-weight: 600;
        transition: all 0.3s ease;
    }
    .pagination .page-item.active .page-link {
        background-color: #198754;
        color: #fff;
        box-shadow: 0 3px 6px rgba(25, 135, 84, 0.3);
    }
    .pagination .page-item .page-link:hover {
        background-color: #198754;
        color: #fff;
        transform: translateY(-2px);
    }

    /* ✅ Mobile Responsive */
    @media (max-width: 768px) {
        .card-body {
            padding: 1.2rem !important;
        }

        h4 {
            font-size: 1.1rem;
        }

        .table {
            font-size: 0.9rem;
        }

        .btn {
            font-size: 0.85rem;
            padding: 6px 10px;
        }

        .table img {
            width: 70px;
            height: auto;
        }
    }
</style>

{{-- ✅ Script konfirmasi hapus --}}
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const deleteButtons = document.querySelectorAll('.btn-delete');

    deleteButtons.forEach(button => {
        button.addEventListener('click', function (e) {
            e.preventDefault();

            const form = this.closest('form');
            if (!form) return;

            Swal.fire({
                title: 'Yakin ingin menghapus berita ini?',
                text: "Data yang dihapus tidak dapat dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#dc3545',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal',
                background: '#fff',
                color: '#333',
                customClass: {
                    popup: 'rounded-4 shadow-lg',
                    confirmButton: 'px-4 py-2',
                    cancelButton: 'px-4 py-2'
                }
            }).then(result => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: 'Menghapus...',
                        text: 'Mohon tunggu sebentar',
                        icon: 'info',
                        showConfirmButton: false,
                        allowOutsideClick: false,
                        allowEscapeKey: false,
                        didOpen: () => {
                            Swal.showLoading();
                        }
                    });

                    setTimeout(() => {
                        form.submit();
                    }, 700);
                }
            });
        });
    });
});
</script>
@endpush

@endsection
