BEGIN TRANSACTION;

CREATE TABLE professor (
  matricula VARCHAR(100)PRIMARY KEY NOT NULL,
  nome VARCHAR(200),
  status VARCHAR(100) ,
  email VARCHAR(100),
  dataIngresso DATE
);

INSERT INTO professor VALUES('0001','Jair Fonseca', 'Ativo', 'jairfonseca@teste.com', '10/01/2000');
INSERT INTO professor VALUES('0002','Paulo Guedes','Ativo' , 'pauloguedes@teste.com', '05/01/1980');
INSERT INTO professor VALUES('0003','Jorge Lodi', 'Inativo', 'jorgelodi@teste.com','20/04/1995');
INSERT INTO professor VALUES('0004','Samuel Lopes','Ativo' , 'samuellopes@teste.com','08/04/1985');

CREATE TABLE aluno (
  matricula VARCHAR(100)PRIMARY KEY NOT NULL,
  nome VARCHAR(200),
  status VARCHAR(100),
  email VARCHAR(100),
  data_ingresso DATE
);

INSERT INTO aluno VALUES('0005','Bruno César','Ativo', 'brunocesar@teste.com','02/02/2010');
INSERT INTO aluno VALUES('0006','Willian Talles','Ativo', 'williantalles@teste.com','02/02/2010');
INSERT INTO aluno VALUES('0007','Ágatha Gabrielly','Ativo', 'agathagabrielly@teste.com','02/02/2010');
INSERT INTO aluno VALUES('0008','Adriel Cauã','Inativo' , 'adrielcaua@teste.com','02/02/2000');
INSERT INTO aluno VALUES('0009','Andressa Mykahella','Ativo' , 'andressamykahella@teste.com','02/02/2000');
INSERT INTO aluno VALUES(00010,'João Pedro','Ativo', 'joaopedro@teste.com','03/08/2015');

CREATE TABLE componente_curricular (
  cod_disciplina VARCHAR(100) PRIMARY KEY NOT NULL,
  nome_disciplina VARCHAR(200),
  nivel VARCHAR(50),
  departamento VARCHAR(100),  
  carga_horaria INTEGER,
  tipo CHAR(1)
);

INSERT INTO componente_curricular VALUES('ECT1201','ALGEBRA LINEAR','Graduação','ECT','60','O');
INSERT INTO componente_curricular VALUES('ECT1543','BANCO DE DADOS','Graduação','ECT','90','O');
INSERT INTO componente_curricular VALUES('ECT1203','LINGUAGEM DE PROGRAMAÇÃO','Graduação','ECT','60','O');
INSERT INTO componente_curricular VALUES('ECT1402','MECÂNICA DOS SÓLIDOS','Graduação','ECT','60','E');	
	
CREATE TABLE pre_requisito (
  id INTEGER PRIMARY KEY NOT NULL,
  componente_curricular_id VARCHAR(100) NOT NULL, 
  pre_requisito_id VARCHAR(100) NOT NULL,
  FOREIGN KEY(componente_curricular_id) REFERENCES componente_curricular(cod_disciplina), 
  FOREIGN KEY(pre_requisito_id) REFERENCES componente_curricular(cod_disciplina)
);
/* tem que alterar essa forma de inserção, pq eu mudei os campos da tabela*/
/*INSERT INTO pre_requisito VALUES(1,1,NULL);*/
INSERT INTO pre_requisito VALUES(2,3,1);
INSERT INTO pre_requisito VALUES(3,2,4);
INSERT INTO pre_requisito VALUES(4,2,6);
/*INSERT INTO pre_requisito VALUES(5,5,NULL);
INSERT INTO pre_requisito VALUES(6,6,NULL);*/
INSERT INTO pre_requisito VALUES(6,4,1);
INSERT INTO pre_requisito VALUES(7,6,1);
/*
CREATE TABLE co_requisito (
  id INTEGER PRIMARY KEY NOT NULL,
  componente_curricular_id INTEGER NOT NULL, 
  co_requisito_id INTEGER NOT NULL,
  FOREIGN KEY(componente_curricular_id) REFERENCES componente_curricular(id), 
  FOREIGN KEY(co_requisito_id) REFERENCES componente_curricular(id)
);
*/
CREATE TABLE turma (
  cod_turma INTEGER PRIMARY KEY NOT NULL,
  horario VARCHAR(200),
  ano_semestre VARCHAR(100) ,
  departamento VARCHAR(100)
);
CREATE TABLE plano_curso (
  cod_plano_curso INTEGER PRIMARY KEY NOT NULL,
  data DATE
);
CREATE TABLE notificacao (
  cod_notificacao INTEGER PRIMARY KEY NOT NULL,
  data DATE,
  assunto VARCHAR(200),
  mensagem VARCHAR(500),
  confirmacao CHAR(1),  
);
CREATE TABLE reuniao (
  cod_reuniao INTEGER PRIMARY KEY NOT NULL,
  data DATE,
  horario VARCHAR(50),
  assunto VARCHAR(200),
  mensagem VARCHAR(500)  
);
CREATE TABLE curso (
  cod_curso INTEGER PRIMARY KEY NOT NULL,
  nivel VARCHAR(50),
  nome_curso VARCHAR(200)  
);

