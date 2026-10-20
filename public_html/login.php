<?php
session_start();

$client_id = "tiny-api-38a60a1b0b0aaf9d1a7ab2249aa050172e0828ff-1788348202";
$redirect_uri = "https://grupocavalcante.net.br/integracao.php";

// URL de autorização oficial da API Tiny 3.0 (OpenID Connect)
$auth_url = "https://accounts.tiny.com.br/realms/tiny/protocol/openid-connect/auth?" . http_build_query([
    "client_id" => $client_id,
    "redirect_uri" => $redirect_uri,
    "response_type" => "code",
    "scope" => "openid", // necessário para usar a API
    "state" => "123"
]);
var_dump($auth_url);
header("Location: $auth_url");
exit;
?>