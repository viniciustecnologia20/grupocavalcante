<?php

// Conexão com o banco de dados
$servername = "banco_gp_1.mysql.dbaas.com.br";
$username = "banco_gp_1";
$password = "tecnologia20";
$dbname = "banco_gp_1";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}

// Estrutura da tabela
$sqlCreateTable = "CREATE TABLE IF NOT EXISTS DescontosSP (
                    id INT AUTO_INCREMENT PRIMARY KEY,
                    estoqueFisico VARCHAR(10),
                    mediaMensal VARCHAR(10),
                    coberturaMeses INT,
                    acima100 DECIMAL(8,2),
                    de50a99 DECIMAL(8,2),
                    de00a49 DECIMAL(8,2)
                )";

if ($conn->query($sqlCreateTable) === TRUE) {
    echo "Tabela criada com sucesso!";
} else {
    echo "Erro ao criar tabela: " . $conn->error;
}

// Dados a serem inseridos
$dadosArray = $_POST['dados'];



foreach ($_POST['dados'] as $data) {
// Inserção dos dados
echo "<pre>";
print_r($data);
echo "</pre>";
foreach ($data as $row) {
    // Limpa os valores e adiciona aspas onde necessário
    $estoqueFisico = mysqli_real_escape_string($conn, $row['estoqueFisico']);
    $mediaMensal = mysqli_real_escape_string($conn, $row['mediaMensal']);
    $coberturaMeses = (int)$row['coberturaMeses'];
    $acima100 = (float)$row['acima 100'];
    $de50a99 = (float)$row['50 a 99'];
    $de00a49 = (float)$row['00 a 49'];
	
    $sqlInsert = "INSERT INTO DescontosSP (estoqueFisico, mediaMensal, coberturaMeses, acima100, de50a99, de00a49)
                  VALUES ('{$row['estoqueFisico']}', '{$row['mediaMensal']}', {$row['coberturaMeses']}, {$row['acima 100']}, {$row['50 a 99']}, {$row['00 a 49']})";

    if ($conn->query($sqlInsert) !== TRUE) {
        echo "Erro ao inserir dados: " . $conn->error;
    }
}
}

// Fechar conexão
$conn->close();

?>
