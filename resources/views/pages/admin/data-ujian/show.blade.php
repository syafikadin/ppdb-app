@extends('layouts.admin')
@section('content')
    <div class="main-content">
        <div class="app-content">
            <div class="app-content-header shadow-sm">
                <h1 class="app-content-headerText fw-bold">
                    <button class="btn-sidebar" id="btn-sidebar">
                        <i class="bi bi-layout-sidebar-inset"></i>
                    </button>
                    Data Ujian
                </h1>
            </div>

            <div class="content-body">

                <div class="card shadow mt-3">
                    <div class="card-body">
                        <h5 class="fw-bold">Data pendaftar pada gelombang 1</h5>
                        <p>Ujian dilaksanakan pada tanggal 10 Maret 2025</p>
                        <hr>

                        <table class="table table-bordered table-hover">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col" class="align-middle text-center">No</th>
                                    <th scope="col" class="align-middle text-center" style="width: 40%">Nama</th>
                                    <th scope="col" class="align-middle text-center" style="width: 15%">Jenis Kelamin
                                    </th>
                                    <th scope="col" class="text-center align-middle" style="width: 20%">Keterangan</th>
                                    <th scope="col" class="text-center align-middle" style="width: 20%">Status Kelulusan
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($gelombang->siswa as $index => $siswa)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td>{{ $siswa->nama_siswa }}</td>
                                        <td class="text-center">{{ $siswa->jenis_kelamin }}</td>
                                        <td class="text-center">
                                            {{ $siswa->nilai ? 'Telah dinilai' : 'Belum dinilai' }}
                                        </td>
                                        <td class="text-center">
                                            @if ($siswa->nilai)
                                                @php
                                                    $rataRataNilai =
                                                        ($siswa->nilai->wawancara +
                                                            $siswa->nilai->baca_alquran +
                                                            $siswa->nilai->tulis_alquran) /
                                                        3;
                                                @endphp
                                                @if ($rataRataNilai >= 70)
                                                    <span class="badge bg-success">Lulus</span>
                                                @else
                                                    <span class="badge bg-danger">Tidak Lulus</span>
                                                @endif
                                            @else
                                                <span class="badge bg-warning">Belum Dinilai</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>

                        <hr>
                        <div class="mt-3">
                            <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Tambah Nilai
                            </button>
                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                                style="max-width: 1000px">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal Tambah Nilai</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">

                                        {{-- Tabel nilai --}}
                                        <form action="{{ route('nilai.store-nilai') }}" method="POST">
                                            @csrf
                                            <table class="table table-bordered table-hover">
                                                <thead class="table-dark">
                                                    <tr>
                                                        <th scope="col" class="align-middle text-center"
                                                            style="width: 10%">No</th>
                                                        <th scope="col" class="align-middle">Nama</th>
                                                        <th scope="col" class="align-middle text-center"
                                                            style="width: 15%">Wawancara</th>
                                                        <th scope="col" class="text-center align-middle"
                                                            style="width: 15%">Baca Al-Qur'an</th>
                                                        <th scope="col" class="text-center align-middle"
                                                            style="width: 15%">Tulis Al-Qur'an</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($gelombang->siswa as $index => $siswa)
                                                        <tr>
                                                            <td class="text-center">{{ $loop->iteration }}</td>
                                                            <td class="align-middle">{{ $siswa->nama_siswa }}</td>
                                                            <td class="align-middle text-center">
                                                                <input type="number" class="form-control"
                                                                    name="nilai[{{ $siswa->id }}][wawancara]"
                                                                    value="{{ $siswa->nilai ? $siswa->nilai->wawancara : '' }}"
                                                                    required>
                                                            </td>
                                                            <td class="align-middle text-center">
                                                                <input type="number" class="form-control"
                                                                    name="nilai[{{ $siswa->id }}][baca]"
                                                                    value="{{ $siswa->nilai ? $siswa->nilai->baca_alquran : '' }}"
                                                                    required>
                                                            </td>
                                                            <td class="align-middle text-center">
                                                                <input type="number" class="form-control"
                                                                    name="nilai[{{ $siswa->id }}][tulis]"
                                                                    value="{{ $siswa->nilai ? $siswa->nilai->tulis_alquran : '' }}"
                                                                    required>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            <div class="modal-footer justify-content-between">
                                                <div>
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Batal</button>
                                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                                </div>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
