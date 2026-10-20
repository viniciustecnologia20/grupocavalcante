<?
	session_start();
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
                        <button class="btn btn-primary" id="sidebarToggle"><i class="bi bi-list"></i></button>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        </div>
                    </div>
                </nav>
            <!--conteudo da pagina-->
			<div class="card shadow  rounded-top centralizar">
			<h5 class="card-header rounded-top ">Filtros</h5>
			
			<div class="row ">
			<div class="col-2">
			<div class="form-group">
			
			<form id="filtro" action="main.php" method="get" enctype="multipart/form-data">
			<input type="date" class="form-control" value="" name="data_inicial" id="data_inicial" placeholder="Data inicial">
			</div>
			
			<div class="form-group">
			<input type="date" class="form-control" value="" name="data_final" id="data_final" placeholder="Data final">
			</div>
			</div>
			</form>
			<!--<div class="col-2">
			 <form id="excel" action="prog_novo.php" method="POST" enctype="multipart/form-data">
			<div class="custom-file centralizar">
			<label class="input-group-text centralizar">Importe Excel</label>
			<input type="file" name="XLS" id="XLS" accept=".xls">
			</div>
			</div>
			</div>--->
			
			<button id='botaoEnviar' form="filtro" class=' botaoEnviar btn btn-outline-info btn-lg value-plus'>Aplicar filtros</button>
			
			</div>

	<?php
			
	function converteData($data){
		$dia = substr($data, 8);
		$mes = substr($data, 5, 2);
		$ano = substr($data, 0, 4);
		$data = $dia.'/'.$mes.'/'.$ano;
		return $data;
	}
	
	function obterDataDoisMesesAtras($data) {
    // Converter a data para um timestamp
    $timestamp = strtotime($data);
    
    // Subtrair dois meses em segundos (60 segundos * 60 minutos * 24 horas * 60 dias)
    $doisMesesAtras = $timestamp - (60 * 60 * 24 * 60);
    
    // Formatar a nova data como 'Y-m-d'
    $dataDoisMesesAtras = date('Y-m-d', $doisMesesAtras);
    
    return $dataDoisMesesAtras;
}
	
	$url = 'https://api.tiny.com.br/api2/notas.fiscais.pesquisa.php';
	$token = 'a0a347b79bd6093d9ae89ef412e907380a85aa44';
	$tipoNota  = 'E';
	$situacao  = "8" ;
	if (empty($_GET)){
		$dataAtual = date('Y-m-d');
		$dataFinal = converteData($dataAtual);
		$dataDoisMesesAtras = obterDataDoisMesesAtras($dataAtual);
		$dataInicial = converteData($dataDoisMesesAtras);
	}else{
		$dataInicial = $_GET['data_inicial'];
		$dataInicial = converteData($dataInicial);
		$dataFinal = $_GET['data_final'];
		$dataFinal = converteData($dataFinal);
	}
	//$pagina = 2;
	$data = "token=$token&tipoNota=$tipoNota&situacao=$situacao&dataInicial=$dataInicial&dataFinal=$dataFinal&formato=JSON";
	
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
	
		$retorno = enviarREST($url, $data);
		$content = json_decode($retorno);
		
		$content->retorno->notas_fiscais;
		//echo"<pre>";
		//print_r($content->retorno);
		//echo"</pre>";
		?>
		<table id='table' class="table table-sm table-striped table-bordered table-hover ">
			<thead class="table-secondary table-striped centralizar ">
			<tr>
			<th scope="col">#</th>
			<th scope="col">ID</th>
			<th scope="col">Numero</th>
			<th scope="col">Data emissão</th>
			<th scope="col">Nome</th>
			<th scope="col">Valor</th>
			<th scope="col"></th>
			</tr>
			</thead>
			<tbody>
			
		<?
		$contador = 1;
		foreach($content->retorno->notas_fiscais as $index => $value){
	
			$nome = $value->nota_fiscal->nome. "</br>";
			$numeroNFE = $value->nota_fiscal->numero. "</br>";
			$idNFE = $value->nota_fiscal->id;
			$dataEmissao = $value->nota_fiscal->data_emissao . "</br>";
			$valorNFE = $value->nota_fiscal->valor . "</br>";
			echo "<tr id=linha_$contador>";
			
			echo "<td class= centralizar>$contador</td>";
			echo "<td class= centralizar>$idNFE</td>";
			echo "<td class= centralizar>$numeroNFE</td>";
			echo "<td class= centralizar>$dataEmissao</td>";
			echo "<td class= centralizar>$nome</td>";
			echo "<td class= centralizar>$valorNFE</td>";
			
			//echo "<td class= centralizar><a href=prog_novo.php?idNFE=$idNFE Selecionar  </a> </td>";
			//echo "<input type=hidden name=idNFE[$index] id=idNFE[$index] value=$idNFE </input>";
			
			echo"<td class=centralizar><a href=prog_novo.php?idNFE=$idNFE> Selecionar </a> </td>";
			//echo "</form>";
			echo"</tr>";
			
			
		$contador++;
		}
	
	
	
	?>
		</tbody>
		</table>
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