<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AgendaMed - Enfermeiro(a)</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css">
    <link rel="icon" href="../../img/logo-AgendaMed.png">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>

    <div class="sidebar">
        <h2><img src="#" title="" alt="" width="">AgendaMed</h2>
        <br><br>
        <ul>
            <li><a href="../../home.php">Página Inicial</a></li>
            <li><a href="../../consultas.php">Consultas Agendadas</a></li>
            <li><a href="../medico/index.php">Médico(a)</a></li>
            <li><a href="../odonto/index.php">Odontólogo(a)</a></li>
            <li><a href="../psico/index.php">Psicólogo(a)</a></li>
            <li><a href="../enf/index.php">Enfermeiro(a)</a></li>
            <li><a href="../fisio/index.php">Fisioterapeuta</a></li>
            <li><a href="https://wa.me/+5597984464572">Ajuda</a></li>
        </ul>
        <br><br><br><br><br>
        <a href="funcionarios/index.php" class="logout" style="text-decoration: none">Sair</a>
    </div>

    <div class="container">
        <header>
            <h3>Consultas Agendadas > Enfermagem</h3>
        </header><br>

        <table>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Familia</th>
                <th>Horário</th>
                <th>Final</th>
                <th>Data</th>
                <th>Área da Consulta</th>
                <th>Especialização</th>
            </tr>

            <?php
            $usuario = "root";
            $password = "";
            $servidor = "localhost";
            $basededatos = "practicas";

            $conn = new mysqli($servidor, $usuario, $password, $basededatos);

            if ($conn->connect_error) {
                die("Erro de conexão: " . $conn->connect_error);
            }

            $data_atual = date('Y-m-d');

            //Ordenar a visualização
            $sql = "SELECT id, nome, numero_familia, hora_inicio, hora_final, data_inicio, area_consulta, especializacao FROM eventoscalendar WHERE data_inicio >= '$data_atual' ORDER BY data_inicio";

            $sql = "SELECT id, nome, numero_familia, hora_inicio, hora_final, data_inicio, area_consulta, especializacao FROM eventoscalendar  eventoscalendar WHERE especializacao = 'enfermeiro'";
            
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . $row["nome"] . "</td>";
                    echo "<td>" . $row["numero_familia"] . "</td>";
                    echo "<td>" . $row["hora_inicio"] . "</td>";
                    echo "<td>" . $row["hora_final"] . "</td>";
                    echo "<td>" . $row["data_inicio"] . "</td>";
                    echo "<td>" . $row["area_consulta"] . "</td>";
                    echo "<td>" . $row["especializacao"] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='8'>Nenhum evento encontrado</td></tr>";
            }

            $conn->close();
            ?>
        </table>
    </div>
</body>

</html>
