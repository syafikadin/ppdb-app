<?php

namespace App\Http\Controllers;

use App\Models\Gelombang;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Mpdf\Mpdf;

class DashboardSiswaController extends Controller
{
    public function index()
    {
        $title = 'Dashboard';

        $siswa = Siswa::with('gelombang')
            ->where('user_id', auth()->id())
            ->firstOrFail();

        $gelombangAktif = null;

        if ($siswa->gelombang_id) {
            $gelombangAktif = Gelombang::with([
                'timelines' => function ($query) {
                    $query->orderBy('urutan');
                }
            ])->find($siswa->gelombang_id);
        }

        if (!$gelombangAktif) {
            $gelombangAktif = Gelombang::with([
                'timelines' => function ($query) {
                    $query->orderBy('urutan');
                }
            ])->where('status', 'Open')->latest()->first();
        }

        if (!$gelombangAktif) {
            $gelombangAktif = Gelombang::with([
                'timelines' => function ($query) {
                    $query->orderBy('urutan');
                }
            ])->latest()->first();
        }

        $timelines = $gelombangAktif ? $gelombangAktif->timelines : collect();

        $profilLengkap = collect([
            $siswa->nama_siswa,
            $siswa->nisn,
            $siswa->jenis_kelamin,
            $siswa->asal_sekolah,
            $siswa->tempat_lahir,
            $siswa->tanggal_lahir,
            $siswa->alamat,
            $siswa->email,
            $siswa->nomor_wa,
            $siswa->ukuran_seragam,
        ])->every(fn($item) => filled($item));

        $orangTuaLengkap = collect([
            $siswa->nama_ayah,
            $siswa->pekerjaan_ayah,
            $siswa->penghasilan_ayah,
            $siswa->nama_ibu,
            $siswa->pekerjaan_ibu,
            $siswa->penghasilan_ibu,
            $siswa->nomor_wali,
            $siswa->alamat_wali,
        ])->every(fn($item) => filled($item));

        $berkasLengkap = collect([
            $siswa->akta,
            $siswa->kk,
            $siswa->ktp,
            $siswa->skl_ijazah,
            $siswa->surat_tidak_mampu,
        ])->every(fn($item) => filled($item));

        $kelengkapan = [
            'profil' => $profilLengkap,
            'orang_tua' => $orangTuaLengkap,
            'berkas' => $berkasLengkap,
        ];

        $jumlahLengkap = collect($kelengkapan)->filter()->count();

        return view('pages.siswa.index', compact(
            'title',
            'siswa',
            'gelombangAktif',
            'timelines',
            'kelengkapan',
            'jumlahLengkap'
        ));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }

    public function downloadKartuUjian($id)
    {
        $siswa = Siswa::find($id);

        if (!$siswa) {
            return redirect()->back()->with('error', 'Siswa tidak ditemukan');
        }

        $mpdf = new Mpdf();
        $html = view('pages.siswa.kartu-ujian', compact('siswa'))->render();
        $mpdf->WriteHTML($html);

        $filename = 'kartu-ujian-' . $siswa->nama_siswa . '.pdf';

        return $mpdf->Output($filename, 'D');
    }
}
