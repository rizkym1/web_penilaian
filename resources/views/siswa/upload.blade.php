<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Upload Tugas Siswa</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Comic+Neue&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            font-family: 'Comic Neue', cursive;
            height: 100vh;
            background: linear-gradient(135deg, #FFDEE9 0%, #B5FFFC 100%);
            overflow-x: hidden;
            position: relative;
        }

        .circle {
            position: absolute;
            border-radius: 50%;
            opacity: 0.3;
            animation: float 6s infinite ease-in-out;
        }

        .circle1 {
            width: 200px;
            height: 200px;
            background: #FFD93D;
            top: -50px;
            left: -50px;
        }

        .circle2 {
            width: 150px;
            height: 150px;
            background: #FF6B6B;
            bottom: -60px;
            right: -40px;
        }

        .circle3 {
            width: 100px;
            height: 100px;
            background: #6BCB77;
            top: 50%;
            left: 80%;
        }

        @keyframes float {
            0%, 100% {
                transform: translateY(0px);
            }
            50% {
                transform: translateY(-20px);
            }
        }

        .card {
            border-radius: 20px;
            border: 3px dashed #FFD93D;
            background-color: #ffffffcc;
        }

        .card-header {
            background-color: #FF9B9B;
            color: white;
            border-top-left-radius: 20px;
            border-top-right-radius: 20px;
            text-align: center;
            font-weight: bold;
        }

        .btn-primary {
            background-color: #6BCB77;
            border: none;
            font-weight: bold;
        }

        .btn-primary:hover {
            background-color: #4CAF50;
        }

        .btn-secondary {
            background-color: #74C0FC;
            font-weight: bold;
            border: none;
        }

        .btn-secondary:hover {
            background-color: #4DABF7;
        }

        .btn-danger {
            background-color: #FF6B6B;
            font-weight: bold;
            border: none;
        }

        .btn-danger:hover {
            background-color: #E74C3C;
        }

        h2 {
            color: #FF6B6B;
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="circle circle1"></div>
<div class="circle circle2"></div>
<div class="circle circle3"></div>

@php
    use Illuminate\Support\Facades\Auth;
@endphp

<div class="container py-5 position-relative">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2 class="text-center mb-3">📚 Upload Tugas Siswa</h2>

            <div class="text-center mb-3">
                <h5>👋 Selamat datang, <strong>{{ Auth::user()->name }}</strong>!</h5>
                <p class="text-muted">Silakan kirimkan tugas kamu melalui form di bawah ini.</p>
            </div>

            @if(session('success'))
                <div class="alert alert-success text-center">
                    {{ session('success') }}
                </div>
            @endif

            <div class="card shadow">
                <div class="card-header">
                    Formulir Pengumpulan Tugas
                </div>
                <div class="card-body">
                    <form action="/upload-tugas" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="foto" class="form-label">📷 Foto Tugas</label>
                            <input type="file" class="form-control" id="foto" name="foto" accept="image/*" required>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">🚀 Kirim Tugas</button>
                            <a href="/lihat-nilai" class="btn btn-secondary">🔍 Lihat Nilai</a>
                        </div>
                    </form>

                    <button class="btn btn-danger mt-3" data-bs-toggle="modal" data-bs-target="#logoutModal">🚪 Keluar</button>
                </div>
            </div>

            <p class="text-center mt-3 text-muted" style="font-size: 14px;">
                Ayo semangat belajar! 🎓💡
            </p>
        </div>
    </div>
</div>

<!-- Modal Konfirmasi Keluar -->
<div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="logoutModalLabel">Konfirmasi Keluar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Apakah Anda yakin ingin keluar?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger">Ya, Keluar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
