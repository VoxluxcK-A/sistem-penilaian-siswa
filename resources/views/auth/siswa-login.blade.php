@extends('layouts.app')

@section('title', 'Login Siswa')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow">
            <div class="card-header bg-success text-white text-center">
                <h4><i class="fas fa-user-graduate me-2"></i>Login Siswa</h4>
            </div>
            <div class="card-body p-4">
                @if($errors->any())
                    <div class="alert alert-danger">
                        {{ $errors->first() }}
                    </div>
                @endif

                <form method="POST" action="{{ route('siswa.login.post') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="nis" class="form-label">NIS (Nomor Induk Siswa)</label>
                        <input type="text" class="form-control" id="nis" name="nis" placeholder="Masukkan NIS Anda" required>
                    </div>
                    <button type="submit" class="btn btn-success w-100">
                        <i class="fas fa-sign-in-alt me-2"></i>Cek Kelulusan
                    </button>
                </form>
                
                <div class="text-center mt-3">
                    <a href="{{ url('/') }}" class="text-muted">
                        <i class="fas fa-arrow-left me-1"></i>Kembali ke Beranda
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection