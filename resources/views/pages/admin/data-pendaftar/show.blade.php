@extends('layouts.admin')
@section('content')
    <div class="main-content">
        <div class="app-content">
            <div class="app-content-header shadow-sm">
                <h1 class="app-content-headerText fw-bold">
                    <button class="btn-sidebar" id="btn-sidebar">
                        <i class="bi bi-layout-sidebar-inset"></i>
                    </button>
                    Data Pendaftar
                </h1>
            </div>

            <div class="content-body">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title fw-bold mb-0">Informasi Pribadi</h5>
                        <hr>

                        <img id="img-preview" class="img-fluid d-block mb-3 mx-auto"
                            src="{{ asset($data_pendaftar->siswa->foto) }}" alt="Pass Foto"
                            style="height: 200px; width: 200px; object-fit: cover;">

                        <div class="row ">
                            <div class="col-lg-6 col-md-6">
                                <div class="mb-3">
                                    <label class="form-label small">Nama</label>
                                    <input type="text" class="form-control" disabled
                                        value="{{ $data_pendaftar->siswa->nama_siswa }}">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label small">Jenis Kelamin</label>
                                    <input type="text" class="form-control" disabled
                                        value="{{ $data_pendaftar->siswa->jenis_kelamin === 'L' ? 'Laki-laki' : 'Perempuan' }}">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label small">Tempat Lahir</label>
                                    <input type="text" class="form-control" disabled
                                        value="{{ $data_pendaftar->siswa->tempat_lahir }}">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label small">Tanggal Lahir</label>
                                    <input type="text" class="form-control" disabled
                                        value="{{ $data_pendaftar->siswa->tanggal_lahir }}">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label small">Asal Sekolah</label>
                                    <input type="text" class="form-control" disabled
                                        value="{{ $data_pendaftar->siswa->asal_sekolah }}">
                                </div>

                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="mb-3">
                                    <label class="form-label small">Whatsapp</label>
                                    <input type="text" class="form-control" disabled
                                        value="{{ $data_pendaftar->siswa->nomor_wa }}">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label small">Email</label>
                                    <input type="text" class="form-control" disabled
                                        value="{{ $data_pendaftar->siswa->email }}">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label small">Sosial Media</label>
                                    <input type="text" class="form-control" disabled
                                        value="{{ $data_pendaftar->siswa->sosmed }}">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label small">Alamat</label>
                                    <textarea class="form-control" disabled rows="4">{{ $data_pendaftar->siswa->alamat }}</textarea>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>

                <div class="card shadow-sm mt-4">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">Informasi Orang Tua</h5>
                        <hr>

                        <div class="row g-3">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <h6 class="fw-bold ">DATA AYAH</h6>
                                <div class="mb-3">
                                    <label class="form-label small ">Nama ayah</label>
                                    <input type="text" class="form-control" disabled
                                        value="{{ $data_pendaftar->siswa->nama_ayah }}">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label small ">Pekerjaan ayah</label>
                                    <input type="text" class="form-control" disabled
                                        value="{{ $data_pendaftar->siswa->pekerjaan_ayah }}">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label small ">Rata-rata penghasilan ayah</label>
                                    <input type="text" class="form-control" disabled
                                        value="{{ $data_pendaftar->siswa->penghasilan_ayah }}">
                                </div>

                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <h6 class="fw-bold ">DATA IBU</h6>
                                <div class="mb-3">
                                    <label class="form-label small ">Nama ibu</label>
                                    <input type="text" class="form-control" disabled
                                        value="{{ $data_pendaftar->siswa->nama_ibu }}">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label small ">Pekerjaan ibu</label>
                                    <input type="text" class="form-control" disabled
                                        value="{{ $data_pendaftar->siswa->pekerjaan_ibu }}">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label small ">Rata-rata penghasilan ibu</label>
                                    <input type="text" class="form-control" disabled
                                        value="{{ $data_pendaftar->siswa->penghasilan_ibu }}">
                                </div>
                            </div>
                        </div>


                        <h6 class="fw-bold mt-3">DATA WALI</h6>
                        <div class="mb-3">
                            <label class="form-label small ">Nomor Whatsapp Wali</label>
                            <input type="text" class="form-control" disabled
                                value="{{ $data_pendaftar->siswa->nomor_wali }}">
                        </div>

                        <label class="form-label small">Alamat</label>
                        <textarea class="form-control" disabled rows="3">{{ $data_pendaftar->siswa->alamat_wali }}</textarea>


                    </div>
                </div>

                <div class="card shadow-sm mt-4">
                    <div class="card-body">
                        <h5 class="card-title fw-bold mb-0">Informasi Berkas</h5>
                        <hr>

                        <div class="mb-3">
                            <label class="form-label">Piagam</label>
                            <img id="img-preview" class="img-fluid d-block mb-3 mx-auto"
                                src="{{ asset($data_pendaftar->siswa->piagam) }}" alt="Piagam"
                                style="max-width: 100%;    object-fit: cover;">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Akta</label>
                            <img id="img-preview" class="img-fluid d-block mb-3 mx-auto"
                                src="{{ asset($data_pendaftar->siswa->akta) }}" alt="Akta"
                                style="max-width: 100%;    object-fit: cover;">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">KK</label>
                            <img id="img-preview" class="img-fluid d-block mb-3 mx-auto"
                                src="{{ asset($data_pendaftar->siswa->kk) }}" alt="KK"
                                style="max-width: 100%;    object-fit: cover;">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">KTP Orang Tua</label>
                            <img id="img-preview" class="img-fluid d-block mb-3 mx-auto"
                                src="{{ asset($data_pendaftar->siswa->ktp) }}" alt="KTP Orang Tua"
                                style="max-width: 100%;    object-fit: cover;">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Rapor Semester Akhir</label>
                            <img id="img-preview" class="img-fluid d-block mb-3 mx-auto"
                                src="{{ asset($data_pendaftar->siswa->rapor) }}" alt="Rapor Semester Akhir"
                                style="max-width: 100%;    object-fit: cover;">
                        </div>
                    </div>
                </div>

                @if ($data_pendaftar->siswa->status !== 'Sudah diverifikasi, menunggu ujian')
                    <div class="card shadow-sm mt-4">
                        <div class="card-body">
                            <h6 class="fw-bold">Catatan sebelumnya: </h6>
                            <p class="text-danger">
                                {{ $data_pendaftar->siswa->catatan ? $data_pendaftar->siswa->catatan : 'Tidak ada catatan!' }}
                            </p>
                        </div>
                    </div>
                    <div class="card sahdow-sm mt-4">
                        <div class="card-body">
                            <div>
                                <button class="btn btn-outline-danger btn-lg me-2" data-bs-toggle="modal"
                                    data-bs-target="#modalInvalid">
                                    Tidak Valid
                                </button>
                                <button class="btn btn-primary btn-lg" data-bs-toggle="modal"
                                    data-bs-target="#modalVerifikasi">
                                    Verifikasi
                                </button>
                            </div>
                        </div>

                        {{-- Modal Verifikasi --}}
                        <div class="modal fade" id="modalVerifikasi" tabindex="-1"
                            aria-labelledby="modalVerifikasiLabel" aria-hidden="true">
                            <form action="{{ route('data-pendaftar.verifikasi') }}" method="POST">
                                @csrf
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalVerifikasiLabel">Konfirmasi Verifikasi</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Apakah Anda yakin ingin memverifikasi pendaftar ini?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Batal</button>
                                            <input type="hidden" name="siswa_id"
                                                value="{{ $data_pendaftar->siswa->id }}">
                                            <button type="submit" class="btn btn-primary">Ya, Verifikasi</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        {{-- End Modal Verifikasi --}}

                        {{-- Modal Tidak Valid --}}
                        <div class="modal fade" id="modalInvalid" tabindex="-1" aria-labelledby="modalInvalidLabel"
                            aria-hidden="true">
                            <form action="{{ route('data-pendaftar.invalid') }}" method="POST">
                                @csrf
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalInvalidLabel">Catatan</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label for="catatan" class="form-label">Masukan Catatan</label>
                                                <textarea class="form-control" id="catatan" name="catatan" rows="3"></textarea>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Batal</button>
                                            <input type="hidden" name="siswa_id"
                                                value="{{ $data_pendaftar->siswa->id }}">
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        {{-- End Modal Tidak Valid --}}

                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
