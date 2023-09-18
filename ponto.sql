-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 18-Set-2023 às 23:03
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
  `usuario_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `usuario_id` (`usuario_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `pontos`
--

INSERT INTO `pontos` (`id`, `data_entrada`, `entrada`, `saida_intervalo`, `retorno_intervalo`, `saida`, `usuario_id`) VALUES
(4, '2023-09-07', '16:30:49', NULL, NULL, NULL, 1),
(5, '2023-09-07', '16:31:38', '16:32:16', NULL, NULL, 3);

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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(7, 'Maicon Pereira ', '04468866969', 'MaiconPereira@gmail.com ', 'Maicon Pereira ', '123', 1),
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
