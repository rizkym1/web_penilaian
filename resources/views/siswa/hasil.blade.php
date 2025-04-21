<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Hasil Nilai</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font lucu untuk anak -->
    <link href="https://fonts.googleapis.com/css2?family=Comic+Neue&display=swap" rel="stylesheet">

    <style>
        body {
            background-color: #FFF7E9;
            font-family: 'Comic Neue', cursive;
        }
        .card {
            border-radius: 20px;
            border: 3px dashed #FFAD60;
            background-color: #FFFBF5;
        }
        .card-header {
            background-color: #74C0FC;
            color: white;
            font-size: 22px;
            font-weight: bold;
            border-top-left-radius: 20px;
            border-top-right-radius: 20px;
        }
        .nilai-box {
            font-size: 24px;
            color: #FF6B6B;
            font-weight: bold;
        }
        .btn-back {
            background-color: #FFD93D;
            color: black;
            font-weight: bold;
            border-radius: 10px;
        }
        .btn-back:hover {
            background-color: #FFC300;
        }
        .komentar {
            background-color: #f0f8ff;
            border-radius: 10px;
            padding: 10px;
            margin-top: 10px;
        }
    </style>
</head>
<body>

<div class="container py-5">
    <h2 class="text-center mb-4">📊 Nilai Tugas untuk: <span class="text-primary">{{ $user->name }}</span></h2>

    @foreach($tugas as $item)
        <div class="card shadow mb-4">
            <div class="card-header text-center">📸 Foto Tugas</div>
            <div class="card-body text-center">
                <img src="{{ asset('storage/' . $item->foto) }}" class="img-fluid mb-3 rounded" width="250">

                @if($item->penilaian)
                    @php
                        $nilaiMax = 28;
                        $skor = $item->penilaian->skor_total ?? 0;
                        $hasil = floor(($skor * 100) / $nilaiMax);
                    @endphp

                    <p class="nilai-box">🎉 Nilai Anda: {{ $hasil }} / 100</p>
                    <p><strong>Kategori:</strong> {{ $item->penilaian->kategori }}</p>

                    @if($item->penilaian->komentar)
                        <div class="komentar">
                            <strong>💬 Komentar Guru:</strong><br>
                            {{ $item->penilaian->komentar }}
                        </div>
                    @endif
                @else
                    <p class="text-muted"><em>Belum dinilai.</em></p>
                @endif
            </div>
        </div>
    @endforeach

    <div class="text-center mt-4">
        <a href="{{ route('siswa.index') }}" class="btn btn-back px-4 py-2">🔙 Kembali</a>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
