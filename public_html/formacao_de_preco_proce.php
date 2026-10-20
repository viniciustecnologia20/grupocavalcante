<?php
	require_once 'token.php';
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

		

		<!--<link href="iconic/font/css/open-iconic-bootstrap.css" rel="stylesheet">-->

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

		

		.barra-lateral {

		background: #1926e0;

		}

		

		.background {

		background: #ffffff;

		}

		

		.centralizar {

		text-align: center;

		margin: auto;

		}

		

		.centralizar-esquerda {

		text-align: left;

		}

		

		.table_fixed_box{

		overflow: auto; 

		max-height: 70vh;

		}

		

		.table_fixed_box thead th {

		position: sticky !important; 

		top: 0 !important; 

		z-index: 1;

		}

		

		

		</style>

		<script>

		

		</script>

		

		</head>

		

		<body>

		<div class="d-flex " id="wrapper">

		<!-- Sidebar-->

		<div class="border-end bg-white" id="sidebar-wrapper">

		<div class="sidebar-heading border-bottom bg-light">

		<div class="d-flex align-items-center">

			<a href="perfil_usuario.php" class="text-decoration-none text-dark">

      			<i class="bi bi-person me-2"></i>

      			<span id="userName" class="me-3"></span>

			</a>

		</div>

		</div>

		<script>

                // Obtém o valor do usuário do localStorage

                var usuario = localStorage.getItem("usuario");

              

                // Define o conteúdo do elemento span com o nome do usuário

                document.getElementById("userName").innerText = usuario;

              </script>

		<div class="list-group list-group-flush">

        <a class="list-group-item list-group-item-action list-group-item-light p-3" href="home.html"><i class="bi bi-house-fill"></i> Home</a>

        <a class="list-group-item list-group-item-action list-group-item-light p-3" href="pagina_consulta.html"><i class="bi bi-receipt-cutoff"></i> Conferencia de quantidade NFe</a>

        <a class="list-group-item list-group-item-action list-group-item-light p-3" href="pagina_conferencia.html"><i class="bi bi-ui-checks"></i> Conferencia Cadastral</a>

        <a class="list-group-item list-group-item-action list-group-item-light p-3" href="pagina_formacão_de_preço_manu.php"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-coin" viewBox="0 0 16 16">

		<path d="M5.5 9.511c.076.954.83 1.697 2.182 1.785V12h.6v-.709c1.4-.098 2.218-.846 2.218-1.932 0-.987-.626-1.496-1.745-1.76l-.473-.112V5.57c.6.068.982.396 1.074.85h1.052c-.076-.919-.864-1.638-2.126-1.716V4h-.6v.719c-1.195.117-2.01.836-2.01 1.853 0 .9.606 1.472 1.613 1.707l.397.098v2.034c-.615-.093-1.022-.43-1.114-.9H5.5zm2.177-2.166c-.59-.137-.91-.416-.91-.836 0-.47.345-.822.915-.925v1.76h-.005zm.692 1.193c.717.166 1.048.435 1.048.91 0 .542-.412.914-1.135.982V8.518l.087.02z" />

		<path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />

		<path fill-rule="evenodd" d="M8 13.5a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zm0 .5A6 6 0 1 0 8 2a6 6 0 0 0 0 12z" />

		</svg>Formação de Preço</a>

		</div>

		</div>

		<!-- Page content wrapper-->

		<div class="" id="page-content-wrapper">

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

		<?php

		$connect = mysqli_connect('banco_gp_1.mysql.dbaas.com.br', 'banco_gp_1', 'tecnologia20');

		$db = mysqli_select_db($connect, 'banco_gp_1');



		$query_select = "SELECT * FROM `markup_faixa_custo`";

		$select = mysqli_query($connect, $query_select) or die(mysqli_error($connect));

		if ($select) {

			// Array para armazenar os dados da tabela

			$arrayMargemLucro = array();

		

			// Loop através dos resultados da consulta

			while ($linha = mysqli_fetch_assoc($select)) {

				// Adicionar cada linha da tabela ao array de dados

				$arrayMargemLucro[] = $linha;

			}

		

			// Liberar a memória do resultado

			mysqli_free_result($resultado);

			$margem_lucro_correspondente = array();



			//echo "<pre>";

			//print_r($arrayMargemLucro);

			//echo "</pre>";



		}else{			

			// Se a consulta falhar, exibir um erro

			echo "Erro ao selecionar dados: " . mysqli_error($connect);

		}

		



		if ($_SESSION['UsuarioNome'] == 'GP@SP'){



		$query_select = "SELECT * FROM `Markup` WHERE `ID` = 1";

		$select = mysqli_query($connect, $query_select) or die(mysqli_error($connect));

		$array = mysqli_fetch_array($select);



		}else{

			$query_select = "SELECT * FROM `MarkupSC` WHERE `ID` = 1";

			$select = mysqli_query($connect, $query_select) or die(mysqli_error($connect));

			$array = mysqli_fetch_array($select);

		}

		$markup_array = $array;

		$markup_ICMS    =  str_replace('.', ',', $markup_array['camp_val_1']);

		$markup_PIS    =  str_replace('.', ',', $markup_array['camp_val_2']);

		$markup_COFINS  =  str_replace('.', ',', $markup_array['camp_val_3']);

		$markup_Margem   =  str_replace('.', ',', $markup_array['margem']);

		$markup_CTV    =  str_replace('.', ',', $markup_array['ctv']);

		$markup_MKM   =  str_replace('.', ',', $markup_array['mkm']);

		//var_dump($markup_Margem);

		?>

		

        <div class="card shadow  rounded-top centralizar">

		<h5 class="card-header rounded-top ">Valores Gerais</h5>



		<div class="row ">

		<div class="col-2">

		<div class="form-check form-switch">

		<input class='form-check-input' type='checkbox' name='icms_0' id='icms_0' disabled="disabled">

		<label class="form-check-label" for="flexSwitchCheckDefault">ICMS</label>

		</div>

		<div class="form-check form-switch">

		<input class='form-check-input' type='checkbox' name='pis_0' id='pis_0' disabled="disabled">

		<label class="form-check-label" for="flexSwitchCheckDefault">PIS</label>

		</div>

		<div class="form-check form-switch">

		<input class='form-check-input' type='checkbox' name='cofins_0' id='cofins_0' disabled="disabled">

		<label class="form-check-label" for="flexSwitchCheckDefault">COFINS</label>

		</div>

		</div>

		<br>

		<div class="col-2">

		<div class="form-group">

		<input type="text" class="form-control" value="<?php echo $markup_MKM ?>" name="markup" id="markup" placeholder="Markup de Venda" readonly="">

		<div class="form-group">

		<input type="text" class="form-control" value="" name="bonificacao" id="bonificacao" placeholder="% da Bonificação">

		</div>

		</div>

		</div>

		</div>

		

        

		

		<!--BACK END-->

		<?php

		#------------------------------------------------------------------------------------------

		$myfile2 = $_FILES['XML']['tmp_name'];

		$xml = simplexml_load_file($myfile2);

		$Contagem = 1;

		#Recebe o XML e le ele

		#---------------------------------------------------------------------------------------------

		if ($xml == null) {

        //print_r($_SESSION['xml_copia']);

        $myfile2 = $_SESSION['xml_copia'];

        $xml = simplexml_load_string($myfile2);

        $Contagem = 1;

		} else {

        #Recebe o XML e le ele

        #------------------------------------------------------------------------------------------

        $xml_copia = file_get_contents($_FILES['XML']['tmp_name']);

        $_SESSION['xml_copia'] = $xml_copia;

        #------------------------------------------------------------------------------------------

		};

		//var_dump($xml);

		?>

		

		<div class="table_fixed_box">

        <table id='table' class="table table-sm table-striped table-bordered table-hover ">

		<thead class="table-secondary table-striped centralizar ">

		<tr>

		<th colspan="7"></th>

		<th scope="col" colspan="6">Impostos Dedutíveis</th>	

		<th colspan="13"></th>

		</tr>

		<tr>

            <th scope="col">#</th>

            <th scope="col">Descrição</th>

            <th scope="col"><abbr title='Código do Fabricante'>Fabricante</abbr></th>

            <th scope="col"><abbr title='Quantidade de Peças'>Peças</abbr></th>

            <th scope="col"><abbr title='Valor da Unidade'>Valor</abbr></th>

            <th scope="col">NCM</th>

            <th scope="col">Alíquota % Icms</th>

            <th scope="col"><abbr title='Situação tributaria do ICMS'>STICMS</abbr></th>

			<th scope="col"><abbr title='ICMS Unidade'>ICMS</abbr></th>

            <th scope="col"><abbr title='Situação tributaria do PIS'>STPIS</abbr></th>

			<th scope="col"><hr><abbr title='PIS Unidade'>PIS</abbr></th>

            <th scope="col"><abbr title='Situação tributaria do COFINS'>STCOFINS</abbr></th>

			<th scope="col"><abbr title='COFINS Unidade'>COFINS</abbr></th>

            <th scope="col"><abbr title='ICMS ST da Unidade'>ICMS ST</abbr></th>

            <th scope="col"><abbr title='IPI da Unidade'>IPI</abbr></th>

            <th scope="col">Adicional Frete R$</th>

            <th scope="col">Custo Financeiro</th>

            <th scope="col">Bonificação %</th>

			<th scope="col"><abbr title='Bonificação Unidade'>Bonificação R$ </abbr></th>

            <th scope="col">Bonificação Total</th>

            <th scope="col"><abbr title='Custo Financeiro - Bonificação'>C.Fin - Bonif.</abbr></th>

            <th scope="col">Custo Contábil</th>

			<th scope="col">Margem de lucro</th>

			<th scope="col">Markup</th>

            <th scope="col">Preço de Venda</th>

            <th scope="col"><abbr title='Fator do Preço de Venda / Custo Financeiro - Bonificação'>P. Venda / C. Fin</abbr></th>

		</tr>

		</thead>

		<tbody>

		<?php

		$connect = mysqli_connect('banco_gp_1.mysql.dbaas.com.br', 'banco_gp_1', 'tecnologia20');

		$db = mysqli_select_db($connect, 'banco_gp_1');

		if ($_SESSION['UsuarioNome'] == 'GP@SP'){

			$query_select = "SELECT * FROM `NCM_monofasicos` ORDER BY `ID` ASC";

			$select = mysqli_query($connect, $query_select) or die(mysqli_error($connect));	

		}else{

			$query_select = "SELECT * FROM `NCM_monofasicosSC` ORDER BY `ID` ASC";

			$select = mysqli_query($connect, $query_select) or die(mysqli_error($connect));	

		}

		

		

		while ($row = mysqli_fetch_array($select)) {

		$arrayNCM[] = $row["NCM"];

		}

		#------------------------------------------------------------------------------------------

		

		$teste = $xml->NFe->infNFe->emit;

		if ($teste == null) {

		$teste = $xml->nfeProc->NFe->infNFe->emit;

		}

		foreach ($teste as $titulo_arquivo) {

		$nome = $titulo_arquivo->xNome;

		}

		

		$teste = $xml->NFe->infNFe->ide;

		if ($teste == null) {

		$teste = $xml->nfeProc->NFe->infNFe->ide;

		}

		foreach ($teste as $titulo_arquivo) {

		$numero_nfe = $titulo_arquivo->nNF;

		}

		

		

		$titulo_download = $nome . " - " . $numero_nfe;

		$_SESSION['titulo_formação'] =  $titulo_download;

		#codigo para formar titulo

		#------------------------------------------------------------------------------------------

		$teste = $xml->NFe->infNFe->total;

		if ($teste == null) {

		$teste = $xml->nfeProc->NFe->infNFe->total;

		}

		foreach ($teste as $itens_2) {

		$vtotal = $itens_2->ICMSTot->vNF;

		$vtotal_frete = $itens_2->ICMSTot->vFrete;

		}

		$porcent_acressimo = $vtotal - $vtotal_frete;

		$porcent_acressimo = $vtotal_frete / $porcent_acressimo;

		$porcent_acressimo = round($porcent_acressimo, 8);

		$porcent_acressimo = ($porcent_acressimo * 100);

		//echo "% de acressimo: ".$porcent_acressimo."</br>";

		#------------------------------------------------------------------------------------------

		$array_tabela = array();

		$array_tabela2 = array();

		$id_input = 1;

		

		$teste = $xml->NFe->infNFe->total;

		if ($teste == null) {

		$teste = $xml->nfeProc->NFe->infNFe->total;

		}

		foreach ($teste as $totais) {

		$IPI_total = $totais->ICMSTot->vIPI;

		$frete_total = $totais->ICMSTot->vFrete;

		$valor_NF_total = $totais->ICMSTot->vNF;

		}
		
		$bonificacao = ($_GET['indvidual_bonificacao']);
		
		$markup = ($_GET['indvidual_markup']);

		$icms_array = ($_GET['icms']);

		$pis_array = ($_GET['pis']);

		$cofins_array = ($_GET['cofins']);

		$bonificacao = array_filter($bonificacao);

		$markup = array_filter($markup);

		$icms_array = array_filter($icms_array);

		$pis_array = array_filter($pis_array);

		$cofins_array = array_filter($cofins_array);

		foreach ($bonificacao as $bonificacao_pos_for) {

		}

		foreach ($markup as $markup_pos_for) {

		}

		foreach ($icms_array as $icms_for_array) {

		}

		foreach ($pis_array as $pis_for_array) {

		}

		foreach ($cofins_array as $cofins_for_array) {

		}

		

		$teste = $xml->NFe->infNFe->det;

		//echo "<pre>";
		//print_r($teste);
		//echo "</pre>";
		if ($teste == null) {

		$teste = $xml->nfeProc->NFe->infNFe->det;

		}

		

		function formatarCNPJ($cnpj) {

			// Remove caracteres não numéricos

			$cnpj = preg_replace('/\D/', '', $cnpj);

		

			// Adiciona a máscara

			$cnpjFormatado = substr($cnpj, 0, 2) . '.' . substr($cnpj, 2, 3) . '.' . substr($cnpj, 5, 3) . '/' . substr($cnpj, 8, 4) . '-' . substr($cnpj, 12);

		

			return $cnpjFormatado;

		}



		$CNPJ = $xml->NFe->infNFe->dest->CNPJ;

		$cnpjFormatado =formatarCNPJ($CNPJ);





		if ($_SESSION['UsuarioNome'] == 'GP@SP') {

			$CNPJ = $xml->NFe->infNFe->dest->CNPJ;

			

			if ($CNPJ != '33737452000100') {

				echo "<script>

            		alert('Nota Fiscal importada de Cnpj número $cnpjFormatado, é diferente do Cnpj desta Conta.');

            		window.location.href = 'pagina_formacão_de_preço_manu.php';

				</script>";

			}

		}

		if ($_SESSION['UsuarioNome'] == 'GP@SC') {

			$CNPJ = $xml->NFe->infNFe->dest->CNPJ;

			

			if ($CNPJ == '33737452000100') {

				echo "<script>

            		alert('Nota Fiscal importada de Cnpj número $cnpjFormatado, é diferente do Cnpj desta Conta.');

            		window.location.href = 'pagina_formacão_de_preço_manu.php';

				</script>";

			}

		}

		





		foreach ($teste as $itens) {

		

		$EAN = $itens->prod->cEAN;

		#------------------------------------------------------------------------------------------

		

		$cProd = $itens->prod->cProd;

		#------------------------------------------------------------------------------------------

		

		$descrição = $itens->prod->xProd;

		#------------------------------------------------------------------------------------------

		

		$valor_unitario = $itens->prod->vUnCom;

		$valor_unitario = floatval($valor_unitario);

		$valor_unitario = round($valor_unitario, 2);

		#------------------------------------------------------------------------------------------

		

		$NCM = $itens->prod->NCM;

		$NCM = substr_replace($NCM, '.', -2, -4);

		$NCM = substr_replace($NCM, '.', 4, -5);

		#NCM - XML

		#------------------------------------------------------------------------------------------

		

		$IPI = $itens->imposto->IPI->IPITrib->vIPI;

		$IPI = round($IPI, 4);

		#------------------------------------------------------------------------------------------

		

		$quantidade = $itens->prod->qCom;

		$quantidade = round($quantidade, 1);

		#------------------------------------------------------------------------------------------

		

		$IPI_unidade = $IPI / $quantidade;

		#------------------------------------------------------------------------------------------

		

		if($itens->imposto->ICMS->ICMS00->orig != null){#ICMS00

		$orig = $itens->imposto->ICMS->ICMS00->orig;

		$CST = $itens->imposto->ICMS->ICMS00->CST;

		$CST = (string)$CST . " - Tributada integralmente";

		$ICMS = $itens->imposto->ICMS->ICMS00->vICMS;

		$ICMS_str = "00 - Tributada integralmente";

		$ICMSST = $itens->imposto->ICMS->ICMS00->vICMSST;

		}elseif ($itens->imposto->ICMS->ICMS10->orig  !=  null) {#ICMS10

		$orig = $itens->imposto->ICMS->ICMS10->orig;

		$CST = $itens->imposto->ICMS->ICMS10->CST;

		$CST = (string)$CST . " - Tributada e com cobrança do ICMS por substituição tributária";

		$ICMS = $itens->imposto->ICMS->ICMS10->vICMS;

		$ICMS_str = "10 - Tributada e com cobrança do ICMS por substituição tributária";

		$ICMSST = $itens->imposto->ICMS->ICMS10->vICMSST;

		}elseif ($itens->imposto->ICMS->ICMS20->orig  !=  null) {#ICMS20

		$orig = $itens->imposto->ICMS->ICMS20->orig;

		$CST = $itens->imposto->ICMS->ICMS20->CST;

		$CST = (string)$CST . " - Com redução da BC";

		$ICMS = $itens->imposto->ICMS->ICMS20->vICMS;

		$ICMS_str = "20 - Com redução de base de cálculo";

		$ICMSST = $itens->imposto->ICMS->ICMS20->vICMSST;

		}elseif ($itens->imposto->ICMS->ICMS30->orig  !=  null) {#ICMS30

		$orig = $itens->imposto->ICMS->ICMS30->orig;

		$CST = $itens->imposto->ICMS->ICMS30->CST;

		$CST = (string)$CST . " - Isenta / não tributada e com cobrança do ICMS por substituição tributária";

		$ICMS = $itens->imposto->ICMS->ICMS30->vICMS;

		$ICMS_str = "30 - Isenta ou não tributada e com cobrança do ICMS por substituição tributária";

		$ICMSST = $itens->imposto->ICMS->ICMS30->vICMSST;

		}elseif ($itens->imposto->ICMS->ICMS40->orig  !=  null) {#ICMS40

		$orig = $itens->imposto->ICMS->ICMS40->orig;

		$CST = $itens->imposto->ICMS->ICMS40->CST;

		$CST = (string)$CST . " - Isenta";

		$ICMS = $itens->imposto->ICMS->ICMS40->vICMS;

		$ICMS_str = "40 - Isenta";

		$ICMSST = $itens->imposto->ICMS->ICMS40->vICMSST;

		}elseif ($itens->imposto->ICMS->ICMS41->orig  !=  null) {#ICMS41

		$orig = $itens->imposto->ICMS->ICMS41->orig;

		$CST = $itens->imposto->ICMS->ICMS41->CST;

		$CST = (string)$CST . " - Não tributada";

		$ICMS = $itens->imposto->ICMS->ICMS41->vICMS;

		$ICMS_str = "41 - Não tributada";

		$ICMSST = $itens->imposto->ICMS->ICMS41->vICMSST;

		}elseif ($itens->imposto->ICMS->ICMS50->orig  !=  null) {#ICMS50

		$orig = $itens->imposto->ICMS->ICMS50->orig;

		$CST = $itens->imposto->ICMS->ICMS50->CST;

		$CST = (string)$CST . " - Com suspensão";

		$ICMS = $itens->imposto->ICMS->ICMS50->vICMS;

		$ICMS_str = "50 - Suspensão";

		$ICMSST = $itens->imposto->ICMS->ICMS0->vICMSST;

		}elseif ($itens->imposto->ICMS->ICMS51->orig  !=  null) {#ICMS51

		$orig = $itens->imposto->ICMS->ICMS51->orig;

		$CST = $itens->imposto->ICMS->ICMS51->CST;

		$CST = (string)$CST . " - Com diferimento";

		$ICMS = $itens->imposto->ICMS->ICMS51->vICMS;

		$ICMS_str = "51 - Diferimento";

		$ICMSST = $itens->imposto->ICMS->ICMS51->vICMSST;

		}elseif ($itens->imposto->ICMS->ICMS60->orig  !=  null) {#ICMS60

		$orig = $itens->imposto->ICMS->ICMS60->orig;

		$CST = $itens->imposto->ICMS->ICMS60->CST;

		$CST = (string)$CST . " - ICMS cobrado anteriormente por substituição tributária";

		$ICMS = $itens->imposto->ICMS->ICMS60->vICMS;

		$ICMS_str = "60 - ICMS cobrado anteriormente por substituição tributária";

		$ICMSST = $itens->imposto->ICMS->ICMS60->vICMSST;

		}elseif ($itens->imposto->ICMS->ICMS70->orig  !=  null) {#ICMS70

		$orig = $itens->imposto->ICMS->ICMS70->orig;

		$CST = $itens->imposto->ICMS->ICMS70->CST;

		$CST = (string)$CST . " - Com redução da BC e cobrança do ICMS por substituição tributária";

		$ICMS = $itens->imposto->ICMS->ICMS70->vICMS;

		$ICMS_str = "70 - Com redução de base de cálculo e cobrança do ICMS por substituição tributária";

		$ICMSST = $itens->imposto->ICMS->ICMS70->vICMSST;

		}elseif ($itens->imposto->ICMS->ICMS90->orig  !=  null) {#ICMS90

		$orig = $itens->imposto->ICMS->ICMS90->orig;

		$CST = $itens->imposto->ICMS->ICMS90->CST;

		$CST = (string)$CST . " - Outras";

		$ICMS = $itens->imposto->ICMS->ICMS90->vICMS;

		$ICMS_str = "90 - Outras";

		$ICMSST = $itens->imposto->ICMS->ICMS90->vICMSST;

		}

		#------------------------------------------------------------------------------------------

		#teste pra abreviação

		#------------------------------------------------------------------------------------------

		//if ($itens->imposto->ICMS->ICMS00->orig != null) { #ICMS00

		//  $orig = $itens->imposto->ICMS->ICMS00->orig;

		//  $CST = $itens->imposto->ICMS->ICMS00->CST;

		//$CST_numero = $itens->imposto->ICMS->ICMS00->CST;

		//  $CST = (string)$CST . "-Tributada_integralmente";

		//  $ICMS = $itens->imposto->ICMS->ICMS00->vICMS;

		//  $ICMS_str = "00 - Tributada integralmente";

		//  $ICMSST = $itens->imposto->ICMS->ICMS00->vICMSST;

		//} elseif ($itens->imposto->ICMS->ICMS10->orig  !=  null) { #ICMS10

		//  $orig = $itens->imposto->ICMS->ICMS10->orig;

		//$CST_numero = $itens->imposto->ICMS->ICMS10->CST;

		//  $CST = $itens->imposto->ICMS->ICMS10->CST;

		//  $CST = "-Tributada_e_com_cobrança_do_ICMS_por_substituição_tributária";

		//  $ICMS = $itens->imposto->ICMS->ICMS10->vICMS;

		//  $ICMS_str = "10 - Tributada e com cobrança do ICMS por substituição tributária";

		//  $ICMSST = $itens->imposto->ICMS->ICMS10->vICMSST;

		//} elseif ($itens->imposto->ICMS->ICMS20->orig  !=  null) { #ICMS20

		//  $orig = $itens->imposto->ICMS->ICMS20->orig;

		//  $CST = $itens->imposto->ICMS->ICMS20->CST;

		//$CST_numero = $itens->imposto->ICMS->ICMS20->CST;

		//  $CST = (string)$CST . "-Com redução_da_BC";

		//  $ICMS = $itens->imposto->ICMS->ICMS20->vICMS;

		//  $ICMS_str = "20 - Com redução de base de cálculo";

		//  $ICMSST = $itens->imposto->ICMS->ICMS20->vICMSST;

		//} elseif ($itens->imposto->ICMS->ICMS30->orig  !=  null) { #ICMS30

		//  $orig = $itens->imposto->ICMS->ICMS30->orig;

		//  $CST = $itens->imposto->ICMS->ICMS30->CST;

		//$CST_numero = $itens->imposto->ICMS->ICMS30->CST;

		//  $CST = (string)$CST . "-Isenta/não_tributada_e_com_cobrança_do_ICMS_por_substituição_tributária";

		//  $ICMS = $itens->imposto->ICMS->ICMS30->vICMS;

		//  $ICMS_str = "30 - Isenta ou não tributada e com cobrança do ICMS por substituição tributária";

		//  $ICMSST = $itens->imposto->ICMS->ICMS30->vICMSST;

		//} elseif ($itens->imposto->ICMS->ICMS40->orig  !=  null) { #ICMS40

		//  $orig = $itens->imposto->ICMS->ICMS40->orig;

		//  $CST = $itens->imposto->ICMS->ICMS40->CST;

		//$CST_numero = $itens->imposto->ICMS->ICMS40->CST;

		//  $CST = (string)$CST . "-Isenta";

		//  $ICMS = $itens->imposto->ICMS->ICMS40->vICMS;

		//  $ICMS_str = "40 - Isenta";

		//  $ICMSST = $itens->imposto->ICMS->ICMS40->vICMSST;

		//} elseif ($itens->imposto->ICMS->ICMS41->orig  !=  null) { #ICMS41

		//  $orig = $itens->imposto->ICMS->ICMS41->orig;

		//  $CST = $itens->imposto->ICMS->ICMS41->CST;

		//$CST_numero = $itens->imposto->ICMS->ICMS41->CST;

		//  $CST = (string)$CST . "-Não_tributada";

		//  $ICMS = $itens->imposto->ICMS->ICMS41->vICMS;

		//  $ICMS_str = "41 - Não tributada";

		//  $ICMSST = $itens->imposto->ICMS->ICMS41->vICMSST;

		//} elseif ($itens->imposto->ICMS->ICMS50->orig  !=  null) { #ICMS50

		//  $orig = $itens->imposto->ICMS->ICMS50->orig;

		//  $CST = $itens->imposto->ICMS->ICMS50->CST;

		//$CST_numero = $itens->imposto->ICMS->ICMS50->CST;

		//  $CST = (string)$CST . "-Com_suspensão";

		//  $ICMS = $itens->imposto->ICMS->ICMS50->vICMS;

		//  $ICMS_str = "50 - Suspensão";

		//  $ICMSST = $itens->imposto->ICMS->ICMS0->vICMSST;

		//} elseif ($itens->imposto->ICMS->ICMS51->orig  !=  null) { #ICMS51

		//  $orig = $itens->imposto->ICMS->ICMS51->orig;

		//  $CST = $itens->imposto->ICMS->ICMS51->CST;

		//$CST_numero = $itens->imposto->ICMS->ICMS51->CST;

		//  $CST = (string)$CST . "-Com_diferimento";

		//  $ICMS = $itens->imposto->ICMS->ICMS51->vICMS;

		//  $ICMS_str = "51 - Diferimento";

		//  $ICMSST = $itens->imposto->ICMS->ICMS51->vICMSST;

		//} elseif ($itens->imposto->ICMS->ICMS60->orig  !=  null) { #ICMS60

		//  $orig = $itens->imposto->ICMS->ICMS60->orig;

		//  $CST = $itens->imposto->ICMS->ICMS60->CST;

		//$CST_numero = $itens->imposto->ICMS->ICMS60->CST;

		//  $CST = (string)$CST . "-ICMS_cobrado_anteriormente_por_substituição_tributária";

		//  $ICMS = $itens->imposto->ICMS->ICMS60->vICMS;

		//  $ICMS_str = "60 - ICMS cobrado anteriormente por substituição tributária";

		//  $ICMSST = $itens->imposto->ICMS->ICMS60->vICMSST;

		//} elseif ($itens->imposto->ICMS->ICMS70->orig  !=  null) { #ICMS70

		//  $orig = $itens->imposto->ICMS->ICMS70->orig;

		//  $CST = $itens->imposto->ICMS->ICMS70->CST;

		//$CST_numero = $itens->imposto->ICMS->ICMS70->CST;

		//  $CST = (string)$CST . "-Com_redução_da_BC_e_cobrança_do_ICMS_por_substituição_tributária";

		//  $ICMS = $itens->imposto->ICMS->ICMS70->vICMS;

		//  $ICMS_str = "70 - Com redução de base de cálculo e cobrança do ICMS por substituição tributária";

		//  $ICMSST = $itens->imposto->ICMS->ICMS70->vICMSST;

		//} elseif ($itens->imposto->ICMS->ICMS90->orig  !=  null) { #ICMS90

		//  $orig = $itens->imposto->ICMS->ICMS90->orig;

		//  $CST = $itens->imposto->ICMS->ICMS90->CST;

		//$CST_numero = $itens->imposto->ICMS->ICMS90->CST;

		//  $CST = (string)$CST . "-Outras";

		//  $ICMS = $itens->imposto->ICMS->ICMS90->vICMS;

		//  $ICMS_str = "90 - Outras";

		//  $ICMSST = $itens->imposto->ICMS->ICMS90->vICMSST;

		//}

		

		#verificação da Origem, CST, ICMS

		#------------------------------------------------------------------------------------------

		if ($orig == 0) {

		$orig = $orig . " - Nacional, exceto as indicadas nos códigos 3, 4, 5 e 8";

		} elseif ($orig == 1) {

		$orig = $orig . " - Estrangeira - Importação direta, exceto a indicada no código 6";

		} elseif ($orig == 2) {

		$orig = $orig . " - Estrangeira - Adquirida no mercado interno, exceto a indicada no código 7";

		} elseif ($orig == 3) {

		$orig = $orig . " - Nacional, mercadoria ou bem com Conteúdo de Importação superior a 40% (quarenta por cento) e inferior ou igual a 70% (setenta por cento)";

		} elseif ($orig == 4) {

		$orig = $orig . " - Nacional, cuja produção tenha sido feita em conformidade com os processos produtivos básicos de que tratam as legislações citadas nos Ajustes";

		} elseif ($orig == 5) {

		$orig = $orig . " - Nacional, mercadoria ou bem com Conteúdo de Importação inferior ou igual a 40% (quarenta por cento)";

		} elseif ($orig == 6) {

		$orig = $orig . " - Estrangeira - Importação direta, sem similar nacional, constante em lista de Resolução CAMEX e gás natural";

		} elseif ($orig == 7) {

		$orig = $orig . " - Estrangeira - Adquirida no mercado interno, sem similar nacional, constante em lista de Resolução CAMEX e gás natural";

		} elseif ($orig == 8) {

		$orig = $orig . " - Nacional - Mercadoria ou bem com Conteúdo de Importação superior a 70% (setenta por cento)";

		}

		#verificação da Origem

		#------------------------------------------------------------------------------------------       

		if($PIS = $itens->imposto->PIS->PISAliq->CST != null){

		$PIS = $itens->imposto->PIS->PISAliq->CST;

		$PIS_valor = $itens->imposto->PIS->PISAliq->vPIS;

		$Cofins = $itens->imposto->COFINS->COFINSAliq->CST;

		$Cofins_valor = $itens->imposto->COFINS->COFINSAliq->vCOFINS;

		}elseif($PIS = $itens->imposto->PIS->PISNT->CST != null){

		$PIS = $itens->imposto->PIS->PISNT->CST;

		$PIS_valor = $itens->imposto->PIS->PISNT->vPIS;

		$Cofins = $itens->imposto->COFINS->COFINSNT->CST;

		$Cofins_valor = $itens->imposto->COFINS->COFINSNT->vCOFINS;

		}

		

		

		if ($PIS == null){

		$PIS = 0;

		}

		if ($Cofins== null){

		$Cofins= 0;

		}

		#PIS verificação tributaria      

		if($PIS == 01){

		$PIS = $PIS . " - Operação Tributável com Alíquota Básica";

		}elseif($PIS == 02){

		$PIS = $PIS . " - Operação Tributável com Alíquota Diferenciada";

		}elseif($PIS == 03){

		$PIS = $PIS . " - Operação Tributável com Alíquota por Unidade de Medida de Produto";

		}elseif($PIS == 04){

		$PIS = $PIS . " - Operação Tributável Monofásica - Revenda a Alíquota Zero";

		}

		#PIS verificação tributaria

		if($Cofins == 01){

		$Cofins = $Cofins . " - Operação Tributável com Alíquota Básica";

		}elseif($Cofins == 02){

		$Cofins = $Cofins . " - Operação Tributável com Alíquota Diferenciada";

		}elseif($Cofins == 03){

		$Cofins = $Cofins . " - Operação Tributável com Alíquota por Unidade de Medida de Produto";

		}elseif($Cofins == 04){

		$Cofins  = $Cofins . " - Operação Tributável Monofásica - Revenda a Alíquota Zero";

		}

		

		#------------------------------------------------------------------------------------------ 

		//if ($PIS = $itens->imposto->PIS->PISAliq->CST != null) {

		//  $PIS = $itens->imposto->PIS->PISAliq->CST;

		//  $PIS_valor = $itens->imposto->PIS->PISAliq->vPIS;

		//  $Cofins = $itens->imposto->COFINS->COFINSAliq->CST;

		//  $Cofins_valor = $itens->imposto->COFINS->COFINSAliq->vCOFINS;

		//} elseif ($PIS = $itens->imposto->PIS->PISNT->CST != null) {

		//  $PIS = $itens->imposto->PIS->PISNT->CST;

		//  $PIS_valor = $itens->imposto->PIS->PISNT->vPIS;

		//  $Cofins = $itens->imposto->COFINS->COFINSNT->CST;

		//  $Cofins_valor = $itens->imposto->COFINS->COFINSNT->vCOFINS;

		//}

		//

		//

		//if ($PIS == null) {

		//  $PIS = 0;

		//}

		//if ($Cofins == null) {

		//  $Cofins = 0;

		//}

		//#PIS verificação tributaria      

		//if ($PIS == 01) {

		//  $PIS = $PIS . "-Operação_Tributável_com_\nAlíquota_Básica";

		//} elseif ($PIS == 02) {

		//  $PIS = $PIS . "-Operação_Tributável_com_\nAlíquota_Diferenciada";

		//} elseif ($PIS == 03) {

		//  $PIS = $PIS . "-Operação_Tributável_com_Alíquota_por_Unidade_de_\nMedida_de_Produto";

		//} elseif ($PIS == 04) {

		//  $PIS = $PIS . "-Operação_Tributável_Monofásica_\nRevenda_a_Alíquota";

		//}

		//

		//$PIS_numero = substr($PIS, 0, 2);

		//#PIS verificação tributaria

		//if ($Cofins == 01) {

		//  $Cofins = $Cofins . "-Operação_Tributável_com_\nAlíquota_Básica";

		//} elseif ($Cofins == 02) {

		//  $Cofins = $Cofins . "-Operação_Tributável_com_\nAlíquota_Diferenciada";

		//} elseif ($Cofins == 03) {

		//  $Cofins = $Cofins . "-Operação_Tributável_com_\nAlíquota_por_Unidade_de_Medida_de_Produto";

		//} elseif ($Cofins == 04) {

		//  $Cofins  = $Cofins . "-Operação_Tributável_Monofásica_\nRevenda_a_Alíquota Zero";

		//}

		//$Cofins_numero = substr($Cofins, 0, 2);

		#verificação do PIS e Cofins

		#------------------------------------------------------------------------------------------

		echo "<tr>";

		$tabela = '';

		$tabela .= "$Contagem;";

		echo "<td class= centralizar>$Contagem</td>";

		#------------------------------------------------------------------------------------------

		

		$tabela .= "$descrição;";

		echo "<td class= centralizar>$descrição</td>";

		#------------------------------------------------------------------------------------------

		

		$tabela .= "$cProd;";

		echo "<td class= centralizar>$cProd</td>";

		#------------------------------------------------------------------------------------------

		

		$tabela .= "$quantidade;";

		echo "<td id=quantidade_$id_input class= centralizar>$quantidade</td>";

		#------------------------------------------------------------------------------------------

		

		$valor_unitario_mostrar = number_format($valor_unitario, 4, ",", ".");

		$tabela .= "$valor_unitario_mostrar;";

		echo "<td class= centralizar>$valor_unitario_mostrar</td>";

		#------------------------------------------------------------------------------------------

		

		$ICMS = round($ICMS, 4);

		$ICMS_mostrar = number_format($ICMS, 4, ",", ".");

		//$tabela .= "$ICMS_mostrar;";

		//echo "<td class= centralizar>$ICMS_mostrar</td>";

		#------------------------------------------------------------------------------------------

		if (in_array($NCM, $arrayNCM)) {

		$tabela .= "$NCM (Monofasico);";

		echo "<td class= centralizar>$NCM <h6 style=background-color:yellow;>(Monofasico)</h6></td>";

		} else {

		$tabela .= "$NCM;";

		echo "<td class= centralizar>$NCM</td>";

		}

		#------------------------------------------------------------------------------------------

		

		$ICMS_unidade = $ICMS / $quantidade;

		$aliquota = ($ICMS_unidade / $valor_unitario_mostrar) * 100;

		$aliquota_mostrar = number_format($aliquota, 0, ",", ".");

		$tabela .= "$aliquota_mostrar % ;";

		echo "<td class= centralizar>$aliquota_mostrar % </td>";

		#------------------------------------------------------------------------------------------

		

		$ICMS_unidade_mostrar = number_format($ICMS_unidade, 4, ",", ".");

		?>

		<form action="formacao_de_preco_proce.php" method="get" enctype="multipart/form-data" id="form_geral_2">

		<?php

		if($icms_teste == true){

		$tabela .= "$ICMS_unidade_mostrar;";

		echo "<td class= centralizar>$ICMS_str </td>";

		echo "<td id=icms_$id_input class= centralizar>$ICMS_unidade_mostrar <input class=form-check-input type=checkbox  name=icms_$id_input id=icms_$id_input checked></td>";

		

		}else{

		$tabela .= "$ICMS_unidade_mostrar;";

		echo "<td class= centralizar>$ICMS_str </td>";

		echo "<td id=icms_$id_input class= centralizar>$ICMS_unidade_mostrar <input class=form-check-input type=checkbox  name=icms_$id_input id=icms_$id_input ></td>";

		

		}

		$PIS_unidade = $valor_unitario * (1.65/100);

		$PIS_unidade_mostrar = number_format($PIS_unidade , 4 , ",", ".");

		

		if($pis_teste == true){

		$tabela .= "$PIS_unidade_mostrar;";

		echo "<td class= centralizar>$PIS </td>";

		echo "<td id=pis_$id_input class= centralizar>$PIS_unidade_mostrar <input class=form-check-input type=checkbox name=pis_$id_input id=pis_$id_input  checked></td>";

		

		}else{

		$tabela .= "$PIS_unidade_mostrar;";

		echo "<td class= centralizar>$PIS </td>";

		echo "<td id=pis_$id_input class= centralizar>$PIS_unidade_mostrar <input class=form-check-input type=checkbox name=pis_$id_input id=pis_$id_input > </td>";

		

		}

		$COFINS_unidade = $valor_unitario * (7.6/100);

		$COFINS_unidade_mostrar = number_format($COFINS_unidade , 4 , ",", ".");

		if($confins_teste == true){

		$tabela .= "$COFINS_unidade_mostrar;";

		echo "<td class= centralizar>$Cofins </td>";

		echo "<td id=cofins_$id_input class= centralizar>$COFINS_unidade_mostrar <input class=form-check-input type=checkbox name=cofins_$id_input id=cofins_$id_input  checked></td>";

		

		}else{

		$tabela .= "$COFINS_unidade_mostrar;";

		echo "<td class= centralizar>$Cofins </td>";

		echo "<td id=cofins_$id_input class= centralizar>$COFINS_unidade_mostrar <input class=form-check-input type=checkbox name=cofins_$id_input id=cofins_$id_input > </td>";

		

		}

		#------------------------------------------------------------------------------------------

		

		#------------------------------------------------------------------------------------------

		//if ($icms_teste == true) {

		//  $tabela .= "$ICMS_unidade_mostrar;";

		//  $tabela .= "$ICMS_str;";

		//  //echo "<td id=icms_$id_input class= centralizar> $ICMS_unidade_mostrar <input class=form-check-input type=checkbox  name=icms_$id_input id=icms_$id_input checked> <hr><abbr title=$CST> $CST_numero </abbr></td>";

		//} else {

		//  $tabela .= "$ICMS_unidade_mostrar;";

		//  $tabela .= "$ICMS_str;";

		//  echo "<td id=icms_$id_input class= centralizar> $ICMS_unidade_mostrar <input class=form-check-input type=checkbox  name=icms_$id_input id=icms_$id_input > <hr> $ICMS_str </td>";

		//}

		//$PIS_unidade = $valor_unitario * (1.65 / 100);

		//$PIS_unidade_mostrar = number_format($PIS_unidade, 4, ",", ".");

		//

		//if ($pis_teste == true) {

		//  $tabela .= "$PIS_unidade_mostrar;";

		//  $tabela .= "$PIS;";

		//  //echo "<td id=pis_$id_input class= centralizar>$PIS_unidade_mostrar <input class=form-check-input type=checkbox name=pis_$id_input id=pis_$id_input  checked> <hr> $PIS </td>";

		//} else {

		//  $tabela .= "$PIS_unidade_mostrar;";

		//  $tabela .= "$PIS;";

		//echo "<td id=pis_$id_input class= centralizar>$PIS_unidade_mostrar <input class=form-check-input type=checkbox name=pis_$id_input id=pis_$id_input > <hr> $PIS </td>";

		//}

		//$COFINS_unidade = $valor_unitario * (7.6 / 100);

		//$COFINS_unidade_mostrar = number_format($COFINS_unidade, 4, ",", ".");

		//if ($confins_teste == true) {

		//  $tabela .= "$COFINS_unidade_mostrar;";

		//  $tabela .= "$Cofins;";

		//  //echo "<td id=cofins_$id_input class= centralizar>$COFINS_unidade_mostrar <input class=form-check-input type=checkbox name=cofins_$id_input id=cofins_$id_input  checked> <hr> $Cofins </td>";

		//} else {

		//  $tabela .= "$COFINS_unidade_mostrar;";

		//  $tabela .= "$Cofins;";

		//  echo "<td id=cofins_$id_input class= centralizar>$COFINS_unidade_mostrar <input class=form-check-input type=checkbox name=cofins_$id_input id=cofins_$id_input > <hr> $Cofins </td>";

		//}

		#------------------------------------------------------------------------------------------

		if ($ICMSST == null) {

		$ICMSST = 0;

		} else {

		$ICMSST = round($ICMSST, 2);

		$ICMSST_unidade = $ICMSST / $quantidade;

		}

		//$ICMSST= round($ICMSST, 2);

		$ICMSST_mostrar = number_format($ICMSST, 4, ",", ".");

		//$tabela .= "$ICMSST_mostrar;";

		//echo "<td class= centralizar>$ICMSST_mostrar</td>";

		#verificação do ICMS ST

		#------------------------------------------------------------------------------------------

		//$ICMSST_unidade= round($ICMSST_unidade, 2);

		$ICMSST_unidade_mostrar = number_format($ICMSST_unidade, 4, ",", ".");

		$tabela .= "$ICMSST_unidade_mostrar;";

		echo "<td class= centralizar>$ICMSST_unidade_mostrar</td>";

		

		$IPI_total_mostrar = number_format($IPI, 2, ",", ".");

		//$tabela .= "$IPI_total_mostrar;";

		//echo "<td class= centralizar>$IPI_total_mostrar</td>";

		

		//$IPI_unidade = round($IPI_unidade,2);

		$IPI_unidade_mostrar = number_format($IPI_unidade, 2, ",", ".");

		$tabela .= "$IPI_unidade_mostrar;";

		echo "<td class= centralizar>$IPI_unidade_mostrar</td>";

		

		$porcentagem_frete = $frete_total / ($valor_NF_total - $frete_total);

		$porcentagem_frete_mostrar = number_format($porcentagem_frete, 2, ",", ".");

		//$tabela .= "$porcentagem_frete_mostrar %;";

		//echo "<td class= centralizar>$porcentagem_frete %</td>";

		

		$valor_frete = (($valor_unitario + $IPI_unidade + $ICMSST_unidade) * $porcentagem_frete);

		$valor_frete_mostrar = number_format($valor_frete, 4, ",", ".");

		$tabela .= "$valor_frete;";

		echo "<td class= centralizar>$valor_frete_mostrar</td>";



		$custo_finan = $valor_unitario + $ICMSST_unidade + $IPI_unidade + $valor_frete;

		//$custo_finan = round($custo_finan,2);

		//$custo_finan = $valor_frete + $custo_finan;

		$custo_finan_mostrar = number_format($custo_finan, 4, ",", ".");

		$tabela .= "$custo_finan_mostrar;";

		echo "<td class= centralizar> <div id=custo_financeiro_$id_input >  $custo_finan_mostrar  </div></td>";

		

		

		#------------------------------------------------------------------------------------------

		

		/*$bonificacao_float = 0.0;

		$bonificação_valor_final = $bonificacao_float / 100;

		$bonificação = $custo_finan * $bonificação_valor_final;

		$bonificação = round($bonificação,2);

		$bonificação_mostrar= number_format($bonificação , 2 , ",", ".");*/

		$tabela .= "$bonificação_mostrar;";

		echo "<td class= centralizar> <div id=bonifi_por_$id_input >  0  </div> <input id=indvidual_bonificacao_$id_input  type=bonificacao class=form-control value='' name=indvidual_bonificacao_$id_input id=indvidual_bonificacao_$id_input ></td>";

		

		#Bonificação %

		#------------------------------------------------------------------------------------------

		echo "<td class= centralizar><div id=bonifi_$id_input >  0  </div></td>";

		#Bonificação R$

		#------------------------------------------------------------------------------------------

		$bonificacao_final = $bonificação * $quantidade;

		//echo $bonificacao_final . "</br>";

		$tabela .= "$bonificacao_final;";

		echo "<td class= centralizar><div id=bonifi_total_$id_input >  0  </div></td>";

		#Bonificação Total 

		#------------------------------------------------------------------------------------------

		$custo_bonifi = $custo_finan - $bonificação;

		$custo_bonifi = round($custo_bonifi, 2);

		$custo_bonifi_mostrar = number_format($custo_bonifi, 2, ",", ".");

		$tabela .= "$custo_bonifi_mostrar;";

		echo "<td id=custo_bonifi_$id_input class= centralizar>$custo_bonifi_mostrar</td>";

		#Custo Financeiro menos a bonificação

		#------------------------------------------------------------------------------------------

		$cust_contabil = $custo_bonifi;

		$cust_contabil_mostrar = number_format($cust_contabil, 2, ",", ".");

		$tabela .= "$cust_contabil_mostrar;";

		echo "<td id=$id_input class= centralizar>$cust_contabil_mostrar</td>";

		#Custo Contabil

		#------------------------------------------------------------------------------------------

		echo "<td class= centralizar><br><input class=form-control type=margem value='' id=margem_$id_input>"; 

		$numero = floatval($custo_finan); // Convertendo para número

		foreach ($arrayMargemLucro as $item) {

		    // Verifica se $valor_unitario está entre os valores do intervalo

		    if ($numero >= (float) str_replace(',', '.', $item['inicio_faixa_preco']) && $numero <= (float) str_replace(',', '.', $item['fim_faixa_preco'])) {

		        // Adiciona o intervalo ao array de faixas de lucro

		        $margem_lucro_correspondente[] = $item['margem_lucro'];

		        // Não estamos fazendo nada com o intervalo encontrado, apenas adicionando ao array

				echo $item['margem_lucro'];

				echo "</td>";

		    }

			

		}

		

		#Margem de lucro

		#------------------------------------------------------------------------------------------
		echo"<td class= centralizar> <div id=mark_div_$id_input> 0 </div> <input id=indvidual_markup_$id_input type=markup class=form-control style=width:80px value='' name=indvidual_markup_$id_input id=indvidual_markup_$id_input ></td>";
		
		#Markup
		#------------------------------------------------------------------------------------------

		/*$markup = 0.0;

		$MKP_contabil = $cust_contabil * $markup;

		$MKP_contabil_mostrar= number_format($MKP_contabil, 4 , ",", ".");*/

		$tabela .= "$MKP_contabil_mostrar;";

		

		echo " <td class= centralizar> <div id=markup_$id_input > 0 </div>  </td> ";

		#Preço de Venda

		#------------------------------------------------------------------------------------------

		$dif_mkpcontabil = $MKP_contabil / ($custo_finan - $bonificação);

		$dif_mkpcontabil_mostrar = number_format($dif_mkpcontabil, 4, ",", ".");

		$tabela .= "$dif_mkpcontabil;";

		

		echo "<td id=dif_mkpcontabil_$id_input class= centralizar>$dif_mkpcontabil_mostrar</td>";

		#Fator do Preço de venda

		#------------------------------------------------------------------------------------------

		$Contagem = $Contagem + 1;

		$id_input++;

		

		

		

		#------------------------------------------------------------------------------------------

		?>

		</form>

		<?php

		#fim do formulario de cada item

		#------------------------------------------------------------------------------------------

		array_push($array_tabela, $tabela);

		}

		array_push($array_tabela2, $array_tabela);

		$_SESSION['tabela'] = $array_tabela2;

		//echo "<pre>";

		//print_r($margem_lucro_correspondente);

		//echo "</pre>";

		//print_r($_POST);

		

		?>

		

		</div>

		<!-- Div Final -->

		</tbody>

		</table>

	

		</div>

		<div class="centralizar">

		<!--<button onclick='valor()' type="submit" class="btn btn-outline-info btn-lg" form ="form_geral_2" >Consultar individualmente</button>-->

		<div>

        <button class="btn btn-outline-info btn-lg" onclick="exportarParaExcel()">Download da Operação</button>

		<!--<button id="btnExport" onclick="Export(this)" class="btn btn-outline-info btn-lg">Download da Operação</button>-->

        <iframe id="txtArea1" style="display:none"></iframe>

        <button id='botaoEnviar' onclick="myFunction(this)" class=' botaoEnviar btn btn-outline-info btn-lg value-plus'>Calcular</button>

        <button id='botaoLimpar' class=' botaoEnviar btn btn-outline-info btn-lg value-plus'>Limpar</button>

		</div>

		</div>

		</div>

		

		</div>

		<!-- Bootstrap core JS-->

		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>

		<!-- Core theme JS-->

		<script src="sidebar/js/scripts.js"></script>

		<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

		<script type="text/javascript" src="jquery.js"></script>

		<!-- Funcionalidades da página -->

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

		

		<script src=" //ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js "></script>

		<script src="//cdn.rawgit.com/rainabba/jquery-table2excel/1.1.0/dist/jquery.table2excel.min.js"></script>



		<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.5/xlsx.full.min.js"></script>



		<script>

		//Função anti double click

		function myFunction(e) {



		    //Desabilita o botao

		    e.disabled = true;



		    //Habilita novamente após dois segundos (2000) ms

		    setTimeout(function () {

		        toggleDisabled(e)

		    }, 2000);

		}



		function toggleDisabled(elem) {

		    elem.disabled = !elem.disabled;

		}



		//Funçao formatar dinheiro

		//retornará 1234.53

		function formatNumber(value) {

		    value = value.replace('.', '');

		    value = value.replace(',', '');

		    value = convertToFloatNumber(value);

		    return value.formatMoney(4, ',', '.');

		}



		//transforma a entrada em número float

		var convertToFloatNumber = function (value) {

		    value = value.toString();

		    if (value.indexOf('.') !== -1 && value.indexOf(',') !== -1) {

		        if (value.indexOf('.') < value.indexOf(',')) {

		            //inglês

		            return parseFloat(value.replace(/,/gi, ''));

		        } else {

		            //português

		            return parseFloat(value.replace(/./gi, '').replace(/,/gi, '.'));

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

		var sufixo = "(FP)"

		var titulo_download = "<?php echo $titulo_download ?>";



		function exportarParaExcel() {

		var tabela = document.getElementById("table"); // Substitua "table" pelo ID de sua tabela.

    	var nomeArquivo = titulo_download + sufixo + ".xlsx";



    	/* Crie uma matriz de dados a partir da tabela HTML, incluindo o cabeçalho */

    	var data = [];

    	var rows = tabela.querySelectorAll('tr');

    

    	// Adicione a linha do cabeçalho "Impostos Dedutíveis" manualmente no início da matriz

    	//data.push(['#', 'Descrição', 'Fabricante', 'Peças', 'Valor', 'NCM', 'Alíquota % Icms', 'ICMS', 'STICMS', 'PIS', 'STPIS', 'COFINS', 'STCOFINS', 'ICMS ST', 'IPI', 'Adicional Frete R$', 'Custo Financeiro', 'Bonificação', 'Bonificação Total', 'C.Fin - Bonif.', 'Custo Contábil', 'Preço de Venda', 'P. Venda / C. Fin']);

    

    	for (var i = 1; i < rows.length; i++) {

        	var rowData = [];

        	var cells = rows[i].querySelectorAll('td, th');

        	for (var j = 0; j < cells.length; j++) {

				var cellText = cells[j].textContent;
				// Destacar a palavra "monofásico" com estilo CSS
				if (cellText.includes('Monofasico')) {
                	cellText = cellText.replace(/(Monofasico)/gi, '<b>$1</b>');
            	}

            	rowData.push(cells[j].textContent);

        	}

        	data.push(rowData);

    	}



    	/* Crie um objeto de workbook do Excel e adicione os dados */

    	var wb = XLSX.utils.book_new();

    	var ws = XLSX.utils.aoa_to_sheet(data);

    	XLSX.utils.book_append_sheet(wb, ws, "Planilha 1");


    	/* Gere o arquivo Excel e inicie o download */

    	XLSX.writeFile(wb, nomeArquivo);

	}





		$(document).ready(function () {



		    //$('td:nth-child(16),th:nth-child(16)').hide();

		    $('input[id^="icms_"]').prop('checked', true);

		    $('input[id^="pis_"]').prop('checked', true);

		    $('input[id^="cofins_"]').prop('checked', true);



		    $('#icms_0').change(function () {



		        $('input[id^="icms_"]').not(this).prop('checked', this.checked);



		    });



		    $('#pis_0').change(function () {



		        $('input[id^="pis_"]').not(this).prop('checked', this.checked);



		    });



		    $('#cofins_0').change(function () {



		        $('input[id^="cofins_"]').not(this).prop('checked', this.checked);



		    });



			//------------------------------------------------------------------------------------------------------------------------------

			var margem_lucro_correspondente = <?php echo json_encode($margem_lucro_correspondente); ?>;

    

			// Agora você pode usar a variável margemLucroCorrespondente no seu código JavaScript

			//console.log(margem_lucro_correspondente);

			var markup_Margem = '<?php echo str_replace(',', '.', $markup_Margem) ?>';



			for (var i = 0; i < margem_lucro_correspondente.length; i++) {

				var id_input = i + 1; // O ID do elemento de entrada é baseado no índice do array (começando de 1)

				var valor_margem = margem_lucro_correspondente[i]; // Valor da margem de lucro correspondente

			

				// Atualizar o campo de entrada com o valor da margem de lucro

				document.getElementById('margem_' + id_input).value = valor_margem;



				MKM_atual = '<?php echo str_replace(',', '.', $markup_MKM) ?>'

				var MKM_atual = parseFloat(MKM_atual.replace(",", "."));

				var mkd_atual = (100 / MKM_atual) / 100;

				mkd_atual = mkd_atual.toFixed(4);



				var CTV_atual =  (1 - mkd_atual) * 100;

				CTV_atual = CTV_atual.toFixed(4);



				var CTV_sem_margem = CTV_atual - markup_Margem;

				var CTV_novo = CTV_sem_margem + parseFloat(valor_margem);

				var CTV_novo = CTV_novo.toFixed(4);

				var mkd = (100 - CTV_novo) / 100;

				var mkd = mkd.toFixed(4);

				var mkm = (100 / mkd) / 100;

				var mkm = mkm.toFixed(4);

				document.getElementById("indvidual_markup_" + id_input).value = mkm;
				document.getElementById("mark_div_" + id_input).innerHTML = mkm;

			}



			var margem_atual_float = parseFloat(valor_margem);

			//------------------------------------------------------------------------------------------------------------------------------



		    var fill_icms;

		    var fill_pis;

		    var fill_cofins;

			var icmsAtivo = false;

			var pisAtivo = false;

			var cofinsAtivo  = false;

			var lastID = null;



		    $('input[id^="icms_"]').change(function () {



		        var id = $(this).attr("id");

		        var ID_temp = id.split('_');

		        var ID = ID_temp[1];



				// Verificando se o ID mudou desde a última vez

				if (ID !== lastID) {

					icmsAtivo = false;

					pisAtivo = false;

					cofinsAtivo = false;

				}

				lastID = ID; // Atualizando o último ID processado



		        function verificarCheckBox() {

		            var check = $(this);



		            for (var i = 0; i < check.length; i++) {

		                if (check[i].checked == true) {

		                    console.log("ativo")



		                } else {

							if(pisAtivo == true){

								var mkpPIS = '<?php echo str_replace(',', '.', $markup_PIS) ?>';

							}else{

								var mkpPIS = 0; 

							}

							if(cofinsAtivo == true){

								var mkpCOFINS = '<?php echo str_replace(',', '.', $markup_COFINS) ?>';

							}else{

								var mkpCOFINS = 0; 

							}

							

		                    

							var margemAtual = document.getElementById('margem_' + ID).value;

							var CTV = CTV_sem_margem + parseFloat(margemAtual);

		                    var mkpICMS = '<?php echo str_replace(',', '.', $markup_ICMS) ?>';

							var newRuleMKP = parseFloat(CTV) - parseFloat(mkpCOFINS) - parseFloat(mkpPIS) - parseFloat(mkpICMS);

							var newRuleMKP = newRuleMKP.toFixed(4);

							

		                    var newRuleMKD = (100 - newRuleMKP) / 100;

		                    var newRuleMKD = newRuleMKD.toFixed(4);

		                    var newRuleMKM = (100 / newRuleMKD) / 100;

		                    var newRuleMKM = newRuleMKM.toFixed(4);

		                    var newRuleMKM = newRuleMKM.replace('.', ',');

		                    document.getElementById("indvidual_markup_" + ID).value = newRuleMKM;
							document.getElementById("mark_div_" + ID).innerHTML = newRuleMKM;

		                    console.log(newRuleMKM);

							icmsAtivo = true;

		                }

		            }

		        }

		        verificarCheckBox();

		    });

		    $('input[id^="pis_"]').change(function () {



		        var id = $(this).attr("id");

		        var ID_temp = id.split('_');

		        var ID = ID_temp[1];

				

				// Verificando se o ID mudou desde a última vez

				if (ID !== lastID) {

					icmsAtivo = false;

					pisAtivo = false;

					cofinsAtivo = false;

				}

				lastID = ID; // Atualizando o último ID processado



		        function verificarCheckBox() {

		            var check = $(this);



		            for (var i = 0; i < check.length; i++) {

		                if (check[i].checked == true) {

		                    console.log("ativo")



		                } else {

							if(icmsAtivo == true){

								var mkpICMS = '<?php echo str_replace(',', '.', $markup_ICMS) ?>';

							}else{

								var mkpICMS = 0;

							}

							if(cofinsAtivo == true){

								var mkpCOFINS = '<?php echo str_replace(',', '.', $markup_COFINS) ?>';

							}else{

								var mkpCOFINS = 0; 

							}

							

							var margemAtual = document.getElementById('margem_' + ID).value;

							var CTV = CTV_sem_margem + parseFloat(margemAtual);

							var mkpPIS = '<?php echo str_replace(',', '.', $markup_PIS) ?>';

							

							var newRuleMKP = parseFloat(CTV) - parseFloat(mkpCOFINS) - parseFloat(mkpPIS) - parseFloat(mkpICMS);

							var newRuleMKP = newRuleMKP.toFixed(4);

							

		                    var newRuleMKD = (100 - newRuleMKP) / 100;

		                    var newRuleMKD = newRuleMKD.toFixed(4);

		                    var newRuleMKM = (100 / newRuleMKD) / 100;

		                    var newRuleMKM = newRuleMKM.toFixed(4);

		                    var newRuleMKM = newRuleMKM.replace('.', ',');

		                    document.getElementById("indvidual_markup_" + ID).value = newRuleMKM;
							document.getElementById("mark_div_" + ID).innerHTML = newRuleMKM;

		                    console.log(newRuleMKM);

		                    fill_pis = 1;

							pisAtivo = true;

							}

		            }

		        }

		        verificarCheckBox();

		    });



		    $('input[id^="cofins_"]').change(function () {



		        var id = $(this).attr("id");

		        var ID_temp = id.split('_');

		        var ID = ID_temp[1];



		        function verificarCheckBox() {

		            var check = $(this);



		            for (var i = 0; i < check.length; i++) {

		                if (check[i].checked == true) {

		                    console.log("ativo")



		                } else {

							if(icmsAtivo == true){

								var mkpICMS = '<?php echo str_replace(',', '.', $markup_ICMS) ?>';

							}else{

								var mkpICMS = 0;

							} 

							if(pisAtivo == true){

								var mkpPIS = '<?php echo str_replace(',', '.', $markup_PIS) ?>';

		                    }else{

								var mkpPIS = 0; 

							}

							

							var margemAtual = document.getElementById('margem_' + ID).value;

							var CTV = CTV_sem_margem + parseFloat(margemAtual);

							var mkpCOFINS = '<?php echo str_replace(',', '.', $markup_COFINS) ?>';

							

							var newRuleMKP = parseFloat(CTV) - parseFloat(mkpCOFINS) - parseFloat(mkpPIS) - parseFloat(mkpICMS);

							var newRuleMKP = newRuleMKP.toFixed(4);

							

							

		                    var newRuleMKD = (100 - newRuleMKP) / 100;

		                    var newRuleMKD = newRuleMKD.toFixed(4);

		                    var newRuleMKM = (100 / newRuleMKD) / 100;

		                    var newRuleMKM = newRuleMKM.toFixed(4);

		                    var newRuleMKM = newRuleMKM.replace('.', ',');

		                    document.getElementById("indvidual_markup_" + ID).value = newRuleMKM;
							document.getElementById("mark_div_" + ID).innerHTML = newRuleMKM;

		                    console.log(newRuleMKM);

							cofinsAtivo = true;

		                }

		            }

		        }

		        verificarCheckBox();

		    });



		    $('#markup').ready(function () {

		        var textoDigitado = '<?php echo $markup_MKM ?>';

		        //$('input[id^="indvidual_markup_"]').val(textoDigitado);



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

			



			$('input.form-control[id^=margem_]').change(function () {

				var valorAtual = $(this).val();
				

				var identifica_linha_mkp = $(this).attr("id");

				var ID_temp = identifica_linha_mkp.split('_');

				var ID = ID_temp[1];


				MKM_atual = document.getElementById("indvidual_markup_" + ID).value

				var MKM_atual = parseFloat(MKM_atual.replace(",", "."));

				var mkd_atual = (100 / MKM_atual) / 100;

				mkd_atual = mkd_atual.toFixed(4);



				var CTV_atual =  (1 - mkd_atual) * 100;

				CTV_atual = CTV_atual.toFixed(4);

                



                var CTV_sem_margem = CTV_atual - markup_Margem;

				var CTV_novo = CTV_sem_margem + parseFloat(valorAtual);

				var CTV_novo = CTV_novo.toFixed(4);

				var mkd = (100 - CTV_novo) / 100;

				var mkd = mkd.toFixed(4);

				var mkm = (100 / mkd) / 100;

				var mkm = mkm.toFixed(4);

				document.getElementById("indvidual_markup_" + ID).value = mkm;
				document.getElementById("mark_div_" + ID).innerHTML = mkm;

				console.log(ID); // Mostra o ID no console

			});



		    $("#botaoEnviar").click(function () {



		        $('input[type=bonificacao]').each(function () {



		            //$('td:nth-child(16),th:nth-child(16)').show();



		            if (this['value'] == "0") {

		                //console.log('zerado');

		            } else {

		                var indentifica_linha_boni = ($(this).attr("id"));

		                var valor_input_boni = document.getElementById(indentifica_linha_boni).value;

						
		                var valor_input_boni = valor_input_boni.replace(",", ".");

		                var valor_input_boni_float = parseFloat(valor_input_boni);

		                var valor_input_boni_float = (valor_input_boni_float / 100)



		                //var preco_venda = document.getElementById("markup_" + ID).innerHTML;





		                var ID_temp = indentifica_linha_boni.split('_');

		                var ID = ID_temp[2];


						document.getElementById("bonifi_por_" + ID).innerHTML = valor_input_boni;


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

		                localStorage.setItem("bonificacao_mostrar", bonificacao_mostrar);

		                localStorage.setItem("bonificacao_total", bonificacao_total);

		                //$('td:nth-child(16),th:nth-child(16)').hide();

		            };

		        });



		        $("input:checked").each(function () {



		            var indentifica_linha = ($(this).attr("id"));



		            if (indentifica_linha == "pis_0") {}

		            else if (indentifica_linha == "cofins_0") {}

		            else if (indentifica_linha == "icms_0") {}

		            else {

		                var teste = 1;



		                var celula_icms = document.getElementById(indentifica_linha).innerHTML;

		                var palavra = celula_icms.split(' ');



		                var ID_temp = palavra[5].split('_');

		                var ID = ID_temp[1].replace('">', '');

		                var ID = ID.replace('"', '');



		                var palavra_temp = palavra[0];

		                var palavra_temp_2 = palavra_temp.replace(",", ".");

		                var palavra_float = parseFloat(palavra_temp_2);



		                var custo_financeiro_bonificacao = custo_financeiro_bonificacao; //inicial

		                if (custo_financeiro_bonificacao == null) {

		                    var custo_financeiro_bonificacao = document.getElementById("custo_bonifi_" + ID).innerHTML;

		                    console.log(custo_financeiro_bonificacao[1]);

		                    if (custo_financeiro_bonificacao[1] == ".") {

		                        var custo_financeiro_bonificacao = custo_financeiro_bonificacao.replace(".", "");

		                    }

		                    //var custo_financeiro_bonificacao = custo_financeiro_bonificacao.replace(".", "");

		                    var custo_financeiro_bonificacao = custo_financeiro_bonificacao.replace(",", ".");

		                }

		                var custo_contabil = document.getElementById(ID).innerHTML; //final



		                if (custo_contabil[1] == ".") {

		                    var custo_contabil = custo_contabil.replace(".", "");

		                    var custo_contabil = custo_contabil.replace(",", ".");

		                } else {

		                    var custo_contabil = custo_contabil.replace(",", ".");

		                }



		                var custo_contabil = parseFloat(custo_contabil);

		                //var custo_financeiro_bonificacao = parseFloat(custo_financeiro_bonificacao);



		                if (custo_contabil < custo_financeiro_bonificacao) {

		                    custo_financeiro_bonificacao = custo_contabil;

		                    //custo_financeiro_bonificacao = custo_contabil.toString();

		                    console.log('entrou!!');



		                    if (custo_financeiro_bonificacao[1] == ".") {

		                        var custo_financeiro_bonificacao = custo_financeiro_bonificacao.replace(".", "");

		                        var custo_financeiro_bonificacao = custo_financeiro_bonificacao.replace(",", ".");

		                    }



		                }

		                var custo_financeiro_bonificacao = custo_financeiro_bonificacao.toString();

		                var temp = custo_financeiro_bonificacao.replace(",", ".");

		                var custo_contabil_float = parseFloat(temp);

		                var custo_contabil_final = (custo_contabil_float - palavra_float).toFixed(4);

		                //console.log(custo_contabil_final);

		                var custo_contabil_str = custo_contabil_final.toString();

		                var custo_contabil_final_str = custo_contabil_str.replace(".", ",");

		                document.getElementById(ID).innerHTML = custo_contabil_final_str;



		            }



		        });





		        $('input[type=markup]').each(function () {

		            if (this['value'] == "0") {

		                //console.log('zerado');

		            } else {

		                var indentifica_linha_mkp = ($(this).attr("id"));

		                var valor_input = document.getElementById(indentifica_linha_mkp).value;

		                var valor_input = valor_input.replace(",", ".");

		                var valor_input_float = parseFloat(valor_input);



		                //var preco_venda = document.getElementById("markup_" + ID).innerHTML;





		                var ID_temp = indentifica_linha_mkp.split('_');

		                var ID = ID_temp[2];



		                var custo_bonifi = document.getElementById("custo_bonifi_" + ID).innerHTML;

						var arrayMargemLucro = <?php echo json_encode($arrayMargemLucro); ?>;
						function converterParaFloat(valor) {
							// Se o valor tiver apenas uma vírgula e nenhum ponto, assume que a vírgula é o separador decimal
							if (valor.includes(',') && !valor.includes('.')) {
								valor = valor.replace(',', '.');
							} 
							// Se o valor tiver tanto ponto quanto vírgula, remove o separador de milhar (ponto)
							else if (valor.includes('.') && valor.includes(',')) {
								valor = valor.replace(/\./g, '');
								valor = valor.replace(',', '.');
							}
						
							// Converte para float
							return parseFloat(valor);
						}
						var numero = custo_bonifi;
						var numeroFloat = converterParaFloat(numero);

        				arrayMargemLucro.forEach(function(item) {
        				    // Converte os valores de string para float e substitui a vírgula por ponto
        				    var inicioFaixaPreco = parseFloat(item.inicio_faixa_preco.replace(',', '.'));
        				    var fimFaixaPreco = parseFloat(item.fim_faixa_preco.replace(',', '.'));
						
        				    // Verifica se o número está entre os valores do intervalo
        				    if (numeroFloat >= inicioFaixaPreco && numeroFloat <= fimFaixaPreco) {
								margemAtual = document.getElementById('margem_' + ID).value;
								if (margemAtual != item.margem_lucro ){
        				        	document.getElementById('margem_' + ID).value = item.margem_lucro;

									MKM_atual = document.getElementById("indvidual_markup_" + ID).value

									var MKM_atual = parseFloat(MKM_atual.replace(",", "."));

									var mkd_atual = (100 / MKM_atual) / 100;

									mkd_atual = mkd_atual.toFixed(4);



									var CTV_atual =  (1 - mkd_atual) * 100;

									CTV_atual = CTV_atual.toFixed(4);





                					var CTV_sem_margem = CTV_atual - margemAtual;

									var CTV_novo = CTV_sem_margem + parseFloat(item.margem_lucro);

									var CTV_novo = CTV_novo.toFixed(4);

									var mkd = (100 - CTV_novo) / 100;

									var mkd = mkd.toFixed(4);

									var mkm = (100 / mkd) / 100;

									var mkm = mkm.toFixed(4);

									document.getElementById("indvidual_markup_" + ID).value = mkm;
									document.getElementById("mark_div_" + ID).innerHTML = mkm;

								
									//$('input.form-control[id^=margem_]').trigger('change');
								}
        				    }
        				});
						
		                var custo_bonifi = custo_bonifi.replace(",", ".");

		                if (custo_bonifi[1] == ".") {

		                    var custo_bonifi = custo_bonifi.replace(".", "");

		                    var custo_bonifi = custo_bonifi.replace(",", ".");

		                }

		                var custo_bonifi_float = parseFloat(custo_bonifi);



		                var cust_contabil = document.getElementById(ID).innerHTML;

		                var cust_contabil = cust_contabil.replace(",", ".");

		                var cust_contabil_float = parseFloat(cust_contabil);

						
						var markupAtualizado = document.getElementById("indvidual_markup_" + ID).value;
						if(typeof markupAtualizado === "string"){
							var markupAtualizado = parseFloat(markupAtualizado.replace(",", "."));
						}

		                var MKP_contabil = (markupAtualizado * cust_contabil_float); //MKP_contabil = preço de venda

		                var MKP_contabil = MKP_contabil.toFixed(4);

		                var calculo = (MKP_contabil / custo_bonifi_float).toFixed(4);



		                document.getElementById("markup_" + ID).innerHTML = MKP_contabil.replace(".", ",");

		                var calculo = calculo.replace(".", ",");

		                document.getElementById("dif_mkpcontabil_" + ID).innerHTML = calculo;



		                //console.log(typeof(preco_venda));

		                //console.log(preco_venda);

		            };

		        });



		    });

		    $("#botaoLimpar").click(function () {

		        location.reload();

		    });



		})

		</script>

		

		</body>

		

		</html>		