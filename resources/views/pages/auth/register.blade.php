@extends('layouts.guest')

@section('content')
    <section class="vh-100">

        <div class="container-fluid h-custom">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md-9 col-lg-6 col-xl-5">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
                        class="img-fluid" alt="Sample image">
                </div>
                <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                    <h3 class="fw-bold text-primary">
                        Halaman Register
                    </h3>
                    <hr>

                    <form method="post" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf

                        @if (session()->has('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif

                        @if (session()->has('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ session('error') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif

                        <div data-mdb-input-init class="form-outline mb-4">
                            <label for="nama_siswa" class="form-label">Nama Siswa</label>
                            <input type="text" class="form-control @error('nama_siswa') is-invalid @enderror"
                                placeholder="Masukkan Nama Siswa" id="nama_siswa" name="nama_siswa" required autofocus
                                value="{{ old('nama_siswa') }}">
                            @error('nama_siswa')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div data-mdb-input-init class="form-outline mb-4">
                            <label for="username" class="form-label">Username</label>
                            <div class="input-group">
                                <input type="text" name="username" class="form-control" placeholder="Masukkan username"
                                    required value="{{ old('username') }}">
                                {{-- <button class="btn btn-outline-success" type="button" id="button-addon2">Cek Ketersediaan</button> --}}
                            </div>
                            @error('username')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div data-mdb-input-init class="form-outline mb-4">
                            <label for="password" class="form-label">Password</label>
                            <div class="input-group">
                                <input type="password" name="password" id="password" class="form-control"
                                    placeholder="Masukkan password" required value="{{ old('password') }}">
                                <button type="button" class="btn toggle-password" onclick="togglePassword()"><i
                                        class="bi bi-eye-fill"></i></button>
                            </div>
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="text-center text-lg-start mt-4 pt-2">
                            <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg"
                                style="padding-left: 2.5rem; padding-right: 2.5rem;">Register</button>

                            <p class="small fw-bold mt-2 pt-1 mb-0">Already have an account? <a href="/login"
                                    class="link-primary">Login</a></p>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </section>

    <script>
        function togglePassword() {
            const passwordField = document.getElementById("password");
            const toggleButton = document.querySelector(".toggle-password i");

            if (passwordField.type === "password") {
                passwordField.type = "text";
                toggleButton.classList.remove('bi-eye-fill');
                toggleButton.classList.add('bi-eye-slash-fill');
            } else {
                passwordField.type = "password";
                toggleButton.classList.remove('bi-eye-slash-fill');
                toggleButton.classList.add('bi-eye-fill');
            }
        }
    </script>
@endsection
