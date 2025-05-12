@extends('layouts.sbadmin')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Penilaian Tugas</h1>

    <div class="row">
        <!-- Gambar sticky -->
        <div class="col-md-4 mb-4">
            <div class="position-sticky" style="top: 80px;">
                <h5 class="mb-3">Nama Siswa: {{ $tugas->user->name }}</h5>
                <img
                    src="{{ asset('storage/' . $tugas->foto) }}"
                    class="img-thumbnail w-100"
                    style="cursor: pointer; transition: transform 0.3s ease;"
                    id="imgPreview"
                    alt="Teks Eksplanasi">
            </div>
        </div>

        <!-- Rubrik penilaian -->
        <div class="col-md-8">
            <div class="card shadow mb-4">
                <div class="card-header bg-primary text-white">
                    <h6 class="m-0 font-weight-bold">Form Penilaian</h6>
                </div>
                <div class="card-body">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form id="formPenilaian" action="{{ route('penilaian.simpan', $tugas->id) }}" method="POST">
                        @csrf

                        <div class="table-responsive">
                            <table class="table table-bordered text-center align-middle">
                                <thead class="table-secondary">
                                    <tr>
                                        <th>Aspek</th>
                                        <th>Skor 4<br><small>Sangat Baik</small></th>
                                        <th>Skor 3<br><small>Baik</small></th>
                                        <th>Skor 2<br><small>Cukup</small></th>
                                        <th>Skor 1<br><small>Perlu Bimbingan</small></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $aspek = [
                                            1 => '1. Pernyataan Umum',
                                            2 => '2. Deretan Penjelas',
                                            3 => '3. Interpretasi / Simpulan',
                                            4 => '4. Penggunaan Konjungsi',
                                            5 => '5. Kalimat Fakta',
                                            6 => '6. Penggunaan Istilah Ilmiah',
                                            7 => '7. Kerapian Tulisan & Ejaan',
                                        ];

                                        $deskriptor = [
                                            1 => [
                                                4 => 'Topik disajikan dengan sangat jelas, menarik, dan menggambarkan keseluruhan gejala atau proses secara utuh.',
                                                3 => 'Topik cukup jelas dan sesuai; pengantar ada namun kurang menarik.',
                                                2 => 'Topik kurang jelas dan tidak menggambarkan gejala secara utuh.',
                                                1 => 'Tidak ada pernyataan umum atau sangat tidak jelas.',
                                            ],
                                            2 => [
                                                4 => 'Penjelasan sangat runtut, logis, dan sistematis dengan penggunaan hubungan sebab-akibat atau urutan waktu secara tepat.',
                                                3 => 'Penjelasan cukup runtut dan logis; sebagian besar hubungan sebab-akibat atau kronologis digunakan dengan benar.',
                                                2 => 'Penjelasan kurang runtut atau sebagian besar hubungan sebab-akibat tidak digunakan dengan tepat.',
                                                1 => 'Penjelasan acak, tidak logis, dan tidak mengikuti struktur teks eksplanasi.',
                                            ],
                                            3 => [
                                                4 => 'Simpulan menggambarkan pemahaman mendalam; mengandung refleksi atau pesan akhir yang relevan dan sesuai dengan isi penjelasan.',
                                                3 => 'Simpulan menggambarkan isi penjelasan secara ringkas dan sesuai.',
                                                2 => 'Simpulan terlalu umum atau hanya mengulang isi penjelasan tanpa makna tambahan.',
                                                1 => 'Tidak ada simpulan atau simpulan tidak relevan dengan isi penjelasan.',
                                            ],
                                            4 => [
                                                4 => 'Menggunakan berbagai konjungsi sebab-akibat dan kronologis secara tepat dan konsisten dalam seluruh teks.',
                                                3 => 'Menggunakan beberapa konjungsi kausal dan kronologis secara cukup tepat.',
                                                2 => 'Hanya sedikit konjungsi yang digunakan; penggunaannya kurang tepat.',
                                                1 => 'Tidak ada atau penggunaan konjungsi tidak sesuai konteks.',
                                            ],
                                            5 => [
                                                4 => 'Sebagian besar kalimat berupa fakta yang relevan, objektif, dan mendukung penjelasan topik secara ilmiah.',
                                                3 => 'Sebagian kalimat berupa fakta yang cukup relevan.',
                                                2 => 'Kalimat fakta digunakan namun kurang mendukung isi atau hanya sebagian kecil dari keseluruhan teks.',
                                                1 => 'Tidak ada kalimat fakta atau isinya lebih banyak opini dan asumsi pribadi.',
                                            ],
                                            6 => [
                                                4 => 'Menggunakan istilah ilmiah yang tepat, sesuai konteks, dan membantu menjelaskan topik secara lebih jelas.',
                                                3 => 'Menggunakan beberapa istilah ilmiah yang sesuai, meskipun belum konsisten.',
                                                2 => 'Menggunakan istilah ilmiah yang kurang tepat atau sangat terbatas.',
                                                1 => 'Tidak ada istilah ilmiah atau penggunaan istilah tidak sesuai konteks.',
                                            ],
                                            7 => [
                                                4 => 'Tulisan sangat rapi, mudah dibaca, ejaan dan tanda baca hampir tanpa kesalahan.',
                                                3 => 'Tulisan cukup rapi, kesalahan ejaan/tanda baca minimal dan tidak mengganggu pemahaman.',
                                                2 => 'Tulisan kurang rapi; cukup banyak kesalahan ejaan/tanda baca yang mengganggu pemahaman.',
                                                1 => 'Tulisan tidak terbaca dengan baik; banyak kesalahan ejaan dan tanda baca.',
                                            ],
                                        ];
                                    @endphp

                                    @foreach ($aspek as $key => $judul)
                                    <tr>
                                        <td class="text-start">{{ $judul }}</td>
                                        @for ($skor = 4; $skor >= 1; $skor--)
                                        <td>
                                            <input
                                                type="checkbox"
                                                name="indikator[{{ $key }}][]"
                                                value="{{ $skor }}"
                                                class="form-check-input"
                                                id="indikator_{{ $key }}_{{ $skor }}"
                                                data-bs-toggle="popover"
                                                data-bs-trigger="hover focus"
                                                data-bs-placement="top"
                                                data-bs-content="{{ $deskriptor[$key][$skor] }}"
                                                @php
                                                    $indikatorKey = "indikator_$key";
                                                    $checked = false;

                                                    if (old("indikator.$key") && in_array($skor, old("indikator.$key"))) {
                                                        $checked = true;
                                                    } elseif (isset($tugas->penilaian) && $tugas->penilaian->$indikatorKey) {
                                                        $checked = (int)$tugas->penilaian->$indikatorKey === $skor;
                                                    }
                                                @endphp
                                                {{ $checked ? 'checked' : '' }}
                                            >
                                        </td>
                                        @endfor
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <!-- Deskripsi saat hover -->
                        <div id="deskripsiPopover" class="alert alert-info mt-3 d-none"></div>

                        <div class="form-group mt-4">
                            <label for="komentar">Komentar</label>
                            <textarea name="komentar" id="komentar" class="form-control" rows="3">{{ old('komentar', $tugas->penilaian->komentar ?? '') }}</textarea>
                        </div>

                        <button type="button" class="btn btn-success mt-3" id="btnSimpan">Simpan Penilaian</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal gambar -->
