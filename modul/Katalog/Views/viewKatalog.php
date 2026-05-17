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
                                class="btn btn-sm btn-secondary bg-transparent border-0 text-decoration-underline p-0 ms-2"
                                id="clear-filter">
                                Hapus Semua
                            </button>
                        </div>
                        <div class="d-flex flex-wrap gap-2" id="active-filter-list">
                            <span class="text-body-secondary fs-sm">Belum ada filter aktif</span>
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
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input filter-category"
                                                        id="category-<?= esc($category['id']) ?>"
                                                        value="<?= esc($category['id']) ?>">
                                                    <label class="form-check-label text-body-emphasis"
                                                        for="category-<?= esc($category['id']) ?>">
                                                        <?= esc($category['category_name']) ?>
                                                        <span class="fs-xs text-body-secondary ms-1">
                                                            (<?= esc($category['total_products']) ?>)
                                                        </span>
                                                    </label>
                                                </div>
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
                                            <div class="position-relative mb-3">
                                                <i
                                                    class="ci-search position-absolute top-50 start-0 translate-middle-y ms-3"></i>
                                                <input type="search" class="form-control form-icon-start" id="keyword"
                                                    placeholder="Cari produk, UMKM, kategori, motif, warna...">
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
                                            <?php if (!empty($umkms)) : ?>
                                            <?php foreach ($umkms as $key => $umkm) : ?>
                                            <div class="form-check mb-0">
                                                <input type="checkbox" class="form-check-input filter-umkm"
                                                    id="umkm-<?= $key ?>" value="<?= esc($umkm['umkm_name']) ?>">
                                                <label for="umkm-<?= $key ?>"
                                                    class="form-check-label text-body-emphasis">
                                                    <?= esc($umkm['umkm_name']) ?>
                                                    <span class="fs-xs text-body-secondary ms-1">
                                                        (<?= esc($umkm['total_products']) ?>)
                                                    </span>
                                                </label>
                                            </div>
                                            <?php endforeach; ?>
                                            <?php else : ?>
                                            <span class="text-body-secondary fs-sm">Mitra UMKM belum tersedia</span>
                                            <?php endif; ?>
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
                                        <?php if (!empty($sizes)) : ?>
                                        <?php foreach ($sizes as $key => $size) : ?>
                                        <?php if (!empty($size['size'])) : ?>
                                        <input type="checkbox" class="btn-check filter-size" id="size-<?= $key ?>"
                                            value="<?= esc($size['size']) ?>">
                                        <label for="size-<?= $key ?>" class="btn btn-sm btn-outline-secondary">
                                            <?= esc($size['size']) ?>
                                        </label>
                                        <?php endif; ?>
                                        <?php endforeach; ?>
                                        <?php else : ?>
                                        <span class="text-body-secondary fs-sm">Ukuran belum tersedia</span>
                                        <?php endif; ?>
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
                                        <?php if (!empty($colors)) : ?>
                                        <?php foreach ($colors as $key => $color) : ?>
                                        <?php if (!empty($color['color'])) : ?>
                                        <div class="form-check mb-0">
                                            <input type="checkbox" class="form-check-input filter-color"
                                                id="color-<?= $key ?>" value="<?= esc($color['color']) ?>">
                                            <label for="color-<?= $key ?>" class="form-check-label text-body-emphasis">
                                                <?= esc($color['color']) ?>
                                                <span class="fs-xs text-body-secondary ms-1">
                                                    (<?= esc($color['total_products']) ?>)
                                                </span>
                                            </label>
                                        </div>
                                        <?php endif; ?>
                                        <?php endforeach; ?>
                                        <?php else : ?>
                                        <span class="text-body-secondary fs-sm">Warna belum tersedia</span>
                                        <?php endif; ?>
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
                    Menampilkan <span class="fw-semibold" id="product-count"><?= count($products) ?></span> produk lokal
                </div>
                <div class="d-flex align-items-center text-nowrap">
                    <label class="form-label fw-semibold mb-0 me-2">Urutkan:</label>
                    <div style="width: 190px">
                        <select class="form-select border-0 rounded-0 px-1" id="sort">
                            <option value="">Paling Sesuai</option>
                            <option value="terbaru">Koleksi Terbaru</option>
                            <option value="stok-terbanyak">Stok Terbanyak</option>
                            <option value="harga-terendah">Harga: Rendah ke Tinggi</option>
                            <option value="harga-tertinggi">Harga: Tinggi ke Rendah</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row gy-4 gy-md-5 pb-4 pb-md-5" id="product-list">
                <?= view('Modul\Katalog\Views\viewKatalog_list', ['products' => $products]) ?>
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
<script>
var filterTimer = null;

