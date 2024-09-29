@extends('layouts.admin')
@section('content')
    <div class="main-content">
        <div class="app-content">
            <div class="app-content-header shadow-sm">
                <h1 class="app-content-headerText fw-bold">
                    <button class="btn-sidebar" id="btn-sidebar">
                        <i class="bi bi-layout-sidebar-inset"></i>
                    </button>
                    Data Pendaftar
                </h1>
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
                        <h5 class="mb-4 fw-bold">Tabel data pendaftar</h5>
                        <hr>
                        <table class="table table-bordered table-hover">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col" class="align-middle">No</th>
                                    <th scope="col" class="align-middle" style="width: 30%">Nama</th>
                                    <th scope="col" class="align-middle" style="width: 15%">Jenis Kelamin</th>
                                    <th scope="col" class="align-middle" style="width: 15%">Status</th>
                                    <th scope="col" style="width: 35%" class="text-center align-middle">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data_pendaftar as $item)
                                    <tr>
                                        <td scope="row" class="text-center align-middle">{{ $loop->iteration }}</td>
                                        <td class="align-middle">{{ $item->siswa->nama_siswa }}</td>
                                        <td class="align-middle">
                                            {{ $item->siswa->jenis_kelamin === 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                                        <td class="align-middle">
                                            {{ $item->siswa->status }}
                                        </td>
                                        <td class="align-middle text-center">

                                            <div>

                                            </div>

                                            @if ($item->siswa->status === 'Sudah daftar, belum diverifikasi')
                                                <!-- Button trigger modal Tidak Valid -->
                                                <button class="btn btn-outline-danger btn-sm" data-bs-toggle="modal"
                                                    data-bs-target="#modalInvalid">Tidak Valid</button>

                                                <!-- Button trigger modal Verifikasi -->
                                                <button class="btn btn-outline-primary btn-sm" data-bs-toggle="modal"
                                                    data-bs-target="#modalVerifikasi{{ $item->id }}">
                                                    Verifikasi
                                                </button>
                                            @endif

                                            <a href="{{ route('data-pendaftar.show', $item->id) }}"
                                                class="btn btn-primary btn-sm">Lihat Berkas</a>
                                        </td>
                                    </tr>

                                    {{-- Modal Verifikasi --}}
                                    <div class="modal fade" id="modalVerifikasi{{ $item->id }}" tabindex="-1"
                                        aria-labelledby="modalVerifikasiLabel" aria-hidden="true">
                                        <form action="{{ route('data-pendaftar.verifikasi') }}" method="POST">
                                            @csrf
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="modalVerifikasiLabel">Konfirmasi
                                                            Verifikasi</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Apakah Anda yakin ingin memverifikasi pendaftar dengan nama
                                                        {{ $item->siswa->nama_siswa }} ini?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Batal</button>
                                                        <input type="hidden" name="siswa_id"
                                                            value="{{ $item->siswa->id }}">
                                                        <button type="submit" class="btn btn-primary">Ya,
                                                            Verifikasi</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    {{-- End Modal Verifikasi --}}

                                    <!-- Modal Tidak Valid -->
                                    <div class="modal fade" id="modalInvalid" tabindex="-1"
                                        aria-labelledby="modalInvalidLabel" aria-hidden="true">
                                        <form action="{{ route('data-pendaftar.invalid') }}" method="POST">
                                            @csrf
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="modalInvalidLabel">
                                                            Catatan</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="mb-3">
                                                            <label for="catatan" class="form-label">Masukan
                                                                Catatan</label>
                                                            <textarea class="form-control" id="catatan" name="catatan" rows="3"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Batal</button>

                                                        <input type="hidden" name="siswa_id"
                                                            value="{{ $item->siswa->id }}">
                                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    {{-- End Modal Tidak Valid --}}
                                @endforeach
                            </tbody>
                        </table>

                        {{-- {{ $data->links() }} --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
