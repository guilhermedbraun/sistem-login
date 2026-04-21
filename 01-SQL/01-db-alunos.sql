CREATE DATABASE tentoradojo;

USE tentoradojo;

CREATE TABLE `alunos` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `telefone` varchar(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `senha` varchar(32) NOT NULL,
  `estado` varchar(2) NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `endereco` varchar(50) NOT NULL,
  `dojo` varchar(50) NOT NULL,
  `sensei` varchar(50) NOT NULL,
  `data_nasc` date NOT NULL,
  `kyu` varchar(3) NOT NULL,
  `adm` varchar(15) NOT NULL,
  `inscricao` date DEFAULT NULL,
  `ativo` tinyint(3) UNSIGNED NOT NULL,
  `ativacao` date DEFAULT NULL,
  `expiracao` date DEFAULT NULL,
  `locked` varchar(2) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Alunos salvos
--
INSERT INTO `alunos` (`id`, `nome`, `telefone`, `email`, `senha`, `estado`, `cidade`, `endereco`, `dojo`, `sensei`, `data_nasc`, `kyu`, `adm`, `inscricao`, `ativo`, `ativacao`, `expiracao`, `locked`) VALUES
(1, 'Guilherme', '21994875111', 'guilherme@gmail.com', '123456', 'RJ', 'Rio de Janeiro', 'Estr do Guandu 903', 'Ninja Kan Mendanha', 'Guilherme', '1984-05-03', '11', '0', '2023-12-10', 1, '2023-12-10', '2084-05-03', '1');

INSERT INTO `alunos` (`id`, `nome`, `telefone`, `email`, `senha`, `estado`, `cidade`, `endereco`, `dojo`, `sensei`, `data_nasc`, `kyu`, `adm`, `inscricao`, `ativo`, `ativacao`, `expiracao`, `locked`) VALUES
(1, 'Rafael', '21988776655', 'rafael@gmail.com', '123456', 'RJ', 'Rio de Janeiro', 'Rua do Guandu 90', 'Ninja Kan Mendanha', 'Guilherme', '2000-05-03', '11', '0', '2023-12-10', 1, '2023-12-10', '2084-05-03', '1');
