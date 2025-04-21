<?php

namespace App\Exports;

use App\Models\Penilaian;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

// class PenilaianExport implements FromCollection, WithHeadings
// {
//     public function collection()
//     {
//         return Penilaian::with('tugas.user')->get()->map(function ($penilaian) {
//             // Hitung nilai akhir berdasarkan skor yang didapat (skor_total) dan jumlah skor maksimal (28)
//             $nilaiAkhir = ($penilaian->skor_total * 100) / 28; // 28 adalah skor maksimal

//             return [
//                 $penilaian->tugas->user->name ?? '-',
//                 $penilaian->indikator_1,
//                 $penilaian->indikator_2,
//                 $penilaian->indikator_3,
//                 $penilaian->indikator_4,
//                 $penilaian->indikator_5,
//                 $penilaian->komentar,
//                 $penilaian->skor_total,
//                 $nilaiAkhir, // Nilai Akhir dalam bentuk persentase
//             ];
//         });
//     }

//     public function headings(): array
//     {
//         return [
//             'Nama Siswa',
//             'Indikator 1',
//             'Indikator 2',
//             'Indikator 3',
//             'Indikator 4',
//             'Indikator 5',
//             'Komentar',
//             'Skor Total',
//             'Nilai Akhir', // Nilai Akhir dalam persentase
//         ];
//     }
// }

