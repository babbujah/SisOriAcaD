BEGIN TRANSACTION;

CREATE TABLE usuario (
  matricula INTEGER PRIMARY KEY NOT NULL,
  nome VARCHAR(200),
  vinculo CHAR(1),
  status CHAR(1),
  email VARCHAR(100),
  dataIngresso DATE
);

INSERT INTO usuario VALUES(1,'Jair Fonseca','P','A','jairfonseca@teste.com', '10/01/2000');
INSERT INTO usuario VALUES(2,'Paulo Guedes','A', 'A' , 'pauloguedes@teste.com', '05/01/1980');
INSERT INTO usuario VALUES(3,'Jorge Lodi', 'A' ,'I', 'jorgelodi@teste.com','20/04/1995');
INSERT INTO usuario VALUES(4,'Samuel Lopes','P','A' , 'samuellopes@teste.com','08/04/1985');
INSERT INTO usuario VALUES(5,'Bruno César','A','A', 'brunocesar@teste.com','02/02/2010');
INSERT INTO usuario VALUES(6,'Willian Talles','A','A', 'williantalles@teste.com','02/02/2010');
INSERT INTO usuario VALUES(7,'Ágatha Gabrielly','P','A', 'agathagabrielly@teste.com','02/02/2010');
INSERT INTO usuario VALUES(8,'Adriel Cauã','A','I' , 'adrielcaua@teste.com','02/02/2000');
INSERT INTO usuario VALUES(9,'Andressa Mykahella','A','A' , 'andressamykahella@teste.com','02/02/2000');
INSERT INTO usuario VALUES(10,'João Pedro','A','A', 'joaopedro@teste.com','03/08/2015');

CREATE TABLE nivel (
  id INTEGER PRIMARY KEY NOT NULL,
  nome_nivel VARCHAR(100)
);

INSERT INTO nivel VALUES(1,'Técnico');
INSERT INTO nivel VALUES(2,'Médio');
INSERT INTO nivel VALUES(3,'Graduação');
INSERT INTO nivel VALUES(4,'Mestrado');	
INSERT INTO nivel VALUES(5,'Doutorado');

CREATE TABLE departamento (
  id INTEGER PRIMARY KEY NOT NULL,
  nome_departamento VARCHAR(100)
);

INSERT INTO departamento VALUES(1,'ECT');
INSERT INTO departamento VALUES(2,'IMD');
INSERT INTO departamento VALUES(3,'DIMAP');

CREATE TABLE componente_curricular (
  cod_disciplina VARCHAR(100) PRIMARY KEY NOT NULL,
  nome_disciplina VARCHAR(200),
  nivel_id INTEGER,
  departamento_id INTEGER,  
  carga_horaria INTEGER,
  tipo CHAR(1),
  FOREIGN KEY(nivel_id) REFERENCES nivel(id), 
  FOREIGN KEY(departamento_id) REFERENCES departamento(id)
);

INSERT INTO componente_curricular VALUES('ECT1201','ALGEBRA LINEAR',3,1,60,'O');
INSERT INTO componente_curricular VALUES('ECT1543','BANCO DE DADOS',3,1,90,'O');
INSERT INTO componente_curricular VALUES('ECT1203','LINGUAGEM DE PROGRAMAÇÃO',3,1,60,'O');
INSERT INTO componente_curricular VALUES('ECT1402','MECÂNICA DOS SÓLIDOS',3,1,60,'E');
INSERT INTO componente_curricular VALUES('IMD1010','RESOLUÇÃO DE PROBLEMAS MATEMÁTICOS PARA TI',3,2,180,'O');
INSERT INTO componente_curricular VALUES('IMD1011','LÓGICA DE PROGRAMAÇÃO 1',3,2, 90, 'O');
INSERT INTO componente_curricular VALUES('IMD1012','CÁLCULO 1',3,2, 90, 'O');
INSERT INTO componente_curricular VALUES('IMD1013','INTRODUÇÃO AS TÉCNICAS DE PROGRAMAÇÃO',3,2, 60, 'O');
INSERT INTO componente_curricular VALUES('IMD1014','ANÁLISE E PROJETO ORIENTADO À OBJETO',3,3, 60, 'E');
INSERT INTO componente_curricular VALUES('IMD1015','SEGURANÇA DE REDES',3,2, 60, 'E');
INSERT INTO componente_curricular VALUES('IMD1016','PRÁTICA DE TÉCNICAS DE PROGRAMAÇÃO',3,2, 60, 'O');


CREATE TABLE pre_requisito (
  id INTEGER PRIMARY KEY NOT NULL,
  cod_disciplina VARCHAR(100) NOT NULL, 
  pre_requisito VARCHAR(100) NOT NULL,
  FOREIGN KEY(cod_disciplina) REFERENCES componente_curricular(cod_disciplina), 
  FOREIGN KEY(pre_requisito) REFERENCES componente_curricular(cod_disciplina)
);

/*INSERT INTO pre_requisito VALUES(1,1,NULL);*/
INSERT INTO pre_requisito VALUES(1,'IMD1012','IMD1010');
INSERT INTO pre_requisito VALUES(2,'IMD1011','IMD1013');
INSERT INTO pre_requisito VALUES(3,'IMD1011','IMD1016');
/*INSERT INTO pre_requisito VALUES(5,5,NULL);
INSERT INTO pre_requisito VALUES(6,6,NULL);*/
INSERT INTO pre_requisito VALUES(4,'IMD1013','IMD1010');
INSERT INTO pre_requisito VALUES(7,'IMD1016','IMD1010');
/*
CREATE TABLE co_requisito (
  id INTEGER PRIMARY KEY NOT NULL,
  componente_curricular_id INTEGER NOT NULL, 
  co_requisito_id INTEGER NOT NULL,
  FOREIGN KEY(componente_curricular_id) REFERENCES componente_curricular(id), 
  FOREIGN KEY(co_requisito_id) REFERENCES componente_curricular(id)
);
*/