<div class="content-wrapper">
    <section class="content-header">
        <h1>Tambah Kegiatan</h1>
    </section>

    <section class="content">
        <?= $this->session->flashdata('pesan'); ?>
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Form Tambah</h3>
            </div>
            <form action="<?= base_url('data/kegiatanproses') ?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="tambah" value="true">
                <div class="box-body">
                    <div class="form-group">
                        <label>Judul Kegiatan</label>
                        <input type="text" name="judul" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Tanggal</label>
                        <input type="date" name="tanggal" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Keterangan</label>
                        <textarea name="keterangan" class="form-control" rows="3" required></textarea>
                    </div>
                    <div class="form-group">
                        <label>Foto</label>
                        <input type="file" name="foto" class="form-control" accept="image/*">
                    </div>
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-success btn-block">Simpan</button>
                    <a href="<?= base_url('data/kegiatan') ?>" class="btn btn-default btn-block">Kembali</a>
                </div>
            </form>
        </div>
    </section>
</div>
