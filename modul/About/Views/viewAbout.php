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

<!-- Hero -->
<section class="container">
    <div class="row">

        <!-- Cover image -->
        <div class="col-md-7 order-md-2 mb-4 mb-md-0">
            <div class="position-relative h-100">
                <div class="ratio ratio-16x9"></div>
                <img src="assets/img/about/v1/hero.jpg"
                    class="position-absolute top-0 start-0 w-100 h-100 object-fit-cover rounded-5" alt="KainKita">
            </div>
        </div>

        <!-- Text + button -->
        <div class="col-md-5 order-md-1">
            <div class="position-relative py-5 px-4 px-sm-5">
                <span class="position-absolute top-0 start-0 w-100 h-100 rounded-5 d-none-dark rtl-flip"
                    style="background: linear-gradient(-90deg, #f7e7ce 0%, #fff8f0 100%)"></span>

                <span class="position-absolute top-0 start-0 w-100 h-100 rounded-5 d-none d-block-dark rtl-flip"
                    style="background: linear-gradient(-90deg, #2b2118 0%, #1e1a17 100%)"></span>

                <div class="position-relative z-1 py-md-2 py-lg-4 py-xl-5 px-xl-2 px-xxl-4 my-xxl-3">
                    <h1 class="pb-1 pb-md-2 pb-lg-3">
                        KainKita — Fashion Lokal dengan Sentuhan Budaya Indonesia
                    </h1>

                    <p class="text-dark-emphasis pb-sm-2 pb-lg-0 mb-4 mb-lg-5">
                        KainKita merupakan platform e-commerce fashion lokal berbasis web yang menghadirkan
                        berbagai produk berbahan kain tradisional Indonesia seperti batik dan fashion UMKM
                        pilihan dalam satu pengalaman belanja yang modern, mudah, dan terintegrasi.
                    </p>

                    <a class="btn btn-lg btn-outline-dark animate-slide-down" href="#mission">
                        Tentang Kami
                        <i class="ci-arrow-down fs-lg animate-target ms-2 me-n1"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Stats -->
<section class="container py-5 mt-md-2 mt-lg-4">
    <div class="row row-cols-2 row-cols-md-4 g-4">

        <div class="col text-center">
            <div class="display-4 text-dark-emphasis mb-2">100+</div>
            <p class="fs-sm mb-0">produk fashion lokal tersedia</p>
        </div>

        <div class="col text-center">
            <div class="display-4 text-dark-emphasis mb-2">50+</div>
            <p class="fs-sm mb-0">UMKM fashion lokal didukung</p>
        </div>

        <div class="col text-center">
            <div class="display-4 text-dark-emphasis mb-2">1000+</div>
            <p class="fs-sm mb-0">pelanggan menjelajahi produk kami</p>
        </div>

        <div class="col text-center">
            <div class="display-4 text-dark-emphasis mb-2">90%</div>
            <p class="fs-sm mb-0">pelanggan puas dengan pengalaman belanja</p>
        </div>
    </div>
</section>


<!-- Mission -->
<section class="container pt-3 pt-sm-4 pt-lg-5 mt-lg-2 mt-xl-4 mt-xxl-5" id="mission" style="scroll-margin-top: 60px">

    <div class="text-center mx-auto" style="max-width: 760px">

        <h2 class="text-body fs-sm fw-normal">Misi KainKita</h2>

        <h3 class="h1 pb-2 pb-md-3 mx-auto" style="max-width: 520px">
            Membantu UMKM Fashion Lokal Tumbuh di Era Digital
        </h3>

        <p class="fs-xl pb-2 pb-md-3 pb-lg-4">
            “Kami percaya bahwa kain tradisional Indonesia bukan hanya sekadar produk fashion,
            tetapi juga bagian dari identitas budaya bangsa. Melalui KainKita, kami ingin
            menghadirkan platform digital yang membantu UMKM lokal memperluas jangkauan pasar,
            meningkatkan efisiensi penjualan, dan memperkenalkan keindahan fashion tradisional
            Indonesia kepada masyarakat yang lebih luas.”
        </p>

        <img src="assets/img/about/v1/avatar.jpg" width="64" class="d-block rounded-circle mx-auto mb-3" alt="KainKita">

        <h6 class="mb-0">Tim KainKita</h6>
    </div>
