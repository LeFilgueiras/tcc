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

  function enviarClass($Foto){
      $bd = CriaConexãoBD();
      $sql = $bd -> prepare(
        "INSERT INTO Usuario (Foto)
        Values (:valFoto);");
        $sql -> bindValue(':valFoto', $Foto);
        $sql -> execute();
    }
$id = $_SESSION['idAluno'];
$imagem = $_FILES['imagem'];
$pasta = "carregamentos/$id";

mkdir("$pasta");


$nomeOrig = $imagem['name'];
$caminhoCompleto = "$pasta/$nomeOrig";

if($arq['error'] != UPLOAD_ERR_OK) {
  $erro = "Erro ao carregar arquivo";
}
else{
  enviarClass($caminhoCompleto);
  $_SESSION['erroCarregamento'] = $erro;
  header("Location: paginaPerfil.php");
}
if (move_uploaded_file($imagem['tmp_name'], "$caminhoCompleto") == false ){
  $erro = "Erro ao salvar arquivo no servidor";
}
?>
