<?php if (!empty($orders)) : ?>
<?php foreach ($orders as $order) : ?>
<tr>
    <td class="fw-medium pt-2 pb-3 py-md-2 ps-0">
        <a class="d-inline-block animate-underline text-body-emphasis text-decoration-none py-2"
            href="javascript:void(0);" onclick="detail(<?= $order->id ?>)">
            <span class="animate-target"><?= esc($order->invoice_number) ?></span>
        </a>
        <ul class="list-unstyled fw-normal text-body m-0 d-md-none">
            <li><?= date('d M Y', strtotime($order->created_at)) ?></li>
            <li class="d-flex align-items-center">
                <span class="<?= orderStatusColor($order->status_pesanan) ?> rounded-circle p-1 me-2"></span>
                <?= orderStatusLabel($order->status_pesanan) ?>
            </li>
            <li class="fw-medium text-body-emphasis">
                Rp <?= number_format($order->grand_total, 0, ',', '.') ?>
            </li>
        </ul>
    </td>

    <td class="fw-medium py-3 d-none d-md-table-cell">
        <?= date('d M Y', strtotime($order->created_at)) ?>
    </td>

    <td class="fw-medium py-3 d-none d-md-table-cell">
        <span class="d-flex align-items-center">
            <span class="<?= orderStatusColor($order->status_pesanan) ?> rounded-circle p-1 me-2"></span>
            <?= orderStatusLabel($order->status_pesanan) ?>
        </span>
    </td>

    <td class="fw-medium py-3 d-none d-md-table-cell">
        Rp <?= number_format($order->grand_total, 0, ',', '.') ?>
    </td>

    <td class="py-3 pe-0">
        <span class="d-flex align-items-center justify-content-end position-relative gap-1 gap-sm-2 ms-n2 ms-sm-0">
            <?php if (!empty($order->items)) : ?>
            <?php foreach ($order->items as $item) : ?>
            <?php
                            $image = $item->image_path ? base_url($item->image_path) : base_url('assets/images/no-image.png');
                            ?>
            <span>
                <img src="<?= $image ?>" width="64" height="64" class="rounded object-fit-cover"
                    alt="<?= esc($item->product_name) ?>">
            </span>
            <?php endforeach; ?>
            <?php endif; ?>

            <?php if (($order->total_item ?? 0) > 4) : ?>
            <span class="fw-medium me-1">+<?= $order->total_item - 4 ?></span>
            <?php endif; ?>

            <a class="btn btn-icon btn-ghost btn-secondary stretched-link border-0" href="javascript:void(0);"
                onclick="detail(<?= $order->id ?>)">
                <i class="ci-chevron-right fs-lg"></i>
            </a>
        </span>
    </td>
</tr>
<?php endforeach; ?>
<?php else : ?>
<tr>
    <td colspan="5" class="text-center py-5">
        <img src="<?= base_url('assets/images/nodata.png') ?>" alt="No data" style="width: 100px;" class="mb-3">
        <h6 class="mb-1">Belum ada pesanan</h6>
        <p class="text-muted mb-0">Pesanan yang kamu buat akan tampil di halaman ini.</p>
    </td>
</tr>
<?php endif; ?>