<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Rubrik Penilaian</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Comic+Neue:wght@400;700&display=swap" rel="stylesheet">

    <style>
        body {
            background-color: #f3f975;
            font-family: 'Comic Neue', cursive;
        }

        .main-title {
            color: #2abed5;
            font-size: 2.2rem;
            font-weight: bold;
            text-align: center;
            margin-top: 20px;
            line-height: 1.3;
        }

        .pencils-top, .pencils-bottom {
            width: 100%;
            height: auto;
            max-height: 210px;
            object-fit: cover;
        }

        .login-container {
            background-color: #FFFFFF;
            border-radius: 20px;
            border: 2px dashed #ff9966;
            padding: 30px;
            margin: 20px auto;
            max-width: 550px;
        }

        .welcome-text {
            font-family: 'Impact', sans-serif;
            font-size: 2.5rem;
            text-align: center;
            margin-bottom: 30px;
            letter-spacing: 1px;
        }

        .form-label {
            font-weight: bold;
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 1.2rem;
            margin-bottom: 8px;
        }

        .form-control {
            border-radius: 10px;
            background-color: #e6f2ff;
            padding: 12px;
            border: 1px solid #ccc;
            font-size: 1.1rem;
        }

        .teacher-img {
            max-width: 150px;
            margin-right: 20px;
        }

        .btn-login {
            background-color: #ffdd57;
            border: none;
            border-radius: 10px;
            padding: 10px 0;
            font-weight: bold;
            width: 100%;
            font-size: 1.2rem;
            margin-top: 15px;
        }

        .btn-login:hover {
            background-color: #ffd117;
        }

        .register-text {
            text-align: center;
            margin-top: 20px;
            font-size: 1rem;
        }

        .register-link {
            color: #ff6b6b;
            font-weight: bold;
            text-decoration: none;
        }

        .register-link:hover {
            text-decoration: underline;
        }

        .text-danger {
            font-size: 0.9rem;
            margin-top: 4px;
        }

        @media (max-width: 768px) {
            .main-title {
                font-size: 1.8rem;
            }

            .welcome-text {
                font-size: 2rem;
            }

            .teacher-img {
                max-width: 100px;
            }

            .pencils-top, .pencils-bottom {
                max-height: 60px;
            }
        }
    </style>
</head>
<body class="d-flex flex-column min-vh-100">

    <!-- Pencils Top -->
    <img src="{{ asset('img/pensil_atas.png') }}" alt="Pencils Top" class="pencils-top">

    <div class="container flex-grow-1">
        <!-- Main Title -->
        <h1 class="main-title">RUBRIK PENILAIAN<br>MENULIS TEKS EKSPLANASI<br>KELAS V SEKOLAH DASAR</h1>

        <!-- Register Container -->
        <div class="login-container">
            <div class="welcome-text">DAFTAR AKUN</div>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="row">
                    <!-- Teacher Image -->
                    <div class="col-md-4 d-flex align-items-center justify-content-center">
                        <img src="{{ asset('img/guru.png') }}" alt="Guru" class="teacher-img">
                    </div>

                    <!-- Register Form -->
                    <div class="col-md-8">
                        <div class="mb-3">
                            <label for="name" class="form-label">
                                <span>👤</span> Nama
                            </label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">
                                <span>📧</span> Email
                            </label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">
                                <span>🔒</span> Password
                            </label>
                            <input type="password" class="form-control" id="password" name="password" required>
                            @error('password')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">
                                <span>🔁</span> Konfirmasi Password
                            </label>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                        </div>

                        <button type="submit" class="btn-login">
                            📝 Daftar
                        </button>

                        <div class="register-text">
                            Sudah punya akun? <a href="{{ route('login') }}" class="register-link">Masuk Sekarang</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Pencils Bottom -->
    <footer class="mt-auto">
        <img src="{{ asset('img/pensil_bawah.png') }}" alt="Pencils Bottom" class="pencils-bottom">
        <div class="text-center py-3" style="background-color: #f8f9fa; color: #333; font-size: 0.9rem;">
            © Erma Rosmawati - Universitas Pendidikan Indonesia 2025
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
