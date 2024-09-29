<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class ProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Profil';
        $data_siswa = Siswa::where('user_id', Auth::user()->id)->first();
        return view('pages.siswa.profil.index', compact('title', 'data_siswa'));
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
        $title = 'Profil';
        $data_siswa = Siswa::findOrFail($id); // Mengambil data siswa berdasarkan ID
        return view('pages.siswa.profil.edit', compact('title', 'data_siswa'));
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
        $request->validate([
            'nama_siswa' => 'required|string|max:255',
            'jenis_kelamin' => 'nullable|string',
            'tempat_lahir' => 'nullable|string|max:255',
            'tanggal_lahir' => 'nullable|date',
            'alamat' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'nomor_wa' => 'nullable|string|max:15',
            'sosmed' => 'nullable|string|max:255',
            'ukuran_seragam' => 'nullable|string',
        ]);

        $data_siswa = Siswa::findOrFail($id);

        // Jika ada gambar yang diunggah
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/img'), $filename);

            // Hapus gambar lama jika ada
            if ($data_siswa->foto) {
                File::delete(public_path('uploads/img/' . $data_siswa->foto));
            }

            // Simpan nama file gambar baru di database
            $data_siswa->foto = 'uploads/img/' . $filename;
        }

        // Update semua data siswa
        $data_siswa->update($request->except('foto'));

        return redirect()->route('profil.index')->with('success', 'Profil berhasil diperbarui.');
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
