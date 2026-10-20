<?php
	session_start();
	require_once "PHPExcel/Classes/PHPExcel.php";
	$file = "PHPExcel/Classes/PHPExcel.php";
	
	if (!file_exists($file)) {
		die('File does not exist.');
	}
	
	
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="sidebar/assets/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="sidebar/css/styles.css" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <!-- Icones-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">
		
		
      
      <style type="text/css">
        
        .marcador {
          background: #fe9d9d;
          border: 1px solid #f94646;
        }
        
        .marcador-container {
          background: #5bf946;
          border: 1px solid #36ae26;
        }
        
        .barra-lateral{
          background: #1926e0;
        }
        
        .background{
          background: #ffffff;
        }
        
        .centralizar {
          text-align: center;
          margin: auto;
        }
        .centralizar-esquerda{
          text-align: left ;
        }
        
      </style>
    </head>
    <body>
        <div class="d-flex " id="wrapper">
            <!-- Sidebar-->
            <div class="border-end bg-white" id="sidebar-wrapper">
                <div class="sidebar-heading border-bottom bg-light">Opções</div>
                <div class="list-group list-group-flush">
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="home.html"><i class="bi bi-house-fill"></i> Home</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="pagina_consulta.html"><i class="bi bi-receipt-cutoff"></i> Conferencia de quantidade NFe</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="pagina_conferencia.html"><i class="bi bi-ui-checks"></i> Conferencia Cadastral</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="pagina_formacão_de_preço_manu.php"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-coin" viewBox="0 0 16 16">
                    <path d="M5.5 9.511c.076.954.83 1.697 2.182 1.785V12h.6v-.709c1.4-.098 2.218-.846 2.218-1.932 0-.987-.626-1.496-1.745-1.76l-.473-.112V5.57c.6.068.982.396 1.074.85h1.052c-.076-.919-.864-1.638-2.126-1.716V4h-.6v.719c-1.195.117-2.01.836-2.01 1.853 0 .9.606 1.472 1.613 1.707l.397.098v2.034c-.615-.093-1.022-.43-1.114-.9H5.5zm2.177-2.166c-.59-.137-.91-.416-.91-.836 0-.47.345-.822.915-.925v1.76h-.005zm.692 1.193c.717.166 1.048.435 1.048.91 0 .542-.412.914-1.135.982V8.518l.087.02z"/>
                    <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                    <path fill-rule="evenodd" d="M8 13.5a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zm0 .5A6 6 0 1 0 8 2a6 6 0 0 0 0 12z"/>
                    </svg>Formação de Preço</a>
					<a class="list-group-item list-group-item-action list-group-item-light p-3" href="main.php">Estoque promocional</a>
                </div>
            </div>
            <!-- Page content wrapper-->
            <div class= "" id="page-content-wrapper">
                <!-- Top navigation-->
                <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                    <div class="container-fluid">
						<button onclick="goBack()" class=' btn btn-outline-info value-plus'>voltar</button>
						<div></div>
                        <button class="btn btn-primary" id="sidebarToggle"><i class="bi bi-list"></i></button>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        </div>
                    </div>
                </nav>
            <!--conteudo da pagina-->
			<div class="card shadow  rounded-top centralizar">
			<h5 class="card-header rounded-top ">Excel</h5>
			<div class="col-2centralizar">
			<form id="excel" method="POST" enctype="multipart/form-data">
			<div class="custom-file">
			<input type="file" class="custom-file-input form-control-file" id="XLS" name="XLS" accept=".xls">
			<label class="custom-file-label" for="XLS">Escolher arquivo</label>
			<button id='$idNFE' class=' botaoEnviar btn btn-outline-info btn-lg value-plus'>Importar</button>
			</form>
			</div>
            <!--card com o conteudo-->
			<?
			
			$connect = mysqli_connect('banco_gp_1.mysql.dbaas.com.br','banco_gp_1','tecnologia20');
			$db = mysqli_select_db($connect,'banco_gp_1');
			$query_select = "SELECT * FROM `ChaveAPI`";
			$select = mysqli_query($connect,$query_select)or die(mysqli_error($connect));
			$array = mysqli_fetch_array($select);
			$chave_array = $array['chaveAPI'];
			
			
			if ($_FILES['XLS']['tmp_name'] != null) {
			$file =$_FILES['XLS']['tmp_name'];
			
			$objPHPExcel = PHPExcel_IOFactory::load($file);
			$worksheet = $objPHPExcel->getActiveSheet();
			
			$highestRow = $worksheet->getHighestRow();
			
			$mediaMensal = array();
			$codigoEstoqueFisico = array();
			
			for ($row = 1; $row <= $highestRow; $row++) {
				$key = $worksheet->getCell('B' . $row)->getValue();
				$value = $worksheet->getCell('K' . $row)->getValue();
				$mediaMensal[$key] = $value;
			}
			}else{
				echo "Arquivo EXCEL não importado!"."</br>";
			}
			?>
			</div>
			</div>
			<?
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
			
			$idNFE = $_GET['idNFE'];
			function obterNFe($idNFE, $chave_array){
				$idNFE = $idNFE;
				$url = 'https://api.tiny.com.br/api2/nota.fiscal.obter.php';
				$token = $chave_array;
				$id = "$idNFE";
				$data = "token=$token&id=$id&formato=JSON";
				
				$retorno = enviarREST($url, $data);
				return	$content = json_decode($retorno);
			}
			
			function obterIdProduto($SKU, $chave_array){
				$url = 'https://api.tiny.com.br/api2/produtos.pesquisa.php';
				$token = $chave_array;
				$pesquisa = $SKU;
				$data = "token=$token&pesquisa=$pesquisa&formato=JSON";
				
				$retorno = enviarREST($url, $data);
				$content = json_decode($retorno);
				
				foreach($content->retorno->produtos as $value){
					$idProduto = $value->produto->id;
				}
				return $idProduto;
			}
			
			function obterEstoqueProduto($idProduto, $chave_array){
				$url = 'https://api.tiny.com.br/api2/produto.obter.estoque.php';
				$token = $chave_array;
				$id= $idProduto;
				$formato = 'JSON';
				$data = "token=$token&id=$id&formato=$formato";
				
				$retorno = enviarREST($url, $data);
				$content = json_decode($retorno);				
				return $content;
			}
			
			function obterProduto($idProduto, $chave_array){
				$url = 'https://api.tiny.com.br/api2/produto.obter.php';
				$token = $chave_array;
				$id = $idProduto;
				$formato = 'JSON';
				$data = "token=$token&id=$id&formato=$formato";
				
				$retorno = enviarREST($url, $data);
				return	$content = json_decode($retorno);
			}
			
			function formatarDinheiro($valor) {
				// Converte para float e arredonda para duas casas decimais
				$valor = round(floatval($valor), 4);
	
				// Formata o valor como dinheiro brasileiro
				$valor_formatado = number_format($valor, 4, ',', '.');
	
				return 'R$ ' . $valor_formatado;
			}

			
			?>
			<form method="post" action="atualizaPreco.php">
			<div class="table_fixed_box">
			<table id='table' class="table table-sm table-striped table-bordered table-hover ">
			<thead class="table-secondary table-striped centralizar ">
			<tr>
			<th scope="col">#</th>
			<th scope="col">SKU</th>
			<th scope="col">Descrição</th>
			<th scope="col">Quantidade</th>
			<th scope="col">Tempo de estoque</th>
			<th scope="col">Tipo</th>
			<th scope="col">Preço de venda</th>
			<th scope="col">% de desconto</th>
			<th scope="col">Valor Sugerido</th>
			<th scope="col">Selecionar</th>

			</tr>
			</thead>
			<tbody>

			<?
			$Contagem = 1;
			$content = obterNFe($idNFE, $chave_array);
			foreach($content->retorno->nota_fiscal->itens as $value){
				$codigoProduto = $value->item->codigo;
				$idProduto = obterIdProduto($codigoProduto, $chave_array);//function
				$valorProduto = obterProduto($idProduto, $chave_array);
				$valorProduto = $valorProduto->retorno->produto->preco;
				$valorProdutoPormocional = $valorProduto->retorno->produto->preco_promocional;
				$estoqueFisico = obterEstoqueProduto($idProduto, $chave_array);//function
				$estoqueFisico = $estoqueFisico->retorno->produto->saldo;
				$descricao = $value->item->descricao;
				
				echo "<tr>";
				echo "<td class= centralizar>$Contagem</td>";
				echo "<td class= centralizar>$codigoProduto</td>";
				echo "<td class= centralizar>$descricao</td>";
				echo "<td class= centralizar>$estoqueFisico</td>";
				
				
				if($codigoProduto == ''){$codigoProduto = null;}
				if(array_key_exists($codigoProduto, $mediaMensal)){
					//echo "O produto $codigoProduto com o ID $idProduto "."</br>";
					//echo "com o estoque fisico de: $estoqueFisico e Media mensal: $mediaMensal[$codigoProduto] "."</br>";
					$mediaMensalInt = intval($mediaMensal[$codigoProduto]);
					if($estoqueFisico == 0 && $mediaMensalInt == 0 ){
						$coberturaEstoque = 0;	
					}else{
						$coberturaEstoque = round($estoqueFisico / $mediaMensalInt, 0);
					}
					//echo "Tem um Cobertura de estoque de " . $coberturaEstoque ."</br>";
					//echo "valor do produto $valorProduto"."</br>";
					
					$Produto = obterProduto($idProduto, $chave_array);
					$ProdutoTipoVariacao = $Produto->retorno->produto->tipoVariacao;
					
					$tempoEstoqueArray = array(
						$codigoProduto => $coberturaEstoque
					);
					
					//echo "<pre>";
					//print_r($tempoEstoqueArray);
					//echo "</pre>";
					
					echo "<td class= centralizar>$coberturaEstoque</td>";
					
					if ($Produto->retorno->produto->tipoVariacao == 'N'){
						//echo "esse produto não tem variação $ProdutoTipoVariacao"."</br>";
						echo "<td class= centralizar>Unico</td>";
						
						$tipoArray = array(
							$codigoProduto => 'Unico'
						);
						
						$valorformatado = formatarDinheiro($valorProduto);
						echo "<td class= centralizar>$valorformatado</td>";
						
						$precoVendaArray = array(
							$codigoProduto => $valorformatado
						);
						
						if($valorProduto <= 49.99){
							
							if($estoqueFisico >=0 && $mediaMensal[$codigoProduto] == 0 && $coberturaEstoque == 0){
								//echo "Valor de -15,00 %"."</br>";
								$novoValor = ($valorProduto - ($valorProduto * 0.15 ));
								echo "<td class= centralizar> -15,00 </td>";
								echo "<td class= centralizar>". formatarDinheiro(($valorProduto - ($valorProduto * 0.15 )))."</td>";
								
							}
							if($estoqueFisico >= 0 && $mediaMensal[$codigoProduto]  >= 1 && $coberturaEstoque == 0){
								//echo "Valor de 00,00 %"."</br>";
								$novoValor = $valorProduto;
								echo "<td class= centralizar> 00,00 % </td>";
								echo "<td class= centralizar>". formatarDinheiro($valorProduto)."</td>";
								
							}
							if($estoqueFisico >= 0 && $mediaMensal[$codigoProduto]  >= 1 && $coberturaEstoque == 1){
								//echo "Valor de 00,00 %"."</br>";
								$novoValor = $valorProduto;
								echo "<td class= centralizar> 00,00 % </td>";
								echo "<td class= centralizar>". formatarDinheiro($valorProduto)."</td>";
								
							}
							if($estoqueFisico >= 0 && $mediaMensal[$codigoProduto]  >= 1 && $coberturaEstoque == 2){
								//echo "Valor de -1,60 %"."</br>";
								$novoValor = ($valorProduto - ($valorProduto * 0.0160 ));
								echo "<td class= centralizar> -1,60 % </td>";
								echo "<td class= centralizar>". formatarDinheiro(($valorProduto - ($valorProduto * 0.0160 )))."</td>";
								
							}
							if($estoqueFisico >= 0 && $mediaMensal[$codigoProduto]  >= 1 && $coberturaEstoque == 3){
								//echo "Valor de -3,10 %"."</br>";
								$novoValor = ($valorProduto - ($valorProduto * 0.0310 ));
								echo "<td class= centralizar> -3,10 % </td>";
								echo "<td class= centralizar>". formatarDinheiro(($valorProduto - ($valorProduto * 0.0310 )))."</td>";
								
							}
							if($estoqueFisico >= 0 && $mediaMensal[$codigoProduto]  >= 1 && $coberturaEstoque == 4){
								//echo "Valor de -4,60 %"."</br>";
								$novoValor = ($valorProduto - ($valorProduto * 0.0460 ));
								echo "<td class= centralizar> -4,60 % </td>";
								echo "<td class= centralizar>". formatarDinheiro(($valorProduto - ($valorProduto * 0.0460 )))."</td>";
								
							}
							if($estoqueFisico >= 0 && $mediaMensal[$codigoProduto]  >= 1 && $coberturaEstoque == 5){
								//echo "Valor de -6,00 %"."</br>";
								$novoValor = ($valorProduto - ($valorProduto * 0.0600 ));
								echo "<td class= centralizar> -6,00 % </td>";
								echo "<td class= centralizar>". formatarDinheiro(($valorProduto - ($valorProduto * 0.0600 )))."</td>";
								
							}
							if($estoqueFisico >= 0 && $mediaMensal[$codigoProduto]  >= 1 && $coberturaEstoque >= 6){
								//echo "Valor de -10,00 %"."</br>";
								$novoValor = ($valorProduto - ($valorProduto * 0.10 ));
								echo "<td class= centralizar> -10,00 % </td>";
								echo "<td class= centralizar>". formatarDinheiro(($valorProduto - ($valorProduto * 0.10 )))."</td>";
								
							}
							/*if($estoqueFisico >= 0 && $mediaMensal[$codigoProduto]  >= 1 && $coberturaEstoque >= 7){
								//echo "Valor de -15,00 %"."</br>";
								$novoValor = ($valorProduto - ($valorProduto * 0.15 ));
								echo "<td class= centralizar>". ($valorProduto - ($valorProduto * 0.15 ))."</td>";
								
							}*/
							}else{
							//echo "$Contagem não entrou 1"."</br>";
							}
							
						if($valorProduto >= 50.00 && $valorProduto <= 99.99 ){	
							if($estoqueFisico >=0 && $mediaMensal[$codigoProduto] == 0 && $coberturaEstoque == 0){	
								//echo "Valor de -15,00 %"."</br>";
								$novoValor = ($valorProduto - ($valorProduto * 0.15 ));
								echo "<td class= centralizar> -15,00 % </td>";
								echo "<td class= centralizar>". formatarDinheiro(($valorProduto - ($valorProduto * 0.15 )))."</td>";
							}	
							if($estoqueFisico >= 0 && $mediaMensal[$codigoProduto]  >= 1 && $coberturaEstoque == 0){	
								//echo "Valor de 0,00 %"."</br>";	
								$novoValor = $valorProduto;
								echo "<td class= centralizar> 0,00 % </td>";
								echo "<td class= centralizar>". formatarDinheiro($valorProduto)."</td>";	
							}	
							if($estoqueFisico >= 0 && $mediaMensal[$codigoProduto]  >= 1 && $coberturaEstoque == 1){	
								//echo "Valor de -1,60 %"."</br>";
								$novoValor = ($valorProduto - ($valorProduto * 0.0160 ));
								echo "<td class= centralizar> 0,00 % </td>";
								echo "<td class= centralizar>". formatarDinheiro(($valorProduto - ($valorProduto * 0.0160 )))."</td>";
							}	
							if($estoqueFisico >= 0 && $mediaMensal[$codigoProduto]  >= 1 && $coberturaEstoque == 2){	
								//echo "Valor de -3,10 %"."</br>";
								$novoValor = ($valorProduto - ($valorProduto * 0.0310 ));
								echo "<td class= centralizar> -3,10 % </td>";
								echo "<td class= centralizar>". formatarDinheiro(($valorProduto - ($valorProduto * 0.0310 )))."</td>";
							}	
							if($estoqueFisico >= 0 && $mediaMensal[$codigoProduto]  >= 1 && $coberturaEstoque == 3){	
								//echo "Valor de -4,60 %"."</br>";
								$novoValor = ($valorProduto - ($valorProduto * 0.0460 ));
								echo "<td class= centralizar> -4,60 % </td>";
								echo "<td class= centralizar>". formatarDinheiro(($valorProduto - ($valorProduto * 0.0460 )))."</td>";
							}	
							if($estoqueFisico >= 0 && $mediaMensal[$codigoProduto]  >= 1 && $coberturaEstoque == 4){	
								//echo "Valor de -6,00 %"."</br>";
								$novoValor = ($valorProduto - ($valorProduto * 0.0600 ));
								echo "<td class= centralizar> -6,00 % </td>";
								echo "<td class= centralizar>". formatarDinheiro(($valorProduto - ($valorProduto * 0.0600 )))."</td>";
							}	
							if($estoqueFisico >= 0 && $mediaMensal[$codigoProduto]  >= 1 && $coberturaEstoque == 5){	
								//echo "Valor de -7,40 %"."</br>";
								$novoValor = ($valorProduto - ($valorProduto * 0.0740 ));
								echo "<td class= centralizar> -7,40 % </td>";
								echo "<td class= centralizar>". formatarDinheiro(($valorProduto - ($valorProduto * 0.0740 )))."</td>";
							}	
							if($estoqueFisico >= 0 && $mediaMensal[$codigoProduto]  >= 1 && $coberturaEstoque >= 6){	
								//echo "Valor de -10,00 %"."</br>";
								$novoValor = ($valorProduto - ($valorProduto * 0.10 ));
								echo "<td class= centralizar> -10,00 % </td>";
								echo "<td class= centralizar>". formatarDinheiro(($valorProduto - ($valorProduto * 0.10 )))."</td>";
							}	
							/*if($estoqueFisico >= 0 && $mediaMensal[$codigoProduto]  >= 1 && $coberturaEstoque >= 7){	
								//echo "Valor de -15,00 %"."</br>";
								$novoValor = ($valorProduto - ($valorProduto * 0.15 ));
								echo "<td class= centralizar>". ($valorProduto - ($valorProduto * 0.15 ))."</td>";
							}*/		
								
						}else{
							//echo "não entrou 2";
							}
							
						if($valorProduto >= 100.00){	
							if($estoqueFisico >=0 && $mediaMensal[$codigoProduto] == 0 && $coberturaEstoque == 0){	
								//echo "Valor de -15,00 %"."</br>";
								$novoValor = ($valorProduto - ($valorProduto * 0.15 ));
								echo "<td class= centralizar> -15,00 % </td>";
								echo "<td class= centralizar>". formatarDinheiro(($valorProduto - ($valorProduto * 0.15 )))."</td>";
							}	
							if($estoqueFisico >= 0 && $mediaMensal[$codigoProduto]  >= 1 && $coberturaEstoque == 0){	
								//echo "Valor de -1,60 %"."</br>";
								$novoValor = ($valorProduto - ($valorProduto * 0.0160 ));
								echo "<td class= centralizar> -1,60 % </td>";
								echo "<td class= centralizar>". formatarDinheiro(($valorProduto - ($valorProduto * 0.0160 )))."</td>";
							}	
							if($estoqueFisico >= 0 && $mediaMensal[$codigoProduto]  >= 1 && $coberturaEstoque == 1){	
								//echo "Valor de -3,10 %"."</br>";
								$novoValor = ($valorProduto - ($valorProduto * 0.0310 ));
								echo "<td class= centralizar> -3,10 % </td>";
								echo "<td class= centralizar>". formatarDinheiro(($valorProduto - ($valorProduto * 0.0310 )))."</td>";
							}	
							if($estoqueFisico >= 0 && $mediaMensal[$codigoProduto]  >= 1 && $coberturaEstoque == 2){	
								//echo "Valor de -4,60 %"."</br>";
								$novoValor = ($valorProduto - ($valorProduto * 0.0460 ));
								echo "<td class= centralizar> -4,60 % </td>";
								echo "<td class= centralizar>". formatarDinheiro(($valorProduto - ($valorProduto * 0.0460 )))."</td>";
							}	
							if($estoqueFisico >= 0 && $mediaMensal[$codigoProduto]  >= 1 && $coberturaEstoque == 3){	
								//echo "Valor de -6,00 %"."</br>";
								$novoValor = ($valorProduto - ($valorProduto * 0.0600 ));
								echo "<td class= centralizar> -6,00 % </td>";
								echo "<td class= centralizar>". formatarDinheiro(($valorProduto - ($valorProduto * 0.0600 )))."</td>";
							}	
							if($estoqueFisico >= 0 && $mediaMensal[$codigoProduto]  >= 1 && $coberturaEstoque == 4){	
								//echo "Valor de -7,40 %"."</br>";
								$novoValor = ($valorProduto - ($valorProduto * 0.0740 ));
								echo "<td class= centralizar> -7,40 % </td>";
								echo "<td class= centralizar>". formatarDinheiro(($valorProduto - ($valorProduto * 0.0740 )))."</td>";
							}	
							if($estoqueFisico >= 0 && $mediaMensal[$codigoProduto]  >= 1 && $coberturaEstoque == 5){	
								//echo "Valor de -8,70 %"."</br>";
								$novoValor = ($valorProduto - ($valorProduto * 0.0870 ));
								echo "<td class= centralizar> -8,70 % </td>";
								echo "<td class= centralizar>". formatarDinheiro(($valorProduto - ($valorProduto * 0.0870 )))."</td>";
							}	
							if($estoqueFisico >= 0 && $mediaMensal[$codigoProduto]  >= 1 && $coberturaEstoque >= 6){	
								//echo "Valor de -10,00 %"."</br>";
								$novoValor = ($valorProduto - ($valorProduto * 0.10 ));
								echo "<td class= centralizar> -10,00 % </td>";
								echo "<td class= centralizar>". formatarDinheiro(($valorProduto - ($valorProduto * 0.10 )))."</td>";
							}	
							/*if($estoqueFisico >= 0 && $mediaMensal[$codigoProduto]  >= 1 && $coberturaEstoque >= 7){	
								//echo "Valor de -15,00 %"."</br>";
								$novoValor = ($valorProduto - ($valorProduto * 0.15 ));
								echo "<td class= centralizar>". ($valorProduto - ($valorProduto * 0.15 ))."</td>";
							}*/		
								
						}else{
							//echo "não entrou 3";
							}
							
					echo "<td id=icms_$id_input class= centralizar><input class=form-check-input type=checkbox  name=itens[] value=$idProduto$contagem=$novoValor id=$Contagem ></td>";
					$Contagem ++;
					}else{
						$Contagem ++;
						
						$tipoArray = array(
							$codigoProduto => 'Variação'
						);
						
						echo "<td class= centralizar>Variação</td>";
						$valorformatado = formatarDinheiro($valorProduto);
						
						echo "<td class= centralizar>$valorformatado</td>";
						
						//echo "esse produto é uma variação $ProdutoTipoVariacao"."</br>";
						
						$idProdutoPai = $Produto->retorno->produto->idProdutoPai;
						$obterProdutoPai = obterProduto($idProdutoPai, $chave_array);
						$produtoPaiSKU = $obterProdutoPai->retorno->produto->codigo;
						//echo "SKU do produto pai $produtoPaiSKU"."</br>";
						$variaçõesValores = array();
						foreach($obterProdutoPai->retorno->produto->variacoes as $value){
							$codigoSKUVariacoes = $value->variacao->codigo;
							$IDVariacoes = $value->variacao->id;
							$precoVariacoes = $value->variacao->preco;
							//echo "SKU de outras variações: $codigoSKUVariacoes"."</br>";
							//echo "SKU de outras variações: $precoVariacoes"."</br>";
							
							$variaçõesValores[$codigoSKUVariacoes]=$precoVariacoes;
						}
						
						$soma = array_sum($variaçõesValores);
						$quantidade = count($variaçõesValores);
						$media = $soma / $quantidade;
						
						//echo "<pre>";
						//print_r($media);
						//echo "</pre>";
						
						if($media <= 49.99){
							
							if($estoqueFisico >=0 && $mediaMensal[$codigoProduto] == 0 && $coberturaEstoque == 0){
								//echo "Valor de -15,00 %"."</br>";
								$novoValor = ($media - ($media * 0.15 ));
								echo "<td class= centralizar> -15,00 </td>";
								echo "<td class= centralizar>". formatarDinheiro(($media - ($media * 0.15 )))."</td>";
								
								}
							if($estoqueFisico >= 0 && $mediaMensal[$codigoProduto]  >= 1 && $coberturaEstoque == 0){
								//echo "Valor de 00,00 %"."</br>";
								$novoValor = $media;
								echo "<td class= centralizar> 00,00 % </td>";
								echo "<td class= centralizar>". formatarDinheiro($media)."</td>";
								
							}
							if($estoqueFisico >= 0 && $mediaMensal[$codigoProduto]  >= 1 && $coberturaEstoque == 1){
								//echo "Valor de 00,00 %"."</br>";
								$novoValor = $media;
								echo "<td class= centralizar> 00,00 % </td>";
								echo "<td class= centralizar>". formatarDinheiro($media)."</td>";
								
							}
							if($estoqueFisico >= 0 && $mediaMensal[$codigoProduto]  >= 1 && $coberturaEstoque == 2){
								//echo "Valor de -1,60 %"."</br>";
								$novoValor = ($media - ($media * 0.0160 ));
								echo "<td class= centralizar> -1,60 % </td>";
								echo "<td class= centralizar>". formatarDinheiro(($media - ($media * 0.0160 )))."</td>";
								
							}
							if($estoqueFisico >= 0 && $mediaMensal[$codigoProduto]  >= 1 && $coberturaEstoque == 3){
								//echo "Valor de -3,10 %"."</br>";
								$novoValor = ($media - ($media * 0.0310 ));
								echo "<td class= centralizar> -3,10 % </td>";
								echo "<td class= centralizar>". formatarDinheiro(($media - ($media * 0.0310 )))."</td>";
								
							}
							if($estoqueFisico >= 0 && $mediaMensal[$codigoProduto]  >= 1 && $coberturaEstoque == 4){
								//echo "Valor de -4,60 %"."</br>";
								$novoValor = ($media - ($media * 0.0460 ));
								echo "<td class= centralizar> -4,60 % </td>";
								echo "<td class= centralizar>". formatarDinheiro(($media - ($media * 0.0460 )))."</td>";
								
							}
							if($estoqueFisico >= 0 && $mediaMensal[$codigoProduto]  >= 1 && $coberturaEstoque == 5){
								//echo "Valor de -6,00 %"."</br>";
								$novoValor = ($media - ($media * 0.0600 ));
								echo "<td class= centralizar> -6,00 % </td>";
								echo "<td class= centralizar>". formatarDinheiro(($media - ($media * 0.0600 )))."</td>";
								
							}
							if($estoqueFisico >= 0 && $mediaMensal[$codigoProduto]  >= 1 && $coberturaEstoque >= 6){
								//echo "Valor de -10,00 %"."</br>";
								$novoValor = ($media - ($media * 0.10 ));
								echo "<td class= centralizar> -10,00 % </td>";
								echo "<td class= centralizar>". formatarDinheiro(($media - ($media * 0.10 )))."</td>";
								
							}
							/*if($estoqueFisico >= 0 && $mediaMensal[$codigoProduto]  >= 1 && $coberturaEstoque >= 7){
								//echo "Valor de -15,00 %"."</br>";
								$novoValor = ($valorProduto - ($valorProduto * 0.15 ));
								echo "<td class= centralizar>". ($valorProduto - ($valorProduto * 0.15 ))."</td>";
								
							}*/
						}else{
							//echo "$Contagem não entrou 1"."</br>";
						}
													
						if($media >= 50.00 && $media <= 99.99 ){	
							if($estoqueFisico >=0 && $mediaMensal[$codigoProduto] == 0 && $coberturaEstoque == 0){	
								//echo "Valor de -15,00 %"."</br>";
								$novoValor = ($media - ($media * 0.15 ));
								echo "<td class= centralizar> -15,00 % </td>";
								echo "<td class= centralizar>". formatarDinheiro(($media - ($media * 0.15 )))."</td>";
							}	
							if($estoqueFisico >= 0 && $mediaMensal[$codigoProduto]  >= 1 && $coberturaEstoque == 0){	
								//echo "Valor de 0,00 %"."</br>";	
								$novoValor = $media;
								echo "<td class= centralizar> 0,00 % </td>";
								echo "<td class= centralizar>". formatarDinheiro($media)."</td>";	
							}	
							if($estoqueFisico >= 0 && $mediaMensal[$codigoProduto]  >= 1 && $coberturaEstoque == 1){	
								//echo "Valor de -1,60 %"."</br>";
								$novoValor = ($media - ($media * 0.0160 ));
								echo "<td class= centralizar> 0,00 % </td>";
								echo "<td class= centralizar>". formatarDinheiro(($media - ($media * 0.0160 )))."</td>";
							}	
							if($estoqueFisico >= 0 && $mediaMensal[$codigoProduto]  >= 1 && $coberturaEstoque == 2){	
								//echo "Valor de -3,10 %"."</br>";
								$novoValor = ($media - ($media * 0.0310 ));
								echo "<td class= centralizar> -3,10 % </td>";
								echo "<td class= centralizar>". formatarDinheiro(($media - ($media * 0.0310 )))."</td>";
							}	
							if($estoqueFisico >= 0 && $mediaMensal[$codigoProduto]  >= 1 && $coberturaEstoque == 3){	
								//echo "Valor de -4,60 %"."</br>";
								$novoValor = ($media - ($media * 0.0460 ));
								echo "<td class= centralizar> -4,60 % </td>";
								echo "<td class= centralizar>". formatarDinheiro(($media - ($media * 0.0460 )))."</td>";
							}	
							if($estoqueFisico >= 0 && $mediaMensal[$codigoProduto]  >= 1 && $coberturaEstoque == 4){	
								//echo "Valor de -6,00 %"."</br>";
								$novoValor = ($media - ($media * 0.0600 ));
								echo "<td class= centralizar> -6,00 % </td>";
								echo "<td class= centralizar>". formatarDinheiro(($media - ($media * 0.0600 )))."</td>";
							}	
							if($estoqueFisico >= 0 && $mediaMensal[$codigoProduto]  >= 1 && $coberturaEstoque == 5){	
								//echo "Valor de -7,40 %"."</br>";
								$novoValor = ($media - ($media * 0.0740 ));
								echo "<td class= centralizar> -7,40 % </td>";
								echo "<td class= centralizar>". formatarDinheiro(($media - ($media * 0.0740 )))."</td>";
							}	
							if($estoqueFisico >= 0 && $mediaMensal[$codigoProduto]  >= 1 && $coberturaEstoque >= 6){	
								//echo "Valor de -10,00 %"."</br>";
								$novoValor = ($media - ($media * 0.10 ));
								echo "<td class= centralizar> -10,00 % </td>";
								echo "<td class= centralizar>". formatarDinheiro(($media - ($media * 0.10 )))."</td>";
							}	
							/*if($estoqueFisico >= 0 && $mediaMensal[$codigoProduto]  >= 1 && $coberturaEstoque >= 7){	
								//echo "Valor de -15,00 %"."</br>";
								$novoValor = ($valorProduto - ($valorProduto * 0.15 ));
								echo "<td class= centralizar>". ($valorProduto - ($valorProduto * 0.15 ))."</td>";
							}*/		
								
						}else{
							//echo "não entrou 2";
						}
						
						if($media >= 100.00){
							//echo "breakpoint"."</br>";
							if($estoqueFisico >=0 && $mediaMensal[$codigoProduto] == 0 && $coberturaEstoque == 0){	
								//echo "Valor de -15,00 %"."</br>";
								$novoValor = ($media - ($media * 0.15 ));
								echo "<td class= centralizar> -15,00 % </td>";
								echo "<td class= centralizar>". formatarDinheiro(($media - ($media * 0.15 )))."</td>";
							}	
							if($estoqueFisico >= 0 && $mediaMensal[$codigoProduto]  >= 1 && $coberturaEstoque == 0){	
								//echo "Valor de -1,60 %"."</br>";
								$novoValor = ($media - ($media * 0.0160 ));
								echo "<td class= centralizar> -1,60 % </td>";
								echo "<td class= centralizar>". formatarDinheiro(($media - ($media * 0.0160 )))."</td>";
							}	
							if($estoqueFisico >= 0 && $mediaMensal[$codigoProduto]  >= 1 && $coberturaEstoque == 1){	
								//echo "Valor de -3,10 %"."</br>";
								$novoValor = ($media - ($media * 0.0310 ));
								echo "<td class= centralizar> -3,10 % </td>";
								echo "<td class= centralizar>". formatarDinheiro(($media - ($media * 0.0310 )))."</td>";
							}	
							if($estoqueFisico >= 0 && $mediaMensal[$codigoProduto]  >= 1 && $coberturaEstoque == 2){	
								//echo "Valor de -4,60 %"."</br>";
								$novoValor = ($media - ($media * 0.0460 ));
								echo "<td class= centralizar> -4,60 % </td>";
								echo "<td class= centralizar>". formatarDinheiro(($media - ($media * 0.0460 )))."</td>";
							}	
							if($estoqueFisico >= 0 && $mediaMensal[$codigoProduto]  >= 1 && $coberturaEstoque == 3){	
								//echo "Valor de -6,00 %"."</br>";
								$novoValor = ($media - ($media * 0.0600 ));
								echo "<td class= centralizar> -6,00 % </td>";
								echo "<td class= centralizar>". formatarDinheiro(($media - ($media * 0.0600 )))."</td>";
							}	
							if($estoqueFisico >= 0 && $mediaMensal[$codigoProduto]  >= 1 && $coberturaEstoque == 4){	
								//echo "Valor de -7,40 %"."</br>";
								$novoValor = ($media - ($media * 0.0740 ));
								echo "<td class= centralizar> -7,40 % </td>";
								echo "<td class= centralizar>". formatarDinheiro(($media - ($media * 0.0740 )))."</td>";
							}	
							if($estoqueFisico >= 0 && $mediaMensal[$codigoProduto]  >= 1 && $coberturaEstoque == 5){	
								//echo "Valor de -8,70 %"."</br>";
								$novoValor = ($media - ($media * 0.0870 ));
								echo "<td class= centralizar> -8,70 % </td>";
								echo "<td class= centralizar>". formatarDinheiro(($media - ($media * 0.0870 )))."</td>";
							}	
							if($estoqueFisico >= 0 && $mediaMensal[$codigoProduto]  >= 1 && $coberturaEstoque >= 6){	
								//echo "Valor de -10,00 %"."</br>";
								$novoValor = ($media - ($media * 0.10 ));
								echo "<td class= centralizar> -10,00 % </td>";
								echo "<td class= centralizar>". formatarDinheiro(($media - ($media * 0.10 )))."</td>";
							}	
							/*if($estoqueFisico >= 0 && $mediaMensal[$codigoProduto]  >= 1 && $coberturaEstoque >= 7){	
								//echo "Valor de -15,00 %"."</br>";
								$novoValor = ($valorProduto - ($valorProduto * 0.15 ));
								echo "<td class= centralizar>". ($valorProduto - ($valorProduto * 0.15 ))."</td>";
							}*/		
								
						}else{
							//echo "não entrou 3";
						}
						echo "<td id=icms_$id_input class= centralizar><input class=form-check-input type=checkbox  name=itens[] value=$idProduto$contagem=$novoValor id=$Contagem></td>";			
						
						
					}
					
					//echo "#-----------------------------------------------------------------------------------------------------------#"."</br>";
				} else {
					//echo "Produto não encontrado"."</br>";
					//echo "#-----------------------------------------------------------------------------------------------------------#"."</br>";
				}

			}

			?>
			<button type="submit" class='btn btn-outline-info btn-lg value-plus'>Enviar</button>
			</form>
            </div>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="sidebar/js/scripts.js"></script>
		<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
		<script>

		</script>
    </body>
</html>

<script>
function goBack() {
  window.history.back();
}
var tabela = document.getElementById("table");
var tabelaHTML = tabela.outerHTML;
console.log(tabelaHTML);
localStorage.setItem("tabela", tabelaHTML);
</script>

