<?= $this->extend('layout/template'); ?>

<?= $this->section('css') ?>
<style>
.order-product-img {
    width: 86px;
    height: 86px;
    object-fit: contain;
}

.order-summary-card {
    position: sticky;
    top: 100px;
}

.checkout-step-icon {
    width: 44px;
    height: 44px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    background: var(--cz-tertiary-bg);
    color: var(--cz-emphasis-color);
}
</style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<?php
if (!function_exists('formatRupiah')) {
    function formatRupiah($value)
    {
        return 'Rp ' . number_format((float) $value, 0, ',', '.');
    }
}

if (!function_exists('productImage')) {
    function productImage($imagePath)
    {
        return !empty($imagePath)
            ? base_url(ltrim($imagePath, '/'))
            : base_url('assets/images/no-image.png');
    }
}
?>

<nav class="container pt-2 pt-xxl-3 my-3 my-md-4" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="<?= base_url('home') ?>">Home</a>
        </li>
        <li class="breadcrumb-item">
            <a href="<?= base_url('katalog') ?>">Katalog</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">
            Checkout
        </li>
    </ol>
</nav>

<section class="container pb-5">
    <div class="d-flex align-items-center gap-3 mb-4">
        <span class="checkout-step-icon">
            <i class="ci-shopping-bag fs-lg"></i>
        </span>
        <div>
            <h1 class="h3 mb-1">Checkout Pesanan</h1>
            <p class="text-body-secondary mb-0">
                Lengkapi data pengiriman untuk menyelesaikan pembelian.
            </p>
        </div>
    </div>

    <form id="formOrder">
        <div class="row g-4">
            <div class="col-lg-8">

                <div class="card border-0 shadow-sm rounded-4 mb-4">
                    <div class="card-body p-4">
                        <h2 class="h5 mb-4">Data Pengiriman</h2>

                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Nama Lengkap</label>
                                <input type="text" name="full_name" class="form-control form-control-lg"
                                    value="<?= esc($customer['full_name'] ?? '') ?>" placeholder="Nama penerima">
                                <div class="invalid-feedback error-full_name"></div>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Nomor HP</label>
                                <input type="text" name="phone_number" class="form-control form-control-lg"
                                    value="<?= esc($customer['phone_number'] ?? '') ?>" placeholder="08xxxxxxxxxx">
                                <div class="invalid-feedback error-phone_number"></div>
                            </div>

                            <div class="col-12">
                                <label class="form-label">Alamat Lengkap</label>
                                <textarea name="address" class="form-control" rows="4"
                                    placeholder="Nama jalan, nomor rumah, RT/RW, kecamatan, kota/kabupaten"><?= esc($customer['address'] ?? '') ?></textarea>
                                <div class="invalid-feedback error-address"></div>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Kode Pos</label>
                                <input type="text" name="postal_code" class="form-control form-control-lg"
                                    value="<?= esc($customer['postal_code'] ?? '') ?>" placeholder="Contoh: 46115">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Kurir</label>
                                <select name="kurir" class="form-select form-select-lg">
                                    <option value="">Pilih kurir</option>
                                    <option value="jne">JNE</option>
                                    <option value="jnt">J&T</option>
                                    <option value="sicepat">SiCepat</option>
                                    <option value="pos">POS Indonesia</option>
                                </select>
                                <div class="invalid-feedback error-kurir"></div>
                            </div>

                            <div class="col-12">
                                <label class="form-label">Catatan</label>
                                <textarea name="catatan" class="form-control" rows="3"
                                    placeholder="Catatan untuk penjual atau kurir, opsional"></textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card border-0 shadow-sm rounded-4">
                    <div class="card-body p-4">
                        <h2 class="h5 mb-4">Metode Pembayaran</h2>

                        <div class="d-flex flex-column gap-3">
                            <label class="form-check border rounded-4 p-3">
                                <input class="form-check-input ms-0 me-3" type="radio" name="payment_method"
                                    value="transfer">
                                <span class="form-check-label">
                                    <span class="fw-semibold d-block">Transfer Bank</span>
                                    <span class="fs-sm text-body-secondary">Pembayaran manual melalui transfer.</span>
                                </span>
                            </label>

                            <label class="form-check border rounded-4 p-3">
                                <input class="form-check-input ms-0 me-3" type="radio" name="payment_method"
                                    value="cod">
                                <span class="form-check-label">
                                    <span class="fw-semibold d-block">COD</span>
                                    <span class="fs-sm text-body-secondary">Bayar saat barang diterima.</span>
                                </span>
                            </label>

                            <label class="form-check border rounded-4 p-3">
                                <input class="form-check-input ms-0 me-3" type="radio" name="payment_method"
                                    value="midtrans">
                                <span class="form-check-label">
                                    <span class="fw-semibold d-block">Midtrans</span>
                                    <span class="fs-sm text-body-secondary">Disiapkan untuk integrasi pembayaran
                                        otomatis.</span>
                                </span>
                            </label>
                        </div>

                        <div class="invalid-feedback d-block error-payment_method mt-2"></div>
                    </div>
                </div>

            </div>

            <div class="col-lg-4">
                <div class="card border-0 shadow-sm rounded-4 order-summary-card">
                    <div class="card-body p-4">
                        <h2 class="h5 mb-4">Ringkasan Pesanan</h2>

                        <div class="d-flex flex-column gap-3 mb-4">
                            <?php foreach ($items as $item) : ?>
                            <div class="d-flex gap-3">
                                <div class="bg-body-tertiary rounded-3 p-2 flex-shrink-0">
                                    <img src="<?= productImage($item['image_path']) ?>" class="order-product-img"
                                        alt="<?= esc($item['product_name']) ?>">
                                </div>

                                <div class="min-w-0 w-100">
                                    <div class="fw-semibold text-truncate">
                                        <?= esc($item['product_name']) ?>
                                    </div>

                                    <div class="fs-sm text-body-secondary">
                                        Qty: <?= esc($item['qty']) ?>
                                    </div>

                                    <div class="fs-sm text-body-secondary">
                                        <?= formatRupiah($item['price']) ?>
                                    </div>

                                    <div class="fw-semibold mt-1">
                                        <?= formatRupiah((float) $item['price'] * (int) $item['qty']) ?>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>

                        <hr>

                        <div class="d-flex justify-content-between mb-2">
                            <span class="text-body-secondary">Subtotal</span>
                            <span class="fw-semibold"><?= formatRupiah($subtotal) ?></span>
                        </div>

                        <div class="d-flex justify-content-between mb-2">
                            <span class="text-body-secondary">Ongkir</span>
                            <span class="fw-semibold"><?= formatRupiah($shippingCost) ?></span>
                        </div>

                        <div class="d-flex justify-content-between h5 mt-3 mb-4">
                            <span>Total</span>
                            <span><?= formatRupiah($grandTotal) ?></span>
                        </div>

                        <button type="submit" class="btn btn-dark btn-lg w-100">
                            Buat Pesanan
                            <i class="ci-arrow-up-right fs-lg ms-2"></i>
                        </button>

                        <a href="<?= base_url('katalog') ?>" class="btn btn-outline-secondary w-100 mt-2">
                            Lanjut Belanja
                        </a>

                        <div class="alert alert-light border fs-sm mt-3 mb-0">
                            Pesanan akan tersimpan dengan status pembayaran <strong>pending</strong>.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</section>

