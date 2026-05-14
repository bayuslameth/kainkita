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

                        <div class="swiper-slide">
                            <div class="d-flex flex-column gap-3 gap-lg-4">
                                <div
                                    class="d-flex align-items-center position-relative bg-body-tertiary rounded overflow-hidden animate-underline">
                                    <img src="assets/img/shop/fashion/thumbs/01.png" width="110" alt="Thumbnail">
                                    <div class="nav flex-column gap-2 min-w-0 p-3">
                                        <a class="nav-link text-dark-emphasis stretched-link w-100 min-w-0 p-0"
                                            href="shop-product-fashion.html">
                                            <span class="animate-target text-truncate">Outer Batik Tulis Premium</span>
                                        </a>
                                        <div class="h6 mb-0">Rp 450.000</div>
                                    </div>
                                </div>
                                <div
                                    class="d-flex align-items-center position-relative bg-body-tertiary rounded overflow-hidden animate-underline">
                                    <img src="assets/img/shop/fashion/thumbs/02.png" width="110" alt="Thumbnail">
                                    <div class="nav flex-column gap-2 min-w-0 p-3">
                                        <a class="nav-link text-dark-emphasis stretched-link w-100 min-w-0 p-0"
                                            href="shop-product-fashion.html">
                                            <span class="animate-target text-truncate">Sepatu Selop Motif Tenun</span>
                                        </a>
                                        <div class="h6 mb-0">Rp 120.000</div>
                                    </div>
                                </div>
                                <div
                                    class="d-flex align-items-center position-relative bg-body-tertiary rounded overflow-hidden animate-underline">
                                    <img src="assets/img/shop/fashion/thumbs/03.png" width="110" alt="Thumbnail">
                                    <div class="nav flex-column gap-2 min-w-0 p-3">
                                        <a class="nav-link text-dark-emphasis stretched-link w-100 min-w-0 p-0"
                                            href="shop-product-fashion.html">
                                            <span class="animate-target text-truncate">Selendang Sutra Motif
                                                Klasik</span>
                                        </a>
                                        <div class="h6 mb-0">Rp 150.000</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="d-flex flex-column gap-3 gap-lg-4">
                                <div
                                    class="d-flex align-items-center position-relative bg-body-tertiary rounded overflow-hidden animate-underline">
                                    <img src="assets/img/shop/fashion/thumbs/04.png" width="110" alt="Thumbnail">
                                    <div class="nav flex-column gap-2 min-w-0 p-3">
                                        <a class="nav-link text-dark-emphasis stretched-link w-100 min-w-0 p-0"
                                            href="shop-product-fashion.html">
                                            <span class="animate-target text-truncate">Blazer Batik Modern
                                                Oversized</span>
                                        </a>
                                        <div class="h6 mb-0">Rp 320.000</div>
                                    </div>
                                </div>
                                <div
                                    class="d-flex align-items-center position-relative bg-body-tertiary rounded overflow-hidden animate-underline">
                                    <img src="assets/img/shop/fashion/thumbs/05.png" width="110" alt="Thumbnail">
                                    <div class="nav flex-column gap-2 min-w-0 p-3">
                                        <a class="nav-link text-dark-emphasis stretched-link w-100 min-w-0 p-0"
                                            href="shop-product-fashion.html">
                                            <span class="animate-target text-truncate">Kain Lilit Jumputan Elegan</span>
                                        </a>
                                        <div class="h6 mb-0">Rp 180.000</div>
                                    </div>
                                </div>
                                <div
                                    class="d-flex align-items-center position-relative bg-body-tertiary rounded overflow-hidden animate-underline">
                                    <img src="assets/img/shop/fashion/thumbs/06.png" width="110" alt="Thumbnail">
                                    <div class="nav flex-column gap-2 min-w-0 p-3">
                                        <a class="nav-link text-dark-emphasis stretched-link w-100 min-w-0 p-0"
                                            href="shop-product-fashion.html">
                                            <span class="animate-target text-truncate">Celana Kulot Batik Cap</span>
                                        </a>
                                        <div class="h6 mb-0">Rp 135.000</div>
                                    </div>
                                </div>
                            </div>
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

        <div class="col mb-2 mb-sm-3 mb-md-0">
            <div class="animate-underline hover-effect-opacity">
                <div class="position-relative mb-3">
                    <span
                        class="badge text-bg-danger position-absolute top-0 start-0 z-2 mt-2 mt-sm-3 ms-2 ms-sm-3">Promo</span>
                    <button type="button"
                        class="btn btn-icon btn-secondary animate-pulse fs-base bg-transparent border-0 position-absolute top-0 end-0 z-2 mt-1 mt-sm-2 me-1 me-sm-2"
                        aria-label="Add to Wishlist">
                        <i class="ci-heart animate-target"></i>
                    </button>
                    <a class="d-flex bg-body-tertiary rounded p-3" href="shop-product-fashion.html">
                        <div class="ratio" style="--cz-aspect-ratio: calc(308 / 274 * 100%)">
                            <img src="assets/img/shop/fashion/01.png" alt="Image">
                        </div>
                    </a>
                    <div
                        class="hover-effect-target position-absolute start-0 bottom-0 w-100 z-2 opacity-0 pb-2 pb-sm-3 px-2 px-sm-3">
                        <div
                            class="d-flex align-items-center justify-content-center gap-2 gap-xl-3 bg-body rounded-2 p-2">
                            <span class="fs-xs fw-medium text-secondary-emphasis py-1 px-sm-2">XS</span>
                            <span class="fs-xs fw-medium text-secondary-emphasis py-1 px-sm-2">S</span>
                            <span class="fs-xs fw-medium text-secondary-emphasis py-1 px-sm-2">M</span>
                            <span class="fs-xs fw-medium text-secondary-emphasis py-1 px-sm-2">L</span>
                            <div class="nav">
                                <a class="nav-link fs-xs text-body-tertiary py-1 px-2"
                                    href="shop-product-fashion.html">+3</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="nav mb-2">
                    <a class="nav-link animate-target min-w-0 text-dark-emphasis p-0" href="shop-product-fashion.html">
                        <span class="text-truncate">Rok Lilit Batik Motif Parang</span>
                    </a>
                </div>
                <div class="h6 mb-2">Rp 126.500 <del class="fs-sm fw-normal text-body-tertiary">Rp 156.000</del></div>
                <div class="position-relative">
                    <div class="hover-effect-target fs-xs text-body-secondary opacity-100">+1 warna</div>
                    <div class="hover-effect-target d-flex gap-2 position-absolute top-0 start-0 opacity-0">
                        <input type="radio" class="btn-check" name="colors-1" id="color-1-1" checked="">
                        <label for="color-1-1" class="btn btn-color fs-base" style="color: #284971">
                            <span class="visually-hidden">Sogan Gelap</span>
                        </label>
                        <input type="radio" class="btn-check" name="colors-1" id="color-1-2">
                        <label for="color-1-2" class="btn btn-color fs-base" style="color: #8b9bc4">
                            <span class="visually-hidden">Motif Pesisir</span>
                        </label>
                    </div>
                </div>
            </div>
        </div>

        <div class="col mb-2 mb-sm-3 mb-md-0">
            <div class="animate-underline hover-effect-opacity">
                <div class="position-relative mb-3">
                    <button type="button"
                        class="btn btn-icon btn-secondary animate-pulse fs-base bg-transparent border-0 position-absolute top-0 end-0 z-2 mt-1 mt-sm-2 me-1 me-sm-2"
                        aria-label="Add to Wishlist">
                        <i class="ci-heart animate-target"></i>
                    </button>
                    <a class="d-flex bg-body-tertiary rounded p-3" href="shop-product-fashion.html">
                        <div class="ratio" style="--cz-aspect-ratio: calc(308 / 274 * 100%)">
                            <img src="assets/img/shop/fashion/08.png" alt="Image">
                        </div>
                    </a>
                    <div
                        class="hover-effect-target position-absolute start-0 bottom-0 w-100 z-2 opacity-0 pb-2 pb-sm-3 px-2 px-sm-3">
                        <div
                            class="d-flex align-items-center justify-content-center gap-2 gap-xl-3 bg-body rounded-2 p-2">
                            <span class="fs-xs fw-medium text-secondary-emphasis py-1 px-sm-2">39</span>
                            <span class="fs-xs fw-medium text-secondary-emphasis py-1 px-sm-2">40</span>
                            <span class="fs-xs fw-medium text-secondary-emphasis py-1 px-sm-2">41</span>
                            <span class="fs-xs fw-medium text-secondary-emphasis py-1 px-sm-2">42</span>
                            <div class="nav">
                                <a class="nav-link fs-xs text-body-tertiary py-1 px-2"
                                    href="shop-product-fashion.html">+3</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="nav mb-2">
                    <a class="nav-link animate-target min-w-0 text-dark-emphasis p-0" href="shop-product-fashion.html">
                        <span class="text-truncate">Kemeja Batik Pria Lengan Pendek</span>
                    </a>
                </div>
                <div class="h6 mb-2">Rp 175.000</div>
                <div class="position-relative">
                    <div class="hover-effect-target fs-xs text-body-secondary opacity-100">+2 warna</div>
                    <div class="hover-effect-target d-flex gap-2 position-absolute top-0 start-0 opacity-0">
                        <input type="radio" class="btn-check" name="colors-8" id="color-8-1" checked="">
                        <label for="color-8-1" class="btn btn-color fs-base" style="color: #b1aa9b">
                            <span class="visually-hidden">Krem</span>
                        </label>
                        <input type="radio" class="btn-check" name="colors-8" id="color-8-2">
                        <label for="color-8-2" class="btn btn-color fs-base" style="color: #496c33">
                            <span class="visually-hidden">Hijau Botol</span>
                        </label>
                        <input type="radio" class="btn-check" name="colors-8" id="color-8-3">
                        <label for="color-8-3" class="btn btn-color fs-base" style="color: #364254">
                            <span class="visually-hidden">Hitam</span>
                        </label>
                    </div>
                </div>
            </div>
        </div>

        <div class="col mb-2 mb-sm-3 mb-md-0">
            <div class="animate-underline hover-effect-opacity">
                <div class="position-relative mb-3">
                    <button type="button"
                        class="btn btn-icon btn-secondary animate-pulse fs-base bg-transparent border-0 position-absolute top-0 end-0 z-2 mt-1 mt-sm-2 me-1 me-sm-2"
                        aria-label="Add to Wishlist">
                        <i class="ci-heart animate-target"></i>
                    </button>
                    <a class="d-flex bg-body-tertiary rounded p-3" href="#!">
                        <div class="ratio" style="--cz-aspect-ratio: calc(308 / 274 * 100%)">
                            <img src="assets/img/shop/fashion/11.png" alt="Image">
                        </div>
                    </a>
                    <div
                        class="hover-effect-target position-absolute start-0 bottom-0 w-100 z-2 opacity-0 pb-2 pb-sm-3 px-2 px-sm-3">
                        <div
                            class="d-flex align-items-center justify-content-center gap-2 gap-xl-3 bg-body rounded-2 p-2">
                            <span class="fs-xs fw-medium text-secondary-emphasis py-1 px-sm-2">S</span>
                            <span class="fs-xs fw-medium text-secondary-emphasis py-1 px-sm-2">M</span>
                            <span class="fs-xs fw-medium text-secondary-emphasis py-1 px-sm-2">L</span>
                            <span class="fs-xs fw-medium text-secondary-emphasis py-1 px-sm-2">XL</span>
                            <div class="nav">
                                <a class="nav-link fs-xs text-body-tertiary py-1 px-2" href="#!">+1</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="nav mb-2">
                    <a class="nav-link animate-target min-w-0 text-dark-emphasis p-0" href="#!">
                        <span class="text-truncate">Tunik Batik Katun Halus</span>
                    </a>
                </div>
                <div class="h6 mb-2">Rp 145.000</div>
                <div class="position-relative">
                    <div class="hover-effect-target fs-xs text-body-secondary opacity-100">+2 warna</div>
                    <div class="hover-effect-target d-flex gap-2 position-absolute top-0 start-0 opacity-0">
                        <input type="radio" class="btn-check" name="colors-11" id="color-11-1" checked="">
                        <label for="color-11-1" class="btn btn-color fs-base" style="color: #42675f">
                            <span class="visually-hidden">Hijau Sage</span>
                        </label>
                        <input type="radio" class="btn-check" name="colors-11" id="color-11-2">
                        <label for="color-11-2" class="btn btn-color fs-base" style="color: #476585">
                            <span class="visually-hidden">Biru Malam</span>
                        </label>
                        <input type="radio" class="btn-check" name="colors-11" id="color-11-3">
                        <label for="color-11-3" class="btn btn-color fs-base" style="color: #724c74">
                            <span class="visually-hidden">Ungu Manggis</span>
                        </label>
                    </div>
                </div>
            </div>
        </div>

        <div class="col mb-2 mb-sm-3 mb-md-0">
            <div class="animate-underline hover-effect-opacity">
                <div class="position-relative mb-3">
                    <button type="button"
                        class="btn btn-icon btn-secondary animate-pulse fs-base bg-transparent border-0 position-absolute top-0 end-0 z-2 mt-1 mt-sm-2 me-1 me-sm-2"
                        aria-label="Add to Wishlist">
                        <i class="ci-heart animate-target"></i>
                    </button>
                    <a class="d-flex bg-body-tertiary rounded p-3" href="shop-product-fashion.html">
                        <div class="ratio" style="--cz-aspect-ratio: calc(308 / 274 * 100%)">
                            <img src="assets/img/shop/fashion/04.png" alt="Image">
                        </div>
                    </a>
                </div>
                <div class="nav mb-2">
                    <a class="nav-link animate-target min-w-0 text-dark-emphasis p-0" href="shop-product-fashion.html">
                        <span class="text-truncate">Tas Anyaman Pandan Detail Tenun</span>
                    </a>
                </div>
                <div class="h6 mb-2">Rp 210.000</div>
                <div class="position-relative">
                    <div class="hover-effect-target fs-xs text-body-secondary opacity-100">+1 warna</div>
                    <div class="hover-effect-target d-flex gap-2 position-absolute top-0 start-0 opacity-0">
                        <input type="radio" class="btn-check" name="colors-4" id="color-4-1" checked="">
                        <label for="color-4-1" class="btn btn-color fs-base" style="color: #e7ddb4">
                            <span class="visually-hidden">Natural</span>
                        </label>
                        <input type="radio" class="btn-check" name="colors-4" id="color-4-2">
                        <label for="color-4-2" class="btn btn-color fs-base" style="color: #8b9bc4">
                            <span class="visually-hidden">Aksen Biru</span>
                        </label>
                    </div>
                </div>
            </div>
        </div>

        <div class="col mb-2 mb-sm-3 mb-md-0">
            <div class="animate-underline hover-effect-opacity">
                <div class="position-relative mb-3">
                    <button type="button"
                        class="btn btn-icon btn-secondary animate-pulse fs-base bg-transparent border-0 position-absolute top-0 end-0 z-2 mt-1 mt-sm-2 me-1 me-sm-2"
                        aria-label="Add to Wishlist">
                        <i class="ci-heart animate-target"></i>
                    </button>
                    <a class="d-flex bg-body-tertiary rounded p-3" href="shop-product-fashion.html">
                        <div class="ratio" style="--cz-aspect-ratio: calc(308 / 274 * 100%)">
                            <img src="assets/img/shop/fashion/09.png" alt="Image">
                        </div>
                    </a>
                    <div
                        class="hover-effect-target position-absolute start-0 bottom-0 w-100 z-2 opacity-0 pb-2 pb-sm-3 px-2 px-sm-3">
                        <div
                            class="d-flex align-items-center justify-content-center gap-2 gap-xl-3 bg-body rounded-2 p-2">
                            <span class="fs-xs fw-medium text-secondary-emphasis py-1 px-sm-2">XS</span>
                            <span class="fs-xs fw-medium text-secondary-emphasis py-1 px-sm-2">S</span>
                            <span class="fs-xs fw-medium text-secondary-emphasis py-1 px-sm-2">M</span>
                            <span class="fs-xs fw-medium text-secondary-emphasis py-1 px-sm-2">L</span>
                            <div class="nav">
                                <a class="nav-link fs-xs text-body-tertiary py-1 px-2"
                                    href="shop-product-fashion.html">+3</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="nav mb-2">
                    <a class="nav-link animate-target min-w-0 text-dark-emphasis p-0" href="shop-product-fashion.html">
                        <span class="text-truncate">Blus Kebaya Encim Modern</span>
                    </a>
                </div>
                <div class="h6 mb-2">Rp 185.000</div>
                <div class="position-relative">
                    <div class="hover-effect-target fs-xs text-body-secondary opacity-100">+1 warna</div>
                    <div class="hover-effect-target d-flex gap-2 position-absolute top-0 start-0 opacity-0">
                        <input type="radio" class="btn-check" name="colors-9" id="color-9-1" checked="">
                        <label for="color-9-1" class="btn btn-color fs-base" style="color: #e0e5eb">
                            <span class="visually-hidden">Putih Bersih</span>
                        </label>
                        <input type="radio" class="btn-check" name="colors-9" id="color-9-2">
                        <label for="color-9-2" class="btn btn-color fs-base" style="color: #364254">
                            <span class="visually-hidden">Hitam Elegan</span>
                        </label>
                    </div>
                </div>
            </div>
        </div>

        <div class="col mb-2 mb-sm-3 mb-md-0">
            <div class="animate-underline hover-effect-opacity">
                <div class="position-relative mb-3">
                    <button type="button"
                        class="btn btn-icon btn-secondary animate-pulse fs-base bg-transparent border-0 position-absolute top-0 end-0 z-2 mt-1 mt-sm-2 me-1 me-sm-2"
                        aria-label="Add to Wishlist">
                        <i class="ci-heart animate-target"></i>
                    </button>
                    <a class="d-flex bg-body-tertiary rounded p-3" href="shop-product-fashion.html">
                        <div class="ratio" style="--cz-aspect-ratio: calc(308 / 274 * 100%)">
                            <img src="assets/img/shop/fashion/10.png" alt="Image">
                        </div>
                    </a>
                </div>
                <div class="nav mb-2">
                    <a class="nav-link animate-target min-w-0 text-dark-emphasis p-0" href="shop-product-fashion.html">
                        <span class="text-truncate">Clutch Batik Pesta Wanita</span>
                    </a>
                </div>
                <div class="h6 mb-2">Rp 250.000</div>
                <div class="position-relative">
                    <div class="hover-effect-target fs-xs text-body-secondary opacity-100">+2 warna</div>
                    <div class="hover-effect-target d-flex gap-2 position-absolute top-0 start-0 opacity-0">
                        <input type="radio" class="btn-check" name="colors-10" id="color-10-1" checked="">
                        <label for="color-10-1" class="btn btn-color fs-base" style="color: #869286">
                            <span class="visually-hidden">Zaitun</span>
                        </label>
                        <input type="radio" class="btn-check" name="colors-10" id="color-10-2">
                        <label for="color-10-2" class="btn btn-color fs-base" style="color: #364254">
                            <span class="visually-hidden">Hitam</span>
                        </label>
                        <input type="radio" class="btn-check" name="colors-10" id="color-10-3">
                        <label for="color-10-3" class="btn btn-color fs-base" style="color: #526f99">
                            <span class="visually-hidden">Biru Dongker</span>
                        </label>
                    </div>
                </div>
            </div>
        </div>

        <div class="col mb-2 mb-sm-3 mb-md-0">
            <div class="animate-underline hover-effect-opacity">
                <div class="position-relative mb-3">
                    <span
                        class="badge text-bg-danger position-absolute top-0 start-0 z-2 mt-2 mt-sm-3 ms-2 ms-sm-3">-17%</span>
                    <button type="button"
                        class="btn btn-icon btn-secondary animate-pulse fs-base bg-transparent border-0 position-absolute top-0 end-0 z-2 mt-1 mt-sm-2 me-1 me-sm-2"
                        aria-label="Add to Wishlist">
                        <i class="ci-heart animate-target"></i>
                    </button>
                    <a class="d-flex bg-body-tertiary rounded p-3" href="shop-product-fashion.html">
                        <div class="ratio" style="--cz-aspect-ratio: calc(308 / 274 * 100%)">
                            <img src="assets/img/shop/fashion/05.png" alt="Image">
                        </div>
                    </a>
                </div>
                <div class="nav mb-2">
                    <a class="nav-link animate-target min-w-0 text-dark-emphasis p-0" href="shop-product-fashion.html">
                        <span class="text-truncate">Kain Panjang Tenun Ikat</span>
                    </a>
                </div>
                <div class="h6 mb-2">Rp 250.000 <del class="fs-sm fw-normal text-body-tertiary">Rp 300.000</del></div>
                <div class="position-relative">
                    <div class="hover-effect-target fs-xs text-body-secondary opacity-100">+2 warna</div>
                    <div class="hover-effect-target d-flex gap-2 position-absolute top-0 start-0 opacity-0">
                        <input type="radio" class="btn-check" name="colors-5" id="color-5-1" checked="">
                        <label for="color-5-1" class="btn btn-color fs-base" style="color: #8cc4ac">
                            <span class="visually-hidden">Hijau</span>
                        </label>
                        <input type="radio" class="btn-check" name="colors-5" id="color-5-2">
                        <label for="color-5-2" class="btn btn-color fs-base" style="color: #8cb7c4">
                            <span class="visually-hidden">Biru</span>
                        </label>
                        <input type="radio" class="btn-check" name="colors-5" id="color-5-3">
                        <label for="color-5-3" class="btn btn-color fs-base" style="color: #ccb782">
                            <span class="visually-hidden">Cokelat</span>
                        </label>
                    </div>
                </div>
            </div>
        </div>

        <div class="col mb-2 mb-sm-3 mb-md-0">
            <div class="animate-underline hover-effect-opacity">
                <div class="position-relative mb-3">
                    <button type="button"
                        class="btn btn-icon btn-secondary animate-pulse fs-base bg-transparent border-0 position-absolute top-0 end-0 z-2 mt-1 mt-sm-2 me-1 me-sm-2"
                        aria-label="Add to Wishlist">
                        <i class="ci-heart animate-target"></i>
                    </button>
                    <a class="d-flex bg-body-tertiary rounded p-3" href="shop-product-fashion.html">
                        <div class="ratio" style="--cz-aspect-ratio: calc(308 / 274 * 100%)">
                            <img src="assets/img/shop/fashion/06.png" alt="Image">
                        </div>
                    </a>
                    <div
                        class="hover-effect-target position-absolute start-0 bottom-0 w-100 z-2 opacity-0 pb-2 pb-sm-3 px-2 px-sm-3">
                        <div
                            class="d-flex align-items-center justify-content-center gap-2 gap-xl-3 bg-body rounded-2 p-2">
                            <span class="fs-xs fw-medium text-secondary-emphasis py-1 px-sm-2">M</span>
                            <span class="fs-xs fw-medium text-secondary-emphasis py-1 px-sm-2">L</span>
                            <span class="fs-xs fw-medium text-secondary-emphasis py-1 px-sm-2">XL</span>
                        </div>
                    </div>
                </div>
                <div class="nav mb-2">
                    <a class="nav-link animate-target min-w-0 text-dark-emphasis p-0" href="shop-product-fashion.html">
                        <span class="text-truncate">Kemeja Tenun Troso Pria</span>
                    </a>
                </div>
                <div class="h6 mb-2">Rp 165.000</div>
                <div class="position-relative">
                    <div class="hover-effect-target fs-xs text-body-secondary opacity-100">+3 warna</div>
                    <div class="hover-effect-target d-flex gap-2 position-absolute top-0 start-0 opacity-0">
                        <input type="radio" class="btn-check" name="colors-6" id="color-6-1" checked="">
                        <label for="color-6-1" class="btn btn-color fs-base" style="color: #c1cde7">
                            <span class="visually-hidden">Biru Terang</span>
                        </label>
                        <input type="radio" class="btn-check" name="colors-6" id="color-6-2">
                        <label for="color-6-2" class="btn btn-color fs-base" style="color: #526f99">
                            <span class="visually-hidden">Navy</span>
                        </label>
                        <input type="radio" class="btn-check" name="colors-6" id="color-6-3">
                        <label for="color-6-3" class="btn btn-color fs-base" style="color: #e0e5eb">
                            <span class="visually-hidden">Putih</span>
                        </label>
                        <input type="radio" class="btn-check" name="colors-6" id="color-6-4">
                        <label for="color-6-4" class="btn btn-color fs-base" style="color: #364254">
                            <span class="visually-hidden">Hitam</span>
                        </label>
                    </div>
                </div>
            </div>
        </div>
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