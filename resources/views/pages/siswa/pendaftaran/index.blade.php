@extends('layouts.siswa')
@section('content')
    <div class="main-content">
        <div class="app-content">
            <div class="app-content-header shadow-sm">
                <h1 class="app-content-headerText fw-bold">Pendaftaran</h1>
            </div>

            <div class="content-body">
                <div class="row g-3">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="card shadow-sm" style="min-height: 100%">
                            <div class="card-body">
                                <div class="text-danger">
                                    "Untuk melakukan pendaftaran sebagai peserta didik baru, harap melengkapi berkas-berkas
                                    berikut!"
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="card shadow-sm ">
                            <div class="card-body">
                                <h6 class="fw-bold">Status Pendaftaran</h6>
                                <hr class="mb-4">

                                <p>Belum mendaftar </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row g-3 my-1">
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <a href="/siswa/profil" style="text-decoration: none">
                            <div class="card shadow card-pendaftaran card-data-profil">
                                <div class="card-body d-flex flex-column justify-content-between">
                                    <h3 class="fw-bold">
                                        Data Profil
                                    </h3>
                                    <p class="mb-0">Lihat</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <a href="/siswa/pendaftaran/data-orang-tua" style="text-decoration: none">
                            <div class="card shadow card-pendaftaran card-data-orang-tua">
                                <div class="card-body d-flex flex-column justify-content-between">
                                    <h3 class="fw-bold">
                                        Data Orang Tua
                                    </h3>
                                    <p class="mb-0">Lihat</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <a href="/siswa/pendaftaran/data-berkas" style="text-decoration: none">
                            <div class="card shadow card-pendaftaran card-data-berkas">
                                <div class="card-body d-flex flex-column justify-content-between">
                                    <h3 class="fw-bold">
                                        Data Berkas
                                    </h3>
                                    <p class="mb-0">Lihat</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <hr>
                <div class="row g-3 ">
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <button class="btn btn-lg btn-primary w-100">
                            Submit Pendaftaran
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