<div class="modal fade" id="modalImage" tabindex="-1" aria-labelledby="modalImageLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content bg-transparent border-0">
            <div class="modal-body text-center p-0">
                <img src="{{ asset('storage/' . $tugas->foto) }}" class="img-fluid rounded">
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    // Aktifkan popover Bootstrap 5
    document.addEventListener('DOMContentLoaded', function () {
        const popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'));
        popoverTriggerList.map(function (el) {
            return new bootstrap.Popover(el);
        });
    });

    // Hover deskripsi manual
    document.querySelectorAll('input[type="checkbox"]').forEach(function (checkbox) {
        checkbox.addEventListener('mouseover', function () {
            const deskripsi = this.getAttribute('data-bs-content');
            const box = document.getElementById('deskripsiPopover');
            box.innerText = deskripsi;
            box.classList.remove('d-none');
        });

        checkbox.addEventListener('mouseout', function () {
            document.getElementById('deskripsiPopover').classList.add('d-none');
        });

        // Cek hanya satu per baris
        checkbox.addEventListener('change', function () {
            const name = this.name;
            const checkboxes = document.querySelectorAll(`input[name="${name}"]`);
            if (this.checked) {
                checkboxes.forEach(function (box) {
                    if (box !== checkbox) {
                        box.checked = false;
                    }
                });
            }
        });
    });

    // Konfirmasi simpan
    document.getElementById('btnSimpan').addEventListener('click', function () {
        Swal.fire({
            title: 'Yakin ingin menyimpan penilaian?',
            text: "Pastikan semua aspek telah dinilai.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#198754',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, simpan!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('formPenilaian').submit();
            }
        });
    });

    // Modal gambar
    document.getElementById('imgPreview').addEventListener('click', function () {
        new bootstrap.Modal(document.getElementById('modalImage')).show();
    });

    // Zoom saat scroll
    window.addEventListener('scroll', function () {
        const img = document.getElementById('imgPreview');
        const scrollY = window.scrollY;
        if (scrollY > 100) {
            img.style.transform = 'scale(1.2)';
            img.style.zIndex = '10';
        } else {
            img.style.transform = 'scale(1)';
        }
    });
</script>
@endsection
