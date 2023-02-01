<?= $this->extend('layouts/index'); ?>

<?= $this->section('content'); ?>
<div class="row g-3">
    <div class="col-md-3">
        <img src="/assets/img/<?= $user['foto'] ? $user['foto'] : 'noprofil.png'; ?>" alt="" class="rounded img-fluid" id="foto-user">
    </div>
    <div class="col-md-9">
        <table class="table">
            <tr>
                <td width="120px">Username</td>
                <td width="5px">:</td>
                <td class="fw-bold " id="username"><?= $user['username']; ?></td>
            </tr>
            <tr>
                <td>Profil</td>
                <td>:</td>
                <td class="fw-bold " id="profil"><?= $user['profil']; ?></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td class="fw-bold " id="nama"><?= $user['nama']; ?></td>
            </tr>
            <tr>
                <td>Telpon</td>
                <td>:</td>
                <td class="fw-bold " id="telpon"><?= $user['telpon']; ?></td>
            </tr>
        </table>

        <div>
            <a href="/dashboard/changeprofil" class="btn btn-primary">Change Profil</a>
            <a href="/dashboard/changepassword" class="btn btn-success">Change Password</a>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>

<?= $this->section('modal'); ?>

<?= $this->endSection(); ?>

<?= $this->section('script'); ?>

<?= $this->endSection(); ?>