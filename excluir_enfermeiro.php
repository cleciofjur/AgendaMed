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
    $id_enf = $_GET['id'];

    $sql = "DELETE FROM enfermeiro WHERE idenf = $id_enf";

    if ($conn->query($sql) === TRUE) {
        echo "Enfermeiro excluído com sucesso.";
    } else {
        echo "Erro ao excluir enfermeiro: " . $conn->error;
    }
} else {
    echo "ID do enfermeiro não fornecido.";
}

$conn->close();
