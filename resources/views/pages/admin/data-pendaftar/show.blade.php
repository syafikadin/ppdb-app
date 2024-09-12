@extends('layouts.admin')
@section('content')
    <div class="main-content">
        <div class="app-content">
            <div class="app-content-header shadow-sm">
                <h1 class="app-content-headerText fw-bold">Data Pendaftar</h1>
            </div>

            <div class="content-body">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title fw-bold mb-0">Informasi Pribadi</h5>
                        <hr>

                        <img id="img-preview" class="img-fluid d-block mb-3 mx-auto"
                            src="{{ asset('assets/images/person.jpg') }}" alt="Default Photo"
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
                                    <label class="form-label small">Whatsapp</label>
                                    <input type="text" class="form-control" disabled
                                        value="{{ $data_pendaftar->siswa->nomor_wa }}">
                                </div>

                            </div>
                            <div class="col-lg-6 col-md-6">
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
                                    <textarea class="form-control" disabled rows="8">{{ $data_pendaftar->siswa->alamat }}</textarea>
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
            </div>
        </div>
    </div>
@endsection
