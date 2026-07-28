<?php

namespace App\Http\Controllers;

use App\Models\Nilai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
        $validator = Validator::make($request->all(), [
            'nilai' => 'required|array',
            'nilai.*.wawancara' => 'required|numeric|min:10|max:100',
            'nilai.*.baca' => 'required|numeric|min:10|max:100',
            'nilai.*.tulis' => 'required|numeric|min:10|max:100',
        ], [
            'nilai.*.wawancara.min' => 'Nilai wawancara minimal 10.',
            'nilai.*.wawancara.max' => 'Nilai wawancara maksimal 100.',
            'nilai.*.baca.min' => 'Nilai baca Al-Qur\'an minimal 10.',
            'nilai.*.baca.max' => 'Nilai baca Al-Qur\'an maksimal 100.',
            'nilai.*.tulis.min' => 'Nilai tulis Al-Qur\'an minimal 10.',
            'nilai.*.tulis.max' => 'Nilai tulis Al-Qur\'an maksimal 100.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $nilaiData = $request->input('nilai');

        foreach ($nilaiData as $siswaId => $nilai) {
            Nilai::updateOrCreate(
                ['siswa_id' => $siswaId],
                [
                    'wawancara' => $nilai['wawancara'],
                    'baca_alquran' => $nilai['baca'],
                    'tulis_alquran' => $nilai['tulis']
                ]
            );

            $siswa = \App\Models\Siswa::find($siswaId);
            if ($siswa) {
                $siswa->status = 'Menunggu pengumuman';
                $siswa->save();
            }
        }

        return redirect()->back()->with('success', 'Nilai berhasil ditambahkan atau diperbarui.');
    }
}
