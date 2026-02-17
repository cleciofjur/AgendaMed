<?php
date_default_timezone_set("America/Manaus");
setlocale(LC_ALL, "pt_BR");
//$hora = date ("g:i:A");

require("config.php");

$nome             = ucwords($_REQUEST['nome']);
$numero_familia   = $_REQUEST['numero_familia'];
$data_inicio      = $_REQUEST['data_inicio'];
$hora_inicio      = $_REQUEST['hora_inicio'];
$hora_final       = $_REQUEST['hora_final'];
$area_consulta    = preg_replace("/^.*?-(.*)/", "$1", $area_consulta);
$area_consulta    = $_REQUEST['area_consulta'];

$especializacao   = $_REQUEST['especializacao'];

$InsertNuevoEvento = "INSERT INTO eventoscalendar(
      nome,
      numero_familia,
      hora_inicio,
      hora_final,
      data_inicio,
      area_consulta,
      especializacao
      )
    VALUES (
      '" . $nome . "',
      '" . $numero_familia . "',
      '" . $hora_inicio . "',
      '" . $hora_final . "',
      '" . $data_inicio . "',
      '" . $area_consulta . "',
      '" . $especializacao . "'
  )";
$resultadoNuevoEvento = mysqli_query($con, $InsertNuevoEvento);

header("Location:home.php?e=1");
