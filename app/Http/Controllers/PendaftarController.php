<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Pendaftar;
use Illuminate\Http\Request;

class PendaftarController extends Controller
{
    public function store(Request $request)
    {
        // Ambil ID siswa dari data yang dikirim
        $siswaId = $request->input('siswa_id'); // Pastikan ID siswa dikirim dalam request

        // Cari data siswa berdasarkan ID
        $siswa = Siswa::find($siswaId);

        if ($siswa) {
            // Update status pendaftaran di model Siswa
            $siswa->status = 'Sudah daftar, belum diverifikasi';
            $siswa->save();

            // Buat objek pendaftar baru
            $pendaftar = new Pendaftar();
            $pendaftar->id_siswa = $siswaId;
            $pendaftar->save();

            return redirect()->back()->with('success', 'Pendaftaran berhasil.');
        } else {
            return redirect()->back()->with('error', 'Siswa tidak ditemukan.');
        }
    }

    public function invalid(Request $request)
    {
        $siswaId = $request->input('siswa_id');
        $message = $request->input('catatan'); // Pesan untuk siswa

        $siswa = Siswa::find($siswaId);

        if ($siswa) {
            // Update status pendaftaran siswa
            $siswa->status = 'Belum Mendaftar';
            $siswa->catatan = $message; // Simpan catatan
            $siswa->save();

            $pendaftar = Pendaftar::where('id_siswa', $siswaId)->first();
            if ($pendaftar) {
                $pendaftar->delete();
            }

            return redirect('/admin/data-pendaftar')->with('success', 'Status pendaftaran diubah menjadi tidak valid.');
        } else {
            return redirect('/admin/data-pendaftar')->with('error', 'Siswa tidak ditemukan.');
        }
    }

    public function verifikasi(Request $request)
    {
        $siswa = Siswa::find($request->siswa_id);
        $siswa->status = 'Sudah diverifikasi, menunggu ujian';
        $siswa->catatan = 'Silahkan menunggu ujian';
        $siswa->save();

        return redirect()->back()->with('success', 'Pendaftar berhasil diverifikasi.');
    }
}
