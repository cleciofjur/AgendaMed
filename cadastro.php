<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $profissao = $_POST['profissao'];
    $senha = $_POST['senha'];

    $username = mysqli_real_escape_string($conexao, $username);
    $profissao = mysqli_real_escape_string($conexao, $profissao);
    $senha = mysqli_real_escape_string($conexao, $senha);

    $query = $conexao->prepare("INSERT INTO usuarios (username, profissao, senha) VALUES (?, ?, ?)");
    $query->bind_param("sss", $username, $profissao, $senha);

    if ($query->execute()) {
        echo "<script>
                alert('Seu cadastro realizado com sucesso!');
                window.location.href = 'index.php';
              </script>";
        exit;
    } else {
        echo "Erro ao cadastrar: " . $conexao->error;
    }
}
