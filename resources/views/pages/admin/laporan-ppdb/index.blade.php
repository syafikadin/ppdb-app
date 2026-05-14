@extends('layouts.admin')
@section('content')
    <div class="main-content">
        <div class="app-content">
            <div class="app-content-header shadow-sm">
                <h1 class="app-content-headerText fw-bold">
                    <button class="btn-sidebar" id="btn-sidebar">
                        <i class="bi bi-layout-sidebar-inset"></i>
                    </button>
                    Laporan PPDB
                </h1>
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

                <div class="card shadow mt-3">
                    <div class="card-body">
                        <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-4">
                            <h5 class="fw-bold mb-0">Tabel laporan seluruh pendaftar PPDB</h5>
                            <a href="{{ route('laporan-ppdb.export') }}" class="btn btn-success">
                                <i class="bi bi-download me-1"></i> Export CSV
                            </a>
                        </div>

                        <hr>

                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead class="table-dark">
                                    <tr>
                                        <th class="align-middle text-center">No</th>
                                        <th class="align-middle">Nama</th>
                                        <th class="align-middle">NISN</th>
                                        <th class="align-middle">Asal Sekolah</th>
                                        <th class="align-middle">Gelombang</th>
                                        <th class="align-middle text-center">Status Pendaftaran</th>
                                        <th class="align-middle text-center">Keterangan Kelulusan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($laporan as $item)
                                        @php
                                            $kelulusan =
                                                $item->status === 'Lulus'
                                                    ? 'Lulus'
                                                    : ($item->status === 'Tidak Lulus'
                                                        ? 'Tidak Lulus'
                                                        : 'Belum Diumumkan');
                                        @endphp
                                        <tr>
                                            <td class="text-center align-middle">{{ $laporan->firstItem() + $loop->index }}
                                            </td>
                                            <td class="align-middle">{{ $item->nama_siswa }}</td>
                                            <td class="align-middle">{{ $item->nisn ?? '-' }}</td>
                                            <td class="align-middle">{{ $item->asal_sekolah ?? '-' }}</td>
                                            <td class="align-middle">{{ optional($item->gelombang)->nama_gelombang ?? '-' }}
                                            </td>
                                            <td class="text-center align-middle">{{ $item->status }}</td>
                                            <td class="text-center align-middle">
                                                @if ($kelulusan === 'Lulus')
                                                    <span class="badge bg-success">Lulus</span>
                                                @elseif ($kelulusan === 'Tidak Lulus')
                                                    <span class="badge bg-danger">Tidak Lulus</span>
                                                @else
                                                    <span class="badge bg-secondary">Belum Diumumkan</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7" class="text-center">Belum ada data pendaftar.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        <div class="mt-3">
                            {{ $laporan->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
