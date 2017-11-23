-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 23-Nov-2017 às 02:27
-- Versão do servidor: 5.7.17
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gsvieira.dashboard`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('sn83iii16vsb7u460f5cme319dcbpk8r', '127.0.0.1', 1511399888, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531313339393838373b757365725f6e616d655f6c6f67696e7c733a353a2241646d696e223b757365725f69645f6c6f67696e7c733a313a2237223b757365725f6c6f67696e7c623a313b7573756172696f5f677275706f5f69647c733a323a223439223b),
('er8b90p8q4a0567b5h5roj9gc852ot07', '127.0.0.1', 1511394771, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531313339343531353b757365725f6e616d655f6c6f67696e7c733a353a2241646d696e223b757365725f69645f6c6f67696e7c733a313a2237223b757365725f6c6f67696e7c623a313b7573756172696f5f677275706f5f69647c733a323a223439223b),
('pnl35tpomduqtvbcu9pg3eb651cblhmv', '127.0.0.1', 1511012614, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531313031323631343b),
('1rn77022r9ugk3k78cmtak351cfamcnt', '127.0.0.1', 1511394941, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531313339343934313b757365725f6e616d655f6c6f67696e7c733a353a2241646d696e223b757365725f69645f6c6f67696e7c733a313a2237223b757365725f6c6f67696e7c623a313b7573756172696f5f677275706f5f69647c733a323a223439223b),
('2p8jvs5qhuss6b35g86o74unkkr8mka0', '127.0.0.1', 1511012278, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531313031323234363b757365725f6e616d655f6c6f67696e7c733a31343a224761627269656c20566965697261223b757365725f69645f6c6f67696e7c733a313a2237223b757365725f6c6f67696e7c623a313b7573756172696f5f677275706f5f69647c733a323a223439223b),
('uk79p3mgf2qfq4clalrl03707178otm4', '127.0.0.1', 1511012221, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531313031313934353b757365725f6e616d655f6c6f67696e7c733a31343a224761627269656c20566965697261223b757365725f69645f6c6f67696e7c733a313a2237223b757365725f6c6f67696e7c623a313b7573756172696f5f677275706f5f69647c733a323a223439223b),
('kpo8cu4tfgkf757it00ttijb3po6svi9', '127.0.0.1', 1511005659, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531313030353337323b757365725f6e616d655f6c6f67696e7c733a31343a224761627269656c20566965697261223b757365725f69645f6c6f67696e7c733a313a2237223b757365725f6c6f67696e7c623a313b7573756172696f5f677275706f5f69647c733a323a223439223b),
('iu72n9r6m6ptqtnjtscvtm99vv12pe0t', '127.0.0.1', 1511005806, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531313030353639343b757365725f6e616d655f6c6f67696e7c733a31343a224761627269656c20566965697261223b757365725f69645f6c6f67696e7c733a313a2237223b757365725f6c6f67696e7c623a313b7573756172696f5f677275706f5f69647c733a323a223439223b),
('jfo037qfp9ln6eq3gjqbnu29u7t5o08j', '127.0.0.1', 1511006947, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531313030363934343b757365725f6e616d655f6c6f67696e7c733a31343a224761627269656c20566965697261223b757365725f69645f6c6f67696e7c733a313a2237223b757365725f6c6f67696e7c623a313b7573756172696f5f677275706f5f69647c733a323a223439223b),
('l701vhockgr0pcubg5cd9sqhve1k30rm', '127.0.0.1', 1511008053, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531313030373830373b757365725f6e616d655f6c6f67696e7c733a31343a224761627269656c20566965697261223b757365725f69645f6c6f67696e7c733a313a2237223b757365725f6c6f67696e7c623a313b7573756172696f5f677275706f5f69647c733a323a223439223b),
('tvkqt6nuk1ouasdonduijccg1j0j5b4a', '127.0.0.1', 1511011652, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531313031313436303b757365725f6e616d655f6c6f67696e7c733a31343a224761627269656c20566965697261223b757365725f69645f6c6f67696e7c733a313a2237223b757365725f6c6f67696e7c623a313b7573756172696f5f677275706f5f69647c733a323a223439223b),
('rj3vhjnp9ret62ugb3582o2538uq7pi8', '127.0.0.1', 1511009382, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531313030393236383b757365725f6e616d655f6c6f67696e7c733a31343a224761627269656c20566965697261223b757365725f69645f6c6f67696e7c733a313a2237223b757365725f6c6f67696e7c623a313b7573756172696f5f677275706f5f69647c733a323a223439223b),
('vstshh62tpkoneak5kdqvfkokro4oauq', '127.0.0.1', 1511008682, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531313030383637353b757365725f6e616d655f6c6f67696e7c733a31343a224761627269656c20566965697261223b757365725f69645f6c6f67696e7c733a313a2237223b757365725f6c6f67696e7c623a313b7573756172696f5f677275706f5f69647c733a323a223439223b),
('7smb02n055661utk8kk4kljse272r0h8', '127.0.0.1', 1511008474, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531313030383233333b757365725f6e616d655f6c6f67696e7c733a31343a224761627269656c20566965697261223b757365725f69645f6c6f67696e7c733a313a2237223b757365725f6c6f67696e7c623a313b7573756172696f5f677275706f5f69647c733a323a223439223b);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoa`
--

