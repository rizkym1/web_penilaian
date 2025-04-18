<?php

namespace App\Http\Controllers;

use App\Models\Tugas;
use App\Models\Penilaian;

class DashboardController extends Controller
{
    public function index()
    {
        $totalTugas = Tugas::count();

        // Hanya ambil tugas_id unik yang sudah dinilai
        $sudahDinilai = Penilaian::distinct('tugas_id')->count('tugas_id');

        // Hitung tugas yang belum dinilai
        $belumDinilai = $totalTugas - $sudahDinilai;

        // Cegah angka negatif kalau ada inkonsistensi data
        if ($belumDinilai < 0) {
            $belumDinilai = 0;
        }

        return view('guru.dashboard', compact('totalTugas', 'sudahDinilai', 'belumDinilai'));
    }
}

