<?php
  session_start();
  unset($_SESSION['idAluno']);
  header('Location: Inicio.php');
  exit();
?>
