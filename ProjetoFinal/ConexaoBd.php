<?php
  function CriaConexãoBD()
  {
    $bd = new PDO('mysql:host=localhost;dbname=cottoncandy;charset=utf8',
                  'CottonCandy',
                  'projetofinal');

    $bd->setAttribute(PDO::ATTR_ERRMODE,
                      PDO::ERRMODE_EXCEPTION);

    return $bd;
  }
?>
