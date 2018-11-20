<?php
require_once('ConexaoBd.php');
function ApagarMaterias($idMateria, $Nome)
{
  $bd = CriaConexãoBD();
  $sql = $bd->prepare('DELETE FROM Materia WHERE id_Materia = :valid_Materia AND Nome = :valNome');

    $sql->bindValue(':valid_Materia', $idMateria);
    $sql->bindValue(':valNome', $Nome);

  $sql->execute();
}
function SalvarMaterias($Nome, $idAluno){

  $bd = CriaConexãoBD();
  $sql = $bd->prepare('INSERT INTO materia (Nome, id_Aluno)
  VALUES (:valNome, :validAluno)');

    $sql->bindValue(':valNome', $Nome);
    $sql->bindValue(':validAluno', $idAluno);

    $sql->execute();
}

$erros = [];
$request = array_map('trim', $_REQUEST);
$request = filter_var_array(
  $request,
  [
    'idMateria' => FILTER_DEFAULT,
    'mat' => FILTER_DEFAULT,
    'matinsert' => FILTER_DEFAULT,
    'idAluno' => FILTER_DEFAULT
  ]);
var_dump($request['mat']);
if ($request['mat'] == null){
  $erros = "Voce é nulo vacilao";
}

if ($request['idAluno'] == null){
  $erros = "Voce é nulo vacilao1";
}
  session_start();
  if (empty($erros) == true) {
    ApagarMaterias($request['idMateria'],$request['matinsert']);
    SalvarMaterias($request['mat'], $request['idAluno']);
    header('Location: paginaPerfil.php');
  }
  else{
      echo $erros;
  }

?>
