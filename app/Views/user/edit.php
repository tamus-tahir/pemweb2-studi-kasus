<?= $this->extend('layouts/index'); ?>

<?= $this->section('content'); ?>
<form class="row g-3 needs-validation" novalidate action="/user/update/<?= $user['id_user']; ?>" method="post" enctype="multipart/form-data">

    <div class="col-md-6">
        <label for="nama" class="form-label">Nama <span class="text-danger">*</span></label>
        <input type="text" class="form-control <?= $validation->hasError('nama') ? 'is-invalid' : ''; ?>" id="nama" name="nama" required value="<?= $user['nama']; ?>">
        <div class="valid-feedback">Looks good!</div>
        <div class="invalid-feedback"><?= $validation->getError('nama') ? $validation->getError('nama') : 'Please choose a nama.'; ?></div>
    </div>
    <div class="col-md-6">
        <label for="telpon" class="form-label">Telpon </label>
        <input type="text" class="form-control <?= $validation->hasError('telpon') ? 'is-invalid' : ''; ?>" id="telpon" name="telpon" value="<?= $user['nama']; ?>">
        <div class="valid-feedback">Looks good!</div>
        <div class="invalid-feedback"><?= $validation->getError('telpon') ? $validation->getError('telpon') : 'Please choose a telpon.'; ?></div>
    </div>
    <div class="col-md-3">
        <label for="id_profil" class="form-label">Profil <span class="text-danger">*</span></label>
        <select class="form-select mb-3 <?= $validation->hasError('id_profil') ? 'is-invalid' : ''; ?>" name="id_profil" required>
            <option value="">-- Pilih Profil --</option>
            <?php foreach ($profil as $row) : ?>
                <option value="<?= $row['id_profil']; ?>" <?= $user['id_profil'] == $row['id_profil'] ? 'selected' : ''; ?>><?= $row['profil']; ?></option>
            <?php endforeach ?>
        </select>
        <div class="valid-feedback">Looks good!</div>
        <div class="invalid-feedback"><?= $validation->getError('id_profil') ? $validation->getError('id_profil') : 'Please choose a profil.'; ?></div>
    </div>
    <div class="col-md-3">
        <label for="aktif" class="form-label">Aktif <span class="text-danger">*</span></label>
        <select class="form-select mb-3 <?= $validation->hasError('aktif') ? 'is-invalid' : ''; ?>" name="aktif" required>
            <option value="1" <?= $user['id_profil'] == 1 ? 'selected' : ''; ?>>Yes</option>
            <option value="0" <?= $user['id_profil'] == 0 ? 'selected' : ''; ?>>No</option>
        </select>
        <div class="valid-feedback">Looks good!</div>
        <div class="invalid-feedback"><?= $validation->getError('aktif') ? $validation->getError('aktif') : 'Please choose a aktif.'; ?></div>
    </div>
    <div class="col-md-6">
        <label for="username" class="form-label">Username <span class="text-danger">*</span></label>
        <input type="text" class="form-control <?= $validation->hasError('username') ? 'is-invalid' : ''; ?>" id="username" name="username" required value="<?= $user['username']; ?>">
        <div class="valid-feedback">Looks good!</div>
        <div class="invalid-feedback"><?= $validation->getError('username') ? $validation->getError('username') : 'Please choose a username.'; ?></div>
    </div>

    <div class="col-md-3">
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
        <a class="btn btn-danger me-1" href="/user">Back</a>
        <button class="btn btn-primary" type="submit">Save</button>
    </div>
</form>
<?= $this->endSection(); ?>

<?= $this->section('modal'); ?>

<?= $this->endSection(); ?>

<?= $this->section('script'); ?>

<?= $this->endSection(); ?>