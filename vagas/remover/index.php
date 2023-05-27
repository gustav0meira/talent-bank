<?php
require_once('../../app/config.php');

// Verifica se o ID está presente nos parâmetros GET
if (isset($_GET['id'])) {
    // Obtém o ID do parâmetro GET
    $id = $_GET['id'];

    // Prepara a consulta para definir o status como "Arquivada" baseado no ID
    $query = "UPDATE vagas SET status = 'Arquivada' WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $id);

    // Executa a consulta
    if ($stmt->execute()) {
        // Registro arquivado com sucesso
        header("Location: ../");
        exit();
    } else {
        // Ocorreu um erro ao arquivar o registro
        $error = "Erro ao arquivar o registro: " . $stmt->error;
        echo "<script>alert('$error'); window.location.href = '../';</script>";
    }

    // Fecha a declaração e a conexão
    $stmt->close();
    $conn->close();
} else {
    // ID não fornecido nos parâmetros GET
    echo "<script>alert('ID não fornecido.'); window.location.href = '../';</script>";
}
?>
