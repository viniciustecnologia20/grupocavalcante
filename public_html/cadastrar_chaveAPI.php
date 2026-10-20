<?php
echo "<pre>";
print_r ($_POST);
echo "</pre>";
$conecta = mysqli_connect('banco_gp_1.mysql.dbaas.com.br','banco_gp_1','tecnologia20') or print (mysqli_error());
mysqli_select_db("banco_gp_1", $conecta) or print(mysqli_error());
print "Conexão e Seleção OK!";

$chave = $_POST['chave'];

$connect = mysqli_connect('banco_gp_1.mysql.dbaas.com.br','banco_gp_1','tecnologia20');
$db = mysqli_select_db($connect,'banco_gp_1');
$query_select = "SELECT * FROM `ChaveAPI`";
$select = mysqli_query($connect,$query_select)or die(mysqli_error($connect));
$array = mysqli_fetch_array($select);
$chave_array = $array['chaveAPI'];
var_dump($chave_array);

if($chave_array == "" || $chave_array == null){
	echo"<script language='javascript' type='text/javascript'>
	alert('Chave API invalida');window.location.
	href='pagina_chaveAPI.php'</script>";
}else{
	if($chave_array == $chave){
	echo"<script language='javascript' type='text/javascript'>
      alert('Cheve API ja cadastrado!');window.location.
      href='pagina_chaveAPI.php'</script>";
      die();
	}
}
$query = "UPDATE ChaveAPI SET chaveAPI='$chave'";
$insert = mysqli_query($connect,$query)or die ('Erro na consulta ::. '. mysqli_error($connect));

if($insert){
	echo"<script language='javascript' type='text/javascript'>
	alert('Chave API cadastrado com sucesso!');window.location.
	href='pagina_chaveAPI.php'</script>";
}
?>	