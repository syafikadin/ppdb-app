<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Support\Facades\DB;

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

         fputcsv($handle, ['LAPORAN PPDB']);
         fputcsv($handle, ['Nama Sekolah', config('app.name', 'PPDB App')]);
         fputcsv($handle, ['Alamat Sekolah', '-']);
         fputcsv($handle, ['Tanggal Export', now()->format('d F Y')]);
         fputcsv($handle, []);
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
         ->verified()
         ->leftJoin('nilais', 'siswas.id', '=', 'nilais.siswa_id')
         ->select('siswas.*', DB::raw('COALESCE((nilais.wawancara + nilais.baca_alquran + nilais.tulis_alquran) / 3, 0) as rata_rata_nilai'))
         ->orderByDesc('rata_rata_nilai')
         ->orderBy('nama_siswa');
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
