<?= $this->extend('layouts/index'); ?>

<?= $this->section('content'); ?>
<div class="mb-3">
    <a class="btn btn-primary" href="/navigasi/create" role="button">Tambah</a>
</div>

<div class="table-responsive">
    <table class="table table-hover table-bordered" id="data-table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Navigasi</th>
                <th scope="col">Url</th>
                <th scope="col">Icon</th>
                <th scope="col">Urutan</th>
                <th scope="col">Aktif</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($navigasi as $row) : ?>
                <tr>
                    <th><?= $i++; ?></th>
                    <td><?= $row['navigasi']; ?></td>
                    <td><?= $row['url']; ?></td>
                    <td><?= $row['icon']; ?></td>
                    <td><?= $row['urutan']; ?></td>
                    <td><?= $row['aktif']; ?></td>
                    <td>
                        <a class="btn btn-warning" href="/navigasi/edit/<?= $row['id_navigasi']; ?>" role="button">Ubah</a>
                        <a class="btn btn-danger" href="/navigasi/delete/<?= $row['id_navigasi']; ?>" role="button" id="button-delete">Hapus</a>
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

<?= $this->endSection(); ?>