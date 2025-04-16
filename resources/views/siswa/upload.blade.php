<!DOCTYPE html>
<html>
<head>
    <title>Upload Tugas</title>
</head>
<body>
    <h2>Upload Tugas (Siswa)</h2>

    @if(session('success'))
        <p style="color: green">{{ session('success') }}</p>
    @endif

    <form action="/tugas/upload" method="POST" enctype="multipart/form-data">
        @csrf
        <label>Nama:</label><br>
        <input type="text" name="nama" required><br><br>

        <label>Upload Foto:</label><br>
        <input type="file" name="foto" required><br><br>

        <button type="submit">Upload</button>
    </form>

    <br>
    <a href="/tugas/nilai?nama=" onclick="return masukkanNama()">Lihat Nilai</a>

    <script>
        function masukkanNama() {
            const nama = prompt('Masukkan nama Anda:');
            if (nama) {
                window.location.href = '/tugas/nilai?nama=' + encodeURIComponent(nama);
            }
            return false;
        }
    </script>
</body>
</html>
