@extends('layouts.admin')
@section('content')
    <div class="main-content data-siswa-page">
        <div class="app-content">
            <div class="app-content-header shadow-sm">
                <h1 class="app-content-headerText fw-bold">
                    <button class="btn-sidebar" id="btn-sidebar">
                        <i class="bi bi-layout-sidebar-inset"></i>
                    </button>
                    Data Siswa
                </h1>
            </div>

            <div class="content-body">

                @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                @if (session()->has('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Terjadi kesalahan!</strong>
                        <ul class="mb-0 mt-2">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                <div class="card data-siswa-table-card mt-4">
                    <div class="card-body p-4">
                        <div class="data-siswa-table-head">
                            <h5 class="data-siswa-table-title">Tabel data siswa</h5>

                            <button class="btn btn-siswa-primary" data-bs-toggle="modal" data-bs-target="#modalCreateSiswa">
                                <i class="bi bi-plus-circle"></i>
                                Tambah Data
                            </button>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-siswa">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th>Nama</th>
                                        <th>NISN</th>
                                        <th>Asal Sekolah</th>
                                        <th>No WA</th>
                                        <th>Gelombang</th>
                                        <th>Status</th>
                                        <th class="text-center" style="width: 220px;">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($data_siswa as $item)
                                        <tr>
                                            <td class="text-center">
                                                {{ $loop->iteration + ($data_siswa->firstItem() - 1) }}
                                            </td>
                                            <td>{{ $item->nama_siswa }}</td>
                                            <td>{{ $item->nisn ?? '-' }}</td>
                                            <td>{{ $item->asal_sekolah ?? '-' }}</td>
                                            <td>{{ $item->nomor_wa ?? '-' }}</td>
                                            <td>{{ $item->gelombang->nama_gelombang ?? '-' }}</td>
                                            <td>
                                                <span class="status-chip">{{ $item->status }}</span>
                                            </td>
                                            <td>
                                                <div class="siswa-action-stack d-grid gap-2">
                                                    <button class="btn btn-outline-info btn-sm btn-show-siswa"
                                                        data-bs-toggle="modal" data-bs-target="#modalShowSiswa"
                                                        data-nama_siswa="{{ $item->nama_siswa }}"
                                                        data-nisn="{{ $item->nisn }}"
                                                        data-username="{{ $item->user->username ?? '-' }}"
                                                        data-email="{{ $item->user->email ?? ($item->email ?? '-') }}"
                                                        data-jenis_kelamin="{{ $item->jenis_kelamin }}"
                                                        data-gelombang="{{ $item->gelombang->nama_gelombang ?? '-' }}"
                                                        data-tempat_lahir="{{ $item->tempat_lahir }}"
                                                        data-tanggal_lahir="{{ $item->tanggal_lahir ? $item->tanggal_lahir->format('d-m-Y') : '-' }}"
                                                        data-nomor_wa="{{ $item->nomor_wa }}"
                                                        data-asal_sekolah="{{ $item->asal_sekolah }}"
                                                        data-status="{{ $item->status }}"
                                                        data-alamat="{{ $item->alamat }}"
                                                        data-nama_ayah="{{ $item->nama_ayah }}"
                                                        data-pekerjaan_ayah="{{ $item->pekerjaan_ayah }}"
                                                        data-penghasilan_ayah="{{ $item->penghasilan_ayah }}"
                                                        data-nama_ibu="{{ $item->nama_ibu }}"
                                                        data-pekerjaan_ibu="{{ $item->pekerjaan_ibu }}"
                                                        data-penghasilan_ibu="{{ $item->penghasilan_ibu }}"
                                                        data-nomor_wali="{{ $item->nomor_wali }}"
                                                        data-alamat_wali="{{ $item->alamat_wali }}"
                                                        data-catatan="{{ $item->catatan }}">
                                                        <i class="bi bi-eye"></i> Detail
                                                    </button>

                                                    <button class="btn btn-outline-warning btn-sm btn-edit-siswa"
                                                        data-bs-toggle="modal" data-bs-target="#modalEditSiswa"
                                                        data-id="{{ $item->id }}"
                                                        data-nama_siswa="{{ $item->nama_siswa }}"
                                                        data-nisn="{{ $item->nisn }}"
                                                        data-username="{{ $item->user->username ?? '' }}"
                                                        data-email="{{ $item->user->email ?? ($item->email ?? '') }}"
                                                        data-gelombang_id="{{ $item->gelombang_id }}"
                                                        data-jenis_kelamin="{{ $item->jenis_kelamin }}"
                                                        data-tempat_lahir="{{ $item->tempat_lahir }}"
                                                        data-tanggal_lahir="{{ $item->tanggal_lahir ? $item->tanggal_lahir->format('Y-m-d') : '' }}"
                                                        data-alamat="{{ $item->alamat }}"
                                                        data-nomor_wa="{{ $item->nomor_wa }}"
                                                        data-asal_sekolah="{{ $item->asal_sekolah }}"
                                                        data-status="{{ $item->status }}"
                                                        data-nama_ayah="{{ $item->nama_ayah }}"
                                                        data-pekerjaan_ayah="{{ $item->pekerjaan_ayah }}"
                                                        data-penghasilan_ayah="{{ $item->penghasilan_ayah }}"
                                                        data-nama_ibu="{{ $item->nama_ibu }}"
                                                        data-pekerjaan_ibu="{{ $item->pekerjaan_ibu }}"
                                                        data-penghasilan_ibu="{{ $item->penghasilan_ibu }}"
                                                        data-nomor_wali="{{ $item->nomor_wali }}"
                                                        data-alamat_wali="{{ $item->alamat_wali }}"
                                                        data-catatan="{{ $item->catatan }}">
                                                        <i class="bi bi-pencil-square"></i> Edit
                                                    </button>

                                                    <form action="{{ route('data-siswa.destroy', $item->id) }}"
                                                        method="POST"
                                                        onsubmit="return confirm('Yakin ingin menghapus data siswa ini?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-outline-danger btn-sm w-100">
                                                            <i class="bi bi-trash"></i> Hapus
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="8" class="text-center align-middle">
                                                Belum ada data siswa.
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        <div class="mt-3">
                            {{ $data_siswa->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('pages.admin.data-siswa.partials.modal-create')
    @include('pages.admin.data-siswa.partials.modal-show')
    @include('pages.admin.data-siswa.partials.modal-edit')

    @include('pages.admin.data-siswa.partials.modal-script')
@endsection
