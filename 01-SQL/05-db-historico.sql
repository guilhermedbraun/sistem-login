CREATE DATABASE tentoradogo;

USE tentoradogo;

CREATE TABLE `historico` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `conteudos` varchar(500) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

próxima cópia alterar historico para o nome novo. O resto se mantém.


INSERT INTO `historico` (`id`, `conteudos`) VALUES
(1, 'Dia 27-10-2023 Rafael Sabastano é o primeiro aluno.'),
(2, 'Dia 27-11-2023 - Luiz Miguel filho da Jaqueline inicia como segundo aluno.'),
(3, 'Dia 10-12-2023 - Sistema entra no ar faltando alguns pequenos reparos no css para mobile.'),
(4, 'Dia 02-04-2024 - Primeira aula na Game Fight Mendanha.');


Injetar o SQL pode dar erro de ASCII. Inserir texto por texto:

Dia 27-10-2023 - Rafael Sabastano é o primeiro aluno.
Dia 27-11-2023 - Luiz Miguel filho da Jaqueline inicia como segundo aluno.
Dia 10-12-2023 - Sistema entra no ar faltando alguns pequenos reparos no css para mobile.
Dia 02-04-2024 - Primeira aula na Game Fight Mendanha.
