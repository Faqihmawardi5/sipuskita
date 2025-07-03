<!DOCTYPE html>
<html>
<head>
    <title><?= $title ?></title>
    <style>
        body {
            font-family: sans-serif;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            font-size: 12px;
        }
        table, th, td {
            border: 1px solid black;
            padding: 4px;
        }
        th {
            background: #f0f0f0;
        }
    </style>
    <link rel="shortcut icon" type="image/png" href="<?= base_url('assets_style/image/logo_desa.png') ?>">
</head>
<body>
    <h3 style="text-align:center;"><?= $title ?></h3>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>ISBN</th>
                <th>Judul Buku</th>
                <th>Penerbit</th>
                <th>Tahun</th>
                <th>Stok</th>
                <th>Tgl Masuk</th>
            </tr>
        </thead>
        <tbody>
            <?php $no=1; foreach($buku as $row): ?>
            <tr>
                <td style="text-align:center;"><?= $no++; ?></td>
                <td><?= $row->isbn ?></td>
                <td><?= $row->title ?></td>
                <td><?= $row->penerbit ?></td>
                <td style="text-align:center;"><?= $row->thn_buku ?></td>
                <td style="text-align:center;"><?= $row->jml ?></td>
                <td style="text-align:center;"><?= $row->tgl_masuk ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</body>
</html>
