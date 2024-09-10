@extends('layouts.guest')

@section('content')
    <section class="vh-100">
        <div class="container">
            <h1 class="text-center mt-2">REGISTER</h1>

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
            <form method="post" action="{{ route('register') }}" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
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

                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <div class="input-group">
                        <input type="text" name="username" class="form-control" placeholder="Masukkan username" required
                            value="{{ old('username') }}">
                        {{-- <button class="btn btn-outline-success" type="button" id="button-addon2">Cek Ketersediaan</button> --}}
                    </div>
                    @error('username')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
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

                {{-- <input name="role" type="hidden" value=2> --}}

                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>

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
