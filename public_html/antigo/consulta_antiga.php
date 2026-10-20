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
                            <a href="pagina_operação_conjunta.html" class="nav-link">Ação Consolidada</a>
                        </li>
                        <li class="nav-item me-2">
                            <a href="pagina_consulta.html" class="nav-link active">Conferencia de quantidade NFe</a>
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
    $lista_EAN_txt = explode('|||||', $linhas);//Separa a string em arrays
    return $lista_EAN_txt;
  }
  
  #Função do txt
  #------------------------------------------------------------------------------------------
  $lista_EAN = array();
  $lista_quantidade = array();
  $quantidade_unida_diferen = array();
  $quantidade_incorreta_ean = array();
  $total_quantidade_incorreta = array();
  foreach($dados as $linhas){
    $linha = tratamento_ean($linhas);
    array_push($lista_EAN, $linha[0]);//Pega o primeiro elemento do array e o dd a um array
    array_push($lista_quantidade, $linha[1]);//Pega o primeiro elemento do array e o dd a um array
  }
  $total_txt_quantidade = $lista_quantidade;
  $total_itens_txt = count($lista_EAN);
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
  $total_quant_unidade = array();
  $ean_quantidade_total = array();
  $qunatidade_n_encotrada = array();
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
  foreach ($xml->NFe->infNFe->det as $itens){
    $EAN = "0|" . $itens->prod->cEAN;
    $quantidade = $itens->prod->qCom;
    $quantidade = intval($quantidade);
    $quantidade = round($quantidade);
    array_push($total_quant_unidade, $quantidade);
    $ean_quantidade = $EAN .  $quantidade;
    array_push($ean_quantidade_total,$ean_quantidade);
    #------------------------------------------------------------------------------------------
    if (in_array($EAN, $lista_EAN)) {
      
      if (($key2 = array_search($EAN,  $lista_EAN)) !== false) {
        unset($lista_EAN[$key2]);
      }
      //echo "<pre>";
      //print_r($lista_quantidade); O erro que esta dando esta relacionado ao item 6 que ta dando confere mais ele esta errado
      //echo "<pre>";

      if(in_array($quantidade,$lista_quantidade)){
        
        echo " <tr class= table-success>";
        echo "<td>$Contagem</td>";
        $parte_EAN = substr($EAN,2);
        echo "<td>$parte_EAN </td>";
        echo "<td>$quantidade</td>";
        echo "<td>Confere</td>" ;
        
        if (($key = array_search($quantidade,  $lista_quantidade)) !== false) {
          unset($lista_quantidade[$key]);
        }
        $Contagem = $Contagem + 1;
        $lista_quantidade_final = $lista_quantidade;
      }
      else{
        array_push($quantidade_incorreta_ean,$EAN);
       
        echo " <tr class= table-danger>";
        echo "<td>$Contagem</td>";
        $parte_EAN = substr($EAN,2);
        echo "<td>$parte_EAN </td>";
        echo "<td>Quantidade na NF: $quantidade</td>";
        
        array_values($lista_quantidade);
        foreach($lista_quantidade as $quantidade_unidade_txt){
          $quantidade_unidade_txt = intval($quantidade_unidade_txt);
          $quantidade_fisico_nota =  $quantidade_unidade_txt - $quantidade;
          array_push($quantidade_unida_diferen, $quantidade_fisico_nota);#fisico - nota        
        }
        
        echo "<td>Diferença de quantidade:". end($quantidade_unida_diferen)."</td>";
        //echo "<td>Diferença de quantidade: $quantidade_unida_diferen[0]</td>";
        
        $total_quantidade_incorreta = $quantidade_unida_diferen;
        unset($quantidade_unida_diferen[0]);
        $quantidade_unida_diferen = array_values($quantidade_unida_diferen);
        $Contagem = $Contagem + 1;
      }
    }else{
      
      echo " <tr class= table-danger>". "<br>";
      echo "<td>$Contagem</td>". "<br>";
      $parte_EAN = substr($EAN,2);
      echo "<td>$parte_EAN </td>". "<br>";
      echo "<td>$quantidade</td>". "<br>";
      echo "<td># Invalido #</td>". "<br>";
      $Contagem = $Contagem + 1;
    }
  }
  echo "</tbody>";
  echo "</table>";
  #------------------------------------------------------------------------------------------
  echo "<div class=container-fluid>";
  echo "<div class=row>";
  echo "<div class= col-md-6 centralizar  >";
  echo"<h4 class=text-md-center>Conclusão</h5>";
  echo"<hr>";
  if(empty($lista_EAN)){
    echo"<h6 class=text-md-left>Todos os EANS foram encontrados</h5>";
  }else{
    foreach($lista_EAN as $Nlistados){
      $parte_Nlistados= substr($Nlistados,2);
      echo"<h6 class=text-md-left>EAN não encontrado na consulta: $parte_Nlistados</h5>"."<br>";
    }
  }
  if(empty($total_quantidade_incorreta)){
    echo"<h6 class=text-md-left>Todas as quantidade conferem</h5>";
  }else{
    $lista_quantidade = array_reverse($lista_quantidade);
    $qunatidade_n_encotrada = array_merge($quantidade_incorreta_ean,$lista_quantidade);
    $novoArrayChavePar = array();
    $novoArrayChaveImPar = array();
    foreach($qunatidade_n_encotrada as $key3 => $value){
      // usando o   operador ternario e módulo
      // se resto da divisao por 2 for = 0 então número é par
      $verificarSeEPar =  $key3 % 2 == 0 ? true : false;
      
      if ($verificarSeEPar) {
        $novoArrayChavePar[] = $value;
      } else {
        $novoArrayChaveImPar[] = $value;
      }
    }
    $pares = implode(' ', $novoArrayChavePar);
    $impares = implode(' ', $novoArrayChaveImPar);
    $parte_pares= substr($pares,2);
    echo "<h6 class=text-md-left>Quantidade incorreta na consulta:  $parte_pares</h5>";
    echo "<h6 class=text-md-left>Quantidade incorreta na consulta:  $impares</h5>";
  }
  #Função do krl para mostrar a quantidade incorreta com seu respectivo ean
  #------------------------------------------------------------------------------------------
  #Resultado da final de conferencia
  #------------------------------------------------------------------------------------------
  echo "</div>";
  echo "<div class= col-md-6 centralizar >";
  echo "<h4 class=text-md-center text-uppercase>Totalizador</h4>";
  echo"<hr>";
  $total_xml_unidades = array_sum($total_quant_unidade);
  echo "<h6 class=text-md-left>Quantidade total de unidades da nota: $total_xml_unidades</h5>";
  $total_txt_quantidade =  array_sum($total_txt_quantidade);
  echo "<h6 class=text-md-left>Quantidade total de unidades da fisico: $total_txt_quantidade</h5>";
  $total_diferen_unidade =$total_txt_quantidade - $total_xml_unidades ;
  echo "<h6 class=text-md-left>Diferença de unidades: $total_diferen_unidade</h5>";
  $Contagem = $Contagem - 1;
  echo "<h6 class=text-md-left>Numero total de itens da NF: $Contagem</h5>";
  echo "<h6 class=text-md-left>Numero total de itens da conferencia: $total_itens_txt</h5>";
  $diferen_itens = $total_itens_txt - $Contagem;
  echo "<h6 class=text-md-left>Diferença total de itens: $diferen_itens</h5>";
  #totalizador
  #------------------------------------------------------------------------------------------
  
  
  echo "</div>";
  echo "</div>";
  echo "</div>"."<br>";
  ?>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>

    
    







































































































































































