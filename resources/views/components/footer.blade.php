<footer class="site-footer mt-5">
    <div class="container py-5">
        <div class="footer-box">
            <div class="row g-4 align-items-center">
                <div class="col-lg-5">
                    <div class="footer-brand">
                        <div class="footer-logo">
                            <i class="bi bi-mortarboard-fill"></i>
                        </div>

                        <div>
                            <h3 class="footer-title mb-2">SMPTM Lubabul Fattah</h3>
                            <p class="footer-subtitle mb-0">
                                Pusat informasi dan layanan komunikasi sekolah untuk mendukung proses PPDB yang mudah,
                                rapi, dan profesional.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-7">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="footer-contact-card">
                                <div class="footer-contact-icon">
                                    <i class="bi bi-person-badge-fill"></i>
                                </div>
                                <div>
                                    <div class="footer-contact-label">Narahubung</div>
                                    <h5 class="footer-contact-name mb-1">Ust. Bagas</h5>
                                    <a href="https://wa.me/6285855013326" target="_blank" class="footer-contact-link">
                                        0858-5501-3326
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="footer-contact-card">
                                <div class="footer-contact-icon">
                                    <i class="bi bi-person-badge-fill"></i>
                                </div>
                                <div>
                                    <div class="footer-contact-label">Narahubung</div>
                                    <h5 class="footer-contact-name mb-1">Ustzh. Zizi</h5>
                                    <a href="https://wa.me/6285707934476" target="_blank" class="footer-contact-link">
                                        0857-0793-4476
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="footer-divider my-4"></div>

                    <div class="d-flex flex-column flex-md-row justify-content-between align-items-center gap-2">
                        <p class="footer-copy mb-0">
                            © {{ date('Y') }} SMPTM Lubabul Fattah. Seluruh hak cipta dilindungi.
                        </p>
                        <p class="footer-copy mb-0">
                            PPDB Online • Modern • Elegan • Terintegrasi
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<style>
    .site-footer {
        position: relative;
        overflow: hidden;
        background:
            radial-gradient(circle at top left, rgba(153, 246, 228, 0.18), transparent 28%),
            radial-gradient(circle at bottom right, rgba(20, 184, 166, 0.16), transparent 30%),
            linear-gradient(135deg, #0f172a 0%, #0f766e 45%, #14b8a6 100%);
        color: #fff;
    }

    .site-footer::before {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(to right, rgba(255, 255, 255, 0.04), rgba(255, 255, 255, 0));
        pointer-events: none;
    }

    .footer-box {
        position: relative;
        z-index: 2;
        background: rgba(255, 255, 255, 0.10);
        border: 1px solid rgba(255, 255, 255, 0.14);
        border-radius: 28px;
        padding: 32px;
        box-shadow: 0 18px 40px rgba(15, 23, 42, 0.18);
        backdrop-filter: blur(14px);
        -webkit-backdrop-filter: blur(14px);
    }

    .footer-brand {
        display: flex;
        align-items: center;
        gap: 18px;
    }

    .footer-logo {
        width: 74px;
        height: 74px;
        border-radius: 22px;
        background: rgba(255, 255, 255, 0.16);
        border: 1px solid rgba(255, 255, 255, 0.18);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 30px;
        color: #99f6e4;
        box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.10);
        flex-shrink: 0;
    }

    .footer-title {
        font-size: 1.55rem;
        font-weight: 800;
        color: #fff;
        letter-spacing: 0.2px;
    }

    .footer-subtitle {
        color: rgba(255, 255, 255, 0.82);
        font-size: 0.96rem;
        line-height: 1.75;
    }

    .footer-contact-card {
        display: flex;
        align-items: center;
        gap: 14px;
        height: 100%;
        background: rgba(255, 255, 255, 0.09);
        border: 1px solid rgba(255, 255, 255, 0.12);
        border-radius: 20px;
        padding: 18px 20px;
        transition: all 0.25s ease;
    }

    .footer-contact-card:hover {
        transform: translateY(-3px);
        background: rgba(255, 255, 255, 0.13);
        box-shadow: 0 12px 24px rgba(15, 23, 42, 0.16);
    }

    .footer-contact-icon {
        width: 52px;
        height: 52px;
        border-radius: 16px;
        background: rgba(255, 255, 255, 0.14);
        border: 1px solid rgba(255, 255, 255, 0.16);
        display: flex;
        align-items: center;
        justify-content: center;
        color: #99f6e4;
        font-size: 22px;
        flex-shrink: 0;
    }

    .footer-contact-label {
        font-size: 0.78rem;
        color: rgba(255, 255, 255, 0.70);
        margin-bottom: 2px;
    }

    .footer-contact-name {
        font-size: 1.04rem;
        font-weight: 700;
        color: #fff;
    }

    .footer-contact-link {
        color: #ccfbf1;
        text-decoration: none;
        font-weight: 600;
        transition: all 0.25s ease;
    }

    .footer-contact-link:hover {
        color: #ffffff;
        text-decoration: underline;
    }

    .footer-divider {
        height: 1px;
        width: 100%;
        background: linear-gradient(to right, transparent, rgba(255, 255, 255, 0.28), transparent);
    }

    .footer-copy {
        color: rgba(255, 255, 255, 0.78);
        font-size: 0.92rem;
    }

    @media (max-width: 991.98px) {
        .footer-box {
            padding: 24px;
        }

        .footer-brand {
            align-items: flex-start;
        }
    }

    @media (max-width: 767.98px) {
        .footer-brand {
            flex-direction: column;
        }

        .footer-title {
            font-size: 1.3rem;
        }

        .footer-logo {
            width: 66px;
            height: 66px;
            font-size: 26px;
        }
    }
</style>
