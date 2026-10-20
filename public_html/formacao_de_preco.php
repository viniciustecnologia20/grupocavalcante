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
            <div class="container-fluid ">
                <div class="card shadow p-3 mb-5 rounded-top centralizar">
                <h5 class="card-header rounded-top ">Coloque abaixo o valor da bonificação se houver</h5>
                </div>
                <!--BACK END-->
                <?php
                    $xml_copia = file_get_contents( $_FILES['XML']['tmp_name']);
                    $_SESSION['xml_copia_formação'] = $xml_copia;
                    #recebe o XML e o copia para uma session para poder mandar para a pagina "formação de preço.php"
                    #------------------------------------------------------------------------------------------
                    //echo "<pre>";
                    //var_dump($_POST['bonificacao']);
                    //echo "</pre>";
                    $valor_bonificacao = strval($_POST['bonificacao']);
                    if($valor_bonificacao  == null){
                      //echo "ta vazio";
                      
                    
                    #------------------------------------------------------------------------------------------
                    $myfile2 = $_FILES['XML']['tmp_name'];
                    $xml = simplexml_load_file($myfile2);
                    $Contagem = 1;
                    #Recebe o XML e le ele
                    #------------------------------------------------------------------------------------------
                ?>
                    <div>
                        <form id ="form4.2" action='formação de preço.php' method="post"  enctype="multipart/form-data">
                <?php
                    foreach ($xml->NFe->infNFe->det as $itens){
                        $EAN = $itens->prod->cEAN;
        
                        $NCM = $itens->prod->NCM;
        
                        $cProd = $itens->prod->cProd;
        
                        $key = $descrição = $itens->prod->xProd;
        
                        $valor_unitario = $itens->prod->vUnCom;
        
                        $valor_unitario = round($valor_unitario, 2);
        
                        $IPI = $itens->imposto->IPI->IPITrib->vIPI;
                        $IPI = round($IPI,2);
                         
        
                        $quantidade = $itens->prod->qCom;
                        $quantidade = round($quantidade,1);
                        
                        $IPI_unidade = $IPI/$quantidade;
        
                        $Bonificação_var = 0;
                        #------------------------------------------------------------------------------------------
                        if($itens->imposto->ICMS->ICMS00->orig != null){#ICMS00
                            $orig = $itens->imposto->ICMS->ICMS00->orig;
                            $CST = $itens->imposto->ICMS->ICMS00->CST;
                            $CST = (string)$CST . " - Tributada integralmente";
                            $ICMS = $itens->imposto->ICMS->ICMS00->vICMS;
                        }elseif ($itens->imposto->ICMS->ICMS10->orig  !=  null) {#ICMS10
                            $orig = $itens->imposto->ICMS->ICMS10->orig;
                            $CST = $itens->imposto->ICMS->ICMS10->CST;
                            $CST = (string)$CST . " - Tributada e com cobrança do ICMS por substituição tributária";
                            $ICMS = $itens->imposto->ICMS->ICMS10->vICMS;
                        }elseif ($itens->imposto->ICMS->ICMS20->orig  !=  null) {#ICMS20
                            $orig = $itens->imposto->ICMS->ICMS20->orig;
                            $CST = $itens->imposto->ICMS->ICMS20->CST;
                            $CST = (string)$CST . " - Com redução da BC";
                            $ICMS = $itens->imposto->ICMS->ICMS20->vICMS;
                        }elseif ($itens->imposto->ICMS->ICMS30->orig  !=  null) {#ICMS30
                            $orig = $itens->imposto->ICMS->ICMS30->orig;
                            $CST = $itens->imposto->ICMS->ICMS30->CST;
                            $CST = (string)$CST . " - Isenta / não tributada e com cobrança do ICMS por substituição tributária";
                            $ICMS = $itens->imposto->ICMS->ICMS30->vICMS;
                        }elseif ($itens->imposto->ICMS->ICMS40->orig  !=  null) {#ICMS40
                            $orig = $itens->imposto->ICMS->ICMS40->orig;
                            $CST = $itens->imposto->ICMS->ICMS40->CST;
                            $CST = (string)$CST . " - Isenta";
                            $ICMS = $itens->imposto->ICMS->ICMS40->vICMS;
                        }elseif ($itens->imposto->ICMS->ICMS41->orig  !=  null) {#ICMS41
                            $orig = $itens->imposto->ICMS->ICMS41->orig;
                            $CST = $itens->imposto->ICMS->ICMS41->CST;
                            $CST = (string)$CST . " - Não tributada";
                            $ICMS = $itens->imposto->ICMS->ICMS40->vICMS;
                        }elseif ($itens->imposto->ICMS->ICMS50->orig  !=  null) {#ICMS50
                            $orig = $itens->imposto->ICMS->ICMS50->orig;
                            $CST = $itens->imposto->ICMS->ICMS50->CST;
                            $CST = (string)$CST . " - Com suspensão";
                            $ICMS = $itens->imposto->ICMS->ICMS50->vICMS;
                        }elseif ($itens->imposto->ICMS->ICMS51->orig  !=  null) {#ICMS51
                            $orig = $itens->imposto->ICMS->ICMS51->orig;
                            $CST = $itens->imposto->ICMS->ICMS51->CST;
                            $CST = (string)$CST . " - Com diferimento";
                            $ICMS = $itens->imposto->ICMS->ICMS51->vICMS;
                        }elseif ($itens->imposto->ICMS->ICMS60->orig  !=  null) {#ICMS60
                            $orig = $itens->imposto->ICMS->ICMS60->orig;
                            $CST = $itens->imposto->ICMS->ICMS60->CST;
                            $CST = (string)$CST . " - ICMS cobrado anteriormente por substituição tributária";
                            $ICMS = $itens->imposto->ICMS->ICMS60->vICMS;
                        }elseif ($itens->imposto->ICMS->ICMS70->orig  !=  null) {#ICMS70
                            $orig = $itens->imposto->ICMS->ICMS70->orig;
                            $CST = $itens->imposto->ICMS->ICMS70->CST;
                            $CST = (string)$CST . " - Com redução da BC e cobrança do ICMS por substituição tributária";
                            $ICMS = $itens->imposto->ICMS->ICMS70->vICMS;
                        }elseif ($itens->imposto->ICMS->ICMS90->orig  !=  null) {#ICMS90
                            $orig = $itens->imposto->ICMS->ICMS90->orig;
                            $CST = $itens->imposto->ICMS->ICMS90->CST;
                            $CST = (string)$CST . " - Outras";
                            $ICMS = $itens->imposto->ICMS->ICMS90->vICMS;
                        }
                        #verificação da Origem, CST, ICMS
                        #------------------------------------------------------------------------------------------
                        echo "$Contagem - $descrição"."<br>";
                        $Contagem = $Contagem + 1;
                        ?>
                          
        
                        <div class="input-group mb-3">
                        <input type="hidden" value="<?= $descrição  ?>" name="bonifi[<?= $key ?>][nome]"> 
                        <input type="" name="bonifi[<?= $key ?>][vbonifi]">
                        <span class="input-group-text" id="basic-addon2">% de bonificação</span>
                        </div>
                        <br>
                        <hr>
                        <?php
                        }
                        ?>
                    </form>
                    <button type="submit" class="btn btn-outline-info btn-lg" form="form4.2">Consultar</button>
                    <pre>
                    <?php
                        $Bonificação_var = $_POST;
                      
                      }else{
                       $_SESSION['bonificacao'] = $_POST['bonificacao'];
                       ?><meta http-equiv="Refresh" content="0; url=formação de preço_boni.php" /><?php
                      }
                    ?>
                    </pre>  
                        
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









