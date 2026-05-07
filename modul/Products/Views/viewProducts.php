<?= $this->extend('layout/template_admin'); ?>

<?= $this->section('css') ?>
<link href="/assets/vendor/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
<link href="/assets/vendor/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css" />
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="page-heading">
    <h3>Katalog Produk</h3>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card" id="ticketsList">
            <div class="card-header border-0">
                <div class="d-flex align-items-center">
                    <h5 class="card-title mb-0 flex-grow-1">Daftar Produk</h5>
                    <div class="flex-shrink-0">
                        <button class="btn btn-sm btn-primary add-btn" onclick="add()"><i class="fas fa-plus me-1"></i>
                            Tambah Produk</button>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <div class="table-responsive mb-3">
                    <table class="table align-middle table-nowrap table-hover mb-0" id="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Foto</th>
                                <th>Kategori</th>
                                <th>Nama Produk</th>
                                <th>Harga</th>
                                <th>Stok</th>
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
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content border-0">
            <div class="modal-header p-3">
                <h5 class="modal-title">Tambah Produk</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                    id="close-modal"></button>
            </div>
            <form class="form" id="form" action="javascript:void(0);" autocomplete="off" enctype="multipart/form-data">
                <input type="hidden" id="id" name="id">
                <div class="modal-body">

                    <h6 class="text-primary mb-3">Informasi Utama</h6>
                    <div class="row g-3 mb-4">
                        <div class="col-md-6">
                            <label for="product_name" class="form-label">Nama Produk <span
                                    class="text-danger">*</span></label>
                            <input type="text" name="product_name" id="product_name" class="form-control"
                                placeholder="Masukkan nama produk" />
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="col-md-6">
                            <label for="category_id" class="form-label">Kategori <span
                                    class="text-danger">*</span></label>
                            <select name="category_id" id="category_id" class="form-select">
                                <option value="">Pilih Kategori</option>
                                <?php foreach ($categories as $cat) : ?>
                                <option value="<?= $cat['id'] ?>"><?= $cat['category_name'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="col-md-6">
                            <label for="price" class="form-label">Harga <span class="text-danger">*</span></label>
                            <input type="number" name="price" id="price" class="form-control"
                                placeholder="Contoh: 150000" />
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="col-md-6">
                            <label for="stock" class="form-label">Stok <span class="text-danger">*</span></label>
                            <input type="number" name="stock" id="stock" class="form-control"
                                placeholder="Jumlah stok" />
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="col-md-6">
                            <label for="umkm_name" class="form-label">Nama UMKM (Opsional)</label>
                            <input type="text" name="umkm_name" id="umkm_name" class="form-control"
                                placeholder="Nama UMKM pembuat" />
                        </div>
                        <div class="col-md-6">
                            <label for="region" class="form-label">Asal Daerah (Opsional)</label>
                            <input type="text" name="region" id="region" class="form-control"
                                placeholder="Contoh: Garut" />
                        </div>
                    </div>

                    <h6 class="text-primary mb-3">Detail & Spesifikasi</h6>
                    <div class="row g-3 mb-4">
                        <div class="col-md-4">
                            <label for="size" class="form-label">Ukuran (Panjang x Lebar)</label>
                            <input type="text" name="size" id="size" class="form-control"
                                placeholder="Contoh: 200cm x 100cm" />
                        </div>
                        <div class="col-md-4">
                            <label for="weight" class="form-label">Berat (Gram)</label>
                            <input type="number" name="weight" id="weight" class="form-control"
                                placeholder="Contoh: 500" />
                        </div>
                        <div class="col-md-4">
                            <label for="color" class="form-label">Warna Dominan</label>
                            <input type="text" name="color" id="color" class="form-control"
                                placeholder="Contoh: Merah, Biru" />
                        </div>
                        <div class="col-md-12">
                            <label for="motif" class="form-label">Motif Kain</label>
                            <input type="text" name="motif" id="motif" class="form-control"
                                placeholder="Contoh: Mega Mendung" />
                        </div>
                        <div class="col-md-12">
                            <label for="description" class="form-label">Deskripsi Lengkap</label>
                            <textarea name="description" id="description" class="form-control"
                                placeholder="Jelaskan detail material dan karakteristik produk" rows="4"></textarea>
                        </div>
                    </div>

                    <h6 class="text-primary mb-3">Foto Produk</h6>
                    <div class="row g-3">
                        <div class="col-md-12">
                            <label for="image" class="form-label">Unggah Foto Utama</label>
                            <input type="file" name="image" id="image" class="form-control" accept="image/*" />
                            <small class="text-muted">Biarkan kosong jika tidak ingin mengubah foto saat Edit.</small>
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
                <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop"
                    colors="primary:#405189,secondary:#f06548" style="width:90px;height:90px"></lord-icon>
                <div class="mt-4 text-center">
                    <h4>Yakin akan menghapus produk <span class="name"></span>?</h4>
                    <p class="text-muted fs-14 mb-4">Semua data detail dan foto juga akan dihapus permanen.</p>
                    <div class="hstack gap-2 justify-content-center remove">
                        <button class="btn btn-link link-success fw-medium text-decoration-none"
                            data-bs-dismiss="modal"><i class="ri-close-line me-1 align-middle"></i> Batal</button>
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
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>

<script>
var table;
var modal = $('#modal');
var modald = $('#modald');

document.addEventListener("DOMContentLoaded", function() {
    // Inisialisasi Fancybox
    Fancybox.bind("[data-fancybox]", {});

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
            url: '/products/datatable', // Sesuaikan URL
            method: 'POST',
        },
        columns: [{
                data: 'no',
                orderable: false,
                width: 10
            },
            {
                data: 'image',
                orderable: false,
                width: 60
            },
            {
                data: 'category_name',
                orderable: true
            },
            {
                data: 'product_name',
                orderable: true
            },
            {
                data: 'price',
                orderable: true
            },
            {
                data: 'stock',
                orderable: true
            },
            {
                data: 'status',
                orderable: false
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
});

$(document).ready(function() {
    $("form input, form select, form textarea").on("input change", function() {
        $(this).removeClass("is-invalid");
    });

    $('#form').submit(function(e) {
        e.preventDefault();

        // Gunakan FormData karena ada input type="file"
        var formData = new FormData(this);

        $.ajax({
            type: "POST",
            url: "/products/save", // Sesuaikan URL
            data: formData,
            contentType: false, // Wajib false untuk FormData
            processData: false, // Wajib false untuk FormData
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
                        showConfirmButton: false,
                        timer: 1500,
                        showCloseButton: true,
                    });
                    modal.modal('hide');
                } else {
                    $.each(response.errors, function(key, value) {
                        $('[name="' + key + '"]').addClass('is-invalid');
                        $('[name="' + key + '"]').next('.invalid-feedback').text(
                            value);
                        if (value == "") {
                            $('[name="' + key + '"]').removeClass('is-invalid');
                        }
                    });
                }
            },
            error: function(jqXHR, textStatus, errorThrown, exception) {
                alert("Gagal terhubung ke server.");
            }
        });
    });
});

