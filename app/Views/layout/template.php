<!DOCTYPE html>
<html lang="id" data-bs-theme="light" data-pwa="true">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>
    <meta charset="utf-8">

    <meta name="viewport"
        content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover">

    <title>Kainkita | Eccomerce Fashion Batik Lokal No. 1</title>
    <meta name="description" content="Kainkita - Toko E-Commerce Fashion Batik Lokal Kekinian">
    <meta name="keywords"
        content="toko online, e-commerce, toko batik, belanja batik, fashion lokal, baju batik, cart, checkout, ui kit, light and dark mode, bootstrap, html5, css3, javascript, gallery, slider, mobile, pwa">
    <meta name="author" content="Createx Studio">

    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <link rel="manifest" href="manifest.json">
    <link rel="icon" type="image/png" href="assets/app-icons/icon-32x32.png" sizes="32x32">
    <link rel="apple-touch-icon" href="assets/app-icons/icon-180x180.png">

    <script src="assets/js/theme-switcher.js"></script>

    <link rel="preload" href="assets/fonts/inter-variable-latin.woff2" as="font" type="font/woff2" crossorigin="">

    <link rel="preload" href="assets/icons/cartzilla-icons.woff2" as="font" type="font/woff2" crossorigin="">
    <link rel="stylesheet" href="assets/icons/cartzilla-icons.min.css">

    <link rel="stylesheet" href="assets/vendor/swiper/swiper-bundle.min.css">
    <link rel="stylesheet" href="assets/vendor/simplebar/simplebar.min.css">

    <link rel="preload" href="assets/css/theme.min.css" as="style">
    <link rel="preload" href="assets/css/theme.rtl.min.css" as="style">
    <link rel="stylesheet" href="assets/css/theme.min.css" id="theme-styles">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <script src="assets/js/customizer.min.js"></script>\
    <?= $this->renderSection('css'); ?>

</head>


