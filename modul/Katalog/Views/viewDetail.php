<?= $this->extend('layout/template'); ?>

<?= $this->section('css') ?>
<style>
.product-main-image {
    width: 100%;
    height: 100%;
    object-fit: contain;
}

.product-thumb-image {
    width: 100%;
    height: 100%;
    object-fit: contain;
}

.product-info-box {
    border: 1px solid var(--cz-border-color);
    border-radius: 1rem;
}

.product-meta-icon {
    width: 42px;
    height: 42px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    background: var(--cz-tertiary-bg);
    color: var(--cz-emphasis-color);
    flex-shrink: 0;
}

.related-product-img {
    width: 100%;
    height: 100%;
    object-fit: contain;
}

.empty-product-image {
    min-height: 360px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 1rem;
    background:
        radial-gradient(circle at 20% 20%, rgba(121, 85, 61, .16), transparent 32%),
        radial-gradient(circle at 80% 80%, rgba(190, 140, 85, .22), transparent 34%),
        linear-gradient(135deg, #fff7ed 0%, #f3e3cf 100%);
    color: #7a543d;
}

.empty-product-image i {
    font-size: 5rem;
}

@media (max-width: 767.98px) {
    .empty-product-image {
        min-height: 260px;
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

if (!function_exists('productDetailUrl')) {
    function productDetailUrl($productId)
    {
        $id = function_exists('encrypt_url') ? encrypt_url($productId) : $productId;

        return base_url('katalog/' . $id);
    }
}

$mainImage = !empty($images[0]['image_path']) ? $images[0]['image_path'] : '';
$stock     = (int) ($product['stock'] ?? 0);
$stockBar  = $stock > 0 ? min(100, max(10, $stock * 10)) : 0;
?>

<!-- Breadcrumb -->
<nav class="container pt-2 pt-xxl-3 my-3 my-md-4" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="<?= base_url('home') ?>">Home</a>
        </li>
        <li class="breadcrumb-item">
            <a href="<?= base_url('katalog') ?>">Katalog</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">
            <?= esc($product['product_name']) ?>
        </li>
    </ol>
</nav>


<!-- Product gallery and details -->
<section class="container pb-5">
    <div class="row">

        <!-- Gallery -->
        <div class="col-md-6 pb-4 pb-md-0 mb-2 mb-sm-3 mb-md-0">
            <div class="position-relative">

                <?php if ($stock <= 0) : ?>
                <span class="badge text-bg-danger position-absolute top-0 start-0 z-2 mt-3 mt-sm-4 ms-3 ms-sm-4">
                    Habis
                </span>
                <?php else : ?>
                <span class="badge text-bg-success position-absolute top-0 start-0 z-2 mt-3 mt-sm-4 ms-3 ms-sm-4">
                    Tersedia
                </span>
                <?php endif; ?>

                <button type="button"
                    class="btn btn-icon btn-secondary animate-pulse fs-lg bg-transparent border-0 position-absolute top-0 end-0 z-2 mt-2 mt-sm-3 me-2 me-sm-3 btn-add-wishlist"
                    data-product-id="<?= esc($product['id']) ?>" aria-label="Add to Wishlist">
                    <i class="ci-heart animate-target"></i>
                </button>

                <?php if (!empty($mainImage)) : ?>
                <a class="hover-effect-scale hover-effect-opacity position-relative d-flex rounded overflow-hidden mb-3 mb-sm-4 mb-md-3 mb-lg-4"
                    href="<?= productImage($mainImage) ?>" data-glightbox="" data-gallery="product-gallery">
                    <i
                        class="ci-zoom-in hover-effect-target fs-3 text-white position-absolute top-50 start-50 translate-middle opacity-0 z-2"></i>

                    <div class="ratio hover-effect-target bg-body-tertiary rounded"
                        style="--cz-aspect-ratio: calc(706 / 636 * 100%)">
                        <img src="<?= productImage($mainImage) ?>" class="product-main-image"
                            alt="<?= esc($product['product_name']) ?>">
                    </div>
                </a>
                <?php else : ?>
                <div class="empty-product-image mb-3 mb-sm-4 mb-md-3 mb-lg-4">
                    <i class="fa-solid fa-shirt"></i>
                </div>
                <?php endif; ?>
            </div>

            <?php if (!empty($images) && count($images) > 1) : ?>
            <div class="collapse d-md-block" id="morePictures">
                <div class="row row-cols-2 g-3 g-sm-4 g-md-3 g-lg-4 pb-3 pb-sm-4 pb-md-0">
                    <?php foreach (array_slice($images, 1) as $image) : ?>
                    <div class="col">
                        <a class="hover-effect-scale hover-effect-opacity position-relative d-flex rounded overflow-hidden"
                            href="<?= productImage($image['image_path']) ?>" data-glightbox=""
                            data-gallery="product-gallery">
                            <i
                                class="ci-zoom-in hover-effect-target fs-3 text-white position-absolute top-50 start-50 translate-middle opacity-0 z-2"></i>

                            <div class="ratio hover-effect-target bg-body-tertiary rounded"
                                style="--cz-aspect-ratio: calc(342 / 306 * 100%)">
                                <img src="<?= productImage($image['image_path']) ?>" class="product-thumb-image"
                                    alt="<?= esc($product['product_name']) ?>">
                            </div>
                        </a>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <button type="button" class="btn btn-lg btn-outline-secondary w-100 collapsed d-md-none"
                data-bs-toggle="collapse" data-bs-target="#morePictures" aria-expanded="false"
                aria-controls="morePictures">
                Tampilkan gambar lainnya
                <i class="collapse-toggle-icon ci-chevron-down fs-lg ms-2 me-n2"></i>
            </button>
            <?php endif; ?>
        </div>


        <!-- Product details -->
        <div class="col-md-6">
            <div class="ps-md-4 ps-xl-5">

                <div class="d-flex flex-wrap gap-2 mb-3">
                    <?php if (!empty($product['category_name'])) : ?>
                    <span class="badge text-bg-secondary">
                        <?= esc($product['category_name']) ?>
                    </span>
                    <?php endif; ?>

                    <?php if (!empty($product['motif'])) : ?>
                    <span class="badge text-bg-light">
                        Motif: <?= esc($product['motif']) ?>
                    </span>
                    <?php endif; ?>
                </div>

                <h1 class="h3 mb-3">
                    <?= esc($product['product_name']) ?>
                </h1>

                <?php if (!empty($product['description'])) : ?>
                <p class="fs-sm mb-0">
                    <?= nl2br(esc($product['description'])) ?>
                </p>
                <?php else : ?>
                <p class="fs-sm mb-0 text-body-secondary">
                    Produk fashion lokal pilihan dari KainKita dengan sentuhan kain tradisional Indonesia.
                </p>
                <?php endif; ?>

                <div class="h4 d-flex align-items-center my-4">
                    <?= formatRupiah($product['price']) ?>
                </div>

                <div class="row row-cols-1 row-cols-sm-2 g-3 mb-4">

                    <?php if (!empty($product['umkm_name'])) : ?>
                    <div class="col">
                        <div class="product-info-box p-3 h-100">
                            <div class="d-flex align-items-center gap-3">
                                <span class="product-meta-icon">
                                    <i class="fa-solid fa-store"></i>
                                </span>
                                <div>
                                    <div class="fs-xs text-body-secondary">UMKM</div>
                                    <div class="fw-semibold"><?= esc($product['umkm_name']) ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>

                    <?php if (!empty($product['region'])) : ?>
                    <div class="col">
                        <div class="product-info-box p-3 h-100">
                            <div class="d-flex align-items-center gap-3">
                                <span class="product-meta-icon">
                                    <i class="fa-solid fa-location-dot"></i>
                                </span>
                                <div>
                                    <div class="fs-xs text-body-secondary">Daerah</div>
                                    <div class="fw-semibold"><?= esc($product['region']) ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>

                    <?php if (!empty($product['size'])) : ?>
                    <div class="col">
                        <div class="product-info-box p-3 h-100">
                            <div class="d-flex align-items-center gap-3">
                                <span class="product-meta-icon">
                                    <i class="fa-solid fa-ruler"></i>
                                </span>
                                <div>
                                    <div class="fs-xs text-body-secondary">Ukuran</div>
                                    <div class="fw-semibold"><?= esc($product['size']) ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>

                    <?php if (!empty($product['color'])) : ?>
                    <div class="col">
                        <div class="product-info-box p-3 h-100">
                            <div class="d-flex align-items-center gap-3">
                                <span class="product-meta-icon">
                                    <i class="fa-solid fa-palette"></i>
                                </span>
                                <div>
                                    <div class="fs-xs text-body-secondary">Warna</div>
                                    <div class="fw-semibold"><?= esc($product['color']) ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>

                    <?php if (!empty($product['weight'])) : ?>
                    <div class="col">
                        <div class="product-info-box p-3 h-100">
                            <div class="d-flex align-items-center gap-3">
                                <span class="product-meta-icon">
                                    <i class="fa-solid fa-weight-hanging"></i>
                                </span>
                                <div>
                                    <div class="fs-xs text-body-secondary">Berat</div>
                                    <div class="fw-semibold"><?= esc($product['weight']) ?> gram</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>

                    <div class="col">
                        <div class="product-info-box p-3 h-100">
                            <div class="d-flex align-items-center gap-3">
                                <span class="product-meta-icon">
                                    <i class="fa-solid fa-box"></i>
                                </span>
                                <div>
                                    <div class="fs-xs text-body-secondary">Stok</div>
                                    <div class="fw-semibold"><?= esc($stock) ?> tersedia</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Count input + Add to cart button -->
                <div class="d-flex gap-3 pb-3 pb-lg-4 mb-3">
                    <div class="count-input flex-shrink-0">
                        <button type="button" class="btn btn-icon btn-lg" id="btnQtyMinus" aria-label="Kurangi jumlah">
                            <i class="ci-minus"></i>
                        </button>

                        <input type="number" class="form-control form-control-lg" id="productQty" min="1" value="1"
                            readonly>

                        <button type="button" class="btn btn-icon btn-lg" id="btnQtyPlus" aria-label="Tambah jumlah">
                            <i class="ci-plus"></i>
                        </button>
                    </div>

                    <button type="button" class="btn btn-lg btn-dark w-100 btn-add-cart"
                        data-product-id="<?= esc($product['id']) ?>" <?= $stock <= 0 ? 'disabled' : '' ?>>
                        <i class="ci-shopping-bag me-2"></i>
                        <?= $stock <= 0 ? 'Stok Habis' : 'Tambah Keranjang' ?>
                    </button>

                    <button type="button" class="btn btn-lg btn-outline-dark w-100 mt-2" id="btnBuyNow"
                        data-product-id="<?= esc($product['id']) ?>" <?= $stock <= 0 ? 'disabled' : '' ?>>
                        <i class="ci-credit-card me-2"></i>
                        Beli Sekarang
                    </button>
                </div>

                <!-- Info list -->
                <ul class="list-unstyled gap-3 pb-3 pb-lg-4 mb-3">
                    <li class="d-flex flex-wrap fs-sm mb-2">
                        <span class="d-flex align-items-center fw-medium text-dark-emphasis me-2">
                            <i class="ci-delivery fs-base me-2"></i>
                            Estimasi pengiriman:
                        </span>
                        2 - 5 hari kerja setelah pembayaran
                    </li>

                    <li class="d-flex flex-wrap fs-sm">
                        <span class="d-flex align-items-center fw-medium text-dark-emphasis me-2">
                            <i class="ci-shield fs-base me-2"></i>
                            Produk:
                        </span>
                        Fashion lokal pilihan KainKita
                    </li>
                </ul>

                <div class="d-flex flex-wrap justify-content-between fs-sm mb-3">
                    <?php if ($stock > 0) : ?>
                    <span class="fw-medium text-dark-emphasis me-2">
                        Produk masih tersedia
                    </span>
                    <span>
                        <span class="fw-medium text-dark-emphasis"><?= esc($stock) ?></span> item dalam stok
                    </span>
                    <?php else : ?>
                    <span class="fw-medium text-danger me-2">
                        Produk sedang habis
                    </span>
                    <?php endif; ?>
                </div>

                <div class="progress" role="progressbar" aria-label="Left in stock"
                    aria-valuenow="<?= esc($stockBar) ?>" aria-valuemin="0" aria-valuemax="100" style="height: 4px">
                    <div class="progress-bar rounded-pill" style="width: <?= esc($stockBar) ?>%"></div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Sticky product preview + Add to cart CTA -->
<section class="sticky-product-banner sticky-top" data-sticky-element="">
    <div class="sticky-product-banner-inner pt-5">
        <div class="navbar container flex-nowrap align-items-center bg-body pt-4 pt-lg-5 mt-lg-n2">
            <div class="d-flex align-items-center min-w-0 ms-lg-2 me-3">
                <div class="ratio ratio-1x1 flex-shrink-0 bg-body-tertiary rounded overflow-hidden" style="width: 50px">
                    <?php if (!empty($mainImage)) : ?>
                    <img src="<?= productImage($mainImage) ?>" class="product-thumb-image"
                        alt="<?= esc($product['product_name']) ?>">
                    <?php else : ?>
                    <div class="d-flex align-items-center justify-content-center w-100 h-100">
                        <i class="fa-solid fa-shirt"></i>
                    </div>
                    <?php endif; ?>
                </div>

                <h4 class="h6 fw-medium d-none d-lg-block ps-3 mb-0">
                    <?= esc($product['product_name']) ?>
                </h4>

                <div class="w-100 min-w-0 d-lg-none ps-2">
                    <h4 class="fs-sm fw-medium text-truncate mb-1">
                        <?= esc($product['product_name']) ?>
                    </h4>
                    <div class="h6 mb-0">
                        <?= formatRupiah($product['price']) ?>
                    </div>
                </div>
            </div>

            <div class="h4 d-none d-lg-block mb-0 ms-auto me-4">
                <?= formatRupiah($product['price']) ?>
            </div>

            <div class="d-flex gap-2">
                <button type="button" class="btn btn-icon btn-secondary animate-pulse btn-add-wishlist"
                    data-product-id="<?= esc($product['id']) ?>" aria-label="Add to Wishlist">
                    <i class="ci-heart fs-base animate-target"></i>
                </button>

                <button type="button" class="btn btn-dark ms-auto d-none d-md-inline-flex px-4 btn-add-cart"
                    data-product-id="<?= esc($product['id']) ?>" <?= $stock <= 0 ? 'disabled' : '' ?>>
                    Tambah Keranjang
                </button>

                <button type="button" class="btn btn-icon btn-dark animate-slide-end ms-auto d-md-none btn-add-cart"
                    data-product-id="<?= esc($product['id']) ?>" <?= $stock <= 0 ? 'disabled' : '' ?>
                    aria-label="Add to Cart">
                    <i class="ci-shopping-cart fs-base animate-target"></i>
                </button>
            </div>
        </div>
    </div>
</section>


<!-- Product details tabs -->
<section class="container pt-5 mt-2 mt-sm-3 mt-lg-4 mt-xl-5">

    <ul class="nav nav-underline flex-nowrap border-bottom" role="tablist">
        <li class="nav-item me-md-1" role="presentation">
            <button type="button" class="nav-link active" id="description-tab" data-bs-toggle="tab"
                data-bs-target="#description-tab-pane" role="tab" aria-controls="description-tab-pane"
                aria-selected="true">
                Deskripsi
            </button>
        </li>

        <li class="nav-item me-md-1" role="presentation">
            <button type="button" class="nav-link" id="washing-tab" data-bs-toggle="tab"
                data-bs-target="#washing-tab-pane" role="tab" aria-controls="washing-tab-pane" aria-selected="false">
                Perawatan
            </button>
        </li>

        <li class="nav-item me-md-1" role="presentation">
            <button type="button" class="nav-link" id="delivery-tab" data-bs-toggle="tab"
                data-bs-target="#delivery-tab-pane" role="tab" aria-controls="delivery-tab-pane" aria-selected="false">
                Pengiriman
            </button>
        </li>
    </ul>

    <div class="tab-content pt-4 mt-sm-1 mt-md-3">

        <div class="tab-pane fade show active" id="description-tab-pane" role="tabpanel"
            aria-labelledby="description-tab">
            <div class="row">
                <div class="col-lg-7 fs-sm">
                    <h6>Detail Produk</h6>

                    <?php if (!empty($product['description'])) : ?>
                    <p><?= nl2br(esc($product['description'])) ?></p>
                    <?php else : ?>
                    <p>
                        <?= esc($product['product_name']) ?> adalah produk fashion lokal dari KainKita
                        yang mengangkat nilai kain tradisional Indonesia dalam tampilan modern.
                    </p>
                    <?php endif; ?>

                    <ul class="mb-0">
                        <?php if (!empty($product['category_name'])) : ?>
                        <li>Kategori: <?= esc($product['category_name']) ?></li>
                        <?php endif; ?>

                        <?php if (!empty($product['motif'])) : ?>
                        <li>Motif: <?= esc($product['motif']) ?></li>
                        <?php endif; ?>

                        <?php if (!empty($product['color'])) : ?>
                        <li>Warna: <?= esc($product['color']) ?></li>
                        <?php endif; ?>

                        <?php if (!empty($product['size'])) : ?>
                        <li>Ukuran: <?= esc($product['size']) ?></li>
                        <?php endif; ?>

                        <?php if (!empty($product['weight'])) : ?>
                        <li>Berat: <?= esc($product['weight']) ?> gram</li>
                        <?php endif; ?>
                    </ul>
                </div>

                <div class="col-lg-5">
                    <div class="row row-cols-2 g-4 my-0 my-lg-n2">
                        <div class="col">
                            <div class="py-md-1 py-lg-2 pe-sm-2">
                                <i class="fa-solid fa-shirt fs-3 text-body-emphasis mb-2 mb-md-3"></i>
                                <h6 class="fs-sm mb-2">Fashion Lokal</h6>
                                <p class="fs-sm mb-0">
                                    Produk dipilih untuk mendukung gaya modern dengan sentuhan budaya.
                                </p>
                            </div>
                        </div>

                        <div class="col">
                            <div class="py-md-1 py-lg-2 ps-sm-2">
                                <i class="fa-solid fa-store fs-3 text-body-emphasis mb-2 mb-md-3"></i>
                                <h6 class="fs-sm mb-2">Dukung UMKM</h6>
                                <p class="fs-sm mb-0">
                                    Membantu UMKM fashion lokal menjangkau lebih banyak pelanggan.
                                </p>
                            </div>
                        </div>

                        <div class="col">
                            <div class="py-md-1 py-lg-2 pe-sm-2">
                                <i class="fa-solid fa-truck-fast fs-3 text-body-emphasis mb-2 mb-md-3"></i>
                                <h6 class="fs-sm mb-2">Pengiriman</h6>
                                <p class="fs-sm mb-0">
                                    Pesanan diproses setelah pembayaran dikonfirmasi.
                                </p>
                            </div>
                        </div>

                        <div class="col">
                            <div class="py-md-1 py-lg-2 ps-sm-2">
                                <i class="fa-solid fa-leaf fs-3 text-body-emphasis mb-2 mb-md-3"></i>
                                <h6 class="fs-sm mb-2">Budaya Lokal</h6>
                                <p class="fs-sm mb-0">
                                    Mengangkat nilai kain dan motif tradisional Indonesia.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="tab-pane fade fs-sm" id="washing-tab-pane" role="tabpanel" aria-labelledby="washing-tab">
            <p>
                Agar produk tetap awet dan nyaman digunakan, ikuti panduan perawatan berikut:
            </p>

            <ul class="mb-0">
                <li>Cuci dengan tangan atau mode lembut.</li>
                <li>Gunakan deterjen ringan.</li>
                <li>Hindari pemutih agar warna tetap terjaga.</li>
                <li>Jemur di tempat teduh dan hindari sinar matahari langsung terlalu lama.</li>
                <li>Setrika dengan suhu rendah hingga sedang sesuai bahan produk.</li>
            </ul>
        </div>

        <div class="tab-pane fade fs-sm" id="delivery-tab-pane" role="tabpanel" aria-labelledby="delivery-tab">
            <div class="row row-cols-1 row-cols-md-2">
                <div class="col mb-3 mb-md-0">
                    <h6>Pengiriman</h6>
                    <p>
                        Produk akan diproses setelah pembayaran berhasil dikonfirmasi.
                        Estimasi pengiriman menyesuaikan lokasi penerima dan layanan ekspedisi.
                    </p>
                    <ul class="mb-0">
                        <li>Estimasi proses: 1 - 2 hari kerja.</li>
                        <li>Estimasi sampai: 2 - 5 hari kerja.</li>
                    </ul>
                </div>

                <div class="col">
                    <h6>Pengembalian</h6>
                    <p class="mb-0">
                        Pengembalian dapat diajukan jika produk yang diterima tidak sesuai,
                        rusak, atau terdapat kesalahan pengiriman sesuai ketentuan KainKita.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>


<?php if (!empty($relatedProducts)) : ?>
<!-- Related products -->
<section class="container pt-5 mt-2 mt-sm-3 mt-lg-4 mt-xl-5">
    <div class="d-flex align-items-center justify-content-between pt-1 pt-lg-0 pb-3 mb-2 mb-sm-3">
        <h2 class="mb-0 me-3">Produk Serupa</h2>

        <div class="d-flex gap-2">
            <button type="button" class="btn btn-icon btn-outline-secondary animate-slide-start rounded-circle me-1"
                id="relatedPrev" aria-label="Prev">
                <i class="ci-chevron-left fs-lg animate-target"></i>
            </button>

            <button type="button" class="btn btn-icon btn-outline-secondary animate-slide-end rounded-circle"
                id="relatedNext" aria-label="Next">
                <i class="ci-chevron-right fs-lg animate-target"></i>
            </button>
        </div>
    </div>

    <div class="swiper" data-swiper="{
            &quot;slidesPerView&quot;: 2,
            &quot;spaceBetween&quot;: 24,
            &quot;loop&quot;: true,
            &quot;navigation&quot;: {
                &quot;prevEl&quot;: &quot;#relatedPrev&quot;,
                &quot;nextEl&quot;: &quot;#relatedNext&quot;
            },
            &quot;breakpoints&quot;: {
                &quot;768&quot;: {
                    &quot;slidesPerView&quot;: 3
                },
                &quot;992&quot;: {
                    &quot;slidesPerView&quot;: 4
                }
            }
        }">
        <div class="swiper-wrapper">

            <?php foreach ($relatedProducts as $item) : ?>
            <div class="swiper-slide">
                <div class="animate-underline hover-effect-opacity">

                    <div class="position-relative mb-3">
                        <?php if ((int) $item['stock'] <= 0) : ?>
                        <span
                            class="badge text-bg-danger position-absolute top-0 start-0 z-2 mt-2 mt-sm-3 ms-2 ms-sm-3">
                            Habis
                        </span>
                        <?php else : ?>
                        <span
                            class="badge text-bg-success position-absolute top-0 start-0 z-2 mt-2 mt-sm-3 ms-2 ms-sm-3">
                            Tersedia
                        </span>
                        <?php endif; ?>

                        <button type="button"
                            class="btn btn-icon btn-secondary animate-pulse fs-base bg-transparent border-0 position-absolute top-0 end-0 z-2 mt-1 mt-sm-2 me-1 me-sm-2 btn-add-wishlist"
                            data-product-id="<?= esc($item['id']) ?>" aria-label="Add to Wishlist">
                            <i class="ci-heart animate-target"></i>
                        </button>

                        <a class="d-flex bg-body-tertiary rounded p-3" href="<?= productDetailUrl($item['id']) ?>">
                            <div class="ratio" style="--cz-aspect-ratio: calc(308 / 274 * 100%)">
                                <img src="<?= productImage($item['image_path']) ?>" class="related-product-img"
                                    alt="<?= esc($item['product_name']) ?>">
                            </div>
                        </a>

                        <?php if (!empty($item['size']) || !empty($item['motif'])) : ?>
                        <div
                            class="hover-effect-target position-absolute start-0 bottom-0 w-100 z-2 opacity-0 pb-2 pb-sm-3 px-2 px-sm-3">
                            <div
                                class="d-flex align-items-center justify-content-center gap-2 gap-xl-3 bg-body rounded-2 p-2">
                                <?php if (!empty($item['size'])) : ?>
                                <span class="fs-xs fw-medium text-secondary-emphasis py-1 px-sm-2">
                                    <?= esc($item['size']) ?>
                                </span>
                                <?php endif; ?>

                                <?php if (!empty($item['motif'])) : ?>
                                <span class="fs-xs fw-medium text-secondary-emphasis py-1 px-sm-2">
                                    <?= esc($item['motif']) ?>
                                </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>

                    <div class="nav mb-2">
                        <a class="nav-link animate-target min-w-0 text-dark-emphasis p-0"
                            href="<?= productDetailUrl($item['id']) ?>">
                            <span class="text-truncate">
                                <?= esc($item['product_name']) ?>
                            </span>
                        </a>
                    </div>

                    <div class="h6 mb-2">
                        <?= formatRupiah($item['price']) ?>
                    </div>

                    <div class="fs-xs text-body-secondary">
                        <?php if (!empty($item['category_name'])) : ?>
                        <?= esc($item['category_name']) ?>
                        <?php elseif (!empty($item['umkm_name'])) : ?>
                        <?= esc($item['umkm_name']) ?>
                        <?php else : ?>
                        Produk Lokal
                        <?php endif; ?>
                    </div>

                </div>
            </div>
            <?php endforeach; ?>

        </div>
    </div>
</section>
<?php endif; ?>

<?= $this->endSection() ?>

<?= $this->section('js') ?>
<script>
$(document).ready(function() {
    $('#btnQtyPlus').on('click', function() {
        let qty = parseInt($('#productQty').val()) || 1;
        let stock = <?= (int) $stock ?>;

        if (stock > 0 && qty < stock) {
            $('#productQty').val(qty + 1);
        }
    });

    $('#btnQtyMinus').on('click', function() {
        let qty = parseInt($('#productQty').val()) || 1;

        if (qty > 1) {
            $('#productQty').val(qty - 1);
        }
    });

    $(document).on('click', '.btn-add-cart', function(e) {
        e.preventDefault();

        let productId = $(this).data('product-id');
        let qty = parseInt($('#productQty').val()) || 1;

        $.ajax({
            url: '<?= base_url('cart/add') ?>',
            type: 'POST',
            dataType: 'JSON',
            data: {
                product_id: productId,
                qty: qty
            },
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

                    Swal.fire({
                        icon: 'warning',
                        title: 'Oops',
                        text: response.message || 'Gagal menambahkan produk.'
                    });

                    return;
                }

                if (typeof refreshCart === 'function') {
                    refreshCart();
                }

                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: response.message ||
                        'Produk berhasil ditambahkan ke keranjang.',
                    showConfirmButton: false,
                    timer: 1400
                });
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

$(document).on('click', '#btnBuyNow', function(e) {
    e.preventDefault();

    let productId = $(this).data('product-id');
    let qty = parseInt($('#productQty').val()) || 1;

    $.ajax({
        url: '<?= base_url('orders/buyNow') ?>',
        type: 'POST',
        dataType: 'JSON',
        data: {
            product_id: productId,
            qty: qty
        },
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

                Swal.fire({
                    icon: 'warning',
                    title: 'Oops',
                    text: response.message || 'Gagal memproses pembelian.'
                });

                return;
            }

            window.location.href = response.redirect_url;
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
</script>
<?= $this->endSection() ?>