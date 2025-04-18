<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class LihatNilaiController extends Controller
{
    public function form()
    {
        return view('siswa.lihat_nilai');
    }

    public function lihat(Request $request)
    {
        $request->validate([
            'nama' => 'required|string'
        ]);

        $user = User::where('name', $request->nama)->first();

        if (!$user) {
            return back()->with('error', 'Siswa tidak ditemukan.');
        }

        $tugas = $user->tugas()->with('penilaian')->get();

        return view('siswa.hasil', compact('tugas', 'user'));
    }
}
