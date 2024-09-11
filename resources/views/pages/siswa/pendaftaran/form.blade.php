@extends('layouts.siswa')
@section('content')
    <div class="main-content">
        <div class="app-content">
            <div class="app-content-header shadow-sm">
                <h1 class="app-content-headerText fw-bold">Pendaftaran</h1>
            </div>

            <div class="content-body">
                <form action="{{ route('pendaftaran.update', auth()->user()->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card shadow">
                        <div class="card-body">
                            <h5 class="card-title fw-bold">Informasi Orang Tua</h5>
                            <hr>
                            <div class="mb-3">
                                <label for="nama_ayah" class="form-label">NAMA AYAH</label>
                                <input type="text" class="form-control @error('nama_ayah') is-invalid @enderror"
                                    id="nama_ayah" name="nama_ayah" required value="{{ old('nama_ayah') }}">
                                @error('nama_ayah')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="pekerjaan_ayah" class="form-label">PEKERJAAN AYAH</label>
                                <select name="pekerjaan_ayah" class="form-select" aria-label="Pilih Pekerjaan" required>
                                    <option value="" selected disabled>-- Pilih Pekerjaan --</option>
                                    <option value="Buruh(Tani/Pabrik/Bangunan)">Buruh(Tani/Pabrik/Bangunan)</option>
                                    <option value="Dokter/Bidan/Perawat">Dokter/Bidan/Perawat</option>
                                    <option value="Guru/Dosen">Guru/Dosen</option>
                                    <option value="Nelayan">Nelayan</option>
                                    <option value="Pedagang">Pedagang</option>
                                    <option value="Pegawai Swasta">Pegawai Swasta</option>
                                    <option value="Pengacara/Hakim">Pengacara/Hakim</option>
                                    <option value="Pensiunan">Pensiunan</option>
                                    <option value="Pilot/Pramugara">Pilot/Pramugara</option>
                                    <option value="PNS">PNS</option>
                                    <option value="Politikus">Politikus</option>
                                    <option value="Seniman/Pelukis/Artis/Sejenis">Seniman/Pelukis/Artis/Sejenis</option>
                                    <option value="Sopir/Masinis/Kondektur">Sopir/Masinis/Kondektur</option>
                                    <option value="Wiraswasta">Wiraswasta</option>
                                    <option value="Tidak Bekerja">Tidak Bekerja</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="penghasilan_ayah" class="form-label">RATA-RATA PENGHASILAN</label>
                                <select name="penghasilan_ayah" class="form-select" aria-label="Rata Rata Penghasilan"
                                    required>
                                    <option value="" selected disabled>-- Pilih Rata Penghasilan --</option>
                                    <option value="0">Tidak Berpenghasilan</option>
                                    <option value="1">
                                        <= Rp. 500.000</option>
                                    <option value="2">Rp.1.000.000 - Rp.2.000.000</option>
                                    <option value="3">Rp.2.000.000 - Rp.3.000.000</option>
                                    <option value="3">Rp.4.000.000 - Rp.5.000.000</option>
                                    <option value="3">>= Rp. 500.000</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="nama_ibu" class="form-label">NAMA IBU</label>
                                <input type="text" class="form-control @error('nama_ibu') is-invalid @enderror"
                                    id="nama_ibu" name="nama_ibu" required value="{{ old('nama_ibu') }}">
                                @error('nama_ibu')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="pekerjaan_ibu" class="form-label">PEKERJAAN IBU</label>
                                <select name="pekerjaan_ibu" class="form-select" aria-label="Pilih Pekerjaan" required>
                                    <option value="" selected disabled>-- Pilih Pekerjaan --</option>
                                    <option value="Buruh(Tani/Pabrik/Bangunan)">Buruh(Tani/Pabrik/Bangunan)</option>
                                    <option value="Dokter/Bidan/Perawat">Dokter/Bidan/Perawat</option>
                                    <option value="Guru/Dosen">Guru/Dosen</option>
                                    <option value="Nelayan">Nelayan</option>
                                    <option value="Pedagang">Pedagang</option>
                                    <option value="Pegawai Swasta">Pegawai Swasta</option>
                                    <option value="Pengacara/Hakim">Pengacara/Hakim</option>
                                    <option value="Pensiunan">Pensiunan</option>
                                    <option value="Pilot/Pramugara">Pilot/Pramugara</option>
                                    <option value="PNS">PNS</option>
                                    <option value="Politikus">Politikus</option>
                                    <option value="Seniman/Pelukis/Artis/Sejenis">Seniman/Pelukis/Artis/Sejenis</option>
                                    <option value="Sopir/Masinis/Kondektur">Sopir/Masinis/Kondektur</option>
                                    <option value="Wiraswasta">Wiraswasta</option>
                                    <option value="Tidak Bekerja">Tidak Bekerja</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="penghasilan_ibu" class="form-label">RATA-RATA PENGHASILAN</label>
                                <select name="penghasilan_ibu" class="form-select" aria-label="Rata Rata Penghasilan"
                                    required>
                                    <option value="" selected disabled>-- Pilih Rata Penghasilan --</option>
                                    <option value="0">Tidak Berpenghasilan</option>
                                    <option value="1">
                                        <= Rp. 500.000</option>
                                    <option value="2">Rp.1.000.000 - Rp.2.000.000</option>
                                    <option value="3">Rp.2.000.000 - Rp.3.000.000</option>
                                    <option value="3">Rp.4.000.000 - Rp.5.000.000</option>
                                    <option value="3">>= Rp. 500.000</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="nomor_wali" class="form-label">NOMOR HP WALI (WA)</label>
                                <input type="text" class="form-control @error('nomor_wali') is-invalid @enderror"
                                    id="nomor_wali" name="nomor_wali" required value="{{ old('nomor_wali') }}">
                                @error('nomor_wali')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="alamat_wali" class="form-label">ALAMAT SESUAI KK/KTP ORTU WALI</label>
                                <input type="text" class="form-control @error('alamat_wali') is-invalid @enderror"
                                    id="alamat_wali" name="alamat_wali" required value="{{ old('alamat_wali') }}">
                                @error('alamat_wali')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                    </div>

                    <div class="card shadow mt-3">
                        <div class="card-body">
                            <h5 class="card-title fw-bold">Berkas-Berkas</h5>
                            <hr>
                            <div class="mb-3">
                                <label for="piagam" class="form-label">PIAGAM YANG DIMILIKI</label>
                                <img class="img-preview img-fluid col-sm-5 d-block">
                                <input class="form-control @error('piagam') is-invalid @enderror" type="file"
                                    id="piagam" name="piagam" onchange="previewImage(this, '.img-preview')">
                                @error('piagam')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <label class="text-italic text-danger"><i>Harus piagam asli, bukan milik orang
                                        lain</i></label>
                            </div>

                            <div class="mb-3">
                                <label for="ukuran_seragam" class="form-label">UKURAN SERAGAM</label>
                                <select name="ukuran_seragam" class="form-select" aria-label="Ukuran Seragam" required>
                                    <option value="" selected disabled>-- Pilih Ukuran Seragam --</option>
                                    <option value="0">S</option>
                                    <option value="1">M</option>
                                    <option value="2">L</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="foto_pas" class="form-label">FOTO 3 x 4 (BACKGROUND WARNA MERAH)</label>
                                <img class="img-preview img-fluid col-sm-5 d-block">
                                <input class="form-control @error('foto_pas') is-invalid @enderror" type="file"
                                    id="foto_pas" name="foto_pas" onchange="previewImage(this, '.img-preview')">
                                @error('foto_pas')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="akta" class="form-label">SCAN AKTA KELAHIRAN</label>
                                <img class="img-preview img-fluid col-sm-5 d-block">
                                <input class="form-control @error('akta') is-invalid @enderror" type="file"
                                    id="akta" name="akta" onchange="previewImage(this, '.img-preview')">
                                @error('akta')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="kk" class="form-label">SCAN KK</label>
                                <img class="img-preview img-fluid col-sm-5 d-block">
                                <input class="form-control @error('kk') is-invalid @enderror" type="file"
                                    id="kk" name="kk" onchange="previewImage(this, '.img-preview')">
                                @error('kk')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="ktp" class="form-label">SCAN KTP ORTU</label>
                                <img class="img-preview img-fluid col-sm-5 d-block">
                                <input class="form-control @error('ktp') is-invalid @enderror" type="file"
                                    id="ktp" name="ktp" onchange="previewImage(this, '.img-preview')">
                                @error('ktp')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-2">
                                <label for="rapor" class="form-label">SCAN RAPORT SEMESTER AKHIR</label>
                                <img class="img-preview img-fluid col-sm-5 d-block">
                                <input class="form-control @error('rapor') is-invalid @enderror" type="file"
                                    id="rapor" name="rapor" onchange="previewImage(this, '.img-preview')">
                                @error('rapor')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg my-2 mx-2">Daftar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
