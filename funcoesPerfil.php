<?php
  require_once('ConexaoBd.php');
  session_start();
  function PegaDados(int $idAluno)
  {
    $bd = CriaConexãoBD();
    $sql = $bd -> prepare('SELECT * FROM Usuario where id_Aluno = :valId');
    $sql -> bindvalue(':valId', $idAluno);
    $sql -> execute();
    return $sql -> fetchall();
  }

  function VerificaMaterias(int $idAluno)
  {
    $bd = CriaConexãoBD();
    $sql = $bd -> prepare('SELECT * FROM Materia where id_Aluno = :valId');
    $sql -> bindvalue(':valId', $idAluno);
    $sql -> execute();
    return $sql -> rowcount();
  }

  function VerificaMaterias1(int $idAluno)
  {
    $bd = CriaConexãoBD();
    $sql = $bd -> prepare('SELECT * FROM Materia where id_Aluno = :valId');
    $sql -> bindvalue(':valId', $idAluno);
    $sql -> execute();
    return $sql -> fetchall();
  }
  
?>
