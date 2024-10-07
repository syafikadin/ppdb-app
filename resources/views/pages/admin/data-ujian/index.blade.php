@extends('layouts.admin')
@section('content')
    <div class="main-content">
        <div class="app-content">
            <div class="app-content-header shadow-sm">
                <h1 class="app-content-headerText fw-bold">Data Ujian</h1>
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

                <div class="card shadow mt-3">
                    <div class="card-body">
                        <h5 class="mb-4 fw-bold">Tabel data gelombang pendaftaran</h5>
                        <hr>

                        <table class="table table-bordered table-hover">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col" class="align-middle">No</th>
                                    <th scope="col" class="align-middle" style="width: 20%">Gelombang</th>
                                    <th scope="col" class="align-middle text-center" style="width: 20%">Jumlah Pendaftar
                                    </th>
                                    <th scope="col" class="align-middle text-center" style="width: 20%">Tanggal Ujian
                                    </th>
                                    <th scope="col" class="align-middle text-center" style="width: 20%">Status Gelombang
                                    </th>
                                    <th scope="col" class="text-center align-middle">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data_gelombang as $gelombang)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td>{{ $gelombang->nama_gelombang }}</td>
                                        <td class="text-center">{{ $gelombang->jumlah_pendaftar }}</td>
                                        <td class="text-center">{{ $gelombang->tanggal_ujian }}</td>
                                        <td class="text-center">{{ $gelombang->status }}</td>
                                        <td class="text-center">

                                            <!-- Tombol Edit -->
                                            <button class="btn btn-outline-warning" data-bs-toggle="modal"
                                                data-bs-target="#editModal{{ $gelombang->id }}"
                                                @if ($gelombang->status === 'Closed') disabled @endif>
                                                Edit
                                            </button>

                                            <!-- Tombol Lihat Gelombang -->
                                            <a href="{{ route('gelombang.show', $gelombang->id) }}"
                                                class="btn btn-outline-info">
                                                Lihat Gelombang
                                            </a>

                                            <!-- Tombol Tutup Gelombang -->
                                            <form action="{{ route('gelombang.close', $gelombang->id) }}" method="POST"
                                                style="display:inline;">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="btn btn-outline-danger"
                                                    @if ($gelombang->status === 'Closed') disabled @endif
                                                    onclick="return confirm('Apakah Anda yakin ingin menutup gelombang ini?')">
                                                    Tutup Gelombang
                                                </button>
                                            </form>
                                        </td>
                                    </tr>

                                    <!-- Modal Edit Tanggal Ujian -->
                                    <div class="modal fade" id="editModal{{ $gelombang->id }}" tabindex="-1"
                                        aria-labelledby="editModalLabel{{ $gelombang->id }}" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="editModalLabel{{ $gelombang->id }}">
                                                        Edit Tanggal Ujian - {{ $gelombang->nama }}
                                                    </h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('gelombang.update', $gelombang->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="mb-3">
                                                            <label for="tanggalUjian{{ $gelombang->id }}"
                                                                class="form-label">Tanggal Ujian</label>
                                                            <input type="date" class="form-control"
                                                                id="tanggalUjian{{ $gelombang->id }}" name="tanggal_ujian"
                                                                value="{{ $gelombang->tanggal_ujian }}">
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Batal</button>
                                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>

                        <hr>
                        <div class="mt-3">
                            <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Tambah Gelombang
                            </button>
                        </div>

                        <!-- Modal Tambah -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal Tambah Gelombang</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="namaGelombang" class="form-label small">Nama Gelombang</label>
                                            <input type="text" class="form-control"
                                                placeholder="Masukan nama gelombang" name="nama" required
                                                value="">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <div>
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Batal</button>
                                            <button type="button" class="btn btn-primary">Simpan</button>
                                        </div>
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
