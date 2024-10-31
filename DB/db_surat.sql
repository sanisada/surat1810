-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2024 at 10:40 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `surat_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `beritaacara`
--

CREATE TABLE `beritaacara` (
  `Nomor` INT  NOT NULL,
  `Tanggal` date NOT NULL,
  `Alamat` varchar(255) NOT NULL,
  `Ringkasan_Isi` varchar(255) NOT NULL,
  `No_Berita_Acara` varchar(255) NOT NULL,
  `Keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `beritaacara`
--

INSERT INTO `beritaacara` (`Nomor`, `Tanggal`, `Alamat`, `Ringkasan_Isi`, `No_Berita_Acara`, `Keterangan`) VALUES
(1, '2024-01-17', '', 'BA Pemusnahan Persediaan', 'BA-001/18100/PL.810/2024', ''),
(2, '2024-01-17', '', 'BA Pemusnahan BMN', 'BA-002/18100/PL.810/2024', ''),
(3, '2024-01-18', '', 'BERITA ACARA PEMANTAUAN PERIODIK', 'BA-003/18100/PW.160/2024', 'Wasdal'),
(8, '2024-05-16', '', 'BA PEMERIKSAAN DAN PENILAIAN TIM PENILAI ARSIP DOKUMEN BEKAS SURVEI ', 'BA-008/18100/KA.500/2024', '');

-- --------------------------------------------------------

--
-- Table structure for table `kodeklasifikasifasilitatif`
--

