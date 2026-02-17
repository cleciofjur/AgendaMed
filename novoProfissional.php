<?php
date_default_timezone_set("America/Manaus");
setlocale(LC_ALL, "pt_BR");

require("config.php");

$nome = ucwords($_POST['nome']);
$area_profissional = $_POST['area-profissional'];
$senha = $_POST['senha'];

switch ($area_profissional) {
    case 'medico':
        $crm = $_POST['crm'];
        $tabela = 'medico';
        break;
    case 'enfermeiro':
        $coren = $_POST['coren'];
        $tabela = 'enfermeiro';
        break;
    case 'psicologo':
        $crp = $_POST['crp'];
        $tabela = 'psicologo';
        break;
    case 'odontologo':
        $cro = $_POST['cro'];
        $tabela = 'odontologo';
        break;
    case 'fisioterapeuta':
        $crefito = $_POST['crefito'];
        $tabela = 'fisioterapeuta'; 
        break;
    default:
        break;
}

$insertNovoProfissional = "INSERT INTO $tabela (nome, senha";

switch ($area_profissional) {
    case 'medico':
        $insertNovoProfissional .= ", crm";
        break;
    case 'enfermeiro':
        $insertNovoProfissional .= ", coren";
        break;
    case 'psicologo':
        $insertNovoProfissional .= ", crp";
        break;
    case 'odontologo':
        $insertNovoProfissional .= ", cro";
        break;
    case 'fisioterapeuta':
        $insertNovoProfissional .= ", crefito";
        break;
    default:
        //mensagem de erro
        break;
}

$insertNovoProfissional .= ") VALUES ('$nome', '$senha'";

switch ($area_profissional) {
    case 'medico':
        $insertNovoProfissional .= ", '$crm'";
        break;
    case 'enfermeiro':
        $insertNovoProfissional .= ", '$coren'";
        break;
    case 'psicologo':
        $insertNovoProfissional .= ", '$crp'";
        break;
    case 'odontologo':
        $insertNovoProfissional .= ", '$cro'";
        break;
    case 'fisioterapeuta':
        $insertNovoProfissional .= ", '$crefito'";
        break;
    default:
        //mensagem de erro
        break;
}

$insertNovoProfissional .= ")";

$resultadoNovoProfissional = mysqli_query($con, $insertNovoProfissional);

if ($resultadoNovoProfissional) {
    header("Location: home.php?e=1");
} else {
    // Trate o erro de inserção aqui
    echo "Erro ao cadastrar profissional.";
}

?>