CREATE TABLE `pessoa` (
  `id` bigint(20) NOT NULL,
  `cd_pessoa` int(11) NOT NULL,
  `ds_nome` varchar(80) DEFAULT NULL,
  `ds_documento` varchar(20) DEFAULT NULL,
  `dt_nascimento` datetime DEFAULT NULL,
  `nr_telefone` varchar(20) DEFAULT NULL,
  `tp_pessoa` tinyint(4) DEFAULT NULL,
  `ds_email` varchar(150) DEFAULT NULL,
  `dt_criacao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `usuario_id` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `table_sequence`
--

CREATE TABLE `table_sequence` (
  `id` bigint(20) NOT NULL,
  `nr_versao` bigint(20) NOT NULL,
  `ds_denominacao` varchar(40) DEFAULT NULL,
  `ds_chave` varchar(40) NOT NULL,
  `cd_proximo_codigo` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `table_sequence`
--

INSERT INTO `table_sequence` (`id`, `nr_versao`, `ds_denominacao`, `ds_chave`, `cd_proximo_codigo`) VALUES
(6, 0, 'usuario_grupo', '1', 10),
(8, 0, 'usuario_grupo', 'cd_usuario_grupo', 25),
(11, 0, 'usuario', 'cd_usuario', 6),
(13, 0, 'pessoa', 'cd_pessoa', 9);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` bigint(20) NOT NULL,
  `cd_usuario` int(11) DEFAULT NULL,
  `ds_nome` varchar(80) NOT NULL,
  `ds_email` varchar(80) NOT NULL,
  `ds_login` varchar(80) NOT NULL,
  `ds_senha` varchar(45) NOT NULL,
  `nr_telefone` varchar(20) NOT NULL,
  `fl_situacao` tinyint(1) NOT NULL,
  `dt_criacao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `usuario_grupo_id` bigint(20) DEFAULT NULL,
  `ds_avatar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `cd_usuario`, `ds_nome`, `ds_email`, `ds_login`, `ds_senha`, `nr_telefone`, `fl_situacao`, `dt_criacao`, `usuario_grupo_id`, `ds_avatar`) VALUES
