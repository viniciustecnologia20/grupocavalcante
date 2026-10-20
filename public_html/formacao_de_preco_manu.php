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
        margin: left;
      }
      
    </style>
	
<script type="text/javascript" src="jquery.js"></script>
<!-- Funcionalidades da página -->
<script type="text/javascript">
$(document).ready(function(){



});
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
            <h5 class="card-header rounded-top ">Valores Gerais</h5>
            <div class="card-body">
              
              <form action="formacao_de_preco_proce.php" method="post" id="form_geral">
                <div class="row ">
                  <div class="col-2">
                    <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" name="icms" id="icms">
                      <label class="form-check-label" for="flexSwitchCheckDefault">ICMS</label>
                    </div>
                    <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" name="pis"id="pis">
                      <label class="form-check-label" for="flexSwitchCheckDefault">PIS</label>
                    </div>
                    <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" name="cofins" id="cofins">
                      <label class="form-check-label" for="flexSwitchCheckDefault">COFINS</label>
                    </div>    
                  </div>
                  <br>
                  <div class="col-2">
                    <div class="form-group">
                      <input type="text" class="form-control" name="markup" id="markup" placeholder="Markup de Venda">
                      <div class="form-group">
                        <input type="text" class="form-control" name="bonificacao"  id="bonificacao" placeholder="% da Bonificação">
                      </div>
                    </div>
                  </div>
                </div>
                <button type="submit" class="btn btn-outline-info btn-lg" form ="form_geral" >Consultar</button>
              </form>
            </div>
          </div>
          </div>
          <!--BACK END-->
          <?php
  #------------------------------------------------------------------------------------------
  #Função Impostos #FECHEDA TEMPORARIAMENTE#
  #------------------------------------------------------------------------------------------
  $myfile2 = $_SESSION['xml_copia'];
  $xml = simplexml_load_string($myfile2);
  #------------------------------------------------------------------------------------------
  $xml_copia = file_get_contents( $_FILES['XML']['tmp_name']);
  $_SESSION['xml_copia'] = $xml_copia;
  //print_r($_SESSION['xml_copia']);
  #------------------------------------------------------------------------------------------
  $myfile2 = $_FILES['XML']['tmp_name'];
  $xml = simplexml_load_file($myfile2);
  $Contagem = 1;
  #Recebe o XML e le ele
  #------------------------------------------------------------------------------------------
  ?>
          <div>
            <a href="download_formacao_manu.php"><button class="btn btn-outline-info btn-lg">Download da Operação</button></a>
          </div>
          <hr>
          <div class="table-responsive border-dark rounded">
            <table class="table table-striped table-bordered table-hover">
              <thead class="thead-dark table-striped centralizar ">
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">descrição</th>
                  <th scope="col">Codigo do fabricante</th>
                  <th scope="col">Quantidade de peças</th>
                  <th scope="col">Valor da unidade</th>
                  <th scope="col">NCM</th>
                  <th scope="col">Alíquota % Icms</th>
                  <th scope="col">IMPOSTOS <hr>ICMS Unidade</th>
                  <th scope="col">--- <hr>PIS Unidade</th>
                  <th scope="col">DEDUTIVEIS<hr>COFINS Unidade</th>
                  <th scope="col">ICMS ST da unidade</th>
                  <th scope="col">IPI da unidade</th>
                  <th scope="col">Adicional Frete R$</th>
                  <th scope="col">Custo financeiro</th>
                  <th scope="col">Bonificação unidade</th>
                  <th scope="col">Custo Financeiro - bonificação</th>
                  <th scope="col">Custo contabil</th>
                  <th scope="col">Preço de Venda</th>
                  <th scope="col">Fator do Preço de venda/custo financeiro-bonificação</th>
                </tr>
              </thead>
              <tbody>
                <?php
  $connect = mysqli_connect('banco_gp_1.mysql.dbaas.com.br','banco_gp_1','tecnologia20');
  $db = mysqli_select_db($connect,'banco_gp_1');
  $query_select = "SELECT * FROM `NCM_monofasicos` ORDER BY `ID` ASC";
  $select = mysqli_query($connect,$query_select)or die(mysqli_error($connect));
  
  while ($row = mysqli_fetch_array($select)) {
    $arrayNCM[] = $row["NCM"];
  }
  
  
  $teste = $xml->NFe->infNFe->emit;
  if($teste == null){
	$teste =  $xml->nfeProc->NFe->infNFe->emit;
  }
  foreach ($teste as $titulo_arquivo){
    $nome = $titulo_arquivo->xNome;
  }
  
  
  $teste = $xml->NFe->infNFe->ide;
  if($teste == null){
	$teste =  $xml->nfeProc->NFe->infNFe->ide;
  }
  foreach ($teste as $titulo_arquivo){
    $numero_nfe = $titulo_arquivo->nNF;
  }
  
  
  $titulo_download = $nome ." - ".$numero_nfe;
  $_SESSION['titulo_formação'] =  $titulo_download;
  #codigo para formar titulo
  #------------------------------------------------------------------------------------------
	$teste = $xml->NFe->infNFe->total;
  if($teste == null){
	$teste =  $xml->nfeProc->NFe->infNFe->total;
  }
  foreach($teste as $itens_2){    
    $vtotal = $itens_2->ICMSTot->vNF;
    $vtotal_frete = $itens_2->ICMSTot->vFrete;
  }
  
  $porcent_acressimo = $vtotal - $vtotal_frete;
  $porcent_acressimo = $vtotal_frete / $porcent_acressimo;
  $porcent_acressimo = round($porcent_acressimo,8);
  $porcent_acressimo = ($porcent_acressimo *100);
  //echo "% de acressimo: ".$porcent_acressimo."</br>";
  #------------------------------------------------------------------------------------------
  $array_tabela = array();
  $array_tabela2 = array();
  $id_input = 1;
  
  	$teste = $xml->NFe->infNFe->total;
	if($teste == null){
		$teste = $xml->nfeProc->NFe->infNFe->total;
	}
  foreach($teste as $totais){
    $IPI_total = $totais->ICMSTot->vIPI;
    $frete_total = $totais->ICMSTot->vFrete;
    $valor_NF_total = $totais->ICMSTot->vNF;
    }
	
	$teste = $xml->NFe->infNFe->det;
	if($teste == null){
		$teste = $xml->nfeProc->NFe->infNFe->det;
	}
	
  foreach ($teste as $itens){
    
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
    $NCM = substr_replace($NCM, '.' , -2 , -4);
    $NCM = substr_replace($NCM, '.' , 4 , -5);
    #NCM - XML
    #------------------------------------------------------------------------------------------
    
    $IPI = $itens->imposto->IPI->IPITrib->vIPI;
    $IPI = round($IPI,2);
    #------------------------------------------------------------------------------------------
    
    $quantidade = $itens->prod->qCom;
    $quantidade = round($quantidade,1);
    #------------------------------------------------------------------------------------------
    
    $IPI_unidade = $IPI/$quantidade;
    
    
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
    #verificação da Origem, CST, ICMS
    #------------------------------------------------------------------------------------------
    if($orig == 0){
      $orig = $orig ." - Nacional, exceto as indicadas nos códigos 3, 4, 5 e 8";
    }elseif($orig == 1){
      $orig = $orig ." - Estrangeira - Importação direta, exceto a indicada no código 6";     
    }elseif($orig == 2){
      $orig = $orig ." - Estrangeira - Adquirida no mercado interno, exceto a indicada no código 7";
    }elseif($orig == 3){
      $orig = $orig ." - Nacional, mercadoria ou bem com Conteúdo de Importação superior a 40% (quarenta por cento) e inferior ou igual a 70% (setenta por cento)";
    }elseif($orig == 4){
      $orig = $orig ." - Nacional, cuja produção tenha sido feita em conformidade com os processos produtivos básicos de que tratam as legislações citadas nos Ajustes";
    }elseif($orig == 5){
      $orig = $orig ." - Nacional, mercadoria ou bem com Conteúdo de Importação inferior ou igual a 40% (quarenta por cento)";
    }elseif($orig == 6){
      $orig = $orig ." - Estrangeira - Importação direta, sem similar nacional, constante em lista de Resolução CAMEX e gás natural";
    }elseif($orig == 7){
      $orig = $orig ." - Estrangeira - Adquirida no mercado interno, sem similar nacional, constante em lista de Resolução CAMEX e gás natural";
    }elseif($orig == 8){
      $orig = $orig ." - Nacional - Mercadoria ou bem com Conteúdo de Importação superior a 70% (setenta por cento)";
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
    echo "<td class= centralizar>$quantidade</td>";
    #------------------------------------------------------------------------------------------
    
    $valor_unitario_mostrar = number_format($valor_unitario , 2 , ",", ".");
    $tabela .= "$valor_unitario_mostrar;";
    echo "<td class= centralizar>$valor_unitario_mostrar</td>";
    #------------------------------------------------------------------------------------------
    
    $ICMS = round($ICMS, 2);      
    $ICMS_mostrar = number_format($ICMS, 2 , ",", ".");
    $tabela .= "$ICMS_mostrar;";
    //echo "<td class= centralizar>$ICMS_mostrar</td>";
    #------------------------------------------------------------------------------------------
    if(in_array($NCM,$arrayNCM)){
      $tabela .= "$NCM (Monofasico);";
      echo "<td class= centralizar>$NCM <h6 style=background-color:yellow;>(Monofasico)</h6></td>";
    }else{
      $tabela .= "$NCM;";
      echo "<td class= centralizar>$NCM</td>";
    }
    #------------------------------------------------------------------------------------------
    
    $ICMS_unidade = $ICMS/$quantidade;
    $aliquota = ($ICMS_unidade / $valor_unitario_mostrar)* 100;
    $aliquota_mostrar = number_format($aliquota , 0 , ",", ".");
    $tabela .= "$aliquota_mostrar % ;";
    echo "<td class= centralizar>$aliquota_mostrar % </td>";
    #------------------------------------------------------------------------------------------
    
    $ICMS_unidade_mostrar = number_format($ICMS_unidade , 4 , ",", ".");
    $tabela .= "$ICMS_unidade_mostrar;";
    //echo "<td class= centralizar>$ICMS_unidade_mostrar</td>";
    ?>
    <form action="formacao_de_preco_proce.php" method="get" id="form_geral_2">
    <?php
    echo "<td class= centralizar>$ICMS_unidade_mostrar <input class=form-check-input type=checkbox name=icms id=icms_$id_input > <hr> $ICMS_str </td>";
    #------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    
    $PIS_unidade = $valor_unitario * (1.65/100);
    $PIS_unidade_mostrar = number_format($PIS_unidade , 4 , ",", ".");
    $tabela .= "$PIS_unidade_mostrar;";
    echo "<td class= centralizar>$PIS_unidade_mostrar <input class=form-check-input type=checkbox name=pis id=pis_$id_input > <hr> $PIS </td>";
    #------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    
    $COFINS_unidade = $valor_unitario * (7.6/100);
    $COFINS_unidade_mostrar = number_format($COFINS_unidade , 4 , ",", ".");
    $tabela .= "$COFINS_unidade_mostrar;";
    echo "<td class= centralizar>$COFINS_unidade_mostrar <input class=form-check-input type=checkbox name=cofins id=cofins_$id_input > <hr> $Cofins </td>";
    #------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    
    /*$PIS_valor = round($PIS_valor, 2);
    $PIS_valor_mostrar= number_format($PIS_valor, 2 , ",", ".");*/
    //$tabela .= "$PIS_valor_mostrar;";
    //echo "<td class= centralizar>$PIS_valor_mostrar</td>";
    
    //$Cofins_valor= round($Cofins_valor, 2);
    //$Cofins_valor_mostrar= number_format($Cofins_valor, 2 , ",", ".");
    //$tabela .= "$Cofins_valor_mostrar;";
    //echo "<td class= centralizar>$Cofins_valor_mostrar</td>";
    
    //$tabela .= "$Cofins;";
    //echo "<td class= centralizar>$Cofins</td>";
    #------------------------------------------------------------------------------------------
    if ($ICMSST == null){
      $ICMSST = 0;
    }else{
      $ICMSST = round($ICMSST,2);
      $ICMSST_unidade = $ICMSST/$quantidade;
    }
    $ICMSST= round($ICMSST, 2);
    $ICMSST_mostrar= number_format($ICMSST, 4 , ",", ".");
    $tabela .= "$ICMSST_mostrar;";  
    //echo "<td class= centralizar>$ICMSST_mostrar</td>";
    #verificação do ICMS ST
    #------------------------------------------------------------------------------------------
    $ICMSST_unidade= round($ICMSST_unidade, 2);
    $ICMSST_unidade_mostrar= number_format($ICMSST_unidade, 2 , ",", ".");
    $tabela .= "$ICMSST_unidade_mostrar;";
    echo "<td class= centralizar>$ICMSST_unidade_mostrar</td>";
    #------------------------------------------------------------------------------------------
    
    $IPI_total_mostrar = number_format($IPI,2 , ",", ".");
    $tabela .= "$IPI;";
    //echo "<td class= centralizar>$IPI_total_mostrar</td>";
    #------------------------------------------------------------------------------------------
    
    $IPI_unidade = round($IPI_unidade,2);
    $IPI_unidade_mostrar= number_format($IPI_unidade, 2 , ",", ".");
    $tabela .= "$IPI_unidade_mostrar;";
    echo "<td class= centralizar>$IPI_unidade_mostrar</td>";
    #------------------------------------------------------------------------------------------ 
    
    $porcentagem_frete = ($frete_total / $valor_NF_total)* 100;
    $tabela .= "$porcentagem_frete %;";
    //echo "<td class= centralizar>$porcentagem_frete %</td>";
    #------------------------------------------------------------------------------------------
    
    $valor_frete = ($valor_unitario + $IPI_unidade + $ICMSST_unidade)*$porcentagem_frete;
    $tabela .= "$valor_frete;";
    echo "<td class= centralizar>$valor_frete</td>";
    #------------------------------------------------------------------------------------------
    
    $custo_finan = $valor_unitario + $ICMSST_unidade+ $IPI_unidade + $valor_frete ;
    $custo_finan = round($custo_finan,2);
    $custo_finan = $porcent_acressimo+$custo_finan;
    $custo_finan_mostrar= number_format($custo_finan, 4 , ",", ".");
    $tabela .= "$custo_finan_mostrar;";
    echo "<td class= centralizar>$custo_finan_mostrar</td>";

    
    #------------------------------------------------------------------------------------------
    $bonificacao = 0;
    if(!empty($_POST['bonificacao'])){
    $bonificacao = $_POST['bonificacao'];
    }
    $bonificação_valor_final = floatval($bonificacao ) / 100;
    $bonificação = $custo_finan * $bonificação_valor_final;
    $bonificação = round($bonificação,2);
    $bonificação_mostrar= number_format($bonificação , 2 , ",", ".");
    $tabela .= "$bonificação_mostrar;";
    echo "<td class= centralizar> $bonificação_mostrar <input type=text class=form-control name=bonificacao id=bonificacao_$id_input ></td>";
    #Bonificação
    #------------------------------------------------------------------------------------------
    
    $custo_bonifi = $custo_finan - $bonificação;
    $custo_bonifi = round($custo_bonifi,2);
    $custo_bonifi_mostrar= number_format($custo_bonifi, 2 , ",", ".");
    $tabela .= "$custo_bonifi_mostrar;";
    echo "<td class= centralizar>$custo_bonifi_mostrar</td>";
    #Custo Financeiro menos a bonificação
    #------------------------------------------------------------------------------------------
    $cust_contabil = $custo_bonifi;
    //echo "antes: $cust_contabil---";
    if($_POST['icms'] == 'on'){
      $cust_contabil =  $cust_contabil - $ICMS_unidade;
      //echo "ICMS: $cust_contabil---";
    }
    if($_POST['pis'] == 'on'){
      $cust_contabil =  $cust_contabil - $PIS_unidade;
      //echo "PIS: $cust_contabil---";
    }
    if($_POST['cofins'] == 'on'){
      $cust_contabil =  $cust_contabil - $COFINS_unidade;
      //echo "cofins: $cust_contabil---";
    }
        if($_POST['icms'] == 'off'){
      $cust_contabil =  $cust_contabil + $ICMS_unidade;
      //echo "ICMS: $cust_contabil---";
    }
    if($_POST['pis'] == 'off'){
      $cust_contabil =  $cust_contabil + $PIS_unidade;
      //echo "PIS: $cust_contabil---";
    }
    if($_POST['cofins'] == 'off'){
      $cust_contabil =  $cust_contabil + $COFINS_unidade;
      //echo "cofins: $cust_contabil---";
    }
    
    $cust_contabil_mostrar= number_format($cust_contabil, 4 , ",", ".");
    $tabela .= "$cust_contabil_mostrar;";
    echo "<td class= centralizar>$cust_contabil_mostrar</td>";
    #Custo Contabil
    #------------------------------------------------------------------------------------------
    
    $markup = 0;
    if(!empty($_POST['markup'])){
      $markup = $_POST['markup'];
    }
    $MKP_contabil = $cust_contabil * $markup;
    $MKP_contabil = round($MKP_contabil,2);
    $MKP_contabil_mostrar= number_format($MKP_contabil, 2 , ",", ".");
    $tabela .= "$MKP_contabil_mostrar;";
    echo "<td class= centralizar>$MKP_contabil_mostrar <input type=text class=form-control name=markup id=markup_$id_input ></td>";
    #Markup de venda
    #------------------------------------------------------------------------------------------
    ?>
     
    </form>      
    <?php            
    #fim do formulario de cada item
    #------------------------------------------------------------------------------------------

    
    $dif_mkpcontabil = $MKP_contabil/($custo_finan-$bonificação);
    $dif_mkpcontabil = round($dif_mkpcontabil,4);
    $tabela .= "$dif_mkpcontabil;";
    echo "<td class= centralizar>$dif_mkpcontabil</td>";
    
    $Contagem = $Contagem+ 1;
    $id_input++;
    
  
  array_push($array_tabela ,$tabela);
  }
  array_push($array_tabela2 ,$array_tabela);
  
  $_SESSION['tabela'] = $array_tabela2;
  
  ?>
                
              </div>
              </div>
                <!-- Div Final -->
                </tbody>
                </table>
                <div class='card shadow p-3 mb-5 rounded-top centralizar'>
                  <button type="submit" class="btn btn-outline-info btn-lg" form ="form_geral_2" >Consultar individualmente</button>
               </div>
                    
              </div>
                <!-- Bootstrap core JS-->
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
                <!-- Core theme JS-->
                <script src="sidebar/js/scripts.js"></script>
                <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>  
                <script type="text/javascript">
                  jQuery(function($){                
                    $('#form-exemplo').submit(function(){                    
                      $.post('formacao_de_preco_proce.php', $('#form-exemplo input'), function(retorno){                        
                        alert(retorno);
                      }, 'html');
                      
                      return false;
                    });
                  });
                </script>
              </body>
              </html>
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                







































































































































































































































































































































































































































































































