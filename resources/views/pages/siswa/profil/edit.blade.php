@extends('layouts.siswa')

@section('content')
    <div class="main-content">
        <div class="app-content">
            <div class="app-content-header shadow-sm">
                <h1 class="app-content-headerText fw-bold">
                    <button class="btn-sidebar" id="btn-sidebar">
                        <i class="bi bi-layout-sidebar-inset"></i>
                    </button>
                    Edit Profil
                </h1>
            </div>

            <div class="content-body">
                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show rounded-3" role="alert">
                        <strong>Terjadi kesalahan.</strong>
                        <ul class="mb-0 mt-2 ps-3">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <form action="{{ route('profil.update', $data_siswa->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                        <div class="row g-0">
                            <div class="col-lg-4 bg-light border-end p-4 p-lg-5">
                                <div class="text-center">
                                    @if ($data_siswa->foto)
                                        <img id="img-preview" src="{{ asset($data_siswa->foto) }}"
                                            class="img-fluid rounded-4 shadow-sm mb-3" alt="Foto Profil"
                                            style="width: 220px; height: 220px; object-fit: cover;">
                                    @else
                                        <img id="img-preview" src="{{ asset('assets/images/person.jpg') }}"
                                            class="img-fluid rounded-4 shadow-sm mb-3" alt="Foto Default"
                                            style="width: 220px; height: 220px; object-fit: cover;">
                                    @endif

                                    <h5 class="fw-bold mb-1">{{ $data_siswa->nama_siswa }}</h5>
                                    <p class="text-muted small mb-4">
                                        {{ $data_siswa->asal_sekolah ?: 'Asal sekolah belum diisi' }}
                                    </p>
                                </div>

                                <div class="mb-3">
                                    <label for="foto" class="form-label text-muted small fw-semibold">Foto
                                        Profil</label>
                                    <input class="form-control rounded-3 @error('foto') is-invalid @enderror" type="file"
                                        id="foto" name="foto" accept="image/*" onchange="previewImage()">
                                    @error('foto')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <div class="form-text small">
                                        Format jpg, jpeg, png. Maksimal 2 MB.
                                    </div>
                                </div>

                                <div class="card border-0 shadow-sm rounded-4 p-3 mt-4">
                                    <div class="small text-muted mb-1">Status Pendaftaran</div>
                                    <div class="fw-semibold">{{ $data_siswa->status }}</div>
                                </div>
                            </div>

                            <div class="col-lg-8 p-4 p-lg-5">
                                <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-3">
                                    <div>
                                        <h4 class="fw-bold mb-1">Edit Informasi Pribadi</h4>
                                        <p class="text-muted small mb-0">
                                            Silakan perbarui data profil Anda dengan benar.
                                        </p>
                                    </div>
                                </div>

                                <hr class="mb-4">

                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label for="nama_siswa" class="form-label text-muted small fw-semibold">Nama
                                            Siswa</label>
                                        <input type="text"
                                            class="form-control rounded-3 @error('nama_siswa') is-invalid @enderror"
                                            id="nama_siswa" name="nama_siswa"
                                            value="{{ old('nama_siswa', $data_siswa->nama_siswa) }}">
                                        @error('nama_siswa')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label for="nisn" class="form-label text-muted small fw-semibold">NISN</label>
                                        <input type="text"
                                            class="form-control rounded-3 @error('nisn') is-invalid @enderror"
                                            id="nisn" name="nisn" value="{{ old('nisn', $data_siswa->nisn) }}">
                                        @error('nisn')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label text-muted small fw-semibold d-block">Jenis Kelamin</label>
                                        <div class="border rounded-3 px-3 py-2">
                                            <div class="form-check form-check-inline mb-0">
                                                <input class="form-check-input" type="radio" id="jenis_kelamin_l"
                                                    name="jenis_kelamin" value="L"
                                                    {{ old('jenis_kelamin', $data_siswa->jenis_kelamin) === 'L' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="jenis_kelamin_l">Laki-laki</label>
                                            </div>
                                            <div class="form-check form-check-inline mb-0">
                                                <input class="form-check-input" type="radio" id="jenis_kelamin_p"
                                                    name="jenis_kelamin" value="P"
                                                    {{ old('jenis_kelamin', $data_siswa->jenis_kelamin) === 'P' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="jenis_kelamin_p">Perempuan</label>
                                            </div>
                                        </div>
                                        @error('jenis_kelamin')
                                            <div class="text-danger small mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label for="ukuran_seragam" class="form-label text-muted small fw-semibold">Ukuran
                                            Seragam</label>
                                        <select name="ukuran_seragam" id="ukuran_seragam"
                                            class="form-select rounded-3 @error('ukuran_seragam') is-invalid @enderror"
                                            required>
                                            <option value="" disabled
                                                {{ old('ukuran_seragam', $data_siswa->ukuran_seragam) ? '' : 'selected' }}>
                                                -- Pilih Ukuran Seragam --
                                            </option>
                                            <option value="S"
                                                {{ old('ukuran_seragam', $data_siswa->ukuran_seragam) == 'S' ? 'selected' : '' }}>
                                                S</option>
                                            <option value="M"
                                                {{ old('ukuran_seragam', $data_siswa->ukuran_seragam) == 'M' ? 'selected' : '' }}>
                                                M</option>
                                            <option value="L"
                                                {{ old('ukuran_seragam', $data_siswa->ukuran_seragam) == 'L' ? 'selected' : '' }}>
                                                L</option>
                                            <option value="XL"
                                                {{ old('ukuran_seragam', $data_siswa->ukuran_seragam) == 'XL' ? 'selected' : '' }}>
                                                XL</option>
                                            <option value="XXL"
                                                {{ old('ukuran_seragam', $data_siswa->ukuran_seragam) == 'XXL' ? 'selected' : '' }}>
                                                XXL</option>
                                        </select>
                                        @error('ukuran_seragam')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-12">
                                        <label for="asal_sekolah" class="form-label text-muted small fw-semibold">Asal
                                            Sekolah</label>
                                        <input type="text"
                                            class="form-control rounded-3 @error('asal_sekolah') is-invalid @enderror"
                                            id="asal_sekolah" name="asal_sekolah"
                                            value="{{ old('asal_sekolah', $data_siswa->asal_sekolah) }}">
                                        @error('asal_sekolah')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label for="tempat_lahir" class="form-label text-muted small fw-semibold">Tempat
                                            Lahir</label>
                                        <input type="text"
                                            class="form-control rounded-3 @error('tempat_lahir') is-invalid @enderror"
                                            id="tempat_lahir" name="tempat_lahir"
                                            value="{{ old('tempat_lahir', $data_siswa->tempat_lahir) }}">
                                        @error('tempat_lahir')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label for="tanggal_lahir" class="form-label text-muted small fw-semibold">Tanggal
                                            Lahir</label>
                                        <input type="date"
                                            class="form-control rounded-3 @error('tanggal_lahir') is-invalid @enderror"
                                            id="tanggal_lahir" name="tanggal_lahir"
                                            value="{{ old('tanggal_lahir', $data_siswa->tanggal_lahir) }}">
                                        @error('tanggal_lahir')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label for="email"
                                            class="form-label text-muted small fw-semibold">Email</label>
                                        <input type="email"
                                            class="form-control rounded-3 @error('email') is-invalid @enderror"
                                            id="email" name="email"
                                            value="{{ old('email', $data_siswa->email) }}">
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label for="nomor_wa" class="form-label text-muted small fw-semibold">No
                                            WA</label>
                                        <input type="text"
                                            class="form-control rounded-3 @error('nomor_wa') is-invalid @enderror"
                                            id="nomor_wa" name="nomor_wa"
                                            value="{{ old('nomor_wa', $data_siswa->nomor_wa) }}">
                                        @error('nomor_wa')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-12">
                                        <label for="alamat"
                                            class="form-label text-muted small fw-semibold">Alamat</label>
                                        <textarea class="form-control rounded-3 @error('alamat') is-invalid @enderror" id="alamat" name="alamat"
                                            rows="4">{{ old('alamat', $data_siswa->alamat) }}</textarea>
                                        @error('alamat')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <hr class="my-4">

                                @if ($data_siswa->status === 'Belum Mendaftar')
                                    <div class="d-flex justify-content-end gap-2">
                                        <a href="{{ route('profil.index') }}" class="btn btn-light rounded-pill px-4">
                                            Kembali
                                        </a>
                                        <button type="submit" class="btn btn-primary rounded-pill px-4">
                                            Simpan Perubahan
                                        </button>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function previewImage() {
            const foto = document.getElementById('foto');
            const imgPreview = document.getElementById('img-preview');

            if (foto.files && foto.files[0]) {
                const fileReader = new FileReader();

                fileReader.onload = function(e) {
                    imgPreview.src = e.target.result;
                };

                fileReader.readAsDataURL(foto.files[0]);
            }
        }
    </script>
@endsection
