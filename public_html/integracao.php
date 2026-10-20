<?php
$client_id = "tiny-api-38a60a1b0b0aaf9d1a7ab2249aa050172e0828ff-1788348202";
$client_secret = "1NfDalQoF1n3AFnBBlq1IdOmxHovCUu6"; // Pegue no painel do Tiny
$redirect_uri = "https://grupocavalcante.net.br/integracao.php";

// 1. Verifica se o Tiny mandou o 'code' na URL
if (isset($_GET['code'])) {
    $code = $_GET['code'];

    // 2. Prepara a requisição para trocar o 'code' pelos tokens
    $url = "https://accounts.tiny.com.br/realms/tiny/protocol/openid-connect/token";

    $curl = curl_init($url);
    curl_setopt_array($curl, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_HTTPHEADER => ["Content-Type: application/x-www-form-urlencoded"],
        CURLOPT_POSTFIELDS => http_build_query([
            'grant_type' => 'authorization_code',
            'client_id' => $client_id,
            'client_secret' => $client_secret,
            'redirect_uri' => $redirect_uri,
            'code' => $code
        ])
    ]);

    // 3. Executa e pega a resposta do Tiny
    $response = curl_exec($curl);
    curl_close($curl);
    
    // Converte o JSON de resposta para Array PHP
    $retorno = json_decode($response, true);

    // 4. Se o Tiny devolveu o token com sucesso, nós salvamos!
    if (isset($retorno['access_token'])) {
        
        // Montamos um array apenas com o que importa
        $dados_para_salvar = [
            'access_token' => $retorno['access_token'],
            'refresh_token' => $retorno['refresh_token'],
            // time() é a hora de agora. Somamos com os segundos que o token dura
            'expires_at' => time() + $retorno['expires_in'] 
        ];

        // MÁGICA AQUI: Salva esses dados num arquivo chamado 'tiny_tokens.json' na mesma pasta
        file_put_contents(__DIR__ . '/tiny_tokens.json', json_encode($dados_para_salvar, JSON_PRETTY_PRINT));

        header('Location: ordemCompraMenu.php');
        exit;
        
    } else {
        echo "Erro ao gerar token. Resposta do Tiny:<br>";
        echo $response;
    }

} else {
    echo "Código de autorização não recebido do Tiny.";
}
?>