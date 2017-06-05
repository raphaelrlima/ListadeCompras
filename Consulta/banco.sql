CREATE TABLE autor (
  id_autor INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  nome_autor VARCHAR(255) NULL,
  filiacao_autor VARCHAR(20) NULL,
  PRIMARY KEY(id_autor)
);

CREATE TABLE categoria (
  id_categoria INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  categoria VARCHAR(20) NULL,
  PRIMARY KEY(id_categoria)
);

CREATE TABLE livros (
  id_livros INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  categoria_id_categoria INTEGER UNSIGNED NOT NULL,
  autor_id_autor INTEGER UNSIGNED NOT NULL,
  titulo_livros VARCHAR(255) NULL,
  editora_livros VARCHAR(20) NULL,
  edicao_livros VARCHAR(20) NULL,
  local_livros VARCHAR(20) NULL,
  ano_livros YEAR NULL,
  PRIMARY KEY(id_livros),
  INDEX livros_FKIndex1(autor_id_autor),
  INDEX livros_FKIndex2(categoria_id_categoria)
);


