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
                                @foreach ($dataSiswa as $item)
                                    <tr>
                                        <td scope="row" class="text-center align-middle">{{ $loop->iteration }}</td>
                                        <td class="align-middle">{{ $item->name }}</td>
                                        <td class="align-middle">
                                            {{ $item->jenis_kelamin === 0 ? 'Laki-laki' : 'Perempuan' }}</td>
                                        <td class="align-middle text-center">
                                            <button class="btn btn-outline-danger btn-sm">Tolak</button>
                                            <button class="btn btn-outline-primary btn-sm">Verifikasi</button>

                                            {{-- PERBAIKI LINK (href) --}}
                                            <a href="/admin/data-pendaftar/1" class="btn btn-primary btn-sm">Lihat
                                                Berkas</a>
                                        </td>
                                    </tr>
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
