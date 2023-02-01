<?= $this->extend('layouts/index'); ?>

<?= $this->section('content'); ?>
<div class="mb-3">
    <a class="btn btn-primary" href="/user/create" role="button">Tambah</a>
</div>

<div class="table-responsive">
    <table class="table table-hover table-bordered" id="data-table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Profil</th>
                <th scope="col">Username</th>
                <th scope="col">Nama</th>
                <th scope="col">Aktif</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1 ?>
            <?php foreach ($user as $row) : ?>
                <tr>
                    <th><?= $i++; ?></th>
                    <td><?= $row['profil']; ?></td>
                    <td><?= $row['username']; ?></td>
                    <td><?= $row['nama']; ?></td>
                    <td><?= $row['aktif'] == 1 ? 'Yes' : 'No'; ?></td>
                    <td>
                        <button type=" button" class="btn btn-info" id="btn-detail" data-bs-toggle="modal" data-bs-target="#exampleModal" data-id="<?= $row['id_user']; ?>">
                            Detail
                        </button>
                        <button type=" button" class="btn btn-secondary" id="btn-password" data-bs-toggle="modal" data-bs-target="#passwordModal" data-id="<?= $row['id_user']; ?>" data-username="<?= $row['username']; ?>">
                            Password
                        </button>
                        <a class="btn btn-warning" href="/user/edit/<?= $row['id_user']; ?>" role="button">Ubah</a>
                        <a class="btn btn-danger" href="/user/delete/<?= $row['id_user']; ?>" role="button" id="button-delete">Hapus</a>
                    </td>
                </tr>
            <?php endforeach ?>

        </tbody>
    </table>
</div>

<?= $this->endSection(); ?>

<?= $this->section('modal'); ?>
<!-- modal detail user -->
<div class="modal fade" id="exampleModal" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Detail <?= $title; ?></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="row g-3">
                    <div class="col-md-3">
                        <img src="" alt="" class="rounded img-fluid" id="foto-user">
                    </div>
                    <div class="col-md-9">
                        <table class="table">
                            <tr>
                                <td width="120px">Username</td>
                                <td width="5px">:</td>
                                <td class="fw-bold " id="username">:</td>
                            </tr>
                            <tr>
                                <td>Profil</td>
                                <td>:</td>
                                <td class="fw-bold " id="profil">:</td>
                            </tr>
                            <tr>
                                <td>Nama</td>
                                <td>:</td>
                                <td class="fw-bold " id="nama">:</td>
                            </tr>
                            <tr>
                                <td>Telpon</td>
                                <td>:</td>
                                <td class="fw-bold " id="telpon">:</td>
                            </tr>
                            <tr>
                                <td>Aktif</td>
                                <td>:</td>
                                <td class="fw-bold " id="aktif">:</td>
                            </tr>
                        </table>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>
<!-- end modal detail user -->

<!-- modal form password -->
<div class="modal fade" id="passwordModal" data-bs-backdrop="static" tabindex="-1" aria-labelledby="passwordModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="passwordModalLabel">Form Ganti Password</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="row g-3 needs-validation" novalidate action="" method="post" id="form">

                    <h6>Username : <span id="username-form"></span></h6>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
                        <input type="password" class="form-control " id="password" name="password" required minlength="8">
                        <div class="valid-feedback">Looks good!</div>
                        <div class="invalid-feedback">Please choose a password</div>
                    </div>
                    <div class="mb-3">
                        <label for="passwor_confirm" class="form-label">Konfirmasi Password <span class="text-danger">*</span></label>
                        <input type="password" class="form-control " id="passwor_confirm" name="passwor_confirm" required minlength="8">
                        <div class="valid-feedback">Looks good!</div>
                        <div class="invalid-feedback">Please choose a passwor confirm</div>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>

                </form>
            </div>
        </div>
    </div>
</div>
<!-- end modal form password -->
<?= $this->endSection(); ?>

<?= $this->section('script'); ?>
<script>
    $('#data-table').on('click', '#btn-password', function() {
        $('#username-form').html($(this).data('username'))
        $('#form').attr('action', '/user/password/' + $(this).data('id'))
    })

    $('#data-table').on('click', '#btn-detail', function() {
        $.ajax({
            url: "/user/detail",
            method: "POST",
            dataType: 'json',
            data: {
                id: $(this).data('id'),
            },
            success: (data) => {
                let foto = data.foto
                if (foto) {
                    $('#foto-user').attr('src', '/assets/img/' + foto);
                } else {
                    $('#foto-user').attr('src', '/assets/img/noprofil.png');
                }

                $('#username').html(data.username)
                $('#profil').html(data.profil)
                $('#nama').html(data.nama)
                $('#telpon').html(data.telpon)
                $('#aktif').html(data.aktif == 1 ? 'Yes' : 'No')
            },
        })
    })
</script>
<?= $this->endSection(); ?>