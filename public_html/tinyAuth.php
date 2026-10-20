<?php
// Arquivo: tinyAuth.php

function obterTokenValidoTiny() {
    // Mesmas credenciais que você usou no integracao.php
    $client_id = "tiny-api-38a60a1b0b0aaf9d1a7ab2249aa050172e0828ff-1788348202"; 
    $client_secret = "1NfDalQoF1n3AFnBBlq1IdOmxHovCUu6"; 
    
    $arquivoTokens = __DIR__ . '/tiny_tokens.json';

    if (!file_exists($arquivoTokens)) {
        die("Tokens não encontrados. Você precisa rodar o login.php para fazer a autorização inicial.");
    }

    $dados = json_decode(file_get_contents($arquivoTokens), true);
    
    // Verifica se o token ainda é válido (com margem de 5 minutos / 300 segundos)
    if (time() < ($dados['expires_at'] - 300)) {
        return $dados['access_token']; 
    }

    // Se chegou aqui, o access_token expirou. Vamos usar o refresh_token!
    $url = "https://accounts.tiny.com.br/realms/tiny/protocol/openid-connect/token";

    $curl = curl_init($url);
    curl_setopt_array($curl, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_HTTPHEADER => ["Content-Type: application/x-www-form-urlencoded"],
        CURLOPT_POSTFIELDS => http_build_query([
            'grant_type' => 'refresh_token',
            'client_id' => $client_id,
            'client_secret' => $client_secret,
            'refresh_token' => $dados['refresh_token']
        ])
    ]);

    $response = curl_exec($curl);
    $err = curl_error($curl);
    curl_close($curl);

    if ($err) {
        die("Erro cURL ao renovar token: " . $err);
    }

    $novoRetorno = json_decode($response, true);

    // Se a renovação deu certo, salva os novos dados
    if (isset($novoRetorno['access_token'])) {
        $dados['access_token'] = $novoRetorno['access_token'];
        
        if (isset($novoRetorno['refresh_token'])) {
            $dados['refresh_token'] = $novoRetorno['refresh_token'];
        }
        
        $dados['expires_at'] = time() + $novoRetorno['expires_in'];

        // Sobrescreve o arquivo com os tokens novos
        file_put_contents($arquivoTokens, json_encode($dados, JSON_PRETTY_PRINT));

        return $dados['access_token'];
    } else {
        die("Falha ao renovar o token. O Refresh Token pode ter expirado (passou mais de 24h). Faça login novamente. Resposta: " . $response);
    }
}
?>