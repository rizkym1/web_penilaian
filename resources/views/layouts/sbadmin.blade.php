<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Panel Guru</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS & FontAwesome -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('sb-admin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">

    <style>
        body {
            background-color: #e8f855;
            font-family: 'Comic Sans MS', 'Chalkboard SE', sans-serif;
            background-image: url('{{ asset('images/pencil-bg.png') }}');
            background-repeat: repeat-x;
            background-position: bottom;
        }

        .sidebar {
            background-color: #d9d9d9;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .sidebar-header {
            font-size: 2rem;
            color: #22bbd4;
            text-align: center;
            font-weight: bold;
            margin-bottom: 30px;
        }

        .nav-link {
            color: #22bbd4 !important;
            font-size: 1.3rem;
            border-radius: 8px;
            margin-bottom: 10px;
            transition: all 0.3s;
        }

        .nav-link:hover {
            background-color: rgba(255, 255, 255, 0.2);
            transform: translateX(5px);
        }

        .content-area {
            background-color: #fff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .header-area {
            background-color: #e8f855;
            padding: 15px;
            border-radius: 10px 10px 0 0;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .header-title {
            color: #22bbd4;
            font-weight: bold;
            font-size: 2rem;
            margin: 0;
        }

        .header-dua {
            color: #22bbd4;
            font-weight: bold;
            font-size: 1.5rem;
            margin: 0;
        }

        .pencils-top, .pencils-bottom {
            width: 100%;
            height: auto;
            max-height: 220px;
            object-fit: cover;
        }

        .admin-img {
            height: 80px;
        }

        .admin-container {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .admin-name {
            color: #000000;
            font-weight: bold;
            font-size: 0.9rem;
            margin-top: 5px;
        }

        .header-content {
            display: flex;
            flex-direction: column;
            align-items: center;
            flex: 1;
        }
    </style>
</head>
<body>

    <!-- Musik Latar -->
    <audio autoplay loop>
        <source src="{{ asset('music/45754237_corporate-upbeat_by_alexandersizonenko_preview.mp3') }}" type="audio/mpeg">
        Browser Anda tidak mendukung audio.
    </audio>

    <!-- Pensil Atas -->
    <img src="{{ asset('img/pensil_atas.png') }}" class="pencils-top" alt="Pencils Top">

    <div class="container-fluid my-4">
        <div class="row g-4">
            <!-- Sidebar -->
            <div class="col-lg-3">
                <div class="sidebar">
                    <div class="sidebar-header">PANEL GURU</div>
                    <ul class="nav flex-column">
                        <li class="nav-item fw-bold">
                            <a class="nav-link" href="{{ route('dashboard') }}">
                                <i class="fas fa-home me-1"></i>HOME
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-bold" href="{{ route('panduan.index') }}">
                                <i class="fas fa-question-circle me-1"></i>PANDUAN PENGGUNA
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-bold" href="{{ route('users.index') }}">
                                <i class="fas fa-users me-1"></i>DATA USER
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-bold" href="{{ route('tugas.index') }}">
                                <i class="fas fa-book me-1"></i>DAFTAR TUGAS
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-bold" href="{{ route('rubrik.index') }}">
                                <i class="fas fa-clipboard-list me-1"></i>RUBRIK PENILAIAN
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-bold" href="{{ route('tentang.index') }}">
                                <i class="fas fa-info-circle me-1"></i>TENTANG WEBSITE
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-bold" href="{{ route('pengembang.index') }}">
                                <i class="fas fa-user me-1"></i>PROFIL PENGEMBANG
                            </a>
                        </li>
                        <li class="nav-item mt-4">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="nav-link btn w-100 text-start">
                                    <i class="fas fa-sign-out-alt me-2"></i>KELUAR
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Konten Utama -->
            <div class="col-lg-9">
                <div class="header-area mb-4">
                    <div class="header-content">
                        <h1 class="header-title">RUBRIK PENILAIAN</h1>
                        <h3 class="header-title">MENULIS TEKS EKSPLANASI</h3>
                        <h3 class="header-dua">KELAS V SEKOLAH DASAR</h3>
                    </div>
                    <div class="admin-container">
                        <img src="{{ asset('img/admin.png') }}" class="admin-img" alt="Admin">
                        <span class="admin-name">{{ Auth::user()->name }}</span>
                    </div>
                </div>

                <div class="content-area">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @yield('content')
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="mt-auto">
        <img src="{{ asset('img/pensil_bawah.png') }}" class="pencils-bottom" alt="Pencils Bottom">

        <div class="text-center py-3" style="background-color: #f8f9fa; color: #333; font-size: 0.9rem;">
            © Erma Rosmawati - Universitas Pendidikan Indonesia 2025
        </div>
    </footer>

    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('sb-admin/js/sb-admin-2.min.js') }}"></script>

    @yield('scripts')
</body>
</html>
