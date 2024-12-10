-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 10/12/2024 às 04:11
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
-- Banco de dados: `TrabalhoPHP`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `admin`
--

CREATE TABLE `admin` (
  `idUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `admin`
--

INSERT INTO `admin` (`idUsuario`) VALUES
(1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `aluno`
--

CREATE TABLE `aluno` (
  `idTurma` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `dataNascimento` date NOT NULL,
  `nome` varchar(100) NOT NULL,
  `nomeResponsavel` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `aluno`
--

INSERT INTO `aluno` (`idTurma`, `idUsuario`, `dataNascimento`, `nome`, `nomeResponsavel`) VALUES
(1, 2, '2005-01-01', 'Pedro Novaes Rosa', 'mae'),
(1, 3, '2005-01-01', 'Joaquim Machado', 'pai'),
(1, 8, '2005-01-01', 'Augusto Van Der Hells', 'avo'),
(1, 9, '2005-01-01', 'Carmen Lucia', 'irmao'),
(1, 10, '2005-01-01', 'Antonia Sapardi Milania', 'avo'),
(1, 11, '2005-01-01', 'Rafael Sapato', 'ninguem'),
(2, 12, '2005-01-01', 'Luiz Tamandaré', 'sobrinho'),
(1, 13, '2005-01-01', 'Rafael Boldt', 'lala'),
(2, 14, '2005-01-01', 'ninguem', 'ninguem'),
(12, 16, '2017-12-22', 'rafaela', 'rafaela'),
(10, 17, '2017-12-22', 'rafael', 'rafaef'),
(10, 18, '2017-12-13', 'rafae', 'rafaedas'),
(1, 20, '2017-12-05', '123', '123');

-- --------------------------------------------------------

--
-- Estrutura para tabela `aula`
--

CREATE TABLE `aula` (
  `horarioInicio` time NOT NULL,
  `diaSemana` varchar(30) NOT NULL,
  `idMateria` int(11) NOT NULL,
  `idTurma` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `idAula` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `aula`
--

INSERT INTO `aula` (`horarioInicio`, `diaSemana`, `idMateria`, `idTurma`, `idUsuario`, `idAula`) VALUES
('07:10:00', 'Segunda-Feira', 1, 1, 4, 1),
('07:55:00', 'Segunda-Feira', 1, 1, 4, 2),
('08:40:00', 'Segunda-Feira', 2, 1, 7, 3),
('09:45:00', 'Segunda-Feira', 2, 1, 7, 4),
('10:30:00', 'Segunda-Feira', 2, 1, 7, 5),
('11:15:00', 'Segunda-Feira', 2, 1, 7, 6),
('10:30:00', 'Terca-Feira', 3, 2, 5, 7),
('07:10:00', 'Quinta-Feira', 4, 2, 6, 8),
('10:30:00', 'Quarta-Feira', 3, 3, 4, 9),
('11:15:00', 'Quinta-Feira', 1, 3, 7, 10),
('19:45:00', 'Sabado', 10, 12, 6, 11),
('07:10:00', 'Segunda-Feira', 11, 4, 4, 12),
('12:00:00', 'Sabado', 9, 3, 7, 13),
('09:45:00', 'Quarta-Feira', 6, 1, 6, 14);

-- --------------------------------------------------------

--
-- Estrutura para tabela `boletim`
--

CREATE TABLE `boletim` (
  `idBoletim` int(11) NOT NULL,
  `idMateria` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `nota` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `boletim`
--

INSERT INTO `boletim` (`idBoletim`, `idMateria`, `idUsuario`, `nota`) VALUES
(1, 2, 1, 0),
(2, 3, 1, 0),
(3, 4, 1, 0),
(4, 5, 1, 0),
(5, 4, 2, 0),
(6, 1, 2, 9);

-- --------------------------------------------------------

--
-- Estrutura para tabela `materia`
--

CREATE TABLE `materia` (
  `idMateria` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `materia`
--

INSERT INTO `materia` (`idMateria`, `nome`) VALUES
(1, 'Fisica'),
(2, 'Matemática'),
(3, 'Geografia'),
(4, 'Português'),
(5, 'Ingles'),
(6, 'Biologia'),
(7, 'Quimica'),
(8, 'Espanhol'),
(9, 'Historia'),
(10, 'Artes'),
(11, 'Educacao Fisica');

-- --------------------------------------------------------

--
-- Estrutura para tabela `professor`
--

CREATE TABLE `professor` (
  `nome` varchar(100) NOT NULL,
  `dataNascimento` date NOT NULL,
  `idUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `professor`
--

INSERT INTO `professor` (`nome`, `dataNascimento`, `idUsuario`) VALUES
('Lucas Alves da Silva', '2000-04-30', 4),
('Professor', '1969-09-15', 5),
('Ricardo Anttunes', '1998-02-01', 6),
('Samantha Machado', '2005-02-18', 7);

-- --------------------------------------------------------

--
-- Estrutura para tabela `turma`
--

CREATE TABLE `turma` (
  `idTurma` int(11) NOT NULL,
  `periodo` varchar(100) NOT NULL,
  `ano` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `turma`
--

INSERT INTO `turma` (`idTurma`, `periodo`, `ano`) VALUES
(1, 'matutino', '1 ano EF'),
(2, 'matutino', '2 ano EF'),
(3, 'matutino', '3 ano EF'),
(4, 'matutino', '4 ano EF'),
(5, 'matutino', '5 ano EF'),
(6, 'vespertino', '6 ano EF'),
(7, 'vespertino', '7 ano EF'),
(8, 'vespertino', '8 ano EF'),
(9, 'vespertino', '9 ano EF'),
(10, 'noturno', '1 ano EM'),
(11, 'noturno', '2 ano EM'),
(12, 'noturno', '3 ano EM');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `senha` varchar(30) NOT NULL,
  `login` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `senha`, `login`) VALUES
(1, '123', 'admin'),
(2, '123', 'Pedro'),
(3, 'abc', 'Joaquim'),
(4, '23', 'Lucas'),
(5, '123', 'Professor'),
(6, '43', 'ProfRicardo'),
(7, '23', 'Samanta'),
(8, '32', 'Augusto'),
(9, '43', 'Carmen'),
(10, '51', 'Antonia'),
(11, '653', 'Sapo'),
(12, '23', 'Luiz'),
(13, '85', 'Rafael'),
(14, '12', 'Ninguem'),
(15, '78', 'Juca'),
(16, 'rafaela', 'rafaelaa'),
(17, 'rafeal', 'rafaela'),
(18, 'raela', 'rafaeklasa'),
(20, '123', 'alunoExemplar');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idUsuario`);

--
-- Índices de tabela `aluno`
--
ALTER TABLE `aluno`
  ADD PRIMARY KEY (`idUsuario`,`idTurma`) USING BTREE,
  ADD KEY `aluno_fk_idTurma` (`idTurma`);

--
-- Índices de tabela `aula`
--
ALTER TABLE `aula`
  ADD PRIMARY KEY (`idAula`,`idUsuario`,`idTurma`,`idMateria`) USING BTREE;

--
-- Índices de tabela `boletim`
--
ALTER TABLE `boletim`
  ADD PRIMARY KEY (`idBoletim`);

--
-- Índices de tabela `materia`
--
ALTER TABLE `materia`
  ADD PRIMARY KEY (`idMateria`);

--
-- Índices de tabela `professor`
--
ALTER TABLE `professor`
  ADD PRIMARY KEY (`idUsuario`);

--
-- Índices de tabela `turma`
--
ALTER TABLE `turma`
  ADD PRIMARY KEY (`idTurma`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`),
  ADD UNIQUE KEY `login` (`login`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `aula`
--
ALTER TABLE `aula`
  MODIFY `idAula` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `boletim`
--
ALTER TABLE `boletim`
  MODIFY `idBoletim` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `materia`
--
ALTER TABLE `materia`
  MODIFY `idMateria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `turma`
--
ALTER TABLE `turma`
  MODIFY `idTurma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `aluno`
--
ALTER TABLE `aluno`
  ADD CONSTRAINT `aluno_fk_idTurma` FOREIGN KEY (`idTurma`) REFERENCES `turma` (`idTurma`),
  ADD CONSTRAINT `aluno_fk_idUsuario` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`);

--
-- Restrições para tabelas `professor`
--
ALTER TABLE `professor`
  ADD CONSTRAINT `professor_fk_idUsuario` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
