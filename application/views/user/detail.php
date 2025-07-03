<?php
// Format tanggal
$tgl_lahir = isset($tgl_lahir) ? tgl_indo($tgl_lahir, $bulan) : 'Tanggal lahir tidak tersedia';
$tgl_bergabung = isset($tgl_bergabung) ? tgl_indo($tgl_bergabung, $bulan) : 'Tanggal bergabung tidak tersedia';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?= $title_web; ?></title>
    <link rel="stylesheet" href="<?= base_url(); ?>assets_style/assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets_style/assets/bower_components/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets_style/css/kartu.css">
    <link rel="icon" type="image/png" href="<?= base_url('assets_style/image/logo_desa.png') ?>">
</head>
<body>

<div class="noprint">
    <button id="download-btn" class="btn btn-primary" data-userid="<?= $user->anggota_id; ?>">
        <i class="fa fa-download"></i> Unduh Kartu
    </button>
</div>

<div id="kartu-anggota" class="page">
    <!-- Kartu Depan -->
    <div class="panel-body" style="background-image: url('<?= base_url(); ?>assets_style/image/kartu_depan.png');">
        <div class="row">
            <div class="col-sm-8">
            <table class="table table-borderless" style="font-size: 14px; margin-left: 30px; margin-top:70px;">
                <tr style="line-height: 1.8;">
                    <td><strong>NIA</strong></td>
                    <td>:</td>
                    <td><?= $user->anggota_id; ?></td>
                </tr>
                <tr style="line-height: 1.8;">
                    <td><strong>Nama</strong></td>
                    <td>:</td>
                    <td><?= $user->nama; ?></td>
                </tr>
                <tr style="line-height: 1.8;">
                    <td><strong>TTL</strong></td>
                    <td>:</td>
                    <td>
                    <?= $user->tempat_lahir; ?>, 
                    <?= date('d F Y', strtotime($user->tgl_lahir)); ?>
                    </td>
                </tr>
                <tr style="line-height: 1.8;">
                    <td><strong>Alamat</strong></td>
                    <td>:</td>
                    <td><?= $user->alamat; ?></td>
                </tr>
                <tr style="line-height: 1.8;">
                    <td><strong>Bergabung Sejak</strong></td>
                    <td>:</td>
                    <td><?= date('d F Y', strtotime($user->tgl_bergabung)); ?></td>
                </tr>
                </table>
            </div>
            <div class="col-sm-4 text-center">
                <img src="<?= base_url(); ?>assets_style/image/<?= $user->foto; ?>" class="foto-anggota">
            </div>
        </div>
    </div><br></br>

    <!-- Kartu Belakang -->
    <div class="panel-body" style="background-image: url('<?= base_url(); ?>assets_style/image/kartu.png');">
        <div style="color: #000;">
            <h4 style="text-align: center; margin-top: 75px;"><strong>TATA TERTIB ANGGOTA:</strong></h4><br>
            <ul style="font-size: 14px; margin-left: 30px;">
                <li>Wajib menjaga dan mengembalikan buku tepat waktu.</li>
                <li>Dilarang meminjamkan kartu kepada orang lain.</li>
                <li>Apabila kehilangan kartu, segera lapor ke petugas.</li>
                <li>Penyalahgunaan kartu dapat dikenakan sanksi.</li>
            </ul>
            <br>
            <p style="font-size: 14px; text-align: center; margin-top: 10px">
                <strong>PERPUSTAKAAN PUSTAKA KITA DESA PEPEDAN</strong><br>
                Jl. KH. Anshor Desa Pepedan, Kecamatan Tonjong, Kabupaten Brebes,<br>
                Telp: 082324389815, Email: kantordesapepedan2018@gmail.com
            </p>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="<?= base_url(); ?>assets_style/js/kartu.js"></script>

</body>
</html>
