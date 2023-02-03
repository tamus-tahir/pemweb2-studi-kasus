<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>

    <link href="/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <style>
        @page {
            margin: 30px;
            size: landscape;
        }
    </style>
</head>

<body>

    <h6 class="text-center mb-5">DATA BUKU</h6>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Kode</th>
                <th scope="col">Judul</th>
                <th scope="col">Penulis</th>
                <th scope="col">Penerbit</th>
                <th scope="col">Stok</th>
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
                </tr>
            <?php endforeach ?>

        </tbody>
    </table>

    <script>
        window.onafterprint = window.close;
        window.print();
    </script>

</body>

</html>