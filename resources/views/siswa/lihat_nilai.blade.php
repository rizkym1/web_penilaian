{{-- <!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Lihat Nilai</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Anak-Anak -->
    <link href="https://fonts.googleapis.com/css2?family=Comic+Neue&display=swap" rel="stylesheet">

    <style>
        body {
            background-color: #FFF7E9;
            font-family: 'Comic Neue', cursive;
        }
        .card {
            border-radius: 20px;
            border: 3px dotted #FFA500;
        }
        .card-header {
            background-color: #74C0FC;
            color: white;
            text-align: center;
            font-size: 20px;
            font-weight: bold;
            border-top-left-radius: 20px;
            border-top-right-radius: 20px;
        }
        .btn-primary {
            background-color: #F7B801;
            border: none;
            font-weight: bold;
        }
        .btn-primary:hover {
            background-color: #F2A300;
        }
        .btn-secondary {
            background-color: #FFA6C9;
            border: none;
            font-weight: bold;
        }
        .btn-secondary:hover {
            background-color: #FF87B2;
        }
        h2 {
            color: #FF6B6B;
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2 class="text-center mb-4">🎯 Cek Nilai Tugas</h2>

            @if(session('error'))
                <div class="alert alert-danger text-center">
                    {{ session('error') }}
                </div>
            @endif

            <div class="card shadow">
                <div class="card-header">
                    Masukkan Nama Siswa
                </div>
                <div class="card-body">
                    <form action="/lihat-nilai" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="nama" class="form-label">👧 Nama Siswa</label>
                            <input type="text" class="form-control" id="nama" name="nama" required>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">🔍 Lihat Nilai</button>
                            <a href="/upload-tugas" class="btn btn-secondary">⬅️ Kembali</a>
                        </div>
                    </form>
                </div>
            </div>

            <p class="text-center mt-3 text-muted" style="font-size: 14px;">
                Tetap semangat dan terus belajar! 📖✨
            </p>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> --}}
