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
                                <tr>
                                    <td scope="row" class="text-center align-middle">2</td>
                                    <td class="align-middle">Gelombang 2</td>
                                    <td class="align-middle text-center">25</td>
                                    <td class="align-middle text-center">12 Maret 2025</td>
                                    <td class="align-middle text-center">
                                        <a href="" class="btn btn-primary btn-sm">Lihat</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td scope="row" class="text-center align-middle">3</td>
                                    <td class="align-middle">Gelombang 3</td>
                                    <td class="align-middle text-center">0</td>
                                    <td class="align-middle text-center">14 Maret 2025</td>

                                    {{-- TAMBAH LINK --}}
                                    <td class="align-middle text-center">
                                        <a href="" class="btn btn-primary btn-sm">Lihat</a>
                                    </td>
                                </tr>




                            </tbody>
                        </table>

                        <hr>
                        <div class="mt-3">
                            <button class="btn btn-outline-primary">
                                Tambah
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
