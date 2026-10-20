<?php
session_start();
?>
 <!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <title>Conferencia de quantidade NFe</title>
  <head>
  <body>
    <?php
    // Definimos o nome do arquivo que será exportado
    $arquivo = $_SESSION['titulo_consulta']."(CQ)" . ".xls";
    // Criamos uma tabela HTML com o formato da planilha
    $html = '';
    $html_2 = '';
    $html .= '<table border="1">';
    $html .= '<tr>';
    $html .= '<td colspan="4">Conferencia de quantidade NFe</td>';
    $html .= '</tr>';
    
    $html .= '<tr>';
    $html .= '<td><b>#</b></td>';
    $html .= '<td><b>EAN</b></td>';
    $html .= '<td><b>Quantidade</b></td>';
    $html .= '<td><b>Situação</b></td>';
	$html .= '<td><b>Codigo do fabricante</b></td>';
    $html .= '<td><b>Situação</b></td>';
    $html .= '</tr>';
    
  foreach($_SESSION['tabela'] as $data){
    /*echo "<pre>";
    print_r($data);
    echo "</pre>";*/
    $lista = explode(",", $data);
    $html .= '<tr>';
    $html .= "<td>$lista[0]</td>";
    $html .= "<td>$lista[1]</td>";
    $html .= "<td>$lista[2]</td>";
    $html .= "<td>$lista[3]</td>";
	$html .= "<td>$lista[4]</td>";
    $html .= "<td>$lista[5]</td>";
    $html .= '</tr>';    
    }
    
    $html .= '</table>';
    $html_2 .= '<table border="1">';
    $html_2 .= '<tr>';
    $html_2 .= '</tr>';
    $html_2 .= '<tr>';
    $html_2 .= '<td colspan="4">Conclução</td>';
    $html_2 .= '</tr>';
    $html_2 .= '<tr>';
  foreach($_SESSION[msgEAN_Encontrado] as $msg_ean){
    $html_2 .= "<td>EAN não encontrado na consulta: $msg_ean</td>";
    }
  foreach($_SESSION['msg_quantidade'] as $msg_quantidade){
    $html_2 .= '</tr>';
    $html_2 .= "<td>Quantidade incorreta na consulta: $msg_quantidade</td>";
    }
    $html_2 .= '<table border="1">';
    $html_2 .= '<tr>';
    $html_2 .= '</tr>';
    $html_2 .= '<tr>';
    $html_2 .= '<td colspan="4">Totalizador</td>';
    $html_2 .= '</tr>';
    $html_2 .= '<tr>';
    $html_2 .= "<td>Quantidade total de unidades da nota: $_SESSION[total_unidade_nota]</td>";
    $html_2 .= '</tr>';
    $html_2 .= '<tr>';
    $html_2 .= "<td>Quantidade total de unidades da fisico: $_SESSION[total_unidade_fisico]</td>";
    $html_2 .= '<tr>';
    $html_2 .= "<td>Diferença de unidades: $_SESSION[diferenca_unidades]</td>";
    $html_2 .= '</tr>';
    $html_2 .= '<tr>';
    $html_2 .= "<td>Numero total de itens da NF: $_SESSION[Contagem]</td>";
    $html_2 .= '</tr>';
    $html_2 .= '<tr>';
    $html_2 .= "<td>Numero total de itens da conferencia: $_SESSION[total_elementos_fisico]</td>";
    $html_2 .= '</tr>';
    $html_2 .= "<td>Diferença total de itens: $_SESSION[total_diferencas]</td>";
	$html_2 .= '</tr>';
    $html_2 .= "<td>codigos de fabricante incorretos ou não identificados: $_SESSION[codigos_de_fabricante_incorretos]</td>";
  
    
    

    
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
    echo $html_2;
    exit;?>
  </body>
</html>

    
    
























































































































































































































