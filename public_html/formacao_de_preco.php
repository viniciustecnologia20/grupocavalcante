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
<?php include __DIR__ . '/includes/menubar.php'; ?>
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









