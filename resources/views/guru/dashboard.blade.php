@extends('layouts.sbadmin')

@section('content')
<h1 class="h3 mb-4 text-gray-800">Dashboard</h1>
<div class="row">
    <div class="col-md-4">
        <div class="card border-left-primary shadow py-2">
            <div class="card-body">
                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Tugas</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalTugas }}</div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card border-left-success shadow py-2">
            <div class="card-body">
                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Sudah Dinilai</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $sudahDinilai }}</div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card border-left-warning shadow py-2">
            <div class="card-body">
                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Belum Dinilai</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $belumDinilai }}</div>
            </div>
        </div>
    </div>
</div>
@endsection
