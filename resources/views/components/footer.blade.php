<footer class="luxury-footer mt-5">
    <div class="container py-5">
        <div class="footer-box">
            <div class="row align-items-center g-4">
                <div class="col-lg-5">
                    <div class="footer-brand">
                        <div class="footer-logo-wrap">
                            <div class="footer-logo">
                                <i class="bi bi-mortarboard-fill"></i>
                            </div>
                        </div>
                        <div>
                            <h3 class="footer-title mb-2">SMPTM Lubabul Fattah</h3>
                            <p class="footer-subtitle mb-0">
                                Pusat informasi dan layanan komunikasi sekolah
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-7">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="contact-card">
                                <div class="contact-icon">
                                    <i class="bi bi-person-badge-fill"></i>
                                </div>
                                <div class="contact-content">
                                    <h5 class="contact-name">Ust. Bagas</h5>
                                    <a href="https://wa.me/6285855013326" target="_blank" class="contact-number">
                                        0858-5501-3326
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="contact-card">
                                <div class="contact-icon">
                                    <i class="bi bi-person-badge-fill"></i>
                                </div>
                                <div class="contact-content">
                                    <h5 class="contact-name">Ustzh. Zizi</h5>
                                    <a href="https://wa.me/6285707934476" target="_blank" class="contact-number">
                                        0857-0793-4476
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="footer-divider my-4"></div>

                    <div
                        class="footer-bottom d-flex flex-column flex-md-row justify-content-between align-items-center gap-2">
                        <p class="mb-0 footer-copy">
                            © {{ date('Y') }} SMPTM Lubabul Fattah. Seluruh hak cipta dilindungi.
                        </p>
                        <p class="mb-0 footer-made">
                            {{-- Dibuat untuk tampilan yang elegan dan profesional --}}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<style>
    .luxury-footer {
        background:
            radial-gradient(circle at top left, rgba(255, 215, 0, 0.10), transparent 30%),
            radial-gradient(circle at bottom right, rgba(255, 255, 255, 0.08), transparent 25%),
            linear-gradient(135deg, #0f172a, #111827, #1e293b);
        color: #fff;
        position: relative;
        overflow: hidden;
    }

    .luxury-footer::before {
        content: "";
        position: absolute;
        inset: 0;
        background: linear-gradient(to right, rgba(255, 255, 255, 0.03), rgba(255, 255, 255, 0));
        pointer-events: none;
    }

    .footer-box {
        background: rgba(255, 255, 255, 0.08);
        border: 1px solid rgba(255, 215, 0, 0.18);
        border-radius: 24px;
        padding: 32px;
        box-shadow:
            0 10px 40px rgba(0, 0, 0, 0.35),
            inset 0 1px 0 rgba(255, 255, 255, 0.08);
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
    }

    .footer-brand {
        display: flex;
        align-items: center;
        gap: 18px;
    }

    .footer-logo-wrap {
        position: relative;
    }

    .footer-logo {
        width: 72px;
        height: 72px;
        border-radius: 20px;
        background: linear-gradient(145deg, #facc15, #f59e0b);
        color: #111827;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 30px;
        box-shadow:
            0 8px 24px rgba(250, 204, 21, 0.35),
            inset 0 2px 8px rgba(255, 255, 255, 0.35);
    }

    .footer-title {
        font-size: 1.6rem;
        font-weight: 800;
        letter-spacing: 0.3px;
        color: #fff;
    }

    .footer-subtitle {
        color: rgba(255, 255, 255, 0.75);
        font-size: 0.95rem;
    }

    .contact-card {
        display: flex;
        align-items: center;
        gap: 14px;
        background: rgba(255, 255, 255, 0.07);
        border: 1px solid rgba(255, 255, 255, 0.08);
        border-radius: 18px;
        padding: 18px 20px;
        transition: all 0.3s ease;
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
        height: 100%;
    }

    .contact-card:hover {
        transform: translateY(-4px);
        border-color: rgba(250, 204, 21, 0.35);
        box-shadow: 0 12px 28px rgba(0, 0, 0, 0.22);
    }

    .contact-icon {
        width: 52px;
        height: 52px;
        border-radius: 16px;
        background: linear-gradient(145deg, rgba(250, 204, 21, 0.22), rgba(245, 158, 11, 0.18));
        color: #facc15;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 22px;
        flex-shrink: 0;
        border: 1px solid rgba(250, 204, 21, 0.22);
    }

    .contact-name {
        font-size: 1.05rem;
        font-weight: 700;
        margin-bottom: 4px;
        color: #fff;
    }

    .contact-number {
        color: #fde68a;
        text-decoration: none;
        font-weight: 500;
        transition: 0.3s ease;
    }

    .contact-number:hover {
        color: #fff3b0;
        text-decoration: underline;
    }

    .footer-divider {
        height: 1px;
        width: 100%;
        background: linear-gradient(to right, transparent, rgba(250, 204, 21, 0.5), transparent);
    }

    .footer-copy,
    .footer-made {
        color: rgba(255, 255, 255, 0.72);
        font-size: 0.92rem;
    }

    @media (max-width: 768px) {
        .footer-box {
            padding: 24px;
        }

        .footer-brand {
            flex-direction: column;
            align-items: flex-start;
        }

        .footer-title {
            font-size: 1.35rem;
        }
    }
</style>
