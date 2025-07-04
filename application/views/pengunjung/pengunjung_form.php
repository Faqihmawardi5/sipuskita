<!DOCTYPE html>
<html>
<head>
    <title>Form Pengunjung - Pustaka Kita</title>
    <link rel="shortcut icon" type="image/png/jpg" href="assets_style/image/logo_desa.png">
    <link rel="stylesheet" href="<?= base_url('assets_style/css/user.css') ?>">
    <link href="<?= base_url('assets_style/landing/css/styles2.css') ?>" rel="stylesheet" />
    
</head>
<body class="bg-light">
    <div class="container mt-5">
        <img src="<?= base_url('assets_style/image/logo_perpus.png') ?>" alt="Logo Pustaka" class="logo-img">
        <h3 class="text-center mb-4">Absensi Pengunjung</h3><br>

        <?php if ($this->session->flashdata('success')): ?>
            <div class="alert alert-success"><?= $this->session->flashdata('success'); ?></div>
        <?php endif; ?>

        <form method="post" action="<?= site_url('pengunjung/simpan'); ?>">
        <!-- CSRF Token jika aktif -->
        <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" />
            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="nama" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Alamat</label>
                <input type="text" name="alamat" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Keperluan</label>
                <input type="text" name="keperluan" class="form-control" required>
            </div><br>
            <button class="btn-submit">Kirim</button>
        </form>
    </div>
</body>
<script>
    // Hilangkan notifikasi setelah 3 detik
    setTimeout(function() {
        let alert = document.querySelector('.alert');
        if (alert) {
            alert.style.transition = 'opacity 0.5s ease';
            alert.style.opacity = 0;
            setTimeout(() => alert.remove(), 500);
        }
    }, 3000);
</script>

</html>
    
