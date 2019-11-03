-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 03-Nov-2019 às 21:59
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
CREATE DATABASE IF NOT EXISTS `sweeth00_sweethome` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `sweeth00_sweethome`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `apartamentos`
--

DROP TABLE IF EXISTS `apartamentos`;
CREATE TABLE IF NOT EXISTS `apartamentos` (
  `id_imovel` int(11) NOT NULL,
  `qtd_quartos` int(11) DEFAULT NULL,
  `qtd_suites` int(11) DEFAULT NULL,
  `qtd_sala_estar` int(11) DEFAULT NULL,
  `qtd_sala_jantar` int(11) DEFAULT NULL,
  `qtd_vagas_garagem` int(11) DEFAULT NULL,
  `area` int(11) DEFAULT NULL,
  `armario_embutido` tinyint(1) DEFAULT NULL,
  `descricao` text DEFAULT NULL,
  `andar` int(11) DEFAULT NULL,
  `valor_condominio` decimal(10,2) DEFAULT NULL,
  `portaria_24h` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id_imovel`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `apartamentos`
--

INSERT INTO `apartamentos` (`id_imovel`, `qtd_quartos`, `qtd_suites`, `qtd_sala_estar`, `qtd_sala_jantar`, `qtd_vagas_garagem`, `area`, `armario_embutido`, `descricao`, `andar`, `valor_condominio`, `portaria_24h`) VALUES
(19, 0, 0, 0, 0, 0, NULL, NULL, '', 0, '0.00', NULL),
(20, 0, 0, 0, 0, 0, 0, NULL, '', 0, '0.00', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `bairros`
--

DROP TABLE IF EXISTS `bairros`;
CREATE TABLE IF NOT EXISTS `bairros` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `bairros`
--

INSERT INTO `bairros` (`id`, `nome`) VALUES
(1, 'Centro');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cargo`
--

DROP TABLE IF EXISTS `cargo`;
CREATE TABLE IF NOT EXISTS `cargo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cargo`
--

INSERT INTO `cargo` (`id`, `descricao`) VALUES
(7, 'Padreiro'),
(8, 'Analista'),
(9, 'Médico'),
(10, 'Engenheiro'),
(11, 'Professor');

-- --------------------------------------------------------

--
-- Estrutura da tabela `casas`
--

DROP TABLE IF EXISTS `casas`;
CREATE TABLE IF NOT EXISTS `casas` (
  `id_imovel` int(11) NOT NULL,
  `qtd_quartos` int(11) DEFAULT NULL,
  `qtd_suites` int(11) DEFAULT NULL,
  `qtd_sala_estar` int(11) DEFAULT NULL,
  `qtd_sala_jantar` int(11) DEFAULT NULL,
  `qtd_vagas_garagem` int(11) DEFAULT NULL,
  `area` int(11) DEFAULT NULL,
  `armario_embutido` tinyint(1) DEFAULT NULL,
  `descricao` text DEFAULT NULL,
  PRIMARY KEY (`id_imovel`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `casas`
--

INSERT INTO `casas` (`id_imovel`, `qtd_quartos`, `qtd_suites`, `qtd_sala_estar`, `qtd_sala_jantar`, `qtd_vagas_garagem`, `area`, `armario_embutido`, `descricao`) VALUES
(18, 0, 0, 0, 0, 0, 0, NULL, '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

DROP TABLE IF EXISTS `clientes`;
CREATE TABLE IF NOT EXISTS `clientes` (
  `cpf` varchar(15) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `id_endereco` int(11) NOT NULL,
  `telefone_contato` varchar(30) DEFAULT NULL,
  `telefone_celular` varchar(30) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `sexo` varchar(2) DEFAULT NULL,
  `estado_civil` varchar(100) DEFAULT NULL,
  `profissao` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`cpf`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`cpf`, `nome`, `id_endereco`, `telefone_contato`, `telefone_celular`, `email`, `sexo`, `estado_civil`, `profissao`) VALUES
('12345678910', 'Joaquim Cliente', 21, '', '', 'joaquim@email.com', 'M', 'Solteiro', 'Engenheiro');

-- --------------------------------------------------------

--
-- Estrutura da tabela `enderecos`
--

DROP TABLE IF EXISTS `enderecos`;
CREATE TABLE IF NOT EXISTS `enderecos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rua` varchar(200) NOT NULL,
  `numero` int(11) NOT NULL,
  `cep` int(8) NOT NULL,
  `cidade` varchar(100) NOT NULL,
  `estado_sigla` char(2) NOT NULL,
  `bairro_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `enderecos`
--

INSERT INTO `enderecos` (`id`, `rua`, `numero`, `cep`, `cidade`, `estado_sigla`, `bairro_id`) VALUES
(21, 'Rua Professor Euler Lannes Bernardes', 123, 38408200, 'Uberlândia', 'MG', 1),
(22, 'Avenida 51', 669, 14780470, 'Barretos', 'SP', 1),
(23, 'Rua Miguel Rocha dos Santos', 123, 38408190, 'Uberlândia', 'MG', 1),
(24, 'Rua Miguel Rocha dos Santos', 123, 38408190, 'Uberlândia', 'MG', 1),
(25, '1231231', 123123, 12312312, 'asdasdáááá', 'AL', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `estados`
--

DROP TABLE IF EXISTS `estados`;
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

DROP TABLE IF EXISTS `fotos_imovel`;
CREATE TABLE IF NOT EXISTS `fotos_imovel` (
  `id_imovel` int(11) NOT NULL,
  `file_name` varchar(300) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `fotos_imovel`
--

INSERT INTO `fotos_imovel` (`id_imovel`, `file_name`) VALUES
(18, '18-0-2019-11-02-22-02-25.jpg'),
(18, '18-1-2019-11-02-22-02-25.png'),
(18, '18-2-2019-11-02-22-02-25.jpg'),
(19, '19-0-2019-11-02-22-07-44.gif'),
(19, '19-1-2019-11-02-22-07-44.png'),
(19, '19-2-2019-11-02-22-07-44.jpg'),
(19, '19-3-2019-11-02-22-07-44.jpg'),
(19, '19-4-2019-11-02-22-07-44.png'),
(19, '19-5-2019-11-02-22-07-44.jpg'),
(20, '20-0-2019-11-02-22-08-32.gif'),
(20, '20-1-2019-11-02-22-08-32.png'),
(20, '20-2-2019-11-02-22-08-32.jpg'),
(20, '20-3-2019-11-02-22-08-32.jpg'),
(20, '20-4-2019-11-02-22-08-32.png'),
(20, '20-5-2019-11-02-22-08-32.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionarios`
--

DROP TABLE IF EXISTS `funcionarios`;
CREATE TABLE IF NOT EXISTS `funcionarios` (
  `usuario` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `senha` varchar(128) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `nome` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `cpf` varchar(14) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_endereco` int(11) DEFAULT NULL,
  `telefone_contato` varchar(14) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `telefone_celular` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `data_ingresso` date DEFAULT NULL,
  `id_cargo` int(2) DEFAULT NULL,
  `salario` double DEFAULT NULL,
  PRIMARY KEY (`usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `funcionarios`
--

INSERT INTO `funcionarios` (`usuario`, `senha`, `nome`, `cpf`, `id_endereco`, `telefone_contato`, `telefone_celular`, `data_ingresso`, `id_cargo`, `salario`) VALUES
('admin', '$2y$10$84ITFwt8Nw8PDDqytuemb.I45kv8GAG1or9pImqZBI36L.OMYA0Iy', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('asdasd', '$2y$10$o.HZQV04iW8FIZoAl0fozu7w2vMDKY6zW.iF5vTF/tMg8qIRtELte', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('asdasda', '$2y$10$j26ItFIQWkQicIuw1udNreweWItxdxN18ztQoGZF6X/KEUQPRJkr6', 'Jóóóáááquim', '123.123.123-12', 25, '(12) 3123-1231', '(31) 23123-1231', '2019-11-07', 7, 123123);

-- --------------------------------------------------------

--
-- Estrutura da tabela `imoveis`
--

DROP TABLE IF EXISTS `imoveis`;
CREATE TABLE IF NOT EXISTS `imoveis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_cliente` varchar(15) NOT NULL,
  `id_tipo_imovel` int(11) NOT NULL,
  `id_endereco` int(11) NOT NULL,
  `categoria` varchar(2) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `disponivel` tinyint(1) NOT NULL,
  `valor` decimal(20,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `imoveis`
--

INSERT INTO `imoveis` (`id`, `id_cliente`, `id_tipo_imovel`, `id_endereco`, `categoria`, `disponivel`, `valor`) VALUES
(19, '12345678910', 2, 23, 'L', 1, '123123.00'),
(20, '12345678910', 2, 24, 'L', 1, '123123.00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `mensagens`
--

DROP TABLE IF EXISTS `mensagens`;
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

DROP TABLE IF EXISTS `salas_comerciais`;
CREATE TABLE IF NOT EXISTS `salas_comerciais` (
  `id_imovel` int(11) NOT NULL,
  `area` int(11) DEFAULT NULL,
  `qtd_banheiros` int(11) DEFAULT NULL,
  `qtd_comodos` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_imovel`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `terrenos`
--

DROP TABLE IF EXISTS `terrenos`;
CREATE TABLE IF NOT EXISTS `terrenos` (
  `id_imovel` int(11) NOT NULL,
  `largura` int(11) DEFAULT NULL,
  `comprimento` int(11) DEFAULT NULL,
  `possui_aclive` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id_imovel`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_imovel`
--

DROP TABLE IF EXISTS `tipo_imovel`;
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
