<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// --- RUTE BAWAAN BREEZE ---
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


// ==========================================
// RUTE UJI COBA TUGAS PRAKTIKUM MIDDLEWARE
// ==========================================

// 1. HANYA ADMIN (Manajemen Pengguna & Halaman Admin)
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin', fn () => 'Halaman Admin');
    Route::get('/dashboard/users', fn () => 'Halaman Manajemen Pengguna'); 
});

// 2. HANYA DOSEN (Dashboard Dosen)
Route::middleware(['auth', 'role:dosen'])->group(function () {
    Route::get('/dosen', fn () => 'Dashboard Dosen');
});

// 3. HANYA MAHASISWA (Dashboard Mahasiswa)
Route::middleware(['auth', 'role:mahasiswa'])->group(function () {
    Route::get('/mahasiswa', fn () => 'Dashboard Mahasiswa');
});

// 4. ADMIN & DOSEN (Kelola Materi & Kelola Nilai)
// Mahasiswa TIDAK BOLEH masuk sini
Route::middleware(['auth', 'role:admin,dosen'])->group(function () {
    Route::get('/kelola-materi', fn () => 'Kelola Materi (Admin & Dosen)');
    Route::get('/nilai', fn () => 'Halaman Kelola Nilai (Admin & Dosen)'); // Dari Tes 4
});

// 5. SEMUA ROLE (Lihat Materi)
// Sesuai tabel materi, Admin, Dosen, dan Mahasiswa boleh melihat materi
Route::middleware(['auth', 'role:admin,dosen,mahasiswa'])->group(function () {
    Route::get('/materi', fn () => 'Halaman Lihat Materi (Semua Role)');
});

// 6. KHUSUS MAHASISWA (Lihat Materi versi Mahasiswa)
Route::middleware(['auth', 'role:mahasiswa'])->group(function () {
    Route::get('/mahasiswa/materi', fn () => 'Halaman Lihat Materi (Mahasiswa)');
});