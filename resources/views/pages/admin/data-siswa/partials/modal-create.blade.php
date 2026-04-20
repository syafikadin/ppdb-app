<div class="modal fade siswa-modal" id="modalCreateSiswa" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content">
            <form action="{{ route('data-siswa.store') }}" method="POST">
                @csrf
                <input type="hidden" name="_modal" value="create">

                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="bi bi-person-plus me-2"></i>
                        Tambah Data Siswa
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-12 col-lg-6">
                            <div class="siswa-form-section">
                                <div class="siswa-form-section-title">
                                    <i class="bi bi-person-badge"></i>
                                    Informasi Akun
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Username</label>
                                    <input type="text" name="username" class="form-control"
                                        value="{{ old('username') }}">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control"
                                        value="{{ old('email') }}">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Password</label>
                                    <input type="password" name="password" class="form-control">
                                </div>

                                <div class="mb-0">
                                    <label class="form-label">Konfirmasi Password</label>
                                    <input type="password" name="password_confirmation" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-lg-6">
                            <div class="siswa-form-section">
                                <div class="siswa-form-section-title">
                                    <i class="bi bi-person-vcard"></i>
                                    Data Utama
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Nama Siswa</label>
                                    <input type="text" name="nama_siswa" class="form-control"
                                        value="{{ old('nama_siswa') }}">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">NISN</label>
                                    <input type="text" name="nisn" class="form-control"
                                        value="{{ old('nisn') }}">
                                </div>

                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label">Gelombang</label>
                                        <select name="gelombang_id" class="form-select">
                                            <option value="">-- Pilih Gelombang --</option>
                                            @foreach ($gelombangs as $gelombang)
                                                <option value="{{ $gelombang->id }}"
                                                    {{ old('gelombang_id') == $gelombang->id ? 'selected' : '' }}>
                                                    {{ $gelombang->nama_gelombang }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">Jenis Kelamin</label>
                                        <select name="jenis_kelamin" class="form-select">
                                            <option value="">-- Pilih Jenis Kelamin --</option>
                                            <option value="L" {{ old('jenis_kelamin') == 'L' ? 'selected' : '' }}>
                                                Laki-laki</option>
                                            <option value="P" {{ old('jenis_kelamin') == 'P' ? 'selected' : '' }}>
                                                Perempuan</option>
                                        </select>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">Tempat Lahir</label>
                                        <input type="text" name="tempat_lahir" class="form-control"
                                            value="{{ old('tempat_lahir') }}">
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">Tanggal Lahir</label>
                                        <input type="date" name="tanggal_lahir" class="form-control"
                                            value="{{ old('tanggal_lahir') }}">
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">Nomor WA</label>
                                        <input type="text" name="nomor_wa" class="form-control"
                                            value="{{ old('nomor_wa') }}">
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">Status</label>
                                        <input type="text" name="status" class="form-control"
                                            value="{{ old('status', 'Belum Mendaftar') }}">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="siswa-form-section">
                                <div class="siswa-form-section-title">
                                    <i class="bi bi-building"></i>
                                    Data Sekolah dan Alamat
                                </div>

                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label">Asal Sekolah</label>
                                        <input type="text" name="asal_sekolah" class="form-control"
                                            value="{{ old('asal_sekolah') }}">
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">Alamat</label>
                                        <input type="text" name="alamat" class="form-control"
                                            value="{{ old('alamat') }}">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="siswa-form-section">
                                <div class="siswa-form-section-title">
                                    <i class="bi bi-people"></i>
                                    Data Orang Tua dan Wali
                                </div>

                                <div class="row g-3">
                                    <div class="col-md-4">
                                        <label class="form-label">Nama Ayah</label>
                                        <input type="text" name="nama_ayah" class="form-control"
                                            value="{{ old('nama_ayah') }}">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Pekerjaan Ayah</label>
                                        <input type="text" name="pekerjaan_ayah" class="form-control"
                                            value="{{ old('pekerjaan_ayah') }}">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Penghasilan Ayah</label>
                                        <input type="text" name="penghasilan_ayah" class="form-control"
                                            value="{{ old('penghasilan_ayah') }}">
                                    </div>

                                    <div class="col-md-4">
                                        <label class="form-label">Nama Ibu</label>
                                        <input type="text" name="nama_ibu" class="form-control"
                                            value="{{ old('nama_ibu') }}">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Pekerjaan Ibu</label>
                                        <input type="text" name="pekerjaan_ibu" class="form-control"
                                            value="{{ old('pekerjaan_ibu') }}">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Penghasilan Ibu</label>
                                        <input type="text" name="penghasilan_ibu" class="form-control"
                                            value="{{ old('penghasilan_ibu') }}">
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">Nomor Wali</label>
                                        <input type="text" name="nomor_wali" class="form-control"
                                            value="{{ old('nomor_wali') }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Alamat Wali</label>
                                        <input type="text" name="alamat_wali" class="form-control"
                                            value="{{ old('alamat_wali') }}">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="siswa-form-section">
                                <div class="siswa-form-section-title">
                                    <i class="bi bi-journal-text"></i>
                                    Catatan
                                </div>

                                <textarea name="catatan" class="form-control" rows="4">{{ old('catatan') }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-siswa-primary">
                        <i class="bi bi-save"></i>
                        Simpan
                    </button>
                    <button type="button" class="btn btn-outline-secondary rounded-pill px-4"
                        data-bs-dismiss="modal">
                        Tutup
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
