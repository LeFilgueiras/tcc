<?php
	session_start();
	if(array_key_exists('erroLogin' , $_SESSION))
	{
	 $erro = $_SESSION['erroLogin'];
	 unset($_SESSION['erroLogin']);
	 //header('Location = Inicio.php');
	}
	else
	{
		$erro= null;
	}
	if (array_key_exists('emailUsuarioLogado', $_SESSION))
	{
	 header('Location: paginaNotas.php');
	 exit();
 }
?>
<!DOCTYPE html>
  <html>
    <head>

      <meta charset="UTF-8">
      <title>Cotton Candy</title>
      <link rel="shortcut icon" href="logo1.png" />
      <link rel="stylesheet" href="stylesInicio.css">

    </head>
    <body style="overflow:hidden;">

      <header class="cabeçalho">
        <form class="login" method="post" action="Login.php">

          <?php if (empty($erro) == false) { ?>

						<div class="erro">
	          <p> Erro: <?= $erro ?> </p>
	        	</div>

      		<?php } ?>

          <div class="login">
            &nbsp;&nbsp;&nbsp;
              <label> Usuário </label><input  id="usuario" type="text" name="usuario" placeholder="ex: Ygor" minlength=3 maxlength=12 required>
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label> Senha </label> <input id="senha" type="password" name="senha" placeholder="*****" minlength=3 maxlength=12 required>
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             <input id="loginbutton" type="submit" name="entrar" value="entrar">
          </div>

        </form>
      </header><br>

      <div id="inicio">
      </div><br>

      <div id="cadastro">

        <h1 id="titulo"> <font color="#FB4E59"> Crie uma nova conta </font></h1>
        <form class="cadastro" method="post" action="Cadastro.php">

          <input class="cadastroinput" type="text" name="nome" placeholder="Nome" minlength=3 maxlength=12 required/><br><br>
          <input class="cadastroinput" type="text" name="sobrenome" placeholder="Sobrenome" minlength=3 maxlength=12 required/><br><br>
          <input class="cadastroinput" type="text" name="usuario" placeholder="Usuário" minlength=3 maxlength=12 required><br><br>
          <input class="cadastroinput" type="email" name="email" placeholder="Email" required><br><br>
          <input class="cadastroinput" type="password" name="senha" placeholder="Senha" minlength=3 maxlength=60 required><br><br>
          <input class="cadastroinput" type="password" name="confsenha" minlength=3 placeholder="Confirme sua Senha" maxlength=60 required><br><br>
          <input class="cadastroinput" type="text" name="instituicao" placeholder="Instituição de Ensino" minlength=3 maxlength=12 required><br><br>
          <input class="cadastrobutton"  type="submit" name="cadastro" value="Confirmar Cadastro" >

      </div>

    </body>
  </html>
