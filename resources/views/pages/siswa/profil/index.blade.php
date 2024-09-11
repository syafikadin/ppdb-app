@extends('layouts.siswa')
@section('content')
    <div class="main-content">
        <div class="app-content">
            <div class="app-content-header shadow-sm">
                <h1 class="app-content-headerText fw-bold">Profil</h1>
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
                <form>
                    @csrf
                    <div class="card shadow">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="card-title fw-bold mb-0">Informasi Pribadi</h5>
                                <a href="{{ route('profil.edit', $data_siswa->id) }}" class="btn btn-success">Edit Data</a>
                            </div>
                            <hr>

                            <div class="mb-3">
                                <label for="nama_siswa" class="form-label">Nama Siswa</label>
                                <input type="text" class="form-control" placeholder="Masukkan Nama Siswa" id="nama_siswa"
                                    name="nama_siswa" disabled value="{{ $data_siswa->nama_siswa }}">
                            </div>

                            <div class="mb-3">
                                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                <div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" id="jenis_kelamin_laki"
                                            name="jenis_kelamin" value="0" disabled
                                            {{ isset($data_siswa->jenis_kelamin) && $data_siswa->jenis_kelamin == 0 ? 'checked' : '' }}>
                                        <label class="form-check-label" for="jenis_kelamin_laki">Laki-laki</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" id="jenis_kelamin_perempuan"
                                            name="jenis_kelamin" value="1" disabled
                                            {{ isset($data_siswa->jenis_kelamin) && $data_siswa->jenis_kelamin == 1 ? 'checked' : '' }}>
                                        <label class="form-check-label" for="jenis_kelamin_perempuan">Perempuan</label>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                                <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror"
                                    id="tempat_lahir" name="tempat_lahir" value="{{ $data_siswa->tempat_lahir }}" disabled>
                                @error('tempat_lahir')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir"
                                    value="{{ $data_siswa->tanggal_lahir }}" disabled>
                                @error('tanggal_lahir')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <input type="text" class="form-control" id="alamat" name="alamat"
                                    value="{{ $data_siswa->alamat }}" disabled>
                                @error('alamat')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" class="form-control" id="email" name="email"
                                    value="{{ $data_siswa->email }}" disabled>
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="foto" class="form-label">Foto</label>
                                @if ($data_siswa->foto)
                                    <img src="{{ asset('uploads/img/' . $data_siswa->foto) }}"
                                        class="img-fluid col-sm-5 d-block" alt="Foto Profil">
                                @else
                                    <img class="img-fluid col-sm-5 d-block" src="{{ asset('default-avatar.png') }}"
                                        alt="Gambar default untuk profil">
                                @endif
                            </div>


                            <div class="mb-3">
                                <label for="nomor_wa" class="form-label">No WA</label>
                                <input type="text" class="form-control" id="nomor_wa" name="nomor_wa"
                                    value="{{ $data_siswa->nomor_wa }}" disabled>
                                @error('nomor_wa')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="sosmed" class="form-label">Sosial Media</label>
                                <input type="text" class="form-control" id="sosmed" name="sosmed"
                                    value="{{ $data_siswa->sosmed }}" disabled>
                                @error('sosmed')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
