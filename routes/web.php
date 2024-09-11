<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardAdminController;
use App\Http\Controllers\DashboardSiswaController;
use App\Http\Controllers\DataPendaftarController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PendaftaranController;
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
    });
});
// End Route Group Admin


// Route Group Siswa
Route::prefix('siswa')->group(function () {
    Route::group(['middleware' => 'siswa'], function () {
        Route::resource('/', DashboardSiswaController::class);
        Route::resource('/pendaftaran', PendaftaranController::class);
        Route::resource('/profil', ProfilController::class);
    });
});
// End Route Group Siswa
