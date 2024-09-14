@extends('layouts.siswa')
@section('content')
    <div class="main-content">
        <div class="app-content">
            <div class="app-content-header shadow-sm">
                <h1 class="app-content-headerText fw-bold">Pendaftaran</h1>
            </div>

            <div class="content-body">

                @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if (session()->has('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="row g-3">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="card shadow-sm" style="min-height: 100%">
                            <div class="card-body">
                                <h6 class="fw-bold">Catatan dari admin: </h6>
                                <p class="text-danger">
                                    {{ $data_siswa->catatan ? $data_siswa->catatan : '"Untuk melakukan pendaftaran sebagai peserta didik baru, harap melengkapi berkas-berkas berikut!' }}
                                </p>

                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="card shadow-sm ">
                            <div class="card-body">
                                <h6 class="fw-bold">Status Pendaftaran</h6>
                                <hr class="mb-4">
                                <p>{{ $data_siswa->status }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row g-3 my-1">
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <a href="/siswa/profil"
                            class="{{ $data_siswa->status === 'Belum Mendaftar' ? '' : 'disabled-link' }}"
                            style="text-decoration: none">
                            <div class="card shadow card-pendaftaran card-data-profil">
                                <div class="card-body d-flex flex-column justify-content-between">
                                    <h3 class="fw-bold">
                                        Data Profil
                                    </h3>

                                    <div class="d-flex justify-content-between align-items-center">
                                        <p class="mb-0">Edit</p>
                                        <p
                                            class="mb-0 tag {{ $isProfilComplete === true ? 'text-primary' : 'text-danger' }} ">
                                            <i
                                                class="bi {{ $isProfilComplete === true ? 'bi-check-circle' : 'bi-exclamation-circle' }} me-1"></i>
                                            <span>
                                                {{ $isProfilComplete === true ? 'Sudah Lengkap' : 'Belum Lengkap' }}
                                            </span>

                                        </p>
                                    </div>
                                </div>

                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <a href="{{ route('pendaftaran.editDataOrangtua', $data_siswa->id) }}"
                            class="{{ $data_siswa->status === 'Belum Mendaftar' ? '' : 'disabled-link' }}"
                            style="text-decoration: none">
                            <div class="card shadow card-pendaftaran card-data-orang-tua">
                                <div class="card-body d-flex flex-column justify-content-between">
                                    <h3 class="fw-bold">
                                        Data Orang Tua
                                    </h3>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <p class="mb-0">Edit</p>
                                        <p
                                            class="mb-0 tag {{ $isOrangtuaComplete === true ? 'text-primary' : 'text-danger' }} ">
                                            <i
                                                class="bi {{ $isOrangtuaComplete === true ? 'bi-check-circle' : 'bi-exclamation-circle' }} me-1"></i>
                                            <span>
                                                {{ $isOrangtuaComplete === true ? 'Sudah Lengkap' : 'Belum Lengkap' }}
                                            </span>

                                        </p>
                                    </div>

                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <a href="{{ route('pendaftaran.editDataBerkas', $data_siswa->id) }}"
                            class="{{ $data_siswa->status === 'Belum Mendaftar' ? '' : 'disabled-link' }}"
                            style="text-decoration: none">
                            <div class="card shadow card-pendaftaran card-data-berkas">
                                <div class="card-body d-flex flex-column justify-content-between">
                                    <h3 class="fw-bold">
                                        Data Berkas
                                    </h3>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <p class="mb-0">Edit</p>
                                        <p
                                            class="mb-0 tag {{ $isBerkasComplete === true ? 'text-primary' : 'text-danger' }} ">
                                            <i
                                                class="bi {{ $isBerkasComplete === true ? 'bi-check-circle' : 'bi-exclamation-circle' }} me-1"></i>
                                            <span>
                                                {{ $isBerkasComplete === true ? 'Sudah Lengkap' : 'Belum Lengkap' }}
                                            </span>

                                        </p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <hr>
                <div class="row g-3">
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <form action="{{ route('pendaftaran.submit') }}" method="POST">
                            @csrf
                            <input type="hidden" name="siswa_id" value="{{ $data_siswa->id }}">
                            <button type="submit" class="btn btn-lg btn-primary w-100" {{ $canSubmit ? '' : 'disabled' }}>
                                Submit Pendaftaran
                            </button>
                        </form>
                    </div>
                </div>

                {{-- <p>Profil: {{ $isProfilComplete }}</p>
                <p>Orangtua: {{ $isOrangtuaComplete }}</p>
                <p>Berkas: {{ $isBerkasComplete }}</p>
                <p>Cansubmit: {{ $canSubmit }}</p> --}}

            </div>
        </div>
    </div>
@endsection
