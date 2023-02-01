<?= $this->extend('layouts/index'); ?>

<?= $this->section('content'); ?>
<form class="row g-3 needs-validation" novalidate action="/dashboard/updateprofil" method="post" enctype="multipart/form-data">

    <div class="col-md-8">
        <div class="mb-3">
            <label for="nama" class="form-label">Nama <span class="text-danger">*</span></label>
            <input type="text" class="form-control <?= $validation->hasError('nama') ? 'is-invalid' : ''; ?>" id="nama" name="nama" required value="<?= $user['nama']; ?>">
            <div class="valid-feedback">Looks good!</div>
            <div class="invalid-feedback"><?= $validation->getError('nama') ? $validation->getError('nama') : 'Please choose a nama.'; ?></div>
        </div>
        <div class="mb-3">
            <label for="telpon" class="form-label">Telpon </label>
            <input type="text" class="form-control <?= $validation->hasError('telpon') ? 'is-invalid' : ''; ?>" id="telpon" name="telpon" value="<?= $user['nama']; ?>">
            <div class="valid-feedback">Looks good!</div>
            <div class="invalid-feedback"><?= $validation->getError('telpon') ? $validation->getError('telpon') : 'Please choose a telpon.'; ?></div>
        </div>
        <div class="mb-3">
            <label for="username" class="form-label">Username <span class="text-danger">*</span></label>
            <input type="text" class="form-control <?= $validation->hasError('username') ? 'is-invalid' : ''; ?>" id="username" name="username" required value="<?= $user['username']; ?>">
            <div class="valid-feedback">Looks good!</div>
            <div class="invalid-feedback"><?= $validation->getError('username') ? $validation->getError('username') : 'Please choose a username.'; ?></div>
        </div>
    </div>

    <div class="col-md-4">
        <label for="foto" class="form-label">Foto <span class="text-danger">(Type File JPG/JPEG,PNG, Max Size 500kb)</span></label>
        <input class="form-control <?= $validation->hasError('foto') ? 'is-invalid' : ''; ?>" type="file" id="upload" name="foto">
        <div class="valid-feedback">Looks good!</div>
        <div class="invalid-feedback"><?= $validation->getError('foto') ?></div>
        <div class="mt-3">
            <img id="prev" src="/assets/img/<?= $user['foto'] ? $user['foto'] : 'noprofil.png'; ?>" height="270" width="100%" class="rounded">
        </div>
    </div>

    <input type="hidden" name="foto_lama" value="<?= $user['foto']; ?>">

    <div class="col-12">
        <a class="btn btn-danger me-1" href="/dashboard">Back</a>
        <button class="btn btn-primary" type="submit">Save</button>
    </div>
</form>
<?= $this->endSection(); ?>

<?= $this->section('modal'); ?>

<?= $this->endSection(); ?>

<?= $this->section('script'); ?>

<?= $this->endSection(); ?>