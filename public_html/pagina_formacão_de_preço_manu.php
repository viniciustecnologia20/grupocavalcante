<?php
require_once 'token.php';
session_start();
var_dump($_SESSION['UsuarioNivel']);
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
        <link href="iconic/font/css/open-iconic-bootstrap.css" rel="stylesheet">
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
          position:absolute;
          right:0px;
          width:150px;
        }
        
      </style>
    </head>
    <body>
        <div class="d-flex " id="wrapper">
            <!-- Sidebar-->
<?php include __DIR__ . '/includes/menubar.php'; ?>
            <!--conteudo da pagina-->
            <!--card com o conteudo-->
            <div class="card shadow p-3 mb-5 border border-dark rounded-top">
                <h5 class="card-header rounded-top ">Markup <a type="submit" class="btn  centralizar-esquerda" href="pagina_config.php" ><i class="bi bi-gear-fill"></i> Configuração</a></h5>
                <div class="card-body">
                  <!--primeira opção do card-->
                  <div class=" col-md-6 centralizar">
                    <form id="form4" action="formacao_de_preco_proce.php" method="post" enctype="multipart/form-data">
                      <h5 class="text-md-center">Para fazer a formação de preço coloque o arquivo abaixo </h5>
                      <br>
                      <div class="custom-file centralizar">
                        <i class="bi bi-file-earmark-x-fill" style="font-size: 2rem;"></i>
                        <input type="file" name="XML" id="XMl" accept=".xml"><br><!--O ID é mecanismo de envio para o action-->
                        <ul class="list-group">
                          <li class="list-group-item d-flex justify-content-between align-items-center">
                            Importe o arquivo XML
                            <span class="badge badge-primary badge-pill">*</span>
                          </li>
                        </ul>    
                    </form>
                    <button type="submit" class="btn btn-outline-info btn-lg" form="form4">Consultar</button>
                    </div>
                  </div>
                </div>
			<div class="card shadow  rounded-top centralizar" hidden>
			<h5 class="card-header rounded-top ">Promocional</h5>
			
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
    $doisMesesAtras = $timestamp - (60 * 60 * 24 * 30);
    
    // Formatar a nova data como 'Y-m-d'
    $dataDoisMesesAtras = date('Y-m-d', $doisMesesAtras);
    
    return $dataDoisMesesAtras;
}
	
	$connect = mysqli_connect('banco_gp_1.mysql.dbaas.com.br','banco_gp_1','tecnologia20');
	$db = mysqli_select_db($connect,'banco_gp_1');
	$query_select = "SELECT * FROM `ChaveAPI`";
	$select = mysqli_query($connect,$query_select)or die(mysqli_error($connect));
	$array = mysqli_fetch_array($select);
	$chave_array = $array['chaveAPI'];
	
	
	
	$url = 'https://api.tiny.com.br/api2/notas.fiscais.pesquisa.php';
	$token = $chave_array;
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
            </div>
			
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="sidebar/js/scripts.js"></script>
    </body>
</html>




















