<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardAdminController;
use App\Http\Controllers\DashboardSiswaController;
use App\Http\Controllers\DataPendaftarController;
use App\Http\Controllers\DataUjianController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\PendaftarController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index']);

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate']);
Route::post('/logout', [AuthController::class, 'logout']);


Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);


// Route Group Admin

Route::prefix('admin')->group(function () {
    Route::group(['middleware' => 'admin'], function () {
        Route::resource('/', DashboardAdminController::class);

        Route::resource('/data-pendaftar', DataPendaftarController::class);
        Route::get('/admin/data-pendaftar/{id}/show', [DataPendaftarController::class, 'show'])->name('data-pendaftar.show');

        Route::resource('/data-ujian', DataUjianController::class);

        // Verifikasi Data
        Route::post('/data-pendaftar/verifikasi', [PendaftarController::class, 'verifikasi'])->name('data-pendaftar.verifikasi');
        Route::post('/data-pendaftar/invalid', [PendaftarController::class, 'invalid'])->name('data-pendaftar.invalid');
    });
});
// End Route Group Admin


// Route Group Siswa
Route::prefix('siswa')->group(function () {
    Route::group(['middleware' => 'siswa'], function () {
        Route::resource('/', DashboardSiswaController::class);
        Route::resource('/pendaftaran', PendaftaranController::class);

        Route::resource('/profil', ProfilController::class);

        // Edit & Update Data Orangtua
        Route::put('/pendaftaran/{id}/update-data-orangtua', [PendaftaranController::class, 'updateDataOrangtua'])->name('pendaftaran.updateDataOrangtua');
        Route::get('/pendaftaran/{id}/edit-data-orangtua', [PendaftaranController::class, 'editDataOrangtua'])->name('pendaftaran.editDataOrangtua');

        // Edit & Update Data Berkas
        Route::get('/pendaftaran/{id}/edit-data-berkas', [PendaftaranController::class, 'editDataBerkas'])->name('pendaftaran.editDataBerkas');
        Route::put('/pendaftaran/{id}/update-data-berkas', [PendaftaranController::class, 'updateDataBerkas'])->name('pendaftaran.updateDataBerkas');

        // Submit Berkas
        Route::post('/pendaftaran/submit', [PendaftarController::class, 'store'])->name('pendaftaran.submit');
    });
});
// End Route Group Siswa
