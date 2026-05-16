<?= $this->extend('layout/template'); ?>
<?= $this->section('css') ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<!-- Breadcrumb -->
<nav class="container pt-3 my-3 my-md-4" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="home-electronics.html">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">About</li>
    </ol>
</nav>

<!-- Page title -->
<section class="position-relative bg-body-tertiary py-4">

    <img src="assets/img/contact/title-bg.png"
        class="position-absolute top-0 start-0 w-100 h-100 object-fit-cover rtl-flip" alt="Background image">

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


<!-- Map -->
<section class="position-relative bg-body-tertiary">

    <a class="position-absolute top-50 start-50 translate-middle z-2 mt-lg-n4" href="#!" style="width: 50px"
        data-bs-toggle="popover" data-bs-placement="top" data-bs-trigger="hover" data-bs-content="Lihat lokasi"
        aria-label="Toggle map">

        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 42.5 54.6">
            <path
                d="M42.5 19.2C42.5 8.1 33.2-.7 22 0 12.4.7 4.7 8.5 4.2 18c-.2 2.7.3 5.3 1.1 7.7h0s3.4 10.4 17.4 25c.4.4 1 .4 1.4 0 13.6-13.3 17.4-25 17.4-25h0c.6-2 1-4.2 1-6.5z"
                fill="#ffffff"></path>

            <g fill="#222934">
                <path
                    d="M20.4 31.8c-4.5 0-8.1-3.6-8.1-8.1s3.6-8.1 8.1-8.1 8.1 3.6 8.1 8.1-3.7 8.1-8.1 8.1zm0-14.2a6.06 6.06 0 0 0-6.1 6.1 6.06 6.06 0 0 0 6.1 6.1c3.3 0 6.1-2.7 6.1-6.1s-2.8-6.1-6.1-6.1z">
                </path>

                <circle cx="20.4" cy="23.7" r="3"></circle>
            </g>
        </svg>
    </a>

    <img src="assets/img/contact/map.jpg" class="position-absolute top-0 start-0 w-100 h-100 object-fit-cover"
        alt="Map">

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

                <div class="hover-effect-target ratio ratio-1x1">
                    <img src="assets/img/instagram/01.jpg" alt="Instagram image">
                </div>
            </a>

            <a class="hover-effect-scale hover-effect-opacity position-relative w-100 overflow-hidden" href="#!">
                <span
                    class="hover-effect-target position-absolute top-0 start-0 w-100 h-100 bg-black bg-opacity-25 opacity-0 z-1"></span>
                <i
                    class="ci-instagram hover-effect-target fs-4 text-white position-absolute top-50 start-50 translate-middle opacity-0 z-2"></i>

                <div class="hover-effect-target ratio ratio-1x1">
                    <img src="assets/img/instagram/02.jpg" alt="Instagram image">
                </div>
            </a>

            <a class="hover-effect-scale hover-effect-opacity position-relative w-100 overflow-hidden" href="#!">
                <span
                    class="hover-effect-target position-absolute top-0 start-0 w-100 h-100 bg-black bg-opacity-25 opacity-0 z-1"></span>
                <i
                    class="ci-instagram hover-effect-target fs-4 text-white position-absolute top-50 start-50 translate-middle opacity-0 z-2"></i>

                <div class="hover-effect-target ratio ratio-1x1">
                    <img src="assets/img/instagram/03.jpg" alt="Instagram image">
                </div>
            </a>

            <a class="hover-effect-scale hover-effect-opacity position-relative w-100 overflow-hidden" href="#!">
                <span
                    class="hover-effect-target position-absolute top-0 start-0 w-100 h-100 bg-black bg-opacity-25 opacity-0 z-1"></span>
                <i
                    class="ci-instagram hover-effect-target fs-4 text-white position-absolute top-50 start-50 translate-middle opacity-0 z-2"></i>

                <div class="hover-effect-target ratio ratio-1x1">
                    <img src="assets/img/instagram/04.jpg" alt="Instagram image">
                </div>
            </a>

            <a class="hover-effect-scale hover-effect-opacity position-relative w-100 overflow-hidden" href="#!">
                <span
                    class="hover-effect-target position-absolute top-0 start-0 w-100 h-100 bg-black bg-opacity-25 opacity-0 z-1"></span>
                <i
                    class="ci-instagram hover-effect-target fs-4 text-white position-absolute top-50 start-50 translate-middle opacity-0 z-2"></i>

                <div class="hover-effect-target ratio ratio-1x1">
                    <img src="assets/img/instagram/05.jpg" alt="Instagram image">
                </div>
            </a>
        </div>
    </div>
</section>

<?= $this->endSection() ?>

<?= $this->section('js') ?>
<?= $this->endSection() ?>