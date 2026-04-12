<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class ProfilController extends Controller
{
    public function index()
    {
        $title = 'Profil';
        $data_siswa = Siswa::where('user_id', Auth::id())->first();

        return view('pages.siswa.profil.index', compact('title', 'data_siswa'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $title = 'Profil';
        $data_siswa = Siswa::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        return view('pages.siswa.profil.edit', compact('title', 'data_siswa'));
    }

    public function update(Request $request, $id)
    {
        $data_siswa = Siswa::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        $validated = $request->validate([
            'nama_siswa' => 'required|string|max:255',
            'nisn' => 'nullable|string|max:20|unique:siswas,nisn,' . $data_siswa->id,
            'jenis_kelamin' => 'nullable|in:L,P',
            'asal_sekolah' => 'nullable|string|max:255',
            'tempat_lahir' => 'nullable|string|max:255',
            'tanggal_lahir' => 'nullable|date',
            'alamat' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'nomor_wa' => 'nullable|string|max:20',
            'sosmed' => 'nullable|string|max:255',
            'nama_ayah' => 'nullable|string|max:255',
            'pekerjaan_ayah' => 'nullable|string|max:255',
            'penghasilan_ayah' => 'nullable|string|max:255',
            'nama_ibu' => 'nullable|string|max:255',
            'pekerjaan_ibu' => 'nullable|string|max:255',
            'penghasilan_ibu' => 'nullable|string|max:255',
            'nomor_wali' => 'nullable|string|max:20',
            'alamat_wali' => 'nullable|string|max:255',
            'ukuran_seragam' => 'nullable|string|max:10',
        ]);

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $destination = public_path('uploads/img');

            if (!File::exists($destination)) {
                File::makeDirectory($destination, 0755, true);
            }

            $file->move($destination, $filename);

            if ($data_siswa->foto && File::exists(public_path($data_siswa->foto))) {
                File::delete(public_path($data_siswa->foto));
            }

            $validated['foto'] = 'uploads/img/' . $filename;
        }

        $data_siswa->update($validated);

        return redirect()->route('profil.index')->with('success', 'Profil berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $data_siswa = Siswa::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        if ($data_siswa->foto && File::exists(public_path($data_siswa->foto))) {
            File::delete(public_path($data_siswa->foto));
        }

        $data_siswa->delete();

        return redirect()->route('profil.index')->with('success', 'Profil berhasil dihapus.');
    }
}
