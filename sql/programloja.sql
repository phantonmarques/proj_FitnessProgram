-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 12-Dez-2018 às 16:41
-- Versão do servidor: 10.1.37-MariaDB
-- versão do PHP: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `programloja`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `programloja`
--

CREATE TABLE `programloja` (
  `id` int(100) NOT NULL,
  `nome` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `idade` date DEFAULT NULL,
  `genero` varchar(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cidade` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `endereco` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `altura` decimal(5,2) DEFAULT NULL,
  `dtreino` int(1) DEFAULT NULL,
  `iac` double(50,0) DEFAULT NULL,
  `objetivo` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `peso` decimal(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `programloja`
--

INSERT INTO `programloja` (`id`, `nome`, `idade`, `genero`, `email`, `cidade`, `endereco`, `altura`, `dtreino`, `iac`, `objetivo`, `peso`) VALUES
(4, 'Daniel Marques', '2010-08-19', 'M', 'dnl.flow@hotmail.com', 'Pinhais', 'R Francisco EugÃªnio Gomes Pereira, 168', '2.00', 6, 15, 'DefiniÃ§Ã£', '90.00'),
(7, 'FINER', '1997-10-01', 'M', 'FINER@FINER', 'Curitiba', 'FINER', '2.00', 6, 15, 'FINERFINER', '90.00'),
(8, 'Alex Marque', '1991-07-11', 'M', 'alex@marques.com.br', 'Curitiba', 'Candido 123', '2.00', 5, 8, 'Hipertrofi', '80.00'),
(9, 'TESTEMASTER', '1990-08-11', 'M', 'TESTEMASTER@TESTEMASTER', 'Colombo', 'TESTEMASTER', '2.00', 4, 11, 'Hipertrofi', '85.00'),
(10, 'TESTEULTIMATE', '1999-10-11', 'M', 'TESTEULTIMATE@TESTEULTIMATE', 'Colombo', 'TESTEULTIMATE', '1.78', 6, 12, 'Definicao', '84.80'),
(11, 'teste1', '1975-05-11', 'M', 'teste1@teste1', 'Pinhais', 'teste1', '1.71', 6, 15, 'DefiniÃ§Ã£', '90.60');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `programloja`
--
ALTER TABLE `programloja`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `programloja`
--
ALTER TABLE `programloja`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
