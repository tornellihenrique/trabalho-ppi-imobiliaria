-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 13/11/2019 às 19:01
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

--
-- Fazendo dump de dados para tabela `apartamentos`
--

INSERT INTO `apartamentos` (`id_imovel`, `qtd_quartos`, `qtd_suites`, `qtd_sala_estar`, `qtd_sala_jantar`, `qtd_vagas_garagem`, `area`, `armario_embutido`, `andar`, `valor_condominio`, `portaria_24h`) VALUES
(21, 2, 2, 1, 1, 1, 60, 1, 5, '120.00', 0),
(24, 1, 1, 1, 0, 1, 20, 1, 4, '200.00', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `bairros`
--

DROP TABLE IF EXISTS `bairros`;
CREATE TABLE `bairros` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `bairros`
--

INSERT INTO `bairros` (`id`, `nome`) VALUES
(1, 'Centro'),
(2, 'Santa Mônica'),
(3, 'Martins'),
(4, 'Jardim de Alah');

-- --------------------------------------------------------

--
-- Estrutura para tabela `cargo`
--

DROP TABLE IF EXISTS `cargo`;
CREATE TABLE `cargo` (
  `id` int(11) NOT NULL,
  `descricao` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `cargo`
--

INSERT INTO `cargo` (`id`, `descricao`) VALUES
(7, 'Gerente'),
(8, 'Funcionário'),
(12, 'Secretario');

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

--
-- Fazendo dump de dados para tabela `casas`
--

INSERT INTO `casas` (`id_imovel`, `qtd_quartos`, `qtd_suites`, `qtd_sala_estar`, `qtd_sala_jantar`, `qtd_vagas_garagem`, `area`, `armario_embutido`) VALUES
(22, 3, 2, 2, 2, 4, 300, 1),
(23, 2, 2, 1, 1, 2, 100, 0);

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

--
-- Fazendo dump de dados para tabela `cep`
--

INSERT INTO `cep` (`cep`, `rua`, `cidade`, `estado`) VALUES
(14780470, 'Avenida 51', 'Barretos', 'SP'),
(38408190, 'Rua Miguel Rocha dos Santos', 'Uberlândia', 'MG'),
(38408432, 'Rua São Francisco de Assis', 'Uberlândia', 'MG');

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

--
-- Fazendo dump de dados para tabela `clientes`
--

INSERT INTO `clientes` (`cpf`, `nome`, `id_endereco`, `telefone_contato`, `telefone_celular`, `email`, `sexo`, `estado_civil`, `profissao`) VALUES
('12344476336', 'Gugu Liberato', 36, '(42) 3232-4490', '(34) 99854-0420', 'domingolegal@hotmail.com', 'M', 'Divorciado', 'Apresentador'),
('12345678910', 'Joaquim Cliente', 21, '', '', 'joaquim@email.com', 'M', 'Solteiro', 'Engenheiro'),
('23146579828', 'Silvio Santos', 35, '', '(34) 99285-1331', 'silviomahoe@gmail.com', 'M', 'Casado', 'Apresentador'),
('96345636922', 'Ana Hickmann', 37, '(45) 9966-4213', '(45) 96876-2590', 'anaricademais@yahoo.com.br', 'F', 'Solteiro', 'Apresentadora');

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

--
-- Fazendo dump de dados para tabela `enderecos`
--

INSERT INTO `enderecos` (`id`, `rua`, `numero`, `cep`, `cidade`, `estado_sigla`, `bairro_id`) VALUES
(26, 'Rua Miguel Rocha dos Santos', 123, 38408190, 'Uberlândia', 'MG', 1),
(30, 'Avenida 51', 455, 14780470, 'Barretos', 'SP', 4),
(31, 'Rua Miguel Rocha dos Santos', 6778, 38408190, 'Uberlândia', 'MG', 2),
(32, 'Rua Demacol Laranja', 3, 38408777, 'Uberlândia', 'MG', 1),
(33, 'Rua Almirante Talos', 50, 38408346, 'Uberlândia', 'MG', 2),
(34, 'Rua Nikola Tesla ', 943, 38408724, 'Uberlândia', 'MG', 3),
(35, 'Rua do SBT', 777, 38420876, 'Rio de Janeiro', 'RJ', 2),
(36, 'Rua da Record', 999, 38523862, 'São Paulo', 'SP', 1),
(37, 'Rua das Ricas', 222, 38433912, 'Rio de Janeiro', 'RJ', 4),
(38, 'Rua dos Coqueiros', 122, 23855230, 'Itaguaí', 'RJ', 2),
(39, 'Rua C', 345, 25256120, 'Duque de Caxias', 'RJ', 1),
(40, 'Rua Coimbra', 0, 26090020, 'Adrianópolis', 'RJ', 4),
(41, 'Quadra QNO 16 Conjunto 42', 667, 72260642, 'Brasília', 'DF', 3),
(42, 'Rua Miguel Rocha dos Santos', 123123, 38408190, 'Uberlândia', 'MG', 2);

-- --------------------------------------------------------

--
-- Estrutura para tabela `estados`
--

DROP TABLE IF EXISTS `estados`;
CREATE TABLE `estados` (
  `sigla` char(2) NOT NULL,
  `nome` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `estados`
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
-- Estrutura para tabela `fotos_imovel`
--

DROP TABLE IF EXISTS `fotos_imovel`;
CREATE TABLE `fotos_imovel` (
  `id_imovel` int(11) NOT NULL,
  `file_name` varchar(300) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `fotos_imovel`
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
(20, '20-5-2019-11-02-22-08-32.jpg'),
(21, '21-0-2019-11-10-22-17-30.png'),
(21, '21-1-2019-11-10-22-17-30.png'),
(21, '21-2-2019-11-10-22-17-30.png'),
(21, '21-3-2019-11-10-22-17-30.png'),
(21, '21-4-2019-11-10-22-17-30.png'),
(21, '21-5-2019-11-10-22-17-30.png'),
(22, '22-0-2019-11-10-22-20-00.jpeg'),
(22, '22-1-2019-11-10-22-20-00.jpeg'),
(22, '22-2-2019-11-10-22-20-00.jpeg'),
(22, '22-3-2019-11-10-22-20-00.jpeg'),
(22, '22-4-2019-11-10-22-20-00.jpeg'),
(22, '22-5-2019-11-10-22-20-00.jpeg'),
(23, '23-0-2019-11-13-17-37-48.jpeg'),
(23, '23-1-2019-11-13-17-37-48.jpeg'),
(23, '23-2-2019-11-13-17-37-48.jpeg'),
(23, '23-3-2019-11-13-17-37-48.jpeg'),
(24, '24-0-2019-11-13-18-28-24.jpg'),
(24, '24-1-2019-11-13-18-28-24.jpg'),
(24, '24-2-2019-11-13-18-28-24.jpg'),
(25, '25-0-2019-11-13-18-35-35.jpg'),
(26, '26-0-2019-11-13-18-42-34.jpg');

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

--
-- Fazendo dump de dados para tabela `funcionarios`
--

INSERT INTO `funcionarios` (`usuario`, `senha`, `nome`, `cpf`, `id_endereco`, `telefone_contato`, `telefone_celular`, `data_ingresso`, `id_cargo`, `salario`) VALUES
('admin', '$2y$10$84ITFwt8Nw8PDDqytuemb.I45kv8GAG1or9pImqZBI36L.OMYA0Iy', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('chico_puffpuff', '$2y$10$wW/zr4RSfBq3pVuhZSUe9exl6AxWgDzrUZQ7AnDr3kIj9PsgfYUL.', 'Chico Bioca', '344.567.822-90', 33, '(35) 9765-0034', '(34) 99173-5560', '2017-04-15', 12, 2000),
('henrique', '$2y$10$t/gjl8CIyIgi5Os4aMuV4O2iPonb9Y5PfHOUFY9q4Hgq6KqjzhnEC', 'Henrique Tornelli ', '487.385.078-97', 42, '(12) 3123-1231', '(31) 23123-1231', '0000-00-00', 7, 0),
('jailson_ursinho', '$2y$10$yAU0ciXaPXq0rTaCLeJwWetyk21dLdTeLLfJygNSYCuLOFjRWzymO', 'Jailson Mendes', '123.369.248-18', 32, '(69) 4002-8922', '(34) 99199-7223', '2013-01-31', 12, 2000),
('joaquim123', '$2y$10$HFjKzOYga8ePr.Ek.FzoBOol.183hO12LuMvZmk3SNzgzsUMx43uC', 'Funcionario Joaquim', '123.456.789-10', 26, '(12) 3123-1231', '(31) 23123-1231', '2019-11-03', 7, 12000),
('melon_musk', '$2y$10$6byKO28QRK4LuSmwooEAh..xN3sy3k5n6AWDnuOH54UPOZWxqBRBO', 'Elon Musk', '781.333.982-44', 34, '(56) 9997-6632', '(34) 99076-4321', '2015-07-20', 8, 1500),
('milos_dota', '$2y$10$ctsjiCRHBNXw3OptT/YCr.Ol0bz52w9iOJgYcHT0mnBd2Yf5fYd2a', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

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

--
-- Fazendo dump de dados para tabela `imoveis`
--

INSERT INTO `imoveis` (`id`, `id_cliente`, `id_tipo_imovel`, `id_endereco`, `categoria`, `disponivel`, `valor`, `descricao`) VALUES
(21, '12345678910', 2, 30, 'A', 1, '120000.00', 'Apartamento aquisição 2 quartos 2 suites'),
(22, '12345678910', 1, 31, 'L', 1, '5000.00', 'Casa aluguel 3 quartos 2 suites 2 sala estar piscina'),
(23, '23146579828', 1, 38, 'A', 1, '200000.00', 'Uma casa estilo americano. Luxuosa e extremamente agradável ao olhos'),
(24, '12345678910', 2, 39, 'L', 1, '1000.00', 'Um apartamento luxuoso e encantador, de grande beleza, conforto e modernidade'),
(25, '12344476336', 4, 40, 'A', 1, '10000.00', 'Um terreno limpo e bem cuidado, em uma região requisitada e segura'),
(26, '96345636922', 3, 41, 'L', 0, '1200.00', 'Uma sala elegante e totalmente equipada, com acústica isolada, para reuniões executivas ');

-- --------------------------------------------------------

--
-- Estrutura para tabela `mensagens`
--

DROP TABLE IF EXISTS `mensagens`;
CREATE TABLE `mensagens` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefone` varchar(16) NOT NULL,
  `proposta` text NOT NULL,
  `id_imovel` int(11) NOT NULL
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

--
-- Fazendo dump de dados para tabela `salas_comerciais`
--

INSERT INTO `salas_comerciais` (`id_imovel`, `area`, `qtd_banheiros`, `qtd_comodos`) VALUES
(26, 25, 2, 1);

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

--
-- Fazendo dump de dados para tabela `terrenos`
--

INSERT INTO `terrenos` (`id_imovel`, `largura`, `comprimento`, `possui_aclive`) VALUES
(25, 10, 20, 0);

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
-- Fazendo dump de dados para tabela `tipo_imovel`
--

INSERT INTO `tipo_imovel` (`id`, `descricao`) VALUES
(1, 'Casa'),
(2, 'Apartamento'),
(3, 'Sala comercial'),
(4, 'Terreno');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `cargo`
--
ALTER TABLE `cargo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `enderecos`
--
ALTER TABLE `enderecos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT de tabela `imoveis`
--
ALTER TABLE `imoveis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de tabela `mensagens`
--
ALTER TABLE `mensagens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `tipo_imovel`
--
ALTER TABLE `tipo_imovel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
