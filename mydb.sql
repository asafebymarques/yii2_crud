-- phpMyAdmin SQL Dump
-- version 4.4.15.7
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2019 at 12:47 AM
-- Server version: 5.6.37
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `ativo`
--

CREATE TABLE IF NOT EXISTS `ativo` (
  `id_ativo` int(11) NOT NULL,
  `descricao` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ativo`
--

INSERT INTO `ativo` (`id_ativo`, `descricao`) VALUES
(1, 'Ativo'),
(2, 'Inativo');

-- --------------------------------------------------------

--
-- Table structure for table `categoria`
--

CREATE TABLE IF NOT EXISTS `categoria` (
  `id_categoria` int(11) NOT NULL,
  `categoria` varchar(255) NOT NULL,
  `descricao` longtext,
  `fk_ativo` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `categoria`, `descricao`, `fk_ativo`) VALUES
(1, 'Eletrônicos', 'Eletrônicos', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nivel`
--

CREATE TABLE IF NOT EXISTS `nivel` (
  `id_nivel` int(11) NOT NULL,
  `descricao` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nivel`
--

INSERT INTO `nivel` (`id_nivel`, `descricao`) VALUES
(1, 'Administrador'),
(2, 'Vendedor'),
(3, 'Gerente'),
(4, 'Cliente'),
(5, 'Gerente de Projetos');

-- --------------------------------------------------------

--
-- Table structure for table `produto`
--

CREATE TABLE IF NOT EXISTS `produto` (
  `id_produto` int(11) NOT NULL,
  `produto` varchar(255) NOT NULL,
  `descricao` longtext,
  `fk_categoria` int(11) NOT NULL,
  `fk_sub_categoria` int(11) NOT NULL,
  `fk_ativo` int(11) NOT NULL,
  `data_criacao` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `data_alteracao` timestamp NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `produto`
--

INSERT INTO `produto` (`id_produto`, `produto`, `descricao`, `fk_categoria`, `fk_sub_categoria`, `fk_ativo`, `data_criacao`, `data_alteracao`) VALUES
(1, 'Iphone 7 - 32GB', 'Iphone 7 - 32GB \r\nO celular iPhone 7 foi lançado em 11 de novembro de 2016 e tem uma ficha técnica interessante. Quem gosta de tirar fotos conta com uma câmera de 12 MP, além de 7 MP para capturar as famosas selfies. Seguindo com as especificações, ele também é equipado com 2 GB de RAM, memória interna de 32 GB, 128 GB ou 256 GB e o processador Apple A10 Fusion (APL1W24). Isso tudo rodando o sistema operacional iOS 10.0.1, atualizável para 11.4.1.', 1, 1, 1, '2019-03-25 00:03:10', '0000-00-00 00:00:00'),
(2, 'Motor G', 'O celular Moto G foi lançado em 13 de novembro de 2013 (Brasil) e tem uma ficha técnica interessante. Quem gosta de tirar fotos conta com uma câmera de 5 MP, além de 1.3 MP para capturar as famosas selfies. Seguindo com as especificações, ele também é equipado com 1 GB de RAM de RAM, memória interna de 8/16 GB e o processador Qualcomm MSM8226 Snapdragon 400. Isso tudo rodando o sistema operacional Android 4.3 Jelly Bean, com atualização para o 5.0 Lollipop.', 1, 1, 1, NULL, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `sub_categoria`
--

CREATE TABLE IF NOT EXISTS `sub_categoria` (
  `id_sub_categoria` int(11) NOT NULL,
  `sub_categoria` varchar(255) NOT NULL,
  `descricao` longtext,
  `fk_sub_categoria` int(11) NOT NULL,
  `fk_ativo` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sub_categoria`
--

INSERT INTO `sub_categoria` (`id_sub_categoria`, `sub_categoria`, `descricao`, `fk_sub_categoria`, `fk_ativo`) VALUES
(1, 'Celular', 'Celular', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` int(11) NOT NULL,
  `username` longtext NOT NULL,
  `password` longtext NOT NULL,
  `data_criacao` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `data_alteracao` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `fk_nivel` int(11) NOT NULL,
  `fk_ativo` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `username`, `password`, `data_criacao`, `data_alteracao`, `fk_nivel`, `fk_ativo`) VALUES
(1, 'AsafeMarques', '$2y$13$src7ge.65IPsTNAlscKtV.UvfyiiQKWflkNVUVrmfQuoFFNseHhTu', '0000-00-00 00:00:00', '2019-03-26 19:44:34', 1, 1),
(2, 'admin', '$2y$13$QvbN8p7YnJjle.4lF.etKOByqJ23JZgIROUH8Oeu22xT1kKnR7Xo6', '2019-03-26 19:00:33', '0000-00-00 00:00:00', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ativo`
--
ALTER TABLE `ativo`
  ADD PRIMARY KEY (`id_ativo`);

--
-- Indexes for table `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`),
  ADD KEY `categoria_ativo_fk` (`fk_ativo`);

--
-- Indexes for table `nivel`
--
ALTER TABLE `nivel`
  ADD PRIMARY KEY (`id_nivel`);

--
-- Indexes for table `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id_produto`),
  ADD KEY `produto_categoria_fk` (`fk_categoria`),
  ADD KEY `produto_sub_categoria_fk` (`fk_sub_categoria`),
  ADD KEY `produto_ativo_fk` (`fk_ativo`);

--
-- Indexes for table `sub_categoria`
--
ALTER TABLE `sub_categoria`
  ADD PRIMARY KEY (`id_sub_categoria`),
  ADD KEY `sub_categoria_categoria_fk` (`fk_sub_categoria`),
  ADD KEY `sub_categoria_ativo_fk` (`fk_ativo`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `usuario_nivel_fk` (`fk_nivel`),
  ADD KEY `usuario_ativo_fk` (`fk_ativo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ativo`
--
ALTER TABLE `ativo`
  MODIFY `id_ativo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `nivel`
--
ALTER TABLE `nivel`
  MODIFY `id_nivel` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `produto`
--
ALTER TABLE `produto`
  MODIFY `id_produto` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `sub_categoria`
--
ALTER TABLE `sub_categoria`
  MODIFY `id_sub_categoria` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `categoria`
--
ALTER TABLE `categoria`
  ADD CONSTRAINT `categoria_ativo_fk` FOREIGN KEY (`fk_ativo`) REFERENCES `ativo` (`id_ativo`);

--
-- Constraints for table `produto`
--
ALTER TABLE `produto`
  ADD CONSTRAINT `produto_ativo_fk` FOREIGN KEY (`fk_ativo`) REFERENCES `ativo` (`id_ativo`),
  ADD CONSTRAINT `produto_categoria_fk` FOREIGN KEY (`fk_categoria`) REFERENCES `categoria` (`id_categoria`),
  ADD CONSTRAINT `produto_sub_categoria_fk` FOREIGN KEY (`fk_sub_categoria`) REFERENCES `sub_categoria` (`id_sub_categoria`);

--
-- Constraints for table `sub_categoria`
--
ALTER TABLE `sub_categoria`
  ADD CONSTRAINT `sub_categoria_ativo_fk` FOREIGN KEY (`fk_ativo`) REFERENCES `ativo` (`id_ativo`),
  ADD CONSTRAINT `sub_categoria_categoria_fk` FOREIGN KEY (`fk_sub_categoria`) REFERENCES `categoria` (`id_categoria`);

--
-- Constraints for table `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ativo_fk` FOREIGN KEY (`fk_ativo`) REFERENCES `ativo` (`id_ativo`),
  ADD CONSTRAINT `usuario_nivel_fk` FOREIGN KEY (`fk_nivel`) REFERENCES `nivel` (`id_nivel`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
