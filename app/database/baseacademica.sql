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


CREATE TABLE componente_curricular (
  cod_componente INTEGER PRIMARY KEY NOT NULL,
  departamento VARCHAR(50),
  nome VARCHAR(100) ,
  nivel VARCHAR(100),
  carga_horaria INTEGER,
  tipo CHAR(1)
);

CREATE TABLE pre_requisito (
  cod_componente INTEGER,
  pre_requisito INTEGER,
  CONSTRAINT PK_pre_requisito PRIMARY KEY (cod_componente, pre_requisito),
  FOREIGN KEY(cod_componente) REFERENCES componente_curricular(cod_componente), 
  FOREIGN KEY(pre_requisito) REFERENCES componente_curricular(cod_componente)
);

CREATE TABLE co_requisito (
  cod_componente INTEGER,
  co_requisito INTEGER,
  CONSTRAINT PK_co_requisito PRIMARY KEY (cod_componente, co_requisito),
  FOREIGN KEY(cod_componente) REFERENCES componente_curricular(cod_componente), 
  FOREIGN KEY(co_requisito) REFERENCES componente_curricular(cod_componente)
);

CREATE TABLE plano_curso (
  cod_plano INTEGER PRIMARY KEY NOT NULL,
  matricula_aluno INTEGER, 
  FOREIGN KEY(matricula_aluno) REFERENCES usuario(matricula)
);

CREATE TABLE plano_curso_componente (
  cod_plano INTEGER,
  cod_componente INTEGER,
  CONSTRAINT PK_plano_componente PRIMARY KEY (cod_plano, cod_componente),
  FOREIGN KEY(cod_componente) REFERENCES componente_curricular(cod_componente), 
  FOREIGN KEY(cod_plano) REFERENCES plano_curso(cod_plano)
);

CREATE TABLE orientacao (
  cod_orientacao INTEGER PRIMARY KEY NOT NULL,
  cod_plano INTEGER,
  matricula_professor INTEGER,
  data DATE,
  texto VARCHAR(200),
  FOREIGN KEY(matricula_professor) REFERENCES usuario(matricula), 
  FOREIGN KEY(cod_plano) REFERENCES plano_curso(cod_plano)
);

CREATE TABLE curso (
  cod_curso INTEGER PRIMARY KEY NOT NULL,
  nome_curso VARCHAR(200),
  nivel VARCHAR(50)
);

CREATE TABLE aluno (
  matricula_aluno INTEGER,
  cod_curso INTEGER,
  CONSTRAINT PK_aluno PRIMARY KEY (matricula_aluno,cod_curso),
  FOREIGN KEY(matricula_aluno) REFERENCES usuario(matricula), 
  FOREIGN KEY(cod_curso) REFERENCES curso(cod_curso)
);

CREATE TABLE curso_componente (
  cod_curso INTEGER,
  cod_componente INTEGER,
  CONSTRAINT PK_curso_componente PRIMARY KEY (cod_curso,cod_componente),
  FOREIGN KEY(cod_curso) REFERENCES curso(cod_curso), 
  FOREIGN KEY(cod_componente) REFERENCES componente_curricular(cod_componente)
);

CREATE TABLE historico_escolar (
  id INTEGER PRIMARY KEY NOT NULL, 
  matricula_aluno INTEGER,
  cod_componente VARCHAR(20),
  nota FLOAT,
  situacao VARCHAR(50),
  ano FLOAT,
  FOREIGN KEY(matricula_aluno) REFERENCES usuario(matricula), 
  FOREIGN KEY(cod_componente) REFERENCES componente_curricular(cod_componente)
);

CREATE TABLE grupo (
  cod_grupo INTEGER,
  matricula_aluno INTEGER,
  CONSTRAINT PK_grupo PRIMARY KEY (cod_grupo, matricula_aluno),
  FOREIGN KEY(matricula_aluno) REFERENCES usuario(matricula)
);

CREATE TABLE reuniao (
  cod_reuniao INTEGER PRIMARY KEY NOT NULL,
  matricula_professor INTEGER,
  cod_grupo INTEGER,
  assunto VARCHAR(200),
  horario TIME,
  mensagem VARCHAR(200),
  data DATE,
  FOREIGN KEY(matricula_professor) REFERENCES usuario(matricula),
  FOREIGN KEY(cod_grupo) REFERENCES grupo(PK_grupo)
);

CREATE TABLE notificacao (
  cod_notificacao INTEGER PRIMARY KEY NOT NULL,
  assunto VARCHAR(200),
  confirmacao CHAR,
  mensagem VARCHAR(200),
  data DATE
);

CREATE TABLE reuniao_notificacao (
  cod_reuniao INTEGER,
  cod_notificacao INTEGER,
  CONSTRAINT PK_reuniao_notificacao PRIMARY KEY (cod_reuniao, cod_notificacao),
  FOREIGN KEY(cod_reuniao) REFERENCES reuniao(cod_reuniao),
  FOREIGN KEY(cod_notificacao) REFERENCES notificacao(cod_notificacao)
);

CREATE TABLE plano_notificacao (
  cod_plano INTEGER,
  cod_notificacao INTEGER,
  CONSTRAINT PK_plano_notificacao PRIMARY KEY (cod_plano, cod_notificacao),
  FOREIGN KEY(cod_plano) REFERENCES plano(cod_plano),
  FOREIGN KEY(cod_notificacao) REFERENCES notificacao(cod_notificacao)
);

CREATE TABLE turma_aluno (
  cod_turma INTEGER,
  matricula_aluno INTEGER,
  CONSTRAINT PK_turma_aluno PRIMARY KEY (cod_turma, matricula_aluno),
  FOREIGN KEY(matricula_aluno) REFERENCES usuario(matricula)
);

CREATE TABLE turma (
  cod_turma INTEGER PRIMARY KEY NOT NULL,
  matricula_professor INTEGER,
  cod_turma_aluno INTEGER,
  ano_semestre VARCHAR(200),
  horario TIME,
  departamento VARCHAR(50),
  disciplina INTEGER,
  FOREIGN KEY(disciplina) REFERENCES componente_curricular (cod_componente ), 
  FOREIGN KEY(matricula_professor) REFERENCES usuario(matricula),
  FOREIGN KEY(cod_turma_aluno) REFERENCES turma_aluno(PK_turma_aluno)
);

