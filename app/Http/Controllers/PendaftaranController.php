<?php

namespace App\Http\Controllers;

use App\Models\Pendaftar;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PendaftaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Pendaftaran';
        $data_siswa = Siswa::where('user_id', Auth::user()->id)->first();

        $isProfilComplete = !empty($data_siswa->nama_siswa) &&
            !empty($data_siswa->jenis_kelamin) &&
            !empty($data_siswa->tempat_lahir) &&
            !empty($data_siswa->tanggal_lahir) &&
            !empty($data_siswa->alamat) &&
            !empty($data_siswa->ukuran_seragam);

        // Cek kelengkapan data orang tua
        $isOrangtuaComplete = !empty($data_siswa->nama_ayah) &&
            !empty($data_siswa->pekerjaan_ayah) &&
            !empty($data_siswa->nama_ibu) &&
            !empty($data_siswa->pekerjaan_ibu) &&
            !empty($data_siswa->nomor_wali);

        // Cek kelengkapan data berkas
        $isBerkasComplete = !empty($data_siswa->piagam) &&
            !empty($data_siswa->foto_pas) &&
            !empty($data_siswa->akta) &&
            !empty($data_siswa->kk) &&
            !empty($data_siswa->ktp) &&
            !empty($data_siswa->rapor);

        $canSubmit = $isProfilComplete && $isOrangtuaComplete && $isBerkasComplete;

        // Cek status pendaftaran
        $pendaftar = Pendaftar::where('id_siswa', $data_siswa->id)->first();
        $isRegistered = $pendaftar && $pendaftar->status_pendaftaran !== 'Belum Mendaftar';

        // Tentukan apakah tombol bisa diklik
        $canSubmit = $canSubmit && !$isRegistered;

        return view('pages.siswa.pendaftaran.index', compact('title', 'data_siswa', 'canSubmit', 'isProfilComplete', 'isOrangtuaComplete', 'isBerkasComplete', 'isRegistered'));
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
    public function editDataOrangtua($id)
    {
        $title = 'Pendaftaran';
        $data_siswa = Siswa::findOrFail($id); // Mengambil data siswa berdasarkan ID
        return view('pages.siswa.pendaftaran.data-orangtua', compact('title', 'data_siswa'));
    }

    public function editDataBerkas($id)
    {
        $title = 'Pendaftaran';
        $data_siswa = Siswa::findOrFail($id); // Mengambil data siswa berdasarkan ID
        return view('pages.siswa.pendaftaran.data-berkas', compact('title', 'data_siswa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateDataOrangtua(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'nama_ayah' => 'nullable|string|max:255',
            'pekerjaan_ayah' => 'nullable|string',
            'penghasilan_ayah' => 'nullable|string',
            'nama_ibu' => 'nullable|string|max:255',
            'pekerjaan_ibu' => 'nullable|string',
            'penghasilan_ibu' => 'nullable|string',
            'nomor_wali' => 'nullable|string',
            'alamat_wali' => 'nullable|string',

            // Validasi berkas (file) yang akan diunggah
            'piagam' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'foto_pas' => 'nullable|file|mimes:jpg,jpeg,png|max:2048',
            'akta' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'kk' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'ktp' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'rapor' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        // Temukan siswa yang ada
        $siswa = Siswa::findOrFail($id);

        // Update data siswa
        $siswa->update([
            'nama_ayah' => $request->nama_ayah,
            'pekerjaan_ayah' => $request->pekerjaan_ayah,
            'penghasilan_ayah' => $request->penghasilan_ayah,
            'nama_ibu' => $request->nama_ibu,
            'pekerjaan_ibu' => $request->pekerjaan_ibu,
            'penghasilan_ibu' => $request->penghasilan_ibu,
            'nomor_wali' => $request->nomor_wali,
            'alamat_wali' => $request->alamat_wali,
        ]);

        $siswa->save();

        return redirect()->route('pendaftaran.index')->with('success', 'Data Orangtua Berhasil Diperbarui.');
    }
    public function updateDataBerkas(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'piagam' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'foto_pas' => 'nullable|file|mimes:jpg,jpeg,png|max:2048',
            'akta' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'kk' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'ktp' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'rapor' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        // Temukan siswa yang ada
        $siswa = Siswa::findOrFail($id);

        // Proses unggahan file jika ada
        $files = ['piagam', 'foto_pas', 'akta', 'kk', 'ktp', 'rapor'];
        foreach ($files as $file) {
            if ($request->hasFile($file)) {
                // Hapus file lama jika ada
                if ($siswa->{$file} && file_exists(public_path($siswa->{$file}))) {
                    unlink(public_path($siswa->{$file}));
                }

                // Unggah file baru
                $uploadedFile = $request->file($file);
                $filename = time() . '_' . $uploadedFile->getClientOriginalName();
                $path = $uploadedFile->move(public_path('uploads/files'), $filename);

                // Simpan path relatif di database
                $siswa->{$file} = 'uploads/files/' . $filename;
            }
        }

        $siswa->save();

        return redirect()->route('pendaftaran.index')->with('success', 'Data Berkas Berhasil Diperbarui.');
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
}
