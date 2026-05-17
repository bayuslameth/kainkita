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

<?php if (!empty($products)) : ?>
<?php foreach ($products as $product) : ?>
<div class="col-6 col-md-4 mb-2 mb-sm-3 mb-md-0">
    <div class="animate-underline hover-effect-opacity">

        <div class="position-relative mb-3">
            <?php if ((int) $product['stock'] <= 0) : ?>
            <span class="badge text-bg-danger position-absolute top-0 start-0 z-2 mt-2 mt-sm-3 ms-2 ms-sm-3">
                Habis
            </span>
            <?php else : ?>
            <span class="badge text-bg-success position-absolute top-0 start-0 z-2 mt-2 mt-sm-3 ms-2 ms-sm-3">
                Tersedia
            </span>
            <?php endif; ?>

            <button type="button"
                class="btn btn-icon btn-secondary animate-pulse fs-base bg-transparent border-0 position-absolute top-0 end-0 z-2 mt-1 mt-sm-2 me-1 me-sm-2 btn-add-wishlist"
                data-product-id="<?= esc($product['id']) ?>" aria-label="Add to Wishlist">
                <i class="ci-heart animate-target"></i>
            </button>

            <a class="d-flex bg-body-tertiary rounded p-3" href="<?= base_url('product/' . $product['id']) ?>">
                <div class="ratio" style="--cz-aspect-ratio: calc(308 / 274 * 100%)">
                    <img src="<?= productImage($product['image_path']) ?>" class="object-fit-contain"
                        alt="<?= esc($product['product_name']) ?>">
                </div>
            </a>

            <?php if (!empty($product['size']) || !empty($product['motif'])) : ?>
            <div
                class="hover-effect-target position-absolute start-0 bottom-0 w-100 z-2 opacity-0 pb-2 pb-sm-3 px-2 px-sm-3">
                <div class="d-flex align-items-center justify-content-center gap-2 gap-xl-3 bg-body rounded-2 p-2">
                    <?php if (!empty($product['size'])) : ?>
                    <span class="fs-xs fw-medium text-secondary-emphasis py-1 px-sm-2">
                        <?= esc($product['size']) ?>
                    </span>
                    <?php endif; ?>

                    <?php if (!empty($product['motif'])) : ?>
                    <span class="fs-xs fw-medium text-secondary-emphasis py-1 px-sm-2">
                        <?= esc($product['motif']) ?>
                    </span>
                    <?php endif; ?>
                </div>
            </div>
            <?php endif; ?>
        </div>

        <div class="nav mb-2">
            <a class="nav-link animate-target min-w-0 text-dark-emphasis p-0"
                href="<?= base_url('product/' . $product['id']) ?>">
                <span class="text-truncate">
                    <?= esc($product['product_name']) ?>
                </span>
            </a>
        </div>

        <div class="h6 mb-2">
            <?= formatRupiah($product['price']) ?>
        </div>

        <div class="mt-3">
            <button type="button" class="btn btn-sm btn-dark w-100 btn-add-cart"
                data-product-id="<?= esc($product['id']) ?>">
                <i class="ci-shopping-bag me-1"></i>
                Tambah Keranjang
            </button>
        </div>

        <div class="fs-xs text-body-secondary">
            <?php if (!empty($product['umkm_name'])) : ?>
            <?= esc($product['umkm_name']) ?>
            <?php elseif (!empty($product['region'])) : ?>
            <?= esc($product['region']) ?>
            <?php elseif (!empty($product['category_name'])) : ?>
            <?= esc($product['category_name']) ?>
            <?php else : ?>
            Produk Lokal
            <?php endif; ?>
        </div>

        <?php if (!empty($product['color'])) : ?>
        <div class="fs-xs text-body-tertiary mt-1">
            Warna: <?= esc($product['color']) ?>
        </div>
        <?php endif; ?>

    </div>
</div>
<?php endforeach; ?>
<?php else : ?>
<div class="col-12">
    <div class="alert alert-light border text-center mb-0">
        Produk tidak ditemukan berdasarkan filter yang dipilih.
    </div>
</div>
<?php endif; ?>