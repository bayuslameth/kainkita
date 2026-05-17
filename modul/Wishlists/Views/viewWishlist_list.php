<?php if (!empty($items)) : ?>
<?php foreach ($items as $item) : ?>
<?php
        $image = $item->image_path ? base_url($item->image_path) : base_url('assets/images/no-image.png');
        $rating = round($item->rating ?? 0);
        ?>
<div class="col">
    <div class="product-card animate-underline hover-effect-opacity bg-body rounded h-100">
        <div class="position-relative">
            <div class="position-absolute top-0 end-0 z-1 pt-1 pe-1 mt-2 me-2">
                <div class="form-check fs-lg">
                    <input type="checkbox" class="form-check-input select-card-check" value="<?= $item->id ?>"
                        data-product="<?= $item->product_id ?>">
                </div>
            </div>

            <button type="button" class="btn btn-icon btn-sm btn-light position-absolute top-0 start-0 z-1 mt-2 ms-2"
                onclick="removeWishlist(<?= $item->id ?>)" title="Hapus dari wishlist">
                <i class="ci-trash fs-sm"></i>
            </button>

            <a class="d-block rounded-top overflow-hidden p-3 p-sm-4"
                href="<?= base_url('products/detail/' . $item->product_id) ?>">
                <div class="ratio" style="--cz-aspect-ratio: calc(240 / 258 * 100%)">
                    <img src="<?= $image ?>" class="object-fit-cover" alt="<?= esc($item->product_name) ?>">
                </div>
            </a>
        </div>

        <div class="w-100 min-w-0 px-1 pb-2 px-sm-3 pb-sm-3">
            <div class="d-flex align-items-center gap-2 mb-2">
                <div class="d-flex gap-1 fs-xs">
                    <?php for ($i = 1; $i <= 5; $i++) : ?>
                    <?php if ($i <= $rating) : ?>
                    <i class="ci-star-filled text-warning"></i>
                    <?php else : ?>
                    <i class="ci-star text-body-tertiary opacity-75"></i>
                    <?php endif; ?>
                    <?php endfor; ?>
                </div>
                <span class="text-body-tertiary fs-xs">(<?= esc($item->total_review ?? 0) ?>)</span>
            </div>

            <h3 class="pb-1 mb-2">
                <a class="d-block fs-sm fw-medium text-truncate"
                    href="<?= base_url('products/detail/' . $item->product_id) ?>">
                    <span class="animate-target"><?= esc($item->product_name) ?></span>
                </a>
            </h3>

            <div class="fs-xs text-muted mb-2">
                <?= esc($item->umkm_name ?? '-') ?>
            </div>

            <div class="d-flex align-items-center justify-content-between">
                <div class="h5 lh-1 mb-0">
                    Rp <?= number_format($item->price, 0, ',', '.') ?>
                </div>

                <?php if ($item->stock > 0) : ?>
                <button type="button" class="product-card-button btn btn-icon btn-secondary animate-slide-end ms-2"
                    onclick="addToCart(<?= $item->product_id ?>)" aria-label="Add to Cart">
                    <i class="ci-shopping-cart fs-base animate-target"></i>
                </button>
                <?php else : ?>
                <button type="button" class="product-card-button btn btn-icon btn-secondary ms-2" disabled>
                    <i class="ci-shopping-cart fs-base"></i>
                </button>
                <?php endif; ?>
            </div>

            <?php if ($item->stock <= 0) : ?>
            <div class="fs-xs text-danger mt-2">Stok habis</div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php endforeach; ?>
<?php else : ?>
<div class="col-12">
    <div class="text-center py-5">
        <img src="<?= base_url('assets/images/nodata.png') ?>" alt="No data" style="width: 100px;" class="mb-3">
        <h6 class="mb-1">Wishlist masih kosong</h6>
        <p class="text-muted mb-0">Produk favorit yang kamu simpan akan tampil di halaman ini.</p>
    </div>
</div>
<?php endif; ?>