<?php
/*$conecta = mysqli_connect('banco_gp_1.mysql.dbaas.com.br','banco_gp_1','tecnologia20') or print (mysqli_error());
mysqli_select_db("banco_gp_1", $conecta) or print(mysqli_error());
print "Conexão e Seleção OK!";*/
$NCM= $_POST['NCM']; //usuario*
//print_r($_POST['NCM']);
$connect = mysqli_connect('banco_gp_1.mysql.dbaas.com.br','banco_gp_1','tecnologia20');
$db = mysqli_select_db($connect,'banco_gp_1');
$query_select = "SELECT * FROM `NCM_monofasicos` WHERE NCM = '$NCM'";
$select = mysqli_query($connect,$query_select)or die(mysqli_error($connect));
$array = mysqli_fetch_array($select);
$ncmarray = $array['NCM'];
  
  $query_1 = "set @val_max = (select max(id) from NCM_monofasicos );";
  $insert = mysqli_query($connect,$query_1);
  $query_2 = "delete  FROM NCM_monofasicos where id = @val_max;";
  $insert = mysqli_query($connect,$query_2);

header("Location: pagina_monofasico.php"); exit;
?>





























































































































