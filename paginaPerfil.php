<?php
  require_once('funcoesPerfil.php');
  session_start();
  if (array_key_exists('idAluno', $_SESSION)) {
    $idAluno = $_SESSION['idAluno'];
  }
  else {
    $idAluno = null;
  }
?>
<!DOCTYPE>
<html xml:lang="pt" lang="pt">
	<head>
		<meta charset="UTF-8">
		<title>Perfil</title>
    <link rel="shortcut icon" href="logo1.png" />
		<link rel="stylesheet" href="stylesPerfil.css">
	</head>

	<body	>
		<div id="menu">
				<ul>
					<a href="paginaInicio.php">
					<div id="fotologo">
					<img src="menulogo.jpg" width=250px>
					</div>
					</a>
		    	<li></li>
					<li><a href="paginaPerfil.php">Perfil</a></li>
					<br>
					<li><a href="paginaCalendario.php">Calendário</a></li>
					<br>
					<li><a href="paginaNotas.php">Notas</a> </li>
					<br>
					<li><a href="Sair.php">Sair</a></li>
					<li><img src="fotodomenu.png" width=250px height= 520px> </li>
				</ul>
		</div>
		<div>


			<fieldset id="divperfil">
			 <legend>Perfil do Usuário</legend>
			 	<form action="funcoesPerfil.php" method="post">
					<?php
          $dados = PegaDados($idAluno);
								foreach ($dados as $dado) { ?>
                  
			    <label><b>Nome: </b></label> <?php echo $dado['Nome']; echo $dado['Sobrenome']?>  <br><br>

			    <label><b>Usuário: </b></label> <?php echo $dado['Usuario']?> <br><br>

			    <label><b>Email: </b></label> <?php echo $dado['Email']?> <br><br>

			    <label><b>Instituição de Ensino: </b></label> <?php echo $dado['Instituicao']?> <br><br>

        <?php	} ?>
				</form>
			</fieldset> <br>

		<fieldset id="divmaterias">
		 <legend>Matérias</legend>

       <?php
       if (VerificaMaterias($idAluno) == 0) {
         $materias = null;
       }
       else{
         $materias = (VerificaMaterias1($idAluno));
       }
      if ($materias == null){ ?>
        <form action="SalvarMaterias.php" method="post">
          <input name="mat" type="text" id="materias" />
          <input value="Adicionar matérias" type="button" onclick="adicionar()"></input> <br>
         <ul id="lista">
         </ul>
         <input name="idAluno" type="hidden" value="<?php echo $idAluno?>"/>
         <input value="Salvar Alterações" id="botaoSalvar" type="submit"></input>
       </form>
       <?php } ?>
     <?php
       if ($materias != null){ ?>
        <form action="SalvarMaterias.php" method="post">
          <input name="mat" type="text" id="materias" />
          <input value="Adicionar matérias" type="button" onclick="adicionar()"></input> <br>
         <ul id="lista">
             <input name="idAluno" type="hidden" value="<?php echo $idAluno?>"/>
             <input name="idMateria" type="hidden" value="<?php echo $materias['idMateria']?>"/>
           <?php foreach ($materias as $m){ ?>
             <li> <?php echo $m['Nome']; ?> </li>
             <input name="matinsert" type="hidden" value="<?php echo $m['Nome']; ?>"/>
             <?php } ?>
         </ul>

         <input value="Salvar Alterações" id="botaoSalvar" type="submit"></input>
       </form>
       <?php } ?>

		</fieldset>
		</div>

		<script>
			function adicionar() {
			  var ing = document.getElementById("materias").value;
			  var lista  = document.getElementById("lista").innerHTML;
			  lista = lista +"<li>"+ing+"</li>";
			  document.getElementById("lista").innerHTML = lista;
			}
		</script>

	</body>
</html>
