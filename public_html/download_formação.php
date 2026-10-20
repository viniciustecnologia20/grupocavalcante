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
    $arquivo = $_SESSION['titulo_formação']."(FP)". ".xls";
    // Criamos uma tabela HTML com o formato da planilha
    $html = '';
    $html_2 = '';
    $html .= '<table border="1">';
    $html .= '<tr>';
    $html .= '<td colspan="21">Formação de Preço</td>';
    $html .= '</tr>';
    $html .= '<td><b>#</b></td>';
    $html .= '<td><b>descrição</b></td>';
    $html .= '<td><b>Codigo do fabricante</b></td>';
    $html .= '<td><b>Quantidade de peças</b></td>';
    $html .= '<td><b>Valor da unidade</b></td>';
    $html .= '<td><b>ICMS</b></td>';
    $html .= '<td><b>Valor do PIS</b></td>';
    $html .= '<td><b>Valor do COFINS</b></td>';
    $html .= '<td><b>ICMS ST</b></td>';
    $html .= '<td><b>ICMS ST da unidade</b></td>';
    $html .= '<td><b>IPI da unidade</b></td>';
    $html .= '<td><b>Custo financeiro</b></td>';
    $html .= '<td><b>Bonificação</b></td>';
    $html .= '<td><b>Custo - bonificação</b></td>';
    $html .= '<td><b>Custo contabil</b></td>';
    $html .= '<td><b>MKP Contabil</b></td>';
    $html .= '<td><b>Fator do MKP contabil</b></td>';
    $html .= '</tr>';
  //echo "<pre>";
  //print_r($_SESSION['tabela']);
  //echo "</pre>";
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
      $html .= "<td>$lista[13]</td>";
      $html .= "<td>$lista[14]</td>";
      $html .= "<td>$lista[15]</td>";
      $html .= "<td>$lista[16]</td>";
      $html .= "<td>$lista[17]</td>";
      $html .= '</tr>';
    }
    
   }

  
    
    

    
    // Configurações header para forçar o download
    header ("Expires: Mon, 07 Jul 2016 05:00:00 GMT");
    header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
    header ("Cache-Control: no-cache, must-revalidate");
    header ("Pragma: no-cache");
    header ("Content-type: application/x-msexcel");
    header ("Content-Disposition: attachment; filename=\"{$arquivo}\"" );
    header ("Content-Description: PHP Generated Data" );
    // Envia o conteúdo do arquivo
    echo $html;
    exit;?>
  </body>
</html>

    
    























































































































































































































































