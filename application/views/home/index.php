<!-- File: application/views/index.php -->
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>SIPUSKITA PEPEDAN | Sistem Informasi Perpustakaan Pustaka Kita Desa Pepedan</title>
    <link rel="icon" type="image/x-icon" href="<?= base_url('assets_style/image/logo_perpus.png') ?>" />
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet" />
    <!-- Styles -->
    <link href="<?= base_url('assets_style/landing/css/styles.css') ?>" rel="stylesheet" />
    <link href="<?= base_url('assets_style/landing/css/styles2.css') ?>" rel="stylesheet" />
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-light static-top" style="position:fixed;width:100%;z-index:100;background: rgba(0,0,0,0.6);">
        <div class="container d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center">
                <h3 class="text-light mb-0 me-3">
                    <img src="<?= base_url('assets_style/image/logo_desa.png') ?>" alt="Logo Desa" style="width: 30px; height: 30px;"> | SIPUSKITA
                </h3>
                <marquee behavior="scroll" direction="left" scrollamount="5" class="text-light" style="max-width: 300px;">
                    <h4>Sistem Informasi Perpustakaan Pustaka Kita Desa Pepedan</h4>
                </marquee>
            </div>
            <div>
                <a class="btn btn-outline-light me-2" href="<?= base_url('pengunjung') ?>">Buku Tamu</a>
                <a class="btn btn-outline-light" href="<?= base_url('login') ?>">Login</a>
            </div>
        </div>
    </nav>

    <!-- Header -->
    <header class="masthead slideshow-header d-flex align-items-center justify-content-center">
        <div class="overlay"></div> <!-- Optional overlay for better readability -->
        <div class="container text-white text-center position-relative z-index-1">
            <h1 class="mb-4">Selamat Datang</h1>
            <h3>Di Sistem Informasi Perpustakaan Pustaka Kita Desa Pepedan</h3>
            <p class="lead">Temukan koleksi buku terbaik untuk Anda baca dan pelajari.</p>
            <a href="<?= base_url('koleksi') ?>" class="btn btn-primary btn-lg mt-3">Koleksi Buku</a>
        </div>
    </header>

    <!-- Fitur -->
    <section class="features-icons bg-light text-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="features-icons-item mx-auto mb-5">
                        <div class="features-icons-icon d-flex">
                            <i class="bi bi-journal-bookmark-fill m-auto text-primary"></i>
                        </div>
                        <h3>Koleksi Buku Lengkap</h3>
                        <p class="lead mb-0">Berbagai jenis buku tersedia untuk semua kalangan usia dan minat.</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="features-icons-item mx-auto mb-5">
                        <div class="features-icons-icon d-flex">
                            <i class="bi bi-people-fill m-auto text-primary"></i>
                        </div>
                        <h3>Layanan Ramah</h3>
                        <p class="lead mb-0">Petugas siap membantu Anda dalam pencarian dan peminjaman buku.</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="features-icons-item mx-auto mb-5">
                        <div class="features-icons-icon d-flex">
                            <i class="bi bi-clock-history m-auto text-primary"></i>
                        </div>
                        <h3>Akses Mudah</h3>
                        <p class="lead mb-0">Sistem online memudahkan pencarian dan pengajuan peminjaman buku.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    

    <!-- Dokumentasi Kegiatan -->
    <section class="bg-light py-5" id="dokumentasi">
        <div class="container text-center">
            <h3 class="mb-4">Dokumentasi Kegiatan Perpustakaan</h3>
            <p class="mb-5">Berikut beberapa dokumentasi kegiatan literasi, pelatihan, dan layanan perpustakaan.</p>
            <div class="row">
                <?php if (!empty($kegiatan)): ?>
                    <?php foreach($kegiatan as $row): ?>
                        <div class="col-md-4 mb-4">
                            <img src="<?= base_url('assets_style/image/kegiatan/'.$row->gambar) ?>" alt="<?= $row->judul ?>" class="img-fluid rounded shadow-sm" style="height: 200px; object-fit: cover;">
                            <p class="mt-2"><?= $row->judul ?></p>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="col-12">
                        <p>Belum ada dokumentasi kegiatan.</p>
                    </div>
                <?php endif; ?>
    </section>


    <!-- Tentang -->
    <section class="features-icons bg-primary text-center text-white">
        <div class="container">
            <h3>Apa itu SIPUSKITA?</h3>
            <p>
                SIPUSKITA adalah Sistem Informasi Perpustakaan Desa Pepedan yang bertujuan untuk mempermudah masyarakat dalam
                mengakses informasi koleksi buku, melakukan peminjaman, serta mencatat kunjungan melalui buku tamu digital.
                Perpustakaan ini menjadi pusat literasi dan edukasi masyarakat desa.
            </p>
            <a class="btn btn-outline-light" href="<?= base_url('pengunjung') ?>">Isi Buku Tamu</a>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 text-center text-lg-start my-auto">
                <p>Jl. KH. Anshor Desa Pepedan, Kecamatan Tonjong, Kabupaten Brebes</p>
                    <p class="small mb-4 mb-lg-0">&copy; SIPUSKITA - Perpustakaan Desa Pepedan 2025</p>
                </div>
                <div class="col-lg-6 text-center text-lg-end my-auto">
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item me-4"><a href="http://www.facebook.com/profile.php?id=61563339069000"><i class="bi-facebook fs-3"></i></a></li>
                        <li class="list-inline-item me-4"><a href="http://www.instagram.com/pemdes.pepedan?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw=="><i class="bi-instagram fs-3"></i></a></li>
                        <li class="list-inline-item me-4"><a href="https://mail.google.com/mail/?view=cm&to=kantordesapepedan2018@gmail.com"><i class="bi-envelope fs-3"></i></a></li>
                        <li class="list-inline-item"><a href="https://wa.me/6282324389815" target="_blank"><i class="bi-whatsapp fs-3"></i></a></li>
                    </ul>

                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('assets/landing/js/scripts.js') ?>"></script>
</body>

</html>
