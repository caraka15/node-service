-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Jun 2023 pada 19.44
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
-- Database: `node`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `user` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `user`, `password`) VALUES
(1, 'caraka15', '$2y$10$iJeZe8b7K4s1gOfgUShE0eMqIF9tYp/mQkZ69Kulk8FC4piQ5I0AS');

-- --------------------------------------------------------

--
-- Struktur dari tabel `chainds`
--

CREATE TABLE `chainds` (
  `chain_id` varchar(5) NOT NULL,
  `name` varchar(100) NOT NULL,
  `type` varchar(50) NOT NULL,
  `logo` varchar(200) DEFAULT NULL,
  `rpc_link` varchar(200) DEFAULT NULL,
  `api_link` varchar(200) DEFAULT NULL,
  `grpc_link` varchar(200) DEFAULT NULL,
  `guide_link` varchar(200) DEFAULT NULL,
  `stake_link` varchar(200) DEFAULT NULL,
  `snapshot_link` varchar(200) DEFAULT NULL,
  `statesync_link` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `chainds`
--

INSERT INTO `chainds` (`chain_id`, `name`, `type`, `logo`, `rpc_link`, `api_link`, `grpc_link`, `guide_link`, `stake_link`, `snapshot_link`, `statesync_link`) VALUES
('122', 'MANDE', 'TESTNET', 'mande.jpg', 'https://rpc-mande.crxa.my.id/', 'https://api-mande.crxa.my.id/', 'https://grpc-mande.crxa.my.id/', 'mande.md', 'https://explorer.crxa.my.id/planq/staking/plqvaloper16cfuq9d8nv2yrfzl409xkk6w0s4mq9asad5c47', 'snapshot.crxa.my.id/mande-testnet', 'statesync.crxa.my.id/mande-testnet'),
('181', 'Osmosis', 'MAINNET', 'osmosis.jpg', 'https://osmosis-rpc.polkachu.com', 'https://osmosis-api.polkachu.com', 'https://osmosis-grpc.polkachu.com', 'osmosis.md', 'https://explorer.crxa.my.id/osmosis/', 'snapshot.crxa.my.id/snapshot', 'statesync.crxa.my.id/osmosis'),
('898', 'PLANQ', 'MAINNET', 'planq.png', 'https://rpc.planq.crxa.my.id', 'api.planq.crxa.my.id', 'grpc.planq.crxa.my.id', 'installation.md', 'https://explorer.crxa.my.id/planq/staking/plqvaloper16cfuq9d8nv2yrfzl409xkk6w0s4mq9asad5c47', 'snapshot.crxa.my.id/snapshot', 'statesync.crxa.my.id/planq');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `chainds`
--
ALTER TABLE `chainds`
  ADD PRIMARY KEY (`chain_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
