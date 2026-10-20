<?php
session_start();

$connect = mysqli_connect('banco_gp_1.mysql.dbaas.com.br', 'banco_gp_1', 'tecnologia20');
$db = mysqli_select_db($connect, 'banco_gp_1');

if ($_SESSION['UsuarioNivel'] == 1) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Decodifica o JSON enviado pelo JavaScript
        $skuArray = json_decode($_POST['selectedNCMs'], true);

        if (!empty($skuArray)) {
            // Prepara a query para evitar SQL Injection
            $stmt = mysqli_prepare($connect, "DELETE FROM `ordemCompraSKU` WHERE NCM = ?");

            foreach ($skuArray as $sku) {
                mysqli_stmt_bind_param($stmt, "s", $sku);
                mysqli_stmt_execute($stmt);
            }

            mysqli_stmt_close($stmt);
        }

        // Redireciona para a página de configuração
        header("Location: configOrdem.php");
        exit;
    } else {
        header("Location: configOrdem.php");
        exit;
    }
}


if ($_SESSION['UsuarioNivel'] == 2) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Decodifica o JSON enviado pelo JavaScript
        $skuArray = json_decode($_POST['selectedNCMs'], true);

        if (!empty($skuArray)) {
            // Prepara a query para evitar SQL Injection
            $stmt = mysqli_prepare($connect, "DELETE FROM `ordemCompraSKUSC` WHERE NCM = ?");

            foreach ($skuArray as $sku) {
                mysqli_stmt_bind_param($stmt, "s", $sku);
                mysqli_stmt_execute($stmt);
            }

            mysqli_stmt_close($stmt);
        }

        // Redireciona para a página de configuração
        header("Location: configOrdem.php");
        exit;
    } else {
        header("Location: configOrdem.php");
        exit;
    }
}
