@extends('layouts.app')

@section('title', 'Edit Siswa')

@section('content')
<style>
    .form-container {
        background: white;
        border: 1px solid var(--gray-200);
        border-radius: 12px;
        padding: 40px;
        max-width: 600px;
        margin: 0 auto;
    }
    
    .page-header {
        text-align: center;
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
    
    .form-group {
        margin-bottom: 24px;
    }
    
    .form-label {
        display: block;
        font-size: 14px;
        font-weight: 500;
        color: var(--gray-700);
        margin-bottom: 8px;
    }
    
    .form-control {
        width: 100%;
        padding: 12px 16px;
        border: 1px solid var(--gray-300);
        border-radius: 8px;
        font-size: 16px;
        transition: border-color 0.2s;
        background: white;
    }
    
    .form-control:focus {
        outline: none;
        border-color: var(--gray-900);
        box-shadow: 0 0 0 3px rgba(17, 24, 39, 0.1);
    }
    
    .form-control::placeholder {
        color: var(--gray-400);
    }
    
    .textarea {
        min-height: 120px;
        resize: vertical;
    }
    
    .btn {
        border-radius: 8px;
        padding: 12px 24px;
        font-weight: 500;
        font-size: 16px;
        border: none;
        transition: all 0.2s;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
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
    
    .form-actions {
        display: flex;
        gap: 12px;
        justify-content: center;
        margin-top: 32px;
    }
    
    .alert {
        border-radius: 8px;
        border: none;
        padding: 16px;
        margin-bottom: 24px;
        font-size: 14px;
    }
    
    .alert-danger {
        background: #fef2f2;
        border: 1px solid #fecaca;
        color: #dc2626;
    }
    
    .alert ul {
        margin: 8px 0 0 0;
        padding-left: 20px;
    }
    
    @media (max-width: 768px) {
        .form-container {
            padding: 24px 20px;
            margin: 0 16px;
        }
        
        .form-actions {
            flex-direction: column;
        }
        
        .btn {
            width: 100%;
        }
    }
</style>

<div class="form-container">
    <div class="page-header">
        <h1 class="page-title">Edit Data Siswa</h1>
        <p class="page-subtitle">Perbarui informasi siswa di bawah ini</p>
    </div>

    @if($errors->any())
        <div class="alert alert-danger">
            <strong>Terdapat kesalahan:</strong>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('admin.siswa.update', $siswa->id) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nis" class="form-label">
                Nomor Induk Siswa (NIS)
            </label>
            <input type="text" class="form-control" id="nis" name="nis" 
                   value="{{ old('nis', $siswa->nis) }}" required>
        </div>
        
        <div class="form-group">
            <label for="nama" class="form-label">
                Nama Lengkap Siswa
            </label>
            <input type="text" class="form-control" id="nama" name="nama" 
                   value="{{ old('nama', $siswa->nama) }}" required>
        </div>
        
        <div class="form-group">
            <label for="perilaku" class="form-label">
                Catatan Perilaku
            </label>
            <textarea class="form-control textarea" id="perilaku" name="perilaku" 
                      placeholder="Masukkan catatan perilaku siswa selama di sekolah...">{{ old('perilaku', $siswa->perilaku) }}</textarea>
        </div>
        
        <div class="form-actions">
            <a href="{{ route('admin.siswa.index') }}" class="btn btn-secondary">
                ← Kembali
            </a>
            <button type="submit" class="btn btn-primary">
                Simpan Perubahan
            </button>
        </div>
    </form>
</div>
@endsection