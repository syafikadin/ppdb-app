@extends('layouts.admin')
@section('content')
    <div class="main-content">
        <div class="app-content">
            <div class="app-content-header shadow-sm">
                <h1 class="app-content-headerText fw-bold">Data Ujian</h1>
            </div>

            <div class="content-body">

                <div class="card shadow mt-3">
                    <div class="card-body">
                        <h5 class="mb-4 fw-bold">Tabel data gelombang pendaftaran</h5>
                        <hr>

                        <table class="table table-bordered table-hover">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col" class="align-middle">No</th>
                                    <th scope="col" class="align-middle" style="width: 40%">Gelombang</th>
                                    <th scope="col" class="align-middle text-center" style="width: 20%">Jumlah Pendaftar
                                    </th>
                                    <th scope="col" class="align-middle text-center" style="width: 20%">Tanggal Ujian
                                    </th>
                                    <th scope="col" class="text-center align-middle">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td scope="row" class="text-center align-middle">1</td>
                                    <td class="align-middle">Gelombang 1</td>
                                    <td class="align-middle text-center">30</td>
                                    <td class="align-middle text-center">10 Maret 2025</td>
                                    <td class="align-middle text-center">
                                        <a href="" class="btn btn-primary btn-sm">Lihat</a>
                                    </td>
                                </tr>

                            </tbody>
                        </table>

                        <hr>
                        <div class="mt-3">
                            <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Tambah Gelombang
                            </button>
                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                <!-- Center the modal vertically -->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal Tambah Gelombang</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">

                                        <div class="mb-3">
                                            <label for="exampleFormControlTextarea1" class="form-label small">Nama
                                                Gelombang</label>
                                            <input type="text" class="form-control" placeholder="Masukan nama gelombang"
                                                required value="">
                                        </div>

                                    </div>
                                    <div class="modal-footer ">

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