</section>


<!-- Principles -->
<section class="container pt-5">
    <div class="row pt-2 pt-sm-3 pt-md-4 pt-lg-5">

        <div class="col-md-5 col-lg-6 pb-1 pb-sm-2 pb-md-0 mb-4 mb-md-0">
            <div class="ratio ratio-1x1">
                <img src="assets/img/about/v1/delivery.jpg" class="rounded-5" alt="KainKita">
            </div>
        </div>

        <div class="col-md-7 col-lg-6 pt-md-3 pt-xl-4 pt-xxl-5">
            <div class="ps-md-3 ps-lg-4 ps-xl-5 ms-xxl-4">

                <h2 class="text-body fs-sm fw-normal">Nilai Utama</h2>

                <h3 class="h1 pb-1 pb-sm-2 pb-lg-3">
                    Prinsip yang Menjadi Dasar Pengembangan KainKita
                </h3>

                <p class="pb-xl-3">
                    KainKita hadir sebagai platform fashion lokal yang menghubungkan pelanggan
                    dengan produk-produk kain tradisional Indonesia dalam satu sistem terintegrasi.
                    Kami berkomitmen memberikan pengalaman belanja yang nyaman sekaligus mendukung
                    pertumbuhan UMKM fashion lokal secara berkelanjutan.
                </p>

                <!-- Accordion -->
                <div class="accordion accordion-alt-icon" id="principles">

                    <!-- Item -->
                    <div class="accordion-item">
                        <h3 class="accordion-header" id="headingCulture">
                            <button type="button" class="accordion-button animate-underline collapsed"
                                data-bs-toggle="collapse" data-bs-target="#culture" aria-expanded="false"
                                aria-controls="culture">

                                <span class="animate-target me-2">
                                    Melestarikan budaya lokal
                                </span>
                            </button>
                        </h3>

                        <div class="accordion-collapse collapse" id="culture" aria-labelledby="headingCulture"
                            data-bs-parent="#principles">

                            <div class="accordion-body">
                                Kami ingin membantu memperkenalkan kain tradisional Indonesia
                                kepada generasi modern melalui platform digital yang lebih mudah diakses.
                            </div>
                        </div>
                    </div>

                    <!-- Item -->
                    <div class="accordion-item">
                        <h3 class="accordion-header" id="headingUmkm">
                            <button type="button" class="accordion-button animate-underline collapsed"
                                data-bs-toggle="collapse" data-bs-target="#umkm" aria-expanded="false"
                                aria-controls="umkm">

                                <span class="animate-target me-2">
                                    Mendukung UMKM lokal
                                </span>
                            </button>
                        </h3>

                        <div class="accordion-collapse collapse" id="umkm" aria-labelledby="headingUmkm"
                            data-bs-parent="#principles">

                            <div class="accordion-body">
                                KainKita membantu UMKM fashion lokal memperluas pemasaran
                                dan meningkatkan penjualan melalui teknologi berbasis web.
                            </div>
                        </div>
                    </div>

                    <!-- Item -->
                    <div class="accordion-item">
                        <h3 class="accordion-header" id="headingExperience">
                            <button type="button" class="accordion-button animate-underline collapsed"
                                data-bs-toggle="collapse" data-bs-target="#experience" aria-expanded="false"
                                aria-controls="experience">

                                <span class="animate-target me-2">
                                    Pengalaman belanja modern
                                </span>
                            </button>
                        </h3>

                        <div class="accordion-collapse collapse" id="experience" aria-labelledby="headingExperience"
                            data-bs-parent="#principles">

                            <div class="accordion-body">
                                Kami menghadirkan sistem belanja online yang mudah, terpusat,
                                cepat, dan nyaman agar pelanggan dapat menikmati produk fashion lokal
                                dengan pengalaman digital yang lebih baik.
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<!-- Values (Carousel of icon boxes) -->
<section class="container-start pt-5">
    <div class="row align-items-center g-0 pt-2 pt-sm-3 pt-md-4 pt-lg-5">

        <div class="col-md-4 col-lg-3 pb-1 pb-md-0 pe-3 ps-md-0 mb-4 mb-md-0">
            <div class="d-flex flex-md-column align-items-end align-items-md-start">

                <div class="mb-md-5 me-3 me-md-0">
                    <h2 class="text-body fs-sm fw-normal">Nilai KainKita</h2>
                    <h3 class="h1 mb-0">
                        Nilai sederhana untuk mendukung fashion lokal Indonesia
                    </h3>
                </div>

                <!-- External slider prev/next buttons -->
                <div class="d-flex gap-2">
                    <button type="button" id="prev-values"
                        class="btn btn-icon btn-outline-secondary rounded-circle animate-slide-start me-1"
                        aria-label="Prev">

                        <i class="ci-chevron-left fs-xl animate-target"></i>
                    </button>

                    <button type="button" id="next-values"
                        class="btn btn-icon btn-outline-secondary rounded-circle animate-slide-end" aria-label="Next">

                        <i class="ci-chevron-right fs-xl animate-target"></i>
                    </button>
                </div>
            </div>
        </div>

        <div class="col-md-8 col-lg-9">
            <div class="ps-md-4 ps-lg-5">

                <div class="swiper" data-swiper="{
                    &quot;slidesPerView&quot;: &quot;auto&quot;,
                    &quot;spaceBetween&quot;: 24,
                    &quot;loop&quot;: true,
                    &quot;navigation&quot;: {
                      &quot;prevEl&quot;: &quot;#prev-values&quot;,
                      &quot;nextEl&quot;: &quot;#next-values&quot;
                    }
                }">

                    <div class="swiper-wrapper">

                        <!-- Item -->
                        <div class="swiper-slide w-auto h-auto">
                            <div class="card h-100 rounded-4 px-3" style="max-width: 306px">
                                <div class="card-body py-5 px-3">

                                    <div class="h4 h5 d-flex align-items-center">
                                        <i class="ci-heart fs-4 me-3"></i>
                                        Budaya Lokal
                                    </div>

                                    <p class="mb-0">
                                        Kami percaya bahwa kain tradisional Indonesia memiliki nilai budaya
                                        yang harus terus diperkenalkan dan dilestarikan melalui fashion modern.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Item -->
                        <div class="swiper-slide w-auto h-auto">
                            <div class="card h-100 rounded-4 px-3" style="max-width: 306px">
                                <div class="card-body py-5 px-3">

                                    <div class="h4 h5 d-flex align-items-center">
                                        <i class="ci-store fs-4 me-3"></i>
                                        Dukungan UMKM
                                    </div>

                                    <p class="mb-0">
                                        KainKita hadir untuk membantu UMKM fashion lokal memperluas pasar,
                                        meningkatkan penjualan, dan berkembang di era digital.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Item -->
                        <div class="swiper-slide w-auto h-auto">
                            <div class="card h-100 rounded-4 px-3" style="max-width: 306px">
                                <div class="card-body py-5 px-3">

                                    <div class="h4 h5 d-flex align-items-center">
                                        <i class="ci-shopping-bag fs-4 me-3"></i>
                                        Pengalaman Belanja
                                    </div>

                                    <p class="mb-0">
                                        Kami menghadirkan pengalaman belanja online yang mudah, nyaman,
                                        cepat, dan terpusat dalam satu platform terintegrasi.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Item -->
                        <div class="swiper-slide w-auto h-auto">
                            <div class="card h-100 rounded-4 px-3" style="max-width: 306px">
                                <div class="card-body py-5 px-3">

                                    <div class="h4 h5 d-flex align-items-center">
                                        <i class="ci-verified-user fs-4 me-3"></i>
                                        Kualitas Produk
                                    </div>

                                    <p class="mb-0">
                                        Setiap produk yang tersedia di KainKita dikurasi agar pelanggan
                                        mendapatkan produk fashion lokal yang berkualitas dan terpercaya.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Item -->
                        <div class="swiper-slide w-auto h-auto">
                            <div class="card h-100 rounded-4 px-3" style="max-width: 306px">
                                <div class="card-body py-5 px-3">

                                    <div class="h4 h5 d-flex align-items-center">
                                        <i class="ci-rocket fs-4 me-3"></i>
                                        Inovasi Digital
                                    </div>

                                    <p class="mb-0">
                                        Kami memanfaatkan teknologi berbasis web untuk membantu proses
                                        pemasaran dan transaksi fashion lokal menjadi lebih modern dan efisien.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Item -->
                        <div class="swiper-slide w-auto h-auto">
                            <div class="card h-100 rounded-4 px-3" style="max-width: 306px">
                                <div class="card-body py-5 px-3">

                                    <div class="h4 h5 d-flex align-items-center">
                                        <i class="ci-leaf fs-4 me-3"></i>
                                        Keberlanjutan
                                    </div>

                                    <p class="mb-0">
                                        Kami mendukung pertumbuhan fashion lokal Indonesia secara berkelanjutan
                                        dengan membantu UMKM terus berkembang melalui digitalisasi.
                                    </p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Video + About -->
