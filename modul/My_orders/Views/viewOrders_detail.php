<div class="mb-4">
    <h6 class="mb-1"><?= esc($order->invoice_number) ?></h6>
    <div class="fs-sm text-muted">
        <?= date('d M Y H:i', strtotime($order->created_at)) ?>
    </div>
</div>

<div class="border-bottom pb-3 mb-3">
    <div class="d-flex justify-content-between mb-2">
        <span class="text-muted">Status Pesanan</span>
        <span class="fw-medium d-flex align-items-center">
            <span class="<?= orderStatusColor($order->status_pesanan) ?> rounded-circle p-1 me-2"></span>
            <?= orderStatusLabel($order->status_pesanan) ?>
        </span>
    </div>

    <div class="d-flex justify-content-between mb-2">
        <span class="text-muted">Status Pembayaran</span>
        <span class="fw-medium"><?= esc($order->status_pembayaran) ?></span>
    </div>

    <div class="d-flex justify-content-between mb-2">
        <span class="text-muted">Metode Pembayaran</span>
        <span class="fw-medium text-uppercase"><?= esc($order->payment_method) ?></span>
    </div>

    <?php if ($order->kurir) : ?>
    <div class="d-flex justify-content-between mb-2">
        <span class="text-muted">Kurir</span>
        <span class="fw-medium text-uppercase"><?= esc($order->kurir) ?></span>
    </div>
    <?php endif; ?>

    <?php if ($order->resi_pengiriman) : ?>
    <div class="d-flex justify-content-between">
        <span class="text-muted">Resi</span>
        <span class="fw-medium"><?= esc($order->resi_pengiriman) ?></span>
    </div>
    <?php endif; ?>
</div>

<div class="border-bottom pb-3 mb-3">
    <h6 class="mb-3">Produk</h6>

    <?php foreach ($details as $item) : ?>
    <?php
        $image = $item->image_path ? base_url($item->image_path) : base_url('assets/images/no-image.png');
        ?>
    <div class="d-flex gap-3 mb-3">
        <img src="<?= $image ?>" width="72" height="72" class="rounded object-fit-cover"
            alt="<?= esc($item->product_name) ?>">

        <div class="w-100">
            <h6 class="fs-sm mb-1"><?= esc($item->product_name) ?></h6>
            <div class="fs-xs text-muted mb-1"><?= esc($item->umkm_name ?? '-') ?></div>
            <div class="d-flex justify-content-between fs-sm">
                <span><?= $item->qty ?> x Rp <?= number_format($item->price, 0, ',', '.') ?></span>
                <span class="fw-medium">Rp <?= number_format($item->subtotal, 0, ',', '.') ?></span>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>

<div class="border-bottom pb-3 mb-3">
    <h6 class="mb-3">Alamat Pengiriman</h6>
    <p class="fs-sm mb-1"><?= esc($order->full_name) ?></p>
    <p class="fs-sm mb-1"><?= esc($order->phone_number ?? '-') ?></p>
    <p class="fs-sm text-muted mb-0"><?= esc($order->alamat_pengiriman) ?></p>
</div>

<div class="border-bottom pb-3 mb-3">
    <h6 class="mb-3">Ringkasan Pembayaran</h6>

    <div class="d-flex justify-content-between mb-2">
        <span class="text-muted">Subtotal</span>
        <span>Rp <?= number_format($order->total_price, 0, ',', '.') ?></span>
    </div>

    <div class="d-flex justify-content-between mb-2">
        <span class="text-muted">Ongkir</span>
        <span>Rp <?= number_format($order->shipping_cost, 0, ',', '.') ?></span>
    </div>

    <div class="d-flex justify-content-between fs-base fw-semibold">
        <span>Total</span>
        <span>Rp <?= number_format($order->grand_total, 0, ',', '.') ?></span>
    </div>
</div>

<?php if (in_array($order->status_pesanan, ['pending', 'processing'])) : ?>
<button type="button" class="btn btn-danger w-100" onclick="cancelOrder(<?= $order->id ?>)">
    Batalkan Pesanan
</button>
<?php endif; ?>