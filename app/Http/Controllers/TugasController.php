<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tugas;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class TugasController extends Controller
{
    public function index()
    {
        return view('siswa.upload');
    }

    public function upload(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'foto' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Simpan user jika belum ada
        $user = User::firstOrCreate(
            ['name' => $request->nama],
            ['email' => $request->nama . '@siswa.local', 'password' => bcrypt('default'), 'role' => 'siswa']
        );

        $path = $request->file('foto')->store('tugas', 'public');

        $user->tugas()->create([
            'foto' => $path
        ]);

        return back()->with('success', 'Tugas berhasil diupload!');
    }

    public function lihatNilai(Request $request)
    {
        $nama = $request->query('nama');

        $user = User::where('name', $nama)->first();

        if (!$user) return "Siswa tidak ditemukan.";

        $tugas = $user->tugas()->with('penilaian')->get();

        return view('siswa.lihat_nilai', compact('tugas', 'nama'));
    }
}
