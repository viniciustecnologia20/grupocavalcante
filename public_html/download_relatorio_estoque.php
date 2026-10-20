<?php
session_start();
?>
 <!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <title>Relatorio de estoque</title>
  <head>
  <body>
    <?php
    $teste = explode(";", $_SESSION['tabela']);
    // Criamos uma tabela HTML com o formato da planilha
    $html = '';
    $html_2 = '';
    $html .= '<table border="1">';
    $html .= '<tr>';
    $html .= '<td colspan="4">Relatorio de estoque</td>';
    $html .= '</tr>';
    
    $html .= '<tr>';
    $html .= '<td><b>Descrição</b></td>';
    $html .= '<td><b>Sku</b></td>';
    $html .= '<td><b>Fabricante</b></td>';
    $html .= '<td><b>Unidade</b></td>';
    $html .= '<td><b>Custo Médio</b></td>';
    $html .= '<td><b>Preço</b></td>';
    $html .= '<td><b>Preço promocional</b></td>';
    $html .= '<td><b>% Desconto</b></td>';
    $html .= '<td><b>Estoque Atual</b></td>';
    $html .= '<td><b>% Desconto</b></td>';
    $html .= '<td><b>Tempo de Estoque (Meses)</b></td>';
    $html .= '</tr>';
    
  foreach($teste as $data){
    //echo "<pre>";
    //var_dump($data);
    //echo "</pre>";
    $lista = explode(",", $data);
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
    $html .= '</tr>';    
    }
    
  
    
    

    
    // Configurações header para forçar o download
    header ("Expires: Mon, 07 Jul 2016 05:00:00 GMT");
    header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
    header ("Cache-Control: no-cache, must-revalidate");
    header ("Pragma: no-cache");
    header ("Content-type: application/x-msexcel");
    header ("Content-Disposition: attachment; filename=\"Relatorio de estoque.xls" );
    header ("Content-Description: PHP Generated Data" );
    // Envia o conteúdo do arquivo
    echo $html;
    
    exit;?>
  </body>
</html>

    
    
























































































































































































































