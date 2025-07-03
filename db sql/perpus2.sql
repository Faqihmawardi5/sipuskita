-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 03 Jul 2025 pada 11.12
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpus2`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_biaya_denda`
--

CREATE TABLE `tbl_biaya_denda` (
  `id_biaya_denda` int(11) NOT NULL,
  `harga_denda` varchar(255) NOT NULL,
  `stat` varchar(255) NOT NULL,
  `tgl_tetap` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_biaya_denda`
--

INSERT INTO `tbl_biaya_denda` (`id_biaya_denda`, `harga_denda`, `stat`, `tgl_tetap`) VALUES
(1, '500', 'Aktif', '2025-06-24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_buku`
--

CREATE TABLE `tbl_buku` (
  `id_buku` int(11) NOT NULL,
  `buku_id` varchar(255) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_rak` int(11) NOT NULL,
  `sampul` varchar(255) DEFAULT NULL,
  `isbn` varchar(255) DEFAULT NULL,
  `lampiran` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `penerbit` varchar(255) DEFAULT NULL,
  `pengarang` varchar(255) DEFAULT NULL,
  `thn_buku` varchar(255) DEFAULT NULL,
  `isi` text DEFAULT NULL,
  `jml` int(11) DEFAULT NULL,
  `tgl_masuk` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_buku`
--

INSERT INTO `tbl_buku` (`id_buku`, `buku_id`, `id_kategori`, `id_rak`, `sampul`, `isbn`, `lampiran`, `title`, `penerbit`, `pengarang`, `thn_buku`, `isi`, `jml`, `tgl_masuk`) VALUES
(8, 'BK008', 2, 1, '0', '132-123-234-231', '0', 'CARA MUDAH BELAJAR PEMROGRAMAN C++', 'INFORMATIKA BANDUNG', 'BUDI RAHARJO ', '2012', '<table class=\"table table-bordered\" style=\"background-color: rgb(255, 255, 255); width: 653px; color: rgb(51, 51, 51);\"><tbody><tr><td style=\"padding: 8px; line-height: 1.42857; border-color: rgb(244, 244, 244);\">Tipe Buku</td><td style=\"padding: 8px; line-height: 1.42857; border-color: rgb(244, 244, 244);\">Kertas</td></tr><tr><td style=\"padding: 8px; line-height: 1.42857; border-color: rgb(244, 244, 244);\">Bahasa</td><td style=\"padding: 8px; line-height: 1.42857; border-color: rgb(244, 244, 244);\">Indonesia</td></tr></tbody></table>', 23, '2019-11-23 11:49:57'),
(9, 'BK009', 4, 2, 'sampul.jpg', '12345678', NULL, 'Pedoman KPM', 'Fakultas SAINTEKES UMBS', 'Ir. Ryan Fitrian Pahlevi, S.Pd., M.Kom.', '2025', '<p><br></p><table class=\"table table-bordered\"><tbody><tr><td>Jenis Buku</td><td>Pdf</td></tr><tr><td>Tahun Terbit</td><td>2025</td></tr></tbody></table><p><br></p>', 2, '2025-05-16 09:02:44'),
(10, 'BK0010', 5, 2, '0', '978-6026563-70-5', NULL, 'Muhammad Sang Teladan', 'Senja Media Utama', 'Abdurrohman Asy-Syarqawi', '2017', '', 2, '2025-06-17 09:17:34'),
(11, 'BK0011', 5, 2, '0', '978-602-73059-3-9', NULL, 'Zuhud dan Kelembutan Hati', 'Pustaka Khazanah Fawa\'id', 'Dr. Ahmad Farid', '2016', '', 1, '2025-06-17 09:21:18'),
(12, 'BK0012', 10, 2, '0', '602-8995-29-0', NULL, 'Menguasai Ilmu Ushul Fiqh', 'Pustaka Pesantren', 'Dr. KH. M. Ma\'shum Zein, M.A.', '2015', '<p><br></p><table class=\"table table-bordered\"><tbody><tr><td>Hibah</td><td>:</td><td>Perpustakaan Nasional RI</td></tr><tr><td>Tahun</td><td>:</td><td>2019</td></tr></tbody></table><p><br></p>', 2, '2025-06-17 09:31:28'),
(13, 'BK0013', 11, 2, '0', '978-602-1683-37-8', NULL, 'Sayidah \'Aisyah', 'Fatah Media Prima', 'Abdul Hamid Thahmuz', '2019', '<p><b>Informasi Buku</b></p><table class=\"table table-bordered\"><tbody><tr><td>Hibah</td><td>:</td><td>Perpustakaan Nasional</td></tr><tr><td>Tahun</td><td>:</td><td>2019</td></tr></tbody></table><p><br></p>', 1, '2025-06-17 09:38:45'),
(14, 'BK0014', 11, 2, '0', '978-602-1683-39-2', NULL, 'Fatimah Bagi Ibu Bapaknya', 'Fatah Media Prima', 'Achmad Zein Dahlan', '2017', '<p><br></p><table class=\"table table-bordered\"><tbody><tr><td>Hibah</td><td>:</td><td>Perpustakaaan Nasional RI</td></tr><tr><td>Tahun</td><td>:</td><td>2019</td></tr></tbody></table><p><br></p>', 1, '2025-06-17 09:42:09'),
(15, 'BK0015', 13, 2, '0', '978-602-260-169-2', NULL, 'Manajemen dan Tata Kelola Pemerintahan Desa', 'PT Balai Pustaka', 'DR. DRS. H. Mansyur Achmad KM., M.Si.', '2018', '<p><br></p><table class=\"table table-bordered\"><tbody><tr><td>Hibah</td><td>:</td><td>Perpustakaan Nasional RI</td></tr><tr><td>Tahun</td><td>:</td><td>2019</td></tr></tbody></table><p><br></p>', 1, '2025-06-17 09:48:05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_denda`
--

CREATE TABLE `tbl_denda` (
  `id_denda` int(11) NOT NULL,
  `pinjam_id` varchar(255) NOT NULL,
  `denda` varchar(255) NOT NULL,
  `lama_waktu` int(11) NOT NULL,
  `tgl_denda` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_denda`
--

INSERT INTO `tbl_denda` (`id_denda`, `pinjam_id`, `denda`, `lama_waktu`, `tgl_denda`) VALUES
(3, 'PJ001', '0', 0, '2020-05-20'),
(5, 'PJ009', '0', 0, '2020-05-20'),
(6, 'PJ0011', '142000', 71, '2025-06-01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`id_kategori`, `nama_kategori`) VALUES
(2, 'Pemrograman'),
(3, 'Pendidikan'),
(4, 'Pedoman'),
(5, 'Cerita'),
(6, 'Majalah'),
(7, 'Buku Anak'),
(8, 'Novel'),
(10, 'Agama'),
(11, 'Biografi'),
(12, 'Pengetahuan Umum'),
(13, 'Pengetahuan Sosial'),
(14, 'Sejarah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kegiatan`
--

CREATE TABLE `tbl_kegiatan` (
  `id_kegiatan` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `keterangan` text DEFAULT NULL,
  `tgl` date NOT NULL,
  `gambar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `tbl_kegiatan`
--

INSERT INTO `tbl_kegiatan` (`id_kegiatan`, `judul`, `keterangan`, `tgl`, `gambar`) VALUES
(1, 'Bedah Buku Ayo Belajar', '30 Peserta', '2025-07-02', 'bg1~3.jpg'),
(2, 'Kegiatan PIK-R', 'Diikuti oleh Fandan', '2025-07-01', 'WhatsApp Image 2025-07-03 at 15.59.39 copy.jpeg'),
(3, 'Kegiatan Bersih Bersih Perpus', 'Oleh Pengurus Perpus dan Fandan', '2025-06-29', 'WhatsApp Image 2025-07-03 at 15.59.38.jpeg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_login`
--

CREATE TABLE `tbl_login` (
  `id_login` int(11) NOT NULL,
  `anggota_id` varchar(255) NOT NULL,
  `user` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenkel` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(25) NOT NULL,
  `email` varchar(255) NOT NULL,
  `tgl_bergabung` date NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_login`
--

INSERT INTO `tbl_login` (`id_login`, `anggota_id`, `user`, `pass`, `level`, `nama`, `tempat_lahir`, `tgl_lahir`, `jenkel`, `alamat`, `telepon`, `email`, `tgl_bergabung`, `foto`) VALUES
(1, 'PPD.25.00001', 'anang', '202cb962ac59075b964b07152d234b70', 'Petugas', 'Anang', 'Bekasi', '1999-04-05', 'Laki-Laki', 'Ujung Harapan', '089618173609', 'fauzan1892@codekop.com', '2019-11-20', 'user_1567327491.png'),
(2, 'PPD.25.002', 'fauzan', '202cb962ac59075b964b07152d234b70', 'Anggota', 'Fauzan', 'Bekasi', '1998-11-18', 'Laki-Laki', 'Bekasi Barat', '08123123185', 'fauzanfalah21@gmail.com', '2019-11-21', 'user_1589911243.png'),
(4, 'PPD.25.003', 'faqihmawardi5', '202cb962ac59075b964b07152d234b70', 'Petugas', 'Muh.Faqih Mawardi', 'Brebes', '2003-10-16', 'Laki-Laki', 'Desa Karangjongkeng Kec. Tonjong', '085713428117', 'faqihmawardi5@yahoo.com', '2025-04-21', 'user_1745231489.png'),
(6, 'PPD.25.006', 'indah', '202cb962ac59075b964b07152d234b70', 'Anggota', 'Indah Ikrimah', 'Brebes', '1994-05-16', 'Perempuan', 'Pepedan', '08123123123', 'indah@mail.go.id', '2025-06-01', 'user_1748761554.png'),
(7, 'PPD.25.007', 'zal', '55043786413e72364161942d1bf9e836', 'Anggota', 'Zaltan', 'bekasi', '2018-05-06', 'Laki-Laki', 'pepdan', '0823232323', 'zal@gamail.com', '2025-06-01', 'user_1748761556.png'),
(8, 'PPD.25.008', 'ade', '202cb962ac59075b964b07152d234b70', 'Petugas', 'Ade Nurdiyan, MH.', 'Brebes', '1999-05-03', 'Laki-Laki', 'Pepedan', '085325478657', 'adenurdian7@gmail.com', '2025-06-03', 'user_1748761667.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pengunjung`
--

CREATE TABLE `tbl_pengunjung` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(225) NOT NULL,
  `keperluan` varchar(255) NOT NULL,
  `tanggal_kunjungan` date NOT NULL,
  `waktu_kunjungan` time NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `tbl_pengunjung`
--

INSERT INTO `tbl_pengunjung` (`id`, `nama`, `alamat`, `keperluan`, `tanggal_kunjungan`, `waktu_kunjungan`, `created_at`) VALUES
(1, 'Zaltan', 'Pepedan', 'Baca Buku', '2025-06-01', '16:26:33', '2025-06-01 09:26:33'),
(2, 'Muhammad Faqih Mawardi', 'Karangjongkeng', 'ngoding', '2025-06-02', '15:48:22', '2025-06-02 08:48:22'),
(9, 'Muhammad Faqih Mawardi', 'karangjongkeng', 'ngoding', '2025-06-08', '20:13:13', '2025-06-08 13:13:13'),
(10, 'Yusril Ahzam Maghsyari', 'Karangjongkeng', 'Baca Buku', '2025-06-08', '20:17:10', '2025-06-08 13:17:10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pinjam`
--

CREATE TABLE `tbl_pinjam` (
  `id_pinjam` int(11) NOT NULL,
  `pinjam_id` varchar(255) NOT NULL,
  `anggota_id` varchar(255) NOT NULL,
  `buku_id` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `tgl_pinjam` varchar(255) NOT NULL,
  `lama_pinjam` int(11) NOT NULL,
  `tgl_balik` varchar(255) NOT NULL,
  `tgl_kembali` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_pinjam`
--

INSERT INTO `tbl_pinjam` (`id_pinjam`, `pinjam_id`, `anggota_id`, `buku_id`, `status`, `tgl_pinjam`, `lama_pinjam`, `tgl_balik`, `tgl_kembali`) VALUES
(8, 'PJ001', 'PPD.25.007', 'BK008', 'Di Kembalikan', '2020-05-19', 1, '2020-05-20', '2020-05-20'),
(10, 'PJ009', 'PPD.25.007', 'BK008', 'Di Kembalikan', '2020-05-20', 1, '2020-05-21', '2020-05-20'),
(11, 'PJ0011', 'PPD.25.007', 'BK009', 'Di Kembalikan', '2025-05-20', 10, '2025-05-30', '2025-06-01'),
(12, 'PJ0012', 'PPD.25.007', 'BK009', 'Dipinjam', '2025-06-03', 20, '2025-06-23', '0'),
(13, 'PJ0013', 'PPD.25.006', 'BK0015', 'Dipinjam', '2025-06-23', 7, '2025-06-30', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_rak`
--

CREATE TABLE `tbl_rak` (
  `id_rak` int(11) NOT NULL,
  `nama_rak` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_rak`
--

INSERT INTO `tbl_rak` (`id_rak`, `nama_rak`) VALUES
(1, 'Rak 2'),
(2, 'Rak 1'),
(3, 'Rak 3'),
(4, 'Rak 4');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_biaya_denda`
--
ALTER TABLE `tbl_biaya_denda`
  ADD PRIMARY KEY (`id_biaya_denda`);

--
-- Indeks untuk tabel `tbl_buku`
--
ALTER TABLE `tbl_buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indeks untuk tabel `tbl_denda`
--
ALTER TABLE `tbl_denda`
  ADD PRIMARY KEY (`id_denda`);

--
-- Indeks untuk tabel `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `tbl_kegiatan`
--
ALTER TABLE `tbl_kegiatan`
  ADD PRIMARY KEY (`id_kegiatan`);

--
-- Indeks untuk tabel `tbl_login`
--
ALTER TABLE `tbl_login`
  ADD PRIMARY KEY (`id_login`);

--
-- Indeks untuk tabel `tbl_pengunjung`
--
ALTER TABLE `tbl_pengunjung`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_pinjam`
--
ALTER TABLE `tbl_pinjam`
  ADD PRIMARY KEY (`id_pinjam`);

--
-- Indeks untuk tabel `tbl_rak`
--
ALTER TABLE `tbl_rak`
  ADD PRIMARY KEY (`id_rak`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_biaya_denda`
--
ALTER TABLE `tbl_biaya_denda`
  MODIFY `id_biaya_denda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tbl_buku`
--
ALTER TABLE `tbl_buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `tbl_denda`
--
ALTER TABLE `tbl_denda`
  MODIFY `id_denda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `tbl_kegiatan`
--
ALTER TABLE `tbl_kegiatan`
  MODIFY `id_kegiatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbl_login`
--
ALTER TABLE `tbl_login`
  MODIFY `id_login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tbl_pengunjung`
--
ALTER TABLE `tbl_pengunjung`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tbl_pinjam`
--
ALTER TABLE `tbl_pinjam`
  MODIFY `id_pinjam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `tbl_rak`
--
ALTER TABLE `tbl_rak`
  MODIFY `id_rak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
