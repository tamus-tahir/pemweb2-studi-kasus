<?= $this->extend('layouts/index'); ?>

<?= $this->section('content'); ?>
<div class="mb-3">
    <a class="btn btn-primary" href="/buku/create" role="button">Tambah</a>
    <a class="btn btn-success" href="/buku/pdf" role="button" target="_blank">Cetak PDF</a>
</div>

<div class="table-responsive">
    <table class="table table-hover table-bordered" id="data-table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Kode</th>
                <th scope="col">Judul</th>
                <th scope="col">Penulis</th>
                <th scope="col">Penerbit</th>
                <th scope="col">Stok</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1 ?>
            <?php foreach ($buku as $row) : ?>
                <tr>
                    <th><?= $i++; ?></th>
                    <td class="text-nowrap"><?= $row['kode']; ?></td>
                    <td><?= $row['judul']; ?></td>
                    <td><?= $row['penulis']; ?></td>
                    <td><?= $row['penerbit']; ?></td>
                    <td><?= $row['stok']; ?></td>
                    <td class="text-nowrap">
                        <button type=" button" class="btn btn-info" id="btn-detail" data-bs-toggle="modal" data-bs-target="#exampleModal" data-id="<?= $row['id_buku']; ?>">
                            Detail
                        </button>
                        <a class="btn btn-warning" href="/buku/edit/<?= $row['id_buku']; ?>" role="button">Ubah</a>
                        <a class="btn btn-danger" href="/buku/delete/<?= $row['id_buku']; ?>" role="button" id="button-delete">Hapus</a>
                    </td>
                </tr>
            <?php endforeach ?>

        </tbody>
    </table>
</div>

<?= $this->endSection(); ?>

<?= $this->section('modal'); ?>
<!-- modal detail buku -->
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
                        <img src="" alt="" class="rounded img-fluid" id="sampul-buku">
                    </div>
                    <div class="col-md-9">
                        <table class="table">
                            <tr>
                                <td width="120px">Kode</td>
                                <td width="5px">:</td>
                                <td class="fw-bold " id="kode">:</td>
                            </tr>
                            <tr>
                                <td>Judul</td>
                                <td>:</td>
                                <td class="fw-bold " id="judul">:</td>
                            </tr>
                            <tr>
                                <td>Penulis</td>
                                <td>:</td>
                                <td class="fw-bold " id="penulis">:</td>
                            </tr>
                            <tr>
                                <td>Penerbit</td>
                                <td>:</td>
                                <td class="fw-bold " id="penerbit">:</td>
                            </tr>
                            <tr>
                                <td>Stok</td>
                                <td>:</td>
                                <td class="fw-bold " id="stok">:</td>
                            </tr>
                            <tr>
                                <td>Deskripsi</td>
                                <td>:</td>
                                <td class="fw-bold " id="deskripsi">:</td>
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
<!-- end modal detail buku -->
<?= $this->endSection(); ?>

<?= $this->section('script'); ?>
<script>
    $('#data-table').on('click', '#btn-detail', function() {
        $.ajax({
            url: "/buku/detail",
            method: "POST",
            dataType: 'json',
            data: {
                id: $(this).data('id'),
            },
            success: (data) => {
                let sampul = data.sampul
                if (sampul) {
                    $('#sampul-buku').attr('src', '/assets/buku/' + sampul);
                } else {
                    $('#sampul-buku').attr('src', '/assets/img/book-cover.png');
                }

                $('#kode').html(data.kode)
                $('#judul').html(data.judul)
                $('#penulis').html(data.penulis)
                $('#penerbit').html(data.penerbit)
                $('#stok').html(data.stok)
                $('#deskripsi').html(data.deskripsi)
            },
        })
    })
</script>
<?= $this->endSection(); ?>