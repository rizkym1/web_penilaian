<h2>Daftar Tugas Siswa</h2>
<table>
    <tr>
        <th>Nama Siswa</th>
        <th>Gambar</th>
        <th>Status</th>
        <th>Aksi</th>
    </tr>
    {{-- @foreach($tugas as $item)
    <tr>
        <td>{{ $item->user->name }}</td>
        <td><img src="{{ asset('storage/' . $item->foto) }}" width="100"></td>
        <td>{{ $item->penilaian ? 'Sudah Dinilai' : 'Belum Dinilai' }}</td>
        <td><a href="{{ url('/penilaian/'.$item->id) }}">Nilai</a></td>
    </tr>
    @endforeach --}}
</table>
