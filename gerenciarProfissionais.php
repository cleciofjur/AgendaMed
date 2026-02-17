<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AgendaMed</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="icon" href="img/logo-AgendaMed.png">
    <link rel="stylesheet" type="text/css" href="css/style-consultas.css">
</head>

<body>

    <div class="sidebar">
        <h2><img src="#" title="" alt="" width="">AgendaMed</h2>
        <br><br>
        <ul>
            <li><a href="home.php">Página Inicial</a></li>
            <li><a href="consultas.php">Consultas Agendadas</a></li>
            <li><a href="funcionarios/medico/index.php">Médico(a)</a></li>
            <li><a href="funcionarios/odonto/index.php">Odontólogo(a)</a></li>
            <li><a href="funcionarios/psico/index.php">Psicólogo(a)</a></li>
            <li><a href="funcionarios/enf/index.php">Enfermeiro(a)</a></li>
            <li><a href="funcionarios/fisio/index.php">Fisioterapeuta</a></li>
            <li><a href="https://wa.me/+5597984464572">Ajuda</a></li>
        </ul>
        <br><br><br><br><br>
        <a href="index.php" class="logout" style="text-decoration: none">Sair</a>
    </div>

    <div class="container">
        <header>
            <h3>Funcionários</h3>
        </header>
        <br>
        <h3>Médicos</h3>
        <table>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>CRM</th>
                <th>Excluir</th>
            </tr>
            <?php
            $usuario = "root";
            $password = "";
            $servidor = "localhost";
            $basededatos = "practicas";

            $conn = new mysqli($servidor, $usuario, $password, $basededatos);

            if ($conn->connect_error) {
                die("Falha na conexão: " . $conn->connect_error);
            }

            $sql = "SELECT idmed, nome, crm FROM medico";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . $row["idmed"] . "</td><td>" . $row["nome"] . "</td><td>" . $row["crm"] . "</td><td><a href='excluir_medico.php?id=" . $row["idmed"] . "' onclick='return confirm(\"Tem certeza de que deseja excluir este médico?\")'>&#128465;</a></td></tr>";
                }
            } else {
                echo "<tr><td colspan='4'>Nenhum médico encontrado</td></tr>";
            }
            ?>
        </table>

        <br>
        <!-- Fisioterapeutas -->
        <h3>Fisioterapeutas</h3>
        <table>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>CREFITO</th>
                <th>Excluir</th>
            </tr>
            <?php
            $sql = "SELECT idfisio, nome, crefito FROM fisioterapeuta";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . $row["idfisio"] . "</td><td>" . $row["nome"] . "</td><td>" . $row["crefito"] . "</td><td><a href='excluir_fisioterapeuta.php?id=" . $row["idfisio"] . "' onclick='excluirFisioterapeuta(" . $row["idfisio"] . ")'>&#128465;</a></td></tr>";
                }
            } else {
                echo "<tr><td colspan='4'>Nenhum fisioterapeuta encontrado</td></tr>";
            }
            ?>
        </table>
        <br>
        <!-- Odontólogos -->
        <h3>Odontólogos</h3>
        <table>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>CRO</th>
                <th>Excluir</th>
            </tr>
            <?php
            $sql = "SELECT idodonto, nome, cro FROM odontologo";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . $row["idodonto"] . "</td><td>" . $row["nome"] . "</td><td>" . $row["cro"] . "</td><td><a href='excluir_odontologo.php?id=" . $row["idodonto"] . "' onclick='excluirOdontologo(" . $row["idodonto"] . ")'>&#128465;</a></td></tr>";
                }
            } else {
                echo "<tr><td colspan='4'>Nenhum odontólogo encontrado</td></tr>";
            }
            ?>
        </table>
        <br>
        <!-- Psicólogos -->
        <h3>Psicólogos</h3>
        <table>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>CRP</th>
                <th>Excluir</th>
            </tr>
            <?php
            $sql = "SELECT idpsi, nome, crp FROM psicologo";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . $row["idpsi"] . "</td><td>" . $row["nome"] . "</td><td>" . $row["crp"] . "</td><td><a href='excluir_psicologo.php?id=" . $row["idpsi"] . "' onclick='excluirPsicologo(" . $row["idpsi"] . ")'>&#128465;</a></td></tr>";
                }
            } else {
                echo "<tr><td colspan='4'>Nenhum psicólogo encontrado</td></tr>";
            }
            ?>
        </table>
        <br>
        <!-- Enfermeiros -->
        <h3>Enfermeiros</h3>
        <table>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>COREN</th>
                <th>Excluir</th>
            </tr>
            <?php
            $sql = "SELECT idenf, nome, coren FROM enfermeiro";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . $row["idenf"] . "</td><td>" . $row["nome"] . "</td><td>" . $row["coren"] . "</td><td><a href='excluir_enfermeiro.php?id=" . $row["idenf"] . "' onclick='excluirEnfermeiro(" . $row["idenf"] . ")'>&#128465;</a></td></tr>";
                }
            } else {
                echo "<tr><td colspan='4'>Nenhum enfermeiro encontrado</td></tr>";
            }
            ?>
        </table>

        <?php
        $conn->close();
        ?>
    </div>
</body>

<script>
    function excluirMedico(id) {
        if (confirm("Tem certeza de que deseja excluir este médico?")) {
            alert("Médico removido do sistema com sucesso!");
        }
    };

    function excluirFisioterapeuta(id) {
        if (confirm("Tem certeza de que deseja excluir este fisioterapeuta?")) {
            alert("Fisioterapeuta removido do sistema com sucesso!");
        }
    };

    function excluirOdontologo(id) {
        if (confirm("Tem certeza de que deseja excluir este odontólogo?")) {
            alert("Odontólogo removido do sistema com sucesso!");
        }
    };

    function excluirPsicologo(id) {
        if (confirm("Tem certeza de que deseja excluir este psicólogo?")) {
            alert("Psicólogo removido do sistema com sucesso!");
        }
    };

    function excluirEnfermeiro(id) {
        if (confirm("Tem certeza de que deseja excluir este enfermeiro?")) {
            alert("Enfermeiro removido do sistema com sucesso!");
        }
    }
</script>

</html>