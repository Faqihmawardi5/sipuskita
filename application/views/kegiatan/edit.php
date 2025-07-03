<div class="content-wrapper">
    <section class="content-header">
        <h1>Edit Kegiatan</h1>
    </section>

    <section class="content">
        <?= $this->session->flashdata('pesan'); ?>
        <div class="box box-warning">
            <div class="box-header with-border">
                <h3 class="box-title">Form Edit</h3>
            </div>
            <form action="<?= base_url('data/kegiatanproses') ?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="edit" value="<?= $edit_kegiatan->id_kegiatan ?>">
                <div class="box-body">
                    <div class="form-group">
                        <label>Judul Kegiatan</label>
                        <input type="text" name="judul" class="form-control" value="<?= htmlentities($edit_kegiatan->judul) ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Tanggal</label>
                        <input type="date" name="tanggal" class="form-control" value="<?= $edit_kegiatan->tgl ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Keterangan</label>
                        <textarea name="keterangan" class="form-control" rows="3" required><?= htmlentities($edit_kegiatan->keterangan) ?></textarea>
                    </div>
                    <div class="form-group">
                        <label>Ganti Foto (opsional)</label>
                        <input type="file" name="foto" class="form-control" accept="image/*">
                        <br>
                        <img src="<?= base_url('assets_style/image/kegiatan/'.$edit_kegiatan->gambar) ?>" width="100" class="img-thumbnail">
                    </div>
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-warning btn-block">Update</button>
                    <a href="<?= base_url('data/kegiatan') ?>" class="btn btn-default btn-block">Kembali</a>
                </div>
            </form>
        </div>
    </section>
</div>
