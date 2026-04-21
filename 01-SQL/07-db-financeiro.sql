
CREATE DATABASE tentoradojo;

USE tentoradojo;

CREATE TABLE `financa` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `alunos_id` INT UNSIGNED NOT NULL,
  `nome` varchar(50) NOT NULL,
  `descricao` varchar(100) NOT NULL,
  `valor` double NOT NULL,
  `tipo` varchar(1) NOT NULL,
  `diadata` int DEFAULT NULL,
  `meses` int DEFAULT NULL,
  `anos` int DEFAULT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (alunos_id) REFERENCES alunos(id) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;