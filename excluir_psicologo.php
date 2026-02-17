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
    $id_psicologo = $_GET['id'];

    $sql = "DELETE FROM psicologo WHERE idpsi = $id_psicologo";

    if ($conn->query($sql) === TRUE) {
        echo "Psicológo excluído com sucesso.";
    } else {
        echo "Erro ao excluir psicológo: " . $conn->error;
    }
} else {
    echo "ID do psicológo não fornecido.";
}

$conn->close();
