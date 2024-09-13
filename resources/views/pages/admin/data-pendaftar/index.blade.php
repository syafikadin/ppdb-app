@extends('layouts.admin')
@section('content')
    <div class="main-content">
        <div class="app-content">
            <div class="app-content-header shadow-sm">
                <h1 class="app-content-headerText fw-bold">Data Pendaftar</h1>
            </div>

            <div class="content-body">

                <div class="card shadow mt-3">
                    <div class="card-body">
                        <h5 class="mb-4 fw-bold">Tabel data pendaftar</h5>
                        <hr>
                        <table class="table table-bordered table-hover">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col" class="align-middle">No</th>
                                    <th scope="col" class="align-middle" style="width: 40%">Nama</th>
                                    <th scope="col" class="align-middle" style="width: 20%">Jenis Kelamin</th>
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
                                        <td class="align-middle text-center">

                                            <!-- Button trigger modal -->
                                            <button class="btn btn-outline-danger btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal">Tidak Valid</button>

                                            <button class="btn btn-outline-primary btn-sm">Verifikasi</button>

                                            <a href="{{ route('data-pendaftar.show', $item->id) }}"
                                                class="btn btn-primary btn-sm">Lihat Berkas</a>
                                        </td>
                                    </tr>


                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Catatan</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">

                                                    {{-- Input Catatan --}}
                                                    <div class="mb-3">
                                                        <label for="exampleFormControlTextarea1" class="form-label">Masukan
                                                            catatan</label>
                                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Batal</button>
                                                    <button type="button" class="btn btn-primary">Simpan</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
