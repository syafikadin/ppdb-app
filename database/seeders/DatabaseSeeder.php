<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Gelombang;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Role
        // 1 = Admin
        // 2 = Siswa

        $admin = User::create([
            'username' => 'admin',
            'password' => Hash::make('password'),
            'role' => '1'
        ]);

        $userUcok = User::create([
            'username' => 'ucok123',
            'password' => Hash::make('password'),
            'role' => '2'
        ]);

        $userVindo = User::create([
            'username' => 'vindo123',
            'password' => Hash::make('password'),
            'role' => '2'
        ]);

        $userBaba = User::create([
            'username' => 'baba123',
            'password' => Hash::make('password'),
            'role' => '2'
        ]);

        $gelombang1 = Gelombang::create([
            'nama_gelombang' => 'Gelombang 1',
            'tanggal_ujian' => '2024-10-20',
            'status' => 'Open'
        ]);

        Siswa::create([
            'user_id' => $userUcok->id,
            'gelombang_id' => $gelombang1->id,
            'nama_siswa' => 'Ucok',
            'nisn' => '1234567890',
            'jenis_kelamin' => 'L',
            'asal_sekolah' => 'SD NU Kepanjen',
            'tempat_lahir' => 'Nganjuk',
            'tanggal_lahir' => '2024-09-20',
            'alamat' => 'Nganjuk',
            'email' => 'ucok@gmail.com',
            'foto' => 'uploads/img/1726132730.png',
            'nomor_wa' => '089698289699',
            'sosmed' => 'ucok_baba',
            'nama_ayah' => 'Paijo',
            'pekerjaan_ayah' => 'Politikus',
            'penghasilan_ayah' => 'Rp.1.000.000 - Rp.2.000.000',
            'nama_ibu' => 'Painem',
            'pekerjaan_ibu' => 'Politikus',
            'penghasilan_ibu' => 'Tidak Berpenghasilan',
            'nomor_wali' => '089698289699',
            'alamat_wali' => 'Nganjuk',
            'piagam' => 'uploads/files/1726125004_Piagam.jpeg',
            'ukuran_seragam' => 'L',
            'akta' => 'uploads/files/1726125004_Akta Kelahiran.jpg',
            'kk' => 'uploads/files/1726125004_KK.jpeg',
            'ktp' => 'uploads/files/1726125004_KTP.png',
            'rapor' => 'uploads/files/1726125004_Rport.jpeg',
            'catatan' => '',
            'status' => 'Belum Mendaftar',
        ]);

        Siswa::create([
            'user_id' => $userVindo->id,
            'gelombang_id' => $gelombang1->id,
            'nama_siswa' => 'Alvindo',
            'nisn' => '1234567891',
            'jenis_kelamin' => 'L',
            'asal_sekolah' => 'SD Jombang',
            'tempat_lahir' => 'Malang',
            'tanggal_lahir' => '2024-09-20',
            'alamat' => 'Malang',
            'email' => 'alvindo@gmail.com',
            'foto' => 'uploads/img/1726132730.png',
            'nomor_wa' => '089698289699',
            'sosmed' => 'ucok_baba',
            'nama_ayah' => 'Paijo',
            'pekerjaan_ayah' => 'Politikus',
            'penghasilan_ayah' => 'Rp.1.000.000 - Rp.2.000.000',
            'nama_ibu' => 'Painem',
            'pekerjaan_ibu' => 'Politikus',
            'penghasilan_ibu' => 'Tidak Berpenghasilan',
            'nomor_wali' => '089698289699',
            'alamat_wali' => 'Malang',
            'piagam' => 'uploads/files/1726125004_Piagam.jpeg',
            'ukuran_seragam' => 'L',
            'akta' => 'uploads/files/1726125004_Akta Kelahiran.jpg',
            'kk' => 'uploads/files/1726125004_KK.jpeg',
            'ktp' => 'uploads/files/1726125004_KTP.png',
            'rapor' => 'uploads/files/1726125004_Rport.jpeg',
            'catatan' => '',
            'status' => 'Belum Mendaftar',
        ]);

        Siswa::create([
            'user_id' => $userBaba->id,
            'gelombang_id' => $gelombang1->id,
            'nama_siswa' => 'Baba',
            'nisn' => '1234567892',
            'jenis_kelamin' => 'L',
            'asal_sekolah' => 'SD Tulungagung',
            'tempat_lahir' => 'Malang',
            'tanggal_lahir' => '2024-09-20',
            'alamat' => 'Malang',
            'email' => 'baba@gmail.com',
            'foto' => 'uploads/img/1726132730.png',
            'nomor_wa' => '089698289699',
            'sosmed' => 'baba_baba',
            'nama_ayah' => 'Paijo',
            'pekerjaan_ayah' => 'Politikus',
            'penghasilan_ayah' => 'Rp.1.000.000 - Rp.2.000.000',
            'nama_ibu' => 'Painem',
            'pekerjaan_ibu' => 'Politikus',
            'penghasilan_ibu' => 'Tidak Berpenghasilan',
            'nomor_wali' => '089698289699',
            'alamat_wali' => 'Malang',
            'piagam' => 'uploads/files/1726125004_Piagam.jpeg',
            'ukuran_seragam' => 'L',
            'akta' => 'uploads/files/1726125004_Akta Kelahiran.jpg',
            'kk' => 'uploads/files/1726125004_KK.jpeg',
            'ktp' => 'uploads/files/1726125004_KTP.png',
            'rapor' => 'uploads/files/1726125004_Rport.jpeg',
            'catatan' => '',
            'status' => 'Belum Mendaftar',
        ]);
    }
}
