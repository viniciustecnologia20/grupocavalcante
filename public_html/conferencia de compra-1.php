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
                <div class="sidebar-heading border-bottom bg-light">Opções</div>
                <div class="list-group list-group-flush">
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="home.html"><i class="bi bi-house-fill"></i> Home</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="pagina_consulta.html"><i class="bi bi-receipt-cutoff"></i> Conferencia de quantidade NFe</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="pagina_conferencia.html"><i class="bi bi-ui-checks"></i> Conferencia Cadastral</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="pagina_formacão_de_preço.html"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-coin" viewBox="0 0 16 16">
  <path d="M5.5 9.511c.076.954.83 1.697 2.182 1.785V12h.6v-.709c1.4-.098 2.218-.846 2.218-1.932 0-.987-.626-1.496-1.745-1.76l-.473-.112V5.57c.6.068.982.396 1.074.85h1.052c-.076-.919-.864-1.638-2.126-1.716V4h-.6v.719c-1.195.117-2.01.836-2.01 1.853 0 .9.606 1.472 1.613 1.707l.397.098v2.034c-.615-.093-1.022-.43-1.114-.9H5.5zm2.177-2.166c-.59-.137-.91-.416-.91-.836 0-.47.345-.822.915-.925v1.76h-.005zm.692 1.193c.717.166 1.048.435 1.048.91 0 .542-.412.914-1.135.982V8.518l.087.02z"/>
  <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
  <path fill-rule="evenodd" d="M8 13.5a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zm0 .5A6 6 0 1 0 8 2a6 6 0 0 0 0 12z"/>
