<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LihatNilaiController;
use App\Http\Controllers\TugasController;
use App\Http\Controllers\PenilaianController;
use App\Http\Controllers\UploadTugasController;

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/tugas', [TugasController::class, 'index'])->name('tugas.index');

Route::get('/penilaian', [PenilaianController::class, 'index'])->name('penilaian.index');
Route::get('/penilaian/{id}', [PenilaianController::class, 'nilaiTugas'])->name('penilaian.siswa');
// Route::post('/penilaian/{id}', [PenilaianController::class, 'simpan'])->name('penilaian.simpan');
Route::post('/penilaian/{tugas}/simpan', [PenilaianController::class, 'simpan'])->name('penilaian.simpan');


Route::get('/upload-tugas', [UploadTugasController::class, 'form']);
Route::post('/upload-tugas', [UploadTugasController::class, 'simpan']);


Route::get('/lihat-nilai', [LihatNilaiController::class, 'form']);
Route::post('/lihat-nilai', [LihatNilaiController::class, 'lihat']);


