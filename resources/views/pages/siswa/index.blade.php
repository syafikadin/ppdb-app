@extends('layouts.siswa')
@section('content')
    <div class="main-content">
        <div class="app-content">
            <div class="app-content-header shadow-sm">
                <h1 class="app-content-headerText fw-bold">
                    <button class="btn-sidebar" id="btn-sidebar">
                        <i class="bi bi-layout-sidebar-inset"></i>
                    </button>
                    Selamat Datang, {{ $siswa->nama_siswa }}!
                </h1>
            </div>

            <div class="content-body">


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
                                @if ($siswa->status === 'Lulus' || $siswa->status === 'Tidak Lulus')
                                    <button class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#modalHasilSeleksi">Lihat Hasil Seleksi</button>
                                @else
                                    <p>Belum ada pengumuman yang masuk</p>
                                @endif


                                <div class="modal fade" id="modalHasilSeleksi" tabindex="-1"
                                    aria-labelledby="modalHasilSeleksiLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalHasilSeleksiLabel">
                                                    Hasil Seleksi</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    @if ($siswa->status === 'Lulus')
                                                        <h6>Selamat! Anda telah berhasil melewati semua tahapan seleksi
                                                            dengan baik dan dinyatakan <span
                                                                class="text-primary fw-bold">LULUS</span>. Kami berharap
                                                            Anda terus bersemangat dalam menjalani langkah berikutnya
                                                            bersama kami.</h6>
                                                    @else
                                                        <h6>Terima kasih atas partisipasi Anda dalam proses seleksi ini.
                                                            Meskipun Anda dinyatakan <span class="text-danger fw-bold">TIDAK
                                                                LULUS</span> untuk saat
                                                            ini, kami mengapresiasi usaha yang telah Anda lakukan. Tetap
                                                            semangat dan jangan ragu untuk mencoba lagi di kesempatan
                                                            berikutnya.</h6>
                                                    @endif
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div>


                            </div>
                        </div>

                        <div class="card shadow-sm mt-2">
                            <div class="card-body">
                                <h6 class="fw-bold">Status Pendaftaran</h6>
                                <hr class="mb-4">

                                @if ($siswa->status !== 'Lulus' && $siswa->status !== 'Tidak Lulus')
                                    <p>{{ $siswa->status }}</p>
                                @endif

                                @if ($siswa->status === 'Sudah diverifikasi, menunggu ujian')
                                    <a href="{{ route('download.kartu', $siswa->id) }}" class="btn btn-primary">Download
                                        Kartu Ujian</a>
                                @endif
                                @if ($siswa->status === 'Lulus' || $siswa->status === 'Tidak Lulus')
                                    <p>Telah menyelesaikan seleksi pendaftaran, silahkan melihat pengumuman!</p>
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
