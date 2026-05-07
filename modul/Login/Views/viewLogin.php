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

    <title>KainKita | Masuk Akun</title>
    <meta name="description" content="KainKita - Platform E-Commerce Batik Lokal Indonesia">
    <meta name="keywords" content="batik, kain lokal, e-commerce, belanja batik, online shop">
    <meta name="author" content="KainKita">

    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <link rel="manifest" href="manifest.json">
    <link rel="icon" type="image/png" href="uploads/settings/<?= ($settings['favicon_filename']) ?>" sizes="32x32">
    <link rel="apple-touch-icon" href="uploads/settings/<?= ($settings['logo_filename']) ?>">

    <script src="/assets/js/theme-switcher.js"></script>

    <link rel="preload" href="/assets/fonts/inter-variable-latin.woff2" as="font" type="font/woff2" crossorigin="">

    <link rel="preload" href="/assets/icons/cartzilla-icons.woff2" as="font" type="font/woff2" crossorigin="">
    <link rel="stylesheet" href="/assets/icons/cartzilla-icons.min.css">

    <link rel="preload" href="/assets/css/theme.min.css" as="style">
    <link rel="preload" href="/assets/css/theme.rtl.min.css" as="style">
    <link rel="stylesheet" href="/assets/css/theme.min.css" id="theme-styles">

    <script src="/assets/js/customizer.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet">

</head>


