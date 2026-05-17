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
                            Pesanan Saya
                            <span class="badge bg-primary rounded-pill ms-auto"><?= esc($orderCount ?? 0) ?></span>
                        </a>

                        <a class="list-group-item list-group-item-action d-flex align-items-center pe-none active"
                            href="<?= base_url('wishlist') ?>">
                            <i class="ci-heart fs-base opacity-75 me-2"></i>
                            Produk Favorit
                            <span class="badge bg-primary rounded-pill ms-auto"
                                id="wishlist-count-sidebar"><?= esc($wishlistCount ?? 0) ?></span>
                        </a>
                    </nav>

                    <h6 class="pt-4 ps-2 ms-1">Kelola Akun</h6>
                    <nav class="list-group list-group-borderless">
                        <a class="list-group-item list-group-item-action d-flex align-items-center"
                            href="<?= base_url('profile') ?>">
                            <i class="ci-user fs-base opacity-75 me-2"></i>
                            Informasi Pribadi
                        </a>
                    </nav>

                    <nav class="list-group list-group-borderless pt-3">
                        <a class="list-group-item list-group-item-action d-flex align-items-center"
                            href="<?= base_url('login/logout') ?>">
                            <i class="ci-log-out fs-base opacity-75 me-2"></i>
                            Keluar
                        </a>
                    </nav>
                </div>
            </div>
        </aside>

        <div class="col-lg-9">
            <div class="ps-lg-3 ps-xl-0">

                <div class="d-flex align-items-center justify-content-between pb-3 mb-1 mb-sm-2 mb-md-3">
                    <h1 class="h2 me-3 mb-0">Wishlist</h1>
                </div>

                <div class="border-bottom pb-4 mb-3">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-sm-7 col-md-8 col-xxl-9 d-flex align-items-center mb-3 mb-sm-0">
                            <h5 class="me-2 mb-0">Produk Favorit Saya</h5>
                            <span class="badge bg-primary rounded-pill"
                                id="wishlist-count-title"><?= esc($wishlistCount ?? 0) ?></span>
                        </div>
                        <div class="col-sm-5 col-md-4 col-xxl-3">
                            <select class="form-select" id="sort">
                                <option value="date">Terbaru Ditambahkan</option>
                                <option value="price-ascend">Harga Terendah</option>
                                <option value="price-descend">Harga Tertinggi</option>
                                <option value="rating">Rating Tertinggi</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="nav align-items-center mb-4">
                    <div class="form-check nav-link animate-underline fs-lg ps-0 pe-2 py-2 mt-n1 me-4">
                        <input type="checkbox" class="form-check-input" id="wishlist-master">
                        <label for="wishlist-master" class="form-check-label animate-target mt-1 ms-2">Pilih
                            semua</label>
                    </div>

                    <div class="d-flex flex-wrap" id="action-buttons">
                        <a class="nav-link animate-underline px-0 pe-sm-2 py-2 me-4" href="javascript:void(0);"
                            onclick="addSelectedToCart()">
                            <i class="ci-shopping-cart fs-base me-2"></i>
                            <span class="animate-target d-none d-md-inline">Tambah ke Keranjang</span>
                        </a>

                        <a class="nav-link animate-underline px-0 py-2" href="javascript:void(0);"
                            onclick="removeSelected()">
                            <i class="ci-trash fs-base me-1"></i>
                            <span class="animate-target d-none d-md-inline">Hapus Terpilih</span>
                        </a>
                    </div>
                </div>

                <div class="row row-cols-2 row-cols-md-3 g-4" id="wishlistSelection">
                    <?= view('Modul\Wishlists\Views\viewWishlist_list', ['items' => $items]) ?>
                </div>

            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
