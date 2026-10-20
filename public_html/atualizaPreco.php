<?php
	
	
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

function atualizaPreco($arrayNovosPrecos){
	$precos = $arrayNovosPrecos ;
	$token = "a0a347b79bd6093d9ae89ef412e907380a85aa44";
	$url = "https://api.tiny.com.br/api2/produto.atualizar.precos.php?token={$token}";
	$data = $precos;
	
	$retorno = enviarREST($url, $data);
	return	$content = json_decode($retorno); 
}

function obterProduto($idProduto){
	$url = 'https://api.tiny.com.br/api2/produto.obter.php';
	$token = 'a0a347b79bd6093d9ae89ef412e907380a85aa44';
	$id = $idProduto;
	$formato = 'JSON';
	$data = "token=$token&id=$id&formato=$formato";
	
	$retorno = enviarREST($url, $data);
	return	$content = json_decode($retorno);
}

function obterEstoqueProduto($idProduto){
	$url = 'https://api.tiny.com.br/api2/produto.obter.estoque.php';
	$token = 'a0a347b79bd6093d9ae89ef412e907380a85aa44';
	$id= $idProduto;
	$formato = 'JSON';
	$data = "token=$token&id=$id&formato=$formato";
	
	$retorno = enviarREST($url, $data);
	$content = json_decode($retorno);				
	return $content;
}


	
$itensSelecionados = $_POST['itens'];

?>
<!-- Inclua a biblioteca TableExport via CDN -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/TableExport/5.2.0/js/tableexport.min.js"></script>
<!-- Inclua a biblioteca js-xlsx via CDN -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/js-xlsx/0.18.13/xlsx.full.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.0/xlsx.full.min.js"></script>


<button onclick="goBack()" class=' btn btn-outline-info value-plus'>voltar</button>
<button onclick="atualizarPagina()" class='btn btn-outline-info value-plus'>Reverter alterações</button>
<div id="tabela_destino">
        <!-- A tabela recebida será inserida aqui -->
</div>
<button onclick="filtrarTabela()"  class=' btn btn-outline-info value-plus'>Filtrar somente alteradas</button>
<button onclick="exportarParaExcel()"class='btn btn-outline-info value-plus'>Exportar para Excel</button>
<!-- <div class="table_fixed_box">
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
		</tr>
		</thead>
		<tbody>-->
<?
$Contagem = 1;
$codigoProdutoArray = array();
foreach ($itensSelecionados as $item) {
	//echo $item. "</br>";
	//$codigoProduto = obterProduto($item);
	list($idProduto, $valor) = explode('=', $item);
	$Produto = obterProduto($idProduto);
	$valorProduto = $Produto->retorno->produto->preco;
	$codigoProduto = $Produto->retorno->produto->codigo;
	$descricao = $Produto->retorno->produto->nome;
	$estoqueFisico = obterEstoqueProduto($idProduto);//function
	$estoqueFisico = $estoqueFisico->retorno->produto->saldo;
	//echo $estoqueFisico . "</br>";
	$valorProduto = round($valorProduto,4);
	$valor = round($valor,4);
	$codigoProdutoArray[] = $codigoProduto;
	
	//echo "Preço atual ".$valorProduto."</br>";
	//echo "Preço Novo  ".$valor."</br>";
	//echo "<tr>";
	//echo "<td class= centralizar>$Contagem</td>";
	//echo "<td class= centralizar>$codigoProduto</td>";
	//echo "<td class= centralizar>$descricao</td>";
	//echo "<td class= centralizar>$estoqueFisico</td>";




	$dados = array(
		"precos" => array(
			array(
				"id" => $idProduto,
				"preco" => $valorProduto,
				"preco_promocional" => $valor
			)
		)
	);
	//$dados = array(
	//	"precos" => array(
	//		array(
	//			"id" => "887207953",
	//			"preco" => "22,23",
	//			"preco_promocional" => "66,55"
	//		)
	//	)
	//);
	$json = json_encode($dados);
	//$result = atualizaPreco($json);
	$status = $result->retorno->status;
	if($status != "OK"){
		//echo "<pre>";
		//print_r('Resultados: ' . $result);
		//echo "</pre>";
		$registros = $result->retorno->registros;
		foreach($registros as $itens){
			$erros = $itens->registro->erros;
			var_dump($erros);
	
		}
	}
	

}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Modal com Bootstrap</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<!-- Modal -->
<div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Cabeçalho do modal -->
      <div class="modal-header">
        <h4 class="modal-title">OK</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Corpo do modal -->
      <div class="modal-body">
        <p>Preços alterados com sucesso!</p>
      </div>

      <!-- Rodapé do modal -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
      </div>

    </div>
  </div>
</div>

</body>
</html>
<script>
var status = '<? echo $status ?>';
if(status == "OK"){
	$(document).ready(function(){
		$("#myModal").modal('show');
	});
}
var tabelaHTML = localStorage.getItem("tabela");
var tabelaDestino = document.getElementById("tabela_destino");
tabelaDestino.innerHTML = tabelaHTML;
var coluna = document.querySelectorAll("#tabela_destino tr td:last-child");
for (var i = 0; i < coluna.length; i++) {
	coluna[i].parentNode.removeChild(coluna[i]);
}

function filtrarTabela() {
            // Obtém todas as linhas da tabela
            var linhas = tabelaDestino.getElementsByTagName("tr");

            // Obtém o valor mínimo para a idade
            var alterados = <?php echo json_encode($codigoProdutoArray) ?>;
			console.log(alterados);

            // Percorre todas as linhas e mostra apenas aquelas em que a idade é maior ou igual a idadeMinima
			for (var i = 1; i < linhas.length; i++) { // Começa do 1 para pular o cabeçalho da tabela
				var colunas = linhas[i].getElementsByTagName("td");
				var valorColuna = colunas[1].innerText; // Supondo que a coluna desejada esteja na segunda coluna (índice 1)
	
				// Verifica se o valor da coluna está presente no array 'alterados'
				if (alterados.includes(valorColuna)) {
					linhas[i].style.display = "table-row";
				} else {
					linhas[i].style.display = "none";
				}
			}
        }
		
function goBack() {
  window.history.back();
}
function atualizarPagina() {
	// Use location.reload() para recarregar a página usando o cache do navegador
	// Use location.reload(true) para forçar o recarregamento, ignorando o cache
	location.reload();
}
// Função para exportar a tabela para Excel
function exportarParaExcel() {
        // Obtenha a tabela que você deseja exportar
        var tabela = document.getElementById('table');

        // Crie uma nova planilha SheetJS
        var workbook = XLSX.utils.table_to_book(tabela);

        // Salve a planilha em formato XLSX
        var wbout = XLSX.write(workbook, { bookType: 'xlsx', type: 'array' });

        // Crie um arquivo Blob com os dados XLSX
        var blob = new Blob([wbout], { type: 'application/octet-stream' });

        // Crie um link para fazer o download do arquivo
        var url = window.URL.createObjectURL(blob);
        var a = document.createElement('a');
        a.href = url;
        a.download = 'tabela_exportada.xlsx';

        // Dispare o clique no link para iniciar o download
        a.click();
    }
//$('#myModal').on('hidden.bs.modal', function () {
//  window.location.href = 'https://grupocavalcante.net.br/main.php'; // Substitua pelo link para onde deseja redirecionar
//});
</script>
        