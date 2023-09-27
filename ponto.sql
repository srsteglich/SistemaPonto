-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 27-Set-2023 às 01:17
-- Versão do servidor: 8.0.31
-- versão do PHP: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `ponto`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `pontos`
--

DROP TABLE IF EXISTS `pontos`;
CREATE TABLE IF NOT EXISTS `pontos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `data_entrada` date NOT NULL,
  `entrada` time DEFAULT NULL,
  `saida_intervalo` time DEFAULT NULL,
  `retorno_intervalo` time DEFAULT NULL,
  `saida` time DEFAULT NULL,
  `total_horas` time NOT NULL,
  `usuario_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `usuario_id` (`usuario_id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `pontos`
--

INSERT INTO `pontos` (`id`, `data_entrada`, `entrada`, `saida_intervalo`, `retorno_intervalo`, `saida`, `total_horas`, `usuario_id`) VALUES
(2, '2023-09-20', '08:00:00', '12:01:00', '13:02:58', '17:58:00', '00:00:00', 5),
(3, '2023-09-08', '08:08:15', '12:01:00', '13:05:58', '18:16:18', '00:00:00', 3),
(4, '2023-09-07', '08:00:49', '12:01:00', '13:02:58', '18:16:18', '00:00:00', 1),
(5, '2023-09-07', '08:00:00', '00:00:12', '13:02:58', '17:55:39', '00:00:00', 3),
(6, '2023-09-09', '08:00:00', '00:00:12', '13:02:58', '18:26:18', '00:00:00', 3),
(7, '2023-09-09', '08:00:00', '00:00:12', '13:02:58', '18:16:18', '00:00:00', 3),
(8, '2023-09-10', '08:03:42', '00:00:12', '13:02:58', '18:16:18', '00:00:00', 3),
(9, '2023-09-20', '08:30:14', '11:32:57', '13:00:00', '17:00:00', '00:00:00', 3),
(10, '2023-09-21', '08:00:00', '12:01:00', '13:15:00', '17:10:00', '00:00:00', 3),
(11, '2023-09-11', '08:03:42', '12:01:00', '13:02:58', '18:16:18', '00:00:00', 3),
(12, '2023-09-18', '08:13:49', '00:00:12', '13:02:58', '17:16:18', '00:00:00', 3),
(13, '2023-09-19', '08:03:42', '00:00:12', '13:00:00', '17:58:00', '00:00:00', 3),
(14, '2023-09-17', '08:00:00', '12:01:00', '13:02:58', '17:58:00', '00:00:00', 3),
(15, '2023-09-09', '08:03:42', '12:01:00', '13:02:58', '18:16:18', '00:00:00', 1),
(16, '2023-09-10', '08:03:42', '12:01:00', '13:02:58', '18:16:18', '00:00:00', 1),
(17, '2023-09-23', '20:14:55', '20:14:57', '20:17:19', '09:14:25', '00:00:00', 3),
(19, '2022-09-22', '07:15:34', '11:40:02', '13:00:00', '17:58:00', '00:00:00', 3),
(22, '2023-09-24', '21:58:31', '21:58:45', '21:59:18', '21:59:33', '00:00:00', 3),
(23, '2023-09-25', '08:30:14', '12:00:12', '13:15:00', '18:26:18', '00:00:00', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(220) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `cpf` char(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(220) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `usuario` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `senha` varchar(220) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `cpf`, `email`, `usuario`, `senha`, `tipo`) VALUES
(1, 'Marcelo Oliveira    ', '10000100555', 'marcelo@gmail.com', 'Marcelo22', '123', 1),
(2, 'Kelly Lorenzetti     ', '10000100888', 'kelly@gmail.com', 'Kelly', '123', 1),
(3, 'Gabrielly Scoppel  ', '03715487992', 'gabrielly@gmail.com', 'Gabi', '123', 1),
(4, 'Leonardo Pucci Silva ', '00875080952', 'LeonardoPucci@gmail.com', 'LeonardoP', '123', 2),
(5, 'Jean Piérre Corrêa', '02163084965', 'JeanPiérre@gmail.com', 'Corrêa', '123', 1),
(6, 'Paula Moretti Borges', '3930102951', 'PaulaMoretti@gmail.com', 'Paula Moretti', '123', 2),
(7, 'Maicon P. Pereira ', '0446886600', 'MaiconPPereira@gmail.com', 'MaiconPPereira ', '123', 1),
(8, 'Rodrigo Dutra ', '00926376985', 'RodrigoDutra@gmail.com', 'Rodrigo Dutra ', '123', 1),
(9, 'Alexey Lopes Ribeiro', '31240389833', 'Alexey@gmail.com', 'Alexey', '123', 2),
(10, 'Fernando Albino de Abreu  ', '00703432923', 'FernandoAlbino@gmail.com', 'Fernando Albino', '123', 1),
(11, 'Marlon Cordova Olivo ', '02157072900', 'MarlonCordova@gmail.com', 'Olivo ', '123', 1),
(12, 'Ticiana Dutra   ', '04094699988', 'TicianaDutra@gmail.com', 'Ticiana Dutra   ', '123', 1);

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `pontos`
--
ALTER TABLE `pontos`
  ADD CONSTRAINT `pontos_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
