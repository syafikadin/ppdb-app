<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class DataPendaftarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Data Pendaftar';
        // $dataSiswa = Siswa::all();

        // Mock-up data menggunakan stdClass
        $dataSiswa = [];

        $siswa1 = new \stdClass();
        $siswa1->name = 'Yudha';
        $siswa1->jenis_kelamin = 0;

        $siswa2 = new \stdClass();
        $siswa2->name = 'Budi';
        $siswa2->jenis_kelamin = 0;

        $siswa3 = new \stdClass();
        $siswa3->name = 'Sari';
        $siswa3->jenis_kelamin = 1;

        $dataSiswa[] = $siswa1;
        $dataSiswa[] = $siswa2;
        $dataSiswa[] = $siswa3;

        return view('pages.admin.data-pendaftar.index', compact('title', 'dataSiswa'));
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
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function show($siswa)
    {
        $title = "Data Pendaftar";

        return view('pages.admin.data-pendaftar.show', compact('title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function edit(Siswa $siswa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Siswa $siswa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Siswa $siswa)
    {
        //
    }
}
