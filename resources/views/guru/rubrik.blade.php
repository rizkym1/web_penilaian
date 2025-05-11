@extends('layouts.sbadmin')

@section('content')
<style>
    .rubrik-header {
        text-align: center;
        font-weight: bold;
        color: white;
        text-transform: uppercase;
        padding: 20px;
        background-color: #439fb7;
        margin-bottom: 10px;
        border-radius: 0;
    }
    
    .table-container {
        background-color: #439fb7;
        padding: 5px;
    }
    
    .rubrik-table {
        border-collapse: separate;
        border-spacing: 5px;
        background-color: transparent;
        border: none;
        width: 100%;
    }
    
    .rubrik-table td, .rubrik-table th {
        border: none !important;
        padding: 10px;
        vertical-align: middle;
    }
    
    .aspect-header {
        background-color: #439fb7;
        color: white;
        font-weight: bold;
        text-align: center;
        text-transform: uppercase;
    }
    
    .score-header {
        background-color: #439fb7;
        color: white;
        font-weight: bold;
        text-align: center;
        text-transform: uppercase;
    }
    
    .aspect-cell {
        background-color: white;
        color: black;
        font-weight: bold;
        text-align: center;
    }
    
    .score-cell {
        background-color: #e0f2f4;
        color: black;
        text-align: center;
    }
</style>

<div class="container-fluid">
  <div class="row mb-4">
      <div class="col-12">
          <h1 class="rubrik-header">RUBRIK PENILAIAN MENULIS TEKS EKSPLANASI UNTUK PESERTA DIDIK KELAS V SEKOLAH DASAR</h1>
      </div>
  </div>

  <div class="table-container">
      <table class="rubrik-table">
          <thead>
              <tr>
                  <th class="aspect-header">ASPEK</th>
                  <th class="score-header">SKOR 4 (SANGAT BAIK)</th>
                  <th class="score-header">SKOR 3 (BAIK)</th>
                  <th class="score-header">SKOR 2 (CUKUP)</th>
                  <th class="score-header">SKOR 1 (KURANG)</th>
              </tr>
          </thead>
          <tbody>
              <tr>
                  <td class="aspect-cell">Pernyataan Umum</td>
                  <td class="score-cell">Topik disajikan dengan sangat jelas, menarik, dan menggambarkan keseluruhan gejala atau proses secara utuh.</td>
                  <td class="score-cell">Topik cukup jelas dan sesuai; pengantar ada namun kurang menarik.</td>
                  <td class="score-cell">Topik kurang jelas dan tidak menggambarkan gejala secara utuh.</td>
                  <td class="score-cell">Tidak ada pernyataan umum atau sangat tidak jelas.</td>
              </tr>
              <tr>
                  <td class="aspect-cell">Deretan penjelas</td>
                  <td class="score-cell">Penjelasan sangat runtut, logis, dan sistematis dengan penggunaan hubungan sebab-akibat atau urutan waktu secara tepat</td>
                  <td class="score-cell">Penjelasan cukup runtut dan logis; sebagian besar hubungan sebab-akibat atau kronologis digunakan dengan benar.</td>
                  <td class="score-cell">Penjelasan kurang runtut atau sebagian besar hubungan sebab-akibat tidak digunakan dengan tepat.</td>
                  <td class="score-cell">Penjelasan acak, tidak logis, dan tidak mengikuti struktur teks eksplanasi.</td>
              </tr>
              <tr>
                  <td class="aspect-cell">Interpretasi / Simpulan</td>
                  <td class="score-cell">Simpulan menggambarkan pemahaman mendalam; mengandung refleksi atau pesan akhir yang relevan dan sesuai dengan isi penjelasan.</td>
                  <td class="score-cell">Simpulan menggambarkan isi penjelasan secara ringkas dan sesuai.</td>
                  <td class="score-cell">Simpulan terlalu umum atau hanya mengulang isi penjelasan tanpa makna tambahan.</td>
                  <td class="score-cell">Tidak ada simpulan atau simpulan tidak relevan dengan isi penjelasan.</td>
              </tr>
              <tr>
                  <td class="aspect-cell">penggunaan konjungsi</td>
                  <td class="score-cell">Menggunakan berbagai konjungsi sebab-akibat dan kronologis secara tepat dan konsisten dalam seluruh teks.</td>
                  <td class="score-cell">Menggunakan beberapa konjungsi kausal dan kronologis secara cukup tepat</td>
                  <td class="score-cell">Hanya sedikit konjungsi yang digunakan; penggunaannya kurang tepat.</td>
                  <td class="score-cell">Tidak ada atau penggunaan konjungsi tidak sesuai konteks.</td>
              </tr>
              <tr>
                  <td class="aspect-cell">Kalimat Fakta</td>
                  <td class="score-cell">Menggunakan istilah ilmiah yang tepat, sesuai konteks, dan membantu menjelaskan topik secara lebih jelas.</td>
                  <td class="score-cell">Menggunakan beberapa istilah ilmiah yang sesuai, meskipun belum konsisten.</td>
                  <td class="score-cell">Menggunakan istilah ilmiah yang kurang tepat atau sangat terbatas.</td>
                  <td class="score-cell">Tidak ada istilah ilmiah; penggunaan istilah tidak sesuai konteks.</td>
              </tr>
              <tr>
                  <td class="aspect-cell">Kerapian Tulisan & Ejaan</td>
                  <td class="score-cell">Tulisan sangat rapi, mudah dibaca, ejaan dan tanda baca hampir tanpa kesalahan.</td>
                  <td class="score-cell">Tulisan cukup rapi, kesalahan ejaan/tanda baca minimal dan tidak mengganggu pemahaman.</td>
                  <td class="score-cell">Tulisan kurang rapi; cukup banyak kesalahan ejaan/tanda baca yang mengganggu pemahaman.</td>
                  <td class="score-cell">Tulisan tidak terbaca dengan baik; banyak kesalahan ejaan dan tanda baca.</td>
              </tr>
          </tbody>
      </table>
  </div>
</div>
@endsection