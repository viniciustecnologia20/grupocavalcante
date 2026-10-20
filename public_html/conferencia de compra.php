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
        }
        
      </style>
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
              <br>
            <!--conteudo da pagina-->
            <?php
            $csv_copia = ( $_FILES['CSV']['tmp_name']);
            $_SESSION['csv_copia'] = $csv_copia;
            #Recebe o CSV e o copia
            #-----------------------------------------------------------------------------------------
            $delimitador = ',';
            $cerca = '"';
            $myfile1 = $_FILES['CSV']['tmp_name'];
            $f = fopen($myfile1 ,'r');
            $lista = array();
            if ($f) {
              
              // Ler cabecalho do arquivo
              $cabecalho = fgetcsv($f, 0, $delimitador, $cerca);
              
              // Enquanto nao terminar o arquivo
              while (!feof($f)) {
                
                // Ler uma linha do arquivo
                $linha = fgetcsv($f, 0, $delimitador, $cerca);
                if (!$linha) {
                  continue;
                  
                }
                $registro = array_combine($cabecalho, $linha);
                array_push($lista,$registro);
                //array_push($lista,$linha);
                
              }
            }
            echo "<pre>";
            //print_r($lista);
            echo "</pre>";
            #Recebe o CSV e le ele
            #-----------------------------------------------------------------------------------------
            $xml_copia = file_get_contents( $_FILES['XML']['tmp_name']);
            $_SESSION['xml_copia_Conferencia'] = $xml_copia;
            #Recebe o XML e o copia
            #----------------------------------------------------------------------------------------
            $myfile2 = $_FILES['XML']['tmp_name'];
            $xml = simplexml_load_file($myfile2);
            $Contagem = 1;
            #Recebe o XML e le ele
            #------------------------------------------------------------------------------------------

            function in_array_r($needle, $haystack, $strict = false) {
              foreach ($haystack as $item) {
                if (($strict ? $item === $needle : $item == $needle) || (is_array($item) && in_array_r($needle, $item, $strict))) {
                  return true;
                }
              }
              
              return false;
            }
            #Função de busca
            #------------------------------------------------------------------------------------------
            ?>
                <div>
                  <div>
                    <!-- <a href="download_conferencia.php"><button class="btn btn-outline-info btn-lg btn-download">Download da Operação</button></a>-->
                    <button class="btn btn-outline-info btn-lg" onclick="exportarParaExcel()">Download da Operação</button>
                  </div>
                  <div class="summary" id="reportSummary">
                    <hr>
                    <h2>Resumo do Relatório</h2>
                    <p>Número total de células inválidas: <span id="invalidCellCount">0</span></p>
                  </div>
                  <hr>
                  <div class="table-responsive">
                  <table id='table' class="table table-bordered table-hover table-striped">
                    <thead class="thead-dark">
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Descrição</th>
                        <th scope="col">SKU</th>
                        <th scope="col">EAN</th>
                        <th scope="col">Situação</th>
                        <th scope="col">NCM</th>
                        <th scope="col">Situação</th>
                        <th scope="col">CEST</th>
                        <th scope="col">Situação</th>
                        <th scope="col">Origem</th>
                        <th scope="col">Situação</th>
                        <th scope="col">Codigo do Fabricante</th>
                        <th scope="col">Situação</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
					
					
	$teste = $xml->NFe->infNFe->emit;
	
	if($teste == null ){
		$teste = $xml->nfeProc->NFe->infNFe->emit;
	}
	
   foreach ($teste as $titulo_arquivo){
		$nome = $titulo_arquivo->xNome;
   }
  
   	$teste = $xml->NFe->infNFe->ide;
	if($teste == null ){
		$teste = $xml->nfeProc->NFe->infNFe->ide;
	}
  foreach ($teste as $titulo_arquivo){
    $numero_nfe = $titulo_arquivo->nNF;
  }
  
  $titulo_download = $nome ." - ".$numero_nfe;
  $_SESSION['titulo_conferencia'] =  $titulo_download;
  #------------------------------------------------------------------------------------------
  $array_tabela = array();
  $array_tabela2 = array();
  $array_tabelaout = '';
  $situacao ='';
  
  $teste =$xml->NFe->infNFe->det;
	if($teste == null){
	  $teste =$xml->nfeProc->NFe->infNFe->det;	
	}
	
  if($teste == null ){
		$teste = $xml->infNFe->det;
	}
  
  foreach ($teste as $itens){
    $achou = false;
	//echo "<pre>";
	//print_r ($lista);
	//echo "</pre>";
	
    foreach($lista as $linhas){
    $Cod_fabricante = $itens->prod->cProd;
    $tabela = "";
    $array_tabela = array();
    $EAN = $itens->prod->cEAN;
      if($EAN[0] == 0){
        $EAN= substr($EAN, 1);
      }
    //if($EAN == $linhas['GTIN/EAN']){
      //echo $EAN."</br>";
      //echo "achou com esse SKU:". $linhas['Código (SKU)'];
    //}
    $NCM = $itens->prod->NCM;
    $NCM = substr_replace($NCM, '.' , -2 , -4);
    $NCM = substr_replace($NCM, '.' , 4 , -5);
    #verificação dos campos sem variação do XML
    #------------------------------------------------------------------------------------------
    $CEST = $itens->prod->CEST;
    $CEST = substr_replace($CEST , '.' , -2 , -4);
    $CEST = substr_replace($CEST , '.' , 2 , -6);
    if($CEST == 0){
      $CEST = 0;
    }
    #verificação da CEST
    #------------------------------------------------------------------------------------------
    if($itens->imposto->ICMS->ICMS00->orig != null){#ICMS00
      $orig = $itens->imposto->ICMS->ICMS00->orig;
    }elseif ($itens->imposto->ICMS->ICMS10->orig  !=  null) {#ICMS10
      $orig = $itens->imposto->ICMS->ICMS10->orig;
    }elseif ($itens->imposto->ICMS->ICMS20->orig  !=  null) {#ICMS20
      $orig = $itens->imposto->ICMS->ICMS20->orig;
    }elseif ($itens->imposto->ICMS->ICMS30->orig  !=  null) {#ICMS30
      $orig = $itens->imposto->ICMS->ICMS30->orig;
      $orig = $orig ."Nacional, mercadoria ou bem com Conteúdo de Importação superior a 40% (quarenta por cento) e inferior ou igual a 70% (setenta por cento)";
    }elseif ($itens->imposto->ICMS->ICMS40->orig  !=  null) {#ICMS40
      $orig = $itens->imposto->ICMS->ICMS40->orig;
      $orig = $orig ."Nacional, cuja produção tenha sido feita em conformidade com os processos produtivos básicos de que tratam o Decreto-Lei nº 288/67, e as Leis nºs 8.248/91, 8.387/91, 10.176/01 e 11.484/07";
    }elseif ($itens->imposto->ICMS->ICMS41->orig  !=  null) {#ICMS41
      $orig = $itens->imposto->ICMS->ICMS41->orig;
    }elseif ($itens->imposto->ICMS->ICMS50->orig  !=  null) {#ICMS50
      $orig = $itens->imposto->ICMS->ICMS50->orig;
    }elseif ($itens->imposto->ICMS->ICMS51->orig  !=  null) {#ICMS51
      $orig = $itens->imposto->ICMS->ICMS51->orig;
    }elseif ($itens->imposto->ICMS->ICMS60->orig  !=  null) {#ICMS60
      $orig = $itens->imposto->ICMS->ICMS60->orig;
    }elseif ($itens->imposto->ICMS->ICMS70->orig  !=  null) {#ICMS70
      $orig = $itens->imposto->ICMS->ICMS70->orig;
    }elseif ($itens->imposto->ICMS->ICMS90->orig  !=  null) {#ICMS90
      $orig = $itens->imposto->ICMS->ICMS90->orig;
    }elseif($itens->imposto->ICMS->ICMSST->orig  !=  null)  {#ICMSST
      $orig = $itens->imposto->ICMS->ICMSST->orig;
    }

    $Norigem ='' ;
    $Norigem = $orig ;
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
    
    $descrição = $itens->prod->xProd;
    
    #define campos que não serao validados
    #------------------------------------------------------------------------------------------
    if($itens->imposto->ICMS->ICMS00->orig != null){#ICMS00
      $CST = $itens->imposto->ICMS->ICMS00->CST;
      $CST = (string)$CST . " - Tributada integralmente";
      $ICMS = $itens->imposto->ICMS->ICMS00->vICMS;
      $ICMSST = $itens->imposto->ICMS->ICMS00->vICMSST;
    }elseif ($itens->imposto->ICMS->ICMS10->orig  !=  null) {#ICMS10
      $CST = $itens->imposto->ICMS->ICMS10->CST;
      $CST = (string)$CST . " - Tributada e com cobrança do ICMS por substituição tributária";
      $ICMS = $itens->imposto->ICMS->ICMS10->vICMS;
      $ICMSST = $itens->imposto->ICMS->ICMS10->vICMSST;
    }elseif ($itens->imposto->ICMS->ICMS20->orig  !=  null) {#ICMS20
      $CST = $itens->imposto->ICMS->ICMS20->CST;
      $CST = (string)$CST . " - Com redução da BC";
      $ICMS = $itens->imposto->ICMS->ICMS20->vICMS;
      $ICMSST = $itens->imposto->ICMS->ICMS20->vICMSST;
    }elseif ($itens->imposto->ICMS->ICMS30->orig  !=  null) {#ICMS30
      $CST = $itens->imposto->ICMS->ICMS30->CST;
      $CST = (string)$CST . " - Isenta / não tributada e com cobrança do ICMS por substituição tributária";
      $ICMS = $itens->imposto->ICMS->ICMS30->vICMS;
      $ICMSST = $itens->imposto->ICMS->ICMS30->vICMSST;
    }elseif ($itens->imposto->ICMS->ICMS40->orig  !=  null) {#ICMS40
      $CST = $itens->imposto->ICMS->ICMS40->CST;
      $CST = (string)$CST . " - Isenta";
      $ICMS = $itens->imposto->ICMS->ICMS40->vICMS;
      $ICMSST = $itens->imposto->ICMS->ICMS40->vICMSST;
    }elseif ($itens->imposto->ICMS->ICMS41->orig  !=  null) {#ICMS41
      $CST = $itens->imposto->ICMS->ICMS41->CST;
      $CST = (string)$CST . " - Não tributada";
      $ICMS = $itens->imposto->ICMS->ICMS41->vICMS;
      $ICMSST = $itens->imposto->ICMS->ICMS41->vICMSST;
    }elseif ($itens->imposto->ICMS->ICMS50->orig  !=  null) {#ICMS50
      $CST = $itens->imposto->ICMS->ICMS50->CST;
      $CST = (string)$CST . " - Com suspensão";
      $ICMS = $itens->imposto->ICMS->ICMS50->vICMS;
      $ICMSST = $itens->imposto->ICMS->ICMS0->vICMSST;
    }elseif ($itens->imposto->ICMS->ICMS51->orig  !=  null) {#ICMS51
      $CST = $itens->imposto->ICMS->ICMS51->CST;
      $CST = (string)$CST . " - Com diferimento";
      $ICMS = $itens->imposto->ICMS->ICMS51->vICMS;
      $ICMSST = $itens->imposto->ICMS->ICMS51->vICMSST;
    }elseif ($itens->imposto->ICMS->ICMS60->orig  !=  null) {#ICMS60
      $CST = $itens->imposto->ICMS->ICMS60->CST;
      $CST = (string)$CST . " - ICMS cobrado anteriormente por substituição tributária";
      $ICMS = $itens->imposto->ICMS->ICMS60->vICMS;
      $ICMSST = $itens->imposto->ICMS->ICMS60->vICMSST;
    }elseif ($itens->imposto->ICMS->ICMS70->orig  !=  null) {#ICMS70
      $CST = $itens->imposto->ICMS->ICMS70->CST;
      $CST = (string)$CST . " - Com redução da BC e cobrança do ICMS por substituição tributária";
      $ICMS = $itens->imposto->ICMS->ICMS70->vICMS;
      $ICMSST = $itens->imposto->ICMS->ICMS70->vICMSST;
    }elseif ($itens->imposto->ICMS->ICMS90->orig  !=  null) {#ICMS90
      $CST = $itens->imposto->ICMS->ICMS90->CST;
      $CST = (string)$CST . " - Outras";
      $ICMS = $itens->imposto->ICMS->ICMS90->vICMS;
      $ICMSST = $itens->imposto->ICMS->ICMS90->vICMSST;
    }
    #verificação da Origem, CST, ICMS
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
    }#PIS verificação tributaria
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
    
    $tabela ='';
    if ($EAN == ""){
      $tabela .= "$Contagem;";
      $tabela .= "$descrição;";
      $tabela .= 'NFe com EAN em branco, comunicar o Fabricante e verificar na conferência;';
      $tabela .= 'por favor revisar este produto;';
      
      echo "<tr>";
      echo "<td>$Contagem</td>";
      echo "<td>$descrição</td>";
      echo "<td class='invalid-cell' style='color: red;' >NFe com EAN em branco, comunicar o Fabricante e verificar na conferência </td>";
      echo "<td class='invalid-cell' style='color: red;' >por favor revisar este produto </td>";
      
    }
    if ($EAN == "SEM GTIN"){
      
      $tabela .= "$Contagem;";
      $tabela .= "$descrição;";
      $tabela .= 'NFe sem EAN "SEM GTIN" , comunicar o Fabricante e verificar na conferência;';
      $tabela .= 'por favor revisar este produto;';
      
      echo "<tr>";
      echo "<td>$Contagem</td>";
      echo "<td>$descrição</td>";
      echo "<td class='invalid-cell' style='color: red;' >NFe sem EAN SEM GTIN , comunicar o Fabricante e verificar na conferência </td>";
      echo "<td class='invalid-cell' style='color: red;' >por favor revisar este produto </td>";
      
      
      $Contagem = $Contagem + 1;
    }else{
      $SKU = $linhas['Código (SKU)'];
      if($EAN == $linhas['GTIN/EAN']){
        $achou = true;
        $tabela .= "$Contagem;";
        $tabela .= "$descrição;";
        $tabela .= "$SKU;";
        $tabela .= "$EAN;";
        $tabela .= 'Correto;';
        
        echo "<tr>";
        echo "<td>$Contagem</td>";
        echo "<td>$descrição</td>";
        echo "<td>$SKU</td>";
        echo "<td>$EAN</td>";
        echo "<td style='color: green;'>Correto</td>";
        
        
        
        if($NCM == $linhas['Classificação fiscal']){
          $tabela .= "$NCM;";
          $tabela .= 'Correto;';
          
          echo "<td>$NCM</td>";
          echo "<td style='color: green;'>Correto</td>";
        }else{
          $tabela .= "$NCM;";
          $tabela .= 'Atualizar no sistema conforme a Nfe;';
          
          echo "<td>$NCM</td>";
          echo "<td class='invalid-cell' style='color: red;' >Atualizar no sistema conforme a Nfe</td>";
          
         }
          
        if($CEST == $linhas['CEST']){
          $tabela .= "$CEST;";
          $tabela .= 'Correto;';
          
          echo "<td>$CEST</td>";
          echo "<td style='color: green;'>Correto</td>";
          
        }else{
          $tabela .= "$CEST;";
          $tabela .= 'Informar o Fabricante, campo em branco na Nfe;';
            
          echo "<td>$CEST</td>";
          echo "<td class='invalid-cell' style='color: red;' >Informar o Fabricante, campo em branco na Nfe</td>";
          
        }
      
        if($Norigem == $linhas['Origem'][0]){
          
          
          $tabela .= "$orig;";
          $tabela .= 'Correto;';
          
          echo "<td>$orig</td>";
          echo "<td style='color: green;'>Correto</td>";
          
        }else{
          
          $tabela .= "$orig;";
          $tabela .= 'Corrigir no sistema conforme a Nfe;';
          
          echo "<td>$orig</td>";
          echo "<td class='invalid-cell' style='color: red;' >Corrigir no sistema conforme a Nfe</td>"; 
        }
        if($Cod_fabricante == $linhas['Cód do Fornecedor']){
          $tabela .= "$Cod_fabricante;";
          $tabela .= 'Correto;';
          
          
          echo "<td>$Cod_fabricante</td>";
          echo "<td style='color: green;'>Correto</td>";
          
        }else{
          
          $tabela .= "$Cod_fabricante;";
          $tabela .= 'Código diferente do cadastro, contatar o fabricante.;';
          
          //echo "<td> $linhas[Cód do fabricante] </td>";
		  echo "<td>$Cod_fabricante</td>";
      echo "<td class='invalid-cell' style='color: red;' >Código diferente do cadastro, contatar o fabricante.</td>";
          
        }#fim do if do cod fabricante
        
        /*$tabela .= "$CST;";
        $tabela .= "$PIS;";
        $tabela .= "$Cofins,";
        
        echo "<td>$CST</td>";
        echo "<td>$PIS</td>";
        echo "<td>$Cofins</td>";*/
        $achou = true;
        $Contagem = $Contagem + 1;
        break;

    }#fim do if EAN
    }#fechamento do else 
    }#fim do lop csv      
    if (!$achou){
    $tabela .= "$Contagem;";
    $tabela .= "$descrição;";
    $tabela .= "$SKU;";
    $tabela .= "$EAN;";
    $tabela .= "Efetuar o cadastro do produto;";
    $tabela .= "$NCM;";
    $tabela .= "Preencher conforme Nfe;";
    $tabela .= "$CEST;";
    $tabela .= "Preencher conforme Nfe;";
    $tabela .= "$orig;";
    $tabela .= "Preencher conforme Nfe;";
    $tabela .= "$Cod_fabricante;";
    $tabela .= "Preencher conforme Nfe;";
    $tabela .= "$CST;";
    $tabela .= "$PIS;";
    $tabela .= "$Cofins;";
    
    
    echo "<tr>";
    echo "<td>$Contagem</td>";
    echo "<td>$descrição</td>";
    echo "<td>$SKU</td>";
    echo "<td>$EAN</td>";
    echo "<td class='invalid-cell' style='color: red;' >Efetuar o cadastro do produto</td>";
    echo "<td>$NCM</td>";
    echo "<td class='invalid-cell' style='color: red;' >Preencher conforme Nfe</td>";
    echo "<td>$CEST</td>";
    echo "<td class='invalid-cell' style='color: red;' >Preencher conforme Nfe</td>";
    echo "<td>$orig</td>";
    echo "<td class='invalid-cell' style='color: red;' >Preencher conforme Nfe</td>";
    echo "<td>$Cod_fabricante</td>";
    echo "<td class='invalid-cell' style='color: red;' >Preencher conforme Nfe</td>";
    /*echo "<td>$CST</td>";
    echo "<td>$PIS</td>";
    echo "<td>$Cofins</td>";*/
    $Contagem = $Contagem + 1;
}


      
    
    if ($tabela != null){
    array_push($array_tabela ,$tabela);
    array_push($array_tabela2 ,$array_tabela);
    $_SESSION['tabela'] = $array_tabela2;
    //echo "<pre>";
    //print_r($array_tabela2);
    //echo "</pre>";
}#fim do if tabela download
}#fim do lop XML
  echo "</tr>";
  echo "</tbody>";
  echo "</table>";
  ?>
  <script>
    //função de download

