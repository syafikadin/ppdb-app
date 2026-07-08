@extends('layouts.siswa')
@section('content')
    <div class="main-content">
        <div class="app-content">
            <div class="app-content-header shadow-sm">
                <h1 class="app-content-headerText fw-bold">
                    <button class="btn-sidebar" id="btn-sidebar">
                        <i class="bi bi-layout-sidebar-inset"></i>
                    </button>
                    Formulir Pendaftaran
                </h1>
            </div>

            <div class="content-body">
                @php
                    $isLocked = $data_siswa->status !== 'Belum Mendaftar';
                @endphp

                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <form action="{{ route('pendaftaran.updateDataBerkas', $data_siswa->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="card shadow">
                        <div class="card-body">
                            <h5 class="card-title fw-bold">Berkas-Berkas</h5>
                            <hr>
                            <div class="alert alert-secondary small mb-3" role="alert">
                                Keterangan: <strong>Wajib</strong> untuk berkas utama, <strong>Opsional</strong> untuk
                                dokumen pendukung.
                            </div>
                            <div class="mb-3">
                                <label for="piagam" class="form-label small">Piagam yang dimiliki <span
                                        class="text-muted">(Opsional)</span></label>
                                <input class="form-control @error('piagam') is-invalid @enderror" type="file"
                                    id="piagam" name="piagam" onchange="previewImage(this, '#piagam-preview')"
                                    {{ $isLocked ? 'disabled' : '' }}>
                                @error('piagam')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <label class="text-italic text-danger"><i>Harus piagam asli, bukan milik orang
                                        lain</i></label>
                                <img class="img-preview img-fluid col-sm-5 d-block" id="piagam-preview"
                                    src="{{ $data_siswa->piagam ? asset($data_siswa->piagam) : '' }}">

                                {{-- Jika ingin ada defaultnya --}}
                                {{-- src="{{ $data_siswa->piagam ? asset($data_siswa->piagam) : asset('assets/images/person.jpg') }}"> --}}
                            </div>

                            <div class="mb-3">
                                <label for="foto_3x4" class="form-label small">Foto 3x4 <span
                                        class="text-muted">(Wajib)</span></label>
                                <input class="form-control @error('foto_3x4') is-invalid @enderror" type="file"
                                    id="foto_3x4" name="foto_3x4" onchange="previewImage(this, '#foto_3x4-preview')"
                                    {{ $isLocked ? 'disabled' : '' }}>
                                @error('foto_3x4')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <img class="img-preview img-fluid col-sm-5 d-block" id="foto_3x4-preview"
                                    src="{{ $data_siswa->foto_3x4 ? asset($data_siswa->foto_3x4) : '' }}">
                            </div>

                            <div class="mb-3">
                                <label for="akta" class="form-label small">Scan Akta Kelahiran <span
                                        class="text-muted">(Wajib)</span></label>
                                <input class="form-control @error('akta') is-invalid @enderror" type="file"
                                    id="akta" name="akta" onchange="previewImage(this, '#akta-preview')"
                                    {{ $isLocked ? 'disabled' : '' }}>
                                @error('akta')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <img class="img-preview img-fluid col-sm-5 d-block" id="akta-preview"
                                    src="{{ $data_siswa->akta ? asset($data_siswa->akta) : '' }}">
                            </div>

                            <div class="mb-3">
                                <label for="kk" class="form-label small">Scan KK <span
                                        class="text-muted">(Wajib)</span></label>
                                <input class="form-control @error('kk') is-invalid @enderror" type="file" id="kk"
                                    name="kk" onchange="previewImage(this, '#kk-preview')"
                                    {{ $isLocked ? 'disabled' : '' }}>
                                @error('kk')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <img class="img-preview img-fluid col-sm-5 d-block" id="kk-preview"
                                    src="{{ $data_siswa->kk ? asset($data_siswa->kk) : '' }}">
                            </div>

                            <div class="mb-3">
                                <label for="ktp" class="form-label small">Scan KTP orang tua <span
                                        class="text-muted">(Wajib)</span></label>
                                <input class="form-control @error('ktp') is-invalid @enderror" type="file" id="ktp"
                                    name="ktp" onchange="previewImage(this, '#ktp-preview')"
                                    {{ $isLocked ? 'disabled' : '' }}>
                                @error('ktp')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <img class="img-preview img-fluid col-sm-5 d-block" id="ktp-preview"
                                    src="{{ $data_siswa->ktp ? asset($data_siswa->ktp) : '' }}">
                            </div>

                            <div class="mb-2">
                                <label for="skl_ijazah" class="form-label small">Surat Keterangan Lulus/ ijazah yang sudah
                                    legalisir <span class="text-muted">(Wajib)</span></label>
                                <input class="form-control @error('skl_ijazah') is-invalid @enderror" type="file"
                                    id="skl_ijazah" name="skl_ijazah"
                                    onchange="previewImage(this, '#skl_ijazah-preview')"
                                    {{ $isLocked ? 'disabled' : '' }}>
                                @error('skl_ijazah')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <img class="img-preview img-fluid col-sm-5 d-block" id="skl_ijazah-preview"
                                    src="{{ $data_siswa->skl_ijazah ? asset($data_siswa->skl_ijazah) : '' }}">
                            </div>
                            <div class="mb-2">
                                <label for="surat_tidak_mampu" class="form-label small">Surat Keterangan Tidak Mampu dari
                                    desa/KIP/KIS/KKS <span class="text-muted">(Wajib)</span></label>
                                <input class="form-control @error('surat_tidak_mampu') is-invalid @enderror"
                                    type="file" id="surat_tidak_mampu" name="surat_tidak_mampu"
                                    onchange="previewImage(this, '#surat_tidak_mampu-preview')"
                                    {{ $isLocked ? 'disabled' : '' }}>
                                @error('surat_tidak_mampu')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <img class="img-preview img-fluid col-sm-5 d-block" id="surat_tidak_mampu-preview"
                                    src="{{ $data_siswa->surat_tidak_mampu ? asset($data_siswa->surat_tidak_mampu) : '' }}">
                            </div>
                        </div>

                        @if (!$isLocked)
                            <button type="submit" class="btn btn-primary btn-lg my-2 mx-2">Simpan</button>
                        @else
                            <div class="alert alert-info m-2" role="alert">
                                Formulir ini telah terkunci karena data sudah diproses.
                            </div>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function previewImage(input, imgPreviewSelector) {
            const file = input.files[0];
            const imgPreview = document.querySelector(imgPreviewSelector);

            if (file) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    imgPreview.src = e.target.result;
                }

                reader.readAsDataURL(file);
            } else {
                imgPreview.src = ''; // Clear the preview if no file is selected
            }
        }
    </script>
@endsection
