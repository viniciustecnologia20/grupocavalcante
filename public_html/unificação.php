<?php
session_start();
?>
<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title> Projeto GP </title>
    
    <!-- Iconic CSS -->
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
  <body class = "background">
    <div class="container-fluid sticky-top">
        <div class="row ">
            <nav class="navbar navbar-expand-sm navbar-light bg-white ">

                <!-- Logo -->
                <a class="navbar-brand" href="home.html">
                  <img src="/imagens/GP.jpg" alt="Imagem responsiva" width="75" height="35" class="d-inline-block align-top">
                </a>


                <!-- Menu Hamburguer -->
                <button class="navbar-toggler" data-toggle="collapse"
                data-target="#navegacao">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- navegacao -->
                <div class="collapse navbar-collapse justify-content-end" id="navegacao">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item me-2">
                            <a href="home.html" class="nav-link ">Home</a>
                        </li>
                        <li class="nav-item me-2">
                            <a href="pagina_operação_conjunta.html" class="nav-link active">Ação Consolidada</a>
                        </li>
                        <li class="nav-item me-2">
                            <a href="pagina_consulta.html" class="nav-link">Conferencia de quantidade NFe</a>
                        </li>
                        <li class="nav-item me-2">
                            <a href="pagina_conferencia.html" class="nav-link ">Conferencia Cadastral</a>
                        <li class="nav-item">
                            <a href="pagina_formacão_de_preço.html" class="nav-link ">Formação de Preço</a>
                        </li>
                        </li>
                    </ul>
                </div>
            </nav>
            <hr>
        </div>
    </div>
    <div>
              <?php
  header("Content-type: text/html; charset=utf-8");
  $txt_copia = file_get_contents( $_FILES['txt']['tmp_name']);
  $_SESSION['txt_copia'] = $txt_copia;
  #recebe o TXT e o copia para uma session para poder mandar para a pagina "download_consulta.php"
  #------------------------------------------------------------------------------------------
  header("Content-type: text/html; charset=utf-8");
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
      <div class =" col-md-6 sd-1 centralizar bg-dark centralizar border-bottom border-dark rounded-top">
        <h5 class="font-weight-bold text-uppercase ">CONFERENCIA DE QUANTIDADE NFE</h5>
      </div>
      <br>
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
  foreach ($xml->NFe->infNFe->det as $itens){
    $EAN = $itens->prod->cEAN;
    $EAN = strval($EAN);
    $quantidade = $itens->prod->qCom;
    $quantidade = intval($quantidade);
    $quantidade = round($quantidade);
    $total_unidade_nota = $total_unidade_nota + $quantidade;
    #------------------------------------------------------------------------------------------
    if (array_key_exists($EAN, $lista_nova )){
      
      if($lista_nova[$EAN] == $quantidade){
        
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
        echo "<td>$diferenca_quantidade </td>";
        
        $Contagem = $Contagem + 1;
        array_push($total_quantidade_incorreta,$EAN,intval($lista_nova[$EAN]));
        unset($lista_nova [$EAN]);
      }
      
    }else{
      echo "<tr class= table-danger>". "<br>";
      echo "<td>$Contagem</td>". "<br>";
      echo "<td>$EAN </td>". "<br>";
      echo "<td>$quantidade</td>". "<br>";
      echo "<td># Invalido #</td>". "<br>";
      
      $Contagem = $Contagem + 1;
    }      
  }
  echo "</tbody>";
  echo "</table>";
  echo "<div class=container-fluid>";
  echo "<div class=row>";
  echo "<div class= col-md-6 centralizar  >";
  echo"<h4 class=text-md-center>Conclusão</h5>";
  echo"<hr>";
  if(empty($lista_nova)){
    echo"<h6 class=text-md-left>Todos os EANS foram encontrados</h5>";
  }else{
    foreach(array_keys($lista_nova) as $lista_ean_invalidos){
      echo"<h6 class=text-md-left>EAN não encontrado na consulta: $lista_ean_invalidos => $lista_nova[$lista_ean_invalidos]</h5>"."<br>";
    }
  }
  if(empty($total_quantidade_incorreta )){
    echo"<h6 class=text-md-left>Todas as quantidade conferem</h5>";
  }else{
    foreach($total_quantidade_incorreta as $ean_quantidade_incorreto){
      echo "<h6 class=text-md-left>Quantidade incorreta na consulta: $ean_quantidade_incorreto </h5>";
    }
  }
  #Resultado da final de conferencia
  #------------------------------------------------------------------------------------------
  echo "</div>";
  echo "<div class= col-md-6 centralizar >";
  echo "<h4 class=text-md-center text-uppercase>Totalizador</h4>";
  echo"<hr>";
  echo "<h6 class=text-md-left>Quantidade total de unidades da nota: $total_unidade_nota</h5>";
  $total_unidade_fisico = array_sum($lista_nova_copia);
  echo "<h6 class=text-md-left>Quantidade total de unidades da fisico: $total_unidade_fisico</h5>";
  echo "<h6 class=text-md-left>Diferença de unidades: $diferenca_quantidade </h5>";
  $Contagem = $Contagem - 1;
  echo "<h6 class=text-md-left>Numero total de itens da NF: $Contagem</h5>";
  $total_elementos_fisico = count($lista_nova_copia);
  echo "<h6 class=text-md-left>Numero total de itens da conferencia: $total_elementos_fisico </h5>";
  $total_diferencas = count($total_quantidade_incorreta)/2;
  echo "<h6 class=text-md-left>Diferença total de itens: $total_diferencas </h5>";
  #totalizador
  #------------------------------------------------------------------------------------------
  
  
  echo "</div>";
  echo "</div>";
  echo "</div>"."<br>";
  ?>
            <div>
        <?php
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
                array_push($lista,$linha);
                }
            }
            #------------------------------------------------------------------------------------------
            $myfile2 = $_FILES['XML']['tmp_name'];
            $xml = simplexml_load_file($myfile2);
            $Contagem = 1;
            #Recebe o XML e le ele
            #------------------------------------------------------------------------------------------
            function search( $haystack, $needle, $index = NULL ) {

                if( is_null( $haystack ) ) {
                    return -1;
                }
            
                $arrayIterator = new \RecursiveArrayIterator( $haystack );
            
                $iterator = new \RecursiveIteratorIterator( $arrayIterator );
            
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
        <hr>
        <div class =" col-md-6 sd-1 centralizar bg-dark centralizar border-bottom border-dark rounded-top">
            <h5 class="font-weight-bold text-uppercase ">CONFERENCIA CADASTRAL</h5>
        </div>
        <br>   
      <div class="container-fluid">
                <table class="table table-bordered table-hover table-striped">
          <thead class="thead-dark">
            <tr>
              <th scope="col">#</th>
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
  //echo "<pre>";
  //print_r($lista);
  //echo "</pre>";
  $array_tabela = array();
  $array_tabela2 = array();
  $situacao ='';
  foreach ($xml->NFe->infNFe->det as $itens){
    $Cod_fabricante = $itens->prod->cProd;
    $tabela = "";
    $array_tabela = array();
    $EAN = $itens->prod->cEAN;
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
    }elseif ($itens->imposto->ICMS->ICMS40->orig  !=  null) {#ICMS40
      $orig = $itens->imposto->ICMS->ICMS40->orig;
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
    #verificação da Origem
    #------------------------------------------------------------------------------------------
    $tabela ='';
    if ($EAN == "SEM GTIN"){
      
      $tabela .= "$Contagem,";
      $tabela .= 'EAN # Invalido ou inexistente #,';
      $tabela .= 'por favor revisar este produto,';
      
      echo "<tr>";
      echo "<td>$Contagem</td>";
      echo "<td>EAN # Invalido ou inexistente #</td>";
      echo "<td>por favor revisar este produto #</td>";
      
      
      $Contagem = $Contagem + 1;
    }else{
      if (in_array_r($EAN, $lista)) {#Verifica se existe o EAN
        $tabela .= "$Contagem,";
        $tabela .= "$EAN,";
        $tabela .= 'Confere,';
        
        echo "<tr>";
        echo "<td>$Contagem</td>";
        echo "<td>$EAN</td>";
        echo "<td>Confere</td>";
        
        
        $Contagem = $Contagem + 1;
        
        if (in_array_r($NCM, $lista)){#Verifica se existe o NCM
         
          
          $tabela .= "$NCM,";
          $tabela .= 'Confere,';

          echo "<td>$NCM</td>";
          echo "<td>Confere</td>";

        }else{
          
          $tabela .= "$NCM,";
          $tabela .= '# Invalido #,';
          
          echo "<td>$NCM</td>";
          echo "<td># Invalido #</td>";  


        }
        if (in_array_r($CEST,$lista)){#Verifica se existe o CEST
          
          $tabela .= "$CEST,";
          $tabela .= 'Confere,';
          
          echo "<td>$CEST</td>";
          echo "<td>Confere</td>";
          
        }else{
          
          $tabela .= "$CEST,";
          $tabela .= '# Invalido #,';
          
          echo "<td>$CEST</td>";
          echo "<td># Invalido #</td>";
          
        }
        
        if (in_array_r($orig, $lista)){#Verifica se existe Origem
          
          $tabela .= "$orig,";
          $tabela .= 'Confere,';
          
          echo "<td>$orig</td>";
          echo "<td>Confere</td>";

          
        }else{
          
          $tabela .= "$orig,";
          $tabela .= '# Invalido #,';
            
          echo "<td>$orig</td>";
          echo "<td># Invalido #</td>";
          
        }
        //echo "<pre>";
        //print_r($lista);
        //echo "</pre>";

        if (in_array_r($Cod_fabricante, $lista)){
          $tabela .= "$Cod_fabricante,";
          $tabela .= 'Confere,';

          
          echo "<td>$Cod_fabricante</td>";
          echo "<td>Confere</td>";
          
        }else{
          
          $tabela .= "$Cod_fabricante,";
          $tabela .= '# Invalido #,';
          
          echo "<td>$Cod_fabricante</td>";
          echo "<td># Invalido #</td>";
          
        }
      }else{
        
        $tabela .= "$Contagem,";
        $tabela .= "$EAN,";
        $tabela .= '# Invalido #,';
        echo "<tr>";
        echo "<td>$Contagem </td>";
        echo "<td>$EAN</td>";
        echo "<td># Invalido #</td>";
        
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
    <hr>
    </div>
    <div class="container-fluid">
      <div class =" col-md-6 sd-1 centralizar bg-dark centralizar border-bottom border-dark rounded-top">
        <a href="formacao_de_preco_unificação.php" style="color: #000000" ><h5 class="font-weight-bold text-uppercase ">Formação de Preço</h5><a/>
      </div>
    </div>
    <br>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>

























































































