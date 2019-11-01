-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 01-Nov-2019 às 04:01
-- Versão do servidor: 10.4.8-MariaDB
-- versão do PHP: 7.3.10

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
DROP DATABASE IF EXISTS `sweeth00_sweethome`;
CREATE DATABASE IF NOT EXISTS `sweeth00_sweethome` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `sweeth00_sweethome`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `apartamentos`
--

CREATE TABLE IF NOT EXISTS `apartamentos` (
  `id_imovel` int(11) NOT NULL,
  `qtd_quartos` int(11) DEFAULT NULL,
  `qtd_suites` int(11) DEFAULT NULL,
  `qtd_sala_estar` int(11) DEFAULT NULL,
  `qtd_sala_jantar` int(11) DEFAULT NULL,
  `qtd_vagas_garagem` int(11) DEFAULT NULL,
  `area` int(11) NOT NULL,
  `armario_embutido` tinyint(1) DEFAULT NULL,
  `descricao` text DEFAULT NULL,
  `andar` int(11) NOT NULL,
  `valor_condominio` decimal(10,2) NOT NULL,
  `portaria_24h` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id_imovel`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `bairros`
--

CREATE TABLE IF NOT EXISTS `bairros` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cargo`
--

CREATE TABLE IF NOT EXISTS `cargo` (
  `id_cargo` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_cargo`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `casas`
--

CREATE TABLE IF NOT EXISTS `casas` (
  `id_imovel` int(11) NOT NULL,
  `qtd_quartos` int(11) DEFAULT NULL,
  `qtd_suites` int(11) DEFAULT NULL,
  `qtd_sala_estar` int(11) DEFAULT NULL,
  `qtd_sala_jantar` int(11) DEFAULT NULL,
  `qtd_vagas_garagem` int(11) DEFAULT NULL,
  `area` int(11) NOT NULL,
  `armario_embutido` tinyint(1) DEFAULT NULL,
  `descricao` text DEFAULT NULL,
  PRIMARY KEY (`id_imovel`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE IF NOT EXISTS `clientes` (
  `cpf` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `id_endereco` int(11) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `sexo` varchar(1) NOT NULL,
  `estado_civil` varchar(100) NOT NULL,
  `profissao` varchar(100) NOT NULL,
  PRIMARY KEY (`cpf`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `enderecos`
--

CREATE TABLE IF NOT EXISTS `enderecos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rua` varchar(200) NOT NULL,
  `numero` int(11) NOT NULL,
  `cep` int(8) NOT NULL,
  `cidade` varchar(100) NOT NULL,
  `estado_sigla` char(2) NOT NULL,
  `bairro_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `estados`
--

CREATE TABLE IF NOT EXISTS `estados` (
  `sigla` char(2) NOT NULL,
  `nome` varchar(100) NOT NULL,
  PRIMARY KEY (`sigla`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `estados`
--

INSERT INTO `estados` (`sigla`, `nome`) VALUES
('AC', 'Acre'),
('AL', 'Alagoas'),
('AM', 'Amazonas'),
('AP', 'Amapá'),
('BA', 'Bahia'),
('CE', 'Ceará'),
('DF', 'Distrito Federal'),
('ES', 'Espírito Santo'),
('GO', 'Goiás'),
('MA', 'Maranhão'),
('MG', 'Minas Gerais'),
('MS', 'Mato Grosso do Sul'),
('MT', 'Mato Grosso'),
('PA', 'Pará'),
('PB', 'Paraíba'),
('PE', 'Pernambuco'),
('PI', 'Piauí'),
('PR', 'Paraná'),
('RJ', 'Rio de Janeiro'),
('RN', 'Rio Grande do Norte'),
('RO', 'Rondônia'),
('RR', 'Roraima'),
('RS', 'Rio Grande do Sul'),
('SC', 'Santa Catarina'),
('SE', 'Sergipe'),
('SP', 'São Paulo'),
('TO', 'Tocantins');

-- --------------------------------------------------------

--
-- Estrutura da tabela `fotos_imovel`
--

CREATE TABLE IF NOT EXISTS `fotos_imovel` (
  `id_imovel` int(11) NOT NULL,
  `url` varchar(300) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionarios`
--

CREATE TABLE IF NOT EXISTS `funcionarios` (
  `usuario` varchar(100) NOT NULL,
  `senha` varchar(128) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `telefone` varchar(100) DEFAULT NULL,
  `cpf` varchar(14) DEFAULT NULL,
  `id_endereco` int(11) DEFAULT NULL,
  `telefone_contato` varchar(14) DEFAULT NULL,
  `telefone_celular` varchar(15) DEFAULT NULL,
  `data_ingresso` date DEFAULT NULL,
  `id_cargo` int(2) DEFAULT NULL,
  `salario` double DEFAULT NULL,
  PRIMARY KEY (`usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `funcionarios`
--

INSERT INTO `funcionarios` (`usuario`, `senha`, `nome`, `telefone`, `cpf`, `id_endereco`, `telefone_contato`, `telefone_celular`, `data_ingresso`, `id_cargo`, `salario`) VALUES
('admin', '$2y$10$84ITFwt8Nw8PDDqytuemb.I45kv8GAG1or9pImqZBI36L.OMYA0Iy', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `imoveis`
--

CREATE TABLE IF NOT EXISTS `imoveis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_tipo_imovel` int(11) NOT NULL,
  `id_endereco` int(11) NOT NULL,
  `id_bairro` int(11) NOT NULL,
  `categoria` varchar(10) NOT NULL,
  `disponivel` tinyint(1) NOT NULL,
  `valor` decimal(20,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `mensagens`
--

CREATE TABLE IF NOT EXISTS `mensagens` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefone` int(11) NOT NULL,
  `proposta` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `salas_comerciais`
--

CREATE TABLE IF NOT EXISTS `salas_comerciais` (
  `id_imovel` int(11) NOT NULL,
  `area` int(11) NOT NULL,
  `qtd_banheiros` int(11) DEFAULT NULL,
  `qtd_comodos` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_imovel`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `terrenos`
--

CREATE TABLE IF NOT EXISTS `terrenos` (
  `id_imovel` int(11) NOT NULL,
  `largura` int(11) NOT NULL,
  `comprimento` int(11) NOT NULL,
  `possui_aclive` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id_imovel`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_imovel`
--

CREATE TABLE IF NOT EXISTS `tipo_imovel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tipo_imovel`
--

INSERT INTO `tipo_imovel` (`id`, `descricao`) VALUES
(1, 'Casa'),
(2, 'Apartamento'),
(3, 'Sala comercial'),
(4, 'Terreno');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
