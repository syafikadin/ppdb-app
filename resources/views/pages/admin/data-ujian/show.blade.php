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
                                    <th scope="col" class="text-center align-middle">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td scope="row" class="text-center align-middle">1</td>
                                    <td class="align-middle">Alberto Simanjuntak</td>
                                    <td class="align-middle text-center">Laki-laki</td>
                                    <td class="align-middle text-center">
                                        <a href="" class="btn btn-primary btn-sm">Button</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td scope="row" class="text-center align-middle">2</td>
                                    <td class="align-middle">Saipul OmeTV</td>
                                    <td class="align-middle text-center">Laki-laki</td>
                                    <td class="align-middle text-center">
                                        <a href="" class="btn btn-primary btn-sm">Button</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td scope="row" class="text-center align-middle">...</td>
                                    <td class="align-middle">...</td>
                                    <td class="align-middle text-center">...</td>
                                    <td class="align-middle text-center">
                                        <a href="" class="btn btn-primary btn-sm">Button</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td scope="row" class="text-center align-middle">30</td>
                                    <td class="align-middle">Aliando Bakrie</td>
                                    <td class="align-middle text-center">Laki-laki</td>
                                    <td class="align-middle text-center">
                                        <a href="" class="btn btn-primary btn-sm">Button</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
