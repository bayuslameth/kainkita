<?php
function formatRupiah($value)
{
    return 'Rp ' . number_format((float) $value, 0, ',', '.');
}

function productImage($imagePath)
{
    return !empty($imagePath)
        ? base_url($imagePath)
        : base_url('assets/images/no-image.png');
}
?>
<?= $this->extend('layout/template'); ?>
<?= $this->section('css') ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<section class="bg-body-tertiary">
    <div class="container">
        <div class="row">

            <div class="col-md-6 col-lg-5 d-flex flex-column">
                <div class="py-4 mt-auto">
                    <div class="swiper pb-1 pt-3 pt-sm-4 py-md-4 py-lg-3" data-swiper="{
                  &quot;spaceBetween&quot;: 24,
                  &quot;loop&quot;: true,
                  &quot;speed&quot;: 400,
                  &quot;controlSlider&quot;: &quot;#heroImages&quot;,
                  &quot;pagination&quot;: {
                    &quot;el&quot;: &quot;#sliderBullets&quot;,
                    &quot;clickable&quot;: true
                  },
                  &quot;autoplay&quot;: {
                    &quot;delay&quot;: 5500,
                    &quot;disableOnInteraction&quot;: false
                  }
                }">
                        <div class="swiper-wrapper align-items-center">

                            <div class="swiper-slide text-center text-md-start">
                                <p class="fs-xl mb-2 mb-lg-3 mb-xl-4">Koleksi Tenun & Batik Terbaru</p>
                                <h2 class="display-4 text-uppercase mb-4 mb-xl-5">Pesona Wastra <br
                                        class="d-none d-md-inline">Nusantara</h2>
                                <a class="btn btn-lg btn-outline-dark" href="shop-catalog-fashion.html">
                                    Beli Sekarang
                                    <i class="ci-arrow-up-right fs-lg ms-2 me-n1"></i>
                                </a>
                            </div>

                            <div class="swiper-slide text-center text-md-start">
                                <p class="fs-xl mb-2 mb-lg-3 mb-xl-4">Siap Tampil Elegan?</p>
                                <h2 class="display-4 text-uppercase mb-4 mb-xl-5">Pilihan Busana<br>Batik Pesta</h2>
                                <a class="btn btn-lg btn-outline-dark" href="shop-catalog-fashion.html">
                                    Beli Sekarang
                                    <i class="ci-arrow-up-right fs-lg ms-2 me-n1"></i>
                                </a>
                            </div>

                            <div class="swiper-slide text-center text-md-start">
                                <p class="fs-xl mb-2 mb-lg-3 mb-xl-4">Sentuhan Klasik untuk Gayamu</p>
                                <h2 class="display-4 text-uppercase mb-4 mb-xl-5">Diskon 50% <br>Koleksi Eksklusif</h2>
                                <a class="btn btn-lg btn-outline-dark" href="shop-catalog-fashion.html">
                                    Beli Sekarang
                                    <i class="ci-arrow-up-right fs-lg ms-2 me-n1"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div
                    class="d-flex justify-content-center justify-content-md-start pb-4 pb-xl-5 mt-n1 mt-md-auto mb-md-3 mb-lg-4">
                    <div class="swiper-pagination position-static w-auto pb-1" id="sliderBullets"></div>
                </div>
            </div>

            <div class="col-md-6 col-lg-7 align-self-end">
                <div class="position-relative ms-md-n4">
                    <div class="ratio" style="--cz-aspect-ratio: calc(662 / 770 * 100%)"></div>
                    <div class="swiper position-absolute top-0 start-0 w-100 h-100 user-select-none" id="heroImages"
                        data-swiper="{
                  &quot;allowTouchMove&quot;: false,
                  &quot;loop&quot;: true,
                  &quot;effect&quot;: &quot;fade&quot;,
                  &quot;fadeEffect&quot;: {
                    &quot;crossFade&quot;: true
                  }
                }">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <img src="assets/img/home/fashion/v1/hero-slider/01.png" class="rtl-flip" alt="Image">
                            </div>
                            <div class="swiper-slide">
                                <img src="assets/img/home/fashion/v1/hero-slider/02.png" class="rtl-flip" alt="Image">
                            </div>
                            <div class="swiper-slide">
                                <img src="assets/img/home/fashion/v1/hero-slider/03.png" class="rtl-flip" alt="Image">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="container py-5 my-2 my-sm-3 my-lg-4 my-xl-5">
    <div class="row align-items-lg-center py-xxl-3">

        <div class="col-md-6 col-xl-5 offset-xl-1 order-md-2 mb-4 mb-md-0">
            <div class="ps-md-3 ps-lg-4 ps-xl-0">
                <div class="d-flex align-items-center justify-content-between pb-4 mb-md-1 mb-lg-2 mb-xl-3">
                    <h2 class="me-3 mb-0">Produk Terpopuler</h2>

                    <div class="d-flex gap-2">
                        <button type="button"
                            class="btn btn-icon btn-outline-secondary animate-slide-start rounded-circle me-1"
                            id="popularPrev" aria-label="Prev">
                            <i class="ci-chevron-left fs-lg animate-target"></i>
                        </button>
                        <button type="button"
                            class="btn btn-icon btn-outline-secondary animate-slide-end rounded-circle" id="popularNext"
                            aria-label="Next">
                            <i class="ci-chevron-right fs-lg animate-target"></i>
                        </button>
                    </div>
                </div>

                <div class="swiper" data-swiper="{
                &quot;spaceBetween&quot;: 24,
                &quot;loop&quot;: true,
                &quot;speed&quot;: 400,
                &quot;controlSlider&quot;: &quot;#sliderImages&quot;,
                &quot;navigation&quot;: {
                  &quot;prevEl&quot;: &quot;#popularPrev&quot;,
                  &quot;nextEl&quot;: &quot;#popularNext&quot;
                }
              }">
                    <div class="swiper-wrapper">

                        <div class="swiper-wrapper">

                            <?php if (!empty($popularProducts)) : ?>
                            <?php foreach (array_chunk($popularProducts, 3) as $chunk) : ?>
                            <div class="swiper-slide">
                                <div class="d-flex flex-column gap-3 gap-lg-4">

                                    <?php foreach ($chunk as $product) : ?>
                                    <div
                                        class="d-flex align-items-center position-relative bg-body-tertiary rounded overflow-hidden animate-underline">
                                        <img src="<?= productImage($product['image_path']) ?>" width="110" height="110"
                                            class="object-fit-cover" alt="<?= esc($product['product_name']) ?>">

                                        <div class="nav flex-column gap-2 min-w-0 p-3">
                                            <a class="nav-link text-dark-emphasis stretched-link w-100 min-w-0 p-0"
                                                href="<?= base_url('product/detail/' . $product['id']) ?>">
                                                <span class="animate-target text-truncate">
                                                    <?= esc($product['product_name']) ?>
                                                </span>
                                            </a>

                                            <div class="h6 mb-0">
                                                <?= formatRupiah($product['price']) ?>
                                            </div>

                                            <?php if (!empty($product['region'])) : ?>
                                            <small class="text-body-secondary">
                                                <?= esc($product['region']) ?>
                                            </small>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <?php endforeach; ?>

                                </div>
                            </div>
                            <?php endforeach; ?>
                            <?php else : ?>
                            <div class="swiper-slide">
                                <div class="alert alert-light border mb-0">
                                    Produk belum tersedia.
                                </div>
                            </div>
                            <?php endif; ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 order-md-1">
            <div class="swiper user-select-none" id="sliderImages" data-swiper="{
              &quot;allowTouchMove&quot;: false,
              &quot;loop&quot;: true,
              &quot;effect&quot;: &quot;fade&quot;,
              &quot;fadeEffect&quot;: {
                &quot;crossFade&quot;: true
              }
            }">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="ratio d-none d-md-block" style="--cz-aspect-ratio: calc(720 / 636 * 100%)"></div>
                        <div class="ratio ratio-4x3 d-md-none"></div>
                        <img src="assets/img/home/fashion/v1/popular/01.jpg"
                            class="position-absolute top-0 start-0 w-100 h-100 object-fit-cover rounded-5" alt="Image">
                    </div>
                    <div class="swiper-slide">
                        <div class="ratio d-none d-md-block" style="--cz-aspect-ratio: calc(720 / 636 * 100%)"></div>
                        <div class="ratio ratio-4x3 d-md-none"></div>
                        <img src="assets/img/home/fashion/v1/popular/02.jpg"
                            class="position-absolute top-0 start-0 w-100 h-100 object-fit-cover rounded-5"
                            style="object-position: center top" alt="Image">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="container pb-5 mb-2 mb-sm-3 mb-lg-4 mb-xl-5">
    <h2 class="text-center pb-2 pb-sm-3">Sorotan Minggu Ini</h2>

    <div class="row g-0 overflow-x-auto pb-2 pb-sm-3 mb-3">
        <div class="col-auto pb-1 pb-sm-0 mx-auto">
            <ul class="nav nav-pills flex-nowrap text-nowrap">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#!">Terlaris</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#!">Terbaru</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#!">Promo Diskon</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#!">Penilaian Tertinggi</a>
                </li>
            </ul>
        </div>
    </div>

    <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 gy-4 gy-md-5 pb-xxl-3">

        <?php if (!empty($products)) : ?>
        <?php foreach ($products as $product) : ?>
        <div class="col mb-2 mb-sm-3 mb-md-0">
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

                    <a class="d-flex bg-body-tertiary rounded p-3"
                        href="<?= base_url('product/detail/' . $product['id']) ?>">
                        <div class="ratio" style="--cz-aspect-ratio: calc(308 / 274 * 100%)">
                            <img src="<?= productImage($product['image_path']) ?>" class="object-fit-contain"
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
                    <a class="nav-link animate-target min-w-0 text-dark-emphasis p-0"
                        href="<?= base_url('product/detail/' . $product['id']) ?>">
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

                <div class="position-relative">
                    <?php if (!empty($product['color'])) : ?>
                    <div class="hover-effect-target fs-xs text-body-secondary opacity-100">
                        Warna: <?= esc($product['color']) ?>
                    </div>
                    <?php elseif (!empty($product['category_name'])) : ?>
                    <div class="hover-effect-target fs-xs text-body-secondary opacity-100">
                        <?= esc($product['category_name']) ?>
                    </div>
                    <?php endif; ?>

                    <?php if (!empty($product['umkm_name'])) : ?>
                    <div class="fs-xs text-body-tertiary mt-1">
                        UMKM: <?= esc($product['umkm_name']) ?>
                    </div>
                    <?php endif; ?>
                </div>

            </div>
        </div>
        <?php endforeach; ?>
        <?php else : ?>
        <div class="col-12">
            <div class="alert alert-light border text-center mb-0">
                Produk belum tersedia.
            </div>
        </div>
        <?php endif; ?>

    </div>
