<div class="content-wrapper">
    <section class="content-header">
        <h1><?= $title_web ?></h1>
    </section>

    <section class="content">
        <div class="box">
            <div class="box-body">
                <table class="table table-bordered table-striped">
                    <tr><th>No</th><th>Jenis Data</th><th>Jumlah</th></tr>
                    <tr><td>1</td><td>Jumlah Buku</td><td><?= $count_buku ?></td></tr>
                    <tr><td>2</td><td>Jumlah Anggota</td><td><?= $count_anggota ?></td></tr>
                    <tr><td>3</td><td>Jumlah Transaksi Dipinjam</td><td><?= $count_pinjam ?></td></tr>
                    <tr><td>4</td><td>Jumlah Transaksi Dikembalikan</td><td><?= $count_kembali ?></td></tr>
                    <tr><td>5</td><td>Jumlah Pengunjung</td><td><?= $count_pengunjung ?></td></tr>

                </table>

                <a href="<?= base_url('laporan/cetak_jumlah_data') ?>" target="_blank" class="btn btn-primary">
                    <i class="fa fa-print"></i> Cetak
                </a>
            </div>
        </div>
    </section>
</div>