function add() {
    $('#id').val('');
    $('#form')[0].reset();
    $('#form input, #form select, #form textarea').removeClass('is-invalid');

    modal.find('.modal-title').text('Tambah Produk');
    modal.modal('show');
}

function edit(id) {
    $.ajax({
        type: "POST",
        url: "/products/getdata", // Sesuaikan URL
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
                $('#form input, #form select, #form textarea').removeClass('is-invalid');

                // Form Produk Utama
                $('#id').val(response.data.id);
                $('#product_name').val(response.data.product_name);
                $('#category_id').val(response.data.category_id);
                $('#price').val(response.data.price);
                $('#stock').val(response.data.stock);
                $('#umkm_name').val(response.data.umkm_name);
                $('#region').val(response.data.region);

                // Form Produk Detail
                $('#size').val(response.data.size);
                $('#motif').val(response.data.motif);
                $('#description').val(response.data.description);
                $('#color').val(response.data.color);
                $('#weight').val(response.data.weight);

                // Reset file input
                $('#image').val('');

                modal.find('.modal-title').text('Edit Produk');
                modal.modal('show');
            } else {
                Swal.fire({
                    position: "top-right",
                    icon: "warning",
                    title: "Data produk tidak ditemukan",
                    showConfirmButton: false,
                    timer: 1500,
                    showCloseButton: true,
                });
            }
        },
        error: function(jqXHR, textStatus, errorThrown, exception) {
            alert("Gagal mengambil data.");
        }
    });
}

function changeStatus(id) {
    var isChecked = $('#set_active' + id);
    var currentState = isChecked.is(':checked');

    $.ajax({
        type: "POST",
        url: "/products/setStatus", // Sesuaikan URL
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
                isChecked.prop('checked', !currentState);
            }
        },
        error: function() {
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
        url: "/products/remove", // Sesuaikan URL
        type: "POST",
        dataType: "JSON",
        data: {
            id: id,
            name: name
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
                    title: "Produk '" + response.name + "' telah dihapus",
                    showConfirmButton: false,
                    timer: 1500,
                    showCloseButton: true,
                });
                table.ajax.reload();
            } else {
                Swal.fire({
                    position: "top-right",
                    icon: "error",
                    title: "Gagal menghapus produk",
                    showConfirmButton: false,
                    timer: 2500,
                    showCloseButton: true,
                });
            }
            modald.modal('hide');
        },
        error: function() {
            alert("Gagal menghapus data.");
        }
    });
}
</script>
<?= $this->endSection() ?>