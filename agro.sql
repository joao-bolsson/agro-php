-- phpMyAdmin SQL Dump
-- version 4.6.6deb1+deb.cihar.com~xenial.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 26/10/2018 às 22:53
-- Versão do servidor: 5.7.24-0ubuntu0.16.04.1
-- Versão do PHP: 7.0.32-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `agro`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `colheita`
--

CREATE TABLE `colheita` (
  `id_safra` int(10) UNSIGNED NOT NULL,
  `mao_de_obra` float(10,2) NOT NULL,
  `maquinario` float(10,2) NOT NULL,
  `transporte` float(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `colheita`
--

INSERT INTO `colheita` (`id_safra`, `mao_de_obra`, `maquinario`, `transporte`) VALUES
(1, 1029.00, 18271.00, 18271.00),
(3, 1029.00, 1827111.00, 18271.00);

-- --------------------------------------------------------

--
-- Estrutura para tabela `cultura`
--

CREATE TABLE `cultura` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `id_tipo` tinyint(3) UNSIGNED NOT NULL,
  `nome` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `cultura`
--

INSERT INTO `cultura` (`id`, `id_tipo`, `nome`) VALUES
(1, 1, 'Soja'),
(2, 1, 'Trigo'),
(3, 2, 'Pessego');

-- --------------------------------------------------------

--
-- Estrutura para tabela `defensivo`
--

CREATE TABLE `defensivo` (
  `id_manutencao` int(10) UNSIGNED NOT NULL,
  `id_prod` int(10) UNSIGNED NOT NULL,
  `aplicacoes` tinyint(3) UNSIGNED NOT NULL,
  `valor` float(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `defensivo`
--

INSERT INTO `defensivo` (`id_manutencao`, `id_prod`, `aplicacoes`, `valor`) VALUES
(2, 1, 1, 19281.04),
(2, 2, 1, 1718.02);

-- --------------------------------------------------------

--
-- Estrutura para tabela `estoque`
--

CREATE TABLE `estoque` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_usuario` int(10) UNSIGNED NOT NULL,
  `id_tipo` tinyint(3) UNSIGNED NOT NULL,
  `cod` varchar(10) NOT NULL,
  `descricao` varchar(80) NOT NULL,
  `unidade` varchar(5) DEFAULT NULL,
  `qtd` int(10) UNSIGNED NOT NULL,
  `vl_unitario` float(10,2) NOT NULL,
  `vl_total` float(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `estoque`
--

INSERT INTO `estoque` (`id`, `id_usuario`, `id_tipo`, `cod`, `descricao`, `unidade`, `qtd`, `vl_unitario`, `vl_total`) VALUES
(1, 1, 1, 'YAHAK', 'Herbicida 1', 'L', 80, 19281.04, 1542483.25),
(2, 1, 2, 'YAHAK', 'Herbicida 2', 'L', 189, 1718.02, 324705.78);

-- --------------------------------------------------------

--
-- Estrutura para tabela `implantacao`
--

CREATE TABLE `implantacao` (
  `id_safra` int(10) UNSIGNED NOT NULL,
  `mao_de_obra` float(10,2) NOT NULL,
  `maquinario` float(10,2) NOT NULL,
  `adubacao` float(10,2) NOT NULL,
  `semeadura` float(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `implantacao`
--

INSERT INTO `implantacao` (`id_safra`, `mao_de_obra`, `maquinario`, `adubacao`, `semeadura`) VALUES
(1, 18908.28, 13000.00, 15000.89, 13789.67),
(2, 1029.00, 18271.00, 18271.00, 18271.00),
(3, 1029.00, 18271.00, 18271.00, 18271.00);

-- --------------------------------------------------------

--
-- Estrutura para tabela `manutencao`
--

CREATE TABLE `manutencao` (
  `id_safra` int(10) UNSIGNED NOT NULL,
  `mao_de_obra` float(10,2) NOT NULL,
  `maquinario` float(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `manutencao`
--

INSERT INTO `manutencao` (`id_safra`, `mao_de_obra`, `maquinario`) VALUES
(1, 1029.00, 18271.00),
(3, 2718.00, 18271.00);

-- --------------------------------------------------------

--
-- Estrutura para tabela `safras`
--

CREATE TABLE `safras` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_usuario` int(10) UNSIGNED NOT NULL,
  `id_cultura` smallint(5) UNSIGNED NOT NULL,
  `inicio` date NOT NULL,
  `fim` date DEFAULT NULL,
  `producao` int(10) UNSIGNED DEFAULT NULL,
  `saldo` int(10) UNSIGNED DEFAULT NULL,
  `total_venda` float(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `safras`
--

INSERT INTO `safras` (`id`, `id_usuario`, `id_cultura`, `inicio`, `fim`, `producao`, `saldo`, `total_venda`) VALUES
(1, 1, 1, '2018-10-25', NULL, NULL, NULL, NULL),
(2, 1, 2, '2018-10-26', NULL, NULL, NULL, NULL),
(3, 1, 3, '2018-10-26', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tipo_cultura`
--

CREATE TABLE `tipo_cultura` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `nome` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `tipo_cultura`
--

INSERT INTO `tipo_cultura` (`id`, `nome`) VALUES
(1, 'Graos'),
(2, 'Hortifruti');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tipo_prod`
--

CREATE TABLE `tipo_prod` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `nome_tipo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `tipo_prod`
--

INSERT INTO `tipo_prod` (`id`, `nome_tipo`) VALUES
(1, 'Herbicida'),
(2, 'Fungicida'),
(3, 'Inseticida');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(50) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `senha` varchar(34) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `email`, `senha`) VALUES
(1, 'JoÃ£o', 'joaovictorbolsson@gmail.com', '$1$j:[]bols$R6OLMXI342SLR1EtzE9v40'),
(2, 'Jean Masvi', 'jean@gmail.com', '$1$j:[]bols$eY8V1rUEHNxXEFdv5/qhK1');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario_permissoes`
--

CREATE TABLE `usuario_permissoes` (
  `id_usuario` int(10) UNSIGNED NOT NULL,
  `produtor` tinyint(1) NOT NULL,
  `agronomo` tinyint(1) NOT NULL,
  `cooperativa` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `usuario_permissoes`
--

INSERT INTO `usuario_permissoes` (`id_usuario`, `produtor`, `agronomo`, `cooperativa`) VALUES
(1, 1, 0, 0),
(2, 1, 0, 0);

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `colheita`
--
ALTER TABLE `colheita`
  ADD KEY `id_safra` (`id_safra`);

--
-- Índices de tabela `cultura`
--
ALTER TABLE `cultura`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_tipo` (`id_tipo`);

--
-- Índices de tabela `defensivo`
--
ALTER TABLE `defensivo`
  ADD PRIMARY KEY (`id_manutencao`,`id_prod`),
  ADD KEY `id_prod` (`id_prod`);

--
-- Índices de tabela `estoque`
--
ALTER TABLE `estoque`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_tipo` (`id_tipo`);

--
-- Índices de tabela `implantacao`
--
ALTER TABLE `implantacao`
  ADD PRIMARY KEY (`id_safra`);

--
-- Índices de tabela `manutencao`
--
ALTER TABLE `manutencao`
  ADD PRIMARY KEY (`id_safra`);

--
-- Índices de tabela `safras`
--
ALTER TABLE `safras`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_cultura` (`id_cultura`);

--
-- Índices de tabela `tipo_cultura`
--
ALTER TABLE `tipo_cultura`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tipo_prod`
--
ALTER TABLE `tipo_prod`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `usuario_permissoes`
--
ALTER TABLE `usuario_permissoes`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `cultura`
--
ALTER TABLE `cultura`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de tabela `estoque`
--
ALTER TABLE `estoque`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de tabela `safras`
--
ALTER TABLE `safras`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de tabela `tipo_cultura`
--
ALTER TABLE `tipo_cultura`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de tabela `tipo_prod`
--
ALTER TABLE `tipo_prod`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `colheita`
--
ALTER TABLE `colheita`
  ADD CONSTRAINT `colheita_ibfk_1` FOREIGN KEY (`id_safra`) REFERENCES `safras` (`id`);

--
-- Restrições para tabelas `cultura`
--
ALTER TABLE `cultura`
  ADD CONSTRAINT `cultura_ibfk_1` FOREIGN KEY (`id_tipo`) REFERENCES `tipo_cultura` (`id`);

--
-- Restrições para tabelas `defensivo`
--
ALTER TABLE `defensivo`
  ADD CONSTRAINT `defensivo_ibfk_2` FOREIGN KEY (`id_prod`) REFERENCES `estoque` (`id`),
  ADD CONSTRAINT `defensivo_ibfk_3` FOREIGN KEY (`id_manutencao`) REFERENCES `safras` (`id`);

--
-- Restrições para tabelas `estoque`
--
ALTER TABLE `estoque`
  ADD CONSTRAINT `estoque_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `estoque_ibfk_2` FOREIGN KEY (`id_tipo`) REFERENCES `tipo_prod` (`id`);

--
-- Restrições para tabelas `implantacao`
--
ALTER TABLE `implantacao`
  ADD CONSTRAINT `implantacao_ibfk_1` FOREIGN KEY (`id_safra`) REFERENCES `safras` (`id`);

--
-- Restrições para tabelas `manutencao`
--
ALTER TABLE `manutencao`
  ADD CONSTRAINT `manutencao_ibfk_1` FOREIGN KEY (`id_safra`) REFERENCES `safras` (`id`);

--
-- Restrições para tabelas `safras`
--
ALTER TABLE `safras`
  ADD CONSTRAINT `safras_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `safras_ibfk_2` FOREIGN KEY (`id_cultura`) REFERENCES `cultura` (`id`);

--
-- Restrições para tabelas `usuario_permissoes`
--
ALTER TABLE `usuario_permissoes`
  ADD CONSTRAINT `usuario_permissoes_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