<section class="container pt-5 mt-2 mt-sm-3 mt-md-4 mt-lg-5">
    <div class="row row-cols-1 row-cols-md-2 g-4">

        <!-- Video -->
        <div class="col">
            <div class="position-relative h-100">

                <div class="ratio ratio-16x9"></div>

                <img src="assets/img/about/v1/video-cover.jpg"
                    class="position-absolute top-0 start-0 w-100 h-100 object-fit-cover rounded-5" alt="KainKita">

                <div class="position-absolute start-0 bottom-0 d-flex align-items-end w-100 h-100 z-2 p-4">

                    <a class="btn btn-lg btn-light rounded-pill m-md-2"
                        href="https://www.youtube.com/watch?v=Sqqj_14wBxU" data-glightbox="">

                        <i class="ci-play fs-lg ms-n1 me-2"></i>
                        Lihat Video
                    </a>
                </div>
            </div>
        </div>

        <!-- About -->
        <div class="col">
            <div class="bg-body-tertiary rounded-5 py-5 px-4 px-sm-5">

                <div class="py-md-3 py-lg-4 py-xl-5 px-lg-4 px-xl-5 my-lg-2 my-xl-4 my-xxl-5">

                    <h2 class="h3 pb-sm-1 pb-lg-2">
                        KainKita sebagai media promosi budaya dan fashion lokal
                    </h2>

                    <p class="pb-sm-2 pb-lg-0 mb-4 mb-lg-5">
                        KainKita tidak hanya menjadi platform penjualan fashion lokal,
                        tetapi juga menjadi media digital untuk memperkenalkan nilai budaya,
                        kreativitas UMKM, dan identitas fashion Indonesia kepada masyarakat
                        yang lebih luas melalui teknologi berbasis web.
                    </p>

                    <a class="btn btn-lg btn-outline-dark" href="#!">
                        Pelajari lebih lanjut
                    </a>
                </div>
            </div>
        </div>

    </div>
