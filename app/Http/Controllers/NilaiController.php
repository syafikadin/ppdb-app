<?php

namespace App\Http\Controllers;

use App\Models\Nilai;
use Illuminate\Http\Request;

class NilaiController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Nilai  $nilai
     * @return \Illuminate\Http\Response
     */
    public function show(Nilai $nilai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Nilai  $nilai
     * @return \Illuminate\Http\Response
     */
    public function edit(Nilai $nilai)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Nilai  $nilai
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Nilai $nilai)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Nilai  $nilai
     * @return \Illuminate\Http\Response
     */
    public function destroy(Nilai $nilai)
    {
        //
    }

    public function storeNilai(Request $request)
    {
        $nilaiData = $request->input('nilai');

        foreach ($nilaiData as $siswaId => $nilai) {
            // Cek jika siswa sudah memiliki nilai, lakukan update, jika belum, buat baru
            Nilai::updateOrCreate(
                ['siswa_id' => $siswaId], // Kunci unik berdasarkan siswa_id
                [
                    'wawancara' => $nilai['wawancara'],
                    'baca_alquran' => $nilai['baca'],
                    'tulis_alquran' => $nilai['tulis']
                ]
            );
        }

        return redirect()->route('data-ujian.index')->with('success', 'Nilai berhasil ditambahkan atau diperbarui.');
    }
}
