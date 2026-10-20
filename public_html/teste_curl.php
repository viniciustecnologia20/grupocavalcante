<?php
$ch = curl_init("https://api.tiny.com.br/api/v2");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HEADER, true);
curl_setopt($ch, CURLOPT_VERBOSE, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "User-Agent: MeuSistema/1.0"
]);
$response = curl_exec($ch);
$info = curl_getinfo($ch);
$error = curl_error($ch);
curl_close($ch);

echo "<pre>";
var_dump($info);
var_dump($error);
echo $response;
echo "</pre>";
?>