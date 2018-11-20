<?php
require_once('ConexaoBd.php');
function SalvarEventos($Nome, $Lugar, $Data, $Inicio, $Fim, $idAluno){

  $bd = CriaConexãoBD();
  $sql = $bd->prepare('INSERT INTO Evento (Nome, Lugar, Data_Termino, Hora_Inicio, Hora_Termino, id_Aluno)
  VALUES (:valNome, :valLugar, :valData_Termino, :valHora_Inicio, :valHora_Termino, :valid_Aluno)');

    $sql->bindValue(':valNome', $Nome);
    $sql->bindValue(':valLugar', $Lugar);
    $sql->bindValue(':valData_Termino', $Data);
    $sql->bindValue(':valHora_Inicio', $Inicio);
    $sql->bindValue(':valHora_Termino', $Fim);
    $sql->bindValue(':valid_Aluno', $idAluno);

    $sql->execute();
}

$erros = [];
$request = array_map('trim', $_REQUEST);
$request = filter_var_array(
  $request,
  [
    'nome' => FILTER_DEFAULT,
    'lugar' => FILTER_DEFAULT,
    'data' => FILTER_DEFAULT,
    'inicio' => FILTER_DEFAULT,
    'fim' => FILTER_DEFAULT,
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
    SalvarEventos($request['nome'], $request['lugar'], $request['data'], $request['inicio'], $request['fim'], $request['idAluno']);
    header('Location: paginaCalendario.php');
  }
  else{
      echo $erros;
  }

?>
