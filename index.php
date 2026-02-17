<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="icon" href="img/logo-AgendaMed.png">
    <title>AgendaMed - Login</title>
    <link rel="stylesheet" href="login_style.css">
</head>

<body>
    <div class="container" id="container">

        <!-- Tela de Cadastro -->

        <div class="form-container register-container">
            <form action="cadastro.php" method="POST">
                <h1>Você ainda não tem uma conta?</h1><br>
                <h2>Comece por aqui!</h2><br>
                <h6>*Se você for algum profissional da saúde, entre em contato com o recepcionista ou diretor!</h6><br>
                <input name="username" type="text" placeholder="Crie um nome de usuário">
                <select name="profissao" id="" placeholder="Qual sua profissão?">
                    <option value="profissão">Qual sua profissão?</option>
                    <option value="Recepcionista">Recepcionista</option>
                    <option value="Diretor(a)">Diretor(a)</option>
                </select>
                <input name="senha" type="password" placeholder="Crie uma senha">
                <button type="submit">Cadastrar!</button>
            </form>
        </div>

        <!-- Tela de Login -->

        <div class="form-container login-container">
            <form method="POST">
                <h1>Olá! Seja bem-vindo de volta!</h1><br>
                <h2>Faça login!</h2><br>
                <input name="username" type="text" placeholder="Usuário">
                <input name="senha" type="password" placeholder="Senha">
                <button type="submit">Entrar</button>
            </form>
        </div>

        <!-- Banner Lateral -->

        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1 class="title">Você já é cadastrado?</h1>
                    <p>Se você já tem uma conta, faça login aqui!</p>
                    <button class="ghost" id="login">Fazer login
                    </button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1 class="title">Ainda não tem uma conta?</h1>
                    <p>Se você ainda não tem conta registre-se aqui!</p>
                    <button class="ghost" id="register">Quero me registrar
                    </button>
                </div>
            </div>
        </div>

    </div>

    <script>
        const registerButton = document.getElementById("register");
        const loginButton = document.getElementById("index");
        const container = document.getElementById("container");

        registerButton.addEventListener("click", () => {
            container.classList.add("right-panel-active");
        });

        loginButton.addEventListener("click", () => {
            container.classList.remove("right-panel-active");
        });
    </script>

</body>

</html>

<?php
session_start();

include 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $conn = new mysqli($servidor, $usuario, $password, $basededatos);

    if ($conn->connect_error) {
        die ("Erro de conexão: " . $conn->connect_error);
    }

    $username = $_POST['username'];
    $senha = $_POST['senha'];

    // Consultar a tabela de médicos
    $sql = "SELECT * FROM medico WHERE crm = ? AND senha = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $senha);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $_SESSION['profissional'] = 'medico';
        $_SESSION['username'] = $username;
        header("Location: consultas-profissional.php");
        exit();
    }

    // Consultar a tabela de enfermeiros
    $sql = "SELECT * FROM enfermeiro WHERE coren = ? AND senha = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $senha);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $_SESSION['profissional'] = 'enfermeiro';
        $_SESSION['username'] = $username;
        header("Location: consultas-profissional.php");
        exit();
    }

    // Consultar a tabela de psicólogos
    $sql = "SELECT * FROM psicologo WHERE crp = ? AND senha = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $senha);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $_SESSION['profissional'] = 'psicologo';
        $_SESSION['username'] = $username;
        header("Location: consultas-profissional.php");
        exit();
    }

    // Consultar a tabela de fisioterapeutas
    $sql = "SELECT * FROM fisioterapeuta WHERE crefito = ? AND senha = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $senha);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $_SESSION['profissional'] = 'fisioterapeuta';
        $_SESSION['username'] = $username;
        header("Location: consultas-profissional.php");
        exit();
    }

    // Consultar a tabela de odontólogos
    $sql = "SELECT * FROM odontologo WHERE cro = ? AND senha = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $senha);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $_SESSION['profissional'] = 'odontologo';
        $_SESSION['username'] = $username;
        header("Location: consultas-profissional.php");
        exit();
    }

    // Se nenhum profissional da saúde foi encontrado, verifique se é um usuário regular
    $sql = "SELECT * FROM usuarios WHERE username = ? AND senha = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $senha);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $profissao = $row['profissao'];

        if ($profissao == 'Recepcionista' || $profissao == 'Diretor(a)') {
            $_SESSION['profissional'] = $profissao;
            header("Location: home.php");
            exit();
        }
    }

    // Se não houver correspondência de usuário ou profissional da saúde, exiba uma mensagem de erro
    echo '<script>alert("Usuário ou senha inválidos!");</script>';

    $conn->close();
}

?>