</section>
<!-- Open positions / Collaboration -->
<section class="container py-5 mt-2 mb-1 my-sm-3 my-md-4 my-lg-5">

    <div class="d-flex align-items-end justify-content-between pb-3 mb-1 mb-md-3">

        <div class="me-4">
            <h2 class="text-body fs-sm fw-normal">Kolaborasi</h2>
            <h3 class="h1 mb-0">Bidang yang mendukung pengembangan KainKita</h3>
        </div>

        <!-- External slider prev/next buttons -->
        <div class="d-flex justify-content-center justify-content-md-start gap-2">

            <button type="button" id="prev-positions"
                class="btn btn-icon btn-outline-secondary rounded-circle animate-slide-start me-1" aria-label="Prev">

                <i class="ci-chevron-left fs-xl animate-target"></i>
            </button>

            <button type="button" id="next-positions"
                class="btn btn-icon btn-outline-secondary rounded-circle animate-slide-end" aria-label="Next">

                <i class="ci-chevron-right fs-xl animate-target"></i>
            </button>
        </div>
    </div>

    <!-- Slider -->
    <div class="swiper" data-swiper="{
        &quot;slidesPerView&quot;: 1,
        &quot;spaceBetween&quot;: 24,
        &quot;loop&quot;: true,
        &quot;navigation&quot;: {
            &quot;prevEl&quot;: &quot;#prev-positions&quot;,
            &quot;nextEl&quot;: &quot;#next-positions&quot;
        },
        &quot;breakpoints&quot;: {
            &quot;500&quot;: {
                &quot;slidesPerView&quot;: 2
            },
            &quot;800&quot;: {
                &quot;slidesPerView&quot;: 3
            },
            &quot;1080&quot;: {
                &quot;slidesPerView&quot;: 4
            }
        }
    }">

        <div class="swiper-wrapper py-2">

            <!-- Item -->
            <div class="swiper-slide h-auto">
                <a class="card btn btn-outline-secondary w-100 h-100 align-items-start text-wrap text-start rounded-4 px-0 px-xl-2 py-4 py-xl-5"
                    href="#!">

                    <div class="card-body pb-0 pt-3 pt-xl-0">

                        <span class="badge bg-info fs-xs rounded-pill">
                            Fashion Lokal
                        </span>

                        <h4 class="h5 py-3 my-2 my-xl-3">
                            Produk kain tradisional Indonesia
                        </h4>
                    </div>

                    <div class="card-footer w-100 bg-transparent border-0 text-body fs-sm fw-normal pt-0 pb-3 pb-xl-0">
                        Batik • Tenun • Fashion UMKM
                    </div>
                </a>
            </div>

            <!-- Item -->
            <div class="swiper-slide h-auto">
                <a class="card btn btn-outline-secondary w-100 h-100 align-items-start text-wrap text-start rounded-4 px-0 px-xl-2 py-4 py-xl-5"
                    href="#!">

                    <div class="card-body pb-0 pt-3 pt-xl-0">

                        <span class="badge bg-success fs-xs rounded-pill">
                            Digitalisasi
                        </span>

                        <h4 class="h5 py-3 my-2 my-xl-3">
                            Sistem penjualan berbasis web modern
                        </h4>
                    </div>

                    <div class="card-footer w-100 bg-transparent border-0 text-body fs-sm fw-normal pt-0 pb-3 pb-xl-0">
                        E-commerce • Online Store
                    </div>
                </a>
            </div>

            <!-- Item -->
            <div class="swiper-slide h-auto">
                <a class="card btn btn-outline-secondary w-100 h-100 align-items-start text-wrap text-start rounded-4 px-0 px-xl-2 py-4 py-xl-5"
                    href="#!">

                    <div class="card-body pb-0 pt-3 pt-xl-0">

                        <span class="badge bg-warning fs-xs rounded-pill">
                            UMKM
                        </span>

                        <h4 class="h5 py-3 my-2 my-xl-3">
                            Dukungan pemasaran produk lokal
                        </h4>
                    </div>

                    <div class="card-footer w-100 bg-transparent border-0 text-body fs-sm fw-normal pt-0 pb-3 pb-xl-0">
                        Promosi • Branding • Penjualan
                    </div>
                </a>
            </div>

            <!-- Item -->
            <div class="swiper-slide h-auto">
                <a class="card btn btn-outline-secondary w-100 h-100 align-items-start text-wrap text-start rounded-4 px-0 px-xl-2 py-4 py-xl-5"
                    href="#!">

                    <div class="card-body pb-0 pt-3 pt-xl-0">

                        <span class="badge bg-danger fs-xs rounded-pill">
                            Budaya
                        </span>

                        <h4 class="h5 py-3 my-2 my-xl-3">
                            Pelestarian identitas fashion Indonesia
                        </h4>
                    </div>

                    <div class="card-footer w-100 bg-transparent border-0 text-body fs-sm fw-normal pt-0 pb-3 pb-xl-0">
                        Kearifan Lokal • Tradisional
                    </div>
                </a>
            </div>

            <!-- Item -->
            <div class="swiper-slide h-auto">
                <a class="card btn btn-outline-secondary w-100 h-100 align-items-start text-wrap text-start rounded-4 px-0 px-xl-2 py-4 py-xl-5"
                    href="#!">

                    <div class="card-body pb-0 pt-3 pt-xl-0">

                        <span class="badge bg-primary fs-xs rounded-pill">
                            Teknologi
                        </span>

                        <h4 class="h5 py-3 my-2 my-xl-3">
                            Pengalaman belanja yang mudah dan terintegrasi
                        </h4>
                    </div>

                    <div class="card-footer w-100 bg-transparent border-0 text-body fs-sm fw-normal pt-0 pb-3 pb-xl-0">
                        Responsive • User Friendly
                    </div>
                </a>
            </div>

        </div>
    </div>
