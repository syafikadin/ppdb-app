<?php

namespace App\Http\Controllers;

use App\Models\Gelombang;
use Illuminate\Http\Request;

class GelombangController extends Controller
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
     * @param  \App\Models\Gelombang  $gelombang
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $title = 'Data Ujian';
        $gelombang = Gelombang::findOrFail($id);
        // Misalnya, Anda ingin menampilkan pendaftar dari gelombang ini
        $pendaftars = $gelombang->pendaftars; // Asumsikan relasi gelombang dengan pendaftar
        $data_siswa = Gelombang::with('siswa')->where('nama_gelombang', 'Gelombang 1')->first();

        return view('pages.admin.data-ujian.show', compact('title', 'gelombang', 'pendaftars', 'data_siswa'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gelombang  $gelombang
     * @return \Illuminate\Http\Response
     */
    public function edit(Gelombang $gelombang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Gelombang  $gelombang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $gelombang = Gelombang::findOrFail($id);
        $request->validate([
            'tanggal_ujian' => 'required|date',
        ]);

        $gelombang->update([
            'tanggal_ujian' => $request->tanggal_ujian,
        ]);

        return redirect()->back()->with('success', 'Tanggal ujian berhasil diperbarui.');
    }

    public function close($id)
    {
        $gelombang = Gelombang::findOrFail($id);

        // Ubah status gelombang menjadi 'close'
        $gelombang->update([
            'status' => 'Closed',
        ]);

        return redirect()->back()->with('success', 'Gelombang berhasil ditutup.');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gelombang  $gelombang
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gelombang $gelombang)
    {
        //
    }
}
