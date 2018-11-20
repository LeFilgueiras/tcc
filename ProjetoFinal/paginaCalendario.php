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
		<title>Calendário</title>
		<link rel="shortcut icon" href="logo1.png" />
		<link rel="stylesheet" href="stylesCalendario.css">
		<script type="text/javascript">

			function maxDays(mm, yyyy){

			var mDay;
			if((mm == 3) || (mm == 5) || (mm == 8) || (mm == 10)){
				mDay = 30;

				}
				else{
					mDay = 31
					if(mm == 1){
							if (yyyy/4 - parseInt(yyyy/4) != 0){
								mDay = 28
							}
						else{
								mDay = 29
						}
				}
			 }
			return mDay;

			}
			function changeBg(id){
			if (eval(id).style.backgroundColor != "#FF5C8F"){
				eval(id).style.backgroundColor = "#c6eff1"
			}
			else{
				eval(id).style.backgroundColor = "red"
			}
			}
			function writeCalendar(){

			var now = new Date
			var dd = now.getDate()
			var mm = now.getMonth()
			var dow = now.getDay()
			var yyyy = now.getFullYear()
			var arrM = new Array("Janeiro","Fevereiro","Março","Abril","Maio","Junho","Julho","Agosto","Setembro","Outubro","Novembro","Dezembro")
			var arrY = new Array()
			for (ii=0;ii<=4;ii++){
				arrY[ii] = yyyy - 2 + ii

			}
			var arrD = new Array("Dom","Seg","Ter","Qua","Qui","Sex","Sab")

			var text = ""
			text = "<form class=form name=calForm>"
			text += "<table class=tudo >"
			text += "<tr><td>"
			text += "<table width=100%><tr>"
			text += "<td align=left>"
			text += "<select class=setinhames name=selMonth onChange='changeCal()'>"
			for (ii=0;ii<=11;ii++){
				if (ii==mm){
					text += "<option value= " + ii + " Selected>" + arrM[ii] + "</option>"
				}
				else{
					text += "<option value= " + ii + ">" + arrM[ii] + "</option>"
				}
			}
			text += "</select>"
			text += "</td>"
			text += "<td align=right>"
			text += "<select class=ano name=selYear onChange='changeCal()'>"
			for (ii=0;ii<=4;ii++){
				if (ii==2){
					text += "<option value= " + arrY[ii] + " Selected>" + arrY[ii] + "</option>"
				}
				else{
					text += "<option value= " + arrY[ii] + ">" + arrY[ii] + "</option>"
				}
			}
			text += "</select>"
			text += "</td>"
			text += "</tr></table>"
			text += "</td></tr>"
			text += "<tr><td>"
			text += "<table class=tabeladentro border=1>"
			text += "<tr>"
			for (ii=0;ii<=6;ii++){
				text += "<td class=mes align=center><span class=label>" + arrD[ii] + "</span></td>"
			}
			text += "</tr>"
			aa = 0
			for (kk=0;kk<=5;kk++){
				text += "<tr>"
				for (ii=0;ii<=6;ii++){
					text += "<td class=cadaquadrado align=center><a class=link href='paginaEventos.php?'dia="+ aa +"' id=sp" + aa + " onClick='changeBg(this.id)'></a></td>"
					aa += 1

				}
				text += "</tr>"
			}
			text += "</table>"
			text += "</td></tr>"
			text += "</table>"
			text += "</form>"
			document.write(text)
			changeCal()
			}
			function changeCal(){
			var now = new Date
			var dd = now.getDate()
			var mm = now.getMonth()
			var dow = now.getDay()
			var yyyy = now.getFullYear()
			var currM = parseInt(document.calForm.selMonth.value)
			var prevM
			if (currM!=0){
				prevM = currM - 1
			}
			else{
				prevM = 11
					eval("sp"+ii).style.backgroundColor="#90EE90"
			}
			var currY = parseInt(document.calForm.selYear.value)
			var mmyyyy = new Date()
			mmyyyy.setFullYear(currY)
			mmyyyy.setMonth(currM)
			mmyyyy.setDate(1)
			var day1 = mmyyyy.getDay()
			if (day1 == 0){
				day1 = 7
			}
			var arrN = new Array(41)
			var aa
			for (ii=0;ii<day1;ii++){
				arrN[ii] = maxDays((prevM),currY) - day1 + ii + 1
			}
			aa = 1
			for (ii=day1;ii<=day1+maxDays(currM,currY)-1;ii++){
				arrN[ii] = aa
				aa += 1
			}
			aa = 1
			for (ii=day1+maxDays(currM,currY);ii<=41;ii++){
				arrN[ii] = aa
				aa += 1

			}
			for (ii=0;ii<=41;ii++){
				eval("sp"+ii).style.backgroundColor = "#c6eff1"
			}
			var dCount = 0
			for (ii=0;ii<=41;ii++){
				if (((ii<7)&&(arrN[ii]>20))||((ii>27)&&(arrN[ii]<20))){
					eval("sp"+ii).innerHTML = arrN[ii]
					eval("sp"+ii).className = "c3"
				}
				else{
					eval("sp"+ii).innerHTML = arrN[ii]
					if ((dCount==0)||(dCount==6)){
						eval("sp"+ii).className = "c2"
					}
					else{
						eval("sp"+ii).className = "c1"
					}
					if ((arrN[ii]==dd)&&(mm==currM)&&(yyyy==currY)){
						eval("sp"+ii).style.backgroundColor="#90EE90"
					}
				}
			dCount += 1
				if (dCount>6){
					dCount=0
				}
			}
			}
		</script>
	</head>
	<body	style="overflow:hidden;">
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
		<script type="text/javascript">writeCalendar()</script>
		<div id=lista>
			<br>
			<h1 id=titulo>Tarefas & Eventos</h1>
			<?php
			if (VerificaEventos($idAluno) == null) {
				$eventos = null;
			}
			else{
				$eventos = VerificaEventos($idAluno);
			}
			if (VerificaTarefas($idAluno) == null) {
				$tarefas = null;
			}
			else{
				$tarefas = VerificaTarefas($idAluno);
			}
		 if ($eventos != null) { ?>
			 	<ul>
				<?php foreach ($eventos as $evento){ ?>
			  	<li class="item"> <?php echo $evento['Data_Termino'];?>&nbsp;&nbsp;&nbsp;<?php echo $evento['Nome']; ?> </li>
			  <?php }?>
			  </ul>
			<?php }
			 if ($tarefas != null) { ?>
				 <ul>
				 <?php foreach ($tarefas as $tarefa){ ?>
					 <li class="item2"> <?php echo $tarefa['Data_Termino'];?>&nbsp;&nbsp;&nbsp;<?php echo $tarefa['Nome']; ?> </li>
				 <?php }?>
				 </ul>
			 <?php } ?>
		</div>
		 <!-- PEGAR OS DADOS COM O PHP (calendário1.php) -->


		</div>
	</body>
</html>
