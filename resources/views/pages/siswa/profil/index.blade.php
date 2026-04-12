@extends('layouts.siswa')

@section('content')
    <div class="main-content">
        <div class="app-content">
            <div class="app-content-header shadow-sm">
                <h1 class="app-content-headerText fw-bold">
                    <button class="btn-sidebar" id="btn-sidebar">
                        <i class="bi bi-layout-sidebar-inset"></i>
                    </button>
                    Profil
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

                @if ($data_siswa)
                    <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                        <div class="row g-0">
                            <div class="col-lg-4 p-4 border-end bg-light">
                                <div class="text-center mb-4">
                                    @if ($data_siswa->foto)
                                        <img src="{{ asset($data_siswa->foto) }}" class="img-fluid rounded-4 shadow-sm"
                                            alt="Foto Profil" style="width: 220px; height: 220px; object-fit: cover;">
                                    @else
                                        <img src="{{ asset('/assets/images/person.jpg') }}"
                                            class="img-fluid rounded-4 shadow-sm" alt="Foto Default"
                                            style="width: 220px; height: 220px; object-fit: cover;">
                                    @endif
                                </div>

                                <div class="text-center mb-4">
                                    <h4 class="fw-bold mb-1">{{ $data_siswa->nama_siswa }}</h4>
                                    <div class="text-muted small">
                                        {{ $data_siswa->asal_sekolah ?: 'Asal sekolah belum diisi' }}
                                    </div>
                                </div>

                                <div class="card border-0 bg-white shadow-sm rounded-4 p-3 mb-3">
                                    <label class="form-label text-muted small mb-1">Email</label>
                                    <div class="fw-semibold">{{ $data_siswa->email ?: '-' }}</div>
                                </div>

                                <div class="card border-0 bg-white shadow-sm rounded-4 p-3">
                                    <label class="form-label text-muted small mb-1">Whatsapp</label>
                                    <div class="fw-semibold">{{ $data_siswa->nomor_wa ?: '-' }}</div>
                                </div>
                            </div>

                            <div class="col-lg-8 p-4 p-lg-5">
                                <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-3">
                                    <div>
                                        <h4 class="fw-bold mb-1">Informasi Pribadi</h4>
                                        <p class="text-muted small mb-0">Data identitas santri yang telah diinput</p>
                                    </div>

                                    @if ($data_siswa->status === 'Belum Mendaftar')
                                        <a href="{{ route('profil.edit', $data_siswa->id) }}"
                                            class="btn btn-success rounded-pill px-4">
                                            Edit Data
                                        </a>
                                    @endif
                                </div>

                                <hr class="mb-4">

                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label for="nama_siswa" class="form-label text-muted small">Nama</label>
                                        <input type="text" class="form-control rounded-3" id="nama_siswa"
                                            value="{{ $data_siswa->nama_siswa }}" disabled>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="nisn" class="form-label text-muted small">NISN</label>
                                        <input type="text" class="form-control rounded-3" id="nisn"
                                            value="{{ $data_siswa->nisn ?: '-' }}" disabled>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label text-muted small">Jenis Kelamin</label>
                                        <input type="text" class="form-control rounded-3"
                                            value="{{ $data_siswa->jenis_kelamin === 'L' ? 'Laki-laki' : ($data_siswa->jenis_kelamin === 'P' ? 'Perempuan' : '-') }}"
                                            disabled>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="ukuran_seragam" class="form-label text-muted small">Ukuran
                                            Seragam</label>
                                        <select id="ukuran_seragam" name="ukuran_seragam" class="form-select rounded-3"
                                            disabled>
                                            <option value="" disabled
                                                {{ $data_siswa->ukuran_seragam ? '' : 'selected' }}>
                                                -- Pilih Ukuran Seragam --
                                            </option>
                                            @foreach (['S', 'M', 'L', 'XL', 'XXL'] as $ukuran)
                                                <option value="{{ $ukuran }}"
                                                    {{ $data_siswa->ukuran_seragam == $ukuran ? 'selected' : '' }}>
                                                    {{ $ukuran }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-12">
                                        <label class="form-label text-muted small">Asal Sekolah</label>
                                        <input type="text" class="form-control rounded-3"
                                            value="{{ $data_siswa->asal_sekolah ?: '-' }}" disabled>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label text-muted small">Tempat Lahir</label>
                                        <input type="text" class="form-control rounded-3"
                                            value="{{ $data_siswa->tempat_lahir ?: '-' }}" disabled>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label text-muted small">Tanggal Lahir</label>
                                        <input type="text" class="form-control rounded-3"
                                            value="{{ $data_siswa->tanggal_lahir ? \Carbon\Carbon::parse($data_siswa->tanggal_lahir)->format('d-m-Y') : '-' }}"
                                            disabled>
                                    </div>

                                    <div class="col-12">
                                        <label class="form-label text-muted small">Alamat</label>
                                        <textarea class="form-control rounded-3" rows="4" disabled>{{ $data_siswa->alamat ?: '-' }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="alert alert-warning mb-0 rounded-3">
                        Data profil siswa belum tersedia.
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
