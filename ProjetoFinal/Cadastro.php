<?php
  include 'ConexaoBd.php';
  function buscaemail(string $emailigual)
  {
  	$bd = CriaConexãoBD();
  	$sql = $bd -> prepare ('SELECT email FROM usuario WHERE email = :valemail');
    $sql -> bindValue(':valemail', $emailigual);
    $sql -> execute();
    return $sql -> rowCount();
  }
  function InsereUsuario($dadosNovoContato)
  {
    $bd = CriaConexãoBD();
    $sql = $bd->prepare("INSERT INTO Usuario (nome, sobrenome, usuario, email, senha, instituicao) VALUES (:valnome, :valsobrenome, :valusuario, :valemail, :valsenha, :valinstituicao)");
      $senha = $dadosNovoContato['senha'];
      $hash = password_hash($senha, PASSWORD_DEFAULT);
      $sql->bindValue(':valnome', $dadosNovoContato['nome']);
      $sql->bindValue(':valsobrenome', $dadosNovoContato['sobrenome']);
      $sql->bindValue(':valusuario', $dadosNovoContato['usuario']);
      $sql->bindValue(':valemail', $dadosNovoContato['email']);
      $sql->bindValue(':valsenha', $hash);
      $sql->bindValue(':valinstituicao', $dadosNovoContato['instituicao']);

      $sql->execute();

      return $bd->lastInsertId();
  }

  $erros=[];

      $request = array_map('trim', $_REQUEST);

      $request = filter_var_array(
        $request,
        [
          'nome' => FILTER_DEFAULT,
          'sobrenome' => FILTER_DEFAULT,
          'usuario' => FILTER_DEFAULT,
          'email' => FILTER_VALIDATE_EMAIL,
          'senha' => FILTER_DEFAULT,
          'confsenha' => FILTER_DEFAULT,
          'instituicao' => FILTER_DEFAULT
        ]
      );

    $nome= $request['nome'];
    if ($nome == false)
    {$erros = "O campo Nome precisa ser preenchido.";}
    else if (strlen($nome) > 20)
    {$erros = "O nome informado não pode ultrapassar 20 caracteres.";}

    $sobrenome = $request['sobrenome'];
    if ($sobrenome == false)
    {$erros = "O campo Sobrenome precisa ser preenchido.";}
    else if (strlen($sobrenome) > 20)
    {$erros = "O sobrenome informado não pode ultrapassar 20 caracteres.";}

    $usuario = $request['usuario'];
    if ($usuario == false)
    {$erros = "O campo Usuário precisa ser preenchido.";}
    else if (strlen($usuario) < 3 || strlen($usuario) > 20)
    {$erros = "O nome de usuário informado não pode ultrapassar 20 caracteres.";}

    $email = $request['email'];
    if ($email == false)
    {$erros = "O campo Email precisa ser preenchido.";}
    if(buscaemail($email)>0){
      $erros = "Já existe um email cadastrado.";
    }

    $senha = $request['senha'];
    if ($senha == false)
    {$erros = "O campo Senha precisa ser preenchido.";}
    else if (strlen($senha) < 6 || strlen($senha) > 12)
    {$erros = "A senha informada não é válida.";}

    $confirmaSenha = $request['confsenha'];
    if ($confirmaSenha == false)
    {$erros = "O campo Confirme Sua Senha precisa ser preenchido.";}
    else if ($confirmaSenha!=$senha)
    {$erros = "As senhas não coincidem";}

    $instituicao = $request['instituicao'];
    if ($instituicao == false)
    {$erros = "O campo Instituição precisa ser preenchido.";}
    else if (strlen($instituicao) > 20)
    {$erros = "A instituição informada não pode ultrapassar 20 caracteres.";}

  session_start();
  if (empty($erros) == true) {
    $id = InsereUsuario($request);
    $_SESSION['idAluno'] = $id;
    header('Location: paginaPerfil.php');
  }
  else{
      $_SESSION['erroLogin'] = $e;
      header('Location: paginaInicio.php');
  }

?>
