<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Guru</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .sidebar {
            height: 100vh;
            background-color: #343a40;
            color: white;
        }
        .sidebar a {
            color: white;
            text-decoration: none;
            display: block;
            padding: 12px 20px;
        }
        .sidebar a:hover, .sidebar a.active {
            background-color: #495057;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <div class="col-md-2 sidebar d-flex flex-column">
                <h4 class="text-center py-3 border-bottom">Guru Panel</h4>
                <a href="{{ route('guru.dashboard') }}" class="{{ request()->routeIs('guru.dashboard') ? 'active' : '' }}">🏠 Dashboard</a>
                <a href="{{ route('guru.tugas') }}" class="{{ request()->routeIs('guru.tugas') ? 'active' : '' }}">📄 Daftar Tugas</a>
                <a href="{{ route('guru.penilaian') }}" class="{{ request()->routeIs('guru.penilaian') ? 'active' : '' }}">📝 Penilaian</a>
                <a href="#">🔓 Logout</a>
            </div>
            <div class="col-md-10 p-4">
                @yield('content')
            </div>
        </div>
    </div>
</body>
</html>
