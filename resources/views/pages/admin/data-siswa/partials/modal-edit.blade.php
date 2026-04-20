<div class="modal fade siswa-modal" id="modalEditSiswa" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content">
            <form id="formEditSiswa" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" name="_modal" value="edit">

                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="bi bi-pencil-square me-2"></i>
                        Edit Data Siswa
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <div class="row g-3">

                        {{-- Informasi Akun --}}
                        <div class="col-12 col-lg-6">
                            <div class="siswa-form-section">
                                <div class="siswa-form-section-title">
                                    <i class="bi bi-person-badge"></i>
                                    Informasi Akun
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Username</label>
                                    <input type="text" name="username" id="edit_username" class="form-control">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="email" name="email" id="edit_email" class="form-control">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Password Baru</label>
                                    <input type="password" name="password" class="form-control"
                                        autocomplete="new-password">
                                    <small class="text-muted">Kosongkan jika tidak ingin mengganti password</small>
                                </div>

                                <div class="mb-0">
                                    <label class="form-label">Konfirmasi Password Baru</label>
                                    <input type="password" name="password_confirmation" class="form-control"
                                        autocomplete="new-password">
                                </div>
                            </div>
                        </div>

                        {{-- Data Utama --}}
                        <div class="col-12 col-lg-6">
                            <div class="siswa-form-section">
                                <div class="siswa-form-section-title">
                                    <i class="bi bi-person-vcard"></i>
                                    Data Utama
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Nama Siswa</label>
                                    <input type="text" name="nama_siswa" id="edit_nama_siswa" class="form-control">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">NISN</label>
                                    <input type="text" name="nisn" id="edit_nisn" class="form-control">
                                </div>

                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label">Gelombang</label>
                                        <select name="gelombang_id" id="edit_gelombang_id" class="form-select">
                                            <option value="">-- Pilih Gelombang --</option>
                                            @foreach ($gelombangs as $gelombang)
                                                <option value="{{ $gelombang->id }}">{{ $gelombang->nama_gelombang }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">Jenis Kelamin</label>
                                        <select name="jenis_kelamin" id="edit_jenis_kelamin" class="form-select">
                                            <option value="">-- Pilih Jenis Kelamin --</option>
                                            <option value="L">Laki-laki</option>
                                            <option value="P">Perempuan</option>
                                        </select>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">Tempat Lahir</label>
                                        <input type="text" name="tempat_lahir" id="edit_tempat_lahir"
                                            class="form-control">
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">Tanggal Lahir</label>
                                        <input type="date" name="tanggal_lahir" id="edit_tanggal_lahir"
                                            class="form-control">
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">Nomor WA</label>
                                        <input type="text" name="nomor_wa" id="edit_nomor_wa" class="form-control">
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">Status</label>
                                        <input type="text" name="status" id="edit_status" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Sekolah dan Alamat --}}
                        <div class="col-12">
                            <div class="siswa-form-section">
                                <div class="siswa-form-section-title">
                                    <i class="bi bi-building"></i>
                                    Data Sekolah dan Alamat
                                </div>

                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label">Asal Sekolah</label>
                                        <input type="text" name="asal_sekolah" id="edit_asal_sekolah"
                                            class="form-control">
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">Alamat</label>
                                        <input type="text" name="alamat" id="edit_alamat" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Orang Tua dan Wali --}}
                        <div class="col-12">
                            <div class="siswa-form-section">
                                <div class="siswa-form-section-title">
                                    <i class="bi bi-people"></i>
                                    Data Orang Tua dan Wali
                                </div>

                                <div class="row g-3">
                                    <div class="col-md-4">
                                        <label class="form-label">Nama Ayah</label>
                                        <input type="text" name="nama_ayah" id="edit_nama_ayah"
                                            class="form-control">
                                    </div>

                                    <div class="col-md-4">
                                        <label class="form-label">Pekerjaan Ayah</label>
                                        <input type="text" name="pekerjaan_ayah" id="edit_pekerjaan_ayah"
                                            class="form-control">
                                    </div>

                                    <div class="col-md-4">
                                        <label class="form-label">Penghasilan Ayah</label>
                                        <input type="text" name="penghasilan_ayah" id="edit_penghasilan_ayah"
                                            class="form-control">
                                    </div>

                                    <div class="col-md-4">
                                        <label class="form-label">Nama Ibu</label>
                                        <input type="text" name="nama_ibu" id="edit_nama_ibu"
                                            class="form-control">
                                    </div>

                                    <div class="col-md-4">
                                        <label class="form-label">Pekerjaan Ibu</label>
                                        <input type="text" name="pekerjaan_ibu" id="edit_pekerjaan_ibu"
                                            class="form-control">
                                    </div>

                                    <div class="col-md-4">
                                        <label class="form-label">Penghasilan Ibu</label>
                                        <input type="text" name="penghasilan_ibu" id="edit_penghasilan_ibu"
                                            class="form-control">
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">Nomor Wali</label>
                                        <input type="text" name="nomor_wali" id="edit_nomor_wali"
                                            class="form-control">
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">Alamat Wali</label>
                                        <input type="text" name="alamat_wali" id="edit_alamat_wali"
                                            class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Catatan --}}
                        <div class="col-12">
                            <div class="siswa-form-section">
                                <div class="siswa-form-section-title">
                                    <i class="bi bi-journal-text"></i>
                                    Catatan
                                </div>

                                <textarea name="catatan" id="edit_catatan" class="form-control" rows="4"></textarea>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-siswa-primary">
                        <i class="bi bi-save"></i>
                        Update
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
