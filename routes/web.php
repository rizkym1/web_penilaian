<?php

use App\Exports\PenilaianExport;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UploadTugasController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LihatNilaiController;
use App\Http\Controllers\PenilaianController;
use App\Http\Controllers\TugasController;
use App\Http\Controllers\UserController;
use Maatwebsite\Excel\Facades\Excel;

Route::post('/login', [AuthenticatedSessionController::class, 'store']);
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');


Route::get('/', function () {
    return redirect()->route('login');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
//SISWA
Route::middleware('auth', 'siswa')->group(function(){
  Route::get('/upload-tugas', [UploadTugasController::class, 'index'])->name('siswa.index');
Route::post('/upload-tugas', [UploadTugasController::class, 'simpan']);


// Route::get('/lihat-nilai', [LihatNilaiController::class, 'form']);
Route::get('/lihat-nilai', [LihatNilaiController::class, 'lihat'])->name('lihat-nilai');


});
//GURU
Route::middleware('auth', 'guru')->group(function(){
  Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
  Route::resource('users', UserController::class);
Route::get('/tugas', [TugasController::class, 'index'])->name('tugas.index');
Route::delete('tugas/{id}', [TugasController::class, 'destroy'])->name('tugas.destroy');


Route::get('/penilaian', [PenilaianController::class, 'index'])->name('penilaian.index');
Route::get('/penilaian/{id}', [PenilaianController::class, 'nilaiTugas'])->name('penilaian.siswa');

// Route::post('/penilaian/{id}', [PenilaianController::class, 'simpan'])->name('penilaian.simpan');
Route::post('/penilaian/{tugas}/simpan', [PenilaianController::class, 'simpan'])->name('penilaian.simpan');
// Route::get('/export', function () {
//   return Excel::download(new PenilaianExport, 'penilaian.xlsx');
// })->name('penilaian.export');
});




require __DIR__.'/auth.php';
