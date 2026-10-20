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
              <br>
            <!--conteudo da pagina-->
            <?php

            #------------------------------------------------------------------------------------------
            //header("Content-type: text/html; charset=utf-8");
            $txt_copia = file_get_contents( $_FILES['txt']['tmp_name']);
            $_SESSION['txt_copia'] = $txt_copia;
            #recebe o TXT e o copia para uma session para poder mandar para a pagina "download_consulta.php"
            #------------------------------------------------------------------------------------------
            //header("Content-type: text/html; charset=utf-8");
            $myfile = $_FILES['txt']['tmp_name'];
            $dados = file($myfile);
            #Recebe o TXT e le ele
            #------------------------------------------------------------------------------------------
            function tratamento_ean($linhas){
              $linhas_corrigidas = substr($linhas,2);
              $lista_EAN_txt = explode('|||||', $linhas_corrigidas);//Separa a string em arrays
              return $lista_EAN_txt;
            }
            #Função do txt
            #------------------------------------------------------------------------------------------
            $lista_geral = array();
            $lista_EAN = array();
            $lista_quantidade = array();
            $diferenca_quantidade = '';
            $quantidade_incorreta_ean = array();
            $total_quantidade_incorreta = array();
            $total_unidade_nota = 0;
            $array_tabela = array();
            foreach($dados as $linhas){
              $linha = tratamento_ean($linhas);
              array_push($lista_EAN, $linha[0]);//Pega o primeiro elemento do array e o dd a um array
              $lista_EAN = array_filter($lista_EAN);
              $lista_EAN = array_values($lista_EAN );
              array_push($lista_quantidade, $linha[1]);//Pega o primeiro elemento do array e o dd a um array
              $lista_quantidade= array_filter($lista_quantidade);
              $lista_quantidade= array_values($lista_quantidade);
            }

            foreach($lista_EAN as $ListaEAN){
                $lista_geral[$ListaEAN] = '';
              }

            $lista_nova = array();
            $i = 0;

            foreach($lista_geral as $chave => $valor){
              $lista_nova[$chave] = $lista_quantidade[$i];
              $i++;
            }

            if(array_key_exists(null, $lista_nova )){
              unset($lista_nova [null]);
              }
            $lista_nova_copia = $lista_nova;
            #------------------------------------------------------------------------------------------
            $xml_copia = file_get_contents( $_FILES['XML']['tmp_name']);
            $_SESSION['xml_copia'] = $xml_copia;
            #recebe o XML e o copia para uma session para poder mandar para a pagina "download_consulta.php"
            #------------------------------------------------------------------------------------------
            $myfile2 = $_FILES['XML']['tmp_name'];
            $xml = simplexml_load_file($myfile2);
            $Contagem = 1;
            #Recebe o XML e le ele
            #------------------------------------------------------------------------------------------
            ?>
              <div>
                <div>
                  <a href="download_consulta.php"><button class="btn btn-outline-info btn-lg">Download da Operação</button></a>
                </div>
                <hr>
                <table class="table table-dark table-bordered table-hover table-striped">
                  <thead class="thead-dark">
                    <tr>
                      <th>#</th>
                      <th>EAN</th>
                      <th>Quantidade</th>
                      <th>Situação</th>
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
            $_SESSION['titulo_consulta'] =  $titulo_download;
            $array_nao_encotrado = array();
			
			$teste = $xml->NFe->infNFe->det;
			
			if($teste == null){
				
				$teste = $xml->nfeProc->NFe->infNFe->det;
			}

            foreach ($teste as $itens){

              $EAN = $itens->prod->cEAN;
              $EAN = strval($EAN);
              if($EAN[0] == 0){
                $EAN= substr($EAN, 1);

              }
              $quantidade = $itens->prod->qCom;
              $quantidade = intval($quantidade);
              $quantidade = round($quantidade);
              $total_unidade_nota = $total_unidade_nota + $quantidade;

              #------------------------------------------------------------------------------------------
			  /*echo $EAN;
			  echo "<pre>";
			  print_r($lista_nova);
			  echo "</pre>";*/

              if (array_key_exists($EAN, $lista_nova )){
                $tabela ='';
                if($lista_nova[$EAN] == $quantidade){

                  $tabela .="$Contagem,";
                  $tabela .="$EAN,";
                  $tabela .="$quantidade,";
                  $tabela .="Confere," ;


                  echo " <tr class= table-success>";
                  echo "<td>$Contagem</td>";
                  echo "<td>$EAN </td>";
                  echo "<td>$quantidade</td>";
                  echo "<td>Confere</td>" ;

                  $Contagem = $Contagem + 1;
                  unset($lista_nova [$EAN]);
                }else{


                  echo " <tr class= table-danger>";
                  echo "<td>$Contagem</td>";
                  echo "<td>$EAN </td>";
                  echo "<td>Quantidade na NF: $quantidade</td>";
                  $diferenca_quantidade = intval($lista_nova[$EAN]) - $quantidade;
                  $diferenca_quantidade = "Diferença: " . $diferenca_quantidade;
                  echo "<td>$diferenca_quantidade </td>";

                  $tabela .="$Contagem,";
                  $tabela .="$EAN,";
                  $tabela .="Quantidade na NF: $quantidade,";
                  $tabela .="$diferenca_quantidade,";

                  $Contagem = $Contagem + 1;
                  array_push($total_quantidade_incorreta,$EAN,intval($lista_nova[$EAN]));
                  unset($lista_nova [$EAN]);
                  }

              }else{
                $tabela ='';
                $tabela .="$Contagem,";
                $tabela .="$EAN,";
                $tabela .="$quantidade,";
                $tabela .="# Invalido #,";

                echo "<tr class= table-danger>";
                echo "<td>$Contagem</td>";
                echo "<td>$EAN </td>";
                echo "<td>$quantidade</td>";
                echo "<td>## Invalido ##</td>";

                $Contagem = $Contagem + 1;
              }

              array_push($array_tabela ,$tabela);
              $_SESSION['tabela'] =  $array_tabela;
              //echo "<pre>";
              //print_r($lista_nova);
              //echo "</pre>";
            }
            echo "</tbody>";
            echo "</table>";
            echo "<div class=container-fluid>";
            echo "<div class=row>";
            echo "<div class= col-md-6 centralizar  >";
            echo"<h4 class=text-md-center>Conclusão</h5>";
            echo"<hr>";

            if(empty($lista_nova)){
              $msgEAN_Encontrado = 'Todos os EANS foram encontrados';
              echo"<h6 class=text-md-left>$msgEAN_Encontrado </h5>";
              $_SESSION['msgEAN_Encontrado'] =  $msgEAN_Encontrado;
            }else{
              foreach(array_keys($lista_nova) as $lista_ean_invalidos){
                $msgEAN_Encontrado = "$lista_ean_invalidos => $lista_nova[$lista_ean_invalidos]";
                echo"<h6 class=text-md-left>EAN não encontrado na consulta: $lista_ean_invalidos => $lista_nova[$lista_ean_invalidos]</h5>"."<br>";
                array_push($array_nao_encotrado,$msgEAN_Encontrado);
                $_SESSION['msgEAN_Encontrado'] =  $array_nao_encotrado;
                //////////////////////////////////////////////////////////
                }
            }
            if(empty($total_quantidade_incorreta)){
              $msg_quantidade = 'Todas as quantidades conferem';
              echo"<h6 class=text-md-left>$msg_quantidade </h5>";
              $_SESSION['msg_quantidade '] =  $msg_quantidade;

            }else{

              $msg_quantidade = $total_quantidade_incorreta;
              $_SESSION['msg_quantidade'] =  $msg_quantidade;

              foreach($total_quantidade_incorreta as $ean_quantidade_incorreto){

                echo "<h6 class=text-md-left>Quantidade incorreta na consulta: $ean_quantidade_incorreto</h5>";

                }

            }
              #Resultado da final de conferencia
            #------------------------------------------------------------------------------------------
            echo "</div>";
            echo "<div class= col-md-6 centralizar >";
            echo "<h4 class=text-md-center text-uppercase>Totalizador</h4>";
            echo"<hr>";
            echo "<h6 class=text-md-left>Quantidade total de unidades da nota: $total_unidade_nota</h5>";
            $_SESSION['total_unidade_nota'] = $total_unidade_nota;

            $total_unidade_fisico = array_sum($lista_nova_copia);
            echo "<h6 class=text-md-left>Quantidade total de unidades da fisico: $total_unidade_fisico</h5>";
            $_SESSION['total_unidade_fisico'] = $total_unidade_fisico;

            $diferenca_unidades = $total_unidade_fisico - $total_unidade_nota;
            echo "<h6 class=text-md-left>Diferença de unidades: $diferenca_unidades </h5>";
            $_SESSION['diferenca_unidades'] = $diferenca_unidades ;

            $Contagem = $Contagem - 1;
            echo "<h6 class=text-md-left>Numero total de itens da NF: $Contagem</h5>";
            $_SESSION['Contagem'] = $Contagem;

            $total_elementos_fisico = count($lista_nova_copia);
            echo "<h6 class=text-md-left>Numero total de itens da conferencia: $total_elementos_fisico </h5>";
            $_SESSION['total_elementos_fisico'] = $total_elementos_fisico;

            //$total_diferencas = count($total_quantidade_incorreta)/2;
			$total_diferencas =   $total_elementos_fisico - $Contagem; 
            echo "<h6 class=text-md-left>Diferença total de itens: $total_diferencas </h5>";
            $_SESSION['total_diferencas'] = $total_diferencas;
            #totalizador
            #------------------------------------------------------------------------------------------


            echo "</div>";
            echo "</div>";
            echo "</div>"."<br>";
            ?>

            <!-- Div Final -->
            </div>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="sidebar/js/scripts.js"></script>
    </body>
</html>




















































