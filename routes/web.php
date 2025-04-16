<?php
use Illuminate\Support\Facades\Route;

// Guru Dashboard Routes (tanpa controller)
Route::get('/', function () {
    return view('guru.dashboard');
})->name('guru.dashboard');

Route::get('/guru/tugas', function () {
    return view('guru.tugas');
})->name('guru.tugas');

Route::get('/guru/penilaian', function () {
    return view('guru.penilaian');
})->name('guru.penilaian');





