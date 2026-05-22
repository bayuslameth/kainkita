<?= $this->extend('layout/template'); ?>

<?= $this->section('css') ?>
<style>
.kk-batik-hero-bg {
    position: absolute;
    inset: 0;
    overflow: hidden;
    background:
        radial-gradient(circle at 18% 20%, rgba(121, 85, 61, .18), transparent 28%),
        radial-gradient(circle at 86% 34%, rgba(190, 140, 85, .22), transparent 30%),
        radial-gradient(circle at 45% 90%, rgba(121, 85, 61, .12), transparent 28%),
        linear-gradient(135deg, #fff7ed 0%, #f1ddc3 100%);
}

.kk-batik-hero-bg::before,
.kk-batik-hero-bg::after {
    content: "";
    position: absolute;
    width: 280px;
    height: 280px;
    border: 2px dashed rgba(121, 85, 61, .16);
    border-radius: 50%;
}

.kk-batik-hero-bg::before {
    top: -90px;
    right: 12%;
}

.kk-batik-hero-bg::after {
    bottom: -120px;
    left: 8%;
}

.kk-batik-pattern-icons {
    position: absolute;
    inset: 0;
    pointer-events: none;
}

.kk-batik-pattern-icons .kk-pattern-icon {
    position: absolute;
    width: 66px;
    height: 66px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 1.25rem;
    color: #7a543d;
    background: rgba(255, 255, 255, .55);
    box-shadow: 0 1rem 2rem rgba(121, 85, 61, .08);
}

.kk-batik-pattern-icons .kk-pattern-icon i {
    font-size: 1.75rem;
}

.kk-pattern-icon.pattern-1 {
    top: 18%;
    right: 12%;
}

.kk-pattern-icon.pattern-2 {
    bottom: 20%;
    right: 24%;
}

.kk-pattern-icon.pattern-3 {
    top: 48%;
    right: 5%;
}

.kk-map-visual {
    position: absolute;
    inset: 0;
    overflow: hidden;
    background:
        radial-gradient(circle at 20% 24%, rgba(121, 85, 61, .16), transparent 30%),
        radial-gradient(circle at 72% 40%, rgba(190, 140, 85, .22), transparent 30%),
        radial-gradient(circle at 52% 78%, rgba(121, 85, 61, .14), transparent 34%),
        linear-gradient(135deg, #fff7ed 0%, #ead6bb 100%);
}

.kk-map-visual::before {
    content: "";
    position: absolute;
    inset: 2rem;
    border: 1px dashed rgba(121, 85, 61, .24);
    border-radius: 2rem;
}

.kk-map-line {
    position: absolute;
    width: 72%;
    height: 48%;
    left: 14%;
    top: 28%;
    border-top: 3px dashed rgba(121, 85, 61, .28);
    border-radius: 50%;
    transform: rotate(-8deg);
}

.kk-map-pin-icon {
    position: absolute;
    top: 50%;
    left: 50%;
    z-index: 3;
    width: 76px;
    height: 76px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50% 50% 50% 0;
    transform: translate(-50%, -50%) rotate(-45deg);
    color: #7a543d;
    background: rgba(255, 255, 255, .94);
    box-shadow: 0 1rem 3rem rgba(121, 85, 61, .2);
}

.kk-map-pin-icon i {
    font-size: 2rem;
    transform: rotate(45deg);
}

.kk-map-floating-icon {
    position: absolute;
    z-index: 2;
    width: 58px;
    height: 58px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 1.25rem;
    color: #7a543d;
    background: rgba(255, 255, 255, .68);
    box-shadow: 0 .75rem 2rem rgba(121, 85, 61, .1);
}

.kk-map-floating-icon i {
    font-size: 1.5rem;
}

.kk-map-floating-icon.one {
    top: 24%;
    left: 18%;
}

.kk-map-floating-icon.two {
    top: 28%;
    right: 18%;
}

.kk-map-floating-icon.three {
    bottom: 22%;
    left: 28%;
}

.kk-map-floating-icon.four {
    bottom: 24%;
    right: 26%;
}

.kk-social-icon-card {
    position: relative;
    overflow: hidden;
    border-radius: 1.25rem;
    background:
        radial-gradient(circle at 20% 18%, rgba(121, 85, 61, .18), transparent 32%),
        radial-gradient(circle at 84% 82%, rgba(190, 140, 85, .22), transparent 34%),
        linear-gradient(135deg, #fff7ed 0%, #f3e3cf 100%);
}

.kk-social-icon-card::before {
    content: "";
    position: absolute;
    inset: .75rem;
    border: 1px dashed rgba(121, 85, 61, .22);
    border-radius: 1rem;
}

.kk-social-icon-card .kk-social-main-icon {
    position: absolute;
    top: 50%;
    left: 50%;
    z-index: 2;
    width: 72px;
    height: 72px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    color: #7a543d;
    background: rgba(255, 255, 255, .72);
    transform: translate(-50%, -50%);
    box-shadow: 0 1rem 2.5rem rgba(121, 85, 61, .12);
}

.kk-social-icon-card .kk-social-main-icon i {
    font-size: 2rem;
}

.kk-social-icon-card .kk-social-mini-icon {
    position: absolute;
    z-index: 1;
    width: 38px;
    height: 38px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: .85rem;
    color: #7a543d;
    background: rgba(255, 255, 255, .52);
}

.kk-social-mini-icon.one {
    top: 14%;
    left: 16%;
}

.kk-social-mini-icon.two {
    top: 16%;
    right: 14%;
}

.kk-social-mini-icon.three {
    bottom: 14%;
    left: 18%;
}

.kk-social-mini-icon.four {
    right: 18%;
    bottom: 16%;
}

[data-bs-theme="dark"] .kk-batik-hero-bg,
[data-bs-theme="dark"] .kk-map-visual,
[data-bs-theme="dark"] .kk-social-icon-card {
    background:
        radial-gradient(circle at 20% 24%, rgba(255, 255, 255, .08), transparent 30%),
        radial-gradient(circle at 72% 40%, rgba(190, 140, 85, .16), transparent 30%),
        linear-gradient(135deg, #2b2118 0%, #1e1a17 100%);
}

[data-bs-theme="dark"] .kk-pattern-icon,
[data-bs-theme="dark"] .kk-map-pin-icon,
[data-bs-theme="dark"] .kk-map-floating-icon,
[data-bs-theme="dark"] .kk-social-main-icon,
[data-bs-theme="dark"] .kk-social-mini-icon {
    color: #f3e3cf;
    background: rgba(255, 255, 255, .08);
}

[data-bs-theme="dark"] .kk-batik-hero-bg::before,
[data-bs-theme="dark"] .kk-batik-hero-bg::after,
[data-bs-theme="dark"] .kk-map-visual::before,
[data-bs-theme="dark"] .kk-social-icon-card::before {
    border-color: rgba(255, 255, 255, .16);
}
</style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<!-- Breadcrumb -->
<nav class="container pt-3 my-3 my-md-4" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url('home') ?>">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">About</li>
    </ol>
</nav>

<!-- Page title -->
<section class="position-relative bg-body-tertiary py-4">

    <div class="kk-batik-hero-bg">
        <div class="kk-batik-pattern-icons">
            <div class="kk-pattern-icon pattern-1">
                <i class="fa-solid fa-shirt"></i>
            </div>
            <div class="kk-pattern-icon pattern-2">
                <i class="fa-solid fa-store"></i>
            </div>
            <div class="kk-pattern-icon pattern-3">
                <i class="fa-solid fa-tags"></i>
            </div>
        </div>
    </div>

    <div class="container position-relative z-2 py-4 py-md-5 my-lg-3 my-xl-4 my-xxl-5">

        <div class="row pt-lg-2 pb-2 pb-sm-3 pb-lg-4">

            <div class="col-9 col-md-8 col-lg-6">

                <h1 class="display-4 mb-lg-4">
                    Hubungi KainKita
                </h1>

                <p class="mb-0">
                    Kami siap membantu Anda mendapatkan pengalaman terbaik dalam menjelajahi
                    fashion lokal dan kain tradisional Indonesia.
                </p>
            </div>
        </div>
    </div>
</section>


<!-- Contact details -->
<section class="container pt-5 mt-2 mt-sm-3 mt-lg-4 mt-xl-5 mb-n3">

    <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-4 g-4 pt-lg-2 pt-xl-0">

        <!-- Location -->
        <div class="col">

            <div class="d-flex align-items-center">
                <i class="ci-map-pin fs-lg text-dark-emphasis"></i>
                <h3 class="h6 ps-2 ms-1 mb-0">
                    Lokasi KainKita
                </h3>
            </div>

            <hr class="text-dark-emphasis opacity-50 my-3 my-md-4">

            <ul class="list-unstyled">
                <li>Indonesia</li>
                <li>Platform Fashion Lokal Berbasis Web</li>
            </ul>
        </div>

        <!-- Phones -->
        <div class="col">

            <div class="d-flex align-items-center">
                <i class="ci-phone-outgoing fs-lg text-dark-emphasis"></i>
                <h3 class="h6 ps-2 ms-1 mb-0">
                    Hubungi Kami
                </h3>
            </div>

            <hr class="text-dark-emphasis opacity-50 my-3 my-md-4">

            <ul class="list-unstyled">
                <li>Customer Service: +62 812 3456 7890</li>
                <li>Kolaborasi UMKM: +62 812 9876 5432</li>
            </ul>
        </div>

        <!-- Emails -->
        <div class="col">

            <div class="d-flex align-items-center">
                <i class="ci-mail fs-lg text-dark-emphasis"></i>
                <h3 class="h6 ps-2 ms-1 mb-0">
                    Kirim Pesan
                </h3>
            </div>

            <hr class="text-dark-emphasis opacity-50 my-3 my-md-4">

            <ul class="list-unstyled">
                <li>support@kainkita.id</li>
                <li>partnership@kainkita.id</li>
            </ul>
        </div>

        <!-- Working hours -->
        <div class="col">

            <div class="d-flex align-items-center">
                <i class="ci-clock fs-lg text-dark-emphasis"></i>
                <h3 class="h6 ps-2 ms-1 mb-0">
                    Jam Operasional
                </h3>
            </div>

            <hr class="text-dark-emphasis opacity-50 my-3 my-md-4">

            <ul class="list-unstyled">
                <li>Senin - Jumat : 08.00 - 17.00</li>
                <li>Sabtu - Minggu : 09.00 - 15.00</li>
            </ul>
        </div>
    </div>
</section>


<!-- Support / Help center -->
<section class="container py-5 my-2 my-sm-3 my-lg-4 my-xl-5">

    <div class="d-sm-flex align-items-center justify-content-between py-xxl-3">

        <div class="mb-4 mb-sm-0 me-sm-4">

            <h2 class="h3">
                Butuh bantuan?
            </h2>

            <p class="mb-0">
                Temukan jawaban mengenai pesanan, pembayaran, pengiriman,
                hingga informasi produk fashion lokal di pusat bantuan KainKita.
            </p>
        </div>

        <a class="btn btn-lg btn-outline-dark" href="#!">
            Pusat Bantuan
        </a>
    </div>
</section>


<!-- Map / Location visual -->
<section class="position-relative bg-body-tertiary">

    <a class="kk-map-pin-icon" href="#!" data-bs-toggle="popover" data-bs-placement="top" data-bs-trigger="hover"
        data-bs-content="Lihat lokasi" aria-label="Toggle map">
        <i class="fa-solid fa-location-dot"></i>
    </a>

    <div class="kk-map-visual">
        <div class="kk-map-line"></div>

        <div class="kk-map-floating-icon one">
            <i class="fa-solid fa-shirt"></i>
        </div>

        <div class="kk-map-floating-icon two">
            <i class="fa-solid fa-store"></i>
        </div>

        <div class="kk-map-floating-icon three">
            <i class="fa-solid fa-truck-fast"></i>
        </div>

        <div class="kk-map-floating-icon four">
            <i class="fa-solid fa-bag-shopping"></i>
        </div>
    </div>

    <div class="d-none d-xxl-block" style="height: 600px"></div>
    <div class="d-none d-xl-block d-xxl-none" style="height: 500px"></div>
    <div class="d-none d-lg-block d-xl-none" style="height: 420px"></div>
    <div class="d-none d-md-block d-lg-none" style="height: 350px"></div>
    <div class="d-md-none" style="height: 300px"></div>

    <span class="position-absolute top-0 start-0 z-1 w-100 h-100 bg-body opacity-25"></span>
</section>


<!-- FAQ accordion -->
<section class="container pt-5 mt-2 mt-sm-3 mt-lg-4 mt-xl-5">

    <h2 class="text-center pt-xxl-3 pb-lg-2 pb-xl-3">
        Pertanyaan Populer
    </h2>

    <div class="row justify-content-center">

        <div class="col-md-10 col-lg-9 col-xl-8">

            <!-- Accordion -->
            <div class="accordion accordion-alt-icon" id="faq">

                <!-- Question -->
                <div class="accordion-item">
                    <h3 class="accordion-header" id="faqHeading-1">

                        <button type="button" class="accordion-button hover-effect-underline collapsed"
                            data-bs-toggle="collapse" data-bs-target="#faqCollapse-1">

                            <span class="me-2">
                                Berapa lama proses pengiriman?
                            </span>
                        </button>
                    </h3>

                    <div class="accordion-collapse collapse" id="faqCollapse-1" data-bs-parent="#faq">

                        <div class="accordion-body">
                            Waktu pengiriman menyesuaikan lokasi pelanggan dan layanan ekspedisi.
                            Umumnya pesanan diproses dalam 1-3 hari kerja.
                        </div>
                    </div>
                </div>

                <!-- Question -->
                <div class="accordion-item">
                    <h3 class="accordion-header" id="faqHeading-2">

                        <button type="button" class="accordion-button hover-effect-underline collapsed"
                            data-bs-toggle="collapse" data-bs-target="#faqCollapse-2">

                            <span class="me-2">
                                Metode pembayaran apa saja yang tersedia?
                            </span>
                        </button>
                    </h3>

                    <div class="accordion-collapse collapse" id="faqCollapse-2" data-bs-parent="#faq">

                        <div class="accordion-body">
                            KainKita mendukung pembayaran melalui transfer bank,
                            e-wallet, dan metode pembayaran digital lainnya.
                        </div>
                    </div>
                </div>

                <!-- Question -->
                <div class="accordion-item">
                    <h3 class="accordion-header" id="faqHeading-3">

                        <button type="button" class="accordion-button hover-effect-underline collapsed"
                            data-bs-toggle="collapse" data-bs-target="#faqCollapse-3">

                            <span class="me-2">
                                Apakah saya harus membuat akun untuk berbelanja?
                            </span>
                        </button>
                    </h3>

                    <div class="accordion-collapse collapse" id="faqCollapse-3" data-bs-parent="#faq">

                        <div class="accordion-body">
                            Anda dapat berbelanja sebagai tamu, namun membuat akun
                            memudahkan proses pelacakan pesanan dan riwayat transaksi.
                        </div>
                    </div>
                </div>

                <!-- Question -->
                <div class="accordion-item">
                    <h3 class="accordion-header" id="faqHeading-4">

                        <button type="button" class="accordion-button hover-effect-underline collapsed"
                            data-bs-toggle="collapse" data-bs-target="#faqCollapse-4">

                            <span class="me-2">
                                Bagaimana cara melacak pesanan?
                            </span>
                        </button>
                    </h3>

                    <div class="accordion-collapse collapse" id="faqCollapse-4" data-bs-parent="#faq">

                        <div class="accordion-body">
                            Setelah pesanan dikirim, pelanggan dapat melihat status
                            pengiriman melalui halaman riwayat transaksi atau nomor resi.
                        </div>
                    </div>
                </div>

                <!-- Question -->
                <div class="accordion-item">
                    <h3 class="accordion-header" id="faqHeading-5">

                        <button type="button" class="accordion-button hover-effect-underline collapsed"
                            data-bs-toggle="collapse" data-bs-target="#faqCollapse-5">

                            <span class="me-2">
                                Apakah produk di KainKita berasal dari UMKM lokal?
                            </span>
                        </button>
                    </h3>

                    <div class="accordion-collapse collapse" id="faqCollapse-5" data-bs-parent="#faq">

                        <div class="accordion-body">
                            Ya, KainKita berfokus mendukung UMKM fashion lokal Indonesia
                            dengan menghadirkan produk kain tradisional dan fashion pilihan.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Instagram feed -->
<section class="container pt-5 mt-2 mt-sm-3 mt-lg-4 mt-xl-5">

    <div class="text-center pt-xxl-3 pb-2 pb-md-3">

        <h2 class="pb-2 mb-1">

            <span class="animate-underline">
                <a class="animate-target text-dark-emphasis text-decoration-none" href="#!">
                    #KainKita
                </a>
            </span>
        </h2>

        <p>
            Temukan inspirasi fashion lokal Indonesia melalui media sosial kami
        </p>
    </div>

    <div class="overflow-x-auto pb-3 mb-n3" data-simplebar="">

        <div class="d-flex gap-2 gap-md-3 gap-lg-4" style="min-width: 700px">

            <a class="hover-effect-scale hover-effect-opacity position-relative w-100 overflow-hidden" href="#!">
                <span
                    class="hover-effect-target position-absolute top-0 start-0 w-100 h-100 bg-black bg-opacity-25 opacity-0 z-1"></span>
                <i
                    class="ci-instagram hover-effect-target fs-4 text-white position-absolute top-50 start-50 translate-middle opacity-0 z-2"></i>

                <div class="hover-effect-target ratio ratio-1x1 kk-social-icon-card">
                    <div class="kk-social-mini-icon one">
                        <i class="fa-solid fa-shirt"></i>
                    </div>
                    <div class="kk-social-mini-icon two">
                        <i class="fa-solid fa-tags"></i>
                    </div>
                    <div class="kk-social-mini-icon three">
                        <i class="fa-solid fa-palette"></i>
                    </div>
                    <div class="kk-social-main-icon">
                        <i class="fa-solid fa-vest-patches"></i>
                    </div>
                </div>
            </a>

            <a class="hover-effect-scale hover-effect-opacity position-relative w-100 overflow-hidden" href="#!">
                <span
                    class="hover-effect-target position-absolute top-0 start-0 w-100 h-100 bg-black bg-opacity-25 opacity-0 z-1"></span>
                <i
                    class="ci-instagram hover-effect-target fs-4 text-white position-absolute top-50 start-50 translate-middle opacity-0 z-2"></i>

                <div class="hover-effect-target ratio ratio-1x1 kk-social-icon-card">
                    <div class="kk-social-mini-icon one">
                        <i class="fa-solid fa-store"></i>
                    </div>
                    <div class="kk-social-mini-icon two">
                        <i class="fa-solid fa-hand-holding-heart"></i>
                    </div>
                    <div class="kk-social-mini-icon four">
                        <i class="fa-solid fa-bag-shopping"></i>
                    </div>
                    <div class="kk-social-main-icon">
                        <i class="fa-solid fa-shop"></i>
                    </div>
                </div>
            </a>

            <a class="hover-effect-scale hover-effect-opacity position-relative w-100 overflow-hidden" href="#!">
                <span
                    class="hover-effect-target position-absolute top-0 start-0 w-100 h-100 bg-black bg-opacity-25 opacity-0 z-1"></span>
                <i
                    class="ci-instagram hover-effect-target fs-4 text-white position-absolute top-50 start-50 translate-middle opacity-0 z-2"></i>

                <div class="hover-effect-target ratio ratio-1x1 kk-social-icon-card">
                    <div class="kk-social-mini-icon one">
                        <i class="fa-solid fa-scroll"></i>
                    </div>
                    <div class="kk-social-mini-icon two">
                        <i class="fa-solid fa-landmark"></i>
                    </div>
                    <div class="kk-social-mini-icon three">
                        <i class="fa-solid fa-leaf"></i>
                    </div>
                    <div class="kk-social-main-icon">
                        <i class="fa-solid fa-feather"></i>
                    </div>
                </div>
            </a>

            <a class="hover-effect-scale hover-effect-opacity position-relative w-100 overflow-hidden" href="#!">
                <span
                    class="hover-effect-target position-absolute top-0 start-0 w-100 h-100 bg-black bg-opacity-25 opacity-0 z-1"></span>
                <i
                    class="ci-instagram hover-effect-target fs-4 text-white position-absolute top-50 start-50 translate-middle opacity-0 z-2"></i>

                <div class="hover-effect-target ratio ratio-1x1 kk-social-icon-card">
                    <div class="kk-social-mini-icon one">
                        <i class="fa-solid fa-wand-magic-sparkles"></i>
                    </div>
                    <div class="kk-social-mini-icon two">
                        <i class="fa-solid fa-palette"></i>
                    </div>
                    <div class="kk-social-mini-icon four">
                        <i class="fa-solid fa-shirt"></i>
                    </div>
                    <div class="kk-social-main-icon">
                        <i class="fa-solid fa-rug"></i>
                    </div>
                </div>
            </a>

            <a class="hover-effect-scale hover-effect-opacity position-relative w-100 overflow-hidden" href="#!">
                <span
                    class="hover-effect-target position-absolute top-0 start-0 w-100 h-100 bg-black bg-opacity-25 opacity-0 z-1"></span>
                <i
                    class="ci-instagram hover-effect-target fs-4 text-white position-absolute top-50 start-50 translate-middle opacity-0 z-2"></i>

                <div class="hover-effect-target ratio ratio-1x1 kk-social-icon-card">
                    <div class="kk-social-mini-icon one">
                        <i class="fa-solid fa-truck-fast"></i>
                    </div>
                    <div class="kk-social-mini-icon two">
                        <i class="fa-solid fa-box-open"></i>
                    </div>
                    <div class="kk-social-mini-icon three">
                        <i class="fa-solid fa-bag-shopping"></i>
                    </div>
                    <div class="kk-social-main-icon">
                        <i class="fa-solid fa-gift"></i>
                    </div>
                </div>
            </a>
        </div>
    </div>
</section>

<?= $this->endSection() ?>

<?= $this->section('js') ?>
<?= $this->endSection() ?>