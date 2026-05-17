<?= $this->extend('layout/template'); ?>
<?= $this->section('css') ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<?php
if (!function_exists('orderStatusLabel')) {
    function orderStatusLabel($status)
    {
        if ($status == 'pending') {
            return 'Menunggu';
        } elseif ($status == 'processing') {
            return 'Diproses';
        } elseif ($status == 'shipped') {
            return 'Dikirim';
        } elseif ($status == 'delivered') {
            return 'Terkirim';
        } elseif ($status == 'cancelled') {
            return 'Dibatalkan';
        }

        return '-';
    }
}

if (!function_exists('orderStatusColor')) {
    function orderStatusColor($status)
    {
        if ($status == 'pending') {
            return 'bg-warning';
        } elseif ($status == 'processing') {
            return 'bg-info';
        } elseif ($status == 'shipped') {
            return 'bg-primary';
        } elseif ($status == 'delivered') {
            return 'bg-success';
        } elseif ($status == 'cancelled') {
            return 'bg-danger';
        }

        return 'bg-secondary';
    }
}

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
                        <a class="list-group-item list-group-item-action d-flex align-items-center pe-none active"
                            href="<?= base_url('my-orders') ?>">
                            <i class="ci-shopping-bag fs-base opacity-75 me-2"></i>
                            Pesanan Saya
                            <span class="badge bg-primary rounded-pill ms-auto"><?= esc($orderCount ?? 0) ?></span>
                        </a>

                        <a class="list-group-item list-group-item-action d-flex align-items-center"
                            href="<?= base_url('wishlist') ?>">
                            <i class="ci-heart fs-base opacity-75 me-2"></i>
                            Produk Favorit
                            <span class="badge bg-primary rounded-pill ms-auto"><?= esc($wishlistCount ?? 0) ?></span>
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
                            href="<?= base_url('logout') ?>">
                            <i class="ci-log-out fs-base opacity-75 me-2"></i>
                            Keluar
                        </a>
                    </nav>
                </div>
            </div>
        </aside>

        <div class="col-lg-9">
            <div class="ps-lg-3 ps-xl-0">

                <div class="row align-items-center pb-3 pb-md-4 mb-md-1 mb-lg-2">
                    <div class="col-md-4 col-xl-6 mb-3 mb-md-0">
                        <h1 class="h2 me-3 mb-0">Pesanan Saya</h1>
                    </div>

                    <div class="col-md-8 col-xl-6">
                        <div class="row row-cols-1 row-cols-sm-2 g-3 g-xxl-4">
                            <div class="col">
                                <select class="form-select" id="status">
                                    <option value="">Semua Status</option>
                                    <option value="pending">Menunggu</option>
                                    <option value="processing">Diproses</option>
                                    <option value="shipped">Dikirim</option>
                                    <option value="delivered">Terkirim</option>
                                    <option value="cancelled">Dibatalkan</option>
                                </select>
                            </div>
                            <div class="col">
                                <select class="form-select" id="period">
                                    <option value="">Semua Waktu</option>
                                    <option value="last-year">1 Tahun Terakhir</option>
                                    <option value="last-3-months">3 Bulan Terakhir</option>
                                    <option value="last-30-days">30 Hari Terakhir</option>
                                    <option value="last-week">1 Minggu Terakhir</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table align-middle fs-sm text-nowrap">
                        <thead>
                            <tr>
                                <th scope="col" class="py-3 ps-0">
                                    <span class="text-body fw-normal">No. Pesanan</span>
                                </th>
                                <th scope="col" class="py-3 d-none d-md-table-cell">
                                    <span class="text-body fw-normal">Tanggal</span>
                                </th>
                                <th scope="col" class="py-3 d-none d-md-table-cell">
                                    <span class="text-body fw-normal">Status</span>
                                </th>
                                <th scope="col" class="py-3 d-none d-md-table-cell">
                                    <span class="text-body fw-normal">Total Harga</span>
                                </th>
                                <th scope="col" class="py-3">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody class="text-body-emphasis orders-list" id="orders-list">
                            <?= view('Modul\My_orders\Views\viewOrders_list', ['orders' => $orders]) ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>

<div class="offcanvas offcanvas-end" id="orderDetails" tabindex="-1" aria-labelledby="orderDetailsLabel">
    <div class="offcanvas-header border-bottom">
        <h5 class="offcanvas-title" id="orderDetailsLabel">Detail Pesanan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body" id="order-detail-content">
        <div class="text-center py-5">
            <p class="text-muted mb-0">Pilih pesanan untuk melihat detail.</p>
        </div>
    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('js') ?>
<script>
$(document).ready(function() {
    $('#status, #period').change(function() {
        loadOrders();
    });
});

function loadOrders() {
    $.ajax({
        type: "POST",
        url: "/my-orders/filter",
        data: {
            status: $('#status').val(),
            period: $('#period').val(),
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
                $('#orders-list').html(response.html);
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
}

function detail(id) {
    $.ajax({
        type: "POST",
        url: "/my-orders/detail",
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
                $('#order-detail-content').html(response.html);

                var offcanvas = new bootstrap.Offcanvas(document.getElementById('orderDetails'));
                offcanvas.show();
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
}

function cancelOrder(id) {
    Swal.fire({
        title: 'Batalkan pesanan?',
        text: 'Pesanan yang sudah dibatalkan tidak dapat diproses kembali.',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Ya, Batalkan',
        cancelButtonText: 'Batal',
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "POST",
                url: "/my-orders/cancel",
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
                        Swal.fire({
                            position: "top-right",
                            icon: "success",
                            title: response.notif,
                            showConfirmButton: !1,
                            timer: 1500,
                            showCloseButton: !0,
                        });

                        loadOrders();

                        setTimeout(function() {
                            detail(id);
                        }, 500);
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
        }
    });
}
</script>
<?= $this->endSection() ?>