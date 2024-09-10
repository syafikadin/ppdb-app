@extends('layouts.admin')
@section('content')
    <div class="main-content">
        <div class="app-content">
            <div class="app-content-header shadow-sm">
                <h1 class="app-content-headerText fw-bold">Data Siswa</h1>
            </div>

            <div class="content-body">

                <div class="card shadow mt-3">
                    <div class="card-body">
                        <h5 class="mb-4 fw-bold">Tabel data siswa</h5>
                        <table class="table table-bordered table-hover">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col" class="align-middle">No</th>
                                    <th scope="col" class="align-middle" style="width: 15%">NIS</th>
                                    <th scope="col" class="align-middle" style="width: 50%">Nama</th>
                                    <th scope="col" style="width: 30%" class="text-center align-middle">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dataSiswa as $item)
                                    <tr>
                                        <td scope="row" class="text-center align-middle">{{ $loop->iteration }}</td>
                                        <td class="align-middle">{{ $item->nis }}</td>
                                        <td class="align-middle">{{ $item->name }}</td>
                                        <td class="align-middle text-center">
                                            <button class="btn btn-outline-primary btn-sm">Show</button>
                                            <button class="btn btn-outline-primary btn-sm">Edit</button>
                                            <button class="btn btn-outline-primary btn-sm">Delete</button>
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
