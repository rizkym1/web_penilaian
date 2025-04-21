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

public function destroy($id)
{
    $tugas = Tugas::findOrFail($id);
    $tugas->delete();
    
    return redirect()->route('tugas.index')->with('success', 'Tugas berhasil dihapus!');
}

}
