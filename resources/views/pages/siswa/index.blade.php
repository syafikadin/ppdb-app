@extends('layouts.siswa')

@section('content')
    @php
        $chunks = $timelines->chunk((int) ceil($timelines->count() / 2));
        $leftTimelines = $chunks->get(0) ?? collect();
        $rightTimelines = $chunks->get(1) ?? collect();
    @endphp

    <style>
        .student-hero-card {
            border: 0;
            border-radius: 20px;
            background: linear-gradient(135deg, #0f766e, #14b8a6);
            color: #fff;
        }

        .student-hero-card .hero-subtitle {
            color: rgba(255, 255, 255, 0.86);
        }

        .student-card {
            border: 0;
            border-radius: 20px;
            box-shadow: 0 8px 24px rgba(15, 23, 42, 0.05);
        }

        .timeline-main-card {
            border: 0;
            border-radius: 24px;
            background: #fff;
            box-shadow: 0 8px 24px rgba(15, 23, 42, 0.05);
        }

        .timeline-column-card {
            border: 1px solid #edf2f7;
            border-radius: 20px;
            background: #fff;
            height: 100%;
        }

        .timeline-list {
            position: relative;
            padding-left: 18px;
        }

        .timeline-item {
            position: relative;
            padding-left: 76px;
            padding-bottom: 24px;
        }

        .timeline-item:last-child {
            padding-bottom: 0;
        }

        .timeline-item::before {
            content: '';
            position: absolute;
            top: 18px;
            left: 42px;
            width: 2px;
            height: calc(100% + 8px);
            background: #d1d5db;
        }

        .timeline-item:last-child::before {
            display: none;
        }

        .timeline-dot {
            position: absolute;
            top: 4px;
            left: 31px;
            width: 22px;
            height: 22px;
            border-radius: 50%;
            background: #fff;
            border: 4px solid #14b8a6;
            box-shadow: 0 0 0 4px rgba(20, 184, 166, 0.08);
            z-index: 2;
        }

        .timeline-order {
            position: absolute;
            top: 3px;
            left: 0;
            width: 24px;
            height: 22px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #9ca3af;
            font-size: 12px;
            font-weight: 700;
            line-height: 1;
            z-index: 1;
        }

        .timeline-title {
            font-size: 16px;
            font-weight: 700;
            color: #1f2937;
            line-height: 1.35;
            margin-bottom: 4px;
        }

        .timeline-date {
            color: #16a34a;
            font-weight: 600;
            font-size: 14px;
        }

        .status-badge-custom {
            display: inline-block;
            padding: 8px 14px;
            border-radius: 999px;
            background: rgba(20, 184, 166, 0.12);
            color: #0f766e;
            font-weight: 600;
            font-size: 14px;
        }

        .nav-list li {
            margin-bottom: 10px;
        }

        .nav-list a {
            text-decoration: none;
        }

        .check-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
            padding: 12px 0;
            border-bottom: 1px solid #eef2f7;
        }

        .check-item:last-child {
            border-bottom: 0;
            padding-bottom: 0;
        }

        .check-item:first-child {
            padding-top: 0;
        }

        .check-title {
            font-weight: 600;
            color: #1f2937;
        }

        .check-subtitle {
            font-size: 13px;
            color: #6b7280;
        }

        .rounded-pill-custom {
            border-radius: 999px;
            padding: 8px 14px;
            font-size: 12px;
            font-weight: 700;
            white-space: nowrap;
        }
    </style>

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
                <div class="card student-hero-card shadow-sm mb-4">
                    <div class="card-body p-4">
                        <h4 class="fw-bold mb-2">Dashboard Siswa</h4>
                        <p class="hero-subtitle mb-0">
                            Pantau tahapan pendaftaran, status Anda, dan kelengkapan data dari satu halaman.
                        </p>
                    </div>
                </div>

                <div class="card timeline-main-card mb-4">
                    <div class="card-body p-4 p-lg-5">
                        <div class="mb-4">
                            <h5 class="fw-bold mb-1">
                                Timeline {{ $gelombangAktif ? $gelombangAktif->nama_gelombang : 'PPDB' }}
                            </h5>
                            <p class="text-muted mb-0">
                                Berikut tahapan pendaftaran yang perlu Anda perhatikan.
                            </p>
                        </div>

                        @if ($timelines->count())
                            <div class="row g-4">
                                <div class="col-lg-6">
                                    <div class="timeline-column-card p-4">
                                        <div class="timeline-list">
                                            @foreach ($leftTimelines as $item)
                                                @php
                                                    $tanggalMulai = $item->tanggal_mulai
                                                        ? $item->tanggal_mulai->format('d F Y')
                                                        : null;
                                                    $tanggalSelesai = $item->tanggal_selesai
                                                        ? $item->tanggal_selesai->format('d F Y')
                                                        : null;

                                                    if (
                                                        $tanggalMulai &&
                                                        $tanggalSelesai &&
                                                        $tanggalMulai !== $tanggalSelesai
                                                    ) {
                                                        $tanggalTampil = $tanggalMulai . ' s.d. ' . $tanggalSelesai;
                                                    } elseif ($tanggalMulai) {
                                                        $tanggalTampil = $tanggalMulai;
                                                    } else {
                                                        $tanggalTampil = 'Tanggal belum diatur';
                                                    }
                                                @endphp

                                                <div class="timeline-item">
                                                    <div class="timeline-order">#{{ $item->urutan }}</div>
                                                    <div class="timeline-dot"></div>

                                                    <div>
                                                        <div class="timeline-title">{{ $item->nama_tahap }}</div>
                                                        <div class="timeline-date">{{ $tanggalTampil }}</div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="timeline-column-card p-4">
                                        <div class="timeline-list">
                                            @foreach ($rightTimelines as $item)
                                                @php
                                                    $tanggalMulai = $item->tanggal_mulai
                                                        ? $item->tanggal_mulai->format('d F Y')
                                                        : null;
                                                    $tanggalSelesai = $item->tanggal_selesai
                                                        ? $item->tanggal_selesai->format('d F Y')
                                                        : null;

                                                    if (
                                                        $tanggalMulai &&
                                                        $tanggalSelesai &&
                                                        $tanggalMulai !== $tanggalSelesai
                                                    ) {
                                                        $tanggalTampil = $tanggalMulai . ' s.d. ' . $tanggalSelesai;
                                                    } elseif ($tanggalMulai) {
                                                        $tanggalTampil = $tanggalMulai;
                                                    } else {
                                                        $tanggalTampil = 'Tanggal belum diatur';
                                                    }
                                                @endphp

                                                <div class="timeline-item">
                                                    <div class="timeline-order">#{{ $item->urutan }}</div>
                                                    <div class="timeline-dot"></div>

                                                    <div>
                                                        <div class="timeline-title">{{ $item->nama_tahap }}</div>
                                                        <div class="timeline-date">{{ $tanggalTampil }}</div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="alert alert-warning mb-0 rounded-3">
                                Timeline pendaftaran belum tersedia.
                            </div>
                        @endif
                    </div>
                </div>

                <div class="row g-4">
                    <div class="col-lg-6">
                        <div class="card student-card mb-4">
                            <div class="card-body p-4">
                                <h6 class="fw-bold">Status Pendaftaran</h6>
                                <hr class="mb-4">

                                @if ($siswa->status !== 'Lulus' && $siswa->status !== 'Tidak Lulus')
                                    <span class="status-badge-custom">{{ $siswa->status }}</span>
                                @endif

                                @if ($siswa->status === 'Sudah diverifikasi, menunggu ujian')
                                    <div class="mt-3">
                                        <a href="{{ route('download.kartu', $siswa->id) }}" class="btn btn-primary">
                                            Download Kartu Ujian
                                        </a>
                                    </div>
                                @endif

                                @if ($siswa->status === 'Lulus' || $siswa->status === 'Tidak Lulus')
                                    <p class="mb-3">
                                        Telah menyelesaikan seleksi pendaftaran. Silakan lihat hasil seleksi Anda.
                                    </p>

                                    <button class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#modalHasilSeleksi">
                                        Lihat Hasil Seleksi
                                    </button>
                                @endif
                            </div>
                        </div>

                        <div class="card student-card">
                            <div class="card-body p-4">
                                <h6 class="fw-bold">Navigasi</h6>
                                <hr class="mb-4">

                                <ol class="nav-list mb-0 ps-3">
                                    <li>
                                        <a href="/siswa/profil" class="btn-link">Lengkapi Data Profil</a>
                                    </li>
                                    <li>
                                        <a href="/siswa/pendaftaran/{{ $siswa->id }}/edit-data-orangtua"
                                            class="btn-link">
                                            Lengkapi Data Orang Tua
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/siswa/pendaftaran/{{ $siswa->id }}/edit-data-berkas" class="btn-link">
                                            Lengkapi Berkas-berkas
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/siswa/pendaftaran" class="btn-link">Submit Pendaftaran</a>
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="card student-card mb-4">
                            <div class="card-body p-4">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <h6 class="fw-bold mb-0">Kelengkapan Pendaftaran</h6>
                                    <span class="badge bg-primary rounded-pill">{{ $jumlahLengkap }}/3</span>
                                </div>

                                <hr class="mb-4">

                                <div class="check-item">
                                    <div>
                                        <div class="check-title">Data Profil</div>
                                        <div class="check-subtitle">Identitas utama siswa</div>
                                    </div>
                                    @if ($kelengkapan['profil'])
                                        <span class="badge bg-success rounded-pill-custom">Lengkap</span>
                                    @else
                                        <span class="badge bg-danger rounded-pill-custom">Belum Lengkap</span>
                                    @endif
                                </div>

                                <div class="check-item">
                                    <div>
                                        <div class="check-title">Data Orang Tua</div>
                                        <div class="check-subtitle">Informasi ayah, ibu, dan wali</div>
                                    </div>
                                    @if ($kelengkapan['orang_tua'])
                                        <span class="badge bg-success rounded-pill-custom">Lengkap</span>
                                    @else
                                        <span class="badge bg-danger rounded-pill-custom">Belum Lengkap</span>
                                    @endif
                                </div>

                                <div class="check-item">
                                    <div>
                                        <div class="check-title">Data Berkas</div>
                                        <div class="check-subtitle">Akta, KK, KTP, dan rapor</div>
                                    </div>
                                    @if ($kelengkapan['berkas'])
                                        <span class="badge bg-success rounded-pill-custom">Lengkap</span>
                                    @else
                                        <span class="badge bg-danger rounded-pill-custom">Belum Lengkap</span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="card student-card">
                            <div class="card-body p-4">
                                <h6 class="fw-bold">Catatan Terkait Pendaftaran</h6>
                                <hr class="mb-4">

                                <p class="mb-0">
                                    {{ $siswa->catatan ? $siswa->catatan : 'Belum ada catatan' }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="modalHasilSeleksi" tabindex="-1" aria-labelledby="modalHasilSeleksiLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalHasilSeleksiLabel">Hasil Seleksi</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                @if ($siswa->status === 'Lulus')
                                    <h6>
                                        Selamat! Anda telah berhasil melewati semua tahapan seleksi dengan baik dan
                                        dinyatakan <span class="text-primary fw-bold">LULUS</span>.
                                    </h6>
                                @else
                                    <h6>
                                        Terima kasih atas partisipasi Anda dalam proses seleksi ini. Meskipun Anda
                                        dinyatakan <span class="text-danger fw-bold">TIDAK LULUS</span>, tetap semangat
                                        dan terus berusaha pada kesempatan berikutnya.
                                    </h6>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
