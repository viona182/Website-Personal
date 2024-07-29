-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Jul 2024 pada 05.25
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `household_furniture_online`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `total_price` double NOT NULL DEFAULT 0,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `status` enum('Y','N') NOT NULL DEFAULT 'Y',
  `alamat` text DEFAULT NULL,
  `status_pesan` enum('Dikemas','Dikirim','Diterima') DEFAULT 'Dikemas',
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `orders`
--

INSERT INTO `orders` (`id`, `total_price`, `user_id`, `status`, `alamat`, `status_pesan`, `time`) VALUES
(1, 2805000, 130, 'Y', 'padang', 'Dikemas', '2024-06-05 01:27:41'),
(2, 210000, 130, 'Y', 'solsel', 'Dikemas', '2024-06-05 03:15:13'),
(3, 950000, 130, 'Y', 'makassar\r\n', 'Dikemas', '2024-06-19 07:52:35'),
(4, 1120000, 130, 'Y', 'pesisir', 'Dikemas', '2024-06-27 01:22:34'),
(5, 530000, 130, 'Y', 'bukittinggi', 'Dikemas', '2024-07-02 08:37:14'),
(6, 550000, 130, 'Y', 'korea utara', 'Dikemas', '2024-07-03 14:34:58'),
(8, 530000, 134, 'Y', 'afrika', 'Dikemas', '2024-07-29 03:00:16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `image` text NOT NULL,
  `name` varchar(40) NOT NULL,
  `description` varchar(60) NOT NULL,
  `price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `products`
--

INSERT INTO `products` (`id`, `image`, `name`, `description`, `price`) VALUES
(1, 'gelas set1.JPG', 'Gelas set keramik', 'tidak mudah pecah', 150000),
(2, 'pemanggang roti.JPG', 'Alat pemanggang roti', ' Memanggang roti secara merata ', 550000),
(3, 'air fryer.JPG', 'Air fryer', 'Memasak tanpa menggunakan minyak', 935000),
(4, 'rak piring.JPG', 'Rak piring', 'Menyimpan piring dan gelas', 123000),
(5, 'setrika.JPG', 'Setrika Philips', 'Anti lengket', 200000),
(6, 'dispenser.JPG', 'Dispenser Galon Bawah', 'Dengan teknologi galon bawah', 950000),
(7, 'kain pel.JPG', 'Kain Pel', 'Alat pembersih lantai', 290000),
(8, 'kipas angin.JPG', 'Kipas Angin', 'Memberikan kesejukan', 185000),
(9, 'magic com.JPG', 'Magic Com', 'Penanak nasi', 530000),
(10, 'kompor.JPG', 'Kompor Gas', 'Alat untuk memasak', 210000),
(11, 'piring.JPG', 'Piring', 'Alat Makan', 85000),
(12, 'rak handuk.JPG', 'Rak Handuk', 'Alat jemuran handuk', 75000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_product` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `stok_awal` int(11) DEFAULT NULL,
  `stok_tersedia` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_product`, `name`, `stok_awal`, `stok_tersedia`) VALUES
(1, 'Gelas set keramik', 200, 90),
(2, 'Alat pemanggang roti', 120, 40),
(3, 'Air fryer', 300, 130),
(4, 'Rak piring', 250, 100),
(5, 'Setrika Philips', 400, 200),
(6, 'Dispenser Galon Bawah', 500, 250),
(7, 'Kain Pel', 350, 50),
(8, 'Kipas Angin', 170, 60),
(9, 'Magic Com', 200, 20),
(10, 'Kompor Gas', 100, 80),
(11, 'Piring', 250, 100),
(12, 'Rak Handuk', 200, 150);

-- --------------------------------------------------------

--
-- Struktur dari tabel `shopping_cart`
--

CREATE TABLE `shopping_cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL DEFAULT 0,
  `harga` double NOT NULL DEFAULT 0,
  `jumlah` double NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `shopping_cart`
--

INSERT INTO `shopping_cart` (`id`, `user_id`, `product_id`, `qty`, `harga`, `jumlah`) VALUES
(15, 130, 9, 1, 530000, 530000),
(16, 130, 10, 1, 210000, 210000),
(17, 131, 1, 1, 150000, 150000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_produk`, `jumlah`, `tanggal`) VALUES
(1, 1, 1, '2024-06-17'),
(2, 9, 3, '2024-06-27'),
(3, 12, 4, '2024-07-04'),
(5, 5, 8, '2024-07-03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` varchar(254) NOT NULL,
  `email` varchar(255) NOT NULL,
  `alamat` varchar(20) DEFAULT NULL,
  `no_telp` varchar(12) DEFAULT NULL,
  `jenis_kelamin` enum('laki-laki','perempuan') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `alamat`, `no_telp`, `jenis_kelamin`) VALUES
(132, 'lilis', '$2y$10$8IX8750cdFsN/ohYjmDIheYSl/D5prBNXItop.mjeRu7OM/CXEdpK', 'lilis@gmail.com', 'taratak', '08876156034', 'perempuan'),
(133, 'Tiara', '$2y$10$96im4u9UOUiZC0D1BTY8u.VKbZJt9yHH/4rTvdRfPRPBw0T0M8A0i', 'tiara@gmail.com', 'korea', '087287319318', 'perempuan'),
(134, 'Vionalisa', '$2y$10$Hf9TUch8Sg7HFlZESFNJEeJTTE9xp5XTWn5MxEyqctrCtPGuruWbm', 'vionalisa351@gmail.com', 'Pariaman Keren', '087821982917', 'perempuan');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_product`);

--
-- Indeks untuk tabel `shopping_cart`
--
ALTER TABLE `shopping_cart`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `shopping_cart`
--
ALTER TABLE `shopping_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `produk_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`);

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_product`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
