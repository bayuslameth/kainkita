<?= $this->extend('layout/template_admin'); ?>
<?= $this->section('css') ?>
<link href="/assets/vendor/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
<link href="/assets/vendor/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css" rel="stylesheet" />
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="page-heading">
    <h3>Data Pelanggan</h3>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card" id="customersList">
            <div class="card-header border-0">
                <div class="d-flex align-items-center">
                    <h5 class="card-title mb-0 flex-grow-1">Daftar Pelanggan</h5>
                    <div class="flex-shrink-0">
                        <div class="d-flex flex-wrap gap-2">
                            <button class="btn btn-sm btn-primary add-btn" onclick="add()"><i
                                    class="fas fa-plus me-1"></i> Tambah Pelanggan</button>
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
                                <th>Nama Lengkap</th>
                                <th>No. HP</th>
                                <th>Alamat</th>
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
                <h5 class="modal-title">Tambah Pelanggan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                    id="close-modal"></button>
            </div>
            <form class="form" id="form" action="javascript:void(0);" autocomplete="off">
                <input type="hidden" id="id" name="id">
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div>
                                <label for="user_id" class="form-label">ID User (Opsional)</label>
                                <input type="text" name="user_id" id="user_id" class="form-control"
                                    placeholder="Masukkan ID User jika terhubung ke akun" />
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div>
                                <label for="full_name" class="form-label">Nama Lengkap <span
                                        class="text-danger">*</span></label>
                                <input type="text" name="full_name" id="full_name" class="form-control"
                                    placeholder="Masukkan nama lengkap pelanggan" />
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div>
                                <label for="phone_number" class="form-label">Nomor HP <span
                                        class="text-danger">*</span></label>
                                <input type="text" name="phone_number" id="phone_number" class="form-control"
                                    placeholder="Contoh: 08123456789" />
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div>
                                <label for="postal_code" class="form-label">Kode Pos</label>
                                <input type="text" name="postal_code" id="postal_code" class="form-control"
                                    placeholder="Masukkan kode pos" />
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div>
                                <label for="province_id" class="form-label">Provinsi</label>
                                <select name="province_id" id="province_id" class="form-select">
                                    <option value="">Pilih Provinsi</option>
                                    <?php foreach ($provinces as $p): ?>
                                    <option value="<?= $p['province_id'] ?>"><?= $p['province_name'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div>
                                <label for="city_id" class="form-label">Kota / Kabupaten</label>
                                <select name="city_id" id="city_id" class="form-select" disabled>
                                    <option value="">Pilih Kota</option>
                                </select>
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div>
                                <label for="subdistrict_id" class="form-label">Kecamatan</label>
                                <select name="subdistrict_id" id="subdistrict_id" class="form-select" disabled>
                                    <option value="">Pilih Kecamatan</option>
                                </select>
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div>
                                <label for="address" class="form-label">Alamat Lengkap</label>
                                <textarea name="address" id="address" class="form-control"
                                    placeholder="Masukkan alamat lengkap (Jalan, RT/RW)" rows="3"></textarea>
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
                <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop"
                    colors="primary:#405189,secondary:#f06548" style="width:90px;height:90px"></lord-icon>
                <div class="mt-4 text-center">
                    <h4>Yakin akan menghapus data pelanggan <span class="name"></span> ?</h4>
                    <p class="text-muted fs-14 mb-4">Data akan dihapus secara permanen.</p>
                    <div class="hstack gap-2 justify-content-center remove">
                        <button class="btn btn-link link-success fw-medium text-decoration-none" id="deleteRecord-close"
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
            url: '/customers/datatable',
            method: 'POST',
        },
        columns: [{
                data: 'no',
                orderable: false,
                width: 10
            },
            {
                data: 'full_name',
                orderable: true,
            },
            {
                data: 'phone_number',
                orderable: false,
            },
            {
                data: 'address',
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

    // Menampilkan No Data / Not Found Template
    $('#table').on('draw.dt', function() {
        // ... (Kode untuk custom empty table bisa ditambahkan kembali jika perlu)
    });
});

