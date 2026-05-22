<?= $this->extend('layout/template_admin'); ?>

<?= $this->section('css') ?>
<link href="/assets/vendor/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
<link href="/assets/vendor/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css" rel="stylesheet" />

<style>
.fs-13 {
    font-size: 13px;
}

#modalDetail .modal-body {
    max-height: 75vh;
    overflow-y: auto;
}

.table-detail-product img {
    width: 58px;
    height: 58px;
    object-fit: contain;
}
</style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="page-heading">
    <h3>Data Penjualan</h3>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card" id="salesList">
            <div class="card-header border-0">
                <div class="d-flex align-items-center">
                    <h5 class="card-title mb-0 flex-grow-1">Daftar Penjualan</h5>
                </div>
            </div>

            <div class="card-body">
                <div class="table-responsive mb-3">
                    <table class="table align-middle table-nowrap table-hover mb-0" id="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Invoice</th>
                                <th>Customer</th>
                                <th>Tanggal</th>
                                <th>Total</th>
                                <th>Pembayaran</th>
                                <th>Status Bayar</th>
                                <th>Status Pesanan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade zoomIn" id="modalDetail" tabindex="-1" aria-labelledby="modalDetailLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content border-0">
            <div class="modal-header p-3">
                <h5 class="modal-title" id="modalDetailLabel">Detail Penjualan</h5>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>

            <div class="modal-body">
                <div id="detailContent">
                    <div class="text-center text-muted py-5">
                        Memuat detail penjualan...
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    Tutup
                </button>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>


<?= $this->section('js') ?>
<script src="/assets/vendor/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="/assets/vendor/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
<script src="/assets/vendor/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="/assets/vendor/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js"></script>

<script>
var table;
var modalDetail = $('#modalDetail');

document.addEventListener("DOMContentLoaded", function() {
    table = $('#table').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        autoWidth: false,
        info: true,
        paging: true,
        searching: true,
        stateSave: true,
        bDestroy: true,
        order: [],
        ajax: {
            url: '/sales/datatable',
            method: 'POST',
        },
        columns: [{
                data: 'no',
                orderable: false,
                width: 10
            },
            {
                data: 'invoice',
                orderable: true,
            },
            {
                data: 'customer_name',
                orderable: false,
            },
            {
                data: 'tanggal',
                orderable: true,
            },
            {
                data: 'grand_total_rp',
                orderable: true,
            },
            {
                data: 'payment_method_label',
                orderable: false,
            },
            {
                data: 'status_pembayaran_label',
                orderable: false,
            },
            {
                data: 'status_pesanan_label',
                orderable: false,
            },
            {
                data: 'action',
                orderable: false,
                width: 80
            },
        ],
        language: {
            url: '/assets/vendor/bahasa/id.json',
        },
    });
});

function detail(id) {
    $('#detailContent').html(`
        <div class="text-center text-muted py-5">
            <div class="spinner-border spinner-border-sm me-2" role="status"></div>
            Memuat detail penjualan...
        </div>
    `);

    modalDetail.modal('show');

    $.ajax({
        type: "POST",
        url: "/sales/getdetail",
        data: {
            id: id
        },
        dataType: "JSON",
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
            if (response.status) {
                $('#detailContent').html(response.html);
            } else {
                $('#detailContent').html(`
                    <div class="alert alert-warning mb-0">
                        ${response.message || 'Detail penjualan tidak ditemukan.'}
                    </div>
                `);
            }
        },
        error: function() {
            $('#detailContent').html(`
                <div class="alert alert-danger mb-0">
                    Gagal mengambil detail penjualan dari server.
                </div>
            `);

            Swal.fire({
                position: "top-right",
                icon: "error",
                title: "Gagal mengambil detail penjualan",
                showConfirmButton: false,
                timer: 1500,
                showCloseButton: true,
            });
        }
    });
}
</script>
<?= $this->endSection() ?>