</svg> Formação de Preço</a>
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
                //$registro = array_combine($cabecalho, $linha);
                //array_push($lista,$registro);
                array_push($lista,$linha);
                
              }
            }
            echo "<pre>";
            //print_r($lista);
            echo "</pre>";
            #Recebe o CSV e le ele
            #-----------------------------------------------------------------------------------------
            $xml_copia = file_get_contents( $_FILES['XML']['tmp_name']);
            $_SESSION['xml_copia_conferencia'] = $xml_copia;
            #Recebe o XML e o copia
            #----------------------------------------------------------------------------------------
            $myfile2 = $_FILES['XML']['tmp_name'];
            $xml = simplexml_load_file($myfile2);
            $Contagem = 1;
            #Recebe o XML e le ele
            #------------------------------------------------------------------------------------------
            function search( $haystack, $needle, $index = NULL ) {
              
              if( is_null( $haystack ) ) {
                return -1;
              }
              
              $arrayIterator = new RecursiveArrayIterator( $haystack );
              
              $iterator = new RecursiveIteratorIterator( $arrayIterator );
              
              while( $iterator -> valid() ) {
                
                if( ( ( isset( $index ) and ( $iterator -> key() == $index ) ) or
                      ( ! isset( $index ) ) ) and ( $iterator -> current() == $needle ) ) {
                        
                        return $arrayIterator -> key();
                      }
                
                $iterator -> next();
              }
              
              return -1;
            }
            #Função de busca
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
                    <a href="download_conferencia.php"><button class="btn btn-outline-info btn-lg">Download da Operação</button></a>
                  </div>
                  <hr>
                  <div class="table-responsive">
                  <table class="table table-bordered table-hover table-striped">
                    <thead class="thead-dark">
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Descrição</th>
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
                        <th scope="col">Situação Tributária do ICMS</th>
                        <th scope="col">Situação Tributaria do PIS</th>
                        <th scope="col">Situação tributaria do COFINS</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
  foreach ($xml->NFe->infNFe->emit as $titulo_arquivo){
    $nome = $titulo_arquivo->xNome;
  }
  foreach ($xml->NFe->infNFe->ide as $titulo_arquivo){
    $numero_nfe = $titulo_arquivo->nNF;
  }
  $titulo_download = $nome ." - ".$numero_nfe;
  $_SESSION['titulo_conferencia'] =  $titulo_download;
  #------------------------------------------------------------------------------------------
  $lista_origem = array();
  $lista_ean = array();
  $lista_ean_final = array();
  foreach($lista as $i => $lista_2){
    $origem_string = $lista_2[5]. "</br>";
    array_push($lista_origem , $origem_string[0]);
    array_push($lista_ean, $lista_2[19]);
    $lista_ean = array_filter($lista_ean);
  }
  foreach($lista_ean as $listaEAN){
    $lista_ean_final[$listaEAN] = '';
  }
  
  $lista_nova = array();
  $i = 0;
  
  foreach($lista_ean_final as $chave => $valor){
    $lista_nova[$chave] = $lista_origem[$i];
    $i++;
  }
  
  //echo "<pre>";
  //print_r($lista_nova);
  //echo "</pre>";
  #cria um array com a chave o EAN e o valor a origem para fazer a verificação
  #------------------------------------------------------------------------------------------
  /*$lista_ncm = array();
  $lista_ean = array();
  $lista_ean_final = array();
  foreach($lista as $i => $lista_2){
    $origem_string = $lista_2[4]. "</br>";
    array_push($lista_ncm , $origem_string[0]);
    array_push($lista_ean, $lista_2[19]);
    $lista_ean = array_filter($lista_ean);
  }
  foreach($lista_ean as $listaEAN){
    $lista_ean_final[$listaEAN] = '';
  }
  
  $lista_nova = array();
  $i = 0;
  
  foreach($lista_ean_final as $chave => $valor){
    $lista_ncm[$chave] = $lista_ncm[$i];
    $i++;
  }*/
  
  echo "<pre>";
  //print_r($lista[ ][1]);
  echo "</pre>";
  #cria um array com a chave o EAN e o valor o NCM para fazer a verificação
  #------------------------------------------------------------------------------------------
  $array_tabela = array();
  $array_tabela2 = array();
  $situacao ='';
  foreach ($xml->NFe->infNFe->det as $itens){
    $Cod_fabricante = $itens->prod->cProd;
    $tabela = "";
    $array_tabela = array();
    $EAN = $itens->prod->cEAN;
    $EAN = strval($EAN);
    if($EAN[0] == 0){
      $EAN= substr($EAN, 1);
    }
    $NCM = $itens->prod->NCM;
    $NCM = substr_replace($NCM, '.' , -2 , -4);
    $NCM = substr_replace($NCM, '.' , 4 , -5);
    $SKU = $lista[0][1];
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
    $tabela ='';
    if ($EAN == "SEM GTIN"){
      
      $tabela .= "$Contagem;";
      $tabela .= "$descrição;";
      $tabela .= '# EAN  Invalido ou inexistente #;';
      $tabela .= 'por favor revisar este produto;';
      
      echo "<tr>";
      echo "<td>$Contagem</td>";
      echo "<td>$descrição</td>";
      echo "<td>EAN # Invalido ou inexistente #</td>";
      echo "<td>por favor revisar este produto #</td>";
      echo "<td>$NCM</td>";
      echo "<td># Invalido #</td>";
      echo "<td>$CEST</td>";
      echo "<td># Invalido #</td>";
      echo "<td>$orig</td>";
      echo "<td># Invalido #</td>";
      echo "<td>$Cod_fabricante</td>";
      echo "<td># Invalido #</td>";
      echo "<td>$CST</td>";
      echo "<td>$PIS</td>";
      echo "<td>$Cofins</td>";
      
      $Contagem = $Contagem + 1;
    }else{
      if (in_array_r($EAN, $lista)) {#Verifica se existe o EAN
        $tabela .= "$Contagem;";
        $tabela .= "$descrição;";
        $tabela .= "$EAN;";
        $tabela .= 'Confere;';
        
        echo "<tr>";
        echo "<td>$Contagem</td>";
        echo "<td>$descrição</td>";
        echo "<td>$EAN</td>";
        echo "<td>Confere</td>";
        
        
        $Contagem = $Contagem + 1;
        
        if (in_array_r($NCM, $lista)){#Verifica se existe o NCM
          
          
          $tabela .= "$NCM;";
          $tabela .= 'Confere;';
          
          echo "<td>$NCM</td>";
          echo "<td>Confere</td>";
          
        }else{
          
          $tabela .= "$NCM;";
          $tabela .= '# Invalido #;';
          
          echo "<td>$NCM</td>";
          echo "<td># Invalido #</td>";  
          
          
        }
        if (in_array_r($CEST,$lista)){#Verifica se existe o CEST
          
          $tabela .= "$CEST;";
          $tabela .= 'Confere;';
          
          echo "<td>$CEST</td>";
          echo "<td>Confere</td>";
          
        }else{
          
          $tabela .= "$CEST;";
          $tabela .= '# Invalido #;';
          
          echo "<td>$CEST</td>";
          echo "<td># Invalido #</td>";
          
        }
        $EAN = strval($EAN);
        /*echo $Contagem." XML: ".$Norigem. "</br>";#XML
        echo $Contagem." nota: ".$lista_nova[$EAN]. "</br>";*/
        if ($lista_nova[$EAN] == $Norigem){#Verifica se existe Origem
          
          $tabela .= "$orig;";
          $tabela .= 'Confere;';
          
          echo "<td>$orig</td>";
          echo "<td>Confere</td>";
          
        }else{
          
          $tabela .= "$orig;";
          $tabela .= '# Invalido #;';
          
          echo "<td>$orig</td>";
          echo "<td># Invalido #</td>";
          
        }
        
        if (in_array_r($Cod_fabricante, $lista)){
          $tabela .= "$Cod_fabricante;";
          $tabela .= 'Confere;';
          
          
          echo "<td>$Cod_fabricante</td>";
          echo "<td>Confere</td>";
          
        }else{
          
          $tabela .= "$Cod_fabricante;";
          $tabela .= '# Invalido #;';
          
          echo "<td>$Cod_fabricante</td>";
          echo "<td># Invalido #</td>";
          
        }
        $tabela .= "$CST;";
        $tabela .= "$PIS;";
        $tabela .= "$Cofins,";
        
        echo "<td>$CST</td>";
        echo "<td>$PIS</td>";
        echo "<td>$Cofins</td>";
        
      }else{
        
        $tabela .= "$Contagem;";
        $tabela .= "$descrição;";
        $tabela .= "$EAN;";
        $tabela .= '# Invalido #;';

        echo "<tr>";
        echo "<td>$Contagem </td>";
        echo "<td>$descrição</td>";
        echo "<td>$EAN</td>";
        echo "<td># Invalido #</td>";
        echo "<td>$NCM</td>";
        echo "<td># Invalido #</td>";
        echo "<td>$CEST</td>";
        echo "<td># Invalido #</td>";
        echo "<td>$orig</td>";
        echo "<td># Invalido #</td>";
        echo "<td>$Cod_fabricante</td>";
        echo "<td># Invalido #</td>";
        echo "<td>$CST</td>";
        echo "<td>$PIS</td>";
        echo "<td>$Cofins</td>";
        
        $Contagem = $Contagem + 1;
      }
    }
    array_push($array_tabela ,$tabela);
    array_push($array_tabela2 ,$array_tabela);
    $_SESSION['tabela'] = $array_tabela2;
    //echo "<pre>";
    //print_r($_SESSION['tabela']);
    //echo "</pre>";
  }
  echo "</tr>";
  echo "</tbody>";
  echo "</table>";
  ?>
            <!-- Div Final -->
            </div>
            </div>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="sidebar/js/scripts.js"></script>
    </body>
</html>














































































