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
                                            name="jenis_kelamin" value="0"
                                            {{ $data_siswa->jenis_kelamin == 0 ? 'checked' : '' }}>
                                        <label class="form-check-label" for="jenis_kelamin_l">Laki-laki</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" id="jenis_kelamin_p"
                                            name="jenis_kelamin" value="1"
                                            {{ $data_siswa->jenis_kelamin == 1 ? 'checked' : '' }}>
                                        <label class="form-check-label" for="jenis_kelamin_p">Perempuan</label>
                                    </div>
                                </div>
                            </div>

                            <!-- Input untuk Foto -->
                            <div class="mb-3">
                                <label for="foto" class="form-label">Foto</label>
                                <input class="form-control" type="file" id="foto" name="foto"
                                    onchange="previewImage()">
                                @if ($data_siswa->foto)
                                    <img id="img-preview" src="{{ asset('uploads/img/' . $data_siswa->foto) }}"
                                        class="img-fluid col-sm-5 d-block mt-3" alt="Foto Profil">
                                @else
                                    <img id="img-preview" class="img-fluid col-sm-5 d-block mt-3"
                                        src="{{ asset('default-avatar.png') }}" alt="Default Avatar">
                                @endif
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

                            <button type="submit" class="btn btn-primary">Simpan</button>
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
