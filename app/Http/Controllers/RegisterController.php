<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function index()
    {
        $title = 'Register';
        return view('pages.auth.register', compact('title'));
    }

    public function register(Request $request)
    {
        // Aturan validasi
        $validator = Validator::make($request->all(), [
            'nama_siswa' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ], [
            'nama_siswa.required' => 'Nama siswa wajib diisi.',
            'nama_siswa.string' => 'Nama siswa harus berupa teks.',
            'nama_siswa.max' => 'Nama siswa maksimal 255 karakter.',

            'username.required' => 'Username wajib diisi.',
            'username.string' => 'Username harus berupa teks.',
            'username.max' => 'Username maksimal 255 karakter.',
            'username.unique' => 'Username ini sudah terdaftar. Silakan pilih username lain.',

            'password.required' => 'Password wajib diisi.',
            'password.string' => 'Password harus berupa teks.',
            'password.min' => 'Password minimal harus 8 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak sesuai.',
        ]);

        // Jika validasi gagal, kembalikan pesan error sesuai field
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)  // Menampilkan pesan error per field
                ->withInput();  // Menyimpan input agar tidak hilang saat reload
        }

        // Simpan user baru jika validasi sukses
        $user = User::create([
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'role' => 2,
        ]);

        Siswa::create([
            'nama_siswa' => $request->nama_siswa,
            'user_id' => $user->id
        ]);

        // Redirect ke halaman login setelah sukses registrasi
        return redirect()->route('login')->with('success', 'Registrasi berhasil! Silakan login.');
    }
}
