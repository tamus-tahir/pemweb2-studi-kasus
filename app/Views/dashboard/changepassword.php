<?= $this->extend('layouts/index'); ?>

<?= $this->section('content'); ?>
<form class="row g-3 needs-validation" novalidate action="/dashboard/updatepassword" method="post" enctype="multipart/form-data">

    <div class="mb-3">
        <label for="oldpassword" class="form-label">Old Password <span class="text-danger">* (Min 8 karakter)</span></label>
        <input type="password" class="form-control <?= $validation->hasError('oldpassword') ? 'is-invalid' : ''; ?>" id="oldpassword" name="oldpassword" required minlength="8">
        <div class="valid-feedback">Looks good!</div>
        <div class="invalid-feedback"><?= $validation->getError('oldpassword') ? $validation->getError('oldpassword') : 'Please choose a old password.'; ?></div>
    </div>

    <div class="mb-3">
        <label for="password" class="form-label">New Password <span class="text-danger">* (Min 8 karakter)</span></label>
        <input type="password" class="form-control <?= $validation->hasError('password') ? 'is-invalid' : ''; ?>" id="password" name="password" required minlength="8">
        <div class="valid-feedback">Looks good!</div>
        <div class="invalid-feedback"><?= $validation->getError('password') ? $validation->getError('password') : 'Please choose a old password.'; ?></div>
    </div>

    <div class="mb-3">
        <label for="passconfirm" class="form-label">Confirm Password <span class="text-danger">* (Min 8 karakter)</span></label>
        <input type="password" class="form-control <?= $validation->hasError('passconfirm') ? 'is-invalid' : ''; ?>" id="passconfirm" name="passconfirm" required minlength="8">
        <div class="valid-feedback">Looks good!</div>
        <div class="invalid-feedback"><?= $validation->getError('passconfirm') ? $validation->getError('passconfirm') : 'Please choose a old passconfirm.'; ?></div>
    </div>


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