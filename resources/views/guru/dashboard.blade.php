@extends('layouts.sidebar')

@section('content')
<h2>Selamat datang, Guru!</h2>

<div class="row g-4 mt-4">
    <div class="col-md-4">
        <div class="card text-bg-primary shadow">
            <div class="card-body">
                <h5 class="card-title">Total Tugas</h5>
                <p class="fs-3">25</p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card text-bg-success shadow">
            <div class="card-body">
                <h5 class="card-title">Sudah Dinilai</h5>
                <p class="fs-3">15</p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card text-bg-warning shadow">
            <div class="card-body">
                <h5 class="card-title">Belum Dinilai</h5>
                <p class="fs-3">10</p>
            </div>
        </div>
    </div>
</div>
@endsection
