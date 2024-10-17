<?php

namespace App\Http\Controllers;

use App\Models\Gelombang;
use App\Models\Siswa;
use Illuminate\Http\Request;

class DataUjianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Data Ujian';
        $data_gelombang = Gelombang::with('siswa')->get();

        return view('pages.admin.data-ujian.index', compact('title', 'data_gelombang'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $title = 'Data Ujian';

        // return view('pages.admin.data-ujian.show', compact('title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function umumkan($gelombangId)
    {
        // Dapatkan data gelombang dan siswa terkait
        $gelombang = Gelombang::with('siswa.nilai')->find($gelombangId);

        if (!$gelombang) {
            return back()->with('error', 'Gelombang tidak ditemukan');
        }

        // Perbarui status kelulusan siswa berdasarkan rata-rata nilai
        foreach ($gelombang->siswa as $siswa) {
            if ($siswa->nilai) {
                $rataRataNilai = ($siswa->nilai->wawancara + $siswa->nilai->baca_alquran + $siswa->nilai->tulis_alquran) / 3;

                if ($rataRataNilai >= 70) {
                    $siswa->status = 'Lulus';
                } else {
                    $siswa->status = 'Tidak Lulus';
                }
                $siswa->save(); // Simpan perubahan status kelulusan
            }
        }

        return back()->with('success', 'Pengumuman berhasil dilakukan.');
    }
}
