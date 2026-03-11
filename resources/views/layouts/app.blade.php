<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sistem Kelulusan Siswa')</title>
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
        }
        
        .navbar {
            background: white;
            border-bottom: 1px solid var(--gray-200);
            padding: 16px 0;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .navbar-brand {
            font-weight: 600;
            font-size: 18px;
            color: var(--gray-900);
            text-decoration: none;
        }
        
        .navbar-nav {
            display: flex;
            align-items: center;
            gap: 16px;
        }
        
        .navbar-text {
            color: var(--gray-600);
            font-size: 14px;
        }
        
        .btn {
            border: 1px solid var(--gray-300);
            color: var(--gray-700);
            background: white;
            border-radius: 6px;
            padding: 8px 16px;
            font-size: 14px;
            font-weight: 500;
            text-decoration: none;
            cursor: pointer;
            transition: all 0.2s;
        }
        
        .btn:hover {
            background: var(--gray-100);
            border-color: var(--gray-400);
            color: var(--gray-800);
        }
        
        .main-content {
            max-width: 1200px;
            margin: 0 auto;
            padding: 40px 20px;
            min-height: calc(100vh - 200px);
        }
        
        .alert {
            padding: 16px;
            border-radius: 8px;
            margin-bottom: 24px;
            font-size: 14px;
        }
        
        .alert-success {
            background: #f0fdf4;
            border: 1px solid #bbf7d0;
            color: #166534;
        }
        
        .alert-danger {
            background: #fef2f2;
            border: 1px solid #fecaca;
            color: #dc2626;
        }
        
        .alert-warning {
            background: #fffbeb;
            border: 1px solid #fed7aa;
            color: #92400e;
        }
        
        .btn-close {
            background: none;
            border: none;
            font-size: 18px;
            cursor: pointer;
            color: inherit;
            opacity: 0.5;
            float: right;
        }
        
        .btn-close:hover {
            opacity: 1;
        }
        
        @media (max-width: 768px) {
            .main-content {
                padding: 20px 16px;
            }
            
            .navbar-nav {
                gap: 12px;
            }
            
            .navbar-text {
                display: none;
            }
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="container">
            <a class="navbar-brand" href="#">
                Sistem Kelulusan Siswa
            </a>
            
            @if(session('admin_secret_logged_in'))
                <div class="navbar-nav">
                    <span class="navbar-text">Admin Panel</span>
                    <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" class="btn">Logout</button>
                    </form>
                </div>
            @elseif(session('siswa_id'))
                <div class="navbar-nav">
                    <span class="navbar-text">NIS: {{ session('siswa_nis') }}</span>
                    <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" class="btn">Logout</button>
                    </form>
                </div>
            @endif
        </div>
    </nav>

    <div class="main-content">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
                <button type="button" class="btn-close" onclick="this.parentElement.style.display='none'">&times;</button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
                <button type="button" class="btn-close" onclick="this.parentElement.style.display='none'">&times;</button>
            </div>
        @endif

        @yield('content')
    </div>
</body>
</html>