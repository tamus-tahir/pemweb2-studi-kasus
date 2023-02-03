<?= $this->extend('layouts/index'); ?>

<?= $this->section('content'); ?>
<div class="mb-3">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" id="btn-create">
        Tambah
    </button>
    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#excelModal" id="btn-create">
        Upload File Excel
    </button>
    <a type="button" class="btn btn-secondary" href="/assets/file/format-mahasiswa.xlsx">
        Download Format Excel
    </a>
</div>

<div class="table-responsive">
    <table class="table table-hover table-bordered" id="export-table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Prodi</th>
                <th scope="col">NIM</th>
                <th scope="col">Nama</th>
                <th scope="col">Telpon</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($mahasiswa as $row) : ?>
                <tr>
                    <th><?= $i++; ?></th>
                    <td><?= $row['prodi']; ?></td>
                    <td><?= $row['nim']; ?></td>
                    <td><?= $row['nama']; ?></td>
                    <td><?= $row['telpon']; ?></td>
                    <td>
                        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal" id="btn-update" data-id="<?= $row['id_mahasiswa']; ?>">
                            Ubah
                        </button>

                        <a class="btn btn-danger" href="/mahasiswa/delete/<?= $row['id_mahasiswa']; ?>" role="button" id="button-delete">Hapus</a>
                    </td>
                </tr>
            <?php endforeach ?>

        </tbody>
    </table>
</div>
<?= $this->endSection(); ?>

<?= $this->section('modal'); ?>
<!-- form mahasiswa -->
<div class="modal fade" id="exampleModal" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Form Mahasiswa</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form class="row g-3 needs-validation" id="form" novalidate action="" method="post">

                    <div class="mb-3">
                        <label for="id_prodi" class="form-label">Prodi <span class="text-danger">*</span></label>
                        <select class="form-select" id="id_prodi" name="id_prodi" required>
                            <option value="">-- Pilih prodi --</option>
                            <?php foreach ($prodi as $row) : ?>
                                <option value="<?= $row['id_prodi']; ?>"><?= $row['prodi']; ?></option>
                            <?php endforeach ?>
                        </select>
                        <div class="valid-feedback">Looks good!</div>
                        <div class="invalid-feedback">Please choose a prodi</div>
                    </div>

                    <div class="mb-3">
                        <label for="nim" class="form-label">NIM <span class="text-danger">*</span></label>
                        <input type="text" class="form-control " id="nim" name="nim" required>
                        <div class="valid-feedback">Looks good!</div>
                        <div class="invalid-feedback">Please choose a nim</div>
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama <span class="text-danger">*</span></label>
                        <input type="text" class="form-control " id="nama" name="nama" required>
                        <div class="valid-feedback">Looks good!</div>
                        <div class="invalid-feedback">Please choose a nama</div>
                    </div>
                    <div class="mb-3">
                        <label for="telpon" class="form-label">Telpon <span class="text-danger">*</span></label>
                        <input type="text" class="form-control " id="telpon" name="telpon" required>
                        <div class="valid-feedback">Looks good!</div>
                        <div class="invalid-feedback">Please choose a telpon</div>
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
<!-- end form mahasiswa -->

<!-- form upload excel -->
<div class="modal fade" id="excelModal" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Form Upload Excel</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form class="row g-3 needs-validation" novalidate action="/mahasiswa/excel" method="post" enctype="multipart/form-data">

                    <div class="mb-3">
                        <label for="id_prodi" class="form-label">Prodi <span class="text-danger">*</span></label>
                        <select class="form-select" id="id_prodi" name="id_prodi" required>
                            <option value="">-- Pilih prodi --</option>
                            <?php foreach ($prodi as $row) : ?>
                                <option value="<?= $row['id_prodi']; ?>"><?= $row['prodi']; ?></option>
                            <?php endforeach ?>
                        </select>
                        <div class="valid-feedback">Looks good!</div>
                        <div class="invalid-feedback">Please choose a prodi</div>
                    </div>

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
    $(document).ready(function() {
        $('#export-table').DataTable({
            dom: 'Bfrtip',
            buttons: [{
                extend: 'excel',
                text: 'Export Excel',
                className: 'btn btn-info float-end ms-3 mb-3',
                exportOptions: {
                    columns: [0, 1, 2, 3, 4]
                }
            }]
        });
    });

    $('#export-table').on('click', '#btn-update', function() {
        let id = $(this).data('id')
        $('#form').attr('action', '/mahasiswa/update/' + id)

        $.ajax({
            url: '/mahasiswa/get',
            method: 'POST',
            dataType: 'json',
            data: {
                id: id
            },
            success: (data) => {
                $('#id_prodi').val(data.id_prodi)
                $('#nim').val(data.nim)
                $('#nama').val(data.nama)
                $('#telpon').val(data.telpon)
            }
        })
    })

    $('#btn-create').on('click', function() {
        $('#form')[0].reset();
        $('#form').attr('action', '/mahasiswa/save')
    })
</script>
<?= $this->endSection(); ?>