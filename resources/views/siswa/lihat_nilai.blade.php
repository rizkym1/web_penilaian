@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Nilai Tugas Saya</h2>

    @forelse($tugas as $t)
        <div style="border: 1px solid #ccc; padding: 10px; margin-bottom: 10px;">
            <p><strong>Tugas:</strong></p>
            <img src="{{ asset('storage/' . $t->foto) }}" width="250"><br><br>

            @if($t->penilaian)
                <p><strong>Nilai:</strong></p>
                <ul>
                    @for ($i = 1; $i <= 5; $i++)
                        <li>Indikator {{ $i }}: {{ $t->penilaian->{'indikator_' . $i} ? '✓' : '✗' }}</li>
                    @endfor
                </ul>
                <p><strong>Skor Total: </strong>{{ $t->penilaian->skor_total }}</p>
            @else
                <p><em>Belum dinilai</em></p>
            @endif
        </div>
    @empty
        <p>Tidak ada tugas yang diupload.</p>
    @endforelse
</div>
@endsection
