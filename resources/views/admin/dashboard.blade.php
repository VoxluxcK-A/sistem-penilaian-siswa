@extends('layouts.app')

@section('title', 'Dashboard Admin')

@section('content')
<style>
    .page-header {
        margin-bottom: 40px;
    }
    
    .page-title {
        font-size: 28px;
        font-weight: 600;
        color: var(--gray-900);
        margin-bottom: 8px;
    }
    
    .page-subtitle {
        color: var(--gray-600);
        font-size: 16px;
    }
    
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 20px;
        margin-bottom: 40px;
    }
    
    .stat-card {
        background: white;
        border: 1px solid var(--gray-200);
        border-radius: 8px;
        padding: 24px;
    }
    
    .stat-number {
        font-size: 32px;
        font-weight: 700;
        color: var(--gray-900);
        margin-bottom: 4px;
    }
    
    .stat-label {
        color: var(--gray-600);
        font-size: 14px;
    }
    
    .menu-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 20px;
        margin-bottom: 40px;
    }
    
    .menu-card {
        background: white;
        border: 1px solid var(--gray-200);
        border-radius: 8px;
        padding: 24px;
        text-decoration: none;
        color: inherit;
        transition: all 0.2s;
    }
    
    .menu-card:hover {
        border-color: var(--gray-300);
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        text-decoration: none;
        color: inherit;
    }
    
    .menu-title {
        font-size: 18px;
        font-weight: 600;
        color: var(--gray-900);
        margin-bottom: 8px;
    }
    
    .menu-description {
        color: var(--gray-600);
        font-size: 14px;
        line-height: 1.5;
    }
    
    .info-card {
        background: white;
        border: 1px solid var(--gray-200);
        border-radius: 8px;
        padding: 24px;
    }
    
    .info-title {
        font-size: 18px;
        font-weight: 600;
        color: var(--gray-900);
        margin-bottom: 12px;
    }
    
    .info-text {
        color: var(--gray-600);
        font-size: 14px;
        line-height: 1.6;
    }
    
    .alert-warning {
        background: #fffbeb;
        border: 1px solid #fed7aa;
        color: #92400e;
        padding: 16px;
        border-radius: 8px;
        margin-bottom: 24px;
        font-size: 14px;
    }
    
    .alert-warning h6 {
        font-weight: 600;
        margin-bottom: 8px;
    }
    
    .alert-warning ul {
        margin: 0;
        padding-left: 20px;
    }
</style>

<div class="page-header">
    <h1 class="page-title">Dashboard Admin</h1>
    <p class="page-subtitle">Kelola sistem kelulusan siswa</p>
</div>

@if(session('import_errors'))
    <div class="alert-warning">
        <h6>Peringatan Import:</h6>
        <ul>
            @foreach(session('import_errors') as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="stats-grid">
    <div class="stat-card">
        <div class="stat-number">{{ $totalSiswa }}</div>
        <div class="stat-label">Total Siswa</div>
    </div>
    
    <div class="stat-card">
        <div class="stat-number">{{ $siswaLulus }}</div>
        <div class="stat-label">Siswa Lulus</div>
    </div>
</div>

<div class="menu-grid">
    <a href="{{ route('admin.import') }}" class="menu-card">
        <h3 class="menu-title">Import Excel</h3>
        <p class="menu-description">
            Upload file Excel untuk import data siswa secara massal
        </p>
    </a>
    
    <a href="{{ route('admin.siswa.index') }}" class="menu-card">
        <h3 class="menu-title">Kelola Siswa</h3>
        <p class="menu-description">
            Tambah, edit, hapus data siswa dan kelola nilai per mata pelajaran
        </p>
    </a>
    
    <a href="{{ route('admin.template') }}" class="menu-card">
        <h3 class="menu-title">Download Template</h3>
        <p class="menu-description">
            Unduh template Excel kosong untuk memudahkan input data siswa
        </p>
    </a>
</div>

<div class="info-card">
    <h4 class="info-title">Informasi Sistem</h4>
    <p class="info-text">
        Sistem ini mendukung import massal melalui file Excel dengan validasi otomatis. 
        Kriteria kelulusan berdasarkan rata-rata nilai ≥ 79. 
        Siswa dapat mengecek kelulusan melalui homepage dengan memasukkan NIS.
    </p>
</div>
@endsection