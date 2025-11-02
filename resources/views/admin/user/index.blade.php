@extends('admin.layouts.app')

@section('title', 'Kelola Akun Admin')

@section('content')
<div class="container-fluid py-4">

    {{-- ✅ Notifikasi sukses / error --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
            <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @elseif(session('error'))
        <div class="alert alert-danger alert-dismissible fade show shadow-sm" role="alert">
            <i class="bi bi-exclamation-circle-fill me-2"></i> {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    {{-- ✅ Card utama --}}
    <div class="card border-0 shadow-sm rounded-4">
        <div class="card-body p-4">

            {{-- Header --}}
            <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap">
                <a href="{{ route('admin.user.create') }}" class="btn btn-success">
                    <i class="bi bi-person-plus me-1"></i> Tambah Admin
                </a>
            </div>

            {{-- ✅ Tabel Responsif --}}
            <div class="table-responsive">
                <table class="table table-bordered align-middle shadow-sm">
                    <thead class="table-light text-center">
                        <tr>
                            <th width="5%">No</th>
                            <th width="25%">Nama</th>
                            <th width="25%">Email</th>
                            <th width="20%">Tanggal Dibuat</th>
                            <th width="25%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($admins as $admin)
                            <tr class="text-center">
                                <td>{{ $loop->iteration }}</td>
                                <td class="text-start">{{ $admin->name }}</td>
                                <td>{{ $admin->email }}</td>
                                <td>{{ $admin->created_at->format('d M Y') }}</td>
                                <td>
                                    @if($admin->id !== Auth::id())
                                        <form action="{{ route('admin.user.destroy', $admin) }}" 
                                              method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-sm btn-danger btn-delete">
                                                <i class="bi bi-trash"></i> Hapus
                                            </button>
                                        </form>
                                    @else
                                        <span class="text-muted small">Tidak bisa dihapus</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted py-4">
                                    Belum ada admin saat ini.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>

{{-- ✅ Style tambahan agar konsisten --}}
<style>
    .table th {
        background-color: #e9f5ec;
        color: #198754;
        font-weight: 600;
        text-transform: uppercase;
        font-size: 0.95rem;
    }

    .table td {
        vertical-align: middle;
        font-size: 0.95rem;
    }

    .btn {
        border-radius: 8px;
        transition: all 0.2s ease;
    }

    .btn:hover {
        transform: translateY(-2px);
    }

    .btn-success {
        background-color: #198754;
        border: none;
    }

    .btn-success:hover {
        background-color: #157347;
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
    }
</style>

{{-- ✅ Konfirmasi Hapus --}}
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.btn-delete').forEach(button => {
        button.addEventListener('click', function (e) {
            e.preventDefault();
            const form = this.closest('form');

            Swal.fire({
                title: 'Yakin ingin menghapus admin ini?',
                text: "Data admin yang dihapus tidak dapat dikembalikan!",
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
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });
});
</script>
@endpush
@endsection
