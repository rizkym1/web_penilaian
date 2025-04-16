<?php
namespace App\Http\Controllers;

use App\Models\Penilaian;
use Illuminate\Http\Request;
use App\Models\Tugas;

class PenilaianController extends Controller
{
    public function index()
    {
        $tugas = Tugas::with('user')->get(); // jika relasi user ada
        return view('guru.penilaian', compact('tugas'));
    }

    public function nilaiTugas($id)
{
    $tugas = Tugas::with('user')->findOrFail($id);
    return view('guru.penilaian', compact('tugas'));
}

public function simpan(Request $request, $tugas_id)
{
    // Validasi agar minimal 1 indikator dipilih
    $validated = $request->validate([
        'indikator' => 'required|array|min:1', // Pastikan indikator adalah array dan minimal 1 dipilih
        'indikator.*' => 'boolean', // Pastikan nilai indikator berupa boolean (true/false)
    ]);

    // Ambil data tugas
    $tugas = Tugas::findOrFail($tugas_id);

    // Menyimpan data penilaian
    $penilaian = new Penilaian();
    $penilaian->tugas_id = $tugas->id;

    // Cek dan simpan nilai indikator
    $penilaian->indikator_1 = in_array(1, $request->indikator);
    $penilaian->indikator_2 = in_array(2, $request->indikator);
    $penilaian->indikator_3 = in_array(3, $request->indikator);
    $penilaian->indikator_4 = in_array(4, $request->indikator);
    $penilaian->indikator_5 = in_array(5, $request->indikator);

    // Menghitung skor total berdasarkan indikator yang dipilih
    $penilaian->skor_total = $penilaian->indikator_1 + $penilaian->indikator_2 + $penilaian->indikator_3 + $penilaian->indikator_4 + $penilaian->indikator_5;

    // Simpan ke database
    $penilaian->save();

    // Redirect ke halaman penilaian dengan pesan sukses
    return redirect()->route('penilaian.siswa', $tugas->id)
                     ->with('success', 'Penilaian berhasil disimpan!');
}


}
