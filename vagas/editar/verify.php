<?php 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once('../../app/config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id                   = $_POST['id']; // Certifique-se de que você tem um campo 'id' em seu formulário
    $titulo               = $_POST['titulo'];
    $local                = $_POST['local'];
    $modalidade           = $_POST['modalidade'];
    $tipoContrato         = $_POST['tipoContrato'];
    $nivelCarreira        = $_POST['nivelCarreira'];
    $dataLimite           = $_POST['dataLimite'];
    $salario              = $_POST['salario'];
    $salario = preg_replace("/[^0-9]/", "", $salario);
    $descricao            = $_POST['editor'];

    $dataPublicacao = date('Y-m-d H:i:s');

    $status = 'Aberta';

    $stmt = $conn->prepare("UPDATE vagas SET titulo = ?, descricao = ?, salario = ?, local = ?, modalidade = ?, tipo_contrato = ?, nivel_carreira = ?, data_publicacao = ?, data_limite = ?, status = ? WHERE id = ?");

    if ($stmt) {
        $stmt->bind_param("ssssssssssi", $titulo, $descricao, $salario, $local, $modalidade, $tipoContrato, $nivelCarreira, $dataPublicacao, $dataLimite, $status, $id);

        if ($stmt->execute()) {
            header("Location: ../");
            exit;
        } else {
            header("Location: ../?error=" . urlencode($stmt->error));
            exit;
        }
    } else {
        header("Location: ../?error=" . urlencode($conn->error));
        exit;
    }

}else{
    header("Location: ../?error=" . urlencode($conn->error));
}
?>
