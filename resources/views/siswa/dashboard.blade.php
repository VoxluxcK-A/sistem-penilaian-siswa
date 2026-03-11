@extends('layouts.app')

@section('title', 'Dashboard Siswa')

@section('content')
<div class="row">
    <div class="col-12">
        <h2><i class="fas fa-user-graduate me-2"></i>Dashboard Siswa</h2>
        <hr>
    </div>
</div>

<div class="row mb-4">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h5><i class="fas fa-user me-2"></i>Data Siswa</h5>
            </div>
            <div class="card-body">
                <table class="table table-borderless">
                    <tr>
                        <td><strong>NIS</strong></td>
                        <td>: {{ $siswa->nis }}</td>
                    </tr>
                    <tr>
                        <td><strong>Nama</strong></td>
                        <td>: {{ $siswa->nama }}</td>
                    </tr>
                    <tr>
                        <td><strong>Rata-rata Nilai</strong></td>
                        <td>: {{ number_format($siswa->rata_rata_nilai, 2) }}</td>
                    </tr>
                    <tr>
                        <td><strong>Status</strong></td>
                        <td>: 
                            @if($siswa->status_kelulusan == 'LULUS')
                                <span class="badge bg-success fs-6">LULUS</span>
                            @else
                                <span class="badge bg-danger fs-6">TIDAK LULUS</span>
                            @endif
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    
    <div class="col-md-6">
        <div class="card">
            <div class="card-header bg-info text-white">
                <h5><i class="fas fa-info-circle me-2"></i>Keterangan Kelulusan</h5>
            </div>
            <div class="card-body">
                <div class="alert {{ $siswa->status_kelulusan == 'LULUS' ? 'alert-success' : 'alert-danger' }}">
                    @if($siswa->status_kelulusan == 'LULUS')
                        <i class="fas fa-check-circle me-2"></i>
                        <strong>Selamat!</strong> Anda dinyatakan LULUS dengan rata-rata nilai {{ number_format($siswa->rata_rata_nilai, 2) }}.
                    @else
                        <i class="fas fa-times-circle me-2"></i>
                        <strong>Maaf,</strong> Anda dinyatakan TIDAK LULUS dengan rata-rata nilai {{ number_format($siswa->rata_rata_nilai, 2) }}. 
                        Nilai minimum untuk lulus adalah 75.
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header bg-secondary text-white">
                <h5><i class="fas fa-chart-bar me-2"></i>Detail Nilai</h5>
            </div>
            <div class="card-body">
                @if($siswa->nilai->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Mata Pelajaran</th>
                                    <th>Nilai</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($siswa->nilai as $nilai)
                                <tr>
                                    <td>{{ $nilai->mata_pelajaran }}</td>
                                    <td>
                                        <span class="badge {{ $nilai->nilai >= 75 ? 'bg-success' : 'bg-danger' }}">
                                            {{ $nilai->nilai }}
                                        </span>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="text-center text-muted">
                        <i class="fas fa-exclamation-triangle fa-2x mb-2"></i>
                        <p>Belum ada data nilai</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
    
    <div class="col-md-6">
        <div class="card">
            <div class="card-header bg-warning text-dark">
                <h5><i class="fas fa-user-check me-2"></i>Summary Perilaku</h5>
            </div>
            <div class="card-body">
                @if($siswa->perilaku)
                    <div class="alert alert-light">
                        <i class="fas fa-quote-left me-2"></i>
                        {{ $siswa->perilaku }}
                        <i class="fas fa-quote-right ms-2"></i>
                    </div>
                @else
                    <div class="text-center text-muted">
                        <i class="fas fa-info-circle fa-2x mb-2"></i>
                        <p>Belum ada catatan perilaku</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection