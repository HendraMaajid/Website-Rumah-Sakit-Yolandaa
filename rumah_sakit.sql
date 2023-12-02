-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2023 at 04:12 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rumah_sakit`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `username` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(250) NOT NULL,
  `id` varchar(50) DEFAULT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`username`, `email`, `password`, `id`, `role`) VALUES
('dicky', 'dicky@gmail.com', '$2y$10$8kPb51CM3SHb8KK1Ant5qO0AJXWlts9/VTeLkWtQayQBO5oI7tDDi', '9994', 'operator'),
('hendra.maajid', 'hendralatiefulm@gmail.com', '$2y$10$.jkfJOdb5ZFN7cDv3a3jWO.rulCMJLB3iEvBfAp.FfNPwKvXg4Vfy', '8884', 'owner'),
('miku', 'hatsune@gmail.com', '$2y$10$571ArUZEHyxdkrMa3abUPe/JlHGoS8zicYDKXkW9F6FlkAPIiLFw2', '1213131414', 'pasien'),
('rapli', 'rapli@gmail.com', '$2y$10$sz6DT8lF/wN8agJwhCWd1.zsBunCjQNVQKVihk2cdDAW4fmgsEmxe', '5555', 'dokter'),
('rin', 'rin@gmail.com', '$2y$10$nfPPOlHqfccb/g/4ZozxL.h.aP4QV.i0xczkpFjeDu/2NzZRaBo4K', '2222', 'perawat'),
('sidiq', 'amarsaja42@gmail.com', '$2y$10$9YNxL/2poertkQSEKssETei8udzLNsItbvfBl/F1u.0nLkcP1e/ey', '12345678', 'pasien');

-- --------------------------------------------------------

--
-- Table structure for table `dokter`
--

CREATE TABLE `dokter` (
  `id_dokter` int(11) NOT NULL,
  `nama_dokter` varchar(50) NOT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `spesialis` varchar(50) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `foto` varchar(250) NOT NULL,
  `username` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dokter`
--

INSERT INTO `dokter` (`id_dokter`, `nama_dokter`, `tanggal_lahir`, `spesialis`, `no_hp`, `email`, `alamat`, `foto`, `username`) VALUES
(5553, 'Dicky Azzam', '1989-09-13', 'Mata', '08138371', 'dickyazzam@gmail.com', 'ajibarang kulon', '', NULL),
(5555, 'Rafli Hudanul Sidiq', '1995-08-23', 'Organ Dalam', '0813837131', 'rapli@gmail.com', 'bekasi', 'image/rapli.jpg', 'rapli');

-- --------------------------------------------------------

--
-- Table structure for table `konsultasi`
--

