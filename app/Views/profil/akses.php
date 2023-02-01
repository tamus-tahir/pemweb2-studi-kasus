<?= $this->extend('layouts/index'); ?>

<?= $this->section('content'); ?>
<div class="mb-3">
    <a class="btn btn-danger" href="/profil" role="button">Back</a>
    <button class="btn btn-primary" disabled>Profil : <?= $profil['profil']; ?></button>
</div>

<div class="table-responsive">
    <table class="table table-hover table-bordered">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Navigasi</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($navigasi as $row) : ?>
                <tr>
                    <th><?= $i++; ?></th>
                    <td><?= $row['navigasi']; ?></td>
                    <td>
                        <input class="form-check-input change-access" type="checkbox" data-navigasi="<?= $row['id_navigasi']; ?>" data-profil="<?= $profil['id_profil']; ?>" <?= checkAccess($profil['id_profil'], $row['id_navigasi']) ?>>
                    </td>
                </tr>
            <?php endforeach ?>

        </tbody>
    </table>
</div>
<?= $this->endSection(); ?>

<?= $this->section('modal'); ?>

<?= $this->endSection(); ?>

<?= $this->section('script'); ?>
<script>
    $('.change-access').on('click', function() {
        let navigasi = $(this).data('navigasi')
        let profil = $(this).data('profil')

        $.ajax({
            url: '/profil/change',
            method: 'POST',
            data: {
                navigasi: navigasi,
                profil: profil,
            },
            success: (data) => {
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Data berhasil disimpan',
                    showConfirmButton: false,
                    timer: 1500
                })
            }
        })
    })
</script>
<?= $this->endSection(); ?>