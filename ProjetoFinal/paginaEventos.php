<?php
  require_once('funcoesEvento.php');
  if (array_key_exists('idAluno', $_SESSION)) {
    $idAluno = $_SESSION['idAluno'];
  }
  else {
    $idAluno = null;
  }
?>
<!DOCTYPE html>
<html xml:lang="pt" lang="pt">
	<head>
		<meta charset="UTF-8">
		<title>Eventos e Tarefas</title>
		<link rel="shortcut icon" href="logo1.png" />
		<link rel="stylesheet" href="stylesEvento.css">
    <script>
       $(document).ready(function() {

            //CARREGA CALENDÁRIO E EVENTOS DO BANCO
            $('#calendario').fullCalendar({
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
                },
                defaultDate: '2016-01-12',
                editable: true,
                eventLimit: true,
                events: 'eventos.php',
                eventColor: '#dd6777'
            });

            //CADASTRA NOVO EVENTO
            $('#novo_evento').submit(function(){
                //serialize() junta todos os dados do form e deixa pronto pra ser enviado pelo ajax
                var dados = jQuery(this).serialize();
                $.ajax({
                    type: "POST",
                    url: "cadastrar_evento.php",
                    data: dados,
                    success: function(data)
                    {
                        if(data == "1"){
                            alert("Cadastrado com sucesso! ");
                            //atualiza a página!
                            location.reload();
                        }else{
                            alert("Houve algum problema.. ");
                        }
                    }
                });
                return false;
            });
	   });

    </script>
  </head>
  <body style="overflow:hidden;">
    <!-- menu ladinho -->
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
  				<li><img src="fotodomenu.png" width=250px height= 540px> </li>
  			</ul>
    </div>

      <div id='TarefasEventos'>
					<br>
					<fieldset>
            <legend>Eventos</legend>
            <form id="novo_evento" action="SalvarEvento.php" method="post">
							<input name="idAluno" type="hidden" value="<?php echo $idAluno?>"/>
							<label>Nome do Evento: </label><input type="text" name="nome" required/><br/><br/>
							<label>Lugar: </label><input type="text" name="lugar" /><br/><br/>
							<label>Data: </label><input type="date" name="data" required/><br/><br/>
							<label>Horário de Início: </label><input type="time" name="inicio" /><br/><br/>
							<label>Horário de Término: </label><input type="time" name="fim" /><br/><br/>
							<input value="Salvar" type="submit"/>
						</form>
          </fieldset>
					<br>
					<fieldset>
            <legend>Tarefas</legend>
            <form id="nova_tarefa" action="SalvarTarefa.php" method="post">
								<input name="idAluno" type="hidden" value="<?php echo $idAluno?>"/>
								<label>Nome da Tarefa: </label><input type="text" name="nome" required/><br/><br/>
                <label>Data de Entrega: </label><input type="date" name="data" required/><br/><br/>
								<label>Descrição: </label><input type="text" name="descricao" /><br/><br/>
								<label>Hora de Entrega: </label><input type="time" name="hora" /><br/><br/>
                <input value="Salvar" type="submit"/>
            </form>
          </fieldset>
      </div>

  </body>
</html>
