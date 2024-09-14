@extends('layouts.siswa')
@section('content')
    <div class="main-content">
        <div class="app-content">
            <div class="app-content-header shadow-sm">
                <h1 class="app-content-headerText fw-bold">Edit Profil</h1>
            </div>

            <div class="content-body">
                <form action="{{ route('profil.update', $data_siswa->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card shadow">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="card-title fw-bold mb-0">Edit Informasi Pribadi</h5>
                            </div>
                            <hr>

                            {{-- View untuk foto --}}
                            <div class="text-center">
                                @if ($data_siswa->foto)
                                    <img id="img-preview" src="{{ asset('uploads/img/' . $data_siswa->foto) }}"
                                        class="img-fluid d-block mb-3 mx-auto" alt="Foto Profil"
                                        style="height: 200px; width: 200px; object-fit: cover;">
                                @else
                                    <img id="img-preview" class="img-fluid d-block mb-3 mx-auto"
                                        src="{{ asset('assets/images/person.jpg') }}" alt="Default Photo"
                                        style="height: 200px; width: 200px; object-fit: cover;">
                                @endif
                            </div>

                            <div class="row g-3">
                                <div class="col-lg-6 col-md-6 col-sm-12">

                                    {{-- Input untuk foto --}}
                                    <div class="mb-3">
                                        <label for="foto" class="form-label">Foto</label>
                                        <input class="form-control d-block mx-auto" type="file" id="foto"
                                            name="foto" onchange="previewImage()">
                                    </div>


                                    <div class="mb-3">
                                        <label for="nama_siswa" class="form-label">Nama Siswa</label>
                                        <input type="text" class="form-control" id="nama_siswa" name="nama_siswa"
                                            value="{{ old('nama_siswa', $data_siswa->nama_siswa) }}">
                                    </div>

                                    <!-- Input untuk Jenis Kelamin -->
                                    <div class="mb-3">
                                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                        <div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" id="jenis_kelamin_l"
                                                    name="jenis_kelamin" value="L"
                                                    {{ isset($data_siswa->jenis_kelamin) && $data_siswa->jenis_kelamin === 'L' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="jenis_kelamin_l">Laki-laki</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" id="jenis_kelamin_p"
                                                    name="jenis_kelamin" value="P"
                                                    {{ isset($data_siswa->jenis_kelamin) && $data_siswa->jenis_kelamin === 'P' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="jenis_kelamin_p">Perempuan</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <!-- Input untuk Tempat Lahir -->
                                    <div class="mb-3">
                                        <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                                        <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir"
                                            value="{{ old('tempat_lahir', $data_siswa->tempat_lahir) }}">
                                    </div>

                                    <!-- Input untuk Tanggal Lahir -->
                                    <div class="mb-3">
                                        <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                        <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir"
                                            value="{{ old('tanggal_lahir', $data_siswa->tanggal_lahir) }}">
                                    </div>

                                    <!-- Input untuk Alamat -->
                                    <div class="mb-3">
                                        <label for="alamat" class="form-label">Alamat</label>
                                        <textarea class="form-control" id="alamat" name="alamat" rows="3">{{ old('alamat', $data_siswa->alamat) }}</textarea>
                                    </div>
                                </div>
                            </div>

                            <!-- Input untuk Email -->
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    value="{{ old('email', $data_siswa->email) }}">
                            </div>



                            <div class="mb-3">
                                <label for="nomor_wa" class="form-label">No WA</label>
                                <input type="text" class="form-control" id="nomor_wa" name="nomor_wa"
                                    value="{{ old('nomor_wa', $data_siswa->nomor_wa) }}">
                            </div>

                            <div class="mb-3">
                                <label for="sosmed" class="form-label">Sosial Media</label>
                                <input type="text" class="form-control" id="sosmed" name="sosmed"
                                    value="{{ old('sosmed', $data_siswa->sosmed) }}">
                            </div>

                            <div class="mb-3">
                                <label for="ukuran_seragam" class="form-label small">Ukuran seragam</label>
                                <select name="ukuran_seragam" class="form-select" aria-label="Ukuran Seragam" required>
                                    <option value="" selected disabled>-- Pilih Ukuran Seragam --</option>
                                    <option value="S" {{ $data_siswa->ukuran_seragam == 'S' ? 'selected' : '' }}>S
                                    </option>
                                    <option value="M" {{ $data_siswa->ukuran_seragam == 'M' ? 'selected' : '' }}>M
                                    </option>
                                    <option value="L" {{ $data_siswa->ukuran_seragam == 'L' ? 'selected' : '' }}>L
                                    </option>
                                </select>
                            </div>

                            <hr class="mt-4">

                            @if ($data_siswa->status === 'Belum Mendaftar')
                                <button type="submit" class="btn btn-primary btn-lg px-5">Simpan</button>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function previewImage() {
            const foto = document.querySelector('#foto');
            const imgPreview = document.querySelector('#img-preview');

            const fileReader = new FileReader();
            fileReader.readAsDataURL(foto.files[0]);

            fileReader.onload = function(e) {
                imgPreview.src = e.target.result;
            };
        }
    </script>
@endsection
