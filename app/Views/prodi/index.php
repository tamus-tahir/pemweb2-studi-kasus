<?= $this->extend('layouts/index'); ?>

<?= $this->section('content'); ?>
<div class="mb-3">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" id="btn-create">
        Tambah
    </button>
    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#excelModal" id="btn-create">
        Upload File Excel
    </button>
    <a type="button" class="btn btn-secondary" href="/assets/file/format-prodi.xlsx">
        Download Format Excel
    </a>
</div>

<div class="table-responsive">
    <table class="table table-hover table-bordered" id="data-table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Prodi</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($prodi as $row) : ?>
                <tr>
                    <th><?= $i++; ?></th>
                    <td><?= $row['prodi']; ?></td>
                    <td>
                        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal" id="btn-update" data-prodi="<?= $row['prodi']; ?>" data-id="<?= $row['id_prodi']; ?>">
                            Ubah
                        </button>

                        <a class="btn btn-danger" href="/prodi/delete/<?= $row['id_prodi']; ?>" role="button" id="button-delete">Hapus</a>
                    </td>
                </tr>
            <?php endforeach ?>

        </tbody>
    </table>
</div>
<?= $this->endSection(); ?>

<?= $this->section('modal'); ?>
<!-- form prodi -->
<div class="modal fade" id="exampleModal" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Form Prodi</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form class="row g-3 needs-validation" id="form" novalidate action="" method="post">

                    <div class="mb-3">
                        <label for="prodi" class="form-label">Prodi <span class="text-danger">*</span></label>
                        <input type="text" class="form-control " id="prodi" name="prodi" required>
                        <div class="valid-feedback">Looks good!</div>
                        <div class="invalid-feedback">Please choose a prodi</div>
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
<!-- end form prodi -->

<!-- form upload excel -->
<div class="modal fade" id="excelModal" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Form Upload Excel</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form class="row g-3 needs-validation" id="form" novalidate action="/prodi/excel" method="post" enctype="multipart/form-data">

                    <div class="mb-3">
                        <label for="file" class="form-label">Upload file excel sesuai format</label>
                        <input class="form-control" type="file" id="file" name="file">
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
<!-- end form upload excel -->
<?= $this->endSection(); ?>

<?= $this->section('script'); ?>
<script>
    $('#data-table').on('click', '#btn-update', function() {
        let prodi = $(this).data('prodi')
        let id = $(this).data('id')
        $('#prodi').val(prodi);
        $('#form').attr('action', '/prodi/update/' + id)
    })

    $('#btn-create').on('click', function() {
        $('#prodi').val('');
        $('#form').attr('action', '/prodi/save')
    })
</script>
<?= $this->endSection(); ?>