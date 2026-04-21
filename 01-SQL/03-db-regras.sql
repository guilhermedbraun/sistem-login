CREATE DATABASE tentoradogo;

USE tentoradogo;

CREATE TABLE `regras` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `conteudos` varchar(500) NOT NULL,
  PRIMARY KEY (id)
);

próxima cópia alterar disciplina para o nome novo. O resto se mantém.

INSERT INTO `regras` (`id`, `conteudos`) VALUES
(1, '13 - Seguir a filosofia Shinobi em sua mais pura essência, pois somente assim, você se tornará um serhumano com o verdadeiro sentido do vocábulo Ninja, seguidor e protegido da Natureza e do Senhor do Universo.'),
(2, '12 - Não exibir, demonstrar ou provar a eficiência do Ninjutsu fora do Dojo, pois a única pessoa que merece receber alguma prova de evolução é você mesmo, pois só você é digno da arte das sombras.'),
(3, '11 - Manter sempre a paz interior e buscar o caminho ao Senhor do Universo, não envolvendo-se em confusões e problemas graves de caráter moral e emocional, eleve o nome da arte e conquiste o senso de observação por tudo e por todos.'),
(4, '10 - Estudar, praticar e treinar dentro e fora do Dojo apenas o que lhe foi ensinado. Uma águia não voará se não tiver espaço e treino suficiente para tal.'),
(5, '9 - Treinar apenas com o Shinobishozuku ou similares. A vestimenta é a prova material de respeito e amor pela tradição Ninja.'),
(6, '8 - Proibido brincadeiras e palavras de baixo calão que venham a agredir a integridade moral da arte e do aluno. Cultive o senso de saúde mental e espiritual.'),
(7, '7 - Reverenciar o Sensei sempre que o mesmo vier auxiliar e corrigi-lo, pois a incerteza e o erro também são virtudes quando aprendemos com o mesmo.'),
(8, '6 - Demonstre respeito e amizade pelo companheiro de treinamento sempre que iniciar e terminar a efetuação de técnicas referente a aula, tal cortesia deve-se manter também fora do Dojo, cultive a humildade de respeitar a tudo e a todos.'),
(9, '5 - Manter sempre o respeito máximo para com a arte, dentro e fora do Dojo, estudando, treinando e aprendendo sempre com muita seriedade, respeito e disciplina, pois o Ninjutsu lhe mostrará o caminho para uma vida saudável e feliz por todo o sempre.'),
(10, '4 - Não dialogar em aula. Se necessitar, fale apenas sobre o que está sendo estudado e praticado, aproveite todo o segmento de aula. Ninjutsu é eterna experiência.'),
(11, '3 - Sempre que o Sensei ou instrutor vier a demonstrar alguma técnica, o grupo deve observar atentamente em Seiza-no-kamae ou Fudoza-no-kamae. Demonstre que possui disciplina pela arte e por você.'),
(12, '2 - Manter acima de tudo o respeito e a integridade física do companheiro de treinamento, pois estamos todos no mesmo caminho de aprendizado perante o Senhor do Universo.'),
(13, '1 - Reverenciar o Dojo (local de iluminação), o altar Shintó, e os mestres, sempre ao entrar e sair do mesmo, demonstrando assim, respeito para com a arte e seus antepassados.');



Injetar o SQL pode dar erro de ASCII. Inserir texto por texto:

13 - Seguir a filosofia Shinobi em sua mais pura essência, pois somente assim, você se tornará um serhumano com o verdadeiro sentido do vocábulo Ninja, seguidor e protegido da Natureza e do Senhor do Universo.
12 - Não exibir, demonstrar ou provar a eficiência do Ninjutsu fora do Dojo, pois a única pessoa que merece receber alguma prova de evolução é você mesmo, pois só você é digno da arte das sombras.
11 - Manter sempre a paz interior e buscar o caminho ao Senhor do Universo, não envolvendo-se em confusões e problemas graves de caráter moral e emocional, eleve o nome da arte e conquiste o senso de observação por tudo e por todos.
10 - Estudar, praticar e treinar dentro e fora do Dojo apenas o que lhe foi ensinado. Uma águia não voará se não tiver espaço e treino suficiente para tal.
9 - Treinar apenas com o Shinobishozuku ou similares. A vestimenta é a prova material de respeito e amor pela tradição Ninja.
8 - Proibido brincadeiras e palavras de baixo calão que venham a agredir a integridade moral da arte e do aluno. Cultive o senso de saúde mental e espiritual.
7 - Reverenciar o Sensei sempre que o mesmo vier auxiliar e corrigi-lo, pois a incerteza e o erro também são virtudes quando aprendemos com o mesmo.
6 - Demonstre respeito e amizade pelo companheiro de treinamento sempre que iniciar e terminar a efetuação de técnicas referente a aula, tal cortesia deve-se manter também fora do Dojo, cultive a humildade de respeitar a tudo e a todos.
5 - Manter sempre o respeito máximo para com a arte, dentro e fora do Dojo, estudando, treinando e aprendendo sempre com muita seriedade, respeito e disciplina, pois o Ninjutsu lhe mostrará o caminho para uma vida saudável e feliz por todo o sempre.
4 - Não dialogar em aula. Se necessitar, fale apenas sobre o que está sendo estudado e praticado, aproveite todo o segmento de aula. Ninjutsu é eterna experiência.
3 - Sempre que o Sensei ou instrutor vier a demonstrar alguma técnica, o grupo deve observar atentamente em Seiza-no-kamae ou Fudoza-no-kamae. Demonstre que possui disciplina pela arte e por você.
2 - Manter acima de tudo o respeito e a integridade física do companheiro de treinamento, pois estamos todos no mesmo caminho de aprendizado perante o Senhor do Universo.
1 - Reverenciar o Dojo (local de iluminação), o altar Shintó, e os mestres, sempre ao entrar e sair do mesmo, demonstrando assim, respeito para com a arte e seus antepassados.