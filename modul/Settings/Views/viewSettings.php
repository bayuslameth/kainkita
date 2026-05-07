<?= $this->extend('layout/template_admin'); ?>

<?= $this->section('css') ?>
<style>
.logo-preview {
    width: 150px;
    height: auto;
    object-fit: contain;
    margin-bottom: 15px;
}

.favicon-preview {
    width: 50px;
    height: 50px;
    object-fit: contain;
    margin-bottom: 15px;
}
</style>
<link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet" />
<link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet" />
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="page-heading">
    <h3>Pengaturan Aplikasi</h3>
</div>

<section class="section">
    <div class="row">
        <div class="col-12 col-lg-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-center align-items-center flex-column">
                        <div class="mb-3 text-center">
                            <?php $logoSrc = !empty($setting['logo_filename']) ? base_url($setting['logo_filename']) : base_url('assets/images/no-image.png'); ?>
                            <img src="<?= $logoSrc ?>" alt="App Logo" class="logo-preview img-thumbnail rounded">
                        </div>
                        <h4 class="mt-2 text-center"><?= esc($setting['app_name']) ?: 'Nama Aplikasi' ?></h4>
                        <p class="text-small text-muted text-center"><?= esc($setting['contact_email']) ?></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-8">
            <div class="card">
                <div class="card-body">
                    <form id="form-setting" action="javascript:void(0);" enctype="multipart/form-data"
                        autocomplete="off">
                        <input type="hidden" name="id" value="<?= esc($setting['id']) ?>">

                        <div class="form-group mb-3">
                            <label for="app_name" class="form-label">Nama Aplikasi <span
                                    class="text-danger">*</span></label>
                            <input type="text" name="app_name" id="app_name" class="form-control"
                                placeholder="Masukkan nama aplikasi" value="<?= esc($setting['app_name']) ?>">
                            <div class="invalid-feedback"></div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="contact_email" class="form-label">Email Kontak <span
                                        class="text-danger">*</span></label>
                                <input type="email" name="contact_email" id="contact_email" class="form-control"
                                    placeholder="admin@example.com" value="<?= esc($setting['contact_email']) ?>">
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="contact_phone" class="form-label">No. Telepon / WhatsApp</label>
                                <input type="text" name="contact_phone" id="contact_phone" class="form-control"
                                    placeholder="08xxxxxxxxxx" value="<?= esc($setting['contact_phone']) ?>">
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label for="description" class="form-label">Deskripsi Singkat</label>
                            <textarea name="description" id="description" class="form-control" rows="3"
                                placeholder="Deskripsi aplikasi..."><?= esc($setting['description']) ?></textarea>
                        </div>

                        <div class="form-group mb-3">
                            <label for="address" class="form-label">Alamat</label>
                            <textarea name="address" id="address" class="form-control" rows="2"
                                placeholder="Alamat lengkap..."><?= esc($setting['address']) ?></textarea>
                        </div>

                        <div class="form-group mb-4">
                            <label for="social_media" class="form-label">Sosial Media (URL)</label>
                            <input type="text" name="social_media" id="social_media" class="form-control"
                                placeholder="https://instagram.com/..." value="<?= esc($setting['social_media']) ?>">
                        </div>

                        <hr>
                        <h6 class="mb-3 mt-4">Aset Gambar</h6>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="logo" class="form-label">Logo Aplikasi</label>
                                <input type="file" name="logo" id="logo" class="filepond"
                                    accept="image/png, image/jpeg, image/webp">
                                <small class="text-muted">Biarkan kosong jika tidak ingin mengubah logo.</small>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="favicon" class="form-label">Favicon</label>
                                <input type="file" name="favicon" id="favicon" class="filepond"
                                    accept="image/png, image/x-icon, image/ico">
                                <small class="text-muted">Biarkan kosong jika tidak ingin mengubah favicon.</small>
                            </div>
                        </div>

                        <div class="form-group text-end mt-4">
                            <button type="submit" class="btn btn-primary" id="btnSave"><i class="fas fa-save me-1"></i>
                                Simpan Perubahan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>

<?= $this->section('js') ?>
<script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
<script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js"></script>
<script src="https://unpkg.com/filepond/dist/filepond.js"></script>

<script>
$(document).ready(function() {
    // Hilangkan error saat mengetik
    $("form input, form textarea").on("input", function() {
        $(this).removeClass("is-invalid");
    });

    // Registrasi Plugin FilePond
    FilePond.registerPlugin(
        FilePondPluginImagePreview,
        FilePondPluginFileValidateType
    );

    // Inisialisasi FilePond untuk Logo
    const pondLogo = FilePond.create(document.querySelector('#logo'), {
        storeAsFile: true, // WAJIB agar terbaca oleh FormData
        allowImagePreview: true,
        labelIdle: 'Seret & Lepas Logo atau <span class="filepond--label-action">Telusuri</span>',
        imagePreviewHeight: 150
    });

    // Inisialisasi FilePond untuk Favicon
    const pondFavicon = FilePond.create(document.querySelector('#favicon'), {
        storeAsFile: true, // WAJIB agar terbaca oleh FormData
        allowImagePreview: true,
        labelIdle: 'Seret & Lepas Favicon atau <span class="filepond--label-action">Telusuri</span>',
        imagePreviewHeight: 150
    });

    $('#form-setting').submit(function(e) {
        e.preventDefault();

        var form = this;
        var formData = new FormData(form);

        $.ajax({
            type: "POST",
            url: "<?= base_url('settings/save') ?>",
            data: formData,
            processData: false,
            contentType: false,
            dataType: "JSON",
            beforeSend: function() {
                $('#btnSave').prop('disabled', true).html(
                    '<i class="fas fa-spinner fa-spin me-1"></i> Menyimpan...');
                // showblockUI();
            },
            complete: function() {
                $('#btnSave').prop('disabled', false).html(
                    '<i class="fas fa-save me-1"></i> Simpan Perubahan');
                // hideblockUI();
            },
            success: function(response) {
                if (response.status) {
                    // Reset FilePond setelah berhasil
                    pondLogo.removeFiles();
                    pondFavicon.removeFiles();

                    Swal.fire({
                        position: "top-right",
                        icon: "success",
                        title: response.notif,
                        showConfirmButton: false,
                        timer: 1500,
                        showCloseButton: true,
                    }).then(() => {
                        location.reload();
                    });
                } else {
                    $.each(response.errors, function(key, value) {
                        var element = $('[name="' + key + '"]');
                        element.addClass('is-invalid');
                        element.siblings('.invalid-feedback').text(value);
                    });
                }
            },
            error: function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Terjadi kesalahan pada server!'
                });
            }
        });
    });
});
</script>
<?= $this->endSection() ?>