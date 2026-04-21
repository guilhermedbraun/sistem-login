
CREATE TABLE `emergencia` (
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `alunos_id` INT UNSIGNED NOT NULL,
    `contato1` varchar(50) DEFAULT NULL,
    `telefone1` varchar(11) DEFAULT NULL,
    `contato2` varchar(50) DEFAULT NULL,
    `telefone2` varchar(11) DEFAULT NULL,
    `contato3` varchar(50) DEFAULT NULL,
    `telefone3` varchar(11) DEFAULT NULL,
    `alergia` varchar(500) DEFAULT NULL,
    `remedio` varchar(500) DEFAULT NULL,
    `deficiencia` varchar(500) DEFAULT NULL,
    `hospital` varchar(500) DEFAULT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (alunos_id) REFERENCES alunos(id) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


INSERT INTO `emergencia` (`id`, `alunos_id`) VALUES (1, 1);
