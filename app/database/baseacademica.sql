BEGIN TRANSACTION;

CREATE TABLE usuario (
  matricula INTEGER PRIMARY KEY NOT NULL,
  nome VARCHAR(200),
  status VARCHAR(100) ,
  email VARCHAR(100),
  dataIngresso DATE,
  tipo char(1)
);

INSERT INTO usuario VALUES ('0001','Bruno César','Ativo','bruno@teste.com','2020-03-10','A');
CREATE TABLE componente_curricular (
  cod_componente INTEGER PRIMARY KEY NOT NULL,
  departamento VARCHAR(50),
  nome VARCHAR(100) ,
  nivel VARCHAR(100),
  carga_horaria INTEGER,
  tipo char(1)
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
  CONSTRAINT PK_co_requisito PRIMARY KEY (cod_plano, cod_componente),
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
  matricula_aluno INTEGER,
  cod_componente INTEGER,
  nota FLOAT,
  CONSTRAINT PK_historico_escolar PRIMARY KEY (matricula_aluno,cod_componente),
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
  matricula_aluno INTEGER,
  cod_grupo INTEGER,
  assunto VARCHAR(200),
  horario TIME,
  mensagem VARCHAR(200),
  data DATE,
  FOREIGN KEY(matricula_aluno) REFERENCES usuario(matricula),
  FOREIGN KEY(cod_grupo) REFERENCES grupo(PK_grupo)
);

CREATE TABLE notificao (
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
  FOREIGN KEY(cod_notificacao) REFERENCES codificacao(cod_notificacao)
);

CREATE TABLE plano_notificacao (
  cod_plano INTEGER,
  cod_notificacao INTEGER,
  CONSTRAINT PK_plano_notificacao PRIMARY KEY (cod_plano, cod_notificacao),
  FOREIGN KEY(cod_plano) REFERENCES plano(cod_plano),
  FOREIGN KEY(cod_notificacao) REFERENCES codificacao(cod_notificacao)
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
  FOREIGN KEY(matricula_professor) REFERENCES usuario(matricula),
  FOREIGN KEY(cod_turma_aluno) REFERENCES turma_aluno(PK_turma_aluno)
);

