@extends('layouts.siswa')
@section('content')
    <div class="main-content">
        <div class="app-content">
            <div class="app-content-header shadow-sm">
                <h1 class="app-content-headerText fw-bold">Selamat Datang, {{ $siswa->nama_siswa }}!</h1>
            </div>

            <div class="content-body">
                {{-- <h3 class="">Selamat Datang, {{ $siswa->nama_siswa }}!</h3> --}}

                <div class="row g-3">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <h6 class="fw-bold">Alur Pendaftaran</h6>
                                <hr class="mb-4">
                                <img src="{{ asset('assets/images/timeline.png') }}" class="img-fluid" alt="">
                                <hr>
                                <h6 class="fw-bold">Navigasi</h6>
                                <ol>
                                    <li>
                                        <a href="/siswa/profil" class=" btn-link">Lengkapi Data Profil</a>
                                    </li>
                                    <li>
                                        <a href="/siswa/pendaftaran/{{ $siswa->id }}/edit-orangtua"
                                            class=" btn-link">Lengkapi Data Orang
                                            Tua</a>
                                    </li>
                                    <li>
                                        <a href="/siswa/pendaftaran/{{ $siswa->id }}/edit-berkas"
                                            class=" btn-link">Lengkapi
                                            Berkas-berkas</a>
                                    </li>
                                    <li>
                                        <a href="/siswa/pendaftaran" class=" btn-link">Submit Pendaftaran</a>
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <h6 class="fw-bold">Pengumuman</h6>
                                <hr class="mb-4">

                                <p>Belum ada pengumuman yang masuk</p>
                            </div>
                        </div>

                        <div class="card shadow-sm mt-2">
                            <div class="card-body">
                                <h6 class="fw-bold">Status Pendaftaran</h6>
                                <hr class="mb-4">

                                <p>{{ $siswa->status }}</p>
                                @if ($siswa->status === 'Sudah diverifikasi, menunggu ujian')
                                    <a href="{{ route('download.kartu', $siswa->id) }}" class="btn btn-primary">Download
                                        Kartu Ujian</a>
                                @endif
                            </div>
                        </div>

                        <div class="card shadow-sm mt-2">
                            <div class="card-body">
                                <h6 class="fw-bold">Catatan Terkait Pendaftaran</h6>
                                <hr class="mb-4">

                                <p>{{ $siswa->catatan ? $siswa->catatan : 'Belum ada catatan' }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
