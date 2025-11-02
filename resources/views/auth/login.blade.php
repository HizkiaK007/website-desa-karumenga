<x-guest-layout>
    <div class="min-vh-100 d-flex justify-content-center align-items-center bg-gradient-red py-4 px-3">
        <div class="card login-card shadow-lg p-4 text-center w-100" style="max-width: 500px;">

            <!-- Logo dan Judul -->
            <div class="mb-3">
                <img src="{{ asset('images/logo.png') }}" alt="Logo Minahasa" width="100" height="120" class="mb-3">
                <h4 class="fw-bold text-danger mb-0">Desa Karumenga</h4>
                <p class="text-muted small mb-2">Kecamatan Langowan Utara, Kabupaten Minahasa</p>
                <hr class="border-danger opacity-50">
                <h5 class="fw-semibold text-dark mt-2">Login Admin</h5>
            </div>

            <!-- Alert jika gagal -->
            @if (session('error'))
                <div class="alert alert-danger text-center py-2 rounded-3">
                    {{ session('error') }}
                </div>
            @endif

            <!-- Form Login -->
            <form method="POST" action="{{ route('login') }}" class="text-start mt-3">
                @csrf

                <!-- Email -->
                <div class="mb-3">
                    <label for="email" class="form-label fw-semibold text-dark">Email</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                        class="form-control border-2 border-danger-subtle focus-ring focus-ring-danger shadow-sm"
                        placeholder="Masukkan email anda">
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-danger small" />
                </div>

                <!-- Password -->
                <div class="mb-3">
                    <label for="password" class="form-label fw-semibold text-dark">Password</label>
                    <input id="password" type="password" name="password" required
                        class="form-control border-2 border-danger-subtle focus-ring focus-ring-danger shadow-sm"
                        placeholder="Masukkan password">
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-danger small" />
                </div>

                <!-- Tombol Login -->
                <button type="submit" class="btn btn-danger w-100 fw-bold py-3 shadow-sm mt-2 fs-5">
                    <i class="bi bi-box-arrow-in-right me-1"></i> MASUK
                </button>
            </form>

            <!-- Footer -->
            <div class="text-center mt-4 small text-muted">
                &copy; {{ date('Y') }} Pemerintah Desa Karumenga<br>
                <span class="text-danger fw-semibold">Kecamatan Langowan Utara</span>
            </div>
        </div>
    </div>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom Styles -->
    <style>
        /* Background gradasi merah */
        .bg-gradient-red {
            background: linear-gradient(180deg, #dc3545, #8b0000);
            min-height: 100vh;
            overflow: hidden;
        }

        /* Card Login */
        .login-card {
            border-radius: 20px;
            background-color: #fff;
            transition: all 0.3s ease;
        }

        /* Input focus efek */
        .form-control:focus {
            border-color: #dc3545;
            box-shadow: 0 0 10px rgba(220, 53, 69, 0.35);
        }

        /* Tombol animasi */
        .btn-danger:hover {
            background-color: #b30000;
            transform: scale(1.03);
        }

        /* ====== Responsif ====== */
        @media (max-width: 768px) {
            .login-card {
                max-width: 100%;
                padding: 2rem 1.5rem !important;
                border-radius: 15px;
            }

            .login-card h4 {
                font-size: 1.4rem;
            }

            .login-card h5 {
                font-size: 1.1rem;
            }

            .login-card input {
                font-size: 1rem;
                padding: 12px;
            }

            .btn-danger {
                font-size: 1.05rem;
                padding: 12px;
            }

            img {
                width: 90px;
                height: auto;
            }
        }

        @media (max-width: 480px) {
            .login-card {
                padding: 1.8rem 1.2rem !important;
            }

            .login-card h4 {
                font-size: 1.2rem;
            }

            .login-card h5 {
                font-size: 1rem;
            }

            img {
                width: 75px;
                height: auto;
            }

            .btn-danger {
                font-size: 1rem;
                padding: 10px;
            }
        }

        /* Agar tetap proporsional pada layar kecil */
        @media (max-height: 600px) {
            .min-vh-100 {
                height: auto !important;
                padding: 20px 0;
            }
        }
    </style>
</x-guest-layout>
