<?php
$usuario  = "root";
$password = "";
$servidor = "localhost";
$basededatos = "practicas";

$conexao = new mysqli($servidor, $usuario, $password, $basededatos);

if ($conexao->connect_error) {
    die("Erro na conexão: " . $conexao->connect_error);
}
