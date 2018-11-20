<?php
  session_start();
  unset($_SESSION['idAluno']);
  header('Location: paginaInicio.php');
  exit();
?>
