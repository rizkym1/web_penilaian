<?php

namespace App\Http\Controllers;

use App\Models\Tugas;

class TugasController extends Controller
{
    public function index()
    {
        $tugas = Tugas::with('user')->get();
        return view('guru.tugas', compact('tugas'));
    }

    public function show($id)
{
    $tugas = Tugas::findOrFail($id);
    return view('guru.penilaian', compact('tugas'));
}
}
