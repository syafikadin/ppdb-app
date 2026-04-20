<?php

namespace App\Http\Controllers;

use App\Models\Gelombang;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DataSiswaController extends Controller
{
    public function index()
    {
        $title = 'Data Siswa';
        $data_siswa = Siswa::with(['user', 'gelombang'])->latest()->paginate(10);
        $gelombangs = Gelombang::orderBy('nama_gelombang')->get();

        return view('pages.admin.data-siswa.index', compact('title', 'data_siswa', 'gelombangs'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_siswa'       => 'required|string|max:255',
            'nisn'             => 'nullable|string|max:255|unique:siswas,nisn',
            'username'         => 'required|string|max:255|unique:users,username',
            'password'         => 'required|string|min:6|confirmed',
            'gelombang_id'     => 'nullable|exists:gelombangs,id',
            'jenis_kelamin'    => 'nullable|in:L,P',
            'tempat_lahir'     => 'nullable|string|max:255',
            'tanggal_lahir'    => 'nullable|date',
            'alamat'           => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255|unique:siswas,email',
            'nomor_wa'         => 'nullable|string|max:255',
            'asal_sekolah'     => 'nullable|string|max:255',
            'nama_ayah'        => 'nullable|string|max:255',
            'pekerjaan_ayah'   => 'nullable|string|max:255',
            'penghasilan_ayah' => 'nullable|string|max:255',
            'nama_ibu'         => 'nullable|string|max:255',
            'pekerjaan_ibu'    => 'nullable|string|max:255',
            'penghasilan_ibu'  => 'nullable|string|max:255',
            'nomor_wali'       => 'nullable|string|max:255',
            'alamat_wali'      => 'nullable|string|max:255',
            'catatan'          => 'nullable|string|max:255',
            'status'           => 'nullable|string|max:255',
        ]);

        DB::transaction(function () use ($validated) {
            $user = User::create([
                'username' => $validated['username'],
                'email'    => $validated['email'] ?? null,
                'password' => Hash::make($validated['password']),
                'role'     => 2,
            ]);

            Siswa::create([
                'user_id'          => $user->id,
                'gelombang_id'     => $validated['gelombang_id'] ?? null,
                'nama_siswa'       => $validated['nama_siswa'],
                'nisn'             => $validated['nisn'] ?? null,
                'jenis_kelamin'    => $validated['jenis_kelamin'] ?? null,
                'tempat_lahir'     => $validated['tempat_lahir'] ?? null,
                'tanggal_lahir'    => $validated['tanggal_lahir'] ?? null,
                'alamat'           => $validated['alamat'] ?? null,
                'email'            => $validated['email'] ?? null,
                'nomor_wa'         => $validated['nomor_wa'] ?? null,
                'asal_sekolah'     => $validated['asal_sekolah'] ?? null,
                'nama_ayah'        => $validated['nama_ayah'] ?? null,
                'pekerjaan_ayah'   => $validated['pekerjaan_ayah'] ?? null,
                'penghasilan_ayah' => $validated['penghasilan_ayah'] ?? null,
                'nama_ibu'         => $validated['nama_ibu'] ?? null,
                'pekerjaan_ibu'    => $validated['pekerjaan_ibu'] ?? null,
                'penghasilan_ibu'  => $validated['penghasilan_ibu'] ?? null,
                'nomor_wali'       => $validated['nomor_wali'] ?? null,
                'alamat_wali'      => $validated['alamat_wali'] ?? null,
                'catatan'          => $validated['catatan'] ?? null,
                'status'           => $validated['status'] ?? 'Belum Mendaftar',
            ]);
        });

        return redirect()->route('data-siswa.index')->with('success', 'Data siswa berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $siswa = Siswa::with('user')->findOrFail($id);

        $rules = [
            'nama_siswa'       => 'required|string|max:255',
            'nisn'             => 'nullable|string|max:255|unique:siswas,nisn,' . $siswa->id,
            'username'         => 'required|string|max:255|unique:users,username,' . $siswa->user->id,
            'gelombang_id'     => 'nullable|exists:gelombangs,id',
            'jenis_kelamin'    => 'nullable|in:L,P',
            'tempat_lahir'     => 'nullable|string|max:255',
            'tanggal_lahir'    => 'nullable|date',
            'alamat'           => 'nullable|string|max:255',
            'email'            => 'nullable|email|max:255|unique:siswas,email,' . $siswa->id,
            'nomor_wa'         => 'nullable|string|max:255',
            'asal_sekolah'     => 'nullable|string|max:255',
            'nama_ayah'        => 'nullable|string|max:255',
            'pekerjaan_ayah'   => 'nullable|string|max:255',
            'penghasilan_ayah' => 'nullable|string|max:255',
            'nama_ibu'         => 'nullable|string|max:255',
            'pekerjaan_ibu'    => 'nullable|string|max:255',
            'penghasilan_ibu'  => 'nullable|string|max:255',
            'nomor_wali'       => 'nullable|string|max:255',
            'alamat_wali'      => 'nullable|string|max:255',
            'catatan'          => 'nullable|string|max:255',
            'status'           => 'nullable|string|max:255',
        ];

        if ($request->filled('password')) {
            $rules['password'] = 'required|string|min:6|same:password_confirmation';
            $rules['password_confirmation'] = 'required|string|min:6';
        }

        $validated = $request->validate($rules);

        DB::transaction(function () use ($validated, $siswa, $request) {
            $userData = [
                'username' => $validated['username'],
            ];

            if ($request->filled('password')) {
                $userData['password'] = Hash::make($validated['password']);
            }

            $siswa->user->update($userData);

            $siswa->update([
                'gelombang_id'     => $validated['gelombang_id'] ?? null,
                'nama_siswa'       => $validated['nama_siswa'],
                'nisn'             => $validated['nisn'] ?? null,
                'jenis_kelamin'    => $validated['jenis_kelamin'] ?? null,
                'tempat_lahir'     => $validated['tempat_lahir'] ?? null,
                'tanggal_lahir'    => $validated['tanggal_lahir'] ?? null,
                'alamat'           => $validated['alamat'] ?? null,
                'email'            => $validated['email'] ?? null,
                'nomor_wa'         => $validated['nomor_wa'] ?? null,
                'asal_sekolah'     => $validated['asal_sekolah'] ?? null,
                'nama_ayah'        => $validated['nama_ayah'] ?? null,
                'pekerjaan_ayah'   => $validated['pekerjaan_ayah'] ?? null,
                'penghasilan_ayah' => $validated['penghasilan_ayah'] ?? null,
                'nama_ibu'         => $validated['nama_ibu'] ?? null,
                'pekerjaan_ibu'    => $validated['pekerjaan_ibu'] ?? null,
                'penghasilan_ibu'  => $validated['penghasilan_ibu'] ?? null,
                'nomor_wali'       => $validated['nomor_wali'] ?? null,
                'alamat_wali'      => $validated['alamat_wali'] ?? null,
                'catatan'          => $validated['catatan'] ?? null,
                'status'           => $validated['status'] ?? $siswa->status,
            ]);
        });

        return redirect()->route('data-siswa.index')->with('success', 'Data siswa berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $siswa = Siswa::with('user')->findOrFail($id);

        DB::transaction(function () use ($siswa) {
            if ($siswa->user) {
                $siswa->user->delete();
            } else {
                $siswa->delete();
            }
        });

        return redirect()->route('data-siswa.index')->with('success', 'Data siswa berhasil dihapus.');
    }
}