</section>

<section class="container pb-5 mb-2 mb-sm-3 mb-lg-4 mb-xl-5">
    <div class="d-md-none text-center pb-3 mb-3">
        <p class="mb-2">Koleksi Terbaru</p>
        <h2 class="mb-0">Eksklusif Edisi KainKita</h2>
    </div>
    <div class="row align-items-center pb-xxl-3">

        <div class="col-md-7 order-md-2 mb-4 mb-md-0">
            <div class="swiper user-select-none" id="previewImages" data-swiper="{
              &quot;allowTouchMove&quot;: false,
              &quot;loop&quot;: true,
              &quot;effect&quot;: &quot;fade&quot;,
              &quot;fadeEffect&quot;: {
                &quot;crossFade&quot;: true
              }
            }">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="ratio" style="--cz-aspect-ratio: calc(720 / 746 * 100%)">
                            <img src="assets/img/home/fashion/v1/collection/01.jpg" class="rounded-5" alt="Image">
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="ratio" style="--cz-aspect-ratio: calc(720 / 746 * 100%)">
                            <img src="assets/img/home/fashion/v1/collection/02.jpg" class="rounded-5" alt="Image">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-5 order-md-1 text-center">
            <div class="d-none d-md-block pb-3 mb-2 mb-lg-3 mx-auto" style="max-width: 306px">
                <p class="mb-2">Koleksi Terbaru</p>
                <h2 class="mb-0">Eksklusif Edisi KainKita</h2>
            </div>
            <div class="d-flex align-items-center justify-content-center">

                <button type="button"
                    class="btn btn-icon btn-outline-secondary animate-slide-start rounded-circle mt-n5"
                    id="collectionPrev" aria-label="Prev">
                    <i class="ci-chevron-left fs-lg animate-target"></i>
                </button>

                <div class="swiper mx-3 mx-lg-4" data-swiper="{
                &quot;spaceBetween&quot;: 24,
                &quot;loop&quot;: true,
                &quot;speed&quot;: 400,
                &quot;controlSlider&quot;: &quot;#previewImages&quot;,
                &quot;navigation&quot;: {
                  &quot;prevEl&quot;: &quot;#collectionPrev&quot;,
                  &quot;nextEl&quot;: &quot;#collectionNext&quot;
                }
              }" style="max-width: 306px">
                    <div class="swiper-wrapper">

                        <div class="swiper-slide">
                            <div class="animate-underline hover-effect-opacity">
                                <a class="d-flex bg-body-tertiary rounded p-3 mb-3" href="shop-product-fashion.html">
                                    <div class="ratio" style="--cz-aspect-ratio: calc(308 / 274 * 100%)">
                                        <img src="assets/img/shop/fashion/03.png" alt="Image">
                                    </div>
                                </a>
                                <div class="nav justify-content-center mb-2">
                                    <a class="nav-link animate-target min-w-0 text-dark-emphasis p-0"
                                        href="shop-product-fashion.html">
                                        <span class="text-truncate">Sepatu Kets Detail Motif Megamendung</span>
                                    </a>
                                </div>
                                <div class="h6 mb-0">Rp 280.000</div>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="animate-underline hover-effect-opacity">
                                <a class="d-flex bg-body-tertiary rounded p-3 mb-3" href="shop-product-fashion.html">
                                    <div class="ratio" style="--cz-aspect-ratio: calc(308 / 274 * 100%)">
                                        <img src="assets/img/shop/fashion/12.png" alt="Image">
                                    </div>
                                </a>
                                <div class="nav justify-content-center mb-2">
                                    <a class="nav-link animate-target min-w-0 text-dark-emphasis p-0"
                                        href="shop-product-fashion.html">
                                        <span class="text-truncate">Outer Kimono Batik Cap</span>
                                    </a>
                                </div>
                                <div class="h6 mb-0">Rp 350.000</div>
                            </div>
                        </div>
                    </div>
                </div>

                <button type="button" class="btn btn-icon btn-outline-secondary animate-slide-end rounded-circle mt-n5"
                    id="collectionNext" aria-label="Next">
                    <i class="ci-chevron-right fs-lg animate-target"></i>
                </button>
            </div>
        </div>
    </div>
