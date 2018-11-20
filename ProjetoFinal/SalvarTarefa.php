<?php
require_once('ConexaoBd.php');
function SalvarTarefas($Nome, $Descricao, $DataTermino, $HoraTermino, $idAluno){

  $bd = CriaConexãoBD();
  $sql = $bd->prepare('INSERT INTO Tarefa (Nome, Descricao, Data_Termino, Hora_Termino, id_Aluno)
  VALUES (:valNome, :valDescricao, :valData_Termino, :valHora_Termino, :valid_Aluno)');

    $sql->bindValue(':valNome', $Nome);
    $sql->bindValue(':valDescricao', $Descricao);
    $sql->bindValue(':valData_Termino', $DataTermino);
    $sql->bindValue(':valHora_Termino', $HoraTermino);
    $sql->bindValue(':valid_Aluno', $idAluno);

    $sql->execute();
}

$erros = [];
$request = array_map('trim', $_REQUEST);
$request = filter_var_array(
  $request,
  [
    'nome' => FILTER_DEFAULT,
    'descricao' => FILTER_DEFAULT,
    'data' => FILTER_DEFAULT,
    'hora' => FILTER_DEFAULT,
    'idAluno' => FILTER_DEFAULT
  ]);

if ($request['nome'] == null){
  $erros = "O campo Nome não pode ser nulo";
}

if ($request['data'] == null){
  $erros = "O campo Data não pode ser nulo";
}
  session_start();
  if (empty($erros) == true) {
    SalvarTarefas($request['nome'], $request['descricao'], $request['data'], $request['hora'], $request['idAluno']);
    header('Location: paginaCalendario.php');
  }
  else{
      echo $erros;
  }

?>
