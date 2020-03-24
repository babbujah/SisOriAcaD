BEGIN TRANSACTION;

CREATE TABLE professor (
  id INTEGER PRIMARY KEY NOT NULL,
  nome VARCHAR(200),
  matricula VARCHAR(100),
  email VARCHAR(100)
);

INSERT INTO professor VALUES(1,'Jair Fonseca', '0001', 'jairfonseca@teste.com');
INSERT INTO professor VALUES(2,'Paulo Guedes', '0002', 'pauloguedes@teste.com');
INSERT INTO professor VALUES(3,'Jorge Lodi', '0003', 'jorgelodi@teste.com');
INSERT INTO professor VALUES(4,'Samuel Lopes', '0004', 'samuellopes@teste.com');

CREATE TABLE aluno (
  id INTEGER PRIMARY KEY NOT NULL,
  nome VARCHAR(200),
  matricula VARCHAR(100),
  email VARCHAR(100)
);

INSERT INTO aluno VALUES(5,'Bruno César', '0005', 'brunocesar@teste.com');
INSERT INTO aluno VALUES(6,'Willian Talles', '0006', 'williantalles@teste.com');
INSERT INTO aluno VALUES(7,'Ágatha Gabrielly', '0007', 'agathagabrielly@teste.com');
INSERT INTO aluno VALUES(8,'Adriel Cauã', '0008', 'adrielcaua@teste.com');
INSERT INTO aluno VALUES(9,'Andressa Mykahella', '0009', 'andressamykahella@teste.com');
INSERT INTO aluno VALUES(10,'João Pedro', '0010', 'joaopedro@teste.com');

CREATE TABLE componente_curricular (
  id INTEGER PRIMARY KEY NOT NULL,
  nome_disciplina VARCHAR(200),
  cod_disciplina VARCHAR(100),
  carga_horaria INTEGER,
  tipo CHAR(1)
);

INSERT INTO componente_curricular VALUES(1,'RPMTI', 'DIS_1_RPMTI', 180, 'O');
INSERT INTO componente_curricular VALUES(2,'LP1', 'DIS_2_LP1', 90, 'O');
INSERT INTO componente_curricular VALUES(3,'CÁLCULO', 'DIS_3_CALC', 90, 'O');
INSERT INTO componente_curricular VALUES(4,'ITP', 'DIS_4_ITP', 60, 'O');
INSERT INTO componente_curricular VALUES(5,'APOO', 'DIS_5_APOO', 60, 'E');
INSERT INTO componente_curricular VALUES(6,'SEGURANÇA DE REDES', 'DIS_6_SR', 60, 'E');
INSERT INTO componente_curricular VALUES(7,'PTP', 'DIS_7_PTP', 60, 'O');


CREATE TABLE pre_requisito (
  id INTEGER PRIMARY KEY NOT NULL,
  componente_curricular_id INTEGER NOT NULL, 
  pre_requisito_id INTEGER NOT NULL,
  FOREIGN KEY(componente_curricular_id) REFERENCES componente_curricular(id), 
  FOREIGN KEY(pre_requisito_id) REFERENCES componente_curricular(id)
);

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