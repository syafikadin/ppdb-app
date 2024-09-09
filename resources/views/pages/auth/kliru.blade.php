<div class="mb-3">
    <label for="jenis_kelamin" class="form-label">JENIS KELAMIN</label>
    <div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" id="jenis_kelamin" name="jenis_kelamin" value="0" required>
            <label class="form-check-label" for="jenis_kelamin">Laki-laki</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" id="jenis_kelamin" name="jenis_kelamin" value="1"
                required>
            <label class="form-check-label" for="jenis_kelamin">Perempuan</label>
        </div>
    </div>
</div>

<div class="mb-3">
    <label for="tempat_lahir" class="form-label">TEMPAT LAHIR</label>
    <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" id="tempat_lahir"
        name="tempat_lahir" required value="{{ old('tempat_lahir') }}">
    @error('tempat_lahir')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>

<div class="mb-3">
    <label for="tanggal_lahir" class="form-label">TANGGAL LAHIR</label>
    <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir"
        value="{{ old('tanggal_lahir') }}" required>
    @error('tanggal_lahir')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>

<div class="mb-3">
    <label for="nama_ayah" class="form-label">NAMA AYAH</label>
    <input type="text" class="form-control @error('nama_ayah') is-invalid @enderror" id="nama_ayah" name="nama_ayah"
        required value="{{ old('nama_ayah') }}">
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
        <option value="0">Buruh (Tani/Pabrik/Bangunan)</option>
        <option value="1">Dokter/Bidan/Perawat</option>
        <option value="2">Guru/Dosen</option>
        <option value="3">Nelayan</option>
        <option value="4">Pedagang</option>
        <option value="5">Pegawai Swasta</option>
        <option value="6">Pengacara/Hakim</option>
        <option value="7">Pensiunan</option>
        <option value="8">Pilot/Pramugara</option>
        <option value="9">PNS</option>
        <option value="10">Politikus</option>
        <option value="11">Seniman/Pelukis/Artis/Sejenis</option>
        <option value="12">Sopir/Masinis/Kondektur</option>
        <option value="13">Wiraswasta</option>
        <option value="14">Tidak Bekerja</option>
        <option value="15">Lainnya</option>
    </select>
</div>

<div class="mb-3">
    <label for="rata_penghasilan" class="form-label">RATA-RATA PENGHASILAN</label>
    <select name="rata_penghasilan" class="form-select" aria-label="Rata Rata Penghasilan" required>
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
    <input type="text" class="form-control @error('nama_ibu') is-invalid @enderror" id="nama_ibu" name="nama_ibu"
        required value="{{ old('nama_ibu') }}">
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
        <option value="0">Buruh (Tani/Pabrik/Bangunan)</option>
        <option value="1">Dokter/Bidan/Perawat</option>
        <option value="2">Guru/Dosen</option>
        <option value="3">Nelayan</option>
        <option value="4">Pedagang</option>
        <option value="5">Pegawai Swasta</option>
        <option value="6">Pengacara/Hakim</option>
        <option value="7">Pensiunan</option>
        <option value="8">Pilot/Pramugara</option>
        <option value="9">PNS</option>
        <option value="10">Politikus</option>
        <option value="11">Seniman/Pelukis/Artis/Sejenis</option>
        <option value="12">Sopir/Masinis/Kondektur</option>
        <option value="13">Wiraswasta</option>
        <option value="14">Tidak Bekerja</option>
        <option value="15">Lainnya</option>
    </select>
</div>

<div class="mb-3">
    <label for="rata_penghasilan" class="form-label">RATA-RATA PENGHASILAN</label>
    <select name="rata_penghasilan" class="form-select" aria-label="Rata Rata Penghasilan" required>
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
    <label for="nomor_wa" class="form-label">NOMOR HP WALI (WA)</label>
    <input type="text" class="form-control @error('nomor_wa') is-invalid @enderror" id="nomor_wa"
        name="nomor_wa" required value="{{ old('nomor_wa') }}">
    @error('nomor_wa')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>

<div class="mb-3">
    <label for="alamat" class="form-label">ALAMAT SESUAI KK/KTP ORTU WALI</label>
    <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat"
        required value="{{ old('alamat') }}">
    @error('alamat')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>

<div class="mb-4">
    <label for="piagam" class="form-label">PIAGAM YANG DIMILIKI</label>
    <img class="img-preview img-fluid col-sm-5 d-block">
    <input class="form-control @error('piagam') is-invalid @enderror" type="file" id="piagam" name="piagam"
        onchange="previewImage(this, '.img-preview')">
    @error('piagam')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
    <label class="text-italic"><i>Harus piagam asli, bukan milik orang lain</i></label>
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
    <label for="foto" class="form-label">FOTO 3 x 4 (BACKGROUND WARNA MERAH)</label>
    <img class="img-preview img-fluid col-sm-5 d-block">
    <input class="form-control @error('foto') is-invalid @enderror" type="file" id="foto" name="foto"
        onchange="previewImage(this, '.img-preview')">
    @error('foto')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>

<div class="mb-3">
    <label for="akta" class="form-label">SCAN AKTA KELAHIRAN</label>
    <img class="img-preview img-fluid col-sm-5 d-block">
    <input class="form-control @error('akta') is-invalid @enderror" type="file" id="akta" name="akta"
        onchange="previewImage(this, '.img-preview')">
    @error('akta')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>

<div class="mb-3">
    <label for="kk" class="form-label">SCAN KK</label>
    <img class="img-preview img-fluid col-sm-5 d-block">
    <input class="form-control @error('kk') is-invalid @enderror" type="file" id="kk" name="kk"
        onchange="previewImage(this, '.img-preview')">
    @error('kk')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>

<div class="mb-3">
    <label for="ktp" class="form-label">SCAN KTP ORTU</label>
    <img class="img-preview img-fluid col-sm-5 d-block">
    <input class="form-control @error('ktp') is-invalid @enderror" type="file" id="ktp" name="ktp"
        onchange="previewImage(this, '.img-preview')">
    @error('ktp')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>

<div class="mb-3">
    <label for="ktp" class="form-label">SCAN KTP ORTU</label>
    <img class="img-preview img-fluid col-sm-5 d-block">
    <input class="form-control @error('ktp') is-invalid @enderror" type="file" id="ktp" name="ktp"
        onchange="previewImage(this, '.img-preview')">
    @error('ktp')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>

<div class="mb-3">
    <label for="rapor" class="form-label">SCAN RAPORT SEMESTER AKHIR</label>
    <img class="img-preview img-fluid col-sm-5 d-block">
    <input class="form-control @error('rapor') is-invalid @enderror" type="file" id="rapor" name="rapor"
        onchange="previewImage(this, '.img-preview')">
    @error('rapor')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>
