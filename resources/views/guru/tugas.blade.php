@extends('layouts.sbadmin')

@section('content')
<div class="container-fluid">
    <h3 class="mb-4">Daftar Tugas Siswa</h3>

    <div class="row">
        @foreach ($tugas as $item)
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->user->name ?? 'Nama tidak ditemukan' }}</h5>
                        <img src="{{ asset('storage/' . $item->foto) }}" class="img-fluid rounded" alt="Tugas">
                        <a href="{{ route('penilaian.siswa', $item->id) }}" class="btn btn-primary mt-3">Nilai Tugas</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
