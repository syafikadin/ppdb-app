<style>
    .hero-slider {
        position: relative;
        margin-top: 0;
    }

    .hero-slider .carousel-item {
        height: 88vh;
        min-height: 620px;
        position: relative;
    }

    .hero-slider .carousel-item img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .hero-slider .carousel-overlay {
        position: absolute;
        inset: 0;
        background:
            linear-gradient(rgba(15, 23, 42, 0.58), rgba(15, 23, 42, 0.58)),
            linear-gradient(90deg, rgba(15, 118, 110, 0.30), rgba(20, 184, 166, 0.10));
        z-index: 1;
    }

    .hero-slider .carousel-caption {
        z-index: 2;
        right: auto;
        left: 50%;
        transform: translateX(-50%);
        bottom: 50%;
        translate: 0 50%;
        width: min(1140px, calc(100% - 24px));
        text-align: left;
        padding: 0;
    }

    .hero-slider-content {
        max-width: 760px;
    }

    .hero-badge {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        padding: 10px 18px;
        border-radius: 999px;
        background: rgba(255, 255, 255, 0.12);
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.16);
        color: #fff;
        font-size: 14px;
        font-weight: 600;
        margin-bottom: 18px;
    }

    .hero-title {
        font-size: clamp(2rem, 4vw, 3.5rem);
        font-weight: 800;
        line-height: 1.15;
        color: #fff;
        margin-bottom: 18px;
        letter-spacing: 0.2px;
    }

    .hero-title span {
        color: #99f6e4;
    }

    .hero-text {
        font-size: 1.02rem;
        line-height: 1.85;
        color: rgba(255, 255, 255, 0.92);
        margin-bottom: 28px;
        max-width: 720px;
    }

    .hero-actions {
        display: flex;
        flex-wrap: wrap;
        gap: 14px;
    }

    .btn-brosur {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        padding: 14px 24px;
        border-radius: 999px;
        background: linear-gradient(135deg, #0f766e, #14b8a6);
        color: #fff;
        font-weight: 700;
        text-decoration: none;
        border: none;
        box-shadow: 0 12px 24px rgba(20, 184, 166, 0.28);
        transition: all 0.25s ease;
    }

    .btn-brosur:hover {
        color: #fff;
        transform: translateY(-2px);
        box-shadow: 0 16px 28px rgba(20, 184, 166, 0.34);
    }

    .btn-secondary-hero {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        padding: 14px 24px;
        border-radius: 999px;
        background: rgba(255, 255, 255, 0.10);
        color: #fff;
        font-weight: 700;
        text-decoration: none;
        border: 1px solid rgba(255, 255, 255, 0.18);
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
        transition: all 0.25s ease;
    }

    .btn-secondary-hero:hover {
        color: #fff;
        background: rgba(255, 255, 255, 0.16);
    }

    .hero-glass-card {
        margin-top: 28px;
        max-width: 560px;
        padding: 20px 22px;
        border-radius: 22px;
        background: rgba(255, 255, 255, 0.10);
        border: 1px solid rgba(255, 255, 255, 0.15);
        backdrop-filter: blur(12px);
        -webkit-backdrop-filter: blur(12px);
    }

    .hero-glass-card h6 {
        color: #fff;
        font-weight: 700;
        margin-bottom: 8px;
    }

    .hero-glass-card p {
        color: rgba(255, 255, 255, 0.88);
        margin-bottom: 0;
        line-height: 1.7;
        font-size: 0.95rem;
    }

    .hero-slider .carousel-indicators {
        margin-bottom: 2rem;
        z-index: 3;
    }

    .hero-slider .carousel-indicators button {
        width: 10px;
        height: 10px;
        border-radius: 50%;
        border: 0;
        background-color: rgba(255, 255, 255, 0.5);
        margin: 0 6px;
    }

    .hero-slider .carousel-indicators .active {
        width: 28px;
        border-radius: 999px;
        background-color: #14b8a6;
    }

    .hero-slider .carousel-control-prev,
    .hero-slider .carousel-control-next {
        width: 60px;
        z-index: 3;
    }

    .hero-slider .carousel-control-prev-icon,
    .hero-slider .carousel-control-next-icon {
        width: 46px;
        height: 46px;
        border-radius: 50%;
        background-color: rgba(255, 255, 255, 0.14);
        background-size: 45% 45%;
        backdrop-filter: blur(8px);
        -webkit-backdrop-filter: blur(8px);
        border: 1px solid rgba(255, 255, 255, 0.18);
    }

    @media (max-width: 991.98px) {
        .hero-slider .carousel-item {
            height: auto;
            min-height: 620px;
        }

        .hero-slider .carousel-caption {
            width: calc(100% - 32px);
        }

        .hero-text {
            font-size: 0.98rem;
            line-height: 1.75;
        }
    }

    @media (max-width: 575.98px) {
        .hero-slider .carousel-item {
            min-height: 680px;
        }

        .hero-actions {
            flex-direction: column;
            align-items: stretch;
        }

        .btn-brosur,
        .btn-secondary-hero {
            width: 100%;
        }

        .hero-glass-card {
            padding: 18px;
        }
    }
</style>

<section class="hero-slider">
    <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active" aria-current="true"
                aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>

        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('assets/images/hero-1.jpeg') }}" alt="Hero SMP Tahfidz Modern Lubabul Fattah">
                <div class="carousel-overlay"></div>

                <div class="carousel-caption">
                    <div class="hero-slider-content">
                        <span class="hero-badge">
                            <i class="bi bi-stars"></i>
                            Selamat Datang di PPDB Online
                        </span>

                        <h1 class="hero-title">
                            SMP Tahfidz Modern <span>Lubabul Fattah</span>
                        </h1>

                        <p class="hero-text">
                            SMP Tahfidz Modern Lubabul Fattah merupakan sekolah menengah pertama di bawah naungan
                            Yayasan Pondok Pesantren Tahfidzul Qur’an Lubabul Fattah. Sekolah ini menerapkan
                            Kurikulum Merdeka yang berfokus pada materi esensial, pengembangan karakter, dan
                            kompetensi peserta didik.
                        </p>

                        <div class="hero-actions">
                            <a href="{{ asset('assets/files/brosur-ppdb.pdf') }}" class="btn-brosur" download>
                                <i class="bi bi-download"></i>
                                Download Brosur PPDB
                            </a>
                            <a href="/register" class="btn-secondary-hero">
                                <i class="bi bi-pencil-square"></i>
                                Daftar Sekarang
                            </a>
                        </div>

                        <div class="hero-glass-card">
                            <h6>Visi Sekolah</h6>
                            <p>
                                Terwujudnya Generasi Qur’ani yang Berakhlakul Karimah dan Unggul dalam Prestasi.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="carousel-item">
                <img src="{{ asset('assets/images/hero-1.jpeg') }}" alt="Lingkungan Belajar Islami">
                <div class="carousel-overlay"></div>

                <div class="carousel-caption">
                    <div class="hero-slider-content">
                        <span class="hero-badge">
                            <i class="bi bi-book"></i>
                            Pendidikan Islam Modern
                        </span>

                        <h2 class="hero-title">
                            Lingkungan Belajar yang <span>Religius, Nyaman, dan Terarah</span>
                        </h2>

                        <p class="hero-text">
                            Pembelajaran dirancang untuk membentuk peserta didik yang memiliki dasar keislaman kuat,
                            akhlak yang baik, serta kesiapan akademik dan karakter untuk menghadapi masa depan.
                        </p>

                        <div class="hero-actions">
                            <a href="{{ asset('assets/files/brosur-ppdb.pdf') }}" class="btn-brosur" download>
                                <i class="bi bi-file-earmark-arrow-down"></i>
                                Download Brosur
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="carousel-item">
                <img src="{{ asset('assets/images/hero-1.jpeg') }}" alt="PPDB SMP Tahfidz Modern Lubabul Fattah">
                <div class="carousel-overlay"></div>

                <div class="carousel-caption">
                    <div class="hero-slider-content">
                        <span class="hero-badge">
                            <i class="bi bi-mortarboard"></i>
                            PPDB Tahun Ajaran Baru
                        </span>

                        <h2 class="hero-title">
                            Bergabung Menjadi Bagian dari <span>Generasi Qur’ani Berprestasi</span>
                        </h2>

                        <p class="hero-text">
                            Ikuti proses pendaftaran dengan mudah melalui sistem PPDB online dan dapatkan informasi
                            tahapan seleksi, jadwal, serta ketentuan pendaftaran secara lengkap.
                        </p>

                        <div class="hero-actions">
                            <a href="/register" class="btn-brosur">
                                <i class="bi bi-arrow-right-circle"></i>
                                Mulai Pendaftaran
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Sebelumnya</span>
        </button>

        <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Berikutnya</span>
        </button>
    </div>
</section>
