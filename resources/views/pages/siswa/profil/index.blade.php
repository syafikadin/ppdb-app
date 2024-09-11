@extends('layouts.siswa')
@section('content')
    <div class="main-content">
        <div class="app-content">
            <div class="app-content-header shadow-sm">
                <h1 class="app-content-headerText fw-bold">Profil</h1>
            </div>

            <div class="content-body">
                <div class="card shadow-sm" style="border-radius: 0; border: none">
                    <div class="row g-3">
                        <div class="col-lg-4 p-4" style="background-color: #DCEBF0">
                            @if ($data_siswa->foto)
                                <img src="{{ asset('uploads/img/' . $data_siswa->foto) }}" class="img-fluid"
                                    alt="Foto Profil">
                            @else
                                <img class="img-fluid" src="{{ asset('/assets/images/person.jpg') }}"
                                    alt="Gambar default untuk profil">
                            @endif

                            <div class="my-3">
                                <label class="form-label small fw-bold">Email</label>
                                <div class="card-text">
                                    {{ $data_siswa->email }}
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label small fw-bold">Whatsapp</label>
                                <div class="card-text">
                                    {{ $data_siswa->nomor_wa }}
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label small fw-bold">Sosial Media</label>
                                <div class="card-text">
                                    {{ $data_siswa->sosmed }}
                                </div>
                            </div>


                        </div>
                        <div class="col-lg-8 p-4">
                            <div class="d-flex justify-content-between align-items-center">
                                <h4 class="card-title fw-bold mb-0">Informasi Pribadi</h4>
                                <a href="{{ route('profil.edit', $data_siswa->id) }}" class="btn btn-success">Edit Data</a>
                            </div>
                            <hr>

                            <div class="mb-3">
                                <label for="nama_siswa" class="form-label small">Nama</label>
                                <input type="text" class="form-control" id="nama_siswa" name="nama_siswa" disabled
                                    value="{{ $data_siswa->nama_siswa }}">
                            </div>

                            <div class="mb-3">
                                <label class="form-label small">Jenis Kelamin</label>
                                <input type="text" class="form-control" disabled
                                    value="{{ $data_siswa->jenis_kelamin === 0 ? 'Laki-laki' : 'Perempuan' }}">
                            </div>

                            <div class="mb-3">
                                <label class="form-label small">Tempat Lahir</label>
                                <input type="text" class="form-control" disabled value="{{ $data_siswa->tempat_lahir }}">
                            </div>

                            <div class="mb-3">
                                <label class="form-label small">Tanggal Lahir</label>
                                <input type="text" class="form-control" disabled
                                    value="{{ $data_siswa->tanggal_lahir }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label small">Alamat</label>
                                <textarea class="form-control" disabled rows="3">{{ $data_siswa->alamat }}</textarea>
                            </div>




                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
