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
        $validator = Validator::make($request->all(), [
            'nama_siswa' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        // Jika validasi gagal, return dengan pesan error
        if ($validator->fails()) {
            // Cek apakah error terjadi karena username sudah ada
            if ($validator->errors()->has('username')) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput()
                    ->with('error', 'Username sudah terdaftar. Silakan pilih username yang lain.');
            }

            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Registrasi gagal! Silakan cek kembali data yang diisi.');
        }

        // Simpan user baru
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