CREATE TABLE `konsultasi` (
  `id_konsultasi` int(11) NOT NULL,
  `keluhan` varchar(250) NOT NULL,
  `tgl_konsultasi` date NOT NULL,
  `jam_konsultasi` time NOT NULL,
  `no_rekam_medis` int(11) DEFAULT NULL,
  `id_dokter` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `konsultasi`
--

INSERT INTO `konsultasi` (`id_konsultasi`, `keluhan`, `tgl_konsultasi`, `jam_konsultasi`, `no_rekam_medis`, `id_dokter`) VALUES
(15, 'batuk', '2023-11-17', '15:30:00', 7782, 5553),
(18, 'batuk', '2023-11-14', '20:30:00', 7780, 5555),
(36, 'Perut Sakit', '2023-11-20', '23:30:00', 7780, 5555),
(37, 'Vertigo', '2023-11-23', '15:42:59', 7788, 5555),
(38, 'Mag', '2023-11-17', '16:00:00', 7780, 5555),
(39, 'rabun', '2023-11-24', '17:00:00', 7780, 5553),
(41, 'Mual, pusing', '2023-11-23', '15:06:40', 7789, 5553),
(47, 'Perut Sakit', '2023-11-29', '19:00:00', 7780, 5555),
(48, 'Perut Sakit', '2023-11-27', '17:00:00', 7780, 5555),
(49, 'vertigo', '2023-11-27', '13:21:14', 7790, 5555),
(50, 'Perut Sakit', '2023-11-27', '20:30:00', 7790, 5555),
(51, 'batuk', '2023-11-27', '19:00:00', 7790, 5555),
(52, 'pilek', '2023-11-28', '19:00:00', 7788, 5555);

-- --------------------------------------------------------

--
-- Table structure for table `merawat`
--

CREATE TABLE `merawat` (
  `id_perawatan` int(11) NOT NULL,
  `jam_datang` time NOT NULL,
  `tgl_masuk_rawat` date DEFAULT NULL,
  `no_rekam_medis` int(11) DEFAULT NULL,
  `id_perawat` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `merawat`
--

INSERT INTO `merawat` (`id_perawatan`, `jam_datang`, `tgl_masuk_rawat`, `no_rekam_medis`, `id_perawat`) VALUES
(14, '16:45:49', '2023-11-23', 7788, 2222),
(15, '17:45:49', '2023-11-23', 7789, 2222),
(23, '19:00:00', '2023-11-28', 7788, 2222);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id_news` int(11) NOT NULL,
  `judul` varchar(200) NOT NULL,
  `konten` longtext NOT NULL,
  `foto` varchar(250) NOT NULL,
  `id_pembuat` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id_news`, `judul`, `konten`, `foto`, `id_pembuat`) VALUES
(12, '90 Persen Anak di Indonesia Ditargetkan Terlindungi dari HPV', 'Sebanyak 90% anak perempuan dan laki laki di Indonesia ditargetkan mendapatkan imunisasi HPV pada tahun 2030.\r\n\r\nTarget ini tertuang dalam Rencana Aksi Nasional Eliminasi Kanker Serviks Indonesia (2023-2030) yang dideklarasi bersama antara Presiden Joko Widodo dengan Presiden Joseph R. Biden, Jr. usai pertemuan bilateral antara kedua Pemimpin di Gedung Putih pada Senin (13/11).\r\n\r\nSecara lebih rinci, hingga tahun 2027 Ditargetkan 90% anak perempuan usia 15 tahun mendapatkan imunisasi HPV, dan pada 2028-2030 untuk anak laki laki. Skrining 75% perempuan berusia antara 30 dan 69 tahun dengan tes DNA HPV, dan mengobati 90% perempuan dengan lesi pra-kanker dan kanker invasif pada tahun 2030. Dengan skenario ini, sebanyak 1,2 juta jiwa akan terselamatkan dari kanker serviks pada tahun 2070.\r\n\r\nDi Indonesia, kanker serviks menimbulkan dampak yang signifikan terhadap perempuan dan keluarga mereka, lebih dari 103 juta perempuan berusia lebih dari 15 tahun berisiko terkena penyakit ini. Penyakit ini merupakan jenis kanker terbesar kedua pada perempuan, sekitar 36.000 wanita terdiagnosis setiap tahunnya. Selain itu, sekitar 70% dari seluruh perempuan yang didiagnosis, berada pada stadium lanjut; sehingga, angka kematian akibat kanker serviks di Indonesia tergolong tinggi, dengan sekitar 21.000 kematian pada tahun 2020.\r\n\r\nRencana Aksi Nasional Eliminasi Kanker Serviks merupakan strategi komprehensif untuk memperkuat sistem kesehatan nasional di Indonesia, memperluas akses terhadap pencegahan dan teknologi perawatan yang lebih maju, dan menghilangkan hambatan terhadap intervensi kanker serviks yang berakar pada tantangan sosial, pembiayaan, budaya, sosial dan struktural.\r\n\r\n“Kita harus bekerja sama dalam perjuangan memerangi kanker serviks. Bersama-sama, kita dapat memperlengkapi perempuan dengan alat yang mereka butuhkan untuk menangkal penyakit yang merusak ini. Kolaborasi dan tekad kita akan membuat kanker serviks dapat dicegah, tidak mahal, dan dapat diatasi oleh setiap perempuan” ucap Menkes Budi G. Sadikin pada momentum yang sama.\r\n\r\nRencana Aksi Nasional tersebut disusun berdasarkan empat pilar tindakan: pemberian layanan; pendidikan, pelatihan, dan penjangkauan; pendorong utama kemajuan; dan tata kelola serta kebijakan. Pilar-pilar ini memberikan prioritas khusus pada bidang, strategi, dan program untuk Indonesia ‘melompat tinggi’ menuju eliminasi kanker serviks.\r\n\r\nRencana Aksi Nasional ini didasarkan pada kemajuan Indonesia dalam mencapai strategi global WHO dalam mengeliminasi kanker serviks dan APEC Cervical Cancer Roadmap. Melalui RAN ini (Indonesia berupaya melengkapi upaya bersama anggota APEC) yang beberapa telah lebih dulu membuat rencana aksi untuk eliminasi kanker serviks.\r\n\r\nKomitmen nasional terhadap eliminasi kanker serviks bergantung pada keterlibatan, kerja sama, dan koordinasi berbagai pemangku kepentingan, mulai dari instansi pemerintah hingga pasien kanker serviks itu sendiri. RAN ini dibuat oleh Kementerian Kesehatan RI bermitra dengan WHO, badan-badan terkait PBB, dan konsultan kebijakan publik Crowell & Moring International yang berbasis di Washington (yang memfasilitasi pengembangan APEC Cervical Cancer Roadmap ). Proses penyusunan RAN ini juga melibatkan lebih dari 20 kelompok pemangku kepentingan, termasuk Kementerian terkait, asosiasi dokter, institusi pendidikan, mitra internasional, dan organisasi keagamaan, yang menjadi mitra utama dalam implementasi.\r\n\r\n“Indonesia memimpin dengan memberikan contoh dan membuat rencana yang ambisius tentang bagaimana para mitra dapat berkolaborasi untuk mengakhiri penyakit yang membahayakan ini,” kata Sejal Mistry, Direktur Crowell & Moring International. “Kanker serviks dapat dihilangkan, melalui kemitraan strategis dan koordinasi para pemangku kepentingan di seluruh sistem kesehatan masyarakat. Kami bangga telah bermitra dengan Pemerintah Indonesia untuk membantu mewujudkan hal tersebut.”\r\n\r\nRAN ini diluncurkan dalam acara yang diselenggarakan oleh United States (U.S.) Chamber of Commerce, bekerja sama dengan Kementerian Kesehatan Republik Indonesia, APEC Cervical Cancer Initiative, dan Kementerian Kesehatan. Para mitra memperkuat komitmen mereka terhadap eliminasi kanker serviks di Indonesia dan seluruh perekonomian APEC dengan mendiskusikan tindakan nyata yang dapat dilakukan secara kolektif untuk mempercepat kemajuan menuju tujuan “90-70-90” WHO pada tahun 2030\r\n\r\nVarnee Murugan, Direktur Eksekutif Inisiatif Global untuk Kesehatan dan Ekonomi Kamar Dagang AS, menyoroti bagaimana rencana aksi nasional ini sangat menunjukkan peran kolaborasi pemerintah-swasta, memanfaatkan keahlian pemerintah, dunia usaha, dan masyarakat sipil untuk menciptakan solusi kesehatan yang komprehensif dan berkelanjutan.\r\n\r\nSebagai tuan rumah APEC pada tahun 2023, Amerika Serikat merupakan mitra berharga dalam Rilis RAN Kanker Serviks. Indonesia sepakat memperkuat kerja sama dan komitmen untuk meningkatkan kesehatan rakyat Indonesia.\r\n\r\nhttps://kemkes.go.id/id/national-cervical-cancer-elimination-plan-for-indonesia-2023-2030\r\n\r\nBerita ini disiarkan oleh Biro Komunikasi dan Pelayanan Publik, Kementerian Kesehatan RI. Untuk informasi lebih lanjut dapat menghubungi nomor hotline Halo Kemenkes melalui nomor hotline 1500-567, SMS 081281562620 dan alamat email kontak@kemkes.go.id.\r\n\r\nKepala Biro Komunikasi dan Pelayanan Publik\r\n\r\ndr. Siti Nadia Tarmizi, M.Epid', 'image/berita1.jpg', 9994),
(13, 'Inovasi Wolbachia Efektif Turunkan Kasus DBD Sudah Teruji Berhasil Di Berbagai Negara', 'Kementerian Kesehatan menerapkan inovasi teknologi wolbachia untuk menurunkan penyebaran Demam Berdarah Dengue (DBD) di Indonesia. Selain di Indonesia, Pemanfaatan teknologi Wolbachia juga telah dilaksanakan di sembilan negara lain dan hasilnya terbukti efektif untuk pencegahan Dengue. Adapun negara yang dimaksud adalah Brasil, Australia, Vietnam, Fiji, Vanuatu, Mexico, Kiribati, New Caledonia, dan Sri Lanka.\r\n\r\nTeknologi Wolbachia melengkapi strategi pengendalian yang berkasnya sudah masuk ke Stranas (Strategi Nasional). Sebagai pilot project di Indonesia, dilaksanakan di lima kota yaitu Kota Semarang, Kota Jakarta Barat, Kota Bandung, Kota Kupang dan Kota Bontang berdasarkan Keputusan Menteri kesehatan RI Nomor 1341 tentang Penyelenggaran Pilot project Implementasi Wolbachia sebagai inovasi penanggulangan dengue.\r\n\r\nEfektivitas wolbachia sendiri telah diteliti sejak 2011 yang dilakukan oleh World Mosquito Program (WMP) di Yogyakarta dengan dukungan filantropi yayasan Tahija. Penelitian dilakukan melaui fase persiapan dan pelepasan aedes aegypti berwolbachia dalam skala terbatas (2011-2015).\r\n\r\nWolbachia ini dapat melumpuhkan virus dengue dalam tubuh nyamuk aedes aegypti, sehingga virus dengue tidak akan menular ke dalam tubuh manusia. Jika aedes aegypti jantan berwolbachia kawin dengan aedes aegypti betina maka virus dengue pada nyamuk betina akan terblok. Selain itu, jika yang berwolbachia itu nyamuk betina kawin dengan nyamuk jantan yang tidak berwolbachia maka seluruh telurnya akan mengandung wolbachia.\r\n\r\nSebelumnya Uji coba penyebaran nyamuk ber-Wolbachia telah dilakukan di Kota Yogyakarta dan Kabupaten Bantul pada tahun 2022. Hasilnya, di lokasi yang telah disebar Wolbachia terbukti mampu menekan kasus demam berdarah hingga 77 persen, dan menurunkan proporsi dirawat di rumah sakit sebesar 86%.\r\n\r\nKepala Dinas Kesehatan Kota Yogyakarta, Emma Rahmi Aryani juga menegaskan adanya penurunan penyebaran Dengue yang signifikan setelah adanya penerapan Wolbachia.\r\n\r\n“Jumlah kasus di Kota Yogyakarta pada bulan Januari hingga Mei 2023 dibanding pola maksimum dan minimum di 7 tahun sebelumnya (2015 – 2022) berada di bawah garis minimum,” terang Emma\r\n\r\n“Masyarakat pada awalnya memang ada kekhawatiran karena pemahaman dari masyarakat itu nyamuk ini dilepas kok bisa mengurangi (DBD). Tapi seiring berjalan dan kita sudah ada edukasi, ada sosialisasi, sekarang masyarakat justru semakin paham, bahwa sebenarnya teknologi ini untuk mengurangi DBD,” papar Sigit Hartobudiono, Lurah Patangpuluhan Yogyakarta\r\n\r\nKendati demikian, keberadaan inovasi teknologi Wolbachia tidak serta merta menghilangkan metode pencegahan dan pengendalian dengue yang telah ada di Indonesia. Masyarakat tetap diminta untuk melakukan gerakan 3M Plus seperti Menguras, Menutup, dan Mendaur ulang serta tetap menjaga kebersihan diri dan lingkungan.\r\n\r\nBerita ini disiarkan oleh Biro Komunikasi dan Pelayanan Publik, Kementerian Kesehatan RI. Untuk informasi lebih lanjut dapat menghubungi nomor hotline Halo Kemenkes melalui nomor hotline 1500-567, SMS 081281562620, dan alamat email kontak@kemkes.go.id .\r\n\r\nKepala Biro Komunikasi dan Pelayanan Publik\r\n\r\ndr. Siti Nadia Tarmizi, M.Epid', 'image/berita2.jpg', 9994);

-- --------------------------------------------------------

--
-- Table structure for table `owner`
--

CREATE TABLE `owner` (
  `id_owner` int(11) NOT NULL,
  `nama_owner` varchar(50) NOT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `alamat` varchar(250) NOT NULL,
  `foto` varchar(250) NOT NULL,
  `username` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `owner`
--

INSERT INTO `owner` (`id_owner`, `nama_owner`, `tanggal_lahir`, `email`, `no_hp`, `alamat`, `foto`, `username`) VALUES
(8884, 'Hendra Latieful Maajid', '1975-07-08', 'hendramaajid@gmail.com', '089636382', 'Pancurendang', 'image/hendra.jpg', 'hendra.maajid');

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `no_rekam_medis` int(11) NOT NULL,
  `kis` varchar(16) NOT NULL,
  `nama_pasien` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `foto` varchar(250) NOT NULL,
  `username` varchar(200) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`no_rekam_medis`, `kis`, `nama_pasien`, `alamat`, `email`, `no_hp`, `foto`, `username`, `tanggal_lahir`) VALUES
(7780, '1213131414', 'Hatsune Miku', 'ajibarang', 'hatsune@gmail.com', '08927131', 'image/F-d5BqxagAAtqbE.jpg', 'miku', '2007-08-30'),
(7781, '98762323', 'Azzam Dicky', 'Ajibarang Kulon', 'azzam@gmail.com', '08138371', 'image/F-Usix8bQAAoE3R.jpg', NULL, '2023-11-23'),
(7782, '12337139', 'Kagamine Rin', 'ajibarang', 'rinkagamine@gmail.com', '089456322', 'image/F64aOiWaoAA7gFi.jpg', NULL, '2023-11-07'),
(7788, '331445', 'Kaito', 'ajibarang', 'rin@gmail.com', '89456322', 'image/F-d7BZCWIAA8jvT.jpg', NULL, '2023-11-24'),
(7789, '131317890', 'Hendra Maajid', 'Jambi', 'hendralatiefulm@gmail.com', '09281371', '', NULL, '2023-11-15'),
(7790, '12345678', 'Rafli Sidiq', 'bekasi', 'amarsaja42@gmail.com', '017378613', 'image/hospital.png', 'sidiq', '2023-11-22');

--
-- Triggers `pasien`
--
DELIMITER $$
CREATE TRIGGER `before_delete_pasien` BEFORE DELETE ON `pasien` FOR EACH ROW BEGIN
    DECLARE rekam_medis INT;
    SELECT no_rekam_medis INTO rekam_medis FROM pasien WHERE no_rekam_medis = OLD.no_rekam_medis;
    DELETE FROM konsultasi WHERE no_rekam_medis = rekam_medis;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `before_delete_pasien2` BEFORE DELETE ON `pasien` FOR EACH ROW BEGIN
    DELETE FROM merawat WHERE no_rekam_medis = OLD.no_rekam_medis;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `perawat`
--

CREATE TABLE `perawat` (
  `id_perawat` int(11) NOT NULL,
  `nama_perawat` varchar(50) NOT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `no_hp` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `foto` varchar(250) NOT NULL,
  `username` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `perawat`
--

INSERT INTO `perawat` (`id_perawat`, `nama_perawat`, `tanggal_lahir`, `no_hp`, `email`, `alamat`, `foto`, `username`) VALUES
(2222, 'Rin', '1999-11-10', '0822774818', 'rin@gmail.com', 'jambi', 'image/F64aOiWaoAA7gFi.jpg', 'rin'),
(2226, 'Meiko', '1997-01-28', '08138371', 'meiko@gmail.com', 'ajibarang', 'image/F_CwnR9XAAA-N0K.jpeg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pesan_kamar`
--

CREATE TABLE `pesan_kamar` (
  `id_waktu` int(11) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `tgl_keluar` date DEFAULT NULL,
  `no_rekam_medis` int(11) DEFAULT NULL,
  `id_ruang` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pesan_kamar`
--

INSERT INTO `pesan_kamar` (`id_waktu`, `tgl_masuk`, `tgl_keluar`, `no_rekam_medis`, `id_ruang`) VALUES
(1, '2023-11-17', '2023-11-29', 7780, 4451),
(23, '2023-11-27', '2023-11-27', 7780, 4452),
(24, '2023-11-27', '2023-11-27', 7790, 4452);

-- --------------------------------------------------------

--
-- Table structure for table `ruang`
--

CREATE TABLE `ruang` (
  `id_ruang` int(11) NOT NULL,
  `nama_ruang` varchar(50) NOT NULL,
  `jenis_ruang` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ruang`
--

INSERT INTO `ruang` (`id_ruang`, `nama_ruang`, `jenis_ruang`) VALUES
(4451, 'Mawar', 'Regular'),
(4452, 'Melati', 'VIP');

-- --------------------------------------------------------

--
-- Table structure for table `staff_operator`
--

CREATE TABLE `staff_operator` (
  `id_operator` int(11) NOT NULL,
  `nama_operator` varchar(50) NOT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `no_hp` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `foto` varchar(250) NOT NULL,
  `username` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff_operator`
--

INSERT INTO `staff_operator` (`id_operator`, `nama_operator`, `tanggal_lahir`, `no_hp`, `email`, `alamat`, `foto`, `username`) VALUES
(9990, 'hendra', '1990-08-22', '089989918', 'hendra@gmail.com', 'pancurendang', '', NULL),
(9994, 'Dicky', '1998-11-17', '08138371', 'dicky@gmail.com', 'ajibarang', 'image/diki.jpg', 'dicky');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`id_dokter`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `konsultasi`
--
ALTER TABLE `konsultasi`
  ADD PRIMARY KEY (`id_konsultasi`),
  ADD KEY `id_dokter` (`id_dokter`),
  ADD KEY `no_rekam_medis` (`no_rekam_medis`);

--
-- Indexes for table `merawat`
--
ALTER TABLE `merawat`
  ADD PRIMARY KEY (`id_perawatan`),
  ADD KEY `no_rekam_medis` (`no_rekam_medis`),
  ADD KEY `id_perawat` (`id_perawat`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id_news`);

--
-- Indexes for table `owner`
--
ALTER TABLE `owner`
  ADD PRIMARY KEY (`id_owner`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`no_rekam_medis`) USING BTREE,
  ADD UNIQUE KEY `kis` (`kis`) USING BTREE,
  ADD KEY `username` (`username`);

--
-- Indexes for table `perawat`
--
ALTER TABLE `perawat`
  ADD PRIMARY KEY (`id_perawat`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `pesan_kamar`
--
ALTER TABLE `pesan_kamar`
  ADD PRIMARY KEY (`id_waktu`),
  ADD KEY `no_rekam_medis` (`no_rekam_medis`),
  ADD KEY `id_ruang` (`id_ruang`);

--
-- Indexes for table `ruang`
--
ALTER TABLE `ruang`
  ADD PRIMARY KEY (`id_ruang`);

--
-- Indexes for table `staff_operator`
--
ALTER TABLE `staff_operator`
  ADD PRIMARY KEY (`id_operator`),
  ADD KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dokter`
--
ALTER TABLE `dokter`
  MODIFY `id_dokter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5562;

--
-- AUTO_INCREMENT for table `konsultasi`
--
ALTER TABLE `konsultasi`
  MODIFY `id_konsultasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `merawat`
--
ALTER TABLE `merawat`
  MODIFY `id_perawatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id_news` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `owner`
--
ALTER TABLE `owner`
  MODIFY `id_owner` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8885;

--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `no_rekam_medis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7791;

--
-- AUTO_INCREMENT for table `perawat`
--
ALTER TABLE `perawat`
  MODIFY `id_perawat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2227;

--
-- AUTO_INCREMENT for table `pesan_kamar`
--
ALTER TABLE `pesan_kamar`
  MODIFY `id_waktu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `ruang`
--
ALTER TABLE `ruang`
  MODIFY `id_ruang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4456;

--
-- AUTO_INCREMENT for table `staff_operator`
--
ALTER TABLE `staff_operator`
  MODIFY `id_operator` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9997;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dokter`
--
ALTER TABLE `dokter`
  ADD CONSTRAINT `dokter_ibfk_1` FOREIGN KEY (`username`) REFERENCES `akun` (`username`);

--
-- Constraints for table `konsultasi`
--
ALTER TABLE `konsultasi`
  ADD CONSTRAINT `konsultasi_ibfk_1` FOREIGN KEY (`id_dokter`) REFERENCES `dokter` (`id_dokter`),
  ADD CONSTRAINT `konsultasi_ibfk_2` FOREIGN KEY (`no_rekam_medis`) REFERENCES `pasien` (`no_rekam_medis`);

--
-- Constraints for table `merawat`
--
ALTER TABLE `merawat`
  ADD CONSTRAINT `merawat_ibfk_1` FOREIGN KEY (`no_rekam_medis`) REFERENCES `pasien` (`no_rekam_medis`),
  ADD CONSTRAINT `merawat_ibfk_2` FOREIGN KEY (`id_perawat`) REFERENCES `perawat` (`id_perawat`);

--
-- Constraints for table `owner`
--
ALTER TABLE `owner`
  ADD CONSTRAINT `owner_ibfk_1` FOREIGN KEY (`username`) REFERENCES `akun` (`username`);

--
-- Constraints for table `pasien`
--
ALTER TABLE `pasien`
  ADD CONSTRAINT `pasien_ibfk_3` FOREIGN KEY (`username`) REFERENCES `akun` (`username`);

--
-- Constraints for table `perawat`
--
ALTER TABLE `perawat`
  ADD CONSTRAINT `perawat_ibfk_1` FOREIGN KEY (`username`) REFERENCES `akun` (`username`);

--
-- Constraints for table `pesan_kamar`
--
ALTER TABLE `pesan_kamar`
  ADD CONSTRAINT `pesan_kamar_ibfk_1` FOREIGN KEY (`no_rekam_medis`) REFERENCES `pasien` (`no_rekam_medis`),
  ADD CONSTRAINT `pesan_kamar_ibfk_2` FOREIGN KEY (`id_ruang`) REFERENCES `ruang` (`id_ruang`);

--
-- Constraints for table `staff_operator`
--
ALTER TABLE `staff_operator`
  ADD CONSTRAINT `staff_operator_ibfk_1` FOREIGN KEY (`username`) REFERENCES `akun` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
