<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Kelulusan - {{ $siswa->nama }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --gray-50: #fafafa;
            --gray-100: #f5f5f5;
            --gray-200: #e5e5e5;
            --gray-300: #d4d4d4;
            --gray-400: #a3a3a3;
            --gray-500: #737373;
            --gray-600: #525252;
            --gray-700: #404040;
            --gray-800: #262626;
            --gray-900: #171717;
            --green-50: #f0fdf4;
            --green-500: #22c55e;
            --green-600: #16a34a;
            --red-50: #fef2f2;
            --red-500: #ef4444;
            --red-600: #dc2626;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--gray-50);
            color: var(--gray-900);
            line-height: 1.6;
            padding: 40px 20px;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
        }

        .header {
            text-align: center;
            margin-bottom: 40px;
        }

        .title {
            font-size: 28px;
            font-weight: 600;
            color: var(--gray-900);
            margin-bottom: 8px;
        }

        .subtitle {
            color: var(--gray-600);
            font-size: 16px;
        }

        .alert {
            padding: 16px;
            border-radius: 8px;
            margin-bottom: 24px;
            font-size: 14px;
        }

        .alert-success {
            background: var(--green-50);
            border: 1px solid #bbf7d0;
            color: var(--green-600);
        }

        .alert-danger {
            background: var(--red-50);
            border: 1px solid #fecaca;
            color: var(--red-600);
        }

        .card {
            background: white;
            border: 1px solid var(--gray-200);
            border-radius: 8px;
            padding: 24px;
            margin-bottom: 24px;
        }

        .student-info {
            display: flex;
            align-items: center;
            gap: 20px;
            margin-bottom: 20px;
        }

        .avatar {
            width: 80px;
            height: 80px;
            background: var(--gray-200);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 32px;
            color: var(--gray-600);
        }

        .student-details h2 {
            font-size: 24px;
            font-weight: 600;
            margin-bottom: 4px;
        }

        .nis {
            color: var(--gray-600);
            font-size: 14px;
            margin-bottom: 12px;
        }

        .status {
            display: inline-block;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 14px;
            font-weight: 500;
        }

        .status.lulus {
            background: var(--green-50);
            color: var(--green-600);
            border: 1px solid #bbf7d0;
        }

        .status.tidak-lulus {
            background: var(--red-50);
            color: var(--red-600);
            border: 1px solid #fecaca;
        }

        .section-title {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 16px;
        }

        .grades-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 16px;
            margin-bottom: 20px;
        }

        .grade-item {
            background: var(--gray-50);
            border: 1px solid var(--gray-200);
            border-radius: 6px;
            padding: 16px;
        }

        .grade-subject {
            font-size: 14px;
            color: var(--gray-600);
            margin-bottom: 4px;
        }

        .grade-score {
            font-size: 24px;
            font-weight: 600;
            color: var(--gray-900);
        }

        .average-card {
            background: var(--gray-900);
            color: white;
            border-radius: 8px;
            padding: 20px;
            text-align: center;
        }

        .average-label {
            font-size: 14px;
            opacity: 0.8;
            margin-bottom: 4px;
        }

        .average-score {
            font-size: 32px;
            font-weight: 700;
        }

        .behavior-text {
            color: var(--gray-700);
            font-size: 14px;
            line-height: 1.6;
        }

        .actions {
            display: flex;
            gap: 12px;
            justify-content: center;
            flex-wrap: wrap;
            margin-top: 40px;
        }

        .btn {
            padding: 12px 24px;
            border-radius: 6px;
            font-size: 14px;
            font-weight: 500;
            text-decoration: none;
            cursor: pointer;
            border: none;
            transition: all 0.2s;
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

        .empty-state {
            text-align: center;
            padding: 40px 20px;
            color: var(--gray-500);
        }

        @media (max-width: 640px) {
            body {
                padding: 20px 16px;
            }

            .student-info {
                flex-direction: column;
                text-align: center;
            }

            .grades-grid {
                grid-template-columns: 1fr;
            }

            .actions {
                flex-direction: column;
                align-items: center;
            }

            .btn {
                width: 100%;
                max-width: 200px;
            }
        }

        @media print {
            body {
                background: white;
                padding: 20px;
            }
            
            .actions {
                display: none;
            }
            
            .card {
                border: 1px solid #ddd;
                box-shadow: none;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1 class="title">Hasil Kelulusan</h1>
            <p class="subtitle">Status kelulusan berdasarkan rata-rata nilai</p>
        </div>

        @if($siswa->status_kelulusan == 'LULUS')
            <div class="alert alert-success">
                <strong>Selamat!</strong> Anda berhasil mencapai standar kelulusan dengan rata-rata nilai <strong>{{ number_format($siswa->rata_rata_nilai, 2) }}</strong>.
            </div>
        @else
            <div class="alert alert-danger">
                <strong>Maaf,</strong> Anda belum mencapai standar kelulusan. Rata-rata nilai Anda <strong>{{ number_format($siswa->rata_rata_nilai, 2) }}</strong>. Standar minimum adalah <strong>79</strong>.
            </div>
        @endif

        <div class="card">
            <div class="student-info">
                <div class="avatar">
                    👤
                </div>
                <div class="student-details">
                    <h2>{{ $siswa->nama }}</h2>
                    <div class="nis">NIS: {{ $siswa->nis }}</div>
                    <span class="status {{ $siswa->status_kelulusan == 'LULUS' ? 'lulus' : 'tidak-lulus' }}">
                        {{ $siswa->status_kelulusan }}
                    </span>
                </div>
            </div>
        </div>

        <div class="card">
            <h3 class="section-title">Detail Nilai</h3>
            
            @if($siswa->nilai->count() > 0)
                <div class="grades-grid">
                    @foreach($siswa->nilai as $nilai)
                        <div class="grade-item">
                            <div class="grade-subject">{{ $nilai->mata_pelajaran }}</div>
                            <div class="grade-score">{{ $nilai->nilai }}</div>
                        </div>
                    @endforeach
                </div>
                
                <div class="average-card">
                    <div class="average-label">Rata-rata Nilai</div>
                    <div class="average-score">{{ number_format($siswa->rata_rata_nilai, 1) }}</div>
                </div>
            @else
                <div class="empty-state">
                    <p>Belum ada data nilai</p>
                </div>
            @endif
        </div>

        @if($siswa->perilaku)
        <div class="card">
            <h3 class="section-title">Catatan Perilaku</h3>
            <div class="behavior-text">
                {{ $siswa->perilaku }}
            </div>
        </div>
        @endif

        <div class="actions">
            <button onclick="window.print()" class="btn btn-primary">
                Cetak Hasil
            </button>
            
            <a href="{{ url('/') }}" class="btn btn-secondary">
                Cek NIS Lain
            </a>
        </div>
    </div>
</body>
</html>