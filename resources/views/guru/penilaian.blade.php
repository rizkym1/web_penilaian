@extends('layouts.sidebar')

@section('content')
<h2>Penilaian Tugas</h2>

<div class="table-responsive mt-4">
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Nama Siswa</th>
                <th>Skor</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @for($i = 1; $i <= 5; $i++)
            <tr>
                <td>{{ $i }}</td>
                <td>Siswa {{ $i }}</td>
                <td>{{ rand(60, 100) }}</td>
                <td><a href="#" class="btn btn-sm btn-outline-primary">Lihat Detail</a></td>
            </tr>
            @endfor
        </tbody>
    </table>
</div>
@endsection