$(document).ready(function() {
    $(document).on('change',
        '.filter-category, .filter-umkm, .filter-size, .filter-color, #sort, [data-range-slider-min], [data-range-slider-max]',
        function() {
            loadProducts();
        });

    $('#keyword').on('input', function() {
        clearTimeout(filterTimer);

        filterTimer = setTimeout(function() {
            loadProducts();
        }, 500);
    });

    $('#clear-filter').click(function() {
        $('.filter-category, .filter-umkm, .filter-size, .filter-color').prop('checked', false);
        $('#keyword').val('');
        $('#sort').val('');
        $('[data-range-slider-min]').val('');
        $('[data-range-slider-max]').val('');

        loadProducts();
        toastInfo('Filter berhasil dihapus');
    });
});

function getCheckedValue(selector) {
    var values = [];

    $(selector + ':checked').each(function() {
        values.push($(this).val());
    });

    return values.join(',');
}

function loadProducts() {
    $.ajax({
        type: "POST",
        url: "/katalog/filter",
        data: {
            category_id: getCheckedValue('.filter-category'),
            umkm: getCheckedValue('.filter-umkm'),
            size: getCheckedValue('.filter-size'),
            color: getCheckedValue('.filter-color'),
            min_price: $('[data-range-slider-min]').val(),
            max_price: $('[data-range-slider-max]').val(),
            sort: $('#sort').val(),
            keyword: $('#keyword').val(),
        },
        dataType: "JSON",
        beforeSend: function() {
            showblockUI();
        },
        complete: function() {
            hideblockUI();
        },
        success: function(response) {
            if (response.status) {
                $('#product-list').html(response.html);
                $('#product-count').text(response.count);

                setActiveFilter();
            } else {
                toastWarning("Produk gagal difilter");
            }
        },
        error: function(jqXHR, textStatus, errorThrown, exception) {
            ajaxErrorMessage(jqXHR, textStatus, errorThrown, exception);
        }
    });
}

function setActiveFilter() {
    var html = '';

    $('.filter-category:checked').each(function() {
        html += activeFilterButton(
            'category',
            $(this).val(),
            $(this).next('label').clone().children().remove().end().text().trim()
        );
    });

    $('.filter-umkm:checked').each(function() {
        html += activeFilterButton(
            'umkm',
            $(this).val(),
            $(this).next('label').clone().children().remove().end().text().trim()
        );
    });

    $('.filter-size:checked').each(function() {
        html += activeFilterButton('size', $(this).val(), 'Size: ' + $(this).val());
    });

    $('.filter-color:checked').each(function() {
        html += activeFilterButton('color', $(this).val(), 'Warna: ' + $(this).val());
    });

    if ($('#keyword').val()) {
        html += activeFilterButton('keyword', $('#keyword').val(), 'Cari: ' + $('#keyword').val());
    }

    if ($('[data-range-slider-min]').val() || $('[data-range-slider-max]').val()) {
        html += activeFilterButton('price', '', 'Harga');
    }

    if (html == '') {
        html = '<span class="text-body-secondary fs-sm">Belum ada filter aktif</span>';
    }

    $('#active-filter-list').html(html);
}

function activeFilterButton(type, value, label) {
    return `
        <button type="button" class="btn btn-sm btn-secondary btn-remove-filter" data-type="${type}" data-value="${value}">
            <i class="ci-close fs-sm ms-n1 me-1"></i>
            ${label}
        </button>
    `;
}

$(document).on('click', '.btn-remove-filter', function() {
    var type = $(this).data('type');
    var value = $(this).data('value');

    if (type == 'category') {
        $('.filter-category[value="' + value + '"]').prop('checked', false);
    } else if (type == 'umkm') {
        $('.filter-umkm[value="' + value + '"]').prop('checked', false);
    } else if (type == 'size') {
        $('.filter-size[value="' + value + '"]').prop('checked', false);
    } else if (type == 'color') {
        $('.filter-color[value="' + value + '"]').prop('checked', false);
    } else if (type == 'keyword') {
        $('#keyword').val('');
    } else if (type == 'price') {
        $('[data-range-slider-min]').val('');
        $('[data-range-slider-max]').val('');
    }

    loadProducts();
});
</script>
<?= $this->endSection() ?>