<?php
ini_set('memory_limit', '-1');
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
    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="pagina_relatorio_estoque.html"></i> Relatorio de estoque alto</a>
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
   <div class="card shadow p-3 mb-5 rounded-top centralizar">
            <!--<h5 class="card-header rounded-top ">Filtros de relatorio </h5>-->
            <div id="teste" class="card-body">
              
              <!--<form action="relatorio_estoque.php" method="post" id="form_geral">
                <div class="row ">
                  <div class="col-2">
                    <div class="form-check form-switch">
                      <?php
                      $estoque_atual_teste = false;
                      if($_POST['estoque_atual'] == 'on'){
                      echo"<input class=form-check-input type=checkbox name=estoque_atual id=estoque_atual checked>";
                       $estoque_atual_teste = true;
                        }else{
                      echo"<input class=form-check-input type=checkbox name=estoque_atual_teste id=estoque_atual_teste>";
                      }
                      ?>
                      <label class="form-check-label" for="flexSwitchCheckDefault">Estoque atual > 0</label>
                    </div>
                    <div class="form-check form-switch">
                      <?php
                      $desconto_teste = false;
                      if($_POST['desconto'] == 'on'){
                        echo"<input class=form-check-input type=checkbox name=desconto id=desconto checked>";
                        $pis_teste = true;
                      }else{
                      echo"<input class=form-check-input type=checkbox name=desconto id=desconto>";
                      }
                        ?>
                      <label class="form-check-label" for="flexSwitchCheckDefault">% desconto</label>
                    </div>   
                  </div>
                  <br>
                  <div class="col-2">
                    <div class="form-group">
                      <input type="text" class="form-control" value="<?php echo $_POST['abastecimento'];?>" name="abastecimento" id="abastecimento" placeholder="Período de abastecimento Meses">
                      <div class="form-group">
                        <input type="text" class="form-control" value="<?php echo $_POST['Media_mensal'];?>" name="Media_mensal"  id="Media_mensal" placeholder="Média mensal">
                      </div>
            <div class="form-group">
                        <input type="text" class="form-control" value="<?php echo $_POST['Fabricante'];?>" name="Fabricante"  id="Fabricante" placeholder="Fabricante">
                       </div>
                    </div>
                  </div>
                </div>
                <button type="submit" class="btn btn-outline-info btn-lg" form ="form_geral" >Filtrar</button>
              </form>
            </div>-->
          </div>
      <div>
        <a href="download_relatorio_estoque.php"><button class="btn btn-outline-info btn-lg">Download da Operação</button></a>
      </div>
      <hr>
  <?php
    require_once "Classes/PHPExcel.php";
    //$worksheet_1 = lista de preços
    //$worksheet_2 = necessidade de compra
    //class
    //-----------------------------------------------------------------------------------------------------------

    //copias
    //-----------------------------------------------------------------------------------------------------------
    $myfile1 = $_FILES['XLS1']['tmp_name'];
    $path= $myfile1;
    $reader= PHPExcel_IOFactory::createReaderForFile($path);
    $excel_Obj = $reader->load($path);
    $worksheet_1=$excel_Obj->getActiveSheet();
        //pega o primeiro arquivo
    //-----------------------------------------------------------------------------------------------------------
    $myfile2 = $_FILES['XLS2']['tmp_name'];
    $path_2= $myfile2;
    $reader_2= PHPExcel_IOFactory::createReaderForFile($path_2);
    $excel_Obj_2 = $reader_2->load($path_2);
    $worksheet_2=$excel_Obj_2->getActiveSheet();
    //pega o segundo arquivo
    //-----------------------------------------------------------------------------------------------------------
    $lastRow_2 = $worksheet_2->getHighestRow();
    $lastRow = $worksheet_1->getHighestRow();
    $array_tabela = array();
    $array_C = array();
    $array_E = array();
    $array_I = array();
    $array_L = array();
    $array_K = array();
    echo "<div class=table-responsive border-dark rounded>";
    echo "<table class=table table-striped table-bordered table-hover>";
    echo "<thead class=thead-dark table-striped centralizar>";
    echo "<tr>";
    echo "<th scope=col>Descrição</th>";
    echo "<th scope=col>Sku</th>";
    echo "<th scope=col>Fabricante</th>";
    echo "<th scope=col>Custo Médio</th>";
    echo "<th scope=col>Preço</th>";
    echo "<th scope=col>Preço promocional</th>";
    echo "<th scope=col>% Desconto</th>";
    echo "<th scope=col>Estoque Atual</th>";
    echo "<th scope=col>Venda Média</th>";
    echo "<th scope=col>Tempo de Estoque (Meses)</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody id=myTable >";
    echo "<tr>";
    for ($row_2 = 2 ; $row_2 <= $lastRow_2 ; $row_2 ++) {
      array_push($array_C,$worksheet_2->getCell('C'.$row_2)->getValue());
      array_push($array_E,$worksheet_2->getCell('E'.$row_2)->getValue());
      array_push($array_I,$worksheet_2->getCell('H'.$row_2)->getValue());
      array_push($array_K,$worksheet_2->getCell('K'.$row_2)->getValue());
      array_push($array_L,$worksheet_2->getCell('L'.$row_2)->getValue());
    }
    //var_dump($array_L);
    $tabela ='';
    for ($row = 2 ; $row <= $lastRow ; $row++) {
        
       echo "<tr><td scope=\"row\">";
       //echo "<td>";
       echo $linha_A = $worksheet_1->getCell('A'.$row)->getValue();
       $tabela .="$linha_A,";
       echo "</td><td>";
       echo $linha_B = $worksheet_1->getCell('B'.$row)->getValue();
       $tabela .="$linha_B,";
       echo "</td><td>";
       $firstElement = reset($array_C);
       echo $linha_C = $firstElement;
       $tabela .="$linha_C,";
       array_shift($array_C);
       echo "</td><td>";
       $firstElement = reset($array_E);
       echo $linha_E = $firstElement;
       $tabela .="$linha_E,";
       array_shift($array_E);
       echo "</td><td>";
	   echo $linha_D = $worksheet_1->getCell('D'.$row)->getValue();
       $tabela .="$linha_D,";
       echo "</td><td>";
       echo $linha_F = $worksheet_1->getCell('E'.$row)->getValue();
       $tabela .="$linha_F,";
       /*echo "</td><td>";
       echo $linha_G = $worksheet_1->getCell('G'.$row)->getValue();
       $tabela .="$linha_G,";*/
       echo "</td><td>";
       $F = $worksheet_1->getCell('E'.$row)->getValue();
       $G = $worksheet_1->getCell('D'.$row)->getValue();
       $H = (($F/$G)-1)*100;
       $H_mostrar = number_format($H , 2 , ",", ".");
       if($H == -100){
        $H = 0;
        $H_mostrar = 0;
       }
       echo $H_mostrar;
       $tabela .="$H_mostrar,";
       echo "</td><td>";
       $firstElement = reset($array_I);
       echo $linha_I = $firstElement;
       $tabela .="$linha_I,";
       array_shift($array_I);
       echo "</td><td>";
       $firstElement = reset($array_K);
       echo $linha_K = $firstElement;
       $tabela .="$linha_K,";
       array_shift($array_K);
       echo "</td><td>";
       $firstElement = reset($array_L);
       echo $linha_L = $firstElement;
       $tabela .="$linha_L;";
       array_shift($array_L);
       echo "</td></tr>";
       array_push($array_tabela, $tabela);
      }
	$_SESSION['tabela'] = $tabela;
      
      

    echo "</tbody>";
    echo "</table>";
    
  ?>

  <script>
$(document).ready(function(){
 $("#msgid").html("This is Hello World by JQuery");
});

</script>
<div id="msgid">
</div>
  <!-- Bootstrap core JS-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <!-- Core theme JS-->
  <script src="sidebar/js/scripts.js"></script>
  </body>
  </html>
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
















