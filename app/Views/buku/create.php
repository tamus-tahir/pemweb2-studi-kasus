<?= $this->extend('layouts/index'); ?>

<?= $this->section('content'); ?>
<form class="row g-3 needs-validation" novalidate action="/buku/save" method="post" enctype="multipart/form-data">

    <div class="col-12">
        <label for="judul" class="form-label">Judul <span class="text-danger">*</span></label>
        <input type="text" class="form-control <?= $validation->hasError('judul') ? 'is-invalid' : ''; ?>" id="judul" name="judul" required>
        <div class="valid-feedback">Looks good!</div>
        <div class="invalid-feedback"><?= $validation->getError('judul') ? $validation->getError('judul') : 'Please choose a judul.'; ?></div>
    </div>
    <div class="col-12">
        <label for="penulis" class="form-label">Penulis <span class="text-danger">*</span></label>
        <input type="text" class="form-control <?= $validation->hasError('penulis') ? 'is-invalid' : ''; ?>" id="penulis" name="penulis" required>
        <div class="valid-feedback">Looks good!</div>
        <div class="invalid-feedback"><?= $validation->getError('penulis') ? $validation->getError('penulis') : 'Please choose a penulis.'; ?></div>
    </div>
    <div class="col-12">
        <label for="penerbit" class="form-label">Penerbit <span class="text-danger">*</span></label>
        <input type="text" class="form-control <?= $validation->hasError('penerbit') ? 'is-invalid' : ''; ?>" id="penerbit" name="penerbit" required>
        <div class="valid-feedback">Looks good!</div>
        <div class="invalid-feedback"><?= $validation->getError('penerbit') ? $validation->getError('penerbit') : 'Please choose a penerbit.'; ?></div>
    </div>
    <div class="col-12">
        <label for="deskripsi" class="form-label">Deskripsi <span class="text-danger">*</span></label>
        <textarea class="form-control tinymce-editor <?= $validation->hasError('deskripsi') ? 'is-invalid' : ''; ?>" id="deskripsi" name="deskripsi" required cols="30" rows="10"></textarea>
        <div class="valid-feedback">Looks good!</div>
        <div class="invalid-feedback"><?= $validation->getError('deskripsi') ? $validation->getError('deskripsi') : 'Please choose a deskripsi.'; ?></div>
    </div>


    <div class="mb-3 col-12">
        <label for="sampul" class="form-label">Upload sampul <span class="text-danger">(Type File PNG/JPG/JPEG, Max Size 500kb, Potrait)</span></label>
        <input class="form-control <?= $validation->hasError('sampul') ? 'is-invalid' : ''; ?>" type="file" id="upload" name="sampul">
        <div class="invalid-feedback"><?= $validation->getError('sampul') ? $validation->getError('sampul') : 'Please choose a sampul.'; ?></div>
        <img src="/assets/img/book-cover.png" alt="" height="300" width="30%" class="rounded mt-3" id="prev">
    </div>

    <div class="col-12">
        <a href="/buku" class="btn btn-danger">Back</a>
        <button class="btn btn-primary" type="submit">Save</button>
    </div>
</form>
<?= $this->endSection(); ?>

<?= $this->section('modal'); ?>

<?= $this->endSection(); ?>

<?= $this->section('script'); ?>

<?= $this->endSection(); ?>