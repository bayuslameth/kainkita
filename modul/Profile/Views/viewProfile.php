<?= $this->extend('layout/template'); ?>
<?= $this->section('css') ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<?php
$name = $customer->full_name ?? $customer->user_name ?? 'Customer';
$initial = strtoupper(substr($name, 0, 1));
?>

<div class="container py-5 mt-n2 mt-sm-0">
    <div class="row pt-md-2 pt-lg-3 pb-sm-2 pb-md-3 pb-lg-4 pb-xl-5">

        <aside class="col-lg-3">
            <div class="offcanvas-lg offcanvas-start pe-lg-0 pe-xl-4" id="accountSidebar">

                <div class="offcanvas-header d-lg-block py-3 p-lg-0">
                    <div class="d-flex align-items-center">
                        <div class="h5 d-flex justify-content-center align-items-center flex-shrink-0 text-primary bg-primary-subtle lh-1 rounded-circle mb-0"
                            style="width: 3rem; height: 3rem"><?= esc($initial) ?></div>
                        <div class="min-w-0 ps-3">
                            <h5 class="h6 mb-1"><?= esc($name) ?></h5>
                            <div class="fs-sm text-muted text-truncate"><?= esc($customer->email ?? '-') ?></div>
                        </div>
                    </div>
                    <button type="button" class="btn-close d-lg-none" data-bs-dismiss="offcanvas"
                        data-bs-target="#accountSidebar" aria-label="Close"></button>
                </div>

                <div class="offcanvas-body d-block pt-2 pt-lg-4 pb-lg-0">
                    <nav class="list-group list-group-borderless">
                        <a class="list-group-item list-group-item-action d-flex align-items-center"
                            href="<?= base_url('my-orders') ?>">
                            <i class="ci-shopping-bag fs-base opacity-75 me-2"></i>
                            Orders
                            <span class="badge bg-primary rounded-pill ms-auto"><?= esc($orderCount ?? 0) ?></span>
                        </a>
                        <a class="list-group-item list-group-item-action d-flex align-items-center"
                            href="<?= base_url('wishlist') ?>">
                            <i class="ci-heart fs-base opacity-75 me-2"></i>
                            Wishlist
                            <span class="badge bg-primary rounded-pill ms-auto"><?= esc($wishlistCount ?? 0) ?></span>
                        </a>
                    </nav>

                    <h6 class="pt-4 ps-2 ms-1">Manage account</h6>
                    <nav class="list-group list-group-borderless">
                        <a class="list-group-item list-group-item-action d-flex align-items-center pe-none active"
                            href="<?= base_url('profile') ?>">
                            <i class="ci-user fs-base opacity-75 me-2"></i>
                            Personal info
                        </a>
                    </nav>

                    <nav class="list-group list-group-borderless pt-3">
                        <a class="list-group-item list-group-item-action d-flex align-items-center"
                            href="<?= base_url('login/logout') ?>">
                            <i class="ci-log-out fs-base opacity-75 me-2"></i>
                            Log out
                        </a>
                    </nav>
                </div>
            </div>
        </aside>

        <div class="col-lg-9">
            <div class="ps-lg-3 ps-xl-0">

                <h1 class="h2 mb-1 mb-sm-2">Personal info</h1>

                <div class="border-bottom py-4">
                    <div class="nav flex-nowrap align-items-center justify-content-between pb-1 mb-3">
                        <h2 class="h6 mb-0">Basic info</h2>
                        <a class="nav-link hiding-collapse-toggle text-decoration-underline p-0 collapsed"
                            href=".basic-info" data-bs-toggle="collapse" aria-expanded="false"
                            aria-controls="basicInfoPreview basicInfoEdit">Edit</a>
                    </div>

                    <div class="collapse basic-info show" id="basicInfoPreview">
                        <ul class="list-unstyled fs-sm m-0">
                            <li><?= esc($customer->full_name ?? '-') ?></li>
                            <li><?= esc($customer->email ?? '-') ?></li>
                            <li><?= esc($customer->phone_number ?? '-') ?></li>
                        </ul>
                    </div>

                    <div class="collapse basic-info" id="basicInfoEdit">
                        <form class="row g-3 g-sm-4" id="form" action="javascript:void(0);" autocomplete="off">
                            <div class="col-sm-6">
                                <label for="full_name" class="form-label">Nama lengkap</label>
                                <input type="text" class="form-control" id="full_name" name="full_name"
                                    value="<?= esc($customer->full_name ?? '') ?>">
                                <div class="invalid-feedback"></div>
                            </div>

                            <div class="col-sm-6">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    value="<?= esc($customer->email ?? '') ?>">
                                <div class="invalid-feedback"></div>
                            </div>

                            <div class="col-sm-6">
                                <label for="phone_number" class="form-label">Nomor telepon</label>
                                <input type="text" class="form-control" id="phone_number" name="phone_number"
                                    value="<?= esc($customer->phone_number ?? '') ?>">
                                <div class="invalid-feedback"></div>
                            </div>

                            <div class="col-sm-6">
                                <label for="postal_code" class="form-label">Kode pos</label>
                                <input type="text" class="form-control" id="postal_code" name="postal_code"
                                    value="<?= esc($customer->postal_code ?? '') ?>">
                                <div class="invalid-feedback"></div>
                            </div>

                            <div class="col-sm-4">
                                <label for="province_id" class="form-label">Provinsi</label>
                                <select class="form-select" id="province_id" name="province_id">
                                    <option value="">Pilih provinsi</option>
                                    <?php foreach ($provinces as $province) : ?>
                                    <option value="<?= $province->province_id ?>"
                                        <?= (($customer->province_id ?? '') == $province->province_id) ? 'selected' : '' ?>>
                                        <?= esc($province->province_name) ?>
                                    </option>
                                    <?php endforeach; ?>
                                </select>
                                <div class="invalid-feedback"></div>
                            </div>

                            <div class="col-sm-4">
                                <label for="city_id" class="form-label">Kota/Kabupaten</label>
                                <select class="form-select" id="city_id" name="city_id">
                                    <option value="">Pilih kota/kabupaten</option>
                                    <?php foreach ($cities as $city) : ?>
                                    <option value="<?= $city->city_id ?>"
                                        <?= (($customer->city_id ?? '') == $city->city_id) ? 'selected' : '' ?>>
                                        <?= esc($city->city_name) ?>
                                    </option>
                                    <?php endforeach; ?>
                                </select>
                                <div class="invalid-feedback"></div>
                            </div>

                            <div class="col-sm-4">
                                <label for="subdistrict_id" class="form-label">Kecamatan</label>
                                <select class="form-select" id="subdistrict_id" name="subdistrict_id">
                                    <option value="">Pilih kecamatan</option>
                                    <?php foreach ($subdistricts as $subdistrict) : ?>
                                    <option value="<?= $subdistrict->subdistrict_id ?>"
                                        <?= (($customer->subdistrict_id ?? '') == $subdistrict->subdistrict_id) ? 'selected' : '' ?>>
                                        <?= esc($subdistrict->subdistrict_name) ?>
                                    </option>
                                    <?php endforeach; ?>
                                </select>
                                <div class="invalid-feedback"></div>
                            </div>

                            <div class="col-12">
                                <label for="address" class="form-label">Alamat</label>
                                <textarea name="address" id="address" class="form-control"
                                    rows="3"><?= esc($customer->address ?? '') ?></textarea>
                                <div class="invalid-feedback"></div>
                            </div>

                            <div class="col-12">
                                <div class="d-flex gap-3 pt-2 pt-sm-0">
                                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                    <button type="button" class="btn btn-secondary" data-bs-toggle="collapse"
                                        data-bs-target=".basic-info" aria-expanded="true"
                                        aria-controls="basicInfoPreview basicInfoEdit">Batal</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="border-bottom py-4">
                    <div class="nav flex-nowrap align-items-center justify-content-between pb-1 mb-3">
                        <h2 class="h6 mb-0">Alamat</h2>
                    </div>

                    <ul class="list-unstyled fs-sm m-0">
                        <li><?= esc($customer->address ?? '-') ?></li>
                        <li>
                            <?= esc($customer->subdistrict_name ?? '-') ?>,
                            <?= esc($customer->city_name ?? '-') ?>,
                            <?= esc($customer->province_name ?? '-') ?>
                        </li>
                        <li>Kode pos: <?= esc($customer->postal_code ?? '-') ?></li>
                    </ul>
                </div>

                <div class="border-bottom py-4">
                    <div class="nav flex-nowrap align-items-center justify-content-between pb-1 mb-3">
                        <h2 class="h6 mb-0">Password</h2>
                        <a class="nav-link hiding-collapse-toggle text-decoration-underline p-0 collapsed"
                            href=".password-change" data-bs-toggle="collapse" aria-expanded="false"
                            aria-controls="passChangePreview passChangeEdit">Edit</a>
                    </div>

                    <div class="collapse password-change show" id="passChangePreview">
                        <ul class="list-unstyled fs-sm m-0">
                            <li>**************</li>
                        </ul>
                    </div>

                    <div class="collapse password-change" id="passChangeEdit">
                        <form class="row g-3 g-sm-4" id="formPassword" action="javascript:void(0);" autocomplete="off">
                            <div class="col-sm-4">
                                <label for="current_password" class="form-label">Password lama</label>
                                <input type="password" class="form-control" id="current_password"
                                    name="current_password" placeholder="Masukkan password lama">
                                <div class="invalid-feedback"></div>
                            </div>

                            <div class="col-sm-4">
                                <label for="new_password" class="form-label">Password baru</label>
                                <input type="password" class="form-control" id="new_password" name="new_password"
                                    placeholder="Masukkan password baru">
                                <div class="invalid-feedback"></div>
                            </div>

                            <div class="col-sm-4">
                                <label for="confirm_password" class="form-label">Konfirmasi password</label>
                                <input type="password" class="form-control" id="confirm_password"
                                    name="confirm_password" placeholder="Ulangi password baru">
                                <div class="invalid-feedback"></div>
                            </div>

                            <div class="col-12">
                                <div class="d-flex gap-3 pt-2 pt-sm-0">
                                    <button type="submit" class="btn btn-primary">Simpan Password</button>
                                    <button type="button" class="btn btn-secondary" data-bs-toggle="collapse"
                                        data-bs-target=".password-change" aria-expanded="true"
                                        aria-controls="passChangePreview passChangeEdit">Batal</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="pt-3 mt-2 mt-sm-3">
                    <h2 class="h6">Informasi akun</h2>
                    <p class="fs-sm mb-0">
                        Data profil ini digunakan untuk kebutuhan checkout, wishlist, dan riwayat pemesanan di KainKita.
                    </p>
                </div>

            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('js') ?>
