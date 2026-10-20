<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistem Kepegawaian</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body { background: #f4f6fb; }
        .sidebar {
            width: 250px; min-height: 100vh; position: fixed; top: 0; left: 0;
            background: linear-gradient(180deg, #4f46e5, #7c3aed); color: #fff;
        }
        .sidebar .brand { padding: 22px 20px; font-size: 1.25rem; font-weight: 700; }
        .sidebar .nav-link {
            color: rgba(255,255,255,.8); padding: 12px 20px; border-radius: 10px; margin: 2px 12px;
        }
        .sidebar .nav-link:hover { background: rgba(255,255,255,.15); color: #fff; }
        .sidebar .nav-link.active { background: #fff; color: #4f46e5; font-weight: 600; }
        .sidebar .menu-title {
            font-size: .72rem; letter-spacing: 1px; text-transform: uppercase;
            opacity: .6; padding: 16px 20px 6px;
        }
        .content { margin-left: 250px; }
        .topbar { background: #fff; box-shadow: 0 2px 8px rgba(0,0,0,.06); padding: 14px 28px; }
        .card { border: 0; border-radius: 14px; box-shadow: 0 4px 14px rgba(0,0,0,.08); }
        .table thead { background: #eef2ff; }
        @media (max-width: 768px) {
            .sidebar { position: static; width: 100%; min-height: auto; }
            .content { margin-left: 0; }
        }
    </style>
</head>
<body>

<aside class="sidebar">
    <div class="brand"><i class="bi bi-people-fill"></i> Kepegawaian</div>

    <div class="menu-title">Menu Utama</div>
    <nav class="nav flex-column">
        <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
            <i class="bi bi-speedometer2 me-2"></i> Dasbor
        </a>
        <a class="nav-link {{ request()->routeIs('departments.*') ? 'active' : '' }}" href="{{ route('departments.index') }}">
            <i class="bi bi-diagram-3 me-2"></i> Departemen
        </a>
        <a class="nav-link {{ request()->routeIs('employees.*') ? 'active' : '' }}" href="{{ route('employees.index') }}">
            <i class="bi bi-person-badge me-2"></i> Pegawai
        </a>
    </nav>

    <div class="menu-title">Akun</div>
    <nav class="nav flex-column">
        <a class="nav-link {{ request()->routeIs('profile.*') ? 'active' : '' }}" href="{{ route('profile.edit') }}">
            <i class="bi bi-person-circle me-2"></i> Profil HRD
        </a>
    </nav>
</aside>

<div class="content">
    <div class="topbar d-flex justify-content-between align-items-center mb-4">
        <span class="fw-semibold">Halo, {{ auth()->user()->name }}</span>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="btn btn-outline-danger btn-sm"><i class="bi bi-box-arrow-right"></i> Logout</button>
        </form>
    </div>

    <div class="container-fluid px-4 pb-5">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @yield('content')
    </div>
</div>

</body>
</html>