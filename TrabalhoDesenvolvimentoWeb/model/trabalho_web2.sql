-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 28-Jun-2021 às 06:29
-- Versão do servidor: 10.4.17-MariaDB
-- versão do PHP: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `trabalho_web2`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `imovel`
--

CREATE TABLE `imovel` (
  `codigo` smallint(6) NOT NULL,
  `situacao` varchar(255) NOT NULL,
  `tipoimovel` varchar(255) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `aluguel` varchar(255) NOT NULL,
  `codpessoa` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `imovel`
--

INSERT INTO `imovel` (`codigo`, `situacao`, `tipoimovel`, `descricao`, `aluguel`, `codpessoa`) VALUES
(6, 'alugar/vender.', 'sitio', '2.5 hectares', '500,00', 1),
(7, 'Alugar', 'Apartamento', '2 Quartos, Sala Cozinha e banheiro', '2.000,00', 3),
(8, 'VENDER', 'RESTAURANTE', 'BEM CONCEITUADO', '1000,000,00', 4),
(9, 'Vender', 'Ponto Comercial', '200mtrs²', '200,000', 2),
(10, 'Alugar', 'teste', 'teste', '500,00', 4),
(11, 'Alugar', 'teste', 'teste', 'teste', 1),
(12, 'Alugar', 'teste', 'teste', 'teste', 1),
(13, 'vender', 'teste', 'teste', '111', 1),
(14, 'vender', 'teste', 'teste', '111', 1),
(15, 'vender', 'teste', 'teste', '111', 1),
(16, 'vender', 'teste', 'teste', '111', 1),
(17, 'vender', 'teste', 'teste', '111', 1),
(18, 'vender', 'teste', 'teste', '111', 1),
(19, 'vender', 'Carr', 'teste', '111', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoas`
--

CREATE TABLE `pessoas` (
  `codigo` smallint(6) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `cpf` varchar(100) NOT NULL,
  `fone` varchar(100) NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `profissao` varchar(100) NOT NULL,
  `salario` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `pessoas`
--

INSERT INTO `pessoas` (`codigo`, `nome`, `cpf`, `fone`, `endereco`, `profissao`, `salario`) VALUES
(1, 'leonardo Mathias Lava', '032.674.850-45', '(54) 99616-9054', 'XV MAIO 74', 'DESEMPREGADO', '1200'),
(2, 'Dieniffer', '000.000.000-00', '(54) 99616-9054', 'XV MAIO 74', 'vendedora', '1200'),
(3, 'Daniele ', '033.333.333-33', '(54) 55555-5555', 'passo fundo', 'programadora', '4000'),
(4, 'DIENIFFER TROIAN GRITTI', '222.222.222-22', '(22) 22222-2222', '15 DE MAIO', 'VENDEDORA', '2000');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `apelido` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`apelido`, `senha`, `email`) VALUES
('leonardo.lava', 'e10adc3949ba59abbe56e057f20f883e', 'leonardolava111@gmail.com');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `imovel`
--
ALTER TABLE `imovel`
  ADD PRIMARY KEY (`codigo`);

--
-- Índices para tabela `pessoas`
--
ALTER TABLE `pessoas`
  ADD PRIMARY KEY (`codigo`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `imovel`
--
ALTER TABLE `imovel`
  MODIFY `codigo` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de tabela `pessoas`
--
ALTER TABLE `pessoas`
  MODIFY `codigo` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
