<?php

namespace App\Http\Controllers;

use App\Models\Siswa;

class LaporanPpdbController extends Controller
{
   public function index()
   {
      $title = 'Laporan PPDB';
      $laporan = $this->laporanQuery()->paginate(15);

      return view('pages.admin.laporan-ppdb.index', compact('title', 'laporan'));
   }

   public function export()
   {
      $laporan = $this->laporanQuery()->get();
      $filename = 'laporan-ppdb-' . now()->format('Ymd_His') . '.csv';

      $headers = [
         'Content-Type' => 'text/csv; charset=UTF-8',
      ];

      return response()->streamDownload(function () use ($laporan) {
         $handle = fopen('php://output', 'w');

         // Tambah BOM supaya file CSV terbaca baik di Excel.
         fwrite($handle, chr(0xEF) . chr(0xBB) . chr(0xBF));

         fputcsv($handle, [
            'No',
            'Nama Siswa',
            'NISN',
            'Asal Sekolah',
            'Gelombang',
            'Status Pendaftaran',
            'Kelulusan',
            'Nilai Wawancara',
            'Nilai Baca Alquran',
            'Nilai Tulis Alquran',
            'Rata-rata Nilai',
         ]);

         foreach ($laporan as $index => $siswa) {
            $nilai = $siswa->nilai;

            fputcsv($handle, [
               $index + 1,
               $siswa->nama_siswa,
               $siswa->nisn,
               $siswa->asal_sekolah,
               optional($siswa->gelombang)->nama_gelombang ?? '-',
               $siswa->status,
               $this->kelulusanStatus($siswa->status),
               $nilai->wawancara ?? '-',
               $nilai->baca_alquran ?? '-',
               $nilai->tulis_alquran ?? '-',
               $this->rataRataNilai($nilai),
            ]);
         }

         fclose($handle);
      }, $filename, $headers);
   }

   private function laporanQuery()
   {
      return Siswa::with(['gelombang:id,nama_gelombang', 'nilai:siswa_id,wawancara,baca_alquran,tulis_alquran'])
         ->whereHas('pendaftar')
         ->latest();
   }

   private function kelulusanStatus(string $status): string
   {
      if ($status === 'Lulus') {
         return 'Lulus';
      }

      if ($status === 'Tidak Lulus') {
         return 'Tidak Lulus';
      }

      return 'Belum Diumumkan';
   }

   private function rataRataNilai($nilai): string
   {
      if (!$nilai) {
         return '-';
      }

      $rataRata = ($nilai->wawancara + $nilai->baca_alquran + $nilai->tulis_alquran) / 3;

      return number_format($rataRata, 2);
   }
}