<?= $this->section('js') ?>
<script>
$(document).ready(function() {
    $('#sort').change(function() {
        loadWishlist();
    });

    $('#wishlist-master').change(function() {
        $('.select-card-check').prop('checked', $(this).is(':checked'));
    });

    $(document).on('change', '.select-card-check', function() {
        var total = $('.select-card-check').length;
        var checked = $('.select-card-check:checked').length;

        $('#wishlist-master').prop('checked', total > 0 && total == checked);
    });
});

function ajaxErrorMessage(jqXHR, textStatus, errorThrown, exception) {
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

    toastError(msg);
}

function loadWishlist() {
    $.ajax({
        type: "POST",
        url: "/wishlist/list",
        data: {
            sort: $('#sort').val()
        },
        dataType: "JSON",
        beforeSend: function() {
            showblockUI();
        },
        complete: function() {
            hideblockUI();
        },
        success: function(response) {
            if (response.status) {
                $('#wishlistSelection').html(response.html);
                $('#wishlist-count-sidebar').text(response.count);
                $('#wishlist-count-title').text(response.count);
                $('#wishlist-master').prop('checked', false);
            } else {
                toastWarning(response.message);
            }
        },
        error: function(jqXHR, textStatus, errorThrown, exception) {
            ajaxErrorMessage(jqXHR, textStatus, errorThrown, exception);
        }
    });
}

function removeWishlist(id) {
    confirmAction(
        'Hapus dari wishlist?',
        'Produk akan dihapus dari daftar favorit kamu.',
        'Ya, Hapus'
    ).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "POST",
                url: "/wishlist/remove",
                data: {
                    id: id
                },
                dataType: "JSON",
                beforeSend: function() {
                    showblockUI();
                },
                complete: function() {
                    hideblockUI();
                },
                success: function(response) {
                    if (response.status) {
                        toastSuccess(response.message);
                        loadWishlist();
                    } else {
                        toastWarning(response.message);
                    }
                },
                error: function(jqXHR, textStatus, errorThrown, exception) {
                    ajaxErrorMessage(jqXHR, textStatus, errorThrown, exception);
                }
            });
        }
    });
}

function removeSelected() {
    var ids = [];

    $('.select-card-check:checked').each(function() {
        ids.push($(this).val());
    });

    if (ids.length == 0) {
        toastWarning("Pilih minimal satu produk wishlist");
        return;
    }

    confirmAction(
        'Hapus wishlist terpilih?',
        'Semua produk terpilih akan dihapus dari wishlist.',
        'Ya, Hapus'
    ).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "POST",
                url: "/wishlist/remove-selected",
                data: {
                    ids: ids.join(',')
                },
                dataType: "JSON",
                beforeSend: function() {
                    showblockUI();
                },
                complete: function() {
                    hideblockUI();
                },
                success: function(response) {
                    if (response.status) {
                        toastSuccess(response.message);
                        loadWishlist();
                    } else {
                        toastWarning(response.message);
                    }
                },
                error: function(jqXHR, textStatus, errorThrown, exception) {
                    ajaxErrorMessage(jqXHR, textStatus, errorThrown, exception);
                }
            });
        }
    });
}

function addToCart(product_id) {
    $.ajax({
        type: "POST",
        url: "/wishlist/add-to-cart",
        data: {
            product_id: product_id
        },
        dataType: "JSON",
        beforeSend: function() {
            showblockUI();
        },
        complete: function() {
            hideblockUI();
        },
        success: function(response) {
            if (response.status) {
                toastSuccess(response.message);
            } else {
                toastWarning(response.message);
            }
        },
        error: function(jqXHR, textStatus, errorThrown, exception) {
            ajaxErrorMessage(jqXHR, textStatus, errorThrown, exception);
        }
    });
}

function addSelectedToCart() {
    var products = [];

    $('.select-card-check:checked').each(function() {
        products.push($(this).data('product'));
    });

    if (products.length == 0) {
        toastWarning("Pilih minimal satu produk wishlist");
        return;
    }

    $.each(products, function(index, product_id) {
        addToCart(product_id);
    });
}
</script>
<?= $this->endSection() ?>