<style>
    .navbar-custom {
        background: rgba(255, 255, 255, 0.88);
        backdrop-filter: blur(12px);
        -webkit-backdrop-filter: blur(12px);
        box-shadow: 0 8px 24px rgba(15, 23, 42, 0.06);
        border-bottom: 1px solid rgba(15, 23, 42, 0.06);
        padding-top: 14px;
        padding-bottom: 14px;
    }

    .navbar-custom .navbar-brand {
        font-size: 1.25rem;
        font-weight: 800;
        color: #0f172a;
        letter-spacing: 0.3px;
    }

    .navbar-custom .nav-link {
        color: #475569;
        font-weight: 500;
        padding: 10px 16px;
        border-radius: 999px;
        transition: all 0.25s ease;
    }

    .navbar-custom .nav-link:hover,
    .navbar-custom .nav-link.active {
        color: #0f766e;
        background-color: rgba(20, 184, 166, 0.08);
    }

    .navbar-custom .navbar-toggler {
        border: none;
        box-shadow: none;
    }

    .btn-register-custom {
        border-radius: 999px;
        padding: 10px 20px;
        font-weight: 600;
        border: 1px solid #cbd5e1;
        color: #0f172a;
        background: #fff;
        transition: all 0.25s ease;
    }

    .btn-register-custom:hover {
        border-color: #14b8a6;
        color: #0f766e;
        background: #f8fffe;
    }

    .btn-login-custom {
        border-radius: 999px;
        padding: 10px 22px;
        font-weight: 600;
        background: linear-gradient(135deg, #0f766e, #14b8a6);
        border: none;
        color: #fff;
        box-shadow: 0 8px 18px rgba(20, 184, 166, 0.22);
        transition: all 0.25s ease;
    }

    .btn-login-custom:hover {
        color: #fff;
        transform: translateY(-1px);
        box-shadow: 0 12px 24px rgba(20, 184, 166, 0.28);
    }
</style>

<nav class="navbar navbar-expand-lg navbar-custom sticky-top">
    <div class="container">
        <a class="navbar-brand" href="/">PPDB SMPTM Lubabul Fattah</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="bi bi-list fs-3"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0 gap-lg-2">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/pengumuman">Pengumuman</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/gelombang">Gelombang</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/kontak">Kontak</a>
                </li>
            </ul>

            <div class="d-flex flex-column flex-lg-row gap-2 mt-3 mt-lg-0">
                <a class="btn btn-register-custom" href="/register">Registrasi</a>
                <a class="btn btn-login-custom" href="/login">Login</a>
            </div>
        </div>
    </div>
</nav>
