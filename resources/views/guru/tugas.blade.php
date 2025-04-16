@extends('layouts.sidebar')

@section('content')
<h2>Daftar Tugas Siswa</h2>

<div class="row mt-4">
    @for($i = 1; $i <= 3; $i++)
    <div class="col-md-4 mb-4">
        <div class="card shadow-sm">
            <div class="card-body">
                <h5 class="card-title">Nama Siswa {{ $i }}</h5>
                <img src="https://via.placeholder.com/300x200" class="img-fluid rounded mb-3" alt="Foto Tugas">
                <a href="#" class="btn btn-primary w-100">Nilai Tugas</a>
            </div>
        </div>
    </div>
    @endfor
</div>
@endsection
