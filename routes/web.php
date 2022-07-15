<?php

use App\Http\Controllers\AgamaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DusunController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KelahiranController;
use App\Http\Controllers\KematianController;
use App\Http\Controllers\PekerjaanController;
use App\Http\Controllers\PendatangController;
use App\Http\Controllers\PendidikanController;
use App\Http\Controllers\PendudukController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\PindahController;
use App\Http\Controllers\ProfilGampongController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// home
Route::get('/', HomeController::class)->name('home');

// login
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.action');

// pengaduan
Route::get('/pengaduan/create', [PengaduanController::class, 'create'])->name('pengaduan.create');
Route::post('/pengaduan', [PengaduanController::class, 'store'])->name('pengaduan.store');

Route::middleware(['auth'])->group(function () {

    // auth
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/ganti-password', [AuthController::class, 'changePassword'])->name('change-password');
    Route::post('/ganti-password', [AuthController::class, 'updatePassword'])->name('update-password');

    // dashboard
    Route::get('/dashboard', DashboardController::class)->name('dashboard');

    // pengaduan
    Route::get('/pengaduan', [PengaduanController::class, 'index'])->name('pengaduan.index');
    Route::get('/pengaduan/{pengaduan}', [PengaduanController::class, 'show'])->name('pengaduan.show');
    Route::post('/pengaduan/{pengaduan}', [PengaduanController::class, 'tanggapi'])->name('pengaduan.tanggapi');
    Route::delete('/pengaduan/{pengaduan}', [PengaduanController::class, 'destroy'])->name('pengaduan.destroy');
    Route::post('/pengaduan/send-message/{pengaduan}', [PengaduanController::class, 'beritahukan'])->name('pengaduan.beritahukan');

    // penduduk
    Route::resource('penduduk', PendudukController::class);

    // kelahiran
    Route::resource('kelahiran', KelahiranController::class);

    // pendatang
    Route::resource('pendatang', PendatangController::class);

    // pindah
    Route::resource('pindah', PindahController::class);

    // kematian
    Route::resource('kematian', KematianController::class);

    // prefix admin
    Route::prefix('admin')->middleware('can:isAdmin')->group(function () {

        // profil gampong
        Route::get('/profil-gampong', [ProfilGampongController::class, 'index'])->name('profil-gampong.index');
        Route::put('/profil-gampong/{id}', [ProfilGampongController::class, 'update'])->name('profil-gampong.update');

        // user
        Route::resource('user', UserController::class);

        // agama
        Route::resource('agama', AgamaController::class);

        // pendidikan
        Route::resource('pendidikan', PendidikanController::class);

        // pekerjaan
        Route::resource('pekerjaan', PekerjaanController::class);

        // dusun
        Route::resource('dusun', DusunController::class);
    });
});