</section>

<!-- Reviews carousel -->
<section class="bg-body-tertiary py-5">
    <div class="container py-1 py-sm-2 py-md-3 py-lg-4 py-xl-5">
        <h2 class="text-center pb-2 pb-md-3 pb-lg-4 pt-xxl-3">Happy customers</h2>
        <div class="position-relative pb-xxl-3">

            <!-- External slider prev/next buttons visible on screens > 500px wide (sm breakpoint) -->
            <button type="button"
                class="btn btn-icon btn-outline-secondary bg-body rounded-circle animate-slide-start position-absolute top-50 start-0 z-2 translate-middle d-none d-sm-inline-flex mt-n4"
                id="reviewsPrev" aria-label="Prev">
                <i class="ci-chevron-left fs-lg animate-target"></i>
            </button>
            <button type="button"
                class="btn btn-icon btn-outline-secondary bg-body rounded-circle animate-slide-end position-absolute top-50 start-100 z-2 translate-middle d-none d-sm-inline-flex mt-n4"
                id="reviewsNext" aria-label="Next">
                <i class="ci-chevron-right fs-lg animate-target"></i>
            </button>

            <!-- Slider -->
            <div class="swiper" data-swiper="{
              &quot;slidesPerView&quot;: 1,
              &quot;spaceBetween&quot;: 24,
              &quot;loop&quot;: true,
              &quot;navigation&quot;: {
                &quot;prevEl&quot;: &quot;#reviewsPrev&quot;,
                &quot;nextEl&quot;: &quot;#reviewsNext&quot;
              },
              &quot;pagination&quot;: {
                &quot;el&quot;: &quot;.swiper-pagination&quot;,
                &quot;clickable&quot;: true
              },
              &quot;breakpoints&quot;: {
                &quot;600&quot;: {
                  &quot;slidesPerView&quot;: 2
                },
                &quot;992&quot;: {
                  &quot;slidesPerView&quot;: 3
                }
              }
            }">
                <div class="swiper-wrapper">

                    <!-- Review -->
                    <div class="swiper-slide h-auto">
                        <div class="card h-100 border-0 rounded-4 p-sm-2">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="ratio ratio-1x1 flex-shrink-0" style="max-width: 80px">
                                        <img src="assets/img/home/fashion/v1/reviews/01.png" width="80" alt="Image">
                                    </div>
                                    <div class="ps-2 ms-1">
                                        <div class="d-flex gap-1 fs-xs pb-2 mb-1">
                                            <i class="ci-star-filled text-warning"></i>
                                            <i class="ci-star-filled text-warning"></i>
                                            <i class="ci-star-filled text-warning"></i>
                                            <i class="ci-star-filled text-warning"></i>
                                            <i class="ci-star-filled text-warning"></i>
                                        </div>
                                        <h3 class="h6 mb-0">Victoria Gardner</h3>
                                    </div>
                                </div>
                                <p class="mb-0">Very satisfied with the bag! A wonderful shopper, not too big and not
                                    too small, but as it should be 🔥 The bag looks more expensive than it costs.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Review -->
                    <div class="swiper-slide h-auto">
                        <div class="card h-100 border-0 rounded-4 p-sm-2">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="ratio ratio-1x1 flex-shrink-0" style="max-width: 80px">
                                        <img src="assets/img/home/fashion/v1/reviews/02.png" width="80" alt="Image">
                                    </div>
                                    <div class="ps-2 ms-1">
                                        <div class="d-flex gap-1 fs-xs pb-2 mb-1">
                                            <i class="ci-star-filled text-warning"></i>
                                            <i class="ci-star-filled text-warning"></i>
                                            <i class="ci-star-filled text-warning"></i>
                                            <i class="ci-star-filled text-warning"></i>
                                            <i class="ci-star-filled text-warning"></i>
                                        </div>
                                        <h3 class="h6 mb-0">Alexandra D.</h3>
                                    </div>
                                </div>
                                <p class="mb-0">A wonderful compact bag, holds a lot of things, good tailoring, smooth
                                    seams, strong fittings, good quality.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Review -->
                    <div class="swiper-slide h-auto">
                        <div class="card h-100 border-0 rounded-4 p-sm-2">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="ratio ratio-1x1 flex-shrink-0" style="max-width: 80px">
                                        <img src="assets/img/home/fashion/v1/reviews/03.png" width="80" alt="Image">
                                    </div>
                                    <div class="ps-2 ms-1">
                                        <div class="d-flex gap-1 fs-xs pb-2 mb-1">
                                            <i class="ci-star-filled text-warning"></i>
                                            <i class="ci-star-filled text-warning"></i>
                                            <i class="ci-star-filled text-warning"></i>
                                            <i class="ci-star-filled text-warning"></i>
                                            <i class="ci-star-filled text-warning"></i>
                                        </div>
                                        <h3 class="h6 mb-0">Jenny Wilson</h3>
                                    </div>
                                </div>
                                <p class="mb-0">Elegant blouse and the color is very nice, the seams are neat. 🛍
                                    Excellent quality fabric, for summer weather is very good because the fabric is
                                    light and does not stick to the body.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Review -->
                    <div class="swiper-slide h-auto">
                        <div class="card h-100 border-0 rounded-4 p-sm-2">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="ratio ratio-1x1 flex-shrink-0" style="max-width: 80px">
                                        <img src="assets/img/home/fashion/v1/reviews/04.png" width="80" alt="Image">
                                    </div>
                                    <div class="ps-2 ms-1">
                                        <div class="d-flex gap-1 fs-xs pb-2 mb-1">
                                            <i class="ci-star-filled text-warning"></i>
                                            <i class="ci-star-filled text-warning"></i>
                                            <i class="ci-star-filled text-warning"></i>
                                            <i class="ci-star-filled text-warning"></i>
                                            <i class="ci-star text-body-tertiary opacity-75"></i>
                                        </div>
                                        <h3 class="h6 mb-0">Kristin Watson</h3>
                                    </div>
                                </div>
                                <p class="mb-0">The quality is impeccable, sturdy yet stylish. They provide excellent
                                    support, comfortable for all-day wear. The massive design adds a unique edge to any
                                    outfit.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Review -->
                    <div class="swiper-slide h-auto">
                        <div class="card h-100 border-0 rounded-4 p-sm-2">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="ratio ratio-1x1 flex-shrink-0" style="max-width: 80px">
                                        <img src="assets/img/home/fashion/v1/reviews/05.png" width="80" alt="Image">
                                    </div>
                                    <div class="ps-2 ms-1">
                                        <div class="d-flex gap-1 fs-xs pb-2 mb-1">
                                            <i class="ci-star-filled text-warning"></i>
                                            <i class="ci-star-filled text-warning"></i>
                                            <i class="ci-star-filled text-warning"></i>
                                            <i class="ci-star-filled text-warning"></i>
                                            <i class="ci-star-filled text-warning"></i>
                                        </div>
                                        <h3 class="h6 mb-0">Daniel Adams</h3>
                                    </div>
                                </div>
                                <p class="mb-0">These sunglasses are a game-changer! Not only do they offer superior
                                    protection from the sun, but they also elevate my style.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pagination (Bullets) -->
                <div class="swiper-pagination position-static pt-3 mt-sm-1 mt-md-2 mt-lg-3"></div>
            </div>
        </div>
    </div>
