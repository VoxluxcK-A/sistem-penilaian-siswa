@extends('layouts.app')

@section('title', 'Kelola Nilai')

@section('content')
<style>
    .page-header {
        margin-bottom: 32px;
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
        margin-bottom: 32px;
    }
    
    .stat-card {
        background: white;
        border: 1px solid var(--gray-200);
        border-radius: 12px;
        padding: 24px;
        text-align: center;
    }
    
    .stat-card.info {
        border-left: 4px solid #3b82f6;
        background: #f0f9ff;
    }
    
    .stat-card.success {
        border-left: 4px solid #10b981;
        background: #f0fdf4;
    }
    
    .stat-card.danger {
        border-left: 4px solid #ef4444;
        background: #fef2f2;
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
        font-weight: 500;
    }
    
    .card {
        background: white;
        border: 1px solid var(--gray-200);
        border-radius: 12px;
        padding: 24px;
        margin-bottom: 24px;
    }
    
    .card-header {
        font-size: 18px;
        font-weight: 600;
        color: var(--gray-900);
        margin-bottom: 20px;
        padding-bottom: 12px;
        border-bottom: 1px solid var(--gray-200);
    }
    
    .form-row {
        display: grid;
        grid-template-columns: 2fr 1fr auto;
        gap: 16px;
        align-items: end;
    }
    
    .form-group {
        margin-bottom: 16px;
    }
    
    .form-label {
        display: block;
        font-size: 14px;
        font-weight: 500;
        color: var(--gray-700);
        margin-bottom: 6px;
    }
    
    .form-control {
        width: 100%;
        padding: 10px 12px;
        border: 1px solid var(--gray-300);
        border-radius: 6px;
        font-size: 14px;
        transition: border-color 0.2s;
    }
    
    .form-control:focus {
        outline: none;
        border-color: var(--gray-900);
        box-shadow: 0 0 0 3px rgba(17, 24, 39, 0.1);
    }
    
    .btn {
        border-radius: 6px;
        padding: 10px 16px;
        font-weight: 500;
        font-size: 14px;
        border: none;
        transition: all 0.2s;
        cursor: pointer;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        justify-content: center;
    }
    
    .btn-primary {
        background: var(--gray-900);
        color: white;
    }
    
    .btn-primary:hover {
        background: var(--gray-800);
        color: white;
    }
    
    .btn-secondary {
        background: white;
        color: var(--gray-700);
        border: 1px solid var(--gray-300);
    }
    
    .btn-secondary:hover {
        background: var(--gray-100);
        color: var(--gray-800);
        text-decoration: none;
    }
    
    .btn-danger {
        background: #ef4444;
        color: white;
        font-size: 12px;
        padding: 6px 12px;
    }
    
    .btn-danger:hover {
        background: #dc2626;
        color: white;
    }
    
    .table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 16px;
    }
    
    .table th {
        background: var(--gray-100);
        color: var(--gray-900);
        font-weight: 600;
        padding: 12px;
        text-align: left;
        border-bottom: 1px solid var(--gray-200);
        font-size: 14px;
    }
    
    .table td {
        padding: 12px;
        border-bottom: 1px solid var(--gray-200);
        font-size: 14px;
    }
    
    .table tbody tr:hover {
        background: var(--gray-50);
    }
    
    .badge {
        display: inline-block;
        padding: 4px 8px;
        border-radius: 12px;
        font-size: 12px;
        font-weight: 500;
    }
    
    .badge-primary {
        background: #dbeafe;
        color: #1e40af;
    }
    
    .empty-state {
        text-align: center;
        padding: 40px 20px;
        color: var(--gray-500);
    }
    
    .empty-state .icon {
        font-size: 48px;
        margin-bottom: 16px;
        opacity: 0.5;
    }
    
    .back-button {
        margin-top: 20px;
    }
    
    @media (max-width: 768px) {
        .form-row {
            grid-template-columns: 1fr;
            gap: 12px;
        }
        
        .stats-grid {
            grid-template-columns: 1fr;
        }
        
        .table {
            font-size: 12px;
        }
        
        .table th,
        .table td {
            padding: 8px;
        }
    }
</style>

<div class="page-header">
    <h1 class="page-title">Kelola Nilai</h1>
    <p class="page-subtitle">{{ $siswa->nama }} - NIS: {{ $siswa->nis }}</p>
</div>

<div class="stats-grid">
    <div class="stat-card info">
        <div class="stat-number">{{ number_format($siswa->rata_rata_nilai, 2) }}</div>
        <div class="stat-label">Rata-rata Nilai</div>
    </div>
    
    <div class="stat-card {{ $siswa->status_kelulusan == 'LULUS' ? 'success' : 'danger' }}">
        <div class="stat-number">{{ $siswa->status_kelulusan }}</div>
        <div class="stat-label">Status Kelulusan</div>
    </div>
</div>

<div class="card">
    <div class="card-header">Tambah Nilai Baru</div>
    
    <form method="POST" action="{{ route('admin.nilai.store', $siswa->id) }}">
        @csrf
        <div class="form-row">
            <div class="form-group">
                <label for="mata_pelajaran" class="form-label">Mata Pelajaran</label>
                <input type="text" class="form-control" id="mata_pelajaran" name="mata_pelajaran" 
                       placeholder="Contoh: Matematika, Bahasa Indonesia..." required>
            </div>
            
            <div class="form-group">
                <label for="nilai" class="form-label">Nilai (0-100)</label>
                <input type="number" class="form-control" id="nilai" name="nilai" 
                       min="0" max="100" step="0.01" placeholder="85.5" required>
            </div>
            
            <div class="form-group">
                <button type="submit" class="btn btn-primary">
                    + Tambah
                </button>
            </div>
        </div>
    </form>
</div>

<div class="card">
    <div class="card-header">Daftar Nilai Siswa</div>
    
    @if($siswa->nilai->count() > 0)
        <table class="table">
            <thead>
                <tr>
                    <th>Mata Pelajaran</th>
                    <th>Nilai</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($siswa->nilai as $nilai)
                <tr>
                    <td>{{ $nilai->mata_pelajaran }}</td>
                    <td><span class="badge badge-primary">{{ $nilai->nilai }}</span></td>
                    <td>
                        <form action="{{ route('admin.nilai.destroy', $nilai->id) }}" method="POST" class="d-inline" 
                              onsubmit="return confirm('Yakin ingin menghapus nilai {{ $nilai->mata_pelajaran }}?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                🗑️ Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div class="empty-state">
            <div class="icon">📝</div>
            <h4>Belum ada nilai yang diinputkan</h4>
            <p>Tambahkan nilai mata pelajaran menggunakan form di atas</p>
        </div>
    @endif
    
    <div class="back-button">
        <a href="{{ route('admin.siswa.index') }}" class="btn btn-secondary">
            ← Kembali ke Daftar Siswa
        </a>
        @if($siswa->nilai->count() > 0)
            <span style="color: var(--gray-500); margin-left: 16px; font-size: 14px;">
                Total {{ $siswa->nilai->count() }} mata pelajaran
            </span>
        @endif
    </div>
</div>
@endsection