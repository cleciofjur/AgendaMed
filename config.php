<?php
$usuario  = "root";
$password = "";
$servidor = "localhost";
$basededatos = "practicas";
$con = mysqli_connect($servidor, $usuario, $password) or die("Não foi possível conectar ao servidor");
$db = mysqli_select_db($con, $basededatos) or die("Poxa! Erro ao cconectar com o servidor.");
