<?= $this->extend('layout/template'); ?>

<?= $this->section('css') ?>
<style>
.success-icon {
    width: 86px;
    height: 86px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    background: rgba(25, 135, 84, .12);
    color: #198754;
}

.success-icon i {
    font-size: 2.75rem;
}

.order-item-img {
    width: 72px;
    height: 72px;
    object-fit: contain;
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

<section class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">

            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body p-4 p-md-5 text-center">

                    <div class="success-icon mb-4">
                        <i class="ci-check"></i>
                    </div>

                    <h1 class="h3 mb-2">Order Berhasil Dibuat</h1>

                    <p class="text-body-secondary mb-4">
                        Terima kasih. Pesanan kamu sudah tersimpan dan sedang menunggu proses pembayaran atau
                        konfirmasi.
                    </p>

                    <div class="bg-body-tertiary rounded-4 p-4 text-start mb-4">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="fs-sm text-body-secondary">Nomor Invoice</div>
                                <div class="fw-semibold"><?= esc($order['invoice_number']) ?></div>
                            </div>

                            <div class="col-md-6">
                                <div class="fs-sm text-body-secondary">Total Pembayaran</div>
                                <div class="fw-semibold"><?= formatRupiah($order['grand_total']) ?></div>
                            </div>

                            <div class="col-md-6">
                                <div class="fs-sm text-body-secondary">Metode Pembayaran</div>
                                <div class="fw-semibold text-uppercase"><?= esc($order['payment_method']) ?></div>
                            </div>

                            <div class="col-md-6">
                                <div class="fs-sm text-body-secondary">Status</div>
                                <div class="fw-semibold">
                                    <?= esc($order['status_pembayaran']) ?> /
                                    <?= esc($order['status_pesanan']) ?>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="fs-sm text-body-secondary">Alamat Pengiriman</div>
                                <div class="fw-semibold"><?= nl2br(esc($order['alamat_pengiriman'])) ?></div>
                            </div>
                        </div>
                    </div>

                    <div class="text-start mb-4">
                        <h2 class="h5 mb-3">Produk Dibeli</h2>

                        <div class="d-flex flex-column gap-3">
                            <?php foreach ($items as $item) : ?>
                            <div class="d-flex gap-3 border rounded-4 p-3">
                                <div class="bg-body-tertiary rounded-3 p-2 flex-shrink-0">
                                    <img src="<?= productImage($item['image_path']) ?>" class="order-item-img"
                                        alt="<?= esc($item['product_name']) ?>">
                                </div>

                                <div class="min-w-0 w-100">
                                    <div class="fw-semibold text-truncate">
                                        <?= esc($item['product_name']) ?>
                                    </div>

                                    <div class="fs-sm text-body-secondary">
                                        <?= esc($item['qty']) ?> x <?= formatRupiah($item['price']) ?>
                                    </div>

                                    <div class="fw-semibold mt-1">
                                        <?= formatRupiah($item['subtotal']) ?>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <?php if ($order['payment_method'] == 'transfer') : ?>
                    <div class="alert alert-warning text-start">
                        <strong>Instruksi pembayaran:</strong><br>
                        Silakan transfer sesuai total pembayaran. Setelah pembayaran dilakukan,
                        admin akan memproses pesanan kamu.
                    </div>
                    <?php elseif ($order['payment_method'] == 'cod') : ?>
                    <div class="alert alert-info text-start">
                        <strong>COD dipilih:</strong><br>
                        Pembayaran dilakukan saat barang diterima.
                    </div>
                    <?php else : ?>
                    <div class="alert alert-info text-start">
                        <strong>Midtrans dipilih:</strong><br>
                        Integrasi pembayaran otomatis bisa ditambahkan setelah konfigurasi Midtrans aktif.
                    </div>
                    <?php endif; ?>

                    <div class="d-flex flex-column flex-sm-row gap-2 justify-content-center">
                        <a href="<?= base_url('katalog') ?>" class="btn btn-dark">
                            Lanjut Belanja
                        </a>

                        <a href="<?= base_url('home') ?>" class="btn btn-outline-secondary">
                            Kembali ke Home
                        </a>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>

<?= $this->endSection() ?>

<?= $this->section('js') ?>
<?= $this->endSection() ?>