<?php
session_start();
?>
 <!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <title>Conferencia cadastral</title>
  <head>
  <body>
    <?php
    // Definimos o nome do arquivo que será exportado
    $arquivo = $_SESSION['titulo_conferencia']."(CC)" . ".xls";
    // Criamos uma tabela HTML com o formato da planilha
    $html = '';
    $html_2 = '';
    $html .= '<table border="1">';
    $html .= '<tr>';
    $html .= '<td colspan="9">Conferencia de quantidade NFe</td>';
    $html .= '</tr>';
    $html .= '<td>#</td>';
    $html .= '<td>Descrição</td>';
    $html .= '<td>SKU</td>';
    $html .= '<td>EAN</td>';
    $html .= '<td>Situação</td>';
    $html .= '<td>NCM</td>';
    $html .= '<td>Situação</td>';
    $html .= '<td>CEST</td>';
    $html .= '<td>Situação</td>';
    $html .= '<td>Origem</td>';
    $html .= '<td>Situação</td>';
    $html .= '<td>Codigo do Fabricante</td>';
    $html .= '<td>Situação</td>';
    /*$html .= '<td><b>Situação Tributária do ICMS</b></td>';
    $html .= '<td><b>Situação Tributaria do PIS</b></td>';
    $html .= '<td><b>Situação tributaria do COFINS</b></td>';*/
    $html .= '</tr>';
  foreach($_SESSION['tabela'] as $data){
    foreach($data as $dados){
      $lista = explode(";", $dados);
      $html .= '<tr>';
      $html .= "<td>$lista[0]</td>";
      $html .= "<td>$lista[1]</td>";
      $html .= "<td>$lista[2]</td>";
      $html .= "<td>$lista[3]</td>";
      $html .= "<td>$lista[4]</td>";
      $html .= "<td>$lista[5]</td>";
      $html .= "<td>$lista[6]</td>";
      $html .= "<td>$lista[7]</td>";
      $html .= "<td>$lista[8]</td>";
      $html .= "<td>$lista[9]</td>";
      $html .= "<td>$lista[10]</td>";
      $html .= "<td>$lista[11]</td>";
      $html .= "<td>$lista[12]</td>";
      /*$html .= "<td>$lista[13]</td>";
      $html .= "<td>$lista[14]</td>";
      $html .= "<td>$lista[15]</td>";*/
      $html .= '</tr>';    
    }
   }
   
   ?>
   <div class="summary" id="reportSummary">
    <hr>
    <h2>Resumo do Relatório</h2>
    <p>Número total de células inválidas: <span id="invalidCellCount">0<?php echo($_POST[0]); ?></span></p>

  </div>
   <script>
   // Armazena o número total de células inválidas no localStorage
   var totalInvalidCells = localStorage.getItem("totalInvalidCells");
   document.getElementById("invalidCellCount").innerHTML  += totalInvalidCells;
   </script>
  
  
    
    

    
    <?php
    // Configurações header para forçar o download
    header ("Expires: Mon, 07 Jul 2016 05:00:00 GMT");
    header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
    header ("Cache-Control: no-cache, must-revalidate");
    header ("Pragma: no-cache");
    header ("Content-type: application/x-msexcel");
    header ("Content-Disposition: attachment; filename=\"{$arquivo}\"" );
    header ("Content-Description: PHP Generated Data" );
    // Envia o conteúdo do arquivo
    echo $html;?>
    exit;
  </body>
</html>

    
    































































































































































































































































