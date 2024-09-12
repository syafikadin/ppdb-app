<?php

namespace App\Http\Controllers;

use App\Models\Pendaftar;
use Illuminate\Http\Request;

class PendaftarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validasi data jika diperlukan
        $request->validate([
            // Validasi input jika diperlukan
        ]);

        // Ambil ID siswa dari data yang dikirim
        $siswaId = $request->input('siswa_id'); // Pastikan ID siswa dikirim dalam request

        // Cari data pendaftaran berdasarkan ID siswa
        $pendaftar = Pendaftar::where('id_siswa', $siswaId)->first();

        if ($pendaftar) {
            // Jika sudah ada data pendaftaran, update status
            $pendaftar->status_pendaftaran = 'Sudah daftar, belum diverifikasi';
            $pendaftar->save();
        } else {
            // Jika belum ada data pendaftaran, buat data baru
            $pendaftar = new Pendaftar();
            $pendaftar->id_siswa = $siswaId;
            $pendaftar->status_pendaftaran = 'Sudah daftar, belum diverifikasi'; // Status awal pendaftaran
            $pendaftar->save();
        }

        // Redirect atau beri pesan sukses
        return redirect()->back()->with('success', 'Pendaftaran berhasil.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pendaftar  $pendaftar
     * @return \Illuminate\Http\Response
     */
    public function show(Pendaftar $pendaftar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pendaftar  $pendaftar
     * @return \Illuminate\Http\Response
     */
    public function edit(Pendaftar $pendaftar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pendaftar  $pendaftar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pendaftar $pendaftar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pendaftar  $pendaftar
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pendaftar $pendaftar)
    {
        //
    }
}
