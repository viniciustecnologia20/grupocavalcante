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
            <!--conteudo da pagina-->
            <?php
            #------------------------------------------------------------------------------------------
            #Função Impostos #FECHEDA TEMPORARIAMENTE#
            #------------------------------------------------------------------------------------------
            $myfile2 = $_SESSION['xml_copia_formação'];
            $xml = simplexml_load_string($myfile2);
            $Contagem = 1;
            #Recebe o XML e le ele
            #------------------------------------------------------------------------------------------
        ?>
      <div>
        <a href="download_formação_boni.php"><button class="btn btn-outline-info btn-lg">Download da Operação</button></a>
      </div>
      <hr>
            <div class=" border-dark rounded">
            <table class="table table-striped table-responsive table-bordered table-hover">
                    <thead class="thead-dark table-striped centralizar ">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">descrição</th>
                            <th scope="col">Codigo do fabricante</th>
                            <th scope="col">Quantidade de peças</th>
                            <th scope="col">Valor da unidade</th>
                            <th scope="col">ICMS</th>
                            <th scope="col">Valor do PIS</th>
                            <th scope="col">Valor do COFINS</th>
                            <th scope="col">ICMS ST</th>
                            <th scope="col">ICMS ST da unidade</th>
                            <th scope="col">IPI da unidade</th>
                            <th scope="col">Custo financeiro</th>
                            <th scope="col">Bonificação</th>
                            <th scope="col">Custo - bonificação</th>
                            <th scope="col">Custo contabil</th>
                            <th scope="col">MKP Contabil</th>
                            <th scope="col">Fator do MKP contabil</th>
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
  $_SESSION['titulo_formação_boni'] =  $titulo_download;
  $array_tabela = array();
  $array_tabela2 = array();
  #------------------------------------------------------------------------------------------
  foreach($xml->NFe->infNFe->total as $itens_2){    
    $vtotal = $itens_2->ICMSTot->vNF;
    $vtotal_frete = $itens_2->ICMSTot->vFrete;
  }
  $porcent_acressimo = $vtotal - $vtotal_frete;
  $porcent_acressimo = $vtotal_frete / $porcent_acressimo;
  $porcent_acressimo = round($porcent_acressimo,8);
  $porcent_acressimo = ($porcent_acressimo *100);
  //echo "% de acressimo: ".$porcent_acressimo."</br>";
  #------------------------------------------------------------------------------------------
  
  foreach ($xml->NFe->infNFe->det as $itens){
    
    $EAN = $itens->prod->cEAN;
    
    $cProd = $itens->prod->cProd;
    
    $descrição = $itens->prod->xProd;  
    
    $valor_unitario = $itens->prod->vUnCom;
    $valor_unitario = floatval($valor_unitario);
    $valor_unitario = round($valor_unitario, 2);
    
    
    
    $IPI = $itens->imposto->IPI->IPITrib->vIPI;
    $IPI = round($IPI,2);
    
    
    $quantidade = $itens->prod->qCom;
    $quantidade = round($quantidade,1);
    
    $IPI_unidade = $IPI/$quantidade;
    
    
    #------------------------------------------------------------------------------------------
    if($itens->imposto->ICMS->ICMS00->orig != null){#ICMS00
      $orig = $itens->imposto->ICMS->ICMS00->orig;
      $CST = $itens->imposto->ICMS->ICMS00->CST;
      $CST = (string)$CST . " - Tributada integralmente";
      $ICMS = $itens->imposto->ICMS->ICMS00->vICMS;
      $ICMSST = $itens->imposto->ICMS->ICMS00->vICMSST;
    }elseif ($itens->imposto->ICMS->ICMS10->orig  !=  null) {#ICMS10
      $orig = $itens->imposto->ICMS->ICMS10->orig;
      $CST = $itens->imposto->ICMS->ICMS10->CST;
      $CST = (string)$CST . " - Tributada e com cobrança do ICMS por substituição tributária";
      $ICMS = $itens->imposto->ICMS->ICMS10->vICMS;
      $ICMSST = $itens->imposto->ICMS->ICMS10->vICMSST;
    }elseif ($itens->imposto->ICMS->ICMS20->orig  !=  null) {#ICMS20
      $orig = $itens->imposto->ICMS->ICMS20->orig;
      $CST = $itens->imposto->ICMS->ICMS20->CST;
      $CST = (string)$CST . " - Com redução da BC";
      $ICMS = $itens->imposto->ICMS->ICMS20->vICMS;
      $ICMSST = $itens->imposto->ICMS->ICMS20->vICMSST;
    }elseif ($itens->imposto->ICMS->ICMS30->orig  !=  null) {#ICMS30
      $orig = $itens->imposto->ICMS->ICMS30->orig;
      $CST = $itens->imposto->ICMS->ICMS30->CST;
      $CST = (string)$CST . " - Isenta / não tributada e com cobrança do ICMS por substituição tributária";
      $ICMS = $itens->imposto->ICMS->ICMS30->vICMS;
      $ICMSST = $itens->imposto->ICMS->ICMS30->vICMSST;
    }elseif ($itens->imposto->ICMS->ICMS40->orig  !=  null) {#ICMS40
      $orig = $itens->imposto->ICMS->ICMS40->orig;
      $CST = $itens->imposto->ICMS->ICMS40->CST;
      $CST = (string)$CST . " - Isenta";
      $ICMS = $itens->imposto->ICMS->ICMS40->vICMS;
      $ICMSST = $itens->imposto->ICMS->ICMS40->vICMSST;
    }elseif ($itens->imposto->ICMS->ICMS41->orig  !=  null) {#ICMS41
      $orig = $itens->imposto->ICMS->ICMS41->orig;
      $CST = $itens->imposto->ICMS->ICMS41->CST;
      $CST = (string)$CST . " - Não tributada";
      $ICMS = $itens->imposto->ICMS->ICMS41->vICMS;
      $ICMSST = $itens->imposto->ICMS->ICMS41->vICMSST;
    }elseif ($itens->imposto->ICMS->ICMS50->orig  !=  null) {#ICMS50
      $orig = $itens->imposto->ICMS->ICMS50->orig;
      $CST = $itens->imposto->ICMS->ICMS50->CST;
      $CST = (string)$CST . " - Com suspensão";
      $ICMS = $itens->imposto->ICMS->ICMS50->vICMS;
      $ICMSST = $itens->imposto->ICMS->ICMS0->vICMSST;
    }elseif ($itens->imposto->ICMS->ICMS51->orig  !=  null) {#ICMS51
      $orig = $itens->imposto->ICMS->ICMS51->orig;
      $CST = $itens->imposto->ICMS->ICMS51->CST;
      $CST = (string)$CST . " - Com diferimento";
      $ICMS = $itens->imposto->ICMS->ICMS51->vICMS;
      $ICMSST = $itens->imposto->ICMS->ICMS51->vICMSST;
    }elseif ($itens->imposto->ICMS->ICMS60->orig  !=  null) {#ICMS60
      $orig = $itens->imposto->ICMS->ICMS60->orig;
      $CST = $itens->imposto->ICMS->ICMS60->CST;
      $CST = (string)$CST . " - ICMS cobrado anteriormente por substituição tributária";
      $ICMS = $itens->imposto->ICMS->ICMS60->vICMS;
      $ICMSST = $itens->imposto->ICMS->ICMS60->vICMSST;
    }elseif ($itens->imposto->ICMS->ICMS70->orig  !=  null) {#ICMS70
      $orig = $itens->imposto->ICMS->ICMS70->orig;
      $CST = $itens->imposto->ICMS->ICMS70->CST;
      $CST = (string)$CST . " - Com redução da BC e cobrança do ICMS por substituição tributária";
      $ICMS = $itens->imposto->ICMS->ICMS70->vICMS;
      $ICMSST = $itens->imposto->ICMS->ICMS70->vICMSST;
    }elseif ($itens->imposto->ICMS->ICMS90->orig  !=  null) {#ICMS90
      $orig = $itens->imposto->ICMS->ICMS90->orig;
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
    echo "<tr>";
    $tabela = '';
    $tabela .= "$Contagem;";
    echo "<td class= centralizar>$Contagem</td>";
    $tabela .= "$descrição;";
    echo "<td class= centralizar>$descrição</td>";
    $tabela .= "$cProd;";
    echo "<td class= centralizar>$cProd</td>";
    $tabela .= "$quantidade;";
    echo "<td class= centralizar>$quantidade</td>";
    $valor_unitario_mostrar = number_format($valor_unitario , 2 , ",", ".");
    $tabela .= "$valor_unitario_mostrar;";
    echo "<td class= centralizar>$valor_unitario_mostrar</td>";
    /*$tabela .= "$NCM;";
    echo "<td class= centralizar>$NCM</td>";
    $tabela .= "$CST;";
    echo "<td class= centralizar>$CST</td>";*/
    $ICMS = round($ICMS, 2);      
    $ICMS_mostrar = number_format($ICMS, 2 , ",", ".");
    $tabela .= "$ICMS_mostrar;";
    echo "<td class= centralizar>$ICMS_mostrar</td>";
    $PIS_valor = round($PIS_valor, 2);
    $PIS_valor_mostrar= number_format($PIS_valor, 2 , ",", ".");
    $tabela .= "$PIS_valor_mostrar;";
    echo "<td class= centralizar>$PIS_valor_mostrar</td>";
    /*$tabela .= "$PIS;";
    echo "<td class= centralizar>$PIS</td>";*/
    $Cofins_valor= round($Cofins_valor, 2);
    $Cofins_valor_mostrar= number_format($Cofins_valor, 2 , ",", ".");
    $tabela .= "$Cofins_valor_mostrar;";
    echo "<td class= centralizar>$Cofins_valor_mostrar</td>";
    /*$tabela .= "$Cofins;";
    echo "<td class= centralizar>$Cofins</td>";*/
    #------------------------------------------------------------------------------------------
    if ($ICMSST == null){
      $ICMSST = 0;
    }else{
      $ICMSST = round($ICMSST,2);
      $ICMSST_unidade = $ICMSST/$quantidade;
    }
    $ICMSST= round($ICMSST, 2);
    $ICMSST_mostrar= number_format($ICMSST, 2 , ",", ".");
    $tabela .= "$ICMSST_mostrar;";    
    echo "<td class= centralizar>$ICMSST_mostrar</td>";
    #verificação do ICMS ST
    #------------------------------------------------------------------------------------------
    $ICMSST_unidade= round($ICMSST_unidade, 2);
    $ICMSST_unidade_mostrar= number_format($ICMSST_unidade, 2 , ",", ".");
    $tabela .= "$ICMSST_unidade_mostrar;";  
    echo "<td class= centralizar>$ICMSST_unidade_mostrar</td>";
    
    $IPI_unidade = round($IPI_unidade,2);
    $IPI_unidade_mostrar= number_format($IPI_unidade, 2 , ",", ".");
    $tabela .= "$IPI_unidade_mostrar;";
    echo "<td class= centralizar>$IPI_unidade_mostrar</td>";
    
    $custo_finan = $valor_unitario + $IPI_unidade + $ICMSST_unidade;
    $custo_finan = round($custo_finan,2);
    $custo_finan = $porcent_acressimo+$custo_finan;
    $custo_finan_mostrar= number_format($custo_finan, 4 , ",", ".");
    $tabela .= "$custo_finan_mostrar;";
    echo "<td class= centralizar>$custo_finan_mostrar</td>";
    
    #------------------------------------------------------------------------------------------
    
    #
    #------------------------------------------------------------------------------------------
    $linha_bonificação = $_SESSION['bonificacao'];
    $linha_bonificação = str_replace(',','.',$linha_bonificação);
    $bonificação_valor_final = $linha_bonificação / 100;
    $bonificação = $custo_finan * $bonificação_valor_final;
    $bonificação = round($bonificação,2);
    $bonificação_mostrar= number_format($bonificação , 2 , ",", ".");
    $tabela .= "$bonificação_mostrar;";
    echo "<td class= centralizar>$bonificação_mostrar</td>";
    
    $custo_bonifi = $custo_finan - $bonificação;
    $custo_bonifi = round($custo_bonifi,2);
    $custo_bonifi_mostrar= number_format($custo_bonifi, 2 , ",", ".");
    $tabela .= "$custo_bonifi_mostrar;";
    echo "<td class= centralizar>$custo_bonifi_mostrar</td>";
    
    $cust_contabil = ($valor_unitario*0.9075+$IPI_unidade+$ICMSST_unidade)-$bonificação; #adicionar o ICMS da unidade
    $cust_contabil = round($cust_contabil,2);
    $cust_contabil = $porcent_acressimo+$cust_contabil;
    $cust_contabil_mostrar= number_format($cust_contabil, 4 , ",", ".");
    $tabela .= "$cust_contabil_mostrar;";
    echo "<td class= centralizar>$cust_contabil_mostrar</td>";
    
    $MKP_contabil = $cust_contabil * 1.6;
    $MKP_contabil = round($MKP_contabil,2);
    $MKP_contabil_mostrar= number_format($MKP_contabil, 2 , ",", ".");
    $tabela .= "$MKP_contabil_mostrar;";
    echo "<td class= centralizar>$MKP_contabil_mostrar</td>";
    
    $dif_mkpcontabil = $MKP_contabil/($custo_finan-$bonificação);
    $dif_mkpcontabil = round($dif_mkpcontabil,4);
    $tabela .= "$dif_mkpcontabil;";
    echo "<td class= centralizar>$dif_mkpcontabil</td>";
    
    
    $Contagem = $Contagem+ 1;
    
    array_push($array_tabela ,$tabela);
 
    
  }
    array_push($array_tabela2 ,$array_tabela);
    $_SESSION['tabela'] = $array_tabela2;  
  ?>
            </tbody>
            </table>
        </div>
    </div>
            <!-- Div Final -->
            </div>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="sidebar/js/scripts.js"></script>
    </body>
</html>





