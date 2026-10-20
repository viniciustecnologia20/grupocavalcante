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
    $arquivo = $_SESSION['titulo_formação']."(FP)" . ".xls";
    // Criamos uma tabela HTML com o formato da planilha
    $html = '';
    $html_2 = '';
    $html .= '<table border="1">';
    $html .= '<tr>';
    $html .= '<td colspan="9">Formação de Preço</td>';
    $html .= '</tr>';
    $html .= '<td><b>#</b></td>';
    $html .= '<td><b>Descrição</b></td>';
    $html .= '<td><b>Codigo do fabricante</b></td>';
    $html .= '<td><b>Quantidade de peças</b></td>';
    $html .= '<td><b>Valor da unidade</b></td>';
    $html .= '<td><b>ICMS</b></td>';
    $html .= '<td><b>NCM</b></td>';
    $html .= '<td><b>Alíquota % Icms</b></td>';
    $html .= '<td><b>ICMS Unidade</b></td>';
    $html .= '<td><b>PIS Unidade</b></td>';
    $html .= '<td><b>COFINS Unidade</b></td>';
    $html .= '<td><b>ICMS ST</b></td>';
    $html .= '<td><b>ICMS ST da unidade</b></td>';
    $html .= '<td><b>Valor do IPI</b></td>';
    $html .= '<td><b>IPI da unidade</b></td>';
    $html .= '<td><b>Adicional % Frete</b></td>';
    $html .= '<td><b>Adicional Frete R$</b></td>';
    $html .= '<td><b>Custo financeiro</b></td>';
    $html .= '<td><b>Bonificação unidade</b></td>';
    $html .= '<td><b>Custo Financeiro - bonificação</b></td>';
    $html .= '<td><b>Custo contabil</b></td>';
    $html .= '<td><b>Preço de Venda</b></td>';
    $html .= '<td><b>Fator do Preço de venda/custo financeiro-bonificação</b></td>';
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
      $html .= "<td>$lista[13]</td>";
      $html .= "<td>$lista[14]</td>";
      $html .= "<td>$lista[15]</td>";
      $html .= "<td>$lista[16]</td>";
      $html .= "<td>$lista[17]</td>";
      $html .= "<td>$lista[18]</td>";
      $html .= "<td>$lista[19]</td>";
      $html .= "<td>$lista[20]</td>";
      $html .= "<td>$lista[21]</td>";
      $html .= "<td>$lista[22]</td>";
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

    
    



































































































































































































































































