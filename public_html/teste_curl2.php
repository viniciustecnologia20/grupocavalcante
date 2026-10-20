<?php
// Tente apontar para um endpoint real para validar (ex: info.php)
// Se não tiver token, ele deve retornar erro de API, mas NÃO erro 403 do Cloudflare.
$url = "https://api.tiny.com.br/api/v2/info.php"; 

$ch = curl_init($url);

// 1. CONFIGURAÇÕES BÁSICAS
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HEADER, true); // Mantive true para você ver o header de resposta
curl_setopt($ch, CURLOPT_VERBOSE, true);

// 2. O PULO DO GATO: Simular um navegador real (Chrome no Windows)
curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36');

// 3. Forçar HTTP 1.1 (Ajuda a evitar bloqueios em alguns WAFs que estranham HTTP/2 via script)
curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);

// 4. Headers Adicionais (Se necessário)
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Accept: application/json",
    "Content-Type: application/x-www-form-urlencoded" // A Tiny usa muito POST/form-data
]);

// 5. SSL (Evita erros de certificado local, mas use com cautela em produção)
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);

$response = curl_exec($ch);
$info = curl_getinfo($ch);
$error = curl_error($ch);
curl_close($ch);

echo "<pre>";
echo "<strong>Status Code:</strong> " . $info['http_code'] . "<br><br>";

if ($error) {
    echo "<strong>Erro cURL:</strong> " . $error . "<br>";
}

echo "<strong>Resposta:</strong><br>";
// Separa o header do body para visualização ficar mais limpa
$header_size = $info['header_size'];
$header = substr($response, 0, $header_size);
$body = substr($response, $header_size);

echo htmlspecialchars($body); // Usa htmlspecialchars para ver o HTML do erro se houver
echo "</pre>";
?>