</section>


<!-- Newsletter + Content -->
<section class="bg-body-tertiary py-5">

    <div class="container pt-sm-2 pt-md-3 pt-lg-4 pt-xl-5">

        <div class="row">

            <!-- Newsletter -->
            <div class="col-md-6 col-lg-5 mb-5 mb-md-0">

                <h2 class="h4 mb-2">
                    Bergabung bersama KainKita
                </h2>

                <p class="text-body pb-2 pb-ms-3">
                    Dapatkan informasi terbaru mengenai produk fashion lokal,
                    promo menarik, dan koleksi kain tradisional Indonesia.
                </p>

                <form class="d-flex needs-validation pb-1 pb-sm-2 pb-md-3 pb-lg-0 mb-4 mb-lg-5" novalidate="">

                    <div class="position-relative w-100 me-2">
                        <input type="email" class="form-control form-control-lg" placeholder="Masukkan email Anda"
                            required="">
                    </div>

                    <button type="submit" class="btn btn-lg btn-primary">
                        Subscribe
                    </button>
                </form>

                <!-- Social Media -->
                <div class="d-flex gap-3">

                    <a class="btn btn-icon btn-secondary rounded-circle" href="#!" aria-label="Instagram">

                        <i class="ci-instagram fs-base"></i>
                    </a>

                    <a class="btn btn-icon btn-secondary rounded-circle" href="#!" aria-label="Facebook">

                        <i class="ci-facebook fs-base"></i>
                    </a>

                    <a class="btn btn-icon btn-secondary rounded-circle" href="#!" aria-label="YouTube">

                        <i class="ci-youtube fs-base"></i>
                    </a>

                    <a class="btn btn-icon btn-secondary rounded-circle" href="#!" aria-label="TikTok">

                        <i class="ci-brand-tiktok fs-base"></i>
                    </a>
                </div>
            </div>

            <!-- Content -->
            <div class="col-md-6 col-lg-5 col-xl-4 offset-lg-1 offset-xl-2">

                <ul class="list-unstyled d-flex flex-column gap-4 ps-md-4 ps-lg-0 mb-3">

                    <!-- Item -->
                    <li class="nav flex-nowrap align-items-center position-relative">

                        <img src="assets/img/home/electronics/vlog/01.jpg" class="rounded" width="140" alt="KainKita">

                        <div class="ps-3">

                            <div class="fs-xs text-body-secondary lh-sm mb-2">
                                Artikel
                            </div>

                            <a class="nav-link fs-sm hover-effect-underline stretched-link p-0" href="#!">

                                Mengenal batik sebagai identitas budaya Indonesia
                            </a>
                        </div>
                    </li>

                    <!-- Item -->
                    <li class="nav flex-nowrap align-items-center position-relative">

                        <img src="assets/img/home/electronics/vlog/02.jpg" class="rounded" width="140" alt="KainKita">

                        <div class="ps-3">

                            <div class="fs-xs text-body-secondary lh-sm mb-2">
                                UMKM
                            </div>

                            <a class="nav-link fs-sm hover-effect-underline stretched-link p-0" href="#!">

                                Peran digitalisasi dalam membantu perkembangan fashion lokal
                            </a>
                        </div>
                    </li>

                    <!-- Item -->
                    <li class="nav flex-nowrap align-items-center position-relative">

                        <img src="assets/img/home/electronics/vlog/03.jpg" class="rounded" width="140" alt="KainKita">

                        <div class="ps-3">

                            <div class="fs-xs text-body-secondary lh-sm mb-2">
                                Fashion
                            </div>

                            <a class="nav-link fs-sm hover-effect-underline stretched-link p-0" href="#!">

                                Inspirasi outfit modern dengan sentuhan kain tradisional
                            </a>
                        </div>
                    </li>

                </ul>

                <div class="nav ps-md-4 ps-lg-0">

                    <a class="btn nav-link animate-underline text-decoration-none px-0" href="#!">

                        <span class="animate-target">
                            Lihat semua artikel
                        </span>

                        <i class="ci-chevron-right fs-base ms-1"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>

<?= $this->section('js') ?>
<?= $this->endSection() ?>