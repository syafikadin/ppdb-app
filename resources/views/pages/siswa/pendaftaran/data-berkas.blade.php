@extends('layouts.siswa')
@section('content')
    <div class="main-content">
        <div class="app-content">
            <div class="app-content-header shadow-sm">
                <h1 class="app-content-headerText fw-bold">
                    <button class="btn-sidebar" id="btn-sidebar">
                        <i class="bi bi-layout-sidebar-inset"></i>
                    </button>
                    Pendaftaran
                </h1>
            </div>

            <div class="content-body">
                <form action="{{ route('pendaftaran.updateDataBerkas', $data_siswa->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="card shadow">
                        <div class="card-body">
                            <h5 class="card-title fw-bold">Berkas-Berkas</h5>
                            <hr>
                            <div class="mb-3">
                                <label for="piagam" class="form-label small">Piagam yang dimiliki</label>
                                <input class="form-control @error('piagam') is-invalid @enderror" type="file"
                                    id="piagam" name="piagam" onchange="previewImage(this, '#piagam-preview')">
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
                                <label for="akta" class="form-label small">Scan Akta Kelahiran</label>
                                <input class="form-control @error('akta') is-invalid @enderror" type="file"
                                    id="akta" name="akta" onchange="previewImage(this, '#akta-preview')">
                                @error('akta')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <img class="img-preview img-fluid col-sm-5 d-block" id="akta-preview"
                                    src="{{ $data_siswa->akta ? asset($data_siswa->akta) : '' }}">
                            </div>

                            <div class="mb-3">
                                <label for="kk" class="form-label small">Scan KK</label>
                                <input class="form-control @error('kk') is-invalid @enderror" type="file" id="kk"
                                    name="kk" onchange="previewImage(this, '#kk-preview')">
                                @error('kk')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <img class="img-preview img-fluid col-sm-5 d-block" id="kk-preview"
                                    src="{{ $data_siswa->kk ? asset($data_siswa->kk) : '' }}">
                            </div>

                            <div class="mb-3">
                                <label for="ktp" class="form-label small">Scan KTP orang tua</label>
                                <input class="form-control @error('ktp') is-invalid @enderror" type="file" id="ktp"
                                    name="ktp" onchange="previewImage(this, '#ktp-preview')">
                                @error('ktp')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <img class="img-preview img-fluid col-sm-5 d-block" id="ktp-preview"
                                    src="{{ $data_siswa->ktp ? asset($data_siswa->ktp) : '' }}">
                            </div>

                            <div class="mb-2">
                                <label for="rapor" class="form-label small">Scan rapor semester akhir</label>
                                <input class="form-control @error('rapor') is-invalid @enderror" type="file"
                                    id="rapor" name="rapor" onchange="previewImage(this, '#rapor-preview')">
                                @error('rapor')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <img class="img-preview img-fluid col-sm-5 d-block" id="rapor-preview"
                                    src="{{ $data_siswa->rapor ? asset($data_siswa->rapor) : '' }}">
                            </div>
                        </div>

                        @if ($data_siswa->status === 'Belum Mendaftar')
                            <button type="submit" class="btn btn-primary btn-lg my-2 mx-2">Simpan</button>
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
