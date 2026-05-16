<?= $this->extend('layout/template'); ?>

<?= $this->section('css') ?>
<style>
.best-seller-hero {
    background: linear-gradient(135deg, #f7f2e8 0%, #eef3e6 100%);
    border-radius: 1.5rem;
}

.product-card-image {
    width: 100%;
    height: 220px;
    object-fit: contain;
}

.product-card {
    transition: all 0.25s ease;
}

.product-card:hover {
    transform: translateY(-4px);
}

.product-badge {
    z-index: 2;
}

@media (max-width: 576px) {
    .product-card-image {
        height: 160px;
    }
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
            ? base_url($imagePath)
            : base_url('assets/images/no-image.png');
    }
}
?>

<nav class="container pt-2 pt-xxl-3 my-3 my-md-4" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="<?= base_url('home') ?>">Beranda</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">Best Seller</li>
    </ol>
</nav>

<section class="container pb-4">
    <div class="best-seller-hero p-4 p-md-5">
        <div class="row align-items-center g-4">
            <div class="col-lg-7">
                <span class="badge rounded-pill text-bg-dark mb-3">
                    Produk Pilihan KainKita
                </span>

                <h1 class="display-6 fw-semibold mb-3">
                    Best Seller Produk Lokal
                </h1>

                <p class="fs-lg text-body-secondary mb-4">
                    Temukan koleksi kain, batik, tenun, dan produk UMKM terbaik yang paling direkomendasikan untuk gaya
                    harian maupun acara spesial.
                </p>

                <div class="d-flex flex-wrap gap-2">
                    <a href="<?= base_url('katalog') ?>" class="btn btn-dark">
                        Lihat Semua Katalog
                        <i class="ci-arrow-up-right fs-lg ms-2"></i>
                    </a>

                    <a href="#bestSellerProducts" class="btn btn-outline-dark">
                        Jelajahi Best Seller
                    </a>
                </div>
            </div>

            <div class="col-lg-5">
                <div class="row g-3">
                    <div class="col-6">
                        <div class="bg-white rounded-4 p-3 h-100 shadow-sm">
                            <div class="h2 mb-1"><?= count($bestSellerProducts) ?></div>
                            <div class="text-body-secondary fs-sm">Produk terbaik tersedia</div>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="bg-white rounded-4 p-3 h-100 shadow-sm">
                            <div class="h2 mb-1"><?= count($categories) ?></div>
                            <div class="text-body-secondary fs-sm">Kategori aktif</div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="bg-white rounded-4 p-3 shadow-sm">
                            <div class="d-flex align-items-center gap-3">
                                <div class="rounded-circle bg-dark text-white d-flex align-items-center justify-content-center"
                                    style="width: 46px; height: 46px;">
                                    <i class="ci-star-filled"></i>
                                </div>
                                <div>
                                    <div class="fw-semibold">Kurasi Produk Unggulan</div>
                                    <div class="fs-sm text-body-secondary">
                                        Diambil dari produk aktif dan stok tersedia.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="container py-4 py-md-5" id="bestSellerProducts">
    <div class="d-flex flex-column flex-md-row align-items-md-end justify-content-between gap-3 mb-4">
        <div>
            <span class="text-body-secondary fs-sm">Koleksi unggulan</span>
            <h2 class="h3 mb-0">Produk Terbaik</h2>
        </div>

        <div class="text-body-secondary fs-sm">
            Menampilkan <span class="fw-semibold text-body-emphasis"><?= count($bestSellerProducts) ?></span> produk
        </div>
    </div>

    <?php if (!empty($categories)) : ?>
    <div class="row g-2 mb-4">
        <div class="col-auto">
            <a href="<?= base_url('best-seller') ?>" class="btn btn-sm btn-dark rounded-pill">
                Semua
            </a>
        </div>

        <?php foreach ($categories as $category) : ?>
        <div class="col-auto">
            <button type="button" class="btn btn-sm btn-outline-secondary rounded-pill">
                <?= esc($category['category_name']) ?>
                <span class="ms-1">(<?= esc($category['total_products']) ?>)</span>
            </button>
        </div>
        <?php endforeach; ?>
    </div>
    <?php endif; ?>

    <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 gy-4 gy-md-5">
        <?php if (!empty($bestSellerProducts)) : ?>
        <?php foreach ($bestSellerProducts as $index => $product) : ?>
        <div class="col">
            <div class="product-card animate-underline hover-effect-opacity h-100">

                <div class="position-relative mb-3">
                    <?php if ($index < 3) : ?>
                    <span
                        class="product-badge badge text-bg-danger position-absolute top-0 start-0 mt-2 mt-sm-3 ms-2 ms-sm-3">
                        Top <?= $index + 1 ?>
                    </span>
                    <?php else : ?>
                    <span
                        class="product-badge badge text-bg-success position-absolute top-0 start-0 mt-2 mt-sm-3 ms-2 ms-sm-3">
                        Best Seller
                    </span>
                    <?php endif; ?>

                    <button type="button"
                        class="btn btn-icon btn-secondary animate-pulse fs-base bg-transparent border-0 position-absolute top-0 end-0 z-2 mt-1 mt-sm-2 me-1 me-sm-2 btn-add-wishlist"
                        data-product-id="<?= esc($product['id']) ?>" aria-label="Add to Wishlist">
                        <i class="ci-heart animate-target"></i>
                    </button>

                    <a class="d-flex bg-body-tertiary rounded-4 p-3" href="#!">
                        <div class="ratio" style="--cz-aspect-ratio: calc(308 / 274 * 100%)">
                            <img src="<?= productImage($product['image_path']) ?>" class="product-card-image"
                                alt="<?= esc($product['product_name']) ?>">
                        </div>
                    </a>

                    <?php if (!empty($product['size']) || !empty($product['motif'])) : ?>
                    <div
                        class="hover-effect-target position-absolute start-0 bottom-0 w-100 z-2 opacity-0 pb-2 pb-sm-3 px-2 px-sm-3">
                        <div
                            class="d-flex align-items-center justify-content-center gap-2 gap-xl-3 bg-body rounded-2 p-2">
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
                    <a class="nav-link animate-target min-w-0 text-dark-emphasis p-0" href="#!">
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

                <div class="d-flex flex-column gap-1">
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

                    <?php if (!empty($product['category_name'])) : ?>
                    <div class="fs-xs text-body-tertiary">
                        Kategori: <?= esc($product['category_name']) ?>
                    </div>
                    <?php endif; ?>

                    <?php if (!empty($product['color'])) : ?>
                    <div class="fs-xs text-body-tertiary">
                        Warna: <?= esc($product['color']) ?>
                    </div>
                    <?php endif; ?>

                    <div class="fs-xs text-body-tertiary">
                        Stok tersedia: <?= esc($product['stock']) ?>
                    </div>
                </div>

            </div>
        </div>
        <?php endforeach; ?>
        <?php else : ?>
        <div class="col-12">
            <div class="alert alert-light border text-center mb-0">
                Produk best seller belum tersedia.
            </div>
        </div>
        <?php endif; ?>
    </div>
</section>


<section class="container pb-5 mb-2 mb-sm-3 mb-lg-4">
    <div class="bg-body-tertiary rounded-4 p-4 p-md-5">
        <div class="row align-items-center g-4">
            <div class="col-md-8">
                <h2 class="h4 mb-2">Mau lihat koleksi lainnya?</h2>
                <p class="text-body-secondary mb-0">
                    Jelajahi semua katalog produk lokal KainKita dari berbagai kategori dan mitra UMKM.
                </p>
            </div>

            <div class="col-md-4 text-md-end">
                <a href="<?= base_url('katalog') ?>" class="btn btn-dark">
                    Buka Katalog
                    <i class="ci-arrow-up-right fs-lg ms-2"></i>
                </a>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>

<?= $this->section('js') ?>
<?= $this->endSection() ?>