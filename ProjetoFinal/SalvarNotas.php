<?php
require_once('ConexaoBd.php');
function SalvarNotas($certificacao,$teste,$trab1,$trab2,$trab3,$prova,$apoio,$id_Materia,$id_Aluno)
{
  $bd = CriaConexãoBD();
  $sql = $bd->prepare('DELETE FROM Avaliacao WHERE id_Materia = :valid_Materia
                       AND id_Aluno = :valid_Aluno  AND certificacao = :valcertificacao');

    $sql->bindValue(':valid_Materia', $id_Materia);
    $sql->bindValue(':valid_Aluno', $id_Aluno);
    $sql->bindValue(':valcertificacao', $certificacao);

  $sql->execute();

  $sql = $bd->prepare('INSERT INTO Avaliacao (certificacao, teste, trab1, trab2, trab3, prova, apoio, id_Materia, id_Aluno)
  VALUES (:valcertificacao, :valteste, :valtrab1, :valtrab2, :valtrab3, :valprova, :valapoio, :valid_Materia, :valid_Aluno)');

    $sql->bindValue(':valcertificacao', $certificacao);
    $sql->bindValue(':valteste', $teste);
    $sql->bindValue(':valtrab1', $trab1);
    $sql->bindValue(':valtrab2', $trab2);
    $sql->bindValue(':valtrab3', $trab3);
    $sql->bindValue(':valprova', $prova);
    $sql->bindValue(':valapoio', $apoio);
    $sql->bindValue(':valid_Materia', $id_Materia);
    $sql->bindValue(':valid_Aluno', $id_Aluno);

    $sql->execute();
}

$erros=[];

    $request = array_map('trim', $_REQUEST);

    $request = filter_var_array(
      $request,
      [
        'certificacao1' => FILTER_DEFAULT,
        'teste_1' => FILTER_DEFAULT,
        'trab1_1' => FILTER_DEFAULT,
        'trab2_1' => FILTER_DEFAULT,
        'trab3_1' => FILTER_DEFAULT,
        'prova_1' => FILTER_DEFAULT,
        'apoio_1' => FILTER_DEFAULT,
        'certificacao2' => FILTER_DEFAULT,
        'teste_2' => FILTER_DEFAULT,
        'trab1_2' => FILTER_DEFAULT,
        'trab2_2' => FILTER_DEFAULT,
        'trab3_2' => FILTER_DEFAULT,
        'prova_2' => FILTER_DEFAULT,
        'apoio_2' => FILTER_DEFAULT,
        'certificacao3' => FILTER_DEFAULT,
        'teste_3' => FILTER_DEFAULT,
        'trab1_3' => FILTER_DEFAULT,
        'trab2_3' => FILTER_DEFAULT,
        'trab3_3' => FILTER_DEFAULT,
        'prova_3' => FILTER_DEFAULT,
        'apoio_3' => FILTER_DEFAULT,
        'idMateria' => FILTER_DEFAULT,
        'idAluno' => FILTER_DEFAULT
      ]
    );

  $certificacao1 = $request['certificacao1'];
  if ($certificacao1 != 1)
  {$erros = "Cerificação Inválida.";}

  $teste_1 = $request['teste_1'];
  if ($teste_1 > 10)
  {$erros = "O teste não pode ser maior que 10";}

  $trab1_1 = $request['trab1_1'];
  if ($trab1_1 > 10)
  {$erros = "O trabalho não pode ser maior que 10";}

  $trab2_1 = $request['trab2_1'];
  if ($trab2_1 > 10)
  {$erros = "O trabalho não pode ser maior que 10";}

  $trab3_1 = $request['trab3_1'];
  if ($trab3_1 > 10)
  {$erros = "O trabalho não pode ser maior que 10";}

  $prova_1 = $request['prova_1'];
  if ($prova_1 > 10)
  {$erros = "A prova não pode ser maior que 10";}

  $apoio_1 = $request['apoio_1'];
  if ($apoio_1 > 10.0)
  {$erros = "O apoio não pode ser maior que 10";}

//----------------------------------------------------------------------

  $certificacao2 = $request['certificacao2'];
  if ($certificacao2 != 2)
  {$erros = "Cerificação Inválida.";}

  $teste_2 = $request['teste_2'];
  if ($teste_2 > 10)
  {$erros = "O teste não pode ser maior que 10";}

  $trab1_2 = $request['trab1_2'];
  if ($trab1_2 > 10)
  {$erros = "O trabalho não pode ser maior que 10";}

  $trab2_2 = $request['trab2_2'];
  if ($trab2_2 > 10)
  {$erros = "O trabalho não pode ser maior que 10";}

  $trab3_2 = $request['trab3_2'];
  if($trab3_2 > 10)
  {$erros = "O trabalho não pode ser maior que 10";}

  $prova_2 = $request['prova_2'];
  if ($prova_2 > 10)
  {$erros = "A prova não pode ser maior que 10";}

  $apoio_2 = $request['apoio_2'];
  if ($apoio_2 > 10.0)
  {$erros = "O apoio não pode ser maior que 10";}

//----------------------------------------------------------------------

  $certificacao3 = $request['certificacao3'];
  if ($certificacao3 != 3)
  {$erros = "Cerificação Inválida.";}

  $teste_3 = $request['teste_3'];
  if ($teste_3 > 10)
  {$erros = "O teste não pode ser maior que 10";}

  $trab1_3 = $request['trab1_3'];
  if ($trab1_3 > 10)
  {$erros = "O trabalho não pode ser maior que 10";}

  $trab2_3 = $request['trab2_3'];
  if ($trab2_3 > 10)
  {$erros = "O trabalho não pode ser maior que 10";}

  $trab3_3 = $request['trab3_3'];
  if($trab3_3 > 10)
  {$erros = "O trabalho não pode ser maior que 10";}

  $prova_3 = $request['prova_3'];
  if ($prova_1 > 10)
  {$erros = "A prova não pode ser maior que 10";}

  $apoio_3 = $request['apoio_3'];
  if ($apoio_3 > 10.0)
  {$erros = "O apoio não pode ser maior que 10";}

session_start();
if (empty($erros) == true) {
  SalvarNotas($request['certificacao1'], $request['teste_1'], $request['trab1_1'],
  $request['trab2_1'], $request['trab3_1'], $request['prova_1'], $request['apoio_1'],
  $request['idMateria'], $request['idAluno']);
  SalvarNotas($request['certificacao2'], $request['teste_2'], $request['trab1_2'],
  $request['trab2_2'], $request['trab3_2'], $request['prova_2'], $request['apoio_2'],
  $request['idMateria'], $request['idAluno']);
  SalvarNotas($request['certificacao3'], $request['teste_3'], $request['trab1_3'],
  $request['trab2_3'], $request['trab3_3'], $request['prova_3'], $request['apoio_3'],
  $request['idMateria'], $request['idAluno']);
  header('Location: paginaNotas.php');
}
else{
    echo $erros;
}
?>
