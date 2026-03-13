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
    <link rel="icon" type="image/png" href="/assets/app-icons/icon-32x32.png" sizes="32x32">
    <link rel="apple-touch-icon" href="/assets/app-icons/icon-180x180.png">

    <script src="/assets/js/theme-switcher.js"></script>

    <link rel="preload" href="/assets/fonts/inter-variable-latin.woff2" as="font" type="font/woff2" crossorigin="">

    <link rel="preload" href="/assets/icons/cartzilla-icons.woff2" as="font" type="font/woff2" crossorigin="">
    <link rel="stylesheet" href="/assets/icons/cartzilla-icons.min.css">

    <link rel="preload" href="/assets/css/theme.min.css" as="style">
    <link rel="preload" href="/assets/css/theme.rtl.min.css" as="style">
    <link rel="stylesheet" href="/assets/css/theme.min.css" id="theme-styles">

    <script src="/assets/js/customizer.min.js"></script>
</head>


<body>

    <main class="content-wrapper w-100 px-3 ps-lg-5 pe-lg-4 mx-auto" style="max-width: 1920px">
        <div class="d-lg-flex">

            <div class="d-flex flex-column min-vh-100 w-100 py-4 mx-auto me-lg-5" style="max-width: 416px">

                <header class="navbar px-0 pb-4 mt-n2 mt-sm-0 mb-2 mb-md-3 mb-lg-4">
                    <a href="index.html" class="navbar-brand pt-0">
                        <span class="d-flex flex-shrink-0 text-primary me-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36">
                                <path
                                    d="M36 18.01c0 8.097-5.355 14.949-12.705 17.2a18.12 18.12 0 0 1-5.315.79C9.622 36 2.608 30.313.573 22.611.257 21.407.059 20.162 0 18.879v-1.758c.02-.395.059-.79.099-1.185.099-.908.277-1.817.514-2.686C2.687 5.628 9.682 0 18 0c5.572 0 10.551 2.528 13.871 6.517 1.502 1.797 2.648 3.91 3.359 6.201.494 1.659.771 3.436.771 5.292z"
                                    fill="currentColor"></path>
                                <g fill="#fff">
                                    <path
                                        d="M17.466 21.624c-.514 0-.988-.316-1.146-.829-.198-.632.138-1.303.771-1.501l7.666-2.469-1.205-8.254-13.317 4.621a1.19 1.19 0 0 1-1.521-.75 1.19 1.19 0 0 1 .751-1.521l13.89-4.818c.553-.197 1.166-.138 1.64.158a1.82 1.82 0 0 1 .85 1.284l1.344 9.183c.138.987-.494 1.994-1.482 2.33l-7.864 2.528-.375.04zm7.31.138c-.178-.632-.85-1.007-1.482-.81l-5.177 1.58c-2.331.79-3.28.02-3.418-.099l-6.56-8.412a4.25 4.25 0 0 0-4.406-1.758l-3.122.987c-.237.889-.415 1.777-.514 2.686l4.228-1.363a1.84 1.84 0 0 1 1.857.81l6.659 8.551c.751.948 2.015 1.323 3.359 1.323.909 0 1.857-.178 2.687-.474l5.078-1.54c.632-.178 1.008-.829.81-1.481z">
                                    </path>
                                    <use href="#czlogo"></use>
                                    <use href="#czlogo" x="8.516" y="-2.172"></use>
                                </g>
                                <defs>
                                    <path id="czlogo"
                                        d="M18.689 28.654a1.94 1.94 0 0 1-1.936 1.935 1.94 1.94 0 0 1-1.936-1.935 1.94 1.94 0 0 1 1.936-1.935 1.94 1.94 0 0 1 1.936 1.935z">
                                    </path>
                                </defs>
                            </svg>
                        </span>
                        KainKita
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
                    <button type="submit" id="submit" class="btn btn-lg btn-primary w-100">Masuk</button>
                </form>

                <footer class="mt-auto">
                    <div class="nav mb-4">
                        <a class="nav-link text-decoration-underline p-0" href="help-topics-v1.html">Butuh bantuan?
                            Tanya di sini.</a>
                    </div>
                    <p class="fs-xs mb-0">
                        © KainKita. Bangga buatan lokal.
                    </p>
                </footer>
            </div>


            <div class="d-none d-lg-block w-100 py-4 ms-auto" style="max-width: 1034px">
                <div class="d-flex flex-column justify-content-end h-100 rounded-5 overflow-hidden">
                    <span class="position-absolute top-0 start-0 w-100 h-100 d-none-dark"
                        style="background: linear-gradient(-90deg, #accbee 0%, #e7f0fd 100%)"></span>
                    <span class="position-absolute top-0 start-0 w-100 h-100 d-none d-block-dark"
                        style="background: linear-gradient(-90deg, #1b273a 0%, #1f2632 100%)"></span>
                    <div class="ratio position-relative z-2" style="--cz-aspect-ratio: calc(1030 / 1032 * 100%)">
                        <img src="assets/img/account/cover.png" alt="Girl">
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

        $('#form').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "/api/auth/login", // ← ganti ini
                contentType: "application/json", // ← tambah ini
                data: JSON.stringify({ // ← ganti ini
                    email: $('[name="email"]').val(),
                    password: $('[name="password"]').val(),
                }),
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
                        // Simpan token ke localStorage
                        localStorage.setItem('access_token', response.data.access_token);
                        localStorage.setItem('refresh_token', response.data.refresh_token);

                        Swal.fire({
                            position: "center",
                            icon: "success",
                            title: "Berhasil Masuk!",
                            showConfirmButton: false,
                            timer: 1500,
                            showCloseButton: true,
                        });

                        setTimeout(function() {
                            // Arahkan berdasarkan role dari payload JWT
                            // Decode payload (bagian tengah JWT)
                            var payload = JSON.parse(atob(response.data.access_token
                                .split('.')[1]));
                            var menu = (payload.role == 1) ? 'admin' : 'home';
                            window.location.href = '/' + menu;
                        }, 1500);

                    } else if (response.status_form == false) {
                        // Error validasi (form lama)
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