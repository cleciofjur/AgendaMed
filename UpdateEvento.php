<?php
date_default_timezone_set("America/Manaus");
setlocale(LC_ALL, "pt_BR");

include('config.php');
$idEvento         = $_POST['idEvento'];

$nome             = ucwords($_REQUEST['nome']);
$numero_familia   = $_REQUEST['numero_familia'];
$data_inicio      = $_REQUEST['data_inicio'];
$hora_inicio      = $_REQUEST['hora_inicio'];
$hora_final       = $_REQUEST['hora_final'];
$area_consulta    = $_REQUEST['area_consulta'];
$especializacao   = $_REQUEST['especializacao'];

$UpdateEvento = "UPDATE eventoscalendar 
                 SET nome = '$nome',
                     numero_familia = '$numero_familia',
                     data_inicio = '$data_inicio',
                     hora_inicio = '$hora_inicio',
                     hora_final = '$hora_final',
                     area_consulta = '$area_consulta',
                     especializacao = '$especializacao'
                 WHERE id = '" . $idEvento . "'";
$result = mysqli_query($con, $UpdateEvento);

header("Location:home.php?ea=1");
