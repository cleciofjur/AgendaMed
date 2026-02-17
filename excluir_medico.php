<?php
$usuario = "root";
$password = "";
$servidor = "localhost";
$basededatos = "practicas";

$conn = new mysqli($servidor, $usuario, $password, $basededatos);

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $id_medico = $_GET['id'];

    $sql = "DELETE FROM medico WHERE idmed = $id_medico";

    if ($conn->query($sql) === TRUE) {
        echo "Médico excluído com sucesso.";
    } else {
        echo "Erro ao excluir médico: " . $conn->error;
    }
} else {
    echo "ID do médico não fornecido.";
}

$conn->close();
