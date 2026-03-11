@extends('layouts.app')

@section('title', 'Import Excel')

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
    
    .upload-card {
        background: white;
        border: 1px solid var(--gray-200);
        border-radius: 12px;
        padding: 32px;
        margin-bottom: 24px;
    }
    
    .info-card {
        background: white;
        border: 1px solid var(--gray-200);
        border-radius: 12px;
        padding: 24px;
    }
    
    .file-upload-area {
        border: 2px dashed var(--gray-300);
        border-radius: 12px;
        padding: 40px;
        text-align: center;
        background: var(--gray-50);
        transition: all 0.2s;
        margin-bottom: 24px;
    }
    
    .file-upload-area:hover {
        background: var(--gray-100);
        border-color: var(--gray-400);
    }
    
    .file-upload-icon {
        font-size: 48px;
        color: var(--gray-400);
        margin-bottom: 16px;
    }
    
    .form-control {
        border: 1px solid var(--gray-300);
        border-radius: 8px;
        padding: 12px 16px;
        font-size: 16px;
        transition: border-color 0.2s;
        background: white;
    }
    
    .form-control:focus {
        border-color: var(--gray-900);
        box-shadow: 0 0 0 3px rgba(17, 24, 39, 0.1);
        outline: none;
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
    }
    
    .btn-info {
        background: var(--gray-700);
        color: white;
    }
    
    .btn-info:hover {
        background: var(--gray-600);
        color: white;
    }
    
    .format-table {
        background: var(--gray-50);
        border-radius: 8px;
        overflow: hidden;
        margin: 16px 0;
        border: 1px solid var(--gray-200);
    }
    
    .format-table table {
        margin: 0;
        width: 100%;
    }
    
    .format-table th {
        background: var(--gray-100);
        color: var(--gray-900);
        font-weight: 600;
        padding: 12px;
        border: none;
        font-size: 14px;
    }
    
    .format-table td {
        padding: 12px;
        border: none;
        border-bottom: 1px solid var(--gray-200);
        font-size: 14px;
    }
    
    .format-table tbody tr:last-child td {
        border-bottom: none;
    }
    
    .alert {
        border-radius: 8px;
        border: none;
        padding: 16px;
        margin-bottom: 24px;
        font-size: 14px;
    }
    
    .alert-info {
        background: #f0f9ff;
        border: 1px solid #bae6fd;
        color: #0c4a6e;
    }
    
    .alert-danger {
        background: #fef2f2;
        border: 1px solid #fecaca;
        color: #dc2626;
    }
    
    .notes-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }
    
    .notes-list li {
        padding: 6px 0;
        display: flex;
        align-items: flex-start;
        font-size: 14px;
    }
    
    .notes-list li i {
        color: var(--gray-600);
        margin-right: 8px;
        margin-top: 2px;
        width: 16px;
        font-size: 12px;
    }
    
    .section-title {
        font-size: 18px;
        font-weight: 600;
        margin-bottom: 16px;
        color: var(--gray-900);
    }
    
    @media (max-width: 768px) {
        .upload-card, .info-card {
            padding: 24px 20px;
        }
        
        .file-upload-area {
            padding: 32px 20px;
        }
    }
</style>

<div class="page-header">
    <h1 class="page-title">Import Data Siswa</h1>
    <p class="page-subtitle">Upload file Excel untuk import data siswa secara massal</p>
</div>

<div class="row">
    <div class="col-lg-8">
        <div class="upload-card">
            <h3 class="section-title">Upload File Excel</h3>
            
            @if($errors->any())
                <div class="alert alert-danger">
                    <strong>Terdapat kesalahan:</strong>
                    <ul style="margin: 8px 0 0 0; padding-left: 20px;">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('admin.import.post') }}" enctype="multipart/form-data">
                @csrf
                
                <div class="file-upload-area">
                    <div class="file-upload-icon">📁</div>
                    <h4 style="margin-bottom: 8px;">Pilih File Excel</h4>
                    <p style="color: var(--gray-600); margin-bottom: 20px;">Drag & drop file atau klik untuk browse</p>
                    <input type="file" class="form-control" id="excel_file" name="excel_file" 
                           accept=".xlsx,.xls,.csv" required>
                    <small style="color: var(--gray-500); margin-top: 8px; display: block;">Format: .xlsx, .xls, .csv (Maksimal 2MB)</small>
                </div>
                
                <div class="alert alert-info">
                    <strong>Format Excel yang Diperlukan:</strong>
                    <div class="format-table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Kolom A</th>
                                    <th>Kolom B</th>
                                    <th>Kolom C</th>
                                    <th>Kolom D</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><strong>NIS</strong></td>
                                    <td><strong>Nama Siswa</strong></td>
                                    <td><strong>Rata-rata Nilai</strong></td>
                                    <td><strong>Perilaku (Opsional)</strong></td>
                                </tr>
                                <tr style="color: var(--gray-600);">
                                    <td>12001</td>
                                    <td>Ahmad Budi</td>
                                    <td>85</td>
                                    <td>Siswa yang aktif</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary">
                        Import Data Sekarang
                    </button>
                </div>
            </form>
        </div>
    </div>
    
    <div class="col-lg-4">
        <div class="info-card">
            <h3 class="section-title">Template Excel</h3>
            <p style="margin-bottom: 20px;">Download template Excel untuk memudahkan input data:</p>
            <a href="{{ route('admin.template') }}" class="btn btn-info w-100" style="margin-bottom: 24px;">
                Download Template
            </a>
            
            <hr style="margin: 24px 0;">
            
            <h4 style="font-size: 16px; font-weight: 600; margin-bottom: 16px;">Catatan Penting:</h4>
            <ul class="notes-list">
                <li><i class="fas fa-check"></i>Baris pertama adalah header (akan diabaikan)</li>
                <li><i class="fas fa-check"></i>NIS harus unik (tidak boleh duplikat)</li>
                <li><i class="fas fa-check"></i>Rata-rata nilai: 0-100</li>
                <li><i class="fas fa-check"></i>Kriteria lulus: ≥ 79</li>
                <li><i class="fas fa-check"></i>Kolom perilaku boleh kosong</li>
            </ul>
            
            <div class="text-center" style="margin-top: 24px;">
                <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">
                    ← Kembali
                </a>
            </div>
        </div>
    </div>
</div>
@endsection