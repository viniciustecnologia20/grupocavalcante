<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="sidebar/assets/favicon.ico" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="sidebar/css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="css/style.css">
    
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
      }
      
    </style>
	<script>

	</script>

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
<a class="list-group-item list-group-item-action list-group-item-light p-3" href="pagina_formacão_de_preço_manu.html"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-coin" viewBox="0 0 16 16">
<path d="M5.5 9.511c.076.954.83 1.697 2.182 1.785V12h.6v-.709c1.4-.098 2.218-.846 2.218-1.932 0-.987-.626-1.496-1.745-1.76l-.473-.112V5.57c.6.068.982.396 1.074.85h1.052c-.076-.919-.864-1.638-2.126-1.716V4h-.6v.719c-1.195.117-2.01.836-2.01 1.853 0 .9.606 1.472 1.613 1.707l.397.098v2.034c-.615-.093-1.022-.43-1.114-.9H5.5zm2.177-2.166c-.59-.137-.91-.416-.91-.836 0-.47.345-.822.915-.925v1.76h-.005zm.692 1.193c.717.166 1.048.435 1.048.91 0 .542-.412.914-1.135.982V8.518l.087.02z"/>
<path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
<path fill-rule="evenodd" d="M8 13.5a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zm0 .5A6 6 0 1 0 8 2a6 6 0 0 0 0 12z"/>
</svg>Formação de Preço</a>
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
        <div class="container-fluid ">
          <div class="card shadow p-3 mb-5 rounded-top centralizar">
            <h5 class="card-header rounded-top ">Tempo de Estoque x Desconto Promoção</h5>
            <div id="teste" class="card-body">
			<div class="row ">
			<div class="col-3">
			<div class="form-group">
			<form action="tempo_estoque.php" method="get" enctype="multipart/form-data" id="form_geral_1">
			<input type="text" class="form-control" value="" name="marca"  id="marca" placeholder="Pesquise pela nome ou SKU">
			</form>
			</div>
			</div>
			</div>
			<button id='form_geral_1' onclick="myFunction(this)" class=' botaoEnviar btn btn-outline-info btn-lg value-plus'>Listar produtos</button>
			</div>
			</div>

          </div>
		            <hr>
          <div class="table-responsive border-dark rounded">
            <table id='table' class="table table-striped table-bordered table-hover">
              <thead class="thead-dark table-striped centralizar ">
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">descrição</th>
                  <th scope="col">SKU</th>
                  <th scope="col">Preço</th>
                  <th scope="col">Novo Preço</th>
                </tr>
              </thead>
              <tbody>
<?php
$contagem = 1;

$url = 'https://api.tiny.com.br/api2/produto.obter.php';
$token = '145839c2fd92a909f9e6839a39921cafd5d94950';
$id = '717810282';
$formato = 'JSON';
$data = "token=$token&id=$id&formato=$formato";

$url = 'https://api.tiny.com.br/api2/produtos.pesquisa.php';
$token = '145839c2fd92a909f9e6839a39921cafd5d94950';
$pesquisa = 'Modulo Amplificador Taramps 3000';
$data = "token=$token&pesquisa=$pesquisa&formato=JSON";

$retorno = enviarREST($url, $data);
$content = json_decode($retorno);
foreach ($content->retorno->produtos as $produto){
	echo "<tr>";
	$nome = $produto->produto->nome ."</br>";
	$SKU = $produto->produto->codigo ."</br>";
	$preço = $produto->produto->preco ."</br>";
	
	echo "<td class= centralizar>$contagem</td>";
	echo "<td class= centralizar>$nome</td>";
	echo "<td class= centralizar>$SKU</td>";
	echo "<td class= centralizar>$preço</td>";
	echo "</tr>";
}
//var_dump($produto);
echo "<pre>";
//print_r($produto->produto->preco);
echo "</pre>";      

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
?>
</tbody>
</table>


<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="sidebar/js/scripts.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>  
<script type="text/javascript" src="jquery.js"></script>
<!-- Funcionalidades da página -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script  src =" //ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js " ></script> 
<script  src ="//cdn.rawgit.com/rainabba/jquery-table2excel/1.1.0/dist/jquery.table2excel.min.js" ></script>

<script>
//Função anti double click
function myFunction(e) {

//Desabilita o botao
e.disabled = true;

//Habilita novamente após dois segundos (2000) ms
setTimeout(function(){
toggleDisabled(e)
},2000);
}

function toggleDisabled(elem){
elem.disabled = !elem.disabled;
}