<script>
$(document).ready(function() {
    $("form input, form textarea, form select").on("input change", function() {
        $(this).removeClass('is-invalid');
        $(this).next('.invalid-feedback').text('');
    });

    $('#form').submit(function(e) {
        e.preventDefault();

        $.ajax({
            type: "POST",
            url: "/profile/update",
            data: $(this).serialize(),
            dataType: "JSON",
            beforeSend: function() {
                showblockUI();
            },
            complete: function() {
                hideblockUI();
            },
            success: function(response) {
                if (response.status) {
                    Swal.fire({
                        position: "top-right",
                        icon: "success",
                        title: response.notif,
                        showConfirmButton: !1,
                        timer: 1500,
                        showCloseButton: !0,
                    });

                    setTimeout(function() {
                        location.reload();
                    }, 1000);
                } else {
                    if (response.errors) {
                        $.each(response.errors, function(key, value) {
                            $('[name="' + key + '"]').addClass('is-invalid');
                            $('[name="' + key + '"]').next('.invalid-feedback')
                                .text(value);

                            if (value == "") {
                                $('[name="' + key + '"]').removeClass('is-invalid');
                            }
                        });
                    } else {
                        Swal.fire({
                            position: "top-right",
                            icon: "warning",
                            title: response.notif,
                            showConfirmButton: !1,
                            timer: 1500,
                            showCloseButton: !0,
                        });
                    }
                }
            },
            error: function(jqXHR, textStatus, errorThrown, exception) {
                var msg = '';

                if (jqXHR.status === 0) {
                    msg = 'Not connect.\n Verify Network.';
                } else if (jqXHR.status == 404) {
                    msg = 'Requested page not found. [404]';
                } else if (jqXHR.status == 500) {
                    msg = 'Internal Server Error [500].';
                } else if (exception === 'parsererror') {
                    msg = 'Requested JSON parse failed.';
                } else if (exception === 'timeout') {
                    msg = 'Time out error.';
                } else if (exception === 'abort') {
                    msg = 'Ajax request aborted.';
                } else {
                    msg = 'Uncaught Error.\n' + jqXHR.responseText;
                }

                alert(msg);
            }
        });
    });

    $('#formPassword').submit(function(e) {
        e.preventDefault();

        $.ajax({
            type: "POST",
            url: "/profile/change-password",
            data: $(this).serialize(),
            dataType: "JSON",
            beforeSend: function() {
                showblockUI();
            },
            complete: function() {
                hideblockUI();
            },
            success: function(response) {
                if (response.status) {
                    $('#formPassword')[0].reset();

                    Swal.fire({
                        position: "top-right",
                        icon: "success",
                        title: response.notif,
                        showConfirmButton: !1,
                        timer: 1500,
                        showCloseButton: !0,
                    });

                    $('.password-change').collapse('toggle');
                } else {
                    if (response.errors) {
                        $.each(response.errors, function(key, value) {
                            $('[name="' + key + '"]').addClass('is-invalid');
                            $('[name="' + key + '"]').next('.invalid-feedback')
                                .text(value);

                            if (value == "") {
                                $('[name="' + key + '"]').removeClass('is-invalid');
                            }
                        });
                    } else {
                        Swal.fire({
                            position: "top-right",
                            icon: "warning",
                            title: response.notif,
                            showConfirmButton: !1,
                            timer: 1500,
                            showCloseButton: !0,
                        });
                    }
                }
            },
            error: function(jqXHR, textStatus, errorThrown, exception) {
                var msg = '';

                if (jqXHR.status === 0) {
                    msg = 'Not connect.\n Verify Network.';
                } else if (jqXHR.status == 404) {
                    msg = 'Requested page not found. [404]';
                } else if (jqXHR.status == 500) {
                    msg = 'Internal Server Error [500].';
                } else if (exception === 'parsererror') {
                    msg = 'Requested JSON parse failed.';
                } else if (exception === 'timeout') {
                    msg = 'Time out error.';
                } else if (exception === 'abort') {
                    msg = 'Ajax request aborted.';
                } else {
                    msg = 'Uncaught Error.\n' + jqXHR.responseText;
                }

                alert(msg);
            }
        });
    });
});
</script>
<?= $this->endSection() ?>