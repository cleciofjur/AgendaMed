<?php
date_default_timezone_set("America/Manaus");
setlocale(LC_ALL, "pt_BR");

include('config.php');

$id               = $_POST['idEvento'];
$hora_inicio            = $_REQUEST['start'];
$data_inicio     = date('DD-MM-YYYY', strtotime($start));
$hora_final              = $_REQUEST['end'];
$data_final        = date('DD-MM-YYYY', strtotime($end));


$UpdateProd = ("UPDATE eventoscalendar 
    SET 
        data_inicio ='$data_inicio',
        data_final ='$data_final'

    WHERE id='" . $idEvento . "' ");
$result = mysqli_query($con, $UpdateProd);