//Funçao formatar dinheiro
//retornará 1234.53
function formatNumber(value) {
	value = value.replace('.','');
	value = value.replace(',','');
	value = convertToFloatNumber(value);
	return value.formatMoney(4, ',', '.');
}

 //transforma a entrada em número float
 var convertToFloatNumber = function(value) {
	 value = value.toString();
	  if (value.indexOf('.') !== -1 && value.indexOf(',') !== -1) {
		  if (value.indexOf('.') <  value.indexOf(',')) {
			 //inglês
			 return parseFloat(value.replace(/,/gi,''));
		  } else {
			//português
			 return parseFloat(value.replace(/./gi,'').replace(/,/gi,'.'));
		  }      
	  } else {
		 return parseFloat(value);
	  }
   }

//prototype para formatar a saída  
Number.prototype.formatMoney = function (c, d, t) {
	var n = this,
		c = isNaN(c = Math.abs(c)) ? 2 : c,
		d = d == undefined ? "." : d,
		t = t == undefined ? "," : t,
		s = n < 0 ? "-" : "",
		i = parseInt(n = Math.abs(+n || 0).toFixed(c)) + "",
		j = (j = i.length) > 3 ? j % 3 : 0;
	return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
};


//função de download
var sufixo = "(FP).xlsx"
var titulo_download = "<?php echo $titulo_download ?>";
function Export() {
	$("#table").table2excel({
	  filename: titulo_download + sufixo
	});
}

