@extends('layouts.app')

@section('title', 'Data Siswa')

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
    
    .students-container {
        background: white;
        border: 1px solid var(--gray-200);
        border-radius: 12px;
        padding: 32px;
    }
    
    .student-card {
        background: var(--gray-50);
        border: 1px solid var(--gray-200);
        border-radius: 12px;
        padding: 24px;
        margin-bottom: 16px;
        transition: all 0.2s;
    }
    
    .student-card:hover {
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        border-color: var(--gray-300);
    }
    
    .student-info {
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 20px;
    }
    
    .student-details {
        flex: 1;
        min-width: 200px;
    }
    
    .student-name {
        font-size: 18px;
        font-weight: 600;
        color: var(--gray-900);
        margin-bottom: 4px;
    }
    
    .student-nis {
        color: var(--gray-600);
        font-size: 14px;
        display: flex;
        align-items: center;
    }
    
    .student-nis i {
        margin-right: 6px;
        color: var(--gray-500);
        font-size: 12px;
    }
    
    .student-stats {
        display: flex;
        gap: 20px;
        align-items: center;
        flex-wrap: wrap;
    }
    
    .stat-item {
        text-align: center;
        min-width: 80px;
    }
    
    .stat-value {
        font-size: 18px;
        font-weight: 600;
        color: var(--gray-900);
    }
    
    .stat-label {
        font-size: 12px;
        color: var(--gray-600);
        margin-top: 2px;
    }
    
    .status-badge {
        padding: 6px 12px;
        border-radius: 16px;
        font-weight: 500;
        font-size: 14px;
        border: 1px solid;
    }
    
    .status-lulus {
        background: #f0fdf4;
        color: #166534;
        border-color: #bbf7d0;
    }
    
    .status-tidak-lulus {
        background: #fef2f2;
        color: #dc2626;
        border-color: #fecaca;
    }
    
    .action-buttons {
        display: flex;
        gap: 8px;
        flex-wrap: wrap;
    }
    
    .btn {
        border-radius: 6px;
        padding: 8px 16px;
        font-weight: 500;
        font-size: 14px;
        border: none;
        transition: all 0.2s;
        text-decoration: none;
        cursor: pointer;
    }
    
    .btn:hover {
        text-decoration: none;
    }
    
    .btn-info {
        background: var(--gray-700);
        color: white;
    }
    
    .btn-info:hover {
        background: var(--gray-600);
        color: white;
    }
    
    .btn-warning {
        background: #f59e0b;
        color: white;
    }
    
    .btn-warning:hover {
        background: #d97706;
        color: white;
    }
    
    .btn-danger {
        background: #ef4444;
        color: white;
    }
    
    .btn-danger:hover {
        background: #dc2626;
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
    }
    
    .btn-primary {
        background: var(--gray-900);
        color: white;
    }
    
    .btn-primary:hover {
        background: var(--gray-800);
        color: white;
    }
    
    .empty-state {
        text-align: center;
        padding: 60px 20px;
        color: var(--gray-600);
    }
    
    .empty-state .icon {
        font-size: 64px;
        color: var(--gray-400);
        margin-bottom: 20px;
    }
    
    .empty-state h4 {
        font-size: 20px;
        font-weight: 600;
        margin-bottom: 8px;
        color: var(--gray-900);
    }
    
    .empty-state p {
        margin-bottom: 24px;
    }
    
    .header-actions {
        display: flex;
        gap: 12px;
        align-items: center;
        justify-content: space-between;
    }
    
    .left-actions {
        display: flex;
        align-items: center;
        gap: 12px;
    }
    
    .right-actions {
        display: flex;
        align-items: center;
        gap: 12px;
    }
    
    .search-form {
        display: flex;
        align-items: center;
        gap: 8px;
    }
    
    .search-input {
        width: 280px;
        padding: 10px 16px;
        border: 1px solid var(--gray-300);
        border-radius: 8px;
        font-size: 14px;
        transition: all 0.2s;
        background: white;
    }
    
    .search-input:focus {
        outline: none;
        border-color: var(--gray-500);
        box-shadow: 0 0 0 3px rgba(0, 0, 0, 0.05);
    }
    
    .search-input::placeholder {
        color: var(--gray-500);
    }
    
    .status-filter {
        padding: 10px 12px;
        border: 1px solid var(--gray-300);
        border-radius: 8px;
        font-size: 14px;
        background: white;
        color: var(--gray-700);
        cursor: pointer;
        transition: all 0.2s;
        min-width: 120px;
    }
    
    .status-filter:focus {
        outline: none;
        border-color: var(--gray-500);
        box-shadow: 0 0 0 3px rgba(0, 0, 0, 0.05);
    }
    
    .btn-search {
        background: var(--gray-100);
        color: var(--gray-700);
        padding: 10px 12px;
        border: 1px solid var(--gray-300);
        border-radius: 8px;
        font-size: 14px;
        cursor: pointer;
        transition: all 0.2s;
        display: flex;
        align-items: center;
        gap: 6px;
    }
    
    .btn-search:hover {
        background: var(--gray-200);
        border-color: var(--gray-400);
    }
    
    .btn-reset {
        background: transparent;
        color: var(--gray-500);
        padding: 10px 12px;
        border: none;
        border-radius: 8px;
        font-size: 14px;
        cursor: pointer;
        transition: all 0.2s;
        text-decoration: none;
    }
    
    .btn-reset:hover {
        background: var(--gray-100);
        color: var(--gray-700);
        text-decoration: none;
    }
    
    .pagination-container {
        margin-top: 40px;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    
    .custom-pagination {
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 14px;
    }
    
    .pagination-info {
        color: var(--gray-600);
        margin-right: 16px;
        font-size: 14px;
    }
    
    .pagination-nav {
        display: flex;
        align-items: center;
        gap: 4px;
    }
    
    .page-btn {
        padding: 8px 12px;
        border: 1px solid var(--gray-300);
        background: white;
        color: var(--gray-700);
        text-decoration: none;
        border-radius: 6px;
        font-size: 14px;
        transition: all 0.2s;
        min-width: 40px;
        text-align: center;
    }
    
    .page-btn:hover {
        background: var(--gray-50);
        text-decoration: none;
        border-color: var(--gray-400);
    }
    
    .page-btn.active {
        background: var(--gray-900);
        color: white;
        border-color: var(--gray-900);
    }
    
    .page-btn.disabled {
        color: var(--gray-400);
        cursor: not-allowed;
        background: var(--gray-50);
    }
    
    .page-btn.disabled:hover {
        background: var(--gray-50);
        border-color: var(--gray-300);
    }
    
    .results-info {
        color: var(--gray-600);
        font-size: 14px;
        margin-bottom: 20px;
        padding: 12px 16px;
        background: var(--gray-50);
        border-radius: 8px;
        border-left: 3px solid var(--gray-400);
    }
    
    @media (max-width: 768px) {
        .student-info {
            flex-direction: column;
            align-items: flex-start;
        }
        
        .student-stats {
            width: 100%;
            justify-content: space-between;
        }
        
        .action-buttons {
            width: 100%;
            justify-content: flex-end;
        }
        
        .header-actions {
            flex-direction: column;
            width: 100%;
            gap: 16px;
        }
        
        .left-actions, .right-actions {
            width: 100%;
            justify-content: center;
        }
        
        .search-form {
            width: 100%;
            flex-wrap: wrap;
            gap: 12px;
        }
        
        .search-input {
            width: 100%;
            flex: 1;
            min-width: 200px;
        }
        
        .status-filter {
            width: 100%;
            min-width: 120px;
        }
        
        .btn {
            width: 100%;
            justify-content: center;
        }
        
        .custom-pagination {
            flex-direction: column;
            gap: 12px;
            text-align: center;
        }
        
        .pagination-nav {
            flex-wrap: wrap;
            justify-content: center;
        }
    }
</style>

<div class="page-header">
    <div class="d-flex justify-content-between align-items-start">
        <div>
            <h1 class="page-title">Data Siswa</h1>
            <p class="page-subtitle">Kelola data siswa dan status kelulusan</p>
        </div>
        <div class="header-actions">
            <div class="left-actions">
                <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">
                    ← Kembali
                </a>
            </div>
            <div class="right-actions">
                <form method="GET" action="{{ route('admin.siswa.index') }}" class="search-form">
                    <input 
                        type="text" 
                        name="search" 
                        class="search-input" 
                        placeholder="Cari nama siswa atau NIS..." 
                        value="{{ request('search') }}"
                    >
                    <button type="submit" class="btn-search">
                        <span>🔍</span>
                    </button>
                    <select name="status" class="status-filter" onchange="this.form.submit()">
                        <option value="">Semua Status</option>
                        <option value="lulus" {{ request('status') == 'lulus' ? 'selected' : '' }}>Lulus</option>
                        <option value="tidak_lulus" {{ request('status') == 'tidak_lulus' ? 'selected' : '' }}>Tidak Lulus</option>
                    </select>
                    @if(request('search') || request('status'))
                        <a href="{{ route('admin.siswa.index') }}" class="btn-reset">
                            ✕
                        </a>
                    @endif
                </form>
                <a href="{{ route('admin.siswa.create') }}" class="btn btn-primary">
                    + Tambah Siswa
                </a>
            </div>
        </div>
    </div>
</div>

<div class="students-container">
    @if(request('search') || request('status'))
        <div class="results-info">
            @php
                $filterText = [];
                if(request('search')) {
                    $filterText[] = 'pencarian "' . request('search') . '"';
                }
                if(request('status')) {
                    $statusText = request('status') == 'lulus' ? 'status Lulus' : 'status Tidak Lulus';
                    $filterText[] = $statusText;
                }
            @endphp
            <strong>{{ $siswa->total() }}</strong> hasil ditemukan untuk {{ implode(' dan ', $filterText) }}
        </div>
    @endif
    
    @forelse($siswa as $s)
        <div class="student-card">
            <div class="student-info">
                <div class="student-details">
                    <div class="student-name">{{ $s->nama }}</div>
                    <div class="student-nis">
                        <i class="fas fa-id-card"></i>
                        NIS: {{ $s->nis }}
                    </div>
                </div>
                
                <div class="student-stats">
                    <div class="stat-item">
                        <div class="stat-value">{{ number_format($s->rata_rata_nilai, 1) }}</div>
                        <div class="stat-label">Rata-rata</div>
                    </div>
                    
                    <div class="stat-item">
                        <span class="status-badge {{ $s->status_kelulusan == 'LULUS' ? 'status-lulus' : 'status-tidak-lulus' }}">
                            {{ $s->status_kelulusan }}
                        </span>
                    </div>
                </div>
                
                <div class="action-buttons">
                    <a href="{{ route('admin.nilai.index', $s->id) }}" class="btn btn-info">
                        📊 Nilai
                    </a>
                    <a href="{{ route('admin.siswa.edit', $s->id) }}" class="btn btn-warning">
                        ✏️ Edit
                    </a>
                    <form action="{{ route('admin.siswa.destroy', $s->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data {{ $s->nama }}?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            🗑️ Hapus
                        </button>
                    </form>
                </div>
            </div>
        </div>
    @empty
        @if(request('search') || request('status'))
            <div class="empty-state">
                <div class="icon">🔍</div>
                <h4>Tidak Ada Hasil</h4>
                @php
                    $filterText = [];
                    if(request('search')) {
                        $filterText[] = 'pencarian "' . request('search') . '"';
                    }
                    if(request('status')) {
                        $statusText = request('status') == 'lulus' ? 'status Lulus' : 'status Tidak Lulus';
                        $filterText[] = $statusText;
                    }
                @endphp
                <p>Tidak ditemukan siswa dengan {{ implode(' dan ', $filterText) }}</p>
                <a href="{{ route('admin.siswa.index') }}" class="btn btn-secondary">
                    ← Lihat Semua Siswa
                </a>
            </div>
        @else
            <div class="empty-state">
                <div class="icon">👥</div>
                <h4>Belum Ada Data Siswa</h4>
                <p>Mulai dengan menambahkan data siswa atau import dari Excel</p>
                <a href="{{ route('admin.siswa.create') }}" class="btn btn-primary">
                    + Tambah Siswa Pertama
                </a>
            </div>
        @endif
    @endforelse
    
    @if($siswa->hasPages())
        <div class="pagination-container">
            <div class="custom-pagination">
                <div class="pagination-info">
                    Menampilkan {{ $siswa->firstItem() }}-{{ $siswa->lastItem() }} dari {{ $siswa->total() }} siswa
                </div>
                <div class="pagination-nav">
                    @if ($siswa->onFirstPage())
                        <span class="page-btn disabled">‹</span>
                    @else
                        <a href="{{ $siswa->previousPageUrl() }}" class="page-btn">‹</a>
                    @endif

                    @foreach ($siswa->getUrlRange(1, $siswa->lastPage()) as $page => $url)
                        @if ($page == $siswa->currentPage())
                            <span class="page-btn active">{{ $page }}</span>
                        @else
                            <a href="{{ $url }}" class="page-btn">{{ $page }}</a>
                        @endif
                    @endforeach

                    @if ($siswa->hasMorePages())
                        <a href="{{ $siswa->nextPageUrl() }}" class="page-btn">›</a>
                    @else
                        <span class="page-btn disabled">›</span>
                    @endif
                </div>
            </div>
        </div>
    @endif
</div>
@endsection