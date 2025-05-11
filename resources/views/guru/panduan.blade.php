@extends('layouts.sbadmin')

@section('content')
<div class="container my-5">
  <div class="card shadow-lg border-0" style="border-radius: 20px; background-color: #fce4ec;">
    <div class="card-body">
      <h2 class="text-center fw-bold" style="background: #f06292; color: white; padding: 10px; border-radius: 10px;">
        PANDUAN PENGGUNA
      </h2>
      <p class="mt-4" style="color: #333;">
        Website ini digunakan untuk menilai teks eksplanasi siswa secara digital. Siswa dapat mengunggah foto tulisan tangan mereka, dan guru memberikan penilaian berdasarkan rubrik yang telah disediakan. Hasil penilaian beserta umpan balik akan langsung ditampilkan kepada siswa.
      </p>

      <h5 class="fw-bold mt-4">Langkah-Langkah Penggunaan:</h5>

      <h6 class="fw-bold mt-3">Bagi Siswa:</h6>
      <ol>
        <li>Masuk ke akun siswa.</li>
        <li>Unggah foto tulisan teks eksplanasi melalui tombol “Unggah Tugas”.</li>
        <li>Tunggu hingga guru memberikan penilaian.</li>
        <li>Lihat hasil penilaian dan umpan balik di menu “Nilai Saya”.</li>
      </ol>

      <h6 class="fw-bold mt-4">Bagi Guru:</h6>
      <ol>
        <li>Masuk ke akun guru.</li>
        <li>Pilih tugas yang telah diunggah siswa.</li>
        <li>Buka dan baca tulisan siswa.</li>
        <li>Beri penilaian sesuai rubrik yang tersedia.</li>
        <li>Tambahkan umpan balik jika diperlukan, lalu simpan.</li>
        <li>Hasil penilaian akan otomatis tampil di akun siswa.</li>
      </ol>
    </div>
  </div>
</div>
@endsection
