@extends('layouts.admin')

@section('content')
    @php
        $chunks = $timelines->chunk((int) ceil($timelines->count() / 2));
        $leftTimelines = $chunks->get(0) ?? collect();
        $rightTimelines = $chunks->get(1) ?? collect();
    @endphp

    <style>
        .dashboard-hero {
            border: 0;
            border-radius: 24px;
            background: linear-gradient(135deg, #0f766e, #14b8a6);
            color: #fff;
        }

        .dashboard-hero .hero-subtitle {
            color: rgba(255, 255, 255, 0.86);
        }

        .timeline-main-card {
            border: 0;
            border-radius: 24px;
            background: #fff;
        }

        .timeline-column-card {
            border: 1px solid #edf2f7;
            border-radius: 20px;
            background: #fff;
            box-shadow: 0 8px 24px rgba(15, 23, 42, 0.04);
            height: 100%;
        }

        .timeline-list {
            position: relative;
            padding-left: 18px;
        }

        .timeline-item {
            position: relative;
            padding-left: 76px;
            padding-bottom: 28px;
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
            height: calc(100% + 10px);
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
            font-size: 18px;
            font-weight: 700;
            color: #1f2937;
            line-height: 1.35;
            margin-bottom: 4px;
        }

        .timeline-date {
            color: #16a34a;
            font-weight: 600;
            font-size: 14px;
            margin-bottom: 2px;
        }

        .timeline-desc {
            color: #6b7280;
            font-size: 13px;
            line-height: 1.4;
        }

        .timeline-edit-btn {
            width: 40px;
            height: 40px;
            border-radius: 12px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .modal-content {
            border: 0;
            border-radius: 24px;
            overflow: hidden;
            box-shadow: 0 20px 50px rgba(15, 23, 42, 0.18);
        }

        .modal-header {
            background: linear-gradient(135deg, #0f766e, #14b8a6);
            color: #fff;
            border-bottom: 0;
            padding: 18px 24px;
        }

        .modal-header .btn-close {
            filter: brightness(0) invert(1);
        }

        .modal-body {
            padding: 24px;
        }

        .modal-footer {
            border-top: 0;
            padding: 0 24px 24px 24px;
        }

        .timeline-info-box {
            background: #f8fafc;
            border-radius: 16px;
            padding: 14px 16px;
        }

        .stats-card {
            border: 0;
            border-radius: 22px;
            background: #fff;
            box-shadow: 0 8px 24px rgba(15, 23, 42, 0.05);
            height: 100%;
            transition: all 0.25s ease;
        }

        .stats-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 14px 28px rgba(15, 23, 42, 0.08);
        }

        .stats-icon {
            width: 56px;
            height: 56px;
            border-radius: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            flex-shrink: 0;
        }

        .stats-icon.teal {
            background: rgba(20, 184, 166, 0.12);
            color: #0f766e;
        }

        .stats-icon.blue {
            background: rgba(59, 130, 246, 0.12);
            color: #1d4ed8;
        }

        .stats-icon.green {
            background: rgba(34, 197, 94, 0.12);
            color: #15803d;
        }

        .stats-label {
            font-size: 0.92rem;
            color: #64748b;
            margin-bottom: 6px;
        }

        .stats-value {
            font-size: 2rem;
            font-weight: 800;
            color: #0f172a;
            line-height: 1;
            margin-bottom: 6px;
        }

        .stats-desc {
            font-size: 0.88rem;
            color: #94a3b8;
        }
    </style>

    <div class="main-content">
        <div class="app-content">
            <div class="app-content-header shadow-sm">
                <h1 class="app-content-headerText fw-bold">
                    <button class="btn-sidebar" id="btn-sidebar">
                        <i class="bi bi-layout-sidebar-inset"></i>
                    </button>
                    Dashboard Admin
                </h1>
            </div>

            <div class="content-body">
                @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show rounded-3" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show rounded-3" role="alert">
                        <strong>Terjadi kesalahan.</strong>
                        <ul class="mb-0 mt-2 ps-3">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="card dashboard-hero shadow-sm mb-4">
                    <div class="card-body p-4 p-lg-5">
                        <h3 class="fw-bold mb-2">Selamat Datang, {{ $user->username }}</h3>
                        <p class="hero-subtitle mb-0">
                            Kelola timeline PPDB dengan cepat, rapi, dan langsung dari satu halaman dashboard.
                        </p>
                    </div>
                </div>

                <div class="row g-4 mb-4">
                    <div class="col-lg-4 col-md-6">
                        <div class="card stats-card">
                            <div class="card-body p-4">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="stats-icon teal">
                                        <i class="bi bi-people-fill"></i>
                                    </div>
                                    <div>
                                        <div class="stats-label">Jumlah Pendaftar</div>
                                        <div class="stats-value">{{ $jumlahPendaftar }}</div>
                                        <div class="stats-desc">Total siswa yang sudah mendaftar</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="card stats-card">
                            <div class="card-body p-4">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="stats-icon blue">
                                        <i class="bi bi-diagram-3-fill"></i>
                                    </div>
                                    <div>
                                        <div class="stats-label">Siswa per Gelombang</div>
                                        <div class="stats-value">{{ $totalSiswaPerGelombang }}</div>
                                        <div class="stats-desc">
                                            {{ $gelombangAktif ? $gelombangAktif->nama_gelombang : 'Belum ada gelombang aktif' }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="card stats-card">
                            <div class="card-body p-4">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="stats-icon green">
                                        <i class="bi bi-patch-check-fill"></i>
                                    </div>
                                    <div>
                                        <div class="stats-label">Sudah Diverifikasi</div>
                                        <div class="stats-value">{{ $totalSudahDiverifikasi }}</div>
                                        <div class="stats-desc">Total siswa yang lolos verifikasi</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @if ($gelombangAktif)
                    <div class="card timeline-main-card shadow-sm">
                        <div class="card-body p-4 p-lg-5">
                            <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-4">
                                <div>
                                    <h4 class="fw-bold mb-1">Timeline {{ $gelombangAktif->nama_gelombang }}</h4>
                                    <p class="text-muted mb-0">
                                        Klik ikon pensil pada setiap tahap untuk mengubah tanggal melalui modal.
                                    </p>
                                </div>
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

                                                        <div class="d-flex justify-content-between align-items-start gap-3">
                                                            <div>
                                                                <div class="timeline-title">{{ $item->nama_tahap }}</div>
                                                                <div class="timeline-date">{{ $tanggalTampil }}</div>
                                                                <div class="timeline-desc">
                                                                    Tahap ke-{{ $item->urutan }} dalam proses
                                                                    {{ $gelombangAktif->nama_gelombang }}.
                                                                </div>
                                                            </div>

                                                            <button type="button"
                                                                class="btn btn-light shadow-sm timeline-edit-btn openTimelineModal"
                                                                data-bs-toggle="modal" data-bs-target="#timelineModal"
                                                                data-id="{{ $item->id }}"
                                                                data-tahap="{{ $item->nama_tahap }}"
                                                                data-gelombang="{{ $gelombangAktif->nama_gelombang }}"
                                                                data-tanggal_mulai="{{ $item->tanggal_mulai ? $item->tanggal_mulai->format('Y-m-d') : '' }}"
                                                                data-tanggal_selesai="{{ $item->tanggal_selesai ? $item->tanggal_selesai->format('Y-m-d') : '' }}"
                                                                title="Edit tanggal">
                                                                <i class="bi bi-pencil-square"></i>
                                                            </button>
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

                                                        <div class="d-flex justify-content-between align-items-start gap-3">
                                                            <div>
                                                                <div class="timeline-title">{{ $item->nama_tahap }}</div>
                                                                <div class="timeline-date">{{ $tanggalTampil }}</div>
                                                                <div class="timeline-desc">
                                                                    Tahap ke-{{ $item->urutan }} dalam proses
                                                                    {{ $gelombangAktif->nama_gelombang }}.
                                                                </div>
                                                            </div>

                                                            <button type="button"
                                                                class="btn btn-light shadow-sm timeline-edit-btn openTimelineModal"
                                                                data-bs-toggle="modal" data-bs-target="#timelineModal"
                                                                data-id="{{ $item->id }}"
                                                                data-tahap="{{ $item->nama_tahap }}"
                                                                data-gelombang="{{ $gelombangAktif->nama_gelombang }}"
                                                                data-tanggal_mulai="{{ $item->tanggal_mulai ? $item->tanggal_mulai->format('Y-m-d') : '' }}"
                                                                data-tanggal_selesai="{{ $item->tanggal_selesai ? $item->tanggal_selesai->format('Y-m-d') : '' }}"
                                                                title="Edit tanggal">
                                                                <i class="bi bi-pencil-square"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal fade" id="timelineModal" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <form method="POST" id="timelineForm">
                                                @csrf
                                                @method('PUT')

                                                <div class="modal-header">
                                                    <div>
                                                        <h5 class="modal-title fw-bold mb-1">Edit Timeline</h5>
                                                        <div class="small opacity-75">Perbarui tanggal tahap PPDB</div>
                                                    </div>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>

                                                <div class="modal-body">
                                                    <div class="timeline-info-box mb-3">
                                                        <div class="small text-muted mb-1">Gelombang</div>
                                                        <div class="fw-semibold" id="modalGelombang">-</div>
                                                    </div>

                                                    <div class="timeline-info-box mb-3">
                                                        <div class="small text-muted mb-1">Tahap</div>
                                                        <div class="fw-semibold" id="modalTahap">-</div>
                                                    </div>

                                                    <div class="row g-3">
                                                        <div class="col-md-6">
                                                            <label for="modalTanggalMulai"
                                                                class="form-label small text-muted fw-semibold">
                                                                Tanggal Mulai
                                                            </label>
                                                            <input type="date" class="form-control rounded-3"
                                                                id="modalTanggalMulai" name="tanggal_mulai">
                                                        </div>

                                                        <div class="col-md-6">
                                                            <label for="modalTanggalSelesai"
                                                                class="form-label small text-muted fw-semibold">
                                                                Tanggal Selesai
                                                            </label>
                                                            <input type="date" class="form-control rounded-3"
                                                                id="modalTanggalSelesai" name="tanggal_selesai">
                                                            <div class="form-text">
                                                                Kosongkan jika tahap hanya 1 hari.
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light rounded-pill px-4"
                                                        data-bs-dismiss="modal">
                                                        Batal
                                                    </button>
                                                    <button type="submit" class="btn btn-primary rounded-pill px-4">
                                                        Simpan Perubahan
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="alert alert-warning mb-0 rounded-3">
                                    Timeline untuk gelombang ini belum tersedia.
                                </div>
                            @endif
                        </div>
                    </div>
                @else
                    <div class="alert alert-warning rounded-3 mb-0">
                        Data gelombang belum tersedia.
                    </div>
                @endif
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const modalElement = document.getElementById('timelineModal');
            const modal = modalElement ? new bootstrap.Modal(modalElement) : null;
            const form = document.getElementById('timelineForm');
            const modalTahap = document.getElementById('modalTahap');
            const modalGelombang = document.getElementById('modalGelombang');
            const modalTanggalMulai = document.getElementById('modalTanggalMulai');
            const modalTanggalSelesai = document.getElementById('modalTanggalSelesai');

            document.querySelectorAll('.openTimelineModal').forEach(button => {
                button.addEventListener('click', function() {
                    const id = this.dataset.id;
                    const tahap = this.dataset.tahap;
                    const gelombang = this.dataset.gelombang;
                    const tanggalMulai = this.dataset.tanggal_mulai;
                    const tanggalSelesai = this.dataset.tanggal_selesai;

                    form.action = "{{ url('admin/timeline') }}/" + id;
                    modalTahap.textContent = tahap;
                    modalGelombang.textContent = gelombang;
                    modalTanggalMulai.value = tanggalMulai;
                    modalTanggalSelesai.value = tanggalSelesai;
                });
            });

            @if (session('edit_timeline_id'))
                const currentButton = document.querySelector(
                    '.openTimelineModal[data-id="{{ session('edit_timeline_id') }}"]'
                );

                if (currentButton && modal) {
                    form.action = "{{ url('admin/timeline') }}/{{ session('edit_timeline_id') }}";
                    modalTahap.textContent = currentButton.dataset.tahap;
                    modalGelombang.textContent = currentButton.dataset.gelombang;
                    modalTanggalMulai.value = @json(old('tanggal_mulai'));
                    modalTanggalSelesai.value = @json(old('tanggal_selesai'));
                    modal.show();
                }
            @endif
        });
    </script>
@endsection
