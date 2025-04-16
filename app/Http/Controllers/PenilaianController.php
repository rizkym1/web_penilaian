<?php
namespace App\Http\Controllers;

use App\Models\Tugas;
use App\Models\Penilaian;
use Illuminate\Http\Request;

class PenilaianController extends Controller
{
    public function form($id)
    {
        $tugas = Tugas::with('user')->findOrFail($id);
        $penilaian = $tugas->penilaian;

        return view('guru.penilaian_form', compact('tugas', 'penilaian'));
    }

    public function simpan(Request $request, $id)
    {
        $skor = 0;
        foreach (range(1,5) as $i) {
            if ($request->has("indikator_$i")) {
                $skor += 20;
            }
        }

        Penilaian::updateOrCreate(
            ['tugas_id' => $id],
            [
                'indikator_1' => $request->boolean('indikator_1'),
                'indikator_2' => $request->boolean('indikator_2'),
                'indikator_3' => $request->boolean('indikator_3'),
                'indikator_4' => $request->boolean('indikator_4'),
                'indikator_5' => $request->boolean('indikator_5'),
                'skor_total' => $skor,
            ]
        );

        return redirect()->route('guru.tugas')->with('success', 'Penilaian berhasil disimpan.');
    }
}
