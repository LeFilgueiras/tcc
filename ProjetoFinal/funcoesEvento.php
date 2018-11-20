<?php
  require_once('ConexaoBd.php');
  session_start();

  function VerificaEventos(int $idAluno)
  {
    $bd = CriaConexãoBD();
    $sql = $bd -> prepare('SELECT * FROM Evento WHERE id_Aluno = :valId ORDER BY Data_Termino ASC');
    $sql -> bindvalue(':valId', $idAluno);
    $sql -> execute();
    return $sql -> fetchall();
  }

  function VerificaTarefas(int $idAluno)
  {
    $bd = CriaConexãoBD();
    $sql = $bd -> prepare('SELECT * FROM Tarefa WHERE id_Aluno = :valId ORDER BY Data_Termino ASC');
    $sql -> bindvalue(':valId', $idAluno);
    $sql -> execute();
    return $sql -> fetchall();
  }
