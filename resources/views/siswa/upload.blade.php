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
            background-color: #FFF9EC;
            font-family: 'Comic Neue', cursive;
        }
        .card {
            border-radius: 20px;
            border: 3px dashed #FFD93D;
        }
        .card-header {
            background-color: #FF9B9B;
            color: white;
            border-top-left-radius: 20px;
            border-top-right-radius: 20px;
            text-align: center;
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

@php
    use Illuminate\Support\Facades\Auth;
@endphp

<div class="container py-5">
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

                    <form action="{{ route('logout') }}" method="POST" class="mt-3 d-grid gap-2">
                        @csrf
                        <button type="submit" class="btn btn-danger">🚪 Keluar</button>
                    </form>
                </div>
            </div>

            <p class="text-center mt-3 text-muted" style="font-size: 14px;">
                Ayo semangat belajar! 🎓💡
            </p>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
