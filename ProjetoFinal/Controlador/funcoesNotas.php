<?php
  require_once('ConexaoBd.php');

  function PegaMateriasDoAluno(int $idAluno)
  {
    $bd = CriaConexãoBD();
    $sql = $bd -> prepare('SELECT * FROM Materia where id_Aluno = :valId');
    $sql -> bindvalue(':valId', $idAluno);
    $sql -> execute();
    return $sql -> fetchall();
  }

  function PegaNotas(int $idMateria)
  {
    $bd = CriaConexãoBD();
    $sql = $bd -> prepare('SELECT * FROM Avaliacao WHERE id_Materia= :valId');
    $sql -> bindvalue(':valId', $idMateria);
    $sql -> execute();
    return $sql -> fetchall();

  }


?>
