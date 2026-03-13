<?= $this->extend('layout/template_admin'); ?>
<?= $this->section('css') ?>
<link href="/assets/vendor/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
<link href="/assets/vendor/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css" rel="stylesheet" />
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="page-heading">
    <h3>Kategori Produk</h3>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card" id="ticketsList">
            <div class="card-header border-0">
                <div class="d-flex align-items-center">
                    <h5 class="card-title mb-0 flex-grow-1">Daftar kategori</h5>
                    <div class="flex-shrink-0">
                        <div class="d-flex flex-wrap gap-2">
                            <button class="btn btn-sm btn-primary add-btn" onclick="add()"><i class="fas fa-plus me-1"></i> Tambah Kategori</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <div class="table-responsive mb-3">
                    <table class="table align-middle table-nowrap table-hover mb-0" id="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Kategori</th>
                                <th>Status</th>
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

<div class="modal fade zoomIn" id="modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0">
            <div class="modal-header p-3">
                <h5 class="modal-title">Tambah Kategori</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
            </div>
            <form class="form" id="form" action="javascript:void(0);" autocomplete="off">
                <input type="hidden" id="id" name="id">
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-lg-12">
                            <div>
                                <label for="name" class="form-label">Nama Kategori</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Masukkan nama kategori produk" />
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <div class="hstack gap-2 justify-content-end">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade flip" id="modald" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body p-5 text-center">
                <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop" colors="primary:#405189,secondary:#f06548" style="width:90px;height:90px"></lord-icon>
                <div class="mt-4 text-center">
                    <h4>Yakin akan menghapus kategori produk <span class="name"></span> ?</h4>
                    <p class="text-muted fs-14 mb-4">Data akan dihapus secara permanen.</p>
                    <div class="hstack gap-2 justify-content-center remove">
                        <button class="btn btn-link link-success fw-medium text-decoration-none" id="deleteRecord-close" data-bs-dismiss="modal"><i class="ri-close-line me-1 align-middle"></i> Batal</button>
                        <button class="btn btn-danger" id="delete-record">Ya, Hapus</button>
                    </div>
                </div>
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
    var modal = $('#modal');
    var modald = $('#modald');

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
                url: '/product-categories/datatable',
                method: 'POST',
            },
            columns: [{
                    data: 'no',
                    orderable: false,
                    width: 10
                },
                {
                    data: 'name',
                    orderable: false,
                },
                {
                    data: 'status',
                    orderable: false,
                },
                {
                    data: 'action',
                    orderable: false,
                    width: 100
                },
            ],
            language: {
                url: '/assets/vendor/bahasa/id.json',
            },
        });

        $('#table').on('draw.dt', function() {
            let info = table.page.info();
            let keyword = $('input[type="search"]').val();

            if (info.recordsDisplay === 0 && keyword) {
                $('#table tbody').html(`
            <tr>
                <td colspan="4" style="text-align: center; padding: 20px;">
                    <img src="/assets/images/noresult.png" alt="No results" style="width: 100px; margin-bottom: 10px;">
                    <p style="font-size: 16px; font-weight: bold; color: #333;" class="mb-1">Oops... "${keyword}" tidak ditemukan</p>
                    <p style="font-size: 14px; color: #666;">Coba lagi dengan memasukkan kata kunci yang tepat</p>
                </td>
            </tr>`);
            } else if (info.recordsDisplay === 0) {
                $('#table tbody').html(` <tr>
                <td colspan="4" style="text-align: center; padding: 20px;">
                    <img src="/assets/images/nodata.png" alt="No data" style="width: 100px;">
                    <p style="font-size: 16px; font-weight: bold; color: #333;" class="mb-1">Data tidak tersedia</p>
                    <p style="font-size: 14px; color: #666;">Belum ada data yang dapat ditampilkan di halaman ini</p>
                </td>
            </tr>`);
            }
        });
    });

    $(document).ready(function() {
        $("form input").on("input", function() {
            $(this).removeClass("is-invalid");
        });

        $('#form').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "/product-categories/save",
                data: $(this).serialize(),
                dataType: "JSON",
                beforeSend: function() {
                    showblockUI();
                },
                complete: function() {
                    hideblockUI();
                },
                success: function(response) {
                    if (response.status) {
                        $('#form')[0].reset();
                        table.ajax.reload();
                        Swal.fire({
                            position: "top-right",
                            icon: "success",
                            title: response.notif,
                            showConfirmButton: !1,
                            timer: 1500,
                            showCloseButton: !0,
                        });
                        modal.modal('hide');
                    } else {
                        $.each(response.errors, function(key, value) {
                            $('[name="' + key + '"]').addClass('is-invalid');
                            $('[name="' + key + '"]').next().text(value);
                            if (value == "") {
                                $('[name="' + key + '"]').removeClass('is-invalid');
                            }
                        });
                    }
                },
                error: function(jqXHR, textStatus, errorThrown, exception) {
                    var msg = '';
                    if (jqXHR.status === 0) {
                        msg = 'Not connect.\n Verify Network.';
                    } else if (jqXHR.status == 404) {
                        msg = 'Requested page not found. [404]';
                    } else if (jqXHR.status == 500) {
                        msg = 'Internal Server Error [500].';
                    } else if (exception === 'parsererror') {
                        msg = 'Requested JSON parse failed.';
                    } else if (exception === 'timeout') {
                        msg = 'Time out error.';
                    } else if (exception === 'abort') {
                        msg = 'Ajax request aborted.';
                    } else {
                        msg = 'Uncaught Error.\n' + jqXHR.responseText;
                    }
                    alert(msg);
                }
            });
        });
    });

    function add() {
        $('#id').val('');

        $('#form')[0].reset();
        var form = $('#form input');
        form.removeClass('is-invalid is-valid');

        modal.find('.modal-title').text('Tambah Kategori');
        modal.modal('show');
    }

    function edit(id) {
        $.ajax({
            type: "POST",
            url: "/product-categories/getdata",
            data: {
                id: id
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
                    var form = $('#form input');
                    form.removeClass('is-invalid is-valid');
                    $('#id').val(response.data.id);
                    $('#name').val(response.data.name);

                    modal.find('.modal-title').text('Edit Kategori');
                    modal.modal('show');
                } else {
                    Swal.fire({
                        position: "top-right",
                        icon: "warning",
                        title: "Data kategori produk tidak ditemukan",
                        showConfirmButton: !1,
                        timer: 1500,
                        showCloseButton: !0,
                    });
                }
            },
            error: function(jqXHR, textStatus, errorThrown, exception) {
                var msg = '';
                if (jqXHR.status === 0) {
                    msg = 'Not connect.\n Verify Network.';
                } else if (jqXHR.status == 404) {
                    msg = 'Requested page not found. [404]';
                } else if (jqXHR.status == 500) {
                    msg = 'Internal Server Error [500].';
                } else if (exception === 'parsererror') {
                    msg = 'Requested JSON parse failed.';
                } else if (exception === 'timeout') {
                    msg = 'Time out error.';
                } else if (exception === 'abort') {
                    msg = 'Ajax request aborted.';
                } else {
                    msg = 'Uncaught Error.\n' + jqXHR.responseText;
                }
                alert(msg);
            }
        });
    }

    function changeStatus(id) {
        var isChecked = $('#set_active' + id);
        var currentState = isChecked.is(':checked');

        $.ajax({
            type: "POST",
            url: "/product-categories/setStatus",
            data: {
                id: id
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
                    isChecked.next().text($(isChecked).is(':checked') ? 'Aktif' : 'Nonaktif');
                } else {
                    isChecked.prop('checked', isChecked.is(':checked') ? null : 'checked');
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                isChecked.prop('checked', !currentState);
            },
        });
    }

    function confirmRemove(id, name) {
        $('#delete-record').attr("onclick", "remove(" + id + ", '" + name + "')");
        modald.modal('show').find('.name').text(name);
    }

    function remove(id, name) {
        $.ajax({
            url: "/product-categories/remove",
            type: "POST",
            dataType: "JSON",
            data: {
                id: id,
                name: name,
            },
            beforeSend: function() {
                showblockUI();
            },
            complete: function() {
                hideblockUI();
            },
            success: function(response) {
                if (response.status) {
                    Swal.fire({
                        position: "top-right",
                        icon: "success",
                        title: "Kategori '" + response.name + "' telah dihapus",
                        showConfirmButton: !1,
                        timer: 1500,
                        showCloseButton: !0,
                    });
                    table.ajax.reload();
                } else {
                    Swal.fire({
                        position: "top-right",
                        icon: "warning",
                        title: "Kategori '" + response.name + "' telah berelasi dengan data lain",
                        showConfirmButton: !1,
                        timer: 2500,
                        showCloseButton: !0,
                    });
                }
                modald.modal('hide');
            },
            error: function(jqXHR, textStatus, errorThrown, exception) {
                var msg = '';
                if (jqXHR.status === 0) {
                    msg = 'Not connect.\n Verify Network.';
                } else if (jqXHR.status == 404) {
                    msg = 'Requested page not found. [404]';
                } else if (jqXHR.status == 500) {
                    msg = 'Internal Server Error [500].';
                } else if (exception === 'parsererror') {
                    msg = 'Requested JSON parse failed.';
                } else if (exception === 'timeout') {
                    msg = 'Time out error.';
                } else if (exception === 'abort') {
                    msg = 'Ajax request aborted.';
                } else {
                    msg = 'Uncaught Error.\n' + jqXHR.responseText;
                }
                alert(msg);
            }
        });
    }
</script>
<?= $this->endSection() ?>