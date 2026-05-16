<?= $this->extend('layout/template'); ?>
<?= $this->section('css') ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
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
<nav class="container pt-2 pt-xxl-3 my-3 my-md-4" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="home.html">Beranda</a></li>
        <li class="breadcrumb-item active" aria-current="page">Katalog KainKita</li>
    </ol>
</nav>
<!-- Page title -->
<h1 class="h3 container pb-3 pb-lg-4">Katalog KainKita</h1>
<!-- Products grid + Sidebar with filters -->
<section class="container">
    <div class="row">
        <!-- Filter sidebar that turns into offcanvas on screens < 992px wide (lg breakpoint) -->
        <aside class="col-lg-3">
            <div class="offcanvas-lg offcanvas-start pe-lg-4" id="filterSidebar">
                <div class="offcanvas-header py-3">
                    <h5 class="offcanvas-title">Filter Produk</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#filterSidebar"
                        aria-label="Close"></button>
                </div>
                <div class="offcanvas-body flex-column pt-2 py-lg-0">
                    <!-- Selected filters + Sorting -->
                    <div class="pb-4 mb-2 mb-xl-3">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h4 class="h6 mb-0">Filter Aktif</h4>
                            <button type="button"
                                class="btn btn-sm btn-secondary bg-transparent border-0 text-decoration-underline p-0 ms-2">
                                Hapus Semua
                            </button>
                        </div>
                        <div class="d-flex flex-wrap gap-2">
                            <button type="button" class="btn btn-sm btn-secondary">
                                <i class="ci-close fs-sm ms-n1 me-1"></i>
                                Diskon
                            </button>
                            <button type="button" class="btn btn-sm btn-secondary">
                                <i class="ci-close fs-sm ms-n1 me-1"></i>
                                Batik Tulis
                            </button>
                            <button type="button" class="btn btn-sm btn-secondary">
                                <i class="ci-close fs-sm ms-n1 me-1"></i>
                                Size: L
                            </button>
                        </div>
                    </div>
                    <div class="accordion">
                        <!-- Categories -->
                        <div class="accordion-item border-0 pb-1 pb-xl-2">
                            <h4 class="accordion-header" id="headingCategories">
                                <button type="button" class="accordion-button p-0 pb-3" data-bs-toggle="collapse"
                                    data-bs-target="#categories" aria-expanded="true" aria-controls="categories">
                                    Kategori
                                </button>
                            </h4>
                            <div class="accordion-collapse collapse show" id="categories"
                                aria-labelledby="headingCategories">
                                <div class="accordion-body p-0 pb-4 mb-1 mb-xl-2">
                                    <div style="height: 220px" data-simplebar="" data-simplebar-auto-hide="false">
                                        <ul class="nav flex-column gap-2 pe-3">
                                            <?php if (!empty($categories)) : ?>
                                            <?php foreach ($categories as $category) : ?>
                                            <li class="nav-item mb-1">
                                                <a class="nav-link d-block fw-normal p-0" href="#!">
                                                    <?= esc($category['category_name']) ?>
                                                    <span class="fs-xs text-body-secondary ms-1">
                                                        (<?= esc($category['total_products']) ?>)
                                                    </span>
                                                </a>
                                            </li>
                                            <?php endforeach; ?>
                                            <?php else : ?>
                                            <li class="nav-item mb-1">
                                                <span class="text-body-secondary fs-sm">Kategori belum tersedia</span>
                                            </li>
                                            <?php endif; ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Price -->
                        <div class="accordion-item border-0 pb-1 pb-xl-2">
                            <h4 class="accordion-header" id="headingPrice">
                                <button type="button" class="accordion-button p-0 pb-3" data-bs-toggle="collapse"
                                    data-bs-target="#price" aria-expanded="true" aria-controls="price">
                                    Harga
                                </button>
                            </h4>
                            <div class="accordion-collapse collapse show" id="price" aria-labelledby="headingPrice">
                                <div class="accordion-body p-0 pb-4 mb-1 mb-xl-2">
                                    <div class="range-slider"
                                        data-range-slider="{&quot;startMin&quot;: 150000, &quot;startMax&quot;: 750000, &quot;min&quot;: 0, &quot;max&quot;: 2000000, &quot;step&quot;: 10000, &quot;tooltipPrefix&quot;: &quot;Rp &quot;}"
                                        aria-labelledby="headingPrice">
                                        <div class="range-slider-ui"></div>
                                        <div class="d-flex align-items-center">
                                            <div class="position-relative w-50">
                                                <span
                                                    class="position-absolute top-50 start-0 translate-middle-y ms-3 fs-sm">Rp</span>
                                                <input type="number" class="form-control form-icon-start ps-5" min="0"
                                                    data-range-slider-min="">
                                            </div>
                                            <i class="ci-minus text-body-emphasis mx-2"></i>
                                            <div class="position-relative w-50">
                                                <span
                                                    class="position-absolute top-50 start-0 translate-middle-y ms-3 fs-sm">Rp</span>
                                                <input type="number" class="form-control form-icon-start ps-5" min="0"
                                                    data-range-slider-max="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Brands / Mitra UMKM -->
                        <div class="accordion-item border-0 pb-1 pb-xl-2">
                            <h4 class="accordion-header" id="headingBrands">
                                <button type="button" class="accordion-button p-0 pb-3" data-bs-toggle="collapse"
                                    data-bs-target="#brands" aria-expanded="true" aria-controls="brands">
                                    Mitra UMKM
                                </button>
                            </h4>
                            <div class="accordion-collapse collapse show" id="brands" aria-labelledby="headingBrands">
                                <div class="accordion-body p-0 pb-4 mb-1 mb-xl-2"
                                    data-filter-list="{&quot;searchClass&quot;: &quot;brands-search&quot;, &quot;listClass&quot;: &quot;brands-list&quot;, &quot;valueNames&quot;: [&quot;form-check-label&quot;]}">
                                    <div class="position-relative mb-3">
                                        <i
                                            class="ci-search position-absolute top-50 start-0 translate-middle-y ms-3"></i>
                                        <input type="search" class="brands-search form-control form-icon-start"
                                            placeholder="Cari Mitra UMKM">
                                    </div>
                                    <div style="height: 210px" data-simplebar="" data-simplebar-auto-hide="false">
                                        <div class="brands-list d-flex flex-column gap-2">
                                            <div class="form-check mb-0">
                                                <input type="checkbox" class="form-check-input" id="trusmi" checked="">
                                                <label for="trusmi" class="form-check-label text-body-emphasis">
                                                    Batik Trusmi Cirebon<span
                                                        class="fs-xs text-body-secondary ms-1">(125)</span>
                                                </label>
                                            </div>
                                            <div class="form-check mb-0">
                                                <input type="checkbox" class="form-check-input" id="troso">
                                                <label for="troso" class="form-check-label text-body-emphasis">
                                                    Tenun Troso Jepara<span
                                                        class="fs-xs text-body-secondary ms-1">(80)</span>
                                                </label>
                                            </div>
                                            <div class="form-check mb-0">
                                                <input type="checkbox" class="form-check-input" id="danarhadi">
                                                <label for="danarhadi" class="form-check-label text-body-emphasis">
                                                    Griya Batik Solo<span
                                                        class="fs-xs text-body-secondary ms-1">(103)</span>
                                                </label>
                                            </div>
                                            <div class="form-check mb-0">
                                                <input type="checkbox" class="form-check-input" id="lurik">
                                                <label for="lurik" class="form-check-label text-body-emphasis">
                                                    Lurik Pedan Klaten<span
                                                        class="fs-xs text-body-secondary ms-1">(45)</span>
                                                </label>
                                            </div>
                                            <div class="form-check mb-0">
                                                <input type="checkbox" class="form-check-input" id="songket">
                                                <label for="songket" class="form-check-label text-body-emphasis">
                                                    Songket Palembang Asli<span
                                                        class="fs-xs text-body-secondary ms-1">(30)</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Size -->
                        <div class="accordion-item border-0 pb-1 pb-xl-2">
                            <h4 class="accordion-header" id="headingSize">
                                <button type="button" class="accordion-button p-0 pb-3" data-bs-toggle="collapse"
                                    data-bs-target="#size" aria-expanded="true" aria-controls="size">
                                    Ukuran
                                </button>
                            </h4>
                            <div class="accordion-collapse collapse show" id="size" aria-labelledby="headingSize">
                                <div class="accordion-body p-0 pb-4 mb-1 mb-xl-2">
                                    <div class="d-flex flex-wrap gap-2">
                                        <input type="checkbox" class="btn-check" id="size-xs">
                                        <label for="size-xs" class="btn btn-sm btn-outline-secondary">XS</label>
                                        <input type="checkbox" class="btn-check" id="size-s">
                                        <label for="size-s" class="btn btn-sm btn-outline-secondary">S</label>
                                        <input type="checkbox" class="btn-check" id="size-m" checked="">
                                        <label for="size-m" class="btn btn-sm btn-outline-secondary">M</label>
                                        <input type="checkbox" class="btn-check" id="size-l" checked="">
                                        <label for="size-l" class="btn btn-sm btn-outline-secondary">L</label>
                                        <input type="checkbox" class="btn-check" id="size-xl">
                                        <label for="size-xl" class="btn btn-sm btn-outline-secondary"><span
                                                class="mx-n1">XL</span></label>
                                        <input type="checkbox" class="btn-check" id="size-2xl">
                                        <label for="size-2xl" class="btn btn-sm btn-outline-secondary">XXL</label>
                                        <input type="checkbox" class="btn-check" id="size-all">
                                        <label for="size-all" class="btn btn-sm btn-outline-secondary">All Size</label>
                                        <input type="checkbox" class="btn-check" id="size-kain">
                                        <label for="size-kain" class="btn btn-sm btn-outline-secondary">Lembaran
                                            (Kain)</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Color -->
                        <div class="accordion-item border-0 pb-1 pb-xl-2">
                            <h4 class="accordion-header" id="headingColor">
                                <button type="button" class="accordion-button p-0 pb-3" data-bs-toggle="collapse"
                                    data-bs-target="#color" aria-expanded="true" aria-controls="color">
                                    Warna Dominan
                                </button>
                            </h4>
                            <div class="accordion-collapse collapse show" id="color" aria-labelledby="headingColor">
                                <div class="accordion-body p-0 pb-4 mb-1 mb-xl-2">
                                    <div class="d-flex flex-column gap-2">
                                        <div class="d-flex align-items-center mb-1">
                                            <input type="checkbox" class="btn-check" id="sogan">
                                            <label for="sogan" class="btn btn-color fs-xl"
                                                style="color: #5c4033"></label>
                                            <label for="sogan" class="fs-sm ms-2">Cokelat Sogan</label>
                                        </div>
                                        <div class="d-flex align-items-center mb-1">
                                            <input type="checkbox" class="btn-check" id="indigo">
                                            <label for="indigo" class="btn btn-color fs-xl"
                                                style="color: #284971"></label>
                                            <label for="indigo" class="fs-sm ms-2">Biru Indigo</label>
                                        </div>
                                        <div class="d-flex align-items-center mb-1">
                                            <input type="checkbox" class="btn-check" id="maroon">
                                            <label for="maroon" class="btn btn-color fs-xl"
                                                style="color: #800000"></label>
                                            <label for="maroon" class="fs-sm ms-2">Merah Maroon</label>
                                        </div>
                                        <div class="d-flex align-items-center mb-1">
                                            <input type="checkbox" class="btn-check" id="monochrome">
                                            <label for="monochrome" class="btn btn-color fs-xl"
                                                style="color: #364254"></label>
                                            <label for="monochrome" class="fs-sm ms-2">Hitam/Putih (Monokrom)</label>
                                        </div>
                                        <div class="d-flex align-items-center mb-1">
                                            <input type="checkbox" class="btn-check" id="alam">
                                            <label for="alam" class="btn btn-color fs-xl"
                                                style="color: #8bc4ab"></label>
                                            <label for="alam" class="fs-sm ms-2">Hijau Alam</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Status -->
                    </div>
                </div>
            </div>
        </aside>
        <!-- Product grid -->
        <div class="col-lg-9">
            <!-- Sorting -->
            <div class="d-sm-flex align-items-center justify-content-between mt-n2 mb-3 mb-sm-4">
                <div class="fs-sm text-body-emphasis text-nowrap">
                    Menampilkan <span class="fw-semibold"><?= count($products) ?></span> produk lokal
                </div>
                <div class="d-flex align-items-center text-nowrap">
                    <label class="form-label fw-semibold mb-0 me-2">Urutkan:</label>
                    <div style="width: 190px">
                        <select class="form-select border-0 rounded-0 px-1" data-select="{
                    &quot;removeItemButton&quot;: false,
                    &quot;classNames&quot;: {
                      &quot;containerInner&quot;: [&quot;form-select&quot;, &quot;border-0&quot;, &quot;rounded-0&quot;, &quot;px-1&quot;]
                    }
                  }">
                            <option value="Relevansi">Paling Sesuai</option>
                            <option value="Terbaru">Koleksi Terbaru</option>
                            <option value="Terlaris">Terlaris</option>
                            <option value="Harga Terendah">Harga: Rendah ke Tinggi</option>
                            <option value="Harga Tertinggi">Harga: Tinggi ke Rendah</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row gy-4 gy-md-5 pb-4 pb-md-5">

                <?php if (!empty($products)) : ?>
                <?php foreach ($products as $product) : ?>
                <div class="col-6 col-md-4 mb-2 mb-sm-3 mb-md-0">
                    <div class="animate-underline hover-effect-opacity">

                        <div class="position-relative mb-3">
                            <?php if ((int) $product['stock'] <= 0) : ?>
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
                                data-product-id="<?= esc($product['id']) ?>" aria-label="Add to Wishlist">
                                <i class="ci-heart animate-target"></i>
                            </button>

                            <a class="d-flex bg-body-tertiary rounded p-3" href="#!">
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
                        Produk belum tersedia.
                    </div>
                </div>
                <?php endif; ?>

            </div>
            <!-- Show more button -->
            <?php if (count($products) > 0) : ?>
            <button type="button" class="btn btn-lg btn-outline-secondary w-100">
                Tampilkan Lebih Banyak
                <i class="ci-chevron-down fs-xl ms-2 me-n1"></i>
            </button>
            <?php endif; ?>
        </div>
    </div>
</section>

<?= $this->endSection() ?>

<?= $this->section('js') ?>
<?= $this->endSection() ?>