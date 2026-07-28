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
                                    id="piagam" name="piagam" accept="application/pdf,image/*"
                                    onchange="previewFile(this, '#piagam-preview-wrapper')"
                                    {{ $isLocked ? 'disabled' : '' }}>
                                @error('piagam')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <label class="text-italic text-danger"><i>Harus piagam asli, bukan milik orang
                                        lain</i></label>
                                <div class="preview-container mt-2" id="piagam-preview-wrapper">
                                    @if ($data_siswa->piagam)
                                        @php $piagamExt = strtolower(pathinfo($data_siswa->piagam, PATHINFO_EXTENSION)); @endphp
                                        @if ($piagamExt === 'pdf')
                                            <iframe class="w-100 rounded border" style="min-height: 300px;"
                                                src="{{ asset($data_siswa->piagam) }}"></iframe>
                                        @else
                                            <img class="img-preview img-fluid col-sm-5 d-block"
                                                src="{{ asset($data_siswa->piagam) }}" alt="Preview piagam">
                                        @endif
                                    @endif
                                </div>

                                {{-- Jika ingin ada defaultnya --}}
                                {{-- src="{{ $data_siswa->piagam ? asset($data_siswa->piagam) : asset('assets/images/person.jpg') }}"> --}}
                            </div>

                            <div class="mb-3">
                                <label for="foto_3x4" class="form-label small">Foto 3x4 <span
                                        class="text-muted">(Wajib)</span></label>
                                <input class="form-control @error('foto_3x4') is-invalid @enderror" type="file"
                                    id="foto_3x4" name="foto_3x4" accept="application/pdf,image/*"
                                    onchange="previewFile(this, '#foto_3x4-preview-wrapper')"
                                    {{ $isLocked ? 'disabled' : '' }}>
                                @error('foto_3x4')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <div class="preview-container mt-2" id="foto_3x4-preview-wrapper">
                                    @if ($data_siswa->foto_3x4)
                                        @php $fotoExt = strtolower(pathinfo($data_siswa->foto_3x4, PATHINFO_EXTENSION)); @endphp
                                        @if ($fotoExt === 'pdf')
                                            <iframe class="w-100 rounded border" style="min-height: 300px;"
                                                src="{{ asset($data_siswa->foto_3x4) }}"></iframe>
                                        @else
                                            <img class="img-preview img-fluid col-sm-5 d-block"
                                                src="{{ asset($data_siswa->foto_3x4) }}" alt="Preview foto 3x4">
                                        @endif
                                    @endif
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="akta" class="form-label small">Scan Akta Kelahiran <span
                                        class="text-muted">(Wajib)</span></label>
                                <input class="form-control @error('akta') is-invalid @enderror" type="file"
                                    id="akta" name="akta" accept="application/pdf,image/*"
                                    onchange="previewFile(this, '#akta-preview-wrapper')"
                                    {{ $isLocked ? 'disabled' : '' }}>
                                @error('akta')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <div class="preview-container mt-2" id="akta-preview-wrapper">
                                    @if ($data_siswa->akta)
                                        @php $aktaExt = strtolower(pathinfo($data_siswa->akta, PATHINFO_EXTENSION)); @endphp
                                        @if ($aktaExt === 'pdf')
                                            <iframe class="w-100 rounded border" style="min-height: 300px;"
                                                src="{{ asset($data_siswa->akta) }}"></iframe>
                                        @else
                                            <img class="img-preview img-fluid col-sm-5 d-block"
                                                src="{{ asset($data_siswa->akta) }}" alt="Preview akta">
                                        @endif
                                    @endif
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="kk" class="form-label small">Scan KK <span
                                        class="text-muted">(Wajib)</span></label>
                                <input class="form-control @error('kk') is-invalid @enderror" type="file" id="kk"
                                    name="kk" accept="application/pdf,image/*"
                                    onchange="previewFile(this, '#kk-preview-wrapper')" {{ $isLocked ? 'disabled' : '' }}>
                                @error('kk')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <div class="preview-container mt-2" id="kk-preview-wrapper">
                                    @if ($data_siswa->kk)
                                        @php $kkExt = strtolower(pathinfo($data_siswa->kk, PATHINFO_EXTENSION)); @endphp
                                        @if ($kkExt === 'pdf')
                                            <iframe class="w-100 rounded border" style="min-height: 300px;"
                                                src="{{ asset($data_siswa->kk) }}"></iframe>
                                        @else
                                            <img class="img-preview img-fluid col-sm-5 d-block"
                                                src="{{ asset($data_siswa->kk) }}" alt="Preview KK">
                                        @endif
                                    @endif
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="ktp" class="form-label small">Scan KTP orang tua <span
                                        class="text-muted">(Wajib)</span></label>
                                <input class="form-control @error('ktp') is-invalid @enderror" type="file"
                                    id="ktp" name="ktp" accept="application/pdf,image/*"
                                    onchange="previewFile(this, '#ktp-preview-wrapper')"
                                    {{ $isLocked ? 'disabled' : '' }}>
                                @error('ktp')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <div class="preview-container mt-2" id="ktp-preview-wrapper">
                                    @if ($data_siswa->ktp)
                                        @php $ktpExt = strtolower(pathinfo($data_siswa->ktp, PATHINFO_EXTENSION)); @endphp
                                        @if ($ktpExt === 'pdf')
                                            <iframe class="w-100 rounded border" style="min-height: 300px;"
                                                src="{{ asset($data_siswa->ktp) }}"></iframe>
                                        @else
                                            <img class="img-preview img-fluid col-sm-5 d-block"
                                                src="{{ asset($data_siswa->ktp) }}" alt="Preview KTP">
                                        @endif
                                    @endif
                                </div>
                            </div>

                            <div class="mb-2">
                                <label for="skl_ijazah" class="form-label small">Surat Keterangan Lulus/ ijazah yang sudah
                                    legalisir <span class="text-muted">(Wajib)</span></label>
                                <input class="form-control @error('skl_ijazah') is-invalid @enderror" type="file"
                                    id="skl_ijazah" name="skl_ijazah" accept="application/pdf,image/*"
                                    onchange="previewFile(this, '#skl_ijazah-preview-wrapper')"
                                    {{ $isLocked ? 'disabled' : '' }}>
                                @error('skl_ijazah')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <div class="preview-container mt-2" id="skl_ijazah-preview-wrapper">
                                    @if ($data_siswa->skl_ijazah)
                                        @php $sklExt = strtolower(pathinfo($data_siswa->skl_ijazah, PATHINFO_EXTENSION)); @endphp
                                        @if ($sklExt === 'pdf')
                                            <iframe class="w-100 rounded border" style="min-height: 300px;"
                                                src="{{ asset($data_siswa->skl_ijazah) }}"></iframe>
                                        @else
                                            <img class="img-preview img-fluid col-sm-5 d-block"
                                                src="{{ asset($data_siswa->skl_ijazah) }}" alt="Preview ijazah">
                                        @endif
                                    @endif
                                </div>
                            </div>
                            <div class="mb-2">
                                <label for="surat_tidak_mampu" class="form-label small">Surat Keterangan Tidak Mampu dari
                                    desa/KIP/KIS/KKS <span class="text-muted">(Wajib)</span></label>
                                <input class="form-control @error('surat_tidak_mampu') is-invalid @enderror"
                                    type="file" id="surat_tidak_mampu" name="surat_tidak_mampu"
                                    accept="application/pdf,image/*"
                                    onchange="previewFile(this, '#surat_tidak_mampu-preview-wrapper')"
                                    {{ $isLocked ? 'disabled' : '' }}>
                                @error('surat_tidak_mampu')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <div class="preview-container mt-2" id="surat_tidak_mampu-preview-wrapper">
                                    @if ($data_siswa->surat_tidak_mampu)
                                        @php $suratExt = strtolower(pathinfo($data_siswa->surat_tidak_mampu, PATHINFO_EXTENSION)); @endphp
                                        @if ($suratExt === 'pdf')
                                            <iframe class="w-100 rounded border" style="min-height: 300px;"
                                                src="{{ asset($data_siswa->surat_tidak_mampu) }}"></iframe>
                                        @else
                                            <img class="img-preview img-fluid col-sm-5 d-block"
                                                src="{{ asset($data_siswa->surat_tidak_mampu) }}"
                                                alt="Preview surat tidak mampu">
                                        @endif
                                    @endif
                                </div>
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
        function previewFile(input, previewWrapperSelector) {
            const file = input.files[0];
            const previewWrapper = document.querySelector(previewWrapperSelector);

            if (!previewWrapper) {
                return;
            }

            if (!file) {
                previewWrapper.innerHTML = '';
                return;
            }

            const isPdf = file.type === 'application/pdf' || file.name.toLowerCase().endsWith('.pdf');

            if (isPdf) {
                const objectUrl = URL.createObjectURL(file);
                previewWrapper.innerHTML =
                    `<iframe class="w-100 rounded border" style="min-height: 300px;" src="${objectUrl}"></iframe>`;
                return;
            }

            if (file.type.startsWith('image/')) {
                const objectUrl = URL.createObjectURL(file);
                previewWrapper.innerHTML =
                    `<img class="img-preview img-fluid col-sm-5 d-block" src="${objectUrl}" alt="Preview berkas">`;
                return;
            }

            previewWrapper.innerHTML =
                '<div class="alert alert-light border mb-0">Preview hanya tersedia untuk gambar atau PDF.</div>';
        }
    </script>
@endsection
