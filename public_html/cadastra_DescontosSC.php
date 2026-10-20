<?php
		
	// Dados de conexão ao banco de dados
	$servername = "banco_gp_1.mysql.dbaas.com.br";
	$username = "banco_gp_1";
	$password = "tecnologia20";
	$dbname = "banco_gp_1";
	
	// Cria a conexão
	$connect = mysqli_connect($servername, $username, $password, $dbname);

	// Verifica a conexão
	if (!$connect) {
		die("Conexão falhou: " . mysqli_connect_error());
	}
	
	// Array com os dados do POST
	$dadosArray = $_POST['dados'];
	
	// Itera sobre os elementos do array e atualiza os dados na tabela
	foreach ($dadosArray as $dados) {
	echo $dados['estoqueFisico'];
		// Certifique-se de que 'Id' seja um campo único na sua tabela
		$id = mysqli_real_escape_string($connect, $dados['Id']);
	
		// Crie uma instrução SQL de atualização com base no 'Id'
		$sql = "UPDATE DescontosSC SET 
					estoqueFisico = '" . mysqli_real_escape_string($connect, $dados['estoqueFisico']) . "',
					mediaMensal = '" . mysqli_real_escape_string($connect, $dados['mediaMensal']) . "',
					coberturaMeses = '" . mysqli_real_escape_string($connect, $dados['coberturaMeses']) . "',
					`acima 100` = '" . mysqli_real_escape_string($connect, $dados['acima 100']) . "',
					`50 a 99` = '" . mysqli_real_escape_string($connect, $dados['50 a 99']) . "',
					`00 a 49` = '" . mysqli_real_escape_string($connect, $dados['00 a 49']) . "'
				WHERE Id = '$id'";
	
		// Execute a instrução SQL de atualização
		if (mysqli_query($connect, $sql)) {
			echo "Dados atualizados com sucesso!"."</br>";
		} else {
			echo "Erro ao atualizar dados: " . mysqli_error($connect)."</br>";
		}
	}
	
	
	
	

		
	//// Dados de conexão ao banco de dados
	//$servername = "banco_gp_1.mysql.dbaas.com.br";
	//$username = "banco_gp_1";
	//$password = "tecnologia20";
	//$dbname = "banco_gp_1";
	//
	//// Cria a conexão
	//$connect = mysqli_connect($servername, $username, $password, $dbname);
	//
	//// Verifica a conexão
	//if (!$connect) {
	//	die("Conexão falhou: " . mysqli_connect_error());
	//}
	//
	//// Array com os dados do POST
	//$dadosArray = $_POST['dados'];
	//
	//// Itera sobre os elementos do array e atualiza os dados na tabela
	//foreach ($dadosArray as $dados) {
	//echo $dados['estoqueFisico'];
	//	// Certifique-se de que 'Id' seja um campo único na sua tabela
	//	$id = mysqli_real_escape_string($connect, $dados['Id']);
	//
	//	// Crie uma instrução SQL de atualização com base no 'Id'
	//	$sql = "UPDATE DescontosSP SET 
	//				estoqueFisico = '" . mysqli_real_escape_string($connect, $dados['estoqueFisico']) . "',
	//				mediaMensal = '" . mysqli_real_escape_string($connect, $dados['mediaMensal']) . "',
	//				coberturaMeses = '" . mysqli_real_escape_string($connect, $dados['coberturaMeses']) . "',
	//				`acima 100` = '" . mysqli_real_escape_string($connect, $dados['acima 100']) . "',
	//				`50 a 99` = '" . mysqli_real_escape_string($connect, $dados['50 a 99']) . "',
	//				`00 a 49` = '" . mysqli_real_escape_string($connect, $dados['00 a 49']) . "'
	//			WHERE Id = '$id'";
	//
	//	// Execute a instrução SQL de atualização
	//	if (mysqli_query($connect, $sql)) {
	//		echo "Dados atualizados com sucesso!"."</br>";
	//	} else {
	//		echo "Erro ao atualizar dados: " . mysqli_error($connect)."</br>";
	//	}
	//}
?>



















































































































?>



















































































































