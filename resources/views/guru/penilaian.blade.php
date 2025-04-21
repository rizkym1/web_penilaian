@extends('layouts.sbadmin')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Penilaian Tugas</h1>

    <div class="card shadow mb-4">
        <div class="card-header bg-primary text-white">
            <h6 class="m-0 font-weight-bold">Form Penilaian</h6>
        </div>
        <div class="card-body">
            <h5 class="mb-3">Nama Siswa: {{ $tugas->user->name }}</h5>

            <img src="{{ asset('storage/' . $tugas->foto) }}" class="img-thumbnail mb-4" width="300">

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

                <div class="form-group mt-4">
                    <label for="komentar">Komentar</label>
                    <textarea name="komentar" id="komentar" class="form-control" rows="3">{{ old('komentar', $tugas->penilaian->komentar ?? '') }}</textarea>
                </div>

                <button type="button" class="btn btn-success mt-3" id="btnSimpan">Simpan Penilaian</button>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    // // Tampilkan notifikasi jika penilaian berhasil
    // @if(session('success'))
    //     Swal.fire({
    //         icon: 'success',
    //         title: 'Berhasil!',
    //         text: '{{ session("success") }}',
    //         showConfirmButton: false,
    //         timer: 2000
    //     });
    // @endif

    // Konfirmasi sebelum simpan penilaian
    document.getElementById('btnSimpan').addEventListener('click', function(e) {
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
</script>
@endsection
