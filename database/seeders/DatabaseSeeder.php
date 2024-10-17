<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Gelombang;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Database\Seeder;

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

        User::create([
            'username' => 'admin',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'role' => '1'
        ]);

        User::create([
            'username' => 'ucok123',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'role' => '2'
        ]);

        User::create([
            'username' => 'vindo123',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'role' => '2'
        ]);

        User::create([
            'username' => 'baba123',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'role' => '2'
        ]);

        Siswa::create([
            'nama_siswa' => 'Ucok',
            'user_id' => '2',
            'jenis_kelamin' => 'L',
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
            'asal_sekolah' => 'SD NU Kepanjen',
            'status' => 'Belum Mendaftar',
        ]);

        Siswa::create([
            'nama_siswa' => 'Alvindo',
            'user_id' => '3',
            'jenis_kelamin' => 'L',
            'tempat_lahir' => 'Malang',
            'tanggal_lahir' => '2024-09-20',
            'alamat' => 'Malang',
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
            'alamat_wali' => 'Malang',
            'piagam' => 'uploads/files/1726125004_Piagam.jpeg',
            'ukuran_seragam' => 'L',
            'akta' => 'uploads/files/1726125004_Akta Kelahiran.jpg',
            'kk' => 'uploads/files/1726125004_KK.jpeg',
            'ktp' => 'uploads/files/1726125004_KTP.png',
            'rapor' => 'uploads/files/1726125004_Rport.jpeg',
            'catatan' => '',
            'asal_sekolah' => 'SD Jombang',
            'status' => 'Belum Mendaftar',
        ]);

        Siswa::create([
            'nama_siswa' => 'Baba',
            'user_id' => '4',
            'jenis_kelamin' => 'L',
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
            'asal_sekolah' => 'SD Tulungagung',
            'status' => 'Belum Mendaftar',
        ]);

        Gelombang::create([
            'nama_gelombang' => 'Gelombang 1',
            'tanggal_ujian' => '2024-10-20',
            'status' => 'Open'
        ]);
    }
}
