@extends('layouts.siswa')
@section('content')
    <div class="main-content">
        <div class="app-content">
            <div class="app-content-header shadow-sm">
                <h1 class="app-content-headerText fw-bold">Pendaftaran</h1>
            </div>

            <div class="content-body">
                <form action="{{ route('pendaftaran.updateDataOrangtua', $data_siswa->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="card shadow">
                        <div class="card-body">
                            <h5 class="card-title fw-bold">Informasi Orang Tua</h5>
                            <hr>

                            <div class="row g-3">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <h6 class="fw-bold ">DATA AYAH</h6>
                                    <div class="mb-3">
                                        <label for="nama_ayah" class="form-label small small ">Nama ayah</label>
                                        <input type="text" class="form-control @error('nama_ayah') is-invalid @enderror"
                                            id="nama_ayah" name="nama_ayah" placeholder="Masukan nama ayah" required
                                            value="{{ $data_siswa->nama_ayah ? $data_siswa->nama_ayah : old('nama_ayah') }}">
                                        @error('nama_ayah')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="pekerjaan_ayah" class="form-label small">Pekerjaan ayah</label>
                                        <select name="pekerjaan_ayah" class="form-select" aria-label="Pilih Pekerjaan"
                                            required>
                                            <option value="" selected disabled>-- Pilih Pekerjaan --</option>
                                            <option value="Buruh(Tani/Pabrik/Bangunan)"
                                                {{ $data_siswa->pekerjaan_ayah == 'Buruh(Tani/Pabrik/Bangunan)' ? 'selected' : '' }}>
                                                Buruh(Tani/Pabrik/Bangunan)
                                            </option>
                                            <option value="Dokter/Bidan/Perawat"
                                                {{ $data_siswa->pekerjaan_ayah == 'Dokter/Bidan/Perawat' ? 'selected' : '' }}>
                                                Dokter/Bidan/Perawat
                                            </option>
                                            <option value="Guru/Dosen"
                                                {{ $data_siswa->pekerjaan_ayah == 'Guru/Dosen' ? 'selected' : '' }}>
                                                Guru/Dosen
                                            </option>
                                            <option value="Nelayan"
                                                {{ $data_siswa->pekerjaan_ayah == 'Nelayan' ? 'selected' : '' }}>
                                                Nelayan
                                            </option>
                                            <option value="Pedagang"
                                                {{ $data_siswa->pekerjaan_ayah == 'Pedagang' ? 'selected' : '' }}>
                                                Pedagang
                                            </option>
                                            <option value="Pegawai Swasta"
                                                {{ $data_siswa->pekerjaan_ayah == 'Pegawai Swasta' ? 'selected' : '' }}>
                                                Pegawai Swasta
                                            </option>
                                            <option value="Pengacara/Hakim"
                                                {{ $data_siswa->pekerjaan_ayah == 'Pengacara/Hakim' ? 'selected' : '' }}>
                                                Pengacara/Hakim
                                            </option>
                                            <option value="Pensiunan"
                                                {{ $data_siswa->pekerjaan_ayah == 'Pensiunan' ? 'selected' : '' }}>
                                                Pensiunan
                                            </option>
                                            <option value="Pilot/Pramugara"
                                                {{ $data_siswa->pekerjaan_ayah == 'Pilot/Pramugara' ? 'selected' : '' }}>
                                                Pilot/Pramugara
                                            </option>
                                            <option value="PNS"
                                                {{ $data_siswa->pekerjaan_ayah == 'PNS' ? 'selected' : '' }}>
                                                PNS
                                            </option>
                                            <option value="Politikus"
                                                {{ $data_siswa->pekerjaan_ayah == 'Politikus' ? 'selected' : '' }}>
                                                Politikus
                                            </option>
                                            <option value="Seniman/Pelukis/Artis/Sejenis"
                                                {{ $data_siswa->pekerjaan_ayah == 'Seniman/Pelukis/Artis/Sejenis' ? 'selected' : '' }}>
                                                Seniman/Pelukis/Artis/Sejenis
                                            </option>
                                            <option value="Sopir/Masinis/Kondektur"
                                                {{ $data_siswa->pekerjaan_ayah == 'Sopir/Masinis/Kondektur' ? 'selected' : '' }}>
                                                Sopir/Masinis/Kondektur
                                            </option>
                                            <option value="Wiraswasta"
                                                {{ $data_siswa->pekerjaan_ayah == 'Wiraswasta' ? 'selected' : '' }}>
                                                Wiraswasta
                                            </option>
                                            <option value="Tidak Bekerja"
                                                {{ $data_siswa->pekerjaan_ayah == 'Tidak Bekerja' ? 'selected' : '' }}>
                                                Tidak Bekerja
                                            </option>
                                            <option value="Lainnya"
                                                {{ $data_siswa->pekerjaan_ayah == 'Lainnya' ? 'selected' : '' }}>
                                                Lainnya
                                            </option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="penghasilan_ayah" class="form-label small">Rata-rata penghasilan
                                            ayah</label>
                                        <select name="penghasilan_ayah" class="form-select"
                                            aria-label="Rata Rata Penghasilan" required>
                                            <option value="" selected disabled>-- Pilih Rata Penghasilan --</option>
                                            <option value="Tidak Berpenghasilan"
                                                {{ $data_siswa->penghasilan_ayah == 'Tidak Berpenghasilan' ? 'selected' : '' }}>
                                                Tidak Berpenghasilan
                                            </option>
                                            <option value="<= Rp. 500.000"
                                                {{ $data_siswa->penghasilan_ayah == '<= Rp. 500.000' ? 'selected' : '' }}>
                                                <= Rp. 500.000 </option>
                                            <option value="Rp.1.000.000 - Rp.2.000.000"
                                                {{ $data_siswa->penghasilan_ayah == 'Rp.1.000.000 - Rp.2.000.000' ? 'selected' : '' }}>
                                                Rp.1.000.000 - Rp.2.000.000
                                            </option>
                                            <option value="Rp.2.000.000 - Rp.3.000.000"
                                                {{ $data_siswa->penghasilan_ayah == 'Rp.2.000.000 - Rp.3.000.000' ? 'selected' : '' }}>
                                                Rp.2.000.000 - Rp.3.000.000
                                            </option>
                                            <option value="Rp.4.000.000 - Rp.5.000.000"
                                                {{ $data_siswa->penghasilan_ayah == 'Rp.4.000.000 - Rp.5.000.000' ? 'selected' : '' }}>
                                                Rp.4.000.000 - Rp.5.000.000
                                            </option>
                                            <option value=">= Rp. 5.000.000"
                                                {{ $data_siswa->penghasilan_ayah == '>= Rp. 5.000.000' ? 'selected' : '' }}>
                                                >= Rp. 5.000.000
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="mb-3">
                                        <h6 class="fw-bold ">DATA IBU</h6>
                                        <label for="nama_ibu" class="form-label small">Nama ibu</label>
                                        <input type="text" class="form-control @error('nama_ibu') is-invalid @enderror"
                                            id="nama_ibu" name="nama_ibu" placeholder="Masukan nama ibu" required
                                            value="{{ $data_siswa->nama_ibu ? $data_siswa->nama_ibu : old('nama_ibu') }}">
                                        @error('nama_ibu')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="pekerjaan_ibu" class="form-label small">Pekerjaan ibu</label>
                                        <select name="pekerjaan_ibu" class="form-select" aria-label="Pilih Pekerjaan"
                                            required>
                                            <option value="" selected disabled>-- Pilih Pekerjaan --</option>
                                            <option value="Buruh(Tani/Pabrik/Bangunan)"
                                                {{ $data_siswa->pekerjaan_ibu == 'Buruh(Tani/Pabrik/Bangunan)' ? 'selected' : '' }}>
                                                Buruh(Tani/Pabrik/Bangunan)
                                            </option>
                                            <option value="Dokter/Bidan/Perawat"
                                                {{ $data_siswa->pekerjaan_ibu == 'Dokter/Bidan/Perawat' ? 'selected' : '' }}>
                                                Dokter/Bidan/Perawat
                                            </option>
                                            <option value="Guru/Dosen"
                                                {{ $data_siswa->pekerjaan_ibu == 'Guru/Dosen' ? 'selected' : '' }}>
                                                Guru/Dosen
                                            </option>
                                            <option value="Nelayan"
                                                {{ $data_siswa->pekerjaan_ibu == 'Nelayan' ? 'selected' : '' }}>
                                                Nelayan
                                            </option>
                                            <option value="Pedagang"
                                                {{ $data_siswa->pekerjaan_ibu == 'Pedagang' ? 'selected' : '' }}>
                                                Pedagang
                                            </option>
                                            <option value="Pegawai Swasta"
                                                {{ $data_siswa->pekerjaan_ibu == 'Pegawai Swasta' ? 'selected' : '' }}>
                                                Pegawai Swasta
                                            </option>
                                            <option value="Pengacara/Hakim"
                                                {{ $data_siswa->pekerjaan_ibu == 'Pengacara/Hakim' ? 'selected' : '' }}>
                                                Pengacara/Hakim
                                            </option>
                                            <option value="Pensiunan"
                                                {{ $data_siswa->pekerjaan_ibu == 'Pensiunan' ? 'selected' : '' }}>
                                                Pensiunan
                                            </option>
                                            <option value="Pilot/Pramugara"
                                                {{ $data_siswa->pekerjaan_ibu == 'Pilot/Pramugara' ? 'selected' : '' }}>
                                                Pilot/Pramugara
                                            </option>
                                            <option value="PNS"
                                                {{ $data_siswa->pekerjaan_ibu == 'PNS' ? 'selected' : '' }}>
                                                PNS
                                            </option>
                                            <option value="Politikus"
                                                {{ $data_siswa->pekerjaan_ibu == 'Politikus' ? 'selected' : '' }}>
                                                Politikus
                                            </option>
                                            <option value="Seniman/Pelukis/Artis/Sejenis"
                                                {{ $data_siswa->pekerjaan_ibu == 'Seniman/Pelukis/Artis/Sejenis' ? 'selected' : '' }}>
                                                Seniman/Pelukis/Artis/Sejenis
                                            </option>
                                            <option value="Sopir/Masinis/Kondektur"
                                                {{ $data_siswa->pekerjaan_ibu == 'Sopir/Masinis/Kondektur' ? 'selected' : '' }}>
                                                Sopir/Masinis/Kondektur
                                            </option>
                                            <option value="Wiraswasta"
                                                {{ $data_siswa->pekerjaan_ibu == 'Wiraswasta' ? 'selected' : '' }}>
                                                Wiraswasta
                                            </option>
                                            <option value="Tidak Bekerja"
                                                {{ $data_siswa->pekerjaan_ibu == 'Tidak Bekerja' ? 'selected' : '' }}>
                                                Tidak Bekerja
                                            </option>
                                            <option value="Lainnya"
                                                {{ $data_siswa->pekerjaan_ibu == 'Lainnya' ? 'selected' : '' }}>
                                                Lainnya
                                            </option>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="penghasilan_ibu" class="form-label small">Rata-rata penghasilan
                                            ibu</label>
                                        <select name="penghasilan_ibu" class="form-select"
                                            aria-label="Rata Rata Penghasilan" required>
                                            <option value="" selected disabled>-- Pilih Rata Penghasilan --</option>
                                            <option value="Tidak Berpenghasilan"
                                                {{ $data_siswa->penghasilan_ibu == 'Tidak Berpenghasilan' ? 'selected' : '' }}>
                                                Tidak Berpenghasilan
                                            </option>
                                            <option value="<= Rp. 500.000"
                                                {{ $data_siswa->penghasilan_ibu == '<= Rp. 500.000' ? 'selected' : '' }}>
                                                <= Rp. 500.000 </option>
                                            <option value="Rp.1.000.000 - Rp.2.000.000"
                                                {{ $data_siswa->penghasilan_ibu == 'Rp.1.000.000 - Rp.2.000.000' ? 'selected' : '' }}>
                                                Rp.1.000.000 - Rp.2.000.000
                                            </option>
                                            <option value="Rp.2.000.000 - Rp.3.000.000"
                                                {{ $data_siswa->penghasilan_ibu == 'Rp.2.000.000 - Rp.3.000.000' ? 'selected' : '' }}>
                                                Rp.2.000.000 - Rp.3.000.000
                                            </option>
                                            <option value="Rp.4.000.000 - Rp.5.000.000"
                                                {{ $data_siswa->penghasilan_ibu == 'Rp.4.000.000 - Rp.5.000.000' ? 'selected' : '' }}>
                                                Rp.4.000.000 - Rp.5.000.000
                                            </option>
                                            <option value=">= Rp. 5.000.000"
                                                {{ $data_siswa->penghasilan_ibu == '>= Rp. 5.000.000' ? 'selected' : '' }}>
                                                >= Rp. 5.000.000
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>


                            <h6 class="fw-bold mt-3">DATA WALI</h6>
                            <div class="mb-3">
                                <label for="nomor_wali" class="form-label small">Nomor HP wali (WA)</label>
                                <input type="text" class="form-control @error('nomor_wali') is-invalid @enderror"
                                    id="nomor_wali" name="nomor_wali" required
                                    value="{{ $data_siswa->nomor_wali ? $data_siswa->nomor_wali : old('nomor_wali') }}"
                                    placeholder="0812XXXXXXXX">
                                @error('nomor_wali')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="alamat_wali" class="form-label small">Alamat wali</label>
                                <input type="text" class="form-control @error('alamat_wali') is-invalid @enderror"
                                    id="alamat_wali" name="alamat_wali" placeholder="Masukan alamat wali" required
                                    value="{{ $data_siswa->alamat_wali ? $data_siswa->alamat_wali : old('alamat_wali') }}">
                                @error('alamat_wali')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <hr>
                            @if ($data_siswa->status === 'Belum Mendaftar')
                                <button type="submit" class="btn btn-primary btn-lg px-5">Simpan</button>
                            @endif
                        </div>


                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
