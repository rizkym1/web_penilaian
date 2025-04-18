<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Tugas;

class UploadTugasController extends Controller
{
    public function form()
    {
        return view('siswa.upload');
    }

    public function simpan(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'foto' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Simpan user dengan nama, buat email dan password dummy
        $user = User::firstOrCreate(
            ['name' => $request->nama],
            ['email' => strtolower(str_replace(' ', '', $request->nama)) . '@siswa.local', 'password' => bcrypt('12345678'), 'role' => 'siswa']
        );

        // Upload foto tugas
        $path = $request->file('foto')->store('tugas', 'public');

        // Simpan ke tabel tugas
        $user->tugas()->create([
            'foto' => $path,
        ]);

        return redirect()->back()->with('success', 'Tugas berhasil dikirim! Tunggu Penilaian dari guru yaa……');
    }
}
