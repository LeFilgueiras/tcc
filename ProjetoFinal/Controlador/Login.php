<?php
  require_once("ConexaoBd.php");

  function BuscaUsuario(string $usuario){
    	$bd = CriaConexãoBD();
    	$sql = $bd -> prepare (
    	"SELECT id_Aluno, senha FROM Usuario
    	WHERE usuario = :valusuario");
    	$sql -> bindValue(':valusuario', $usuario);
      $sql -> execute();
    	return $sql -> fetch();
    }

  $erro = null;
	$_request = array_map('trim', $_REQUEST);
	$_request = filter_var_array(
	               $_request,
	               [ 'usuario' => FILTER_DEFAULT,
	                 'senha' => FILTER_DEFAULT ]
	           );
	$usuario = $_request['usuario'];
	$senha = $_request['senha'];

	if ($usuario == false)
	{
		$erro = "Usuário não informado";
	}
		else if ($senha == false)
	{
		$erro = "Senha não informada";
	}
	else
  {
    $dadosUsuario = BuscaUsuario($usuario);

     if ($dadosUsuario == false){
    		$erro = "Nenhum usuário cadastrado";
    	}
    	else if (password_verify($senha, $dadosUsuario['senha']) == false)
    	{
    		$erro = "Senha Inválida";
    	}
}

session_start();

	if(empty($erro) == false){
		$_SESSION['erroLogin'] = $erro;
		header('Location: Inicio.php');
	}
  else {
    $_SESSION['idAluno'] = $dadosUsuario['id_Aluno'];
    header('Location: paginaNotas.php');
  }
?>
