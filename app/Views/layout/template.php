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
    <link rel="manifest" href="/manifest.json">
    <link rel="icon" type="image/png" href="/uploads/settings/<?= ($settings['favicon_filename']) ?>" sizes="32x32">
    <link rel="apple-touch-icon" href="/uploads/settings/<?= ($settings['logo_filename']) ?>">

    <script src="/assets/js/theme-switcher.js"></script>

    <link rel="preload" href="/assets/fonts/inter-variable-latin.woff2" as="font" type="font/woff2" crossorigin="">

    <link rel="preload" href="/assets/icons/cartzilla-icons.woff2" as="font" type="font/woff2" crossorigin="">
    <link rel="stylesheet" href="/assets/icons/cartzilla-icons.min.css">

    <link rel="stylesheet" href="/assets/vendor/swiper/swiper-bundle.min.css">
    <link rel="stylesheet" href="/assets/vendor/simplebar/simplebar.min.css">

    <link rel="preload" href="/assets/css/theme.min.css" as="style">
    <link rel="preload" href="/assets/css/theme.rtl.min.css" as="style">
    <link rel="stylesheet" href="/assets/css/theme.min.css" id="theme-styles">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <script src="/assets/js/customizer.min.js"></script>
    <style>
    .swal2-popup.swal2-toast-simple {
        width: auto !important;
        min-width: 260px !important;
        max-width: 360px !important;
        padding: 10px 14px !important;
        border-radius: 12px !important;
        box-shadow: 0 10px 30px rgba(15, 23, 42, .14) !important;
    }

    .swal2-popup.swal2-toast-simple .swal2-title {
        font-size: 13px !important;
        font-weight: 500 !important;
        line-height: 1.4 !important;
        margin: 0 !important;
        color: #1f2937 !important;
    }

    .swal2-popup.swal2-toast-simple .swal2-icon {
        width: 18px !important;
        height: 18px !important;
        min-width: 18px !important;
        margin: 0 9px 0 0 !important;
    }

    .swal2-popup.swal2-toast-simple .swal2-icon .swal2-icon-content {
        font-size: 13px !important;
    }

    .swal2-popup.swal2-toast-simple .swal2-timer-progress-bar {
        height: 2px !important;
    }
    </style>
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

        <div class="offcanvas-body d-flex flex-column gap-4 pt-2" id="cartItems">
            <div class="text-center text-body-secondary py-4">
                Keranjang masih kosong.
            </div>
        </div>

        <div class="offcanvas-header flex-column align-items-start">
            <div class="d-flex align-items-center justify-content-between w-100 mb-3 mb-md-4">
                <span class="text-light-emphasis">Total Belanjaan:</span>
                <span class="h6 mb-0" id="cartTotal">Rp 0</span>
            </div>
            <div class="d-flex w-100 gap-3">
                <a class="btn btn-lg btn-secondary w-100" href="/cart">Cek Detail Keranjang</a>
                <a class="btn btn-lg btn-dark w-100" href="<?= base_url('orders/detail') ?>">
                    Bayar Sekarang
                </a>
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

        <div class="offcanvas-body d-flex flex-column gap-4 pt-2" id="wishlistItems">
            <div class="text-center text-body-secondary py-4">
                Wishlist masih kosong.
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
                    <img src="/uploads/settings/<?= ($settings['logo_filename']) ?>" alt="KainKita Logo" width="40">
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
                            <a class="dropdown-item d-flex align-items-center" href="/my-orders">
                                <i class="ci-shopping-bag me-2"></i>
                                Pesanan Saya
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
                        class="position-absolute top-0 start-100 badge fs-xs text-bg-danger rounded-pill mt-1 ms-n4 z-2 wishlist-count"
                        style="--cz-badge-padding-y: .25em; --cz-badge-padding-x: .42em">
                        0
                    </span>

                    <i class="ci-heart animate-target"></i>

                    <span class="visually-hidden">Barang Idaman</span>
                </button>

                <button type="button"
                    class="btn btn-icon btn-lg fs-xl btn-outline-secondary position-relative border-0 rounded-circle animate-scale"
                    data-bs-toggle="offcanvas" data-bs-target="#shoppingCart" aria-controls="shoppingCart"
                    aria-label="Shopping cart">
                    <span
                        class="position-absolute top-0 start-100 badge fs-xs text-bg-primary rounded-pill mt-1 ms-n4 z-2 cart-count"
                        style="--cz-badge-padding-y: .25em; --cz-badge-padding-x: .42em">
                        0
                    </span>
                    <i class="ci-shopping-bag animate-target me-1"></i>
                </button>
            </div>
        </div>


        <div class="collapse navbar-stuck-hide" id="stuckNav">
            <nav class="offcanvas offcanvas-start" id="navbarNav" tabindex="-1" aria-labelledby="navbarNavLabel">
                <div class="offcanvas-body pt-1 pb-3 py-lg-0">
                    <div class="container pb-lg-2 px-0 px-lg-3">

                        <div class="position-relative d-lg-flex align-items-center justify-content-between">

                            <!-- Navbar nav -->
                            <ul class="navbar-nav position-relative me-xl-n5">

                                <li class="nav-item pb-lg-2 me-lg-n2 me-xl-0">
                                    <a class="nav-link" href="/home">Home</a>
                                </li>
                                <li class="nav-item pb-lg-2 me-lg-n2 me-xl-0">
                                    <a class="nav-link" href="/katalog">Katalog</a>
                                </li>
                                <li class="nav-item pb-lg-2 me-lg-n2 me-xl-0">
                                    <a class="nav-link" href="/best-seller">Best Seller</a>
                                </li>
                                <li class="nav-item pb-lg-2 me-lg-n2 me-xl-0">
                                    <a class="nav-link" href="/about-us">Tentang Kami</a>
                                </li>
                                <li class="nav-item pb-lg-2 me-lg-n2 me-xl-0">
                                    <a class="nav-link" href="/contact">Kontak</a>
                                </li>
                            </ul>

                            <!-- Search toggle visible on screens > 991px wide (lg breakpoint) -->
                            <button type="button"
                                class="btn btn-outline-secondary justify-content-start w-100 px-3 mb-lg-2 ms-3 d-none d-lg-inline-flex"
                                style="max-width: 240px" data-bs-toggle="offcanvas" data-bs-target="#searchBox"
                                aria-controls="searchBox">
                                <i class="ci-search fs-base ms-n1 me-2"></i>
                                <span class="text-body-tertiary fw-normal">Search</span>
                            </button>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </header>

    <main class="content-wrapper">
        <?= $this->renderSection('content'); ?>
    </main>

    <div class="modal fade" id="loginRequiredModal" tabindex="-1" aria-labelledby="loginRequiredModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 rounded-4">
                <div class="modal-body text-center p-4 p-md-5">
                    <div class="rounded-circle bg-body-tertiary d-flex align-items-center justify-content-center mx-auto mb-3"
                        style="width: 72px; height: 72px;">
                        <i class="ci-user fs-2 text-dark-emphasis"></i>
                    </div>

                    <h5 class="mb-2" id="loginRequiredModalLabel">
                        Login Dulu Ya
                    </h5>

                    <p class="text-body-secondary mb-4">
                        Untuk menambahkan produk ke keranjang atau wishlist, kamu harus login terlebih dahulu.
                    </p>

                    <div class="d-flex gap-2">
                        <button type="button" class="btn btn-secondary w-100" data-bs-dismiss="modal">
                            Nanti Dulu
                        </button>

                        <a href="<?= base_url('login') ?>" class="btn btn-dark w-100">
                            Login Sekarang
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

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

    <script src="/assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="/assets/vendor/simplebar/simplebar.min.js"></script>

    <script src="/assets/js/theme.min.js"></script>

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

    <script>
    function formatRupiahJs(value) {
        value = parseFloat(value || 0);

        return 'Rp ' + value.toLocaleString('id-ID', {
            minimumFractionDigits: 0,
            maximumFractionDigits: 0
        });
    }

    function imageUrl(path) {
        if (!path) {
            return '<?= base_url('assets/images/no-image.png') ?>';
        }

        return '<?= base_url() ?>' + path;
    }

    function showLoginRequiredModal() {
        const modalEl = document.getElementById('loginRequiredModal');
        const modal = new bootstrap.Modal(modalEl);
        modal.show();
    }

    function refreshCart() {
        $.ajax({
            url: '<?= base_url('cart/list') ?>',
            type: 'GET',
            dataType: 'JSON',
            success: function(response) {
                if (!response.status) {
                    if (response.code === 'login_required') {
                        $('.cart-count').text('0');
                        $('#cartItems').html(`
                        <div class="text-center text-body-secondary py-4">
                            Login untuk melihat keranjang.
                        </div>
                    `);
                        $('#cartTotal').text('Rp 0');
                    }

                    return;
                }

                $('.cart-count').text(response.count || 0);
                $('#cartTotal').text(formatRupiahJs(response.total || 0));

                if (!response.items || response.items.length === 0) {
                    $('#cartItems').html(`
                    <div class="text-center text-body-secondary py-4">
                        Keranjang masih kosong.
                    </div>
                `);

                    return;
                }

                let html = '';

                response.items.forEach(function(item) {
                    html += `
                    <div class="d-flex align-items-center">
                        <a class="flex-shrink-0" href="<?= base_url('katalog') ?>">
                            <img src="${imageUrl(item.image_path)}"
                                class="bg-body-tertiary rounded object-fit-cover"
                                width="110"
                                height="110"
                                alt="${item.product_name}">
                        </a>

                        <div class="w-100 min-w-0 ps-3">
                            <h5 class="d-flex animate-underline mb-2">
                                <a class="d-block fs-sm fw-medium text-truncate animate-target" href="<?= base_url('katalog') ?>">
                                    ${item.product_name}
                                </a>
                            </h5>

                            <div class="h6 pb-1 mb-2">
                                ${formatRupiahJs(item.price)}
                            </div>

                            <div class="d-flex align-items-center justify-content-between">
                                <div class="count-input rounded-2">
                                    <button type="button"
                                        class="btn btn-icon btn-sm btn-cart-minus"
                                        data-id="${item.id}"
                                        data-qty="${item.qty}">
                                        <i class="ci-minus"></i>
                                    </button>

                                    <input type="number"
                                        class="form-control form-control-sm"
                                        value="${item.qty}"
                                        readonly>

                                    <button type="button"
                                        class="btn btn-icon btn-sm btn-cart-plus"
                                        data-id="${item.id}"
                                        data-qty="${item.qty}">
                                        <i class="ci-plus"></i>
                                    </button>
                                </div>

                                <button type="button"
                                    class="btn-close fs-sm btn-remove-cart"
                                    data-id="${item.id}"
                                    aria-label="Hapus dari keranjang"></button>
                            </div>
                        </div>
                    </div>
                `;
                });

                $('#cartItems').html(html);
            },
            error: function(jqXHR, textStatus, errorThrown, exception) {
                ajaxErrorMessage(jqXHR, textStatus, errorThrown, exception);
            }
        });
    }

    function refreshWishlist() {
        $.ajax({
            url: '<?= base_url('wishlist/list') ?>',
            type: 'POST',
            dataType: 'JSON',
            success: function(response) {
                if (!response.status) {
                    if (response.code === 'login_required') {
                        $('.wishlist-count').text('0');
                        $('#wishlistItems').html(`
                        <div class="text-center text-body-secondary py-4">
                            Login untuk melihat wishlist.
                        </div>
                    `);
                    }

                    return;
                }

                $('.wishlist-count').text(response.count || 0);

                if (!response.items || response.items.length === 0) {
                    $('#wishlistItems').html(`
                    <div class="text-center text-body-secondary py-4">
                        Wishlist masih kosong.
                    </div>
                `);

                    return;
                }

                let html = '';

                response.items.forEach(function(item) {
                    html += `
                    <div class="d-flex align-items-center">
                        <a class="flex-shrink-0" href="<?= base_url('katalog') ?>">
                            <img src="${imageUrl(item.image_path)}"
                                class="bg-body-tertiary rounded object-fit-cover"
                                width="110"
                                height="110"
                                alt="${item.product_name}">
                        </a>

                        <div class="w-100 min-w-0 ps-3">
                            <h5 class="d-flex animate-underline mb-2">
                                <a class="d-block fs-sm fw-medium text-truncate animate-target" href="<?= base_url('katalog') ?>">
                                    ${item.product_name}
                                </a>
                            </h5>

                            <div class="h6 pb-2 mb-0">
                                ${formatRupiahJs(item.price)}
                            </div>

                            <div class="d-flex gap-2">
                                <button type="button"
                                    class="btn btn-sm btn-light w-100 btn-add-cart"
                                    data-product-id="${item.product_id}">
                                    <i class="ci-shopping-bag me-1"></i>
                                    Tambah ke Keranjang
                                </button>

                                <button type="button"
                                    class="btn btn-icon btn-sm btn-outline-danger btn-remove-wishlist"
                                    data-id="${item.id}">
                                    <i class="ci-trash"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                `;
                });

                $('#wishlistItems').html(html);
            },
            error: function(jqXHR, textStatus, errorThrown, exception) {
                ajaxErrorMessage(jqXHR, textStatus, errorThrown, exception);
            }
        });
    }

    $(document).ready(function() {
        refreshCart();
        refreshWishlist();

        $(document).on('click', '.btn-add-cart', function(e) {
            e.preventDefault();

            const productId = $(this).data('product-id');

            $.ajax({
                url: '<?= base_url('cart/add') ?>',
                type: 'POST',
                dataType: 'JSON',
                data: {
                    product_id: productId,
                    qty: 1,
                },
                beforeSend: function() {
                    showblockUI();
                },
                complete: function() {
                    hideblockUI();
                },
                success: function(response) {
                    if (!response.status) {
                        if (response.code === 'login_required') {
                            showLoginRequiredModal();
                            return;
                        }

                        toastWarning(response.message || 'Gagal menambahkan produk.');
                        return;
                    }

                    $('.cart-count').text(response.cart_count || 0);
                    refreshCart();

                    toastSuccess(response.message ||
                        'Produk berhasil ditambahkan ke keranjang.');
                },
                error: function(jqXHR, textStatus, errorThrown, exception) {
                    ajaxErrorMessage(jqXHR, textStatus, errorThrown, exception);
                }
            });
        });

        $(document).on('click', '.btn-add-wishlist', function(e) {
            e.preventDefault();

            const button = $(this);
            const productId = button.data('product-id');

            $.ajax({
                url: '<?= base_url('wishlist/toggle') ?>',
                type: 'POST',
                dataType: 'JSON',
                data: {
                    product_id: productId,
                },
                beforeSend: function() {
                    showblockUI();
                },
                complete: function() {
                    hideblockUI();
                },
                success: function(response) {
                    if (!response.status) {
                        if (response.code === 'login_required') {
                            showLoginRequiredModal();
                            return;
                        }

                        toastWarning(response.message || 'Gagal memproses wishlist.');
                        return;
                    }

                    $('.wishlist-count').text(response.wishlist_count || 0);
                    refreshWishlist();

                    if (response.action === 'added') {
                        button.addClass('text-danger');
                    } else {
                        button.removeClass('text-danger');
                    }

                    toastSuccess(response.message || 'Wishlist berhasil diperbarui.');
                },
                error: function(jqXHR, textStatus, errorThrown, exception) {
                    ajaxErrorMessage(jqXHR, textStatus, errorThrown, exception);
                }
            });
        });

        $(document).on('click', '.btn-remove-cart', function() {
            const id = $(this).data('id');

            $.ajax({
                url: '<?= base_url('cart/remove') ?>',
                type: 'POST',
                dataType: 'JSON',
                data: {
                    id: id,
                },
                beforeSend: function() {
                    showblockUI();
                },
                complete: function() {
                    hideblockUI();
                },
                success: function(response) {
                    refreshCart();

                    if (response.status) {
                        toastSuccess(response.message ||
                            'Produk berhasil dihapus dari keranjang.');
                    } else {
                        toastWarning(response.message ||
                            'Produk gagal dihapus dari keranjang.');
                    }
                },
                error: function(jqXHR, textStatus, errorThrown, exception) {
                    ajaxErrorMessage(jqXHR, textStatus, errorThrown, exception);
                }
            });
        });

        $(document).on('click', '.btn-cart-plus', function() {
            const id = $(this).data('id');
            const qty = parseInt($(this).data('qty')) + 1;

            $.ajax({
                url: '<?= base_url('cart/updateQty') ?>',
                type: 'POST',
                dataType: 'JSON',
                data: {
                    id: id,
                    qty: qty,
                },
                beforeSend: function() {
                    showblockUI();
                },
                complete: function() {
                    hideblockUI();
                },
                success: function(response) {
                    refreshCart();

                    if (!response.status) {
                        toastWarning(response.message || 'Jumlah produk gagal diperbarui.');
                    }
                },
                error: function(jqXHR, textStatus, errorThrown, exception) {
                    ajaxErrorMessage(jqXHR, textStatus, errorThrown, exception);
                }
            });
        });

        $(document).on('click', '.btn-cart-minus', function() {
            const id = $(this).data('id');
            const currentQty = parseInt($(this).data('qty'));
            const qty = currentQty - 1;

            if (qty < 1) {
                return;
            }

            $.ajax({
                url: '<?= base_url('cart/updateQty') ?>',
                type: 'POST',
                dataType: 'JSON',
                data: {
                    id: id,
                    qty: qty,
                },
                beforeSend: function() {
                    showblockUI();
                },
                complete: function() {
                    hideblockUI();
                },
                success: function(response) {
                    refreshCart();

                    if (!response.status) {
                        toastWarning(response.message || 'Jumlah produk gagal diperbarui.');
                    }
                },
                error: function(jqXHR, textStatus, errorThrown, exception) {
                    ajaxErrorMessage(jqXHR, textStatus, errorThrown, exception);
                }
            });
        });

        $(document).on('click', '.btn-remove-wishlist', function() {
            const id = $(this).data('id');

            $.ajax({
                url: '<?= base_url('wishlist/remove') ?>',
                type: 'POST',
                dataType: 'JSON',
                data: {
                    id: id,
                },
                beforeSend: function() {
                    showblockUI();
                },
                complete: function() {
                    hideblockUI();
                },
                success: function(response) {
                    refreshWishlist();

                    if (response.status) {
                        toastSuccess(response.message ||
                            'Produk berhasil dihapus dari wishlist.');
                    } else {
                        toastWarning(response.message ||
                            'Produk gagal dihapus dari wishlist.');
                    }
                },
                error: function(jqXHR, textStatus, errorThrown, exception) {
                    ajaxErrorMessage(jqXHR, textStatus, errorThrown, exception);
                }
            });
        });
    });

    function toastSuccess(message) {
        Swal.fire({
            toast: true,
            position: "top-end",
            icon: "success",
            title: message,
            showConfirmButton: false,
            timer: 1800,
            timerProgressBar: true,
            customClass: {
                popup: 'swal2-toast-simple'
            }
        });
    }

    function toastWarning(message) {
        Swal.fire({
            toast: true,
            position: "top-end",
            icon: "warning",
            title: message,
            showConfirmButton: false,
            timer: 2000,
            timerProgressBar: true,
            customClass: {
                popup: 'swal2-toast-simple'
            }
        });
    }

    function toastError(message) {
        Swal.fire({
            toast: true,
            position: "top-end",
            icon: "error",
            title: message,
            showConfirmButton: false,
            timer: 2200,
            timerProgressBar: true,
            customClass: {
                popup: 'swal2-toast-simple'
            }
        });
    }

    function toastInfo(message) {
        Swal.fire({
            toast: true,
            position: "top-end",
            icon: "info",
            title: message,
            showConfirmButton: false,
            timer: 1800,
            timerProgressBar: true,
            customClass: {
                popup: 'swal2-toast-simple'
            }
        });
    }

    function ajaxErrorMessage(jqXHR, textStatus, errorThrown, exception) {
        var msg = '';

        if (jqXHR.status === 0) {
            msg = 'Tidak terhubung. Periksa koneksi internet.';
        } else if (jqXHR.status == 404) {
            msg = 'Halaman request tidak ditemukan. [404]';
        } else if (jqXHR.status == 500) {
            msg = 'Terjadi kesalahan server. [500]';
        } else if (exception === 'parsererror') {
            msg = 'Response JSON tidak valid.';
        } else if (exception === 'timeout') {
            msg = 'Request timeout.';
        } else if (exception === 'abort') {
            msg = 'Request dibatalkan.';
        } else {
            msg = 'Terjadi kesalahan. ' + jqXHR.responseText;
        }

        toastError(msg);
    }
    </script>
    <?= $this->renderSection('js'); ?>

</body>

</html>