$( document ).ready(function() {
	
//$('td:nth-child(16),th:nth-child(16)').hide();
	
	
$('#icms_0').change(function () {

$('input[id^="icms_"]').not(this).prop('checked', this.checked);
	
});

$('#pis_0').change(function () {

$('input[id^="pis_"]').not(this).prop('checked', this.checked);
	
});

$('#cofins_0').change(function () {

$('input[id^="cofins_"]').not(this).prop('checked', this.checked);
	
});

$('#markup').ready(function () {
var textoDigitado = '<?php echo $markup_array ?>' ;
$('input[id^="indvidual_markup_"]').val(textoDigitado);

});

$('#markup').change(function () {
var textoDigitado = $(this).val(); 
$('input[id^="indvidual_markup_"]').val(textoDigitado);

});

$('#bonificacao').ready(function () {

var textoDigitado = 0;	
$('input[id^="indvidual_bonificacao_"]').val(textoDigitado);
	
});

$('#bonificacao').change(function () {

var textoDigitado = $(this).val();	
$('input[id^="indvidual_bonificacao_"]').val(textoDigitado);
	
});

	$("#botaoEnviar").click(function(){
		
		$('input[type=bonificacao]').each(function(){
			
		//$('td:nth-child(16),th:nth-child(16)').show();
		
		if(this['value'] == "0"){
		//console.log('zerado');	
		}else{
		var indentifica_linha_boni = ($(this).attr("id"));
		var valor_input_boni = document.getElementById(indentifica_linha_boni).value;
		
		var valor_input_boni = valor_input_boni.replace(",", ".");
		var valor_input_boni_float = parseFloat(valor_input_boni);
		var valor_input_boni_float = (valor_input_boni_float /100)
		
		//var preco_venda = document.getElementById("markup_" + ID).innerHTML;
		
		
		
		var ID_temp  = indentifica_linha_boni.split('_');
		var	ID = ID_temp[2];	
		
		var custo_finan = document.getElementById("custo_financeiro_" + ID).innerHTML;
		// var custo_finan = formatNumber(custo_finan);
		// console.log("função ". custo_finan);
		var custo_finan = custo_finan.replace(".", "");
		var custo_finan = custo_finan.replace(",", ".");
		var custo_finan = parseFloat(custo_finan);
		var bonificacao_mostrar = (valor_input_boni_float * custo_finan);
		var custo_finan_bonificacao = (custo_finan - bonificacao_mostrar);
		var bonificacao_mostrar = bonificacao_mostrar.toFixed(4);
		document.getElementById("bonifi_" + ID).innerHTML = bonificacao_mostrar.replace(".", ",");
		var custo_finan_bonificacao = custo_finan_bonificacao.toFixed(4);
		custo_financeiro_bonificacao = custo_finan_bonificacao;
		document.getElementById("custo_bonifi_" + ID).innerHTML = custo_finan_bonificacao.replace(".", ",");
		document.getElementById(ID).innerHTML = custo_finan_bonificacao.replace(".", ",");
		var quantidade = document.getElementById("quantidade_" + ID).innerHTML;
		var bonificacao_total = bonificacao_mostrar * quantidade;
		var bonificacao_total = bonificacao_total.toFixed(4);
		document.getElementById("bonifi_total_" + ID).innerHTML = bonificacao_total.replace(".", ",");
		//$('td:nth-child(16),th:nth-child(16)').hide();
		};
	});
		
	

	  $("input:checked").each(function(){
		
		
		var indentifica_linha = ($(this).attr("id"));
		
		if(indentifica_linha == "pis_0"){
			
			
		}else if(indentifica_linha == "cofins_0"){
			

		}else if(indentifica_linha == "icms_0"){
			
		}else{
		var teste = 1;
		
		var celula_icms = document.getElementById(indentifica_linha).innerHTML;
		var palavra = celula_icms.split(' ');
		
		var ID_temp = palavra[5].split('_');
		var ID = ID_temp[1].replace('">','');
		var ID = ID.replace('"','');
		
		var palavra_temp = palavra[0];
		var palavra_temp_2 = palavra_temp.replace(",", ".");
		var palavra_float = parseFloat(palavra_temp_2);
		
		var custo_financeiro_bonificacao = custo_financeiro_bonificacao;//inicial
		if (custo_financeiro_bonificacao == null){
			var custo_financeiro_bonificacao = document.getElementById("custo_bonifi_" + ID).innerHTML;
			console.log(custo_financeiro_bonificacao[1]);
			if(custo_financeiro_bonificacao[1] == "." ){
			var custo_financeiro_bonificacao = custo_financeiro_bonificacao.replace(".", "");	
			}
			//var custo_financeiro_bonificacao = custo_financeiro_bonificacao.replace(".", "");
			var custo_financeiro_bonificacao = custo_financeiro_bonificacao.replace(",", ".");
		}
		var custo_contabil = document.getElementById(ID).innerHTML;//final
		
		if(custo_contabil[1] == "." ){
			var custo_contabil = custo_contabil.replace(".", "");
			var custo_contabil = custo_contabil.replace(",", ".");
		}else{
			var custo_contabil = custo_contabil.replace(",", ".");
		}
		
		var custo_contabil = parseFloat(custo_contabil);
		//var custo_financeiro_bonificacao = parseFloat(custo_financeiro_bonificacao);
		
		if (custo_contabil < custo_financeiro_bonificacao ){
			custo_financeiro_bonificacao = custo_contabil;
			//custo_financeiro_bonificacao = custo_contabil.toString();
			console.log('entrou!!');
			
			if(custo_financeiro_bonificacao[1] == "." ){
			var custo_financeiro_bonificacao = custo_financeiro_bonificacao.replace(".", "");
			var custo_financeiro_bonificacao = custo_financeiro_bonificacao.replace(",", ".");							
			}
			
		}
		var custo_financeiro_bonificacao = custo_financeiro_bonificacao.toString();
		var temp = custo_financeiro_bonificacao.replace(",", ".");
		var custo_contabil_float = parseFloat(temp);
		var custo_contabil_final = (custo_contabil_float -  palavra_float).toFixed(4);
		//console.log(custo_contabil_final);
		var custo_contabil_str = custo_contabil_final.toString();
		var custo_contabil_final_str = custo_contabil_str.replace(".", ",");
		document.getElementById(ID).innerHTML = custo_contabil_final_str;
		
		}
		
	  });	
		
		$('input[type=markup]').each(function(){
			if(this['value'] == "0"){
			//console.log('zerado');	
			}else{
			var indentifica_linha_mkp = ($(this).attr("id"));
			var valor_input = document.getElementById(indentifica_linha_mkp).value;
			var valor_input = valor_input.replace(",", ".");
			var valor_input_float = parseFloat(valor_input);
			
			//var preco_venda = document.getElementById("markup_" + ID).innerHTML;
			
			
			
			var ID_temp  = indentifica_linha_mkp.split('_');
			var	ID = ID_temp[2];	
			
			var custo_bonifi = document.getElementById("custo_bonifi_" + ID).innerHTML;
			var custo_bonifi = custo_bonifi.replace(",", ".");
			if(custo_bonifi[1] == "." ){
				var custo_bonifi = custo_bonifi.replace(".", "");
				var custo_bonifi = custo_bonifi.replace(",", ".");	
			}
			var custo_bonifi_float = parseFloat(custo_bonifi);
			
			var cust_contabil = document.getElementById(ID).innerHTML;
			var cust_contabil = cust_contabil.replace(",", ".");
			var cust_contabil_float = parseFloat(cust_contabil);

			
			var MKP_contabil = (valor_input_float * cust_contabil_float); //MKP_contabil = preço de venda
			var MKP_contabil = MKP_contabil.toFixed(4) ;
			var calculo = (MKP_contabil /custo_bonifi_float).toFixed(4) ;
			
			document.getElementById("markup_" + ID).innerHTML = MKP_contabil.replace(".", ",");
			var calculo = calculo.replace(".", ",");
			document.getElementById("dif_mkpcontabil_" + ID).innerHTML = calculo; 
			
			//console.log(typeof(preco_venda));
			//console.log(preco_venda);
			};
		});
				  
	});
	$("#botaoLimpar").click(function(){
		location.reload();
	});
	
})
</script>

</body>
</html>
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
























































































































































































































































































































































































































































































































































































































































































































































































































































































