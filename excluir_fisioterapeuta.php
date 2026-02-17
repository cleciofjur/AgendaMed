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
    $id_fisio = $_GET['id'];

    $sql = "DELETE FROM fisioterapeuta WHERE idfisio = $id_fisio";

    if ($conn->query($sql) === TRUE) {
        echo "Fisioterapeuta excluído com sucesso.";
    } else {
        echo "Erro ao excluir fisioterapeuta: " . $conn->error;
    }
} else {
    echo "ID do fisioterapeuta não fornecido.";
}

$conn->close();
