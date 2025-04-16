<?php

namespace App\Http\Controllers;

use App\Models\Tugas;
use App\Models\Penilaian;

class DashboardController extends Controller
{
    public function index()
    {
        $totalTugas = Tugas::count();
        $sudahDinilai = Penilaian::count();
        $belumDinilai = $totalTugas - $sudahDinilai;

        return view('guru.dashboard', compact('totalTugas', 'sudahDinilai', 'belumDinilai'));
    }
}
