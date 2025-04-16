@extends('layouts.sbadmin')

@section('content')
<div class="container-fluid">
    <h3 class="mb-4">Penilaian Tugas Siswa</h3>

    <div class="card shadow p-4">
        <h5>Nama Siswa: {{ $tugas->user->name }}</h5>
        <p><strong>Foto Tugas:</strong></p>
        <img src="{{ asset('storage/' . $tugas->foto) }}" class="img-fluid rounded mb-4" width="300">

        <!-- Menampilkan pesan error jika tidak ada indikator yang dipilih -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('penilaian.simpan', $tugas->id) }}" method="POST">
            @csrf
            <h5>Checklist Penilaian:</h5>

            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="indikator[]" value="1" id="indikator1">
                <label class="form-check-label" for="indikator1">Kerapihan</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="indikator[]" value="2" id="indikator2">
                <label class="form-check-label" for="indikator2">Kesesuaian dengan instruksi</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="indikator[]" value="3" id="indikator3">
                <label class="form-check-label" for="indikator3">Kreativitas</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="indikator[]" value="4" id="indikator4">
                <label class="form-check-label" for="indikator4">Kelengkapan</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="indikator[]" value="5" id="indikator5">
                <label class="form-check-label" for="indikator5">Keterbacaan</label>
            </div>

            <button type="submit" class="btn btn-success mt-3">Simpan Penilaian</button>
        </form>
    </div>
</div>
@endsection
