<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SiswaController;

// Homepage - Direct NIS Input
Route::get('/', function () {
    return view('welcome');
});

Route::post('/cek-kelulusan', [SiswaController::class, 'cekKelulusan'])->name('cek.kelulusan');

// Admin Secret Panel
Route::prefix('admin-panel-secret')->group(function () {
    Route::get('/', [AdminController::class, 'secretLogin'])->name('admin.secret.login');
    Route::post('/login', [AdminController::class, 'secretLoginPost'])->name('admin.secret.login.post');
    
    Route::middleware('admin.secret')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        
        // Excel Import
        Route::get('/import', [AdminController::class, 'importForm'])->name('admin.import');
        Route::post('/import', [AdminController::class, 'importExcel'])->name('admin.import.post');
        Route::get('/template', [AdminController::class, 'downloadTemplate'])->name('admin.template');
        
        // Siswa Management
        Route::get('/siswa', [AdminController::class, 'siswaIndex'])->name('admin.siswa.index');
        Route::get('/siswa/create', [AdminController::class, 'siswaCreate'])->name('admin.siswa.create');
        Route::post('/siswa', [AdminController::class, 'siswaStore'])->name('admin.siswa.store');
        Route::get('/siswa/{id}/edit', [AdminController::class, 'siswaEdit'])->name('admin.siswa.edit');
        Route::put('/siswa/{id}', [AdminController::class, 'siswaUpdate'])->name('admin.siswa.update');
        Route::delete('/siswa/{id}', [AdminController::class, 'siswaDestroy'])->name('admin.siswa.destroy');
        
        // Nilai Management
        Route::get('/siswa/{id}/nilai', [AdminController::class, 'nilaiIndex'])->name('admin.nilai.index');
        Route::post('/siswa/{id}/nilai', [AdminController::class, 'nilaiStore'])->name('admin.nilai.store');
        Route::delete('/nilai/{id}', [AdminController::class, 'nilaiDestroy'])->name('admin.nilai.destroy');
    });
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