</section>

<!-- Instagram feed -->
<section class="container pt-5 mt-1 mt-sm-2 mt-md-3 mt-lg-4 mt-xl-5">
    <div class="text-center pt-xxl-3 pb-2 pb-md-3">
        <h2 class="pb-2 mb-1">
            <span class="animate-underline">
                <a class="animate-target text-dark-emphasis text-decoration-none" href="#!">#cartzilla</a>
            </span>
        </h2>
        <p>Find more inspiration on our Instagram</p>
    </div>
    <div class="overflow-x-auto pb-3 mb-n3" data-simplebar="">
        <div class="d-flex gap-2 gap-md-3 gap-lg-4" style="min-width: 700px">
            <a class="hover-effect-scale hover-effect-opacity position-relative w-100 overflow-hidden" href="#!">
                <span
                    class="hover-effect-target position-absolute top-0 start-0 w-100 h-100 bg-black bg-opacity-25 opacity-0 z-1"></span>
                <i
                    class="ci-instagram hover-effect-target fs-4 text-white position-absolute top-50 start-50 translate-middle opacity-0 z-2"></i>
                <div class="hover-effect-target ratio ratio-1x1">
                    <img src="assets/img/instagram/01.jpg" alt="Instagram image">
                </div>
            </a>
            <a class="hover-effect-scale hover-effect-opacity position-relative w-100 overflow-hidden" href="#!">
                <span
                    class="hover-effect-target position-absolute top-0 start-0 w-100 h-100 bg-black bg-opacity-25 opacity-0 z-1"></span>
                <i
                    class="ci-instagram hover-effect-target fs-4 text-white position-absolute top-50 start-50 translate-middle opacity-0 z-2"></i>
                <div class="hover-effect-target ratio ratio-1x1">
                    <img src="assets/img/instagram/02.jpg" alt="Instagram image">
                </div>
            </a>
            <a class="hover-effect-scale hover-effect-opacity position-relative w-100 overflow-hidden" href="#!">
                <span
                    class="hover-effect-target position-absolute top-0 start-0 w-100 h-100 bg-black bg-opacity-25 opacity-0 z-1"></span>
                <i
                    class="ci-instagram hover-effect-target fs-4 text-white position-absolute top-50 start-50 translate-middle opacity-0 z-2"></i>
                <div class="hover-effect-target ratio ratio-1x1">
                    <img src="assets/img/instagram/03.jpg" alt="Instagram image">
                </div>
            </a>
            <a class="hover-effect-scale hover-effect-opacity position-relative w-100 overflow-hidden" href="#!">
                <span
                    class="hover-effect-target position-absolute top-0 start-0 w-100 h-100 bg-black bg-opacity-25 opacity-0 z-1"></span>
                <i
                    class="ci-instagram hover-effect-target fs-4 text-white position-absolute top-50 start-50 translate-middle opacity-0 z-2"></i>
                <div class="hover-effect-target ratio ratio-1x1">
                    <img src="assets/img/instagram/04.jpg" alt="Instagram image">
                </div>
            </a>
            <a class="hover-effect-scale hover-effect-opacity position-relative w-100 overflow-hidden" href="#!">
                <span
                    class="hover-effect-target position-absolute top-0 start-0 w-100 h-100 bg-black bg-opacity-25 opacity-0 z-1"></span>
                <i
                    class="ci-instagram hover-effect-target fs-4 text-white position-absolute top-50 start-50 translate-middle opacity-0 z-2"></i>
                <div class="hover-effect-target ratio ratio-1x1">
                    <img src="assets/img/instagram/05.jpg" alt="Instagram image">
                </div>
            </a>
        </div>
    </div>
</section>

<?= $this->endSection() ?>

<?= $this->section('js') ?>
<?= $this->endSection() ?>