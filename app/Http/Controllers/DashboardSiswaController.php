<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mpdf\Mpdf;

class DashboardSiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Dashboard';
        $siswa = Siswa::where('user_id', auth()->user()->id)->first();
        return view('pages.siswa.index', compact('title', 'siswa'));
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
        //
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

    public function downloadKartuUjian($id)
    {
        // Ambil data siswa berdasarkan ID
        $siswa = Siswa::find($id);

        // Validasi apakah siswa ditemukan
        if (!$siswa) {
            return redirect()->back()->with('error', 'Siswa tidak ditemukan');
        }

        // Membuat instance mPDF
        $mpdf = new Mpdf();

        // HTML untuk konten PDF
        $html = view('pages.siswa.kartu-ujian', compact('siswa'))->render();

        // Set konten HTML ke mPDF
        $mpdf->WriteHTML($html);

        // Nama file PDF
        $filename = 'kartu-ujian-' . $siswa->nama_siswa . '.pdf';

        // Untuk langsung men-download file
        return $mpdf->Output($filename, 'D'); // 'D' for download, 'I' for inline view (print)
    }
}
