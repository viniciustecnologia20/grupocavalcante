<?php
// Verifica se o ID foi enviado via POST
if(isset($_POST['id'])) {
    // Conexão com o banco de dados
    $connect = mysqli_connect('banco_gp_1.mysql.dbaas.com.br','banco_gp_1','tecnologia20');
    $db = mysqli_select_db($connect,'banco_gp_1');
    if (!$connect) {
        die('Erro ao conectar ao banco de dados: ' . mysqli_connect_error());
    }

    // Seleciona o ID recebido via POST
    $id = $_POST['id'];

    // Query SQL para selecionar o valor atual do campo 'ativo'
    $query_select = "SELECT ativo FROM usuarios WHERE id = '$id'";
    
    // Preparação da consulta
    $stmt_select = mysqli_prepare($connect, $query_select);
    
    // Vinculação do parâmetro
    mysqli_stmt_bind_param($stmt_select, "i", $id); // Supondo que o ID seja do tipo inteiro
    
    // Execução da consulta
    mysqli_stmt_execute($stmt_select);
    
    // Vinculação do resultado
    mysqli_stmt_bind_result($stmt_select, $ativo);
    
    // Busca do resultado
    mysqli_stmt_fetch($stmt_select);
    
    // Fechamento da consulta preparada
    mysqli_stmt_close($stmt_select);

    // Novo valor para o campo 'ativo'
    $novo_ativo = $ativo == 1 ? 0 : 1;

    // Query SQL para atualizar o campo 'ativo'
    $query_update = "UPDATE usuarios SET ativo = ? WHERE ID = ?";
    
    // Preparação da consulta
    $stmt_update = mysqli_prepare($connect, $query_update);
    
    // Vinculação dos parâmetros
    mysqli_stmt_bind_param($stmt_update, "ii", $novo_ativo, $id);
    
    // Execução da consulta
    $resultado = mysqli_stmt_execute($stmt_update);

    // Fechamento da consulta preparada
    mysqli_stmt_close($stmt_update);

    // Fechamento da conexão com o banco de dados
    mysqli_close($connect);

    // Redirecionamento de volta para a página anterior
    header("Location: {$_SERVER['HTTP_REFERER']}");
    exit();
} else {
    // Se o ID não foi enviado via POST, redireciona para uma página de erro
    header("Location: erro.php");
    exit();
}
?>
