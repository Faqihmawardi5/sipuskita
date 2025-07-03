<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Koleksi Buku - SIPEDA</title>
    <link href="<?= base_url('assets_style/landing/css/styles3.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets_style/landing/css/koleksi.css') ?>" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5 mb-4">
        <h3 class="mb-4 text-center">📚 Koleksi Buku Perpustakaan</h3>

        <!-- Pencarian -->
        <div class="form-group">
            <input type="text" id="searchInput" class="form-control" placeholder="🔍 Cari buku berdasarkan judul, pengarang, atau penerbit...">
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover" id="bukuTable">
                <thead class="text-center">
                    <tr>
                        <th>No</th>
                        <th>Sampul</th>
                        <th>Judul</th>
                        <th>Pengarang</th>
                        <th>Penerbit</th>
                        <th>Tahun</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; foreach($buku as $b): ?>
                    <tr>
                        <td class="text-center"><?= $no++ ?></td>
                        <td class="text-center">
                            <?php if (!empty($b->sampul) && $b->sampul !== "0"): ?>
                                <img src="<?= base_url('assets_style/image/buku/'.$b->sampul) ?>" class="sampul-img" alt="<?= $b->title ?>">
                            <?php else: ?>
                                <i class="fa fa-book fa-2x text-secondary"></i><br><small>Tidak ada sampul</small>
                            <?php endif; ?>
                        </td>
                        <td><?= $b->title ?></td>
                        <td><?= $b->pengarang ?></td>
                        <td><?= $b->penerbit ?></td>
                        <td class="text-center"><?= $b->thn_buku ?></td>
                        <td class="text-center">
                            <a href="<?= base_url('koleksi/detail/'.$b->id_buku) ?>" class="btn btn-sm btn-primary">Lihat Detail</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <footer class="text-center py-4 bg-light">
        <p class="mb-0">&copy; <?= date('Y'); ?> SIPEDA - Sistem Pengaduan Masyarakat</p>
    </footer>

    <!-- Script Pencarian -->
    <script>
        document.getElementById('searchInput').addEventListener('keyup', function() {
            var filter = this.value.toLowerCase();
            var rows = document.querySelectorAll('#bukuTable tbody tr');

            rows.forEach(function(row) {
                var text = row.innerText.toLowerCase();
                row.style.display = text.includes(filter) ? '' : 'none';
            });
        });
    </script>

    <!-- JS Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
