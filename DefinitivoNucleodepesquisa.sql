-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 22/12/2023 às 04:44
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `nucleo_de_pesquisa`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `pesquisadores`
--

CREATE TABLE `pesquisadores` (
  `id_pesquisador` int(5) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `pesquisadores`
--

INSERT INTO `pesquisadores` (`id_pesquisador`, `nome`, `email`) VALUES
(0, 'Carlos', 'carlos@hotmail.com');

-- --------------------------------------------------------

--
-- Estrutura para tabela `projeto`
--

CREATE TABLE `projeto` (
  `id_projeto` int(10) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `descricao` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `projeto`
--

INSERT INTO `projeto` (`id_projeto`, `titulo`, `descricao`) VALUES
(10, 'Biblioteca', 'Sistema de gerenciamento de Bi');

-- --------------------------------------------------------

--
-- Estrutura para tabela `projeto_pesquisador`
--

CREATE TABLE `projeto_pesquisador` (
  `id_associacao` int(11) NOT NULL,
  `projeto_id` int(11) DEFAULT NULL,
  `pesquisador_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `projeto_pesquisador`
--

INSERT INTO `projeto_pesquisador` (`id_associacao`, `projeto_id`, `pesquisador_id`) VALUES
(3, 10, 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `senha` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nome`, `senha`) VALUES
(23, 'pedro', '$2y$10$50QSXJWClk01ywyjCSgqWO8YZQLarckDfsPzduRwJbN8pFZ1vzMHu');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `pesquisadores`
--
ALTER TABLE `pesquisadores`
  ADD PRIMARY KEY (`id_pesquisador`);

--
-- Índices de tabela `projeto`
--
ALTER TABLE `projeto`
  ADD PRIMARY KEY (`id_projeto`);

--
-- Índices de tabela `projeto_pesquisador`
--
ALTER TABLE `projeto_pesquisador`
  ADD PRIMARY KEY (`id_associacao`),
  ADD KEY `projeto_id` (`projeto_id`),
  ADD KEY `pesquisador_id` (`pesquisador_id`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `projeto`
--
ALTER TABLE `projeto`
  MODIFY `id_projeto` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `projeto_pesquisador`
--
ALTER TABLE `projeto_pesquisador`
  MODIFY `id_associacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `projeto_pesquisador`
--
ALTER TABLE `projeto_pesquisador`
  ADD CONSTRAINT `projeto_pesquisador_ibfk_1` FOREIGN KEY (`projeto_id`) REFERENCES `projeto` (`id_projeto`),
  ADD CONSTRAINT `projeto_pesquisador_ibfk_2` FOREIGN KEY (`pesquisador_id`) REFERENCES `pesquisadores` (`id_pesquisador`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
