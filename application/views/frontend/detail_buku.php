<?php if(! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<?php
  $idkat = $buku->id_kategori;
  $idrak = $buku->id_rak;

  $kat = $this->M_Admin->get_tableid_edit('tbl_kategori','id_kategori',$idkat);
  $rak = $this->M_Admin->get_tableid_edit('tbl_rak','id_rak',$idrak);
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Detail Buku | <?= $title_web; ?></title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="<?= base_url('assets_style/assets/bower_components/font-awesome/css/font-awesome.min.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('assets_style/css/koleksi.css'); ?>">
  
</head>
<body>
  <div class="card">
    <h1><i class="fa fa-book"></i> Detail Buku</h1>
    <table>
      <tr><td>ISBN</td><td><?= $buku->isbn; ?></td></tr>
      <tr>
        <td>Sampul Buku</td>
        <td>
          <?php if(!empty($buku->sampul) && $buku->sampul !== "0") { ?>
            <a href="<?= base_url('assets_style/image/buku/'.$buku->sampul); ?>" target="_blank">
              <img src="<?= base_url('assets_style/image/buku/'.$buku->sampul); ?>" class="img-thumbnail">
            </a>
          <?php } else { echo '<p class="text-danger">* Tidak ada Sampul</p>'; } ?>
        </td>
      </tr>
      <tr><td>Judul Buku</td><td><?= $buku->title; ?></td></tr>
      <tr><td>Kategori</td><td><?= $kat->nama_kategori; ?></td></tr>
      <tr><td>Penerbit</td><td><?= $buku->penerbit; ?></td></tr>
      <tr><td>Pengarang</td><td><?= $buku->pengarang; ?></td></tr>
      <tr><td>Tahun Terbit</td><td><?= $buku->thn_buku; ?></td></tr>
      <tr><td>Jumlah Buku</td><td><?= $buku->jml; ?></td></tr>
      <tr>
        <td>Jumlah Dipinjam</td>
        <td>
          <?php
            $id = $buku->buku_id;
            $dd = $this->db->query("SELECT * FROM tbl_pinjam WHERE buku_id= '$id' AND status = 'Dipinjam'");
            echo $dd->num_rows() > 0 ? $dd->num_rows() : '0';
          ?>
          <a class="btn" onclick="alert('Fitur detail pinjam hanya untuk admin.')" style="margin-left: 10px;">
            <i class="fa fa-sign-in"></i> Lihat Detail
          </a>
        </td>
      </tr>
      <tr><td>Keterangan</td><td><?= $buku->isi; ?></td></tr>
      <tr><td>Rak / Lokasi</td><td><?= $rak->nama_rak; ?></td></tr>
      <tr>
        <td>Lampiran</td>
        <td>
          <?php if(!empty($buku->lampiran) && $buku->lampiran !== "0") { ?>
            <a href="<?= base_url('assets_style/image/buku/'.$buku->lampiran); ?>" class="btn" target="_blank">
              <i class="fa fa-download"></i> Unduh Sample
            </a>
          <?php } else { echo '<p class="text-danger">* Tidak ada Lampiran</p>'; } ?>
        </td>
      </tr>
      <tr><td>Tanggal Masuk</td><td><?= $buku->tgl_masuk; ?></td></tr>
    </table>

    <div class="footer">Sistem Informasi Perpustakaan Desa Pepedan</div>
  </div>
</body>
</html>
