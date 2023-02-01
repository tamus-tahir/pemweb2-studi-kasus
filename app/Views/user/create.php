<?= $this->extend('layouts/index'); ?>

<?= $this->section('content'); ?>
<form class="row g-3 needs-validation" novalidate action="/user/save" method="post" enctype="multipart/form-data">

    <div class="col-md-6">
        <label for="nama" class="form-label">Nama <span class="text-danger">*</span></label>
        <input type="text" class="form-control <?= $validation->hasError('nama') ? 'is-invalid' : ''; ?>" id="nama" name="nama" required>
        <div class="valid-feedback">Looks good!</div>
        <div class="invalid-feedback"><?= $validation->getError('nama') ? $validation->getError('nama') : 'Please choose a nama.'; ?></div>
    </div>
    <div class="col-md-6">
        <label for="telpon" class="form-label">Telpon </label>
        <input type="text" class="form-control <?= $validation->hasError('telpon') ? 'is-invalid' : ''; ?>" id="telpon" name="telpon">
        <div class="valid-feedback">Looks good!</div>
        <div class="invalid-feedback"><?= $validation->getError('telpon') ? $validation->getError('telpon') : 'Please choose a telpon.'; ?></div>
    </div>

    <div class="col-md-3">
        <label for="id_profil" class="form-label">Profil <span class="text-danger">*</span></label>
        <select class="form-select <?= $validation->hasError('id_profil') ? 'is-invalid' : ''; ?>" id="id_profil" name="id_profil" required>
            <option value="">-- Pilih Profil --</option>
            <?php foreach ($profil as $row) : ?>
                <option value="<?= $row['id_profil']; ?>"><?= $row['profil']; ?></option>
            <?php endforeach ?>
        </select>
        <div class="valid-feedback">Looks good!</div>
        <div class="invalid-feedback"><?= $validation->getError('id_profil') ? $validation->getError('id_profil') : 'Please choose a id_profil.'; ?></div>
    </div>
    <div class="col-md-3">
        <label for="aktif" class="form-label">Aktif <span class="text-danger">*</span></label>
        <select class="form-select <?= $validation->hasError('aktif') ? 'is-invalid' : ''; ?>" id="aktif" name="aktif" required>
            <option value="1">Yes</option>
            <option value="0">No</option>
        </select>
        <div class="valid-feedback">Looks good!</div>
        <div class="invalid-feedback"><?= $validation->getError('aktif') ? $validation->getError('aktif') : 'Please choose a aktif.'; ?></div>
    </div>

    <div class="col-md-6">
        <label for="username" class="form-label">Username <span class="text-danger">*</span></label>
        <input type="text" class="form-control <?= $validation->hasError('username') ? 'is-invalid' : ''; ?>" id="username" name="username" required>
        <div class="valid-feedback">Looks good!</div>
        <div class="invalid-feedback"><?= $validation->getError('username') ? $validation->getError('username') : 'Please choose a username.'; ?></div>
    </div>
    <div class="col-md-6">
        <label for="password" class="form-label">Password <span class="text-danger">* (Min 8 karakter)</span></label>
        <input type="password" class="form-control <?= $validation->hasError('password') ? 'is-invalid' : ''; ?>" id="password" name="password" required minlength="8">
        <div class="valid-feedback">Looks good!</div>
        <div class="invalid-feedback"><?= $validation->getError('password') ? $validation->getError('password') : 'Please choose a password.'; ?></div>
    </div>
    <div class="col-md-6">
        <label for="password_confirm" class="form-label">Konfirmasi Password <span class="text-danger">* (Min 8 karakter)</span></label>
        <input type="password" class="form-control <?= $validation->hasError('password_confirm') ? 'is-invalid' : ''; ?>" id="password_confirm" name="password_confirm" required minlength="8">
        <div class="valid-feedback">Looks good!</div>
        <div class="invalid-feedback"><?= $validation->getError('password_confirm') ? $validation->getError('password_confirm') : 'Please choose a password_confirm.'; ?></div>
    </div>

    <div class="mb-3 col-md-4">
        <label for="foto" class="form-label">Upload foto <span class="text-danger">(Type File PNG/JPG/JPEG, Max Size 500kb)</span></label>
        <input class="form-control <?= $validation->hasError('foto') ? 'is-invalid' : ''; ?>" type="file" id="upload" name="foto">
        <div class="invalid-feedback"><?= $validation->getError('foto') ? $validation->getError('foto') : 'Please choose a foto.'; ?></div>
        <img src="/assets/img/noprofil.png" alt="" height="270" width="80%" class="rounded mt-3" id="prev">
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