-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 10/03/2024 às 20:15
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `practicas`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `enfermeiro`
--

CREATE TABLE `enfermeiro` (
  `idenf` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `senha` varchar(10) NOT NULL,
  `coren` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `eventoscalendar`
--

CREATE TABLE `eventoscalendar` (
  `ID` int(20) NOT NULL,
  `nome` varchar(250) DEFAULT NULL,
  `numero_familia` varchar(15) DEFAULT NULL,
  `hora_inicio` time DEFAULT NULL,
  `hora_final` time DEFAULT NULL,
  `data_inicio` date DEFAULT NULL,
  `area_consulta` varchar(100) DEFAULT NULL,
  `especializacao` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `eventoscalendar`
--

INSERT INTO `eventoscalendar` (`ID`, `nome`, `numero_familia`, `hora_inicio`, `hora_final`, `data_inicio`, `area_consulta`, `especializacao`) VALUES
(216, 'Teste1-consulta', '23', '10:30:00', '11:00:00', '2024-03-20', 'Clecio Júnior', '');

-- --------------------------------------------------------

--
-- Estrutura para tabela `fisioterapeuta`
--

CREATE TABLE `fisioterapeuta` (
  `idfisio` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `senha` varchar(10) NOT NULL,
  `crefito` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `medico`
--

CREATE TABLE `medico` (
  `idmed` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `senha` varchar(10) NOT NULL,
  `crm` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `medico`
--

INSERT INTO `medico` (`idmed`, `nome`, `senha`, `crm`) VALUES
(1, 'Clecio Júnior', 'teste123', '1234567');

-- --------------------------------------------------------

--
-- Estrutura para tabela `odontologo`
--

CREATE TABLE `odontologo` (
  `idodonto` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `senha` varchar(10) NOT NULL,
  `cro` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `psicologo`
--

CREATE TABLE `psicologo` (
  `idpsi` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `senha` varchar(10) NOT NULL,
  `crp` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `IDfuncionario` int(25) NOT NULL,
  `username` varchar(30) NOT NULL,
  `profissao` varchar(50) NOT NULL,
  `senha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`IDfuncionario`, `username`, `profissao`, `senha`) VALUES
(1, 'Clecio Júnior', 'Recepcionista', '05022007jr'),
(2, 'Dr. Odonto', 'Odontologo(a)', 'teste123');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `enfermeiro`
--
ALTER TABLE `enfermeiro`
  ADD PRIMARY KEY (`idenf`);

--
-- Índices de tabela `eventoscalendar`
--
ALTER TABLE `eventoscalendar`
  ADD PRIMARY KEY (`ID`);

--
-- Índices de tabela `fisioterapeuta`
--
ALTER TABLE `fisioterapeuta`
  ADD PRIMARY KEY (`idfisio`);

--
-- Índices de tabela `medico`
--
ALTER TABLE `medico`
  ADD PRIMARY KEY (`idmed`);

--
-- Índices de tabela `odontologo`
--
ALTER TABLE `odontologo`
  ADD PRIMARY KEY (`idodonto`);

--
-- Índices de tabela `psicologo`
--
ALTER TABLE `psicologo`
  ADD PRIMARY KEY (`idpsi`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`IDfuncionario`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `enfermeiro`
--
ALTER TABLE `enfermeiro`
  MODIFY `idenf` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `eventoscalendar`
--
ALTER TABLE `eventoscalendar`
  MODIFY `ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=217;

--
-- AUTO_INCREMENT de tabela `fisioterapeuta`
--
ALTER TABLE `fisioterapeuta`
  MODIFY `idfisio` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `medico`
--
ALTER TABLE `medico`
  MODIFY `idmed` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `odontologo`
--
ALTER TABLE `odontologo`
  MODIFY `idodonto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `psicologo`
--
ALTER TABLE `psicologo`
  MODIFY `idpsi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `IDfuncionario` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
