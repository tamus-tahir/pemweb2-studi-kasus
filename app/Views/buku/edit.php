<?= $this->extend('layouts/index'); ?>

<?= $this->section('content'); ?>
<form class="row g-3 needs-validation" novalidate action="/buku/update/<?= $buku['id_buku']; ?>" method="post" enctype="multipart/form-data">

    <div class="col-12">
        <label for="judul" class="form-label">Judul <span class="text-danger">*</span></label>
        <input type="text" class="form-control <?= $validation->hasError('judul') ? 'is-invalid' : ''; ?>" id="judul" name="judul" required value="<?= $buku['judul']; ?>">
        <div class="valid-feedback">Looks good!</div>
        <div class="invalid-feedback"><?= $validation->getError('judul') ? $validation->getError('judul') : 'Please choose a judul.'; ?></div>
    </div>
    <div class="col-12">
        <label for="penulis" class="form-label">Penulis <span class="text-danger">*</span></label>
        <input type="text" class="form-control <?= $validation->hasError('penulis') ? 'is-invalid' : ''; ?>" id="penulis" name="penulis" required value="<?= $buku['penulis']; ?>">
        <div class="valid-feedback">Looks good!</div>
        <div class="invalid-feedback"><?= $validation->getError('penulis') ? $validation->getError('penulis') : 'Please choose a penulis.'; ?></div>
    </div>
    <div class="col-12">
        <label for="penerbit" class="form-label">Penerbit <span class="text-danger">*</span></label>
        <input type="text" class="form-control <?= $validation->hasError('penerbit') ? 'is-invalid' : ''; ?>" id="penerbit" name="penerbit" required value="<?= $buku['penerbit']; ?>">
        <div class="valid-feedback">Looks good!</div>
        <div class="invalid-feedback"><?= $validation->getError('penerbit') ? $validation->getError('penerbit') : 'Please choose a penerbit.'; ?></div>
    </div>
    <div class="col-12">
        <label for="deskripsi" class="form-label">Deskripsi <span class="text-danger">*</span></label>
        <textarea class="form-control tinymce-editor <?= $validation->hasError('deskripsi') ? 'is-invalid' : ''; ?>" id="deskripsi" name="deskripsi" required cols="30" rows="10"><?= $buku['deskripsi']; ?></textarea>
        <div class="valid-feedback">Looks good!</div>
        <div class="invalid-feedback"><?= $validation->getError('deskripsi') ? $validation->getError('deskripsi') : 'Please choose a deskripsi.'; ?></div>
    </div>

    <div class="col-12">
        <label for="sampul" class="form-label">sampul <span class="text-danger">(Type File JPG/JPEG,PNG, Max Size 500kb)</span></label>
        <input class="form-control <?= $validation->hasError('sampul') ? 'is-invalid' : ''; ?>" type="file" id="upload" name="sampul">
        <div class="valid-feedback">Looks good!</div>
        <div class="invalid-feedback"><?= $validation->getError('sampul') ?></div>
        <div class="mt-3">
            <img id="prev" src="/assets/<?= $buku['sampul'] ? 'buku/' . $buku['sampul'] : 'img/noprofil.png'; ?>" height="300" width="30%" class="rounded">
        </div>
    </div>

    <input type="hidden" name="sampul_lama" value="<?= $buku['sampul']; ?>">

    <div class="col-12">
        <a class="btn btn-danger me-1" href="/buku">Back</a>
        <button class="btn btn-primary" type="submit">Save</button>
    </div>
</form>
<?= $this->endSection(); ?>

<?= $this->section('modal'); ?>

<?= $this->endSection(); ?>

<?= $this->section('script'); ?>

<?= $this->endSection(); ?>