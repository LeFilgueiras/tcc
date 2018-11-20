   CREATE TABLE Usuario(
    	id_Aluno INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    	Nome VARCHAR(100) NOT NULL,
      Sobrenome VARCHAR(100) NOT NULL,
    	Email VARCHAR(50) NOT NULL,
    	Usuario VARCHAR(30) NOT NULL,
    	Senha VARCHAR(60) NOT NULL,
    	Instituicao VARCHAR(50))
      Foto VARCHAR(100);

    CREATE TABLE Materia(
    	id_Materia INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    	Nome VARCHAR(100) NOT NULL,
    	id_Aluno INT NOT NULL,
      FOREIGN KEY (id_Aluno) REFERENCES Usuario(id_Aluno));

    CREATE TABLE Avaliacao(
    	id_Avaliacao INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
      certificacao INT,
      teste FLOAT,
      trab1 FLOAT,
      trab2 FLOAT,
      trab3 FLOAT,
      prova FLOAT,
      apoio FLOAT,
      id_Aluno INT NOT NULL,
      id_Materia INT NOT NULL,
      FOREIGN KEY (id_Aluno) REFERENCES Usuario(id_Aluno),
      FOREIGN KEY (id_Materia) REFERENCES Materia(id_Materia));

    CREATE TABLE Tarefa(
    	id_Tarefa INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    	Nome VARCHAR(100) NOT NULL,
    	Descricao VARCHAR(100),
    	Data_Termino DATE,
    	Hora_Termino DATE,
      id_Aluno INT NOT NULL,
      FOREIGN KEY (id_Aluno) REFERENCES Usuario(id_Aluno));

    CREATE TABLE Evento(
    	id_Evento INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    	Nome VARCHAR(100) NOT NULL,
    	Lugar VARCHAR(100),
    	Data_Termino DATE,
    	Hora_Inicio DATE,
    	Hora_Termino DATE,
      id_Aluno INT NOT NULL,
      FOREIGN KEY (id_Aluno) REFERENCES Usuario(id_Aluno));
