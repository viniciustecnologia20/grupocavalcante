<?php
session_start();

if (!isset($_SESSION["tiny_access_token"])) {
    die("Token não encontrado. Volte para a tela de integração.");
}

$token = $_SESSION["tiny_access_token"];


// CORREÇÃO 1: Endpoint em inglês
$endpoint = "/info"; 

// CORREÇÃO 2: URL Base correta da API
$base = "https://api.tiny.com.br/public-api/v3";

$url = $base . $endpoint;

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HEADER, true);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
// CORREÇÃO 3: Content-Type ajuda
$bearer = "Bearer $token";
echo $bearer . "<br><br>";
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Authorization: $bearer",
    "Accept: application/json",
    "Content-Type: application/json" 
]);

$response = curl_exec($ch);

// Separação Header/Body
$info = curl_getinfo($ch);
$header_size = $info['header_size']; // As vezes curl_getinfo falha no header_size dependendo da versão, mas vamos manter assim
$headers = substr($response, 0, $header_size);
$body = substr($response, $header_size);
$httpCode = $info['http_code']; // Importante para debug

$error = curl_error($ch);
curl_close($ch);

echo "<h1>Status Code: $httpCode</h1>"; // Mostra se é 200, 401, 403 ou 404

if ($httpCode != 200) {
    echo "<p style='color:red'>Houve um erro na requisição.</p>";
}

echo "<h3>URL chamada</h3><pre>$url</pre>";
echo "<h3>Body (Resposta JSON)</h3><pre>" . htmlspecialchars($body) . "</pre>";
echo "<h3>Erro cURL (se houver)</h3><pre>$error</pre>";
// echo "<h3>Headers</h3><pre>" . htmlspecialchars($headers) . "</pre>";
?>