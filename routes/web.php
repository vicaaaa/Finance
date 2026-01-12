<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\TabunganController;

Route::get('/', function () {
    return view('welcome');
});

// --- GROUP KHUSUS ADMIN ---
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    
    // Kamu bisa tambah route admin lain di sini, misal:
    // Route::resource('/admin/jenis-pengeluaran', JenisPengeluaranController::class);
});

/// ... (bagian atas biarkan sama sampai group admin)

// --- GROUP KHUSUS USER (DIPERBAIKI) ---
Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/dashboard', function () {
        // Ambil query dasar tabungan user yang sedang login
        $query = \App\Models\Tabungan::where('user_id', auth()->id()); 
        
        // 1. Ambil semua data untuk tabel riwayat
        $tabungans = $query->latest()->get();
        
        // 2. Hitung total nominal untuk kartu saldo
        $totalSaldo = $query->sum('nominal'); 

        // 3. Kirim kedua variabel (tabungans dan totalSaldo) ke view
        return view('dashboard', compact('tabungans', 'totalSaldo'));
    })->name('dashboard');

    Route::post('/tabungan', [TabunganController::class, 'store'])->name('tabungan.store');

    Route::delete('/tabungan/{tabungan}', [TabunganController::class, 'destroy'])->name('tabungan.destroy');
});

// --- ROUTE PROFILE ---
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
