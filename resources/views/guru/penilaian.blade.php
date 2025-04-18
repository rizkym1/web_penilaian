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

            <form action="{{ route('penilaian.simpan', $tugas->id) }}" method="POST">
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
                                            
                                            // Cek jika data ada di old input (dari validasi error)
                                            if (old("indikator.$key") && in_array($skor, old("indikator.$key"))) {
                                                $checked = true;
                                            }
                                            // Jika tidak ada di old input, cek dari penilaian yang sudah ada
                                            elseif (isset($tugas->penilaian) && $tugas->penilaian->$indikatorKey) {
                                                // Periksa apakah nilai indikator sama dengan skor saat ini
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

                <button type="submit" class="btn btn-success mt-3">Simpan Penilaian</button>
            </form>
        </div>
    </div>
</div>
@endsection