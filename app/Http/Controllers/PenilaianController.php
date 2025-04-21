<?php

namespace App\Http\Controllers;

use App\Models\Penilaian;
use Illuminate\Http\Request;
use App\Models\Tugas;

class PenilaianController extends Controller
{
    public function index()
    {
        $tugas = Tugas::with(['user', 'penilaian'])->get();
        return view('guru.tugas', compact('tugas'));
    }

    public function nilaiTugas($id)
    {
        $tugas = Tugas::with(['user', 'penilaian'])->findOrFail($id);
        return view('guru.penilaian', compact('tugas'));
    }

    public function simpan(Request $request, $tugas_id)
    {
        $validated = $request->validate([
            'indikator' => 'required|array|size:7',
            'komentar' => 'nullable|string',
        ]);

        $tugas = Tugas::findOrFail($tugas_id);
        $data = $request->input('indikator');

        $i1 = max($data[1] ?? [0]);
        $i2 = max($data[2] ?? [0]);
        $i3 = max($data[3] ?? [0]);
        $i4 = max($data[4] ?? [0]);
        $i5 = max($data[5] ?? [0]);
        $i6 = max($data[6] ?? [0]);
        $i7 = max($data[7] ?? [0]);

        $skorTotal = $i1 + $i2 + $i3 + $i4 + $i5 + $i6 + $i7;
        $nilaiAkhir = intval($skorTotal * 100 / 28);

        if ($skorTotal >= 25) {
            $kategori = 'Sangat Baik';
        } elseif ($skorTotal >= 19) {
            $kategori = 'Baik';
        } elseif ($skorTotal >= 13) {
            $kategori = 'Cukup';
        } elseif ($skorTotal >= 7) {
            $kategori = 'Perlu Bimbingan';
        } else {
            $kategori = 'Tidak Dinilai';
        }

        Penilaian::updateOrCreate(
            ['tugas_id' => $tugas_id],
            [
                'indikator_1' => (int)$i1,
                'indikator_2' => (int)$i2,
                'indikator_3' => (int)$i3,
                'indikator_4' => (int)$i4,
                'indikator_5' => (int)$i5,
                'indikator_6' => (int)$i6,
                'indikator_7' => (int)$i7,
                'skor_total' => $skorTotal,
                'nilai_akhir' => $nilaiAkhir,
                'kategori' => $kategori,
                'komentar' => $request->input('komentar'),
            ]
        );

        return redirect()
            ->route('penilaian.index', $tugas_id)
            ->with('success', "Penilaian berhasil disimpan! Total Skor: $skorTotal / 28. Nilai: $nilaiAkhir. Kategori: $kategori");
    }
}
