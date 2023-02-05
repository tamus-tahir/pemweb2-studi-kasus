<?= $this->extend('layouts/index'); ?>

<?= $this->section('content'); ?>
<div class="mb-3">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" id="btn-create">
        Tambah
    </button>
</div>

<div class="table-responsive">
    <table class="table table-hover table-bordered" id="data-table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Judul</th>
                <th scope="col">Jumlah</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($masuk as $row) : ?>
                <tr>
                    <th><?= $i++; ?></th>
                    <td><?= $row['tanggal']; ?></td>
                    <td><?= $row['judul']; ?></td>
                    <td><?= $row['jumlah']; ?></td>
                    <td>
                        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal" id="btn-update" data-tanggal="<?= $row['tanggal']; ?>" data-jumlah="<?= $row['jumlah']; ?>" data-id_buku="<?= $row['id_buku']; ?>" data-id="<?= $row['id_masuk']; ?>">
                            Ubah
                        </button>

                        <a class="btn btn-danger" href="/masuk/delete/<?= $row['id_masuk']; ?>" role="button" id="button-delete">Hapus</a>
                    </td>
                </tr>
            <?php endforeach ?>

        </tbody>
    </table>
</div>
<?= $this->endSection(); ?>

<?= $this->section('modal'); ?>
<!-- form masuk -->
<div class="modal fade" id="exampleModal" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Form Buku Masuk</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form class="row g-3 needs-validation" id="form" novalidate action="" method="post">

                    <div class="mb-3">
                        <label for="id_buku" class="form-label">Buku <span class="text-danger">*</span></label>
                        <select class="form-select" id="id_buku" name="id_buku" required>
                            <option value="">-- Pilih Buku --</option>
                            <?php foreach ($buku as $row) : ?>
                                <option value="<?= $row['id_buku']; ?>">[<?= $row['kode']; ?>] <?= $row['judul']; ?></option>
                            <?php endforeach ?>
                        </select>
                        <div class="valid-feedback">Looks good!</div>
                        <div class="invalid-feedback">Please choose a buku</div>
                    </div>

                    <div class="col-md-6">
                        <label for="tanggal" class="form-label">Tanggal <span class="text-danger">*</span></label>
                        <input type="date" class="form-control " id="tanggal" name="tanggal" required>
                        <div class="valid-feedback">Looks good!</div>
                        <div class="invalid-feedback">Please choose a tanggal</div>
                    </div>
                    <div class="col-md-6">
                        <label for="jumlah" class="form-label">Jumlah <span class="text-danger">*</span></label>
                        <input type="number" class="form-control " id="jumlah" name="jumlah" required>
                        <div class="valid-feedback">Looks good!</div>
                        <div class="invalid-feedback">Please choose a jumlah</div>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                <button type="sumbit" class="btn btn-primary">Simpan</button>

                </form>
            </div>
        </div>
    </div>
</div>
<!-- end form masuk -->
<?= $this->endSection(); ?>

<?= $this->section('script'); ?>
<script>
    $('#data-table').on('click', '#btn-update', function() {
        let id = $(this).data('id')
        $('#id_buku').val($(this).data('id_buku'));
        $('#jumlah').val($(this).data('jumlah'));
        $('#tanggal').val($(this).data('tanggal'));
        $('#form').attr('action', '/masuk/update/' + id)
    })

    $('#btn-create').on('click', function() {
        $('#form')[0].reset();
        $('#form').attr('action', '/masuk/save')
    })
</script>
<?= $this->endSection(); ?>