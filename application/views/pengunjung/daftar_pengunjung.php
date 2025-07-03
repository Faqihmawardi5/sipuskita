<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title><?= $title ?></title>
    <link rel="icon" type="image/png" href="<?= base_url('assets_style/image/logo_desa.png') ?>">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url('assets_style/assets/bower_components/bootstrap/dist/css/bootstrap.min.css'); ?>">

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?= base_url('assets_style/css/pengunjung.css'); ?>">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
</head>
<body>
<div class="container">
    <div class="card mt-4">
        <h3 class="text-center mt-3"><?= $title ?></h3>

        <div class="d-flex justify-content-end mb-3">
            <button onclick="window.print()" class="btn btn-primary">
                <i class="glyphicon glyphicon-print"></i> Cetak
            </button>
        </div><br>

        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover" id="pengunjungTable">
                <thead class="text-center">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Keperluan</th>
                        <th>Tanggal</th>
                        <th>Waktu</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; foreach ($pengunjung as $p): ?>
                    <tr>
                        <td class="text-center"><?= $no++ ?></td>
                        <td><?= htmlspecialchars($p->nama) ?></td>
                        <td><?= htmlspecialchars($p->alamat) ?></td>
                        <td><?= htmlspecialchars($p->keperluan) ?></td>
                        <td><?= date('d/m/Y', strtotime($p->tanggal_kunjungan)) ?></td>
                        <td><?= htmlspecialchars($p->waktu_kunjungan) ?></td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Aktifkan DataTables -->
<script>
$(document).ready(function () {
    $('#pengunjungTable').DataTable({
        "language": {
            "search": "Cari:",
            "lengthMenu": "Tampilkan _MENU_ entri",
            "zeroRecords": "Data tidak ditemukan",
            "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
            "infoEmpty": "Tidak ada data tersedia",
            "infoFiltered": "(difilter dari _MAX_ total entri)",
            "paginate": {
                "first":      "Pertama",
                "last":       "Terakhir",
                "next":       "Berikutnya",
                "previous":   "Sebelumnya"
            },
        }
    });
});
</script>

</body>
</html>
