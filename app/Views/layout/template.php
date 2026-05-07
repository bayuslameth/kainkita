<?php 
use Config\Services;
use Config\Database;
$this->db         = Database::connect();

$settings = $this->db->table('apps_settings')->get()->getRowArray();

?>
<!DOCTYPE html>
<html lang="id" data-bs-theme="light" data-pwa="true">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>
    <meta charset="utf-8">

    <meta name="viewport"
        content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover">

    <title><?= esc($settings['app_name']) ?> | Single Store Kain Batik Lokal Indonesia</title>
    <meta name="description" content="<?= esc($settings['description']) ?>">
    <meta name="keywords"
        content="kain batik, batik lokal, toko batik online, belanja batik, e-commerce batik, motif batik, batik Jawa, batik Solo, batik premium">
    <meta name="author" content="KainKita">

    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <link rel="manifest" href="manifest.json">
    <link rel="icon" type="image/png" href="uploads/settings/<?= ($settings['favicon_filename']) ?>" sizes="32x32">
    <link rel="apple-touch-icon" href="uploads/settings/<?= ($settings['logo_filename']) ?>">

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
                        <a class="d-block fs-sm fw-medium text-truncate animate-target" href="/katalog">Sneakers Aksen
                            Batik Kawung</a>
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
                        <a class="d-block fs-sm fw-medium text-truncate animate-target" href="/katalog">Kemeja Batik
                            Pria Klasik</a>
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
                        <a class="d-block fs-sm fw-medium text-truncate animate-target" href="/katalog">Kacamata Hitam
                            Kece</a>
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
                    placeholder="Cari motif batik, kain, atau koleksi lokal..." data-autofocus="offcanvas">
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

    <div class="offcanvas offcanvas-end pb-sm-2 px-sm-2" id="wishlistOffcanvas" tabindex="-1"
        aria-labelledby="wishlistOffcanvasLabel" style="width: 500px">

        <div class="offcanvas-header py-3 pt-lg-4">
            <div class="d-flex align-items-center justify-content-between w-100">
                <h4 class="offcanvas-title" id="wishlistOffcanvasLabel">
                    Barang Idaman
                </h4>

                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close">
                </button>
            </div>
        </div>

        <div class="offcanvas-body d-flex flex-column gap-4 pt-2">

            <!-- Item -->
            <div class="d-flex align-items-center">

                <a class="flex-shrink-0" href="/katalog">
                    <img src="assets/img/shop/fashion/thumbs/07.png" class="bg-body-tertiary rounded" width="110"
                        alt="Thumbnail">
                </a>

                <div class="w-100 min-w-0 ps-3">

                    <h5 class="d-flex animate-underline mb-2">
                        <a class="d-block fs-sm fw-medium text-truncate animate-target" href="/katalog">

                            Outer Batik Modern
                        </a>
                    </h5>

                    <div class="h6 pb-2 mb-0">
                        Rp 320.000
                    </div>

                    <div class="d-flex gap-2">

                        <button class="btn btn-sm btn-light w-100">
                            <i class="ci-shopping-bag me-1"></i>
                            Tambah ke Keranjang
                        </button>

                        <button type="button" class="btn btn-icon btn-sm btn-outline-danger">

                            <i class="ci-trash"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Item -->
            <div class="d-flex align-items-center">

                <a class="flex-shrink-0" href="/katalog">
                    <img src="assets/img/shop/fashion/thumbs/08.png" class="bg-body-tertiary rounded" width="110"
                        alt="Thumbnail">
                </a>

                <div class="w-100 min-w-0 ps-3">

                    <h5 class="d-flex animate-underline mb-2">
                        <a class="d-block fs-sm fw-medium text-truncate animate-target" href="/katalog">

                            Tas Motif Nusantara
                        </a>
                    </h5>

                    <div class="h6 pb-2 mb-0">
                        Rp 210.000
                    </div>

                    <div class="d-flex gap-2">

                        <button class="btn btn-sm btn-light w-100">
                            <i class="ci-shopping-bag me-1"></i>
                            Tambah ke Keranjang
                        </button>

                        <button type="button" class="btn btn-icon btn-sm btn-outline-danger">

                            <i class="ci-trash"></i>
                        </button>
                    </div>
                </div>
            </div>

        </div>

        <div class="offcanvas-header">
            <a href="/wishlist" class="btn btn-lg btn-secondary w-100">
                Lihat Semua Wishlist
            </a>
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


            </div>
            <div class="d-flex align-items-center me-auto">

                <!-- Logo -->
                <div class="">
                    <img src="uploads/settings/<?= ($settings['logo_filename']) ?>" alt="KainKita Logo" width="40">
                </div>

                <!-- Brand Name -->
                <a class="navbar-brand fs-2 py-0 m-0" href="/">
                    ainkita
                </a>

            </div>
            <div class="d-flex align-items-center">

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

                <div class="dropdown d-none d-md-inline-flex">
                    <button type="button"
                        class="btn btn-icon btn-lg fs-lg btn-outline-secondary border-0 rounded-circle animate-shake"
                        data-bs-toggle="dropdown" aria-expanded="false">

                        <i class="ci-user animate-target"></i>
                        <span class="visually-hidden">Akun Saya</span>
                    </button>

                    <ul class="dropdown-menu dropdown-menu-end">

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="/profile">
                                <i class="ci-user me-2"></i>
                                Profile
                            </a>
                        </li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center text-danger" href="/login/logout">

                                <i class="ci-log-out me-2"></i>
                                Logout
                            </a>
                        </li>

                    </ul>
                </div>

                <button type="button"
                    class="btn btn-icon btn-lg fs-lg btn-outline-secondary position-relative border-0 rounded-circle animate-pulse d-none d-md-inline-flex"
                    data-bs-toggle="offcanvas" data-bs-target="#wishlistOffcanvas" aria-controls="wishlistOffcanvas"
                    aria-label="Wishlist">

                    <span
                        class="position-absolute top-0 start-100 badge fs-xs text-bg-danger rounded-pill mt-1 ms-n4 z-2"
                        style="--cz-badge-padding-y: .25em; --cz-badge-padding-x: .42em">
                        2
                    </span>

                    <i class="ci-heart animate-target"></i>

                    <span class="visually-hidden">Barang Idaman</span>
                </button>

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
        </div>
    </footer>


    <div class="floating-buttons position-fixed top-50 end-0 z-sticky me-3 me-xl-4 pb-4">
        <a class="btn-scroll-top btn btn-sm bg-body border-0 rounded-pill shadow animate-slide-end" href="#top">
            Back
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