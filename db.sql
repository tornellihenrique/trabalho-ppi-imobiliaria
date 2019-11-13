-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 13/11/2019 às 14:10
-- Versão do servidor: 5.7.23-23
-- Versão do PHP: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `sweeth00_sweethome`
--
CREATE DATABASE IF NOT EXISTS `sweeth00_sweethome` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `sweeth00_sweethome`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `apartamentos`
--

DROP TABLE IF EXISTS `apartamentos`;
CREATE TABLE `apartamentos` (
  `id_imovel` int(11) NOT NULL,
  `qtd_quartos` int(11) DEFAULT NULL,
  `qtd_suites` int(11) DEFAULT NULL,
  `qtd_sala_estar` int(11) DEFAULT NULL,
  `qtd_sala_jantar` int(11) DEFAULT NULL,
  `qtd_vagas_garagem` int(11) DEFAULT NULL,
  `area` int(11) DEFAULT NULL,
  `armario_embutido` tinyint(1) DEFAULT NULL,
  `andar` int(11) DEFAULT NULL,
  `valor_condominio` decimal(10,2) DEFAULT NULL,
  `portaria_24h` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `bairros`
--

DROP TABLE IF EXISTS `bairros`;
CREATE TABLE `bairros` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `cargo`
--

DROP TABLE IF EXISTS `cargo`;
CREATE TABLE `cargo` (
  `id` int(11) NOT NULL,
  `descricao` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `casas`
--

DROP TABLE IF EXISTS `casas`;
CREATE TABLE `casas` (
  `id_imovel` int(11) NOT NULL,
  `qtd_quartos` int(11) DEFAULT NULL,
  `qtd_suites` int(11) DEFAULT NULL,
  `qtd_sala_estar` int(11) DEFAULT NULL,
  `qtd_sala_jantar` int(11) DEFAULT NULL,
  `qtd_vagas_garagem` int(11) DEFAULT NULL,
  `area` int(11) DEFAULT NULL,
  `armario_embutido` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `cep`
--

DROP TABLE IF EXISTS `cep`;
CREATE TABLE `cep` (
  `cep` int(11) NOT NULL,
  `rua` text NOT NULL,
  `cidade` text NOT NULL,
  `estado` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `clientes`
--

DROP TABLE IF EXISTS `clientes`;
CREATE TABLE `clientes` (
  `cpf` varchar(15) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `id_endereco` int(11) NOT NULL,
  `telefone_contato` varchar(30) DEFAULT NULL,
  `telefone_celular` varchar(30) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `sexo` varchar(2) DEFAULT NULL,
  `estado_civil` varchar(100) DEFAULT NULL,
  `profissao` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura para tabela `enderecos`
--

DROP TABLE IF EXISTS `enderecos`;
CREATE TABLE `enderecos` (
  `id` int(11) NOT NULL,
  `rua` varchar(200) NOT NULL,
  `numero` int(11) NOT NULL,
  `cep` int(8) NOT NULL,
  `cidade` varchar(100) NOT NULL,
  `estado_sigla` char(2) NOT NULL,
  `bairro_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `estados`
--

DROP TABLE IF EXISTS `estados`;
CREATE TABLE `estados` (
  `sigla` char(2) NOT NULL,
  `nome` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `fotos_imovel`
--

DROP TABLE IF EXISTS `fotos_imovel`;
CREATE TABLE `fotos_imovel` (
  `id_imovel` int(11) NOT NULL,
  `file_name` varchar(300) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `funcionarios`
--

DROP TABLE IF EXISTS `funcionarios`;
CREATE TABLE `funcionarios` (
  `usuario` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `senha` varchar(128) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `nome` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `cpf` varchar(14) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_endereco` int(11) DEFAULT NULL,
  `telefone_contato` varchar(14) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `telefone_celular` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `data_ingresso` date DEFAULT NULL,
  `id_cargo` int(2) DEFAULT NULL,
  `salario` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `imoveis`
--

DROP TABLE IF EXISTS `imoveis`;
CREATE TABLE `imoveis` (
  `id` int(11) NOT NULL,
  `id_cliente` varchar(15) NOT NULL,
  `id_tipo_imovel` int(11) NOT NULL,
  `id_endereco` int(11) NOT NULL,
  `categoria` varchar(2) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `disponivel` tinyint(1) NOT NULL,
  `valor` decimal(20,2) NOT NULL,
  `descricao` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `mensagens`
--

DROP TABLE IF EXISTS `mensagens`;
CREATE TABLE `mensagens` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefone` int(11) NOT NULL,
  `proposta` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `salas_comerciais`
--

DROP TABLE IF EXISTS `salas_comerciais`;
CREATE TABLE `salas_comerciais` (
  `id_imovel` int(11) NOT NULL,
  `area` int(11) DEFAULT NULL,
  `qtd_banheiros` int(11) DEFAULT NULL,
  `qtd_comodos` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `terrenos`
--

DROP TABLE IF EXISTS `terrenos`;
CREATE TABLE `terrenos` (
  `id_imovel` int(11) NOT NULL,
  `largura` int(11) DEFAULT NULL,
  `comprimento` int(11) DEFAULT NULL,
  `possui_aclive` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tipo_imovel`
--

DROP TABLE IF EXISTS `tipo_imovel`;
CREATE TABLE `tipo_imovel` (
  `id` int(11) NOT NULL,
  `descricao` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `apartamentos`
--
ALTER TABLE `apartamentos`
  ADD PRIMARY KEY (`id_imovel`);

--
-- Índices de tabela `bairros`
--
ALTER TABLE `bairros`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `casas`
--
ALTER TABLE `casas`
  ADD PRIMARY KEY (`id_imovel`);

--
-- Índices de tabela `cep`
--
ALTER TABLE `cep`
  ADD PRIMARY KEY (`cep`);

--
-- Índices de tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`cpf`);

--
-- Índices de tabela `enderecos`
--
ALTER TABLE `enderecos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `estados`
--
ALTER TABLE `estados`
  ADD PRIMARY KEY (`sigla`);

--
-- Índices de tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  ADD PRIMARY KEY (`usuario`);

--
-- Índices de tabela `imoveis`
--
ALTER TABLE `imoveis`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `mensagens`
--
ALTER TABLE `mensagens`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `salas_comerciais`
--
ALTER TABLE `salas_comerciais`
  ADD PRIMARY KEY (`id_imovel`);

--
-- Índices de tabela `terrenos`
--
ALTER TABLE `terrenos`
  ADD PRIMARY KEY (`id_imovel`);

--
-- Índices de tabela `tipo_imovel`
--
ALTER TABLE `tipo_imovel`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `bairros`
--
ALTER TABLE `bairros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `cargo`
--
ALTER TABLE `cargo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `enderecos`
--
ALTER TABLE `enderecos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `imoveis`
--
ALTER TABLE `imoveis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `mensagens`
--
ALTER TABLE `mensagens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tipo_imovel`
--
ALTER TABLE `tipo_imovel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