(7, 1, 'Admin', 'gabrielvra@outlook.com', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', '(47) 99999-9999', 1, '2017-11-11 10:31:19', 49, 'assets/images/avatars/_7_thumb_19429983_10207361479635067_8926512164581261108_n.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario_grupo`
--

CREATE TABLE `usuario_grupo` (
  `id` bigint(20) NOT NULL,
  `cd_usuario_grupo` bigint(20) DEFAULT NULL,
  `ds_denominacao` varchar(80) NOT NULL,
  `ds_chave` text,
  `fl_situacao` tinyint(1) DEFAULT NULL,
  `dt_criacao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario_grupo`
--

INSERT INTO `usuario_grupo` (`id`, `cd_usuario_grupo`, `ds_denominacao`, `ds_chave`, `fl_situacao`, `dt_criacao`) VALUES
(49, 1, 'Administrador', 'a:24:{s:12:\"-r-dashboard\";s:1:\"1\";s:12:\"-c-dashboard\";s:1:\"1\";s:12:\"-u-dashboard\";s:1:\"1\";s:12:\"-d-dashboard\";s:1:\"1\";s:15:\"-r-grupousuario\";s:1:\"1\";s:15:\"-c-grupousuario\";s:1:\"1\";s:15:\"-u-grupousuario\";s:1:\"1\";s:15:\"-d-grupousuario\";s:1:\"1\";s:11:\"-r-entidade\";s:1:\"1\";s:11:\"-c-entidade\";s:1:\"1\";s:11:\"-u-entidade\";s:1:\"1\";s:11:\"-d-entidade\";s:1:\"1\";s:10:\"-r-usuario\";s:1:\"1\";s:10:\"-c-usuario\";s:1:\"1\";s:10:\"-u-usuario\";s:1:\"1\";s:10:\"-d-usuario\";s:1:\"1\";s:9:\"-r-pessoa\";s:1:\"1\";s:9:\"-c-pessoa\";s:1:\"1\";s:9:\"-u-pessoa\";s:1:\"1\";s:9:\"-d-pessoa\";s:1:\"1\";s:8:\"-r-sobre\";s:1:\"1\";s:8:\"-c-sobre\";s:1:\"1\";s:8:\"-u-sobre\";s:1:\"1\";s:8:\"-d-sobre\";s:1:\"1\";}', 1, '2017-11-11 10:30:33'),
(50, 2, 'Visualizar', 'a:24:{s:12:\"-r-dashboard\";s:1:\"1\";s:12:\"-c-dashboard\";s:0:\"\";s:12:\"-u-dashboard\";s:0:\"\";s:12:\"-d-dashboard\";s:0:\"\";s:15:\"-r-grupousuario\";s:1:\"1\";s:15:\"-c-grupousuario\";s:0:\"\";s:15:\"-u-grupousuario\";s:0:\"\";s:15:\"-d-grupousuario\";s:0:\"\";s:11:\"-r-entidade\";s:1:\"1\";s:11:\"-c-entidade\";s:0:\"\";s:11:\"-u-entidade\";s:0:\"\";s:11:\"-d-entidade\";s:0:\"\";s:10:\"-r-usuario\";s:1:\"1\";s:10:\"-c-usuario\";s:0:\"\";s:10:\"-u-usuario\";s:0:\"\";s:10:\"-d-usuario\";s:0:\"\";s:9:\"-r-pessoa\";s:1:\"1\";s:9:\"-c-pessoa\";s:0:\"\";s:9:\"-u-pessoa\";s:0:\"\";s:9:\"-d-pessoa\";s:0:\"\";s:8:\"-r-sobre\";s:1:\"1\";s:8:\"-c-sobre\";s:0:\"\";s:8:\"-u-sobre\";s:0:\"\";s:8:\"-d-sobre\";s:0:\"\";}', 1, '2017-11-11 12:23:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ci_sessions_id_ip` (`id`,`ip_address`),
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indexes for table `pessoa`
--
ALTER TABLE `pessoa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pessoa_usuario_idx` (`usuario_id`);

--
-- Indexes for table `table_sequence`
--
ALTER TABLE `table_sequence`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cd_chave` (`ds_denominacao`,`ds_chave`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_usuario_usuario_grupo_idx` (`usuario_grupo_id`);

--
-- Indexes for table `usuario_grupo`
--
ALTER TABLE `usuario_grupo`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pessoa`
--
ALTER TABLE `pessoa`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `table_sequence`
--
ALTER TABLE `table_sequence`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `usuario_grupo`
--
ALTER TABLE `usuario_grupo`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `pessoa`
--
ALTER TABLE `pessoa`
  ADD CONSTRAINT `fk_pessoa_usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_usuario_usuario_grupo` FOREIGN KEY (`usuario_grupo_id`) REFERENCES `usuario_grupo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
