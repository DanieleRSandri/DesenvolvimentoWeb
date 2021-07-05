-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geraÃ§Ã£o: 04-Jul-2021 Ã s 19:09
-- VersÃ£o do servidor: 10.4.17-MariaDB
-- versÃ£o do PHP: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `trabalho_desenvolvimento_web`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `codigo` smallint(6) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `cpf` varchar(100) NOT NULL,
  `fone` varchar(100) NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `profissao` varchar(100) NOT NULL,
  `salario` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`codigo`, `nome`, `cpf`, `fone`, `endereco`, `profissao`, `salario`) VALUES
(2, 'Engenharia de Software', '565.767.856-75', '(54) 99901-3670', 'sfwdfawfasf', 'asfasfsafsa', '3.800'),
(3, 'DANIELE REGINA SANDRI', '031.741.180-26', '(54) 99901-3670', 'Rua Princesa Isabel, 626', 'Programadora', '33.800,00'),
(6, 'DIENIFFER TROIAN GRITTI', '032.674.850-45', '(54) 99616-9054', 'XV MAIO 74', 'vendedora', '1200'),
(7, 'leonardo Mathias Lava', '032.674.850-45', '(54) 99616-9054', 'XV MAIO 74', 'programador', '1200');

-- --------------------------------------------------------

--
-- Estrutura da tabela `contrato`
--

CREATE TABLE `contrato` (
  `codigo` smallint(6) NOT NULL,
  `dataInicial` date NOT NULL,
  `dataFinal` date NOT NULL,
  `vlrAluguel` varchar(100) NOT NULL,
  `codimovel` smallint(6) DEFAULT NULL,
  `codcliente` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `codproprietario` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `imovel`
--

INSERT INTO `imovel` (`codigo`, `situacao`, `tipoimovel`, `descricao`, `aluguel`, `codproprietario`) VALUES
(2, 'Alugar', 'aaa', 'Casa 4 quartos, com garagem coberta', '3.800', 7),
(5, 'A', 'aaaaaaa', 'aaaaaa', '2', 6),
(6, 'A', 'aaaaaaa', 'sdsdsdsdsd', '51655656', 8),
(7, 'alugar', 'APARTAMENTO', 'AP 1 QUARTO', '500,00', 5),
(8, 'teste3', 'teste', 'teste3', '500,00', 10),
(9, 'alugar', 'APARTAMENTO', 'AP 1 QUARTO', '500,00', 8);

-- --------------------------------------------------------

--
-- Estrutura da tabela `proprietario`
--

CREATE TABLE `proprietario` (
  `codigo` smallint(6) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `cpf` varchar(100) NOT NULL,
  `fone` varchar(100) NOT NULL,
  `endereco` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `proprietario`
--

INSERT INTO `proprietario` (`codigo`, `nome`, `cpf`, `fone`, `endereco`) VALUES
(5, 'Engenharia de Software1', '565.767.856-75', '(54) 99901-3670', 'sfwdfawfasf'),
(6, 'Teste ', '565.767.856-75', '(54) 99901-3670', 'sfwdfawfasf'),
(7, 'DANIELE REGINA SANDRI', '031.741.180-26', '(54) 99901-3670', 'Rua Princesa Isabel, 626'),
(8, 'DANIELE REGINA SANDRI sdsdsds', '031.741.180-26', '(54) 99901-3670', 'Rua Princesa Isabel, 626'),
(9, 'DANIELE REGINA SANDRI', '031.741.180-26', '(54) 99901-3670', 'Rua Princesa Isabel, 626'),
(10, 'DANIELE REGINA SANDRI', '031.741.180-26', '(54) 99901-3670', 'Rua Princesa Isabel, 626'),
(11, 'DANIELE REGINA SANDRI', '031.741.180-26', '(54) 99901-3670', 'Rua Princesa Isabel, 626'),
(13, 'leonardo Mathias Lava', '032.674.850-45', '(54) 99616-9054', 'XV MAIO 74'),
(14, 'leonardo Mathias Lava', '032.674.850-45', '(54) 99616-9054', 'XV MAIO 74'),
(15, 'leonardo Mathias Lava', '032.674.850-45', '(54) 99616-9054', 'XV MAIO 74');

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
('daniele', 'e10adc3949ba59abbe56e057f20f883e', 'dany.sandry@hotmail.com'),
('leonardo.lava', '1f007d2c2520e3a7d7a85e15faee2e0e', 'leonardolava111@gmail.com'),
('leo.lava', 'e10adc3949ba59abbe56e057f20f883e', 'leonardolava111@gmail.com');

--
-- Ãndices para tabelas despejadas
--

--
-- Ãndices para tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`codigo`);

--
-- Ãndices para tabela `contrato`
--
ALTER TABLE `contrato`
  ADD PRIMARY KEY (`codigo`);

--
-- Ãndices para tabela `imovel`
--
ALTER TABLE `imovel`
  ADD PRIMARY KEY (`codigo`);

--
-- Ãndices para tabela `proprietario`
--
ALTER TABLE `proprietario`
  ADD PRIMARY KEY (`codigo`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `codigo` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `contrato`
--
ALTER TABLE `contrato`
  MODIFY `codigo` smallint(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `imovel`
--
ALTER TABLE `imovel`
  MODIFY `codigo` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `proprietario`
--
ALTER TABLE `proprietario`
  MODIFY `codigo` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
