<?= $this->extend('layout/template'); ?>
<?= $this->section('css') ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container py-5 mt-n2 mt-sm-0">
    <div class="row pt-md-2 pt-lg-3 pb-sm-2 pb-md-3 pb-lg-4 pb-xl-5">
        <!-- Sidebar navigation that turns into offcanvas on screens < 992px wide (lg breakpoint) -->
        <aside class="col-lg-3">
            <div class="offcanvas-lg offcanvas-start pe-lg-0 pe-xl-4" id="accountSidebar">
                <!-- Header -->
                <div class="offcanvas-header d-lg-block py-3 p-lg-0">
                    <div class="d-flex align-items-center">
                        <div class="h5 d-flex justify-content-center align-items-center flex-shrink-0 text-primary bg-primary-subtle lh-1 rounded-circle mb-0"
                            style="width: 3rem; height: 3rem">B</div>
                        <div class="min-w-0 ps-3">
                            <h5 class="h6 mb-1">Bayu Slamet Hidayat</h5>
                            <div class="nav flex-nowrap text-nowrap min-w-0">
                                <a class="nav-link animate-underline text-body p-0" href="#bonusesModal"
                                    data-bs-toggle="modal">
                                    <svg class="text-warning flex-shrink-0 me-2" xmlns="http://www.w3.org/2000/svg"
                                        width="16" height="16" fill="currentColor">
                                        <path
                                            d="M1.333 9.667H7.5V16h-5c-.64 0-1.167-.527-1.167-1.167V9.667zm13.334 0v5.167c0 .64-.527 1.167-1.167 1.167h-5V9.667h6.167zM0 5.833V7.5c0 .64.527 1.167 1.167 1.167h.167H7.5v-1-3H1.167C.527 4.667 0 5.193 0 5.833zm14.833-1.166H8.5v3 1h6.167.167C15.473 8.667 16 8.14 16 7.5V5.833c0-.64-.527-1.167-1.167-1.167z">
                                        </path>
                                        <path
                                            d="M8 5.363a.5.5 0 0 1-.495-.573C7.752 3.123 9.054-.03 12.219-.03c1.807.001 2.447.977 2.447 1.813 0 1.486-2.069 3.58-6.667 3.58zM12.219.971c-2.388 0-3.295 2.27-3.595 3.377 1.884-.088 3.072-.565 3.756-.971.949-.563 1.287-1.193 1.287-1.595 0-.599-.747-.811-1.447-.811z">
                                        </path>
                                        <path
                                            d="M8.001 5.363c-4.598 0-6.667-2.094-6.667-3.58 0-.836.641-1.812 2.448-1.812 3.165 0 4.467 3.153 4.713 4.819a.5.5 0 0 1-.495.573zM3.782.971c-.7 0-1.448.213-1.448.812 0 .851 1.489 2.403 5.042 2.566C7.076 3.241 6.169.971 3.782.971z">
                                        </path>
                                    </svg>
                                    <span class="animate-target me-1">100 Poin</span>
                                    <span class="text-body fw-normal text-truncate">KainKita</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn-close d-lg-none" data-bs-dismiss="offcanvas"
                        data-bs-target="#accountSidebar" aria-label="Close"></button>
                </div>
                <!-- Body (Navigation) -->
                <div class="offcanvas-body d-block pt-2 pt-lg-4 pb-lg-0">
                    <nav class="list-group list-group-borderless">
                        <a class="list-group-item list-group-item-action d-flex align-items-center pe-none active"
                            href="account-orders.html">
                            <i class="ci-shopping-bag fs-base opacity-75 me-2"></i>
                            Pesanan Saya
                            <span class="badge bg-primary rounded-pill ms-auto">1</span>
                        </a>
                        <a class="list-group-item list-group-item-action d-flex align-items-center"
                            href="account-wishlist.html">
                            <i class="ci-heart fs-base opacity-75 me-2"></i>
                            Produk Favorit
                        </a>
                        <a class="list-group-item list-group-item-action d-flex align-items-center"
                            href="account-payment.html">
                            <i class="ci-credit-card fs-base opacity-75 me-2"></i>
                            Metode Pembayaran
                        </a>
                        <a class="list-group-item list-group-item-action d-flex align-items-center"
                            href="account-reviews.html">
                            <i class="ci-star fs-base opacity-75 me-2"></i>
                            Ulasan Saya
                        </a>
                    </nav>
                    <h6 class="pt-4 ps-2 ms-1">Kelola Akun</h6>
                    <nav class="list-group list-group-borderless">
                        <a class="list-group-item list-group-item-action d-flex align-items-center"
                            href="account-info.html">
                            <i class="ci-user fs-base opacity-75 me-2"></i>
                            Informasi Pribadi
                        </a>
                        <a class="list-group-item list-group-item-action d-flex align-items-center"
                            href="account-addresses.html">
                            <i class="ci-map-pin fs-base opacity-75 me-2"></i>
                            Daftar Alamat
                        </a>
                        <a class="list-group-item list-group-item-action d-flex align-items-center"
                            href="account-notifications.html">
                            <i class="ci-bell fs-base opacity-75 mt-1 me-2"></i>
                            Notifikasi
                        </a>
                    </nav>
                    <h6 class="pt-4 ps-2 ms-1">Layanan Pelanggan</h6>
                    <nav class="list-group list-group-borderless">
                        <a class="list-group-item list-group-item-action d-flex align-items-center"
                            href="help-topics-v1.html">
                            <i class="ci-help-circle fs-base opacity-75 me-2"></i>
                            Pusat Bantuan
                        </a>
                        <a class="list-group-item list-group-item-action d-flex align-items-center"
                            href="terms-and-conditions.html">
                            <i class="ci-info fs-base opacity-75 me-2"></i>
                            Syarat dan Ketentuan
                        </a>
                    </nav>
                    <nav class="list-group list-group-borderless pt-3">
                        <a class="list-group-item list-group-item-action d-flex align-items-center"
                            href="account-signin.html">
                            <i class="ci-log-out fs-base opacity-75 me-2"></i>
                            Keluar
                        </a>
                    </nav>
                </div>
            </div>
        </aside>
        <!-- Orders content -->
        <div class="col-lg-9">
            <div class="ps-lg-3 ps-xl-0">
                <!-- Page title + Sorting selects -->
                <div class="row align-items-center pb-3 pb-md-4 mb-md-1 mb-lg-2">
                    <div class="col-md-4 col-xl-6 mb-3 mb-md-0">
                        <h1 class="h2 me-3 mb-0">Pesanan Saya</h1>
                    </div>
                    <div class="col-md-8 col-xl-6">
                        <div class="row row-cols-1 row-cols-sm-2 g-3 g-xxl-4">
                            <div class="col">
                                <select class="form-select" data-select="{
                        &quot;placeholderValue&quot;: &quot;Semua Status&quot;,
                        &quot;choices&quot;: [
                          {
                            &quot;value&quot;: &quot;&quot;,
                            &quot;label&quot;: &quot;Semua Status&quot;,
                            &quot;placeholder&quot;: true
                          },
                          {
                            &quot;value&quot;: &quot;inprogress&quot;,
                            &quot;label&quot;: &quot;<div class=\&quot;d-flex align-items-center text-nowrap\&quot;><span class=\&quot;bg-info rounded-circle p-1 me-2\&quot;></span>Diproses</div>&quot;
                          },
                          {
                            &quot;value&quot;: &quot;delivered&quot;,
                            &quot;label&quot;: &quot;<div class=\&quot;d-flex align-items-center text-nowrap\&quot;><span class=\&quot;bg-success rounded-circle p-1 me-2\&quot;></span>Terkirim</div>&quot;
                          },
                          {
                            &quot;value&quot;: &quot;canceled&quot;,
                            &quot;label&quot;: &quot;<div class=\&quot;d-flex align-items-center text-nowrap\&quot;><span class=\&quot;bg-danger rounded-circle p-1 me-2\&quot;></span>Dibatalkan</div>&quot;
                          },
                          {
                            &quot;value&quot;: &quot;delayed&quot;,
                            &quot;label&quot;: &quot;<div class=\&quot;d-flex align-items-center text-nowrap\&quot;><span class=\&quot;bg-warning rounded-circle p-1 me-2\&quot;></span>Tertunda</div>&quot;
                          }
                        ]
                      }" data-select-template="true" aria-label="Status sorting"></select>
                            </div>
                            <div class="col">
                                <select class="form-select" data-select="{&quot;removeItemButton&quot;: false}"
                                    aria-label="Timeframe sorting">
                                    <option value="all-time">Semua Waktu</option>
                                    <option value="last-year">1 Tahun Terakhir</option>
                                    <option value="last-3-months">3 Bulan Terakhir</option>
                                    <option value="last-30-days">30 Hari Terakhir</option>
                                    <option value="last-week">1 Minggu Terakhir</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Sortable orders table -->
                <div
                    data-filter-list="{&quot;listClass&quot;: &quot;orders-list&quot;, &quot;sortClass&quot;: &quot;orders-sort&quot;, &quot;valueNames&quot;: [&quot;date&quot;, &quot;total&quot;]}">
                    <table class="table align-middle fs-sm text-nowrap">
                        <thead>
                            <tr>
                                <th scope="col" class="py-3 ps-0">
                                    <span class="text-body fw-normal">No. Pesanan</span>
                                </th>
                                <th scope="col" class="py-3 d-none d-md-table-cell">
                                    <button type="button" class="btn orders-sort fw-normal text-body p-0"
                                        data-sort="date">Tanggal</button>
                                </th>
                                <th scope="col" class="py-3 d-none d-md-table-cell">
                                    <span class="text-body fw-normal">Status</span>
                                </th>
                                <th scope="col" class="py-3 d-none d-md-table-cell">
                                    <button type="button" class="btn orders-sort fw-normal text-body p-0"
                                        data-sort="total">Total Harga</button>
                                </th>
                                <th scope="col" class="py-3">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody class="text-body-emphasis orders-list">
                            <!-- Item -->
                            <tr>
                                <td class="fw-medium pt-2 pb-3 py-md-2 ps-0">
                                    <a class="d-inline-block animate-underline text-body-emphasis text-decoration-none py-2"
                                        href="#orderDetails" data-bs-toggle="offcanvas" aria-controls="orderDetails"
                                        aria-label="Show order details">
                                        <span class="animate-target">INV-78A6431</span>
                                    </a>
                                    <ul class="list-unstyled fw-normal text-body m-0 d-md-none">
                                        <li>6 Feb 2025</li>
                                        <li class="d-flex align-items-center">
                                            <span class="bg-info rounded-circle p-1 me-2"></span>
                                            Diproses
                                        </li>
                                        <li class="fw-medium text-body-emphasis">Rp 450.000</li>
                                    </ul>
                                </td>
                                <td class="fw-medium py-3 d-none d-md-table-cell">
                                    6 Feb 2025
                                    <span class="date d-none">25-02-06</span>
                                </td>
                                <td class="fw-medium py-3 d-none d-md-table-cell">
                                    <span class="d-flex align-items-center">
                                        <span class="bg-info rounded-circle p-1 me-2"></span>
                                        Diproses
                                    </span>
                                </td>
                                <td class="fw-medium py-3 d-none d-md-table-cell">
                                    Rp 450.000
                                    <span class="total d-none">450000</span>
                                </td>
                                <td class="py-3 pe-0">
                                    <span
                                        class="d-flex align-items-center justify-content-end position-relative gap-1 gap-sm-2 ms-n2 ms-sm-0">
                                        <span><img src="assets/img/shop/fashion/thumbs/01.png" width="64"
                                                alt="Thumbnail"></span>
                                        <span><img src="assets/img/shop/fashion/thumbs/02.png" width="64"
                                                alt="Thumbnail"></span>
                                        <a class="btn btn-icon btn-ghost btn-secondary stretched-link border-0"
                                            href="#orderDetails" data-bs-toggle="offcanvas" aria-controls="orderDetails"
                                            aria-label="Show order details">
                                            <i class="ci-chevron-right fs-lg"></i>
                                        </a>
                                    </span>
                                </td>
                            </tr>
                            <!-- Item -->
                            <tr>
                                <td class="fw-medium pt-2 pb-3 py-md-2 ps-0">
                                    <a class="d-inline-block animate-underline text-body-emphasis text-decoration-none py-2"
                                        href="#orderDetails" data-bs-toggle="offcanvas" aria-controls="orderDetails"
                                        aria-label="Show order details">
                                        <span class="animate-target">INV-47H76G0</span>
                                    </a>
                                    <ul class="list-unstyled fw-normal text-body m-0 d-md-none">
                                        <li>12 Des 2024</li>
                                        <li class="d-flex align-items-center">
                                            <span class="bg-success rounded-circle p-1 me-2"></span>
                                            Terkirim
                                        </li>
                                        <li class="fw-medium text-body-emphasis">Rp 185.000</li>
                                    </ul>
                                </td>
                                <td class="fw-medium py-3 d-none d-md-table-cell">
                                    12 Des 2024
                                    <span class="date d-none">24-12-12</span>
                                </td>
                                <td class="fw-medium py-3 d-none d-md-table-cell">
                                    <span class="d-flex align-items-center">
                                        <span class="bg-success rounded-circle p-1 me-2"></span>
                                        Terkirim
                                    </span>
                                </td>
                                <td class="fw-medium py-3 d-none d-md-table-cell">
                                    Rp 185.000
                                    <span class="total d-none">185000</span>
                                </td>
                                <td class="py-3 pe-0">
                                    <span
                                        class="d-flex align-items-center justify-content-end position-relative gap-1 gap-sm-2 ms-n2 ms-sm-0">
                                        <span><img src="assets/img/shop/fashion/thumbs/04.png" width="64"
                                                alt="Thumbnail"></span>
                                        <a class="btn btn-icon btn-ghost btn-secondary stretched-link border-0"
                                            href="#orderDetails" data-bs-toggle="offcanvas" aria-controls="orderDetails"
                                            aria-label="Show order details">
                                            <i class="ci-chevron-right fs-lg"></i>
                                        </a>
                                    </span>
                                </td>
                            </tr>
                            <!-- Item -->
                            <tr>
                                <td class="fw-medium pt-2 pb-3 py-md-2 ps-0">
                                    <a class="d-inline-block animate-underline text-body-emphasis text-decoration-none py-2"
                                        href="#orderDetails" data-bs-toggle="offcanvas" aria-controls="orderDetails"
                                        aria-label="Show order details">
                                        <span class="animate-target">INV-502TR87</span>
                                    </a>
                                    <ul class="list-unstyled fw-normal text-body m-0 d-md-none">
                                        <li>7 Nov 2024</li>
                                        <li class="d-flex align-items-center">
                                            <span class="bg-success rounded-circle p-1 me-2"></span>
                                            Terkirim
                                        </li>
                                        <li class="fw-medium text-body-emphasis">Rp 850.000</li>
                                    </ul>
                                </td>
                                <td class="fw-medium py-3 d-none d-md-table-cell">
                                    7 Nov 2024
                                    <span class="date d-none">24-11-07</span>
                                </td>
                                <td class="fw-medium py-3 d-none d-md-table-cell">
                                    <span class="d-flex align-items-center">
                                        <span class="bg-success rounded-circle p-1 me-2"></span>
                                        Terkirim
                                    </span>
                                </td>
                                <td class="fw-medium py-3 d-none d-md-table-cell">
                                    Rp 850.000
                                    <span class="total d-none">850000</span>
                                </td>
                                <td class="py-3 pe-0">
                                    <span
                                        class="d-flex align-items-center justify-content-end position-relative gap-1 gap-sm-2 ms-n2 ms-sm-0">
                                        <span><img src="assets/img/shop/fashion/thumbs/05.png" width="64"
                                                alt="Thumbnail"></span>
                                        <span><img src="assets/img/shop/fashion/thumbs/06.png" width="64"
                                                alt="Thumbnail"></span>
                                        <span><img src="assets/img/shop/fashion/thumbs/07.png" width="64"
                                                alt="Thumbnail"></span>
                                        <span class="fw-medium me-1">+1</span>
                                        <a class="btn btn-icon btn-ghost btn-secondary stretched-link border-0"
                                            href="#orderDetails" data-bs-toggle="offcanvas" aria-controls="orderDetails"
                                            aria-label="Show order details">
                                            <i class="ci-chevron-right fs-lg"></i>
                                        </a>
                                    </span>
                                </td>
                            </tr>
                            <!-- Item -->
                            <tr>
                                <td class="fw-medium pt-2 pb-3 py-md-2 ps-0">
                                    <a class="d-inline-block animate-underline text-body-emphasis text-decoration-none py-2"
                                        href="#orderDetails" data-bs-toggle="offcanvas" aria-controls="orderDetails"
                                        aria-label="Show order details">
                                        <span class="animate-target">INV-34VB554</span>
                                    </a>
                                    <ul class="list-unstyled fw-normal text-body m-0 d-md-none">
                                        <li>15 Sep 2024</li>
                                        <li class="d-flex align-items-center">
                                            <span class="bg-danger rounded-circle p-1 me-2"></span>
                                            Dibatalkan
                                        </li>
                                        <li class="fw-medium text-body-emphasis">Rp 225.000</li>
                                    </ul>
                                </td>
                                <td class="fw-medium py-3 d-none d-md-table-cell">
                                    15 Sep 2024
                                    <span class="date d-none">24-09-15</span>
                                </td>
                                <td class="fw-medium py-3 d-none d-md-table-cell">
                                    <span class="d-flex align-items-center">
                                        <span class="bg-danger rounded-circle p-1 me-2"></span>
                                        Dibatalkan
                                    </span>
                                </td>
                                <td class="fw-medium py-3 d-none d-md-table-cell">
                                    Rp 225.000
                                    <span class="total d-none">225000</span>
                                </td>
                                <td class="py-3 pe-0">
                                    <span
                                        class="d-flex align-items-center justify-content-end position-relative gap-1 gap-sm-2 ms-n2 ms-sm-0">
                                        <span><img src="assets/img/shop/fashion/thumbs/08.png" width="64"
                                                alt="Thumbnail"></span>
                                        <a class="btn btn-icon btn-ghost btn-secondary stretched-link border-0"
                                            href="#orderDetails" data-bs-toggle="offcanvas" aria-controls="orderDetails"
                                            aria-label="Show order details">
                                            <i class="ci-chevron-right fs-lg"></i>
                                        </a>
                                    </span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- Pagination -->
                <nav class="pt-3 pb-2 pb-sm-0 mt-2 mt-md-3" aria-label="Page navigation example">
                    <ul class="pagination">
                        <li class="page-item active" aria-current="page">
                            <span class="page-link">
                                1
                                <span class="visually-hidden">(current)</span>
                            </span>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">2</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">3</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('js') ?>
<?= $this->endSection() ?>