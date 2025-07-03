<!DOCTYPE html>
<html>
<head>
    <title>Laporan Jumlah Data</title>
    <style>
        .kop-surat {
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 3px solid #000;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }
        .kop-surat .logo {
            width: 80px;
            height: auto;
        }
        .kop-surat .tengah {
            flex: 1;
            text-align: center;
        }
        .kop-surat .judul {
            font-size: 16px;
            font-weight: bold;
        }
        .kop-surat .alamat {
            font-size: 10pt;
        }
        .ttd {
            margin-top: 30px;
        }
    </style>
    <link rel="shortcut icon" type="image/png/jpg" href="assets_style/image/logo_desa.png">
</head>
<body onload="window.print()">

<div class="kop-surat">
    <!-- Logo kiri (Desa) -->
    <img src="<?= base_url('assets_style/image/logo_desa.png') ?>" class="logo">

    <!-- Teks tengah -->
    <div class="tengah">
        <div class="judul">PERPUSTAKAAN "PUSTAKA KITA"<br>DESA PEPEDAN KECAMATAN TONJONG</div>
        <div class="alamat">
            Jl. KH. Anshor Pepedan, Tonjong, Brebes, Jawa Tengah 52271<br>
            website: www.pepedan-brebes.desa.id | email: kantordesapepedan2018@gmail.com<br>
            telp: 082324389815
        </div>
    </div>

    <!-- Logo kanan (Perpustakaan) -->
    <img src="<?= base_url('assets_style/image/logo_perpus.png') ?>" class="logo">
</div>

<h3 style="text-align:center; margin-bottom:10px;">LAPORAN OPERASIONAL PERPUSTAKAAN</h3>

<table border="1" cellpadding="5" cellspacing="0" width="100%">
    <thead>
        <tr><th>No</th><th>Jenis Data</th><th>Jumlah</th></tr>
    </thead>
    <tbody>
        <tr><td><center>1</center></td><td>Jumlah Buku</td><td><?= $count_buku ?></td></tr>
        <tr><td><center>2</center></td><td>Jumlah Anggota</td><td><?= $count_anggota ?></td></tr>
        <tr><td><center>3</center></td><td>Dipinjam</td><td><?= $count_pinjam ?></td></tr>
        <tr><td><center>4</center></td><td>Dikembalikan</td><td><?= $count_kembali ?></td></tr>
        <tr><td><center>5</center></td><td>Jumlah Pengunjung</td><td><?= $count_pengunjung ?></td></tr>
    </tbody>
</table>

<br><br>
<table class="ttd" width="100%">
    <tr>
        <td width="60%"></td>
        <td>
            Pepedan, <?= date('d M Y') ?><br>
            Kepala Perpustakaan<br><br><br><br>
            <strong><u>ADE NURDIYAN, MH.</u></strong>
        </td>
    </tr>
</table>

</body>
</html>
