<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AgendaMed - Suas consultas</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="icon" href="img/logo-AgendaMed.png">
    <link rel="stylesheet" type="text/css" href="style-profissional.css">
    <style>
        .concluir-consulta i {
            font-size: 24px;
            /* Tamanho do ícone */
            margin: auto;
            /* Centralizar verticalmente */
        }

        .concluir-consulta i.fa-times-circle {
            color: red;
            /* Cor vermelha para o ícone X */
        }

        .concluir-consulta i.check-icon {
            display: none;
            color: green;
            /* Cor verde para o ícone de check */
        }

        .concluir-consulta.clicked i.fa-times-circle {
            display: none;
        }

        .concluir-consulta.clicked i.check-icon {
            display: inline;
        }
    </style>
</head>

<body>

    <div class="sidebar">
        <h2><img src="#" title="" alt="" width="">AgendaMed</h2>
        <br><br>
        <ul>
            <li><a href="https://wa.me/+5597984464572">Ajuda</a></li>
        </ul>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        <a href="index.php" class="logout" style="text-decoration: none">Sair</a>
    </div>

    <div class="container">
        <header>
            <?php

            session_start();

            include 'conexao.php';

            if (isset($_SESSION['profissional']) && isset($_SESSION['username'])) {
                $username = $_SESSION['username'];
                echo "<h3>Consultas Agendadas -> $username</h3>";

                // Conexão com o banco de dados
                $conn = new mysqli($servidor, $usuario, $password, $basededatos);

                // Verificação da conexão
                if ($conn->connect_error) {
                    die("Erro na conexão: " . $conn->connect_error);
                }

                // Obtendo a data atual
                $data_atual = date("Y-m-d");

                // Query para selecionar as consultas do profissional logado
                $query = "SELECT * FROM eventoscalendar WHERE area_consulta = '$username' AND data_inicio >= '$data_atual' ORDER BY data_inicio";
                $result = $conn->query($query);

                if ($result->num_rows > 0) {
                    echo "<table>
                            <tr>
                                <th>ID</th>
                                <th>Nome</th>
                                <th>Familia</th>
                                <th>Horário</th>
                                <th>Final</th>
                                <th>Data</th>
                                <!--<th>Área da Consulta</th> -->
                                <th>Especialização</th>
                                <th>TO-DO</th>
                            </tr>";

                    // Exibindo os resultados da consulta
                    while ($row = $result->fetch_assoc()) {
                        // Verifica se o item foi concluído anteriormente
                        $isChecked = isset($_SESSION['consultas_concluidas'][$row['ID']]);
                        $checkedClass = $isChecked ? 'clicked' : '';

                        echo "<tr>
                                <td>" . $row['ID'] . "</td>
                                <td>" . $row['nome'] . "</td>
                                <td>" . $row['numero_familia'] . "</td>
                                <td>" . $row['hora_inicio'] . "</td>
                                <td>" . $row['hora_final'] . "</td>
                                <td>" . $row['data_inicio'] . "</td>
                                <!--<td>" . $row['area_consulta'] . "</td> -->
                                <td>" . $row['especializacao'] . "</td>
                                <td class='concluir-consulta $checkedClass' data-id='" . $row['ID'] . "'><i class='fa fa-times-circle'></i><i class='fa fa-check-circle check-icon'></i></td>
                            </tr>";
                    }

                    echo "</table>";
                } else {
                    echo "Não há consultas agendadas para este profissional.";
                }

                // Fechando a conexão
                $conn->close();
            } else {
                header("Location: index.php");
                exit();
            }
            ?>
        </header><br>
    </div>

    <!-- Script JavaScript para manipular o clique no ícone e alterar o ícone -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.concluir-consulta').forEach(function(element) {
                element.addEventListener('click', function() {
                    // Alternar entre os ícones de X e check
                    this.classList.toggle('clicked');

                    // Armazenar o estado do ícone no localStorage
                    var consultaID = this.getAttribute('data-id');
                    var isChecked = this.classList.contains('clicked');
                    localStorage.setItem('consulta_' + consultaID, isChecked ? 'concluido' : 'nao-concluido');
                });
            });

            // Restaurar o estado dos ícones ao carregar a página
            document.querySelectorAll('.concluir-consulta').forEach(function(element) {
                var consultaID = element.getAttribute('data-id');
                var isChecked = localStorage.getItem('consulta_' + consultaID) === 'concluido';
                if (isChecked) {
                    element.classList.add('clicked');
                }
            });
        });
    </script>

</body>

</html>