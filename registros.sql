CREATE DATABASE pdo;

DROP TABLE IF EXISTS alunos;

CREATE TABLE alunos (
	id INT AUTO_INCREMENT PRIMARY KEY,
	nome VARCHAR(255),
	nota DOUBLE
);

INSERT INTO alunos (nome, nota) VALUES ('William Wallace', 5.2);
INSERT INTO alunos (nome, nota) VALUES ('Liu Kang', 8);
INSERT INTO alunos (nome, nota) VALUES ('Sub-zero', 7);
INSERT INTO alunos (nome, nota) VALUES ('Scorpion', 7.1);
INSERT INTO alunos (nome, nota) VALUES ('Ryu', 9);
INSERT INTO alunos (nome, nota) VALUES ('Ken Masters', 1);
INSERT INTO alunos (nome, nota) VALUES ('Rayden', 10);
INSERT INTO alunos (nome, nota) VALUES ('Jack Burton', 6);
INSERT INTO alunos (nome, nota) VALUES ('Jonh Matrix', 4);
INSERT INTO alunos (nome, nota) VALUES ('Conan', 10);
INSERT INTO alunos (nome, nota) VALUES ('Blade', 9);
INSERT INTO alunos (nome, nota) VALUES ('Rambo', 7);
INSERT INTO alunos (nome, nota) VALUES ('Json', 3);
INSERT INTO alunos (nome, nota) VALUES ('Mr White', 8);
INSERT INTO alunos (nome, nota) VALUES ('Robocop', 6);
INSERT INTO alunos (nome, nota) VALUES ('Beatrix Kiddo', 9.9);
INSERT INTO alunos (nome, nota) VALUES ('Malboro Man', 1);
INSERT INTO alunos (nome, nota) VALUES ('Axel foley', 0);
INSERT INTO alunos (nome, nota) VALUES ('James Bond', 0.1);
INSERT INTO alunos (nome, nota) VALUES ('Pai Mei', 9.7);

SELECT * FROM alunos;