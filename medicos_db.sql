-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 06/11/2024 às 01:30
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `medicos_db`
--
CREATE DATABASE IF NOT EXISTS `medicos_db` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `medicos_db`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `enfermeiros`
--

DROP TABLE IF EXISTS `enfermeiros`;
CREATE TABLE `enfermeiros` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `coren` varchar(100) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `enfermeiros`
--

INSERT INTO `enfermeiros` (`id`, `nome`, `coren`, `usuario`, `senha`) VALUES
(1, 'Luiz de Souza', '12323', 'Luiz', '$2y$10$DtxRqVFha5aYRjpuWsfLNelrLMNXiWydrkXNqvAMjAZfUU5yd5.Bm');

-- --------------------------------------------------------

--
-- Estrutura para tabela `medicos`
--

DROP TABLE IF EXISTS `medicos`;
CREATE TABLE `medicos` (
  `id` int(11) NOT NULL,
  `nome` varchar(250) NOT NULL,
  `especialidade` varchar(250) NOT NULL,
  `crm` varchar(250) NOT NULL,
  `usuario` varchar(250) NOT NULL,
  `senha` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `medicos`
--

INSERT INTO `medicos` (`id`, `nome`, `especialidade`, `crm`, `usuario`, `senha`) VALUES
(1, 'Felipe', 'cardiologista', '123213', 'Felipe', '$2y$10$EXQclA9sngTF/wAUUfpnJeNHLTJTcGfuBgPGZmhiDGAy943KGYFju'),
(2, 'matheus', 'urologista', '132424234', 'Matheus', '$2y$10$Dav.6Yl.cmhod4MKy6Ney.LzsAQQUsDVNbzPP6MWFRf4eNNhFLsX2'),
(3, 'Matheus', 'urologista', '123123', 'Matheus', '$2y$10$dardTpm2EFz9HUbr7vYhTu4Vj.RDtHXPSHvFPT7UqZ2JFQdmBi1eO'),
(4, 'Euller', 'Pediatra', '123', 'Euller', '$2y$10$qwP.7Kfr65YsiiI/SUrHEu8DZjLxO6C5PqgEC7EH03vDzzkmlY/gu');

-- --------------------------------------------------------

--
-- Estrutura para tabela `pacientes`
--

DROP TABLE IF EXISTS `pacientes`;
CREATE TABLE `pacientes` (
  `id` int(11) NOT NULL,
  `nome` varchar(250) NOT NULL,
  `cpf` varchar(15) NOT NULL,
  `data_nascimento` date NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `endereco` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `pacientes`
--

INSERT INTO `pacientes` (`id`, `nome`, `cpf`, `data_nascimento`, `telefone`, `email`, `endereco`) VALUES
(1, 'Fernando', '1232313123132', '2024-10-28', '132424232424', 'fernando@gmail.com', 'av 32 rquina com 11 bairro primaveira'),
(2, 'Carlos', '12343454', '2024-10-29', '1331211', 'Carlos@hotmal.com', 'avenida 12 rua 99 bairro pilone'),
(3, 'Jose', '293480248', '2024-10-13', '2u34736', 'Jose12@gmail.com', 'centro com rua 13');

-- --------------------------------------------------------

--
-- Estrutura para tabela `receitas`
--

DROP TABLE IF EXISTS `receitas`;
CREATE TABLE `receitas` (
  `id` int(11) NOT NULL,
  `id_paciente` int(11) NOT NULL,
  `nome_medicamento` varchar(255) NOT NULL,
  `data_administracao` date NOT NULL,
  `hora_administracao` time NOT NULL,
  `dose` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `receitas`
--

INSERT INTO `receitas` (`id`, `id_paciente`, `nome_medicamento`, `data_administracao`, `hora_administracao`, `dose`) VALUES
(1, 1, 'Euller', '2024-11-06', '20:00:00', '12 ml de cha'),
(2, 2, 'ritalina', '2024-10-31', '02:08:00', '2ml'),
(3, 3, 'nomeprasol', '2024-11-05', '21:00:00', '20ml'),
(4, 3, 'nomeprasol', '2024-11-05', '16:25:00', '2 ml'),
(5, 2, 'luva', '2024-11-09', '22:00:00', '1 pilula'),
(6, 2, 'luva', '2024-11-09', '22:00:00', '1 pilula');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `enfermeiros`
--
ALTER TABLE `enfermeiros`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `medicos`
--
ALTER TABLE `medicos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `receitas`
--
ALTER TABLE `receitas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `enfermeiros`
--
ALTER TABLE `enfermeiros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `medicos`
--
ALTER TABLE `medicos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `receitas`
--
ALTER TABLE `receitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
