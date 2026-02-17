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
    $id_odonto = $_GET['id'];

    $sql = "DELETE FROM odontologo WHERE idodonto = $id_odonto";

    if ($conn->query($sql) === TRUE) {
        echo "Odontólogo excluído com sucesso.";
    } else {
        echo "Erro ao excluir odontólogo: " . $conn->error;
    }
} else {
    echo "ID do odontólogo não fornecido.";
}

$conn->close();