CREATE TABLE `kodeklasifikasifasilitatif` (
  `Nomor` int(11) NOT NULL,
  `Kode` varchar(255) NOT NULL,
  `Subkode` varchar(255) NOT NULL,
  `Klasifikasi` varchar(255) NOT NULL,
  `Subklasifikasi` varchar(255) NOT NULL,
  `Sub_subklasifikasi` varchar(255) NOT NULL,
  `Keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kodeklasifikasifasilitatif`
--

INSERT INTO `kodeklasifikasifasilitatif` (`Nomor`, `Kode`, `Subkode`, `Klasifikasi`, `Subklasifikasi`, `Sub_subklasifikasi`, `Keterangan`) VALUES
(1, 'KU','000', '', '', '', '000 PELAKSANAAN ANGGARAN'),
(2, 'KU','000', '010', '', '', '010 Ketentuan/Peraturan Menteri Keuangan Menyangkut Pelaksanaan dan Penatausahaan.'),
(3, 'KU', '100', '', '', '', '100 REALISASI PENDAPATAN / PENERIMAAN NEGARA'),
(4, 'KU', '100', '110', '', '', '110 Surat Setoran Pajak (SSP).'),
(5, 'KU', '100', '120', '', '', '120 Surat Setoran Bukan Pajak (SSBP).'),
(6, 'KU', '100', '130', '', '', '130 Bukti Penerimaan Bukan Pajak (PNBP).'),
(7, 'KU', '100', '140', '', '', '140 Dana Bagi Hasil yang bersumber dari Pajak:'),
(8, 'KU', '100', '140', '141', '', '141 Pajak Bumi Bangunan.'),
(9, 'KU', '100', '140', '142', '', '142 Bea Perolehan Hak Atas Tanah dan Bangunan (BPHTB).'),
(10, 'KU', '100', '140', '143', '', '143 Pajak Penghasilan (Pph) Pasal 21, 25 dan 29.'),
(11, 'KU', '100', '150', '', '', '150 Bukti Setor Sisa Anggaran Lebih atau Bukti Setor Pengembalian Belanja (SSPB).'),
(12, 'KU', '100', '160', '', '', '160 Bunga dan/ atau Jasa Giro pada Bank.'),
(13, 'KU', '100', '170', '', '', '170 Piutang Negara.'),
(14, 'KU', '100', '180', '', '', '180 Pengelolaan Investasi dan Penyertaan Modal.'),
(15, 'KU', '200', '', '', '', '200 PENGELOLAAN PERBENDAHARAAN'),
(16, 'KU', '200', '210', '', '', '210 Pejabat Penguji dan Penandatanganan SPM.'),
(17, 'KU', '200', '220', '', '', '220 Bendahara Penerimaan.'),
(18, 'KU', '200', '230', '', '', '230 Bendahara Pengeluaran.'),
(19, 'KU', '200', '240', '', '', '240 Kartu Pengawasan Pembayaran Penghasilan Pegawai (KP4).'),
(20, 'KU', '200', '250', '', '', '250 Pengembalian Belanja.'),
(21, 'KU', '200', '260', '', '', '260 Pembukuan Anggaran:'),
(22, 'KU', '200', '260', '261', '', '261 Buku Kas Umum (BKU).'),
(23, 'KU', '200', '260', '262', '', '262 Buku Kas Pembantu.'),
(24, 'KU', '200', '260', '263', '', '263 Kartu Realisasi Anggaran dan Pengawasan Realisasi Anggaran.'),
(25, 'KU', '200', '270', '', '', '270 Berita Acara Pemeriksanaan Kas.'),
(26, 'KU', '200', '280', '', '', '280 Daftar Gaji/ Kartu Gaji.'),
(27, 'KU', '300', '', '', '', '300 PENGELUARAN ANGGARAN'),
(28, 'KU', '300', '', '', '', '300 Naskah-naskah yang berkaitan dengan pelaksanaan anggaran pengeluaran mulai dari SPP-GU, SPP-UP,SPP-TUP, SPM, SP2D, Juklak mekanisme pengelolaan APBN serta bahan nota keuangan'),
(29, 'KU', '300', '310', '', '', '310 Belanja Bahan.'),
(30, 'KU', '300', '320', '', '', '320 Belanja Barang.'),
(31, 'KU', '300', '330', '', '', '330 Belanja Jasa (Konsultan, Profesi).'),
(32, 'KU', '300', '340', '', '', '340 Belanja Perjalanan.'),
(33, 'KU', '300', '350', '', '', '350 Belanja Pegawai.'),
(34, 'KU', '300', '360', '', '', '360 Belanja Paket Meeting Dalam Kota.'),
(35, 'KU', '300', '370', '', '', '370 Belanja Paket Meeting Luar Kota.'),
(36, 'KU', '300', '380', '', '', '380 Belanja Akun Kombinasi.'),
(37, 'KU', '400', '', '', '', '400 VERIFIKASI ANGGARAN'),
(38, 'KU', '400', '410', '', '', '410 Surat Permintaan Pembayaran (SPP) beserta lampirannya.'),
(39, 'KU', '400', '420', '', '', '420 Surat Perintah Membayar (SPM), Surat perintah Pencairan dana (SP2D).'),
(40, 'KU', '500', '', '', '', '500 PELAPORAN'),
(41, 'KU', '500', '510', '', '', '510 Akuntansi Keuangan:'),
(42, 'KU', '500', '510', '511', '', '511 Berita Acara Pemeriksaan Kas'),
(43, 'KU', '500', '510', '512', '', '512 Kas/Register Penutupan Kas.'),
(44, 'KU', '500', '510', '513', '', '513 Laporan Pendapatan Negara.'),
(45, 'KU', '500', '510', '514', '', '514 Arsip Data Komputer (ADK).'),
(46, 'KU', '500', '520', '', '', '520 Pengumpulan, Pemantauan, Evaluasi dan Laporan Keuangan:'),
(47, 'KU', '500', '520', '521', '', '521 Keadaan Kredit Anggaran (LKKA) Bulanan/ Triwulanan / Semesteran'),
(48, 'KU', '500', '520', '521', '521a', '521 a. Laporan Realisasi Anggaran (RKA);'),
(49, 'KU', '500', '520', '521', '521b', '512 b. Neraca;'),
(50, 'KU', '500', '520', '521', '521c', '521 c. Laporan Arus Kas;'),
(51, 'KU', '500', '520', '521', '521d', '521 d. Catatan Atas Laporan Keuangan (CALK)'),
(52, 'KU', '500', '530', '', '', '530 Rekonsiliasi Data Laporan Keuangan.'),
(53, 'KU', '600', '', '', '', '600 BANTUAN PINJAMAN LUAR NEGERI'),
(54, 'KU', '600', '610', '', '', '610 Permohonan Pinjaman Luar Negeri (Blue Book).'),
(55, 'KU', '600', '620', '', '', '620 Dokumen Kesanggupan negara donor (Gray Book).'),
(56, 'KU', '600', '630', '', '', '630 Memorandum of Understand (MOU) dan dokumen sejenisnya.'),
(57, 'KU', '600', '640', '', '', '640 Loan Agreement Pinjaman/Hibah Luar Negeri (PHLN), konsultan.'),
(58, 'KU', '600', '650', '', '', '650 Alokasi dan Relokasi Penggunaan Dana Pinjaman/Hibah Luar Negeri.'),
(59, 'KU', '600', '660', '', '', '660 Penarikan Dana Bantuan Luar Negeri (BLN).'),
(60, 'KU', '600', '660', '661', '', '661 Aplikasi Penarikan Dana Bantuan Luar Negeri (BLN) berikut lampirannya:'),
(61, 'KU', '600', '660', '661', '661a', '661 a. Reimbursment;'),
(62, 'KU', '600', '660', '661', '661b', '661 b. Direct Payment/ Transfer Procedure;'),
(63, 'KU', '600', '660', '661', '661c', '661 c. Special Comitment/L/C Opening;'),
(64, 'KU', '600', '660', '661', '661d', '661 d. Special Account/Imprest Fund.'),
(65, 'KU', '600', '660', '662', '', '662 Otorisasi Penarikan Dana (Payment Advice).'),
(66, 'KU', '600', '660', '663', '', '663 Replenisment (permintaan penarikan dana dari negara donor) meliputi:'),
(67, 'KU', '600', '660', '663', '663a', '663 a. No Objection Letter (NOL);'),
(68, 'KU', '600', '660', '663', '663b', '663 b. Notification of Contract;'),
(69, 'KU', '600', '660', '663', '663c', '663 c. Withdrawal Authorization (WA);'),
(70, 'KU', '600', '660', '663', '663d', '663 d. Statement of Expenditur (SE).'),
(71, 'KU', '600', '670', '', '', '670 Realisasi Pencairan Dana Bantuan Luar Negeri:'),
(72, 'KU', '600', '670', '670', '670a', '670 a. Surat Perintah Pencairan Dana (SP2D)'),
(73, 'KU', '600', '670', '670', '670b', '670 b. SPM beserta lampirannya: SPP, Kontrak, BA dan data pendukung lainnya.'),
(74, 'KU', '600', '680', '', '', '680 Ketentuan/ Peraturan yang Menyangkut Bantuan/ Pinjaman Luar Negeri.'),
(75, 'KU', '600', '690', '', '', '690 Laporan-Laporan Pelaksanaan Bantuan/ Pinjaman Luar Negeri.'),
(76, 'KU', '600', '690', '691', '', '691 Staff Appraisal Report.'),
(77, 'KU', '600', '690', '692', '', '692 Report/ Laporan yang terdiri dari:'),
(78, 'KU', '600', '690', '692', '692a', '692 a. Progress Report;'),
(79, 'KU', '600', '690', '692', '692b', '692 b. Monthly Report;'),
(80, 'KU', '600', '690', '692', '692c', '692 c. Quartely Report.'),
(81, 'KU', '600', '690', '693', '', '693 Laporan Hutang Negara:'),
(82, 'KU', '600', '690', '693', '693a', '693 a. Laporan Pembayaran Hutang Negara;'),
(83, 'KU', '600', '690', '693', '693b', '693 b. Laporan Posisi Hutang Negara.'),
(84, 'KU', '600', '690', '694', '', '694 Completion Report/Annual Report.'),
(85, 'KU', '700', '', '', '', '700 PENGELOLA APBN / DANA PINJAMAN / HIBAH LUAR NEGERI (PHLN)'),
(86, 'KU', '700', '710', '', '', '710 Keputusan Kepala BPS tentang Penetapan:'),
(87, 'KU', '700', '711', '', '', '711 Kuasa Pengguna Anggaran (KPA), Pejabat Pembuat Komitmen (PPK);'),
(88, 'KU', '700', '712', '', '', '712 Pejabat Pembuat Daftar Gaji ;'),
(89, 'KU', '700', '713', '', '', '713 Penandatangan SPM*'),
(90, 'KU', '700', '714', '', '', '714 Bendahara Penerimaan/ Pengeluaran, Pengelola Barang.'),
(91, 'KU', '800', '', '', '', '800 SISTEM AKUNTANSI INSTANSI (SAI)'),
(92, 'KU', '800', '810', '', '', '810 Manual Implementasi Sistem Akuntansi Instansi (SAI).'),
(93, 'KU', '800', '820', '', '', '820 Arsip Data Komputer dan Berita Acara Rekonsiliasi.'),
(94, 'KU', '800', '830', '830', '830a', '830 a. Daftar Transaksi (DT) Pengeluaran (PK) Penerimaan (PN).'),
(95, 'KU', '800', '830', '830', '830b', '830 b. b. Dokumen Sumber (DS), Bukti Jurnal (BJ) Surat Tanda Setor (STS).'),
(96, 'KU', '800', '830', '830', '830c', '830 c. Surat Setor Bukan Pajak (SSBP), Surat Perintah Pencairan Dana (SP2D).'),
(97, 'KU', '800', '830', '830', '830d', '830 d. SPM dalam Daftar Ringkasan Pengembalian dan Potongan dari Pengeluaran (SPDR).'),
(98, 'KU', '800', '840', '', '', '840 Listing (Daftar Rekaman Penerimaan) Buku Temuan dan Tindakan Lain (SAI).'),
(99, 'KU', '800', '850', '', '', '850 Laporan Realisasi Bulanan SAI.'),
(100, 'KU', '800', '860', '', '', '860 Laporan Realisasi Triwulanan SAI dari Unit Akuntansi Wilayah (UAW) dan Gabungan semua UAW/ Unit Akuntansi Kantor Pusat Instansi (UAKPI).'),
(101, 'KU', '900', '', '', '', '900 PERTANGGUNGJAWABAN KEUANGAN NEGARA'),
(102, 'KU', '900', '910', '', '', '910 Laporan Hasil Pemeriksaan atas Laporan Keuangan oleh BPK RI.'),
(103, 'KU', '900', '920', '', '', '920 Hasil Pengawasan dan Pemeriksaan Internal.'),
(104, 'KU', '900', '930', '', '', '930 Laporan Aparat Pemeriksa Fungsional:'),
(105, 'KU', '900', '930', '931', '', '931 Laporan Hasil Pemeriksaan (LHP).'),
(106, 'KU', '900', '930', '932', '', '932 Memorandum Hasil Pemeriksaaan (MHP).'),
(107, 'KU', '900', '930', '933', '', '933 Tindak Lanjut/Tanggapan LHP.'),
(108, 'KU', '900', '940', '', '', '940 Dokumentasi Penyelesaian Keuangan Negara:'),
(109, 'KU', '900', '940', '941', '', '941 Tuntutan Perbendaharaan.'),
(110, 'KU', '900', '940', '942', '', '942 Tuntutan Ganti Rugi.'),
(111, 'KP', '', '', '', '', 'KP KEPEGAWAIAN'),
(112, 'KP','000', '', '', '', '000 FORMASI PEGAWAI'),
(113, 'KP','000', '010', '', '', '010 Usulan dari Unit Kerja.'),
(114, 'KP','000', '020', '', '', '020 Usulan Permintaan Formasi kepada Menpan dan Kepala BKN.'),
(115, 'KP','000', '030', '', '', '030 Persetujuan Menpan.'),
(116, 'KP','000', '040', '', '', '040 Penetapan Formasi.'),
(117, 'KP','000', '050', '', '', '050 Penetapan Formasi Khusus.'),
(118, 'KP', '100', '', '', '', '100 PENGADAAN DAN PENGANGKATAN PEGAWAI'),
(119, 'KP', '100', '110', '', '', '110 Proses Penerimaan Pegawai:'),
(120, 'KP', '100', '110', '111', '', '111 Pengumuman.'),
(121, 'KP', '100', '110', '112', '', '112 Seleksi Administrasi.'),
(122, 'KP', '100', '110', '113', '', '113 Pemanggilan Peserta Tes.'),
(123, 'KP', '100', '110', '114', '', '114 Pelaksanaan Ujian (tertulis, psikotes, wawancara).'),
(124, 'KP', '100', '110', '115', '', '115 Keputusan Hasil Ujian.'),
(125, 'KP', '100', '120', '', '', '120 Penetapan Pengumuman Kelulusan.'),
(126, 'KP', '100', '130', '', '', '130 Berkas Lamaran yang Tidak Diterima.'),
(127, 'KP', '100', '140', '', '', '140 Nota Usul dan Kelengkapan Penetapan NIP.'),
(128, 'KP', '100', '150', '', '', '150 Nota Usul Pengangkatan CPNS menjadi PNS.'),
(129, 'KP', '100', '160', '', '', '160 Nota Usul Pengangkatan CPNS menjadi PNS Lebih 2 Tahun.'),
(130, 'KP', '100', '170', '', '', '170 SK CPNS/PNS Kolektif.'),
(131, 'KP', '200', '', '', '', '200 BERKAS PEGAWAI TIDAK TETAP/MITRA STATISTIK'),
(132, 'KP', '300', '', '', '', '300 PEMBINAAN KARIR PEGAWAI'),
(133, 'KP', '300', '310', '', '', '310 Diklat Kursus/Tugas Belajar/Ujian Dinas/lzin Belajar Pegawai:'),
(134, 'KP', '300', '310', '311', '', '311 Surat Perintah/Surat Tugas/ SK/ Surat Izin.'),
(135, 'KP', '300', '310', '312', '', '312 Laporan Kegiatan Pengembangan Diri.'),
(136, 'KP', '300', '310', '313', '', '313 Surat Tanda Tamat Pendidikan dan Pelatihan.'),
(137, 'KP', '300', '320', '', '', '320 Ujian Kompetensi'),
(138, 'KP', '300', '320', '321', '', '321 Assesment Tes Pegawai.'),
(139, 'KP', '300', '320', '322', '', '322 Pemetaan/Mapping Talent Pegawai.'),
(140, 'KP', '300', '330', '', '', '330 Daftar Penilaian Pelaksanaan Pekerjaan (DP3) dan Sasaran Kinerja Pegawai (SKP).'),
(141, 'KP', '300', '340', '', '', '340 Pakta Integritas Pegawai.'),
(142, 'KP', '300', '350', '', '', '350 Laporan Hasil Kekayaan Penyelenggaraan Negara (LHKPN).'),
(143, 'KP', '300', '360', '', '', '360 Daftar Usul Penetapan Angka Kredit Fungsional.'),
(144, 'KP', '300', '370', '', '', '370 Disiplin Pegawai:'),
(145, 'KP', '300', '370', '371', '', '371 Daftar Hadir.'),
(146, 'KP', '300', '370', '372', '', '372 Rekapitulasi Daftar Hadir.'),
(147, 'KP', '300', '380', '', '', '380 Berkas Hukuman Disiplin.'),
(148, 'KP', '300', '390', '', '', '390 Penghargaan dan Tanda Jasa (Satya Lencana/Bintang Jasa).'),
(149, 'KP', '400', '', '', '', '400 PENYELESAIAN PENGELOLAAN KEBERATAN PEGAWAI'),
(150, 'KP', '500', '', '', '', '500 MUTASI PEGAWAI'),
(151, 'KP', '500', '510', '', '', '510 Alih Status, Diperbantukan, Dipekerjakan, Penugasan Sementara, Mutasi Antar Perwakilan, Mutasi ke dan dari perwakilan Sementara, Mutasi Antar Unit.'),
(152, 'KP', '500', '520', '', '', '520 Nota Persetujuan/Pertimbangan Kepala BKN.'),
(153, 'KP', '500', '530', '', '', '530 Mutasi Keluarga:'),
(154, 'KP', '500', '530', '531', '', '531 Surat Izin Pernikahan/ Perceraian.'),
(155, 'KP', '500', '530', '532', '', '532 Surat Penolakan Izin Pernikahan/Perceraian.'),
(156, 'KP', '500', '530', '533', '', '533 Akte Nikah/ Cerai.'),
(157, 'KP', '500', '530', '534', '', '534 Surat Keterangan Meninggal Dunia.'),
(158, 'KP', '500', '540', '', '', '540 Usul Kenaikan Pangkat/Golongan/Jabatan.'),
(159, 'KP', '500', '550', '', '', '550 Usul Pengangkatan dan Pemberhentian dalam Jabatan Struktural/ Fungsional.'),
(160, 'KP', '500', '560', '', '', '560 Usul Penetapan Perubahan Data Dasar/ Status/ Kedudukan Hukum Pegawai.'),
(161, 'KP', '500', '570', '', '', '570 Peninjauan Masa Kerja.'),
(162, 'KP', '500', '580', '', '', '580 Berkas Baperjakat.'),
(163, 'KP', '600', '', '', '', '600 ADMINISTRASI PEGAWAI'),
(164, 'KP', '600', '610', '', '', '610 Dokumentasi Identitas Pegawai:'),
(165, 'KP', '600', '610', '611', '', '611 Usul Penetapan Karpeg/KPE/Karis/Karsu.'),
(166, 'KP', '600', '610', '612', '', '612 Keanggotaaan Organisasi Profesi/ Kedinasan.'),
(167, 'KP', '600', '610', '613', '', '613 Laporan Pajak Penghasilan Pribadi (LP2P).'),
(168, 'KP', '600', '610', '614', '', '614 Keterangan Penerimaan Penghasilan Pegawai (KP4).'),
(169, 'KP', '600', '620', '', '', '620 Berkas Kepegawaian dan Daftar Urut Kepangkatan (DUK)'),
(170, 'KP', '600', '630', '', '', '630 Berkas Perorangan Pegawai Negeri Sipil:'),
(171, 'KP', '600', '630', '630', '630a', '630 a. Nota Penetapan NIP dan kelengkapannya;'),
(172, 'KP', '600', '630', '630', '630b', '630 b. Nota Persetujuan/Pertimbangan Kepala BKN;'),
(173, 'KP', '600', '630', '630', '630c', '630 c. SK Pengangkatan CPNS*'),
(174, 'KP', '600', '630', '630', '630d', '630 d. Hasil Pengujian Kesehatan;'),
(175, 'KP', '600', '630', '630', '630e', '630 e. SK Pengangkatan PNS;'),
(176, 'KP', '600', '630', '630', '630f', '630 f. SK Peninjauan Masa Kerja;'),
(177, 'KP', '600', '630', '630', '630g', '630 g. SK Kenaikan Pangkat;'),
(178, 'KP', '600', '630', '630', '630h', '630 h. Surat Pernyataan Melaksanakan Tugas /Menduduki Jabatan/ Surat Pernyataan Pelantikan;'),
(179, 'KP', '600', '630', '630', '630i', '630 i. SK Pengangkatan Dalam atau Pemberhentian Dari Jabatan Struktural/Fungsional;'),
(180, 'KP', '600', '630', '630', '630j', '630 j. SK Perpindahan Wilayah Kerja;'),
(181, 'KP', '600', '630', '630', '630k', '630 k. SK Perpindahan Antar Instansi;'),
(182, 'KP', '600', '630', '630', '6301', '630 1. SK Cuti di Luar Tanggungan Negara (CLTN);'),
(183, 'KP', '600', '630', '630', '630m', '630 m. Berita Acara Pemeriksaan;'),
(184, 'KP', '600', '630', '630', '630n', '630 n. SK Hukuman Jabatan/Hukuman Disiplin PNS;'),
(185, 'KP', '600', '630', '630', '630o', '630 o. SK Perbantuan/Dipekerjakan Diluar Instansi Induk;'),
(186, 'KP', '600', '630', '630', '630p', '630 p. SK Penarikan Kembali dan Perbantuan/Dipekerjakan;'),
(187, 'KP', '600', '630', '630', '630q', '630 q. SK Pemberian Uang Tunggu; '),
(188, 'KP', '600', '630', '630', '630r', '630 r. SK Pembebasan Dari Jabatan Organik Karena Diangkat Sebagai Pejabat Negara;'),
(189, 'KP', '600', '630', '630', '630s', '630 s. SK Pengalihan PNS;'),
(190, 'KP', '600', '630', '630', '630t', '630 t. SK Pemberhentian Sebagai PNS;'),
(191, 'KP', '600', '630', '630', '630u', '630 u. SK Pemberhentian Sementara;'),
(192, 'KP', '600', '630', '630', '630v', '630 v. Surat Keterangan Pernyataan Hilang;'),
(193, 'KP', '600', '630', '630', '630w', '630 w. Surat Keterangan Kembalinya PNS Yang Dinyatakan Hilang;'),
(194, 'KP', '600', '630', '630', '630x', '630 x. SK Penggantian Nama;'),
(195, 'KP', '600', '630', '630', '630y', '630 y. Surat Perbaikan Tanggal Tahun Kelahiran;'),
(196, 'KP', '600', '630', '630', '630z', '630 z. Akta Nikah/ Cerai;'),
(197, 'KP', '600', '630', '630', '630aa', '630 aa. Akta Kelahiran;'),
(198, 'KP', '600', '630', '630', '630bb', '630 bb. Isian Formulir PUPNS;'),
(199, 'KP', '600', '630', '630', '630cc', '630 cc. Berita Acara Pengambilan Sumpah/Janji PNS dari Jabatan;'),
(200, 'KP', '600', '630', '630', '630dd', '630 dd. Surat Permohonan Menjadi Anggota Parpol;'),
(201, 'KP', '600', '630', '630', '630ee', '630 ee. Surat Keterangan Mutasi Keluarga;'),
(202, 'KP', '600', '630', '630', '630ff', '630 ff. Surat Keterangan Meninggal Dunia;'),
(203, 'KP', '600', '630', '630', '630gg', '630 gg. Surat Keterangan Peningkatan Pendidikan;'),
(204, 'KP', '600', '630', '630', '630hh', '630 hh. Penetapan Angka Kredit Jabatan Fungsional;'),
(205, 'KP', '600', '630', '630', '630ii', '630 ii. Surat Keterangan Hasil Penelitian Khusus;'),
(206, 'KP', '600', '630', '630', '630jj', '630 jj. Surat Pemberitahuan Kenaikan Gaji Berkala;'),
(207, 'KP', '600', '630', '630', '630kk', '630 kk. Surat Tugas/lzin Belajar Dalam/Luar Negeri;'),
(208, 'KP', '600', '630', '630', '630ll', '630 ll. Surat Izin Bepergian ke Luar Negeri;'),
(209, 'KP', '600', '630', '630', '630mm', '630 mm. Kartu Pendaftaran Ulang (Kardaf) PNS;'),
(210, 'KP', '600', '630', '630', '630nn', '630 nn. Ijasah/ Sertifikat;'),
(211, 'KP', '600', '630', '630', '63000', '630 00. SK Penempatan/ Penarikan Pegawai;'),
(212, 'KP', '600', '630', '630', '630pp', '630 pp. SK Pengangkatan Pada Jabatan Diluar Instansi Induk;'),
(213, 'KP', '600', '630', '630', '630qq', '630 qq. Surat Pertimbangan Status TNI;'),
(214, 'KP', '600', '630', '630', '630rr', '630 rr. SK Pengaktifan Kembali Sebagai PNS;'),
(215, 'KP', '600', '630', '630', '630ss', '630 ss. Surat Pernyataan Pengunduran Diri Dari Jabatan Organik Karena Dicalonkan Sebagai Kepala/Wakil Kepala Daerah.'),
(216, 'KP', '600', '640', '', '', '640 Berkas Perseorangan Pejabat Negara:'),
(217, 'KP', '600', '640', '641', '', '641 Kepala BPS;'),
(218, 'KP', '600', '640', '642', '', '642 Pejabat Negara Lain yang ditentukan oleh Undang-Undang;'),
(219, 'KP', '600', '650', '', '', '650 Surat Perintah Dinas/ Surat Tugas.'),
(220, 'KP', '600', '660', '', '', '660 Berkas Cuti Pegawai:'),
(221, 'KP', '600', '660', '661', '', '661 Cuti Sakit.'),
(222, 'KP', '600', '660', '662', '', '662 Cuti Bersalin.'),
(223, 'KP', '600', '660', '663', '', '663 Cuti Tahunan.'),
(224, 'KP', '600', '660', '664', '', '664 Cuti Alasan Penting.'),
(225, 'KP', '600', '660', '665', '', '665 Cuti Luar Tanggungan Negara (CTLN).'),
(226, 'KP', '700', '', '', '', '700 KESEJAHTERAAN PEGAWAI'),
(227, 'KP', '700', '710', '', '', '710 Berkas Tentang Layanan Tunjangan/ Gaji.'),
(228, 'KP', '700', '720', '', '', '720 Berkas Tentang Layanan Pemeliharaan Kesehatan Pegawai.'),
(229, 'KP', '700', '730', '', '', '730 Berkas Tentang Layanan Asuransi Pegawai.'),
(230, 'KP', '700', '740', '', '', '740 Berkas Tentang Layanan Bantuan Sosial.'),
(231, 'KP', '700', '750', '', '', '750 Berkas Tentang Layanan Olahraga Dan Rekreasi.'),
(232, 'KP', '700', '760', '', '', '760 Berkas Tentang Layanan Pengurusan Jenasah.'),
(233, 'KP', '700', '770', '', '', '770 Berkas Tentang Layanan Organisasi Non Kedinasan (Korpri, Dharma Wanita, Koperasi).'),
(234, 'KP', '800', '', '', '', '800 PEMBERHENTIAN PEGAWAI TANPA HAK PENSIUN'),
(235, 'KP', '900', '', '', '', '900 USUL PEMBERHENTIAN DAN PENETAPAN PENSIUN PEGAWAI/JANDA/DUDA & PNS YANG TEWAS'),
(236, 'PR', '', '', '', '', 'PR PERENCANAAN'),
(237, 'PR','000', '', '', '', '000 POKOK-POKOK KEBIJAKAN DAN STRATEGI PEMBANGUNAN'),
(238, 'PR','000', '010', '', '', '010 Pengumpulan Data.'),
(239, 'PR','000', '020', '', '', '020 Rencana Pembangunan Jangka Panjang (RPJP).'),
(240, 'PR','000', '030', '', '', '030 Rencana Pembangunan Jangka Panjang (RPJP).'),
(241, 'PR','000', '040', '', '', '040 Rencana Kerja Pemerintah (RKP).'),
(242, 'PR','000', '050', '', '', '050 Penyelenggaraan Musyawarah Perencanaan Pembangunan (Musrenbang).'),
(243, 'PR', '100', '', '', '', 'PENYUSUNAN RENCANA'),
(244, 'PR', '100', '110', '', '', '110 Rencana Kegiatan Teknis.'),
(245, 'PR', '100', '120', '', '', '120 Rencana Kegiatan Non Teknis.'),
(246, 'PR', '100', '130', '', '', '130 Keterpaduan Rencana Teknis dan Non teknis.'),
(247, 'PR', '200', '', '', '', 'PROGRAM KERJA TAHUNAN'),
(248, 'PR', '200', '210', '', '', '210 Usulan Unit Kerja beserta data pendukungnya.'),
(249, 'PR', '200', '220', '', '', '220 Program Kerja Tahunan Unit Kerja.'),
(250, 'PR', '200', '230', '', '', '230 Program Kerja Tahunan Instansi/Lembaga.'),
(251, 'PR', '300', '', '', '', 'RENCANA ANGGARAN PENDAPATAN DAN BELANJA NEGARA (RAPBN)'),
(252, 'PR', '300', '310', '', '', '310 Penyusunan RAPBN'),
(253, 'PR', '300', '310', '311', '', '311 Arah kebijakan Umum, Strategi, Prioritas dan Renstra:'),
(254, 'PR', '300', '310', '311', '311a', '311 a. Rencana Kerja;'),
(255, 'PR', '300', '310', '311', '311b', '311 b. Rencana Kerja Pemerintah.'),
(256, 'PR', '300', '310', '312', '', '312 Rencana Kerja dan Anggaran Kementrian/ Lembaga (RKAKL).'),
(257, 'PR', '300', '310', '313', '', '313 Rencana Satuan Anggaran Per Satuan Kerja (SAPSK), Satuan Rincian Alokasi Anggaran (SRAA).'),
(258, 'PR', '300', '320', '', '', '320 Penyampaian APBN kepada DPR RI'),
(259, 'PR', '300', '320', '321','', '321 Nota Keuangan pemerintah dan Rancangan Undang-Undang RAPBN:'),
(260, 'PR', '300', '320', '321', '321a', '321 a. Nota Keuangan Pemerintah;'),
(261, 'PR', '300', '320', '321', '321b', '321 b. Materi RAPBN dari Lembaga Negara dan Badan Pemerintah (RASKIP).'),
(262, 'PR', '300', '320', '322', '', '322 Pembahasan RAPBN oleh Komisi DPR RI.'),
(263, 'PR', '300', '320', '323', '', '323 Risalah Rapat Dengar Pendapat dengan DPR RI.'),
(264, 'PR', '300', '320', '324', '', '324 Nota Jawaban DPR RI.'),
(265, 'PR', '300', '330', '', '', '330 Undang-Undang Anggaran pendapatan dan Belanja Negara (APBN) dan Rencana Pembangunan Tahunan (REPETA).'),
(266, 'PR', '400', '', '', '', 'PENYUSUNAN ANGGARAN PENDAPATAN NEGARA (APBN)'),
(267, 'PR', '400', '410', '', '', '410 Ketetapan Pagu Indikatif/ Pagu Sementara.'),
(268, 'PR', '400', '420', '', '', '420 Ketetapan Pagu Definitif.'),
(269, 'PR', '400', '430', '', '', '430 Rencana Kerja Anggaran (RKA) Lembaga Negara dan Badan Pernerintah (LNBP).'),
(270, 'PR', '400', '440', '', '', '440 Daftar Isian Pelaksanaan Anggaran (DIPA) dan Revisinya.'),
(271, 'PR', '400', '450', '', '', '450 Petunjuk Operasional Kegiatan (POK) dan Revisinya.'),
(272, 'PR', '400', '460', '', '', '460 Petunjuk Teknis Tata Laksana Keterpaduan Kegiatan dan Pengelolaan Anggaran.'),
(273, 'PR', '400', '470', '', '', '470 Target Penerimaan Negara Bukan Pajak.'),
(274, 'PR', '500', '', '', '', 'PENYUSUNAN STANDAR HARGA MONITORING PROGRAM'),
(275, 'PR', '500', '510', '', '', '510 Pedoman Pengumpulan dan Pengolahan Data Standar Harga.'),
(276, 'PR', '500', '520', '', '', '520 Pedoman Teknis Monitoring Program dan Kegiatan.'),
(277, 'PR', '500', '530', '', '', '530 Pedoman Teknis Evaluasi dan Pelaporan Program.'),
(278, 'PR', '600', '', '', '', 'LAPORAN'),
(279, 'PR', '600', '610', '', '', '610 Laporan Khusus.'),
(280, 'PR', '600', '610', '611', '', '611 Pemantauan Prioritas.'),
(281, 'PR', '600', '610', '612', '', '612 Laporan Pelaksanaan Kegiatan Atas Permintaan Eksternal.'),
(282, 'PR', '600', '610', '613', '', '613 Laporan Atas Pelaksanaan Kegiatan/ Program Tertentu .'),
(283, 'PR', '600', '610', '614', '', '614 Rapat Dengar Pendapat dengan DPR RI.'),
(284, 'PR', '600', '620', '', '', '620 Laporan Progress Report.'),
(285, 'PR', '600', '630', '', '', '630 Laporan Akuntabilitas Kinerja Instansi Pemerintah (LAKIP).'),
(286, 'PR', '600', '640', '', '', '640 Laporan Berkala (harian, triwulanan, semesteran, tahunan).'),
(287, 'PR', '700', '', '', '', 'EVALUASI PROGRAM'),
(288, 'PR', '700', '710', '', '', '710 Evaluasi Program Unit Kerja.'),
(289, 'PR', '700', '720', '', '', '720 Evaluasi Program Lembaga/lnstansi.'),
(290, 'HK', '', '', '', '', 'HK HUKUM'),
(291, 'HK','000', '', '', '', 'PROGRAM LEGISLASI'),
(292, 'HK','000', '010', '', '', '010 Bahan/Materi Program Legislasi Nasional dan Instansi.'),
(293, 'HK','000', '020', '', '', '020 Program Legislasi Lembaga/lnstansi.'),
(294, 'HK', '100', '', '', '', 'PERATURAN PIMPINAN LEMBAGA/INSTANSI'),
(295, 'HK', '100', '100', '', '', 'Termasuk rancangan awal sampai dengan rancangan akhir dan telaah hukum.'),
(296, 'HK', '100', '110', '', '', '110 Peraturan Kepala BPS.'),
(297, 'HK', '200', '', '', '', 'KEPUTUSAN /KETETAPAN PIMPINAN LEMBAGA/INSTANSI Termasuk rancangan awal sampai dengan rancangan akhir dan telaah hukum.'),
(298, 'HK', '300', '', '', '', 'INSTRUKSI SURAT EDARAN'),
(299, 'HK', '300', '300', '', '', 'Termasuk rancangan awal sampai dengan rancangan akhir dan telaah hukum.'),
(300, 'HK', '300', '310', '', '', '310 Instruksi/ Surat Edaran Kepala BPS.'),
(301, 'HK', '300', '320', '', '', '320 Instruksi/ Surat Edaran Pejabat Tinggi Madya dan Pejabat Tinggi Pratama.'),
(302, 'HK', '400', '', '', '', 'SURAT PERINTAH'),
(303, 'HK', '400', '410', '', '', '410 Surat Perintah Kepala BPS.'),
(304, 'HK', '400', '420', '', '', '420 Surat Perintah Pejabat Madya.'),
(305, 'HK', '400', '430', '', '', '430 Surat Perintah Pejabat Pratama.'),
(306, 'HK', '500', '', '', '', 'PEDOMAN'),
(307, 'HK', '500', '', '', '', 'Standar/ Pedoman/ Prosedur Kerja/ Petunjuk Pelaksanaan/ Petunjuk Teknis yang Bersifat Nasional/Regional/Instansional termasuk rancangan awal sampai dengan rancangan akhir.'),
(308, 'HK', '600', '', '', '', 'NOTA KESEPAHAMAN'),
(309, 'HK', '600', '610', '', '', '610 Dalam Negeri.'),
(310, 'HK', '600', '620', '', '', '620 Luar Negeri.'),
(311, 'HK', '700', '', '', '', 'DOKUMENTASI HUKUM'),
(312, 'HK', '700', '', '', '', 'Undang-undang Peraturan Pemerintah, Keputusan Presiden dan peraturan-peraturan lain di luar produk hukum BPS yang dijadikan referensi.'),
(313, 'HK', '800', '', '', '', 'SOSIALISASI/ PENYULUHAN / PEMBINAAN HIJKUM'),
(314, 'HK', '800', '810', '', '', '810 Berkas yang berhubungan dengan kegiatan sosialisasi atau penyuluhan hukum'),
(315, 'HK', '800', '820', '', '', '820 Laporan hasil pelaksanaan sosialisasi penyuluhan hukum'),
(316, 'HK', '900', '', '', '', 'BANTUAN KONSULTASI HUKUM/ADVOKASI'),
(317, 'HK', '900', '', '', '', 'Berkas tentang pemberian bantuan/konsultasi hukum (Pidana, dan Agama).'),
(318, 'HK', '1000', '', '', '', 'KASUS/SENGKETA HUKUM'),
(319, 'HK', '1000', '1010', '', '', '1010 Pidana'),
(320, 'HK', '1000', '1010', '', '', '1010 Berkas tentang kasus/ sengketa pidana, baik kejahatan maupun pelanggaran:'),
(321, 'HK', '1000', '1010', '1011', '', '1011 Proses verbal mulai dari penyelidikan, penyidikan sampai dengan vonis.'),
(322, 'HK', '1000', '1010', '1012', '', '1012 Berkas pembelaan dan bantuan hukum'),
(323, 'HK', '1000', '1010', '1013', '', '1013 Telaah hukum dan opini hukum.'),
(324, 'HK', '1000', '1020', '', '', '1020 Perdata'),
(325, 'HK', '1000', '1020', '1021', '', '1021 Proses gugatan sampai dengan putusan.'),
(326, 'HK', '1000', '1020', '1022', '', '1022 Berkas pembelaan dan bantuan hukum.'),
(327, 'HK', '1000', '1020', '1023', '', '1023 Telaah hukum dan opini hukum'),
(328, 'HK', '1000', '1030', '', '', '1030 Tata Usaha Negara'),
(329, 'HK', '1000', '1030', '1031', '', '1031 Proses gugatan sampai dengan putusan.'),
(330, 'HK', '1000', '1030', '1032', '', '1032 Berkas pembelaan dan bantuan hukum.'),
(331, 'HK', '1000', '1030', '1033', '', '1033 Telaah hukum dan opini hukum.'),
(332, 'HK', '1000', '1040', '', '', '1040 Arbitrase'),
(333, 'HK', '1000', '1040', '1041', '', '1041 Proses gugatan sampai dengan putusan.'),
(334, 'HK', '1000', '1040', '1042', '', '1042 Berkas pembelaan dan bantuan hukum'),
(335, 'HK', '1000', '1040', '1043', '', '1043 Telaah hukum dan opini hukum.'),
(336, 'OT', '', '', '', '', 'OT ORGANISASI DAN TATA LAKSANA'),
(337, 'OT','000', '', '', '', 'ORGANISASI'),
(338, 'OT','000', '', '', '', 'Meliputi hal-hal yang berkenaan dengan masalah bahan persipan dan penyusunan organisasi BPS dan unit kerja dibawahnya.'),
(339, 'OT','000', '010', '', '', '010 Pembentukan Organisasi.'),
(340, 'OT','000', '020', '', '', '020 Pengubahan Organisasi'),
(341, 'OT','000', '030', '', '', '030 Pembubaran Organisasi.'),
(342, 'OT','000', '040', '', '', '040 Evaluasi Kelembagaan:'),
(343, 'OT','000', '040', '', '', '040 Meliputi naskah-naskah yang berkaitan dengan penilaian dan penyempurnaan organisasi.'),
(344, 'OT','000', '050', '', '', '050 Uraian Jabatan:'),
(345, 'OT','000', '050', '', '', '050 Meliputi hal-hal yang berkenaan dengan masalah klasifikasi kepegawaian/pekerjaan Meliputi hal-hal yang berkenaan dengan masalah klasifikasi kepegawaian/pekerjaan, penelitian, jabatan dan analisa jabatan'),
(346, 'OT', '100', '', '', '', '100 TATA LAKSANA'),
(347, 'OT', '100', '110', '', '', '110 Standar Kompetensi Jabatan Struktural dan Fungsional.'),
(348, 'OT', '100', '110', '', '', '110 Meliputi hal-hal yang berkenaan dengan standar kompetensi jabatan struktural dan jabatan fungsional.'),
(349, 'OT', '100', '120', '', '', '120 Tata Hubungan Kerja:'),
(350, 'OT', '100', '120', '', '', '120 Meliputi hal-hal berkenaan dengan masalah penyusunan tata hubungan kerja baik intern maupun ekstern BPS'),
(351, 'OT', '100', '130', '', '', '130 Sistem dan Prosedur:'),
(352, 'OT', '100', '130', '', '', '130 Meliputi hal-hal berkenaan dengan masalah penelaahan tata cara dan metode kegiatan di bidang perstatistikan.'),
(353, 'HM', '', '', '', '', 'HM HUBUNGAN MASYARAKAT'),
(354, 'HM','000', '', '', '', 'KEPROTOKOLAN'),
(355, 'HM','000', '010', '', '', '010 Penyelenggaraan acara kedinasan (upacara, pelantikan, peresmian dan jamuan termasuk acara peringatan harihari besar).'),
(356, 'HM','000', '020', '', '', '020 Agenda kegiatan pimpinan .'),
(357, 'HM','000', '030', '', '', '030 Kunjungan dinas:'),
(358, 'HM','000', '030', '31', '', '031 Kunjungan dinas dalam dan luar negeri.'),
(359, 'HM','000', '030', '32', '', '032 Kunjungan dinas pimpinan lembaga/instansi.'),
(360, 'HM','000', '030', '33', '', '033 Kunjungan dinas pejabat lain/pegawai.'),
(361, 'HM','000', '040', '', '', '040 Buku tamu.'),
(362, 'HM','000', '050', '', '', '050 Daftar nama/alamat kantor/pejabat.'),
(363, 'HM', '100', '', '', '', '100 LIPUTAN MEDIA MASSA'),
(364, 'HM', '100', '100', '', '', '100 Liputan kegiatan dinas pimpinan acara kedinasan dan peristiwa-peristiwa bidang masing-masing yang diliput 200 oleh media massa (cetak dan elektronik).'),
(365, 'HM', '200', '', '', '', '200 PENYAJIAN INFORMASI KELEMBAGAAN'),
(366, 'HM', '200', '200', '', '', '200 Penyajian informasi kelembagaan, pengumpulan, pengolahan dan penyajian informasi kelembagaan.'),
(367, 'HM', '200', '210', '', '', '210 Kliping Koran.'),
(368, 'HM', '200', '220', '', '', '220 Penerbitan majalah, buletin, koran dan jurnal.'),
(369, 'HM', '200', '230', '', '', '230 Brosur/leaflet/ poster/plakat.'),
(370, 'HM', '200', '240', '', '', '240 Pengumuman/pemberitaan.'),
(371, 'HM', '300', '', '', '', '300 HUBUNGAN ANTAR LEMBAGA'),
(372, 'HM', '300', '310', '', '', '310 Hubungan antar lembaga pemerintah.'),
(373, 'HM', '300', '320', '', '', '320 Hubungan dengan organisasi sosial/LSM.'),
(374, 'HM', '300', '330', '', '', '330 Hubungan dengan perusahaan.'),
(375, 'HM', '300', '340', '', '', '340 Hubungan dengan perguruan tinggi/ sekolah: magang, Pendidikan Sistem Ganda, Praktek Kerja Lapangan (PKL).'),
(376, 'HM', '300', '350', '', '', '350 Forum Kehumasan (Bakohumas/ Perhumas).'),
(377, 'HM', '300', '360', '', '', '360 Hubungan dengan media massa:'),
(378, 'HM', '300', '360', '360', '360a', '360 a. Siaran pers/konferensi pers/pers release;'),
(379, 'HM', '300', '360', '360', '360b', '360 b. Kunjungan wartawan/peliputan;'),
(380, 'HM', '300', '360', '360', '360c', '360 c. Wawancara.'),
(381, 'HM', '400', '', '', '', '400 DENGAR PENDAPAT/HEARING DPR'),
(382, 'HM', '500', '', '', '', '500 PENYIAPAN BAHAN MATERI PIMPINAN'),
(383, 'HM', '600', '', '', '', '600 PUBLIKASI MELALUI MEDIA CETAK MAUPUN ELEKTRONIK'),
(384, 'HM', '700', '', '', '', '700 PAMERAN/SAYEMBARA/LOMBA/FESTIVAL, PEMBUATAN SPANDUK DAN IKLAN'),
(385, 'HM', '800', '', '', '', '800 PENGHARGAAN/KENANG-KENANGAN/CINDERA MATA'),
(386, 'HM', '900', '', '', '', '900 UCAPAN TERIMA KASIH, PERMOHONAN MAAF'),
(387, 'KA', '', '', '', '', 'KA KEARSIPAN'),
(388, 'KA','000', '', '', '', '000 PENCETAKAN'),
(389, 'KA','000', '010', '', '', '010 Penyiapan pembuatan buku kerja dan kalender BPS.'),
(390, 'KA','000', '020', '', '', '020 Penerimaan permintaan mencetak dan naskah yang akan dicetak.'),
(391, 'KA','000', '030', '', '', '030 Menyusun perencanaan cetak.'),
(392, 'KA','000', '040', '', '', '040 Pencetakan naskah, surat, dokumen secara digital dan risograph.'),
(393, 'KA', '100', '', '', '', '100 PENGURUSAN SURAT'),
(394, 'KA', '100', '110', '', '', '110 Surat Masuk/Surat Keluar.'),
(395, 'KA', '100', '120', '', '', '120 Penggunaan Aplikasi Surat Menyurat.'),
(396, 'KA', '200', '', '', '', '200 PENGELOLAAN ARSIP DINAMIS'),
(397, 'KA', '200', '210', '', '', '210 Penyusunan Sistem Arsip.'),
(398, 'KA', '200', '220', '', '', '220 Penciptaan dan Pemberkasan Arsip.'),
(399, 'KA', '200', '230', '', '', '230 Pengolahan Data Base menjadi Informasi.'),
(400, 'KA', '200', '240', '', '', '240 Alih Media.'),
(401, 'KA', '300', '', '', '', '300 PENYIMPANAN DAN PEMELIHARAAN ARSIP'),
(402, 'KA', '300', '310', '', '', '310 Daftar Arsip.'),
(403, 'KA', '300', '320', '', '', '320 Pemeliharaan Arsip dan Ruang Penyimpanan (seperti kegiatan fumigasi).'),
(404, 'KA', '300', '330', '', '', '330 Daftar Pencarian Arsip.'),
(405, 'KA', '300', '340', '', '', '340 Daftar Arsip Informasi Publik.'),
(406, 'KA', '300', '350', '', '', '350 Daftar Arsip Vital/Aset.'),
(407, 'KA', '300', '360', '', '', '360 Layanan Arsip (peminjam, pengguna arsip).'),
(408, 'KA', '300', '370', '', '', '370 Persetujuan Jadwal Retensi Arsip.'),
(409, 'KA', '400', '', '', '', '400 PEMINDAHAN ARSIP'),
(410, 'KA', '400', '410', '', '', '410 Pemindahan Arsip Inaktif.'),
(411, 'KA', '400', '420', '', '', '420 Daftar Arsip yang Dipindahkan.'),
(412, 'KA', '500', '', '', '', '500 PEMUSNAHAN ARSIP YANG TIDAK BERNILAI GUNA'),
(413, 'KA', '500', '510', '', '', '510 Berita Acara Pemusnahan.'),
(414, 'KA', '500', '520', '', '', '520 Daftar Arsip yang Dimusnahkan.'),
(415, 'KA', '500', '530', '', '', '530 Rekomendasi/Pertimbangan/Pemusnahan Arsip dari ANRI.'),
(416, 'KA', '500', '540', '', '', '540 Surat Keputusan Pemusnahan.'),
(417, 'KA', '600', '', '', '', '600 PENYERAHAN ARSIP STATIS'),
(418, 'KA', '600', '610', '', '', '610 Berita Acara Serah Terima Arsip.'),
(419, 'KA', '600', '620', '', '', '620 Daftar Arsip yang Diserahkan.'),
(420, 'KA', '700', '', '', '', '700 PEMBINAAN KEARSIPAN'),
(421, 'KA', '700', '710', '', '', '710 Pembinaan Arsiparis.'),
(422, 'KA', '700', '720', '', '', '720 Apresiasi/Sosialisasi/Penyuluhan Kearsipan, Diklat Profesi.'),
(423, 'KA', '700', '730', '', '', '730 Bimbingan Teknis'),
(424, 'KA', '700', '740', '', '', '740 Penilaian dan sertifikasi SDM kearsipan'),
(425, 'KA', '700', '750', '', '', '750 Supervisi dan Monitoring'),
(426, 'KA', '700', '760', '', '', '760 Penilaian dan Akreditasi Unit Kerja Kearsipan'),
(427, 'KA', '700', '770', '', '', '770 Implementasi Pengelolaan Arsip Elektronik'),
(428, 'KA', '700', '780', '', '', '780 Penghargaan Kearsipan'),
(429, 'KA', '700', '790', '', '', '790 Pengawasan Kearsipan'),
(430, 'RT', '', '', '', '', 'RT KERUMAHTANGGAAN'),
(431, 'RT','000', '', '', '', '000 TELEKOMUNIKASI'),
(432, 'RT','000', '', '', '', 'Adminitrasi penggunaan/langganan peralatan telekomunikasi meliputi: telepon, TV kabel dan internet'),
(433, 'RT', '100', '', '', '', '100 ADMINITRASI PENGGUNAAN FASILITAS KANTOR'),
(434, 'RT', '100', '100', '', '', 'Administrasi penggunaan fasilitas kantor meliputi permintaan dan penggunaan ruang, wisma rumah dinas, dan fasilitas kantor lainnya'),
(435, 'RT', '200', '', '', '', '200 PENGURUSAN KENDARAAN DINAS'),
(436, 'RT', '200', '210', '', '', '210 Pengurusan Surat Kendaraan Dinas.'),
(437, 'RT', '200', '220', '', '', '220 Pemeliharaan dan Perbaikan.'),
(438, 'RT', '200', '230', '', '', '230 Pengurusan Kehilangan dan Masalah Kendaraan.'),
(439, 'RT', '300', '', '', '', '300 PEMELIHARAAN GEDUNG DAN TAMAN'),
(440, 'RT', '300', '310', '', '', '310 Pertamanan/Lanscaping.'),
(441, 'RT', '300', '320', '', '', '320 Penghijauan.'),
(442, 'RT', '300', '330', '', '', '330 Perbaikan Gedung.'),
(443, 'RT', '300', '340', '', '', '340 Perbaikan Rumah Dinas/Wisma.'),
(444, 'RT', '300', '350', '', '', '350 Kebersihan Gedung dan Taman.'),
(445, 'RT', '400', '', '', '', '400 PENGELOLAAN JARINGAN LISTRIK, AIR, TELEPON DAN KOMPUTER'),
(446, 'RT', '400', '410', '', '', '410 Perbaikan/Pemeliharaan.'),
(447, 'RT', '400', '420', '', '', '420 Pemasangan.'),
(448, 'RT', '500', '', '', '', '500 KETERTIBAN DAN KEAMANAN'),
(449, 'RT', '500', '510', '', '', '510 Pengamanan, dan rumah dinas:'),
(450, 'RT', '500', '510', '511', '', '511 Daftar Nama Satuan Pengamanan.'),
(451, 'RT', '500', '510', '512', '', '512 Daftar Jaga/Daftar Piket.'),
(452, 'RT', '500', '510', '513', '', '513 Surat Ijin Keluar Masuk Orang atau Barang.'),
(453, 'RT', '500', '520', '', '', '520 Laporan Ketertiban dan Keamanan:'),
(454, 'RT', '500', '520', '521', '', '521 Kehilangan, gangguan.'),
(455, 'RT', '600', '', '', '', '600 ADMINISTRASI PENGELOLAAN PARKIR'),
(456, 'PL', '', '', '', '', 'PL PERLENGKAPAN'),
(457, 'PL','000', '', '', '', '000 Rencana Kebutuhan Barang dan Jasa'),
(458, 'PL','000', '010', '', '', '010 Usulan Unit Kerja'),
(459, 'PL','000', '020', '', '', '020 Rencana Kebutuhan lembaga Pusat/Daerah'),
(460, 'PL', '100', '', '', '', '100 Berkas Perkenalan'),
(461, 'PL', '200', '', '', '', '200 Pengadaan Barang'),
(462, 'PL', '200', '210', '', '', '210 Pengadaan/pembelian barang tidak melalui lelang (pengadaan langsung)'),
(463, 'PL', '200', '210', '', '', '210 Usulan unit kerja'),
(464, 'PL', '200', '210', '', '', '210 Proses pengadaan barang        '),
(465, 'PL', '200', '210', '', '', '210 Serah terima barang'),
(466, 'PL', '200', '220', '', '', '220 Pengadaan/pembelian barang melalui lelang'),
(467, 'PL', '200', '220', '', '', '220 Umum'),
(468, 'PL', '200', '220', '', '', '220 Terbatas'),
(469, 'PL', '200', '220', '', '', '220 Pemilihan Langsung'),
(470, 'PL', '200', '220', '', '', '220 Serah terima barang'),
(471, 'PL', '200', '230', '', '', '230 Perolehan barang melalui bantuan/hibah'),
(472, 'PL', '200', '240', '', '', '240 Pengadaan barang melalui tukar menukar'),
(473, 'PL', '200', '250', '', '', '250 Pemanfaatan barang melalui pinjam pakai'),
(474, 'PL', '200', '260', '', '', '260 Pemanfaatan barang melalui sewa'),
(475, 'PL', '200', '270', '', '', '270 Pemanfaatan barang melalui kerjasama pemanfaatan'),
(476, 'PL', '200', '280', '', '', '280 Pemanfaatan barang melalui bangun serah guna/bangun serah guna'),
(477, 'PL', '300', '', '', '', '300 Pengadaan Jasa\nBerkas pengadaan jasa oleh pihak ketiga terdiri dari berkas penawaran sampai dengan kontrak perjanjian'),
(478, 'PL', '400', '', '', '', '400 Laporan kemajuan pelaksanaan belanja modal'),
(479, 'PL', '500', '', '', '', '500 INVENTARISASI'),
(480, 'PL', '500', '510', '', '', '510 Inventarisasi Ruangan/Gedung/Bangunan.'),
(481, 'PL', '500', '510', '510', '011', '011 Daftar Inventaris Ruangan (DIR)'),
(482, 'PL', '500', '510', '510', '012', '012 Buku Inventaris/Pembantu Inventaris Ruangan'),
(483, 'PL', '500', '520', '', '', '520 Inventarisasi Barang.'),
(484, 'PL', '500', '520', '520', '021', '021 Daftar Opname Fisik Barang Inventaris (DOFBI)'),
(485, 'PL', '500', '520', '520', '022', '022 Daftar Inventaris Barang (DIB)'),
(486, 'PL', '500', '520', '520', '023', '023 Daftar Kartu Inventaris Barang'),
(487, 'PL', '500', '520', '520', '024', '024 Buku Inventaris/Pembantu Inventaris Barang'),
(488, 'PL', '500', '530', '', '', '530 Penyusunan Laporan Tahunan Inventaris BMN'),
(489, 'PL', '500', '540', '', '', '540 Sensus BMN'),
(490, 'PL', '600', '', '', '', '600 PENYIMPANAN'),
(491, 'PL', '600', '610', '', '', '610 Penatausahaan Penyimpanan Barang/Publikasi :'),
(492, 'PL', '600', '610', '611', '', '611 Tanda terima/surat pengantar/surat pengiriman barang'),
(493, 'PL', '600', '610', '612', '', '612 Surat Pernyataan harga dan mutu barang'),
(494, 'PL', '600', '610', '613', '', '613 Berita Acara serah terima barang hasil pengadaan'),
(495, 'PL', '600', '610', '614', '', '614 Buku Penerimaan'),
(496, 'PL', '600', '610', '615', '', '615 Buku Persediaan barang/kartu stock barang'),
(497, 'PL', '600', '610', '616', '', '616 Kartu barang/kartu gudang'),
(498, 'PL', '600', '620', '', '', '620 Penyusunan Laporan persedian barang'),
(499, 'PL', '700', '', '', '', '700 PENYALURAN'),
(500, 'PL', '700', '710', '', '', '710 Penatausahaan penyaluran barang/publikasi'),
(501, 'PL', '700', '710', '711', '', '711 Surat Permintaan dari unit kerja/ formulir permintaan'),
(502, 'PL', '700', '710', '712', '', '712 Surat Perintah Mengeluarkan Barang (SPMB)'),
(503, 'PL', '700', '710', '713', '', '713 Surat Perintah Mengeluarkan barang Inventaris'),
(504, 'PL', '700', '710', '714', '', '714 Berita Acara Serah terima Distribusi Barang'),
(505, 'PL', '800', '', '', '', '800 PENGHAPUSAN BMN'),
(506, 'PL', '800', '810', '', '', '810 Penghapusan Barang Bergerak/Barang Inventaris Kantor'),
(507, 'PL', '800', '810', '', '', '810 Nota usulan penghapusan'),
(508, 'PL', '800', '810', '', '', '810 Surat pembentukan panitia penghapusan'),
(509, 'PL', '800', '810', '', '', '810 Berita Acara pemeriksaan/penelitian barang yang akan dihapus'),
(510, 'PL', '800', '810', '', '', '810 Surat Izin/keputusan penghapusan barang'),
(511, 'PL', '800', '810', '', '', '810 Surat Keputusan Panitia Lelang'),
(512, 'PL', '800', '810', '', '', '810 Risalah lelang'),
(513, 'PL', '800', '810', '', '', '810 Berita Acara dan laporan Tindak Lanjut Penghapusan'),
(514, 'PL', '900', '', '', '', '900 BUKTI-BUKTI KEPEMILIKAN DAN KELENGKAPAN BMN'),
(515, 'PL', '900', '900', '900', '900a', 'a. Master Plan Bangunan'),
(516, 'PL', '900', '900', '900', '900b', 'b. Sertifikat Tanah'),
(517, 'PL', '900', '900', '900', '900c', 'c. Ijin Mendirikan Bangunan (IMB)'),
(518, 'PL', '900', '900', '900', '900d', 'd. Bukti Kepemilikan Kendaraan Bermotor (BPKB)'),
(519, 'PL', '900', '900', '900', '900e', 'e. Surat Tanda Nomor Kendaraan (STNK)'),
(520, 'PL', '900', '900', '900', '900f', 'f. Denah/Gambar bangunan/lnstalasi Listrik, Air dan Gas'),
(521, 'DL', '', '', '', '', 'DL PENDIDIKAN DAN LATIHAN'),
(522, 'DL','000', '', '', '', '000 PERENCANAAN DIKLAT'),
(523, 'DL','000', '10', '', '', '10 Analisa Kebutuhan Penyelenggaraan Diklat.'),
(524, 'DL','000', '20', '', '', '20 Sistem dan Metode.'),
(525, 'DL','000', '30', '', '', '30 Kurikulum.'),
(526, 'DL','000', '40', '', '', '40 Bahan Ajar/Modul.'),
(527, 'DL','000', '50', '', '', '50 Konsultasi Penyelenggaraan Diklat.'),
(528, 'DL', '100', '', '', '', '100 AKREDITASI LEMBAGA DIKLAT'),
(529, 'DL', '100', '110', '', '', '110 Surat Permohonan Akreditasi'),
(530, 'DL', '100', '120', '', '', '120 Laporan Hasil Verifikasi Lapangan'),
(531, 'DL', '100', '130', '', '', '130 Berita Acara Rapat Verifikasi'),
(532, 'DL', '100', '140', '', '', '140 Berita Acara Rapat Tim Penilai'),
(533, 'DL', '100', '150', '', '', '150 Surat Keputusan Penetapan Akreditasi'),
(534, 'DL', '100', '160', '', '', '160 Sertifikat Akreditasi'),
(535, 'DL', '100', '170', '', '', '170 Laporan Akreditasi Lembaga Diklat'),
(536, 'DL', '200', '', '', '', '200 PENYELENGGARAAN DIKLAT'),
(537, 'DL', '200', '210', '', '', '210 Prajabatan.'),
(538, 'DL', '200', '220', '', '', '220 Kepemimpinan.'),
(539, 'DL', '200', '230', '', '', '230 Teknis'),
(540, 'DL', '200', '240', '', '', '240 Fungsional.'),
(541, 'DL', '200', '250', '', '', '250 Evaluasi Pasca Diklat.'),
(542, 'DL', '300', '', '', '', '300 SERTIFIKASI SUMBERDAYA MANUSIA KEDIKLATAN'),
(543, 'DL', '300', '300', '', '', '300 Naskah-naskah yang berkaitan dengan kegiatan sertifikasi sumberdaya kediklatan.'),
(544, 'DL', '400', '', '', '', '400 SISTEM INFORMASI DIKLAT'),
(545, 'DL', '400', '410', '', '', '410 Data Lembaga Diklat.'),
(546, 'DL', '400', '420', '', '', '420 Data Prasarana Diklat.'),
(547, 'DL', '400', '430', '', '', '430 Data Sarana Diklat.'),
(548, 'DL', '400', '440', '', '', '440 Data Pengelola Diklat.'),
(549, 'DL', '400', '450', '', '', '450 Data Penyelenggara Diklat.'),
(550, 'DL', '400', '460', '', '', '460 Data Widyaiswara.'),
(551, 'DL', '400', '470', '', '', '470 Data Program Diklat.'),
(552, 'DL', '500', '', '', '', '500 REGISTRASI SERTIFIKASI/STTPL Peserta Diklat'),
(553, 'DL', '500', '510', '', '', '510 Surat Permohonan Kode Registrasi.'),
(554, 'DL', '500', '520', '', '', '520 Buku Registrasi.'),
(555, 'DL', '500', '530', '', '', '530 Surat Penyampaian Kode Registrasi.'),
(556, 'DL', '600', '', '', '', '600 EVALUASI PENYELENGGARAAN DIKLAT'),
(557, 'DL', '600', '610', '', '', '610 Evaluasi Materi Penyelenggaraan.'),
(558, 'DL', '600', '620', '', '', '620 Evaluasi Pengajar/Instruktur/Fasilitator.'),
(559, 'DL', '600', '630', '', '', '630 Evaluasi Peserta.'),
(560, 'DL', '600', '640', '', '', '640 Evaluasi Sarana dan Prasarana.'),
(561, 'DL', '600', '650', '', '', '650 Evaluasi Alumni Peserta.'),
(562, 'DL', '600', '660', '', '', '660 Laporan Penyelenggaran.'),
(563, 'DL', '600', '670', '', '', '670 Evaluasi Alumni Diklat'),
(564, 'PK', '', '', '', '', 'PK KEPUSTAKAAN'),
(565, 'PK','000', '', '', '', '000 PENYIMPANAN DEPOSIT BAHAN PUSTAKA'),
(566, 'PK','000', '010', '', '', '010 Bukti Penerimaan Koleksi Bahan Pustaka Deposit.'),
(567, 'PK','000', '020', '', '', '020 Administrasi Pengolahan Deposit Bahan Pustaka.'),
(568, 'PK', '100', '', '', '', '100 PENGADAAN BAHAN PUSTAKA'),
(569, 'PK', '100', '110', '', '', '110 Buku Induk Koleksi.'),
(570, 'PK', '100', '120', '', '', '120 Daftar Buku Terseleksi.'),
(571, 'PK', '100', '130', '', '', '130 Daftar Buku Dalam Pemesanan.'),
(572, 'PK', '100', '140', '', '', '140 Daftar Buku Dalam Permintaan.'),
(573, 'PK', '200', '', '', '', '200 PENGOLAHAN BAHAN PUSTAKA'),
(574, 'PK', '200', '210', '', '', '210 Lembar Kerja Pengolahan Bahan Pustaka (buram, pengkatalogan).'),
(575, 'PK', '200', '220', '', '', '220 Shell List/Jajaran Kartu Utama (master list).'),
(576, 'PK', '200', '230', '', '', '230 Daftar Tambahan Buku (assesion list).'),
(577, 'PK', '200', '240', '', '', '240 Daftar/Jajaran Kendali (subjek dan pengarang).'),
(578, 'PK', '300', '', '', '', '300 LAYANAN JASA PERPUSTAKAAN DAN INFORMASI'),
(579, 'PK', '300', '310', '', '', '310 Data dan -28 statistic anggota, pengunjung dan peminjaman bahan pustaka.'),
(580, 'PK', '300', '320', '', '', '320 Pertanyaan, Rujukan dan Jawaban.'),
(581, 'PK', '400', '', '', '', '400 PRESERVASI BAHAN PUSTAKA'),
(582, 'PK', '400', '410', '', '', '410 Survei Kondisi Bahan Pustaka.'),
(583, 'PK', '400', '420', '', '', '420 Reprografi Bahan Pustaka.'),
(584, 'PK', '500', '', '', '', '500 PEMBINAAN PERPUSTAKAAN'),
(585, 'PK', '500', '510', '', '', '510 Bimbingan Teknis.'),
(586, 'PK', '500', '520', '', '', '520 Penyuluhan.'),
(587, 'PK', '500', '530', '', '', '530 Sosialisasi.'),
(588, 'IF', '', '', '', '', 'INFORMATIKA'),
(589, 'IF','000', '', '', '', '000 RENCANA STRATEGIS MASTERPLAN PEMBANGUNAN SISTEM INFORMASI'),
(590, 'IF', '100', '', '', '', '100 DOKUMENTASI ARSITEKTUR'),
(591, 'IF', '100', '110', '', '', '110 Sistem Informasi.'),
(592, 'IF', '100', '120', '', '', '120 Sistem Aplikasi.'),
(593, 'IF', '100', '130', '', '', '130 Infrastruktur.'),
(594, 'IF', '200', '', '', '', '200 PEREKAMAN DAN PEMUTAKHIRAN DATA'),
(595, 'IF', '200', '210', '', '', '210 Formulir Isian.'),
(596, 'IF', '200', '220', '', '', '220 Daftar Petugas Perekaman.'),
(597, 'IF', '200', '230', '', '', '230 Jadwal Pelaksanaan.'),
(598, 'IF', '200', '240', '', '', '240 Laporan Hasil Perekaman dan Pemutakhiran Data.'),
(599, 'IF', '300', '', '', '', '300 MIGRASI SISTEM APLIKASI DATA'),
(600, 'IF', '400', '', '', '', '400 DOKUMEN HOSTING'),
(601, 'IF', '400', '410', '', '', '410 Formulir Permintaan Hosting.'),
(602, 'IF', '400', '420', '', '', '420 Layanan Hasil Uji Kelayakan.'),
(603, 'IF', '400', '430', '', '', '430 Laporan Pelaksanaan Hosting.'),
(604, 'IF', '500', '', '', '', 'LAYANAN BACK-UP DATA DIGITAL'),
(605, 'PW', '', '', '', '', 'PW PENGAWASAN'),
(606, 'PW','000', '', '', '', '000 RENCANA PENGAWASAN'),
(607, 'PW','000', '010', '', '', '010 Rencana Strategis Pengawasan.'),
(608, 'PW','000', '020', '', '', '020 Rencana Kerja Tahunan.'),
(609, 'PW','000', '030', '', '', '030 Rencana Kinerja Tahunan.'),
(610, 'PW','000', '040', '', '', '040 Penetapan Kinerja Tahunan.'),
(611, 'PW','000', '050', '', '', '050 Rakor Pengawasan Tingkat Nasional.'),
(612, 'PW', '100', '', '', '', '100 PELAKSANAAN PENGAWASAN'),
(613, 'PW', '100', '110', '', '', '110 Naskah-naskah yang berkaitan dengan audit mulai dari surat penugasan sampai dengan surat menyurat.'),
(614, 'PW', '100', '120', '', '', '120 Laporan Hasil Audit (LHA), Laporan Akuntan (LA), Laporan Auditor Independent (LAI) yang memerlukan Tindak Lanjut (TL).'),
(615, 'PW', '100', '130', '', '', '130 Laporan Hasil Audit Investigasi (LHAI) yang mengandung unsur Tindak Pidana Korupsi (TPK) dan memerlukan tindak lanjut.'),
(616, 'PW', '100', '140', '', '', '140 Laporan Perkembangan Penanganan Surat Pengaduan Masyarakat.'),
(617, 'PW', '100', '150', '', '', '150 Laporan Pemutakhiran Data.'),
(618, 'PW', '100', '160', '', '', '160 Laporan Perkembangan BMN.'),
(619, 'PW', '100', '170', '', '', '170 Laporan kegiatan pendampingan penyusunan laporan keuangan dan Reviu Departmen/LPND.'),
(620, 'PW', '100', '180', '', '', '180 Good Corporate Governance (GCG).'),
(621, 'TS', '', '', '', '', 'TS TRANSFORMASI STATISTIK'),
(622, 'TS','000', '', '', '', '000 PENYUSUNAN RENCANA KEGIATAN BIDANG TRANSFORMASI STATISTIK (TOR)'),
(623, 'TS','000', '010', '', '', '010 Transformasi Proses Bisnis Statistik.'),
(624, 'TS','000', '020', '', '', '020 Transformasi TIK dan Komunikasi.'),
(625, 'TS','000', '030', '', '', '030 Transformasi Manajemen Sumberdaya Manusia dan Kelembagaan.'),
(626, 'TS', '100', '', '', '', '100 PENYUSUNAN BAHAN TERKAIT TRANSFORMASI STATISTIK'),
(627, 'TS', '100', '110', '', '', '110 Rencana Sarana dan Prasarana Transformasi Statistik.'),
(628, 'TS', '100', '120', '', '', '120 Statistical Busines Frame Work and Architecture (SBFA).'),
(629, 'TS', '100', '130', '', '', '130 Analysis Document.'),
(630, 'TS', '100', '140', '', '', '140 CSI.'),
(631, 'TS', '100', '150', '', '', '150 BPR.'),
(632, 'TS', '100', '160', '', '', '160 Sosialisasi, internalisasi, workshop terkait kegiatan transformasi.'),
(633, 'TS', '100', '170', '', '', '170 Deliverables.'),
(634, 'TS', '200', '', '', '', '200 MANAJEMEN PERUBAHAN'),
(635, 'TS', '200', '210', '', '', '210 Steering Committee (Dewan Pengarah).'),
(636, 'TS', '200', '220', '', '', '220 Change Agent.'),
(637, 'TS', '200', '230', '', '', '230 Change Leader.'),
(638, 'TS', '200', '240', '', '', '240 Change Champion.'),
(639, 'TS', '200', '250', '', '', '250 Working Group.'),
(640, 'TS', '200', '260', '', '', '260 Evaluasi dan Monitoring Perkembangan Program STATCAP CERDAS, Sensus Daring/CPOC.'),
(641, 'TS', '200', '270', '', '', '270 Sosialisasi, Kick of Meeting.'),
(642, 'TS', '300', '', '', '', '300 KETERPADUAN TRANSFORMASI'),
(643, 'TS', '300', '310', '', '', '310 Mendukung Implementasi Transformasi: CAPI SAKERNAS'),
(644, 'TS', '400', '', '', '', '400 LAPORAN TRANSFORMASI STATISTIK'),
(645, 'TS', '400', '410', '', '', '410 Laporan Kemajuan.'),
(646, 'TS', '400', '420', '', '', '420 Laporan Bulanan.'),
(647, 'TS', '400', '430', '', '', '430 Laporan Triwulanan.'),
(648, 'TS', '400', '440', '', '', '440 Laporan Tahunan.');

-- --------------------------------------------------------

--
-- Table structure for table `kodesurveisensus`
--

CREATE TABLE `kodesurveisensus` (
  `Nomor` int(11) NOT NULL,
  `Kode` varchar(255) NOT NULL,
  `Subkode` varchar(255) NOT NULL,
  `Klasifikasi` varchar(255) NOT NULL,
  `Subklasifikasi` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kodesurveisensus`
--

INSERT INTO `kodesurveisensus` (`Nomor`, `Kode`, `Subkode`, `Klasifikasi`, `Subklasifikasi`, `keterangan`) VALUES
(1, 'PS', '', '', '','PERUMUSAN KEBIJAKAN Dl BIDANG STATISTIK MELIPUTI:\nMETODOLOGI DAN INFORMASI STATISTIK, STATISTIK SOSIAL,\nSTATISTIK PRODUKSI, STATISTIK DISTRIBUSI DAN JASA, NERACA DAN ANALISA STATISTIK'), 
(2, 'PS', '000', '', '','000 Pengkajian dan Pengusulan Kebijakan'),
(3, 'PS', '100', '', '','100 Penyiapan Kebijakan'),
(4, 'PS', '200', '', '','200 Masukan dan Dukungan dalam Penyusunan Kebijakan'),
(5, 'PS', '300', '', '','300 Pengembangan desain dan standardisasi'),
(6, 'PS', '400', '', '','400 Penetapan Norma, Standar, Prosedur dan Kriteria (NSPK)'),
(7, 'SS', '', '', '','SENSUS PENDUDUK, SENSUS PERTANIAN DAN SENSUS EKONOMI'),
(8, 'SS', '000', '', '','000 PERENCANAAN'),
(9, 'SS', '000', '010', '',' 010 Master Plan dan Network planing'),
(10, 'SS', '000', '020', '',' 020 Perumusan dan Penyusunan Bahan'),
(11, 'SS', '000', '020', '021',' 021 Penyiapan bahan penyusunan rancangan sensus'),
(12, 'SS', '000', '020', '022',' 022 Penyusunan metode pencacahan sensus'),
(13, 'SS', '000', '020', '023',' 023 Penentuan volume sensus'),
(14, 'SS', '000', '020', '024',' 024 Penyusunan desain penarikan sampel'),
(15, 'SS', '000', '020', '025',' 025 Penyusunan Kerangka Sampel'),
(16, 'SS', '000', '030', '',' 030 Studi pendahuluan (desk study)'),
(17, 'SS', '100', '', '','100 PERSIAPAN KEGIATAN SENSUS'),
(18, 'SS', '100', '110', '',' 110 Penyusunan Rancangan Organisasi.'),
(19, 'SS', '100', '120', '',' 120 Penyusunan Kuesioner.'),
(20, 'SS', '100', '130', '',' 130 Penyusunan Konsep dan Definisi.'),
(21, 'SS', '100', '140', '',' 140 Penyusunan Metodologi (organisasi, lapangan, ukuran statistik).'),
(22, 'SS', '100', '150', '',' 150 Penyusunan Buku Pedoman (pencacahan, pengawasan dan pengolahan).'),
(23, 'SS', '100', '160', '',' 160 Penyusunan Peta Wilayah Kerja dan Muatan Peta Wilayah.'),
(24, 'SS', '100', '170', '',' 170 Penyusunan Pedoman Sosialisasi.'),
(25, 'SS', '100', '180', '',' 180 Penyusunan Program Pengolahan (rule validasi pemeriksaan entri tabulasi).'),
(26, 'SS', '100', '190', '',' 190 Koordinasi Intern/ Ektern.'),
(27, 'SS', '200', '', '','200 PELATIHAN /UJICOBA SENSUS'),
(28, 'SS', '200', '210', '',' 210 Pelatihan Instruktur.'),
(29, 'SS', '200', '220', '',' 220 Pelatihan Petugas.'),
(30, 'SS', '200', '230', '',' 230 Pelatihan Petugas Pengolahan.'),
(31, 'SS', '200', '240', '',' 240 Perancangan Tabel.'),
(32, 'SS', '200', '250', '',' 250 Pelaksanaan Ujicoba Kuesioner Sensus (meliputi reliabilitas kuesioner dan sistem pengolahan)'),
(33, 'SS', '200', '260', '',' 260 Pelaksanaan Ujicoba Kuesioner Metodologi Sensus (meliputi ujicoba pelaksanaan pencacahan, organisasi dan jumlah sampel).'),
(34, 'SS', '300', '', '','300 PELAKSANAAN LAPANGAN SENSUS'),
(35, 'SS', '300', '310', '',' 310 Listing.'),
(36, 'SS', '300', '320', '',' 320 Pemilihan Sampel.'),
(37, 'SS', '300', '330', '',' 330 Pengumpulan Data.'),
(38, 'SS', '300', '340', '',' 340 Pemeriksaan Data.'),
(39, 'SS', '300', '350', '',' 350 Pengawasan Lapangan.'),
(40, 'SS', '300', '360', '',' 360 Monitoring Kualitas.'),
(41, 'SS', '400', '', '','400 PENGOLAHAN SENSUS'),
(42, 'SS', '400', '410', '',' 410 Pengelolaan Dokumen (penerimaan/pengiriman, pengelompokkan/batching).'),
(43, 'SS', '400', '420', '',' 420 Pemeriksaan Dokumen dan Pengkodean (editing/coding).'),
(44, 'SS', '400', '430', '',' 430 Perekaman Data (entri/scanner).'),
(45, 'SS', '400', '440', '',' 440 Tabulasi Data.'),
(46, 'SS', '400', '450', '',' 450 Pemeriksaan Tabulasi.'),
(47, 'SS', '400', '460', '',' 460 Laporan Konsistensi Tabulasi.'),
(48, 'SS', '500', '', '','500 ANALISIS DAN PENYAJIAN HASIL SENSUS'),
(49, 'SS', '500', '510', '',' 510 Pembahasan Angka Hasil Pengolahan.'),
(50, 'SS', '500', '520', '',' 520 Penyusunan Angka Sementara.'),
(51, 'SS', '500', '530', '',' 530 Penyusunan Angka Tetap.'),
(52, 'SS', '500', '540', '',' 540 Penyusunan/Pembahasan Draft Publikasi.'),
(53, 'SS', '500', '550', '',' 550 Analisis Data Sensus.'),
(54, 'SS', '500', '560', '',' 560 Penyusunan Diseminasi Hasil Sensus'),
(55, 'SS', '600', '', '','600 DISEMINASI HASIL SENSUS'),
(56, 'SS', '600', '610', '',' 610 Penyusun bahan Diseminasi'),
(57, 'SS', '600', '610','610(1)',' 1) Leaflet, booklet'),
(58, 'SS', '600', '610','610(2)',' 2) Website'),
(59, 'SS', '600', '610','610(3)',' 3) Penyusunan CD dan sejenisnya'),
(60, 'SS', '600', '620', '',' 620 Sosialisasi hasil Sensus melalui berbagai Media'),
(61, 'SS', '600', '630', '',' 630 Layanan Promosi Statistik'),
(62, 'VS', '', '', '','SURVEI'),
(63, 'VS', '000', '', '','000 PERENCANAAN'),
(64, 'VS', '000', '010', '',' 010 Master Plan dan Network planing'),
(65, 'VS', '000', '020', '',' 020 Perumusan dan Penyusunan Bahan'),
(66, 'VS', '000', '020', '021',' 021 Penyiapan bahan penyusunan rancangan survei'),
(67, 'VS', '000', '020', '022',' 022 Penyusunan metode pencacahan survei'),
(68, 'VS', '000', '020', '023',' 023 Penentuan volume survei'),
(69, 'VS', '000', '020', '024',' 024 Penyusunan desain penarikan sampel'),
(70, 'VS', '000', '020', '025',' 025 Penyusunan Kerangka Sampel'),
(71, 'VS', '000', '030', '',' 030 Studi pendahuluan (desk study)'),
(72, 'VS', '100', '', '','100 PERSIAPAN SURVEI'),
(73, 'VS', '100', '110', '',' 110 Rancangan Organisasi.'),
(74, 'VS', '100', '120', '',' 120 Penyusunan Kuesioner.'),
(75, 'VS', '100', '130', '',' 130 Penyusunan Konsep dan Definisi.'),
(76, 'VS', '100', '140', '',' 140 Penyusunan Metodologi (organisasi, lapangan, ukuran statistik).'),
(77, 'VS', '100', '150', '',' 150 Penyusunan Buku Pedoman (pencacahan, pengawasan, pengolahan).'),
(78, 'VS', '100', '160', '',' 160 Penyusunan Peta Wilayah Kerja dan Muatan Peta Wilayah.'),
(79, 'VS', '100', '170', '',' 170 Penyusunan Pedoman Sosialisasi.'),
(80, 'VS', '100', '180', '',' 180 Penyusunan Program Pengolahan (rule validasi pemeriksaan entri tabulasi).'),
(81, 'VS', '100', '190', '',' 190 Koordinasi Intern/Ektern.'),
(82, 'VS', '200', '', '','200 PELATIHAN/UJICOBA'),
(83, 'VS', '200', '210', '',' 210 Pelatihan Instruktur.'),
(84, 'VS', '200', '220', '',' 220 Pelatihan Petugas.'),
(85, 'VS', '200', '230', '',' 230 Pelatihan Petugas Pengolahan.'),
(86, 'VS', '200', '240', '',' 240 Perancangan Tabel.'),
(87, 'VS', '200', '250', '',' 250 Pelaksanaan Ujicoba Kuesioner survei (meliputi reliabilitas kuesioner dan sistem pengolahan).'),
(88, 'VS', '200', '260', '',' 260 Pelaksanaan Ujicoba Kuesioner Metodologi survei (meliputi ujicoba pelaksanaan pencacahan, organisasi dan jumlah sampel).'),
(89, 'VS', '300', '', '','300 PELAKSANAAN LAPANGAN'),
(90, 'VS', '300', '310', '',' 310 Listing.'),
(91, 'VS', '300', '320', '',' 320 Pemilihan Sampel.'),
(92, 'VS', '300', '330', '',' 330 Pengumpulan Data.'),
(93, 'VS', '300', '340', '',' 340 Pemeriksaan Data.'),
(94, 'VS', '300', '350', '',' 350 Pengawasan Lapangan.'),
(95, 'VS', '300', '360', '',' 360 Monitoring Kualitas.'),
(96, 'VS', '400', '', '','400 PENGOLAHAN'),
(97, 'VS', '400', '410', '',' 410 Pengelolaan Dokumen (penerimaan/ pengiriman, pengelompokkan batching).'),
(98, 'VS', '400', '420', '',' 420 Pemeriksaan Dokumen dan Pengkodean (editing/coding).'),
(99, 'VS', '400', '430', '',' 430 Perekaman Data (entri/scanner).'),
(100, 'VS', '400', '440', '',' 440 Tabulasi Data.'),
(101, 'VS', '400', '450', '',' 450 Pemeriksaan Tabulasi.'),
(102, 'VS', '400', '460', '',' 460 Laporan Konsistensi Tabulasi.'),
(103, 'VS', '500', '', '','500 ANALISIS DAN PENYAJIAN HASIL SURVEI'),
(104, 'VS', '500', '510', '',' 510 Pembahasan Angka Hasil Pengolahan.'),
(105, 'VS', '500', '520', '',' 520 Penyusunan Angka Sementara.'),
(106, 'VS', '500', '530', '',' 530 Penyusunan Angka Proyeksi/Rarnalan.'),
(107, 'VS', '500', '540', '',' 540 Penyusunan Angka Tetap.'),
(108, 'VS', '500', '550', '',' 550 Penyusunan/Pembahasan Draft Publikasi.'),
(109, 'VS', '500', '560', '',' 560 Analisis Data Survei.'),
(110, 'VS', '500', '570', '',' 570 Penyusunan Diseminasi Hasil Survei.'),
(111, 'VS', '600', '', '','600 DISEMINASI HASIL SURVEI'),
(112, 'VS', '600', '610', '',' 610 Penyusun bahan Diseminasi'),
(113, 'VS', '600', '610','610(1)',' 1) Leaflet, booklet'),
(114, 'VS', '600', '610','610(2)',' 2) Website'),
(115, 'VS', '600', '610','610(3)',' 3) Penyusunan CD dan sejenisnya'),
(116, 'VS', '600', '620', '',' 620 Sosialisasi hasil Survei melalui berbagai Media'),
(117, 'VS', '600', '630', '',' 630 Layanan Promosi Statistik'),
(118, 'KS', '', '', '','KONSOLIDASI DATA STATISTIK'),
(119, 'KS', '000', '', '','000 KOMPILASI DATA'),
(120, 'KS', '100', '', '','100 ANALISIS DATA'),
(121, 'KS', '200', '', '','200 PENYUSUNAN PUBLIKASI EVALUASI DAN PELAPORAN SENSUS, SURVEI DAN KONSOLIDASI DATA'),
(122, 'ES', '', '', '','EVALUASI DAN PELAPORAN SENSUS, SURVEI DAN KONSOLIDASI DATA');

-- --------------------------------------------------------

--
-- Table structure for table `namatimkerja`
--

CREATE TABLE `namatimkerja` (
  `Nomor` int(11) NOT NULL,
  `Kode_Tim` varchar(255) NOT NULL,
  `Nama_Tim_Kerja` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `namatimkerja`
--

INSERT INTO `namatimkerja` (`Nomor`, `Kode_Tim`, `Nama_Tim_Kerja`) VALUES
(1, '18101', 'Tim Subbagian Umum '),
(2, '18102', 'Tim Statistik Sosial '),
(3, '18103', 'Tim Statistik Produksi '),
(4, '18104', ' Tim Statistik Distribusi  '),
(5, '18105', 'Tim Neraca Wilayah dan Analisis Statistik '),
(6, '18106', 'Tim Pengolahan dan IT'),
(7, '18106', 'Tim Diseminasi Statistik  '),
(8, '18100', ' Tim Reformasi Birokrasi dan Humas '),
(9, '18100', 'Tim Perencanaan dan Administrasi Keuangan '),
(10, '18100', 'Tim Pembinaan dan Pelaksanaan Statistik Sektoral');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_user` int(11) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `Email` varchar(255) NOT NULL,
  `Role` varchar(255) NOT NULL,
  `login_session_key` varchar(255) DEFAULT NULL,
  `email_status` varchar(255) DEFAULT NULL,
  `password_expire_date` datetime DEFAULT '2024-09-16 00:00:00',
  `password_reset_key` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_user`, `Username`, `Password`, `Email`, `login_session_key`, `email_status`, `password_expire_date`, `password_reset_key`) VALUES
(1, 'BPSPRINGSEWU', '$2y$10$Rj8BGcxtqUwYLF7d4EStFu5Npm.LfJ5MpVbELoZewDf7hUrul7taK', 'Bpspringsewu@gmail.com', NULL, NULL, '2024-09-16 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `suratkeluar`
--

CREATE TABLE `suratkeluar` (
  `id` int(11) NOT NULL,
  `Nomor` varchar(255) NOT NULL,
  `Tanggal_Surat` varchar(255) NOT NULL,
  `Tujuan_Surat` varchar(255) NOT NULL,
  `Nama_Pegawai` varchar(255) NOT NULL,
  `Nama_Tim_Kerja` varchar(255) NOT NULL,
  `Jenis_Kegiatan` varchar(255) NOT NULL,
  `Kode_Sensus` varchar(255) NOT NULL,
  `Subkode_Sensus` varchar(255) NOT NULL,
  `Bagian_Sensus` varchar(255) NOT NULL,
  `Kode_Klasifikasi` varchar(255) NOT NULL,
  `Subkode_Klasifikasi` varchar(255) NOT NULL,
  `Bagian_Klasifikasi` varchar(255) NOT NULL,
  `Nomor_Surat` varchar(255) NOT NULL,
  `Ringkasan_Isi_Surat` varchar(255) NOT NULL,
  `Keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `suratkeluar`
--

INSERT INTO `suratkeluar` (`id`, `Nomor`, `Tanggal_Surat`, `Tujuan_Surat`, `Nama_Pegawai`, `Nama_Tim_Kerja`, `Jenis_Kegiatan`, `Kode_Sensus`, `Subkode_Sensus`, `Bagian_Sensus`, `Kode_Klasifikasi`, `Subkode_Klasifikasi`, `Bagian_Klasifikasi`, `Nomor_Surat`, `Ringkasan_Isi_Surat`, `Keterangan`) VALUES
(1,'B-001','45323','bps provinsi','','18100','','','','','','','','B-001/18100/KP.630/01/2024','SPMT rifja',''),
(2,'B-002','45323','bps provinsi','','18100','','','','','','','','B-002/18100/KP.630/01/2024','SPMT ayu',''),
(3,'B-003','45323','bps provinsi','','18100','','','','','','','','B-003/18100/KP.630/01/2024','SPMT dini',''),
(4,'B-003.01','45323','Internal','','18100','','','','','','','','B-003.01/18100/PR.130/2024','Rapat Persiapan Kegiatan Tahun 2024',''),
(5,'B-003','45352','itera','','18100','','','','','','','','B-003/18100/KP.600/2024','balasan permohonan kerja praktik',''),
(6,'B-004','45352','Kepala dinas pertanian','','18101','','','','','','','','B-004/18101/VS.330/01/2024','Surat Pengantar SP lahan, palawija',''),
(7,'B-005.01','45352','keuangan','','18101','','','','','','','','B-005.01/18101/KP.300/01/2024','Surat usulan nama calon peserta PPSPM',''),
(8,'B-005','45413','ketua tim BPS Pringsewu','','18101','','','','','','','','B-005/18101/KP.600/01/2024','undangan capaian kinerja tw 4 tahun 2023',''),
(9,'B-006','45505','bps provinsi','','18103','','','','','','','','B-006/18103/VS.330/01/2024','usulan pergantian segmen ksa jagung',''),
(10,'B-007','45505','','','18101','','','','','','','','B-007/18101/PL.200/2024','Surat Keterangan Rusak berat peralatan dan mesin kantor',''),
(11,'B-008','45505','','','18101','','','','','','','','B-008/18101/PL.200/2024','Surat Keterangan Penghentian Penggunaan peralatan dan mesin kantor',''),
(12,'B-006','45505','Internal BPS Pringsewu','','18101','','','','','','','','B-006/18101/PR.200/2024','Rapat Reviu Target Renstra',''),
(13,'B-007','45536','Mitra Statistik','','18104','','','','','','','','B-007/18104/VS.220/01/2024','Undangan Pelatihan Petugas Survei Harga Produsen Sektor Industri Pengolahan dan Sektor Jasa (HP/HPJ) 2024','Dinny (distribusi)'),
(14,'B-008','45536','Mitra Statistik','','18104','','','','','','','','B-008/18104/VS.220/01/2024','Undangan Pelatihan Petugas Survei Harga Produsen Beras di Penggilingan (HPBG) 2024','Dinny (distribusi)'),
(15,'B-009','45536','Bappeda Kabupaten Pringsewu','','18106','','','','','','','','B-009/18106/KS.000/01/2024','Permohonan Penggunaan Kop Surat untuk Pengumpulan Data DDA 2024','Ayu (Diseminasi)'),
(16,'B-010','45566','Mitra Statistik','','18104','','','','','','','','B-010/18104/VS.410/01/2024','Pengiriman Dokumen dan Buku Pedoman Survei Harga Perdesaan','Arum (Distribusi)'),
(17,'B-011','45597','KPPN','','18100','','','','','','','','B-011/18100/KU.200/01/2024','Pengajuan UP','fitri'),
(18,'B-012','45597','KPPN','','18100','','','','','','','','B-012/18100/KU.200/01/2024','Pengajuan UP','fitri'),
(19,'B-013','45597','sekda pringsewu','','18100','','','','','','','','B-013/18100/KS.200/01/2024','Penyampaian data isian buku Laporan Penyelenggaraan Pemerintah Daerah (LPPD) Kabupaten Pringsewu Tahun 2023 di Tahun 2024','eko purnomo'),
(20,'B-014','45627','bps provinsi','','18101','','','','','','','','B-014/18101/KP.310/01/2024','Surat Pengantar Izin Belajar Eklesia','Singgih'),
(21,'B-015','45627','PLN Metro','','18106','','','','','','','','B-015/18106/KS.000/01/2024','Permintaan Data DDA 2024','Ayu (Pengolahan)'),
(22,'B-016','45627','bps provinsi','','18100','','','','','','','','B-016/18100/KP.540/01/2024','Usulan Kenaikan Pangkat An Singgih','Singgih'),
(23,'B-017','45627','Internal BPS Pringsewu','','18100','','','','','','','','B-017/18100/TS.240/01/2024','Undangan Pemilihan Change Ambassador 2024','Rifja'),
(24,'B-018','2024-01-15','Internal BPS Pringsewu','','18101','','','','','','','','B-018/18101/PR.200/2024','undangan Perjanjian Kinerja tahun 2024','singgih'),
(25,'B-018','2024-01-15','Dinas PU','','18101','','','','','','','','B-018/18101/VS.330/01/2024','permintaan data ke dinas satu pintu dan dinas PU','dewi(Produksi)'),
(26,'B-019','2024-01-15','mitra Statistik','','18101','','','','','','','','B-019/18101/VS.220/01/2024','undangan pelatihan KSA Padi, Jagung dan ubinan','dewi(Produksi)'),
(27,'B-020','2024-01-15','BPS provinsi','','18100','','','','','','','','B-020/18100/TS.240/01/2024','Berita Acara Hasil Pemilihan Change Ambassador','Rifja'),
(28,'B-021','2024-01-15','mitra Statistik & Organik','','18102','','','','','','','','B-021/18102/VS.200/01/2024','Pemanggilan peserta pelatihan petugas sakernas februari 2024','ires (Sosial)'),
(29,'B-022','2024-01-15','mitra Statistik & Organik','','18102','','','','','','','','B-022/18102/VS.200/01/2024','Pemanggilan peserta pelatihan petugas susenas maret dan seruti triwulan I 2024','ires (Sosial)'),
(30,'B-022','2024-01-16','Internal BPS Pringsewu','','18100','','','','','','','','B-022/18100/VS.200/01/2024','Penyelenggaraan SPIP 2024',''),
(31,'B-023','2024-01-17','kerjasama','','18102','','','','','','','','B-023/18102/KU.500/2024','Surat Pernyataan tidak ada kerjasama TW 4','singgih'),
(32,'B-024','2024-01-17','mitra Statistik & Organik','','18105','','','','','','','','B-024/18105/VS.190/01/2024','Briefing SKTNP 2024','Nisalasi (Nerwilis)'),
(33,'B-025','2024-01-17','KPKNL Bandar Lampung','','18101','','','','','','','','B-025/18101/PW.160/2024','Laporan Pengawasan dan Pengendalian BMN Semester II Tahun 2023','diah'),
(34,'B-026','2024-01-18','Provinsi Lampung','','18101','','','','','','','','B-026/18101/PL.810/2024','Persediaan','diah'),
(35,'B-027','2024-01-18','Provinsi Lampung','','18101','','','','','','','','B-027/18101/PL.810/2024','BMN','diah'),
(36,'B-028','2024-01-22','Dekan FKIP UMPRI','','18100','','','','','','','','B-028/18100/HM.340/01/2024','Pemberian ijin melakukan penelitian dan konsultasi statistik','Syamsul'),
(37,'B-029','2024-01-30','Kepala BPS Prov Lampung','','18103','','','','','','','','B-029/18103/VS.300/2024','usulan pergantian segmen KSA Jagung','dewi(Produksi)'),
(38,'B-030','2024-01-30','Ketua Yayasan Aisyah Lampung','','18105','','','','','','','','B-030/18105/VS.330/01/2024','Permintaan Pengisian SKTNP Jasa 2024','Nisalasi (Nerwilis)'),
(39,'B-031','2024-01-30','Provinsi Lampung','','18101','','','','','','','','B-031/18101/PL.810/2024','BA penghapusan data lengkap UMKM','diah'),
(40,'B-032','45293','kppn','','18101','','','','','','','','B-032/18101/KU.200/2024','BA penyamaan data','diah'),
(41,'B-033','45445','Samsat','','18101','','','','','','','','B-033/18101/KP.650/2024','Surat Kuasa pembayaran pajak roda 4','singgih'),
(42,'B-034','45445','Samsat','','18101','','','','','','','','B-034/18101/KP.650/2024','Surat pembayaran pajak roda 4','singgih'),
(43,'B-035','45445','BPN','','18106','','','','','','','','B-035/18106/KS.200/2024','Pengiriman nama penugasaan undangan ke BPN','ebi'),
(44,'B-036','45628','Diskominfo','','18100','','','','','','','','B-036/18100/HM.310/02/2024','Rekomendasi Kegiatan Statistik','Syamsul'),
(45,'B-036.01','45628','BPN','','18106','','','','','','','','B-036.01/18106/KP.650/2024','Pengiriman nama penugasaan undangan ke BPN','ebi'),
(46,'B-036.02','45628','Pekon Panutan','','18100','','','','','','','','B-036.02/18100/VS.190/2024','Koordinasi Desa Cantik','Rifja'),
(47,'B-036.03','45628','Pekon Lugusari','','18100','','','','','','','','B-036.03/18100/VS.190/2024','Koordinasi Desa Cantik','Rifja'),
(48,'B-037','2024-02-13','Kanwil DJPB','','18100','','','','','','','','B-037/18100/KU.900//2024','SPTJM Usulan revisi anggaran','zaenuri'),
(49,'B-038','2024-02-13','Kanwil DJPB','','18100','','','','','','','','B-038/18100/KU.900//2024','Usulan revisi anggaran','zaenuri'),
(50,'B-039','2024-02-15','Sekertaris Daerah Pringsewu','','18100','','','','','','','','B-039/18100/KS.200/2024','Undangan FGD DDA 2024','syamsul'),
(51,'B-040','2024-02-16','Kepala BPS Prov Lampung','','18100','','','','','','','','B-040/18100/KP.300/2024                        ','Usulan Peserta Pelatihan Fungsional Prakom','singgih'),
(52,'B-041','2024-02-19','Dinas/OPD Kab. Pringsewu','','18100','','','','','','','','B-041/18100/KS.200/2024','Undangan FGD Penyusunan DDA 2024','syamsul'),
(53,'B-042','2024-02-21','BPS Provinsi Lampung','','18101','','','','','','','','B-042/18101/PL.900/2024','Surat Pernyataan Tanggung Jawab','Diah'),
(54,'B-043','2024-02-21','BPS Provinsi Lampung','','18101','','','','','','','','B-043/18101/PL.900/2024','Surat Keterangan Kebenaran Bukti Perolehan BMN','Diah'),
(55,'B-044','2024-02-21','BPS Provinsi Lampung','','18101','','','','','','','','B-044/18101/PL.900/2024','Permohonan PSP','Diah'),
(56,'B-045','2024-02-23','Direktorat Diseminasi Statistik','','18100','','','','','','','','B-045/18100/KS.200/2024','Pernyataan rilis publikasi DDA','Fithriyah'),
(57,'B-046','2024-02-27','Sekda Pringsewu cq Kabag Tata Pemerintahan','','18106','','','','','','','','B-046/18106/KS.200/2024','Indikator Kinerja Kunci (IKK) Makro Kab. Pringsewu 2023','Ebi'),
(58,'B-047','2024-02-28','Direktorat Diseminasi Statistik','','18106','','','','','','','','B-047/18106/KS.200/2024','Permohonan Penggantian Fasilitas WebChat ke Whatsapp Official','Ebi'),
(59,'B-048','45294','Riki Afrianto','','18100','','','','','','','','B-048/18100/KP.630/2024','SPMT',''),
(60,'B-049','45385','BPS Prov lampung','','18103','','','','','','','','B-049/18103/VS.300/2024','usulan pergantian segmen KSA Jagung','Dewi'),
(61,'B-050','45476','BPS Prov lampung','','18100','','','','','','','','B-050/18100/PL.900/2024','Pengambilan BPKB Kendaraan','Diah'),
(62,'B-050.01','2024-03-19','Dinas PMP','','18100','','','','','','','','B-050.01/18100/VS.190/2024','Koordinasi Desa Cantik','Rifja'),
(63,'B-051','2024-03-20','Eksternal (dinas)','','18100','','','','','','','','B-051/18100/PS.400/2024','Undangan FGD Evaluasi Penyelenggaraan Statistik Sektoral (EPSS) Tahun 2024','syamsul'),
(64,'B-052','45295','Eksternal (Sekretariat Daerah)','','18100','','','','','','','','B-052/18100/TS.160/2024','Undangan Entry Meeting dan Sosialisasi Pelaksanaan Evaluasi Penyelenggaraan Statistik Sektoral (EPSS) 2024','syamsul'),
(65,'B-053','45295','Responden SKTNP Jasa 2024
ketua Yayasan Aisyah Lampung','','18105','','','','','','','','B-053/18105/VS.330/2024','Permintaan pengisian SKTNP Jasa 2024 Tahap 2','Nisalasi'),
(66,'B-054','45295','Direktorat Diseminasi Statistik','','18100','','','','','','','','B-054/18100/KS.200/2024','Pernyataan Rilis Publikasi PDRB','Fithriyah'),
(67,'B-055','45326','Direktorat Diseminasi Statistik','','18100','','','','','','','','B-055/18100/KS.200/2024','Pernyataan rilis booklet data strategis','Fithriyah'),
(68,'B-056','45326','Kepala Dinas Koperasi, UMKM, Perdagangan dan Perindustrian Kabupaten Pringsewu','','18103','','','','','','','','B-056/18103/VS.330/2024','Permintaan data Perusahaan Industri','dewi(Produksi)'),
(69,'B-057','45326','Kepala Dinas Tenaga Kerja dan Transmigrasi Kabupaten Pringsewu','','18103','','','','','','','','B-057/18103/VS.330/2024','Permintaan data Perusahaan Industri','dewi(Produksi)'),
(70,'B-058','45326','Kepala Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu Kabupaten Pringsewu','','18103','','','','','','','','B-058/18103/VS.330/2024','Permintaan data Perusahaan Industri','dewi(Produksi)'),
(71,'B-059','45326','Internal BPS Pringsewu','','18101','','','','','','','','B-059/18101/PR.200/2024','undangan Rapat Capaian Kinerja TW 1 tahun 2024','singgih'),
(72,'B-060','45386','Kepala Dinas Pemberdayaan Masyarakat
dan Pekon Kabupaten Pringsewu','','18104','','','','','','','','B-060/18104/VS.330/2024','Permintaan Data APBDes dan RAPBDes','Arum'),
(73,'B-061','45386','Kepala Dinas Pekerjaan Umum dan Perumahan Rakyat Kabupaten Pringsewu','','18104','','','','','','','','B-061/18104/VS.330/2024','Permintaan Data Sewa Alat Berat Upah Jasa Konstruksi dan Bill of Quantity Tahun 2021-2023','Arum'),
(74,'B-062','2024-04-16','Kepala Dinas Koperasi, UKM, Perdagangan dan Perindustrian Kabupaten Pringsewu','','18104','','','','','','','','B-062/18104/VS.330/2024','Permintaan Data Laporan RAT Koperasi Simpan Pinjam','Arum'),
(75,'B-062.01','2024-04-16','Pekon Fajar Agung','','18100','','','','','','','','B-062.01/18100/VS.190/2024','Koordinasi Desa Cantik','Rifja'),
(76,'B-062.02','2024-04-16','Pekon Wonodadi','','18100','','','','','','','','B-062.02/18100/VS.190/2024','Koordinasi Desa Cantik','Rifja'),
(77,'B-063','2024-04-17','Sekda Kab Pringsewu','','18100','','','','','','','','B-063/18100/TS.160/2024','Undangan Rapat Pembahasan Kemajuan Pelaksanaan Evaluasi Penyelenggaraan Statistik Sektoral (EPSS) 2024','syamsul'),
(78,'B-064','2024-04-17','Bupati Kab Pringsewu','','18100','','','','','','','','B-064/18100/HM.310/2024','Audiensi bersama bupati kab pringsewu','singgih'),
(79,'B-065','2024-04-18','Internal BPS Pringsewu','','18100','','','','','','','','B-065/18100/PR.640/2024','Rapat RB Pilar Tata Laksana',''),
(80,'B-066','2024-04-18','Kanwil DJPB','','18100','','','','','','','','B-066/18100/KU.900//2024','SPTJM Usulan revisi anggaran','zaenuri'),
(81,'B-067','2024-04-18','Kanwil DJPB','','18100','','','','','','','','B-067/18100/KU.900//2024','Usulan revisi anggaran','zaenuri'),
(82,'B-068','2024-04-19','mitra Statistik & Organik','','18102','','','','','','','','B-068/18102/SS.200//2024','Pemanggilan peserta pelatihan Podes','ires (Sosial)'),
(83,'B-069','2024-04-19','Dekan Fakultas Sains Itera','','18100','','','','','','','','B-069/18100/HM.310/2024','Surat Balasan Permohonan Kerja Praktek','Diah'),
(84,'B-070','2024-04-22','BPS Prov lampung','','18103','','','','','','','','B-070/18103/VS.300/2024','usulan penambahan sampel cadangan ubinan KSA','Dewi'),
(85,'B-071','2024-04-23','Direktorat Diseminasi Statistik','','18100','','','','','','','','B-071/18100/KS.200/2024','Pernyataan rilis publikasi PDRB Pengeluaran','Fithriyah'),
(86,'B-072','2024-04-23','Penjabat Bupati Pringsewu','','18100','','','','','','','','B-072/18100/VS.300/2024','Pelaksanaan survei statistik desa dan potensi desa','Dewi'),
(87,'B-073','2024-04-25','Kepala Badan Pengelola Keuangan dan Aset Daerah Kabupaten Pringsewu','','18104','','','','','','','','B-073/18104/VS.330/2024','Permintaan  Basic Price Semester
2-2023','Arum'),
(88,'B-074','2024-04-25','Kepala Pekon','','18104','','','','','','','','B-074/18104/VS.330/2024','Permintaan Data APBDes dan RAPBDes Desa di Kabupaten Pringsewu','Arum'),
(89,'B-075','2024-04-26','-','','18100','','','','','','','','B-075/18100/KU.200/2024','Surat Pernyataan sewa rumdin',''),
(90,'B-075.01','2024-04-29','Kecamatan Pagelaran','','18100','','','','','','','','B-075.01/18100/VS.190/2024','Koordinasi Desa Cantik','Rifja'),
(91,'B-075.02','2024-04-29','kecamatan Gading Rejo','','18100','','','','','','','','B-075.02/18100/VS.190/2024','Koordinasi Desa Cantik','Rifja'),
(92,'B-075','2024-04-29','Kecamatan Pringsewu','','18100','','','','','','','','B-075.03/18100/VS.190/2024','Koordinasi Desa Cantik','Rifja'),
(93,'B-076','45327','Direktur PDAM Way
Sekampung','','18104','','','','','','','','B-076/18104/VS.330/2024','Permintaan Data BUMD PDAM Way Sekampung 
2-2023','Arum'),
(94,'B-077','45356','Sekda Pringsewu','','18100','','','','','','','','B-077/18100/TS.160/2024','Permintaan Narasumber','Syamsul'),
(95,'B-078','45356','Sekda Pringsewu','','18100','','','','','','','','B-078/18100/TS.160/2024','Workshop EPSS dan Pencanangan Desa Cantik 2024','Syamsul'),
(96,'B-079','45448','','','18101','','','','','','','','B-079/18101/PL.530/2024','Berita acara rekonsiliasi Internal Audited 2023','Diah'),
(97,'B-080','45478','Dekan Fakultas Keguruan dan Ilmu Pendidikan UAP','','18100','','','','','','','','B-080/18100/HM.310/2024','Surat Balasan Permohonan Kerja Praktek','Diah'),
(98,'B-081','2024-05-13','Kepala dinas Pertanian','','18100','','','','','','','','B-081/18100/HM.310/2024','Rekomendasi Kegiatan Statistik','ebi'),
(99,'B-082','2024-05-14','BPS Provinsi Lampung','','18103','','','','','','','','B-082/18103/VS.220/2024','Permohonan Pergantian Petugas SEP 2024','dewi'),
(100,'B-083','2024-05-14','Petugas','','18104','','','','','','','','B-083/18104/VS.220/2024','Undangan Pelatihan Petugas Updating Direktori Pasar 2024 Kabupaten Pringsewu','Arum'),
(101,'B-084','2024-05-16','BPS Provinsi Lampung','','18101','','','','','','','','B-084/18101/KA.500/2024','Permohonan Persetujuan pemusnahan Arsip usul musnah pada BPS Kabupaten Pringsewu','dewi'),
(102,'B-085','2024-05-17','Responden SKNP','','18105','','','','','','','','B-085/18105/VS.330/2024','Permintaan Data Survei SKNP','Nisalasi'),
(103,'B-086','2024-05-20','Pekon Fajar Agung','','18100','','','','','','','','B-086/18100/VS.200/2024','Pembinaan Desa Cantik Ke-1','Rifja'),
(104,'B-087','2024-05-20','Pekon Panutan','','18100','','','','','','','','B-087/18100/VS.200/2024','Pembinaan Desa Cantik Ke-1','Rifja'),
(105,'B-088','2024-05-20','Pekon Lugusari','','18100','','','','','','','','B-088/18100/VS.200/2024','Pembinaan Desa Cantik Ke-1','Rifja'),
(106,'B-089','2024-05-20','Pekon Wonodadi','','18100','','','','','','','','B-089/18100/VS.200/2024','Pembinaan Desa Cantik Ke-1','Rifja'),
(107,'B-092','2024-05-20','Sekda','','18102','','','','','','','','B-092/18102/SS.200/2024','Permintaan Data luas Wilayah Podes 2024','ires (Sosial)'),
(108,'B-093','2024-05-21','Calon Petugas SEP2024','','18101','','','','','','','','B-093/18101/SS.220/05/2024','Undangan Pelatihan SEP2024',''),
(109,'B-094','2024-05-27','Evaluasi Podes 2024','','18102','','','','','','','','B-094/18102/VS.360/2024','Undangan Evaluasi Podes 2024','ires (Sosial)'),
(110,'B-095','45478','indibiz','','18100','','','','','','','','B-095/18100/HM.330/2024','peralihan data internet','singgih'),
(111,'B-096','2024-05-28','Pegawai','','18101','','','','','','','','B-096/18101/SRT100/2024','Penertiban Administrasi BMN','Diah'),
(112,'B-097','2024-05-30','Dinkes','','18100','','','','','','','','B-097/18100/HM.310/2024','Rekomendasi Kegiatan Statistik Sektoral (Kompilasi Data Puskesmas)','Syamsul'),
(113,'B-098','2024-05-30','Sekda','','18106','','','','','','','','B-098/18106/KS.200/2024','Penyampaian Data DLH','ebi'),
(114,'B-099','2024-05-30','Kanwil DJPB','','18100','','','','','','','','B-099/18100/KU.900//2024','SPTJM Usulan revisi anggaran','zaenuri'),
(115,'B-100','2024-05-30','Kanwil DJPB','','18100','','','','','','','','B-100/18100/KU.900//2024','Usulan revisi anggaran','zaenuri'),
(116,'B-101','2024-05-31','Kepala Kantor BPJS Ketengakerjaan Cabang Bandar
Lampung','','18100','','','','','','','','B-101/18100/KP.730/2024','Pengajuan Peserta Asuransi Petugas Survei Ekonomi Pertanian','zaenuri'),
(117,'B-102.01','45357','','','18101','','','','','','','','B-102.01/18101/HK.410/2024','SPKL SAKIP 2024','singgih'),
(118,'B-102','45357','Petugas Survei Khusus Tahunan Direktorat Neraca Pengeluaran','','18105','','','','','','','','B-102/18105/VS.220/2024','Undangan Pelatihan Petugas Survei Khusus Tahunan Direktorat 
Neraca Pengeluaran (SKT-DNPENG) 2024','Nisalasi'),
(119,'B-103','45449','Direktorat Diseminasi Statistik','','18100','','','','','','','','B-103/18100/KS.200/2024','Pernyataan rilis publikasi Ringkasan eksekutif luas panen dan produksi padi','Fithriyah'),
(120,'B-104','45479','Disdikbud','','18100','','','','','','','','B-104/18100/HM.310/2024','Rekomendasi Kegiatan Statistik Sektoral','Syamsul'),
(121,'B-105','45571','Petugas Survei Perusahaan Penyedia Jasa Akomodasi Tahunan (VHTL) dan Survei Obyek Daya Tarik Wisata (VDTW) 2024','','18104','','','','','','','','B-105/18104/VS.220/2024','Undangan Briefing Petugas Survei
Perusahaan Penyedia Jasa Akomodasi Tahunan (VHTL) dan Survei Obyek Daya Tarik Wisata (VDTW) 2024','Arum'),
(122,'B-106','45571','Pegawai BPS Kabupaten Pringsewu','','18101','','','','','','','','B-106/18101/PR640/2024','Rapat Bulanan Bulan Juni 2024','Diah'),
(123,'B-107','45632','BPN','','18106','','','','','','','','B-107/18106/KP.650/2024','surat tugas kegiatan undangan ke BPN','ebi'),
(124,'B-108','45632','BPN','','18106','','','','','','','','B-108/18106/KP.650/2024','surat tugas kegiatan undangan ke BPN','ebi'),
(125,'B-109','2024-06-13','','','18101','','','','','','','','B-109/18101/PL.200/2024','Surat Keterangan Rusak berat peralatan dan mesin kantor','diah'),
(126,'B-110','2024-06-13','','','18101','','','','','','','','B-110/18101/PL.200/2024','Surat Keterangan Rusak ringan peralatan dan mesin kantor','diah'),
(127,'B-111','2024-06-13','Ketua Jurusan Akuntansi Unila','','18100','','','','','','','','B-111/18100/HM.340/2024','Surat Balasan Permohonan Kerja Praktek','singgih'),
(128,'B-112','2024-06-19','Pekon Fajar Agung','','18100','','','','','','','','B-112/18100/VS.200/2024','Pembinaan Desa Cantik Ke-2','Rifja'),
(129,'B-113','2024-06-19','Pekon Panutan','','18100','','','','','','','','B-113/18100/VS.200/2024','Pembinaan Desa Cantik Ke-2','Rifja'),
(130,'B-114','2024-06-19','Pekon Lugusari','','18100','','','','','','','','B-114/18100/VS.200/2024','Pembinaan Desa Cantik Ke-2','Rifja'),
(131,'B-115','2024-06-19','Pekon Wonodadi','','18100','','','','','','','','B-115/18100/VS.200/2024','Pembinaan Desa Cantik Ke-2','Rifja'),
(132,'B-116','2024-06-19','Kepala Badan Pengelolaan Keuangan dan Aset Daerah','','18104','','','','','','','','B-116/18104/VS.330/2024','Permintaan Data BUMD PDAM Way Sekampung 
2-2023','Arum'),
(133,'B-117','2024-06-19','BPS','','18101','','','','','','','','B-117/18101/PL.900/2024','Surat Pernyataan BMN','Diah'),
(134,'B-118','2024-06-20','','','18101','','','','','','','','B-118/18101/PL.800/2024','Berita Acara Inventarisasi Dan Penelitian Barang Milik Negara','Diah'),
(135,'B-119','2024-06-20','','','18101','','','','','','','','B-119/18101/PL.800/2024','Tidak mengganggu tugas dan fungsi','Diah'),
(136,'B-120','2024-06-20','','','18101','','','','','','','','B-120/18101/PL.800/2024','Surat pernyataan limit penjualan','Diah'),
(137,'B-121','2024-06-20','KPKNL','','18101','','','','','','','','B-121/18101/PL.800/2024','Surat Usulan penjualan BMN','Diah'),
(138,'B-122','2024-06-20','OPD','','18100','','','','','','','','B-122/18100/TS.160/2024','Undangan Evaluasi EPSS 2024','Syamsul'),
(139,'B-123','2024-06-21','Petugas Updating Direktori Usaha/Perusahaan','','18104','','','','','','','','B-123/18104/VS.220/2024','Undangan Pelatihan Petugas Updating Direktori Usaha/Perusahaan Ekonomi dalam Rangka SE2026 Tahun 2024','dinny'),
(140,'B-124','2024-06-21','','','','','','','','','','','B-124','','Syamsul'),
(141,'B-125','2024-06-21','','','','','','','','','','','B-125','','Syamsul'),
(142,'B-126','2024-06-21','Ketua departemen Matematika universitas diponegoro','','18100','','','','','','','','B-126/18100/HM.340/2024','Surat Balasan Permohonan Kerja Praktek','singgih'),
(143,'B-127','2024-06-24','Petugas Seruti TW 2','','18102','','','','','','','','B-127/18102/VS.220/2024','','Resty'),
(144,'B-128','2024-06-24','Petugas SEP 2024','','18103','','','','','','','','B-128/18103/VS.220/2024','kegiatan pertemuan tim petugas SEP 2024','dewi'),
(145,'B-129','2024-06-25','Petugas IMK','','18103','','','','','','','','B-129/18103/VS.220/2024','pelatihan IMK Tahunan 2024','Rifja'),
(146,'B-130','2024-06-25','Rektor UAP','','18100','','','','','','','','B-130/18100/HM.340/2024','Tindak lanjut kunjungan kerjasama bidang statistik','Rifja'),
(147,'B-131','2024-06-26','Kanwil DJPB','','18100','','','','','','','','B-131/18100/KU.900//2024','Usulan revisi anggaran','zaenuri'),
(148,'B-132','2024-06-28','Internal BPS Pringsewu','','18101','','','','','','','','B-132/18101/PR.200/2024','undangan Rapat Capaian Kinerja TW 2 tahun 2024','singgih'),
(149,'B-133','45298','Direktur Pengembangan Metodologi Sensus dan Survei','','18104','','','','','','','','B-133/18104/VS.320/2024','Usulan Pergantian Sampel Purpossive VREST-UMK 2024','arum');

-- --------------------------------------------------------

--
-- Table structure for table `surat_masuk`
--

CREATE TABLE `surat_masuk` (
  `Nomor` INT  NOT NULL,
  `Tanggal_Surat` varchar(255) NOT NULL,
  `Asal_Surat` varchar(255) NOT NULL,
  `Penerima` varchar(255) NOT NULL,
  `Nomor_Surat` varchar(255) NOT NULL,
  `Ringkasan_Isi_Surat` varchar(255) NOT NULL,
  `Keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `surat_tugas`
--

CREATE TABLE `surat_tugas` (
  `Nomor` int(11) NOT NULL,
  `Tanggal_Surat` varchar(255) NOT NULL,
  `Nomor_Surat` varchar(255) NOT NULL,
  `Nama_Yang_di_Tugaskan` varchar(255) NOT NULL,
  `Isi_Tugas` varchar(255) NOT NULL,
  `Rentang_Waktu_Penugasan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `beritaacara`
--
ALTER TABLE `beritaacara`
  ADD PRIMARY KEY (`Nomor`);

--
-- Indexes for table `kodeklasifikasifasilitatif`
--
ALTER TABLE `kodeklasifikasifasilitatif`
  ADD PRIMARY KEY (`Nomor`);

--
-- Indexes for table `kodesurveisensus`
--
ALTER TABLE `kodesurveisensus`
  ADD PRIMARY KEY (`Nomor`);

--
-- Indexes for table `namatimkerja`
--
ALTER TABLE `namatimkerja`
  ADD PRIMARY KEY (`Nomor`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `suratkeluar`
--
ALTER TABLE `suratkeluar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
  ADD PRIMARY KEY (`Nomor`);

--
-- Indexes for table `surat_tugas`
--
ALTER TABLE `surat_tugas`
  ADD PRIMARY KEY (`Nomor`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kodeklasifikasifasilitatif`
--
ALTER TABLE `kodeklasifikasifasilitatif`
  MODIFY `Nomor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=649;

--
-- AUTO_INCREMENT for table `namatimkerja`
--
ALTER TABLE `namatimkerja`
  MODIFY `Nomor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `suratkeluar`
--
ALTER TABLE `suratkeluar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;

--
-- AUTO_INCREMENT for table `surat_tugas`
--
ALTER TABLE `surat_tugas`
  MODIFY `Nomor` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
