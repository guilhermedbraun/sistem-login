CREATE DATABASE tentoradogo;

USE tentoradogo;

CREATE TABLE `disciplina` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `conteudos` varchar(500) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


próxima cópia alterar disciplina para o nome novo. O resto se mantém.

INSERT INTO `disciplina` (`id`, `conteudos`) VALUES
(1, '7 - Em resumo, a ética do aluno em um Dojo de artes marciais vai muito além do treinamento físico. Ela molda o caráter, promove valores como respeito, humildade, disciplina, honestidade e solidariedade, preparando os praticantes não apenas para enfrentar desafios no tatame, mas também na vida.'),
(2, '6 - Por fim, a solidariedade é um aspecto importante da ética do aluno em um Dojo. Os alunos formam laços estreitos com seus colegas de treino, apoiando-se mutuamente tanto no tatame quanto na vida cotidiana. Isso cria uma comunidade coesa e solidária que vai além das paredes do Dojo.'),
(3, '5 - A honestidade e a integridade são valores que permeiam o treinamento em artes marciais. Os alunos são encorajados a serem honestos consigo mesmos e com os outros, evitando o uso indevido de suas habilidades e praticando a empatia em todas as situações.'),
(4, '4 - A disciplina é inegavelmente importante. Os alunos são incentivados a manter uma rotina rigorosa de treino e a seguir as regras do Dojo com diligência. Isso não apenas melhora suas habilidades marciais, mas também ajuda a desenvolver a autodisciplina e a responsabilidade.'),
(5, '3 - A humildade é outro princípio fundamental. Os alunos são ensinados a reconhecer suas limitações e a estar dispostos a aprender com os erros. Isso cria um ambiente de crescimento constante, onde o ego é deixado de lado em favor do aprimoramento pessoal.'),
(6, '2 - Em primeiro lugar, o respeito é a pedra angular da ética do aluno em um Dojo. Isso se traduz no respeito ao instrutor, aos colegas de treino e a si mesmo. Os alunos aprendem desde cedo a curvar-se em sinal de respeito ao entrar e sair do tatame, mostrando humildade perante a arte e seus mestres.'),
(7, '1 - A ética do aluno dentro de um Dojo de artes marciais desempenha um papel fundamental na formação não apenas de habilidades físicas, mas também de valores e caráter. Os princípios éticos que regem esse ambiente são profundamente enraizados nas tradições das artes marciais e são transmitidos de geração em geração.');

Injetar o SQL pode dar erro de ASCII. Inserir texto por texto:

7 - Em resumo, a ética do aluno em um Dojo de artes marciais vai muito além do treinamento físico. Ela molda o caráter, promove valores como respeito, humildade, disciplina, honestidade e solidariedade, preparando os praticantes não apenas para enfrentar desafios no tatame, mas também na vida.
6 - Por fim, a solidariedade é um aspecto importante da ética do aluno em um Dojo. Os alunos formam laços estreitos com seus colegas de treino, apoiando-se mutuamente tanto no tatame quanto na vida cotidiana. Isso cria uma comunidade coesa e solidária que vai além das paredes do Dojo.
5 - A honestidade e a integridade são valores que permeiam o treinamento em artes marciais. Os alunos são encorajados a serem honestos consigo mesmos e com os outros, evitando o uso indevido de suas habilidades e praticando a empatia em todas as situações.
4 - A disciplina é inegavelmente importante. Os alunos são incentivados a manter uma rotina rigorosa de treino e a seguir as regras do Dojo com diligência. Isso não apenas melhora suas habilidades marciais, mas também ajuda a desenvolver a autodisciplina e a responsabilidade.
3 - A humildade é outro princípio fundamental. Os alunos são ensinados a reconhecer suas limitações e a estar dispostos a aprender com os erros. Isso cria um ambiente de crescimento constante, onde o ego é deixado de lado em favor do aprimoramento pessoal.
2 - Em primeiro lugar, o respeito é a pedra angular da ética do aluno em um Dojo. Isso se traduz no respeito ao instrutor, aos colegas de treino e a si mesmo. Os alunos aprendem desde cedo a curvar-se em sinal de respeito ao entrar e sair do tatame, mostrando humildade perante a arte e seus mestres.

