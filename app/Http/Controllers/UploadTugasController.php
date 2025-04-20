<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Tugas;

class UploadTugasController extends Controller
{
    public function index()
    {
        // Pastikan user sudah login
        if (Auth::check()) {
            return view('siswa.upload'); // Tidak perlu mengirim data user lagi ke view
        }

        // Jika user tidak login, redirect ke halaman login
        return redirect()->route('login');
    }

    public function simpan(Request $request)
    {
        // Validasi hanya untuk foto
        $request->validate([
            'foto' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Ambil user yang sedang login
        $user = Auth::user(); 

        // Upload foto tugas
        $path = $request->file('foto')->store('tugas', 'public');

        // Simpan ke tabel tugas untuk user yang sedang login
        $user->tugas()->create([
            'foto' => $path,
        ]);

        // Redirect dengan pesan sukses
        return redirect()->back()->with('success', 'Tugas berhasil dikirim! Tunggu Penilaian dari guru yaa……');
    }
}
