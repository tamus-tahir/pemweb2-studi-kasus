<?= $this->extend('layouts/index'); ?>

<?= $this->section('content'); ?>
<form class="row g-3 needs-validation" novalidate action="/navigasi/save" method="post">

    <div class="col-md-6">
        <label for="navigasi" class="form-label">Navigasi <span class="text-danger">*</span></label>
        <input type="text" class="form-control <?= $validation->hasError('navigasi') ? 'is-invalid' : ''; ?>" id="navigasi" name="navigasi" required>
        <div class="valid-feedback">Looks good!</div>
        <div class="invalid-feedback"><?= $validation->getError('navigasi') ? $validation->getError('navigasi') : 'Please choose a navigasi.'; ?></div>
    </div>
    <div class="col-md-6">
        <label for="url" class="form-label">URL <span class="text-danger">*</span></label>
        <input type="text" class="form-control <?= $validation->hasError('url') ? 'is-invalid' : ''; ?>" id="url" name="url" required>
        <div class="valid-feedback">Looks good!</div>
        <div class="invalid-feedback"><?= $validation->getError('url') ? $validation->getError('url') : 'Please choose a url.'; ?></div>
    </div>
    <div class="col-md-6">
        <label for="icon" class="form-label">Icon <a href="https://icons.getbootstrap.com/" target="_blank">Lihat Icon</a> <span class="text-danger">*</span></label>
        <input type="text" class="form-control <?= $validation->hasError('icon') ? 'is-invalid' : ''; ?>" id="icon" name="icon" required>
        <div class="valid-feedback">Looks good!</div>
        <div class="invalid-feedback"><?= $validation->getError('icon') ? $validation->getError('icon') : 'Please choose a icon.'; ?></div>
    </div>
    <div class="col-md-3">
        <label for="urutan" class="form-label">Urutan <span class="text-danger">*</span></label>
        <input type="number" class="form-control <?= $validation->hasError('urutan') ? 'is-invalid' : ''; ?>" id="urutan" name="urutan" required>
        <div class="valid-feedback">Looks good!</div>
        <div class="invalid-feedback"><?= $validation->getError('urutan') ? $validation->getError('urutan') : 'Please choose a urutan.'; ?></div>
    </div>
    <div class="col-md-3">
        <label for="aktif" class="form-label">Aktif <span class="text-danger">*</span></label>
        <select class="form-select <?= $validation->hasError('aktif') ? 'is-invalid' : ''; ?>" id="aktif" name="aktif" required>
            <option value="Yes">Yes</option>
            <option value="No">No</option>
        </select>
        <div class="valid-feedback">Looks good!</div>
        <div class="invalid-feedback"><?= $validation->getError('aktif') ? $validation->getError('aktif') : 'Please choose a aktif.'; ?></div>
    </div>

    <div class="col-12">
        <a href="/navigasi" class="btn btn-danger">Back</a>
        <button class="btn btn-primary" type="submit">Save</button>
    </div>
</form>
<?= $this->endSection(); ?>

<?= $this->section('modal'); ?>

<?= $this->endSection(); ?>

<?= $this->section('script'); ?>

<?= $this->endSection(); ?>