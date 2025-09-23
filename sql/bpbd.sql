-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Agu 2024 pada 08.54
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bpbd`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bencana`
--

CREATE TABLE `bencana` (
  `id_bcn` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `bencana`
--

INSERT INTO `bencana` (`id_bcn`, `nama`) VALUES
(1, 'Banjir rob'),
(2, 'Banjir bandang'),
(3, 'Banjir dan tanah longsor'),
(4, 'Banjir drainase dan selokan'),
(5, 'Banjir waduk'),
(6, 'Banjir genangan'),
(7, 'Tanggul jebol'),
(8, 'Longsor'),
(9, 'Gerakan tanah'),
(10, 'Gelombang pasang'),
(11, 'Abrasi Pantai'),
(12, 'Puting beliung'),
(13, 'Angin kencang'),
(14, 'Angin topan'),
(15, 'Hujan es'),
(16, 'Siklon tropis'),
(17, 'Suhu udara ekstrem'),
(18, 'Kekeringan meteorologis'),
(19, 'Kekeringan hidrologis'),
(20, 'Kekeringan pertanian'),
(21, 'Kebakaran hutan'),
(22, 'Kebakaran lahan'),
(23, 'Kebakaran lahan gambut'),
(24, 'Gempa tektonik'),
(25, 'Gempa vulkanik'),
(26, 'Gempabumi runtuhan'),
(27, 'Tsunami seismogenik'),
(28, 'Tsunami nonseismik'),
(29, 'Tsunami lokal'),
(30, 'Tsunami regional'),
(31, 'Tsunami jarak'),
(32, 'Tsunami meteorologi'),
(33, 'Mikrotsunami'),
(34, 'Awan panas guguran-aliran piroklastik guguran'),
(35, 'Awan panas-aliran piroklastik'),
(36, 'Banjir lahar'),
(37, 'Hujan abu vulkanik'),
(38, 'Gas vulkanik beracun'),
(39, 'Wabah penyakit'),
(40, 'Epidemi'),
(41, 'Kebakaran gedung dan pemukiman'),
(42, 'Kegagalan industri'),
(43, 'Kecelakaan industri'),
(44, 'Konflik Sosial'),
(45, 'Teror'),
(46, 'Kerusuhan Sosial');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cuaca`
--

CREATE TABLE `cuaca` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `cuaca`
--

INSERT INTO `cuaca` (`id`, `nama`, `foto`) VALUES
(1, 'Prakiraan Cuaca 04 Agustus Pukul 20.00 WITA sd 05 Agustus 2024 Pukul 08.00 WITA', 'vSbH3aG4x5dTwHOBne6t.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `galeri`
--

CREATE TABLE `galeri` (
  `id` int(11) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis`
--

CREATE TABLE `jenis` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `jenis`
--

INSERT INTO `jenis` (`id`, `nama`) VALUES
(1, 'Bencana Alam'),
(2, 'Bencana NonAlam'),
(3, 'Bencana Sosial');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kejadian`
--

CREATE TABLE `kejadian` (
  `id` int(11) NOT NULL,
  `jenis_id` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` time NOT NULL,
  `provinsi` text NOT NULL,
  `kabkota` text NOT NULL,
  `kecamatan` text NOT NULL,
  `kelurahan` text NOT NULL,
  `geografis` text NOT NULL,
  `sebab` text DEFAULT NULL,
  `kronologis` text DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `sumber` text DEFAULT NULL,
  `kondisi` text DEFAULT NULL,
  `status_darurat` text NOT NULL,
  `upaya` text DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `sebaran` text DEFAULT NULL,
  `kib` text DEFAULT NULL,
  `dana` text NOT NULL,
  `sdm` text NOT NULL,
  `sarpras` text NOT NULL,
  `logistik` text NOT NULL,
  `alat` text NOT NULL,
  `aml` text NOT NULL,
  `amp` text NOT NULL,
  `dwsml` text NOT NULL,
  `dwsmp` text NOT NULL,
  `lnml` text NOT NULL,
  `lnmp` text NOT NULL,
  `tml` text NOT NULL,
  `tmp` text NOT NULL,
  `ahl` text NOT NULL,
  `ahp` text NOT NULL,
  `dwshl` text NOT NULL,
  `dwshp` text NOT NULL,
  `lnhl` text NOT NULL,
  `lnhp` text NOT NULL,
  `thl` text NOT NULL,
  `thp` text NOT NULL,
  `alkl` text DEFAULT NULL,
  `alkp` text NOT NULL,
  `dwsll` text NOT NULL,
  `dwslp` text NOT NULL,
  `lnll` text NOT NULL,
  `lnlp` text NOT NULL,
  `tll` text NOT NULL,
  `tlp` text NOT NULL,
  `atl` text NOT NULL,
  `atp` text NOT NULL,
  `dwstl` text NOT NULL,
  `dwstp` text NOT NULL,
  `lntl` text NOT NULL,
  `lntp` text NOT NULL,
  `ttl` text NOT NULL,
  `ttp` text NOT NULL,
  `aul` text NOT NULL,
  `aup` text NOT NULL,
  `dwsul` text NOT NULL,
  `dwsup` text NOT NULL,
  `lnul` text NOT NULL,
  `lnup` text NOT NULL,
  `tul` text NOT NULL,
  `tup` text NOT NULL,
  `sawah` text NOT NULL,
  `txsawah` text NOT NULL,
  `lahan` text NOT NULL,
  `txlahan` text NOT NULL,
  `kebun` text NOT NULL,
  `txkebun` text NOT NULL,
  `hutan` text NOT NULL,
  `txhutan` text NOT NULL,
  `kolam` text NOT NULL,
  `txkolam` text NOT NULL,
  `kb` text NOT NULL,
  `ks` text NOT NULL,
  `kr` text NOT NULL,
  `ktrd` text NOT NULL,
  `txkios` text NOT NULL,
  `pb` text NOT NULL,
  `ps` text NOT NULL,
  `pr` text NOT NULL,
  `ptrd` text NOT NULL,
  `txpabrik` text NOT NULL,
  `txair` text NOT NULL,
  `txlampu` text NOT NULL,
  `txkom` text NOT NULL,
  `txiri` text NOT NULL,
  `txjln` text NOT NULL,
  `txtrans` text NOT NULL,
  `txbbm` text NOT NULL,
  `jb` text NOT NULL,
  `js` text NOT NULL,
  `jr` text NOT NULL,
  `jtrd` text NOT NULL,
  `txjembatan` text NOT NULL,
  `rmhb` text NOT NULL,
  `rmhs` text NOT NULL,
  `rmhr` text NOT NULL,
  `rmhtrd` text NOT NULL,
  `txrmh` text NOT NULL,
  `skob` text NOT NULL,
  `skos` text NOT NULL,
  `skor` text NOT NULL,
  `skotrd` text NOT NULL,
  `txsko` text NOT NULL,
  `rib` text NOT NULL,
  `ris` text NOT NULL,
  `rir` text NOT NULL,
  `ritrd` text NOT NULL,
  `txri` text NOT NULL,
  `faskesb` text NOT NULL,
  `faskess` text NOT NULL,
  `faskesr` text NOT NULL,
  `faskestrd` text NOT NULL,
  `txfaskes` text NOT NULL,
  `ktrb` text NOT NULL,
  `ktrs` text NOT NULL,
  `ktrr` text NOT NULL,
  `ktrtrd` text NOT NULL,
  `txktr` text NOT NULL,
  `psrb` text NOT NULL,
  `psrs` text NOT NULL,
  `psrr` text NOT NULL,
  `psrtrd` text NOT NULL,
  `txpsr` text NOT NULL,
  `layanan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kejadian`
--

INSERT INTO `kejadian` (`id`, `jenis_id`, `nama`, `tanggal`, `waktu`, `provinsi`, `kabkota`, `kecamatan`, `kelurahan`, `geografis`, `sebab`, `kronologis`, `deskripsi`, `sumber`, `kondisi`, `status_darurat`, `upaya`, `foto`, `sebaran`, `kib`, `dana`, `sdm`, `sarpras`, `logistik`, `alat`, `aml`, `amp`, `dwsml`, `dwsmp`, `lnml`, `lnmp`, `tml`, `tmp`, `ahl`, `ahp`, `dwshl`, `dwshp`, `lnhl`, `lnhp`, `thl`, `thp`, `alkl`, `alkp`, `dwsll`, `dwslp`, `lnll`, `lnlp`, `tll`, `tlp`, `atl`, `atp`, `dwstl`, `dwstp`, `lntl`, `lntp`, `ttl`, `ttp`, `aul`, `aup`, `dwsul`, `dwsup`, `lnul`, `lnup`, `tul`, `tup`, `sawah`, `txsawah`, `lahan`, `txlahan`, `kebun`, `txkebun`, `hutan`, `txhutan`, `kolam`, `txkolam`, `kb`, `ks`, `kr`, `ktrd`, `txkios`, `pb`, `ps`, `pr`, `ptrd`, `txpabrik`, `txair`, `txlampu`, `txkom`, `txiri`, `txjln`, `txtrans`, `txbbm`, `jb`, `js`, `jr`, `jtrd`, `txjembatan`, `rmhb`, `rmhs`, `rmhr`, `rmhtrd`, `txrmh`, `skob`, `skos`, `skor`, `skotrd`, `txsko`, `rib`, `ris`, `rir`, `ritrd`, `txri`, `faskesb`, `faskess`, `faskesr`, `faskestrd`, `txfaskes`, `ktrb`, `ktrs`, `ktrr`, `ktrtrd`, `txktr`, `psrb`, `psrs`, `psrr`, `psrtrd`, `txpsr`, `layanan`) VALUES
(52, 'Bencana Alam', 'Banjir rob', '2024-03-13', '05:30:00', 'Nusa Tenggara Timur', 'Kota Kupang', 'Alak', 'Namosain', 'Lintang : -10.166667, Bujur : 123.583333', 'Kejadian bencana Cuaca Ekstrim di Kota Kupang dipicu oleh Hujan disertai Angin Kencang dan gelombang tinggi. Menurut data BMKG hujan telah terjadi pada lokasi terdampak sejak tanggal 9 Maret 2024 dan prediksinya puncaknya pada tanggal 18 Maret 2024 terjadi Hujan Lebat (CH 50-100 mm) Hujan Sangat Lebat (CH 100 – 150 mm) dan terjadi Hujan Ekstrim (CH >150 mm). Bencana Cuaca Ekstrim inilah yang memicu terjadi dampak bencana ikutan lainnya seperti banjir (limpasan dan genangan) serta tanah longsor, angin kencang, dan gelombang pasang (banjir Rob).					', 'Berdasarkan Press Release Kewaspadaan cuaca ekstrim di Nusa Tenggara Timur Tanggal 13 sd. 18 Maret 2024 dengan nomor B/ME.02.04/007/K Koe/III/2024 tanggal 12 Maret 2024 tentang kewaspadaan cuaca ekstrim di NTT khususnya kota kupang pada tanggal 07 Maret 2024 yang berlaku tanggal 08 sampai dengan 12 Maret 2024, dan melihat kondisi dinamika atmosfer terkini maka Stasiun Meteorologi kelas II El Tari mengupdate Press Release terbaru. Berdasarkan Analisa Dinamika Atmosfer dan laut, terpantau adanya bibit Siklon Tropis 91S di samudera Hindia bagian Tenggara barat daya Propinsi Banten. Potensi Bibit Siklon Tropis 91S menjadi Siklon Tropis dalam 24 jam kedepan pada kategori sedang dan menjadi wilayah monitoring Tropical Cyclone Warning Centre (TCWS) Australia. Terdapat area terindikasi Bibit Siklon Tropis (Suspec Area) di wilayah selatan NTT dan Bibit Siklon Tropis 93P di Teluk Carpentaria sekitar utara Australia yang bergerak kearah timur tenggara sehingga membentuk daerah perlambatan, pertemuan dan belokan angin. Kondisi ini mengakibatkan meningkatnya intensitas curah hujan dan angin kencang di wilayah NTT. Potensi Bibit Siklon Tropis 93P menjadi Siklon Tropis dalam 24 jam kedepan pada kategori rendah, aktifnya gelombang Ekuatorial Rossby dan Fenomena Madden Julian Osellation (MJO) juga menyebabkan wilayah NTT berpotensi hujan sedang – lebat hingga ekstrim (curah hujan sedang – lebat hingga ektrim disertai petir dan angin kencang) yang terjadi di wilayah Propinsi NTT yang dapat mengakibatkan terjadinya Bencana Hidrometeorologi pada tanggal 13 sd. 18 Maret 2024 termasuk wilayah Kota Kupang.					', 'Berdasarkan Press Release Kewaspadaan cuaca ekstrim di Nusa Tenggara Timur Tanggal 13 sd. 18 Maret 2024 dengan nomor B/ME.02.04/007/K Koe/III/2024 tanggal 12 Maret 2024 tentang kewaspadaan cuaca ekstrim di NTT khususnya kota kupang pada tanggal 07 Maret 2024 yang berlaku tanggal 08 sampai dengan 12 Maret 2024, dan melihat kondisi dinamika atmosfer terkini maka Stasiun Meteorologi kelas II El Tari mengupdate Press Release terbaru. Berdasarkan Analisa Dinamika Atmosfer dan laut, terpantau adanya bibit Siklon Tropis 91S di samudera Hindia bagian Tenggara barat daya Propinsi Banten. Potensi Bibit Siklon Tropis 91S menjadi Siklon Tropis dalam 24 jam kedepan pada kategori sedang dan menjadi wilayah monitoring Tropical Cyclone Warning Centre (TCWS) Australia. Terdapat area terindikasi Bibit Siklon Tropis (Suspec Area) di wilayah selatan NTT dan Bibit Siklon Tropis 93P di Teluk Carpentaria sekitar utara Australia yang bergerak kearah timur tenggara sehingga membentuk daerah perlambatan, pertemuan dan belokan angin. Kondisi ini mengakibatkan meningkatnya intensitas curah hujan dan angin kencang di wilayah NTT. Potensi Bibit Siklon Tropis 93P menjadi Siklon Tropis dalam 24 jam kedepan pada kategori rendah, aktifnya gelombang Ekuatorial Rossby dan Fenomena Madden Julian Osellation (MJO) juga menyebabkan wilayah NTT berpotensi hujan sedang – lebat hingga ekstrim (curah hujan sedang – lebat hingga ektrim disertai petir dan angin kencang) yang terjadi di wilayah Propinsi NTT yang dapat mengakibatkan terjadinya Bencana Hidrometeorologi pada tanggal 13 sd. 18 Maret 2024 termasuk wilayah Kota Kupang.	', 'Posko BPBD Kota Kupang', 'Penanganan Darurat telah dilakukan, dilanjutkan dengan Ferivikasi dan Validasi bagi Rumah terdampak Bencana sesuai Kategori Kerusakan untuk selanjutnya di Tindak lanjuti dengan Bantuan Stimulan Rumah, sedangkan Infrastruktur yang rusak akibat bencana di lakukan Koordinasi dengan Instansi Teknis.', 'Pernyataan Bencana No. 05/BPBD.P36+P67/III/2024, Tgl. 9 Maret  2024 SK. Tanggap Darurat Bencana No. 64/KEP/HK/20244, Tgl. 9 Maret  2024 SK. Posko Tanggap Darurat Bencana No. 65/KEP/HK/20244, Tgl. 9 Maret  2024', 'Posko Bencana Tanggap  Darurat melakukan Penyaluran Bantuan untuk Korban Bencana dengan Rincian : 42 Paket Sandang, 51 Paket Perlengkapan Dapur, 42 Paket Family Kit, 42 Kg Gula Pasir, 27 Lembar Terpal dn 9 Karung Beras.									 Sumbangan Pihak Ketiga yakni dari LLHBP Muhamadiyah Kupang berupa Beras 20 Karung @ 5 Kg dan langsung didistribusi pada Korban terdampak Bencana.', 'Til3FNbf9vGwuG6lBZ1Z.jpg', 'Namosain', '53 71 101 20240309 1', 'Rp 394.271.800', 'BPBD Kota Kupang : 50 Orang (untuk semua Klaster) Satpol PP : 5 Orang Dinsos : 6 Orang PMI : 1 Orang DPRKP : 6 Orang PUPR  : 2 Orang Dinkes : 2 Orang  TNI : 5 Orang POLRi : 5 Orang Diskominfo : 1 Orang Inspektorat : 3 Orang ', 'Tidak ada', '42 Paket Sandang, 51 Paket Perlengkapan Dapur, 42 Paket Family Kit, 42 Kg Gula Pasir, 27 Lembar Terpal dan 29 Karung Beras.', 'Mobil Angkutan Logistik, Alat Sensor, Sepatu Booth, Mantel hujan, Mobil Tangki Air', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '2', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '9,83', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', ' 32.856.000', '0', '0', '0', '0', '0', '0', '0', '2', '7', '112', '0', ' 106.050.000', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '2', ' 43.750.000', 'Sepatu Booth, Mobil Tangki Air, Sensor,	Mobil Angkut Logistik, Mantel\r\n'),
(53, 'Bencana Alam', 'Longsor', '2024-03-13', '05:30:00', 'Nusa Tenggara Timur', 'Kota Kupang', 'Oebobo', 'Oebufu', 'Lintang : -10.166667 Bujur : 123.583333', 'Kejadian bencana Cuaca Ekstrim di Kota Kupang dipicu oleh Hujan disertai Angin Kencang dan gelombang tinggi. Menurut data BMKG hujan telah terjadi pada lokasi terdampak sejak tanggal 9 Maret 2024 dan prediksinya puncaknya pada tanggal 18 Maret 2024 terjadi Hujan Lebat (CH 50-100 mm) Hujan Sangat Lebat (CH 100 – 150 mm) dan terjadi Hujan Ekstrim (CH >150 mm). Bencana Cuaca Ekstrim inilah yang memicu terjadi dampak bencana ikutan lainnya seperti banjir (limpasan dan genangan) serta tanah longsor, angin kencang, dan gelombang pasang (banjir Rob).									', 'Berdasarkan Press Release Kewaspadaan cuaca ekstrim di Nusa Tenggara Timur Tanggal 13 sd. 18 Maret 2024 dengan nomor B/ME.02.04/007/K Koe/III/2024 tanggal 12 Maret 2024 tentang kewaspadaan cuaca ekstrim di NTT khususnya kota kupang pada tanggal 07 Maret 2024 yang berlaku tanggal 08 sampai dengan 12 Maret 2024, dan melihat kondisi dinamika atmosfer terkini maka Stasiun Meteorologi kelas II El Tari mengupdate Press Release terbaru. Berdasarkan Analisa Dinamika Atmosfer dan laut, terpantau adanya bibit Siklon Tropis 91S di samudera Hindia bagian Tenggara barat daya Propinsi Banten. Potensi Bibit Siklon Tropis 91S menjadi Siklon Tropis dalam 24 jam kedepan pada kategori sedang dan menjadi wilayah monitoring Tropical Cyclone Warning Centre (TCWS) Australia. Terdapat area terindikasi Bibit Siklon Tropis (Suspec Area) di wilayah selatan NTT dan Bibit Siklon Tropis 93P di Teluk Carpentaria sekitar utara Australia yang bergerak kearah timur tenggara sehingga membentuk daerah perlambatan, pertemuan dan belokan angin. Kondisi ini mengakibatkan meningkatnya intensitas curah hujan dan angin kencang di wilayah NTT. Potensi Bibit Siklon Tropis 93P menjadi Siklon Tropis dalam 24 jam kedepan pada kategori rendah, aktifnya gelombang Ekuatorial Rossby dan Fenomena Madden Julian Osellation (MJO) juga menyebabkan wilayah NTT berpotensi hujan sedang – lebat hingga ekstrim (curah hujan sedang – lebat hingga ektrim disertai petir dan angin kencang) yang terjadi di wilayah Propinsi NTT yang dapat mengakibatkan terjadinya Bencana Hidrometeorologi pada tanggal 13 sd. 18 Maret 2024 termasuk wilayah Kota Kupang.', 'Berdasarkan Press Release Kewaspadaan cuaca ekstrim di Nusa Tenggara Timur Tanggal 13 sd. 18 Maret 2024 dengan nomor B/ME.02.04/007/K Koe/III/2024 tanggal 12 Maret 2024 tentang kewaspadaan cuaca ekstrim di NTT khususnya kota kupang pada tanggal 07 Maret 2024 yang berlaku tanggal 08 sampai dengan 12 Maret 2024, dan melihat kondisi dinamika atmosfer terkini maka Stasiun Meteorologi kelas II El Tari mengupdate Press Release terbaru. Berdasarkan Analisa Dinamika Atmosfer dan laut, terpantau adanya bibit Siklon Tropis 91S di samudera Hindia bagian Tenggara barat daya Propinsi Banten. Potensi Bibit Siklon Tropis 91S menjadi Siklon Tropis dalam 24 jam kedepan pada kategori sedang dan menjadi wilayah monitoring Tropical Cyclone Warning Centre (TCWS) Australia. Terdapat area terindikasi Bibit Siklon Tropis (Suspec Area) di wilayah selatan NTT dan Bibit Siklon Tropis 93P di Teluk Carpentaria sekitar utara Australia yang bergerak kearah timur tenggara sehingga membentuk daerah perlambatan, pertemuan dan belokan angin. Kondisi ini mengakibatkan meningkatnya intensitas curah hujan dan angin kencang di wilayah NTT. Potensi Bibit Siklon Tropis 93P menjadi Siklon Tropis dalam 24 jam kedepan pada kategori rendah, aktifnya gelombang Ekuatorial Rossby dan Fenomena Madden Julian Osellation (MJO) juga menyebabkan wilayah NTT berpotensi hujan sedang – lebat hingga ekstrim (curah hujan sedang – lebat hingga ektrim disertai petir dan angin kencang) yang terjadi di wilayah Propinsi NTT yang dapat mengakibatkan terjadinya Bencana Hidrometeorologi pada tanggal 13 sd. 18 Maret 2024 termasuk wilayah Kota Kupang.', 'Posko BPBD Kota Kupang', 'Penanganan Darurat telah dilakukan, dilanjutkan dengan Ferivikasi dan Validasi bagi Rumah terdampak Bencana sesuai Kategori Kerusakan untuk selanjutnya di Tindak lanjuti dengan Bantuan Stimulan Rumah, sedangkan Infrastruktur yang rusak akibat bencana di lakukan Koordinasi dengan Instansi Teknis.									', 'Pernyataan Bencana No. 05/BPBD.P36+P67/III/2024, Tgl. 9 Maret  2024 SK. Tanggap Darurat Bencana No. 64/KEP/HK/20244, Tgl. 9 Maret  2024 SK. Posko Tanggap Darurat Bencana No. 65/KEP/HK/20244, Tgl. 9 Maret  2024', 'Posko Bencana Tanggap  Darurat melakukan Penyaluran Bantuan untuk Korban Bencana dengan Rincian : 42 Paket Sandang, 51 Paket Perlengkapan Dapur, 42 Paket Family Kit, 42 Kg Gula Pasir, 27 Lembar Terpal dn 9 Karung Beras.									 Sumbangan Pihak Ketiga yakni dari LLHBP Muhamadiyah Kupang berupa Beras 20 Karung @ 5 Kg dan langsung didistribusi pada Korban terdampak Bencana	', '5Q1B2G5a0yAtUlb0BvHa.jpg', 'Oebufu', '53 71 104 20240309 1', 'Rp394.271.800,00', 'BPBD Kota Kupang : 50 Orang (untuk semua Klaster) Satpol PP : 5 Orang Dinsos : 6 Orang PMI : 1 Orang DPRKP : 6 Orang PUPR  : 2 Orang Dinkes : 2 Orang  TNI : 5 Orang POLRi : 5 Orang Diskominfo : 1 Orang Inspektorat : 3 Orang ', 'Tidak ada', '42 Paket Sandang, 51 Paket Perlengkapan Dapur, 42 Paket Family Kit, 42 Kg Gula Pasir, 27 Lembar Terpal dan 29 Karung Beras.', 'Mobil Angkutan Logistik, Alat Sensor, Sepatu Booth, Mantel hujan, Mobil Tangki Air', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '2', '0', '0', '0', '2', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', ' 32.856.000,00', '0', '0', '0', '0', '0', '0', '0', '2', '7', '112', '0', ' 106.050.000,00 ', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'Sepatu Booth, Mobil Tangki Air, Sensor, Mobil Angkut Logistik, Mantel\r\n');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelurahan`
--

CREATE TABLE `kelurahan` (
  `id_kelu` int(11) NOT NULL,
  `kelurahan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kelurahan`
--

INSERT INTO `kelurahan` (`id_kelu`, `kelurahan`) VALUES
(1, 'Alak'),
(2, 'Batuplat'),
(3, 'Fatufeto'),
(4, 'Mantasi'),
(5, 'Manulai II'),
(6, 'Manutapen'),
(7, 'Naioni'),
(8, 'Namosain'),
(9, 'Nunbaun Delha'),
(10, 'Nunbaun Sabu'),
(11, 'Nunhila'),
(12, 'Penkase Oeleta'),
(13, 'Kelapa Lima'),
(14, 'Lasiana'),
(15, 'Oesapa'),
(16, 'Oesapa Barat'),
(17, 'Oesapa Selatan'),
(18, 'Airnona'),
(19, 'Bakunase'),
(20, 'Bakunase II'),
(21, 'Fontein'),
(22, 'Kuanino'),
(23, 'Naikoten I'),
(24, 'Naikoten II'),
(25, 'Nunleu'),
(26, 'Air Mata'),
(27, 'Bonipoi'),
(28, 'Fatubesi'),
(29, 'Lai-lai Bisi Kopan'),
(30, 'Merdeka'),
(31, 'Nefonaek'),
(32, 'Oeba'),
(33, 'Pasir Panjang'),
(34, 'Solor'),
(35, 'Tode Kisar'),
(36, 'Belo'),
(37, 'Fatukoa'),
(38, 'Kolhua'),
(39, 'Maulafa'),
(40, 'Naikolan'),
(41, 'Naimata'),
(42, 'Oepura'),
(43, 'Penfui'),
(44, 'Sikumana'),
(45, 'Fatululi'),
(46, 'Kayu Putih'),
(47, 'Liliba'),
(48, 'Oebobo'),
(49, 'Oebufu'),
(50, 'Oetete'),
(51, 'Tuak Daun Merah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `stakeholder`
--

CREATE TABLE `stakeholder` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `stakeholder`
--

INSERT INTO `stakeholder` (`id`, `username`, `password`) VALUES
(1, 'stakeholder', '$2y$10$fOgyGZZdHcLKBx/52iddD.g998KyEL2eMldK2UZaRYH1FYPaMs65O');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$VrJ2LU8NH4WD40Wzx0QDAO8wy4/.uCuwoTZpJ2WOP0Dp6Byw7x3DO');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bencana`
--
ALTER TABLE `bencana`
  ADD PRIMARY KEY (`id_bcn`),
  ADD KEY `id_bcn` (`id_bcn`);

--
-- Indeks untuk tabel `cuaca`
--
ALTER TABLE `cuaca`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kejadian`
--
ALTER TABLE `kejadian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nama` (`nama`),
  ADD KEY `jenis_kejadian` (`jenis_id`),
  ADD KEY `id` (`id`),
  ADD KEY `id_2` (`id`);

--
-- Indeks untuk tabel `kelurahan`
--
ALTER TABLE `kelurahan`
  ADD PRIMARY KEY (`id_kelu`),
  ADD KEY `id_kelu` (`id_kelu`);

--
-- Indeks untuk tabel `stakeholder`
--
ALTER TABLE `stakeholder`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bencana`
--
ALTER TABLE `bencana`
  MODIFY `id_bcn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT untuk tabel `cuaca`
--
ALTER TABLE `cuaca`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `galeri`
--
ALTER TABLE `galeri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `jenis`
--
ALTER TABLE `jenis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `kejadian`
--
ALTER TABLE `kejadian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT untuk tabel `kelurahan`
--
ALTER TABLE `kelurahan`
  MODIFY `id_kelu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT untuk tabel `stakeholder`
--
ALTER TABLE `stakeholder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=400;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
