<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LihatNilaiController extends Controller
{
    public function lihat()
    {
        // Mengambil user yang sedang login
        $user = Auth::user();

        // Mengambil tugas terkait dengan user yang sedang login
        $tugas = $user->tugas()->with('penilaian')->get();

        // Mengirim data tugas dan user ke view
        return view('siswa.hasil', compact('tugas', 'user'));
    }
}