$(document).ready(function() {
    $("form input, form textarea, form select").on("change input", function() {
        $(this).removeClass("is-invalid");
    });

    // --- SCRIPT CASCADING DROPDOWN START ---
    $('#province_id').change(function() {
        var province_id = $(this).val();
        if (province_id) {
            $.ajax({
                url: '/customers/getCities',
                type: "POST",
                data: {
                    province_id: province_id
                },
                dataType: "JSON",
                beforeSend: function() {
                    showblockUI();
                },
                complete: function() {
                    hideblockUI();
                },
                success: function(data) {
                    $('#city_id').empty().append('<option value="">Pilih Kota</option>')
                        .prop('disabled', false);
                    $('#subdistrict_id').empty().append(
                        '<option value="">Pilih Kecamatan</option>').prop('disabled',
                        true);
                    $.each(data, function(key, value) {
                        $('#city_id').append('<option value="' + value.id + '">' +
                            value.name + '</option>');
                    });
                }
            });
        } else {
            $('#city_id').empty().append('<option value="">Pilih Kota</option>').prop('disabled', true);
            $('#subdistrict_id').empty().append('<option value="">Pilih Kecamatan</option>').prop(
                'disabled', true);
        }
    });

    $('#city_id').change(function() {
        var city_id = $(this).val();
        if (city_id) {
            $.ajax({
                url: '/customers/getSubdistricts',
                type: "POST",
                data: {
                    city_id: city_id
                },
                dataType: "JSON",
                beforeSend: function() {
                    showblockUI();
                },
                complete: function() {
                    hideblockUI();
                },
                success: function(data) {
                    $('#subdistrict_id').empty().append(
                        '<option value="">Pilih Kecamatan</option>').prop('disabled',
                        false);
                    $.each(data, function(key, value) {
                        $('#subdistrict_id').append('<option value="' + value.id +
                            '">' + value.name + '</option>');
                    });
                }
            });
        } else {
            $('#subdistrict_id').empty().append('<option value="">Pilih Kecamatan</option>').prop(
                'disabled', true);
        }
    });
    // --- SCRIPT CASCADING DROPDOWN END ---

    $('#form').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "/customers/save",
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
                alert('Terdapat kesalahan koneksi ke server.');
            }
        });
    });
});

function add() {
    $('#id').val('');

    $('#form')[0].reset();
    var form = $('#form input, #form textarea, #form select');
    form.removeClass('is-invalid is-valid');

    // Reset dropdown state
    $('#city_id').empty().append('<option value="">Pilih Kota</option>').prop('disabled', true);
    $('#subdistrict_id').empty().append('<option value="">Pilih Kecamatan</option>').prop('disabled', true);

    modal.find('.modal-title').text('Tambah Pelanggan');
    modal.modal('show');
}

function edit(id) {
    $.ajax({
        type: "POST",
        url: "/customers/getdata",
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
                var form = $('#form input, #form textarea, #form select');
                form.removeClass('is-invalid is-valid');

                $('#id').val(response.data.id);
                $('#user_id').val(response.data.user_id);
                $('#full_name').val(response.data.full_name);
                $('#phone_number').val(response.data.phone_number);
                $('#address').val(response.data.address);
                $('#postal_code').val(response.data.postal_code);

                // Set data select dari DB
                $('#province_id').val(response.data.province_id);

                // Proses Async Fetch Dropdown Kota & Kecamatan Untuk Edit
                if (response.data.province_id) {
                    $.ajax({
                        url: '/customers/getCities',
                        type: "POST",
                        data: {
                            province_id: response.data.province_id
                        },
                        dataType: "JSON",
                        success: function(cities) {
                            $('#city_id').empty().append('<option value="">Pilih Kota</option>')
                                .prop('disabled', false);
                            $.each(cities, function(key, value) {
                                $('#city_id').append('<option value="' + value.id +
                                    '">' + value.name + '</option>');
                            });
                            $('#city_id').val(response.data.city_id);

                            if (response.data.city_id) {
                                $.ajax({
                                    url: '/customers/getSubdistricts',
                                    type: "POST",
                                    data: {
                                        city_id: response.data.city_id
                                    },
                                    dataType: "JSON",
                                    success: function(subdistricts) {
                                        $('#subdistrict_id').empty().append(
                                            '<option value="">Pilih Kecamatan</option>'
                                        ).prop('disabled', false);
                                        $.each(subdistricts, function(key, value) {
                                            $('#subdistrict_id').append(
                                                '<option value="' +
                                                value.id + '">' + value
                                                .name + '</option>');
                                        });
                                        $('#subdistrict_id').val(response.data
                                            .subdistrict_id);
                                    }
                                });
                            }
                        }
                    });
                }

                modal.find('.modal-title').text('Edit Pelanggan');
                modal.modal('show');
            } else {
                Swal.fire({
                    position: "top-right",
                    icon: "warning",
                    title: "Data pelanggan tidak ditemukan",
                    showConfirmButton: !1,
                    timer: 1500,
                    showCloseButton: !0,
                });
            }
        },
        error: function(jqXHR, textStatus, errorThrown, exception) {
            alert("Error fetching data!");
        }
    });
}

function confirmRemove(id, name) {
    $('#delete-record').attr("onclick", "remove(" + id + ", '" + name + "')");
    modald.modal('show').find('.name').text(name);
}

function remove(id, name) {
    $.ajax({
        url: "/customers/remove",
        type: "POST",
        dataType: "JSON",
        data: {
            id: id,
            full_name: name,
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
                    title: "Data pelanggan '" + response.name + "' telah dihapus",
                    showConfirmButton: !1,
                    timer: 1500,
                    showCloseButton: !0,
                });
                table.ajax.reload();
            } else {
                Swal.fire({
                    position: "top-right",
                    icon: "warning",
                    title: "Pelanggan '" + response.name + "' telah berelasi dengan data lain",
                    showConfirmButton: !1,
                    timer: 2500,
                    showCloseButton: !0,
                });
            }
            modald.modal('hide');
        },
        error: function(jqXHR, textStatus, errorThrown, exception) {
            alert("Error deleting data!");
        }
    });
}
</script>
<?= $this->endSection() ?>