var sufixo = "(CC)"

var titulo_download = "<?php echo $titulo_download ?>";



function exportarParaExcel() {
  var tabela = document.getElementById("table"); // Substitua "table" pelo ID de sua tabela.
  var resumoHTML = document.getElementById("reportSummary").outerHTML;

  var nomeArquivo = titulo_download + sufixo + ".xlsx";

  /* Crie uma matriz de dados a partir da tabela HTML, incluindo o cabeçalho */
  var data = [];
  var rows = tabela.querySelectorAll('tr');

  for (var i = 0; i < rows.length; i++) {
      var rowData = [];
      var cells = rows[i].querySelectorAll('td, th');
      for (var j = 0; j < cells.length; j++) {
          rowData.push(cells[j].textContent);
      }
      data.push(rowData);
  }

  /* Crie um objeto de workbook do Excel e adicione a tabela */
  var wb = XLSX.utils.book_new();
  var ws = XLSX.utils.aoa_to_sheet(data);

  // Crie uma nova planilha para o resumo
  var wsResumo = XLSX.utils.aoa_to_sheet([
    ["Resumo do Relatório"],
    [""], // linha em branco
    ["Número total de células inválidas:", document.getElementById("invalidCellCount").textContent]
  ]);

  // Adiciona o resumo como parte da primeira página
  var resumoRows = XLSX.utils.sheet_to_json(wsResumo, { header: 1 });
  XLSX.utils.sheet_add_aoa(ws, resumoRows, {origin: -1}); // Adiciona o resumo no final da planilha

  XLSX.utils.book_append_sheet(wb, ws, "Planilha 1");

  // Gere o arquivo Excel e inicie o download
  XLSX.writeFile(wb, nomeArquivo);
}


    // Obtém todas as células com a classe "invalid-cell"
    var invalidCells = document.getElementsByClassName("invalid-cell");

    // Obtém o número total de células inválidas
    var totalInvalidCells = invalidCells.length;

    if(totalInvalidCells == 0){
      totalInvalidCells = "0 " + '<br>' + "A conferência está 100%";
    }

    // Atualiza o número total de células inválidas no resumo do relatório
    document.getElementById("invalidCellCount").innerHTML  += totalInvalidCells;

    console.log(totalInvalidCells);

    // Armazena o número total de células inválidas no localStorage
    localStorage.setItem("totalInvalidCells", totalInvalidCells);

    // Adiciona o valor de totalInvalidCells como um parâmetro na URL do botão
    var downloadButton = document.querySelector('.btn-download');
    downloadButton.href = "download_conferencia.php?totalInvalidCells=" + totalInvalidCells;
    
  </script>
            <!-- Div Final -->
            </div>
            </div>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="sidebar/js/scripts.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

        <script src=" //ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js "></script>

        <script src="//cdn.rawgit.com/rainabba/jquery-table2excel/1.1.0/dist/jquery.table2excel.min.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.5/xlsx.full.min.js"></script>
    </body>
</html>









































































































































































































































































































































































































































































