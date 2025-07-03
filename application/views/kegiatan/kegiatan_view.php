<div class="content-wrapper">
    <section class="content-header">
        <h1><?= $title_web; ?></h1>
    </section>

    <section class="content">
        <?= $this->session->flashdata('pesan'); ?>

        <a href="<?= base_url('data/kegiatan_tambah') ?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah Kegiatan</a>
        <a href="<?= base_url('data/kegiatanpdf') ?>" target="_blank" class="btn btn-danger btn-sm"><i class="fa fa-print"></i> Cetak PDF</a>
        <br><br>
        <div class="box box-warning">
            <div class="box-header with-border">
                <h3 class="box-title">Daftar Kegiatan</h3>
            </div>
            <div class="box-body table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Gambar</th>
                            <th>Judul</th>
                            <th>Keterangan</th>
                            <th>Tanggal</th>
                            <th width="100px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($kegiatan->num_rows() > 0): ?>
                            <?php $no = 1; foreach($kegiatan->result() as $row): ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><img src="<?= base_url('assets_style/image/kegiatan/' . $row->gambar) ?>" width="80" class="img-thumbnail"></td>
                                <td><?= htmlentities($row->judul) ?></td>
                                <td><?= htmlentities($row->keterangan) ?></td>
                                <td><?= date('d-m-Y', strtotime($row->tgl)) ?></td>
                                <td>
                                    <a href="<?= base_url('data/kegiatan_edit/' . $row->id_kegiatan) ?>" class="btn btn-warning btn-xs" title="Edit"><i class="fa fa-edit"></i></a>
                                    <a href="<?= base_url('data/kegiatanproses?hapus=' . $row->id_kegiatan) ?>" onclick="return confirm('Hapus kegiatan ini?')" class="btn btn-danger btn-xs" title="Hapus"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="6" class="text-center">Belum ada kegiatan.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
