<?php
// Inicia a sessão, se não estiver iniciada
session_start();

// Destrói todas as variáveis de sessão
session_unset();

// Destroi a sessão
session_destroy();

// Redireciona para a página index
header("Location: index.php");
exit();
?>