<?= $this->endSection() ?>

<?= $this->section('js') ?>
<script>
$(document).ready(function() {
    $('#formOrder').on('submit', function(e) {
        e.preventDefault();

        $('.is-invalid').removeClass('is-invalid');
        $('.invalid-feedback').text('');

        $.ajax({
            url: '<?= base_url('orders/store') ?>',
            type: 'POST',
            dataType: 'JSON',
            data: $(this).serialize(),
            beforeSend: function() {
                if (typeof showblockUI === 'function') {
                    showblockUI();
                }
            },
            complete: function() {
                if (typeof hideblockUI === 'function') {
                    hideblockUI();
                }
            },
            success: function(response) {
                if (!response.status) {
                    if (response.code === 'login_required') {
                        if (typeof showLoginRequiredModal === 'function') {
                            showLoginRequiredModal();
                        } else {
                            window.location.href = '<?= base_url('login') ?>';
                        }

                        return;
                    }

                    if (response.errors) {
                        $.each(response.errors, function(field, message) {
                            $('[name="' + field + '"]').addClass('is-invalid');
                            $('.error-' + field).text(message);
                        });
                    }

                    Swal.fire({
                        icon: 'warning',
                        title: 'Oops',
                        text: response.message || 'Pesanan belum bisa dibuat.'
                    });

                    return;
                }

                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: response.message || 'Order berhasil dibuat.',
                    showConfirmButton: false,
                    timer: 1200
                });

                setTimeout(function() {
                    window.location.href = response.redirect_url;
                }, 900);
            },
            error: function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal',
                    text: 'Gagal terhubung ke server.'
                });
            }
        });
    });
});
</script>
<?= $this->endSection() ?>