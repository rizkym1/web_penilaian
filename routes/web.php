<?php

use App\Exports\PenilaianExport;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UploadTugasController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LihatNilaiController;
use App\Http\Controllers\PenilaianController;
use App\Http\Controllers\TugasController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Artisan;
use Maatwebsite\Excel\Facades\Excel;

Route::get('/storage-link', function () {
  Artisan::call('storage-link');
  return 'Storage linked Succcessfully';
});

Route::post('/login', [AuthenticatedSessionController::class, 'store']);
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');


// Route::get('/', function () {
//     return redirect()->route('login');
// });

Route::get('/', function(){
  return view('landing');
});

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
Route::get('/rubrik', [DashboardController::class, 'rubrik'])->name('rubrik.index');
Route::get('/panduan', [DashboardController::class, 'panduan'])->name('panduan.index');
Route::get('/tentang', [DashboardController::class, 'tentang'])->name('tentang.index');
Route::get('/pengembang', [DashboardController::class, 'pengembang'])->name('pengembang.index');
// Route::get('/export', function () {
//   return Excel::download(new PenilaianExport, 'penilaian.xlsx');
// })->name('penilaian.export');
});




require __DIR__.'/auth.php';