<body>

    <div class="offcanvas offcanvas-end pb-sm-2 px-sm-2" id="shoppingCart" tabindex="-1"
        aria-labelledby="shoppingCartLabel" style="width: 500px">

        <div class="offcanvas-header flex-column align-items-start py-3 pt-lg-4">
            <div class="d-flex align-items-center justify-content-between w-100 mb-3 mb-lg-4">
                <h4 class="offcanvas-title" id="shoppingCartLabel">Isi Keranjangmu</h4>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <p class="fs-sm">Tambah belanja <span class="text-dark-emphasis fw-semibold">Rp 50.000</span> lagi biar
                dapet <span class="text-dark-emphasis fw-semibold">Gratis Ongkir</span> lho!</p>
            <div class="progress w-100" role="progressbar" aria-label="Free shipping progress" aria-valuenow="78"
                aria-valuemin="0" aria-valuemax="100" style="height: 4px">
                <div class="progress-bar bg-dark rounded-pill d-none-dark" style="width: 78%"></div>
                <div class="progress-bar bg-light rounded-pill d-none d-block-dark" style="width: 78%"></div>
            </div>
        </div>

        <div class="offcanvas-body d-flex flex-column gap-4 pt-2">

            <div class="d-flex align-items-center">
                <a class="flex-shrink-0" href="/katalog">
                    <img src="assets/img/shop/fashion/thumbs/07.png" class="bg-body-tertiary rounded" width="110"
                        alt="Thumbnail">
                </a>
                <div class="w-100 min-w-0 ps-3">
                    <h5 class="d-flex animate-underline mb-2">
                        <a class="d-block fs-sm fw-medium text-truncate animate-target"
                            href="/katalog">Sneakers Aksen Batik Kawung</a>
                    </h5>
                    <div class="h6 pb-1 mb-2">Rp 250.000</div>
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="count-input rounded-2">
                            <button type="button" class="btn btn-icon btn-sm" data-decrement=""
                                aria-label="Kurangi kuantitas">
                                <i class="ci-minus"></i>
                            </button>
                            <input type="number" class="form-control form-control-sm" value="1" readonly="">
                            <button type="button" class="btn btn-icon btn-sm" data-increment=""
                                aria-label="Tambah kuantitas">
                                <i class="ci-plus"></i>
                            </button>
                        </div>
                        <button type="button" class="btn-close fs-sm" data-bs-toggle="tooltip"
                            data-bs-custom-class="tooltip-sm" data-bs-title="Hapus"
                            aria-label="Hapus dari keranjang"></button>
                    </div>
                </div>
            </div>

            <div class="d-flex align-items-center">
                <a class="flex-shrink-0" href="/katalog">
                    <img src="assets/img/shop/fashion/thumbs/08.png" class="bg-body-tertiary rounded" width="110"
                        alt="Thumbnail">
                </a>
                <div class="w-100 min-w-0 ps-3">
                    <h5 class="d-flex animate-underline mb-2">
                        <a class="d-block fs-sm fw-medium text-truncate animate-target"
                            href="/katalog">Kemeja Batik Pria Klasik</a>
                    </h5>
                    <div class="h6 pb-1 mb-2">Rp 175.000</div>
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="count-input rounded-2">
                            <button type="button" class="btn btn-icon btn-sm" data-decrement=""
                                aria-label="Kurangi kuantitas">
                                <i class="ci-minus"></i>
                            </button>
                            <input type="number" class="form-control form-control-sm" value="1" readonly="">
                            <button type="button" class="btn btn-icon btn-sm" data-increment=""
                                aria-label="Tambah kuantitas">
                                <i class="ci-plus"></i>
                            </button>
                        </div>
                        <button type="button" class="btn-close fs-sm" data-bs-toggle="tooltip"
                            data-bs-custom-class="tooltip-sm" data-bs-title="Hapus"
                            aria-label="Hapus dari keranjang"></button>
                    </div>
                </div>
            </div>

            <div class="d-flex align-items-center">
                <a class="flex-shrink-0" href="/katalog">
                    <img src="assets/img/shop/fashion/thumbs/09.png" class="bg-body-tertiary rounded" width="110"
                        alt="Thumbnail">
                </a>
                <div class="w-100 min-w-0 ps-3">
                    <h5 class="d-flex animate-underline mb-2">
                        <a class="d-block fs-sm fw-medium text-truncate animate-target"
                            href="/katalog">Kacamata Hitam Kece</a>
                    </h5>
                    <div class="h6 pb-1 mb-2">Rp 99.000 <del class="text-body-tertiary fs-xs fw-normal">Rp 150.000</del>
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="count-input rounded-2">
                            <button type="button" class="btn btn-icon btn-sm" data-decrement=""
                                aria-label="Kurangi kuantitas">
                                <i class="ci-minus"></i>
                            </button>
                            <input type="number" class="form-control form-control-sm" value="1" readonly="">
                            <button type="button" class="btn btn-icon btn-sm" data-increment=""
                                aria-label="Tambah kuantitas">
                                <i class="ci-plus"></i>
                            </button>
                        </div>
                        <button type="button" class="btn-close fs-sm" data-bs-toggle="tooltip"
                            data-bs-custom-class="tooltip-sm" data-bs-title="Hapus"
                            aria-label="Hapus dari keranjang"></button>
                    </div>
                </div>
            </div>
        </div>

        <div class="offcanvas-header flex-column align-items-start">
            <div class="d-flex align-items-center justify-content-between w-100 mb-3 mb-md-4">
                <span class="text-light-emphasis">Total Belanjaan:</span>
                <span class="h6 mb-0">Rp 524.000</span>
            </div>
            <div class="d-flex w-100 gap-3">
                <a class="btn btn-lg btn-secondary w-100" href="#!">Cek Detail Keranjang</a>
                <a class="btn btn-lg btn-dark w-100" href="#!">Bayar Sekarang</a>
            </div>
        </div>
    </div>


    <div class="offcanvas offcanvas-top" id="searchBox" data-bs-backdrop="static" tabindex="-1">
        <div class="offcanvas-header border-bottom p-0 py-lg-1">
            <form class="container d-flex align-items-center">
                <input type="search" class="form-control form-control-lg fs-lg border-0 rounded-0 py-3 ps-0"
                    placeholder="Lagi nyari batik apa nih?" data-autofocus="offcanvas">
                <button type="reset" class="btn-close fs-lg" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </form>
        </div>
        <div class="offcanvas-body px-0">
            <div class="container text-center">
                <svg class="text-body-tertiary opacity-60 mb-4" xmlns="http://www.w3.org/2000/svg" width="60"
                    viewBox="0 0 512 512" fill="currentColor">
                    <path
                        d="M340.115,361.412l-16.98-16.98c-34.237,29.36-78.733,47.098-127.371,47.098C87.647,391.529,0,303.883,0,195.765S87.647,0,195.765,0s195.765,87.647,195.765,195.765c0,48.638-17.738,93.134-47.097,127.371l16.98,16.98l11.94-11.94c5.881-5.881,15.415-5.881,21.296,0l112.941,112.941c5.881,5.881,5.881,15.416,0,21.296l-45.176,45.176c-5.881,5.881-15.415,5.881-21.296,0L328.176,394.648c-5.881-5.881-5.881-15.416,0-21.296L340.115,361.412z M195.765,361.412c91.484,0,165.647-74.163,165.647-165.647S287.249,30.118,195.765,30.118S30.118,104.28,30.118,195.765S104.28,361.412,195.765,361.412z M360.12,384l91.645,91.645l23.88-23.88L384,360.12L360.12,384z M233.034,233.033c5.881-5.881,15.415-5.881,21.296,0c5.881,5.881,5.881,15.416,0,21.296c-32.345,32.345-84.786,32.345-117.131,0c-5.881-5.881-5.881-15.415,0-21.296c5.881-5.881,15.416-5.881,21.296,0C179.079,253.616,212.45,253.616,233.034,233.033zM135.529,180.706c-12.475,0-22.588-10.113-22.588-22.588c0-12.475,10.113-22.588,22.588-22.588c12.475,0,22.588,10.113,22.588,22.588C158.118,170.593,148.005,180.706,135.529,180.706z M256,180.706c-12.475,0-22.588-10.113-22.588-22.588c0-12.475,10.113-22.588,22.588-22.588s22.588,10.113,22.588,22.588C278.588,170.593,268.475,180.706,256,180.706z">
                    </path>
                </svg>
                <h6 class="mb-2">Hasil pencarianmu bakal nongol di sini</h6>
                <p class="fs-sm mb-0">Yuk, ketik kata kuncinya di atas buat ngeliat hasilnya langsung.</p>
            </div>
        </div>
    </div>


    <div class="alert alert-dismissible bg-dark text-white rounded-0 py-2 px-0 m-0 fade show" data-bs-theme="dark">
        <div class="container position-relative d-flex min-w-0">
            <div class="d-flex flex-nowrap align-items-center g-2 w-100 min-w-0 mx-auto mt-n1" style="max-width: 458px">
                <div class="nav me-2">
                    <button type="button" class="nav-link fs-lg p-0" id="topbarPrev" aria-label="Prev">
                        <i class="ci-chevron-left"></i>
                    </button>
                </div>
                <div class="swiper fs-sm text-white" data-swiper="{
            &quot;spaceBetween&quot;: 24,
            &quot;loop&quot;: true,
            &quot;autoplay&quot;: {
              &quot;delay&quot;: 5000,
              &quot;disableOnInteraction&quot;: false
            },
            &quot;navigation&quot;: {
              &quot;prevEl&quot;: &quot;#topbarPrev&quot;,
              &quot;nextEl&quot;: &quot;#topbarNext&quot;
            }
          }">
                    <div class="swiper-wrapper min-w-0">
                        <div class="swiper-slide text-truncate text-center">🎉 Gratis Ongkir belanja di atas Rp 250rb.
                            <span class="d-none d-sm-inline">Sikat diskonnya!</span></div>
                        <div class="swiper-slide text-truncate text-center">💰 Garansi uang kembali. <span
                                class="d-none d-sm-inline">Nggak pas? Balikin aja dalam 30 hari.</span></div>
                        <div class="swiper-slide text-truncate text-center">💪 CS asik siap bantu 24/7. <span
                                class="d-none d-sm-inline">Tenang, kita bantuin sampai beres!</span></div>
                    </div>
                </div>
                <div class="nav ms-2">
                    <button type="button" class="nav-link fs-lg p-0" id="topbarNext" aria-label="Next">
                        <i class="ci-chevron-right"></i>
                    </button>
                </div>
            </div>
            <button type="button" class="btn-close position-static flex-shrink-0 p-1 ms-3 ms-md-n4"
                data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>


    <header class="navbar navbar-expand-lg navbar-sticky bg-body d-block z-fixed p-0"
        data-sticky-navbar="{&quot;offset&quot;: 500}">
        <div class="container py-2 py-lg-3">
            <div class="d-flex align-items-center gap-3">

                <button type="button" class="navbar-toggler me-4 me-md-2" data-bs-toggle="offcanvas"
                    data-bs-target="#navbarNav" aria-controls="navbarNav" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="dropdown d-none d-md-block nav">
                    <a class="nav-link dropdown-toggle py-1 px-0" href="#" data-bs-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false" aria-label="Country select: IDN">
                        <div class="ratio ratio-1x1" style="width: 20px">
                            <img src="assets/img/flags/id.png" alt="IDN">
                        </div>
                    </a>
                    <ul class="dropdown-menu fs-sm" style="--cz-dropdown-spacer: .5rem">
                        <li>
                            <a class="dropdown-item" href="#!">
                                <img src="assets/img/flags/en-uk.png" class="flex-shrink-0 me-2" width="20"
                                    alt="Inggris">
                                Inggris
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#!">
                                <img src="assets/img/flags/en-us.png" class="flex-shrink-0 me-2" width="20"
                                    alt="Amerika">
                                Amerika
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="dropdown d-none d-md-block nav">
                    <a class="nav-link animate-underline dropdown-toggle fw-normal py-1 px-0" href="#"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="animate-target">Jakarta</span>
                    </a>
                    <ul class="dropdown-menu fs-sm" style="--cz-dropdown-spacer: .5rem">
                        <li><a class="dropdown-item" href="#!">Bandung</a></li>
                        <li><a class="dropdown-item" href="#!">Jogja</a></li>
                        <li><a class="dropdown-item" href="#!">Surabaya</a></li>
                        <li><a class="dropdown-item" href="#!">Bali</a></li>
                    </ul>
                </div>
            </div>

            <a class="navbar-brand fs-2 py-0 m-0 me-auto me-sm-n5" href="index.html">Kainkita</a>

            <div class="d-flex align-items-center">

                <button type="button" class="navbar-toggler d-none navbar-stuck-show me-3" data-bs-toggle="collapse"
                    data-bs-target="#stuckNav" aria-controls="stuckNav" aria-expanded="false"
                    aria-label="Toggle navigation in navbar stuck state">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="dropdown">
                    <button type="button"
                        class="theme-switcher btn btn-icon btn-lg btn-outline-secondary fs-lg border-0 rounded-circle animate-scale"
                        data-bs-toggle="dropdown" aria-expanded="false" aria-label="Toggle theme (light)">
                        <span class="theme-icon-active d-flex animate-target">
                            <i class="ci-sun"></i>
                        </span>
                    </button>
                    <ul class="dropdown-menu" style="--cz-dropdown-min-width: 9rem">
                        <li>
                            <button type="button" class="dropdown-item active" data-bs-theme-value="light"
                                aria-pressed="true">
                                <span class="theme-icon d-flex fs-base me-2">
                                    <i class="ci-sun"></i>
                                </span>
                                <span class="theme-label">Terang</span>
                                <i class="item-active-indicator ci-check ms-auto"></i>
                            </button>
                        </li>
                        <li>
                            <button type="button" class="dropdown-item" data-bs-theme-value="dark" aria-pressed="false">
                                <span class="theme-icon d-flex fs-base me-2">
                                    <i class="ci-moon"></i>
                                </span>
                                <span class="theme-label">Gelap</span>
                                <i class="item-active-indicator ci-check ms-auto"></i>
                            </button>
                        </li>
                        <li>
                            <button type="button" class="dropdown-item" data-bs-theme-value="auto" aria-pressed="false">
                                <span class="theme-icon d-flex fs-base me-2">
                                    <i class="ci-auto"></i>
                                </span>
                                <span class="theme-label">Auto</span>
                                <i class="item-active-indicator ci-check ms-auto"></i>
                            </button>
                        </li>
                    </ul>
                </div>

                <button type="button"
                    class="btn btn-icon btn-lg fs-xl btn-outline-secondary border-0 rounded-circle animate-shake d-lg-none"
                    data-bs-toggle="offcanvas" data-bs-target="#searchBox" aria-controls="searchBox"
                    aria-label="Toggle search bar">
                    <i class="ci-search animate-target"></i>
                </button>

                <a class="btn btn-icon btn-lg fs-lg btn-outline-secondary border-0 rounded-circle animate-shake d-none d-md-inline-flex"
                    href="/login">
                    <i class="ci-user animate-target"></i>
                    <span class="visually-hidden">Akun Saya</span>
                </a>

                <a class="btn btn-icon btn-lg fs-lg btn-outline-secondary border-0 rounded-circle animate-pulse d-none d-md-inline-flex"
                    href="#!">
                    <i class="ci-heart animate-target"></i>
                    <span class="visually-hidden">Barang Idaman</span>
                </a>

                <button type="button"
                    class="btn btn-icon btn-lg fs-xl btn-outline-secondary position-relative border-0 rounded-circle animate-scale"
                    data-bs-toggle="offcanvas" data-bs-target="#shoppingCart" aria-controls="shoppingCart"
                    aria-label="Shopping cart">
                    <span
                        class="position-absolute top-0 start-100 badge fs-xs text-bg-primary rounded-pill mt-1 ms-n4 z-2"
                        style="--cz-badge-padding-y: .25em; --cz-badge-padding-x: .42em">3</span>
                    <i class="ci-shopping-bag animate-target me-1"></i>
                </button>
            </div>
        </div>

        <div class="collapse navbar-stuck-hide" id="stuckNav">
            <nav class="offcanvas offcanvas-start" id="navbarNav" tabindex="-1" aria-labelledby="navbarNavLabel">
                <div class="offcanvas-header py-3">
                    <h5 class="offcanvas-title" id="navbarNavLabel">Jelajah Kainkita</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>

                <div class="offcanvas-header gap-3 d-md-none pt-0 pb-3">
                    <div class="dropdown nav">
                        <a class="nav-link dropdown-toggle py-1 px-0" href="#" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false" aria-label="Country select: IDN">
                            <div class="ratio ratio-1x1" style="width: 20px">
                                <img src="assets/img/flags/id.png" alt="IDN">
                            </div>
                        </a>
                        <ul class="dropdown-menu fs-sm" style="--cz-dropdown-spacer: .5rem">
                            <li>
                                <a class="dropdown-item" href="#!">
                                    <img src="assets/img/flags/en-uk.png" class="flex-shrink-0 me-2" width="20"
                                        alt="Inggris">
                                    Inggris
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#!">
                                    <img src="assets/img/flags/en-us.png" class="flex-shrink-0 me-2" width="20"
                                        alt="Amerika">
                                    Amerika
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="dropdown nav">
                        <a class="nav-link animate-underline dropdown-toggle fw-normal py-1 px-0" href="#"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="animate-target">Jakarta</span>
                        </a>
                        <ul class="dropdown-menu fs-sm" style="--cz-dropdown-spacer: .5rem">
                            <li><a class="dropdown-item" href="#!">Bandung</a></li>
                            <li><a class="dropdown-item" href="#!">Jogja</a></li>
                            <li><a class="dropdown-item" href="#!">Surabaya</a></li>
                            <li><a class="dropdown-item" href="#!">Bali</a></li>
                        </ul>
                    </div>
                </div>
                <div class="offcanvas-body pt-1 pb-3 py-lg-0">
                    <div class="container pb-lg-2 px-0 px-lg-3">

                        <div class="position-relative d-lg-flex align-items-center justify-content-between">

                            <div class="navbar-nav">
                                <div class="dropdown position-static pb-lg-2">
                                    <button type="button"
                                        class="nav-link animate-underline fw-semibold text-uppercase ps-0"
                                        data-bs-toggle="dropdown" data-bs-trigger="hover" data-bs-auto-close="outside"
                                        aria-expanded="false">
                                        <i class="ci-menu fs-lg me-2"></i>
                                        <span class="animate-target">Kategori</span>
                                    </button>
                                    <div class="dropdown-menu w-100 p-4 px-xl-5" style="--cz-dropdown-spacer: .75rem">

                                        <ul class="nav nav-underline justify-content-lg-center mt-n2 mt-lg-0 mb-4"
                                            role="tablist">
                                            <li class="nav-item" role="presentation">
                                                <button type="button" class="nav-link text-uppercase active"
                                                    id="womens-tab" data-bs-toggle="tab"
                                                    data-bs-target="#womens-tab-pane" role="tab"
                                                    aria-controls="womens-tab-pane" aria-selected="true">
                                                    Batik Wanita
                                                </button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button type="button" class="nav-link text-uppercase" id="mens-tab"
                                                    data-bs-toggle="tab" data-bs-target="#mens-tab-pane" role="tab"
                                                    aria-controls="mens-tab-pane" aria-selected="false">
                                                    Batik Pria
                                                </button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button type="button" class="nav-link text-uppercase" id="kids-tab"
                                                    data-bs-toggle="tab" data-bs-target="#kids-tab-pane" role="tab"
                                                    aria-controls="kids-tab-pane" aria-selected="false">
                                                    Batik Anak
                                                </button>
                                            </li>
                                        </ul>

                                        <div class="tab-content pb-xl-4">

                                            <div class="tab-pane fade show active" id="womens-tab-pane" role="tabpanel"
                                                aria-labelledby="womens-tab">
                                                <div class="row g-4">
                                                    <div class="col-lg-2">
                                                        <a class="d-inline-flex animate-underline h6 text-dark-emphasis text-decoration-none mb-2"
                                                            href="/katalog">
                                                            <span class="animate-target">Pakaian</span>
                                                        </a>
                                                        <ul class="nav flex-column gap-2 mt-0">
                                                            <li class="d-flex w-100 pt-1">
                                                                <a class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                                                    href="/katalog">Atasan &amp;
                                                                    Blus</a>
                                                            </li>
                                                            <li class="d-flex w-100 pt-1">
                                                                <a class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                                                    href="/katalog">Outer &amp;
                                                                    Cardigan</a>
                                                            </li>
                                                            <li class="d-flex w-100 pt-1">
                                                                <a class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                                                    href="/katalog">Kain Lilit</a>
                                                            </li>
                                                            <li class="d-flex w-100 pt-1">
                                                                <a class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                                                    href="/katalog">Kemeja Tunik</a>
                                                            </li>
                                                            <li class="d-flex w-100 pt-1">
                                                                <a class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                                                    href="/katalog">Dress Batik</a>
                                                            </li>
                                                            <li class="d-flex w-100 pt-1">
                                                                <a class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                                                    href="/katalog">Rok Batik</a>
                                                            </li>
                                                            <li class="d-flex w-100 pt-1">
                                                                <a class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                                                    href="/katalog">Lihat Semua</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <a class="d-inline-flex animate-underline h6 text-dark-emphasis text-decoration-none mb-2"
                                                            href="/katalog">
                                                            <span class="animate-target">Alas Kaki</span>
                                                        </a>
                                                        <ul class="nav flex-column gap-2 mt-0">
                                                            <li class="d-flex w-100 pt-1">
                                                                <a class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                                                    href="/katalog">Sepatu Etnik</a>
                                                            </li>
                                                            <li class="d-flex w-100 pt-1">
                                                                <a class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                                                    href="/katalog">Sandal Santai</a>
                                                            </li>
                                                            <li class="d-flex w-100 pt-1">
                                                                <a class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                                                    href="/katalog">Heels Motif</a>
                                                            </li>
                                                            <li class="d-flex w-100 pt-1">
                                                                <a class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                                                    href="/katalog">Loafers</a>
                                                            </li>
                                                            <li class="d-flex w-100 pt-1">
                                                                <a class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                                                    href="/katalog">Selop Batik</a>
                                                            </li>
                                                            <li class="d-flex w-100 pt-1">
                                                                <a class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                                                    href="/katalog">Wedges</a>
                                                            </li>
                                                            <li class="d-flex w-100 pt-1">
                                                                <a class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                                                    href="/katalog">Lihat Semua</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <a class="d-inline-flex animate-underline h6 text-dark-emphasis text-decoration-none mb-2"
                                                            href="/katalog">
                                                            <span class="animate-target">Aksesoris</span>
                                                        </a>
                                                        <ul class="nav flex-column gap-2 mt-0">
                                                            <li class="d-flex w-100 pt-1">
                                                                <a class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                                                    href="/katalog">Tas Jinjing</a>
                                                            </li>
                                                            <li class="d-flex w-100 pt-1">
                                                                <a class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                                                    href="/katalog">Kalung Etnik</a>
                                                            </li>
                                                            <li class="d-flex w-100 pt-1">
                                                                <a class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                                                    href="/katalog">Scarf / Syal</a>
                                                            </li>
                                                            <li class="d-flex w-100 pt-1">
                                                                <a class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                                                    href="/katalog">Jam Tangan Kayu</a>
                                                            </li>
                                                            <li class="d-flex w-100 pt-1">
                                                                <a class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                                                    href="/katalog">Gelang Etnik</a>
                                                            </li>
                                                            <li class="d-flex w-100 pt-1">
                                                                <a class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                                                    href="/katalog">Ikat Pinggang</a>
                                                            </li>
                                                            <li class="d-flex w-100 pt-1">
                                                                <a class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                                                    href="/katalog">Lihat Semua</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <div class="h6 mb-2">Ukuran Spesial</div>
                                                        <ul class="nav flex-column gap-2 mt-0">
                                                            <li class="d-flex w-100 pt-1">
                                                                <a class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                                                    href="/katalog">Jumbo (Plus
                                                                    Size)</a>
                                                            </li>
                                                            <li class="d-flex w-100 pt-1">
                                                                <a class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                                                    href="/katalog">Petite</a>
                                                            </li>
                                                            <li class="d-flex w-100 pt-1">
                                                                <a class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                                                    href="/katalog">Sepatu Lebar</a>
                                                            </li>
                                                            <li class="d-flex w-100 pt-1">
                                                                <a class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                                                    href="/katalog">Sepatu Ramping</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-lg-4 d-none d-lg-block" data-bs-theme="light">
                                                        <div
                                                            class="position-relative d-flex flex-column h-100 rounded-4 overflow-hidden p-4">
                                                            <div
                                                                class="position-relative d-flex flex-column justify-content-between h-100 z-2 pt-xl-2 ps-xl-2">
                                                                <div class="h4 lh-base">Koleksi<br>Batik<br>Elegan</div>
                                                                <div>
                                                                    <a class="btn btn-sm btn-dark stretched-link"
                                                                        href="/katalog"
                                                                        data-bs-theme="light">Gas Beli</a>
                                                                </div>
                                                            </div>
                                                            <img src="assets/img/mega-menu/fashion/01.jpg"
                                                                class="position-absolute top-0 start-0 w-100 h-100 object-fit-cover rtl-flip"
                                                                alt="Image">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="tab-pane fade" id="mens-tab-pane" role="tabpanel"
                                                aria-labelledby="mens-tab">
                                                <div class="row g-4">
                                                    <div class="col-lg-2">
                                                        <a class="d-inline-flex animate-underline h6 text-dark-emphasis text-decoration-none mb-2"
                                                            href="/katalog">
                                                            <span class="animate-target">Pakaian</span>
                                                        </a>
                                                        <ul class="nav flex-column gap-2 mt-0">
                                                            <li class="d-flex w-100 pt-1">
                                                                <a class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                                                    href="/katalog">Kemeja Lengan
                                                                    Pendek</a>
                                                            </li>
                                                            <li class="d-flex w-100 pt-1">
                                                                <a class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                                                    href="/katalog">Kemeja Lengan
                                                                    Panjang</a>
                                                            </li>
                                                            <li class="d-flex w-100 pt-1">
                                                                <a class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                                                    href="/katalog">Outer Keren</a>
                                                            </li>
                                                            <li class="d-flex w-100 pt-1">
                                                                <a class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                                                    href="/katalog">Jaket Batik</a>
                                                            </li>
                                                            <li class="d-flex w-100 pt-1">
                                                                <a class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                                                    href="/katalog">Koko Batik</a>
                                                            </li>
                                                            <li class="d-flex w-100 pt-1">
                                                                <a class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                                                    href="/katalog">Celana Chino</a>
                                                            </li>
                                                            <li class="d-flex w-100 pt-1">
                                                                <a class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                                                    href="/katalog">Lihat Semua</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <a class="d-inline-flex animate-underline h6 text-dark-emphasis text-decoration-none mb-2"
                                                            href="/katalog">
                                                            <span class="animate-target">Alas Kaki</span>
                                                        </a>
                                                        <ul class="nav flex-column gap-2 mt-0">
                                                            <li class="d-flex w-100 pt-1">
                                                                <a class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                                                    href="/katalog">Sneakers Aksen
                                                                    Batik</a>
                                                            </li>
                                                            <li class="d-flex w-100 pt-1">
                                                                <a class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                                                    href="/katalog">Pantofel</a>
                                                            </li>
                                                            <li class="d-flex w-100 pt-1">
                                                                <a class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                                                    href="/katalog">Loafers</a>
                                                            </li>
                                                            <li class="d-flex w-100 pt-1">
                                                                <a class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                                                    href="/katalog">Sandal Etnik</a>
                                                            </li>
                                                            <li class="d-flex w-100 pt-1">
                                                                <a class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                                                    href="/katalog">Sepatu Boots</a>
                                                            </li>
                                                            <li class="d-flex w-100 pt-1">
                                                                <a class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                                                    href="/katalog">Selop Pria</a>
                                                            </li>
                                                            <li class="d-flex w-100 pt-1">
                                                                <a class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                                                    href="/katalog">Lihat Semua</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <a class="d-inline-flex animate-underline h6 text-dark-emphasis text-decoration-none mb-2"
                                                            href="/katalog">
                                                            <span class="animate-target">Aksesoris</span>
                                                        </a>
                                                        <ul class="nav flex-column gap-2 mt-0">
                                                            <li class="d-flex w-100 pt-1">
                                                                <a class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                                                    href="/katalog">Backpack Canvas</a>
                                                            </li>
                                                            <li class="d-flex w-100 pt-1">
                                                                <a class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                                                    href="/katalog">Kacamata Hitam</a>
                                                            </li>
                                                            <li class="d-flex w-100 pt-1">
                                                                <a class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                                                    href="/katalog">Sling Bag</a>
                                                            </li>
                                                            <li class="d-flex w-100 pt-1">
                                                                <a class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                                                    href="/katalog">Jam Tangan
                                                                    Kulit</a>
                                                            </li>
                                                            <li class="d-flex w-100 pt-1">
                                                                <a class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                                                    href="/katalog">Topi Batik</a>
                                                            </li>
                                                            <li class="d-flex w-100 pt-1">
                                                                <a class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                                                    href="/katalog">Sabuk</a>
                                                            </li>
                                                            <li class="d-flex w-100 pt-1">
                                                                <a class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                                                    href="/katalog">Lihat Semua</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <div class="h6 mb-2">Belanja Khusus</div>
                                                        <ul class="nav flex-column gap-2 mt-0">
                                                            <li class="d-flex w-100 pt-1">
                                                                <a class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                                                    href="/katalog">Casual Wear</a>
                                                            </li>
                                                            <li class="d-flex w-100 pt-1">
                                                                <a class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                                                    href="/katalog">Seragam Kantor</a>
                                                            </li>
                                                            <li class="d-flex w-100 pt-1">
                                                                <a class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                                                    href="/katalog">Pakaian
                                                                    Kondangan</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-lg-4 d-none d-lg-block" data-bs-theme="dark">
                                                        <div
                                                            class="position-relative d-flex flex-column h-100 rounded-4 overflow-hidden p-4">
                                                            <div
                                                                class="position-relative d-flex flex-column justify-content-between h-100 z-2 pt-xl-2 ps-xl-2">
                                                                <div class="h4 lh-base">Aksesoris<br>Pria<br>Diskon
                                                                    Parah</div>
                                                                <div>
                                                                    <a class="btn btn-sm btn-dark stretched-link"
                                                                        href="/katalog"
                                                                        data-bs-theme="dark">Sikat Miring</a>
                                                                </div>
                                                            </div>
                                                            <img src="assets/img/mega-menu/fashion/02.jpg"
                                                                class="position-absolute top-0 start-0 w-100 h-100 object-fit-cover rtl-flip"
                                                                alt="Image">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="tab-pane fade" id="kids-tab-pane" role="tabpanel"
                                                aria-labelledby="kids-tab">
                                                <div class="row g-4">
                                                    <div class="col-lg-2">
                                                        <a class="d-inline-flex animate-underline h6 text-dark-emphasis text-decoration-none mb-2"
                                                            href="/katalog">
                                                            <span class="animate-target">Anak Cowok</span>
                                                        </a>
                                                        <ul class="nav flex-column gap-2 mt-0">
                                                            <li class="d-flex w-100 pt-1">
                                                                <a class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                                                    href="/katalog">Kemeja Lucu</a>
                                                            </li>
                                                            <li class="d-flex w-100 pt-1">
                                                                <a class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                                                    href="/katalog">Sneakers Kece</a>
                                                            </li>
                                                            <li class="d-flex w-100 pt-1">
                                                                <a class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                                                    href="/katalog">Jaket Batik
                                                                    Anak</a>
                                                            </li>
                                                            <li class="d-flex w-100 pt-1">
                                                                <a class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                                                    href="/katalog">Sweatshirts
                                                                    Motif</a>
                                                            </li>
                                                            <li class="d-flex w-100 pt-1">
                                                                <a class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                                                    href="/katalog">Boots Etnik</a>
                                                            </li>
                                                            <li class="d-flex w-100 pt-1">
                                                                <a class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                                                    href="/katalog">Celana Pendek</a>
                                                            </li>
                                                            <li class="d-flex w-100 pt-1">
                                                                <a class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                                                    href="/katalog">Lihat Semua</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <a class="d-inline-flex animate-underline h6 text-dark-emphasis text-decoration-none mb-2"
                                                            href="/katalog">
                                                            <span class="animate-target">Anak Cewek</span>
                                                        </a>
                                                        <ul class="nav flex-column gap-2 mt-0">
                                                            <li class="d-flex w-100 pt-1">
                                                                <a class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                                                    href="/katalog">Atasan Manis</a>
                                                            </li>
                                                            <li class="d-flex w-100 pt-1">
                                                                <a class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                                                    href="/katalog">Dress Kembaran
                                                                    Mama</a>
                                                            </li>
                                                            <li class="d-flex w-100 pt-1">
                                                                <a class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                                                    href="/katalog">Sepatu Nyaman</a>
                                                            </li>
                                                            <li class="d-flex w-100 pt-1">
                                                                <a class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                                                    href="/katalog">Hoodies Batik</a>
                                                            </li>
                                                            <li class="d-flex w-100 pt-1">
                                                                <a class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                                                    href="/katalog">Sandal Imut</a>
                                                            </li>
                                                            <li class="d-flex w-100 pt-1">
                                                                <a class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                                                    href="/katalog">Outer Santai</a>
                                                            </li>
                                                            <li class="d-flex w-100 pt-1">
                                                                <a class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                                                    href="/katalog">Lihat Semua</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <a class="d-inline-flex animate-underline h6 text-dark-emphasis text-decoration-none mb-2"
                                                            href="/katalog">
                                                            <span class="animate-target">Pernak-Pernik</span>
                                                        </a>
                                                        <ul class="nav flex-column gap-2 mt-0">
                                                            <li class="d-flex w-100 pt-1">
                                                                <a class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                                                    href="/katalog">Ransel Sekolah</a>
                                                            </li>
                                                            <li class="d-flex w-100 pt-1">
                                                                <a class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                                                    href="/katalog">Bando Batik</a>
                                                            </li>
                                                            <li class="d-flex w-100 pt-1">
                                                                <a class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                                                    href="/katalog">Tali Sepatu
                                                                    Warna</a>
                                                            </li>
                                                            <li class="d-flex w-100 pt-1">
                                                                <a class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                                                    href="/katalog">Syal Kecil</a>
                                                            </li>
                                                            <li class="d-flex w-100 pt-1">
                                                                <a class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                                                    href="/katalog">Topi Asik</a>
                                                            </li>
                                                            <li class="d-flex w-100 pt-1">
                                                                <a class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                                                    href="/katalog">Sabuk Anak</a>
                                                            </li>
                                                            <li class="d-flex w-100 pt-1">
                                                                <a class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                                                    href="/katalog">Lihat Semua</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <div class="h6 mb-2">Berdasarkan Umur</div>
                                                        <ul class="nav flex-column gap-2 mt-0">
                                                            <li class="d-flex w-100 pt-1">
                                                                <a class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                                                    href="/katalog">Bayi (Infant)</a>
                                                            </li>
                                                            <li class="d-flex w-100 pt-1">
                                                                <a class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                                                    href="/katalog">Balita
                                                                    (Toddler)</a>
                                                            </li>
                                                            <li class="d-flex w-100 pt-1">
                                                                <a class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                                                    href="/katalog">Anak Kecil</a>
                                                            </li>
                                                            <li class="d-flex w-100 pt-1">
                                                                <a class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                                                    href="/katalog">Anak Gede</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-lg-4 d-none d-lg-block" data-bs-theme="light">
                                                        <div
                                                            class="position-relative d-flex flex-column h-100 rounded-4 overflow-hidden p-4">
                                                            <div
                                                                class="position-relative d-flex flex-column justify-content-between h-100 z-2 pt-xl-2 ps-xl-2">
                                                                <div class="h4 lh-base">Koleksi<br>Lebaran<br>Si Kecil
                                                                </div>
                                                                <div>
                                                                    <a class="btn btn-sm btn-dark stretched-link"
                                                                        href="/katalog"
                                                                        data-bs-theme="light">Sikat Miring</a>
                                                                </div>
                                                            </div>
                                                            <img src="assets/img/mega-menu/fashion/03.jpg"
                                                                class="position-absolute top-0 start-0 w-100 h-100 object-fit-cover rtl-flip"
                                                                alt="Image">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <ul class="navbar-nav position-relative me-xl-n5">
                                <li class="nav-item dropdown pb-lg-2 me-lg-n1 me-xl-0">
                                    <a class="nav-link dropdown-toggle active" aria-current="page" href="#"
                                        role="button" data-bs-toggle="dropdown" data-bs-trigger="hover"
                                        aria-expanded="false">Koleksi Kami</a>
                                    <ul class="dropdown-menu" style="--cz-dropdown-spacer: .75rem">
                                        <li class="hover-effect-opacity px-2 mx-n2">
                                            <a class="dropdown-item d-block mb-0" href="/katalog">
                                                <span class="fw-medium">Koleksi Eksklusif</span>
                                                <span class="d-block fs-xs text-body-secondary">Batik Tulis
                                                    Premium</span>
                                                <div class="d-none d-lg-block hover-effect-target position-absolute top-0 start-100 bg-body border border-light-subtle rounded rounded-start-0 transition-none invisible opacity-0 pt-2 px-2 ms-n2"
                                                    style="width: 212px; height: calc(100% + 2px); margin-top: -1px">
                                                    <img class="position-relative z-2 d-none-dark"
                                                        src="assets/img/mega-menu/demo-preview/electronics-light.jpg"
                                                        alt="Koleksi Eksklusif">
                                                    <img class="position-relative z-2 d-none d-block-dark"
                                                        src="assets/img/mega-menu/demo-preview/electronics-dark.jpg"
                                                        alt="Koleksi Eksklusif">
                                                    <span
                                                        class="position-absolute top-0 start-0 w-100 h-100 rounded rounded-start-0 d-none-dark"
                                                        style="box-shadow: .875rem .5rem 2rem -.5rem #676f7b; opacity: .1"></span>
                                                    <span
                                                        class="position-absolute top-0 start-0 w-100 h-100 rounded rounded-start-0 d-none d-block-dark"
                                                        style="box-shadow: .875rem .5rem 1.875rem -.5rem #080b12; opacity: .25"></span>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="hover-effect-opacity px-2 mx-n2">
                                            <a class="dropdown-item d-block mb-0" href="/katalog">
                                                <span class="fw-medium">Koleksi Casual v.1</span>
                                                <span class="d-block fs-xs text-body-secondary">Batik buat
                                                    nongkrong</span>
                                                <div class="d-none d-lg-block hover-effect-target position-absolute top-0 start-100 bg-body border border-light-subtle rounded rounded-start-0 transition-none invisible opacity-0 pt-2 px-2 ms-n2"
                                                    style="width: 212px; height: calc(100% + 2px); margin-top: -1px">
                                                    <img class="position-relative z-2 d-none-dark"
                                                        src="assets/img/mega-menu/demo-preview/fashion-1-light.jpg"
                                                        alt="Fashion Store v.1">
                                                    <img class="position-relative z-2 d-none d-block-dark"
                                                        src="assets/img/mega-menu/demo-preview/fashion-1-dark.jpg"
                                                        alt="Fashion Store v.1">
                                                    <span
                                                        class="position-absolute top-0 start-0 w-100 h-100 rounded rounded-start-0 d-none-dark"
                                                        style="box-shadow: .875rem .5rem 2rem -.5rem #676f7b; opacity: .1"></span>
                                                    <span
                                                        class="position-absolute top-0 start-0 w-100 h-100 rounded rounded-start-0 d-none d-block-dark"
                                                        style="box-shadow: .875rem .5rem 1.875rem -.5rem #080b12; opacity: .25"></span>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="hover-effect-opacity px-2 mx-n2">
                                            <a class="dropdown-item d-block mb-0" href="home-fashion-v2.html">
                                                <span class="fw-medium">Koleksi Casual v.2</span>
                                                <span class="d-block fs-xs text-body-secondary">Tampil beda pake motif
                                                    unik</span>
                                                <div class="d-none d-lg-block hover-effect-target position-absolute top-0 start-100 bg-body border border-light-subtle rounded rounded-start-0 transition-none invisible opacity-0 pt-2 px-2 ms-n2"
                                                    style="width: 212px; height: calc(100% + 2px); margin-top: -1px">
                                                    <img class="position-relative z-2 d-none-dark"
                                                        src="assets/img/mega-menu/demo-preview/fashion-2-light.jpg"
                                                        alt="Fashion Store v.2">
                                                    <img class="position-relative z-2 d-none d-block-dark"
                                                        src="assets/img/mega-menu/demo-preview/fashion-2-dark.jpg"
                                                        alt="Fashion Store v.2">
                                                    <span
                                                        class="position-absolute top-0 start-0 w-100 h-100 rounded rounded-start-0 d-none-dark"
                                                        style="box-shadow: .875rem .5rem 2rem -.5rem #676f7b; opacity: .1"></span>
                                                    <span
                                                        class="position-absolute top-0 start-0 w-100 h-100 rounded rounded-start-0 d-none d-block-dark"
                                                        style="box-shadow: .875rem .5rem 1.875rem -.5rem #080b12; opacity: .25"></span>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="hover-effect-opacity px-2 mx-n2">
                                            <a class="dropdown-item d-block mb-0" href="/katalog">
                                                <span class="fw-medium">Batik Home Decor</span>
                                                <span class="d-block fs-xs text-body-secondary">Sarung bantal & taplak
                                                    elegan</span>
                                                <div class="d-none d-lg-block hover-effect-target position-absolute top-0 start-100 bg-body border border-light-subtle rounded rounded-start-0 transition-none invisible opacity-0 pt-2 px-2 ms-n2"
                                                    style="width: 212px; height: calc(100% + 2px); margin-top: -1px">
                                                    <img class="position-relative z-2 d-none-dark"
                                                        src="assets/img/mega-menu/demo-preview/furniture-light.jpg"
                                                        alt="Furniture Store">
                                                    <img class="position-relative z-2 d-none d-block-dark"
                                                        src="assets/img/mega-menu/demo-preview/furniture-dark.jpg"
                                                        alt="Furniture Store">
                                                    <span
                                                        class="position-absolute top-0 start-0 w-100 h-100 rounded rounded-start-0 d-none-dark"
                                                        style="box-shadow: .875rem .5rem 2rem -.5rem #676f7b; opacity: .1"></span>
                                                    <span
                                                        class="position-absolute top-0 start-0 w-100 h-100 rounded rounded-start-0 d-none d-block-dark"
                                                        style="box-shadow: .875rem .5rem 1.875rem -.5rem #080b12; opacity: .25"></span>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="hover-effect-opacity px-2 mx-n2">
                                            <a class="dropdown-item d-block mb-0" href="home-grocery.html">
                                                <span class="fw-medium">Grosir Seragam</span>
                                                <span class="d-block fs-xs text-body-secondary">Buat kantoran /
                                                    kawinan</span>
                                                <div class="d-none d-lg-block hover-effect-target position-absolute top-0 start-100 bg-body border border-light-subtle rounded rounded-start-0 transition-none invisible opacity-0 pt-2 px-2 ms-n2"
                                                    style="width: 212px; height: calc(100% + 2px); margin-top: -1px">
                                                    <img class="position-relative z-2 d-none-dark"
                                                        src="assets/img/mega-menu/demo-preview/grocery-light.jpg"
                                                        alt="Grocery Store">
                                                    <img class="position-relative z-2 d-none d-block-dark"
                                                        src="assets/img/mega-menu/demo-preview/grocery-dark.jpg"
                                                        alt="Grocery Store">
                                                    <span
                                                        class="position-absolute top-0 start-0 w-100 h-100 rounded rounded-start-0 d-none-dark"
                                                        style="box-shadow: .875rem .5rem 2rem -.5rem #676f7b; opacity: .1"></span>
                                                    <span
                                                        class="position-absolute top-0 start-0 w-100 h-100 rounded rounded-start-0 d-none d-block-dark"
                                                        style="box-shadow: .875rem .5rem 1.875rem -.5rem #080b12; opacity: .25"></span>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="hover-effect-opacity px-2 mx-n2">
                                            <a class="dropdown-item d-block mb-0" href="/katalog">
                                                <span class="fw-medium">Katalog Motif Lengkap</span>
                                                <span class="d-block fs-xs text-body-secondary">Cari motif apa aja
                                                    ada</span>
                                                <div class="d-none d-lg-block hover-effect-target position-absolute top-0 start-100 bg-body border border-light-subtle rounded rounded-start-0 transition-none invisible opacity-0 pt-2 px-2 ms-n2"
                                                    style="width: 212px; height: calc(100% + 2px); margin-top: -1px">
                                                    <img class="position-relative z-2 d-none-dark"
                                                        src="assets/img/mega-menu/demo-preview/marketplace-light.jpg"
                                                        alt="Marketplace">
                                                    <img class="position-relative z-2 d-none d-block-dark"
                                                        src="assets/img/mega-menu/demo-preview/marketplace-dark.jpg"
                                                        alt="Marketplace">
                                                    <span
                                                        class="position-absolute top-0 start-0 w-100 h-100 rounded rounded-start-0 d-none-dark"
                                                        style="box-shadow: .875rem .5rem 2rem -.5rem #676f7b; opacity: .1"></span>
                                                    <span
                                                        class="position-absolute top-0 start-0 w-100 h-100 rounded rounded-start-0 d-none d-block-dark"
                                                        style="box-shadow: .875rem .5rem 1.875rem -.5rem #080b12; opacity: .25"></span>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="hover-effect-opacity px-2 mx-n2">
                                            <a class="dropdown-item d-block mb-0" href="katalog">
                                                <span class="fw-medium">Fokus Satu Desain</span>
                                                <span class="d-block fs-xs text-body-secondary">Batik Signature Bulan
                                                    Ini</span>
                                                <div class="d-none d-lg-block hover-effect-target position-absolute top-0 start-100 bg-body border border-light-subtle rounded rounded-start-0 transition-none invisible opacity-0 pt-2 px-2 ms-n2"
                                                    style="width: 212px; height: calc(100% + 2px); margin-top: -1px">
                                                    <img class="position-relative z-2 d-none-dark"
                                                        src="assets/img/mega-menu/demo-preview/single-store-light.jpg"
                                                        alt="Single Product Store">
                                                    <img class="position-relative z-2 d-none d-block-dark"
                                                        src="assets/img/mega-menu/demo-preview/single-store-dark.jpg"
                                                        alt="Single Product Store">
                                                    <span
                                                        class="position-absolute top-0 start-0 w-100 h-100 rounded rounded-start-0 d-none-dark"
                                                        style="box-shadow: .875rem .5rem 2rem -.5rem #676f7b; opacity: .1"></span>
                                                    <span
                                                        class="position-absolute top-0 start-0 w-100 h-100 rounded rounded-start-0 d-none d-block-dark"
                                                        style="box-shadow: .875rem .5rem 1.875rem -.5rem #080b12; opacity: .25"></span>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item dropdown position-static pb-lg-2 me-lg-n1 me-xl-0">
                                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                        data-bs-trigger="hover" aria-expanded="false">Belanja Yuk</a>
                                    <div class="dropdown-menu p-4" style="--cz-dropdown-spacer: .75rem">
                                        <div class="d-flex flex-column flex-lg-row gap-4">
                                            <div style="min-width: 190px">
                                                <div class="h6 mb-2">Batik Pria Klasik</div>
                                                <ul class="nav flex-column gap-2 mt-0">
                                                    <li class="d-flex w-100 pt-1">
                                                        <a class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                                            href="/katalog">Halaman Kategori</a>
                                                    </li>
                                                    <li class="d-flex w-100 pt-1">
                                                        <a class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                                            href="/katalog">Katalog Pakai Filter
                                                            Kiri</a>
                                                    </li>
                                                    <li class="d-flex w-100 pt-1">
                                                        <a class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                                            href="shop-product-general-electronics.html">Info Singkat
                                                            Produk</a>
                                                    </li>
                                                    <li class="d-flex w-100 pt-1">
                                                        <a class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                                            href="shop-product-details-electronics.html">Detail Produk
                                                            Lengkap</a>
                                                    </li>
                                                    <li class="d-flex w-100 pt-1">
                                                        <a class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                                            href="shop-product-reviews-electronics.html">Ulasan
                                                            Pembeli</a>
                                                    </li>
                                                </ul>
                                                <div class="h6 pt-4 mb-2">Batik Fashion Kekinian</div>
                                                <ul class="nav flex-column gap-2 mt-0">
                                                    <li class="d-flex w-100 pt-1">
                                                        <a class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                                            href="/katalog">Katalog Pakai Filter
                                                            Kiri</a>
                                                    </li>
                                                    <li class="d-flex w-100 pt-1">
                                                        <a class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                                            href="/katalog">Halaman Produk Keren</a>
                                                    </li>
                                                </ul>
                                                <div class="h6 pt-4 mb-2">Batik Premium Tulis</div>
                                                <ul class="nav flex-column gap-2 mt-0">
                                                    <li class="d-flex w-100 pt-1">
                                                        <a class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                                            href="shop-catalog-furniture.html">Katalog Filter Atas</a>
                                                    </li>
                                                    <li class="d-flex w-100 pt-1">
                                                        <a class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                                            href="shop-product-furniture.html">Halaman Produk
                                                            Spesial</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div style="min-width: 190px">
                                                <div class="h6 mb-2">Paket Seragaman</div>
                                                <ul class="nav flex-column gap-2 mt-0">
                                                    <li class="d-flex w-100 pt-1">
                                                        <a class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                                            href="shop-catalog-grocery.html">Katalog Grosiran</a>
                                                    </li>
                                                    <li class="d-flex w-100 pt-1">
                                                        <a class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                                            href="shop-product-grocery.html">Halaman Produk Paket</a>
                                                    </li>
                                                </ul>
                                                <div class="h6 pt-4 mb-2">Motif Super Lengkap</div>
                                                <ul class="nav flex-column gap-2 mt-0">
                                                    <li class="d-flex w-100 pt-1">
                                                        <a class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                                            href="shop-catalog-marketplace.html">Eksplor Semua Motif</a>
                                                    </li>
                                                    <li class="d-flex w-100 pt-1">
                                                        <a class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                                            href="shop-product-marketplace.html">Detail Pola Batik</a>
                                                    </li>
                                                    <li class="d-flex w-100 pt-1">
                                                        <a class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                                            href="checkout-marketplace.html">Keranjang & Bayar</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div style="min-width: 190px">
                                                <div class="h6 mb-2">Proses Bayar Cepat (v.1)</div>
                                                <ul class="nav flex-column gap-2 mt-0">
                                                    <li class="d-flex w-100 pt-1">
                                                        <a class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                                            href="checkout-v1-cart.html">Cek Belanjaan Dulu</a>
                                                    </li>
                                                    <li class="d-flex w-100 pt-1">
                                                        <a class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                                            href="checkout-v1-delivery-1.html">Pilih Kurir (Langkah
                                                            1)</a>
                                                    </li>
                                                    <li class="d-flex w-100 pt-1">
                                                        <a class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                                            href="checkout-v1-delivery-2.html">Detail Ongkir (Langkah
                                                            2)</a>
                                                    </li>
                                                    <li class="d-flex w-100 pt-1">
                                                        <a class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                                            href="checkout-v1-shipping.html">Alamat Rumah</a>
                                                    </li>
                                                    <li class="d-flex w-100 pt-1">
                                                        <a class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                                            href="checkout-v1-payment.html">Metode Pembayaran</a>
                                                    </li>
                                                    <li class="d-flex w-100 pt-1">
                                                        <a class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                                            href="checkout-v1-thankyou.html">Laman Makasih Ya!</a>
                                                    </li>
                                                </ul>
                                                <div class="h6 pt-4 mb-2">Proses Bayar Singkat (v.2)</div>
                                                <ul class="nav flex-column gap-2 mt-0">
                                                    <li class="d-flex w-100 pt-1">
                                                        <a class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                                            href="checkout-v2-cart.html">Keranjang Singkat</a>
                                                    </li>
                                                    <li class="d-flex w-100 pt-1">
                                                        <a class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                                            href="checkout-v2-delivery.html">Info Paket</a>
                                                    </li>
                                                    <li class="d-flex w-100 pt-1">
                                                        <a class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                                            href="checkout-v2-pickup.html">Ambil di Toko Fisik</a>
                                                    </li>
                                                    <li class="d-flex w-100 pt-1">
                                                        <a class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                                            href="checkout-v2-thankyou.html">Selesai Belanja</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="nav-item dropdown pb-lg-2 me-lg-n1 me-xl-0">
                                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                        data-bs-trigger="hover" data-bs-auto-close="outside" aria-expanded="false">Akun
                                        Kamu</a>
                                    <ul class="dropdown-menu" style="--cz-dropdown-spacer: .75rem">
                                        <li class="dropend">
                                            <a class="dropdown-item dropdown-toggle" href="#!" role="button"
                                                data-bs-toggle="dropdown" data-bs-trigger="hover"
                                                aria-expanded="false">Masuk / Daftar</a>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="account-signin.html">Login Dulu</a>
                                                </li>
                                                <li><a class="dropdown-item" href="account-signup.html">Daftar Baru</a>
                                                </li>
                                                <li><a class="dropdown-item" href="account-password-recovery.html">Lupa
                                                        Password Ya?</a></li>
                                            </ul>
                                        </li>
                                        <li class="dropend">
                                            <a class="dropdown-item dropdown-toggle" href="#!" role="button"
                                                data-bs-toggle="dropdown" data-bs-trigger="hover"
                                                aria-expanded="false">Area Pelanggan</a>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="account-orders.html">Riwayat Jajan
                                                        Batik</a></li>
                                                <li><a class="dropdown-item" href="account-wishlist.html">Barang
                                                        Idaman</a></li>
                                                <li><a class="dropdown-item" href="account-payment.html">Cara Bayar
                                                        Tersimpan</a></li>
                                                <li><a class="dropdown-item" href="account-reviews.html">Review Aku</a>
                                                </li>
                                                <li><a class="dropdown-item" href="account-info.html">Data Diri</a></li>
                                                <li><a class="dropdown-item" href="account-addresses.html">Daftar
                                                        Alamat</a></li>
                                                <li><a class="dropdown-item"
                                                        href="account-notifications.html">Notifikasi Promo</a></li>
                                            </ul>
                                        </li>
                                        <li class="dropend">
                                            <a class="dropdown-item dropdown-toggle" href="#!" role="button"
                                                data-bs-toggle="dropdown" data-bs-trigger="hover"
                                                aria-expanded="false">Area Mitra Seller</a>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item"
                                                        href="account-marketplace-dashboard.html">Dashboard Penjual</a>
                                                </li>
                                                <li><a class="dropdown-item"
                                                        href="account-marketplace-products.html">Katalog Produkmu</a>
                                                </li>
                                                <li><a class="dropdown-item" href="account-marketplace-sales.html">Data
                                                        Penjualan</a></li>
                                                <li><a class="dropdown-item"
                                                        href="account-marketplace-payouts.html">Tarik Saldo</a></li>
                                                <li><a class="dropdown-item"
                                                        href="account-marketplace-purchases.html">Laporan Pembelian</a>
                                                </li>
                                                <li><a class="dropdown-item"
                                                        href="account-marketplace-favorites.html">Motif Difavoritin</a>
                                                </li>
                                                <li><a class="dropdown-item"
                                                        href="account-marketplace-settings.html">Pengaturan Lapak</a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item dropdown pb-lg-2 me-lg-n1 me-xl-0">
                                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                        data-bs-trigger="hover" data-bs-auto-close="outside"
                                        aria-expanded="false">Halaman Lain</a>
                                    <ul class="dropdown-menu" style="--cz-dropdown-spacer: .75rem">
                                        <li class="dropend">
                                            <a class="dropdown-item dropdown-toggle" href="#!" role="button"
                                                data-bs-toggle="dropdown" data-bs-trigger="hover"
                                                aria-expanded="false">Kenalan Yuk</a>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="about-v1.html">Tentang Kita v.1</a>
                                                </li>
                                                <li><a class="dropdown-item" href="about-v2.html">Tentang Kita v.2</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="dropend">
                                            <a class="dropdown-item dropdown-toggle" href="#!" role="button"
                                                data-bs-toggle="dropdown" data-bs-trigger="hover"
                                                aria-expanded="false">Cerita Batik (Blog)</a>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="blog-grid-v1.html">Tampilan Grid
                                                        v.1</a></li>
                                                <li><a class="dropdown-item" href="blog-grid-v2.html">Tampilan Grid
                                                        v.2</a></li>
                                                <li><a class="dropdown-item" href="blog-list.html">Tampilan List</a>
                                                </li>
                                                <li><a class="dropdown-item" href="blog-single-v1.html">Baca Artikel
                                                        v.1</a></li>
                                                <li><a class="dropdown-item" href="blog-single-v2.html">Baca Artikel
                                                        v.2</a></li>
                                            </ul>
                                        </li>
                                        <li class="dropend">
                                            <a class="dropdown-item dropdown-toggle" href="#!" role="button"
                                                data-bs-toggle="dropdown" data-bs-trigger="hover"
                                                aria-expanded="false">Hubungi CS</a>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="contact-v1.html">Kontak v.1</a></li>
                                                <li><a class="dropdown-item" href="contact-v2.html">Kontak v.2</a></li>
                                                <li><a class="dropdown-item" href="contact-v3.html">Kontak v.3</a></li>
                                            </ul>
                                        </li>
                                        <li class="dropend">
                                            <a class="dropdown-item dropdown-toggle" href="#!" role="button"
                                                data-bs-toggle="dropdown" data-bs-trigger="hover"
                                                aria-expanded="false">Pusat Bantuan</a>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="help-topics-v1.html">Topik Bantuan
                                                        v.1</a></li>
                                                <li><a class="dropdown-item" href="help-topics-v2.html">Topik Bantuan
                                                        v.2</a></li>
                                                <li><a class="dropdown-item" href="help-single-article-v1.html">Baca
                                                        Solusi v.1</a></li>
                                                <li><a class="dropdown-item" href="help-single-article-v2.html">Baca
                                                        Solusi v.2</a></li>
                                            </ul>
                                        </li>
                                        <li class="dropend">
                                            <a class="dropdown-item dropdown-toggle" href="#!" role="button"
                                                data-bs-toggle="dropdown" data-bs-trigger="hover"
                                                aria-expanded="false">Nyasar (Error 404)</a>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="404-electronics.html">404
                                                        Eksklusif</a></li>
                                                <li><a class="dropdown-item" href="404-fashion.html">404 Fashion</a>
                                                </li>
                                                <li><a class="dropdown-item" href="404-furniture.html">404 Home
                                                        Decor</a></li>
                                                <li><a class="dropdown-item" href="404-grocery.html">404 Seragam</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a class="dropdown-item" href="terms-and-conditions.html">Syarat &amp;
                                                Ketentuan Berbelanja</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item pb-lg-2 me-lg-n2 me-xl-0">
                                    <a class="nav-link" href="docs/installation.html">Dokumentasi</a>
                                </li>
                                <li class="nav-item pb-lg-2 me-lg-n2 me-xl-0">
                                    <a class="nav-link" href="docs/typography.html">Komponen</a>
                                </li>
                            </ul>

                            <button type="button"
                                class="btn btn-outline-secondary justify-content-start w-100 px-3 mb-lg-2 ms-3 d-none d-lg-inline-flex"
                                style="max-width: 240px" data-bs-toggle="offcanvas" data-bs-target="#searchBox"
                                aria-controls="searchBox">
                                <i class="ci-search fs-base ms-n1 me-2"></i>
                                <span class="text-body-tertiary fw-normal">Cari Batikmu...</span>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="offcanvas-header border-top px-0 py-3 mt-3 d-md-none">
                    <div class="nav nav-justified w-100">
                        <a class="nav-link border-end" href="account-signin.html">
                            <i class="ci-user fs-lg opacity-60 me-2"></i>
                            Akunku
                        </a>
                        <a class="nav-link" href="#!">
                            <i class="ci-heart fs-lg opacity-60 me-2"></i>
                            Barang Idaman
                        </a>
                    </div>
                </div>
            </nav>
        </div>
    </header>


    <main class="content-wrapper">
        <?= $this->renderSection('content'); ?>
    </main>


    <footer class="footer pt-5 pb-4">
        <div class="container pt-sm-2 pt-md-3 pt-lg-4">
            <div class="row pb-5 mb-lg-3">

                <div class="col-md-8 col-xl-7 pb-2 pb-md-0 mb-4 mb-md-0 mt-n3 mt-sm-0">
                    <div class="accordion" id="footerLinks">
                        <div class="row row-cols-1 row-cols-sm-3">
                            <div class="accordion-item col border-0">
                                <h6 class="accordion-header" id="categoriesHeading">
                                    <span class="text-dark-emphasis d-none d-sm-block">Kategori Belanja</span>
                                    <button type="button" class="accordion-button collapsed py-3 d-sm-none"
                                        data-bs-toggle="collapse" data-bs-target="#categoriesLinks"
                                        aria-expanded="false" aria-controls="categoriesLinks">Kategori Belanja</button>
                                </h6>
                                <div class="accordion-collapse collapse d-sm-block" id="categoriesLinks"
                                    aria-labelledby="categoriesHeading" data-bs-parent="#footerLinks">
                                    <ul class="nav flex-column gap-2 pt-sm-3 pb-3 pb-sm-0 mt-n1 mb-1 mb-sm-0">
                                        <li class="d-flex w-100 pt-1">
                                            <a class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                                href="#!">Buat Cewek</a>
                                        </li>
                                        <li class="d-flex w-100 pt-1">
                                            <a class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                                href="#!">Buat Cowok</a>
                                        </li>
                                        <li class="d-flex w-100 pt-1">
                                            <a class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                                href="#!">Baju Rumah Santai</a>
                                        </li>
                                        <li class="d-flex w-100 pt-1">
                                            <a class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                                href="#!">Pernak-Pernik</a>
                                        </li>
                                        <li class="d-flex w-100 pt-1">
                                            <a class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                                href="#!">Lagi Promo Nih!</a>
                                        </li>
                                    </ul>
                                </div>
                                <hr class="d-sm-none my-0">
                            </div>
                            <div class="accordion-item col border-0">
                                <h6 class="accordion-header" id="accountHeading">
                                    <span class="text-dark-emphasis d-none d-sm-block">Seputar Akun</span>
                                    <button type="button" class="accordion-button collapsed py-3 d-sm-none"
                                        data-bs-toggle="collapse" data-bs-target="#accountLinks" aria-expanded="false"
                                        aria-controls="accountLinks">Seputar Akun</button>
                                </h6>
                                <div class="accordion-collapse collapse d-sm-block" id="accountLinks"
                                    aria-labelledby="accountHeading" data-bs-parent="#footerLinks">
                                    <ul class="nav flex-column gap-2 pt-sm-3 pb-3 pb-sm-0 mt-n1 mb-1 mb-sm-0">
                                        <li class="d-flex w-100 pt-1">
                                            <a class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                                href="#!">Profil Kamu</a>
                                        </li>
                                        <li class="d-flex w-100 pt-1">
                                            <a class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                                href="#!">Aturan Kirim Barang</a>
                                        </li>
                                        <li class="d-flex w-100 pt-1">
                                            <a class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                                href="#!">Tukar Barang & Refund</a>
                                        </li>
                                        <li class="d-flex w-100 pt-1">
                                            <a class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                                href="#!">Cek Posisi Paket</a>
                                        </li>
                                        <li class="d-flex w-100 pt-1">
                                            <a class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                                href="#!">Info Ongkir Cepat</a>
                                        </li>
                                        <li class="d-flex w-100 pt-1">
                                            <a class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                                href="#!">Pajak & Biaya Tambahan</a>
                                        </li>
                                    </ul>
                                </div>
                                <hr class="d-sm-none my-0">
                            </div>
                            <div class="accordion-item col border-0">
                                <h6 class="accordion-header" id="customerHeading">
                                    <span class="text-dark-emphasis d-none d-sm-block">Bantuan Sobat Batik</span>
                                    <button type="button" class="accordion-button collapsed py-3 d-sm-none"
                                        data-bs-toggle="collapse" data-bs-target="#customerLinks" aria-expanded="false"
                                        aria-controls="customerLinks">Bantuan Sobat Batik</button>
                                </h6>
                                <div class="accordion-collapse collapse d-sm-block" id="customerLinks"
                                    aria-labelledby="customerHeading" data-bs-parent="#footerLinks">
                                    <ul class="nav flex-column gap-2 pt-sm-3 pb-3 pb-sm-0 mt-n1 mb-1 mb-sm-0">
                                        <li class="d-flex w-100 pt-1">
                                            <a class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                                href="#!">Pilihan Cara Bayar</a>
                                        </li>
                                        <li class="d-flex w-100 pt-1">
                                            <a class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                                href="#!">Garansi Uang Kembali 100%</a>
                                        </li>
                                        <li class="d-flex w-100 pt-1">
                                            <a class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                                href="#!">Salah Beli? Bisa Tukar Kok</a>
                                        </li>
                                        <li class="d-flex w-100 pt-1">
                                            <a class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                                href="#!">Cara Retur Gampang</a>
                                        </li>
                                        <li class="d-flex w-100 pt-1">
                                            <a class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                                href="#!">Pusat Tanya Jawab (FAQ)</a>
                                        </li>
                                        <li class="d-flex w-100 pt-1">
                                            <a class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                                href="#!">Lacak Kurir Yuk</a>
                                        </li>
                                    </ul>
                                </div>
                                <hr class="d-sm-none my-0">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 offset-xl-1">
                    <h6 class="mb-4">Sini langganan info promo, biar ngga ketinggalan!</h6>
                    <form class="needs-validation" novalidate="">
                        <div class="form-check form-check-inline">
                            <input type="checkbox" class="form-check-input" id="check-woman" checked="">
                            <label for="check-woman" class="form-check-label">Cewek</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="checkbox" class="form-check-input" id="check-man">
                            <label for="check-man" class="form-check-label">Cowok</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="checkbox" class="form-check-input" id="check-sale">
                            <label for="check-sale" class="form-check-label">Diskonan</label>
                        </div>
                        <div class="position-relative mt-3">
                            <input type="email" class="form-control form-control-lg bg-image-none text-start"
                                placeholder="Ketik email kamu di sini..." aria-label="Your email address" required="">
                            <div class="invalid-tooltip bg-transparent p-0">Waduh, emailnya diisi yang bener dong!</div>
                            <button type="submit"
                                class="btn btn-icon btn-ghost fs-xl btn-secondary border-0 position-absolute top-0 end-0 mt-1 me-1"
                                aria-label="Submit your email address">
                                <i class="ci-arrow-up-right"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="d-flex justify-content-center justify-content-lg-start gap-2 mt-n2 mt-md-0">
                <a class="btn btn-icon fs-base btn-outline-secondary border-0" href="#!" data-bs-toggle="tooltip"
                    data-bs-template="<div class=&quot;tooltip fs-xs mb-n2&quot; role=&quot;tooltip&quot;><div class=&quot;tooltip-inner bg-transparent text-body p-0&quot;></div></div>"
                    title="Nonton Kita di YouTube" aria-label="Follow us on YouTube">
                    <i class="ci-youtube"></i>
                </a>
                <a class="btn btn-icon fs-base btn-outline-secondary border-0" href="#!" data-bs-toggle="tooltip"
                    data-bs-template="<div class=&quot;tooltip fs-xs mb-n2&quot; role=&quot;tooltip&quot;><div class=&quot;tooltip-inner bg-transparent text-body p-0&quot;></div></div>"
                    title="Ikutin di Facebook" aria-label="Follow us on Facebook">
                    <i class="ci-facebook"></i>
                </a>
                <a class="btn btn-icon fs-base btn-outline-secondary border-0" href="#!" data-bs-toggle="tooltip"
                    data-bs-template="<div class=&quot;tooltip fs-xs mb-n2&quot; role=&quot;tooltip&quot;><div class=&quot;tooltip-inner bg-transparent text-body p-0&quot;></div></div>"
                    title="Kepoin IG Kita" aria-label="Follow us on Instagram">
                    <i class="ci-instagram"></i>
                </a>
                <a class="btn btn-icon fs-base btn-outline-secondary border-0" href="#!" data-bs-toggle="tooltip"
                    data-bs-template="<div class=&quot;tooltip fs-xs mb-n2&quot; role=&quot;tooltip&quot;><div class=&quot;tooltip-inner bg-transparent text-body p-0&quot;></div></div>"
                    title="Gabung Grup Telegram" aria-label="Follow us on Telegram">
                    <i class="ci-telegram"></i>
                </a>
                <a class="btn btn-icon fs-base btn-outline-secondary border-0" href="#!" data-bs-toggle="tooltip"
                    data-bs-template="<div class=&quot;tooltip fs-xs mb-n2&quot; role=&quot;tooltip&quot;><div class=&quot;tooltip-inner bg-transparent text-body p-0&quot;></div></div>"
                    title="Cari Inspirasi di Pinterest" aria-label="Follow us on Pinterest">
                    <i class="ci-pinterest"></i>
                </a>
            </div>

            <div class="d-lg-flex align-items-center border-top pt-4 mt-3">
                <div class="d-flex gap-2 gap-sm-3 justify-content-center ms-lg-auto mb-3 mb-md-4 mb-lg-0 order-lg-2">
                    <div>
                        <img src="assets/img/payment-methods/visa-light-mode.svg" class="d-none-dark" alt="Visa">
                        <img src="assets/img/payment-methods/visa-dark-mode.svg" class="d-none d-block-dark" alt="Visa">
                    </div>
                    <div>
                        <img src="assets/img/payment-methods/paypal-light-mode.svg" class="d-none-dark" alt="PayPal">
                        <img src="assets/img/payment-methods/paypal-dark-mode.svg" class="d-none d-block-dark"
                            alt="PayPal">
                    </div>
                    <div>
                        <img src="assets/img/payment-methods/mastercard.svg" alt="Mastercard">
                    </div>
                    <div>
                        <img src="assets/img/payment-methods/google-pay-light-mode.svg" class="d-none-dark"
                            alt="Google Pay">
                        <img src="assets/img/payment-methods/google-pay-dark-mode.svg" class="d-none d-block-dark"
                            alt="Google Pay">
                    </div>
                    <div>
                        <img src="assets/img/payment-methods/apple-pay-light-mode.svg" class="d-none-dark"
                            alt="Apple Pay">
                        <img src="assets/img/payment-methods/apple-pay-dark-mode.svg" class="d-none d-block-dark"
                            alt="Apple Pay">
                    </div>
                </div>
                <div class="d-md-flex justify-content-center order-lg-1">
                    <ul class="nav justify-content-center gap-4 order-md-3 mb-4 mb-md-0">
                        <li class="animate-underline">
                            <a class="nav-link fs-xs fw-normal p-0 animate-target" href="#!">Privasi</a>
                        </li>
                        <li class="animate-underline">
                            <a class="nav-link fs-xs fw-normal p-0 animate-target" href="#!">Afiliasi Kita</a>
                        </li>
                        <li class="animate-underline">
                            <a class="nav-link fs-xs fw-normal p-0 animate-target" href="#!">Aturan Main</a>
                        </li>
                    </ul>
                    <div class="vr text-body-secondary opacity-25 mx-4 d-none d-md-inline-block order-md-2"></div>
                    <p class="fs-xs text-center text-lg-start mb-0 order-md-1">
                        © Hak Cipta Dilindungi. Bikin E-Commerce Asik bareng <span class="animate-underline"><a
                                class="animate-target text-dark-emphasis text-decoration-none"
                                href="https://createx.studio/" target="_blank" rel="noreferrer">Createx
                                Studio</a></span>
                    </p>
                </div>
            </div>
        </div>
    </footer>


    <div class="floating-buttons position-fixed top-50 end-0 z-sticky me-3 me-xl-4 pb-4">
        <a class="btn-scroll-top btn btn-sm bg-body border-0 rounded-pill shadow animate-slide-end" href="#top">
            Balik ke Atas
            <i class="ci-arrow-right fs-base ms-1 me-n1 animate-target"></i>
            <span class="position-absolute top-0 start-0 w-100 h-100 border rounded-pill z-0"></span>
            <svg class="position-absolute top-0 start-0 w-100 h-100 z-1" viewBox="0 0 62 32" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <rect x=".75" y=".75" width="60.5" height="30.5" rx="15.25" stroke="currentColor" stroke-width="1.5"
                    stroke-miterlimit="10"></rect>
            </svg>
        </a>

    </div>


    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/simplebar/simplebar.min.js"></script>

    <script src="assets/js/theme.min.js"></script>

    <script src="/assets/vendor/jquery/jquery.js"></script>

    <script src="/assets/vendor/blockui/jquery.blockui.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
    function showblockUI() {
        jQuery.blockUI({
            message: 'Bentar ya, lagi loading dulu nih...',
            baseZ: 2000,
            css: {
                border: 'none',
                padding: '15px',
                backgroundColor: '#000',
                '-webkit-border-radius': '10px',
                '-moz-border-radius': '10px',
                opacity: .5,
                color: '#fff'
            }
        });
    }

    function hideblockUI() {
        $.unblockUI();
    }
    </script>
    <?= $this->renderSection('js'); ?>

</body>

</html>