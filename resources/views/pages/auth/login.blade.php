@extends('layouts.guest')

@section('content')
    <section class="vh-100">
        @if (!Auth::guard('web')->user())
            <div class="container-fluid h-custom">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-md-9 col-lg-6 col-xl-5">
                        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
                            class="img-fluid" alt="Sample image">
                    </div>
                    <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                        <h3 class="fw-bold text-primary">
                            Halaman Login
                        </h3>
                        <hr>

                        <form action="/login" method="post">
                            @csrf

                            @if (session()->has('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('success') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif

                            @if (session()->has('loginError'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {{ session('loginError') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif

                            <!-- Email input -->
                            <div data-mdb-input-init class="form-outline mb-4">
                                <label class="form-label" for="username">Username</label>
                                <input type="text" id="username" name="username" class="form-control form-control-lg"
                                    placeholder="Masukan username anda" />
                            </div>

                            <!-- Password input -->
                            <div data-mdb-input-init class="form-outline mb-4">
                                <label class="form-label" for="password">Password</label>
                                <input type="password" id="password" name="password" class="form-control form-control-lg"
                                    placeholder="Masukan password anda" />
                            </div>

                            <div class="text-center text-lg-start mt-4 pt-2">
                                <button type="submit" data-mdb-button-init data-mdb-ripple-init
                                    class="btn btn-primary btn-lg"
                                    style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
                                <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="/register"
                                        class="link-primary">Register</a></p>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        @elseif(Auth::guard('web')->user()->role == 1)
            <div class="container-fluid h-custom logged-in">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-lg-4 col-md-6 col-sm-8">
                        <div class="card shadow" style="min-height: 150px;">
                            <div class="card-body text-center d-flex flex-column justify-content-between">
                                <h4 class="fw-bold">Anda Telah Login</h4>
                                <a href="/admin">Kembali ke dashboard</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @elseif(Auth::guard('web')->user()->role == 2)
            <div class="container-fluid h-custom logged-in">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-lg-4 col-md-6 col-sm-8">
                        <div class="card shadow" style="min-height: 150px;">
                            <div class="card-body text-center d-flex flex-column justify-content-between">
                                <h4 class="fw-bold">Anda Telah Login</h4>
                                <a href="/siswa">Kembali ke dashboard</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </section>
@endsection
