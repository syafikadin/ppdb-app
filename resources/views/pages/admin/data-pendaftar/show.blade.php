@extends('layouts.admin')
@section('content')
    <div class="main-content">
        <div class="app-content">
            <div class="app-content-header shadow-sm">
                <h1 class="app-content-headerText fw-bold">Data Pendaftar</h1>
            </div>

            <div class="content-body">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title fw-bold mb-0">Informasi Pribadi</h5>
                        <hr>

                        <img id="img-preview" class="img-fluid d-block mb-3 mx-auto"
                            src="{{ asset('assets/images/person.jpg') }}" alt="Default Photo"
                            style="height: 200px; width: 200px; object-fit: cover;">

                        <div class="row ">
                            <div class="col-lg-6 col-md-6">
                                <div class="mb-3">
                                    <label class="form-label small">Nama</label>
                                    <input type="text" class="form-control" disabled value="Mohammad Yudha Pamungkas">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label small">Jenis Kelamin</label>
                                    <input type="text" class="form-control" disabled value="Laki-laki">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label small">Tempat Lahir</label>
                                    <input type="text" class="form-control" disabled value="Jombang">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label small">Tanggal Lahir</label>
                                    <input type="text" class="form-control" disabled value="31 Maret 2017">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label small">Whatsapp</label>
                                    <input type="text" class="form-control" disabled value="0812123123">
                                </div>

                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="mb-3">
                                    <label class="form-label small">Email</label>
                                    <input type="text" class="form-control" disabled value="ydasduahsuda@gmail.com">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label small">Sosial Media</label>
                                    <input type="text" class="form-control" disabled value="yudha.pamungkas_">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label small">Alamat</label>
                                    <textarea class="form-control" disabled rows="8">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Totam quam dolore ullam tempora culpa exercitationem?</textarea>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>

                <div class="card shadow-sm mt-4">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">Informasi Orang Tua</h5>
                        <hr>

                        <div class="row g-3">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <h6 class="fw-bold ">DATA AYAH</h6>
                                <div class="mb-3">
                                    <label class="form-label small ">Nama ayah</label>
                                    <input type="text" class="form-control" disabled value="Alberto Simanjuntak">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label small ">Pekerjaan ayah</label>
                                    <input type="text" class="form-control" disabled value="Tukang Pukul">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label small ">Rata-rata penghasilan ayah</label>
                                    <input type="text" class="form-control" disabled value="Sekali pukul 10 juta">
                                </div>

                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <h6 class="fw-bold ">DATA IBU</h6>
                                <div class="mb-3">
                                    <label class="form-label small ">Nama ibu</label>
                                    <input type="text" class="form-control" disabled value="Simanjuntak Wati">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label small ">Pekerjaan ibu</label>
                                    <input type="text" class="form-control" disabled value="Tukang Tangkis">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label small ">Rata-rata penghasilan ibu</label>
                                    <input type="text" class="form-control" disabled value="Sekali tangkis 5 juta">
                                </div>
                            </div>
                        </div>


                        <h6 class="fw-bold mt-3">DATA WALI</h6>
                        <div class="mb-3">
                            <label class="form-label small ">Nomor Whatsapp Wali</label>
                            <input type="text" class="form-control" disabled value="0812XXXXXXXX">
                        </div>

                        <label class="form-label small">Alamat</label>
                        <textarea class="form-control" disabled rows="3">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Totam quam dolore ullam tempora culpa exercitationem?</textarea>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
