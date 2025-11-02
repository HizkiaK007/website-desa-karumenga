<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Admin\BeritaController;
use App\Http\Controllers\Admin\StatistikController;
use App\Http\Controllers\Admin\ApbdController;
use App\Http\Controllers\Admin\UserController; // ✅ Tambahkan ini

/*
|--------------------------------------------------------------------------
| Route Admin (Login Wajib)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    // ✅ Kelola Berita
    Route::resource('berita', BeritaController::class)
        ->parameters(['berita' => 'berita']);

    // ✅ Statistik Penduduk
    Route::get('statistik', [StatistikController::class, 'index'])->name('statistik.index');
    Route::post('statistik/update', [StatistikController::class, 'update'])->name('statistik.update');

    // ✅ APBD
    Route::resource('apbd', ApbdController::class)->parameters(['apbd' => 'apbd']);

    // ✅ Kelola Akun Admin
    Route::get('/users', [UserController::class, 'index'])->name('user.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/users', [UserController::class, 'store'])->name('user.store');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('user.destroy');
});

/*
|--------------------------------------------------------------------------
| Route Publik
|--------------------------------------------------------------------------
*/

// ✅ Jika ada yang coba akses /register, arahkan ke halaman login
Route::get('/register', function () {
    return redirect('/login')->with('error', 'Pendaftaran akun hanya dapat dilakukan oleh Admin.');
});

Route::get('/', [PageController::class, 'index'])->name('home');
Route::get('/profil', [PageController::class, 'profil'])->name('profil');
Route::get('/struktur', [PageController::class, 'struktur'])->name('struktur');
Route::get('/kontak', [PageController::class, 'kontak'])->name('kontak');
Route::get('/apbd', [PageController::class, 'apbd'])->name('apbd');
Route::get('/berita', [PageController::class, 'berita'])->name('berita');
Route::get('/statistik', [PageController::class, 'statistik'])->name('statistik');
Route::get('/berita/{id}', [BeritaController::class, 'publikShow'])->name('berita.show');

// ✅ APBD per tahun
Route::get('/apbd/{year}', [ApbdController::class, 'showByYear'])->name('apbd.showByYear');

/*
|--------------------------------------------------------------------------
| Redirect Dashboard
|--------------------------------------------------------------------------
*/
Route::get('/dashboard', function () {
    return redirect('/admin/berita');
})->middleware(['auth'])->name('dashboard');

/*
|--------------------------------------------------------------------------
| Auth Routes (Laravel Breeze)
|--------------------------------------------------------------------------
*/
require __DIR__.'/auth.php';
