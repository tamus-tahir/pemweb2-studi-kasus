<?= $this->extend('layouts/index'); ?>

<?= $this->section('content'); ?>
<section class="section dashboard">
    <div class="row">

        <div class="col-md-3">
            <div class="card info-card ">
                <div class="card-body">
                    <h5 class="card-title">Navigasi</h5>
                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center text-danger bg-light">
                            <i class="bi bi-sign-turn-right"></i>
                        </div>
                        <div class="ps-3">
                            <h6><?= getCount('tabel_navigasi'); ?></h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card info-card">
                <div class="card-body">
                    <h5 class="card-title">Profil</h5>
                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center text-primary bg-light">
                            <i class="bi bi-person"></i>
                        </div>
                        <div class="ps-3">
                            <h6><?= getCount('tabel_profil'); ?></h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card info-card">
                <div class="card-body">
                    <h5 class="card-title">User</h5>
                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center text-success bg-light">
                            <i class="bi bi-people"></i>
                        </div>
                        <div class="ps-3">
                            <h6><?= getCount('tabel_user'); ?></h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
<?= $this->endSection(); ?>

<?= $this->section('modal'); ?>

<?= $this->endSection(); ?>

<?= $this->section('script'); ?>

<?= $this->endSection(); ?>