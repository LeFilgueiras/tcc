 <?php
  require_once('funcoesNotas.php');

  session_start();
  if (array_key_exists('id', $_REQUEST) &&
      filter_var($_REQUEST['id'], FILTER_VALIDATE_INT) != false)
  {
    $idMateria = $_REQUEST['id'];
    $notas = PegaNotas($idMateria);
  }
  else {
    $idMateria = null;
    $notas = null;
  }
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Notas</title>
		<link rel="shortcut icon" href="logo1.png" />
		<link rel="stylesheet" href="stylesNotas.css">
	</head>

	<body style="overflow:hidden">

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
				<li><img id="fotomenu" src="fotodomenu.png"> </li>
			</ul>
		</div>

		<br><div id="tbnotas">
			<div id="minhasnotas"><p> <h1> Minhas Notas</h1> </p></div>
      <form action="SalvarNotas.php" method="post">
  			<table id="tabela">
          <input name="idAluno" type="hidden" value="<?php echo $_SESSION['idAluno']?>"/>
  				<tr class="avaliacoes">
  					<td>
              <?php $materias = PegaMateriasDoAluno($_SESSION['idAluno']) ?>
              <select id="selectbox" name="idMateria" onchange="MateriaSelecionada(this)">
                  <option value=""> </option>
                <?php foreach ($materias as $m) { ?>
                  <option value="<?php echo $m['id_Materia'] ?>"
                    <?php if ($m['id_Materia'] == $idMateria) { echo "selected"; } ?>>
                    <?php echo $m['Nome'] ?>
                  </option>
                <?php } ?>
              </select>
            </td>
  					<td> TESTE </td>
  				  <td> TRABALHO 1 </td>
  					<td> TRABALHO 2 </td>
  					<td> TRABALHO 3 </td>
  					<td> PROVA </td>
  					<td> APOIO/PFV </td>
  					<td> MÉDIA FINAL</td>
  				</tr>

            <?php
            if($notas == null){?>
              <tr class="notas">
                <td class="semestre"><input name="certificacao1" type="hidden" value="1"/> 1ª CERTIFICAÇÃO</td>
                <td><input name="teste_1" type="text" value=""/></td>
                <td><input name="trab1_1" type="text" value=""/></td>
                <td><input name="trab2_1" type="text" value=""/></td>
                <td><input name="trab3_1" type="text" value=""/></td>
                <td><input name="prova_1" type="text" value=""/></td>
                <td><input name="apoio_1" type="text" value=""/></td>
                <td><input name="medfinal_1" type="text" disabled /></td>
              </tr>
              <tr class="notas">
                <td class="semestre"><input name="certificacao2" type="hidden" value="2"/> 2ª CERTIFICAÇÃO</td>
                <td><input name="teste_2" type="text" value=""/></td>
                <td><input name="trab1_2" type="text" value=""/></td>
                <td><input name="trab2_2" type="text" value=""/></td>
                <td><input name="trab3_2" type="text" value=""/></td>
                <td><input name="prova_2" type="text" value=""/></td>
                <td><input name="apoio_2" type="text" value=""/></td>
                <td><input name="medfinal_2" type="text" disabled /></td>
              </tr>
              <tr class="notas">
                <td class="semestre"><input name="certificacao3" type="hidden" value="3"/> 3ª CERTIFICAÇÃO</td>
                <td><input name="teste_3" type="text" value=""/></td>
                <td><input name="trab1_3" type="text" value=""/></td>
                <td><input name="trab2_3" type="text" value=""/></td>
                <td><input name="trab3_3" type="text" value=""/></td>
                <td><input name="prova_3" type="text" value=""/></td>
                <td><input name="apoio_3" type="text" value=""/></td>
                <td><input name="medfinal_3" type="text" disabled /></td>
              </tr>
            <?php }
              else{
                foreach ($notas as $n) { ?>
                  <tr class="notas">
          					<td class="semestre"><input name="certificacao<?php echo($n['certificacao']);?>" type="hidden" value="<?php echo($n['certificacao']);?>"/> <?php echo $n['certificacao'];?>ª CERTIFICAÇÃO</td>
          					<td><input name="teste_<?php echo($n['certificacao']);?>" type="text" value="<?php echo($n['teste']);?>"/></td>
                    <td><input name="trab1_<?php echo($n['certificacao']);?>" type="text" value="<?php echo($n['trab1']);?>"/></td>
          					<td><input name="trab2_<?php echo($n['certificacao']);?>" type="text" value="<?php echo($n['trab2']);?>"/></td>
          					<td><input name="trab3_<?php echo($n['certificacao']);?>" type="text" value="<?php echo($n['trab3']);?>"/></td>
          					<td><input name="prova_<?php echo($n['certificacao']);?>" type="text" value="<?php echo($n['prova']);?>"/></td>
          					<td><input name="apoio_<?php echo($n['certificacao']);?>" type="text" value="<?php echo($n['apoio']);?>"/></td>
          					<td><input name="medfinal_<?php echo($n['certificacao']);?>" type="text" disabled /></td>
          				</tr>
                <?php } } ?>
  			</table>
        <button id="botaoSalvar" type="submit"> Salvar </button>
      </form>
	   </div>
     <script>
       function MateriaSelecionada(select) {
           var x = document.getElementById("selectbox").value;
           window.location.href = `paginaNotas.php?id=${x}`;}
     </script>
	<body>
</html>
