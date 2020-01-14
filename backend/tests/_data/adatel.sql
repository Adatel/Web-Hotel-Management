-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 14-Jan-2020 às 15:39
-- Versão do servidor: 5.7.26
-- versão do PHP: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `adatel`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `auth_assignment`
--

DROP TABLE IF EXISTS `auth_assignment`;
CREATE TABLE IF NOT EXISTS `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`),
  KEY `idx-auth_assignment-user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `auth_item`
--

DROP TABLE IF EXISTS `auth_item`;
CREATE TABLE IF NOT EXISTS `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`),
  KEY `idx-auth_item-type` (`type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `auth_item_child`
--

DROP TABLE IF EXISTS `auth_item_child`;
CREATE TABLE IF NOT EXISTS `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `auth_rule`
--

DROP TABLE IF EXISTS `auth_rule`;
CREATE TABLE IF NOT EXISTS `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `linha_produto`
--

DROP TABLE IF EXISTS `linha_produto`;
CREATE TABLE IF NOT EXISTS `linha_produto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `quantidade` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `id_pedido` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_produto` (`id_produto`),
  KEY `id_pedido` (`id_pedido`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `migration`
--

DROP TABLE IF EXISTS `migration`;
CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1574066078),
('m130524_201442_init', 1574066127),
('m190124_110200_add_verification_token_column_to_user_table', 1574066127),
('m140506_102106_rbac_init', 1574066408),
('m170907_052038_rbac_add_index_on_auth_assignment_user_id', 1574066408),
('m180523_151638_rbac_updates_indexes_without_prefix', 1574066408);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pagamento`
--

DROP TABLE IF EXISTS `pagamento`;
CREATE TABLE IF NOT EXISTS `pagamento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_reserva` int(11) NOT NULL,
  `total` decimal(10,0) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_reserva` (`id_reserva`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido`
--

DROP TABLE IF EXISTS `pedido`;
CREATE TABLE IF NOT EXISTS `pedido` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data_hora` datetime NOT NULL,
  `custo` decimal(10,0) NOT NULL,
  `id_reservaquarto` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_reservaquarto` (`id_reservaquarto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

DROP TABLE IF EXISTS `produto`;
CREATE TABLE IF NOT EXISTS `produto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `designacao` varchar(50) NOT NULL,
  `preco_unitario` decimal(10,0) NOT NULL,
  `id_tipo` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_tipo` (`id_tipo`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`id`, `designacao`, `preco_unitario`, `id_tipo`) VALUES
(1, 'Ice Tea', '1', 4),
(2, 'Coca Cola', '1', 4),
(3, 'Bitoque', '5', 2),
(4, 'Sopa de Peixe', '3', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `profile`
--

DROP TABLE IF EXISTS `profile`;
CREATE TABLE IF NOT EXISTS `profile` (
  `nome` varchar(80) NOT NULL,
  `nif` int(9) NOT NULL,
  `telemovel` int(9) NOT NULL,
  `morada` varchar(80) NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `is_funcionario` tinyint(1) NOT NULL DEFAULT '0',
  `is_cliente` tinyint(1) NOT NULL DEFAULT '0',
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`nif`),
  UNIQUE KEY `nif` (`nif`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `profile`
--

INSERT INTO `profile` (`nome`, `nif`, `telemovel`, `morada`, `is_admin`, `is_funcionario`, `is_cliente`, `id_user`) VALUES
('Diana Gomes', 123123321, 736172638, 'Marinha Grande', 0, 1, 0, 26),
('Diana', 123456789, 987654321, 'Marinha Grande', 1, 0, 0, 25),
('Teste Cliente', 541289673, 954868547, 'Coimbra', 0, 0, 1, 38),
('Teste Funcionário', 672536478, 989898989, 'Leiria', 0, 1, 0, 37),
('Adatel', 874829748, 927847564, 'Leiria', 0, 0, 1, 40),
('Teste', 985647389, 916276455, 'Leiria', 0, 0, 1, 36);

-- --------------------------------------------------------

--
-- Estrutura da tabela `quarto`
--

DROP TABLE IF EXISTS `quarto`;
CREATE TABLE IF NOT EXISTS `quarto` (
  `num_quarto` int(11) NOT NULL,
  `id_tipo` int(11) NOT NULL,
  `estado` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`num_quarto`),
  KEY `id_tipo` (`id_tipo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `quarto`
--

INSERT INTO `quarto` (`num_quarto`, `id_tipo`, `estado`) VALUES
(1, 2, 1),
(2, 1, 1),
(3, 3, 1),
(4, 4, 1),
(5, 1, 1),
(6, 4, 0),
(7, 3, 0),
(8, 2, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `reserva`
--

DROP TABLE IF EXISTS `reserva`;
CREATE TABLE IF NOT EXISTS `reserva` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `num_pessoas` int(11) NOT NULL,
  `num_quartos` int(11) NOT NULL,
  `quarto_solteiro` int(1) DEFAULT '0',
  `quarto_duplo` int(1) DEFAULT '0',
  `quarto_familia` int(1) DEFAULT '0',
  `quarto_casal` int(1) DEFAULT '0',
  `data_entrada` date NOT NULL,
  `data_saida` date NOT NULL,
  `id_cliente` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_cliente` (`id_cliente`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `reserva`
--

INSERT INTO `reserva` (`id`, `num_pessoas`, `num_quartos`, `quarto_solteiro`, `quarto_duplo`, `quarto_familia`, `quarto_casal`, `data_entrada`, `data_saida`, `id_cliente`) VALUES
(26, 4, 3, 1, 2, 0, 0, '2019-12-12', '2019-12-19', 25),
(27, 1, 1, 1, 0, 0, 0, '2019-12-26', '2020-01-02', 26),
(29, 3, 1, 0, 0, 0, 1, '2020-01-16', '2020-01-23', 25),
(32, 3, 1, 0, 0, 1, 0, '2020-01-24', '2020-01-31', 38);

-- --------------------------------------------------------

--
-- Estrutura da tabela `reserva_quarto`
--

DROP TABLE IF EXISTS `reserva_quarto`;
CREATE TABLE IF NOT EXISTS `reserva_quarto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_reserva` int(11) NOT NULL,
  `id_quarto` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_reserva` (`id_reserva`),
  KEY `id_quarto` (`id_quarto`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `reserva_quarto`
--

INSERT INTO `reserva_quarto` (`id`, `id_reserva`, `id_quarto`) VALUES
(35, 26, 2),
(36, 26, 3),
(37, 26, 7),
(38, 27, 5),
(41, 29, 1),
(44, 32, 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_produto`
--

DROP TABLE IF EXISTS `tipo_produto`;
CREATE TABLE IF NOT EXISTS `tipo_produto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao_tipo` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tipo_produto`
--

INSERT INTO `tipo_produto` (`id`, `descricao_tipo`) VALUES
(1, 'Pequeno Almoço'),
(2, 'Almoço'),
(3, 'Jantar'),
(4, 'Bebidas');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_quarto`
--

DROP TABLE IF EXISTS `tipo_quarto`;
CREATE TABLE IF NOT EXISTS `tipo_quarto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `designacao` varchar(50) NOT NULL,
  `preco_noite` decimal(10,0) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tipo_quarto`
--

INSERT INTO `tipo_quarto` (`id`, `designacao`, `preco_noite`) VALUES
(1, 'Quarto de Solteiro', '10'),
(2, 'Quarto de Casal', '15'),
(3, 'Quarto Duplo', '20'),
(4, 'Quarto de Família', '25');

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(75) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '9',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `verification_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `verification_token`) VALUES
(25, 'Diana', '25rypW1GEGiIIH0vsoysuGTn_BiFaaNX', '$2y$13$2oo7XY95YzW4M3r96PJEG.03mzEm3e1y7XvWQ0BZ6rbkD8YatXXnC', NULL, '2191054@my.ipleiria.pt', 10, 1574853784, 1574853850, 'nuQkuEwk0F3d3IS1MnIXWwwr0V6dtx0I_1574853784'),
(26, 'dianaGomes', 'zh2sdtHJh5EIDG878nI0NuwQOCjbm1SG', '$2y$13$vp.v9dYw2u6mXvh//df0E.Dxh20bBY3pCdo4kXtyCSBBWmt83B5aK', NULL, 'diana.fp.gomes@gmail.com', 10, 1576060623, 1576060623, 'uHfP8mE7YMelC8FFPktdzjSvf_dwsWOG_1576060623'),
(36, 'Teste', 'uXGl7J8ezKJmk4gna98YJJokWmLS0Iu-', '$2y$13$lJCO14pi.v8IFbirNX8mZO1M6EXaf1I0DQdGhuN/DpiK3dNX9qIcy', NULL, 'teste@gmail.com', 10, 1578915221, 1578915221, 'IiH2xjkAbT1mdG8B3euVnuA7Cx_gjmYV_1578915221'),
(37, 'TesteFuncionario', '7XMt_p62t6qLynVNbCye-5Gii9vsknFx', '$2y$13$fMPlxyqQ6QWDFKt8yN9Lpu4UjtioBZpSfwG9Vj2zsdgDMPYoefzHa', NULL, 'testefuncionario@gmail.com', 10, 1578916553, 1578916553, 'WCGsLSC0P_7iuMOVAI2pjRGyzjMCZiIj_1578916553'),
(38, 'TesteCliente', 'MM3zqlKIe2EdtMpxQb6AVzWiBTcRen-k', '$2y$13$y2irvjuRHR.bflMGhV/eL.Zi.rqw.wjJLxjkDkjxDrvPAnC9djwbS', NULL, 'testecliente@gmail.com', 10, 1578916622, 1578916622, 'Iev1eU3Fr2SWDh7ZbJEI7_MjRPhK0Xkd_1578916622'),
(40, 'Adatel', '1022poLfXZG1b5xVCF4vGjHthIU16I_5', '$2y$13$DIo1UAzYJqmc9ORA34zWQOV3G/g7EwVL6kotAeR.QWQPXzgMVlZDS', NULL, 'adatel.19.20@gmail.com', 10, 1579007408, 1579007494, 'LK1tJ6izauF4b22K8SaDtk4CkKcU4Ylt_1579007408');

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Limitadores para a tabela `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `linha_produto`
--
ALTER TABLE `linha_produto`
  ADD CONSTRAINT `linha_produto_ibfk_1` FOREIGN KEY (`id_pedido`) REFERENCES `pedido` (`id`),
  ADD CONSTRAINT `linha_produto_ibfk_2` FOREIGN KEY (`id_produto`) REFERENCES `produto` (`id`);

--
-- Limitadores para a tabela `pagamento`
--
ALTER TABLE `pagamento`
  ADD CONSTRAINT `pagamento_ibfk_1` FOREIGN KEY (`id_reserva`) REFERENCES `reserva` (`id`);

--
-- Limitadores para a tabela `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`id_reservaquarto`) REFERENCES `reserva_quarto` (`id`);

--
-- Limitadores para a tabela `produto`
--
ALTER TABLE `produto`
  ADD CONSTRAINT `produto_ibfk_1` FOREIGN KEY (`id_tipo`) REFERENCES `tipo_produto` (`id`);

--
-- Limitadores para a tabela `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `profile_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);

--
-- Limitadores para a tabela `quarto`
--
ALTER TABLE `quarto`
  ADD CONSTRAINT `quarto_ibfk_1` FOREIGN KEY (`id_tipo`) REFERENCES `tipo_quarto` (`id`);

--
-- Limitadores para a tabela `reserva`
--
ALTER TABLE `reserva`
  ADD CONSTRAINT `reserva_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `profile` (`id_user`);

--
-- Limitadores para a tabela `reserva_quarto`
--
ALTER TABLE `reserva_quarto`
  ADD CONSTRAINT `reserva_quarto_ibfk_1` FOREIGN KEY (`id_reserva`) REFERENCES `reserva` (`id`),
  ADD CONSTRAINT `reserva_quarto_ibfk_2` FOREIGN KEY (`id_quarto`) REFERENCES `quarto` (`num_quarto`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
