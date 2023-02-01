<?= $this->extend('layouts/index'); ?>

<?= $this->section('content'); ?>
<form class="row g-3 needs-validation" novalidate action="/config/update" enctype="multipart/form-data" method="post">

    <div class="col-md-4">
        <label for="appname" class="form-label">App Name <span class="text-danger">*</span></label>
        <input type="text" class="form-control <?= $validation->hasError('appname') ? 'is-invalid' : ''; ?>" id="appname" name="appname" required value="<?= $config['appname']; ?>">
        <div class="valid-feedback">Looks good!</div>
        <div class="invalid-feedback"><?= $validation->getError('appname') ? $validation->getError('appname') : 'Please choose a appname.'; ?></div>
    </div>
    <div class="col-md-8">
        <label for="copyright" class="form-label">Copyright <span class="text-danger">*</span></label>
        <input type="text" class="form-control <?= $validation->hasError('copyright') ? 'is-invalid' : ''; ?>" id="copyright" name="copyright" required value="<?= $config['copyright']; ?>">
        <div class="valid-feedback">Looks good!</div>
        <div class="invalid-feedback"><?= $validation->getError('copyright') ? $validation->getError('copyright') : 'Please choose a copyright.'; ?></div>
    </div>
    <div class="col-md-4">
        <label for="author" class="form-label">Author <span class="text-danger">*</span></label>
        <input type="text" class="form-control <?= $validation->hasError('author') ? 'is-invalid' : ''; ?>" id="author" name="author" required value="<?= $config['author']; ?>">
        <div class="valid-feedback">Looks good!</div>
        <div class="invalid-feedback"><?= $validation->getError('author') ? $validation->getError('author') : 'Please choose a author.'; ?></div>
    </div>
    <div class="col-md-8">
        <label for="keywords" class="form-label">Keywords <span class="text-danger">*</span></label>
        <input type="text" class="form-control <?= $validation->hasError('keywords') ? 'is-invalid' : ''; ?>" id="keywords" name="keywords" required value="<?= $config['keywords']; ?>">
        <div class="valid-feedback">Looks good!</div>
        <div class="invalid-feedback"><?= $validation->getError('keywords') ? $validation->getError('keywords') : 'Please choose a keywords.'; ?></div>
    </div>
    <div class="col-12">
        <label for="description" class="form-label">Description <span class="text-danger">*</span></label>
        <textarea class="form-control <?= $validation->hasError('description') ? 'is-invalid' : ''; ?>" id="description" name="description" required cols="30" rows="4"><?= $config['description']; ?></textarea>
        <div class="valid-feedback">Looks good!</div>
        <div class="invalid-feedback"><?= $validation->getError('description') ? $validation->getError('description') : 'Please choose a description.'; ?></div>
    </div>

    <div class="mb-3 col-md-4">
        <label for="logo" class="form-label">Upload Logo <span class="text-danger">(Type File PNG/JPG/JPEG, Max Size 500kb)</span></label>
        <input class="form-control <?= $validation->hasError('logo') ? 'is-invalid' : ''; ?>" type="file" id="upload" name="logo">
        <div class="invalid-feedback"><?= $validation->getError('logo') ? $validation->getError('logo') : 'Please choose a logo.'; ?></div>

        <img src="/assets/img/<?= $config['logo']; ?>" alt="" height="270" width="100%" class="rounded mt-3" id="prev">
    </div>

    <input type="hidden" name="logo_lama" value="<?= $config['logo']; ?>">

    <div class="col-12">
        <button class="btn btn-primary" type="submit">Submit form</button>
    </div>
</form>
<?= $this->endSection(); ?>

<?= $this->section('modal'); ?>

<?= $this->endSection(); ?>

<?= $this->section('script'); ?>

<?= $this->endSection(); ?>