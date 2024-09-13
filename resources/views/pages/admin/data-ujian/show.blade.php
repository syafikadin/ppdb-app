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
                        <h5 class="fw-bold">Data pendaftar pada gelombang 1</h5>
                        <p>Ujian dilaksanakan pada tanggal 10 Maret 2025</p>
                        <hr>

                        <table class="table table-bordered table-hover">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col" class="align-middle text-center">No</th>
                                    <th scope="col" class="align-middle" style="width: 40%">Nama</th>
                                    <th scope="col" class="align-middle text-center" style="width: 20%">Jenis Kelamin
                                    </th>
                                    <th scope="col" class="text-center align-middle">Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td scope="row" class="text-center align-middle">1</td>
                                    <td class="align-middle">Alberto Simanjuntak</td>
                                    <td class="align-middle text-center">Laki-laki</td>
                                    <td class="align-middle text-center text-success">
                                        Telah dinilai
                                    </td>
                                </tr>
                                <tr>
                                    <td scope="row" class="text-center align-middle">2</td>
                                    <td class="align-middle">Saipul OmeTV</td>
                                    <td class="align-middle text-center">Laki-laki</td>
                                    <td class="align-middle text-center text-danger">
                                        Belum dinilai
                                    </td>
                                </tr>
                                <tr>
                                    <td scope="row" class="text-center align-middle">...</td>
                                    <td class="align-middle">...</td>
                                    <td class="align-middle text-center">...</td>
                                    <td class="align-middle text-center">
                                        ...
                                    </td>
                                </tr>
                                <tr>
                                    <td scope="row" class="text-center align-middle">30</td>
                                    <td class="align-middle">Aliando Bakrie</td>
                                    <td class="align-middle text-center">Laki-laki</td>
                                    <td class="align-middle text-center text-success">
                                        Telah dinilai
                                    </td>
                                </tr>
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
                                <!-- Center the modal vertically -->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal Tambah Nilai</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">

                                        {{-- Tabel nilai --}}
                                        <table class="table table-bordered table-hover">
                                            <thead class="table-dark">
                                                <tr>
                                                    <th scope="col" class="align-middle text-center" style="width: 10%">
                                                        No</th>
                                                    <th scope="col" class="align-middle">Nama</th>
                                                    <th scope="col" class="align-middle text-center" style="width: 15%">
                                                        Nilai 1
                                                    </th>
                                                    <th scope="col" class="text-center align-middle" style="width: 15%">
                                                        Nilai 2</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td scope="row" class="text-center align-middle">1</td>
                                                    <td class="align-middle">Alberto Simanjuntak</td>
                                                    <td class="align-middle text-center">
                                                        <input type="number" class="form-control" id="nilai1"
                                                            name="nilai1" required value="">
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <input type="number" class="form-control" id="nilai2"
                                                            name="nilai2" required value="">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td scope="row" class="text-center align-middle">2</td>
                                                    <td class="align-middle">Saipul OmeTV</td>
                                                    <td class="align-middle text-center">
                                                        <input type="number" class="form-control" id="nilai1"
                                                            name="nilai1" required value="">
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <input type="number" class="form-control" id="nilai2"
                                                            name="nilai2" required value="">
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td scope="row" class="text-center align-middle">...</td>
                                                    <td class="align-middle">...</td>
                                                    <td class="align-middle text-center">
                                                        ...
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        ...
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td scope="row" class="text-center align-middle">30</td>
                                                    <td class="align-middle">Aliando Bakrie</td>
                                                    <td class="align-middle text-center">
                                                        <input type="number" class="form-control" id="nilai1"
                                                            name="nilai1" required value="">
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <input type="number" class="form-control" id="nilai2"
                                                            name="nilai2" required value="">
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>

                                    </div>
                                    <div class="modal-footer justify-content-between">

                                        <div>
                                            <a href="" class="btn btn-outline-primary">
                                                Import Nilai
                                            </a>
                                        </div>


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