<body>

    <main class="content-wrapper w-100 px-3 ps-lg-5 pe-lg-4 mx-auto" style="max-width: 1920px">
        <div class="d-lg-flex">

            <div class="d-flex flex-column min-vh-100 w-100 py-4 mx-auto me-lg-5" style="max-width: 416px">

                <header class="navbar px-0 pb-4 mt-n2 mt-sm-0 mb-2 mb-md-3 mb-lg-4">
                    <a href="/login" class="navbar-brand pt-0">
                        <img src="uploads/settings/<?= ($settings['logo_filename']) ?>" alt="KainKita"
                            class="navbar-brand-img" width="40px">
                    </a>
                </header>

                <h1 class="h2 mt-auto">Halo, selamat datang lagi! 👋</h1>
                <div class="nav fs-sm mb-4">
                    Belum punya akun?
                    <a class="nav-link text-decoration-underline p-0 ms-2" href="/register">Daftar yuk!</a>
                </div>

                <form id="form" class="needs-validation" novalidate="">
                    <div class="position-relative mb-4">
                        <input type="email" name="email" class="form-control form-control-lg"
                            placeholder="Masukin email kamu" required="">
                        <div class="invalid-tooltip bg-transparent py-0">Format emailnya belum pas nih!</div>
                    </div>
                    <div class="mb-4">
                        <div class="password-toggle">
                            <input type="password" name="password" id="password-input"
                                class="form-control form-control-lg" placeholder="Kata sandi" required="">
                            <div id="invalid-password" class="invalid-tooltip bg-transparent py-0">Kata sandinya salah
                                nih!</div>
                            <label class="password-toggle-button fs-lg" aria-label="Show/hide password">
                                <input type="checkbox" class="btn-check">
                            </label>
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <div class="form-check me-2">
                            <input type="checkbox" name="remember" class="form-check-input" id="auth-remember-check">
                            <label for="auth-remember-check" class="form-check-label">ingat saya</label>
                        </div>
                        <div class="nav">
                            <a class="nav-link animate-underline p-0" href="account-password-recovery.html">
                                <span class="animate-target">Lupa kata sandi?</span>
                            </a>
                        </div>
                    </div>

                    <button type="submit" id="submit" class="btn btn-lg btn-primary w-100">
                        Masuk
                    </button>

                    <button type="button" id="google-login" class="btn btn-lg btn-secondary w-100 mt-2">
                        <i class="ri-google-fill me-2"></i>
                        Login Dengan Google
                    </button>
                </form>

                <footer class="mt-auto">
                    <p class="fs-xs mb-0">
                        © KainKita. Bangga buatan lokal.
                    </p>
                </footer>
            </div>


            <div class="d-none d-lg-block w-100 py-4 ms-auto" style="max-width: 1034px">
                <div class="d-flex flex-column justify-content-end h-100 rounded-5 overflow-hidden">

                    <!-- Light Mode -->
                    <span class="position-absolute top-0 start-0 w-100 h-100 d-none-dark"
                        style="background: linear-gradient(-90deg, #d2b48c 0%, #f5e6d3 100%)">
                    </span>

                    <!-- Dark Mode -->
                    <span class="position-absolute top-0 start-0 w-100 h-100 d-none d-block-dark"
                        style="background: linear-gradient(-90deg, #5c4033 0%, #3e2723 100%)">
                    </span>

                    <div class="ratio position-relative z-2" style="--cz-aspect-ratio: calc(1030 / 1032 * 100%)">

                        <img src="assets/img/account/cover3.png" alt="Girl" class="w-100 h-100 object-fit-cover">
                    </div>
                </div>
            </div>
        </div>
    </main>


    <script src="/assets/js/theme.min.js"></script>


    <script src="/assets/vendor/jquery/jquery.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
    $(document).ready(function() {
        $("#form input").on("input", function() {
            if ($(this).attr("id") === "auth-remember-check") {
                return;
            }

            $(this).removeClass("is-invalid");
            if ($(this).attr("id") === "password-input") {
                $("#invalid-password").text("");
            } else {
                $(this).next().text("");
            }
        });

        // ...
        $('#form').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "/login/doLogin",
                data: {
                    email: $('[name="email"]').val(),
                    password: $('[name="password"]').val(),
                },
                dataType: "JSON",
                beforeSend: function() {
                    $("#submit").html(
                        '<span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span> Lagi masuk...'
                    ).addClass("disabled");
                },
                complete: function() {
                    $("#submit").html('Masuk').removeClass("disabled");
                },
                success: function(response) {
                    if (response.status == true) {
                        Swal.fire({
                            position: "center",
                            icon: "success",
                            title: "Berhasil Masuk!",
                            showConfirmButton: false,
                            timer: 1200,
                            showCloseButton: true,
                        });

                        setTimeout(function() {
                            window.location.href = '/' + response.redirect_to;
                        }, 1200);

                    } else if (response.status_form == false) {
                        $.each(response.errors, function(key, value) {
                            $('[name="' + key + '"]').addClass('is-invalid');
                            if (key == "password") {
                                $('#invalid-password').text(value);
                            } else {
                                $('[name="' + key + '"]').next().text(value);
                            }
                        });
                    } else {
                        Swal.fire({
                            position: "center",
                            icon: "warning",
                            title: response.message,
                            showConfirmButton: false,
                            timer: 1500,
                            showCloseButton: true,
                        });
                    }
                },
                error: function(jqXHR, textStatus, errorThrown, exception) {
                    var msg = '';
                    if (jqXHR.status === 0) {
                        msg = 'Ups, koneksi internetmu sepertinya keputus.';
                    } else if (jqXHR.status == 404) {
                        msg = 'Halaman nggak ketemu [404]';
                    } else if (jqXHR.status == 500) {
                        msg = 'Waduh, ada gangguan di server kami [500].';
                    } else if (exception === 'parsererror') {
                        msg = 'Requested JSON parse failed.';
                    } else if (exception === 'timeout') {
                        msg = 'Koneksi terlalu lama (Time out).';
                    } else if (exception === 'abort') {
                        msg = 'Permintaan dibatalkan.';
                    } else {
                        msg = 'Ada error nih.\n' + jqXHR.responseText;
                    }
                    alert(msg);
                    $("#submit").html('Masuk').removeClass("disabled");
                }
            });
        });
    });
    </script>
</body>

</html>