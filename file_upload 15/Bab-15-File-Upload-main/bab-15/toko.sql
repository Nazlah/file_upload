-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Nov 2021 pada 14.31
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 7.3.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toko`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` varchar(20) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `nama`, `email`, `password`) VALUES
('', 'nazlah27', 'nazlahjong@gmail.com', 6195),
('', 'nazila', 'nazilah09@gmail.com', 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id_barang` varchar(20) NOT NULL,
  `nama_barang` varchar(30) NOT NULL,
  `harga` int(10) NOT NULL,
  `foto` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `harga`, `foto`) VALUES
('1D04', 'topi bulat', 45500, 'penyimpanan/topi bulat.jpg'),
('ID01', 'kemeja lengan panjang', 70000, 'penyimpanan/lengan panjang.jpg'),
('ID02', 'celana kulot', 70000, 'penyimpanan/kulot.jpg'),
('ID03', 'baju syar\'i', 120000, NULL),
('ID04', 'Topi bulat', 45500, NULL),
('ID05', 'Hijab anti air', 35000, NULL),
('ID06', 'Celana Jeans', 90000, NULL),
('ID07', 'kaca mata hitam', 40000, NULL),
('ID08', 'Sandal ', 50000, NULL),
('ID09', 'Ikat Pinggang biasa', 30000, NULL),
('ID10', 'Kaos Kaki', 15000, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `faktur`
--

CREATE TABLE `faktur` (
  `id_faktur` varchar(10) NOT NULL,
  `id_pelanggan` varchar(20) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `faktur`
--

INSERT INTO `faktur` (`id_faktur`, `id_pelanggan`, `tanggal`) VALUES
('F1001', '20210101', '2021-09-01'),
('F1002', '20210102', '2021-09-02'),
('F1003', '20210103', '2021-09-03'),
('F1004', '20210104', '2021-09-04'),
('F1005', '20210105', '2021-09-05'),
('F1006', '20210106', '2021-09-06'),
('F1007', '20210107', '2021-09-07'),
('F1008', '20210108', '2021-09-08'),
('F1009', '20210109', '2021-09-09'),
('F1010', '20210110', '2021-09-10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `faktur_barang`
--

CREATE TABLE `faktur_barang` (
  `id_barang` varchar(20) NOT NULL,
  `id_faktur` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `faktur_barang`
--

INSERT INTO `faktur_barang` (`id_barang`, `id_faktur`) VALUES
('ID01', 'F1001'),
('ID02', 'F1002'),
('ID03', 'F1003'),
('ID04', 'F1004'),
('ID05', 'F1005'),
('ID06', 'F1006'),
('ID07', 'F1007'),
('ID08', 'F1008'),
('ID09', 'F1009'),
('ID10', 'F1010');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelangan`
--

CREATE TABLE `pelangan` (
  `id_pelangan` varchar(20) NOT NULL,
  `nama_pelangan` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pelangan`
--

INSERT INTO `pelangan` (`id_pelangan`, `nama_pelangan`) VALUES
('20210101', 'Diana'),
('20210102', 'ummi'),
('20210103', 'mahfudo'),
('20210104', 'rosalina'),
('20210105', 'oktavia'),
('20210106', 'rafi'),
('20210107', 'Ahmad'),
('20210108', 'nagita'),
('20210109', 'salafina'),
('20210110', 'fikri');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `faktur`
--
ALTER TABLE `faktur`
  ADD PRIMARY KEY (`id_faktur`);

--
-- Indeks untuk tabel `faktur_barang`
--
ALTER TABLE `faktur_barang`
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `id_faktur` (`id_faktur`);

--
-- Indeks untuk tabel `pelangan`
--
ALTER TABLE `pelangan`
  ADD PRIMARY KEY (`id_pelangan`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `faktur_barang`
--
ALTER TABLE `faktur_barang`
  ADD CONSTRAINT `id_barang` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_faktur` FOREIGN KEY (`id_faktur`) REFERENCES `faktur` (`id_faktur`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
