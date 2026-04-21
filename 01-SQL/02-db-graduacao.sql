CREATE TABLE `graduacao` (
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `alunos_id` INT UNSIGNED NOT NULL,
    `kyu10` date DEFAULT NULL,
    `kyu9` date DEFAULT NULL,
    `kyu8` date DEFAULT NULL,
    `kyu7` date DEFAULT NULL,
    `kyu6` date DEFAULT NULL,
    `kyu5` date DEFAULT NULL,
    `kyu4` date DEFAULT NULL,
    `kyu3` date DEFAULT NULL,
    `kyu2` date DEFAULT NULL,
    `kyu1` date DEFAULT NULL,
    `dan1` date DEFAULT NULL,
    `dan2` date DEFAULT NULL,
    `dan3` date DEFAULT NULL,
    `dan4` date DEFAULT NULL,
    `dan5` date DEFAULT NULL,
    `dan6` date DEFAULT NULL,
    `dan7` date DEFAULT NULL,
    `dan8` date DEFAULT NULL,
    `dan9` date DEFAULT NULL,
    `dan10` date DEFAULT NULL,
    `dan11` date DEFAULT NULL,
    `dan12` date DEFAULT NULL,
    `dan13` date DEFAULT NULL,
    `dan14` date DEFAULT NULL,
    `dan15` date DEFAULT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (alunos_id) REFERENCES alunos(id) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



Guilherme:
INSERT INTO `graduacao` (`id`, `alunos_id`, `kyu10`, `kyu9`, `kyu8`, `kyu7`, `kyu6`, `kyu5`, `kyu4`, `kyu3`, `kyu2`, `kyu1`, `dan1`, `dan2`, `dan3`, `dan4`, `dan5`, `dan6`, `dan7`, `dan8`, `dan9`, `dan10`, `dan11`, `dan12`, `dan13`, `dan14`, `dan15`) VALUES
(1, 1, '2012-02-02', '2012-03-08', '2012-08-11', '2012-12-09', '2013-04-21', '2013-12-15', '2014-05-18', '2015-04-18', '2016-08-12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

novos alunos
INSERT INTO `graduacao` (`id`, `alunos_id`, `kyu10`, `kyu9`, `kyu8`, `kyu7`, `kyu6`, `kyu5`, `kyu4`, `kyu3`, `kyu2`, `kyu1`, `dan1`, `dan2`, `dan3`, `dan4`, `dan5`, `dan6`, `dan7`, `dan8`, `dan9`, `dan10`, `dan11`, `dan12`, `dan13`, `dan14`, `dan15`) VALUES
(xx, x, '2023-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

último caso:
INSERT INTO `graduacao` (`id`, `alunos_id`, `kyu10`) VALUES (1, 1, '2012-02-02');