<?php
session_start();

$_SESSION['teste'] = true;
?>
<!DOCTYPE html>
<head>
	<metacharset = "utf-8">
</head>
<html>
<body>

<?php


ignore_user_abort( true ); // Não interrompe o script em caso de perda de conexão
set_time_limit( 21600 ); // Time out após 6h


	$url = 'https://api.tiny.com.br//api2/notas.fiscais.pesquisa.php';
	$token = $_GET['token'];
	$situacao = '1';
	$data = "token=$token&situacao=$situacao&formato=JSON";
	
	$retorno = enviarREST_1($url, $data);
	$content = json_decode($retorno);

	//var_dump($content);	
	
	echo"<pre>";
	//print_r($array_ID);
	echo"</pre>";
	
		function enviarREST_1($url, $data, $optional_headers = null) {
			$params = array('http' => array(
				'method' => 'POST',
				'content' => $data
			));
			if ($optional_headers !== null) {
				$params['http']['header'] = $optional_headers;
			}
	
			$ctx = stream_context_create($params);
			$fp = @fopen($url, 'rb', false, $ctx);
			if (!$fp) {
				throw new Exception("Problema com $url, $php_errormsg");
			}
			$response = @stream_get_contents($fp);
			if ($response === false) {
				throw new Exception("Problema obtendo retorno de $url, $php_errormsg");
			}
	
			return $response;
	
	}
//-------------------------------------------------------------------------------------------------------------------------
	
	$array_ID = array();
	$content->retorno->notas_fiscais;
	
	foreach($content->retorno->notas_fiscais as $nota_fiscal){
		$ID = $nota_fiscal->nota_fiscal->id ."<br/>";
		array_push($array_ID,$ID);
	}
	
//-------------------------------------------------------------------------------------------------------------------------
	
		$url = 'https://api.tiny.com.br//api2/nota.fiscal.emitir.php';
		$token = $_GET['token'];
		foreach($array_ID as $first){
		$id = $first;
		$data = "token=$token&id=$id&formato=JSON";

		$retorno = enviarREST($url, $data);
		$content = json_decode($retorno);
		$retorno = $content->retorno->codigo_erro;
		if ($retorno == '32'){
			
			array_shift($array_ID);
			
		}
		echo"<pre>";
		print_r($content);
		echo"</pre>";
		
		}


		function enviarREST($url, $data, $optional_headers = null) {
		$params = array('http' => array(
			'method' => 'POST',
			'content' => $data
		));

		if ($optional_headers !== null) {
			$params['http']['header'] = $optional_headers;
		}

		$ctx = stream_context_create($params);
		$fp = @fopen($url, 'rb', false, $ctx);
		if (!$fp) {
			throw new Exception("Problema com $url, $php_errormsg");
		}
		$response = @stream_get_contents($fp);
		if ($response === false) {
			throw new Exception("Problema obtendo retorno de $url, $php_errormsg");
		}

		return $response;
		}
//-------------------------------------------------------------------------------------------------------------------------

//header("Refresh: 150");	


?>
<meta http-equiv="refresh" content="300"/>

