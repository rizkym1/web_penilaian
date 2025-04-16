<?php

namespace App\Http\Controllers;

use App\Models\Tugas;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $total = Tugas::count();
        $dinilai = Tugas::has('penilaian')->count();
        $belumDinilai = $total - $dinilai;

        return view('guru.dashboard', compact('total', 'dinilai', 'belumDinilai'));
    }

    public function tugas()
    {
        $tugas = Tugas::with('user')->get();
        return view('guru.tugas', compact('tugas'));
    }
}
