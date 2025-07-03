<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Cetak Transaksi - <?= $pinjam->pinjam_id; ?></title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .kop {
            text-align: center;
            margin-bottom: 20px;
        }
        .kop h2 {
            margin: 0;
        }
        .info-table, .buku-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .info-table th, .info-table td, .buku-table th, .buku-table td {
            border: 1px solid #000;
            padding: 6px;
            text-align: left;
        }
        .buku-table th {
            background-color: #eee;
        }
        .footer {
            margin-top: 50px;
            width: 100%;
            text-align: right;
        }
    </style>
</head>
<body onload="window.print()">

<div class="kop">
    <h2>PERPUSTAKAAN DESA PEPEDAN</h2>
    <p><strong>Detail Transaksi Peminjaman Buku</strong></p>
    <hr>
</div>

<table class="info-table">
    <tr>
        <th>No Peminjaman</th>
        <td><?= $pinjam->pinjam_id; ?></td>
    </tr>
    <tr>
        <th>Tgl Peminjaman</th>
        <td><?= $pinjam->tgl_pinjam; ?></td>
    </tr>
    <tr>
        <th>Tgl Pengembalian</th>
        <td><?= $pinjam->tgl_balik; ?></td>
    </tr>
    <tr>
        <th>Anggota</th>
        <td>
            <?php
            $user = $this->M_Admin->get_tableid_edit('tbl_login','anggota_id',$pinjam->anggota_id);
            if ($user) {
                echo $user->nama . ' (' . $user->anggota_id . ')<br>';
                echo 'Telepon: ' . $user->telepon . '<br>';
                echo 'Email: ' . $user->email . '<br>';
                echo 'Alamat: ' . $user->alamat;
            } else {
                echo 'Data anggota tidak ditemukan.';
            }
            ?>
        </td>
    </tr>
    <tr>
        <th>Status</th>
        <td><?= $pinjam->status; ?></td>
    </tr>
    <tr>
        <th>Tgl Kembali</th>
        <td><?= ($pinjam->tgl_kembali == '0') ? 'Belum dikembalikan' : $pinjam->tgl_kembali; ?></td>
    </tr>
    <tr>
        <th>Lama Peminjaman</th>
        <td><?= $pinjam->lama_pinjam; ?> Hari</td>
    </tr>
    <tr>
        <th>Denda</th>
        <td>
            <?php
            $denda = $this->db->query("SELECT * FROM tbl_denda WHERE pinjam_id = '$pinjam->pinjam_id'")->row();
            if ($pinjam->status == 'Di Kembalikan') {
                echo $this->M_Admin->rp($denda->denda);
            } else {
                $jml = $this->db->query("SELECT * FROM tbl_pinjam WHERE pinjam_id = '$pinjam->pinjam_id'")->num_rows();
                $date1 = date('Ymd');
                $date2 = preg_replace('/[^0-9]/','',$pinjam->tgl_balik);
                $diff = $date1 - $date2;
                if ($diff > 0) {
                    $dd = $this->M_Admin->get_tableid_edit('tbl_biaya_denda','stat','Aktif');
                    echo $diff.' hari<br>';
                    echo 'Denda: '.$this->M_Admin->rp($jml * ($dd->harga_denda * $diff));
                } else {
                    echo 'Tidak Ada Denda';
                }
            }
            ?>
        </td>
    </tr>
</table>

<h4>Daftar Buku</h4>
<table class="buku-table">
    <thead>
        <tr>
            <th>No</th>
            <th>Judul</th>
            <th>Penerbit</th>
            <th>Tahun</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $pin = $this->M_Admin->get_tableid('tbl_pinjam','pinjam_id',$pinjam->pinjam_id);
        $no = 1;
        foreach ($pin as $isi) {
            $buku = $this->M_Admin->get_tableid_edit('tbl_buku','buku_id',$isi['buku_id']);
            echo '<tr>
                    <td>'.$no++.'</td>
                    <td>'.$buku->title.'</td>
                    <td>'.$buku->penerbit.'</td>
                    <td>'.$buku->thn_buku.'</td>
                  </tr>';
        }
        ?>
    </tbody>
</table>

<div class="footer">
    <p>Pepedan, <?= date('d-m-Y'); ?></p>
    <br><br><br>
    <p><strong>Petugas</strong></p>
</div>

</body>
</html>
