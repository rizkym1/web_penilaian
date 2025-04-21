@extends('layouts.sbadmin')

@section('content')
<div class="container-fluid">
    <h3 class="mb-4">Daftar Tugas Siswa</h3>

    <div class="card shadow-sm p-4">
        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle text-center">
                <thead class="table-primary">
                    <tr>
                        <th>No</th>
                        <th>Nama Siswa</th>
                        <th>Foto Tugas</th>
                        <th>Tanggal Unggah</th> <!-- Kolom baru -->
                        <th>Status Penilaian</th>
                        <th>Skor Nilai</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($tugas as $index => $item)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $item->user->name ?? 'Tidak ada nama' }}</td>
                            <td>
                                <img src="{{ asset('storage/' . $item->foto) }}" alt="Foto Tugas" width="100">
                            </td>
                            <td>
                                {{ \Carbon\Carbon::parse($item->created_at)->format('d M Y') }}
                            </td>
                            <td>
                                @if ($item->penilaian)
                                    <span class="badge bg-success">Sudah Dinilai</span>
                                @else
                                    <span class="badge bg-warning text-dark">Belum Dinilai</span>
                                @endif
                            </td>
                            <td>
                                @if ($item->penilaian)
                                    @php
                                        $skor = $item->penilaian->skor_total;
                                        $nilai_akhir = intval($skor * 100 / 28);

                                        if ($skor >= 25) {
                                            $kategori = 'Sangat Baik';
                                        } elseif ($skor >= 19) {
                                            $kategori = 'Baik';
                                        } elseif ($skor >= 13) {
                                            $kategori = 'Cukup';
                                        } elseif ($skor >= 7) {
                                            $kategori = 'Perlu Bimbingan';
                                        } else {
                                            $kategori = 'Belum Dinilai';
                                        }
                                    @endphp
                                    {{ $skor }} / 28<br>
                                    <small class="text-muted">Nilai: {{ $nilai_akhir }}</small><br>
                                    <small class="d-block">Kategori: <strong>{{ $kategori }}</strong></small>
                                @else
                                    -
                                @endif
                            </td>
                            <td>
                                @if ($item->penilaian)
                                    <a href="{{ route('penilaian.siswa', $item->id) }}" class="btn btn-sm btn-info">Edit Nilai</a>
                                @else
                                    <a href="{{ route('penilaian.siswa', $item->id) }}" class="btn btn-sm btn-primary">Nilai Tugas</a>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7">Belum ada tugas yang dikumpulkan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    @if(session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: '{{ session('success') }}',
            showConfirmButton: false,
            timer: 2500
        });
    @endif
</script>
@endsection
