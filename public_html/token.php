
<?php
// Conexão com o banco de dados

$conn = mysqli_connect('banco_gp_1.mysql.dbaas.com.br', 'banco_gp_1', 'tecnologia20');
if (!$conn) {
    die('Erro ao conectar ao banco de dados: ' . mysqli_connect_error());
}

$db = mysqli_select_db($conn, 'banco_gp_1');
if (!$db) {
    die('Erro ao selecionar o banco de dados: ' . mysqli_error($conn));
}

// Verifica se há erro na conexão
if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

// Consulta para obter a última hora de login
$sql = "SELECT dataHora FROM ultimoLogin ORDER BY dataHora DESC LIMIT 1";
$result = $conn->query($sql);

// Verifica se a consulta retornou resultados
if ($result->num_rows > 0) {
    // Obtém a hora do último login
    $row = $result->fetch_assoc();
    $ultimoLogin = strtotime($row['dataHora']); // Convertendo para timestamp
    
    // Hora atual
    $agora = time();
    
    // Calcula a diferença em segundos
    $diferencaSegundos = $agora - $ultimoLogin;
    
    // 30 minutos em segundos
    $trintaMinutos = 30 * 60;
    
    // Verifica se passaram mais de 30 minutos
    if ($diferencaSegundos > $trintaMinutos) {
        //echo "Já se passaram mais de 30 minutos desde o último login.";
        ?>
        <meta http-equiv="refresh" content="1; URL='index.php'"/>
        <?php
    } else {
        //echo "Ainda não se passaram 30 minutos desde o último login.";
    }
} else {
    //echo "Nenhum registro de login encontrado.";
}

// Fecha a conexão com o banco de dados
$conn->close();
?>
<!--token.php -->
